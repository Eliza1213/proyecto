<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/subcategoriaModel.php");
    class subcategoriaController{
        //creamos un atributo para referenciar al modelo del alumno
        private $subcategoria;


        public function Llamarsubcategoria(){
            $vista="app/view/admin/categorias/subcategoriasIndexView.php";
            include_once("app/view/admin/plantillaView.php");
        }

        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }

        

            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->subcategoria= new subcategoriaModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->subcategoria->getAll();
                $nombre=$_SESSION['name'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/subcategorias/subcategoriasIndexView.php";
                //incluimos la plantilla
                include_once("app/view/admin/plantillaview.php");
            } else{
                header("location:http://localhost/proyecto/");
            }
        }

        public function callInsertForm(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                $vista="app/view/admin/alumnos/InsertFormView.php";
                include_once("app/view/admin/plantillaView.php");
            }else{
                header("location:http://localhost/proyecto/");
            }
        }
        
        public function insert(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(!isset($_POST['nombre'],$_POST['Descripcion'],$_POST['idCategoria'])){
                    header("location:http://localhost/proyecto");
                }
                $data=array(
                    'nombre'=>$_POST['nombre'],
                    'Descripcion'=>$_POST['Descripcion'],
                    'idCategoria'=>$_POST['idCategoria']
                   
                );
                $subcategoria= new subcategoriaModel();
                $resultado=$subcategoria->insert($data);
                if($resultado){
                    header("location:http://localhost/proyecto/?C=subcategoriaController&M=index");
                }else{
                    header("location:http://localhost/proyecto");
                }
            }
        }

        public function callEdditForm(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    $id_subcategoria=$_GET['id_subcategoria'];
                    $this->subcategoria=new subcategoriaModel();
                    $data = $this->subcategoria->getById($id_subcategoria);
                    $vista="app/view/admin/alumnos/edditForm.php";
                    include_once("app/view/admin/plantillaView.php");
                }
            }else{
                header("location:http://localhost/proyecto");
            }
            
        }

        public function eddit(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $dato=array(
                    'id_subcategoria'=>$_POST['id_subcategoria'],
                    'nombre'=>$_POST['nombre'],
                    'Descripcion'=>$_POST['Descripcion'],
                    'idCategoria'=>$_POST['idCategoria'],
                  
                );
                $this->subcategoria= new subcategoriaModel();
                $respuesta=$this->subcategoria->eddit($dato);
                if($respuesta){
                    header("location:http://localhost/proyecto/?C=subcategoriaController&M=index");
                }else{
                    header("location:http://localhost/proyecto");
                }

            }
        }

        public function delete(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id_subcategoria=$_GET['id_subcategoria'];
                $this->subcategoria=new subcategoriaModel();
                $respuesta=$this->subcategoria->delete($id_subcategoria);
                if($respuesta){
                    header("location:http://localhost/proyecto/?C=subcategoriaController&M=index");
                }else{
                    header("location:http://localhost/proyecto");
                }
            }
        }

    }

?>