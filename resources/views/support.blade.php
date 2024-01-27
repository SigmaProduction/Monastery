@extends('layouts.application')

@section('title', 'Liên Hệ')
@section('url', Request::url())
@section('description', 'Website chính thức của Dòng Con Đức Mẹ Phù Hộ (FMA) - Việt Nam')
@section('image', 'https://stg.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<!-- ================================= Content ================================= -->
<section>
    <div class="contact-post">
        <div class="container">
            <h3 class="contact__title">LIÊN HỆ VỚI CHÚNG TÔI</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="contact__img">
                        <img src="/assets/images/img/FMA.png" alt="nha dong" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" data-aos="fade-up">
                    <div class="conact__info">
                        <div class="conact__info--title" >1. Trụ sở Tỉnh dòng: </div>
                        <p class="conact__info--description">
                            - <b>Địa chỉ:</b> 57 Đường số 4, P. Tam Phú, TP. Thủ Đức, <br/>TP. Hồ Chí Minh
                        </p>
                        <p class="conact__info--description">
                            - <b>Điện thoại:</b> +84 028 3896 0826 
                        </p>
                        <img class="conact__info--qr" src="/assets/images/img/qr-code.png" alt="qr" />
                    </div>

                    <div class="conact__info">
                        <div class="conact__info--title" >2. Văn phòng Ơn gọi: </div>
                        <p class="conact__info--description">
                            - <b>Email:</b> mucvuongoifma@gmail.com
                        </p>
                        <p class="conact__info--description">
                            - <b>Điện thoại:</b> 093 410 3304
                        </p>
                    </div>

                    <div class="conact__info">
                        <div class="conact__info--title" >3. Văn phòng Truyền thông: </div>
                        <p class="conact__info--description">
                            - <b>Email:</b> truyenthong@fmavtn.org
                        </p>
                        <p class="conact__info--description">
                            - <b>Điện thoại:</b> 
                        </p>
                    </div>
                </div>
                
                <div class="col-md-6" data-aos="fade-up">
                    <div class="contact__map">
                        <iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.3250691235626!2d106.7455668!3d10.8628615!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175278d679fcac7%3A0x4a8df2382249d0e7!2zRMOybmcgQ29uIMSQ4bupYyBN4bq5IFBow7kgSOG7mSAtIEZNQQ!5e0!3m2!1svi!2s!4v1698051470066!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
