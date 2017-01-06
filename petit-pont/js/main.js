//function scrollColorHeader() {
//   $(window).scroll(function () {
//      $('#navigation').css('background', 'rgba(25, 137, 177, 0.9)');
//      $('#navigation').css('border-bottom', 'none');
//      if ($(window).scrollTop() == 0) {
//         $('#navigation').css('background', 'rgba(0, 0, 0, 0)');
//         $('#navigation').css('border-bottom', 'solid 1px white');
//      }
//   })
//}

$(window).scroll(function () {

    h = parseInt($('#header').css('height')) + 1;

    if ($(window).scrollTop() < h) {
        $('#sticky').css('margin-top', '-' + $(window).scrollTop() + 'px');
    } else {
        $('#sticky').css('margin-top', '-' + h + 'px');
    }

});

	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top-70 }, speed ); // Go
			return false;
		});
	});


    $(document).ready(function() {
     
      $("#slider-items").owlCarousel({
     
          Navigation : true, // Show next and prev buttons
//          slideSpeed : 300,
//          paginationSpeed : 400,
          singleItem:true,
          items : 1, 
          autoPlay: 3000, //Set AutoPlay to 3 second
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });


