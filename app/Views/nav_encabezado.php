<body class="contenedor_principal">
    <div class="container">

        <!-- /*NAVBAR*/ -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="<?php echo base_url('index');?>">
                    <h1 class="tilte prueba">Forrajería Haberles</h1>
                </a>

            </div>
            <?php if(session()->logueado == 'true'): ?>
            <?php if(session()->perfil_id_usuario == '1'): ?>
            <div class="btn btn-secondary active btnUser btn-sm">
                <a href="">ADMIN: <?php echo session('nombre_usuario'); ?> </a>
            </div>
            <?php elseif(session()->perfil_id_usuario == '2'): ?>
            <div class="btn btn-secondary active btnUser btn-sm">
                <a href="">CLIENTE: <?php echo session('nombre_usuario'); ?> </a>
            </div>
            <?php endif; ?>

            <a class="btn btn-danger navbar-btn btn-sm" href="<?php echo base_url('logout');?>">Cerrar Sesión</a>

            <?php else : ?>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item p-2">
                        <a class="btn btn-success navbar-btn btn-sm"
                            href="<?php echo base_url('registro');?>">Registrese</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="btn btn-success navbar-btn btn-sm" href="<?php echo base_url('login');?>">Inicio
                            Sesión</a>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
            <a href="<?php echo base_url('index');?>"><img src="img/logo1.png" alt="Logo" style="width:60px;"
                    class="rounded-pill"> </a>
        </nav>

        <!-- GESTION DE TIPOS DE CLIENTES  -->
        <!-- USUARIO ADMINISTRADOR -->
        <?php if(session()->logueado == 'true' && session()->perfil_id_usuario == '1'): ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <header class="menu">
                    <nav class="nav_inicio">
                        <a href="<?php echo base_url('index');?>"> INICIO | </a>
                        <a href="<?php echo base_url('productos');?>">PRODUCTOS ACTIVOS | </a>
                        <a href="<?php echo base_url('consultas');?>">PANEL CONSULTAS | </a>
                        <a href="<?php echo base_url('panel_productos');?>"> PANEL PRODUCTOS | </a>
                        <a href="<?php echo base_url('panel_ventas');?>"> PANEL VENTAS | </a>
                        <a href="<?php echo base_url('panel_usuarios');?>"> PANEL USUARIOS</a>
                    </nav>
                </header>


            </div>
        </nav>

        <!-- USUARIO NO ADMINISTRADOR -->
        <?php elseif(session()->logueado == 'true' && session()->perfil_id_usuario == '2'): ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <header class="menu">
                    <nav class="nav_inicio">
                        <a href="<?php echo base_url('index');?>"> INICIO | </a>
                        <a href="<?php echo base_url('productos');?>">PRODUCTOS | </a>
                        <a href="<?php echo base_url('contacto');?>"> CONTACTO | </a>
                        <a href="<?php echo base_url('quienes_somos');?>"> QUIÉNES SOMOS | </a>
                        <a href="<?php echo base_url('ver_compras');?>"> MIS COMPRAS | </a>
                        <a href="<?php echo base_url('comercializacion');?>">COMERCIALIZACIÓN | </a>
                        <a href="<?php echo base_url('panel_carrito'); ?> ">
                            <img style="width: 40px; max-height: 40px;" src="img/iconos/carrito.png" alt="Funny image">
                        </a>

                    </nav>
                </header>
            </div>
        </nav>
        <!-- USUARIO NO REGISTRADO  -->
        <?php else : ?>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <header class="menu">
                    <nav class="nav_inicio">
                        <a href="<?php echo base_url('index');?>"> INICIO | </a>
                        <a href="<?php echo base_url('productos');?>">PRODUCTOS | </a>
                        <a href="<?php echo base_url('contacto');?>"> CONTACTO | </a>
                        <a href="<?php echo base_url('quienes_somos');?>"> QUIÉNES SOMOS | </a>
                        <a href="<?php echo base_url('comercializacion');?>">COMERCIALIZACIÓN</a>
                    </nav>
                </header>


            </div>
        </nav>

        <?php endif; ?>
        
    </div>