<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class administrador implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        // si no esta logueado o el perfil es 2 YYYY si perfil es distinto a 1, no podrá acceder a las rutas del administrador
        if((!session()->logueado == 'true' || session()->perfil_id_usuario == 2 ) && session()->perfil_id_usuario !== 1){
            
            return redirect()->to(base_url('#')); //si solicita una ruta inhabilitado, solo refresca a la pagina inicial
                /*tambien se lo puede dirigir a iniciar sesion, pero si está logueado entra en una incognita, 
                "¿como me manda a iniciar sesion si yo (cliente) ya inicié sesión?", entonces, mejor solo mandar a la pagina inicial*/
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    } 
}
