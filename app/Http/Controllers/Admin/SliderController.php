<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\updateSliderRequest;
use Illuminate\Support\Str;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::select("*")->orderby('id', 'DESC')->orderby('id','DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name_en','name_ar');

                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name_en','name_ar');
                }
            }
        }
        return view('dashboard.sliders.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(CreateSliderRequest $request)
    {
        try {
            $checkExists_name = Slider::where(['title_en' => $request->title_en,'title_ar' => $request->title_ar])->orderby('id','DESC')->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => ' عفوا اسم الفيديو مكرر من قبل'])->withInput();
            }

            $data_insert['title_en'] = $request->title_en;
            $data_insert['title_ar'] = $request->title_ar;
            $data_insert['active'] = $request->active;
            $data_insert['created_at'] = date("Y-m-d H:s");
            $img = $request->file('slider');
            if ($request->file('slider')) {
                $name = Str::random(12);
                $path = $request->file('slider');
                $name = $name . time() . '.' . $request->file('slider')->getClientOriginalExtension();
                $data_insert['slider'] = $name;
                $path->move('uploads/sliders', $name);
            }
            Slider::create($data_insert);
            return redirect()->route('admin.slider.index')->with(['success'=>'Added successfully']);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $data = Slider::select("*")->where('id' , $id)->first();
        return view('dashboard.sliders.edit',compact('data'));
    }

    public function update(updateSliderRequest $request,$id)
    {
        try {
            $data = Slider::select('id')->where(['id'=>$id])->first();
            if (empty($data)) {
                return redirect()->route('admin.slider.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
            }
            $checkExists = Slider::where(['title_en' => $request->title_en,'title_ar' => $request->title_ar])->where('id', '!=', $id)->first();
            if ($checkExists != null) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الفيديو مسجل من قبل'])
                    ->withInput();
            }
            $data_update['title_en'] = $request->title_en;
            $data_update['title_ar'] = $request->title_ar;
            $data = Slider::findOrFail($id);
            if ($request->file('slider')) {
                $name = Str::random(12);
                $path = $request->file('slider');
                $name = $name . time() . '.' . $request->file('slider')->getClientOriginalExtension();
                $data_update['slider'] = $name;
                $path->move('uploads/sliders', $name);
            }
            $data_update['active'] = $request->active;
            $data_update['updated_by'] = auth()->user()->id;
            $data_update['updated_at'] = date("Y-m-d H:s");
            Slider::where(['id'=>$id])->update($data_update);
            return redirect()->route('admin.slider.index')->with(['success'=>'Update completed successfully']);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $slider = Slider::findOrFail($id);
            File::delete('uploads/sliders/'.$slider->path);

            $slider->delete();
            toastr()->success('Data has been deleted successfully!');

            return redirect()->route('admin.slider.index');
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function toggle_active($id)
    {
        $team = Slider::findOrFail($id);
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
