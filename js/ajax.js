$(document).ready(function(){

	console.log("Holaa");


	$("#cancelar").click(function(){
		$("#form-semi")[0].reset();
		$("#form-semi").find('input.valor').each(function(){
			$(this).removeAttr("style");
		});
		$("#form-semi").find('select').each(function(){
			$(this).removeAttr("style");
		});		
	});

	$("#cancelar2").click(function(){
		$("#form_respC")[0].reset();
		$("#form_respC").find('input').each(function(){
			$(this).removeAttr("style");
		});
		$("#form_respC").find('textarea').each(function(){
			$(this).removeAttr("style");
		});		
	});

	$("#reg_save").click(function(){

		console.log("Holaa");

		alert_ready("Registro Exitoso!");

		var form = $("#form-semi").serialize();
		var txt = Validar_inputTxt("form-semi");
		var num = Validar_inputNum("form-semi");
		var select = valselect("form-semi");
		var fecha = Validar_inputDate("form-semi");
		var mail = valcorreo("form-semi");
		var check = Validar_inputCheck("form-semi");
		var confirpass = valpass();

		console.log(form);
		
		if(txt && num && select){
			if(fecha){
				if(mail){
					if(check){
						if(confirpass){
							$.ajax({
								type:"POST",
								url:"php/save_aprendiz.php",
								data:form,
								dataType:"HTML",
								beforeSend:function(){
                                    alertify.notify('Cargando...', 'warning', 0, function(){});
                                    $("#reg_save").attr("disabled","disabled");
								}
							}).done(function(data){
							    $("#reg_save").removeAttr("disabled");
							    alertify.dismissAll();
								if (data == "Correcto") {
									$("#form-semi")[0].reset();
									alert_ready("Registro Exitoso!");
									$("#mreg_sidica").modal("hide");
								}
								if (data == "Error Aprendiz" ) {
									alert_universal("Usuario ya registrado");
								}
							});
						}else{
							alert_universal("Validar las contraseñas");
						}
					}else{
						alert_universal("Debe seleccionar por lo menos un horario!");
					}
				}else{
					alert_universal("Verificar correo!");
				}
			}else{
				alert_universal("Debe Llenar todos los campos!");
			}
		}else{
			alert_universal("Debe Llenar todos los campos!");
		}
	});

	function Validar_inputTxt(form) {
		var res = "";
		var vacio = 0;
		$("#"+form).find('input[type=text]').each(function(){
			if($(this).val() == ""){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio += 1;
			}
			else{
				$(this).removeAttr("style");
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

	function Validar_inputTexta(form) {
		var res = "";
		var vacio = 0;
		$("#"+form).find('textarea').each(function(){
			if($(this).val() == ""){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio += 1;
			}
			else{
				$(this).removeAttr("style");
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

	function Validar_inputRadio(form) {
		var res = "";
		var cant = 0;
		var vacio = 0;
		$("#"+form).find('.radios').each(function(){
			cant++;
		});

		$("#"+form).find('input[type=radio]:checked').each(function(){
			vacio++;
		});

		if(cant != vacio){
			res = false;
		}
		else{
			res = true;
		}

		return res; 
	}

	function Validar_length(form) {
		var res = "";
		var vacio = 0;
		var vacio2 = 0;
		var prueba = [];
		$("#"+form).find('textarea').each(function(){
			if($(this).val().length < 5){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio += 1;
				prueba.push($(this).val().length);
			}
			else{
				$(this).removeAttr("style");
			}
		});

		$("#"+form).find('input[type=text]').each(function(){
			if($(this).val().length < 5){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio2 += 1;
				prueba.push($(this).val().length);	
			}
			else{
				$(this).removeAttr("style");
			}
		});

		if(vacio > 0 || vacio2 > 0){
			res = false;
		}
		if(vacio == 0 && vacio2 == 0){
			res = true;
		}
		
		return res; 
	}

	function Validar_inputNum(form) {
		var res = "";
		var vacio = 0;
		$("#"+form).find('input[type=number]').each(function(){
			if($(this).val() == ""){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio += 1;
			}
			else{
				$(this).removeAttr("style");
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

	function Validar_inputDate(form) {
		var res = "";
		var vacio = 0;
		$("#"+form).find('input[type=date]').each(function(){
			if($(this).val() == ""){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				vacio += 1;
			}
			else{
				$(this).removeAttr("style");
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

	function Validar_inputCheck(form){
		var resp = "";
		var cr=0;

		$("#"+form).find('input[type=checkbox]:checked').each(function() {
			cr++;
		})
		if(cr > 0){
			resp = true;
		}else{
			resp = false;
		}
		return resp;
	}

	function valselect(form){
		var canp=0,canr=0,resp="";
		$("#"+form).find('select').each(function(index, el) {
			canp++;
			if($(this).val() != 0){
				canr++;
			}
			if(canp == canr){
				$(this).removeAttr("style");
				resp = true;
			}else{
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				resp = false;
			}
		});
		
		return resp;
	}

	function valcorreo(form) {
		var expresiones1,resp;
		var minimo = 0;
		$("#"+form).find('input[type=email]:visible').each(function(){

			correo = $(this).val();

			expresiones1 = /^[a-zA-Z]+\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*\.*-*_*\w*@(yahoo)?(outlook)?(gmail)?(hotmail)?(misena)?(sena)?\.(es)?(com)?(co)?(org)?(com\.co)?(edu\.co)?/;

			if(!expresiones1.test(correo)){
				$(this).css('border-style','solid');
				$(this).css('border-color','rgb(231, 108, 83)');
				minimo += 1;

			}
			else{
				$(this).removeAttr("style");
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

	function valpass (){
		var contra1,contra2,res="";
		contra1 = $("#pass").val();
		contra2 = $("#confir_pass").val();
		if(contra1 == contra2 ){
			res = true;
			$("#pass").removeAttr("style");
			$("#confir_pass").removeAttr("style");
			
		}else{
			$("#pass").css('border-style','solid');
			$("#pass").css('border-color','rgb(231, 108, 83)');

			$("#confir_pass").css('border-style','solid');
			$("#confir_pass").css('border-color','rgb(231, 108, 83)');

			res = false;
		}

		return res;
	}

	function alert_universal(text){
		alertify.error(text);
	}

	function alert_ready(text){
		alertify.set('notifier','position', 'bot-right');
		alertify.notify(text, 'success', 2);
	}

	//Comentarios
	$("#btn_com").click(function(){
		var form = $("#comentario-form").serialize();

		var valtext = Validar_inputTxt("comentario-form");
		var valtexta = Validar_inputTexta("comentario-form");
		var valmail = valcorreo("comentario-form");
		var vallength = Validar_length("comentario-form");

		if(valtext && valtexta){
			if(valmail){
				if(vallength){
					$.ajax({
						url: 'php/save_comem.php',
						type: 'POST',
						dataType: 'html',
						data: form,
					}).done(function(data) {
						if(data == "bien"){
							$("#comentario-form")[0].reset();
							updateDiv();
							alert_ready("Comentario Enviado");
						}else{
							alert_universal("No se pudo enviar comentario por favor intentalo mas tarde");
						}
					});
				}else{
					alert_universal("Minimo 4 caracteres en cada campo");
				}
			}else{
				alert_universal("Email incorrecto: Ej. example@misena.edu.co");
			}
		}else{
			alert_universal("Debe llenar todos los campos");
		}
	});

	function updateDiv(){
		var id_noti = $("#id_noti").val();
		
		$.ajax({
			type:'POST',
			url:"php/contenido_comen.php",
			data:{id_noti:id_noti},
			dataType:'HTML',
		}).done(function(data){
			$('#caja_comentarios').html(data);
			respuestasComentarios();
		});
	}

	/*setInterval(updateDiv, 8000);*/
	// Respuestas de comentarios 
	function respuestasComentarios(){
		$("#caja_comentarios").find('a.respuesta').each(function(){
			$(this).click(function(){
				var id_com = $(this).data('id_com');
				$('#modal_resp').modal('show');
				$("#btn_respC").unbind("click");
				$("#btn_respC").click(function(){
					var form = $("#form_respC").serialize();

					var valtext = Validar_inputTxt("form_respC");
					var valtexta = Validar_inputTexta("form_respC");
					var valmail = valcorreo("form_respC");
					var vallength = Validar_length("form_respC");

					if(valtext && valtexta){
						if(valmail){
							if(vallength){
								$.ajax({
									url: 'php/save_rcomem.php',
									type: 'POST',
									dataType: 'html',
									data: form+"&id_com="+id_com,
								}).done(function(data) {
									if(data == "bien"){
										$("#form_respC")[0].reset();
										$('#modal_resp').modal('hide');
										updateDiv();
										alert_ready("Respuesta Enviada");
									}else{
										alert_universal("No se pudo enviar respuesta por favor intentalo mas tarde");
									}
								});
							}else{
								alert_universal("Minimo 4 caracteres en cada campo");
							}
						}else{
							alert_universal("Email incorrecto: Ej. example@misena.edu.co");
						}
					}else{
						alert_universal("Debe llenar todos los campos");
					}
				});
			});
		});
	}
	respuestasComentarios();

	$("#more").click(function(){
		$(".more").hide(400);
		$("#noticias_noti2").show(400);
		$("#noticias_noti2").removeClass("d-none");
		$("#noticias_noti2").css({"display":"flex"});
		$(".less").show(400);
		$(".less").removeClass("d-none");
	});

	$("#less").click(function(){
		$("#noticias_noti2").hide(400);
		$(".less").hide(400);
		$(".more").show(400);
	});

	$("#btnIdeas").click(function(){
		$("#modalVerificacion").modal("show");
	});

	$("#reg_idea").click(function(){
		var form = $("#formIdeas").serialize();

		var valtext = Validar_inputTxt("formIdeas");
		var valtexta = Validar_inputTexta("formIdeas");
		var valmail = valcorreo("formIdeas");
		var vallength = Validar_length("formIdeas");
		var valradio = Validar_inputRadio("formIdeas");
		var valnum = Validar_inputNum("formIdeas");
		if ( valtext ) {
			if ( valtexta ) {
				if ( valmail ) {
					if ( vallength ) {
						if ( valradio ) {
							if ( valnum ) {
								$.ajax({
									type : 'POST',
									url : 'php/saveideascolombo.php',
									data : form,
									dataType : 'json',
									beforeSend : function(){
										$("#reg_idea").attr("disabled",true);
										alertify.warning('Cargando <i class="mdi mdi-18px mdi-spin mdi-loading"></i>', 0);
									}
								}).done(function( data ){
									alertify.dismissAll();
									$("#reg_idea").removeAttr("disabled",false);
									if ( data['exito'] ) {
										alert_ready( data['msj'] );
										$("#modalVerificacion").modal("hide");
										$("#formIdeas")[0].reset();
									} else {
										$("#modalVerificacion").modal("hide");
										alert_universal( data['msj'] );
									}
								});
							} else {
								alert_universal("Debe llenar todos los campos");
							}
						} else {
							alert_universal("Debe llenar todos los campos");
						}
					} else {
						alert_universal("Debe llenar todos los campos");
					}
				} else {
					alert_universal("Debe llenar todos los campos");
				}
			} else {
				alert_universal("Debe llenar todos los campos");
			}
		} else {
			alert_universal("Debe llenar todos los campos");
		}
	});

	$("#sonido").click(function(){
		if( $("#videoIdea").data("tipo") == "off" ){
			$("#videoIdea").data("tipo","on");
			$("#sonido").empty();
			$("#sonido").html("<i class=\"lni-volume-mute\"></i>");
			$("#videoIdea").prop('muted', false);
			console.log("entro 1")
		} else {
			$("#videoIdea").data("tipo","off");
			$("#sonido").empty();
			$("#sonido").html("<i class=\"lni-volume-high\"></i>");
			$("#videoIdea").prop('muted', true);
			console.log("entro 1")
		}
	});

	$("#cerrarVideo").click(function(){
		$("#videoIndex").trigger('pause');
		$("#ideasColombo").modal("hide");
	});

	$("#Material-image-carousel").owlCarousel({
		navigation: true,
		pagination: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items: 1,
		autoPlay: 3000,
		stopOnHover: true,
	});
	$('#Material-image-carousel').find('.owl-prev').html('<i class="mdi mdi-arrow-left"></i>');
	$('#Material-image-carousel').find('.owl-next').html('<i class="mdi mdi-arrow-right"></i>');
});