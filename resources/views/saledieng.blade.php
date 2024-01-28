@extends('layouts.application')

@section('title', 'Bài viết Saledieng')
@section('url', Request::url())
@section('description', 'Bài viết Saledieng')
@section('image', 'https://www.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
                <div class="heading__post--center">
                    <h1>{{$saledieng_family_subname}} {{$saledieng_family_name}}</h1>
                    <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$saledieng_family_name}}</li>
                        </ol>
                    </nav>
                </div>
            <div class="heading__post--component"></div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= Content ================================= -->
<section>
    <div class="post-categories">
        <div class="container">
          <div class="row">
            <div class="col-md-12 post-categories__new">
                @if(!empty($first_saledieng_post[0]))
                    <a href="{{ route('detail.post', ['id' => $first_saledieng_post[0]->id, 'title' => $first_saledieng_post[0]->title]) }}">
                        <div class="categories-card categories-card--large" data-aos="fade-up">
                            <div class="categories-card__img">
                                @if(empty($first_saledieng_post[0]->image))
                                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                @else
                                    <img src="{{ asset($first_saledieng_post[0]->image) }}" alt="img" />
                                @endif
                            </div>

                            <div class="categories-card__title">{{$first_saledieng_post[0]->title}}</div>
                            <div class="categories-card__tag">{{$first_saledieng_post[0]->getTranslatedPostType()}}</div>
                        </div>
                    </a>
                @endif
            </div>
          </div>

          <div class="row" data-aos="fade-up">
            @foreach($saledieng_posts as $post)
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

          {{ $saledieng_posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
