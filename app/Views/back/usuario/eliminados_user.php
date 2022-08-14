<title><?php echo ($titulo);?></title>
<?php $tipoPerfil = ["ADMINISTRADOR", "CLIENTE"]; ?>

<div class="container form-productos p-3">
	<h4 class="mt-4">USUARIOS ELIMINADOS</h4>

	<div class="table-responsive">
		<table class="table table-bordered table-striped table-sm table-dark display" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
                	<!-- <th>ID</th> -->
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>EMAIL</th>
					<th>USUARIO</th>
					<th>ROL</th>
                    <th>OPERACIONES</th>
				</tr>
			</thead>
			<tbody>
				<!-- en esta parte hacemos que arroje fila por fila cada usuario que esté inactivo -->
				<?php foreach($datos as $dato){ ?>
					<tr>
						<!-- <td> <?php echo $dato['id_usuario']; ?></td> -->
						<td> <?php echo $dato['nombre_usuario']; ?></td>
						<td> <?php echo $dato['apellido_usuario']; ?></td>
                        <td> <?php echo $dato['email_usuario']; ?></td>
                        <td> <?php echo $dato['usuario_usuario']; ?></td>
						<td> <?php echo $tipoPerfil[(int) $dato['perfil_id_usuario']-1]; ?></td>
						<td>
							<!--regresar a activo-->	
						<a onclick="return mostrar(event, 'Seguro que desea restaurar este Usuario?','El usuario ha sido restaurado', 'El usuario no se restauró')" 
							href="<?php echo base_url('restaurar_user?id_usuario='. $dato['id_usuario']); ?>" class="btn btn-secondary btn-sm"> 
							<i>
								<img style="width: 40px; max-height: 40px;" src="img/iconos/restaurar.png" alt="ICONO RESTAURAR">
								<br>
								<h6 class="btn btn-secondary btn-sm">RESTAURAR</h6>
							</i>
						</a>
					</tr>		
				<?php } ?>
			</tbody>
		</table>
		<div class="text-center">
			<a href="<?php echo base_url('panel_usuarios');?>" class="m-2 rounded-pill btn btn-success btn-sm">VOLVER A USUARIOS</a>
		</div>
	</div>
</div>


<!-- MODAL  -->
<script type="text/javascript">
	function confirmarAccion(){
		var respuesta = confirm("¿Seguro que desea restaurar el Usuario?");

		if(respuesta == true){
			return true;
		}else{
			return false;
		}
	}
</script>
