<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- CSS assets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   
    <!-- Home Css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Animation Slide Css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
</head>
<body>
    <!-- ================================= Header ================================= -->
    <section>
        <div class="header-wrap">
            <div class="header-wrap__share">
                <a href="#">
                <div class="share--link">
                    <img src="/images/icon/youtube.svg" alt="youtube" /> 
                </div>
                </a>
                <a href="#">
                <div class="share--link">
                    <img src="/images/icon/facebook.svg" alt="facebook" /> 
                </div>
                </a>
            </div>
            <div class="header-wrap__heading">
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
                        <a class="navbar-brand navbar-custom__logo" href="/">
                        <img src="/images/logo/logo-white.svg" alt="logo"/>
                        </a><!-- /.logo -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    
                        <div class="collapse navbar-collapse navbar-custom__collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <div class="nav-link" href="/Monastery_UI/news.html">Trang chủ</div>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Hội Dòng
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Mục Vụ - Giáo Dục
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/Monastery_UI/news.html" role="button" data-toggle="dropdown" aria-expanded="false">
                                Gia Đình SALÊDIÊNG
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/Monastery_UI/news.html" role="button" data-toggle="dropdown" aria-expanded="false">
                                Giáo Hội
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Đức Tin
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Thư Viện
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Giới thiệu Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Don Bosco</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tin Hội Dòng</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Mẹ Mazzarello</a>
                                <a class="dropdown-item" href="/Monastery_UI/news.html">Tư liệu Hội Dòng</a>
                            </div>
                            </li>

                            <li class="nav-item search">
                            <a class="btn-custom btn-custom__hotline" href="#">
                                <img src="/images/icon/search.svg" alt="phone" />
                            </a>
                            </li>
                        </ul>
                        </div><!-- /.menu- -->
                    </div>
                </div>
                </div>
            </div><!-- /.navbar- -->
        </div>
    </section>
    <!-- ================================= End - Header ================================= -->

    <main>
        <!-- Here's where the main content will go -->
        @yield('content')
    </main>

    <!-- footer -->
    <section>
        <footer>
            <div class="footer">
                <div class="footer__scence" data-aos="fade-up" data-aos-duration="1000000"></div>
                <div class="container" data-aos="fade-up">
                <div class="row">
                    <!-- address -->
                    <div class="col-md-3">
                    <a class="footer__logo" href="#">
                        <img src="/images/logo/logo-white.svg" alt="logo"/>
                    </a>

                    <div class="footer__list footer__list--address">
                        <ul>
                        <li class="item">
                            <a href="#">
                            <span class="item__icon">
                                <img src="/images/icon/location.svg" alt="location" />
                            </span>
                            <div class="item__content">99 Đường Nguyễn Công Trứ, 
                                Phường Nguyễn Thái Bình, Quận 1,  TP.Hồ Chí Minh.</div>
                            </a>
                        </li>
                        <li class="item">
                            <a href="#">
                            <span class="item__icon">
                                <img src="/images/icon/email.svg" alt="email" />
                            </span>
                            <div class="item__content">dcdmph@gmail.com</div>
                            </a>
                        </li>
                        </ul>
                    </div>

                    </div>
                    <!-- related links -->
                    <div class="col-md-3">
                    <div class="mb-20">
                        <div class="footer__title">Liên Kết</div>
                        <div class="footer__list footer__list--content">
                        <ul>
                            <li class="item">
                            <a href="#">Website trung ương</a>
                            </li>
                            <li class="item">
                            <a href="#">
                                dcdmph@gmail.com
                            </a>
                            </li>
                            <li class="item">
                            <a href="#">
                                dcdmph@gmail.com
                            </a>
                            </li>
                            <li class="item">
                            <a href="#">
                                dcdmph@gmail.com
                            </a>
                            </li>
                        </ul>
                        </div>
                    </div>

                    <div>
                        <div class="footer__title">Lượt Truy Cập</div>
                        <div class="footer__list footer__list--access">
                        <ul>
                            <li class="item">
                            Số lượng truy cập trong ngày: 10
                            </li>
                            <li class="item">
                                Tổng số lượng truy cập: 100
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <!-- Flick link -->
                    <div class="col-md-3">
                    <div class="footer__title">Liên Kết Flick</div>
                    <a href="#" class="footer__img-flick">
                        <img src="/images/img/img-flick.png" alt="flick" />
                    </a>
                    </div>
                    <!-- facebook share -->
                    <div class="col-md-3">
                    <img src="/images/img/link-fb.png" alt="links-fb" />
                    </div>

                </div>
                </div>
                <hr class="limited-footer" />
                <div class="footer-copyright">Copyright © 2023 Dòng Con Đức Mẹ Phù Hộ</div>
            </div>
        </footer>
    </section>

    <!--jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment-with-locales.min.js" integrity="sha256-ZykW30UBCXWkPGsVyVPdJlUrce9/PawgYCEzinA4pnU=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.17/moment-timezone-with-data-2012-2022.min.js" integrity="sha256-pQNlWZakdoYCCoBWZ5G8hXPqONH7l7QX+MGFoAkiBqs=" crossorigin="anonymous"></script>
    
    <!--  Animation AOS slide show JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    
    <!-- JS assets -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Initialize Swiper -->

    <!-- Yield any additional scripts -->
    @yield('scripts')
</body>
</html>
