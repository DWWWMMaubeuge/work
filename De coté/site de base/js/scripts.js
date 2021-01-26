var menu = false;
var menuCliqued = false;
var taille_ecran = $(window).width();
var isTouchEnable = 'ontouchstart' in document.documentElement;
var taille_changement = 960; // Modifier ici la dimension pour le passege du menu mobile au desktop

$(document).ready(function() {
	$('#paquet_telecom_bandeau').prependTo($('#container'));

	if($(window).width()<670 && isMobile.any()){ 
		$('.contact_header a.tel').attr('href',$('.contact_header a.tel').attr('data-phone'));
		$('.info_tel p.telephones a').each(function(){
			$(this).attr('href',$($(this)).attr('data-phone'));
		});
	}
	// Bloquer le lien pour le numero de telephone
	$('.contact_header .tel, .info_tel p.telephones a').click(function(){
		if($(window).width()<670 && isMobile.any()){ 
			return true;
		}else{
			return false;
		}
	});
	if(!isMobile.any() || ($(window).width() > 600 && isMobile.any())){
		$('.adresse_footer').attr('href','plan.php').attr('target','_self');  //Ne pas oublier de changer plan.php si l'url est différente
	}
	
	// SCROLL AUTOMATIQUE EN MOBILE, CONTACT ET PLAN D'ACCES
	if((isMobile.any() &&  $('.index-page').length < 1) || $('.scroll-page').length > 0){
		setTimeout(function(){
			if (taille_ecran < taille_changement) {
				heightNav = $('span.nav').outerHeight();
				$('html, body').animate({scrollTop: $('.colonne_centre').offset().top - heightNav }, 300);
			}else{
				$('html, body').animate({scrollTop: $('.colonne_centre').offset().top }, 300);
			}
		},100);
	}
	
	if(taille_ecran>=480){
		var left = $('form .form_left').outerHeight();
		var right = $('form .form_right').outerHeight();
		if(right > left){
			$('form .form_left').outerHeight(right);
		}else{
			$('form .form_right').outerHeight(left);
		}
	}

	/************************************** Fancybox ***********************/
	$('.fancybox').fancybox();
	$('.lightbox').fancybox();
	$("a#box_ami").fancybox({	maxWidth : 370,	maxHeight : 400,	autoSize : false	});
	$("a#NL_box").fancybox({	maxWidth : 470,	maxHeight : 440,	autoSize : false	});
	$("a.ML_box").fancybox({	maxWidth : 500,	maxHeight : 700,	autoSize : false	});
	$("a.thickbox, a[rel='lightbox']").fancybox();
	$("a[rel='lightbox2']").fancybox({	maxWidth : 470,	maxHeight : 420,	autoSize : false,	arrows: false	});

	$("#input_newsletter").attr('placeholder','Votre adresse mail');
	// Configuration identique des tous les menus avec sous_menus : ul > li.sous_menu > a.main > ul.dropdown
	$('ul li.sous_menu ul').addClass('dropdown');
	$('ul').find('a.selected').parents('li.sous_menu').addClass('selected').find('a:first').addClass('selected');

	// ACTUALITES
	$("#recherche_actu_submit").attr('value','s').addClass('picto');
	$('.bloc_listing_actu a.bouton_actu_detail').removeClass('bouton_actu_detail').wrap('<p class="bouton2">');
	$('.encart_actu a.bouton').removeClass('bouton').wrap('<p class="bouton2">');
	$('#listing_calendrier_2 a.bouton,.encart_actu a.bouton, a.bouton_actu_detail').removeClass('bouton').wrap('<p class="bouton2">');
	$('.cat_actu ul ul').unwrap('<ul>').removeClass().addClass('drodpown_actu').show();
	// LIEN GMAPS SUR IPHONE
	if(isMobile.iOS()){
		$('a.adresse_footer.no_desktop').each(function(){
			$(this).attr('href',$(this).attr('href').replace('maps.google.com','maps.apple.com'));
		});
	}
// FIN NE PAS EFFACER

	var sliderAccueil = $('.bxslider').bxSlider({
		auto: true,
		autoHover: true,
		touchEnabled: false,
		mode:'fade',
		controls: false,
		pager: true,
		nextText: '',
		prevText: ''
	});
	
	$('.competences').owlCarousel({
		itemsCustom : [
			[0, 1],
			[600, 2],
			[960,3],
		],
		autoPlay : true,
		navigation : true,
		stopOnHover : true,
		loop : true,
		touchDrag : false,
		pagination : false
	});

// FOOTER FANCY
	$('#navigation_frame, .black').hide();
	
	$('.navigation').click(function() { 
		$('.black').stop(1,1).fadeIn(1100);
		$('#navigation_frame').stop(1,1).fadeIn(1000);
	});
	
	$('.black').click(function() { 
		$(this).stop(1,1).fadeOut(2000);
		$('#navigation_frame').stop(1,1).fadeOut(1100);
	});
	
	$('.close').click(function() { 
		$('.black').stop(1,1).fadeOut(2000);
		$('#navigation_frame').stop(1,1).fadeOut(1100);
	});
	
	$('.top_bar > ul').addClass('topBar'); 

	// position du menu
	if (taille_ecran < taille_changement) {
		$('.top_bar ul.topBar').prependTo($('nav.menu'));
	}else{
		$('.menu ul.topBar').prependTo($('.top_bar'));
	}

	// open menu
	$('span.nav').click(function(){
		posPage = $(window).scrollTop();
		menu = true;
		$('body').addClass('sitePusher');
	});

	$('nav.menu ul li:last-child').addClass('last_child');
	createDropdown();

	if (taille_ecran > (taille_changement - 1)) {
		$('nav.menu span.derouler').addClass('navdesktop');
	}else{
		$('nav.menu span.derouler').addClass('navmobile');
	}
	$('nav.menu').on('click', '.close_menu', function(){
		$(this).parent().removeClass('pushed');
		$(this).parents().removeClass('openSous');
		$('.menu').removeClass('noOver');
	});

	// close menu
	$('.mask').click(function(){
		if (menu)
		{
			closePanelMenu();
			menu = false;
			$('html, body').animate({scrollTop: posPage }, 300);
		}
	});

	isTabletsAxe();

	$(window).resize(function () {
		taille_ecran = $(window).width();
		isTabletsAxe(); 
		createDropdown();

		if (taille_ecran < taille_changement) {
			if (menu) {
				closePanelMenu();
				menu = false;
			}
			$('.top_bar ul.topBar').prependTo($('nav.menu'));
			$('nav.menu span.derouler').removeClass('navdesktop').addClass('navmobile');
		}else{
			$('.menu ul.topBar').prependTo($('.top_bar'));
			$('nav.menu span.derouler').removeClass('navmobile').addClass('navdesktop');
		}
		$('#navigation_frame, .black').hide();
		$('#navigation_frame, .black').hide();
	});
	
	$('nav.menu').on('click', 'span.derouler.navmobile', function(){
		$(this).parent().find('>.dropdown').addClass('pushed');
		$('.menu').addClass('noOver');
	});
	
	$('nav.menu').on('click', 'span.derouler.navdesktop', function(){
		if($(this).siblings('.dropdown').is(':visible')){
			$(this).parent('li').removeClass('openSous');
		}else{
			$(this).parent('li').addClass('openSous');
		}
	});

});

function closePanelMenu()
{
	$('body').removeClass('sitePusher');
	$('nav.menu').find('.pushed').removeClass('pushed');
}

function isTabletsAxe()
{
	$('body').find('nav.menu ul li.main > a').click(function(e){
		var _this = $(this);
		if (isTouchEnable && taille_ecran > taille_changement)
		{
			if (menuCliqued)
			{
				if (menuCliqued != _this.attr('href'))
				{
					menuCliqued = _this.attr('href');
					return false;
				}
			} else {
				menuCliqued = _this.attr('href');
				return false;
			}
			return true;
		} else if (isTouchEnable && taille_ecran < taille_changement) {
			return true;
		}
	});
}

function createDropdown()
{
	$('nav.menu .dropdown').each(function(){
		var _this = $(this);
		if(_this.siblings('span.derouler').length < 1){
			$(_this).append('<li class="close_menu"></li>').parent('li').addClass('main').append('<span class="derouler"></span>');
		}
	});
}