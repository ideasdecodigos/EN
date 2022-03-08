<?php	
	
	if(isset($_POST['login'])){
        include("connection.php"); 
		$user = mysqli_real_escape_string($con,$_POST['user']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);        
                
//	EL USUARIO DEBE PODER INICIAR SECCION CON SU NOMBRE, CORREO O TELEFONO Y SU CONTRASENA     
        $res = mysqli_query($con, "SELECT * FROM students WHERE mail='$user' OR cel='$user'"); 
        if(mysqli_num_rows($res) > 0){
		    while($fila=mysqli_fetch_array($res)){
                //SI EL USER Y EL PASS SON VALIDOS, SE INICIA LA SECSION
        if(password_verify($pass,$fila['pass']) && ((strcasecmp($user,$fila['mail'])==0) || (strcasecmp($user,$fila['cel'])==0))){                
					session_start();	
					$_SESSION['idstudent']=$fila['idstudent'];
					$_SESSION['name']=$fila['name'];   
					$_SESSION['cel']=$fila['cel'];   
					$_SESSION['level']=$fila['level'];   

                    if($_POST['cookie']=="rememberme"){  
                        setcookie("user",$user,time()+2592000,"/");
                        setcookie("pass",$pass,time()+2592000,"/");
                    } 
                }            
            } 
        }  
             mysqli_free_result($res);
			mysqli_close($con); 
        
         if(isset($_SESSION['idstudent'])){  
            header("location: ../app/main.php");
         }else{
				echo " <script>  alert('Invalid user or password!!');window.history.go(-1);</script>";
			}
		
        }
        
