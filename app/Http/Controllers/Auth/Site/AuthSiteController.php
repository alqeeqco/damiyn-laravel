<?php

namespace App\Http\Controllers\Auth\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSiteController extends Controller
{
    public function siteregister()
    {
        return view('auth.register');
    }
    public function siteregisterPost(Request $request)
    {

        $user = new User();
        $code = rand(99999,99999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->phone);
        $user->code = $code;
        $checkExists_name = User::where(['phone' => $request->phone])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم المستخدم   مسجل من قبل'])->withInput();
            }

            $checkExists_name = User::where(['email'=>$request->email])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا  الايميل مسجل من قبل'])->withInput();
            }
        $user->save();

        // $TWILIO_SID = env('TWILIO_SID');
        // $TWILIO_TOKEN = env('TWILIO_TOKEN');
        // $TWILIO_FROM = env('TWILIO_FROM');
        // $message = "Your verification code is $code";

        // $twilio = new Twilio($TWILIO_SID, $TWILIO_TOKEN, $TWILIO_FROM);
        // $twilio->message->create('+970'.$request->phone,[

        //     'form'=>$TWILIO_FROM,
        //     'body'=>"Your verification code is $code"
        // ]);
        // $message = $twilio->message($request->phone, $message, [], [
        //     'from'=>$TWILIO_FROM,
        // ]);

        //  $twilio->message($user->phone, "Your verification code is $code");



        // $twilio = new \Aloha\Twilio\Twilio("ACfcb86c09c8157469c19a3e17e2556b27",
        //  "de16dee8913043e606df377ab3980a21", "+12707479981");

        //  $twilio->message($user->phone, "Your verification code is $code");



        $credetails = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'code'=>$request->code,
            'password'=>$request->phone,
        ];
        if(Auth::attempt($credetails)){
            toastr()->success('Register Successfully');

            return redirect('site/verfiction');
        }
        toastr()->success('Register Successfully');
        return redirect('login');

    }
    public function sitelogin()
    {
        return view('auth.login');
    }
    public function siteloginPost(Request $request)
    {
        if($request->phone){
            $user = User::where('phone', $request->phone)->first();

        }else{
            return back()->with(['error'=>'يرجى ادخال الرقم ']);
        }

        $user = User::where('phone', $request->phone)->first();
        if(!$user){
            return back()->with(['error'=>'عفوا الرقم غير مسجل من قبل']);
        }

        if(Auth::loginUsingId($user->id)){
            toastr()->success('Logged in successfully');
            return redirect('site');
        }
        return back()->with(['error'=>'Phone Error']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.site');

    }

}
