<div class="container">
    <div class="containerProductos">
        <div class="containerFormulario_2">
            <div class="tituloIngresoProducto">
                <h1>INICIA SESIÓN</h1>
            </div>
            <div>
                <form method="post" class="formularioProductos">
                    <div class="contenedorImput">
                        <input name="usuario_usuario" type="text" placeholder="Usuario" aria-label="Usuario">
                        <?php
                            if(isset($errores["usuario_usuario"]) ){
                                echo "<div class='errores'>".$errores["usuario_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <div class="contenedorImput">
                        <input name="password_usuario" type="password" placeholder="Contraseña" aria-label="Contraseña">
                        <?php
                            if(isset($errores["password_usuario"]) ){
                                echo "<div class='errores'>".$errores["password_usuario"]."</div>";
                            }
                        ?>
                    </div>
                    <input type="reset" class="btn btn-warning" value="CANCELAR">
                    <input type="submit" class="btn btn-secondary" value="INICIAR SESIÓN">
                </form>
                <br><br><br><br><br>
                <div class="tituloIngresoProducto">
                    <h1 style="font-size: 18px">No tenes cuenta? <a href="<?php echo base_url('registro');?>"> Registrate</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>