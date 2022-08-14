<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Productos_model;
use App\Models\VentaCabecera_model;
use App\Models\VentaDetalle_model;

class Carrito_controller extends BaseController{
    
    //agrega productos al carrito
    public function agregar_carrito(){
        $request = \Config\Services::request();
        $cart = \Config\Services::cart();
     
        $productos = $cart->contents();
        foreach($productos as $producto){
            if($producto["id"] == $request->getPost('id_producto')){
                $cantidad = $producto["qty"];
                $cantidadMax = $producto["stock_producto"];
    
                if($cantidad < $cantidadMax){ 
                    $cart->update(array(
                        "rowid" => $producto["rowid"],
                        "qty" => $cantidad+1
                    ));
                }
                return redirect()->route('productos');
            }
        }
    
        $cart->insert(array(
            'id'             => $request->getPost('id_producto'),
            'name'           => $request->getPost('nombre_producto'),
            'price'          => $request->getPost('costo_producto'),
            'stock_producto' => $request->getPost('stock_producto'),
            'qty'            => 1
        ));
        $data['titulo']='FORRAJERÍA HABERLES | PRODUCTOS';
        return redirect()->route('productos');
    }
    
    //lista los productos del carrito
    public function panel_carrito(){
        $cart = \Config\Services::cart();
        $cart = array('cart' => $cart);

        $data['titulo']='FORRAJERÍA HABERLES | CARRITO';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('back/carrito/panel_carrito',$cart);
        echo view('footer');
    }
    //elimina un registro (productos) del carrito 
    public function eliminarCarrito(){
        $request = \Config\Services::request();
        $cart = \Config\Services::cart();
        $rowid = $request->getPostGet('rowid');
        $cart ->remove($rowid);

        $data['titulo']='FORRAJERÍA HABERLES | CARRITO';
        return redirect()->route('panel_carrito');
    }
    //elimina todos los productos del carrito 
    public function vaciarCarrito(){
        $cart = \Config\Services::cart();

        $cart->destroy();

        $data['titulo']='FORRAJERÍA HABERLES | CARRITO';
        return redirect()->route('panel_carrito');
    }
    //incrementar la cantidad de unidades de un producto en el carrito +1
    public function sumar_carrito(){
        $cart = \Config\Services::cart();
        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        $cantidadMax = $cart->getItem($this->request->getGet("id"))["stock_producto"];
        
        if($cantidad < $cantidadMax){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad+1
            ));
        }
        return redirect()->route('panel_carrito');
    }
    //disminuye la cantidad de unidades de un producto en el carrito -1
    public function restar_carrito(){
        $cart = \Config\Services::cart();
        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        
        if($cantidad > 1){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad-1
            ));
        }
        return redirect()->route('panel_carrito');
    }
    //guardar los registros del carrito en su tabla de db 
    public function comprar_carrito(){
        $cart = \Config\Services::cart();
        //var_dump($cart->contents());
        
        $productos = $cart->contents();
        $montoTotal = 0;
        foreach($productos as $producto){
            $montoTotal+= $producto["price"] * $producto["qty"];
        }

        $ventaCabecera = new VentaCabecera_model();
        $idFactura = $ventaCabecera->insert(["monto_venta" => $montoTotal, "id_usuario_venta" => session()->id_usuario]);

        $ventaDetalle = new VentaDetalle_model();
        $producto_model = new Productos_model();
        
        foreach($productos as $producto){
            $ventaDetalle->insert(["facturaID_ventaD" => $idFactura, "productoID_ventaD" => $producto["id"],
            "precio_ventaD" => $producto["price"], "cantidad_ventaD" => $producto["qty"]]);
            $producto_model->update($producto["id"], ["stock_producto" => $producto["stock_producto"] - $producto["qty"] ]);
        }


        $cart->destroy();
        return redirect()->route('productos');
    }



}
