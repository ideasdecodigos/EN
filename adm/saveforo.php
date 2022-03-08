<?php 
if(isset($_POST['question'])){
    include("connection.php"); 
             $question = mysqli_real_escape_string($con,$_POST["question"]);  
             $student = mysqli_real_escape_string($con,$_POST["student"]);           
            
            mysqli_query($con, "INSERT INTO foro(question,student)VALUES('$question','$student')");
             mysqli_close($con);
            
            
}
 
if(isset($_POST['idforo'])){
    include("connection.php");
    $idforo = mysqli_real_escape_string($con,$_POST["idforo"]);          
            
    mysqli_query($con, "DELETE FROM foro WHERE idforo=$idforo");
    mysqli_close($con);  
} 