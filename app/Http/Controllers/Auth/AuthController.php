<?php

namespace App\Http\Controllers\Auth;

use Aloha\Twilio\Twilio;
use App\Http\Controllers\Controller;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{



    public function verfictionIndex()
    {
        return view('site.verification');
    }
    public function verfictionStore(Request $request)
    {
        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4 . $request->code5;
        if(auth()->user()->code == $code) {
            $user = User::find(auth()->id());
            $user->status = 'active';
            $user->save();
            return redirect('site');
        } else {
            toastr()->error("code error please try again");
            return back();
        }
    }

}


// try{
//     $code = rand(12345, 99999);
//     $user = new User();
//     $user->name_en = $request->name_en;
//     $user->email = $request->email;
//     $user->phone = $request->phone;
//     $user->password = Hash::make($request->phone);
//     $user->code = $code;
//     $user->save();
//     $account_sid = env('TWILIO_SID');
//     $auth_token =env('TWILIO_TOKEN');
//     $number =env('TWILIO_FROM');
//     $message = "Your verification code is $code";
//     $client = new Client($account_sid, $auth_token);
//     $message = $client->$message->create('+44'.$request->phone,[

//         'from'=>$number,
//     ]);

//     $credetails = [
//         'name_en'=>$request->name_en,
//         'email'=>$request->email,
//         'phone'=>$request->phone,
//         'password'=>$request->phone,
//     ];
//     if(Auth::attempt($credetails)){
//         toastr()->success('Register Successfully');

//         return redirect('site/verfiction');
//     }
//     return back()->with(['success'=>'Register Successfully']);
// }catch(\Exception $ex){
//     return redirect('site/verfiction')
//     ->with(['success' => ' تم ارسال الكود بنجاح وهو' . $ex->getMessage()])
//     ->withInput();

// }

// ------------------------------------------------------------------------------------------


        // $account_sid = 'ACfcb86c09c8157469c19a3e17e2556b27';
        // $auth_token = 'de16dee8913043e606df377ab3980a21';
        // $twilio_number = $user->phone;
        // $to_number = '+12707479981'; // Replace with the phone number you want to send the SMS to
        // $message = 'Hello, this is a test message!';

        // try {
        //     $client = new Client($account_sid, $auth_token);
        //     $formatted_number = preg_replace('/[^0-9]/', '', '+970'); // Remove all non-numeric characters from the phone number
        //     $to = '+'. $formatted_number; // Format the phone number in E.164 format
        //     $message = $client->messages->create(
        //         $to,
        //         array(
        //             'from' => $twilio_number,
        //             'body' => $message
        //         )
        //     );
        //     // Handle success case
        // } catch (\Exception $e) {
        //     // Handle error case
        //     Log::error('Twilio error: ' . $e->getMessage());
        //     return redirect()->back()->with('error', 'Unable to send SMS message');
        // }

        // try{
        //     $account_sid = env('TWILIO_SID');
        //     $auth_token =env('TWILIO_TOKEN');
        //     $number =env('TWILIO_FROM');

        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create('+970'.$request->phone,[

        //         'from'=>$number,
        //     ]);

        //     return "Messagg sent ....";
        // }catch(\Exception $ex){
        //     return redirect()->back()->with('error', 'Unable to send SMS message');
        // }


