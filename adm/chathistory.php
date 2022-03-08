<?php
include("connection.php");
$admin = mysqli_real_escape_string($con,$_POST['admin']);  
$costum =mysqli_real_escape_string($con,$_POST['costum']);

 if	($admin!=="" and $costum!==""){
	$result = mysqli_query($con,"SELECT name,foto,idchat,mensaje,idreplay,txtreplay,admin,costum,fecha,estado FROM students RIGHT JOIN chats ON students.idstudent=chats.admin  WHERE admin=$admin AND costum=$costum OR costum=$admin AND admin=$costum ORDER BY idchat"); 
     $fech=date("M j, Y",strtotime("08-04-2010 22:15:00"));
     
	while($fila = mysqli_fetch_array($result)) {
           //MUESTRA LA FECHA POR GRUPO
        if(date("M j, Y",strtotime($fila['fecha']))!=$fech){  ?>
<div class="fecha"> <span><?php echo date("M j, Y",strtotime($fila['fecha']));  ?> </span>  </div>          
    <?php   }  
        $fech=date("M j, Y",strtotime($fila['fecha']));        
		if($admin==$fila['costum']){
			 mysqli_query($con,"UPDATE chats SET estado='S' WHERE costum=$admin and admin=$costum");
//			 mysqli_query($con,"UPDATE notificaciones SET estado='S' WHERE usuario=$admin");
            ?>

<div class="sms clear" id="<?php echo $fila['idchat']; ?>">
    <div class="subclear">       
   <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>">
        <?php }else{?>
            <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>  
        <span><?php echo $fila['name']; ?></span>    
        <span class="icon-clip time-right" onclick="$('.hide').slideDown();$('#idreplay').val(<?php echo $fila['idchat'] ?>); $('#chatmsg').focus();
           $('#txtreplay').val('<?php if(strlen($fila['mensaje'])>100){echo "@".$fila['name']." |#".substr($fila['mensaje'],0,100). "...";}else{echo "@".$fila['name']." |#".$fila['mensaje'];} ?>');"></span>
           
        <?php if($fila['txtreplay']!=""){  ?>
            <div class="replay">
                <a href="<?php  echo "#".$fila['idchat'] ?>"> <?php  echo $fila['txtreplay'] ?> </a>
            </div>
        <?php } ?>  
        <p><?php echo nl2br($fila['mensaje']); ?></p>
        <i class="time-right"><?php echo date("H:i a",strtotime($fila['fecha']));?></i>
    </div>
</div>
 
<?php }else{ ?>  
 <div class="sms dark" id="<?php echo $fila['idchat']; ?>">
    <div class="subdark">
      <span class="icon-clip time-left" onclick="$('.hide').slideDown();$('#idreplay').val(<?php echo $fila['idchat'] ?>); $('#chatmsg').focus(); $('#txtreplay').val('<?php if(strlen($fila['mensaje'])>100){echo "@".$fila['name']." |#".substr($fila['mensaje'],0,100). "...";}else{echo "@".$fila['name']." |#".$fila['mensaje'];} ?>');"></span>
       <span><?php echo $fila['name']; ?></span>
        <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>">
        <?php }else{?>
            <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>       
        
                
        <?php if($fila['txtreplay']!=""){  ?>
            <div class="replay">
                <a href="<?php  echo "#".$fila['idreplay'] ?>"> <?php  echo $fila['txtreplay'] ?> </a>
            </div>
        <?php } ?>  
        <p><?php echo nl2br($fila['mensaje']); ?></p>
        <i class="time-left"><?php echo date("H:i a",strtotime($fila['fecha'])); ?> 
                
        <?php  if($fila['estado']=="N"){ ?>
            <span class="icon-hide eye"></span>
        <?php }else{ ?>
            <span class="icon-views eye"></span>
        <?php } ?> 
        </i>
        <span class="icon-trash" onclick="del(<?php echo $fila['idchat']; ?>,<?php echo $_POST['costum'] ?>,'<?php echo $fila['name']; ?>')"></span>
    </div>
    <br>
</div>
<?php
		}
	 }

mysqli_free_result($result);
mysqli_close($con);
 }else{
	 echo "<div class='fecha'><span>Say hi!</span></div>";
 }
 
?>
<center style="color:grey;font-size:8px">Chat Privado. vl 3.07112020</center>

