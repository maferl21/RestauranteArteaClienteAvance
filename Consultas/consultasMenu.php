<?php
    include_once("modelo\Conexion.php");
    class Consultas{
        
        // Contar el numero de registro. Regresa sql para que donde se llama se puedan contar los registros
        function contar($consulta){
            $obConexion = new Conexion(); //Objeto de la conexión
            if ($obConexion->conectar()){
                    $resSql = $obConexion->consultaSql($consulta); //resultado de la consulta
                    $obConexion->desconectar(); //desconectar la base de datos
                    $num = $resSql->rowCount(); //contar el numero de registros en una tabla
            }
            return $num;
        }
        

        /*Busca todos los registros del personal hospitalario,
        regresa falso si no hay información o un arreglo de PersonalHospitalario*/
        function consultarPromociones(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, promociones pro WHERE p.id_producto=pro.id_producto  AND p.id_categoria=1 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }

        function consultaDesayunos(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, desayuno de WHERE p.id_producto=de.id_producto  AND p.id_categoria=2 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }

        function consultaAlmuerzo(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, almuerzo al WHERE p.id_producto=al.id_producto  AND p.id_categoria=3 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }

        function consultaBebidas(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, bebidas be WHERE p.id_producto=be.id_producto  AND p.id_categoria=6 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }

        function consultaCena(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, cena ce WHERE p.id_producto=ce.id_producto  AND p.id_categoria=4 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }

        function consultaPostres(){
            $obConexion=new Conexion();
            $sql="";
            $resSql=null;
            $aLinea=null;
            $j=0;
            $oPersHosp=null;
            $arrResultado=false;
                if ($obConexion->conectar()){
                    $sql = "SELECT p.* FROM producto p, postres po WHERE p.id_producto=po.id_producto  AND p.id_categoria=5 ORDER BY p.id_producto";
                    $resSql = $obConexion->consulta($sql);
                    $obConexion->desconectar();
                return $resSql;
            }
        }
    }
?>  