<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">MIS COMPRAS</h4> 
	
	<div class="table-responsive">
		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<th>N° ORDEN</th>
					<th>NOMBRE PRODUCTO</th>
					<th>IMAGEN</th>
                    <th>CANTIDAD</th>
                    <th>COSTO UNITARIO</th>
					<th>COSTO SUB-TOTAL</th>
				</tr> 
			</thead>
			<tbody> 
				<?php 
					$costo_total=0; //acumulo lo gastado en la pagina en las diferentes compras
					if($detalles){ ?> 
                    <?php foreach($detalles as $detalle){ ?> 
                        
                        <tr class="text-center">
							<td> <?php echo $detalle['facturaID_ventaD']; ?></td>
                            <td> <?php echo $detalle['nombre_producto']; ?></td>
                            <td> <img width="100" src="<?php echo base_url('assets/uploads/'.$detalle['img_producto'])?>"></td>
                            <td> <?php echo $detalle['cantidad_ventaD']; ?></td>
                            <td> <?php echo $detalle['precio_ventaD']; ?></td>
							<td> <?php 
									$costo_total= $costo_total+$detalle['precio_ventaD'] * $detalle['cantidad_ventaD'];
									echo $detalle['precio_ventaD'] * $detalle['cantidad_ventaD']; 
								 ?>
							</td>
							
                        </tr>
                    <?php } 
				}?> 
			</tbody>
		</table>
		<div class="text-center">
			<h3 class="m-2 rounded-pill btn btn-success">TOTAL GASTADO EN FORRAJERÍA HABERLES: <?php echo $costo_total ?> U$D</h3>
		</div>
	</div> 
</div>