@extends('layouts.application')

@section('title', 'DÒNG CON ĐỨC MẸ PHÙ HỘ')
@section('url', 'http://fmavtn.org')
@section('description', 'Website chính thức của Dòng Con Đức Mẹ Phù Hộ (FMA) - Việt Nam')
@section('image', 'https://stg.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<div class="header-wrap">
    <div class="row">
        <div class="swiper slide-swiper swiper-container">
            <div class="swiper-wrapper">
                @foreach($image_sliders as $slider)
                    <div class="swiper-slide">
                        <div class="swiper-zoom-container">
                            @if(empty($slider->url))
                                <img src="/assets/images/img/slider-default.jpg" alt="slider" />
                            @else
                                <img src="{{ asset($slider->url) }}" alt="{{ $slider->thumb }}" />
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next slider__button"></div>
            <div class="swiper-button-prev slider_button"></div>
        </div>
    </div><!-- /.slide- -->
</div>

<!-- ================================= gioi-thieu ================================= -->
<section>
    <div class="about-wrap">
        <div class="cloud-float">
            <div class="about-wrap__cloud"></div>
            <div class="about-wrap__cloud"></div>
        </div>

        <div class="about-wrap__cloud--bottom"></div><!-- /.Cloud- -->
        <div>
            <div class="about-wrap__dream-1" data-aos="fade-left" data-aos-duration="5000">
                @if(!empty($about_us[0]) && $about_us[0]->dream_1_image == null)
                    <img src="/assets/images/img/dream-1.png" alt="don-bosco" />
                @else
                    <img src="{{ asset($about_us[0]->dream_1_image) }}" alt="don-bosco" />
                @endif
            </div>

            <div class="about-wrap__dream-2" data-aos="fade-right" data-aos-duration="5000">
                @if(!empty($about_us[0]) && $about_us[0]->dream_2_image == null)
                    <img src="/assets/images/img/dream-2.png" alt="mazzelo" />
                @else
                    <img src="{{ asset($about_us[0]->dream_2_image) }}" alt="mazzelo" />
                @endif
            </div><!-- /.Dream- -->
        </div>

        <div class="about-wrap__content">
            <div class="about-wrap__content--img-top" data-aos="fade-up">
                @if(!empty($about_us[0]) && $about_us[0]->top_image == null)
                    <img src="/assets/images/img/marywithchild.png" alt="marywithchild" />
                @else
                    <img src="{{ asset($about_us[0]->top_image) }}" alt="marywithchild" />
                @endif
            </div><!-- /.Maria component- -->

            <div class="about-wrap__content--title" data-aos="fade-up">
                Dòng Con Đức Mẹ Phù Hộ
            </div>

            <div class="about-wrap__content--description" data-aos="fade-up">
                {{$about_us[0]->description}}
            </div>

            <a class="about-wrap__content--more btn-more" href="{{ route('introduce') }}" data-aos="fade-up">
                Xem thêm
            </a>
        </div>

        <div class="about-wrap__creators" data-aos="fade-in">
            <img src="/assets/images/img/creators.png" alt="creators" />
        </div><!-- /.creators- -->
    </div>
</section>
<!-- ================================= End - gioi-thieu ================================= -->

<!-- ================================= bai-moi ================================= -->
<section>
    <div class="new-post">
        <div class="container">
            <h3 class="topic">Bài mới</h3>
            <div class="row">
                <!-- news -->
                <div class="col-md-6" data-aos="fade-up">
                    @if(!empty($first_post[0]))
                        <a href="{{ route('detail.post', ['id' => $first_post[0]->id, 'title' => $first_post[0]->title]) }}">
                            <div class="post__cart">
                                <div class="post__cart--img">
                                    @if(empty($first_post[0]->image))
                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                    @else
                                        <img src="{{ asset($first_post[0]->image) }}" alt="post" />
                                    @endif
                                </div>
                                <div class="post__cart--tag">{{ $first_post[0]->getTranslatedPostType() }}</div>
                                <p class="post__cart--content">{{ $first_post[0]->title; }}</p>
                            </div>
                        </a>
                    @endif

                    <div class="post__list">
                        <ul>
                            @foreach($new_posts as $new_post)
                                <li class="post__list--item">
                                    <a href="{{ route('detail.post', ['id' => $new_post->id, 'title' => $new_post->title]) }}">
                                        <div class="item-cart">
                                            <div class="item-cart__img">
                                                @if(empty($new_post->image))
                                                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                                @else
                                                    <img src="{{ asset($new_post->image) }}" alt="post" />
                                                @endif
                                            </div>

                                            <div class="item-cart__content">
                                                <div class="item-cart__content--tag">{{ $new_post->getTranslatedPostType() }}</div>
                                                <p>{{ $new_post->title; }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <a class="post__cart--more btn-more" href="{{ route('post_all') }}" data-aos="fade-up">
                        Xem thêm
                    </a>
                </div><!-- /.news- -->

                <!-- mega posts -->
                <div class="col-md-6" data-aos="fade-up">
                    @foreach($mega_posts as $mega_post)
                        <a href="{{ route('detail.mega', ['id' => $mega_post->id, 'title' => $mega_post->title]) }}">
                            <div class="post__cart post__cart--mega">
                                <div class="post__cart--img">
                                    @if(empty($mega_post->image))
                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                    @else
                                        <img src="{{ asset($mega_post->image) }}" alt="post" />
                                    @endif
                                </div>
                                <div class="post__cart--tag">{{$mega_post->getTranslatedPostType();}}</div>
                                <p class="post__cart--content">{{ $mega_post->title; }}</p>
                            </div>
                        </a>
                    @endforeach
                    <a class="about-wrap__content--more btn-more mt-26" href="{{ route('list.mega') }}" data-aos="fade-up">
                        Xem thêm
                    </a>

                </div><!-- /.mega posts- -->
            </div>
        </div>
    </div>
</section>
<!-- ================================= End - bai moi ================================= -->

<!-- ================================= Video - Podcast ================================= -->
<section>
    <div class="media">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-up">
                    <h3 class="topic">Video</h3>
                    @if(!empty($first_video_post[0]))
                        <a href="{{ route('detail.post', ['id' => $first_video_post[0]->id, 'title' => $first_video_post[0]->title]) }}">
                            <div class="post__cart">
                                <div class="post__cart--video">
                                    <iframe width="100%" src="{{ $first_video_post[0]->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <p class="post__cart--content">{{ $first_video_post[0]->title; }}</p>
                            </div>
                        </a>
                    @endif

                    <div class="row">
                        @foreach($video_posts as $video_post)
                            <div class="col-md-4">
                                <a href="{{ route('detail.post', ['id' => $video_post->id, 'title' => $video_post->title]) }}">
                                    <div class="post__cart">
                                        <div class="post__cart--img media__cart--img">
                                            <iframe width="100%" src="{{ $video_post->url; }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <p class="post__cart--content media__cart--content">{{ $video_post->title; }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <h3 class="topic">Podcast</h3>
                    @foreach($podcast_posts as $podcast_post)
                        <a href="{{ route('detail.post', ['id' => $podcast_post->id, 'title' => $podcast_post->title]) }}">
                            <div class="post__cart">
                                <div class="post__cart--img podcast__post--img">
                                    @if(empty($podcast_post->image))
                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                    @else
                                        <img src="{{ asset($podcast_post->image) }}" alt="post" />
                                    @endif
                                </div>
                                <div class="post__cart--content podcast__cart--content">
                                    <img src="/assets/images/icon/podcast.svg" alt="podcast" />
                                    <p class="podcast__cart--description">{{$podcast_post->title}}</p>
                                </div>
                            </div>
                        </a>
                        <hr class="hr-limited" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End - Video - Podcast ================================= -->

<!-- ================================= Chuyên Mục ================================= -->
<section>
    <div class="categories">
        <div class="categories__rock" data-aos="fade-up" data-aos-duration="5000"></div>

        <div class="container-fluit">
            <div class="row">
                <h3 class="topic topic--white categories--topic">Chuyên mục</h3>
                <div class="col-md-12">
                    <!-- Swiper categories -->
                    <div class="swiper categories-swiper" data-aos="fade-right">
                        <div class="swiper-wrapper">
                            @foreach($categories_important as $category_important)
                            <div class="swiper-slide">
                                <div class="categories__cart">
                                    @if(!empty($category_important->posts->sortDesc()->first()))
                                        <a href="{{ route('detail.post', ['id' => $category_important->posts->sortDesc()->first()->id, 'title' => $category_important->posts->sortDesc()->first()->title]) }}">
                                            <div class="categories__cart--post">
                                                <div class="post__img">
                                                    @if(empty($category_important->posts->sortDesc()->first()->image))
                                                        <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                                    @else
                                                        <img src="{{ asset($category_important->posts->sortDesc()->first()->image) }}" alt="img" />
                                                    @endif
                                                </div>
                                                <p class="post__content">
                                                    {{ $category_important->posts->sortDesc()->first()->title }}
                                                </p>
                                            </div>
                                        </a>
                                    @endif

                                    <a href="{{ route('list.categories', ['menu' => $category_important->menu->name, 'category' => $category_important->name]) }}" class="categories__cart--link">
                                        {{$category_important->name}}
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End - Chuyên Mục ================================= -->

<!-- ================================= Lời chúa ================================= -->
<section>
    <div class="gallery">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper gallery-swiper">
                        <div class="swiper-wrapper">
                            @foreach($image_galleries as $image_gallery)
                                <div class="swiper-slide">
                                    <div class="gallery-img">
                                        @if(empty($image_gallery->url))
                                            <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                        @else
                                            <img src="{{ asset($image_gallery->url) }}" alt="slide-vertical-2" />
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End - Lời chúa ================================= -->

<!-- ============================== Sự thánh thiện Salêdiêng ============================== -->
<section>
    <div class="saints">
        <div class="container">
            <div class="row">
                <h3 class="topic categories--topic" data-aos="fade-up">Sự thánh thiện Salêdiêng</h3>
                <div class="col-md-12">
                    <!-- Month -->
                    <div class="saints__month">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach($saledieng_months as $saledieng_month)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link nav-month {{$saledieng_month->month == 1 ? 'active' : ''}}" id="pills-home-tab" data-toggle="pill" data-target="#thang{{$saledieng_month->id}}" type="button" role="tab" aria-controls="thang{{$saledieng_month->id}}" aria-selected="true"> 
                                        Tháng {{$saledieng_month->month}}
                                    </button>
                                </li>
                            @endforeach
                        </ul> 
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- <div class="saints__card--default">
                            <img src="/assets/images/img/default-saledieng.jpg" alt="donbosco" />
                        </div> -->
                        @foreach($saledieng_months as $saledieng_month)
                            <div class="tab-pane fade show {{$saledieng_month->month == 1 ? 'active' : ''}}" id="thang{{$saledieng_month->id}}" role="tabpanel">
                                @if($saledieng_month->saledieng_families->isEmpty())
                                    <div class="saints__card--default">
                                        <img src="/assets/images/img/default-saledieng.jpg" alt="donbosco" />
                                    </div>
                                @else
                                    <!-- content -->
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            @if(!empty($saledieng_month->saledieng_families->first()))
                                                <a id="link-thanh" href="{{ route('saledieng.index', ['id' => $saledieng_month->saledieng_families->first()->id]) }}">
                                                    <div class="saints__card" id="thanh" style="background-image: url({{asset($saledieng_month->saledieng_families->first()->image)}})">
                                                        <div class="saints__card--content">
                                                            <div id="thanh-date" class="content--date">{{ $saledieng_month->saledieng_families->first()->death_date}}</div>
                                                            <div  id="thanh-title"class="content--title">{{ $saledieng_month->saledieng_families->first()->name}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <!-- Swiper -->
                                            <div class="saints-swiper swiper swiper-container-multirow-column">
                                                <div class="swiper-wrapper">
                                                    @foreach($saledieng_month->saledieng_families as $saledieng_family)
                                                        <div class="swiper-slide">
                                                            <div class="saints-sub__card">
                                                                <a href="{{ route('saledieng.index', ['id' => $saledieng_family->id]) }}">
                                                                    <div class="saints-sub__card--img">
                                                                        @if(empty($saledieng_family->image))
                                                                            <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                                                        @else
                                                                            <img src="{{ asset($saledieng_family->image) }}" alt="donbosco" />
                                                                        @endif
                                                                    </div>
                                                                </a>
                                                                <a href="{{ route('saledieng.index', ['id' => $saledieng_family->id]) }}">
                                                                    <div class="saints-sub__card--title">{{$saledieng_family->subname}}<br/>{{ $saledieng_family->name }}</div>
                                                                    <div class="saints-sub__card--date">{{ $saledieng_family->death_date }}</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End - Sự thánh thiện Salêdiêng ================================= -->
@endsection
