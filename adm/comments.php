<?php 
include ("connection.php");

if(isset($_POST['idpost'])){
    
  if($_POST['tag']=="likes"){
     $idpost = mysqli_real_escape_string($con,$_POST['idpost']);
     $student = mysqli_real_escape_string($con,$_POST['idstudent']);
     $tag = mysqli_real_escape_string($con,$_POST['tag']);
      
     $res = mysqli_query($con, "SELECT tags FROM comments WHERE tags='likes' AND idpost=$idpost AND student=$student");  
     if(mysqli_num_rows($res) > 0){ //ADD A LIKE, SOLO CUANDO EL USUARIO NO HA COMENTADO  
         mysqli_query($con, "DELETE FROM comments WHERE tags='likes' AND idpost=$idpost AND student=$student"); 
     }else{
         mysqli_query($con, "INSERT INTO comments(idpost,student,tags)
         VALUES('$idpost','$student','$tag')"); 
         
      }
     $result = mysqli_query($con, "SELECT COUNT(tags) AS likes FROM comments WHERE tags='likes' AND idpost=$idpost");  
      while($sum = mysqli_fetch_array($result)){  
          echo $sum['likes'];
      }
      mysqli_close($con); 
      mysqli_free_result($res);
}//FIN DEL IF LIKES
  
    
	if($_POST['tag']=="comments"){
        $txtreplay = str_replace(" |#","<br><span class='icon-reply'></span>",$_POST["txtreplay"]);
		$idpost = mysqli_real_escape_string($con,$_POST['idpost']);
		$comment = mysqli_real_escape_string($con,$_POST['comment']);	
		$student = mysqli_real_escape_string($con,$_POST['idstudent']);
		$tag = mysqli_real_escape_string($con,$_POST['tag']);
		$idreplay = mysqli_real_escape_string($con,$_POST['idreplay']);
		$txtreplay = mysqli_real_escape_string($con,$txtreplay);
        

		if($comment!=""){
            //SI ES UN REPLAY, EL SIGUIENTE IF AGREGA EL NOMBRE DE LA PERSONA QUE COMENTO 
			$ressul=mysqli_query($con, "INSERT INTO comments(idpost,student,comment,idreplay,txtreplay,tags)
            VALUES('$idpost','$student','$comment','$idreplay','$txtreplay','$tag')"); 
			mysqli_close($con); 			
		} 
	}//FIN DEL IF COMMENTS

}//FIN DEL IF IDPOST

    if(isset($_POST['deletecomment'])){ 
            $comentario = mysqli_real_escape_string($con,$_POST['deletecomment']);	
		
			mysqli_query($con, "DELETE FROM comments WHERE idcomment=$comentario"); 
			mysqli_close($con); 			
	} 
?>
