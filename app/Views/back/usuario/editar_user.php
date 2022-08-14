<div class="container form-productos">
    <h4 class="mt-4">EDITAR USUARIO</h4>
    <form method="POST" action="<?php echo base_url('actualizar_user');?>" autocomplete="off">
        
        <!-- PARA IDENTIFICAR EL ID A EDITAR -->
        <input type="hidden" value=" <?php echo $datos['id_usuario']; ?> "name="id_usuario"/>

        <div class="form-group p-5 pt-1">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label> NOMBRE </label>
                    <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" value="<?php echo $datos['nombre_usuario']; ?>" autofocus> 
                </div>
                <div class="col-12 col-sm-6">
                    <label> APELLIDO </label>
                    <input class="form-control" id="apellido_usuario" name="apellido_usuario" type="text" value="<?php echo $datos['apellido_usuario']; ?>" >
                </div>
                <div class="col-12 col-sm-6">
                    <label> EMAIL </label>
                    <input class="form-control" id="email_usuario" name="email_usuario" type="text" value="<?php echo $datos['email_usuario']; ?>" >
                </div>
                <div class="contenedorSelect">
                    <label> PERFIL </label>
                    <select class="form-select_1" name="perfil_id_usuario" value="<?php echo $datos['perfil_id_usuario']; ?>">
                        <option class="form-select_AD" value="1">ADMINISTRADOR</option>
                        <option class="form-select_US" value="2" selected>CLIENTE</option>
                    </select>
                </div>
            </div><br>
            <a href=" <?php echo base_url('panel_usuarios'); ?> " class="btn btn-primary">VOLVER</a>
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
    </form>
</div> 