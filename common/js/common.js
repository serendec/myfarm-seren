// JavaScript Document

/*-------------------------------------------------------------------------------------

      固定ヘッダー分高さ

-------------------------------------------------------------------------------------*/

(function($){
$(window).resize(function(){
  var w = $(window).width();
  hsize = $('header').height();
  $(".header-space").css("height", hsize + "px");
  $(".side-linetit-cover").css("margin-top", "-" + hsize + "px");
  $(".side-linetit-cover").css("padding-top", hsize + "px");
});
})(jQuery);



/*-------------------------------------------------------------------------------------

      スクロール時

-------------------------------------------------------------------------------------*/

$(window).scroll(function(){
  if ($(window).scrollTop() > 100) {
    $('header').addClass('scroll__action');
	$('.sp-nav').addClass('scroll__action');

	var w = $(window).width();
	hsize = $('header').height();
	$(".header-space").css("height", hsize + "px");
  } else {
    $('header').removeClass('scroll__action');
	$('.sp-nav').removeClass('scroll__action');

	var w = $(window).width();
	hsize = $('header').height();
	$(".header-space").css("height", hsize + "px");
  }
});




/*-------------------------------------------------------------------------------------

      PAGETOPに戻る

-------------------------------------------------------------------------------------*/


var windowWidth = $(window).width();
var windowSm = 640;
if (windowWidth <= windowSm) {
    //横幅640px以下のとき（つまりスマホ時）に行う処理を書く
	$(document).ready(function(){
    $("#topBtn").hide();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $("#topBtn").fadeIn("fast");
        } else {
            $("#topBtn").fadeOut("fast");
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) { //ドキュメントの高さと現在地の差がfooterの高さ以下になったら
            $("#topBtn").css({
                "position":"absolute", //pisitionをabsolute（親：wrapperからの絶対値）に変更
                "bottom": footHeight - 25 //下からfooterの高さ + 20px上げた位置に配置
            });
        } else { //それ以外の場合は
            $("#topBtn").css({
                "position":"fixed", //固定表示
                "bottom": "20px" //下から20px上げた位置に
            });
        }
    });
    $('#topBtn').click(function () {
        $('body,html').animate({
        scrollTop: 0
        }, 400);
        return false;
    });
});
} else {
    //横幅640px超のとき（タブレット、PC）に行う処理を書く
	$(document).ready(function(){
    $("#topBtn").hide();
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $("#topBtn").fadeIn("fast");
        } else {
            $("#topBtn").fadeOut("fast");
        }
        scrollHeight = $(document).height(); //ドキュメントの高さ
        scrollPosition = $(window).height() + $(window).scrollTop(); //現在地
        footHeight = $("footer").innerHeight(); //footerの高さ（＝止めたい位置）
        if ( scrollHeight - scrollPosition  <= footHeight ) { //ドキュメントの高さと現在地の差がfooterの高さ以下になったら
            $("#topBtn").css({
                "position":"absolute", //pisitionをabsolute（親：wrapperからの絶対値）に変更
                "bottom": footHeight - 30 //下からfooterの高さ + 20px上げた位置に配置
            });
        } else { //それ以外の場合は
            $("#topBtn").css({
                "position":"fixed", //固定表示
                "bottom": "20px" //下から20px上げた位置に
            });
        }
    });
    $('#topBtn').click(function () {
        $('body,html').animate({
        scrollTop: 0
        }, 400);
        return false;
    });
});
}

/*-------------------------------------------------------------------------------------

      スマホのみ電話をかける

-------------------------------------------------------------------------------------*/

if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
  $(function() {
    $('.tel').each(function() {
      var str = $(this).html();
      if ($(this).children().is('img')) {
        $(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
      } else {
        $(this).html($('<a>').attr('href', 'tel:' + $(this).text().replace(/-/g, '')).append(str + '</a>'));
      }
    });
  });
}

/*-------------------------------------------------------------------------------------

      ハンバーガーメニュー設置

-------------------------------------------------------------------------------------*/

$(document).ready(function() {
  $(".drawer").drawer();
});

/*-------------------------------------------------------------------------------------

      ページ内スムーズスクロール

-------------------------------------------------------------------------------------*/

$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});

/*-------------------------------------------------------------------------------------

      tr列リンクせてい

-------------------------------------------------------------------------------------*/

jQuery( function($) {
      $('tbody tr[data-href]').addClass('clickable').click( function() {
        window.location = $(this).attr('data-href');
      }).find('a').hover( function() {
        $(this).parents('tr').unbind('click');
      }, function() {
        $(this).parents('tr').click( function() {
          window.location = $(this).attr('data-href');
        });
      });
    });


/*-------------------------------------------------------------------------------------

      メニュー

-------------------------------------------------------------------------------------*/
$('.myfarmer_menu-button').on('click', function(){
  $(this).toggleClass('is-close');
  $('.myfarmer_menu-content').toggleClass('is-open');
});

$('.myfarmer_menu-content__bg').on('click', function(){
  $('.myfarmer_menu-button').toggleClass('is-close');
  $('.myfarmer_menu-content').toggleClass('is-open');
});

$('.drawer-toggle').on('touchend', function(){
  // $('.drawer-hamburger-icon').toggleClass('is-close');
});

$(document).on('touchend', '.drawer-overlay', function(){
  // $('.drawer-hamburger-icon').removeClass('is-close');
});

$(".myfarmer_event__area-search select").change(function(){
  $('#search_category').val(0);
  $("#myfarmer_event__sort").submit();
});

$(".myfarmer_event__category-search select").change(function(){
  $('#search_area').val(0);
  $("#myfarmer_event__sort").submit();
});

