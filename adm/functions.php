<?php 

//DEVUELVE UN COLOR ALEATORIO
function fondos(){
//    $backgrounds = array("#d1b1b1", "#d9afaf", "#e2c5c0", "#AFDFDD", "#e2d7c0", "#c0e2cd", "#c0dce2", "#AED6F1","#FFCCBC","#FFE0B2","#FFECB3","#FFF9C4","#C5E1A5","#A5D6A7","#80CBC4","#80DEEA"
//    ,"#b6ebd1","#90CAF9","#C5CAE9","#E1BEE7","#F8BBD0","#FFCDD2","#FFEBEE","#d0b8e9");
//    
 $backgrounds = array("dodgerblue", "red", "orange", "green", "#c0a805", "#10b55b", "#058e7a", "#05508e","#a411e3","#bb0aa7","#5d2754","#6103dd","blue","darkgreen","limegreen","#390555"
    ,"#b6ebd1","#ee20a2","#9e4cea","#04a995","#51a904","#e1984b","#f76e59","#5542a2","#d0b8e9");

    $total = count($backgrounds) - 1;
    $colors=$backgrounds[rand(0,$total)];
    return $colors;
}  

function level($level){ ?>
<style>
    .cont-level {
        width: 100%;
        background: #eee;
        display: inline-flex;
        margin: auto;
    }

    .nivel {
        display: grid;
        text-align: center;
        width: 100%;
        padding: 5px 3px;
        border-radius: 2px;
        border-right: 0.5px solid #aaa;
    }

    .cont-nivel:last-child {
        padding-right: 50px;
    }.nivel:last-child {
            border-right: 0;
    }

    .nivel font {
        display: block;
        margin: auto;
        border: 1px solid #bbb;
        border-radius: 50%;
        display: block;
        padding: 5px;
        color: white;
        width: 30px;
        height: 30px;
        line-height: 25px;
    }
</style>
<div class="cont-level">   
         
        <div class='nivel' onclick="varPage=1;buttons(varType,1); btnActived('.nivel',this);">
              <div style='display:grid;cursor:pointer'> 
                  <font style='background:<?php if($level>=1){echo 'dodgerblue';}else{echo 'gray';} ?>' class='icon-level0' size='+1'></font>
                  <p class='$signo' style='color:<?php if($level>=1){echo 'dodgerblue';}else{echo 'gray';} ?>'> Beginner</p>
              </div>
           </div>
                  <div class='nivel' onclick="varPage=1;buttons(varType,2); btnActived('.nivel',this);">
              <div style='display:grid;cursor:pointer'>
                  <font style='background:<?php if($level>=2){echo 'dodgerblue';}else{echo 'gray';} ?>' class='icon-readernaut' size='+1'></font>
                  <p class='$signo' style='color:<?php if($level>=2){echo 'dodgerblue';}else{echo 'gray';} ?>'> Entermediate</p>
              </div>
           </div>
                  <div class='nivel' onclick="varPage=1;buttons(varType,3); btnActived('.nivel',this);">
              <div style='display:grid;cursor:pointer'>
                  <font style='background:<?php if($level>=3){echo 'dodgerblue';}else{echo 'gray';} ?>' class='icon-level8' size='+1'></font>
                  <p class='$signo' style='color:<?php if($level>=3){echo 'dodgerblue';}else{echo 'gray';} ?>'> Advanced</p>
              </div>
           </div>
                   <div class='nivel' onclick="varPage=1;buttons(varType,4); btnActived('.nivel',this);">
              <div style='display:grid;cursor:pointer'>
                  <font style='background:<?php if($level>=4){echo 'dodgerblue';}else{echo 'gray';} ?>' class='icon-level9' size='+1'></font>
                  <p class='$signo' style='color:<?php if($level>=4){echo 'dodgerblue';}else{echo 'gray';} ?>'> Master</p>
              </div>
           </div>                
    
</div>
<?php }  

function comments($tabla,$category){    
    
    include("share.php");compartir("¡Comienza a aprender inglés de manera gratuita y divertida ya mismo, practicando lo que vas aprendiendo!");
            ///////////////////////////SUMA DE COMENTARIOS Y MEGUSTAS DE LA PUBLICACION///////////////////////////
            	include "../adm/connection.php";
          $regts=  mysqli_query($con,"SELECT COUNT(tags)AS comments,(SELECT COUNT(status) FROM history WHERE idpost=".$_GET['idtext'].")AS views,(SELECT COUNT(tags) FROM comments WHERE tags='likes' AND idpost=".$_GET['idtext'].") AS likes FROM comments LEFT JOIN contents ON comments.idpost=contents.idcontent WHERE tags='comments' AND idpost=".$_GET['idtext']."");
				while($sum = mysqli_fetch_array($regts)){ ?>
       	            <div class="infolikes">
       	                <span class="icon-like" id="enviarmegusta"><?php echo $sum['likes']; ?></span>
                        <span class="icon-chat" id="showcomments" onclick="$('#formComentarios,#res_comentarios').toggle();">
                            <?php echo $sum['comments']; ?>
                        </span>
                        <span class="icon-views" style="cursor:none"><?php echo $sum['views']; ?></span>
                    <!--MENU EN LA BARRA DE COMENTARIOS-->
                     <span class="icon-menu2" style="float:right;padding-bottom:0;" onclick="$('#editations').toggle();$(this).toggleClass('icon-up');"></span>
       	            </div>
       	             <div id="editations">
                        <?php if($tabla=="expressions" || $tabla=="vocabulary"){ ?> 
                             <a class="icon-puzzle" href="quiz.php?idtext=<?php echo $_GET['idtext'] ?>"> Modo Práctica</a>
                             <a class="icon-play-circle" href="words.php?idtext=<?php echo $_GET['idtext'] ?>&type=<?php echo $tabla ?>"> Modo Visor</a> 
                             <a class="icon-list" href="texts.php?idtext=<?php echo $_GET['idtext'] ?>&type=<?php echo $tabla ?>"> Modo Lista</a> 
                        <?php } ?>  
    	             <a class="icon-hide" href="javascript:void(0);" onclick="history('Hidden');"> Ocultar publicación</a>                    
    	             <a class="icon-wrench" href="javascript:void(0);" onclick="history('Reported');"> Reportar un problema</a>                    
                    <?php if(isset($_SESSION['idstudent'])){ ?>
                         <a class="icon-check" href="javascript:void(0);" onclick="history('Learned');"> Marcar como aprendido</a>                
                    <?php if($_SESSION['level']>=6){ ?>
                        <a class="icon-edit" href="editall.php?id=<?php echo $_GET['idtext'] ?>&type=<?php echo $tabla ?>"> Editar</a>
                        <a onclick="deletePost('<?php echo $_GET['idtext'] ?>');" href="javascript:void(0);" class="icon-trash" > Delete</a>
                    <?php }} ?>                                         
                     </div>
                     <script>
                        //REGISTRA LOS VIEWS
                         $(function() {
                             $.ajax({
                                 type: 'POST',
                                 url: '../adm/manager.php',
                                 data: {
                                     'iduser': <?php if(isset($_SESSION['idstudent'])){echo $_SESSION['idstudent'];}else{echo 1;} ?>,
                                     'idpost': <?php echo $_GET['idtext'] ?>,
                                     'action': 'views'
                                 },
                                 success: function(data) {
                                 }
                             });
                             return false;
                         });
                           
                            //OCULTA LOS POSTS 
                          function history(text) {
                             $.ajax({
                                 type: 'POST',
                                 url: '../adm/manager.php',
                                 data: {
                                     'iduser': <?php if(isset($_SESSION['idstudent'])){echo $_SESSION['idstudent'];}else{echo 1;} ?>,
                                     'idpost': <?php echo $_GET['idtext'] ?>,
                                     'text': text,
                                     'action': 'history'
                                 },
                                 success: function(data) {
                                    alert(data); 
                                 }
                             });
                             return false;
                         } 

                     </script>
             <?php  } 
                                 
        if(isset($_SESSION['idstudent'])){ ?>
            <!-- *****FORM ME GUSTA***********-->
        	<form id="formmegustas">
        	    <input type="hidden" name="idpost" value="<?php echo $_GET['idtext']; ?>">
        	    <input type="hidden" name="tag" value="likes">
        	    <input type="hidden" name="idstudent" value="<?php echo $_SESSION['idstudent']; ?>">
        	</form>
        	<!--*******FORM COMENTARIO*********************************-->
        	<form id="formComentarios">
                <div class="hide">
                    <input type="hidden" name="idreplay" id="idreplay">
                    <span class="icon-delete" title="Quitar adjunto" onclick="$('#idreplay,#txtreplay').val(''); $('.hide').slideUp();"></span>
                    <textarea name="txtreplay" id="txtreplay" rows="3" readonly></textarea>
                </div> 
                <div class="show">
                    <input type='hidden' name='idpost' value='<?php echo $_GET['idtext'] ?>'>
                    <input type='hidden' name='idstudent' value="<?php echo $_SESSION['idstudent']; ?>">
                    <textarea id="txtcomment" name='comment' title='Comment' placeholder='Add a Comment...'></textarea>
                    <input type="hidden" name="tag" value="comments">
                </div>
        	    <div class="enviar">
        	        <a href="javascript:void(0);" id="enviarcomentario" >Enviar</a>           	      
        	    </div>
        	</form>                    
            <?php }else{ ?> 
                  <br>
                        <a href="../index.php#login">Entra</a> o <a href="../index.php#signup">Registrate</a>, para interactuar con la comunidad.
                        <br> <br>
            <?php } ?> 
          
<!--///////////////////MUESTRA LOS COMENTARIOS Y LOS ENVIA///////////////////-->
            <div id="res_comentarios"></div>
       <script>
           $('#enviarcomentario').click(function() {
               $('#formComentarios').submit();
           });
           $('#enviarmegusta').click(function() {
               $('#formmegustas').submit();
           });

           $("#rplay").change(function() {
               if ($("#rplay").val() === '') {
                   $("#replay").val('0');
               }
           });
           /*///////////////////////////ENVIA LOS COMENTARIOS//////////////////////*/
           $('#formComentarios').submit(function() {
               $.ajax({
                   type: 'POST',
                   url: '../adm/comments.php',
                   data: $(this).serialize(),
                   // Mostramos un mensaje con la respuesta de PHP
                   success: function(data) {
                       mostarComentarios();
                       $('#txtcomment,#idreplay,#txtreplay').val('');
                       $('.hide').slideUp();
                   }
               });
               return false;
           });

           /*///////////////////////////FUNCNION QUE MUESTRA LOS COMENTARIOS//////////////////////*/
           function mostarComentarios() {
               $.ajax({
                   type: 'POST',
                   url: 'comments.php',
                   data: {
                       idblog: "<?php echo $_GET['idtext']; ?>"
                   },
                   // Mostramos un mensaje con la respuesta de PHP
                   success: function(data) {
                       $("#res_comentarios").html(data);
                   }
               });
           }

           function deletePost(id) {
               var eliminar = confirm('By clicking accept, all data linked to this content will be permanently deleted. \n\nAre you sure you want to delete?');
               if (eliminar) {
                   $.ajax({
                       type: 'POST',
                       url: '../adm/manager.php',
                       data: {
                           deletePost: id
                       },
                       success: function(data) {
                           location.href = "../app/main.php";
                       }
                   });
                   return false;
               }
           }
           mostarComentarios();

           /*///////////////////////////ENVIA LOS MEGUSTAS//////////////////////*/
           $('#formmegustas').submit(function() {
               $.ajax({
                   type: 'POST',
                   url: '../adm/comments.php',
                   data: $(this).serialize(),
                   success: function(data) {
                       $('#enviarmegusta').html(data);
                   }
               });
               return false;
           });
       </script>          
        
              <?php
   
    /*la variable join, contiene la cadena categoria, combertida en array para la sentencia sql*/
    $join="";
    $categoryArray= explode(' ',$category);
    for($i=0; $i<count($categoryArray);$i++){
       $join.="categories like '%$categoryArray[$i]%' or ";
    }
        $join=substr($join,0,(strlen($join)-3));
        //echo $join;?>
       
        <br>
    <div class="relatedpost">
         <h2>Related Posts:</h2>  <hr>	
         <div class="postextras">
<?php 
    //MUESTRA LOS POST RELACIONADOS    
    include("../adm/connection.php");         
 $res = mysqli_query($con, "SELECT * FROM contents WHERE ($join) AND idcontent!=".$_GET['idtext']." ORDER BY RAND() LIMIT 3"); 
               
   if(mysqli_num_rows($res) > 0){
       while($fila=mysqli_fetch_array($res)){ 
	       $topic=$fila['topic'];
	       $description=$fila['description'];
           if(strlen($topic) > 50){
               $topic=substr($topic, 0, 50);
           } 
         	 if(strlen($description) > 50){
               $description=substr($description, 0, 50); 
           } ?>
            <?php if($fila['type']=="practice"){ 
            $link="<a href='pratices.php?idtext=".$fila['idcontent']."&level=".$fila['level']."'>...ver más</a>";
            $click="location.href='pratices.php?idtext=".$fila['idcontent']."&level=".$fila['level']."'";
         }else{ 
            $link="<a href='texts.php?idtext=".$fila['idcontent']."&type=".$fila['type']."'>...ver más</a>";
            $click="location.href='texts.php?idtext=".$fila['idcontent']."&type=".$fila['type']."'";
        } ?>
           
    <div class='another' onclick="<?php echo $click ?>">
       <font color="red" size="-1"><?php echo $fila['type'] ?></font><br>
        <font color="blue"> <?php echo strip_tags($topic); ?></font><br>
        <i><font size="-1"> <?php echo strip_tags($description).$link; ?></font></i><br>
        
    </div>		
             <?php }
   }else{echo "<font color='red'>No content matched!</font>";}
?>
        </div>
  <br>
   <br><h2>Related Recents:</h2>   <hr> 
   <div class="postextras">
    <?php //MUESTRA LOS POST RECIENTES 
 $res = mysqli_query($con, "SELECT * FROM contents WHERE idcontent!=".$_GET['idtext']." ORDER BY idcontent DESC LIMIT 3");  
               
   if(mysqli_num_rows($res) > 0){
       while($fila=mysqli_fetch_array($res)){ 
	       $topic=$fila['topic'];
	       $description=$fila['description'];
          if(strlen($topic) > 50){
               $topic=substr($topic, 0, 50);
           } 
         	 if(strlen($description) > 50){
               $description=substr($description, 0, 50);  
           } ?>
           
             <?php if($fila['type']=="practice"){ 
            $link="<a href='pratices.php?idtext=".$fila['idcontent']."&level=".$fila['level']."'>...ver más</a>";
            $click="location.href='pratices.php?idtext=".$fila['idcontent']."&level=".$fila['level']."'";
         }else{ 
            $link="<a href='texts.php?idtext=".$fila['idcontent']."&type=".$fila['type']."'>...ver más</a>";
            $click="location.href='texts.php?idtext=".$fila['idcontent']."&type=".$fila['type']."'";
        } ?>
           
    <div class='another' onclick="<?php echo $click ?>">
       <font color="red" size="-1"><?php echo $fila['type'] ?></font><br>
        <font color="blue"> <?php echo strip_tags($topic); ?></font><br>
        <i><font size="-1"> <?php echo strip_tags($description).$link ; ?></font></i><br>
       
    </div>	
<?php } 
   }else{echo "<font color='red'>No content matched!</font>";}
    ?></div> <?php 
} //COMMENTS FUNCTION END ?>
</div>
<?php 

function resetUser($id){            	
  include "connection.php";
  $res = mysqli_query($con, "SELECT * FROM students WHERE idstudent='$id'"); 
  if(mysqli_num_rows($res) > 0){
		while($fila=mysqli_fetch_array($res)){   
            $_SESSION['name']=$fila['name'];   
            $_SESSION['cel']=$fila['cel'];   
            $_SESSION['level']=$fila['level']; 
      }
   }
    mysqli_close($con);
    mysqli_free_result($res);
}

function notacionKM($num){
    if($num>=1000000){
        $num/=1000000;
        $num=number_format($num,1)."M";
    }elseif($num>=1000){
        $num/=1000;
        $num=number_format($num,1)."K";
    }
    return $num;
}