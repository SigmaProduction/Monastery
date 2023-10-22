@extends('layouts.application')

@section('title', 'My Donate Title')

@section('content')
<!-- ================================= Content ================================= -->
<section>
    <div class="post-detail">
        @if($post_detail->post_type == 'default_post') 
            <div class="post-detail__img" data-aos="fade-up">
                <img src="{{ asset($post_detail->image) }}" alt="img-detail" />
            </div>
        @endif

        @if($post_detail->post_type == 'video_post') {
            <div class="post__cart--img" style="margin-top: 40px;">
                <iframe width="100%" height="345" src="{{ $post_detail->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        @endif

        <div class="container post-detail__content" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Truyền Thông</li>
                            </ol>
                        </nav>

                        <div class="detail__sub">
                            <div class="detail__sub--date">
                                <img src="/assets/images/icon/Calendar.svg" alt="calendar"/>
                                {{$post_detail->created_at}}
                            </div>
                            <div class="detail__sub--shared">
                                <img src="/assets/images/img/share-face.png" alt="share" />
                            </div>
                        </div>

                        <h1 class="detail__title">{{$post_detail->title}}</h1>
                        <div class="detail__writer">{{$post_detail->description}}</div>
                        <div class="detail__content">
                            {!! $post_detail->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="topic-related" data-aos="fade-up">Chuyên Mục</h3>
            <div class="row" data-aos="fade-up">
                @foreach($posts_relation as $post_relation)
                    <div class="col-md-4">
                        <a href="{{ route('detail.post', ['id' => $post_relation->id, 'title' => $post_relation->title]) }}">
                            <div class="categories-card">
                                <div class="categories-card__img">
                                    <img src="{{ asset($post_relation->image) }}" alt="img" />
                                </div>

                                <div class="categories-card__title">{{$post_relation->title}}</div>
                                <div class="categories-card__tag">{{$post_relation->getTranslatedPostType();}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
