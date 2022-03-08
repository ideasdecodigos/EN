<?php 
        include("connection.php");
        $name = mysqli_real_escape_string($con,$_POST["name"]);
        $id = mysqli_real_escape_string($con,$_POST["id"]);
        $cel = mysqli_real_escape_string($con,$_POST["cel"]);
        $country = mysqli_real_escape_string($con,$_POST["country"]);
        $mail = mysqli_real_escape_string($con,$_POST["mail"]);   
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); 

    	$exitosa = mysqli_query($con, "UPDATE students SET name='$name',cel='$cel',country='$country',mail='$mail',pass='$pass' WHERE idstudent='$id'") ;
				mysqli_close($con);  

