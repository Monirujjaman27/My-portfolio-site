@extends('layouts.website')
@section('title')
Tags
@endsection
@section('content')

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span class="badge badge-info" > Tag </span>
                <h3>{{ ucfirst($tags->name) }}</h3>
                @if($tags->description)
                <p>{{ ucfirst(strip_tags(Str::limit($tags->description, 300))) }} </p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-white">
    <div class="container">
        <div class="row">
            @foreach($post as $posts)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('website.post', ['slug'=>$posts->slug]) }}"><img height="370px" width="370px" src="{{ asset('public/storage/post').'/'.$posts->image }}" alt="{{ $posts->image }}"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-tags text-white badge badge-secondary mb-3">
                        @if(isset($posts->category->name)){{ ucfirst($posts->category->name) }} @else{{ 'No category' }} @endif 
                        </span>

                        <h2><a href="{{ route('website.post', ['slug'=>$posts->slug]) }}">{{ $posts->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if( isset( $posts->user->image) ) {{ asset('public/storage/user').'/'.$posts->user->image }} @else{{ asset('public/storage/logo/user.svg') }} @endif" alt="@if( isset( $posts->user->image) ) {{ $posts->user->image }} @else{{ 'user.svg' }} @endif" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#"> @if(isset($posts->user->name)) {{ ucfirst($posts->user->name) }} @else {{ 'unknown' }} @endif</a></span>
                            <span>&nbsp;-&nbsp; {{ $posts->created_at->format('F d,Y') }}</span>
                        </div>

                        <p>{{ ucfirst(strip_tags(Str::limit($posts->description, 150))) }}</p>
                        <p><a href="{{ route('website.post', ['slug'=>$posts->slug]) }}">Read More</a></p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
            {!! $post->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection