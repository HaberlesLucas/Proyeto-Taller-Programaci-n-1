<title><?php echo ($titulo);?></title>
<div class="container"> 

    <div class="formularios">
        <div>
            <h2 class="sub-titulo">Datos de Contacto</h2>
            <p style="font-size: 20px;">
                <b>Nombre y Apellido Titular:</b> Haberles, Lucas Francisco
                <b><br><br>Dirección:</b> Colonia Progreso, Bella Vista, Corrientes Arg.
                <b><br><br>Teléfono:</b> 3777-620599
                <b><br><br>Email:</b> lucashaberles811@gmail.com
            </p>
        </div>
        <div class="formularios2">
            <p><span>Envíanos tu duda o sugerencia</span> a <b>lucashaberles811@gmail.com</b> con los siguientes datos:</p> 
                <p>Nombre y Apellido</p>
                <p>Teléfono</p>
                <p>Correo</p>
                <p style="color: red;">O bien completando el siguiente formulario para enviar su consulta al administrador</p>
            
            <?php if(session()->logueado == 'true'): ?> <!-- anda igual con == true, no es necesario las '' -->
                <form method="POST" action="<?php echo base_url('nueva_consulta');?>" autocomplete="off">
                    <ul> 
                        
                        <li> <input name="id_usuario" type="hidden" value="<?php echo session()->id_usuario ?>" aria-label="Usuario"></li>
                        
                        <li> <input name="celular_consulta" type="number" placeholder="Celular" aria-label="Celular"></li>
                        <?php
                            if(isset($errores["celular_consulta"]) ){
                                echo "<div class='errores'>".$errores["celular_consulta"]."</div>";
                            }
                        ?>
                        <li> <textarea name="descripcion_consulta" id="" cols="30" rows="5" placeholder="Describa su consulta!"></textarea></li>
                        <?php
                            if(isset($errores["descripcion_consulta"]) ){
                                echo "<div class='errores'>".$errores["descripcion_consulta"]."</div>";
                            }
                        ?>
                        <li> <input type="reset" class="rounded-pill btn-sm btn btn-warning" value="Limpiar Cuestionario"> </li>
                        <li> <input type="submit" class="rounded-pill btn-sm btn btn-secondary" value="Enviar Cuestionario"> </li>
                    </ul>
                </form>
                <?php elseif(session()->logueado != 'true'): ?>
                    <form method="POST" action="<?php echo base_url('nueva_consulta_noUser');?>" autocomplete="off">
                        <ul> 
                            <li> <input name="nombre_no_usuario" type="text" placeholder="Nombre" aria-label="Nombre"></li>
                            <?php
                                if(isset($errores["nombre_no_usuario"]) ){
                                    echo "<div class='errores'>".$errores["nombre_no_usuario"]."</div>";
                                }
                            ?>
                            <li> <input name="apellido_no_usuario" type="text" placeholder="Apellido" aria-label="Apellido"></li>
                            <?php
                                if(isset($errores["apellido_no_usuario"]) ){
                                    echo "<div class='errores'>".$errores["apellido_no_usuario"]."</div>";
                                }
                            ?>
                            <li> <input name="telefono_no_usuario" type="number" placeholder="Celular" aria-label="Celular"></li>
                            <?php
                                if(isset($errores["telefono_no_usuario"]) ){
                                    echo "<div class='errores'>".$errores["telefono_no_usuario"]."</div>";
                                }
                            ?>
                            <li> <input name="email_no_usuario" type="text" placeholder="Email" aria-label="Email"></li>
                            <?php
                                if(isset($errores["email_no_usuario"]) ){
                                    echo "<div class='errores'>".$errores["email_no_usuario"]."</div>";
                                }
                            ?>
                            <li> <textarea name="descripcion_no_usuario" id="" cols="30" rows="5" placeholder="Describa su consulta!"></textarea></li>
                                <?php
                                if(isset($errores["descripcion_no_usuario"]) ){
                                    echo "<div class='errores'>".$errores["descripcion_no_usuario"]."</div>";
                                }
                            ?>
                            <li> <input type="reset" class="rounded-pill btn-sm btn btn-warning" value="Cancelar Consulta"> </li>
                            <li> <input type="submit" class="rounded-pill btn-sm btn btn-secondary" value="Enviar Consulta"> </li>
                        </ul>
                    </form>    
            <?php endif; ?>
            <div class="mapa">
                <h2>Este es un mapa de la geolocalización de la empresa</h2>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d33959.46900775479!2d-58.99950771735501!3d-28.64024771017563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x944e572427033317%3A0x54cedf6ce92aceff!2zMjjCsDM4JzM0LjMiUyA1OcKwMDEnMzkuNSJX!5e1!3m2!1ses-419!2sar!4v1650069546131!5m2!1ses-419!2sar" 
                    
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div> 
</div> 