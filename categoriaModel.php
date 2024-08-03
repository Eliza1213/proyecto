<?php
class categoriaModel{
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
        $consulta="SELECT * FROM categoria";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $categorias=array();
        //recorremos el dataset para ir sacando los registros 
        while($categoria=$resultado->fetch_assoc()){
            $categorias[]=$categoria;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $categorias;
    }

    public function getById($idcategoria){
        //paso 1
        $consulta="SELECT * FROM categoria WHERE idCategoria = $idCategoria";
        //paso 2
        $coneccion = $this->connection->getConnection();
        //paso 3 
        $resultado = $coneccion->query($consulta);
        //paso 4
        if($resultado && $resultado->num_rows > 0){
            $categoria= $resultado->fetch_assoc();
        }else{
            $categoria=false;
        }
        //paso 5
        $this->connection->closeConnection();
        //paso 6
        return $categoria;
    }

    public function delete($idCategoria){
        $consulta="DELETE FROM categoria WHERE categoria= $idCategoria";
        $coneccion=$this->connection->getConnection();
        $resultado= $coneccion->query($consulta);
        $respuesta= $resultado ? true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function insert($data){
        if(!isset($data['Nombre'],,$data['Descripcion'])){
            return false;
        }
        
        $Nombre=$data['Nombre'];
        $Descripcion=$data['Descripcion'];
        

        $consulta="INSERT INTO categoria (Nombre, Descripcion)
        VALUES ('$Nombre', '$Descripcion')";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function eddit($dato){
        if(!isset($dato['idCategoria'], $dato['Nombre'], $dato['Descripcion'])){
            return false;
        }

        $id=$dato['idCategoria'];
        $nombre=$dato['Nombre'];
        $Descripcion=$dato['Descripcion'];
     

        $consulta="UPDATE categoria SET Nombre='$Nombre', Descripcion='$Descripcion' WHERE idCategoria=$id";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }
}
?>