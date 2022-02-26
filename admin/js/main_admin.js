$(document).ready(function(){
	var notification;
	var grafica = null;
	function Validar_inputTarea(form) {
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
	function delete_noticia($id_noti){
		$.ajax({
			type:'POST',
			url:'../php/eliminar_noticia.php',
			data:{id_noti:$id_noti},
			dataType:'HTML',
		}).done(function(data){
			if(data == "borrado"){
				swal("Eliminado!", "La noticia ha sido eliminada.", "success");
				
			}else{
				swal(data);
			}
		});
	}

	function delete_portafolio($id_porta){
		$.ajax({
			type:'POST',
			url:'../php/eliminar_portafolio.php',
			data:{id_porta:$id_porta},
			dataType:'HTML',
		}).done(function(data){
			if(data == "borrado"){
				swal("Eliminado!", "El portafolio ha sido eliminada.", "success");
			}else{
				swal(data);
			}
		});
	}

	function showConfirmMessage_2($id_porta) {
		swal({
			title: "¿Estás seguro?",
			text: "¡No podrás recuperar este portafolio!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si, Eliminar!",
			cancelButtonText: "No, Cancelar",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				delete_portafolio($id_porta);
				setInterval(function(){
					location.reload();
				}, 2500);
			} else {
				swal("Cancelado", "El portafolio no se elimino :)", "error");
			}
		});
	}

	function showConfirmMessage($id_noti) {
		swal({
			title: "¿Estás seguro?",
			text: "¡No podrás recuperar esta noticia!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si, Eliminar!",
			cancelButtonText: "No, Cancelar",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				delete_noticia($id_noti);
				setInterval(function(){
					location.reload();
				}, 2500);
			} else {
				swal("Cancelado", "La noticia no se elimino :)", "error");
			}
		});
	}

	$(function () {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
    	container: 'body'
    });
	//Popover
	$('[data-toggle="popover"]').popover();
});
	//-- Paneles --//
	// BOTON DETALLES QUE MUESTRA EL CONTENT DE DETALLES
	$("#detalle_apre").click(function(){
		$.ajax({
			url:'seccion_detalles.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#detalle").html(data);
			$("#inicio").hide(400);
			$("#estadistica").hide(400);
			$("#noticias").hide(400);
			$("#exportacion").hide(400);
			$("#content_porta").hide(400);
			$("#videos").hide(400);
			$("#reporte").hide(400);
			$(".caja").hide(400);
			$("#detalle").show(400,function(){
				var tabla = $('#example').DataTable({
					"select": true,
					"bDeferRender": true,			
					"sPaginationType": "full_numbers",
					"ajax": {
						"url": "../php/traer_datos.php",
						"type": "POST",
					},					
					"columns": [
					{ "data": "#" },
					{ "data": "Nombre Completo" },
					{ "data": "Programa De Formación" },
					{ "data": "Ficha De Formación" },
					{ "data": "Linea De Investigación" },
					{ "data": "Detalles"}
					],
					"oLanguage": {
						"sProcessing":     "Procesando...",
						"sLengthMenu": 'Mostrar <select>'+
						'<option value="10">10</option>'+
						'<option value="20">20</option>'+
						'<option value="30">30</option>'+
						'<option value="40">40</option>'+
						'<option value="50">50</option>'+
						'<option value="-1">All</option>'+
						'</select> registros',    
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Filtrar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Por favor espere - cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				});
				tabla.on('draw',function ( e, settings, details ){
					$(function () {
   						//Tooltip
   						$('[data-toggle="tooltip"]').tooltip({
   							container: 'body'
   						});
						//Popover
						$('[data-toggle="popover"]').popover();
					});
					$("#example").find("button.detall").each(function(){
						$(this).unbind( "click" );
						$(this).click(function(){
							var id = $(this).data('ids');
							$.ajax({
								type:'POST',
								url:'seccion_detalle_indiv.php',
								data:{id_apre:id},
								dataType:'HTML'
							}).done(function(data){
								$("#detalle_indiv").html(data);
								$("#tb_apre").hide(400,function(){
									$("#detalle_indiv").show(400);
									$("#detalle_indiv").find("button.volver").each(function(){
										$(this).click(function(){
											$("#detalle_indiv").hide(400,function(){
												$("#tb_apre").show(400);
											});
										});
									});
								});
							});
						})
					});
				});
			});
		});
	});

	// BOTON DETALLES QUE MUESTRA EL CONTENT DE IDEAS COLOMBO
	$("#ideasColombo").click(function(){
		$.ajax({
			url:'seccion_ideasC.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#content_ideas").html(data);
			$(".caja").hide(400);
			
			$("#content_ideas").show(400,function(){
				var tabla = $('#example_ideas').DataTable({
					"select": true,
					"bDeferRender": true,			
					"sPaginationType": "full_numbers",
					"ajax": {
						"url": "../php/traer_ideasC.php",
						"type": "POST",
						"dataSrc": function (json) { 
							let celdas = json.data;
							if ( celdas.length > 0 ) {
								$("#descarga").show();
								$("#msj").hide(400,function(){
									$("#msj").empty();
									$("#tb_ideas").show(400);
								});
								return json.data;
							}else{
								$("#descarga").hide();
								$("#tb_ideas").hide(400,function(){
									$("#msj").html("<h2>No hay resultados almacenados!</h2>");
									$("#msj").show(400);
								});
							} 
						}
					},					
					"columns": [
					{ "data": "Título Propuesta" },
					{ "data": "Instructor" },
					{ "data": "Aprendices" },
					{ "data": "Ficha" },
					{ "data": "Programa Formación" },
					{ "data": "Correo" },
					{ "data": "Teléfono" },
					{ "data": "Propuesta" }
					],
					"oLanguage": {
						"sProcessing":     "Procesando...",
						"sLengthMenu": 'Mostrar <select>'+
						'<option value="10">10</option>'+
						'<option value="20">20</option>'+
						'<option value="30">30</option>'+
						'<option value="40">40</option>'+
						'<option value="50">50</option>'+
						'<option value="-1">All</option>'+
						'</select> registros',    
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Filtrar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Por favor espere - cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				});
				tabla.on('draw',function ( e, settings, details ){
					$(function () {
   						//Tooltip
   						$('[data-toggle="tooltip"]').tooltip({
   							container: 'body'
   						});
						//Popover
						$('[data-toggle="popover"]').popover();
					});
				});
			});
		});
	});
	// BOTON ESTADISTICAS QUE MUESTRA EL CONTENT DE ESTADISTICAS
	$("#estadis_li").click(function(){
		$.ajax({
			url:'historico/linea_investigacion.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#estadistica").html(data);
			$("#inicio").hide(400);
			$("#reporte").hide(400);
			$("#noticias").hide(400);
			$("#exportacion").hide(400);
			$("#content_porta").hide(400);
			$("#videos").hide(400);
			$("#detalle").hide(400);
			$(".caja").hide(400);
			$("#estadistica").show(400,function(){
				$("#generar").click(function(){
					$.ajax({
						type : 'POST',
						url:'historico_graf/linea_investigacion_graf.php',
						data : { anio : $("#fecha").val() },	
						dataType:'json',
					}).done(function(data){
						var t_labels = data[1];
						var n_li = data[2];
						var Bac1 = data[3][0];
						var Boc1 = data[3][1];

						var datos = {
							labels:t_labels,
							datasets:[{
								label:"Cantidad de Respuestas",
								data:n_li,
								backgroundColor:Bac1,
								borderColor:Boc1,
								borderWidth:1
							}]
						};

						var opciones = {
							title: {
								display: true,
								text: 'Linea De Investigación',
								fontFamily: 'Arial',
								fontStyle: 'italic',
								fontSize: 14
							},
							scales:{
								yAxes:[{
									ticks:{"beginAtZero":true}
								}]
							},
							legend: {
								display: true,
								position: 'top',
								fontSize:14,
								fillStyle: '#D9B0B0'
							},
							plugins: {
								labels: [
								{
									render: 'percentage',
									precision: 0,
									fontSize: 12,
									fontColor: '#000',
									fontStyle: 'normal',
									fontFamily: "'Arial'",
									textShadow: true,
									shadowBlur :  10 ,
									position: 'outside',
									overlap: true,
									showActualPercentages: true,
									outsidePadding: 4,
									textMargin: 4
								},
								{
									render: 'value',
									precision: 0,
									fontSize: 12,
									fontColor: '#F8F9F9',
									fontStyle: 'normal',
									fontFamily: "'Arial'",
									textShadow: true,
									shadowColor: '#000',
									shadowBlur :  10 ,
									position: 'border',
									overlap: true,
									showActualPercentages: true,
									outsidePadding: 4,
									textMargin: 4
								}
								]
							}
						};

						if(grafica == null) {
							grafica = new Chart(document.getElementById('dos'),{
								type:"pie",
								data: datos,
								options: opciones
							});

						} else {
							grafica.data = datos;
							grafica.options = opciones;

							grafica.update();
						}

						$("#dos_vista").show(400,function(){
							$('html,body').animate({
								scrollTop: $("#graf_gener").offset().top
							}, 500);
						});
					});
				});
			});
		});
	});
	// BOTON NOTICIAS QUE MUESTRA EL CONTENT DE NOTICIAS
	$("#admin_notic").click(function(){
		$.ajax({
			url:'noticias.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#noticias").html(data);
			$("#inicio").hide(400);
			$("#detalle").hide(400);
			$("#exportacion").hide(400);
			$("#videos").hide(400);
			$("#content_porta").hide(400);
			$("#estadistica").hide(400);
			$("#reporte").hide(400);
			$(".caja").hide(400);
			$("#noticias").show(400,function(){
				var tabla = $('#example_noti').DataTable({
					"select": true,
					"bDeferRender": true,			
					"sPaginationType": "full_numbers",
					"ajax": {
						"url": "../php/datos_noticia.php",
						"type": "POST",
					},					
					"columns": [
					{ "data": "#" },
					{ "data": "Titulo de noticia" },
					{ "data": "Fecha" },
					{ "data": "Opciones" }
					],
					"oLanguage": {
						"sProcessing":     "Procesando...",
						"sLengthMenu": 'Mostrar <select>'+
						'<option value="10">10</option>'+
						'<option value="20">20</option>'+
						'<option value="30">30</option>'+
						'<option value="40">40</option>'+
						'<option value="50">50</option>'+
						'<option value="-1">All</option>'+
						'</select> registros',    
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Filtrar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Por favor espere - cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				});
				tabla.on('draw',function ( e, settings, details ){
					$(function () {
   						//Tooltip
   						$('[data-toggle="tooltip"]').tooltip({
   							container: 'body'
   						});
						//Popover
						$('[data-toggle="popover"]').popover();
					});
					//FUNCIONES PARA LA ADD DE LAS NOTICIAS
					$("#add").click(function(){
						$("#modal_add").modal("show");
						$("#btn_add").unbind('click');
						$("#btn_add").click(function(){

							//queremos que esta variable sea global
							var fileExtension = "";
    						//función que observa los cambios del campo file y obtiene información
    						$("#noti_corta_add").find(':file').change(function(){ 
     						//obtenemos un array con los datos del archivo
     						var file = $("#img_noti-corta_add")[0].files[0];
     						//obtenemos el nombre del archivo
     						var fileName = file.name;
     						//obtenemos la extensión del archivo
     						fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
     						//obtenemos el tamaño del archivo
     						var fileSize = file.size;
     						//obtenemos el tipo de archivo image/png ejemplo
     						var fileType = file.type;
     					});

    						//queremos que esta variable sea global
    						var fileExtension2 = "";
    						//función que observa los cambios del campo file y obtiene información
    						$("#noti_gene_add").find(':file').change(function(){ 
     						//obtenemos un array con los datos del archivo
     						var file2 = $("#img_noti-gener_add")[0].files[0];
     						//obtenemos el nombre del archivo
     						var fileName2 = file2.name;
     						//obtenemos la extensión del archivo
     						fileExtension2 = fileName2.substring(fileName2.lastIndexOf('.') + 1);
     						//obtenemos el tamaño del archivo
     						var fileSize2 = file2.size;
     						//obtenemos el tipo de archivo image/png ejemplo
     						var fileType2 = file2.type;
     					});
    						var formData = new FormData($("#form_addNoticia")[0]);
    						var val_txt = Validar_inputTarea("form_addNoticia");
    						var val_textarea = Validar_inputTxt("form_addNoticia");
    						if(val_txt){
    							if(val_textarea){
    								$.ajax({
    									type:'POST',
    									url:'../php/agregar_noti.php',
    									data: formData,
    									cache: false,
    									contentType: false,
    									processData: false,
    									dataType:'HTML',
    									beforeSend: function() {
    										notification = alertify.notify('Cargando<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>', 'custom', 0);
    									}
    								}).done(function(data){
    									notification.dismiss();
    									$("#form_addNoticia")[0].reset();
    									tabla.ajax.reload();
    									$('#modal_add').modal('hide');
    									showNotification("alert-success",data,"bottom","right","","");
    									update_noticia();
    								});
    							}else{
    								showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    							}
    						}else{
    							showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    						}
    					});
					});
					//FUNCIONES PARA LA ACTUALIZACION DE LAS NOTICIAS
					update_noticia();
					function update_noticia(){
						$("#example_noti").find("button").each(function(){
							$(this).unbind( "click" );
							$(this).click(function(){
								var tipo = $(this).data('tipo');
								var id_noti = $(this).data('id_noti');
								$.ajax({
									url: '../php/consulta_dnoticia.php',
									type: 'POST',
									data: {id_noti:id_noti},
									dataType: 'JSON',
								}).done(function(data) {
									if(tipo == "update"){
										$("#titulo_noti-corta").val(data[0]['titulo_nc']);
										$("#fecha_noti-corta").val(data[0]['fecha_nc']);
										$("#img_previ").removeAttr('src');
										$("#img_previ").attr('src', '../../img/blog/'+data[0]['nameimg_nc']);

										$("#titulo_noti-gener").val(data[1]['titulo_ng']);
										$("#fecha_noti-gener").val(data[1]['fecha_ng']);
										$("#img_previ2").removeAttr('src');
										$("#img_previ2").attr('src', '../../img/blog/'+data[1]['nameimg_ng']);
										$("#descrip_noti-gener").val(data[1]['descripcion_ng']);

										$("#btn_save").removeAttr('data-id_noti');
										$("#btn_save").attr('data-id_noti', data[0]['id_noti']);

										$("#modal_actu").modal("show");
										$("#btn_save").unbind('click');
										$("#btn_save").click(function(){

										//queremos que esta variable sea global
										var fileExtension = "";
    									//función que observa los cambios del campo file y obtiene información
    									$("#noti_corta").find(':file').change(function(){ 
     										//obtenemos un array con los datos del archivo
     										var file = $("#img_noti-corta")[0].files[0];
     										//obtenemos el nombre del archivo
     										var fileName = file.name;
     										//obtenemos la extensión del archivo
     										fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
     										//obtenemos el tamaño del archivo
     										var fileSize = file.size;
     										//obtenemos el tipo de archivo image/png ejemplo
     										var fileType = file.type;
     									});

    									//queremos que esta variable sea global
    									var fileExtension2 = "";
    									//función que observa los cambios del campo file y obtiene información
    									$("#noti_gene").find(':file').change(function(){ 
     										//obtenemos un array con los datos del archivo
     										var file2 = $("#img_noti-gener")[0].files[0];
     										//obtenemos el nombre del archivo
     										var fileName2 = file2.name;
     										//obtenemos la extensión del archivo
     										fileExtension2 = fileName2.substring(fileName2.lastIndexOf('.') + 1);
     										//obtenemos el tamaño del archivo
     										var fileSize2 = file2.size;
     										//obtenemos el tipo de archivo image/png ejemplo
     										var fileType2 = file2.type;
     									});
    									var id_noti2 = $(this).data("id_noti");
    									var formData = new FormData($("#form_noticia")[0]);
    									formData.append('id_noti',id_noti2);

    									var val_txt = Validar_inputTarea("form_noticia");
    									var val_textarea = Validar_inputTxt("form_noticia");
    									if(val_txt){
    										if(val_textarea){
    											$.ajax({
    												type:'POST',
    												url:'../php/actualizar_noti.php',
    												data: formData,
    												cache: false,
    												contentType: false,
    												processData: false,
    												dataType:'HTML',
    												beforeSend: function() {
    													notification = alertify.notify('Cargando<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>', 'custom', 0);
    												}
    											}).done(function(data){
    												notification.dismiss();
    												$("#form_noticia")[0].reset();
    												tabla.ajax.reload();
    												$('#modal_actu').modal('hide');
    												showNotification("alert-success",data,"bottom","right","","");
    											});
    										}else{
    											showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    										}
    									}else{
    										showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    									}
    								});
									}else{
										showConfirmMessage(id_noti);
									}
								});
							});
});
}
});
});
});
});
	// BOTON REPORTES QUE MUESTRA EL CONTENT DE REPORTES
	$("#reporte_li").click(function(){
		$.ajax({
			url:'reporte/reporte.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#reporte").html(data);
			$("#inicio").hide(400);
			$("#estadistica").hide(400);
			$("#noticias").hide(400);
			$("#exportacion").hide(400);
			$("#content_porta").hide(400);
			$("#videos").hide(400);
			$("#detalle").hide(400);
			$(".caja").hide(400);
			$("#reporte").show(400,function(){
				$("#btn2").click(function(){
					$idli = $("#li1").val();
					if($idli != 0){
						$.ajax({
							type:'POST',
							url:'reporte/reporte_tabla.php',
							data:{idli:$idli},
							beforeSend:function(){
								$("#uno").find("input[type=button]").each(function(){
									$(this).prop('disabled',true);
								});
							}
						}).done(function(data){
							$("#uno").find("input[type=button]").each(function(){
								$(this).prop('disabled',false);
							});
							$("#tabla_reporte").html(data);
							$(function () {
   								//Tooltip
   								$('[data-toggle="tooltip"]').tooltip({
   									container: 'body'
   								});
								//Popover
								$('[data-toggle="popover"]').popover();
							});
							$("#content_tb").show(400);
						});
					}else{
						showNotification("alert-danger","Debe seleccionar una linea por favor","bottom","right","","");
					}
				});
			});
		});
	});
	// BOTON ADMIN QUE MUESTRA EL CONTENT DE VIDEOS
	$("#admin_video").click(function(){
		$.ajax({
			url:'videos.php',
			dataType:'HTML',
			beforeSend: function () {
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#videos").html(data);
			$("#inicio").hide(400);
			$("#estadistica").hide(400);
			$("#noticias").hide(400);
			$("#exportacion").hide(400);
			$("#content_porta").hide(400);
			$("#reporte").hide(400);
			$("#detalle").hide(400);
			$(".caja").hide(400);
			$("#videos").show(400,function(){
				$("#btn_actu_video").click(function(){
					var resp_txt = Validar_inputTxt("formulario_videos");
					if(resp_txt){
						var form = $("#formulario_videos").serialize();
						$.ajax({
							type:'POST',
							url:'../php/actualizar_video.php',
							data:form,
							dataType:'HTML',
							beforeSend: function(){
								notification = alertify.notify('Cargando<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>', 'custom', 0);
							}
						}).done(function(data){
							notification.dismiss();
							showNotification("alert-success",data,"bottom","right","","");
						});
					}else{
						showNotification("alert-danger","Debe llenar todos los campos!","bottom","right","","");
					}
				});
			});
		});
	});
	// BOTON ADMIN QUE MUESTRA EL CONTENT DEL PORTAFOLIO 
	$("#admin_porta").click(function(){
		$.ajax({
			url:'portafolio.php',
			dataType:'HTML',
			beforeSend: function (){
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();
			$("#content_porta").html(data);
			$("#inicio").hide(400);
			$("#detalle").hide(400);
			$("#videos").hide(400);
			$("#exportacion").hide(400);
			$("#noticias").hide(400);
			$("#estadistica").hide(400);
			$("#reporte").hide(400);
			$(".caja").hide(400);
			$("#content_porta").show(400,function(){
				var tabla_porta = $('#example_porta').DataTable({
					"select": true,
					"bDeferRender": true,			
					"sPaginationType": "full_numbers",
					"ajax": {
						"url": "../php/datos_portafolio.php",
						"type": "POST",
					},					
					"columns": [
					{ "data": "#" },
					{ "data": "Nombre de la imagen" },
					{ "data": "Tipo de imagen" },
					{ "data": "Opciones" }
					],
					"oLanguage": {
						"sProcessing":     "Procesando...",
						"sLengthMenu": 'Mostrar <select>'+
						'<option value="10">10</option>'+
						'<option value="20">20</option>'+
						'<option value="30">30</option>'+
						'<option value="40">40</option>'+
						'<option value="50">50</option>'+
						'<option value="-1">All</option>'+
						'</select> registros',    
						"sZeroRecords":    "No se encontraron resultados",
						"sEmptyTable":     "Ningún dato disponible en esta tabla",
						"sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
						"sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
						"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix":    "",
						"sSearch":         "Filtrar:",
						"sUrl":            "",
						"sInfoThousands":  ",",
						"sLoadingRecords": "Por favor espere - cargando...",
						"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
						},
						"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						}
					}
				});
				tabla_porta.on('draw',function ( e, settings, details ){
					$(function () {
   						//Tooltip
   						$('[data-toggle="tooltip"]').tooltip({
   							container: 'body'
   						});
						//Popover
						$('[data-toggle="popover"]').popover();
					});
					//FUNCIONES PARA LA ADD DE PORTAFOLIO
					$("#add_porta").click(function(){
						$("#modal_add_porta").modal("show");
						$("#btn_addd").unbind('click');
						$("#btn_addd").click(function(){

							//queremos que esta variable sea global
							var fileExtension_porta = "";
    						//función que observa los cambios del campo file y obtiene información
    						$("#porta_img").find(':file').change(function(){ 
     						//obtenemos un array con los datos del archivo
     						var file = $("#img_porta_add")[0].files[0];
     						//obtenemos el nombre del archivo
     						var fileName = file.name;
     						//obtenemos la extensión del archivo
     						fileExtension_porta = fileName.substring(fileName.lastIndexOf('.') + 1);
     						//obtenemos el tamaño del archivo
     						var fileSize = file.size;
     						//obtenemos el tipo de archivo image/png ejemplo
     						var fileType = file.type;
     					});

    						var formData = new FormData($("#form_addPortafolio")[0]);
    						
    						var val_txt = $("#tipo_porta").val();
    						
    						if(val_txt != 0 || val_txt != "0"){
    							$.ajax({
    								type:'POST',
    								url:'../php/agregar_porta.php',
    								data: formData,
    								cache: false,
    								contentType: false,
    								processData: false,
    								dataType:'HTML',
    								beforeSend: function() {
    									notification = alertify.notify('Cargando<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>', 'custom', 0);
    								}
    							}).done(function(data){
    								notification.dismiss();
    								$("#form_addPortafolio")[0].reset();
    								tabla_porta.ajax.reload();
    								$('#modal_add_porta').modal('hide');
    								showNotification("alert-success",data,"bottom","right","","");
    								update_portafolio();
    							});
    						}else{
    							showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    						}
    					});
					});
					//FUNCIONES PARA LA ACTUALIZACION DE PORTAFOLIOS
					update_portafolio();
					function update_portafolio(){
						$("#example_porta").find("button").each(function(){
							$(this).unbind( "click" );
							$(this).click(function(){
								var tipo = $(this).data('tipo');
								var id_porta = $(this).data('id_porta');
								$.ajax({
									url: '../php/consulta_dportafolio.php',
									type: 'POST',
									data: {id_porta:id_porta},
									dataType: 'JSON',
								}).done(function(data) {
									if(tipo == "update"){
										$("#tipo_portaUpdate").val(data[0]['tipo']);										

										$("#img_previPorta").removeAttr('src');
										$("#img_previPorta").attr('src', '../../img/portfolio/'+data[0]['nameImg']);

										$("#btn_savePorta").removeAttr('data-id_porta');
										$("#btn_savePorta").attr('data-id_porta', data[0]['id_porta']);

										$("#modal_actuPorta").modal("show");
										$("#btn_savePorta").unbind('click');
										$("#btn_savePorta").click(function(){

										//queremos que esta variable sea global
										var fileExtension = "";
    									//función que observa los cambios del campo file y obtiene información
    									$("#porta_update").find(':file').change(function(){ 
     										//obtenemos un array con los datos del archivo
     										var file = $("#img_porta_upda")[0].files[0];
     										//obtenemos el nombre del archivo
     										var fileName = file.name;
     										//obtenemos la extensión del archivo
     										fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
     										//obtenemos el tamaño del archivo
     										var fileSize = file.size;
     										//obtenemos el tipo de archivo image/png ejemplo
     										var fileType = file.type;
     									});

    									var id_porta2 = $(this).data("id_porta");
    									var formData = new FormData($("#form_portafolio")[0]);
    									formData.append('id_porta',id_porta2);

    									var valor = $("#tipo_portaUpdate").val();
    									if(valor != 0){
    										$.ajax({
    											type:'POST',
    											url:'../php/actualizar_portaf.php',
    											data: formData,
    											cache: false,
    											contentType: false,
    											processData: false,
    											dataType:'HTML',
    											beforeSend: function() {
    												notification = alertify.notify('Cargando<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>', 'custom', 0);
    											}
    										}).done(function(data){
    											notification.dismiss();
    											$("#form_portafolio")[0].reset();
    											tabla_porta.ajax.reload();
    											$('#modal_actuPorta').modal('hide');
    											showNotification("alert-success",data,"bottom","right","","");
    										});
    									}else{
    										showNotification("alert-danger","Por favor llene todos los campos","bottom","right","","");
    									}
    								});
									}else{
										showConfirmMessage_2(id_porta);
									}
								});
							});
						});
					}
				});
});
});
});
	// BOTON ADMIN QUE MUESTRA EL CONTENT DE exportaciones
	$("#exportar").click(function(){
		$.ajax({
			url:'exportacion.php',
			dataType:'HTML',
			beforeSend: function () {
				notification = alertify.notify('<span><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>Espere. Cargando...', 'custom', 0);
			}
		}).done(function(data){
			notification.dismiss();

			$("#exportacion").html(data);
			$("#inicio").hide(400);
			$("#estadistica").hide(400);
			$("#noticias").hide(400);
			$("#videos").hide(400);
			$("#content_porta").hide(400);
			$("#reporte").hide(400);
			$("#detalle").hide(400);
			$(".caja").hide(400);
			$("#exportacion").show(400,function(){
				$(function () {
    				//Tooltip
    				$('[data-toggle="tooltip"]').tooltip({
    					container: 'body'
    				});
					//Popover
					$('[data-toggle="popover"]').popover();
				});
			});
		});
	});
	// -- FIN --
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
});