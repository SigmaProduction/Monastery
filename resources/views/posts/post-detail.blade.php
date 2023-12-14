@extends('layouts.application')

@section('title', $post_detail->title)
@section('url', Request::url())
@section('description', $post_detail->description)
@section('image', asset($post_detail->image))

@section('content')
<!-- ================================= Content ================================= -->
<section>
    <div class="post-detail">
        @if($post_detail->post_type == 'default_post') 
            <div class="post-detail__img" data-aos="fade-up">
                @if(empty($post_detail->image))
                    <img src="/assets/images/img/slider-default.jpg" alt="slider" />
                @else
                    <img src="{{ asset($post_detail->image) }}" alt="img-detail" />
                @endif  
            </div>
        @endif

        @if($post_detail->post_type == 'video_post')
            <div class="post-detail__video" style="margin-top: 40px;">
                <iframe width="100%" src="{{ $post_detail->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        @endif

        <div class="container post-detail__content" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail">
                        <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                                @if(!empty($post_detail->category->menu->name))
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{$post_detail->category->menu->name}}
                                    </li>
                                @endif

                                @if(!empty($post_detail->category->menu->name))
                                    <li class="breadcrumb-item active" aria-current="page">{{$post_detail->category->name}}</li>
                                @endif
                            </ol>
                        </nav>

                        <div class="detail__sub">
                            <div class="detail__sub--date">
                                <img src="/assets/images/icon/Calendar.svg" alt="calendar"/>
                                {{date('d/m/Y', strtotime($post_detail->created_at));}}
                            </div>
                            <div class="detail__sub--shared">
                                <div class="fb-like" data-href="'{{Request::url()}}'" data-width="100px" data-layout="" data-action="" data-size="" data-share="true"></div>
                                <!-- <img src="/assets/images/img/share-face.png" alt="share" /> -->
                            </div>
                        </div>

                        <h1 class="detail__title">{{$post_detail->title}}</h1>
                        @if($post_detail->post_type == 'postcard_post')
                            <a href="{{$post_detail->url}}" target="_blank" class="post__cart--podcasts">
                                <span class="arrow">
                                    <img src="/assets/images/icon/play.svg" alt="slider" />
                                </span>
                                <label for="toggle" class="label">play</label>
                            </a>
                        @endif

                        @if($post_detail->post_type == 'pdf_post')
                            <a href="{{$post_detail->url}}" target="_blank" class="post__cart--podcasts">
                                <label for="toggle" class="label">PDF</label>
                            </a>
                        @endif

                        <div class="detail__writer">{{$post_detail->description}}</div>
                        <div class="detail__content">
                            {!! $post_detail->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="topic-related" data-aos="fade-up">Bài liên quan</h3>
            @if($post_detail->post_type == 'postcard_post')
                <div class="row" data-aos="fade-up">
                    @foreach($post_relation_postcard as $post_postcard)
                        <div class="col-md-4">
                            <a href="{{ route('detail.post', ['id' => $post_postcard->id, 'title' => $post_postcard->title]) }}">
                                <div class="categories-card">
                                    <div class="categories-card__img">
                                        @if(empty($post_postcard->image))
                                            <img src="/assets/images/img/slider-default.jpg" alt="slider" />
                                        @else
                                            <img src="{{ asset($post_postcard->image) }}" alt="img" />
                                        @endif
                                    </div>

                                    <div class="categories-card__title">{{$post_postcard->title}}</div>
                                    <div class="categories-card__tag">{{$post_postcard->getTranslatedPostType();}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @elseif ($post_detail->post_type == 'pdf_post')
                <div class="row" data-aos="fade-up">
                    @foreach($post_relation_pdf as $post_pdf)
                        <div class="col-md-4">
                            <a href="{{ route('detail.post', ['id' => $post_pdf->id, 'title' => $post_pdf->title]) }}">
                                <div class="categories-card">
                                    <div class="categories-card__img">
                                        @if(empty($post_pdf->image))
                                            <img src="/assets/images/img/slider-default.jpg" alt="slider" />
                                        @else
                                            <img src="{{ asset($post_pdf->image) }}" alt="img" />
                                        @endif
                                    </div>

                                    <div class="categories-card__title">{{$post_pdf->title}}</div>
                                    <div class="categories-card__tag">{{$post_pdf->getTranslatedPostType();}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row" data-aos="fade-up">
                    @foreach($posts_relation as $post_relation)
                        <div class="col-md-4">
                            <a href="{{ route('detail.post', ['id' => $post_relation->id, 'title' => $post_relation->title]) }}">
                                <div class="categories-card">
                                    <div class="categories-card__img">
                                        @if(empty($post_relation->image))
                                            <img src="/assets/images/img/slider-default.jpg" alt="slider" />
                                        @else
                                            <img src="{{ asset($post_relation->image) }}" alt="img" />
                                        @endif
                                    </div>

                                    <div class="categories-card__title">{{$post_relation->title}}</div>
                                    <div class="categories-card__tag">{{$post_relation->getTranslatedPostType();}}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
