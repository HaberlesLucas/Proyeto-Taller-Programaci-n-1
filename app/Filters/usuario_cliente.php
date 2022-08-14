<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class usuario_cliente implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null){
        if(session()->perfil_id_usuario !== 2){
            return redirect()->route('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){

    }
}