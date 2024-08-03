<?php
    //incluimos el modelo para poder instancialrlo dentro del controlaxor 
    include_once("app/model/noticiaModel.php");
    class noticiaController{
        //creamos un atributo para referenciar al modelo del alumno
        private $noticia;

    

    public function LlamarFormularioLogin(){
            $vista="app/view/admin/loginFormView.php";
            include_once("app/view/admin/plantilla2View.php");
        }

        public function llamarusuario(){
            $vista="app/view/admin/noticiasIndexView.php";
            include_once("app/view/admin/plantilla2View.php");
        }

  
   
        public function index(){
            if(session_status()===PHP_SESSION_NONE){
                session_start();
            }
        

       
            if( isset($_SESSION['logedin']) && $_SESSION['logedin']==true){
                //instanciamos el modelo de alumno
                $this->noticia= new noticiaModel();
                //obtenemos la informacion a trabajar dentro de la vista 
                $datos = $this->noticia->getAll();
                $nombre=$_SESSION['nombre'];
                //definimos la vista a mostrar dentro de la plantilla
                $vista= "app/view/admin/noticias/noticiasIndexView.php";
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
                $vista="app/view/admin/noticias/insertFormView.php";
                include_once("app/view/admin/plantillaView.php");
            }else{
                header("location:http://localhost/proyecto/");
            }
        }
        
        public function insert(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(!isset($_POST['nombre'],$_POST['apaterno'],$_POST['amaterno'],
                $_POST['correo'],$_POST['passwd'])){
                    header("location:http://localhost/proyecto");
                }
                $data=array(
                    'nombre'=>$_POST['nombre'],
                    'apaterno'=>$_POST['apaterno'],
                    'amaterno'=>$_POST['amaterno'],
                    'correo'=>$_POST['correo'],
                    'passwd'=>$_POST['passwd']
                );
                $noticia= new noticiaModel();
                $resultado=$noticia->insert($data);
                if($resultado){
                    header("location:http://localhost/proyecto/?C=usuarioController&M=index");
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
                    $id_usuario=$_GET['id_usuario'];
                    $this->usuario=new noticiaModel();
                    $data = $this->usuario->getById($ID);
                    $vista="app/view/admin/noticias/edditForm.php";
                    include_once("app/view/admin/plantillaView.php");
                }
            }else{
                header("location:http://localhost/proyecto");
            }
            
        }

        public function eddit(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $dato=array(
                    'id_usuario'=>$_POST['id_usuario'],
                    'nombre'=>$_POST['nombre'],
                    'apaterno'=>$_POST['apaterno'],
                    'amaterno'=>$_POST['amaterno'],
                    'correo'=>$_POST['correo'],
                    'passwd'=>$_POST['passwd'],
                );
                $this->alumno= new noticiaModel();
                $respuesta=$this->alumno->eddit($dato);
                if($respuesta){
                    header("location:http://localhost/proyecto/?C=noticiaController&M=index");
                }else{
                    header("location:http://localhost/proyecto");
                }

            }
        }


        public function delete(){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $id_usuario=$_GET['id_usuario'];
                $this->usuario=new noticiaModel();
                $respuesta=$this->usuario->delete($ID);
                if($respuesta){
                    header("location:http://localhost/proyecto/?C=noticiaController&M=index");
                }else{
                    header("location:http://localhost/proyecto");
                }
            }
        }

    }

   