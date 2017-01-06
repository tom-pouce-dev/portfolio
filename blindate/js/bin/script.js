function createFormulaire() {
   var question = ['Si j\'étais un objet...', 'Si j\'étais une boisson...', 'Si j\'étais un instrument...', 'Si j\'étais une couleur...', 'Si j\'étais un plat...'],
      reponse_Q0 = ['Un ordinateur', 'Un smartphone', 'Une télécommande', 'Une manette de jeux vidéo', 'Une montre'],
      reponse_Q1 = ['De l\’eau', 'Du soda', 'Du vin', 'Du café', 'De la bière'],
      reponse_Q2 = ['La flûte', 'Le violon', 'La trompette', 'La guitare', 'La batterie'],
      reponse_Q3 = ['Blanche', 'Noir', 'Bleu', 'Rouge', 'Vert'],
      reponse_Q4 = ['Steack frite', 'Spaghetti bolognaise', 'Magret de canard et pomme de terre', 'Ratatouille', 'Cassoulet'];

   for (var i = 0, j = question.length; i < j; i++) {
      var list = document.createElement('li'),
         list_n1 = document.querySelector('.slides').appendChild(list),
         formulaire = document.createElement('form'),
         legende = document.createElement('legend'),
         nbrQuestion = document.createElement('span');

      list_n1.appendChild(formulaire);
      formulaire.appendChild(legende);
      legende.appendChild(nbrQuestion);
      nbrQuestion.appendChild(document.createTextNode((i + 1) + '/' + question.length));
      legende.appendChild(document.createTextNode(question[i]));

      for (var k = 0; k < question.length; k++) {
         var paragraphe = document.createElement('p'),
            input = document.createElement('input'),
            label = document.createElement('label'),
            cible = ['a', 'b', 'c', 'd', 'e'];

         formulaire.appendChild(paragraphe);
         paragraphe.appendChild(input);
         paragraphe.appendChild(label);

         input.name = 'g' + [i + 1];
         input.type = 'checkbox';
         input.id = [i + 1] + cible[k];
         label.setAttribute('for', String([i + 1] + cible[k]));
         var reponse = String('reponse_Q' + i),
            var_reponse = eval(reponse);
         label.appendChild(document.createTextNode(var_reponse[k]));
      }
   }

   // récupération input checked

   var suivant = document.querySelector('.next'),
      precedent = document.querySelector('.prev'),
      finished = document.querySelector('.finished'),
      last = document.querySelector('.finished'),
      num_next = document.querySelector('.next'),
      num_prev = document.querySelector('.prev'),
      data_num_next = num_next.getAttribute('data-num'),
      data_num_prev = num_prev.getAttribute('data-num');

   precedent.addEventListener('click', function (e) {
      if (data_num_prev > 1) {
         data_num_prev--;
         data_num_next++;
         num_prev.setAttribute('data-num', data_num_prev);
         num_next.setAttribute('data-num', data_num_next);
         $('.slider').slider('prev');
         if (data_num_next == 2) {
            $('.finished').addClass('hide');
            $('.next').removeClass('hide');
         }
      } else if (data_num_prev == 1) {
         data_num_prev--;
         num_prev.setAttribute('data-num', data_num_prev);
         data_num_next++;
         num_next.setAttribute('data-num', data_num_next);
         $('.slider').slider('prev');
         $('.prev').addClass('hide');
      } else {
         e.prevent_default();
      }
   })

   suivant.addEventListener('click', function (e) {
      var list_active = $('li.active input:checkbox').is(':checked');

      if (!list_active) {
         Materialize.toast('Merci de choisir une réponse', 4000)
      } else {
         if (data_num_next > 1) {
            data_num_next--;
            data_num_prev++;
            num_next.setAttribute('data-num', data_num_next);
            num_prev.setAttribute('data-num', data_num_prev);
            $('.slider').slider('next');
            $('.prev').removeClass('hide');
            if (data_num_prev == 4) {
               $('.next').addClass('hide');
               $('.finished').removeClass('hide');
            }
         } else if (data_num_next == 1) {
            data_num_prev++;
            num_prev.setAttribute('data-num', data_num_prev);
            $('.slider').slider('next');
            $('.next').addClass('hide');
            $('.finished').removeClass('hide');
         } else {
            e.prevent_default();
         }
      }
   })

   var resultat = [];

   finished.addEventListener('click', function (e) {
      var list_active = $('li.active input:checkbox').is(':checked'),
         valeur_checked = document.querySelectorAll('input:checked');;

      if (!list_active) {
         e.preventDefault();
      } else {
         for (var i = 0, j = question.length; i < j; i++) {
            resultat.push(valeur_checked.item(i).id);
         }

         resultat.unshift('6');

         $('.slider').fadeOut(1000, function () {

            var delete_formulaire = document.querySelector('.slider'),
               formulaire_parent = delete_formulaire.parentNode;

            formulaire_parent.setAttribute('class', 'col s12 offset-l1 l10 portrait');
            formulaire_parent.removeChild(delete_formulaire);

            for (var x = 0, y = resultat.length; x < y; x++) {
               var bloc_div = document.createElement('div'),
                  bloc_img = document.createElement('img'),
                  portrait = document.querySelector('.portrait');

               portrait.appendChild(bloc_div);
               bloc_div.appendChild(bloc_img);
               bloc_div.setAttribute('class', 'col s6 m4 l4');
               bloc_img.src = 'img/' + resultat[x] + '.jpg';
               bloc_img.alt = 'Blindate challenge Happn - image de profil ' + (x + 1);
               bloc_img.setAttribute('class', 'add-padding-bot materialboxed');
               bloc_img.setAttribute('width', '650px');

               $('.materialboxed').materialbox(); // Zoom img
            }

            var portrait = document.querySelector('.portrait'),
               paragraphe = document.createElement('p'),
               shareFB = document.createElement('a'),
               downloadApp = document.createElement('a');

            portrait.appendChild(paragraphe);
            paragraphe.appendChild(document.createTextNode('Maintenant, montre qui tu es et télécharge l’application.'));
            paragraphe.setAttribute('class', 'center-align');
            portrait.appendChild(shareFB);
            shareFB.href = '#null';
            shareFB.appendChild(document.createTextNode('Partage sur Facebook'));
            shareFB.setAttribute('class', 'shareFB waves-effect col offset-s2 s8 offset-m4 m4 center btn');
            shareFB.setAttribute('onclick', 'javascript:open_infos();');
            // shareFB.setAttribute('target', '_blank');
            portrait.appendChild(downloadApp);
            downloadApp.href = 'https://app.adjust.com/w5o49c_leh8v4_7cwskv?fallback=http%3A%2F%2Fwww.happn.com%3F&campaign=equipe127';
            downloadApp.appendChild(document.createTextNode('Télécharge Happn'));
            downloadApp.setAttribute('class', 'modal-trigger waves-effect col offset-s2 s8 offset-m4 m4 center btn');
            downloadApp.setAttribute('target', '_blank');
         });
      }
   })
}

function scrollColorHeader() {
   $(window).scroll(function () {
      $('#navigation').css('background', 'rgba(25, 137, 177, 0.9)');
      $('#navigation').css('border-bottom', 'none');
      if ($(window).scrollTop() == 0) {
         $('#navigation').css('background', 'rgba(0, 0, 0, 0)');
         $('#navigation').css('border-bottom', 'solid 1px white');
      }
   })
}

function activateSlider() {
   $('.slider').slider({
      full_width: true
   });

   $('.slider').slider('pause');
}

function activateScrollFire() {
   var options = [
      {
         selector: '.spy-1',
         offset: 200,
         callback: 'Materialize.showStaggeredList(".spy-1")'
      },
      {
         selector: '.spy-2',
         offset: 250,
         callback: 'Materialize.showStaggeredList(".spy-2")'
      },
      {
         selector: '.spy-3',
         offset: 300,
         callback: 'Materialize.showStaggeredList(".spy-3")'
      }
  ];
   Materialize.scrollFire(options);
}

function socialHover() {
   var socialIcon = document.querySelector('.social-link');
   socialIcon.addEventListener('mouseover', function (e) {
      e.target.src = 'lol';
   })
}

function soundOnOff() {
   $('.sound').click(function () {
      if ($(this).hasClass('active')) {
         $(this).removeClass('active');
         $(this).css('background', 'url("data/sound-on.png") center center / cover');
         $('.video_desktop').prop('muted', false);
      } else {
         $(this).css('background', 'url("data/sound-off.png") center center / cover');
         $(this).addClass('active');
         $('.video_desktop').prop('muted', true);
      }
   })
}

/*function playOff() {
   $('.play').click(function () {
      if ($(this).hasClass('active')) {
         $(this).removeClass('active');
         $(this).css('background', 'url("data/pause.png") center center / cover');
         document.querySelector('.video_desktop').play();
         $('.mentions-sante').css('visibility', 'visible');
      } else {
         $(this).css('background', 'url("data/play.png") center center / cover');
         $(this).addClass('active');
         document.querySelector('.video_desktop').pause();
         $('.mentions-sante').css('visibility', 'hidden');
      }
   })
}*/

function open_infos() {
   window.open('https://www.facebook.com/sharer/sharer.php?u=http%3A//blindate.fr/', 'facebook', 'menubar=no, scrollbars=no, top=100, left=100, width=550, height=200');
}

$(function () {

   $('.shareFB').click(open_infos);

   if (document.querySelector('.video_desktop').play()) {
      $('.mentions-sante').css('visibility', 'hidden');
   } else {
      $('.mentions-sante').css('visibility', 'visible');
   }

   if ($(window).width() < 1200) {
      var selecteur_video = document.querySelector('.video_desktop'),
         parent = selecteur_video.parentNode;

      parent.removeChild(selecteur_video);
   }

   $('.modal-trigger').leanModal();
   $('.parallax').parallax(); // Parallax
   $('.scrollspy').scrollSpy(); // ScrollSpy (scroll fluide)

   // Lancement des fonctions
   soundOnOff();
   // playOff();
   activateScrollFire(); // Initialisation scrollFire
   createFormulaire(); // Initialisation du questionnaire
   activateSlider(); // Initialisation slider du questionnaire
   scrollColorHeader(); // Couleur BG navbar au scroll

   // checkbox test // a améliorer
   $("input:checkbox").click(function () {
      var $box = $(this);

      if ($box.is(":checked")) {
         var group = "input:checkbox[name='" + $box.attr("name") + "']";

         $(group).prop("checked", false);
         $box.prop("checked", true);
      } else {
         $box.prop("checked", false);
      }
   })

});