<?php 
if(isset($_POST['opinion'])){
    include("connection.php"); 
    $txtreplay = str_replace(" |#","<br><span class='icon-reply'></span>",$_POST["txtreplay"]);
    $opinion = mysqli_real_escape_string($con,$_POST["opinion"]);  
    $idforo = mysqli_real_escape_string($con,$_POST["idforo"]);           
    $student = mysqli_real_escape_string($con,$_POST["student"]);           
    $idreplay = mysqli_real_escape_string($con,$_POST["idreplay"]);           
    $txtreplay = mysqli_real_escape_string($con,$txtreplay); 
           
                
   mysqli_query($con, "INSERT INTO answersforo(idforo,usuario,answer,idreplay,txtreplay)VALUES('$idforo','$student','$opinion','$idreplay','$txtreplay')");
   mysqli_close($con); 
}
               

if(isset($_POST['idanswer'])){
    include("connection.php");
    $idanswer = mysqli_real_escape_string($con,$_POST["idanswer"]);          
            
    mysqli_query($con, "DELETE FROM answersforo WHERE idanswer=$idanswer");
    mysqli_close($con);  
} 