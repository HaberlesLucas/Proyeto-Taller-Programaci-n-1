<title><?php echo ($titulo);?></title>
<?php $tipoPerfil = ["ADMINISTRADOR", "CLIENTE"]; ?>

<div class="container form-productos p-3">
	<h4 class="mt-4">USUARIOS REGISTRADOS </h4>
	<div class="col">
		<a href="<?php echo base_url("agregar_usuario"); ?>" class="rounded-pill btn btn-success m-3 btn-sm">AÑADIR</a>
		<a href="<?php echo base_url("eliminados_user"); ?>" class="rounded-pill btn btn-warning m-3 btn-sm">ELIMINADOS</a> 
	</div>	
	<div class="table-responsive">
		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<th>ID</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>EMAIL</th>
					<th>USUARIO</th>
					<th>ROL</th>
                    <th>OPERACIONES</th>
				</tr>
			</thead>
			<tbody>
				<!-- con esta linea hacemos que arroje fila por fila cada usuario que esté activo -->
				<?php if($datos){ ?>
					<?php foreach($datos as $dato){ ?>
						<tr class="text-center">
							<td> <?php echo $dato['id_usuario']; ?></td>
							<td> <?php echo $dato['nombre_usuario']; ?></td>
							<td> <?php echo $dato['apellido_usuario']; ?></td>
							<td> <?php echo $dato['email_usuario']; ?></td>
							<td> <?php echo $dato['usuario_usuario']; ?></td>
							<td> <?php echo $tipoPerfil[(int) $dato['perfil_id_usuario']-1]; ?></td>
							<td><!--editar-->
								<?php if(session()->id_usuario == $dato['id_usuario']): ?>
									<h1 class="btn btn-info btn-sm">USTED</h1>
									<?php elseif(session()->id_usuario != $dato['id_usuario']): ?>
										<a href="<?php echo base_url('editar_user?id_usuario='.$dato['id_usuario']); ?>" class="btn btn-default btn-sm"> <i >
											<img style="width: 40px; max-height: 40px;" src="img/iconos/editar.png" alt="ICONO EDITAR">
											<br><h6 class="btn btn-secondary btn-sm">EDITAR</h6></i>
										</a>
										<a onclick="return mostrar(event, 'Seguro que desea eliminar este Usuario?','El usuario ha sido eliminado', 'El usuario no se eliminó')" href="<?php echo base_url('eliminar_user?id_usuario='.$dato['id_usuario']); ?>" class="btn btn-default btn-sm"> 
											<i>
												<img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR">
												<br>
												<h6 class="btn btn-secondary btn-sm">ELIMINAR</h6>
											</i>
										</a>
									
								<?php endif; ?>
							</td>
						</tr>
					<?php }  
				} ?>
			</tbody>
		</table>
	</div>
</div>




