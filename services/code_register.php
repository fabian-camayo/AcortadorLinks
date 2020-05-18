<?php
    //Abrir conexion base de datos 
    include("./utils/connection_open.php");
    
    //Validar el envio de los datos POST procedentes del formulario  
    if($_POST["url"]!=""){

        //Consultar mi dominio
        $_DOMAIN_SQL = "SELECT LK_constants.value FROM LK_constants WHERE LK_constants.name = 'domain'";
        $mydomain = mysqli_fetch_array( mysqli_query($conn,$_DOMAIN_SQL) );

        $urldomain = explode("/", $_POST["url"]);
        $domain = $urldomain[0]."//".$urldomain[1]."".$urldomain[2];
        
        //Validar que el dominio no sea igual al nuestro
        if($mydomain['value'] != "$domain")
        {

        //Datos POST procedentes del formulario   
        $url = $_POST["url"];  
       
        //Generar codigo
        $pool = "0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
        $code = substr(str_shuffle(str_repeat($pool,5)),0,7);

        //Consultar codigo
        $_CODE_SQL = "SELECT * FROM LK_shortener WHERE LK_shortener.code = '$code'";
        $num_rows = mysqli_num_rows(mysqli_query($conn,$_CODE_SQL));
        
        //Validar el codigo generado
        if($num_rows>1){
            $code = substr(str_shuffle(str_repeat($pool,5)),0,7);
        }

        //Guardar datos de redireccion
        $_SAVE_SQL = "INSERT INTO LK_shortener (url,code) VALUES ('$url','$code')"; 
        mysqli_query($conn,$_SAVE_SQL);  
        
        //Url generada para redireccion   
        echo "{$mydomain['value']}/{$code}";
        }else{
            echo"mydomain";
        }
    }else{
        echo"emptydata";
    }
    //Cerrar conexion base de datos  
    include("./utils/connection_close.php");   
 ?>