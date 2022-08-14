<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">PRODUCTOS REGISTRADOS</h4> 
	<div class="col">
			<a href="<?php echo base_url("nuevo"); ?>" class="rounded-pill btn btn-success m-3 btn-sm">AÑADIR</a>
			<a href="<?php echo base_url("eliminados"); ?>" class="rounded-pill btn btn-warning btn-sm">ELIMINADOS</a>
	</div>
	<div class="table-responsive">
		
		<?php
			$categoriaDescripcion = ["mascotas", "porcinos", "equinos", "bovinos", "vacunos", "aves"];
			
			if(session()->getFlashdata('success')):?>
				<div style="color: green; background-color: black; font-size: 20px;" class="text-center rounded-pill alert alert-success alert-dismissible">
					<button type="button" class="btn btn-danger" data-bs-dismiss="alert">CERRAR&times;</button>
					<?php echo session()->getFlashdata('success') ?>
				</div>
			<?php elseif(session()->getFlashdata('failed')):?>
				<div style="color: red; background-color: blue; font-size: 20px;" class="text-center rounded-pill alert alert-success alert-dismissible">
					<button type="button" class="btn btn-danger" data-bs-dismiss="alert">CERRAR&times;</button>
					<?php echo session()->getFlashdata('success') ?>
				</div>
		<?php endif; ?>

		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<!-- <th>ID</th> -->
					<th>NOMBRE</th>
					<th>MARCA</th>
					<th>COSTO</th>
					<th>CÓDIGO</th>
					<th>DESCRIPCIÓN</th>
					<th>STOCK</th>
					<th>CATEGORÍA</th>
					<th>IMG</th>
					<th>OPERACIONES</th>
				</tr>
			</thead>
			<tbody>
				<!-- con esta linea hacemos que arroje fila por fila cada producto que esté activo -->
				<?php if($datos){ ?> 
				<?php foreach($datos as $dato){ ?>
					
					<tr class="text-center">

						<!-- <td> <?php echo $dato['id_producto']; ?></td> -->
						<td> <?php echo $dato['nombre_producto']; ?></td>
						<td> <?php echo $dato['marca_producto']; ?></td>
						<td> <?php echo $dato['costo_producto']; ?></td>
						<td> <?php echo $dato['codigo_producto']; ?></td>
						<td> <?php echo $dato['descripcion_producto']; ?></td>
						<td> <?php echo $dato['stock_producto']; ?></td>
						<td> <?php echo $categoriaDescripcion[(int) $dato['categoria_producto']-1]; ?></td>
						<td><img width="100" class="rounded mx-auto" src="<?php echo base_url('assets/uploads/'.$dato['img_producto'])?>"></td>
					
						<td>
							<a href="<?php echo base_url('editar?id_producto='.$dato['id_producto']); ?>" class="btn btn-default btn-sm"> <i >
								<img style="width: 40px; max-height: 40px;" src="img/iconos/editar.png" alt="ICONO EDITAR">
								<br><h6 class="btn btn-secondary btn-sm">EDITAR</h6></i>
							</a> <!--editar-->
							<a onclick="return mostrar(event, 'Seguro que desea eliminar este producto?', 'El producto ha sido eliminado', 'El producto no se eliminó')" href="<?php echo base_url('eliminar?id_producto='.$dato['id_producto']); ?>" class="btn btn-default btn-sm"> 
								<i>
									<img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png" alt="ICONO ELIMINAR"> <br>
									<h6 class="btn btn-secondary btn-sm">ELIMINAR</h6>
								</i>
							</a>		
						</td>
					</tr>
				<?php } 
				}?>
			</tbody>
		</table>
	</div> 
</div>
		



