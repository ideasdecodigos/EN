<?php 

function skills($iduser){
           include ("../adm/connection.php");
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM history WHERE iduser=$iduser AND status='Showing'");
            $watched=mysqli_num_rows($query);
           
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='vocabulary'");
            $vocabulary=mysqli_num_rows($query);
            
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='videos'");
            $videos=mysqli_num_rows($query);
            
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='conversation'");
            $conversation=mysqli_num_rows($query);
            
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='expressions'");
            $expressions=mysqli_num_rows($query);
        
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='readings'");
            $readings=mysqli_num_rows($query);
       
            $query = mysqli_query($con,"SELECT DISTINCT idpost FROM contents RIGHT JOIN history ON contents.idcontent=history.idpost WHERE iduser=$iduser AND status='Showing' AND type='grammar'");
            $grammar=mysqli_num_rows($query);
                
            
            $res = mysqli_query($con,"SELECT COUNT(*)AS total,(SELECT COUNT(type) FROM contents WHERE type='vocabulary')AS vocabulary,(SELECT COUNT(type) FROM contents WHERE type='readings')AS readings,(SELECT COUNT(type) FROM contents WHERE type='videos')AS videos,(SELECT COUNT(type) FROM contents WHERE type='grammar')AS grammar,(SELECT COUNT(type) FROM contents WHERE type='conversation')AS conversation,(SELECT COUNT(type) FROM contents WHERE type='expressions')AS expressions,(SELECT COUNT(*) FROM subcontents )AS words FROM contents");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){ 
                    $array[0]=$fila['vocabulary'];
                    $array[1]=$fila['readings'];
                    $array[2]=$fila['expressions'];
                    $array[3]=$fila['videos'];
                    $array[4]=$fila['grammar'];
                    $array[5]=$fila['conversation'];
                    $array[6]=$fila['total'];
                }
            } 
        ?>
               
<h2>Progreso:</h2>
  <div class="skills">
     
      <div>
          <input type="text" value="<?php echo  $vocabulary ?>" class="b1">
          <span class="icon-tags"> Vocabularios</span>
      </div>
      <div>
          <input type="text" value="<?php echo  $readings ?>" class="b2">
          <span class="icon-book1"> Lecturas</span>
      </div>
      <div>
          <input type="text" value="<?php echo  $expressions ?>" class="b3">
          <span class="icon-quoteleft"> Expresiones</span>
      </div>
      <div>
          <input type="text" value="<?php echo  $videos ?>" class="b4">
          <span class="icon-video"> Videos</span>
      </div>
      <div>
          <input type="text" value="<?php echo  $grammar ?>" class="b5">
          <span class="icon-parentheses"> Gramática</span>
      </div>
      <div>
          <input type="text" value="<?php echo  $conversation ?>" class="b6">
          <span class="icon-chat"> Conversaciones</span>
      </div>
      

  </div>
         
       <script>
           //   ########## ABREVIA LOS NUMEROS CON K Y M #############      
           function notacionKM(num) {
               if (num >= 1000000) {
                   num /= 1000000;
                   num = num.toFixed(1) + "M";
               } else if (num >= 1000) {
                   num /= 1000;
                   num = num.toFixed(1) + "K";
               }
               return num;
           }

           function skills(tag, val, limit, bgColor) {
               $(tag).knob({
                   "min": 0,
                   "max": limit,
                   "width": 90,
                   "height": 90,
                   "fgColor": bgColor,
//                   "bgColor": 'red',
                   thickness:.3,
                   "readOnly": true,
                   "draw": function() {
                       //da estilos al input, no al circulo
                       $(this.i).css('font-size', '12px').css('width', '88px').css('transform', 'translate(-20px,0px)');
                   }
               });
               val = notacionKM(val);
               limit = notacionKM(limit);
               $(tag).val(val + "/" + limit);
           }

           skills(".b1", <?php echo  $vocabulary; ?>, <?php echo $array[0];  ?>, "<?php echo fondos(); ?>");
           skills(".b2", <?php echo  $readings; ?>, <?php echo $array[1];  ?>, "<?php echo fondos(); ?>");
           skills(".b3", <?php echo  $expressions; ?>, <?php echo  $array[2]; ?>, "<?php echo fondos(); ?>");
           skills(".b4", <?php echo  $videos; ?>, <?php echo $array[3];  ?>, "<?php echo fondos(); ?>");
           skills(".b5", <?php echo  $grammar; ?>, <?php echo $array[4];  ?>, "<?php echo fondos(); ?>");
           skills(".b6", <?php echo  $conversation; ?>, <?php echo $array[5]; ?>, "<?php echo fondos(); ?>");
       </script>
       <!-- ############# END SKILLS ################-->
       
      <?php } ?>