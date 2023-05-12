<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dashboaedController extends Controller
{
    public function index()
    {
        $data = User::select('id','created_at')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('M');

        });
        $months = [];
        $monthCount = [];
        foreach($data as $month=>$values){
            $months[] = $month;
            $monthCount[] = count($values);
        }
         return view('dashboard.dashboard',compact('data','month','monthCount'));
    }


}
