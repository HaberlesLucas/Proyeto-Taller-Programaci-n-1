<title><?php echo ($titulo);?></title>
<div class="container form-productos">
    <h4 class="tilte mt-4">EDITAR PRODUCTO</h4>
    <form method="POST" enctype='multipart/form-data' action="<?php echo base_url('actualizar');?>" autocomplete="off">
         
        <!-- PARA IDENTIFICAR EL ID A EDITAR -->
        <input type="hidden" value=" <?php echo $datos['id_producto']; ?> "name="id_producto"/>
 
        <div class="form-group p-5 pt-1">
            <div class="row">

                <div class="col-12 col-sm-6">
                    <label> CATEGORÍA </label>
                    <select name="categoria_producto">
                        <option value="1"selected>MASCOTAS</option>
                        <option value="2">PORCINOS</option>
                        <option value="3">EQUINOS</option>
                        <option value="4">BOVINOS</option>
                        <option value="5">VACUNOS</option>
                        <option value="6">AVES</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre_producto" name="nombre_producto" type="text" value="<?php echo $datos['nombre_producto']; ?>" autofocus> 
                </div>
                <div class="col-12 col-sm-6">
                    <label> MARCA </label>
                    <input class="form-control" id="marca_producto" name="marca_producto" type="text" value="<?php echo $datos['marca_producto']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> COSTO </label>
                    <input class="form-control" id="costo_producto" name="costo_producto" type="text" value="<?php echo $datos['costo_producto']; ?>" > 
                </div>
                <div class="col-12 col-sm-6">
                    <label> CÓDIGO </label>
                    <input class="form-control" id="codigo_producto" name="codigo_producto" type="text" value="<?php echo $datos['codigo_producto']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> DESCRIPCIÓN </label>
                    <input class="form-control" id="descripcion_producto" name="descripcion_producto" type="text" value="<?php echo $datos['descripcion_producto']; ?>" > 
                </div>
                <div class="col-12 col-sm-6">
                    <label> STOCK </label>
                    <input class="form-control" id="stock_producto" name="stock_producto" type="text" value="<?php echo $datos['stock_producto']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> IMAGEN </label><!--  ESTO NO MUESTRA NI EL NOMBRE DE LA IMG POR EL VALUE, ES DE OTRA FORMA -->
                    <input class="form-control" id="img_producto" name="img_producto" type="file" value="<?php echo $datos['img_producto']; ?>" >
                </div>
                
            </div><br>
            <a href=" <?php echo base_url('panel_productos'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>

    </form>
</div>