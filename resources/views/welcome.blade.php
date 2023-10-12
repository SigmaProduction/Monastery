@extends('layouts.application')

@section('title', 'My Welcome Title')

@section('content')
<div class="header-wrap">
    <div class="row">
        <div class="swiper slide-swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="swiper-zoom-container">
                    <img src="/assets/images/img/slide-1.png" alt="slide-1" />
                </div>
                </div>

                <div class="swiper-slide">
                <div class="swiper-zoom-container">
                    <img src="/assets/images/img/slide-1.png" alt="slide-2" />
                </div>
                </div>
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

    <div class="about-wrap__dream-1" data-aos="fade-left" data-aos-duration="5000">
        <img src="/assets/images/img/dream-1.png" alt="don-bosco" />
    </div>

    <div class="about-wrap__dream-2" data-aos="fade-right" data-aos-duration="5000">
        <img src="/assets/images/img/dream-2.png" alt="mazzelo" />
    </div><!-- /.Dream- -->

    <div class="about-wrap__content">
        <div class="about-wrap__content--img-top" data-aos="fade-up">
        <img src="/assets/images/img/marywithchild.png" alt="marywithchild" />
        </div><!-- /.Maria component- -->

        <div class="about-wrap__content--title" data-aos="fade-up">
        Dòng Con Đức Mẹ Phù Hộ
        </div>

        <div class="about-wrap__content--description" data-aos="fade-up">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, It has survived not only five centuries.
        </div>

        <a class="about-wrap__content--more btn-more" href="/Monastery_UI/about-us.html" data-aos="fade-up">
        Xem Thêm
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
        <h3 class="topic">Bài Mới</h3>
        <div class="row">
        <!-- news -->
        <div class="col-md-6" data-aos="fade-up">
            <a href="/Monastery_UI/news-details.html">
            <div class="post__cart">
                <div class="post__cart--img">
                <img src="/assets/images/img/IMG-1.png" alt="post" />
                </div>
                <div class="post__cart--tag">news</div>
                <p class="post__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
            </div>
            </a>

            <div class="post__list">
            <ul>
                <li class="post__list--item">
                <a href="/Monastery_UI/news-details.html">
                    <div class="item-cart">
                    <div class="item-cart__img">
                        <img src="/assets/images/img/IMG-1.png" alt="list-img" />
                    </div>

                    <div class="item-cart__content">
                        <div class="item-cart__content--tag">news</div>
                        <p>Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                    </div>
                    </div>
                </a>
                </li>

                <li class="post__list--item">
                <a href="/Monastery_UI/news-details.html">
                    <div class="item-cart">
                    <div class="item-cart__img">
                        <img src="/assets/images/img/IMG-1.png" alt="list-img" />
                    </div>

                    <div class="item-cart__content">
                        <div class="item-cart__content--tag">news</div>
                        <p>Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                    </div>
                    </div>
                </a>
                </li>

                <li class="post__list--item">
                <a href="/Monastery_UI/news-details.html">
                    <div class="item-cart">
                    <div class="item-cart__img">
                        <img src="/assets/images/img/IMG-1.png" alt="list-img" />
                    </div>

                    <div class="item-cart__content">
                        <div class="item-cart__content--tag">news</div>
                        <p>Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                    </div>
                    </div>
                </a>
                </li>

                <li class="post__list--item">
                <a href="/Monastery_UI/news-details.html">
                    <div class="item-cart">
                    <div class="item-cart__img">
                        <img src="/assets/images/img/IMG-1.png" alt="list-img" />
                    </div>

                    <div class="item-cart__content">
                        <div class="item-cart__content--tag">news</div>
                        <p>Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                    </div>
                    </div>
                </a>
                </li>

            </ul>
            </div>

            <a class="post__cart--more btn-more" href="/Monastery_UI/news.html" data-aos="fade-up">
            Xem Thêm
            </a>
        </div><!-- /.news- -->

        <!-- mega posts -->
        <div class="col-md-6" data-aos="fade-up">
            <a href="/Monastery_UI/news-details.html">
            <div class="post__cart post__cart--mega">
                <div class="post__cart--img">
                <img src="/assets/images/img/IMG-1.png" alt="post" />
                </div>
                <div class="post__cart--tag">Mega Post</div>
                <p class="post__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
            </div>
            </a>

            <a href="/Monastery_UI/news-details.html">
            <div class="post__cart post__cart--mega">
                <div class="post__cart--img">
                <img src="/assets/images/img/IMG-1.png" alt="post" />
                </div>
                <div class="post__cart--tag">Mega Post</div>
                <p class="post__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
            </div>
            </a>

            <a class="about-wrap__content--more btn-more mt-26" href="#" data-aos="fade-up">
            Xem Thêm
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
            <a href="#">
            <div class="post__cart">
                <div class="post__cart--img">
                <!-- <img src="/assets/images/img/IMG-1.png" alt="post" /> -->
                <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>
                </div>
                <div class="post__cart--tag">news</div>
                <p class="post__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
            </div>
            </a>

            <div class="row">
            <div class="col-md-4">
                <a href="#">
                <div class="post__cart">
                    <div class="post__cart--img media__cart--img">
                    <!-- <img src="/assets/images/img/IMG-1.png" alt="post" /> -->
                    <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                    </div>
                    <p class="post__cart--content media__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                <div class="post__cart">
                    <div class="post__cart--img media__cart--img">
                    <!-- <img src="/assets/images/img/IMG-1.png" alt="post" /> -->
                    <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                    </div>
                    <p class="post__cart--content media__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                <div class="post__cart">
                    <div class="post__cart--img media__cart--img">
                    <!-- <img src="/assets/images/img/IMG-1.png" alt="post" /> -->
                    <iframe width="100%" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                    </div>
                    <p class="post__cart--content media__cart--content">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                </div>
                </a>
            </div>
            </div>

        </div>
        <div class="col-md-4" data-aos="fade-up">
            <h3 class="topic">Podcast</h3>
            <a href="#">
            <div class="post__cart">
                <div class="post__cart--img podcast__post--img">
                <img src="/assets/images/img/IMG-1.png" alt="post" />
                </div>
                <div class="post__cart--content podcast__cart--content">
                <img src="./img/icon/podcast.svg" alt="podcast" />
                <p class="podcast__cart--description">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                </div>
            </div>
            </a>
            <hr class="hr-limited" />
            <a href="#">
            <div class="post__cart">
                <div class="post__cart--img podcast__post--img">
                <img src="/assets/images/img/IMG-1.png" alt="post" />
                </div>
                <div class="post__cart--content podcast__cart--content">
                <img src="./img/icon/podcast.svg" alt="podcast" />
                <p class="podcast__cart--description">Tuyệt tác Santorini mang hơi thở Địa Trung Hải của Léman ngay trên cung đường đẹp nhất rung tâm thành phố Vũng Tàu.</p>
                </div>
            </div>
            </a>
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
            <h3 class="topic topic--white categories--topic" data-aos="fade-up">Chuyên Mục</h3>
            <div class="col-md-12">
            <!-- Swiper categories -->
            <div class="swiper categories-swiper" data-aos="fade-right">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="categories__cart">
                        <a href="#">
                        <div class="categories__cart--post">
                            <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                            </div>
                            <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                            </p>
                        </div>
                        </a>
                        <a href="#" class="categories__cart--link">
                        Truyền Giáo
                        </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="categories__cart">
                    <a href="#">
                        <div class="categories__cart--post">
                        <div class="post__img">
                            <img src="/assets/images/img/IMG-1.png" alt="img" />
                        </div>
                        <p class="post__content">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                        </p>
                        </div>
                    </a>
                    <a href="#" class="categories__cart--link">
                        Truyền Giáo
                    </a>
                    </div>
                </div>
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
        <div class="swiper gallery-swiper" data-aos="fade-left" data-aos-duration="5000">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="gallery-img">
                <img src="/assets/images/img/IMG-2.png" alt="slide-vertical-2" />
                </div>
            </div>
            <div class="swiper-slide">
                <div class="gallery-img">
                <img src="/assets/images/img/IMG-2.png" alt="slide-vertical-2" />
                </div>
            </div>
            </div>
            <div class="swiper-pagination"></div>
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
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month active" id="pills-home-tab" data-toggle="pill" data-target="#thang1" type="button" role="tab" aria-controls="thang1" aria-selected="true"> Tháng 1</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-profile-tab" data-toggle="pill" data-target="#thang2" type="button" role="tab" aria-controls="#thang2" aria-selected="false">Tháng 2</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang3" type="button" role="tab" aria-controls="#thang3" aria-selected="false">Tháng 3</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 4</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 5</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 6</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 7</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 8</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 9</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 10</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 11</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link nav-month" id="pills-contact-tab" data-toggle="pill" data-target="#thang4" type="button" role="tab" aria-controls="#thang4" aria-selected="false">Tháng 12</button>
                </li>
            </ul> 
            </div>

            <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="thang1" role="tabpanel">
                <!-- content -->
                <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="saints__card" id="collapseExample">
                    <div class="saints__card--content">
                        <div class="content--date">Match 8</div>
                        <div class="content--title">Thánh Gioan Bosco</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Swiper -->
                    <div class="saints-swiper swiper swiper-container-multirow-column">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Donbosco.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Thánh Gioan Bosco</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Titozeman.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước Ti-tô Zeman</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/luyVariana.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước Lu-y Variara</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Lauravicuna.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước Laura Vicuna</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Lauravicuna.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước Laura Vicuna</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Donbosco.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước 
                                PHAN-XI-CÔ SA-LÊ</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/phanxicosale.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước 
                                PHAN-XI-CÔ SA-LÊ</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Lauravicuna.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước Laura Vicuna</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/phanxico.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Chân Phước 
                                PHAN-XI-CÔ SA-LÊ</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Donbosco.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Thánh Gioan Bosco</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                        <div class="swiper-slide">
                        <a href="#">
                            <div class="saints-sub__card">
                            <div class="saints-sub__card--img">
                                <img src="/assets/images/img/Donbosco.png" alt="donbosco" />
                            </div>

                            <div class="saints-sub__card--title">Thánh Gioan Bosco</div>
                            <div class="saints-sub__card--date">(Match 18)</div>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="tab-pane fade" id="thang2" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
            <div class="tab-pane fade" id="thang3" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            <div class="tab-pane fade" id="thang4" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- ================================= End - Sự thánh thiện Salêdiêng ================================= -->
@endsection
