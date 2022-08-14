<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
	<h4 class="mt-4">VENTAS REALIZADAS</h4> 
	<div class="table-responsive">
		<table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr class="text-center">
					<!-- <th>ID</th> -->
					<th>NOMBRE COMPRADOR</th>
					<th>APELLIDO COMPRADOR</th>
					<th>EMAIL COMPRADOR</th>
					<th>TOTAL PAGADO</th>
                    <th>DETALLES</th>
				</tr>  
			</thead>  
			<tbody>
				<?php if($ventas){ ?> 
                    <?php foreach($ventas as $dato){ ?>
                        
                        <tr class="text-center">
                            <td> <?php echo $dato['nombre_usuario']; ?></td>
							<td> <?php echo $dato['apellido_usuario']; ?></td>
							<td> <?php echo $dato['email_usuario']; ?></td>
                            <td> U$D <?php echo $dato['monto_venta']; ?></td>
                            <td> 
                                <a href="<?php echo base_url('panel_detalle?id='.$dato['id_venta']); ?>" class="btn btn-default btn-sm">
									<h6 class="btn btn-warning btn-sm">VER DETALLE</h6>
								</a>
                            </td>
                        </tr>
                    <?php } 
				}?>
			</tbody>
		</table>
	</div> 
</div>