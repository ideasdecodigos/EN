<?php  
	session_start();
	$idblog=$_POST['idblog'];
	include ("../adm/connection.php");
    $fech=date("M j, Y",strtotime("08-04-2010 22:15:00"));

    $registros = mysqli_query($con, "SELECT * FROM comments LEFT JOIN students ON comments.student=students.idstudent WHERE tags='comments' AND idpost=".$_POST['idblog']." ORDER BY comment_date DESC");  

    if(mysqli_num_rows($registros) > 0){
	   while($fila=mysqli_fetch_array($registros)){ 
	      //MUESTRA LA FECHA POR GRUPO
           if(date("M j, Y",strtotime($fila['comment_date']))!=$fech){  ?>
                <div class="fecha"><span><?php echo date("M j, Y",strtotime($fila['comment_date'])); ?></span></div>          
    <?php   }  
        $fech=date("M j, Y",strtotime($fila['comment_date']));        
		if($_SESSION['idstudent']!=$fila['student']){  ?>

<div class="claro" id="<?php echo $fila['idcomment']; ?>">
   <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>" class="foto">
        <?php }else{?>
            <font class="foto"><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>  
        <span><?php echo $fila['name']; ?></span>    
        <span class="icon-clip clip-right" onclick="$('.hide').slideDown();$('#idreplay').val(<?php echo $fila['idcomment'] ?>); $('#chatmsg').focus();
           $('#txtreplay').val('<?php if(strlen($fila['comment'])>100){echo "@".$fila['name']." |#".substr($fila['comment'],0,100). "...";}else{echo "@".$fila['name']." |#".$fila['comment'];} ?>');"></span>
           
        <?php if($fila['txtreplay']!=""){  ?>
            <div class="replay">
                <a href="<?php  echo "#".$fila['idcomment'] ?>"> <?php  echo $fila['txtreplay'] ?> </a>
            </div>
        <?php } ?>  
        <p><?php echo nl2br($fila['comment']); ?></p>
        <i class="time-right"><?php echo date("H:i a",strtotime($fila['comment_date']));?></i>
</div>
 
<?php }else{ ?>  
 <div class="oscuro" id="<?php echo $fila['idcomment']; ?>">
      <span class="icon-clip clip-left" onclick="$('.hide').slideDown();$('#idreplay').val(<?php echo $fila['idcomment'] ?>); $('#txtcomment').focus(); $('#txtreplay').val('<?php if(strlen($fila['comment'])>100){echo "@".$fila['name']." |#".substr($fila['comment'],0,100). "...";}else{echo "@".$fila['name']." |#".$fila['comment'];} ?>');"></span>
              
        <?php if($fila['foto']!=null){  ?>
            <img src="<?php echo $fila['foto']; ?>" class="foto"> 
        <?php }else{?>
            <font class="foto"><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>       
        <span class="clip-right"><?php echo $fila['name']; ?></span>
                
        <?php if($fila['txtreplay']!=""){  ?>
            <div class="replay">
                <a href="<?php  echo "#".$fila['idreplay'] ?>"> <?php  echo $fila['txtreplay'] ?> </a>
            </div>
        <?php } ?>  
        <p><?php echo nl2br($fila['comment']); ?></p>
        <i class="time-left"><?php echo date("H:i a",strtotime($fila['comment_date'])); ?></i>
        <span class="icon-trash time-right" onclick="delComment(<?php echo $fila['idcomment']; ?>);"></span>
    
    <br>
</div>
<script>     
        function delComment(idcomment) {
        $.ajax({
            type: 'POST',
            url: '../adm/comments.php',
            data: {deletecomment:idcomment},
            success: function(data) {
               location.reload();
            }
        });
        return false;
    }
     </script>
<?php
		}
      }
    }
mysqli_free_result($registros);
mysqli_close($con);
?>
<!--FIN DE LOS COMENTARIOS-->