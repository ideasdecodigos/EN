<?php
 	include("../adm/connection.php");	 
	
	$result = mysqli_query($con,"SELECT name,foto,idforo,question,student,dateforo FROM students RIGHT JOIN foro ON students.idstudent=foro.student ORDER BY idforo"); 
 $fech=date("M j, Y",strtotime("08-04-2010 22:15:00"));
     
	while($fila = mysqli_fetch_array($result)) {
           //MUESTRA LA dateforo POR GRUPO
        if(date("M j, Y",strtotime($fila['dateforo']))!=$fech){  ?>
<div class="dateforo"> <span><?php echo date("M j, Y",strtotime($fila['dateforo']));  ?> </span>  </div>          
<?php   }  
        $fech=date("M j, Y",strtotime($fila['dateforo']));        
		if($admin==$fila['costum']){
			 mysqli_query($con,"UPDATE chats SET estado='S' WHERE costum=$admin and admin=$costum");
//			 mysqli_query($con,"UPDATE notificaciones SET estado='S' WHERE usuario=$admin");
            ?>

<div class="sms dark">
    <div class="subdark">
       <span><?php echo $fila['name']; ?></span>
       <div class="menu">
           <span class="icon-menu3"></span>
       </div>
        <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>">
        <?php }else{?>
            <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>        
        <p><?php echo nl2br($fila['question']); ?></p>
        <i class="time-left"><?php echo date("H:i a",strtotime($fila['dateforo']));?></i>
    </div>
</div>

<?php }else{ ?>
 <div class="sms clear">
    <div class="subclear">
        <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>">
        <?php }else{?>
            <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>

        <span><?php echo $fila['name']; ?></span>
        <span class="icon-menu3" onclick="$('.mnchat').slideToggle();"></span>
        
        <div class="mnchat">
           <span>Delete</span>
           <span>Responder</span>
           <span>Dar me gusta</span>
       </div> 
       
        <p><?php echo nl2br($fila['mensaje']); ?></p>
        <i class="time-right"><?php echo date("H:i a",strtotime($fila['dateforo'])); ?>        
          <?php  if($fila['estado']=="N"){ ?>
            <span class="icon-hide eye"></span>
        <?php }else{ ?>
            <span class="icon-views eye"></span>
        <?php } ?> 
        </i>
    </div>
    <br>
</div>
<?php
		}
	 }

mysqli_free_result($result);
mysqli_close($con);
 }else{
	 echo "<div class='dateforo'><span>Say hi!</span></div>";
 }
 
?>

