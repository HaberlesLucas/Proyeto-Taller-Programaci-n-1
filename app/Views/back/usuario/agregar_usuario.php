<div class="container">
    <div class="containerProductos">
        <div class="containerFormulario_2">
            <div class="tituloIngresoProducto">
                <h1>AÑADA UN USUARIO NUEVO</h1>
            </div>
            <div> 
                <form method="POST" action="<?php echo base_url('agregar_usuario');?>" autocomplete="off" class="formularioProductos">
                    <div class="contenedorSelect">
                        <select class="form-select_1" name="perfil_id_usuario" >
                            <option value="0"selected>Elegir perfil</option>
                            <option class="form-select_AD" value="1">ADMINISTRADOR</option>
                            <option class="form-select_US" value="2">CLIENTE</option>
                        </select>
                    </div>
                    <div class="contenedorImput">
                        <input name="nombre_usuario" type="text" placeholder="Nombre" aria-label="Nombre">
                        <?php 
                            if(isset($errores["nombre_usuario"]) ){
                                echo "<div class='errores' id='erroresID1'>".$errores["nombre_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <div class="contenedorImput">
                        <input name="apellido_usuario" type="text" placeholder="Apellido" aria-label="Apellido">
                        <?php
                            if(isset($errores["apellido_usuario"]) ){
                                echo "<div class='errores' id='erroresID1'>".$errores["apellido_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <div class="contenedorImput">
                        <input name="email_usuario" type="email" placeholder="Correo" aria-label="Correo"></li>
                        <?php
                            if(isset($errores["email_usuario"]) ){
                                echo "<div class='errores' id='erroresID1'>".$errores["email_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <div class="contenedorImput">
                        <input name="usuario_usuario" type="text" placeholder="Usuario" aria-label="Usuario">
                        <?php
                            if(isset($errores["usuario_usuario"]) ){
                                echo "<div class='errores' id='erroresID1'>".$errores["usuario_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <div class="contenedorImput">
                        <input name="password_usuario" type="password" placeholder="Contraseña" aria-label="Contraseña">
                        <?php
                            if(isset($errores["password_usuario"]) ){
                                echo "<div class='errores' id='erroresID1'>".$errores["password_usuario"]."</div>";
                            } 
                        ?>
                    </div>
                    <input type="reset" class="btn btn-danger" value="CANCELAR REGISTRO">
                    <input type="submit" class="btn btn-success" value="REGISTRAR USUARIO">
                </form>
                <br><br><br><br><br>

                <div class="tituloIngresoProducto">
                    <h1 style="font-size: 18px"><b>NOTA: </b> si no especifíca el tipo de perfil, por defecto es cliente</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>