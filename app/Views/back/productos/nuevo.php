<title><?php echo ($titulo);?></title>
<div class="container">
    <h4 class="tilte m-0 mt-4">NUEVO PRODUCTO</h4>
    <?php
        if(session()->getFlashdata('success')):?>
            <div style="color: red; background-color: black; font-size: 20px;" class="text-center rounded-pill alert alert-success alert-dismissible">
                <button type="button" class="btn btn-danger" data-bs-dismiss="alert">CERRAR&times;</button>
                <?php echo session()->getFlashdata('success') ?>
            </div>
        <?php elseif(session()->getFlashdata('failed')):?>
            <div style="color: red; background-color: blue; font-size: 20px;" class="text-center rounded-pill alert alert-success alert-dismissible">
                <button type="button" class="btn btn-danger" data-bs-dismiss="alert">CERRAR&times;</button>
                <?php echo session()->getFlashdata('success') ?>
            </div>
    <?php endif; ?>

    <form class="form-group form-productos" method="POST" enctype='multipart/form-data' action="<?php echo base_url("insertar"); ?> ">
        <div class="form-group form-productos">
            <div class="row container ">
                
                <div class="col-12 col-sm-6">
                    <label> CATEGORÍA </label>
                    <select name="categoria_producto">
                        <option value="1"selected>MASCOTAS</option>
                        <option value="2">PORCINOS</option>
                        <option value="3">EQUINOS</option>
                        <option value="4">BOVINOS</option>
                        <option value="5">VACUNOS</option>
                        <option value="6">AVES</option>
                    <?php //esto no sirve, porque la cat por defecto va a seleccionar MASCOTAS
                        if(isset($errores["categoria_producto"]) ){
                            echo "<div class='errores'>".$errores["categoria_producto"]."</div>";
                        }
                    ?>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre" name="nombre_producto" type="text" autofocus>
                    <?php 
                        if(isset($errores["nombre_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["nombre_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> MARCA </label>
                    <input class="form-control" id="marca" name="marca_producto" type="text" autocomplete="off">
                    <?php 
                        if(isset($errores["marca_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["marca_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> COSTO </label>
                    <input class="form-control" id="costo" name="costo_producto" type="text" autocomplete="off">
                    <?php 
                        if(isset($errores["costo_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["costo_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> CÓDIGO </label>
                    <input class="form-control" id="codigo" name="codigo_producto" type="text">
                    <?php 
                        if(isset($errores["codigo_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["codigo_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> DESCRIPCIÓN </label>
                    <input class="form-control" id="descripcion" name="descripcion_producto" type="text">
                    <?php 
                        if(isset($errores["descripcion_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["descripcion_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> STOCK </label>
                    <input class="form-control" id="stock_producto" name="stock_producto" type="text">
                    <?php 
                        if(isset($errores["stock_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["stock_producto"]."</div>";
                        }
                    ?>
                </div>
                <div class="col-12 col-sm-6">
                    <label> IMAGEN </label>
                    <input class="form-control" id="img_producto" name="img_producto" type="file"> 
                    <?php 
                        if(isset($errores["img_producto"]) ){
                            echo "<div class='errores' id='erroresID'>".$errores["img_producto"]."</div>";
                        }
                    ?>
                </div>
            </div>
            <div class="text-center">
                <a href=" <?php echo base_url("panel_productos"); ?> " class="m-2 rounded-pill btn btn-danger">CANCELAR</a>
                <button type="submit" class="m-2 rounded-pill btn btn-success">GUARDAR</button>
            </div>
        </div>
            

    </form>
</div>