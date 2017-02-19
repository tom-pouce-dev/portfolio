// jQuery(document).ready(function(){});
// $(document).ready(function(){});
$(function () {
    //ici notre jQuery
    //1. cibler un element via un selecteur css
    //2. appeler une methode sur l'element qu'on a ciblé, cette méthode peut par exemple provoquer une animation
    //	$(".icon-menu").css({"background":"red"});

    //appeler un évênement sur un élément ciblé
    //1. cibler un élément via un selecteur css
    //2. appeler un évênement sur cet élément (clic, ...)
    //3. déclencher une fonction au déclanchement de l'évênement
    //4. Dans cette fonction, cibler à nouveau un élément via css
    //5. Appeler une méthode sur cet élément ciblé
    /*	$(".icon-menu").click(function() {
    		$("nav ul").slideToggle(1000);
    	});

    	//remet le ul en display bloc après avoir été mis en display none avec jquery quand on clique sur le burger au format mobile. Le cas de figure n'est pas sensé se produire et la portion de code suivante ne fait qu'alourdir inutilement le code.
    	$(window).resize(function(){
    		var w = $(window).width();
    		if (w > 640){
    			$("nav ul").show();
    		}
    	}); */
}); //fermeture du $(function)

//$(function() {
//    $(".link-adidas").click(function(e) {
//        e.preventDefault(); //so the browser doesn't follow the link
//
//        $("body").load("adidas.php");
//    });
//});

$(function() {
    $(".link-adidas").click(function() {
        //e.preventDefault(); //so the browser doesn't follow the link

        $("body").load("adidas.php");
    });
});

$(function () {
    $('.filter').click(function () {
        // grab data-filter attr and if not * hide all items that do not have that class
        // using slideDown (all) followed by slidUp (selection) - js used for this as it's thoughts to be less work on the browsers that struggle with ispotope 
        // Fade in/out works better with columns as alide or similar created a messy animation
        var filter = this.id;
        console.log(filter);
        if (filter == '*') {
            $('.card').fadeIn(800);
        } else {
            $('.card.' + filter).fadeIn(800);
            $('.card:not(.' + filter + ')').fadeOut(800);
        }
    });
});


// navigation menu
//on click, affiche la barre de navigation
$(function () {
    $('.nav__trigger').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('nav--active');
    });

    $(".icon-menu").click(function () {
        $("nav ul").slideToggle(650);
    });

    $(window).resize(function () {
        var w = $(window).width();
        if (w > 640) {
            $("nav ul").show();
        }
    })

    wscreen = $(window).width();
    if (wscreen < 640) {
        $("nav").addClass("nogutters");
    }

    function checkRobot() { //checkspam
        if ($("form").hasClass('contact')) {
            $('<input type="checkbox" name="nobot" required> <label>Je confirme ne pas être un robot</label>').prependTo($('#cap'));
        }
    }
});

//slider
$(function () {
    $('#slides').slidesjs({
        width: 940,
        height: 667,
        navigation: false
    });
});

$(function () {
    $('#slides2').slidesjs({
        width: 940,
        height: 667,
        navigation: false
    });
});

$(function () {
    $('#slides3').slidesjs({
        width: 940,
        height: 667,
        navigation: false
    });
});

$(function () {
    $('#slides4').slidesjs({
        width: 940,
        height: 667,
        navigation: false
    });
});
