<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderSiteController extends Controller
{
    public function sliderIndex()
    {
        $sliders = Slider::select("*")->orderby('id','DESC')->limit(2)->get();
        return view('site.home',compact('sliders'));
    }
}
