<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\updateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public function edit()
    {
        $id=auth()->user()->id;
        $user = User::find($id);
        return view('dashboard.profile.edit',compact('user'));
    }

    public function update(Request $request)
    {
        try {
            $id=auth()->user()->id;
            $user = User::find($id);
            $data_update['name_en'] = $request->name_en;
            $data_update['name_ar'] = $request->name_ar;
            $data_update['email'] = $request->email;
            $data_update['phone'] = $request->phone;
            $data_update['updated_by'] = auth()->user()->id;
            $data_update['updated_at'] = date("Y-m-d H:s");
            User::where(['id'=>$id])->update($data_update);
            toastr()->success('تمت التحديث بنجاح');

            return redirect('admin/dashboard/index');

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
     public function reset_Password()
    {
        $id=auth()->user()->id;
        $user = User::find($id);
        return view('dashboard.profile.resetPassword', compact('user') );
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'old_password' => 'required|min:3',
            'new_password' => 'required|min:3',
            'confirm_password' => 'required|min:3|same:new_password',
        ];
        $validated = $request->validate($rules);
        $user = auth()->user();
        if (!Hash::check($request->get('old_password'), $user->password)) {
            $message = 'The old password is incorrect'; //wrong old
            return redirect()->back()->with('danger' , $message);
        }
        $user->password = bcrypt($request->get('new_password'));

        $data=$user->save();
        toastr()->success('تمت التحديث بنجاح');

        return redirect('/admin/dashboard/index');
    }


}
