//////////////////////////////////////////////////////
// ハンバーガーメニュー
//////////////////////////////////////////////////////
$(function () {
  $("#open").click(function () {
    $(".drawer").toggleClass("open");
  });
  $(".drawer_menu li").click(function () {
    $(".drawer").toggleClass("open");
    $("input[name='menuopen']")
      .removeAttr("checked")
      .prop("checked", false)
      .change();
  });
  $(".drawer_logo").click(function () {
    $(".drawer").toggleClass("open");
    $("input[name='menuopen']")
      .removeAttr("checked")
      .prop("checked", false)
      .change();
  });
});

//////////////////////////////////////////////////////
// スクロール時
//////////////////////////////////////////////////////

$(document).ready(function () {
  $(window).scroll(function () {
    const scroll = $(window).scrollTop();

    const header = document.querySelector("header");
    if (scroll >= 1) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });
});

//////////////////////////////////////////////////////
// TOP - 無限スライダー表示
//////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', function () {

  const farm_img_slider = new Swiper(".farm_img_slider", {
    loop: true,
    allowTouchMove: true,
    centeredSlides: true,
    slidesPerView: 1,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  const tsukuru_voice_slider = new Swiper(".tsukuru_voice_slider", {
    spaceBetween: 24,
    loop: true,
    allowTouchMove: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    autoplay: {
      delay: 1500,
    },
  });
});

(function() {
  let speed = 5000;
 
  const nextstory_swiper = new Swiper(".infinite_slider", {
    spaceBetween: 60,
    loop: true,
    allowTouchMove: true,
    centeredSlides: true,
    slidesPerView: 1.2,
    spaceBetween: 32,
    autoplay: {
      delay: 0,
      disableOnInteraction: false, 
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      1200: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 2.5,
      },
      768: {
        centeredSlides: true,
        slidesPerView: 2,
        spaceBetween: 24,
      },
      576: {
        centeredSlides: true,
        slidesPerView: 1,
        spaceBetween: 24,
      },
    },
    speed: 10000,
  });
 
  let getTranslate;
 
  document.querySelectorAll('.infinite_slider').forEach(function(e){
 
    e.addEventListener('mouseover', function () {
      getTranslate = nextstory_swiper.getTranslate();
      nextstory_swiper.setTranslate(getTranslate);
      nextstory_swiper.setTransition(0);
    });
 
    e.addEventListener('mouseout', function () {
      getTranslate = nextstory_swiper.getTranslate();
 
      let getSlideWidthMgLeft = document.querySelector('.swiper-slide-active').style.marginLeft;
      if (getSlideWidthMgLeft) {
        getSlideWidthMgLeft = parseFloat(getSlideWidthMgLeft);
      } else {
        getSlideWidthMgLeft = 0;
      }
 
      let getSlideWidthMgRight = document.querySelector('.swiper-slide-active').style.marginRight;
      if (getSlideWidthMgRight) {
        getSlideWidthMgRight = parseFloat(getSlideWidthMgRight);
      } else {
        getSlideWidthMgRight = 0;
      }
 
      let getSlideWidth = document.querySelector('.swiper-slide-active').offsetWidth;
 
      let getTotalSlideWidth = getSlideWidthMgLeft + getSlideWidthMgRight + getSlideWidth;
      let diff = - getTotalSlideWidth - (getTranslate % getTotalSlideWidth);
      let diffTime = diff / -getSlideWidth;
      nextstory_swiper.setTranslate(getTranslate + diff);
      nextstory_swiper.setTransition(speed * diffTime);
    });
  });
})();

//////////////////////////////////////////////////////
// 続きを読むボタン
//////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.read-more-btn').forEach(function(button) {
      button.addEventListener('click', function() {
          const text = this.previousElementSibling;
          text.classList.toggle('expanded');
          this.classList.toggle('expanded');
          this.textContent = text.classList.contains('expanded') ? '閉じる' : '続きを見る';
      });
  });
});

//////////////////////////////////////////////////////
// matchHeight
//////////////////////////////////////////////////////
$(function () {
  $('.event_name').matchHeight();
  $('.myfarmplus_feature_item_inner').matchHeight();
});

//////////////////////////////////////////////////////
// ページトップボタン
//////////////////////////////////////////////////////
$(document).ready(function() {
  $('.pagetop').click(function(event) {
      event.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'slow');
  });
});
