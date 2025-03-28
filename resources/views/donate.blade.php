@extends('layouts.application')

@section('title', 'Quyên góp')
@section('url', Request::url())
@section('description', 'Quý vị vui lòng điền đầy đủ thông tin để nhà Dòng tiện liên lạc. Xin Chúa chúc lành cho Quý Vị. Xin chân thành cám ơn!')
@section('image', 'https://www.fmavtn.org/assets/images/img/img-default.jpg')

@section('content')
<section>
    <div class="header-wrap">
        <!--  master heading news -->
        <div class="heading__post">
            <div class="heading__post--img" style="background-image: url('/assets/images/img/donation.jpg');">
                <div class="heading__post--center">
                    <h1>Quyên Góp</h1>
                    <nav class="heading__post--breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quyên góp</li>
                        </ol>
                    </nav>
                </div>
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
                <div class="col-md-12">
                    <div class="donation__img">
                        <img src="/assets/images/img/FMA.png" alt="nha dong" />
                    </div>
                </div>
                <p class="donation__content" data-aos="fade-up">Quý vị vui lòng điền đầy đủ thông tin để nhà Dòng tiện liên lạc. Xin Chúa chúc lành cho Quý Vị. Xin chân thành cám ơn! 
                    <br/> Kindly fill out all the information needed so that we will be in touch with you shortly. Thank you for supporting us! God bless you!</p>
            </div>

            <div class="row" data-aos="fade-up">
            <div class="col-md-6">
                <div class="donation__topic">Tại Việt Nam, xin chuyển khoản như sau:</div>
                <div class="donation__info">
                Tên tài khoản: {{ $donate[0]->bank_account_name }} <br/>
                @if(!empty($donate[0]->bank_account_number))
                    Số tài khoản (VND): {{$donate[0]->bank_account_number}}<br/>
                @else
                    Số tài khoản (VND): Đang cập nhật...<br/>
                @endif
                
                Ngân hàng: {{$donate[0]->bank_branch_name}}
                </div>
            </div>
            <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</section>
@endsection
