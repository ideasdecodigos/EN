<?php 
    include("connection.php"); 
    if(isset($_POST['action'])){
        switch($_POST['action']){
        case "contents":   
            
             $topic = mysqli_real_escape_string($con,$_POST["title"]);  
             $description = mysqli_real_escape_string($con,$_POST["desc"]);  
             $category = mysqli_real_escape_string($con,$_POST["category"]);  
             $student = mysqli_real_escape_string($con,$_POST["autor"]);  
             $level = mysqli_real_escape_string($con,$_POST["level"]);  
             $tags = mysqli_real_escape_string($con,$_POST["tag"]);            
            
            $exitosa = mysqli_query($con, "INSERT INTO contents(topic,description,categories,type,level,student)
            VALUES('$topic','$description','$category','$tags','$level','$student')");
             mysqli_close($con);
            
            if($exitosa){   
                echo "<b style='color:darkgreen'>Saved successfully!</b> ";      
                newslatters($topic, $description);
            } else{
                echo "<b style='color:red'>Saved failed!</b>".mysqli_error($con); 
            }
        break;   
        case "words":                  
             $word = mysqli_real_escape_string($con,$_POST["word"]);   
             $meaning = mysqli_real_escape_string($con,$_POST["meaning"]);   
             $idword = mysqli_real_escape_string($con,$_POST["idword"]);
             $exitosa = mysqli_query($con, "INSERT INTO subcontents(idpost,english,spanish)VALUES('$idword','$word','$meaning')");
             mysqli_close($con);
                
            if($exitosa){   
                echo "<b style='color:darkgreen'>Saved successfully!</b>";              
            } else{
                echo "<b style='color:red'>Saved failed!</b>"; 
            }
        break;   
        case "conversation":                  
             $english = mysqli_real_escape_string($con,$_POST["english"]);   
             $spanish = mysqli_real_escape_string($con,$_POST["spanish"]);   
             $position = mysqli_real_escape_string($con,$_POST["position"]);   
             $person = mysqli_real_escape_string($con,$_POST["person"]);   
             $idpost = mysqli_real_escape_string($con,$_POST["idpost"]);  
             $exitosa = mysqli_query($con, "INSERT INTO conversations(idpost,position,person,english,spanish) VALUES('$idpost','$position','$person','$english','$spanish')");
             mysqli_close($con);
                
            if($exitosa){   
                echo "<b style='color:darkgreen'>Saved successfully!</b>";              
            } else{
                echo "<b style='color:red'>Saved failed!</b>"; 
            }
        break;   
        case "expressions":              
             $phrase= mysqli_real_escape_string($con,$_POST["english"]);   
             $meaning = mysqli_real_escape_string($con,$_POST["spanish"]);       
             $idpost = mysqli_real_escape_string($con,$_POST["idpost"]);      

            $exitosa = mysqli_query($con, "INSERT INTO subcontents(idpost,english,spanish)VALUES('$idpost','$phrase','$meaning')");
             mysqli_close($con); 

            if($exitosa){  
                echo "<b style='color:darkgreen'>Saved successfully!</b>";             
            } else{
                echo "<b style='color:red'>Saved failed!</b>"; 
            }
            
        break;  
        case "frasalVerb":              
             $fvenglish= mysqli_real_escape_string($con,$_POST["fvenglish"]);   
             $fvspanish = mysqli_real_escape_string($con,$_POST["fvspanish"]);       
             $fvdescrip = mysqli_real_escape_string($con,$_POST["fvdescription"]);      
             $fvlevel = mysqli_real_escape_string($con,$_POST["fvlevel"]);      

            $exitosa = mysqli_query($con, "INSERT INTO phrasalverb(fvenglish,fvspanish,fvdescription,fvlevel)
            VALUES('$fvenglish','$fvspanish','$fvdescrip','$fvlevel')");
             mysqli_close($con); 

            if($exitosa){  
                echo "<b style='color:darkgreen'>Saved successfully!</b>";             
            } else{
                echo "<b style='color:red'>Saved failed!</b>"; 
            }
            
        break;
        case "views":                 
            $iduser = $_POST["iduser"];     
            $idpost= $_POST["idpost"];     
            $res = mysqli_query($con, "INSERT INTO history (iduser,idpost,status)VALUES('$iduser','$idpost','Showing')"); 
            mysqli_close($con);  
            
        break;
        case "history":                 
            $iduser = $_POST["iduser"];     
            $idpost= $_POST["idpost"];   
            $text= $_POST["text"];   
             $res = mysqli_query($con, "SELECT status FROM history WHERE status='$text' AND iduser='$iduser' AND idpost='$idpost'"); 
        if(mysqli_num_rows($res) > 0){
		    $done = mysqli_query($con, "DELETE FROM history WHERE status='$text' AND iduser='$iduser' AND idpost='$idpost'"); 
            echo $text." back successfylly!";
        }else{
            $done = mysqli_query($con, "INSERT INTO history (iduser,idpost,status)VALUES('$iduser','$idpost','$text')"); 
            echo $text." seccessfully!";
        }
           
             mysqli_free_result($res); 
			mysqli_close($con); 
               
        break;
        case "friends":                 
           
            $followed = $_POST['followed'];
            $following = $_POST['following'];
                
              $query=mysqli_query($con, "SELECT followed FROM friends WHERE followed=$followed AND following=$following");
            
					if(mysqli_num_rows($query) > 0){ 
                    	mysqli_query($con, "DELETE FROM friends WHERE followed=$followed AND following=$following");
                        mysqli_free_result($query);
                        mysqli_close($con); // Cierra la conexion	
                    			echo "<span class='icon-heart' style='color:dodgerblue;'></span> Seguir";
                    }else{
				        mysqli_query($con, "INSERT INTO friends(followed,following) VALUES($followed,$following)");
                        mysqli_free_result($query);
                        mysqli_close($con); // Cierra la conexion	
                    			echo "<span class='icon-heart' style='color:red;'></span> Siguiendo";
                    }           
            
        break;
        case "reported":
            $correcto =	mysqli_query($con, "DELETE FROM history WHERE status='Reported' AND idpost='".$_POST["idpost"]."'") ;	
            mysqli_close($con);   
            
        break;
        case "deleteAccount":
            $correcto =	mysqli_query($con, "DELETE FROM students WHERE idstudent='".$_POST["delete"]."'") ;	
            mysqli_close($con);   

            if($correcto){ 
               echo "Deleted successfully!";  
            }else{ 
                echo "Delete account failed!"; 
            }
        break;       
        default: 
           
    }//SWITCH END
    }

if(isset($_POST['deletePost'])){            	
  include "connection.php";
  $correcto = mysqli_query($con, "DELETE FROM contents WHERE idcontent=".$_POST['deletePost'].""); 
    mysqli_close($con);  
}

if(isset($_POST['deleteVerb'])){
    include("connection.php");
    $idverb=mysqli_real_escape_string($con,$_POST['deleteVerb']);
    
    mysqli_query($con, "DELETE FROM phrasalVerb WHERE idverb='$idverb'");
	mysqli_close($con); 
}

function newslatters($asunto, $contenido){    
    include("connection.php");
    $mail=""; 
    $header="MIME-Version: 1.0"."\r\n";
    $header.= "Content-type:text/html;charset=UTF-8"."\r\n";
    $header.="FROM: EN4ES.COM, Soporte";
    $res = mysqli_query($con, "SELECT email FROM newslatters"); 
        if(mysqli_num_rows($res) > 0){
            while($fila=mysqli_fetch_array($res)){
                    $mail.=$fila['email'].",";                
            }            
        }
    $mail=substr($mail,0,(strlen($mail)-1)); 
    $confirm = mail($mail,$asunto,$contenido,$header);
    if($confirm){
        echo "<br>enviado a:<br>".str_replace(",","<br>",$mail."<br>");  
    }else{
        echo "Error al enviar el correo. Vuelva a intentarlo.";
    }
             
} 
           
       