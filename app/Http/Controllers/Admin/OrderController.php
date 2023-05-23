<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ExportOrders;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\updateOrdersRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name');
                $info->user_id_name = User::where('id', $info->user_id)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name');
                }
            }
            return view('dashboard.order.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Order::select("*")->where('id' , $id)->first();
        return view('dashboard.order.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $checkExists_name =Order::select("id")->where(['number_orders'=>$request->number_orders])->where('id','!=',$id)->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكررة من قبل'])->withInput();
            }
            $data_update['number_orders'] = $request->number_orders;
            $data_update['mobile_user'] = $request->mobile_user;
            $data_update['order_status'] = $request->order_status;
            $data_update['show_order_en'] = $request->show_order_en;
            $data_update['show_order_ar'] = $request->show_order_ar;
            $data_update['order_type'] = $request->order_type;
            $data_update['active'] = $request->active;
            $data_update['updated_at'] = date("Y-m-d H:s");
            Order::where(['id'=>$id])->update($data_update);
            toastr()->success('تمت التحديث بنجاح');

            return redirect()->route('admin.order.index')->with(['success'=>__('The data has been updated successfully')]);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $Order = Order::findOrFail($id);
            $Order->delete();
            toastr()->success('تمت الحدف بنجاح');

            return redirect()->route('admin.order.index')->with(['success'=>__('Data has been deleted successfully!')]);
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function toggle_active($id)
    {
        $team = Order::findOrFail($id);
        if ($team->active) {
            $team->update([
                'active' => $team->active == 1? 2 : 1,
            ]);
        } else {
            $team->update([
                'active' => $team->active,
            ]);
        }
        session()->flash('success', __('The data has been updated successfully'));
        return back();
    }

    public function order_status($id)
    {
        $team = Order::findOrFail($id);
        if ($team->active) {
            $team->update([
                'order_status' => $team->order_status == 2? 3 : 1,
            ]);
        } else {
            $team->update([
                'order_status' => $team->order_status,
            ]);
        }
        session()->flash('success', __('The data has been updated successfully'));
        return back();
    }

    public function export()
    {
        return Excel::download(new ExportOrders, 'orders.xlsx');
    }


}
