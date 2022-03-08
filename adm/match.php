   <?php  
     $newLimite = 5;
     $newTema ='';       
     $arrayEn = array();
     $arrayEs = array();
         
        include("connection.php"); 
    if(($_POST['newTema']!=="" and $_POST['newLimite']!=="")){ 
          $newLimite = $_POST['newLimite']; 
        $newTema = $_POST['newTema']; 
         $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE idcontent='$newTema' ORDER BY RAND() LIMIT $newLimite"); 
        
    }elseif(($_POST['newTema']==="" && $_POST['newLimite']!=="")){ //MUESTRA UN VOCABULARIO O EXPRESION EN ESPECIFICO CON UN LIMITE ESTABLECIDO
  
        $newLimite = $_POST['newLimite']; 
         $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost ORDER BY RAND() LIMIT $newLimite");
    } elseif(($_POST['newTema']!=="" && $_POST['newLimite']==="")){ //MUESTRA UN VOCABULARIO O EXPRESION EN ESPECIFICO CON UN LIMITE ESTABLECIDO
  
        $newTema= $_POST['newTema']; 
         $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost 
          WHERE idcontent='$newTema' ORDER BY RAND() LIMIT $newLimite");
    }else{ //MUESTRA PALABRAS O EXPRESIONES DE CUALQUIER VOCABULARIO O EXPRESION
        $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost ORDER BY RAND() LIMIT $newLimite");
    }
        if(mysqli_num_rows($res) > 0){ $posicion = 0;
            while($fila=mysqli_fetch_array($res)){ 
            
            $arrayEn[$posicion] = $fila['english']; 
            $arrayEs[$posicion] = $fila['spanish'];
            $arrayDataEs[$posicion] = $fila['spanish'];
                $posicion++;  
        }mysqli_free_result($res);
         mysqli_close($con);
        }
    shuffle($arrayEs);
            ?>
            
               <!--    CONTENEDOR CON LOS AUDIOS Y LA IMG DE APLAUSOS-->
    <center class="contAudio">
       <div class="info">
            <img src="../src/aplauso.gif" height="100px" alt="Congratulations" style="display:none">
            <strong id="mjsAudio"> Calificaciones</strong>
            <strong id="calif"> Buenas | Malas </strong>
        </div>
        <audio id="audioAplauso">
            <source src="../src/aplauso.mp3" type="audio/mpeg">
        </audio>
        <audio id="audioBell">
            <source src="../src/bell.mp3" type="audio/mpeg">
        </audio>
        <audio id="audioPop">
            <source src="../src/pop.mp3" type="audio/mpeg">
        </audio>
        <audio id="audioIncorrecto">
            <source src="../src/incorrecto.mp3" type="audio/mpeg">
        </audio>
    </center>
    
   <div class="respuesta">
       <ul id="star" class="dragAndDrop" ondrop="drop(event)" ondragover="allowDrop(event)">
           <?php  for($i=0; $i<count($arrayEs);$i++){ ?>

           <li id="item<?php echo $i; ?>" draggable="true" ondragstart="drag(event);" onclick="changeOftag(this);"><?php echo $arrayEs[$i]; ?><br></li>

           <?php } ?>
       </ul>
   </div>
   <div id="respuestas" class="respuesta">
       <ol id="en">
           <?php  for($i=0; $i<count($arrayEn);$i++){ ?>

           <li data-type="<?php echo $arrayDataEs[$i]; ?>" onclick=" read($(this).text(), 'en-US', null, 0.7, null);"><?php echo $arrayEn[$i]; ?></li>

           <?php } ?>
       </ol>

       <ol id="es" class="dragAndDrop" ondrop="drop(event)" ondragover="allowDrop(event)"></ol>
   </div>
