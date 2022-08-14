<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">CONSULTAS DE USUARIOS REGISTRADOS
	</h4> 
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-sm table-dark display" id="dataTable" width="100%" cellspacing="0">
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
				<?php foreach($consultas as $consulta){ ?>
						<tr class="text-center">
							<td> <?php echo $consulta['nombre_usuario']; ?></td>
							<td> <?php echo $consulta['email_usuario']; ?></td>
							<td> <?php echo $consulta['celular_consulta']; ?></td>
							<td> <?php echo $consulta['descripcion_consulta']; ?></td>
							<td> <?php echo $consulta['fecha_consulta']; ?></td>
							<td>
								<!-- botones responder		 -->
								<?php if($consulta['respondido'] == NULL): ?>
									<a href="<?php echo base_url('responder_consulta?id_consulta='.$consulta['id_consulta']); ?>" class="btn btn-default btn-sm">
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
