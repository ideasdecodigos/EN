<?php  function foro($id){ ?>
<br><br>    <script src="../src/ckeditor/ckeditor.js"></script>

<font color="red" onclick="history.back()" class="icon-reply" style="font-size:20px"> By:</font>
<script>
    function delcomment(idanswer) {
        $.ajax({
            type: 'POST',
            url: '../adm/answersforo.php',
            data: {
                idanswer: idanswer
            },
            success: function(data) {
                location.reload();
            }
        });
        return false;
    }

    function delforo(idforo) {
        var eliminar = confirm('By clicking accept, all data linked to this post will be permanently deleted.\n\nFor sure you want to delete the post?');
        if (eliminar) { 
            $.ajax({
                type: 'POST',
                url: '../adm/saveforo.php',
                data: {
                    idforo: idforo
                },
                success: function(data) {
                    history.back();
                }
            });
            return false;
        }
    }
</script>
<?php 
    include("../adm/connection.php");         
    $res = mysqli_query($con, "SELECT * FROM foro INNER JOIN students ON foro.student=students.idstudent WHERE idforo=".$id.""); 
     if(mysqli_num_rows($res) > 0){
        while($fila=mysqli_fetch_array($res)){
            echo $fila['name'];
            echo "<font color='gray' style='display:block;width:100%;text-align:right;font-size:12px'>Posted: "
                .date("M j, Y",strtotime($fila['dateforo']))."</font><hr>"; 
                if($fila['student']===$_SESSION['idstudent']){
                echo "<font class='icon-trash' style='float:right;color:red;cursor:pointer' onclick='delforo($id)'></font>";
                } ?>
            <div class="tema"><?php echo $fila['question'];?></div>
<?php    }    
    } ?>
<form id="formOpinar">
   <label for="idforo">¡Tu repuesta u opinión es valiosa para nosotros!</label>
    <input type="hidden" name="idforo" value="<?php echo $id ?>">
    <input type="hidden" name="student" value="<?php echo $_SESSION['idstudent'] ?>">
    <textarea id="texto" rows="3" placeholder="Responde u opnia aquí..." required></textarea>
    <textarea id="opinion" name="opinion" style="display:none"></textarea>
    <input type="hidden" name="idreplay" id="idreplay">
    
    <button type="reset" class="icon-load" title="Resetear campos" onclick="$(this).hide();"></button>
    <button type="submit" title="Enviar respuesta u opinión" name="save">Opinar</button>
    <textarea name="txtreplay" id="txtreplay" rows="3" readonly title="Zona de replay!"></textarea>
</form>
<script>
    $('#formOpinar').submit(function() {
        $('#opinion').val(CKEDITOR.instances.texto.getData());
        $.ajax({
            type: 'POST',
            url: '../adm/answersforo.php',
            data: $(this).serialize(),
            success: function(data) {
                $('#formOpinar textarea').val('');
                $('#formOpinar button.icon-load').hide();
                location.reload();
            }
        });
        return false;
    });

</script>
<font class="fecha">Comentarios sobre el tema:</font>
<font class="fecha icon-down"></font>
<?php                                    
     
    include("../adm/connection.php");
	$result = mysqli_query($con,"SELECT name,foto,idanswer,idforo,usuario, answer,idreplay,txtreplay,dateanswer FROM students RIGHT JOIN answersforo ON students.idstudent=answersforo.usuario WHERE idforo=".$id." ORDER BY idanswer"); 
 $fech=date("M j, Y",strtotime("08-04-2010 22:15:00"));
     
	while($fila = mysqli_fetch_array($result)) {
           //MUESTRA LA FECHA POR GRUPO
        if(date("M j, Y",strtotime($fila['dateanswer']))!=$fech){  ?>
<div class="fecha"> <span><?php echo date("M j, Y",strtotime($fila['dateanswer']));  ?> </span> </div>
<?php   }  
        $fech=date("M j, Y",strtotime($fila['dateanswer']));   
        
    if($_SESSION['idstudent']==$fila['usuario']){ ?>
<div class="sms clear" id="<?php echo $fila['idanswer'] ?>">
    <div class="foto">
        <?php if($fila['foto']!=null){  ?>
        <img src="<?php echo $fila['foto']; ?>">
        <?php }else{ ?>
        <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>
        <a href="#formOpinar" onclick="$('#formOpinar button.icon-load').show();$('#opinion').focus(); $('#idreplay').val(<?php echo $fila['idanswer'] ?>); 
           $('#txtreplay').val('<?php if(strlen($fila['answer'])>100){echo "@".$fila['name']." |#".substr($fila['answer'],0,100). "...";}else{ echo "@".$fila['name']." |#".$fila['answer'];} ?>');" class="icon-clip">
           <?php $name=explode(' ',$fila['name']); echo $name[0]; ?>
        </a>
    </div>
     <?php if($fila['txtreplay']!=""){  ?>
    <div class="replay">
        <a href="<?php  echo "#".$fila['idanswer'] ?>"> <?php  echo $fila['txtreplay'] ?> </a>
    </div>
    <?php } ?>
    <p><?php echo nl2br($fila['answer']); ?></p>
    <i class="time-left"><?php echo date("H:i a",strtotime($fila['dateanswer']));?></i>
    <i class="icon-trash time-right right" onclick="delcomment(<?php echo $fila['idanswer'] ?>)"></i> 
    
</div>
<?php }else{ ?>
        <div class="sms dark" id="<?php echo $fila['idanswer'] ?>">
    <div class="foto">
        <?php if($fila['foto']!=null){  ?>
        <img src="<?php echo $fila['foto']; ?>">
        <?php }else{ ?>
        <font><?php echo strtoupper(substr($fila['name'],0,1)); ?> </font>
        <?php } ?>
        <a href="#formOpinar" onclick="$('#idreplay').val(<?php echo $fila['idanswer'] ?>); $('#opinion').focus();$('#formOpinar button.icon-load').show();
           $('#txtreplay').val('<?php if(strlen($fila['answer'])>100){echo "@".$fila['name']." |#".substr($fila['answer'],0,100). "...";}else{echo "@".$fila['name']." |#".$fila['answer'];} ?>');" class="icon-clip"><?php $name=explode(' ',$fila['name']); echo $name[0]; ?>
        </a>
    </div>
     <?php if($fila['txtreplay']!=""){  ?>
    <div class="replay">
        <a href="<?php  echo "#".$fila['idanswer'] ?>" title="Ir a comentario"> <?php  echo $fila['txtreplay'] ?> </a>
    </div>
    <?php } ?>
    <p><?php echo nl2br($fila['answer']); ?></p>
    <i class="time-right"><?php echo date("H:i a",strtotime($fila['dateanswer']));?></i>
</div>
<?php }
		}
	 

mysqli_free_result($result);
mysqli_close($con);
}
 ?>
 


