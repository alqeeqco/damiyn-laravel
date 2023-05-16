<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileSiteController extends Controller
{
    public function edit()
    {
        $id=auth()->user()->id;
        $user = User::find($id);
        return view('site.profile',compact('user'));
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

    
}
