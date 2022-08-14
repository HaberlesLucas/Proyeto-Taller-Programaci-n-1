<?php 
namespace App\Controllers;
use App\Models\Consultas_model;
use App\Models\ConsultasNo_user_model;

class Consultas_controller extends BaseController{

    public function consultas(){
        $data['titulo']='FORRAJERÍA HABERLES | PANEL CONSULTAS';
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/consultas/consultas');
        echo view('footer');
    }



    //listar las consultas, leidas y no leidas
    public function panel_consultas(){
        
        $consultas_model = new Consultas_model();
        // * trae todos 
        $consultas = $consultas_model->select("*")->join("usuario", "usuario.id_usuario = consultas.id_usuario")->withDeleted()->findAll();
        
        $data['titulo']='FORRAJERÍA HABERLES | PANEL CONSULTAS'; $data['consultas'] = $consultas;
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/consultas/panel_consultas');
        echo view('footer');
    }
/////////////////////PARA CONSULTAS DE USUARIOS NO REGISTRADOS /////////////////////////////////
    public function panel_consultas_noUser(){
        $consulta_model_noUser = new ConsultasNo_user_model();
        $consulta_model_noUser = $consulta_model_noUser->withDeleted()->findAll();
        $data['titulo']='FORRAJERÍA HABERLES | PANEL CONSULTAS DE USUARIOS NO REGISTRADOS'; $data['consultas'] = $consulta_model_noUser;
         //VISTAS
         echo view('head', $data);
         echo view('nav_encabezado');
         echo view('back/consultas/panel_consultas_noUser');
         echo view('footer');
    }

    //nueva_consulta
    public function nueva_consulta(){
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post = $this->request->getPost();
            $consulta_model = new Consultas_model(); 

            if($consulta_model->save($post)){
                return redirect()->to(base_url('panel_consultas'));
            }
            $data["errores"] = $consulta_model->errors();
        }
        $data['titulo']='FORRAJERÍA HABERLES | CONTACTANOS'; 
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('contacto');
        echo view('footer'); 
    }

    public function nueva_consulta_noUser(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post = $this->request->getPost();
            $consulta_model_noUser = new ConsultasNo_user_model();

            if($consulta_model_noUser->save($post)){
                return redirect()->to(base_url('panel_consultas_noUser')); 
            }
            $data["errores"] = $consulta_model_noUser->errors();
        }
        $data['titulo']='FORRAJERÍA HABERLES | CONTACTANOS';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('contacto');
        echo view('footer');
    }

    public function responder_consulta(){
        $consulta_model = new Consultas_model();
        $consulta_model->delete($this->request->getPostGet('id_consulta')); 
        return redirect()->to(base_url().'/panel_consultas');
    }

    public function responder_consulta_noUser(){
        $consulta_model_noUser = new ConsultasNo_user_model();
        $consulta_model_noUser->delete($this->request->getPostGet('id_no_usuario'));
        return redirect()->to(base_url().'/panel_consultas_noUser');
    }
}