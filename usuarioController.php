<?php
include_once("app/model/usuarioModel.php");

class usuarioController{
    private $usuario;

    public function callLoginForm(){
        if(session_status()===PHP_SESSION_NONE){
            session_start();
        }
        $vista="app/view/admin/loginFormView.php";
        if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
            include_once("app/view/admin/plantilla2View.php");
        else
            include_once("app/view/admin/plantilla2View.php");
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $correo=$_POST['correo'];
            $passwd=$_POST['passwd'];
            $this->usuario=new usuarioModel();
            $respuesta=$this->usuario->getCredentials($correo,$passwd);
            if($respuesta){
                include_once("app/controller/noticiaController.php");
                $noticia=new noticiaController();
                if(session_status()===PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['logedin']=true;
                $_SESSION['nombre']=$respuesta['nombre']. " " .$respuesta['apaterno'];
                $noticia->index() ;
            }else{
                $vista="app/view/admin/errorView.php";
                include_once("app/view/admin/plantilla2View.php");
            }
        }
    }

    public function logedout(){
        if(session_status()===PHP_SESSION_NONE){
            session_start();
            $_SESSION['logedin']=false;
            header("location:http://localhost/proyecto/");
        }

    }
}
?>