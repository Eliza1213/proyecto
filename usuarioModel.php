<?php
    class usuarioModel{
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

        public function getCredentials($correo, $passwd){
            $consulta="SELECT * FROM usuarios WHERE 
            correo='$correo' AND passwd='$passwd'";
            $coneccion= $this->connection->getConnection();
            $resultado=$coneccion->query($consulta);
            $respuesta=$resultado->num_rows>=1?$resultado->fetch_assoc():false;
            $this->connection->closeConnection();
            return $respuesta;
        }
    }
?>