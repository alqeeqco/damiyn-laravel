<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\updateOrdersRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name_en','name_ar');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name_en','name_ar');
                }
            }
            return view('dashboard.order.index', compact('data'));
        }
    }


    public function edit($id)
    {
        $data = Order::select("*")->where('id' , $id)->first();
        return view('dashboard.order.edit',compact('data'));
    }

    public function update(updateOrdersRequest $request,$id)
    {
        try {
            $checkExists_name =Order::select("id")->where(['number_orders'=>$request->number_orders])->where('id','!=',$id)->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكررة من قبل'])->withInput();
            }
            $data_update['number_orders'] = $request->number_orders;
            $data_update['mobile_user'] = $request->mobile_user;
            $data_update['Order_status'] = $request->Order_status;
            $data_update['show_order_en'] = $request->show_order_en;
            $data_update['show_order_ar'] = $request->show_order_ar;
            $data_update['Order_type'] = $request->Order_type;
            $data_update['active'] = $request->active;
            $data_update['updated_at'] = date("Y-m-d H:s");
            Order::where(['id'=>$id])->update($data_update);
            toastr()->success('تمت التحديث بنجاح');

            return redirect()->route('admin.order.index');

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $Order = Order::findOrFail($id);
            $Order->delete();
            toastr()->success('تمت الحدف بنجاح');

            return redirect()->route('admin.order.index');
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
}
