@extends('site.master')
@php
    $title = 'title_' . app()->currentLocale();
    $content = 'content_' . app()->currentLocale();

@endphp
@section('title', 'Blogs')

@section('content')
    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Article 01 -->

                    @foreach (\App\Models\Blog::where('active', 1)->get() as $info)
                        <article>
                            <!-- Post Image -->
                            <div class="image">
                                <img class="img-fluid img-fluid-edit" src="{{ asset('uploads/Blog/' . $info->image) }}"
                                    alt="article-01">
                            </div>
                            <!-- Post Title -->
                            <h3> {{ $info->$title }}</h3>
                            <!-- Post Description -->

                            <p>{!! Str::words($info->$content, 30, '...') !!}



                                @if ($wordCount >30)
                                    <a href="{{ route('site.blogs.show', $info->slug) }}">المزيد</a>
                                @endif
                            </p>

                            <!-- Read more button -->
                            <div class="text-right date">
                                <span>{{ $info->created_at->format('F d, Y,') }}</span>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
