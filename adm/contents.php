<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 0001
	FECHA: 15 april 2019
	
	PAGINA DE :DESCRIPCION
--> 

<?php  
include("../adm/connection.php");         
//include("../adm/functions.php");         
//	EL USUARIO DEBE PODER INICIAR SECCION CON SU NOMBRE, CORREO O TELEFONO Y SU CONTRASENA
     
$limite = 10;
$numpage = mysqli_real_escape_string($con,$_POST['page']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$level = mysqli_real_escape_string($con,$_POST['level']);
$iduser = mysqli_real_escape_string($con,$_POST['iduser']);
$posicion = (($numpage - 1) * $limite);

if($type != "" && $level !=""){   // echo "opcion 0 type $type y level $level";
   $res = mysqli_query($con, "SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Hidden' AND iduser=$iduser)AS hidden
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Learned' AND iduser=$iduser)AS learned
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing' AND iduser=$iduser)AS visited
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents WHERE type='$type' AND level='$level' ORDER BY RAND() LIMIT $posicion, $limite"); 
}elseif($level != ""){     //echo "opcioon1 type $type y (level='$level' or level='all') ";
   $res = mysqli_query($con, "SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Hidden' AND iduser=$iduser)AS hidden
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Learned' AND iduser=$iduser)AS learned
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing' AND iduser=$iduser)AS visited
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents WHERE level='$level' ORDER BY RAND() LIMIT $posicion, $limite"); 
}elseif($type != ""){    //echo "opcioon2 type $type y level '$level'";
   $res = mysqli_query($con, "SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Hidden' AND iduser=$iduser)AS hidden
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Learned' AND iduser=$iduser)AS learned
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing' AND iduser=$iduser)AS visited
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents WHERE type='$type' ORDER BY RAND() LIMIT $posicion, $limite"); 
}else{    //echo "opcioon3 type $type y level '$level'";
   $res = mysqli_query($con, "SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Hidden' AND iduser=$iduser)AS hidden
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Learned' AND iduser=$iduser)AS learned
   ,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing' AND iduser=$iduser)AS visited
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
   ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents ORDER BY RAND() LIMIT $posicion, $limite");  
}

//echo "type $type, level '$level', user $iduser y page $numpage posi $posicion <br>";
   if(mysqli_num_rows($res) > 0){
        while($fila=mysqli_fetch_array($res)){  
            $topic=strip_tags($fila['topic']);
            $description=strip_tags($fila['description']);
                //VALIDA EL COLOR
            if($iduser!=1){                
            if($fila['learned'] > 0){                  
                $color="#b3ffcb";
            }elseif($fila['visited'] > 0){
                $color="#99ddff";                                    
            }else{
                $color="#ddd";
            }
        }else{$color="#ddd";}
            
            //CORTA LOS TEXTOS
            if(strlen($topic) > 100){ 
                $topic=substr($topic, 0, 100). "...Read More"; 
            }
            if(strlen($description) > 100){ 
                $description=substr($description, 0, 100). "...Read More";
            } ?>
       
        
 <?php 
        if($fila['hidden']<1){ ?>
            <!--#############CONTENEDOR PRINCIPAL#######################-->
            <div class="divRandom" style="background:<?php echo $color; ?>;">
                 <?php if($fila['learned'] > 0){ ?>
                          <font color='blue' class="icon-checked"> <?php echo $fila['type']; ?></font>	
                <?php }else{ ?>
                          <font color='red' class="icon-check"> <?php echo $fila['type']; ?></font>	
                 <?php } 
                              
        //*********VOCABULARY Y PHRASES CONTENTES************//
        if($fila['type']=='vocabulary' || $fila['type']=='expressions'){ ?>	  

      <div class="divMode">
          <div onclick="location.href='../app/words.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type'] ?>'">
              <font>Visor</font><br>
              <font class="icon-fullscreen"></font> 
          </div>
          <div onclick="location.href='../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>'">
              <font>Lista</font><br>
              <font class="icon-list"></font>
          </div>
          <div onclick="location.href='../app/quiz.php?idtext=<?php echo $fila['idcontent'];?>'">
              <font>Quiz</font><br>
              <font class="icon-puzzle"></font>
          </div>
      </div>
	        <strong  translate="no"> <?php echo $topic; ?></strong>
	         <?php if($fila['type']!='readings'){ echo "<i>".$description."</i>";} ?>	  
	        
	                    
	 
            <!--***************CONVERSATION CONTENTS*******************-->
			  <?php }elseif($fila['type']=='conversation'){ ?>	
	  <div class="divMode">
	      <div onclick="location.href='../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>'">
	          <font>Conversación</font><br>
	          <font class="icon-chat"></font>
	      </div>
	  </div> 
          <strong  translate="no"> <?php echo $topic; ?></strong>
	       <i> <?php  echo $description; ?></i>
	       
               
    <!--********************** READINGS CONTENTS ******************-->
    <?php }elseif($fila['type']=='readings'){ ?>    
		<div class="divMode">	    
		<div onclick="location.href='../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>'">
	        <font >Lectura</font><br>
	        <font class="icon-book1"></font>  
        </div>
        </div>
        <strong  translate="no"> <?php echo $topic; ?></strong> 
          
          
        <!--********************** GRAMMAR CONTENTS ******************-->
    <?php }elseif($fila['type']=='grammar'){ ?>    
		<div class="divMode">	    
		<div onclick="location.href='../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>'">
	        <font >Gramática</font><br>
	        <font class="icon-parentheses"></font>  
        </div>
        </div>
        <strong  translate="no"> <?php echo $topic; ?></strong> 
          
           <!--********************** VIDEOS CONTENTS ******************-->
     <?php }else{ ?>                         
		<div class="divMode">	    
		<div onclick="location.href='../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>'">
	        <font >Video</font><br>
	        <font class="icon-play-circle"></font>  
        </div>
        </div>
         <strong  translate="no"> <?php echo $topic; ?></strong>
    <?php } ?>
        
         <div style="font-size:12px">
	        <span class="icon-like"> <?php echo  $fila['likes'] ?></span>
	        <span class="icon-chat"> <?php echo  $fila['comments'] ?></span>
 	          <?php if($fila['visited'] > 0){ ?>
                      <span class="icon-views"> <?php echo  $fila['views'] ?></span>
        	  <?php }else{ ?>
                      <span class="icon-hide"> <?php echo  $fila['views'] ?></span>
              <?php } ?>                
	     </div>
</div>       
       <?php }}} ?>


