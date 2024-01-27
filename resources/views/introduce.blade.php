@extends('layouts.mega-application')

@section('title', 'Giới thiệu')
@section('url', Request::url())
@section('description', $about_us[0]->description)
@section('image', 'https://stg.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<!-- ================================= Content ================================= -->
<section>
    <div class="mega-about">
        <!-- ================================= Tổng quan ================================= -->
        <div class="container-fluit">
            <div class="row">
                <div class="mega-about__description">
                    <div class="description__img-central" data-aos="fade-up">
                        <img src="/assets/images/img/ducmephuho.png" alt="ducmephuho" />
                    </div>
                   
                    <div class="description__title-under" data-aos="fade-up">
                        <span>HỘI DÒNG CON ĐỨC MẸ PHÙ HỘ</span> <br/>
                        trong kế hoạch của Thiên Chúa
                    </div>
                    
                    <p class="description__content" data-aos="fade-up">
                        {{$about_us[0]->description}}
                    </p>
                </div>
            </div>
        </div>

        <!-- ================================= Content !! ================================= -->
        {!! $about_us[0]->content !!}
    </div>
</section>
@endsection
