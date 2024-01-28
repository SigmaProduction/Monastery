@extends('layouts.application')

@section('title', $menu)
@section('url', Request::url())
@section('description', $menu)
@section('image', 'https://www.fmavtn.org/assets/images/img/IMG-3.png')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            @if(!empty($menu_image))
                <div class="heading__post--img" style="background-image: url({{asset($menu_image)}})">
                    <div class="heading__post--center">
                        <h1 class="heading--white">{{$menu}}</h1>
                        <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                <li class="breadcrumb-item active active--white" aria-current="page">{{$menu}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="heading__post--component"></div>
                </div>
            @else
                <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
                    <div class="heading__post--center">
                        <h1>{{$menu}}</h1>
                        <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$menu}}</li>
                            </ol>
                        </nav>
                    </div>
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
                    <a href="{{ $first_post[0]->post_type == 'mega_post' ? route('detail.mega', ['id' => $first_post[0]->id, 'title' => $first_post[0]->title]) : route('detail.post', ['id' => $first_post[0]->id, 'title' => $first_post[0]->title]) }}">
                        <div class="categories-card categories-card--large" data-aos="fade-up">
                            @if($first_post[0]->post_type == 'video_post')
                                <div class="categories-card__img">
                                    <iframe width="100%" height="100%" src="{{ $first_post[0]->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <div class="categories-card__img">
                                    @if(empty($first_post[0]->image))
                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                    @else
                                        <img src="{{ asset($first_post[0]->image) }}" alt="img" />
                                    @endif
                                </div>
                            @endif

                            <div class="categories-card__title">{{$first_post[0]->title}}</div>
                            <div class="categories-card__tag">{{$first_post[0]->getTranslatedPostType()}}</div>
                        </div>
                    </a>
                @else
                    <h3 class="update-text">Bài viết đang cập nhật...</h3>
                @endif
            </div>
          </div>

          <div class="row" data-aos="fade-up">
            @foreach($posts as $post)
                <div class="col-md-3">
                    <a href="{{ $post->post_type == 'mega_post' ? route('detail.mega', ['id' => $post->id, 'title' => $post->title]) : route('detail.post', ['id' => $post->id, 'title' => $post->title]) }}">
                        <div class="categories-card">
                            @if($post->post_type == 'video_post')
                                <div class="categories-card__img">
                                    <iframe width="100%" height="100%" src="{{ $post->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <div class="categories-card__img">
                                    @if(empty($post->image))
                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                    @else
                                        <img src="{{ asset($post->image) }}" alt="img" />
                                    @endif
                                </div>
                            @endif

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
