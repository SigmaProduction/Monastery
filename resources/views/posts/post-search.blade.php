@extends('layouts.application')

@section('title', 'Tìm Kiếm Bài viết')
@section('url', Request::url())
@section('description', 'Tìm Kiếm Bài viết')
@section('image', 'https://www.fmavtn.org/assets/images/img/IMG-3.png')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
            <h1>Tìm kiếm</h1>

            <div class="heading__post--search">
                <form action="{{ route('search.post') }}" method="get">
                    <nav class="navbar navbar-light navbar-custom">
                        <form class="form-inline">
                            <input type="text" name="search" class="form-control form-control__custom mr-sm-2" placeholder="Tìm kiếm bài viết tại đây..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-search my-2 my-sm-0"> Tìm kiếm</button>
                        </form>
                    </nav>
                </form>
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
          <div class="row" data-aos="fade-up">
            @if($posts->isNotEmpty())
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
            @else
                <h3 class="update-text">Không tìm thấy kết quả nào</h3>
            @endif
          </div>

          {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@endsection
