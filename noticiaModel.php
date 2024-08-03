<?php
class noticiaModel{
    //creamos un atributo para conectar con la base de datos
    private $connection;

    //definimos el contructor para la clase 
    public function __construct()
    {
        //requerimos acceso a la clase coneccion 
        require_once("app/config/DBConnection.php");
        //instanciamos la coneccion a la base de datos en $connection
        $this->connection= new DBConnection();
    }

    //creamos el metodo para obtener la lista de alumnos de nuestra base de datos 
    public function getAll(){
        //Paso 1 : Creamos la consulta 
        $consulta="SELECT * FROM usuarios";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $noticias=array();
        //recorremos el dataset para ir sacando los registros 
        while($noticia=$resultado->fetch_assoc()){
            $noticias[]=$noticias;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $noticias;
    }

    public function getById($id_usuario){
        //paso 1
        $consulta="SELECT * FROM usuarios WHERE id_usuarios = $id_usuario";
        //paso 2
        $coneccion = $this->connection->getConnection();
        //paso 3 
        $resultado = $coneccion->query($consulta);
        //paso 4
        if($resultado && $resultado->num_rows > 0){
            $noticia= $resultado->fetch_assoc();
        }else{
            $noticia=false;
        }
        //paso 5
        $this->connection->closeConnection();
        //paso 6
        return $noticia;
    }

    public function delete($ID){
        $consulta="DELETE FROM usuarios WHERE id_usuario= $ID";
        $coneccion=$this->connection->getConnection();
        $resultado= $coneccion->query($consulta);
        $respuesta= $resultado ? true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function insert($data){
        if(!isset($data['nombre'], $data['apaterno'], $data['amaterno'],
                 $data['correo'], $data['passwd'] ))
        {
                return false;
        }
        
        $nombre = $data['nombre'];
        $apaterno = $data['apaterno'];
        $amaterno = $data['amaterno'];
        $correo = $data['correo'];
        $passwd = $data['passwd'];
     

        $consulta = "CALL insertarusuario('$nombre', '$apaterno', '$amaterno','$correo', '$passwd')";
        $coneccion = $this->connection->getConnection();
        $resultado = $coneccion->query($consulta);
        $respuesta = $resultado ? true : false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function eddit($dato){
        if(!isset($dato['id_usuario'], $dato['nombre'], $dato['apaterno'], $dato['amaterno'], $dato['correo'])){
            return false;
        }

        $id_usuario=$dato['id_usuario'];
        $nombre=$dato['nombre'];
        $apaterno=$dato['apaterno'];
        $amaterno=$dato['amaterno'];
        $correo=$dato['correo'];
    

        $consulta="UPDATE usuario SET nombre='$nombre', apaterno='$apaterno', amaterno='$amaterno',
        correo='$correo' WHERE id_usuario=$id_usuario";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }
}
?>