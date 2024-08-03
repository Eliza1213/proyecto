<?php
class alumnoModel{
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
        $consulta="SELECT * FROM subcategorias";
        //Paso 2 : Conectamos con la base de datos 
        $coneccion= $this->connection->getConnection();
        //paso 3 : ejecutar la consulta 
        $resultado= $coneccion->query($consulta);
        //paso 4: preparar mi resultado
        //crear un arreglo para almacenar todos los registros 
        $subcategorias=array();
        //recorremos el dataset para ir sacando los registros 
        while($subcategoria=$resultado->fetch_assoc()){
            $subcategorias[]=$subcategroia;
        }
        //Paso 5 :cerramos la coneccion 
        $this->connection->closeConnection();
        //paso 6 : Arrojar resultados
        return $subcategorias;
    }

    public function getById($id_subcategoria){
        //paso 1
        $consulta="SELECT * FROM subcategoria WHERE id_subcategoria = $id_subcategoria";
        //paso 2
        $coneccion = $this->connection->getConnection();
        //paso 3 
        $resultado = $coneccion->query($consulta);
        //paso 4
        if($resultado && $resultado->num_rows > 0){
            $subcategoria= $resultado->fetch_assoc();
        }else{
            $subcategoria=false;
        }
        //paso 5
        $this->connection->closeConnection();
        //paso 6
        return $subcategoria;
    }

    public function delete($id_subcategoria){
        $consulta="DELETE FROM subcategorias WHERE id_subcategoria= $id";
        $coneccion=$this->connection->getConnection();
        $resultado= $coneccion->query($consulta);
        $respuesta= $resultado ? true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function insert($data){
        if(!isset($data['nombre'],$data['Descripcion'],$data['idCategoria'])){
            return false;
        }
        
        $nombre=$data['nombre'];
        $Descripcion=$data['Descripcion'];
        $idCategoria=$data['idCategoria'];
       

        $consulta="INSERT INTO subcategorias (nombre, Descripcion,idCategorias)
        VALUES ('$nombre', '$Descripcion', $idCategoria)";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }

    public function eddit($dato){
        if(!isset($dato['id_subcategoria'], $dato['nombre'], $dato['Descripcion'], $dato['idCategoria'])){
            return false;
        }

        $id_subcategoria=$dato['id_subcategoria'];
        $nombre=$dato['nombre'];
        $Descripcion=$dato['Descripcion'];
        $idcategoria=$dato['idcategoria'];

        $consulta="UPDATE subcategoria SET nombre='$nombre', Descripcion='$Descripcion', 
        idcategoria='$idcategoria' WHERE id_subcategoria=$id_subcategoria";
        $coneccion=$this->connection->getConnection();
        $resultado=$coneccion->query($consulta);
        $respuesta=$resultado?true:false;
        $this->connection->closeConnection();
        return $respuesta;
    }
}
?>