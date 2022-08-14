<?php

namespace App\Models;

use CodeIgniter\Model;

class Productos_model extends Model{
    protected $table      = 'productos';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_categoria','nombre_producto','marca_producto', 'costo_producto', 'codigo_producto', 'stock_producto', 'descripcion_producto', 'img_producto', 'categoria_producto', 'activo'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'activo'; //baja de producto


 
    // protected $validationMessages=[
    //     "nombre_producto"       => ["required" => "Nombre del producto es obligatorio"],
    //     "marca_producto"        => ["required" => "Marca del producto es obligatorio"],
    //     "costo_producto"        => ["required" => "Costo del producto es obligatorio"],
    //     "codigo_producto"       => ["required" => "Código del producto es obligatorio"],
    //     "descripcion_producto"  => ["required" => "Descripción del producto es obligatorio"],
    //     "stock_producto"        => ["required" => "Stock del producto es obligatorio"],
    //     "img_producto"          => ["required" => "La imagen del producto es obligatoria"]
    // ];
    protected $skipValidation     = false;
}