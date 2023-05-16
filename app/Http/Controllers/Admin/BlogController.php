<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogsRequest;
use App\Http\Requests\updateBlogssRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_admin = User::where('id', $info->added_by)->value('name_en', 'name_ar');

                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id', $info->updated_by)->value('name_en', 'name_ar');
                }
            }
        }
        return view('dashboard.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogsRequest $request)
    {
        try {
            $checkExists_name = Blog::select("id")->where(['title_en' => $request->title_en, 'title_ar' => $request->title_ar])->first();
            if (!empty($checkExists_name)) {
                toastr()->error('عفوا الصورة  مكررة من قبل');
                return redirect()->back()->withInput();
            }
            $slug = Str::slug($request->title_ar,'-');
            $data_insert['title_en'] = $request->title_en;
            $data_insert['title_ar'] = $request->title_ar;
            $data_insert['slug'] = $slug;
            $data_insert['content_en'] = $request->content_en;
            $data_insert['content_ar'] = $request->content_ar;
            $data_insert['active'] = $request->active;
            $data_insert['added_by'] = auth()->user()->id;
            $data_insert['created_at'] = date("Y-m-d H:s");
            // $img = $request->file('image');
            // $img_name = rand(). time().$img->getClientOriginalName();

            // $img->move(public_path('uploads/Blog'), $img_name);
            // $data_insert['image']=$img_name;
            if ($request->file('image')) {
                $name = Str::random(12);
                $path = $request->file('image');
                $name = $name . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $data_insert['image'] = $name;
                $path->move('uploads/Blog', $name);
                //$data_insert['image'] = $request->file('image')->store('Blog', 'upload');

            }
            Blog::create($data_insert);
            toastr()->success('تمت  اضافة البيانات بنجاح');

            return redirect()->route('admin.blogs.index')->with(['success'=>__('Data has been added successfully')]);
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
        $data = Blog::select("*")->where('id', $id)->first();
        return view('dashboard.blogs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateBlogssRequest $request, string $id)
    {
        try {
            $checkExists_name = Blog::select("id")->where(['title_en' => $request->title_en, 'title_ar' => $request->title_ar])->where('id', '!=', $id)->first();
            if (!empty($checkExists_name)) {
                toastr()->error('عفوا العنوان  مكرر من قبل');

                return redirect()->back();
            }
            $slug = Str::slug($request->title_ar,'-');

            $data_update['title_en'] = $request->title_en;
            $data_update['title_ar'] = $request->title_ar;
            $data_update['content_en'] = $request->content_en;
            $data_update['content_ar'] = $request->content_ar;
            $data_update['slug'] = $slug;
            $data_update['active'] = $request->active;
            $data_update['updated_by'] = auth()->user()->id;
            $data_update['updated_at'] = date("Y-m-d H:s");
            $data = Blog::findOrFail($id);

            if ($request->file('image')) {
                $name = Str::random(12);
                $path = $request->file('image');
                $name = $name . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $data_update['image'] = $name;
                $path->move('uploads/Blog', $name);
            }

            Blog::where(['id' => $id])->update($data_update);
            toastr()->success('Data has been updated successfully!');

            return redirect()->route('admin.blogs.index')->with(['success'=>__('The data has been updated successfully')]);
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
            $Blog = Blog::findOrFail($id);
            File::delete('uploads/Blog/' . $Blog->path);

            $Blog->delete();
            toastr()->success('تمت الحدف بنجاح');

            return redirect()->route('admin.blogs.index')->with(['success'=>__('Data has been deleted successfully!')]);
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }

    public function toggle_active($id)
    {
        $team = Blog::findOrFail($id);
        if ($team->active) {
            $team->update([
                'active' => $team->active == 1 ? 2 : 1,
            ]);
        } else {
            $team->update([
                'active' => $team->active,
            ]);
        }
        session()->flash('success', __('The data has been updated successfully'));
        return back()->with(['success'=> __('The data has been updated successfully')]);
    }
}
