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

        <!-- ================================= Các Đấng Sáng Lập ================================= -->
        <div class="container-fluit">
            <div class="row">
                <div class="limited">
                    <div class="limited--left" data-aos="fade-left">
                        <img src="/assets/images/img/limit-about-left.png" alt="limit-about" />
                    </div>
                    <h2 class="mega-about__title" data-aos="fade-up"> Các Đấng Sáng Lập </h2>
                    <div class="limited--right" data-aos="fade-right">
                        <img src="/assets/images/img/limit-about-right.png" alt="limit-about" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row mega-about--vertical-middle" data-aos="fade-up">
                <div class="col-md-6">
                    <div class="mega-about__creator">
                        <div class="creator__title">Đấng Sáng Lập</div>
                        <div class="creator__name">Cha Thánh <br/>Gioan Bosco</div>
                        <div class="creator__date">(1815 - 1888)</div>
                        <div class="creator__slogan">
                            “Xin cho tôi các linh hồn
                            còn mọi sự khác xin cứ lấy đi.”
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__creator-img">
                        <img src="/assets/images/img/don-bosco.png" alt="don-bosco" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Gioan Bosco sinh ngày 16 tháng 8 năm 1815, tại Becchi, miền Piemonte, nước Ý.
                        &nbsp;<br/>
                        Ngài thụ phong linh mục ngày 5 tháng 6 năm 1841. Thiên Chúa đã ban cho ngài một trái tim đầy tình yêu dành cho giới trẻ. Ngài đã thành lập Hiệp hội Thánh Phanxicô Salê, hay còn gọi là Dòng Salêdiêng Don Bosco để có thể chăm sóc và giáo dục những người trẻ nghèo và bị bỏ rơi thành những công dân lương thiện và Kitô hữu tốt lành.
                    </p>
                </div>
            </div>

            <div class="row mega-about--vertical-middle" data-aos="fade-up">
                <div class="col-md-6">
                    <div class="mega-about__creator-img">
                        <img src="/assets/images/img/maria-mazelo.png" alt="maria-mazelo" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__creator">
                        <div class="creator__title">Đấng Đồng Sáng Lập</div>
                        <div class="creator__name">Mẹ Thánh <br/>Maria Mazzarello</div>
                        <div class="creator__date">(1837 - 1881)</div>
                        <div class="creator__slogan slogan-nowrap">
                            “Ta trao phó chúng cho con.”
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Cùng thời với Cha Bosco, tại Mornese, miền Bắc nước Ý, có Maria Domenica Mazzarello và một số bạn trong nhóm Con Đức Mẹ Vô Nhiễm, họ dấn thân chăm sóc cho các thanh thiếu nữ trong vùng, giúp các em sống vui tươi, yêu mến Chúa Giêsu Thánh Thể, siêng năng thực hành việc đạo đức.
                    </p>
                    <p class="mega-about__description" data-aos="fade-up">
                        Một ngày kia, đang đi trên đường, Mazzarello có một thị kiến nhiệm màu: một căn nhà lớn xuất hiện với rất nhiều trẻ nữ chạy nhảy, vui chơi trên sân, trong khi đó có tiếng nói “Ta trao phó chúng cho con”. Tiếng nói này thôi thúc trong lòng Mazzarello một ước mơ giáo dục và làm cho định hướng tông đồ giữa các trẻ nữ ngày càng rõ nét hơn.
                    </p>
                    <p class="mega-about__description" data-aos="fade-up">
                        Chúa quan phòng đã sắp xếp cuộc gặp gỡ giữa Cha Bosco và Maria Mazzarello tại Mornese năm 1864. Cha Bosco đã ban huấn từ cho nhóm Con Đức Mẹ Vô Nhiễm và ngài đã nhìn thấy một số thiếu nữ phù hợp cho việc thành lập Kội dòng mới, trong đó Maria Mazzarello nổi bật hơn cả.
                    </p>
                </div>
            </div>
        </div>

        <!-- ================================= Thành Lập Hội Dòng ================================= -->
        <div class="container-fluit">
            <div class="row">
                <div class="limited">
                    <div class="limited--left" data-aos="fade-left">
                        <img src="/assets/images/img/limit-about-left.png" alt="limit-about" />
                    </div>
                    <div class="mega-about__title-wrap" data-aos="fade-up">
                        <h2 class="mega-about__title"> Thành Lập Hội Dòng </h2>
                        <div class="mega-about__created-date">05.08.1972</div>
                    </div>
                    
                    <div class="limited--right" data-aos="fade-right">
                        <img src="/assets/images/img/limit-about-right.png" alt="limit-about" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Và trong kế hoạch của Thiên Chúa, ngang qua sự can thiệp của Đức Maria, Hội dòng Con Đức Mẹ Phù Hộ được thành lập ngày 5 tháng 8 năm 1972. Với sự hiện diện của Cha Bosco, Maria Domenica Mazzarello và 10 thanh nữ đã tuyên khấn 3 năm.
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluit">
            <div class="row">
                <div class="mega-about__img">
                    <img src="/assets/images/img/IMG-mazello.png" alt="limit-about" />
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Năm 1935, Giáo hội đã công nhận Mẹ Maria Mazzarello là Đấng Đồng Sáng Lập cùng với Cha Bosco vì sự đóng góp đầy quyết định của ngài trong việc trao ban sự sống, hình thành và phát triển Hội dòng mới.
                    </p>
                </div>
            </div>
        </div>

        <!-- ================================= Đoàn Sủng và Sứ Mệnh ================================= -->
        <div class="row">
            <div class="limited">
                <div class="mega-about__title-wrap">
                    <h2 class="mega-about__title" data-aos="fade-up"> Đoàn sủng và Sứ mệnh</h2>
                </div>
            </div>
        </div>
        
        <div class="container mega-about__mission" data-aos="fade-up">
            <div class="row mega-about__mission--bottom">
                <div class="col-md-6">
                    <div class="mega-about__mission">
                        <div class="mission__title">
                            Đoàn sủng Giáo dục: <br/>
                            Đức ái Tiên liệu
                        </div>
                        <p class="mission__content">
                            Đoàn sủng giáo dục là ân huệ của Chúa Thánh Thần ban tặng cho cha Bosco và ngài đã chuyển trao di sản tinh thần đó cho đại Gia đình Salêdiêng nhằm phục vụ người trẻ.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__mission-img">
                        <img src="/assets/images/img/IMG-10.png" alt="about__mission" />
                    </div>
                </div>
            </div>
            <div class="row mega-about__mission--bottom">
                <div class="col-md-6">
                    <div class="mega-about__mission-img">
                        <img src="/assets/images/img/IMG-11.png" alt="me-mazz-tre" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__mission">
                        <div class="mission__title">
                            Sứ mệnh: <br/>
                            Giáo dục & Truyền giáo
                        </div>
                        <p class="mission__content">
                            Trong Giáo hội, các nữ tu Con Đức Mẹ Phù Hộ dâng hiến chính mình cách triệt để cho Đức Kitô bằng việc sống kinh nghiệm Đức ái tiên liệu như các Đấng Sáng Lập, phục vụ nước trời ngang qua sứ mệnh giáo dục và truyền giáo theo tinh thần Hệ thống Giáo dục Dự phòng.
                            Hội dòng Con Đức Mẹ Phù Hộ ưu ái đối với người trẻ thuộc giới bình dân, đặc biệt các thanh thiếu nữ.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="mega-about__lib" data-aos="fade-up">
                    <img src="/assets/images/img/ducme_hoatrai.png" alt="ducme_hoatrai" />
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Trung thành với khoa sư phạm kế thừa từ Cha Bosco và Mẹ Mazzarello, từ buổi đầu thành lập đến nay, Hội dòng đã được Chúa ban cho nhiều hoa trái thánh thiện thuộc các thành phần và độ tuổi khác nhau.
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <div class="mega-about__lib" data-aos="fade-up">
                        <img src="/assets/images/img/hoatrai_thanhthien.jpg" alt="ducme_hoatrai" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mega-about__description" data-aos="fade-up">
                        Như vậy, hơn 150 năm thành lập, Hội dòng Con Đức Mẹ Phù Hộ có 10.962 nữ tu, 67 Tỉnh dòng, 5 Á Tỉnh, hiện diện trên 98 quốc gia thuộc 5 châu lục (dữ liệu 2022).
                    </p>

                    <a href="https://www.cgfmanet.org/en/fma-institute-world/" class="mega-about__link mb-3" target="_blank"><b>Đường dẫn:</b> https://www.cgfmanet.org/en/fma-institute-world/</a>
                </div>
            </div>
        </div>

        <!-- ================================= TỈNH DÒNG MẸ PHÙ HỘ (VTN) ================================= -->
        <div class="container">
            <div class="row">
                <div class="mega-about__title-wrap" data-aos="fade-up">
                    <h3 class="mega-about__title title--top"> HỘI DÒNG CON ĐỨC MẸ PHÙ HỘ tại Việt Nam</h3>
                    <h3 class="mega-about__subtitle title--bottom"> TỈNH DÒNG MẸ PHÙ HỘ (VTN)</h3>
                </div>
                <p class="mega-about__description" data-aos="fade-up">
                    Nhiệt tình “Xin cho tôi các linh hồn” đã thúc đẩy các nữ tu Con Đức Mẹ Phù Hộ đến trên miền đất Việt năm 1961. Thiên Chúa Quan Phòng đã tỏ lộ uy quyền của Ngài trong những can thiệp lớn nhỏ, để công việc giáo dục và truyền giáo tại đây mang lại nhiều lợi ích cho người trẻ.
                </p>

                <div class="mega-about__title-wrap" data-aos="fade-up">
                    <h2 class="mega-about__title title--bottom"> Mục vụ Giáo dục</h2>
                </div>
                <p class="mega-about__description" data-aos="fade-up">Các hoạt động mục vụ chính của Hội dòng tại Việt Nam:</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mega-about__list" data-aos="fade-up">
                        <ul>
                            <li>Nguyện xá, dạy Giáo lý và đào tạo GLV</li>
                            <li>Trường Mẫu giáo,</li>
                            <li>Trường Phổ Cập cấp 1,2 cho các em có hoàn cảnh khó khăn,</li>
                            <li>Trung tâm Giáo dục Nghề Nghiệp cho người nữ,</li>
                            <li>Trung tâm Tiếng Anh và Âm nhạc,</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__list" data-aos="fade-up">
                        <ul>
                            <li>Lưu xá cho các sinh viên nữ,</li>
                            <li>Mái ấm cho học sinh cấp 1,2,3 có hoàn cảnh khó khăn,</li>
                            <li>Hỗ trợ các học sinh có hoàn cảnh khó khăn</li>
                            <li>Đồng hành với các nhóm trẻ, với các bạn trẻ di dân,</li>
                            <li>Thăng tiến và tìm việc làm cho người nữ</li>
                        </ul>
                    </div>
                </div>
            </div>

            <p class="mega-about__description" data-aos="fade-up">Qua các công cuộc mục vụ - giáo dục, Hội dòng giáo dục và thăng tiến toàn diện người trẻ trở thành Kitô hữu tốt và công dân lương thiện.</p>
        </div>

        <!-- ================================= Mục vụ Truyền giáo trong và ngoài nước ================================= -->
        <div class="row">
            <div class="mega-about__title-wrap">
                <h2 class="mega-about__title title--bottom" data-aos="fade-up"> Mục vụ Truyền giáo</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/truyengiao.JPG" alt="limit-about" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/FMATruyengiao.png" alt="limit-about" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <p class="mega-about__description" data-aos="fade-up">
                    Tính đến tháng 9 năm 2023 Tỉnh dòng FMA Việt Nam có 39 nữ tu FMA Việt Nam truyền giáo muôn dân, trong đó có 37 nữ tu đang phục vụ ở 22 quốc gia thuộc 4 châu lục, 2 nữ tu đang được chuẩn bị tại Roma. 
                </p>

                <p class="mega-about__description" data-aos="fade-up">
                    Trải qua hơn 60 năm hiện diện trên quê hương Việt Nam, Tỉnh dòng FMA Việt Nam có 313 nữ tu thuộc 24 cộng đoàn ở 15 giáo phận. Bên cạnh đó, Chúa cũng ban cho Tỉnh dòng các Tập sinh, Thỉnh sinh, Đệ tử, Tiền đệ tử, Định hướng và nhiều thiếu nữ đang khao khát dâng mình cho Chúa trong ơn gọi Con Đức Mẹ Phù Hộ.
                </p>

                <div class="col-md-12">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/FMA.png" alt="limit-about" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/FMATapsinh.png" alt="limit-about" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/hinhthinhsinh.jpg" alt="limit-about" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mega-about__img">
                        <img src="/assets/images/img/dinhhuong-detu.jpg" alt="limit-about" />
                    </div>
                </div>

                <p class="mega-about__description" data-aos="fade-up">
                    Hướng về tương lai, các nữ tu Con Đức Mẹ Phù Hộ kế thừa đoàn sủng của Cha Thánh Gioan Bosco và Mẹ Thánh Maria Mazzarello cũng như tinh thần vững mạnh của các thế hệ trước, tiếp tục tiến bước với sức năng động của đoàn sủng và niềm hy vọng lớn lao vào Thiên Chúa – Đấng có mặt trong lịch sử.
                </p>

                <p class="mega-about__description description__bottom" data-aos="fade-up">
                    Hội dòng luôn mong ước ngày càng có nhiều bạn trẻ nhận biết và tiếp bước Cha Bosco và Mẹ Mazzarello để cứu rỗi các linh hồn người trẻ.
                </p>
            </div>
        </div>

        <div class="container-fluit">
            <div class="row">
                <div class="mega-about__img">
                    <img src="/assets/images/img/SINHHOATHE.jpg" alt="limit-about" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
