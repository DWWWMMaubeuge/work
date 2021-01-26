// Gestion de la valeur par défaut des champs
$(document).ready(function() {
	if (jQuery.fn.autocomplete) {
		if ($('select.champ_pays')) {
			$('select.champ_pays').change(function() {
				if ($('input.input_ville') && $('input.input_ville').val() != '') {
					$('input.input_ville').val('').trigger('blur');
				}
				if ($('input.input_code_postal') && $('input.input_code_postal').val() != '') {
					$('input.input_code_postal').val('').trigger('blur');
				}
			});
		}
		// autocomplete pour les villes
		$('.input_ville').autocomplete({
			minLength: 2,
			source: function(request, response) {
				var sPays = '';
				if ($('select.champ_pays') && $('select.champ_pays option:selected').val() != '') {
					sPays = $('select.champ_pays option:selected').val();
				}
				$.ajax({
					url: '/ressources/ajax/formulaire.ajax.php',
					dataType: "json",
					data: {
						term: request.term,
						type: 'ville',
						sPays: sPays,
						sFormsPays:Forms.pays
					},
					success: function(data) {
						response($.map( data, function(item) {
							return {
								label: "(" + item.CodePostal + ", " + item.Pays + ") " + item.NomVille,
								value: item.NomVille,
								CodePostal: item.CodePostal,
								NomPays: item.Pays
							}
						}));
					}
				});
			},
			open: function(event, ui) {
				$(this).addClass('autocompletActif');
			},
			select: function(event, ui) {
				// Si l'élément ville à un attribut data d'un champ code postal
				if ($(this).data('id')) {
					if ($('#' + $(this).data('id'))) {
						$('#' + $(this).data('id')).val(ui.item.CodePostal);
						// Déclenchement de l'événement pour la validation
						$('#' + $(this).data('id')).trigger('blur');
					}					
				} else {
					// Si un élément code postal a un attribut data pour cet élément ville
					if ($('input:text[data-id=' + $(this).attr('id') + ']')) {
						$('input:text[data-id=' + $(this).attr('id') + ']').val(ui.item.CodePostal);
						// Déclenchement de l'événement pour la validation
						$('input:text[data-id=' + $(this).attr('id') + ']').trigger('blur');
					}
				}

				// Test s'il existe une liste déroulante pays
				if ($('select.champ_pays') && $('select.champ_pays option:selected').val() == '') {
					$('select.champ_pays option[value="' + ui.item.NomPays + '"]').attr('selected', 'selected');
					// Déclenchement de l'événement pour la validation
					$('select.champ_pays option[value="' + ui.item.NomPays + '"]').trigger('blur');
				}
				

			},
			close: function(event, ui) {
				// Déclenchement de l'événement pour la validation
				$(this).removeClass('autocompletActif').trigger('blur');
			}
		});	

		// Autocomplete pour le code postal
		 $('.input_code_postal').autocomplete({
			minLength: 2,
			source: function(request, response) {
				var sPays = '';
				if ($('select.champ_pays') && $('select.champ_pays option:selected').val() != '') {
					sPays = $('select.champ_pays option:selected').val();
				}
				$.ajax({
					url: '/ressources/ajax/formulaire.ajax.php',
					dataType: "json",
					data: {
						term: request.term,
						type: 'codePostal',
						sPays: sPays,
						sFormsPays:Forms.pays
					},
					success: function(data) {
						response($.map( data, function(item) {
							return {
								label: item.CodePostal + ' (' + item.NomVille + ', ' + item.Pays + ')',
								value: item.CodePostal,
								NomVille: item.NomVille,
								NomPays: item.Pays
							}
						}));
					}
				});
			},
			open: function(event, ui) {
				$(this).addClass('autocompletActif');
			},		
			select: function(event, ui) {
				// Si l'élément code postal à un attribut data d'un champ ville
				if ($(this).data('id')) {
					if ($('#' + $(this).data('id'))) {
						$('#' + $(this).data('id')).val(ui.item.NomVille);
						// Déclenchement de l'événement pour la validation
						$('#' + $(this).data('id')).trigger('blur');
					}
				} else {
					// Si un élément ville a un attribut data pour cette élément code postal
					if ($('input:text[data-id=' + $(this).attr('id') + ']')) {
						$('input:text[data-id=' + $(this).attr('id') + ']').val(ui.item.NomVille);
						// Déclenchement de l'événement pour la validation
						$('input:text[data-id=' + $(this).attr('id') + ']').trigger('blur');
					}
				}

				// Test s'il existe une liste déroulante pays
				if ($('select.champ_pays') && $('select.champ_pays option:selected').val() == '') {
					$('select.champ_pays option[value="' + ui.item.NomPays + '"]').attr('selected', 'selected');
					// Déclenchement de l'événement pour la validation
					$('select.champ_pays option[value="' + ui.item.NomPays + '"]').trigger('blur');
				}
			},
			close: function(event, ui) {
				// Déclenchement de l'événement pour la validation
				$(this).removeClass('autocompletActif').trigger('blur');
			}
		});
	}
});

// Ajoute un message d'erreur sur un élément
function elementErreur(element, validatorName) {
	// S'il s'agit d'une liste d'éléments
	if (element.length > 1 || (element.attr('name').indexOf('[') != -1 && element.hasClass('imiteLabel') == false) || element.attr('type') == 'radio') {
		// On récupère le conteneur de la liste
		element = element.parent().parent().parent();
		// On déplace le conteneur de l'icône près du premier élément
		element.parent().find('li:first').append(element.parent().find('.validation'));
	}

	// On vérifie que l'élément ne possède pas déjà un message d'erreur
	if (element.parent().find("span.erreur").length == 0) {
		element.addClass('form_erreur');

		// S'il s'agit d'un bloc div (liste d'options), on modifie la classe css
		if (element.parent().attr('class') == 'divGenerateur') {
			element.parent().attr('class', 'divGenerateurErreur');
		} else {
			// Sinon on ajoute la classe d'erreur
			element.parent().addClass('erreur');
		}
	}

	// On ajoute le message d'erreur correspondant
	if (element.parent().find('.erreur').length > 0) {
		element.parent().find('.erreur').text(App.Message[Forms.language][validatorName]);
	} else {
		element.parent().prepend('<span class="erreur" style="display:none;">' + App.Message[Forms.language][validatorName] + '</span>');
	}

	// On affiche le message d'erreur
	element.parent().find('span.erreur').slideDown('normal', function() {
		// On affiche une icône d'erreur
		element.parent().find('.validation').html('<img src="/ressources/img/erreur.png"/>');
	});
}

// Supprime le message d'erreur d'un élément
function elementValide(element, validatorName) {
	// S'il s'agit d'une liste d'éléments
	if (element.length > 1 || (element.attr('name').indexOf('[') != -1 && element.hasClass('imiteLabel') == false) || element.attr('type') == 'radio') {
		// On récupère le conteneur de la liste
		element = element.parent().parent().parent();
		// On déplace le conteneur de l'icône près du premier élément
		element.parent().find('li:first').append(element.parent().find('.validation'));
	}

	// Si l'élément n'avait pas d'erreur
	if (element.parent().find('span.erreur').text() == '') {
		// On affiche une icône de validation
		element.parent().find('.validation').html('<img src="/ressources/img/valide.png"/>');
	} else {
		// On cache le message d'erreur
		element.parent().find('span.erreur').slideUp('normal', function() {
			element.removeClass('form_erreur');

			// S'il s'agit d'un bloc div (liste d'options), on modifie la classe css
			if (element.parent().attr('class') == 'divGenerateurErreur') {
				element.parent().attr('class', 'divGenerateur');
			} else {
				// Sinon on ajoute la classe d'erreur
				element.parent().removeClass('erreur');
			}

			// On supprime le message d'erreur
			$(this).remove();

			// On affiche une icône de validation
			element.parent().find('.validation').html('<img src="/ressources/img/valide.png"/>');
		});
	}
}

// Fonction de validation d'un champ
function validerChamp(element, rules, formValidates, keyup) {
	// Si c'est un champ avec l'autocomplete en cours
	if (element.hasClass('autocompletActif')) {
		return false;
	}

	// Formulaire concerné
	var formName = element.parents('form').attr('id');
	// Nom de l'élément
	var field = element.attr('name').replace(/(.*)\[.*\]$/,"$1");
	// Règles de validation de l'élément
	var ruleset = rules[field];
	// Valeur de l'élément
	var value = element.val();

	// Si l'élément possède plusieurs options (checkbox, radios)
	if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
		// On récupère un tableau avec les valeurs cochées ou sélectionnées
		value = new Array();

		if ($('#' + formName + ' input[name=' + field + '\\[\\]]').length) {
			oCopyElement = $('#' + formName + ' input[name=' + field + '\\[\\]]');
		} else {
			oCopyElement = $('#' + formName + ' input[name=' + field + ']');
		}

		oCopyElement.each(function() {
			if (oCopyElement.is(':checked') || oCopyElement.is(':selected')) {
				value.push(oCopyElement.val());
			}
		});
	}

	// Validation de l'élément
	var elementValidates = true;

	// On boucle sur les validateurs de l'élément
	for (var i in ruleset) {
		// Récupération du nom du validateur
		var validatorName = ruleset[i].name;
		// Nom du dernier validateur
		var LastValidatorName = validatorName;

		// On vérifie que le validateur existe
		if (App.Validator[validatorName] !== undefined) {
			// Test de validation de l'élément si la valeur est différente du label intégré
			if (ruleset[i].parameters.labelIntegre === undefined || value !== ruleset[i].parameters.labelIntegre) {
				var elementValidates = App.Validator[validatorName](value, ruleset[i].parameters, element);
			}

			// L'élément n'est pas valide, on déclare les statuts de validation à false
			if (!elementValidates) {
				formValidates = false;
				elementValidates = false;
				break;
			}
		}
	}

	if (elementValidates) {
		elementValide(element, LastValidatorName);
	} else {
		elementErreur(element, LastValidatorName);

		// Si l'option keyup est active
		if (keyup !== false) {
			element.keyup(function() {
				// On valide le champ lors du keyup
				validerChamp($(this), rules, true, false);
			});
		}
	}

	return formValidates;
}

$(document).ready(function() {
	// On boucle sur les formulaires
	for (var form in Forms) {
		// On prend en compte uniquement les formulaires dans cette boucle
		if (form == 'language' || form == 'pays') {
			continue;
		}

		// Fonction lorsque l'on quitte l'élément
		$('#' + form + ' :input:not(:submit,:file)').each(function() {
			// Règles de validation du formulaire
			var rules = Forms[form];

			$(this).blur(function() {
				validerChamp($(this), rules, true, true);
			});
		});

		// Fonction lorsque l'on change l'élément (checkbox, radio et file)
		$('#' + form + ' input:checkbox, #' + form + ' input:radio, #' + form + ' input:file').each(function() {
			// Règles de validation du formulaire
			var rules = Forms[form];
			
			$(this).change(function() {
				validerChamp($(this), rules, true, false);
			});
		});

		// Gestion des valeurs par défaut
		if (window.FormsLabelsIntegres !== undefined && window.FormsLabelsIntegres[form] !== undefined) {
			for (var key in FormsLabelsIntegres[form]) {
				// Suppression de la valeur lors du focus si elle équivaut la valeur par défaut
				// et que le champ ne possède pas une valeur passée en paramètre 
			    $('#' + key).focus(function() {
			    	var $form = $(this).parents('form').attr('id');
			        if (!$(this).hasClass('noDefaultValue') && $(this).val() == FormsLabelsIntegres[$form][$(this).attr('id')]) {
			            $(this).val('');
			        }
			    });

				// Valeur par défaut si le champ est vide lorsqu'on le quitte
			    $('#' + key).blur(function() {
			        if ($(this).val() == '') {
			        	var $form = $(this).parents('form').attr('id');
			            $(this).val(FormsLabelsIntegres[$form][$(this).attr('id')]);
			        }
			    });
			}
		}
	}
});

// Déclaration des variables
var App = App || { };
var Forms = Forms || { };

// Fonction de validation du formulaire complet ou d'une étape
App.validate = function(form, etape) 
{
	// Nom du formulaire
	var formName = (form.id) ? form.id : 'form';
	// Règles de validation du formulaire
	var rules = Forms[formName];
	// Etat de validation
	var formValidates = true;

 	// Pour chaque éléments du formulaire 
	$('#' + formName + ' :input:not(:submit,:disabled,:hidden)').each(function(i, e) {
		var key = $(e).attr('name');
		var keyReplace = key.replace(/\[/, '\\[').replace(/\]/, '\\]');

		// Si tous les éléments sont vérifiés ou si l'élément en cours est dans l'étape à valider
		if (etape === undefined || etape.find('input[name=' + keyReplace + '], textarea[name=' + keyReplace + ']').length > 0) {
			// Elément du formulaire
			var element = form[key];

			// Si l'élément n'existe pas (cas des checkbox et boutons radios)
			if (element === undefined) {
				var element = form[key + '[]'];
			}

			formValidates = validerChamp($(element), rules, formValidates);
		}
	});

	return formValidates;
}

// Liste des messages d'erreurs associés aux validateurs
App.Message = {};

// Français
App.Message.fr = {
	Zend_Validate_NotEmpty : 'Ce champ est vide : vous devez le compléter.',
	Zend_Validate_Alnum : 'Ce champ ne peut contenir que des lettres et/ou des chiffres.',
	Zend_Validate_Alpha : 'Ce champ ne peut contenir que des lettres.',
	Zend_Validate_Digits : 'Ce champ ne peut contenir que des chiffres.',
	My_Zend_Validate_EmailAddress : 'L\'adresse email n\'est pas valide. Elle doit respecter le format adresse@domaine.com.',
	Zend_Validate_Between : 'La valeur de ce champ doit être comprise entre %min% et %max% inclus.',
	Zend_Validate_File_Size : 'La taille de votre fichier doit être comprise entre %min% et %max% Mo.',
	Zend_Validate_Float : 'Ce champ doit contenir un nombre décimal.',
	Zend_Validate_Int : 'Ce champ doit contenir un nombre entier.',
	Zend_Validate_StringLength : 'Ce champ doit contenir entre %min% et %max% caractères.',
	My_Zend_Validate_Different : 'Vous devez renseigner ce champ.',
	My_Zend_Validate_Telephone : 'Votre numéro de téléphone doit être composé de 9 à 14 chiffres sans espace ni point.',
	My_Zend_Validate_Siret : 'Votre numéro de SIRET n\'est pas valide.',
	My_Zend_Validate_Alpha : 'Ce champ ne peut contenir que des lettres.',
	My_Zend_Validate_Heures : 'Votre horaire est incorrecte.',
	My_Zend_Validate_UrlExterne : 'Le contenu de ce champ ne doit pas contenir de lien HTTP.'
}

// Anglais
App.Message.en = {
	Zend_Validate_NotEmpty : 'This field is empty, you must complete.',
	Zend_Validate_Alnum : 'This field can only contain letters and / or numbers.',
	Zend_Validate_Alpha : 'This field can only contain letters.',
	Zend_Validate_Digits : 'This field can contain only numbers.',
	My_Zend_Validate_EmailAddress : 'The email address is invalid. It should follow the format adresse@domaine.com.',
	Zend_Validate_Between : 'The value of this field must be between %min% and %max% included.',
	Zend_Validate_File_Size : 'The file size must be between %min% and %max% Mo.',
	Zend_Validate_Float : 'This field must contain a decimal number.',
	Zend_Validate_Int : 'This field should contain an integer.',
	Zend_Validate_StringLength : 'This field should be between %min% and %max% characters.',
	My_Zend_Validate_Different : 'You must fill this field.',
	My_Zend_Validate_Telephone : 'Your phone number must be composed of 9 to 14 digits without spaces or dots.',
	My_Zend_Validate_Siret : 'Your SIRET number is invalid.',
	M_Zend_Validate_Alpha : 'This field can only contain letters.',
	My_Zend_Validate_Heures : 'Your schedule is incorrect.',
	My_Zend_Validate_UrlExterne : 'The contents of this field must not contain an HTTP link.'
}

// Espagnol
App.Message.es = {
	Zend_Validate_NotEmpty : 'La información está vacía: Debe completarla.',
	Zend_Validate_Alnum : 'Este campo sólo puede contener letras y / o números de.',
	Zend_Validate_Alpha : 'Este campo sólo puede contener letras.',
	Zend_Validate_Digits : 'Este campo sólo puede contener números.',
	My_Zend_Validate_EmailAddress : 'La dirección de correo electrónico no es válida. Debe seguir el formato adresse@domaine.com.',
	Zend_Validate_Between : 'El valor de este campo debe ser entre %min% y %max%, inclusive.',
	Zend_Validate_File_Size : 'El tamaño de su archivo debe ser entre %min% y %max% Mo.',
	Zend_Validate_Float : 'Este campo debe contener un decimal.',
	Zend_Validate_Int : 'Este campo debe contener un número entero.',
	Zend_Validate_StringLength : 'Este campo debe estar entre %min% y %max% caracteres.',
	My_Zend_Validate_Different : 'Debe rellenar este campo.',
	My_Zend_Validate_Telephone : 'Su número de teléfono debe constar de 9-14 dígitos sin espacios ni puntos.',
	My_Zend_Validate_Siret : 'Su número de registro de la empresa no es válida.',
	My_Zend_Validate_Alpha : 'Este campo sólo puede contener letras.',
	My_Zend_Validate_Heures : 'Su horario es incorrecta.',
	My_Zend_Validate_UrlExterne : 'El contenido de este campo no debe contener un enlace HTTP.'
}
function getHost(url) {
    return url.replace('http://','').replace('https://','').split(/[/?#]/)[0];
}
// Liste des règles de validation
App.Validator = {	
	Zend_Validate_NotEmpty: function(value, parameters)
	{
		if (value != '') {
			return true;
		} else {
			return false;
		}
	},
	Zend_Validate_Alnum: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else if (parameters.allowWhiteSpace) {
			return value.match(/^[a-z0-9\s]*$/i);
		} else {
			return value.match(/^[a-z0-9]*$/i);
		}
	},
	Zend_Validate_Digits: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else if (parameters.allowWhiteSpace) {
			return value.match(/^[0-9\s]*$/i);
		} else {
			return value.match(/^[0-9]*$/i);
		}
	},
	Zend_Validate_Alpha: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else if (parameters.allowWhiteSpace) {
			return value.match(/^[a-z\s]*$/i);
		} else {
			return value.match(/^[a-z]*$/i);
		}
	},
	My_Zend_Validate_EmailAddress: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else {
			return (/^.+\@\S+\.\S+$/.test(value));
		}
	},
	Zend_Validate_Int: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else if (!isNaN(parseInt(value))) {
			return true;
		} else {
			return false;
		}
	},
	Zend_Validate_File_Size: function(value, parameters, element) {
		if (value === '') {
			return true;
		} else if (element.context.files && element.context.files.length > 0){
			// Taille en MB
			filesizeMB = (element.context.files[0].size/1024/1024).toFixed(2);
			if (filesizeMB < parseFloat(parameters.min) || filesizeMB > parseFloat(parameters.max)) {
				App.Message[Forms.language]['Zend_Validate_File_Size'] = App.Message[Forms.language]['Zend_Validate_File_Size'].replace(/%min%/, parseFloat(parameters.min)).replace(/%max%/, (parseFloat(parameters.max)/1000*1024).toFixed(2));
				return false;
			};
			return true;
		} else {
			return true;
		}
	},
	Zend_Validate_Float: function(value, parameters, element)
	{
		Expression = new RegExp(/^[-+]?[0-9]+\.?[0-9]*$/);

		// Remplacement de la virgule par un point
		if (element.val().indexOf(',') >= 0) {
			element.val(element.val().replace(',','.'));
			value = element.val();
		}

		if (value == '') {
			return true;
		} else if (Expression.test(value)) {
			return true;
		} else {
			return false;
		}
	},
	Zend_Validate_Between: function(value, parameters)
	{
		if (value == '' || value >= parameters.min && value <= parameters.max) {
			return true;
		} else {
			// Remplacement des valeurs min et max
			App.Message[Forms.language]['Zend_Validate_Between'] = App.Message[Forms.language]['Zend_Validate_Between'].replace(/%min%/, parameters.min).replace(/%max%/, parameters.max);
			return false;
		}
	},
	Zend_Validate_StringLength: function(value, parameters)
	{
		if (value == '' || (value.length >= parameters.min && value.length <= parameters.max)) {
			return true;
		} else {
			// Remplacement des valeurs min et max
			App.Message[Forms.language]['Zend_Validate_StringLength'] = App.Message[Forms.language]['Zend_Validate_StringLength'].replace(/%min%/, parameters.min).replace(/%max%/, parameters.max);
			return false;
		}
	},
	My_Zend_Validate_Different: function(value, parameters)
	{
		if (value != parameters.label) {
			return true;
		} else {
			return false;
		}
	},
	My_Zend_Validate_Telephone: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else {
			if (value.length >= 9 && value.length <= 16) {
				return (/^[0-9]+$/.test(value));
			} else {
				return false;
			}
		}
	},
	My_Zend_Validate_UrlExterne: function(value, parameters)
	{
		var pattern = /(?:(?:https?):\/\/|www\.)(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[-A-Z0-9+&@#\/%=~_|$?!:,.])*(?:\([-A-Z0-9+&@#\/%=~_|$?!:,.]*\)|[A-Z0-9+&@#\/%=~_|$])/ig;
		var listUrls = value.match(pattern);
		var sNdd = location.host;
		var result = true;
		if (listUrls && listUrls.length > 0) {
			listUrls.forEach(function(url){
				if (getHost(url) != sNdd) {
					result = false;
				}
			});
		}

		return result;
	},
	My_Zend_Validate_Heures: function(value, parameters)
	{
		var pattern = /^([0-9]|0[0-9]|1[0-9]|2[0-3])h[0-5][0-9]$/i;
		if (pattern.test(value)) {
			return true;
		} else {
			return false;
		}
	},
	My_Zend_Validate_Siret: function(value, parameters)
	{
		function isSiren(value) {
			// Cas du numéro SIREN
			var somme = 0;
			// On boucle sur les chiffres
			for (var i=0; i<9; i++) {
				var temp = value.substr(i, 1);

				if (i % 2 == 1) {
					temp *= 2;
					if (temp > 9) {
						temp -= 9;
					}
				}

				// On additionne les chiffres
				somme += parseInt(temp);
			}

			// On retourne le multiple de 10
			return ((somme % 10) == 0);
		}

		function isSiret(value) {
			// Récupération de la partie SIREN
			var siren = value.substr(0, 9);

			// On test d'abord la partie SIREN
			if (!isSiren(siren)) {
				return false;
			}

			// Cas du numéro SIREN
			var somme = 0;
			// On boucle sur les chiffres
			for (var i=0; i<14; i++) {
				var temp = value.substr(i, 1);

				if (i % 2 == 0) {
					temp *= 2;
					if (temp > 9) {
						temp -= 9;
					}
				}

				// On additionne les chiffres
				somme += parseInt(temp);
			}

			// On retourne le multiple de 10
			return ((somme % 10) == 0);
		}

		if (value == '') {
			return true;
		} else {
			if (value.length != 9 && value.length != 14) {
				return false;
			} else {
				if (value.length == 9) {
					return isSiren(value);
				} else {
					return isSiret(value);
				}
			}
		}
	},
	My_Zend_Validate_Alpha: function(value, parameters)
	{
		if (value == '') {
			return true;
		} else {
			var pattern = 'a-zA-ZÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
			if (parameters.allowWhiteSpace) {
				pattern += '\\s';
			}
			if (parameters.allowDash) {
				pattern += '\\-';
			}

			return value.match(new RegExp('^[' + pattern + ']*$', 'i'));
		}
	}
};
