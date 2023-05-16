<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function loginPost(Request $request)
    {
        if($request->email){
            $credetails = [
                'email'=>$request->email,
                'password'=>$request->password,
                'type' => 'admin'
            ];
        }
        else{
            $credetails = [
                'phone'=>$request->phone,
                'password'=>$request->phone,
                'type' => 'admin'
            ];
        }
        if(Auth::attempt($credetails)){
            toastr()->success('Logged in successfully');
            return redirect('/admin/dashboard/index');
        }
        return back()->with(['error'=>'The email or password is incorrect']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
