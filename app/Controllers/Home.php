<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='FORRAJERÍA HABERLES | INICIO';
        echo view('head', $data); 
        echo view('nav_encabezado'); //
        echo view('pag_principal'); //
        echo view('footer');
    }
    public function contacto(){
        $data['titulo']='FORRAJERÍA HABERLES | CONTACTO';
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('contacto');
        echo view('footer');
    }
    public function quienes_somos(){
        $data['titulo']='FORRAJERÍA HABERLES | QUIÉNES SOMOS';
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('quienes_somos');
        echo view('footer');
    }
    
    public function comercializacion(){
        $data['titulo']='FORRAJERÍA HABERLES | COMERCIALIZACIÓN';
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('comercializacion');
        echo view('footer');
    }
    public function productos(){
        $data['titulo']='FORRAJERÍA HABERLES | PRODUCTOS';
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('productos');
        echo view('footer');
    }
    public function tercond(){
        $data['titulo']='FORRAJERÍA HABERLES | TÉRMINOS Y CONDICIONES';
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('tercond');
        echo view('footer');
    }

    //para que al referenciar a una pag no desarrollada muestre el error 404
    public function error(){
        echo view('error_404');
    }
}