<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Team::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_name = User::where('id', $info->added_by)->value('name');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name');
                }
            }
            return view('dashboard.team.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $checkExists_name =Team::select("id")->where(['name'=>$request->name])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا  الاسم مكرر من قبل'])->withInput();
            }
            $data_insert['name'] = $request->name;
            if ($request->file('image')) {
                $name = Str::random(12);
                $path = $request->file('image');
                $name = $name . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $data_insert['image'] = $name;
                $path->move('uploads/team', $name);
            }
            $data_insert['active'] = $request->active;
            $data_insert['added_by'] = auth()->user()->id;
            $data_insert['created_at'] = date("Y-m-d H:s");
            Team::create($data_insert);
            toastr()->success('تم الاضافة بنجاح!');

            return redirect()->route('admin.teams.index')->with(['success'=>__('Data has been added successfully')]);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Team::select("*")->where('id' , $id)->first();
        return view('dashboard.team.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $checkExists_name =Team::select("id")->where(['name'=>$request->name])->where('id','!=',$id)->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكررة من قبل'])->withInput();
            }
            $data_update['name'] = $request->name;
            $data_update['active'] = $request->active;
            $data = Team::findOrFail($id);
            if ($request->file('image')) {
                $name = Str::random(12);
                $path = $request->file('image');
                $name = $name . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $data_update['image'] = $name;
                $path->move('uploads/team', $name);
            }
            $data_update['updated_by'] = auth()->user()->id;
            $data_update['updated_at'] = date("Y-m-d H:s");
            Team::where(['id'=>$id])->update($data_update);
            toastr()->success('تم التحديث بنجاح !');
            return redirect()->route('admin.teams.index')->with(['success'=>__('The data has been updated successfully')]);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $Team = Team::findOrFail($id);
            File::delete('uploads/Team/'.$Team->path);

            $Team->delete();
            return redirect()->route('admin.teams.index')->with(['success'=>__('Data has been deleted successfully!')]);
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function toggle_active($id)
    {
        $team = Team::findOrFail($id);
        if ($team->active) {
            $team->update([
                'active' => $team->active == 1? 2 : 1,
            ]);
        } else {
            $team->update([
                'active' => $team->active,
            ]);
        }
        session()->flash('success', 'تم التحديث بنجاح');
        return back();
    }
}
