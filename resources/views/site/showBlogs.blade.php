@extends('site.master')
@php
    $title = 'title_'.app()->currentLocale();
    $content = 'content_'.app()->currentLocale();
@endphp
@section('title','Blogs')

@section('content')
<section class="blog section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Article 01 -->


                <article>
                    <!-- Post Image -->
                    <div class="image">
                        <img class="img-fluid img-fluid-edit" src="{{ asset('uploads/Blog/'.$slug->image) }}" alt="article-01">
                    </div>
                    <!-- Post Title -->
                    <h3> {{ $slug->$title }}</h3>
                    <!-- Post Description -->
                    <p>{!! $slug->$content  !!}</p>

                    <!-- Read more button -->
                    <div class="text-right date">
                        <span>{{ $slug->created_at }}</span>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>
@endsection
