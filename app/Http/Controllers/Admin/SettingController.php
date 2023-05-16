<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSettingsRequest;
use App\Http\Requests\updateSettingsRequest;
use App\Models\Setting;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::select("*")->orderby('id', 'DESC')->first();
        if (!empty($data)) {
            $data->added_by_admin = User::where('id', $data->added_by)->value('name_en', 'name_ar');
            if ($data->updated_by > 0 and $data->updated_by != null) {
                $data->updated_by_admin = User::where('id', $data->updated_by)->value('name_en', 'name_ar');
            }
        }
        return view('dashboard.settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSettingsRequest $request)
    {
        try {
            $checkExists_name = Setting::where(['video' => $request->video])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => ' عفوا اسم الفيديو مكرر من قبل'])->withInput();
            }

            $data_insert['video'] = $request->video;
            $data_insert['title_video_en'] = $request->title_video_en;
            $data_insert['title_video_ar'] = $request->title_video_ar;
            $data_insert['content_video_en'] = $request->content_video_en;
            $data_insert['content_video_ar'] = $request->content_video_ar;
            $data_insert['title_gallary_en'] = $request->title_gallary_en;
            $data_insert['title_gallary_ar'] = $request->title_gallary_ar;
            $data_insert['content_gallary_en'] = $request->content_gallary_en;
            $data_insert['content_gallary_ar'] = $request->content_gallary_ar;
            $data_insert['privacy_policy_en'] = $request->privacy_policy_en;
            $data_insert['privacy_policy_ar'] = $request->privacy_policy_ar;
            $data_insert['Terms_and_Conditions_en'] = $request->Terms_and_Conditions_en;
            $data_insert['Terms_and_Conditions_ar'] = $request->Terms_and_Conditions_ar;
            $data_insert['created_at'] = date("Y-m-d H:s");


            if ($request->file('logo_header')) {
                $name = Str::random(12);
                $path = $request->file('logo_header');
                $name = $name . time() . '.' . $request->file('logo_header')->getClientOriginalExtension();
                $data_insert['logo_header'] = $name;
                $path->move('uploads/settings', $name);
            }
            $data_insert['added_by'] = auth()->user()->id;
            if ($request->file('logo_footer')) {
                $name = Str::random(12);
                $path = $request->file('logo_footer');
                $name = $name . time() . '.' . $request->file('logo_footer')->getClientOriginalExtension();
                $data_insert['logo_footer'] = $name;
                $path->move('uploads/settings', $name);
            }
            Setting::create($data_insert);
            return redirect()->route('admin.settings.index')->with(['success'=>__('Data has been added successfully')]);
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
        $data = Setting::select("*")->where('id', $id)->first();
        return view('dashboard.settings.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateSettingsRequest $request, string $id)
    {
        try {
            $data = Setting::select('id')->where(['id' => $id])->first();
            if (empty($data)) {
                return redirect()->route('admin.customers.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
            }
            $checkExists = Setting::where(['video' => $request->video])->where('id', '!=', $id)->first();
            if ($checkExists != null) {
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الفيديو مسجل من قبل'])
                    ->withInput();
            }
            $data_update['video'] = $request->video;
            $data_update['title_video_en'] = $request->title_video_en;
            $data_update['title_video_ar'] = $request->title_video_ar;
            $data_update['content_video_en'] = $request->content_video_en;
            $data_update['content_video_ar'] = $request->content_video_ar;
            $data_update['title_gallary_en'] = $request->title_gallary_en;
            $data_update['title_gallary_ar'] = $request->title_gallary_ar;
            $data_update['content_gallary_en'] = $request->content_gallary_en;
            $data_update['content_gallary_ar'] = $request->content_gallary_ar;
            $data_update['privacy_policy_en'] = $request->privacy_policy_en;
            $data_update['privacy_policy_ar'] = $request->privacy_policy_ar;
            $data_update['Terms_and_Conditions_en'] = $request->Terms_and_Conditions_en;
            $data_update['Terms_and_Conditions_ar'] = $request->Terms_and_Conditions_ar;
            $data_update['updated_by'] = auth()->user()->id;
            $data = Setting::findOrFail($id);
            if ($request->file('logo_header')) {
                $name = Str::random(12);
                $path = $request->file('logo_header');
                $name = $name . time() . '.' . $request->file('logo_header')->getClientOriginalExtension();
                $data_update['logo_header'] = $name;
                $path->move('uploads/settings', $name);
            }

            if ($request->file('logo_footer')) {
                $name = Str::random(12);
                $path = $request->file('logo_footer');
                $name = $name . time() . '.' . $request->file('logo_footer')->getClientOriginalExtension();
                $data_update['logo_footer'] = $name;
                $path->move('uploads/settings', $name);
            }

            $data_update['updated_at'] = date("Y-m-d H:s");

            Setting::where(['id' => $id])->update($data_update);
            return redirect()->route('admin.settings.index')->with(['success'=>__('The data has been updated successfully')]);
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
        try {
            $settings = Setting::findOrFail($id);
            File::delete('uploads/settings/' . $settings->logo_header);
            File::delete('uploads/settings/' . $settings->logo_footer);

            $settings->delete();
            toastr()->success('تم الحدف بنجاح!');

            return redirect()->route('admin.settings.index')->with(['success'=>__('Data has been deleted successfully!')]);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function toggle_active($id)
    {
        $team = Setting::findOrFail($id);
        if ($team->active) {
            $team->update([
                'active' => $team->active == 1 ? 2 : 1,
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
