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
    <!-- Back to top button -->
    <a id="button-top">
      <img src="/assets/images/icon/top-arrow.svg" />
    </a>
    <!-- ================================= Header ================================= -->
    <section>
      <div class="header-mega" data-aos="fade-up">
        <div class="header-mega__back">
          <a href="javascript: history.go(-1)">
            <img src="/assets/images/icon/back-mega.svg" alt="back" />
          </a>
        </div>

        <div class="header-mega__logo">
            <a href="/">
                <img src="/assets/images/icon/logo.svg" alt="logo" />
            </a>
        </div>
        <a class="header-mega__topic" href="{{ route('list.mega') }}">
            <h1>MEGA STORY</h1>
        </a>
        <div class="detail__sub--shared">
          <img src="/assets/images/img/share-face.png" alt="share" />
        </div>
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
                                    <img src="/assets/images/logo/logo-white.svg" alt="logo"/>
                                </a>

                                <div class="footer__list footer__list--address">
                                    <ul>
                                        <li class="item">
                                            <a href="#">
                                                <span class="item__icon">
                                                    <img src="/assets/images/icon/location.svg" alt="location" />
                                                </span>
                                                <div class="item__content">57 Đường số 4, P. Tam Phú, TP. Thủ Đức, TP. Hồ Chí Minh.</div>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#">
                                                <span class="item__icon">
                                                    <img src="/assets/images/icon/email.svg" alt="email" />
                                                </span>
                                                <div class="item__content">truyenthong@fmavtn.org</div>
                                                <a href="{{ url('/ho-tro') }}" class="item__content"> 
                                                    Liên hệ với chúng tôi
                                                </a>
                                            </a>
                                        </li>
                                    </ul>
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
                            <!-- related links -->
                            <div class="col-md-3">
                            <div class="mb-20">
                                <div class="footer__title">Liên Kết</div>
                                <div class="footer__list footer__list--content">
                                    <ul>
                                        <li class="item">
                                            <a href="https://www.cgfmanet.org/" target="_blank">Instituto Figlie di Maria Ausiliatrice</a>
                                        </li>

                                        <li class="item">
                                            <a href="https://www.sdb.org/" target="_blank">Salesians Don Bosco</a>
                                        </li>

                                        <li class="item">
                                            <a href="https://sdb.vn/" target="_blank">Tỉnh Dòng Sa-lê-diêng Don Bosco</a>
                                        </li>
                                        <li class="item">
                                            <a href="https://hdgmvietnam.com/" target="_blank">Hội đồng Giám mục Việt Nam</a>
                                        </li>
                                        <li class="item">
                                            <a href="https://phungvusaledieng.org/" target="_blank">Phụng Vụ Sa-lê-diêng</a>
                                        </li>
                                        <li class="item">
                                            <a href="https://ktcgkpv.org/" target="_blank">Các Giờ Kinh Phụng Vụ </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                            <!-- Flick link -->
                            <div class="col-md-3">
                                <div class="footer__title">Liên Kết Flick</div>
                                <a href="https://www.flickr.com/photos/fmavtn/albums" class="footer__img-flick" target="_blank">
                                    <img src="/assets/images/img/img-flick.png" alt="flick" />
                                </a>
                            </div>
                            <!-- facebook share -->
                            <div class="col-md-3">
                                <img src="/assets/images/img/link-fb.png" alt="links-fb" />
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
