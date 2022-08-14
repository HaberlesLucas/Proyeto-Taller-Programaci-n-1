<?php $i = 0; ?>
<title><?php echo ($titulo);?></title>
<div class="container productos_catalogo"> 

    <div class="pagos" id="pagos_cat">
        <h1>MEDIOS DE PAGO</h1>
        <a href="#">TARJETA DE CRÉDITO</a>
        <a href="#">TARJETA DE DÉBITO</a>
        <a href="#">MERCADO PAGO</a>
        <a href="#">EFECTIVO</a>
    </div>
    
    
    <?php $carrito = file('img/iconos/carrito.png'); ?>
    
    <div class="form-outline">
        <form method="POST" action="<?php echo base_url("productosFiltrados") ?>">
            <div class="row"> 
                <h3>FILTRAR POR CATEGORÍA </h3>
                    <div class="col-4 me-4 mb-5">
                        <select class="form-select" name="categoria_producto" id="categoria_producto">
                            <option value=""selected>TODAS</option>
                            <option value="1">MASCOTAS</option>
                            <option value="2">PORCINOS</option>
                            <option value="3">EQUINOS</option>
                            <option value="4">BOVINOS</option>
                            <option value="5">VACUNOS</option>
                            <option value="6">AVES</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="m-0 btn btn-outline-warning">FILTRAR</button>
                    </div>
            </div>
        </form>
    </div>

    <div class="imagenes-catalogo" id="img-productos">
        <div class="container-img"> 
            <?php foreach($productos as $producto):?>
                <?php if ($producto['stock_producto'] > 0):$i++;?>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?php echo base_url('assets/uploads/'.$producto['img_producto'])?>" alt="Imagen Producto no encontrada">
                        <div class="card-body">
                            <h3 class="card-title btn btn-dark"><?php echo $producto['nombre_producto'] ?></h3>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $i ?>"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        VER MÁS
                                    </button>
                                </h2>
                                <div id="flush-collapseOne<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h6 class="card-text"><?php echo $producto['descripcion_producto'] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-text"> COSTO: <?php echo $producto['costo_producto'] ?> u$d </h6>
                            <h6 class="card-text" style="color: green"> STOCK: <?php echo $producto['stock_producto'] ?></h6>
                            
                            <?php if(session()->logueado == 'true' && session()->perfil_id_usuario == '2'): {
                                    helper('form');
                                    echo form_open('Carrito_controller/agregar_carrito');
                                    echo form_hidden('id_producto', $producto['id_producto']);
                                    echo form_hidden('nombre_producto', $producto['nombre_producto']);
                                    echo form_hidden('costo_producto', $producto['costo_producto']);
                                    echo form_hidden('stock_producto', $producto['stock_producto']);
                                    echo form_submit('agregar_carrito', 'AL CARRO', "class='custom-btn btn btn-5 btn-primary' ");
                                    echo form_close();
                                } ?>
                                <?php elseif(session()->logueado != 'true'): ?>
                                    <a href="<?php echo base_url('login'); ?>" class="btn btn-default"> <img style="width: 50px; max-height: 50px;" src="img/iconos/carrito.png" alt="Funny image"></a>
                                <?php endif; ?>
                        </div>
                    </div>
                <!-- Cierra condicion de stock > 0-->
                <?php elseif($producto['stock_producto'] <= 0): ?>
                    <div class="card" style="width:400px">
                        <img class="card-img-top"  src="<?php echo base_url('assets/uploads/'.$producto['img_producto'])?>" alt="Imagen Producto no encontrada">
                        <div class="card-body">
                            <h3 class="card-title btn btn-dark"><?php echo $producto['nombre_producto'] ?></h3>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        VER DESCRIPCIÓN
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <h6 class="card-text"><?php echo $producto['descripcion_producto'] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <h6 class="card-text"> COSTO: <?php echo $producto['costo_producto'] ?> u$d </h6>
                            <h6 class="card-text" style="color: red"> STOCK: <?php echo $producto['stock_producto'] ?></h6>

                            <?php if(session()->logueado == 'true' && session()->perfil_id_usuario == '2'): {
                                    helper('form');
                                    echo form_open('Carrito_controller/agregar_carrito');
                                    echo form_hidden('id_producto', $producto['id_producto']);
                                    echo form_hidden('nombre_producto', $producto['nombre_producto']);
                                    echo form_hidden('costo_producto', $producto['costo_producto']);
                                    echo form_hidden('stock_producto', $producto['stock_producto']);
                                    
                                    echo ('SIN STOCK');
                                    
                                    echo form_close();
                                } ?>
                                
                                <?php elseif (session()->logueado != 'true'): ?>
                                    <a href="<?php echo base_url('login'); ?>" class="btn btn-default"> <img style="width: 50px; max-height: 50px;" src="img/iconos/carrito.png" alt="Funny image"></a>
                                <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?> 
        </div>
    </div>
</div>
