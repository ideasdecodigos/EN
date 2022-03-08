<?php
    
    include ("connection.php");
    $correo = mysqli_real_escape_string($con,$_POST['email']);		
    //	VERIFICA QUE EL CORREO	NO EXISTA 
	$res= mysqli_query($con, "INSERT INTO newslatters(email)VALUES('$correo')");
		mysqli_close($con); // Cierra la conexion
		
    	if($res){  
        	echo " SUSCRITO corectamente!";
    	}else{
            echo "Ya éstas SUSCRITO!";   
        }
