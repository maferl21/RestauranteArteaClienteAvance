<?php
    error_reporting(E_ALL);
    class Conexion{
        private $oConexion=null; //conexión

        /*Realiza la conexión a la base de datos*/
        function conectar(){
            $bRet = false;
                try{
                    //$this->oConexion = new PDO("pgsql:dbname=ejhospdb; host=localhost; user=hospital; password=hospital1"); 
                    $this->oConexion = new PDO("mysql:host=localhost;dbname=restauranteartea","root","",  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")); 
                    $bRet = true;
                }catch(Exception $e){
                    throw $e;
                }
            return $bRet;
        }
            
        /*Realiza la desconexión de la base de datos*/
        function desconectar(){
            $bRet = true;
                if ($this->oConexion != null){
                    $this->oConexion=null;
                }
            return $bRet;
        }

        /*Ejecuta en la base de datos la consulta que recibió por parámetro.
		Regresa
			Nulo si no hubo datos
			Un arreglo bidimensional de n filas y tantas columnas como campos se hayan
			solicitado en la consulta*/
      	function consulta($consulta){
            $arrRS = null;
            $rst = null;
            $oLinea = null;
            $sValCol = "";
            $i=0;
            $j=0;
            if ($consulta == ""){
               throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
            }
            if ($this->oConexion == null){
                throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
            }
            try{
                $rst = $this->oConexion->query($consulta); //un objeto PDOStatement o falso en caso de error
            }catch(Exception $e){
                throw $e;
            }
            if ($rst){
                foreach($rst as $oLinea){ 
                    foreach($oLinea as $llave=>$sValCol){
                        if (is_string($llave)){
                            $arrRS[$i][$j] = $sValCol;
                            $j++;
                        }
                    }
                    $j=0;
                    $i++;
                }
            }
            return $arrRS;
        }

            //Regresa sql para que donde se llama se puedan contar los registros
            function consultaSql($consulta){
                // $arrRS = null;
                $rst = null;
                if ($consulta == ""){
                   throw new Exception("Conexion->contar: falta indicar la consulta");
                }
                if ($this->oConexion == null){
                    throw new Exception("Conexion->contar: falta conectar la base");
                }
                try{
                    $rst = $this->oConexion->query($consulta); //un objeto PDOStatement o falso en caso de error
                }catch(Exception $e){
                    throw $e;
                }
                return $rst;
            }
    }
?>