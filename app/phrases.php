
<?php  
function phrases($id){
 echo "<h1>Everyday phrases.</h1>";

include("../adm/connection.php");         
 $res = mysqli_query($con, "SELECT * FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE idcontent=".$id."");
                
   if(mysqli_num_rows($res) > 0){ ?>
   <div class="contents">           
        <table> 
             <tr>
            <th class="icon-up" onclick="$('.divtitle').slideToggle();$(this).toggleClass('icon-down');"> <b id='title'></b></th>
        </tr>
            
        <?php 
           while($fila=mysqli_fetch_array($res)){ 
           $category=$fila['categories']; 
           $topic=$fila['topic'];
           $description=$fila['description'];
        ?>
             <tr>
            <td>
                <span class="icon-soundalt" onclick="read($(this).nextAll('font').text(), 'en-US', null, 1, null);"></span>
                <span class="icon-soundalt" onclick="read($(this).nextAll('font').text(), 'en-US', null, 0.5, null);"></span>
                <span class="icon-soundalt" onclick="read($(this).nextAll('font').text(), 'en-US', null, 0.1, null);"></span>
                <font class='english' translate="no" color="dodgerblue" size="+1"> <?php echo $fila['english']; ?></font>
            </td>
        </tr>
        <tr>
            <td>
                <span class="icon-sound" onclick="read($(this).nextAll('font').text(), 'es-ES', null, 1, null);"></span>
                <span class="icon-sound" onclick="read($(this).nextAll('font').text(), 'es-ES', null, 0.5, null);"></span>
                <span class="icon-sound" onclick="read($(this).nextAll('font').text(), 'es-ES', null, 0.1, null);"></span>
                <font class='spanish' translate="no"> <?php echo $fila['spanish']; ?></font>
            </td>
        </tr>
    <?php } ?>
        
         <tfoot>
             <tr>
                 <td>
                     <a href="quiz.php?idtext=<?php echo $id ?>"> Modo Práctica</a>
                 </td>
             </tr>
         </tfoot>
          <div class="divtitle">
           <span id="icontitle" class="icon-menu3" onclick="$(this).toggleClass('icon-down');$('#submenu').slideToggle(500);"></span>
            
           <div id="submenu" style="display:none">
               <label for="play"><input type="radio" name='controles' id="play"> Reproducir</label>
               <label for="velocidad">                   
                   <font color='red' size='-1'><span>Cada</span> <b>5</b> <span>segundos.</span></font> 
                   <input type="range" min="1" max="10" value="5" id="velocidad">
               </label>
               <label for="pause"><input type="radio" name='controles' id="pause" disabled> Pausar</label>
               <label for="resume"><input type="radio" name='controles' id="resume" disabled> Reanudar</label>
              <label for="stop"><input type="radio" name='controles' id="stop" disabled> Detener</label>
           </div>
            <i><?php echo "Aprende las siguientes ". mysqli_num_rows($res)." palabras sobre: <br>" ?></i>
            <br>
            <p><?php echo $description; ?></p>
        </div>
      
       </table>
       </div>
    
<script>
    //HACE MAYUSCULA LA PRIMERA LATRA DEL TITULO DEL VOCABULARIO
    const title = '<?php echo $topic ?>';
    $('#title').html(title.charAt(0).toUpperCase() + title.slice(1));

    let contador = 0;
    let prevtag = -1;
    let intervalo;

 //INICIA EL VALOR DE LA REPRODUCCION AUTOMATICA
        function intervalTime(range) {
            let time = range;//VALUE=5 MILISEGUNDOS
            return time *= 1000; //5 SEGUNDOS
        }
        
    $("#play").click(function() {
        clearInterval(intervalo);
        let time = ($('#velocidad').val() * 1000);
        $('#stop, #pause').attr('disabled',false);
        intervalo = setInterval(function() {
            //ELIMINA EL FONDO AMARILLO
            $('td .english').eq(prevtag).css({'background': 'none' });
            //AGREGA EL FONDO AMARILLO
            if (contador < $('td .english').length) {
                $('td .english').eq(contador).css({'background': 'yellow' });
                //PRONUNCIA LA PALABRA
                read($('td .english').eq(contador).text(), 'en-US', null, null, null);
                //PROCESA EL CAMBIO A LA SIGUIENTE PALABRA
                prevtag = contador;
                contador++;
            } else { //ELIMINA CUALQUIER FONDO AMARILLO DE LA PALABRAS EN INGLES
                contador = 0;
            }
        }, time);
    }); 

    $("#stop").click(function() {
        contador = 0;
        clearInterval(intervalo);
        $('td .english').css({ 'background': 'none' });
         $('#resume, #pause').attr('disabled',true);
        $('#play').attr('disabled',false);
    }); 

    let aux;
    $("#pause").click(function() {
         $('#resume').attr('disabled',false);
         $('#play').attr('disabled',true);
        aux = contador;
        clearInterval(intervalo);
    });

    $("#resume").click(function() {
        contador = aux;
        clearInterval(intervalo);
        $('#play').click();     
    });

    $('#velocidad').change(function() {
        $(this).parent().find('b').html($(this).val());
    });

</script>
<?php 
       //COMENTARIOS
       include("../adm/functions.php");  
       comments("expressions",$category);
   } }
    ?>