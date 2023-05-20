<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderSiteController extends Controller
{





    public function orderIndex()
    {
        $orders = Order::select("*")->orderby('id','DESC')->get();
        $user = auth()->user();
        $hasOrders = $user->orders()->exists();

        if ($hasOrders) {
            $orders = $user->orders;

        } else {
            $orders = [];
        }
        $all_orders_count = $user->orders()->count();
        $waiting =$user->orders()->where('order_status',3)->count();
        $waiting_pay = $user->orders()->where('order_status',2)->count();
        $finish = $user->orders()->where('order_status',1)->count();
        return view('site.new-order',compact('orders','all_orders_count','waiting','waiting_pay','finish'));
    }

    public function orderStore(Request $request)
    {
        try{

            $checkExists_name = Order::select('id')->where(['mobile_user'=>$request->mobile_user])->first();

            //set customer code
            $row = Order::select("number_orders")->orderby('id','DESC')->first() ;
            if (!empty($row)) {
                $data_insert['number_orders'] = $row['number_orders'] + 1;
            } else {
                $data_insert['number_orders'] = 1;
            }
            $user_id = auth()->id();
            $data_insert['active'] = 1;
            $data_insert['mobile_user'] = $request->mobile_user;
            $data_insert['user_id'] = $user_id;
            $data_insert['order_type'] = $request->order_type;
            $data_insert['show_order_en'] = $request->show_order_en;
            $data_insert['show_order_ar'] = $request->show_order_ar;
            $data_insert['added_by'] = auth()->user()->id;
            $data_insert['date'] =123;

            Order::create($data_insert);
            toastr()->success('تمت الاضافة  بنجاح');

            return redirect()->route('site.order/index');
        }catch(\Exception $ex){
            return redirect()->back()
            ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
            ->withInput();
        }
    }
    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {

            $searchbyOrderNumber = $request->searchbyOrderNumber;
            $Order_type = $request->Order_type;

            if ($searchbyOrderNumber != '') {
                $field1 = "number_orders";
                $operator1 = "like";
                $value1 = $searchbyOrderNumber;
            } else {
                //true
                $field1 = "id";
                $operator1 = ">";
                $value1 = 0;
            }

            if ($Order_type == "all") {
                $field2 = "id";
                $operator2 = ">";
                $value2 = 0;
            } else {

                $field2 = "order_type";
                $operator2 = "=";
                $value2 = $Order_type;
            }


            $orders = Order::where($field1, $operator1, $value1)->where($field2, $operator2, $value2)->orderBy('id', 'DESC')->paginate(10);


            return view('site.ajax_search', ['orders' => $orders]);
        }
    }
}
