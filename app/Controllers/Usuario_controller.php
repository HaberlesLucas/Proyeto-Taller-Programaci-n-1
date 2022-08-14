<?php 
namespace App\Controllers;
use App\Models\Usuario_model;

class Usuario_controller extends BaseController{
    
    public function panel_usuarios(){
        $usuarios = new Usuario_model();
        $usuarios = $usuarios->findAll();
        $data['titulo']='FORRAJERÍA HABERLES | PANEL USUARIOS'; $data['datos'] = $usuarios;
         //VISTAS
         echo view('head', $data);
         echo view('nav_encabezado');
         echo view('back/usuario/panel_usuarios');
         echo view('footer');
    }
    
    //nuevo
    public function registro(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post = $this->request->getPost();
            if($post ['password_usuario'] != ''){
                $post ['password_usuario'] = password_hash($post ['password_usuario'], PASSWORD_BCRYPT); //hash
            }
            $usuario_model = new Usuario_model();
            if($id_usuario = $usuario_model->save($post)){
                 
                session()->set([
                    'id_usuario' => $id_usuario,
                    'email_usuario' => $post["email_usuario"],
                    'logueado' => true
                ]);
                return redirect()->route('index');
            }//intenta guardar 
            $data["errores"] = $usuario_model->errors();
            // var_dump($data["errores"]);
        } 

        $data['titulo']='FORRAJERÍA HABERLES | REGISTRO';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('back/usuario/registro', $data);
        echo view('footer'); 
    }
    ///AÑADIR UN USUARIO SIENDO ADMINISTRADOR
    public function agregar_usuario(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $usuario_model = new Usuario_model();

            $post = $this->request->getPost();
            if($post ['password_usuario'] != ''){
                $post ['password_usuario'] = password_hash($post ['password_usuario'], PASSWORD_BCRYPT); //hash
            }
            
            if($usuario_model->save($post)){
                return redirect()->route('panel_usuarios');
            }
            $data["errores"] = $usuario_model->errors();
            // var_dump($data["errores"]);
        } 
        $data['titulo']='FORRAJERÍA HABERLES | REGISTRO';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('back/usuario/agregar_usuario', $data);
        echo view('footer'); 
    }

    //inicio sesion
    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            $validacion = $this->validate([
                "usuario_usuario" => "required",
                "password_usuario" => "required"
            ],
            [
                "usuario_usuario" => [
                    "required" => "Debe ingresar un usuario"
                ],
                "password_usuario" => [
                    "required" => "Debe ingresar una contraseña"
                ]
            ]); 
            if($validacion){
                $usuario_model = new Usuario_model();
                $datos["usuario"] = $usuario_model->validarUsuario($_POST["usuario_usuario"], $_POST["password_usuario"] );
                if($datos["usuario"]){
                    //Inicia la sesión 
                    
                    session()->set([
                        'id_usuario' => $datos["usuario"]->id_usuario,
                        'nombre_usuario' => $datos["usuario"]->nombre_usuario,
                        'email_usuario' => $datos["usuario"]->email_usuario,
                        'perfil_id_usuario' => $datos["usuario"]->perfil_id_usuario,
                        'logueado' => true
                    ]);
                
                    return redirect()->route("index");
                }else{
                    $datos["errores"]["password_usuario"] = "Datos invalidos";
                }
            }else{
                $datos["errores"] = $this->validator->getErrors();
            }
        }
        $datos['titulo']='FORRAJERÍA HABERLES | INICIO SESIÓN';
        echo view('head', $datos); 
        echo view('nav_encabezado');
        echo view('back/usuario/login', $datos);
        echo view('footer');
    }
    //cierre sesion 
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('').'/index');
    }

    /////////////////////////////////////////////////////////////////////////////////
    public function eliminar_user(){
        $usuario_model = new Usuario_model();
        $usuario_model->delete($this->request->getPostGet('id_usuario'));
        return redirect()->to(base_url().'/panel_usuarios');
    }

    public function actualizar_user(){
        $usuario_model = new Usuario_model();
        $id_modificar = $usuario_model->where('id_usuario', $this->request->getPost('id_usuario'))->first();
        $data_actualizada = array(
            'nombre_usuario' => $this->request->getPost('nombre_usuario'),
            'apellido_usuario' => $this->request->getPost('apellido_usuario'),
            'email_usuario' => $this->request->getPost('email_usuario'),
            'perfil_id_usuario' => $this->request->getPost('perfil_id_usuario')
        );

        $data_actualizada ['id_usuario'] = $usuario_model->find($this->request->getPost('id_usuario'));
        $usuario_model->save($data_actualizada);
        return redirect()->to(base_url('panel_usuarios'));
    }

    public function editar_user(){
        $data['titulo']='FORRAJERÍA HABERLES | EDITAR USUARIO';
        $idUsuario = $this->request->getPostGet('id_usuario');
        
        $usuario = new Usuario_model();
        $datos =array('datos' => $usuario->where('id_usuario',$this->request->getPostGet('id_usuario'))->first());

        return view('head', $data).view('nav_encabezado').view('back/usuario/editar_user', $datos).view('footer');
    } 

    public function eliminados_user($baja_usuario = 0){
        $usuarios = new Usuario_model();
        $usuarios = $usuarios->onlyDeleted()->findAll();
        $data=['titulo'=>'FORRAJERÍA HABERLES | USUARIOS ELIMINADOS', 'datos' => $usuarios];
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/usuario/eliminados_user');
        echo view('footer');
    }

    public function restaurar_user(){
        $usuario_model = new Usuario_model();
        $baja_usuario = ['baja_usuario'=> NULL];
        $usuario_model->update($this->request->getPostGet('id_usuario'),$baja_usuario);
        return redirect()->to(base_url().'/eliminados_user');
    }
}
