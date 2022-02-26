$(document).ready(function() {
	/*function validar_solonum(){
		var res = "";
		var minimo = 0;
		$("#formulario").find('input[type=number]').each(function(){
			if( !$.isNumeric( $(this).val() ) ){
				minimo += 1;
			}
		});

		if(minimo > 0){
			res = false;
		}
		else{
			res = true;
		}
		return res;
	}*/
	$(function () {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
    	container: 'body'
    });
	//Popover
	$('[data-toggle="popover"]').popover();
	//
});

	function Validar_inputnull(form) {
		var res = "";
		var vacio = 0;
		$("#"+form+"").find('input').each(function(){
			if($(this).val() == ""){
				$(this).addClass("border-perzo");
				vacio += 1;
			}
			else{
				$(this).removeClass("border-perzo");
			}
		});

		if(vacio > 0){
			res = false;
		}
		else{
			res = true;
		}

		return res;	
	}

	/*function Validar_minLengthInput() {
		var resL = "";
		var minimo = 0;
		$("#formulario").find('input').each(function(){
			if($(this).val().length < 5){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgba(249,126,54,0.9)');
				minimo += 1;
			}
			else{
				$(this).removeAttr("style");
			}
		});

		if(minimo > 0){
			resL = false;
		}
		else{
			resL = true;
		}

		return resL;	
	}*/


	function validar_correo(form) {
		var expresiones1,resp;
		var minimo = 0;
		$("#"+form+"").find('input[type=email]').each(function(){

			correo = $(this).val();

			expresiones1 = /^[a-zA-Z]+\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*@(gmail)?(hotmail)?(misena)?(sena)?(edu)?\.(es)?(com)?(co)?(com\.co)?(edu\.co)?/;

			if(!expresiones1.test(correo)||correo.length < 12){
				$(this).addClass("border-perzo");
				minimo += 1;

			}
			else{
				$(this).removeClass("border-perzo");
			}
		})
		if(minimo > 0){
			resp = false;
		}
		else{
			resp = true;
		}

		return resp;
	}

	/*$("#enviar").click(function(){
		var res_inputnull = Validar_inputnull("formulario");

		if(res_inputnull){

			var minLengthInput = Validar_minLengthInput();
			if (minLengthInput) {

				var solonum = validar_solonum();
				if(solonum){

					var correo = validar_correo("formulario");
					if(correo){

						var form = $( "form#formulario" ).serialize();
						$.ajax({
							type:'POST',
							url:'php/registro.php',
							data:form,
							beforeSend: function() {
								$("#msj_log").html("<i class='fa fa-spinner fa-pulse'></i>");
							}
						}).done(function(data){
							$("#msj_log").html("");
							if(data == "exito"){
								$("#formulario").find("input").each(function(){
									$(this).val('');
								});
								$('select').prop('selectedIndex',0);
								alertReg();
							}
							else{
								alertNReg();
							}
						});

					}
					else{
						alertmail();
					}
				}
				else{
					alertSN();
				}
			}
			else{

				alertML();
			}
		}
		else{

			alertCV();
		}
	});*/

	function login(){
		var res_inputnull = Validar_inputnull("form_login");
		
		if(res_inputnull){

			var correo = validar_correo("form_login");
			
			if(correo){

				var form = $("#form_login").serialize();
				$.ajax({
					type:'POST',
					url:'php/login.php',
					data:form,
					beforeSend: function() {
						$("#msj_log").html("<div class='preloader pl-size-xs'><div class='spinner-layer pl-red-grey'><div class='circle-clipper left'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>");
					}
				}).done(function(data){
					$("#msj_log").html("");
					
					if(data == 2){
						var url = "pages_apre/index_apre.php"; 
						$(location).attr('href',url);
					}
					if(data == 1){
						var url = "pages_admin/index_admin.php"; 
						$(location).attr('href',url);
					}
					if(data == 0){
						showNotification("alert-danger","No hay registro de la cuenta","bottom","right","","");
					}
				});
			}
			else{
				showNotification("alert-danger","Correo no valido por favor verificar!","bottom","right","","");
			}
		}else{
			showNotification("alert-danger","Debe llenar todos los campos!","bottom","right","","");
		}
	}

	$("#btn_log").click(function(){
		login();
	});

	// Login con enter
	$("#pass").on("keydown",function(e){
		if (e.which == 13) {
			login();
		}
	});
});

//--- Funcion de notificacion Bootstrap 3.3.6 ---//
function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
	if (colorName === null || colorName === '') { colorName = 'bg-black'; }
	if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
	if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
	if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
	var allowDismiss = true;

	$.notify({
		message: text
	},
	{
		type: colorName,
		allow_dismiss: allowDismiss,
		newest_on_top: true,
		timer: 1000,
		placement: {
			from: placementFrom,
			align: placementAlign
		},
		animate: {
			enter: animateEnter,
			exit: animateExit
		},
		template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
		'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
		'<span data-notify="icon"></span> ' +
		'<span data-notify="title">{1}</span> ' +
		'<span data-notify="message">{2}</span>' +
		'<div class="progress" data-notify="progressbar">' +
		'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
		'</div>' +
		'<a href="{3}" target="{4}" data-notify="url"></a>' +
		'</div>'
	});
}
