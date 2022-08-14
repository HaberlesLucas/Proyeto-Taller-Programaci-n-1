<?php

namespace App\Models;

use CodeIgniter\Model;

class Consultas_model extends Model{ 

    protected $table      = 'consultas';
    protected $primaryKey = 'id_consulta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_usuario','nombre_consulta', 'email_consulta', 'celular_consulta', 'descripcion_consulta', 'fecha_consulta', 'respondido'];
 
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'respondido'; //baja

    protected $validationRules=[
        "celular_consulta"      => "required",
        "descripcion_consulta"  => "required"
    ];
 
    protected $validationMessages=[
        "celular_consulta"          => ["required" => "Celular en la consulta es obligatorio"],
        "descripcion_consulta"      => ["required" => "Descripción en la consulta es obligatorio"]
    ];
    protected $skipValidation     = false;
} 