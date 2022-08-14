<?php
namespace App\Models;
use CodeIgniter\Model; 

class Usuario_model extends Model{
	protected $table = 'usuario';
	protected $primaryKey = 'id_usuario';
	protected $allowedFields = ['nombre_usuario', 'apellido_usuario', 'email_usuario', 'usuario_usuario', 'password_usuario', 'perfil_id_usuario', 'baja_usuario'];

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

	protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = 'baja_usuario'; //baja de user

	protected $skipValidation = false;

	protected $validationRules=[
		"nombre_usuario" => "required",
		"apellido_usuario" => "required",
		"email_usuario" => "required|valid_email",
		"usuario_usuario" => "required|min_length[3]",
		"password_usuario" => "required|min_length[8]"
	];
 
	protected $validationMessages=[
		"nombre_usuario" => [ "required" => "Nombre es obligatorio"],
		"apellido_usuario" => [ "required" => "Apellido es obligatorio"],
		"email_usuario" => [ "required" => "Correo es obligatorio", "valid_email" => "Debes ingresar un correo valido"],
		"usuario_usuario" => [ "required" => "Usuario es obligatorio", "min_length" => "Usuario debe ser de longitud mayor a 2 caracteres"],
		"password_usuario" => [ "required" => "Contraseña es obligatorio", "min_length" => "Contraseña debe ser de longitud 8 o más caracteres"]
	];

	public function validarUsuario($usuario, $password){
        $db      = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->where("usuario_usuario", $usuario); //buscar usuario

        $query = $builder->get(); //manda consulta bd
        $usuario = $query->getResult(); //respuesta de la consulta (array)

        //primera pos de array
        if($usuario){
            $usuario = $usuario[0];
        }else{
            return false; 
        }
		//verifica la contraseña
        if(password_verify($password, $usuario->password_usuario) ){
            return $usuario;
        }else{
            return false;
        }
    }
 
}