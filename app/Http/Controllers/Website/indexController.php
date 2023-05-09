<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        if (auth()->check() and auth()->user()->status == 'Inactive') {
            return redirect('site/verfiction');
        }
        return view('site.home');
    }

    public function edit()
    {
        $id=auth()->user()->id;
        $user = User::find($id);
        return view('site.profile',compact('user'));
    }
    public function verfiction()
    {
        return view('site.verification');
    }

    public function update(Request $request,$id)
    {
        try {
            $data_update = $request->all();
            // $id=auth()->user()->id;
            $data_update['updated_by'] = auth()->user()->id;
            $user = User::find($id)->update($data_update);
            // $data_update['name_en'] = $request->name_en;
            // $data_update['name_ar'] = $request->name_ar;
            // $data_update['email'] = $request->email;
            // $data_update['phone'] = $request->phone;
            // $data_update['updated_by'] = auth()->user()->id;
            // $data_update['updated_at'] = date("Y-m-d H:s");
            // User::where(['id'=>$id])->update($data_update);
            toastr()->success('تمت التحديث بنجاح');

            return back();

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function blogs()
    {
        $blogs = Blog::select("*")->where('active',1)->orderby('id','ASC')->get();
        return view('site.Blogs',compact('blogs'));
    }

    public function orderIndex()
    {
        $orders = Order::select("*")->orderby('id','DESC')->get();
        $all_orders_count = Order::count();
        $waiting = Order::where('Order_status',3)->count();
        $waiting_pay = Order::where('Order_status',2)->count();
        $finish = Order::where('Order_status',1)->count();
        return view('site.new-order',compact('orders','all_orders_count','waiting','waiting_pay','finish'));
    }

    public function orderStore(Request $request)
    {
        try{

            $checkExists_name = Order::select('id')->where(['mobile_user'=>$request->mobile_user])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()
                    ->with(['error' => 'عفوا رقم الهاتف  مسجل من قبل'])
                    ->withInput();
            }
            //set customer code
            $row = Order::select("number_orders")->orderby('id','DESC')->first() ;
            if (!empty($row)) {
                $data_insert['number_orders'] = $row['number_orders'] + 1;
            } else {
                $data_insert['number_orders'] = 1;
            }
            $data_insert['active'] = 1;
            $data_insert['mobile_user'] = $request->mobile_user;
            $data_insert['Order_type'] = $request->Order_type;
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

    public function sliderIndex()
    {
        $sliders = Slider::select("*")->orderby('id','DESC')->limit(2)->get();
        return view('site.Home',compact('sliders'));
    }

    public function featuresIndex()
    {
        $features = Feature::select("*")->orderby('id','DESC')->get();

        return view('site.Home',compact('features'));
    }

    public function homeIndex()
    {
        return view('site.index');
    }

    public function homeBlogs()
    {
        return view('site.Blogs');
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

                $field2 = "Order_type";
                $operator2 = "=";
                $value2 = $Order_type;
            }


            $orders = Order::where($field1, $operator1, $value1)->where($field2, $operator2, $value2)->orderBy('id', 'DESC')->paginate(10);


            return view('site.ajax_search', ['orders' => $orders]);
        }
    }

    public function send_sms()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("c58ad460", "6aHRq6eAYURhGFXF");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("970593491704", 'hamza', 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        return response()->json(data:'sms message has been deliverd',status:200);
    }

}
