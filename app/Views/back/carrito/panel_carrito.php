<title><?php echo ($titulo);?></title>
<div class="container form-productos p-3">
    <h4 class="mt-4">CARRITO</h4>
    <table class="table table-sm table-dark table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr class="text-center">
                <th>N° PEDIDO</th>
                <th>NOMBRE PRODUCTO</th>
                <th>PRECIO PRODUCTO</th>
                <th>CANTIDADES</th>
                <th>U$D</th>
                <th>OPERACIÓN</th>
            </tr>
        </thead>
        <tbody>  
            <div class="text-center">
                <?php
                    $costo_total = 0; //PARA ALMACENAR EL COSTO TOTAL DEL CARRITO 
                    $i = 1; //PARA ENUMERAR LOS PEDIDOS DEL CARRITO
                    foreach($cart->contents() as $carrito) { ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $carrito['name'] ?></td>
                        <td><?php echo $carrito['price'] ?></td>
                        <td>
                            <a style="font-size: 25px;" class="btn btn-danger m-1 p-2 pt-0 btn-sm" href="<?php echo base_url("restar_carrito?id=").$carrito["rowid"] ?>">-</a>
                            <?php echo $carrito['qty']?>
                            <a style="font-size: 25px;" class="btn btn-danger m-1 p-2 pt-0 btn-sm" href="<?php echo base_url("sumar_carrito?id=").$carrito["rowid"] ?>">+</a>
                        </td>
                        <td><?php echo $carrito['subtotal']; $costo_total = $costo_total + $carrito['subtotal'] ?></td>
                        <td>
                            <a href="<?php  echo base_url('eliminarCarrito?rowid='.$carrito['rowid']); ?>"
                                class="btn btn-default ">
                                <i>
                                    <img style="width: 40px; max-height: 40px;" src="img/iconos/eliminar.png"
                                        alt="ICONO ELIMINAR">
                                    <br>
                                    <h6 class="btn btn-warning btn-sm">QUITAR DEL CARRITO</h6>
                                </i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </div>
        </tbody>
    </table>
    <div class="text-center">
        <?php if($cart->contents() ): ?>
            <h3 class="m-2 rounded-pill btn btn-info">CANTIDAD DE PRODUCTOS: <?php echo $i-1 ?> </h3>
            <h3 class="m-2 rounded-pill btn btn-success">TOTAL U$D: <?php echo $costo_total ?> </h3>
            <a class="m-2 rounded-pill btn btn-danger" href="<?php echo base_url('vaciarCarrito')?>">
            <i class="fa-solid"></i>✅VACIAR CARRITO</a>
            <a class="m-2 rounded-pill btn btn-success" href="<?php echo base_url('comprar_carrito')?>">
            <i class="fa-solid"></i>CONFIRMAR COMPRA</a>
            <?php else:?>
                <h4>SU CARRITO ESTÁ VACÍO 🦄</h4>
        <?php endif ?>
    </div>
</div>
