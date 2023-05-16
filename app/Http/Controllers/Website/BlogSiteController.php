<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogSiteController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::select("*")->where('active',1)->orderby('id','ASC')->get();
        $content = Blog::select('content_ar','content_en')->get();
        $wordCount = str_word_count($content);
        return view('site.blogs',compact('blogs','wordCount'));
    }

    public function show($slug)
{
    $slug = Blog::where('slug',$slug)->first();
    $content = Blog::select('content_ar','content_en')->get();
    $wordCount = str_word_count($content);
    return view('site.showBlogs',compact('slug','wordCount'));
}


}
