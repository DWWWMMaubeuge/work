function checkMail(email) {
	var filter=/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(email)) {
		return true;
	} else {
		return false;
	}
}

$(document).ready(function() {
	// Liste des messages d'erreurs en cas d'adresse email non valide
	var messages = {
		'': 'Le format de l\'adresse mail n\'est pas valide',
		'english': 'This is not a valid email address format',
		'espanol': ' El formato de la dirección de correo electrónico no es válido'
	};
	var langue = $('#langue_newsletter').val();
	if (typeof(messages[langue]) == 'undefined') {
		langue = '';
	}

	if ($("#form_newsletter").attr('class') == 'newsletter_input') {
		$('body').prepend('<a id="launch_newsletter" data-fancybox-type="iframe"></a>');

		// NLframeSize : tableau de dimensions optionnel
		if (typeof(NLframeSize) == "undefined") {
			$("a#launch_newsletter").fancybox({autoSize:false, width:560, height:340});
		} else {
			$("a#launch_newsletter").fancybox({								  
				frameWidth : NLframeSize[0],
				frameHeight : NLframeSize[1]
			});
		}

		$('#submit_newsletter').css('display','none');
		$('#js_submit').css('display','block');
	} else {
		$('#submit_newsletter').css('display','block');
	}

	$('#js_submit').click(function () {
		if (!checkMail($('#input_newsletter').val())) {
			$('#mess_newsletter').html(messages[langue]);
		} else {
			var html = $.ajax({
				url: '/ressources/ajax/mailing.ajax.php',
				type: 'POST',
				async: true,
				data: 'email=' + $('#input_newsletter').val() + '&langue=' + $('#langue_newsletter').val(),
				success: function(mess){
					var t_mess = mess.split('|');
					$('#mess_newsletter').html(t_mess[1]);
					if (t_mess[0] == 1) {
						if ($('#form_newsletter').attr('class') == 'newsletter_popup') {
							setTimeout(fermer,4000);
						} else {
							$('a#launch_newsletter').attr('href', '/include/newsletter.inc.php?iframe&langue=' + $('#langue_newsletter').val() + '&email=' + $('#input_newsletter').val());
							$('a#launch_newsletter').trigger('click');
						}
					}
				},
				error: function(r) {
					$('#form_newsletter').submit();
				}
			});
		}
	});
});
