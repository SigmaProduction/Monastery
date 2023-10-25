@extends('layouts.application')

@section('title', 'Quyên góp')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            <div class="heading__post--img" style="background-image: url('/assets/images/img/IMG-3.png');">
            <h1>Quyên Góp</h1>
            <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quyên góp</li>
                </ol>
            </nav>
            <div class="heading__post--component"></div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= Content ================================= -->
<section>
    <div class="donation">
        <div class="container">
            <div class="row">
            <div class="donation__title" data-aos="fade-up">Hỗ Trợ</div>
            <p class="donation__content" data-aos="fade-up">Quý vị vui lòng điền đầy đủ thông tin để nhà Dòng tiện liên lạc. Xin Chúa chúc lành cho Quý Vị. Xin chân thành cám ơn! Kindly fill out all the information needed so that we will be in touch with you shortly. Thank you for supporting us! God bless you!</p>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-6">
                <div class="donation__topic">Tại Việt Nam, xin chuyển khoản như sau:</div>
                <div class="donation__info">
                Tên tài khoản: Tỉnh Dòng Tên Việt Nam <br/>
                Số tài khoản (VND): 046.100.0469919<br/>
                Ngân hàng Vietcombank, chi nhánh Tân Bình Dương
                </div>
            </div>
            <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</section>
@endsection
