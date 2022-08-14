<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">PRODUCTOS ELIMINADOS</h4>

	<div class="table-responsive">
		<table class="table table-bordered table-striped table-sm table-dark display" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<!-- <th>ID</th> -->
					<th>NOMBRE</th>
					<th>MARCA</th>
					<th>COSTO</th>
					<th>CÓDIGO</th>
					<th>DESCRIPCIÓN</th>
					<th>STOCK</th>
					<!-- <th>CATEGORÍA</th> -->
					<th>IMG</th>
					<th>OPERACIÓN</th>
				</tr>
			</thead>
			<tbody>
				<!-- con esta linea hacemos que arroje fila por fila cada producto que esté inactivo -->
				<?php foreach($datos as $dato){ ?>
					<tr class="text-center">
						<!-- <td> <?php echo $dato['id_producto']; ?></td> -->
						<td> <?php echo $dato['nombre_producto']; ?></td>
						<td> <?php echo $dato['marca_producto']; ?></td>
						<td> <?php echo $dato['costo_producto']; ?></td>
						<td> <?php echo $dato['codigo_producto']; ?></td>
						<td> <?php echo $dato['descripcion_producto']; ?></td>
						<td> <?php echo $dato['stock_producto']; ?></td>
						<td><img width="100" src="<?php echo base_url('assets/uploads/'.$dato['img_producto'])?>"></td>
						<td>
							<a onclick="return mostrar(event, 'Seguro que desea restaurar este Producto?','El producto ha sido restaurado', 'El producto no se restauró')"href="<?php echo base_url('restaurar?id_producto='. $dato['id_producto']); ?>"class="btn btn-default btn-sm">
								<i>
									<img style="width: 50px; max-height: 50px;" src="img/iconos/restaurar.png" alt="ICONO RESTAURAR"><br>
									<h6 class="btn btn-secondary btn-sm">RESTAURAR</h6>
								</i>
							</a>
						</td> <!--regresar a activo-->		
					</tr>		
				<?php } ?>
			</tbody>
		</table>
		<div class="text-center">
			<a href="<?php echo base_url('panel_productos');?>" class="m-2 rounded-pill btn btn-success btn-sm">VOLVER A PRODUCTOS</a>
		</div>
	</div>
</div>
    