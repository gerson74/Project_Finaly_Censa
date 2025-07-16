<?php
class Conexion {
    public function _construct(){}
    public function _destruct(){}

    public function conectar(){
        include_once "Configuracion.php";
        $con=null;
        try{
       $con=new PDO("mysql:localhost=".HOST.":81;dbname=".DB.";charset=utf8",USUARIO,CLAVE);
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
        } 
        
        catch(PDOException $ex ){
				echo "BASE DE DATOS INCORRECTA".$ex->getMessage();
               
			}

        return $con;

    }

}


?> 