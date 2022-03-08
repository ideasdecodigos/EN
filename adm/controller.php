<?php 
    include("connection.php"); 
    switch($_POST['table']){ 
        case "contents":              
             $title = mysqli_real_escape_string($con,$_POST["title"]);  
             $desc = mysqli_real_escape_string($con,$_POST["desc"]);  
             $category = mysqli_real_escape_string($con,$_POST["category"]);  
             $idcontent = mysqli_real_escape_string($con,$_POST["idcontent"]);  
             $level = mysqli_real_escape_string($con,$_POST["level"]);  
             $exitosa = mysqli_query($con, "UPDATE contents SET topic='$title',description='$desc',categories='$category',level='$level' WHERE idcontent=$idcontent") ;
             mysqli_close($con);
                
            if($exitosa){   
                echo "<b style='color:darkgreen'>Edited successfully!</b>";              
            } else{
                echo "<b style='color:red'>Edited failed!</b>"; 
            }
        break;   
        case "word":  
                
             $word = mysqli_real_escape_string($con,$_POST["word"]);   
             $meaning = mysqli_real_escape_string($con,$_POST["meaning"]);    
             $id = mysqli_real_escape_string($con,$_POST["id"]);
             $exitosa = mysqli_query($con, "UPDATE subcontents SET english='$word',spanish='$meaning' WHERE idsubcontent='$id'");
             mysqli_close($con); 
                
            if($exitosa){   
                echo "<b style='color:darkgreen'>Edited successfully!</b>";              
            } else{ 
                echo "<b style='color:red'>Edited failed!</b>"; 
            }
        break;  
        case "conversation":  
                
             $word = mysqli_real_escape_string($con,$_POST["english"]);   
             $meaning = mysqli_real_escape_string($con,$_POST["spanish"]);    
             $person = mysqli_real_escape_string($con,$_POST["person"]);    
             $position = mysqli_real_escape_string($con,$_POST["position"]);    
             $id = mysqli_real_escape_string($con,$_POST["idpost"]);
             $exitosa = mysqli_query($con, "UPDATE conversations SET person='$person',position='$position',english='$word',spanish='$meaning' WHERE idconversation='$id'");
             mysqli_close($con); 
                
            if($exitosa){   
                echo "<b style='color:darkgreen'>Edited successfully!</b>";              
            } else{ 
                echo "<b style='color:red'>Edited failed!</b>"; 
            }
            
        break;
       case "levelUp": 
            
             $newLevel = mysqli_real_escape_string($con,$_POST["newLevel"]);     
             $idStudent = mysqli_real_escape_string($con,$_POST["idStudent"]);     

            $exitosa = mysqli_query($con,"UPDATE students SET level='$newLevel' WHERE idstudent=$idStudent"); 
            mysqli_close($con);  
 
            if($exitosa){  //editar mensaje de felicitaciones
                session_start();$_SESSION['level']=$newLevel;
                echo "Congratulacions! Nivel ".($newLevel - 1)." Superado!";             
            } else{ 
                echo "Couldn't level up!";   
            }  
        break;
        case "foto":  
                $idStudent=$_POST['idstudent'];
                $imagen = "../uploads/".$_FILES["imagen"]["name"];	
                //VARIABLES IMAGEN
                $imgSubidas = "../uploads/";
                $imgRuta = $imgSubidas . basename($_FILES["imagen"]["name"]);	

                if(is_uploaded_file($_FILES['imagen']['tmp_name'])) { // verifica haya sido cargado el archivo 
                    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $imgRuta)) { // se coloca en su lugar final 
                        //INGRESA LOS DATOS A LA DB
                        $res = mysqli_query($con, "UPDATE students SET foto='$imagen' WHERE idstudent=$idStudent") 
                        or die(" <script>  alert('Error al cambiar foto de perfil!'); window.history.go(-1);</script>");
                        mysqli_close($con); // Cierra la conexion 
                            echo " <script> window.history.back();</script>";			
                    }		
                } else{
                    echo " <script>  alert('Seleccione una IMAGEN!');  window.history.back(); </script>";
                } 
        break;
        case "frasalVerbs":  
             include("connection.php");
            $id=mysqli_real_escape_string($con,$_POST['id']);
            $en=mysqli_real_escape_string($con,$_POST['en']);
            $es=mysqli_real_escape_string($con,$_POST['es']);
            $des=mysqli_real_escape_string($con,$_POST['des']);

            $res=mysqli_query($con, "UPDATE phrasalVerb SET fvenglish='$en', fvspanish='$es', fvdescription='$des' WHERE idverb='$id'");
            if($res){
                echo "Editado correctamente!";
            }else{
                echo "Error al editar!".mysqli_error();
            }
            mysqli_close($con); 

        break;
        default: 
            echo " <script> window.history.back(); </script>";
           
    }//SWITCH END
           
        if(isset($_POST["idsql"])){
            $id = $_POST["id"];     
            $table = $_POST["table"]; 
            $idsql = $_POST["idsql"]; 
            $correcto =	mysqli_query($con, "DELETE FROM $table WHERE $idsql='$id'") ;	
            mysqli_close($con);   

            if($correcto){ 
               echo "Deleted successfully!";  
            }else{ 
                echo "Delete registred failed!"; 
            }
            }