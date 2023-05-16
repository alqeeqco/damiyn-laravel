<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdatedReviewRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Review::select("*")->orderby('id', 'DESC')->paginate(10);
        if (!empty($data)) {
            foreach ($data as $info) {
                $info->added_by_name = User::where('id',$info->added_by)->value('name_en','name_ar');
                if ($info->updated_by > 0 and $info->updated_by != null) {
                    $info->updated_by_admin = User::where('id',$info->updated_by)->value('name_en','name_ar');
                }
            }
            return view('dashboard.review.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $checkExists_name =Review::select("id")->where(['name_ar'=>$request->name_ar,'name_en'=>$request->name_en])->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكرر من قبل'])->withInput();
            }
            $data_insert['name_en'] = $request->name_en;
            $data_insert['name_ar'] = $request->name_ar;
            $data_insert['message_en'] = $request->message_en;
            $data_insert['message_ar'] = $request->message_ar;
            $data_insert['active'] = $request->active;
            $data_insert['added_by'] = auth()->user()->id;
            $data_insert['created_at'] = date("Y-m-d H:s");
            Review::create($data_insert);
            toastr()->success('Data has been saved successfully!');
             return redirect()->route('admin.reviews.index')->with(['success'=>__('Data has been added successfully')]);

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
        $data = Review::select("*")->where('id' , $id)->first();
        return view('dashboard.review.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $checkExists_name =Review::select("id")->where(['name_en'=>$request->name_en,'name_ar'=>$request->name_ar])->where('id','!=',$id)->first();
            if (!empty($checkExists_name)) {
                return redirect()->back()->with(['error' => 'عفوا رقم الطلب  مكررة من قبل'])->withInput();
            }
            $data_update['name_en'] = $request->name_en;
            $data_update['name_ar'] = $request->name_ar;
            $data_update['message_en'] = $request->message_en;
            $data_update['message_ar'] = $request->message_ar;
            $data_update['active'] = $request->active;
            $data_update['updated_by'] = auth()->user()->id;
            $data_update['updated_at'] = date("Y-m-d H:s");
            Review::where(['id'=>$id])->update($data_update);
            toastr()->success('Data has been updated successfully!');

            return redirect()->route('admin.reviews.index')->with(['success'=>__('The data has been updated successfully')]);

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
            $review = Review::findOrFail($id);
            File::delete(public_path('uploads/review/'.$review->path));

            $review->delete();
            toastr()->success('Data has been deleted successfully!');

            return redirect()->route('admin.reviews.index')->with(['success'=>__('Data has been deleted successfully!')]);
        }catch(\Exception $ex){
            return redirect()->back()
                ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                ->withInput();
        }
    }
    public function toggle_active($id)
    {
        $team = Review::findOrFail($id);
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
