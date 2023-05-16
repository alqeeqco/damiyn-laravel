<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('type','user')->get();
        return view('dashboard.users.index',compact('data'));
    }

    public function delete($id)
    {
        try{
            $user = User::findOrFail($id);
            if($user->type == "admin"){
                return back()->with(['error'=>'عفوا لا يمكن حدف الأدمن']);
            }
            $user->delete();
            return redirect()->route('admin.users.index')->with(['success'=>__('Data has been deleted successfully!')]);
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
}
