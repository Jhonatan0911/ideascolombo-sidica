<?php 
require_once("conex.php");
date_default_timezone_set('America/Bogota');
setLocale(LC_ALL, "spanish");
$id_noti = $_POST['id_noti'];

function fecha_hora ($fecha) {
	$respuesta = "";
	$f = new DateTime($fecha);
	$hora = $f->format('h:i:s a');
	$anio = ucwords(strftime("%B %d, %G", $f->getTimestamp()));
	$respuesta =  $anio." Hora ".$hora;;

	return $respuesta;
}

$comentario = $bd->consulta("SELECT noticia_comentario.* FROM noticia_comentario INNER JOIN noticia_notificacion WHERE noticia_notificacion.id_noti = $id_noti AND noticia_notificacion.id_noti = noticia_comentario.id_noti");
$cont = $comentario->num_rows;
?>
<h4><?php echo $cont ?> Comentarios</h4>
<ul class="comment-list">
	<?php foreach($comentario as $comen): 
		$sql_resp = $bd->consulta("SELECT * FROM noticia_respuesta WHERE id_com = {$comen['id_com']}");
		$cout = $sql_resp->num_rows;
		$fecha = fecha_hora ($comen['fecha']);
		?>
		<li class="comment">
			<div class="the-comment">
				<div class="avatar">
					<img src="img/blog/<?php echo $comen['name_img'] ?>" alt="">
				</div>
				<div class="comment-box">
					<div class="comment-author">
						<strong><?php echo utf8_encode($comen['nombre']) ?></strong><span class="meta"> <?php echo $fecha; ?></span><a class="respuesta comment-reply-link" data-id_com="<?php echo $comen['id_com'] ?>" href="javascript:void(0)"> - Responder</a>
					</div>
					<div class="comment-text">
						<p><?php echo utf8_encode($comen['comentario']) ?></p>
					</div>
				</div>
			</div>
			<ul class="children">
				<?php 
				if($cout > 0): ?>
					<?php 
					foreach($sql_resp as $resp): 
						$fecha2 = fecha_hora ($resp['fecha']); ?> 
						<li class="comment">
							<div class="the-comment">
								<div class="avatar">
									<img src="img/blog/<?php echo $resp['name_img'] ?>" alt="">
								</div>
								<div class="comment-box">
									<div class="comment-author">
										<strong><?php echo utf8_encode($resp['nombre']) ?></strong><span class="meta"> <?php echo $fecha2; ?></span>
									</div>
									<div class="comment-text">
										<p><?php echo utf8_encode($resp['respuesta']) ?></p>
									</div>
								</div>
							</div>
						</li>
						<?php
					endforeach; ?>
					<?php 
				endif; ?>
			</ul>
		</li>
	<?php endforeach; ?>
</ul>