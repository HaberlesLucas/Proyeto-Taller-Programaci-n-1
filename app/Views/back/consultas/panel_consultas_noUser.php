<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">CONSULTAS DE USUARIOS NO REGISTRADOS</h4> 
	<div class="table-responsive">
		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<th>NOMBRE</th>
					<th>EMAIL</th>
					<th>CELULAR</th> 
					<th>DESCRIPCIÓN</th>
					<th>FECHA</th>
					<th>ESTADO</th>
				</tr> 
			</thead>
			<tbody> 
				<!-- con esta linea hacemos que arroje fila por fila cada consulta que esté activo -->
				<?php if($consultas){ ?>
				<?php  
					
					foreach($consultas as $consulta){ ?>
						<tr class="text-center">
							<td> <?php echo $consulta['nombre_no_usuario']; ?></td>
							<td> <?php echo $consulta['email_no_usuario']; ?></td>
							<td> <?php echo $consulta['telefono_no_usuario']; ?></td>
							<td> <?php echo $consulta['descripcion_no_usuario']; ?></td>
							<td> <?php echo $consulta['fecha_no_usuario']; ?></td>
							<td>
							<!-- botones responder		 -->
							<?php if($consulta['respondido'] == NULL): ?>
								<a href="<?php echo base_url('responder_consulta_noUser?id_no_usuario='.$consulta['id_no_usuario']); ?>" class="btn btn-default btn-sm">
									<h6 class="btn btn-warning btn-sm">LEER</h6>
								</a>
								<?php else:?>
									<h6 class="btn btn-success btn-sm">LEÍDO</h6>
							<?php endif ?>
							</td>
						</tr>
				<?php } } ?>
			</tbody>
		</table>
        <div class="text-center">
			<a href="<?php echo base_url('consultas');?>" class="m-2 rounded-pill btn btn-success btn-sm">VOLVER A PANEL CONSULTAS</a>
		</div>
	</div>
</div>
