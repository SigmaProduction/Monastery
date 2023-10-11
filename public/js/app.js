// ======= Slide Show ========
AOS.init({
    delay: 20, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
});

// ======= Slider Head ========
var swiper = new Swiper(".slide-swiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

// ======= Slider for (Chuyen muc) ========
var swiper = new Swiper(".categories-swiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// ======= Slider for (Thu Vien) ========
var swiper = new Swiper(".gallery-swiper", {
    slidesPerView: "auto",
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
});

// ======= Slider for (Gia Dinh Saledieng) ========
var swiper = new Swiper(".saints-swiper", {
    slidesPerView: 3,
    slidesPerColumnFill: 'row',
    grid: {
      rows: 2,
    },
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});

// ======= Button move to Top ========
var btn = $('#button-top');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
