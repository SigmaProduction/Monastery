@extends('layouts.mega-application')

@section('title', 'My Introduce Title')

@section('content')
        <!-- ================================= Content ================================= -->
        <section>
      <div class="mega-about">
        <div class="container-fluit">
          <div class="row">
            <div class="mega-about__description">
              <div class="description--flying">
                <div class="flying--left" data-aos="fade-left">
                  <img src="/assets/images/img/flying-left.svg" alt="fly-left" />
                </div>
                <div class="flying--right" data-aos="fade-right">
                  <img src="/assets/images/img/flying-right.svg" alt="fly-right" />
                </div>
              </div>

              <div class="description__img" data-aos="fade-up">
                <img src="/assets/images/img/about-maria.svg" alt="logo-top" />
              </div>

              <div class="description__sub" data-aos="fade-up">
                {{$about_us[0]->subtitle}}
              </div>

              <h1 class="description__title" data-aos="fade-up">
                {{$about_us[0]->title}}
              </h1>
              <p class="description__content" data-aos="fade-up">
                {{$about_us[0]->description}}
              </p>
            </div>
            
            <div class="limited">
              <div class="limited--left" data-aos="fade-left">
                <img src="/assets/images/img/limit-about-left.png" alt="limit-about" />
              </div>
              <div class="limited--right" data-aos="fade-right">
                <img src="/assets/images/img/limit-about-right.png" alt="limit-about" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mega-about__content" data-aos="fade-up">
                {!! $about_us[0]->content !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
