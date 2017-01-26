$(document).ready(function(){
    $(".cannavo-logo").click(function(){
        $(".cannavo-content").toggle();
    });
});



//    
//   $(document).ready(function(){
//	   $(window).bind('scroll', function() {
//	   var navHeight = $( window ).height() * 0.3;
//			 if ($(window).scrollTop() > navHeight) {
//				 $(".cannavo-p").addClass('fix');
//			 }
//			 else {
//				 $(".cannavo-p").removeClass('fix');
//			 }
//		});
//	});    

//$(window).scroll(function(){
//   if ($(window).scrollTop() >= 300) {  // change target to number
//      $("#test").addClass('fix');
//   } else {
//				 $("#test").removeClass('fix');
//			 }
//});
    
//    $(document).ready(function(){
//  var $heightImg = $('.cannavo-p').innerHeight(),
//    $textImg = $('#test').innerHeight(),
//    $windowHeight = $(window).innerHeight();
//
//  $('.cannavo-p').css('top', $textImg);
//
//  var eTop = $("#test").offset().top;
//  $(document).scrollTop(eTop);
//  
//  var eHeight = $("#test").height(),
//      eBottom = eTop + eHeight - $(window).height();
//
//  $(document).on("scroll", function (e) {
//    var windowScrollTop = $(window).scrollTop();
//    if (windowScrollTop < eTop) {
//      $(document).scrollTop(eTop);
//    } else if (windowScrollTop > eBottom && $(window).bind('scroll')) {
//      $(document).scrollTop(eBottom);
//      $(window).on('scroll', function() {
//        var $currentTopPosition = $('.cannavo-p').css('top');
//        $('.cannavo-p').css('top', parseInt($currentTopPosition) - 10 + 'px');
//      });
//    }
//  });
//});


$(document).ready(function(){
    var eTop = $("#test").offset().top;
    $(document).scrollTop(eTop);
    var eHeight = $("#test").height();
    var eBottom = eTop + eHeight - $(window).height();
    $(document).on("scroll", function(e){
        var windowScrollTop = $(window).scrollTop();
        if(windowScrollTop < eTop){
            console.log("not allowed");
            $(document).scrollTop(eTop);
        }
        else if(windowScrollTop > eBottom){
            $(document).scrollTop(eBottom);
            $(".cannavo-content").addClass('fix');
        }
        else{
            console.log("allowed");
            $(".cannavo-content").removeClass('fix');
        }
    });
});

//var header = $(".cannavo-p");
//  $(window).scroll(function() {    
//    var scroll = $(window).scrollTop();
//       if (scroll >= window.innerHeight) {
//          header.addClass("fix");
//        } else {
//          header.removeClass("fix");
//        }
//});

//var header = $("#guide-template");
//  $(window).scroll(function() {    
//    var scroll = $(window).scrollTop();
//       if (scroll >= window.innerHeight) {
//          header.addClass("fixed");
//        } else {
//          header.removeClass("fixed");
//        }
//});


//   $(document).ready(function(){
//	   $(window).bind('scroll', function() {
//	   var navHeight = $( window ).height() - 70;
//			 if ($(window).scrollTop() > navHeight) {
//				 $('nav').addClass('fixed');
//			 }
//			 else {
//				 $('nav').removeClass('fixed');
//			 }
//		});
//	});

