@extends('layouts.application')

@section('title', $category)
@section('url', Request::url())
@section('description', $category)
@section('image', 'https://stg.fmavtn.org/assets/images/img/IMG-3.png')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            @if(!empty($menu_image))
                <div class="heading__post--img" style="background-image: url({{asset($menu_image)}})">
                    <h1 class="heading--white">{{$category}}</h1>
                    <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active active--white" aria-current="page">{{$menu}}</li>
                            <li class="breadcrumb-item active active--white" aria-current="page">{{$category}}</li>
                        </ol>
                    </nav>
                    <div class="heading__post--component"></div>
                </div>
            @else
                <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
                    <h1>{{$category}}</h1>
                    <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$menu}}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{$category}}</li>
                        </ol>
                    </nav>
                    <div class="heading__post--component"></div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- ================================= Content ================================= -->
<section>
    <div class="post-categories">
        <div class="container">
          <div class="row">
            <div class="col-md-12 post-categories__new">
                @if(!empty($first_post[0]))
                    <a href="{{ route('detail.post', ['id' => $first_post[0]->id, 'title' => $first_post[0]->title]) }}">
                        <div class="categories-card categories-card--large" data-aos="fade-up">
                            <div class="categories-card__img">
                                @if(empty($first_post[0]->image))
                                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                @else
                                    <img src="{{ asset($first_post[0]->image) }}" alt="img" />
                                @endif
                            </div>

                            <div class="categories-card__title">{{$first_post[0]->title}}</div>
                            <div class="categories-card__tag">{{$first_post[0]->getTranslatedPostType()}}</div>
                        </div>
                    </a>
                @endif
            </div>
          </div>

          <div class="row" data-aos="fade-up">
            @foreach($posts as $post)
                <div class="col-md-3">
                <a href="{{ route('detail.post', ['id' => $post->id, 'title' => $post->title]) }}">
                    <div class="categories-card">
                        <div class="categories-card__img">
                            @if(empty($post->image))
                                <img src="/assets/images/img/img-default.jpg" alt="slider" />
                            @else
                                <img src="{{ asset($post->image) }}" alt="img" />
                            @endif
                        </div>

                        <div class="categories-card__title">{{$post->title}}</div>
                        <div class="categories-card__tag">{{$post->getTranslatedPostType()}}</div>
                    </div>
                </a>
                </div>
            @endforeach
          </div>

          {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
