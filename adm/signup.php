<?php 
        include("connection.php"); 

        $user = mysqli_real_escape_string($con,$_POST["user"]); 
        $tel = mysqli_real_escape_string($con,$_POST["tel"]);
        $email = mysqli_real_escape_string($con,$_POST["email"]);
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);  //SIFRA EL PASS

//	VERIFICA QUE EL CORREO	NO EXISTA 
	$access = mysqli_query($con, "SELECT mail FROM students WHERE mail='$email'");

	if(mysqli_num_rows($access) > 0 ){ //SI EL CORREO YA EXISTE, SE LE NOTIFICA EL USUARIO
		echo " <script>  alert('The Email: ($email) already exist!!'); window.history.go(-1); </script>";
	}else{  	 			
	    //INGRESA LOS DATOS A LA DB
    	$exitosa = mysqli_query($con, "INSERT INTO students(name,cel,mail,pass)VALUES('$user','$tel','$email','$pass')");
				 
    	if($exitosa){  
			echo "<script>alert('Registreted successfully!');</script>";
            //	EL USUARIO DEBE PODER INICIAR SECCION CON SU NOMBRE, CORREO O TELEFONO Y SU CONTRASENA     
            $res = mysqli_query($con, "SELECT * FROM students WHERE mail='$email'");  
             if(mysqli_num_rows($res) > 0){
                 while($fila=mysqli_fetch_array($res)){
                //SI EL USER Y EL PASS SON VALIDOS, SE INICIA LA SECSION
					session_start();	
					$_SESSION['idstudent']=$fila['idstudent'];
					$_SESSION['name']=$fila['name'];   
					$_SESSION['cel']=$fila['cel'];   
					$_SESSION['level']=$fila['level'];   

                        setcookie("user",$user,time()+2592000,"/");
                        setcookie("pass",$pass,time()+2592000,"/");
                 } 
             }
            mysqli_free_result($res);
			mysqli_close($con); 
            header("location: ../app/main.php");       
            
		} else{ 
           echo "<script>alert('Signup failed!'); window.history.go(-1); </script>";
        }
	}   
