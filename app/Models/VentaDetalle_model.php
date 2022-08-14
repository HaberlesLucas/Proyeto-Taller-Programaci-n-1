<?php
 
namespace App\Models;

use CodeIgniter\Model;

class VentaDetalle_model extends Model{

    protected $table      = 'venta_detalle';
    protected $primaryKey = 'id_ventaD';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['facturaID_ventaD', 'productoID_ventaD', 'precio_ventaD', 'cantidad_ventaD'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = ''; //baja

}