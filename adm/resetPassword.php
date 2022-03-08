<?php	
	   include("connection.php");
        $mail = mysqli_real_escape_string($con,$_POST["mail"]);   
        $pass = password_hash($_POST['code'], PASSWORD_DEFAULT); 
        
        $res = mysqli_query($con, "SELECT mail FROM students WHERE mail='$mail'"); 
        if(mysqli_num_rows($res) > 0){     
                $contenido = "Usuario: ".$mail."\r\n Contraseña: ".$_POST['code'];
                $confirm = mail($mail,"Recuperar Contraseña:",$contenido,$header);
                if($confirm){
                       echo "La nueva contraseña fue enviada al correo ($mail).\r\n"; 
                       $exitosa = mysqli_query($con, "UPDATE students SET pass='$pass' WHERE mail='$mail'") ;
                       mysqli_close($con);  
                        if($exitosa){  
                            echo "¡Contraseña modificada correctamente!";  
                        }else{
                            echo "No se pudo cambiar la contraseña!!";
                        }
                }else{
                    echo "Error al enviar el codigo. Vuelva a intentarlo.";
                }
        }else{
            echo "Este correo ($mail) no se encuentra en nuestras bases de datos!!";
        }
       