<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureSiteController extends Controller
{
    public function featuresIndex()
    {
        $features = Feature::select("*")->orderby('id','DESC')->get();

        return view('site.home',compact('features'));
    }
}
