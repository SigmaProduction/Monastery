@extends('layouts.mega-application')

@section('title', 'Mega story chi tiết')

@section('content')
<!-- ================================= Content ================================= -->
<section>
    <div class="mega-content">
    <div class="container-fluit">
        <div class="row">
            <div class="mega-content__slide" data-aos="fade-up">
                @if(empty($mega_detail->image))
                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                @else
                    <img src="{{ asset($mega_detail->image) }}" alt="mega-slide" />
                @endif  
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mega-content__post" data-aos="fade-up">
                    {!! $mega_detail->content !!}
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="topic-related" data-aos="fade-up">Chuyên Mục</h3>
        <div class="row" data-aos="fade-up">
            @foreach($megas_relation as $mega_relation)
                <div class="col-md-4">
                    <a href="{{ route('detail.mega', ['id' => $mega_relation->id, 'title' => $mega_relation->title]) }}">
                        <div class="categories-card">
                            <div class="categories-card__img">
                                @if(empty($mega_relation->image))
                                    <img src="/assets/images/img/img-default.jpg" alt="slider" />
                                @else
                                    <img src="{{ asset($mega_relation->image) }}" alt="img" />
                                @endif
                            </div>

                            <div class="categories-card__title">{{$mega_relation->title}}</div>
                            <div class="categories-card__tag">{{ $mega_relation->getTranslatedPostType(); }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</section>
@endsection
