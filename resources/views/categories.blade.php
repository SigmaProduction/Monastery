@extends('layouts.application')

@section('title', 'My Donate Title')

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
            <!-- {{$post}} -->
        </div>
    </div>
</section>
@endsection
