<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Productos_model;
use App\Models\VentaCabecera_model;
use App\Models\VentaDetalle_model;
 
class Ventas_controller extends BaseController{
 
    public function panel_ventas(){
        $ventas_model = new VentaCabecera_model();
        // * trae todos 
        $ventas = $ventas_model->select("*")->join("usuario", "usuario.id_usuario = venta_cabecera.id_usuario_venta")->findAll();

        //VISTAS
        $data['titulo']='FORRAJERÍA HABERLES | PANEL VENTAS'; $data['ventas'] = $ventas;
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/ventas/panel_ventas');
        echo view('footer');
    }
    public function panel_detalle(){
        $ventasDetalle_model = new VentaDetalle_model();
        // * trae todos 
        $id_detalle = $this->request->getGet('id');
        $ventas = $ventasDetalle_model->select("*")->join("productos", "productos.id_producto = venta_detalle.productoID_ventaD")->where("facturaID_ventaD", $id_detalle)->findAll();
        //$ventas = $ventasDetalle_model->select("*")->join()->where("venta_detalle", $facturaID_ventaD)->find();

        //VISTAS
        $data['titulo']='FORRAJERÍA HABERLES | PANEL DETALLE VENTAS'; $data['ventas'] = $ventas;
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/ventas/panel_detalle');
        echo view('footer');
    }

}