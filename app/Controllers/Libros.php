<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller{

    public function index(){
        $libro = new Libro(); //incluir el modelo
        $datos['libros']=$libro->orderBy('id', 'ASC')->findAll();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/listar', $datos);
    }

    public function crear(){
        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/crear', $datos);
    }

    public function guardar(){
        $libro = new Libro();
        //Validaciones
        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]',
            'imagen' =>[
                'uploaded[imagen]',
                'mime_in[imagen, image/jpg, image/jpeg, image/png]',
                'max_size[imagen, 1024]',
            ]
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Revise la información');

            return redirect()->back()->withInput();
            //return $this->response->redirect(site_url('/listar'));
        }

        //Adjuntar una imagen a la base de datos
        if($imagen=$this->request->getFile('imagen')){
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre); //lugar donde se subiran las imagenes
            $datos=[
                'nombre'=>$this->request->getVar('nombre'),
                'imagen'=>$nuevoNombre
            ];
            $libro->insert($datos);
        }
        //print_r($nombre);
        //echo "Ingresado a la BD";
        return $this->response->redirect(site_url('/listar'));//redireccionamos a la lista
    }

    public function borrar($id=null){
        $libro = new Libro();
        //Busco informacion en un id que coincida con el id solicitado
        $datosLibro = $libro->where('id', $id)->first();

        $ruta = ('../public/uploads/'.$datosLibro['imagen']);
        unlink($ruta); //borra el archivo que esta en dicha ruta
        //echo "Borrar registro".$id;

        $libro->where('id', $id)->delete($id);//borrado en la base de datos con el id enviado

        return $this->response->redirect(site_url('/listar'));//redireccionamos a la lista
    }   

    public function editar($id=null){
        //print_r($id);
        $libro = new Libro();

        $datos['libro']=$libro->where('id', $id)->first();

        $datos['cabecera']= view('template/cabecera');
        $datos['pie']= view('template/piepagina');

        return view('libros/editar', $datos);
    }

    public function actualizar(){
        $libro = new Libro();
        $datos=[
            'nombre'=>$this->request->getVar('nombre')            
        ];
        $id = $this->request->getVar('id');

        $validacion = $this->validate([
            'nombre' => 'required|min_length[3]'           
        ]);

        if(!$validacion){
            $session = session();
            $session->setFlashdata('mensaje', 'Revise la información');
            return redirect()->back()->withInput();
        }

        $libro->update($id, $datos);

        $validacion = $this->validate([
            'imagen' =>[
                'uploaded[imagen]',
                'mime_in[imagen, image/jpg, image/jpeg, image/png]',
                'max_size[imagen, 1024]',
            ]
        ]);

        if($validacion){
            if($imagen=$this->request->getFile('imagen')){
                $datosLibro=$libro->where('id', $id)->first();//recupero la informacion

                $ruta = ('../public/uploads/'.$datosLibro['imagen']);//armo la ruta donde esta esa imagen
                unlink($ruta); //hago el borrado de la imagen vieja

                //Actualizo con la imagen nueva
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre); //lugar donde se subiran las imagenes

                $datos=['imagen'=>$nuevoNombre];
                $libro->update($id, $datos);
            }
        }

        return $this->response->redirect(site_url('/listar'));
    }

}