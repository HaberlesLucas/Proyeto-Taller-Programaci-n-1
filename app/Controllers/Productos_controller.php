<?php
namespace App\Controllers;
use App\Models\Productos_model;
use App\Models\Categoria_model;

class Productos_Controller extends BaseController{
     
    public function panel_productos(){
        $productos = new Productos_model();
        $productos = $productos->findAll();
        $data['titulo']='FORRAJERÍA HABERLES | PANEL PRODUCTOS'; $data['datos'] = $productos;
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/productos/panel_productos');
        echo view('footer');
    }

    //nuevo producto
    public function nuevo(){
        // $dato_categoria = new Categoria_model();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $post = $this->request->getPost();
            $producto_model = new Productos_model();

            if($producto_model->save($post)){
                //si guardo retornar al panel
                return redirect()->route('back/productos/panel_productos');
            }
            $data["errores"] = $producto_model->errors();
        }
        $data['titulo']='FORRAJERÍA HABERLES | ALTAS DE PRODUCTOS';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('back/productos/nuevo');
        echo view('footer'); 
    }

    public function insertar(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $producto_model = new Productos_model();
            // $dato_categoria = new Categoria_model();
            $img_nueva = $this->request->getFile('img_producto');
            
            $validacion = $this->validate([
                "categoria_producto" => "required",
                "nombre_producto" => "required",
                "marca_producto" => "required",
                "costo_producto" => "required",
                "codigo_producto" => "required",
                "descripcion_producto" => "required",
                "stock_producto" => "required",
                "img_producto" => "uploaded[img_producto]|max_size[img_producto,4096]|is_image[img_producto]"
            ], 
            [   "categoria_producto" => [
                    "required" => "Debe ingresar una categoria"
                ],
                "nombre_producto" => [
                    "required" => "Debe ingresar un nombre"
                ],
                "marca_producto" => [
                    "required" => "Debe ingresar una marca"
                ],
                "costo_producto" => [
                    "required" => "Debe ingresar un costo"
                ],
                "codigo_producto" => [
                    "required" => "Debe ingresar un código"
                ],
                "descripcion_producto" => [
                    "required" => "Debe ingresar una descripción"
                ],
                "stock_producto" => [
                    "required" => "Debe ingresar un stock"
                ],
                "img_producto" => ["uploaded"=>"Debe ingresar una imagen","max_size"=>"Tamaño máximo alcanzado","is_image"=>"Debe ingresar algun tipo de imagen válido"]
            ]);
            
            if($validacion){
                $var_datos = $this->request->getPost();
                $name_img = $img_nueva->getRandomName();
                $var_datos ['img_producto'] = $name_img;
                $producto_model->save($var_datos);
                $img_nueva->move(ROOTPATH .'assets/uploads', $name_img); 
                session()->setFlashdata('success', 'Producto añadido 😊');
                return redirect()->to(base_url('panel_productos'));
                
            }else{
                $datos["errores"] = $this->validator->getErrors();
                $data['titulo']='ERROR';
                session()->setFlashdata('success', 'Producto No anadido 😬');
                echo view('head', $data); 
                echo view('nav_encabezado');
                echo view('back/productos/nuevo', $datos);
                echo view('footer');
            }
        }
    }
    
    public function eliminar(){
        $producto_model = new Productos_model();
        $producto_model->delete($this->request->getPostGet('id_producto'));
        return redirect()->to(base_url().'/panel_productos');
    }

    public function actualizar(){
        $producto_model = new Productos_model();
        $datos = $this->request->getPost();
        $img_nueva = $this->request->getFile('img_producto');
       
        if($img_nueva->isValid()){
            $datos ['img_producto'] = $img_nueva->getName();
            $img_nueva->move(ROOTPATH.'assets/uploads');
        }

        $id_modificar = $producto_model->where('id_producto', $this->request->getPost('id_producto'))->first();
        $producto_model->update($id_modificar, $datos);
        return redirect()->to(base_url('panel_productos'));
    }

    public function editar(){
        $data['titulo']='FORRAJERÍA HABERLES | EDITAR PRODUCTO';
        $idProducto = $this->request->getPostGet('id_producto');
        $productos = new Productos_model();
        $datos =array('datos' => $productos->where('id_producto',$this->request->getPostGet('id_producto'))->first());
        return view('head', $data).view('nav_encabezado').view('back/productos/editar', $datos).view('footer');
    }

    public function eliminados($activo = 0){
        $productos = new Productos_model();
        $productos = $productos->onlyDeleted()->findAll();
        $data=['titulo'=>'FORRAJERÍA HABERLES | PRODUCTOS ELIMINADOS', 'datos' => $productos];
        //VISTAS
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('back/productos/eliminados');
        echo view('footer');
    }

    public function restaurar(){
        $producto_model = new Productos_model();
        $activo = ['activo'=> NULL];
        $producto_model->update($this->request->getPostGet('id_producto'),$activo);
        return redirect()->to(base_url().'/eliminados');
    }
    //para enlazar los productos al catalogo
    public function catalogoProductos(){
        $productosModel = new Productos_model();
        $productos = $productosModel->findAll();
        $arrayProductos = [ 'productos' => $productos];
        $data['titulo'] = 'FORRAJERÍA HABERLES | PRODUCTOS';
        //VISTAS 
        echo view('head', $data);
        echo view('nav_encabezado');
        echo view('productos', $arrayProductos);
        echo view('footer');
    }
    //para poder filtrar los productos seleccionados por una determinada categoría
    public function productosFiltrados(){
        $producto_model = new Productos_model();
        $categoria_model = new Categoria_model();

        $id_categoriaF = $this->request->getPost("categoria_producto");
        if($id_categoriaF ){
            $productosFiltrados['productos'] = $producto_model->where("categoria_producto", $id_categoriaF)->find();
        }else{
            $productosFiltrados['productos'] = $producto_model->find();
        }
        $productosFiltrados['categorias'] = $categoria_model->findAll();
 
        $data['titulo']='FORRAJERÍA HABERLES | PRODUCTOS FILTRADOS';
        echo view('head', $data); 
        echo view('nav_encabezado');
        echo view('productos', $productosFiltrados);
        echo view('footer');
    }
}
