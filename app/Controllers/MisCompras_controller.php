<?php   
namespace App\Controllers;
use App\Models\VentaCabecera_model;
use App\Models\VentaDetalle_model;
use App\Models\Productos_model;

class MisCompras_controller extends BaseController{
    
    public function ver_compras(){
        $ventaD_model = new VentaDetalle_model();
        //select -> para ver solo los detalles de lo que se le pasa por parametro 
        //->select('nombre_producto, img_producto, precio_ventaD, cantidad_ventaD')
        $detalle = $ventaD_model
        ->join('productos', 'id_producto = productoID_ventaD')
        ->join('venta_cabecera', 'id_venta = facturaID_ventaD')->where('id_usuario_venta', session()->id_usuario)->findAll();
        // var_dump($detalle);

        $data['titulo']='FORRAJERÍA HABERLES | PANEL MIS COMPRAS'; $data['detalles'] = $detalle;
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/usuario/panel_compraDetalle');
        echo view('footer');
    }
}