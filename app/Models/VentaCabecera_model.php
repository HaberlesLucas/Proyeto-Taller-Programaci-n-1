<?php
 
namespace App\Models;

use CodeIgniter\Model;

class VentaCabecera_model extends Model
{
    protected $table      = 'venta_cabecera';
    protected $primaryKey = 'id_venta';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['monto_venta', 'id_usuario_venta'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = ''; //baja

}