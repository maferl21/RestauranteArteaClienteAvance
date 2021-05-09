<head>
    <link rel="stylesheet" type="text/css" href="css/styleProm.css"> 
    <script src="https://kit.fontawesome.com/b965409e0d.js" crossorigin="anonymous"></script>
</head>

<?php
    include_once("Consultas\consultasMenu.php");
    include_once("menu.html");
	
    $obProm = new Consultas();

    try{
        $prom=$obProm->consultaBebidas();
    }catch(Exception $e){
        //Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
        error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
        $sErr = "Error en base de datos, comunicarse con el administrador";
    }
?>
    <!-- FALTA HACER QUE EL BOTON CAMBIE -->
    <!-- CUANDO SE SELECCIONE DEBE DE CAMBIAR SU FORMATO, INVESTIGAR COMO HACERLO -->
    <!-- CUANDO SE DESELECCIONE DEBE REGRESAR NORMLAL -->
    <!-- DEBE DE HABER UN INPUT K ALMACENE EL ID -->
    <!-- IGUAL CUANDO SE PRESIONE DEBE DE MANDAR A LA PAGINA DE ORDEN EN ID DEL PRODUCTO -->
    <section>
        <h1>B E B I D A S</h1>
        <br>
        <?php
            if ($prom!=null){
        ?>
                <div class="contenedorP">
            <?php
                foreach($prom as $aLinea){
            ?>
                    <div>
                        <input style="display:none;" type="text" name="numIdprod" value="<?php echo  $aLinea[0]?>">
                        <input style="display:none;" type="text" name="precioProd" value="<?php echo  $aLinea[3]?>">
                        <img class="imgP" src="data:image/jpg;base64, <?php echo base64_encode($aLinea[5])?>" alt="Imagen del producto">
                        <div class="infoP">
                            <div class="des desT"><p><?php echo $aLinea[1]?></p></div>
                            <div class="des"><p>Descripción:<br><?php echo $aLinea[2]?> <br><b>$ <?php echo $aLinea[3]?></b> </p></div>
                            <div class="des boxBoton"><a href="#" class="botonA">Agregar <i class="fas fa-shopping-cart"></i></a></div>
                        </div>
                    </div>
            <?php
                }
            ?>
                </div>
        <?php
           }else{
        ?>
            <h1 class="error">No está disponible</h1>
        <?php
            }
        ?>
    </section>
   
    <br><br>

    <?php
        include_once("pie.html");
    ?>