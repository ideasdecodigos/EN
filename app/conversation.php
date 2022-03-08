<?php  
function conversation($id){
 echo "<h1>Conversation.</h1><hr>";

    include("../adm/connection.php");         
    $res = mysqli_query($con, "SELECT * FROM contents WHERE idcontent=".$id.""); 
    if(mysqli_num_rows($res) > 0){ 

        while($fila=mysqli_fetch_array($res)){ 
           $category=$fila['categories']; 
           $topic=$fila['topic'];
           $description=$fila['description'];?>
      
      <style>
          .position1,.position2,.position3,.position4 {
              background: #eee;
              border: 0.5px solid gray;
              border-radius: 15px;
              border-top-left-radius: 0;
              padding: 2px 3%;
              margin: 5px 0;
          }
          font{font-weight: bold;cursor: pointer}
          font:focus{ background: pink}
          i,b{font-size: 12px}

          .position2 {background: #ccc}
          .position3 {background: #ddd}
          .position4 {background: #aaa}
          
          .position1 font {color: blue}
          .position2 font {color: red}
          .position3 font {color: darkgreen}
          .position4 font {color: darkgoldenrod}
      </style>
       <div class="contents">
       
<!--           <h3>Conversation: <span class="icon-sort" onclick="$('.divtitle').slideToggle();"></span></h3>-->
             <div class="divtitle" >
                 <font color="dodgerblue"><?php echo $topic; ?></font>
                 <hr>
                 <p><?php echo $description; ?></p>                 
                 <font color="lime" size="-1" class="icon-sound" onclick="textoAvoz('.divtxt font');"> Escuchar todo:</font>
             </div>
             <script> var cont=0; var autopay=[];  </script>
           <?php } //WHILE END                      
          
               
        $res = mysqli_query($con, "SELECT * FROM conversations  WHERE idpost=".$id.""); 
        if(mysqli_num_rows($res) > 0){ 
           while($fila=mysqli_fetch_array($res)){ 
               //ARRAY PARA EL AUTO PLAY
               echo "<script> autopay[cont]='".$fila['idconversation']."'; cont++; </script>";
               
               $lang='en-US';
            if($fila['position']==2 || $fila['position']==4){ $lang='en-GB';}
           ?>
               <div class="position<?php echo $fila['position']; ?> divtxt"> 
                    <b><?php echo $fila['person']; ?>:</b><br>          
                   <font lang="en" translate="no"  size="+1" class="icon-soundalt" onclick="textoAvoz(this);"> 
                        <?php echo $fila['english']; ?>
                   </font>
                   <hr>
                   <i lang="es" translate="no" > <?php echo $fila['spanish']; ?></i>
               </div>

           <?php } //WHILE END ?>          
           
       </div>
          <script>
               function textoAvoz(tagTxt) {
                     $(tagTxt).css({
                         'background': 'lime'
                     });
                    stop();
                     read($(tagTxt).text(), 'en-US', null, 0.5, null);
                     setTimeout(function() { 
                         $(tagTxt).css({
                             'background': 'none'
                         });
                     }, 3000);                     
                 }
             </script>
    
<?php 
        include("../adm/functions.php");  
        comments("conversation",$category);
        }//IF END
    }//IF END
}//FUNCTION END
?>        

