<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeatureRequest;
use App\Http\Requests\UpdatedFeatureRequest;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    public function index()
    {
        $data = Feature::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name_en','name_ar');

                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name_en','name_ar');
                }
            }
            return view('dashboard.feature.index', compact('data'));
        }
    }

    public function create()
    {
        return view('dashboard.feature.create');
    }


    public function store(CreateFeatureRequest $request)
    {
        try {
            $checkExists_name =Feature::select("id")->where(['title_en'=>$request->title_en,'title_ar'=>$request->title_ar])->first();
            if (!empty($checkExists_name)) {
                toastr()->error('عفوا رقم الطلب  مكرر من قبل');
                return redirect()->back()->withInput();
            }
            $data_insert['title_en'] = $request->title_en;
            $data_insert['title_ar'] = $request->title_ar;
            $data_insert['content_en'] = $request->content_en;
            $data_insert['content_ar'] = $request->content_ar;
            $data_insert['active'] = $request->active;
            $data_insert['created_at'] = date("Y-m-d H:s");
            $img = $request->file('image');
            $img_name = rand(). time().$img->getClientOriginalName();
            $img->move(public_path('uploads/feature'), $img_name);
            $data_insert['image']=$img_name;
            Feature::create($data_insert);
            toastr()->success('تمت الاضافة بنجاح');

            return redirect()->route('admin.features.index');

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $data = Feature::select("*")->where('id' , $id)->first();
        return view('dashboard.feature.edit',compact('data'));
    }

    public function update(UpdatedFeatureRequest $request,$id)
    {
        try {
            $checkExists_name =Feature::select("id")->where(['title_en'=>$request->title_en,'title_ar'=>$request->title_ar])->where('id','!=',$id)->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكررة من قبل'])->withInput();
            }
            $data_update['title_en'] = $request->title_en;
            $data_update['title_ar'] = $request->title_ar;
            $data_update['content_en'] = $request->content_en;
            $data_update['content_ar'] = $request->content_ar;
            $data_update['active'] = $request->active;
            $data_update['updated_at'] = date("Y-m-d H:s");
            $data = Feature::findOrFail($id);
            $img_name = $data->image;
            if($request->hasFile('image')) {
                File::delete(public_path('uploads/feature'.$data->image));
                $img = $request->file('image');
                $img_name = rand(). time().$img->getClientOriginalName();
                $img->move(public_path('uploads/feature'), $img_name);
            }
            $data_update['image']=$img_name;
            Feature::where(['id'=>$id])->update($data_update);
            toastr()->success('تمت التحديث بنجاح');

            return redirect()->route('admin.features.index');

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try{
            $feature = Feature::findOrFail($id);
            File::delete(public_path('uploads/feature/'.$feature->path));

            $feature->delete();
            toastr()->success('تمت الحدف بنجاح');
            return redirect()->route('admin.features.index');
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
}
