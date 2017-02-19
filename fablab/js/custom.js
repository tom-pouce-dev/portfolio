function burger() { //menu + nav toggle
	$(".icon-menu").click(function () {
		if (!$(this).hasClass('colored')) {
			$(this).addClass('colored');
			$("nav ul").slideToggle(750);
		} else {
			$(this).removeClass('colored');
			$("nav ul").slideToggle(750);
		}
	});
}

function ajoutArt() {
    $(".wood article:first-child > div:nth-of-type(2)").addClass('art-left');
    $(".wood article:nth-of-type(2) > div:nth-of-type(2)").addClass('art-mid');
    $(".wood article:last-child > div:nth-of-type(2)").addClass('art-right');
}

function resizeBloc() { //resize bloc article home
	if($("body").hasClass('home')) {
		var lh = $('.art-left').height(),
			mh = $('.art-mid').height(),
			rh = $('.art-right').height(),
			one = $('.what-1').height(),
			two = $('.what-2').height(),
			three = $('.what-3').height(),
			four = $('.what-4').height(),
			wscreen = $(window).width();
        
		if (lh >= mh && lh >= rh) {
			$('.art-mid').height(lh);
			$('.art-right').height(lh);
		} else {
			if (mh >= lh && mh >= rh) {
				$('.art-left').height(mh);
				$('.art-right').height(mh);
			} else {
				$('.art-left').height(rh);
				$('.art-mid').height(rh);
			}
		}
	}
}

function popUp() { //pop up sur les pages articles pour partage
	if(document.getElementById("inline-popups") != null || $('body').hasClass('lightbox')){
		$('#inline-popups').magnificPopup({
			delegate: 'a',
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function() {
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	}
}

function googleMaps() {
	var lat1 = parseInt($('.Lat1').text()),
		lat2 = parseInt($('.Lat2').text()),
		lng1 = parseInt($('.Lng1').text()),
		lng2 = parseInt($('.Lng2').text()),
		
		latlng = new google.maps.LatLng(lat1 + '.' + lat2, + lng1 + '.' + lng2),
	//objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
	//de définir des options d'affichage de notre carte
		options = { center: latlng, zoom: 16, mapTypeId: google.maps.MapTypeId.ROADMAP, draggable: true, scrollwheel: false },
	//constructeur de la carte qui prend en paramêtre le conteneur HTML
	//dans lequel la carte doit s'afficher et les options
		carte = new google.maps.Map(document.getElementById("carte"), options),
	//création du marqueur
		marqueur = new google.maps.Marker({ position: new google.maps.LatLng(lat1 + '.' + lat2, + lng1 + '.' + lng2), map: carte });
}

function mixIt() {
	if($('body').hasClass('gal-cat')) {
		$('#grid').mixItUp({
			animation: {
				duration: 580,
				effects: 'fade translateZ(-1000px) stagger(44ms)',
				easing: 'ease'
			}
		});
	}
}

function checkRobot() { //checkspam
	if($("body").hasClass('contact')) {
		$('<input type="checkbox" name="nobot" required> <label>Je confirme ne pas être un robot</label>').prependTo($('#cap'));
	}
}

function galery() {
	if($("body").hasClass('lightbox') && ($(window).width() > 640)) {
		$i = 5;
		$('#sG_big figure').hide();
		$('#sG_big figure:first-child').show();
		$('li:first-child a').addClass('borderSg');

		$('#sG a').click(function() {
			if ($('#' + this.rel).is(':hidden')) {
				$('#sG_big figure').hide();
				$('#' + this.rel).fadeIn(500);
				$('li a').removeClass('borderSg');
				$(this).addClass('borderSg');
			}
		});
		$('#sG_nav div:nth-of-type(1)').click(function() {
			$('#sG_nav ul li:last-of-type').insertBefore('#sG_nav li:nth-of-type(1)');
		});
		$('#sG_nav div:last-of-type').click(function() {			
			$('#sG_nav ul li:nth-of-type(1)').insertAfter('#sG_nav li:last-of-type');
		});
	}
}

function resizeMain() {
	var h = $('header').outerHeight(),
		f = $('footer').outerHeight();
	$('main').css('min-height', $(window).height() - h - f + 'px');
}

$(function() {
    ajoutArt(); //ajout class sur article home pour resize
	mixIt(); // MixItUp
	if($('body').hasClass('contact')){
		googleMaps(); // Google maps
	}
    burger(); // Toggle du burger en mobile
	resizeBloc(); // Resize bloc article sur la home
	if($('body').hasClass('gal-cat') || $('body').hasClass('partenaires') || $('body').hasClass('mentions') || $('body').hasClass('hubs') || $('body').hasClass('actualites') || $('body').hasClass('activites')) {
		resizeMain(); // Resize min height
	}
	checkRobot(); // Checkbox robot
    popUp(); // popup de partage
	galery(); // Galerie Slider
});

$(window).resize(function () {
	resizeBloc(); // Resize bloc article sur la home
	if($('body').hasClass('gal-cat') || $('body').hasClass('partenaires') || $('body').hasClass('mentions') || $('body').hasClass('hubs') || $('body').hasClass('actualites') || $('body').hasClass('activites')) {
		resizeMain(); // Resize min height
	}
});