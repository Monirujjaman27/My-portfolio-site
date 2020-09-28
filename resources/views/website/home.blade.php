@extends('layouts.website')
@section('content')
@section('title')
Home
@endsection

<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach($firstPost as $post )
                <a href="{{ route('website.post', ['slug'=>$post->slug]) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image:url('{{ asset('public/storage/post') }}/{{ $post->image }}');">

                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-info">
                                 @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif 
                           </span>
                        </div>
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('F d, Y')}}</span>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="col-md-4">
                @foreach($middlePost as $middlePost)
                <a href="{{ route('website.post', ['slug'=>$middlePost->slug]) }}" class="h-entry img-5 h-100 gradient"
                    style="background-image:url('{{ asset('public/storage/post') }}/{{ $middlePost->image }}');">

                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-danger">
                                 @if(isset($middlePost->category->name)){{ ucfirst($middlePost->category->name) }} @else{{ 'No category' }} @endif 
                           </span>
                        </div>
                        <h2>{{ $middlePost->title }}</h2>
                        <span class="date">{{ $middlePost->created_at->format('F d, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($lastPost as $post)
                <a href="{{ route('website.post', ['slug'=>$post->slug]) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image:url('{{ asset('public/storage/post') }}/{{ $post->image }}');background-size:250px 150px;background-repeat: no-repeat;">

                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-success">
                                 @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif 
                           </span>
                        </div>
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('F d, Y')}}</span>
                    </div>
                </a>

                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- >Recent Posts -->

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($allPost as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('website.post', ['slug'=>$post->slug]) }}"><img height="370px" width="370px"
                            src="{{ asset('public/storage/post').'/'.$post->image }}" alt="{{ $post->image }}"
                            class="rounded">
                    </a>
                    <div class="excerpt">
                        <span
                            class="post-category text-white bg-secondary mb-3">
                            @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif 
                         </span>

                        <h2><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">{{ $post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <!-- author-figure -->
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="@if( isset($post->user->image) ) {{ asset('public/storage/user').'/'.$post->user->image }} @else{{ asset('public/storage/logo/user.svg') }} @endif"
                                    alt="@if( isset($post->user->image) ) {{ $post->user->image }} @else{{ asset('public/storage/logo/user.svg') }} @endif" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#"> @if(isset($post->user->name)) {{ ucfirst($post->user->name) }} @else {{ 'unknown' }} @endif </a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('F d, Y') }}</span>
                        </div>
                        <p>{{  ucfirst(strip_tags(Str::limit($post->description, 150))) }}</p>
                        <p><a href="{{ route('website.post', ['slug'=>$post->slug]) }}">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
            {!! $allPost->links() !!}
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                @foreach( $footerFirstPost as $post)
                <a href="{{ route('website.post', ['slug'=>$post->slug]) }}" class="hentry img-1 h-100 gradient"
                    style="background-image:url('{{ asset('public/storage/post') }}/{{ $post->image }}');">
                    <span class="post-category text-white badge badge-info">
                        @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif 
                    </span>
                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('F d, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="col-md-7">
                @foreach($footerLastPost as $post)
                <a href="{{ route('website.post', ['slug'=>$post->slug]) }}" class="hentry img-2 v-height mb30 gradient"
                    style="background-image:url('{{ asset('public/storage/post') }}/{{ $post->image }}');background-size:250px; background-repete:no-repete;">
                    <span class="post-category text-white badge badge-info"> @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif </span>
                    <div class="text text-sm">
                        <h2>{{ $post->title }}</h2>
                        <span>{{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                </a>
                @endforeach
               
                <div class="two-col d-block d-md-flex">
                @foreach($footerMiddlePost as $post)
                    <a href="{{ route('website.post', ['slug'=>$post->slug]) }}" class="hentry v-height img-2  ml-auto gradient"
                        style="background-image:url('{{ asset('public/storage/post') }}/{{ $post->image }}');">
                        <span class="post-category text-white badge badge-success"> @if(isset($post->category->name)){{ ucfirst($post->category->name) }} @else{{ 'No category' }} @endif </span>
                        <div class="text text-sm">
                            <h2>{{ $post->title }}</h2>
                            <span>{{ $post->created_at->format('F d, Y') }}</span>
                        </div>
                    </a>
                   
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>


<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection