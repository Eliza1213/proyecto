<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/alumnoModel.php");
    class categoriasController{
        //creamos un atributo para referenciar al modelo del alumno
        private $categoria;

        public function Llamarcategoria(){
            $vista="app/view/admin/categorias/categoriasIndexView.php";
            include_once("app/view/admin/plantillaView.php");
        }
        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }

            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->categoria= new alumnoModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->categoria->getAll();
                $Nombre=$_SESSION['Nombre'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/alumnos/categoriasIndexView.php";
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
                $vista="app/view/admin/categorias/InsertFormView.php";
                include_once("app/view/admin/plantillaView.php");
            }else{
                header("location:http://localhost/php-3c/");
            }
        }
        
        public function insert(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(!isset($_POST['nombre'],$_POST['apellido'],$_POST['edad'],$_POST['correo'],$_POST['fecha'])){
                    header("location:http://localhost/php-3c");
                }
                $data=array(
                    'Nombre'=>$_POST['Nombre'],
                    'Descripcion'=>$_POST['Descripcion'],
                  
                );
                $alumno= new categoriaModel();
                $resultado=$alumno->insert($data);
                if($resultado){
                    header("location:http://localhost/php-3c/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3c");
                }
            }
        }

        public function callEdditForm(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
            if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    $id=$_GET['id'];
                    $this->alumno=new alumnoModel();
                    $data = $this->alumno->getById($id);
                    $vista="app/view/admin/alumnos/edditForm.php";
                    include_once("app/view/admin/plantillaView.php");
                }
            }else{
                header("location:http://localhost/php-3c");
            }
            
        }

        public function eddit(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $dato=array(
                    'idCategoria'=>$_POST['idCategoria'],
                    'Nombre'=>$_POST['Nombre'],
                    'Descripcion'=>$_POST['Descripcion'],
                    
                );
                $this->alumno= new alumnoModel();
                $respuesta=$this->alumno->eddit($dato);
                if($respuesta){
                    header("location:http://localhost/php-3c/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3c");
                }

            }
        }

        public function delete(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id=$_GET['id'];
                $this->alumno=new alumnoModel();
                $respuesta=$this->alumno->delete($id);
                if($respuesta){
                    header("location:http://localhost/php-3c/?C=alumnoController&M=index");
                }else{
                    header("location:http://localhost/php-3c");
                }
            }
        }

    }

?>