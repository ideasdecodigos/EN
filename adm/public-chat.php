<?php

 	include("connection.php");	 
if(isset($_POST['admin']) and isset($_POST['mensaje'])){
     $admin = mysqli_real_escape_string($con,$_POST['admin']);
     $mensaje = mysqli_real_escape_string($con,$_POST['mensaje']);
     $idreplay = mysqli_real_escape_string($con,$_POST['idreplay']);
     $txtreplay = str_replace(" |#","<br><span class='icon-reply'></span>",$_POST["txtreplay"]);
     $txtreplay = mysqli_real_escape_string($con,$txtreplay);

    if($admin!=="" and $mensaje!=""){
		mysqli_query($con,"INSERT INTO chatpublico(mensaje,student,idreplay,txtreplay) VALUES ('$mensaje','$admin','$idreplay','$txtreplay')");
    }
}
	$result = mysqli_query($con,"SELECT name,foto,idchat,mensaje,idreplay,txtreplay,student,fechachat FROM students RIGHT JOIN chatpublico ON students.idstudent=chatpublico.student ORDER BY idchat"); 
    $fech=date("M j, Y",strtotime("08-04-2010 22:15:00"));
     
	while($fila = mysqli_fetch_array($result)) {
           //MUESTRA LA FECHA POR GRUPO
        if(date("M j, Y",strtotime($fila['fechachat']))!=$fech){  ?>
            <div class="fecha"> <span><?php echo date("M j, Y",strtotime($fila['fechachat']));  ?> </span> </div>
        <?php   }  
        $fech=date("M j, Y",strtotime($fila['fechachat']));   
         
       if(session_id() ===""){ session_start();} 
         if($_SESSION['idstudent']!=$fila['student']){ ?>
          
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
        <i class="time-right"><?php echo date("H:i a",strtotime($fila['fechachat']));?></i>
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
        <i class="time-left"><?php echo date("H:i a",strtotime($fila['fechachat'])); ?> </i>
        <span class="icon-trash" onclick="del('<?php echo $fila['idchat']; ?>')"></span>
    </div>
    <br>
</div>
        <?php }
		}
mysqli_free_result($result);
mysqli_close($con); ?>
<center style="color:grey;font-size:8px">Chat Público. vl 3.07112020</center>

<?php 


if(isset($_POST['idchat'])){
    include("connection.php");
    $idchat = mysqli_real_escape_string($con,$_POST["idchat"]);          
            
    mysqli_query($con, "DELETE FROM chatpublico WHERE idchat=$idchat");
    mysqli_close($con);  
} 