<div class="container form-productos p-3">
    <h4 class="mt-4">BIENVENIDO AL PANEL DE CONSULTAS</h4> 
    <p class="info_consultas">USTED COMO ADMINISTRADOR PUEDE VER LAS CONSULTAS DE LOS USUARIOS REGISTRADOS Y LAS DE LOS QUE NO ESTÁN REGISTRADOS</p>
    <div class="text-center boton_consultas">
        <p class="info_consultas">GESTIONAR:</p>
        <a href="<?php echo base_url('panel_consultas_noUser');?>" class="m-2 rounded-pill btn btn-danger btn-sm">CONSULTAS DE NO REGISTRADOS</a>
        <a href="<?php echo base_url('panel_consultas');?>" class="m-2 rounded-pill btn btn-danger btn-sm">CONSULTAS DE REGISTRADOS</a>
    </div>
</div>