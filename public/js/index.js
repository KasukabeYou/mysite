var scSize = 20;
// クリック移動
$(function(){
    // #で始まるリンクをクリックしたら実行されます
    $('a[href^="#"]').click(function() {
        // スクロールの速度
        var speed = 400; // ミリ秒で記述
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - scSize;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });
});

// スクロール制御
var _window = $(window),
    _header = $('.contents'),
    heroBottom;
 
_window.on('scroll',function(){
    heroBottom = $('.boxA').height();
    if(_window.scrollTop() > heroBottom){
        _header.addClass('transform');   
    }
    else{
        _header.removeClass('transform');   
    }
});
 
_window.trigger('scroll');
// $(function(){
//   // #で始まるa要素をクリックした場合に処理
//   $('a[href^=#]').click(function(){
//     // 移動先を0px調整する。0を30にすると30px下にずらすことができる。
//     var adjust = 0;
//     // スクロールの速度（ミリ秒）
//     var speed = 400;
//     // アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
//     var href= $(this).attr("href");
//     // 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
//     var target = $(href == "#" || href == "" ? 'html' : href);
//     // 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
//     var position = target.offset().top + adjust;
//     // スムーススクロール linear（等速） or swing（変速）
//     $('body,html').animate({scrollTop:position}, speed, 'swing');
//     return false;
//   });
// });


// function initMap(lat, lon) {
//     console.log("緯度"+lat);
//   var opts = {
//     zoom: 15,
//     center: new google.maps.LatLng(lat, lon)
//   };
//   var map = new google.maps.Map(document.getElementById("map"), opts);
// }