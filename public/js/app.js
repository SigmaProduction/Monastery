// ======= Slide Show ========
AOS.init({
  delay: 20, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
});

// ======= Slider Head ========
var swiper = new Swiper(".slide-swiper", {
  speed: 1000,
  effect: 'fade',
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
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});

// ======= Slider for (Thu Vien) ========
var swiper = new Swiper(".gallery-swiper", {
  slidesPerView: "auto",
  spaceBetween: 30,
  speed: 1000,
  effect: 'fade',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});

// ======= Slider for (Gia Dinh Saledieng) ========
var swiper = new Swiper(".saints-swiper", {
  slidesPerView: 3,
  slidesPerColumnFill: 'row',
  grid: {
    rows: 2,
    fill: 'row',
  },
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
        grid: {
          rows: 2,
          fill: 'row',
        }
    },
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
  $('html, body').scrollTop(300);
});

// ======= Change Data Saledieng ========
function changeImg(src, text1, text2, id) {
  $('#thanh').removeAttr("style");
  $('#thanh').css('background-image', 'url(' + src + ')');
  $('#thanh-date').html(text1);
  $('#thanh-title').html(text2);
  $("#link-thanh").attr("href", "/saledieng/" + id);
};
