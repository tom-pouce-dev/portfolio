// jQuery(document).ready(function(){});
// $(document).ready(function(){});
$(function(){
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

// slider
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 650,
        navigation: false
      });
    });



// navigation menu

//on click, affiche la barre de navigation
 $('.nav__trigger').on('click', function(e){
      e.preventDefault();
      $(this).parent().toggleClass('nav--active');
    });

    $(".icon-menu").click(function() {
        $("nav ul").slideToggle(650);
    });

    $(window).resize(function(){
        var w = $(window).width();
        if (w > 640){
            $("nav ul").show();
        }
    })
    
    wscreen = $(window).width();
    if (wscreen < 640){
        $("nav").addClass("nogutters");
    }