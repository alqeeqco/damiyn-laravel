<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSettingsRequest;
use App\Http\Requests\updateSettingsRequest;
use App\Models\Setting;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::select("*")->orderby('id', 'DESC')->first();
        if (!empty($data)) {
                $data->added_by_admin = User::where('id',$data->added_by)->value('name_en','name_ar');
                if ($data->updated_by > 0 and $data->updated_by != null) {
                    $data->updated_by_admin = User::where('id', $data->updated_by)->value('name_en','name_ar');
                }
        }
        return view('dashboard.settings.index', compact('data'));
    }

    public function create()
    {
        return view('dashboard.settings.create');
    }

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
            $data_insert['active'] = $request->active;
            $data_insert['privacy_policy_en'] = $request->privacy_policy_en;
            $data_insert['privacy_policy_ar'] = $request->privacy_policy_ar;
            $data_insert['Terms_and_Conditions_en'] = $request->Terms_and_Conditions_en;
            $data_insert['Terms_and_Conditions_ar'] = $request->Terms_and_Conditions_ar;
            $data_insert['created_at'] = date("Y-m-d H:s");

            $img = $request->file('logo_header');
            $img_name = rand(). time().$img->getClientOriginalName();
            $img->move(public_path('uploads/settings'), $img_name);
            $data_insert['logo_header']=$img_name;

            $data_insert['added_by'] = auth()->user()->id;

            $img = $request->file('logo_footer');
            $img_name1 = rand(). time().$img->getClientOriginalName();
            $img->move(public_path('uploads/settings'), $img_name1);
            $data_insert['logo_footer']=$img_name1;
            Setting::create($data_insert);
            return redirect()->route('admin.settings.index')->with(['success'=>'Added successfully']);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $data = Setting::select("*")->where('id' , $id)->first();
        return view('dashboard.settings.edit',compact('data'));
    }

    public function update(updateSettingsRequest $request,$id)
    {
        try {
            $data = Setting::select('id')->where(['id'=>$id])->first();
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
            $data_update['active'] = $request->active;
            $data_update['updated_by'] = auth()->user()->id;
            $data = Setting::findOrFail($id);
            $img_name = $data->logo_header;
            if($request->hasFile('logo_header')) {
                File::delete(public_path('uploads/settings'.$data->logo_header));
                $img = $request->file('logo_header');
                $img_name = rand(). time().$img->getClientOriginalName();
                $img->move(public_path('uploads/settings'), $img_name);
            }
            $data_update['logo_header']=$img_name;

            $img_name1 = $data->logo_footer;
            if($request->hasFile('logo_footer')) {
                File::delete(public_path('uploads/settings'.$data->logo_footer));
                $img = $request->file('logo_footer');
                $img_name1 = rand(). time().$img->getClientOriginalName();
                $img->move(public_path('uploads/settings'), $img_name1);
            }
            $data_update['logo_footer']=$img_name1;
            $data_update['updated_at'] = date("Y-m-d H:s");

            Setting::where(['id'=>$id])->update($data_update);
            return redirect()->route('admin.settings.index')->with(['success'=>'Update completed successfully']);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $settings = Setting::findOrFail($id);
            File::delete(public_path('uploads/settings/'.$settings->logo_header));
            File::delete(public_path('uploads/settings/'.$settings->logo_footer));

            $settings->delete();

            return redirect()->route('admin.settings.index')->with(['success'=>'Delete completed successfully']);
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

}
