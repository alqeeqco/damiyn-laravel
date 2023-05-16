<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if (auth()->check() and auth()->user()->status == 'Inactive') {
            return redirect('site/verfiction');
        }
        $data = Review::all();
        return view('site.home',compact('data'));
    }


    public function verfiction()
    {
        return view('site.verification');
    }


    public function homeIndex()
    {
        return view('site.index');
    }

    public function homeBlogs()
    {
        return view('site.blogs');
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
