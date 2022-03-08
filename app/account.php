


<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 20122019
	FECHA: 20 dec 2019
	
	PAGINA DE : inicio de secsion
-->
<?php 
    
        include("../adm/functions.php");
        date_default_timezone_set('America/St_Thomas');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="profile, library">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>account</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="../css/skills.css">
    
    <script src="../js/jquery-3.3.1.min.js"></script>    
    <script src="../js/jquery.knob.min.js"></script>
    <script src="../js/loadImg.js"></script>
    <script src="../src/ckeditor/ckeditor.js"></script>
    
    
    <link rel="stylesheet" href="../src/sweetAlert2/sweetalert2.min.css">
    <script src="../src/sweetAlert2/sweetalert2.all.min.js"></script>
   
</head>
<body>
    <?php include("menu.php");
    if(isset($_SESSION['idstudent'])){  
    //CONTROLES DE EDICCION
    if(isset($_SESSION['level']) && $_SESSION['level']>=6){ ?>
        <div class="divbtn">                 
            <button class="btn icon-video" onclick="openwindows(this, '#divVideo');"></button>
            <button class="btn icon-content1" onclick="openwindows(this, '#divContenidos'); "></button>
            <button class="btn icon-text1" onclick="openwindows(this, '#divReading');"></button>
        </div>
<?php } ?>

<!--  CONTROLES DE PERFIL DE USUARIO--> 
   
    <div class="divbtn profile">
        <button class="btn icon-usercircle" id="default" onclick="openwindows(this, '#divProfile');"></button>         
        <button class="btn icon-unlock" onclick="openwindows(this, '#divLearnedPosts');"></button>
        <button class="btn icon-hide" onclick="openwindows(this, '#divHiddenPosts');"></button>
        <?php if(isset($_SESSION['level']) && $_SESSION['level']>=6){ ?>
                   <button class="btn icon-care" onclick="openwindows(this, '#divReportedPosts');"></button>
                   <button class="btn icon-users" onclick="openwindows(this, '#divUsers');"></button>
        <?php } ?> 
        <button class="btn icon-edit" onclick="openwindows(this, '#divEdit');"></button>
        <button class="btn icon-trash" onclick="deleteAccount(<?php echo $_SESSION['idstudent']; ?>);"></button> 
        <hr style="height:1px;" noshade="noshade">
        <button onclick="window.location.href='../adm/logout.php'" class="btn icon-logout"></button>
    </div> 
    
    <!-- --------------CONTENEDOR POSTS APRENDIDOS---------------->
    <div class="divtab temas" id="divLearnedPosts">
        <h2>REPASAR: TEMAS APRENDIDOS</h2>
        <hr>
        <?php         
            include ("../adm/connection.php");
            $res = mysqli_query($con,"SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
              ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
              ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents RIGHT JOIN history ON             contents.idcontent=history.idpost WHERE status='Learned' AND iduser=".$_SESSION['idstudent']."");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
                
                <div class="divRandom" style="background:<?php echo fondos(); ?>;" >
                   <font> <?php echo $fila['type']; ?></font> | 
                    <span class="icon-views" onclick="show_hide_posts(<?php echo $_SESSION['idstudent'] ?>, <?php echo $fila['idcontent'] ?>,'Learned')"> Desmarcar tema.</span>
    			    <br> 
        <?php if($fila['type']=="practice"){ ?>
            <a href="pratices.php?idtext=<?php echo $fila['idcontent'];?>&level=<?php echo $fila['level'] ?>"><?php echo $fila['topic'];?></a>
        <?php }else{ ?>
            <a href="texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>"><?php echo $fila['topic'];?></a>
        <?php } ?>		
          
			        <p> <?php if($fila['type']!='readings' && $fila['type']!='videos'){ echo $fila['description'];} ?></p>			  
                   
                   <div style="">
                       <span class="icon-like"> <?php echo  $fila['likes'] ?></span> 
                       <span class="icon-chat"> <?php echo  $fila['comments'] ?></span>
                       <span class="icon-views"> <?php echo  $fila['views'] ?></span>
                   </div>
	       </div>
        <?php  }    mysqli_free_result($res);	 mysqli_close($con);                     
         }else{echo "<center class='icon-folder' style='padding:100px 0;color:red'> Carpeta vacia!</center>";} ?>
      </div>  
          
    <!-- --------------CONTENEDOR POSTS REPORTADOS---------------->
    <div class="divtab temas" id="divReportedPosts">
        <h2>TEMAS REPORTADOS</h2>
        <hr>
        <?php         
            include ("../adm/connection.php");
            $res = mysqli_query($con,"SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Reported')AS views ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE status='Reported'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
               
                <div class="divRandom" style="background:<?php echo fondos(); ?>;" >
                   <font> <?php echo $fila['type']; ?></font> | <span class="icon-care" onclick="reported(<?php echo $fila['idcontent'];?>);"> Desmarcar reporte</span>
    			    <br>
        <?php if($fila['type']=="practice"){ ?>
            <a href="pratices.php?idtext=<?php echo $fila['idcontent'];?>&level=<?php echo $fila['level'] ?>"><?php echo $fila['topic'];?></a>
        <?php }else{ ?>
            <a href="texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>"><?php echo $fila['topic'];?></a>
        <?php } ?>		
                   <p> <?php if($fila['type']!='readings' && $fila['type']!='videos'){ echo $fila['description'];} ?></p>			  
                   
                   <div style="">
                       <span class="icon-like"> <?php echo  $fila['likes'] ?></span>
                       <span class="icon-chat"> <?php echo  $fila['comments'] ?></span>
                       <span class="icon-views"> <?php echo  $fila['views'] ?></span>
                   </div>
	       </div>
        <?php  }    mysqli_free_result($res);	 mysqli_close($con);                     
         } else { echo "<center class='icon-folder' style='padding:100px 0;color:red'> Carpeta vacia!</center>";}?>
         
          <script>
              //ELIMINA LA MARCA COMO OCULTOS DE LOS POST
              function reported(id) {
                  $.ajax({
                      type: 'POST',
                      url: '../adm/manager.php',
                      data: {
                          'idpost': id,
                          'action': 'reported'
                      },
                      success: function(data) {
                          location.reload();
                      }
                  });
                  return false;
              }
          </script>
      </div>  
          
    <!-- --------------CONTENEDOR POSTS OCULTOS---------------->
    <div class="divtab temas" id="divHiddenPosts">
        <h2>TEMAS OCULTOS</h2>
        <hr>
        <?php         
            include ("../adm/connection.php");
            $res = mysqli_query($con,"SELECT *,(SELECT COUNT(status) FROM history WHERE idpost=idcontent AND status='Showing')AS views
              ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='likes')AS likes
              ,(SELECT COUNT(tags) FROM comments WHERE idpost=idcontent AND tags='comments')AS comments FROM contents RIGHT JOIN history ON             contents.idcontent=history.idpost WHERE status='Hidden' AND iduser=".$_SESSION['idstudent']."");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
               
                <div class="divRandom" style="background:<?php echo fondos(); ?>;" >
                   <font> <?php echo $fila['type']; ?></font> | 
                    <span class="icon-views" onclick="show_hide_posts(<?php echo $_SESSION['idstudent'] ?>, <?php echo $fila['idcontent'] ?>,'Hidden')"> Mostrar de vuelta</span>
    			    <br>
    			    
        <?php if($fila['type']=="practice"){ ?>
            <a href="pratices.php?idtext=<?php echo $fila['idcontent'];?>&level=<?php echo $fila['level'] ?>"><?php echo $fila['topic'];?></a>
        <?php }else{ ?>
            <a href="texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>"><?php echo $fila['topic'];?></a>
        <?php } ?>
        
                
			        <p> <?php if($fila['type']!='readings' && $fila['type']!='videos'){ echo $fila['description'];} ?></p>			  
                   
                   <div style="">
                       <span class="icon-like"> <?php echo  $fila['likes'] ?></span>
                       <span class="icon-chat"> <?php echo  $fila['comments'] ?></span>
                       <span class="icon-views"> <?php echo  $fila['views'] ?></span>
                   </div>
	       </div>
        <?php  }    mysqli_free_result($res);	 mysqli_close($con);                     
         } else{echo "<center class='icon-folder' style='padding:100px 0;color:red'> Carpeta vacia!</center>";}?>
      </div>     

   <!-- --------------CONTENEDOR POSTS USUARIOS---------------->
    <div class="divtab temas" id="divUsers">
        <h2>COMMUNIDAD</h2>
        <hr>
        <?php         
            include ("../adm/connection.php");
            $res = mysqli_query($con,"SELECT * FROM students ORDER BY idstudent DESC");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
               
                <div class="divRandom" style="background:<?php echo fondos(); ?>;" >
                  
                   <font><strong>Id:</strong> <?php echo $fila['idstudent']; ?></font> <br>
                    <font><strong>Name:</strong> <a href="profile.php?iduser=<?php echo $fila['idstudent']; ?>"><?php echo $fila['name']; ?></a></font> <br>
                   <font><strong>Mail:</strong> <?php echo  $fila['mail']; ?></font> <br>
                   <font> <strong>Contact:</strong><?php echo $fila['cel']; ?></font> <br>
                   <font><strong>Country:</strong> <?php echo " ". $fila['country']; ?></font> <br>
                   <font><strong>Level:</strong> <?php echo $fila['level']; ?></font> <br>
                   <font> <?php echo date("M j, Y",strtotime($fila['date'])); ?></font> <br>                  
	       </div>
        <?php  }    mysqli_free_result($res);	 mysqli_close($con);                     
         }else{ echo "<center class='icon-folder' style='padding:100px 0;color:red'> Carpeta vacia!</center>";}?>
      </div>     
 
     <!-- --------------CONTENEDOR PERFIL---------------->
    <div class="divtab" id="divProfile" >
      
       <script>
           function skills(tag, val, limit, bgColor) {
               $(tag).knob({
                   "min": 0,
                   "max": limit,
                    "width": 80,
                  "height": 80,
                   "fgColor": bgColor,
                   "readOnly": true,
                   "draw":function(){
                       $(this.i).css('font-size','1em');
                   }
               });
               $(tag).val(val+"/" +limit);
           }
       </script>
       
        <?php   $rango=""; 
            if(isset($_SESSION['idstudent'])){
                include ("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT * FROM students WHERE idstudent='".$_SESSION['idstudent']."'");
                    if(mysqli_num_rows($res) > 0 ){  
                         while($fila=mysqli_fetch_array($res)){ 
                        $name=$fila['name'];
                        $cel=$fila['cel'];
                        $mail=$fila['mail'];
                        $country=$fila['country'];
                        $pass=$fila['pass']; 
                        $imamen=$fila['foto']; 
                        $_SESSION['level']=$fila['level'];
                             
                            if($fila['level'] <= 1)
                                 $rango=": Beginner"; 
                            elseif($fila['level'] <= 2)
                                 $rango=": Intermediate";
                            elseif($fila['level'] <= 3)
                                 $rango=": Advanced";
                            elseif($fila['level'] <= 4)
                                 $rango=": Master"; 
                            else
                                 $rango.=": Admin";      ?>
                                 
                            <div class="divperfil">
                                <div class="imgloaded">
                                    <div class="img">
                                     <?php if($imamen==null  || $imamen=="null" || $imamen==""){  
                                             echo "<font>".strtoupper(substr($name,0,1))."</font>";
                                       }else{ ?>
                                              <img src="<?php echo $imamen; ?>" alt="foto">   
                                       <?php } ?> 
                                     </div> 
                                     <h1><?php echo $name; ?></h1>
                                 </div>
                                <span class="icon-usercircle"> ID<?php echo $fila['idstudent'] ?></span>
                                <br><span class="icon-telephone"> <?php echo $cel; ?></span>
                                <br><span class="icon-location"> <?php echo $country; ?></span>
                                <br><span class="icon-arroba"> <?php echo $mail;?></span>
                                <br><span class="icon-level8"> <?php echo $rango?></span>
                                <br><span class="icon-calendar"> Member since: <?php echo date("M j, Y",strtotime($fila['date'])); ?></span>
                            </div>
                            <br><hr>
                            
                              <?php   $seguidores=0;$siguiendo=0;          
              $seg=mysqli_query($con,"SELECT COUNT(*) AS seguidores FROM friends WHERE followed=".$fila['idstudent']);
                             if(mysqli_num_rows($seg)>0){
                                 while($sgdrs=mysqli_fetch_array($seg)){ 
                                     $seguidores=$sgdrs['seguidores'];
                                 }
                             }
                    $sig=mysqli_query($con,"SELECT COUNT(*) AS siguiendo FROM friends WHERE following=".$fila['idstudent']);
                             if(mysqli_num_rows($sig)>0){
                                 while($sgnd=mysqli_fetch_array($sig)){ 
                                     $siguiendo=$sgnd['siguiendo'];
                                 }
                             } 
                    $suma=mysqli_query($con,"SELECT COUNT(*) AS aprendido FROM history WHERE status='Learned' AND iduser=".$fila['idstudent']);
                             if(mysqli_num_rows($suma)>0){
                                 while($ap=mysqli_fetch_array($suma)){ 
                                     $aprendido=$ap['aprendido'];
                                 }
                             } 
            ?>
                
        
           
           <div class="row1">
               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-users"></i></p>
                       <h3><?php echo notacionKM($seguidores); ?></h3>
                       <p>Seguidores</p>
                   </div>
               </div>

               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-usersecret"></i></p>
                       <h3><?php echo notacionKM($siguiendo); ?></h3>
                       <p>Siguiendo</p>
                   </div>
               </div>


               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-checked"></i></p>
                       <h3><?php echo notacionKM($aprendido); ?></h3>
                       <p>Aprendido</p>
                   </div>
               </div>
           </div>
           <br><hr><br>
                              
                            
                            
                            <?php                                                                
                                   }                     
                                mysqli_free_result($res);
                                 mysqli_close($con);                     
                                     } 
                    } 
                        
//   ########## CONTENT SKILLS#############
           
        include("skill.php");  skills($_SESSION['idstudent']);?>
<!-- ############# END SKILLS ################-->
   
      </div>    

    <!--    ----------CONTENEDOR VOCABULARY--------------->
    <div class="divtab" id="divContenidos">
       <h2>CONTENIDOS</h2>
        <hr> 
        <!--INSERT CONTENTS-->
        <div class="font" onclick="slide_show('#formContents');"><span class="icon-sort"></span> <stong>CREATE A POST</stong></div>
        <form class="slideform" id="formContents">          
            <input type="text" name="title" required placeholder="Title">
            <textarea name="desc" rows="3" placeholder="Description" required></textarea>
            <input type="text" name="category" required placeholder="Enter cathegories">
            <input type="hidden" name="autor" value="<?php echo $_SESSION['idstudent'] ?>">
            <input type="hidden" name="action" value="contents">
            <select name="tag" required>
                <option value="" selected>Tags</option>
                <option value="vocabulary">Vocabulary</option>
                <option value="conversation">Conversation</option>
                <option value="expressions">Expressions</option>
            </select>
            <select name="level" required>
                <option value="" selected>Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit">Submit</button>           
        </form>
        
        <!--ISNERT VOCABULARY-->
            <div class="font" onclick="slide_show('#formWord');"><span  class="icon-sort"></span> <stong>SAVE A WORD</stong></div>
        <form class="slideform" id="formWord">
             <select name="idword" required>
                <option value="" selected>Select a vocabulary</option>
                <?php //MUESTRA LOS POST RECIENTES 
                include("../adm/connection.php");    
                $res = mysqli_query($con, "SELECT * FROM contents WHERE type='vocabulary' ORDER BY idcontent DESC");                
                if(mysqli_num_rows($res) > 0){
                    while($fila=mysqli_fetch_array($res)){ ?>
                <option value="<?php echo $fila['idcontent'];?>"><?php echo "Level-".$fila['level'].": ".$fila['topic'];?></option>
                <?php } 
                } ?>
            </select>
            <input type="text" class="inputword" name="word" required placeholder="English">
            <input type="text" class="inputword" name="meaning" required placeholder="Spanish">
            <input type="hidden" name="action" value="words">
            <button type="submit">Submit</button>
        </form>
                
        <!-- INSERT CONVERSATION -->
            <div class="font"  onclick="slide_show('#formConversation');"><span class="icon-sort"></span> <stong>SAVE A CONVERSATION</stong></div>
        <form class="slideform" id="formConversation">
             <select name="idpost" required>
                <option value="" selected>Select a topic</option>
                <?php //MUESTRA LOS POST RECIENTES 
                include("../adm/connection.php");    
                $res = mysqli_query($con, "SELECT * FROM contents WHERE type='conversation' ORDER BY idcontent DESC");                
                if(mysqli_num_rows($res) > 0){
                    while($fila=mysqli_fetch_array($res)){ ?>
                <option value="<?php echo $fila['idcontent'];?>"><?php echo "Vol[".$fila['level']."]: ".$fila['topic'];?></option>
                <?php } 
                } ?>
            </select>
            <div style="display:flex">
                 <input type="text" class="inputword" name="person" required placeholder="Person" list="prsn">
                 <datalist id="prsn"> 
                    <option value="Max">Max</option>
                    <option value="Lisa">Lisa</option>
                    <option value="John">John</option>
                    <option value="Mary">Mary</option>
                    <option value="Peter">Peter</option>
                    <option value="Eva">Eva</option>
                    <option value="Ralph">Ralph</option>
                    <option value="Julia">Julia</option>
                    <option value="Charles">Charles</option>
                    <option value="Rose">Rose</option>
                </datalist>
                 <input type="number" name="position" min="1" max="4" value="1">
            </div>
            <input type="text" class="inputword" name="english" required placeholder="English">
            <input type="text" class="inputword" name="spanish" required placeholder="Spanish">
            <input type="hidden" name="action" value="conversation">
            <button type="submit">Submit</button>
        </form>
        
        <!-- INSERT PHRASES-->
        <div class="font" onclick="slide_show('#formPhrases');"><span  class="icon-sort"></span> <stong>SAVE A EXPRESSION</stong></div>
        <form class="slideform" id="formPhrases">
            <select name="idpost" required>
                <option value="" selected>Select an expression tag </option>
                <?php 
                include("../adm/connection.php");    
                $res = mysqli_query($con, "SELECT * FROM contents WHERE type='expressions' ORDER BY idcontent DESC");                
                if(mysqli_num_rows($res) > 0){
                    while($fila=mysqli_fetch_array($res)){ ?>
                <option value="<?php echo $fila['idcontent'];?>"><?php echo "Level-".$fila['level'].": ".$fila['topic'];?></option>
                <?php } 
                } ?>
            </select>
            <input type="text" name="english" required placeholder="Expression in english">
            <input type="text" name="spanish" required placeholder="Expresión en español">
            <input type="hidden" name="action" value="expressions">
            <button type="submit">Save</button>
        </form>  
        
        <!-- PHRASAR VERBS-->
        <div class="font" onclick="slide_show('#formPhrasalVerb');"><span  class="icon-sort"></span> <stong>SAVE A PHRASAL VERB</stong></div>
        <form class="slideform" id="formPhrasalVerb">
            <input type="text" name="fvenglish" required placeholder="Verb in english">
            <input type="text" name="fvspanish" required placeholder="Verbo en español">
            <textarea  id="texto"></textarea>
            <textarea  name="fvdescription" id="fvdes" style="display:none"></textarea>
             <select name="fvlevel" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <input type="hidden" name="action" value="frasalVerb">
            <button type="submit">Save</button>
        </form>
    <script>
        //ENVIA EL FORMULARIO PHRASES                    
        $('#formContents').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: $(this).serialize(),
                success: function(data) {

                    $("#lblinformation").html(data);
                    $("#lblinformation").show();
//                    setTimeout(function() {
////                        $("#lblinformation").hide();
//                        location.reload();
//                    }, 1500);
                    document.getElementById('formContents').reset();
                }
            });
            return false;
        });

        //ENVIA EL FORMULARIO PHRASES                    
        $('#formWord').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: $(this).serialize(),
                success: function(data) {
                    $("#lblinformation").html(data);
                    $("#lblinformation").show();
                    setTimeout(function() {
                        $("#lblinformation").hide()
                    }, 3000);
                    $("#formWord input[type=text]").val("");
                    $("#formWord input:first").focus();
                }
            });
            return false;
        });

        //ENVIA EL FORMULARIO PHRASES                    
        $('#formConversation').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: $(this).serialize(),
                success: function(data) {
                    $("#lblinformation").html(data);
                    $("#lblinformation").show(); 
                    setTimeout(function() {
                        $("#lblinformation").hide()
                    }, 3000);
                    $("#formConversation input[type=text]").val("");
                }
            });
            return false;
        });

        //ENVIA EL FORMULARIO PHRASES                    
        $('#formPhrases').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: $(this).serialize(),
                success: function(data) {
                    $("#lblinformation").html(data);
                    $("#lblinformation").show();
                    setTimeout(function() {
                        $("#lblinformation").hide()
                    }, 3000);
                    $("#formPhrases input[type=text]").val("");

                }
            });
            return false;
        });

        CKEDITOR.replace('texto');
        //ENVIA EL FORMULARIO PHRASASL VERBS                    
        $('#formPhrasalVerb').submit(function() {                 
                $('#fvdes').val(CKEDITOR.instances.texto.getData());
            $.ajax({                
                type: 'POST',
                url: '../adm/manager.php',
                data: $(this).serialize(),
                success: function(data) {
                    $("#lblinformation").html(data);
                    $("#lblinformation").show();
                    setTimeout(function() {
                        $("#lblinformation").hide()
                    }, 3000);
                    $("#formPhrasalVerb input[type=text],#formPhrasalVerb textarea").val("");
                    CKEDITOR.instances.texto.setData('');
                    $("#formPhrasalVerb input:first").focus();
                }
            });
            return false;
        });
    </script>
    </div>  

    <!--    ----------CONTENEDOR VIDEOS--------------->
    <div class="divtab" id="divVideo">
        <h2>LINK VIEDO</h2>
        <hr>
        <form id="formVideos">
           <input type="text" name="title" required placeholder="Title">
            <textarea name="desc" required placeholder="Enter a video link" rows="5"></textarea>
            <input type="text" name="category" required placeholder="Enter catherogies">
            <input type="hidden" name="autor" value="<?php echo $_SESSION['idstudent'] ?>">
            <input type="hidden" name="action" value="contents">
            <input type="hidden" name="tag" value="videos">
            <select name="level" required>
                <option value="" selected>Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit">Save</button>
        </form>
        <script>
            //ENVIA EL FORMULARIO PHRASES                    
            $('#formVideos').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: '../adm/manager.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        $("#lblinformation").html(data); $("#lblinformation").show();  
//                        setTimeout(function() {  $("#lblinformation").hide() }, 3000);
                        document.getElementById("formVideos").reset();
                    }
                });
                return false;
            });

        </script>
    </div>

    <!--  ----------CONTENEDOR LECTURA--------------->
    <div class="divtab" id="divReading">
        <h2>CREATE READING</h2>
        <hr>
        <form style="width:100%" id="formReadings"> 
            <input type="text" name="title" required placeholder="Title">
            <textarea id="reading" required></textarea>
            <textarea id="txtdesc" name="desc" style="display:none"></textarea>
            <input type="text" name="category" required placeholder="Cathegories">
            <input type="hidden" name="autor" required value="<?php echo $_SESSION['idstudent']; ?>">
            <input type="hidden" name="action" value="contents">
            <input type="hidden" name="tag" value="readings">
            <select name="tag" required>
                <option value="" selected>Tags</option>
                <option value="grammar">Grammar</option>
                <option value="readings">Readings</option>
            </select>
            <select name="level" required>
                <option value="" selected>Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit" id="ddd">Save</button>  
        </form>            

        <script>
            CKEDITOR.replace('reading');
            //ENVIA EL FORMULARIO READINGS                   
            $('#formReadings').submit(function() {                
                $('#txtdesc').val(CKEDITOR.instances.texto.getData());
                $.ajax({
                    type: 'POST',
                    url: '../adm/manager.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        $("#lblinformation").html(data); $("#lblinformation").show();  
                        setTimeout(function() {  $("#lblinformation").hide();window.location.reload(); }, 2000);                        
                    }
                });
                return false;
            });

        </script>
    </div> 

    <!--------------CONTENEDOR EDITAR USUARIO-------------->
    <div class="divtab" id="divEdit">
        <h2>EDITAR PERFIL</h2>
        <form id="formsignup">
            <input type="text" name="name" required placeholder="Full name" value="<?php echo $name; ?>">
            <input type="tel" name="cel" placeholder="Phone" value="<?php echo $cel; ?>">
            <select id="country" name="country" title="Country">
                <script>
                    /*An array containing all the country names in the world:*/
                    var countries = ["Afganistán", "Albania", "Argelia", "Andorra", "Angola", "Anguila", "Antigua y Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaiyán", "Bahamas", "Bahrein", "Bangladesh", "Barbados", "Bielorrusia", "Bélgica", "Belice", "Benin", "Bermudas", "Bhután", "Bolivia", " Bosnia y Herzegovina ", " Botswana ", " Brasil ", " Islas Vírgenes Británicas ", " Brunei ", " Bulgaria ", " Burkina Faso ", " Burundi ", " Camboya ", " Camerún ", " Canadá ", " Cabo Verde ", " Islas Caimán ", " República Centroafricana ", " Chad ", " Chile ", " China ", " Colombia ", " Congo ", " Islas Cook ", " Costa Rica ", " Cote D Ivoire ", "Croacia", "Cuba", "Curazao", "Chipre", "República Checa", "Dinamarca", "Djibouti", "Dominica", "República Dominicana", "Ecuador", "Egipto", "El Salvador", "Guinea Ecuatorial", "Eritrea", "Estonia", "Etiopía", "Islas Falkland", "Islas Feroe", "Fiji", "Finlandia", "Francia", "Polinesia Francesa", "Antillas Francesas", "Gabón", "Gambia", "Georgia", "Alemania", "Ghana", "Gibraltar", "Grecia", "Groenlandia", "Granada", "Guam", "Guatemala", "Guernsey", " Guinea ", " Guinea Bissau ", " Guyana ", " Haití ", " Honduras", " Hong Kong ", " Hungría ", " Islandia ", " India ", " Indonesia ", " Irán ", " Iraq ", " Irlanda ", " Isla de Man ", " Israel ", " Italia ", "Jamaica", "Japón", "Jersey", "Jordania", "Kazajstán", "Kenia", "Kiribati", "Kosovo", "Kuwait", "Kirguistán", "Laos", "Letonia", "Líbano", " Lesotho ", " Liberia ", " Libia ", " Liechtenstein ", " Lituania ", " Luxemburgo ", " Macao ", " Macedonia ", " Madagascar ", " Malawi ", " Malasia ", " Maldivas ", "Mali", "Malta", "Islas Marshall", "Mauritania", "Mauricio", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montenegro", "Montserrat", " Marruecos ", " Mozambique ", " Myanmar ", " Namibia ", " Nauro ", " Nepal ", " Países Bajos ", " Antillas Neerlandesas ", " Nueva Caledonia ", " Nueva Zelandia ", " Nicaragua ", " Níger ", "Nigeria", "Corea del Norte", "Noruega", "Omán", "Pakistán", "Palau", "Palestina", "Panamá", "Papúa Nueva Guinea", "Paraguay", "Perú", "Filipinas", "Polonia", "Portugal", "Puerto Rico", "Qatar", "Reunión", "Rumania", "Rusia", "Ruanda", "San Pedro y Miquelón", "Samoa", "San Marino", "Santo Tomé y Príncipe", "Arabia Saudita", "Senegal", "Serbia", "Seychelles", "Sierra Leona", "Singapur", "Eslovaquia", "Eslovenia", "Islas Salomón", "Somalia", "Sudáfrica", "Corea del Sur", "Sudán del Sur", "España", "Sri Lanka", "San Cristóbal y San Nevis ", " Santa Lucía ", " San Vicente ", " Sudán ", " Suriname ", " Suazilandia ", " Suecia ", " Suiza ", " Siria ", " Taiwán ", " Tayikistán ", " Tanzania ", " Tailandia ", " Timor L'Este ", " Togo ", " Tonga ", " Trinidad y Tobago ", " Túnez ", " Turquía ", " Turkmenistán ", " Turcas y Caicos ", " Tuvalu ", " Uganda ", "Ucrania", "Emiratos Árabes Unidos", "Reino Unido", "Estados Unidos de América", "Uruguay", "Uzbekistán", "Vanuatu", "Ciudad del Vaticano", "Venezuela", "Vietnam", "Islas Vírgenes (Estados Unidos )", "Yemen ", " Zambia ", " Zimbabwe "];
                    for (i = 0; countries.length > i; i++) {
                        document.getElementById("country").innerHTML += "<option value='" + countries[i] + "'>" + countries[i] + "</option> <br>";
                        if (countries[i] === "<?php echo $country ?>") {
                            document.getElementById("country").innerHTML += "<option value='" + countries[i] + "' selected>" + countries[i] + "</option> <br>";
                        }
                    }
                </script> 
            </select>
            <input type="email" name="mail" placeholder="Email" value="<?php echo $mail; ?>">
            <input type="password" name="pass" placeholder="New Password?" required>
            <input type="hidden" name="id" value="<?php echo  $_SESSION['idstudent']; ?>">
            <button type="submit">Editar</button>
        </form>
        
        <script>
            $('#formsignup').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: '../adm/edit-student.php',
                    data: $(this).serialize(),
                    success: function(data) {
                         <?php  resetUser($_SESSION['idstudent']); ?>
                        window.location.reload();                       
                    }
                });
                return false;
            });

        </script> 
        <style>
            .divimage {
                text-align: center;
            }

            .divimage .imgloaded {
                display: block;
                margin: auto;
            }

            .divimage .imgloaded .img {
                display: block;
                margin: auto;
                text-align: center;
            }

            .divimage .imgloaded img
            {
                width: 100px;
                height: auto;
                margin: auto;
            }

            .divimage .imgloaded font {
                width: 100px;
                height:100px;
                display: block;
                background: black;
                color: dodgerblue;
                margin: auto;
                font-size: 2em;
                line-height: 100px;
                font-weight: bold;
            }

            .formulario input {
                background-color: dodgerblue;
                color: white;
                padding: 10px 5px;
            }
        </style>
       <!--///////////////////////FOTO DE PERFIL///////////////////////-->
			<div class="divimage" > 
				<h2>CAMBIAR FOTO</h2>
				
				<div class="imgloaded">
				    <div class="img">
                     <?php if($imamen==null  || $imamen=="null" || $imamen==""){  
                             echo "<font>".strtoupper(substr($name,0,1))."</font>";
                       }else{ ?>
                              <img src="<?php echo $imamen; ?>" alt="foto" id="vistaImagen">   
                       <?php } ?> 
                     </div> 
				</div> 
				<div class="formulario">
					<form action="../adm/controller.php" method="post" enctype="multipart/form-data">
						<label for="imagen">selecione una imagen menor a 3MB</label>
						<input type="file" name="imagen" id="imagen" title="Examinar Imagen">
    		            <input type="hidden" name="idstudent" value="<?php echo  $_SESSION['idstudent']; ?>">
						<div id="errores"></div>
						<input type="hidden" name="table" value="foto">
						<input type="submit" value="Cambiar Foto">
					</form>					
				</div> 
			</div>
    </div>
    <br>
    <font align='center'><div id="lblinformation"></div></font>
    <script>
        function slide_show(current) {
            $('.slideform').slideUp();
            $(current).slideDown();
        }
        slide_show("");

        function deleteAccount(id) {
            var eliminar = confirm('By clicking accept, all data linked to this account will be permanently deleted.\n\nDelete account? \nAre you sure?');
            if (eliminar) {
                $.ajax({
                    type: 'post',
                    url: '../adm/manager.php',
                    data: {
                        delete: id,
                        action: 'deleteAccount'
                    },
                    success: function(data) {
                        $("#lblinformation").html(data);
                        $("#lblinformation").show();
                        setTimeout(function() {
                            $("#lblinformation").hide()
                        }, 3000);
                        window.location.href = '../adm/logout.php';
                    }
                });
                return false;
            }
        }

        //OCULTA LOS POSTS
        function show_hide_posts(iduser, idpost,txt) {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: {
                    'iduser': iduser,
                    'idpost': idpost,
                    'text': txt,
                    'action': 'history'
                },
                success: function(data) {
                    alert(data);location.reload();
                }
            });
            return false;
        }
    </script>
    
        <?php include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
    <?php }else{ echo "<script>location.href = '../index.php#loging';</script>";} ?>
</body>
</html>
