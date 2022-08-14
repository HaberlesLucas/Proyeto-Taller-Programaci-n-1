<div class="container">
    <div>
        <h2 class="tilte">Registrar Producto</h2>
    </div>
    <form method="post">
        <div class="contenedorImput">
            <input name="nombre_producto" type="text" placeholder="Nombre Producto" aria-label="Nombre Producto"> 
            <?php 
                if(isset($errores["nombre_producto"]) ){
                    echo "<div class='errores'>".$errores["nombre_producto"]."</div>";
                }
            ?> 
        </div>
        <div class="contenedorImput">
            <input name="marca_producto" type="text" placeholder="Marca Producto" aria-label="Marca Producto"> 
            <?php 
                if(isset($errores["marca_producto"]) ){
                    echo "<div class='errores'>".$errores["marca_producto"]."</div>";
                }
            ?>
        </div>
        <div class="contenedorImput">
            <input name="costo_producto" type="text" placeholder="Costo Producto" aria-label="Costo Producto"> 
            <?php 
                if(isset($errores["costo_producto"]) ){
                    echo "<div class='errores'>".$errores["costo_producto"]."</div>";
                }
            ?> 
        </div>
        <div class="contenedorImput">
            <input name="codigo_producto" type="text" placeholder="Código Producto" aria-label="Código Producto"> 
            <?php 
                if(isset($errores["codigo_producto"]) ){
                    echo "<div class='errores'>".$errores["codigo_producto"]."</div>";
                }
            ?>   
        </div>
        <div class="contenedorImput">         
            <input name="descripcion_producto" type="text" placeholder="Descripción Producto" aria-label="Descripción Producto"> 
            <?php 
                if(isset($errores["descripcion_producto"]) ){
                    echo "<div class='errores'>".$errores["descripcion_producto"]."</div>";
                }
            ?>
        </div>
        <div class="contenedorImput">
            <input name="stock_producto" type="text" placeholder="Stock Producto" aria-label="Stock Producto"> 
            <?php 
                if(isset($errores["stock_producto"]) ){
                    echo "<div class='errores'>".$errores["stock_producto"]."</div>";
                }
            ?>
        </div>
        <div class="contenedorImput">
            <input name="img_producto" type="file" placeholder="Imagen producto" aria-label="Imagen producto"> 
            <?php 
                if(isset($errores["img_producto"]) ){
                    echo "<div class='errores'>".$errores["img_producto"]."</div>";
                }
            ?>
        </div>
        <div class="contenedorImput">
            <input name="categoria_producto" type="text" placeholder="Categoria producto" aria-label="Categoria producto"> 
            <?php 
                if(isset($errores["categoria_producto"]) ){
                    echo "<div class='errores'>".$errores["categoria_producto"]."</div>";
                }
            ?>
        </div>
    </form>
</div> 
