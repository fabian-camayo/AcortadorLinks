<?php
	//Abrir conexion base de datos
	include('services/utils/connection_open.php');
	set_time_limit(0);

    //Codigo de redireccion
	$code = trim($_GET['id']);
	
    //Consultar url;   
	$_URL_SQL = "SELECT LK_shortener.url FROM LK_shortener WHERE LK_shortener.code = '$code'";
	$url = mysqli_fetch_array( mysqli_query($conn,$_URL_SQL));
			
	//Consultar dominio
	$_DOMAIN_SQL = "SELECT LK_constants.value FROM LK_constants WHERE LK_constants.name = 'domain'";
	$domain = mysqli_fetch_array( mysqli_query($conn,$_DOMAIN_SQL) );

	//Actualizar clics
	$_CLICS_SQL = "UPDATE LK_shortener SET LK_shortener.clics=(clics+1) WHERE LK_shortener.code ='$code'";

	//Si existe url redireccionamos
	if($url['url']!=""){
		//Contar clics	
		mysqli_query($conn,$_CLICS_SQL);
		//Redireccionar
		header ('HTTP/1.1 301 Moved Permanently');
		header('location: '.$url['url']);
		die();
	}else{
		//Si no existe url redireccionamos a nuestro sitio
		header('location: '.$domain['value']);
		die();
	}

	//Cerrar conexion base de datos
	include("services/utils/connection_close.php");  
?>