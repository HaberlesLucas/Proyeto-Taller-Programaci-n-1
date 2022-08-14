<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">DETALLE DE VENTA</h4> 
	<div class="table-responsive">
		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<!-- <th>ID</th> -->
					<th>NOMBRE PRODUCTO</th>
					<th>IMAGEN</th>
                    <th>CANTIDAD</th>
                    <th>COSTO UNITARIO</th>
					<th>COSTO SUB-TOTAL</th>
					  
				</tr>
			</thead>
			<tbody>
				<?php if($ventas){ ?> 
                    <?php foreach($ventas as $dato){ ?> 
                        
                        <tr class="text-center">
                            <td> <?php echo $dato['nombre_producto']; ?></td>
                            <td><img width="100" src="<?php echo base_url('assets/uploads/'.$dato['img_producto'])?>"></td>
                            <td> <?php echo $dato['cantidad_ventaD']; ?></td>
                            <td> <?php echo $dato['precio_ventaD']; ?></td>
							<td> <?php echo $dato['precio_ventaD'] * $dato['cantidad_ventaD']; ?></td>
                        </tr>
                    <?php } 
 
				}?>
			</tbody>
		</table>
        <div class="text-center">
			
			<a href="<?php echo base_url('panel_ventas');?>" class="m-2 rounded-pill btn btn-success btn-sm">VOLVER A PANEL VENTAS</a>
		</div>
	</div> 
</div>