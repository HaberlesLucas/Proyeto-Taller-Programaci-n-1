<?php
namespace App\Models;
use CodeIgniter\Model; 

class ConsultasNo_user_model extends Model{

    protected $table      = 'consulta_nousuario';
    protected $primaryKey = 'id_no_usuario';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nombre_no_usuario', 'apellido_no_usuario', 'telefono_no_usuario','email_no_usuario','descripcion_no_usuario','fecha_no_usuario','respondido'];
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'respondido'; //baja

    protected $validationRules=[
        "nombre_no_usuario"         => "required",
        "apellido_no_usuario"       => "required",
        "telefono_no_usuario"       => "required",
        "email_no_usuario"          => "required",
        "descripcion_no_usuario"    => "required"
    ];
 
    protected $validationMessages=[
        "nombre_no_usuario"         => ["required" => "Nombre es obligatorio para la consulta"],
        "apellido_no_usuario"       => ["required" => "Apellido es obligatorio para la consulta"],
        "telefono_no_usuario"       => ["required" => "Telefono es obligatorio para la consulta"],
        "email_no_usuario"          => ["required" => "Correo es obligatorio para la consulta"],
        "descripcion_no_usuario"    => ["required" => "Descripcion es obligatorio para la consulta"],
    ];
    protected $skipValidation = false;
}