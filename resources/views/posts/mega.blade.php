@extends('layouts.application')

@section('title', 'Mega story')
@section('url', Request::url())
@section('description', 'Mega story')
@section('image', 'https://stg.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
            <h1>Mega Story</h1>
            <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mega Story</li>
                </ol>
            </nav>
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
                @if(!empty($first_mega_post[0]))
                    <a href="{{ route('detail.mega', ['id' => $first_mega_post[0]->id, 'title' => $first_mega_post[0]->title]) }}">
                        <div class="categories-card categories-card--large" data-aos="fade-up">
                            <div class="categories-card__img">
                                @if(empty($first_mega_post[0]->image))
                                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                @else
                                    <img src="{{ asset($first_mega_post[0]->image) }}" alt="img" />
                                @endif
                            </div>

                            <div class="categories-card__title">{{$first_mega_post[0]->title}}</div>
                            <div class="categories-card__tag">{{$first_mega_post[0]->getTranslatedPostType()}}</div>
                        </div>
                    </a>
                @endif
            </div>
          </div>

          <div class="row" data-aos="fade-up">
            @foreach($mega_posts as $post)
                <div class="col-md-3">
                <a href="{{ route('detail.mega', ['id' => $post->id, 'title' => $post->title]) }}">
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

          {{ $mega_posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
