<?php function tests($nivel){ ?>
    <h1 id="testimonios">Test de nivel:</h1>
    
    <section> 
    <button class="icon-lock" onclick="$('.slideshow-container').show();this.parentElement.style.display='none';"> Start</button>

   <p>Test práctico de nivel. Consiste en responder una serie de preguntas que pueden ser de selección múltiple, completa, ordena, traduce, escribe, etc. Acerca del nivel actual. </p><br>
    <p> La idea de este test de nivel es evaluar lo que has estudiado en diferentes aspectos del aprendizaje, tales como: vocabulario, escritura, gramática, pronunciación y comprensión. </p><br>

    <p> Tras seleccionar cada pregunta tendrás una retroalimentación y al culminar la evaluación, obtendrás los resultados de calificación.
        Si obtienes 90% o más, subirás de nivel.
        <br>
        <br>
        <font color='red' size='+1' align='center'>¡Sube el volumen del dispositivo que estas usando y al hablar, hazlo en voz alta y cerca del micrófono! </font>
        <br>
        <br>
        <font color='dodgerblue' size='+1' align='center'>¡Mucha suerte!</font>
    </p>
</section>
<div class="slideshow-container" style="display:none">

    <?php
   
    $formato=["Translate","Write","Sort","Complete","Select","Listen"];   
     function opciones($arreglo,$nivel){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE level=$nivel  AND type='vocabulary' ORDER BY RAND() LIMIT 5");
		$cont=0;
        while($row=mysqli_fetch_array($res)){
          $es=$row['spanish'];
          $arreglo[$cont]=$row['english']; 
            $cont++;
        } 
         $arreglo[5]=$es;
         return $arreglo;
     }  
    
     function translate($arreglo,$nivel){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE level=$nivel  AND type='vocabulary' AND english NOT LIKE '% - %' ORDER BY RAND() LIMIT 1");	    
        while($row=mysqli_fetch_array($res)){
          $arreglo[0]=$row['english'];
          $arreglo[1]=$row['spanish'];
        }
         return $arreglo;
     } 
    
     function complete($arreglo,$nivel){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE level=$nivel  AND type='expressions' AND english NOT LIKE '% - %' ORDER BY RAND() LIMIT 1");	    
        while($row=mysqli_fetch_array($res)){
          $arreglo[0]=$row['english'];
          $arreglo[1]=$row['spanish'];
        }
         return $arreglo;
     } 
    
        $limite=1;
     
        while($limite<50){ $limite++;  ?>    
    
    <var style="display:none" id="idLevel"><?php echo $nivel; ?></var>
    <div class="slideShow">       
       
       <?php                 
        switch($formato[mt_rand(0,count($formato)-1)]){ 
        case "Select":
                $select=array();
                $select=opciones($select,$nivel);//llena el array                       
                $answer=$select[4];//guarda la respuesta en ingles
                $spanishOption=$select[5];//guarda la respuesta en espanol
                array_pop($select);//elimina el valor 6 en español de $select            
                shuffle($select);//desordena el array ?>
        <div>
            <font size='+1' color='red'>Seleccione la traducción correcta:</font>
            <strong><?php echo $spanishOption;?></strong><hr>
            <p onclick="$(this).toggleClass(' active');"><?php echo $select[0]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $select[1]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $select[2]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $select[3]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $select[4]; ?></p>       
        </div> 
               
        <?php break;
        case "Listen":
                $listen=array();
             $listen=opciones($listen,$nivel);//llena el array                       
                $answer=$listen[4];//guarda la respuesta en ingles
                $spanishOption=$listen[5];//guarda la respuesta en espanol
                array_pop($listen);//elimina el valor 6 en español de $listen            
                shuffle($listen);//desordena el array ?>
        <div>            
            <button onclick="btnSpeak('<?php echo $answer; ?>');" class="icon-soundalt"></button>
            <font size='+1' color='red'>Escuche y seleccione la opción correcta:</font>
            <strong><font size="-1.5" color="blue">Significado: </font><?php echo $spanishOption;?></strong>
            <hr>
            <p onclick="$(this).toggleClass(' active');"><?php echo $listen[0]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $listen[1]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $listen[2]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $listen[3]; ?></p>
            <p onclick="$(this).toggleClass(' active');"><?php echo $listen[4]; ?></p>
        </div>
        
        <?php break; 
        case "Write":
                $write=array();
         $write=translate($write,$nivel);//llena el array                       
                $answer=$write[0];//guarda la respuesta en ingles
                $spanishOption=$write[1];//guarda la respuesta en espanol
        ?>
        <div>
            <button onclick="btnSpeak('<?php echo $answer; ?>');" class="icon-soundalt"></button>
            <font size='+1' color='red'>Escucha y escribe lo que escuches:</font>
            <strong><font size="-1.5" color="blue">Significado: </font><?php echo $spanishOption;?></strong>
            <hr>
            <p contenteditable="true" spellcheck="true" class=" pWrite" onclick="$(this).addClass(' active');"></p>
        </div>
        
        <?php break;
        case "Sort":
                $sort=array();
            $sort=translate($sort,$nivel);
            $answer=$sort[0];//guarda la respuesta en ingles
            $spanishOption=$sort[1];//guarda la respuesta en espanol
//            $parts=mt_rand(1,strlen($answer)-1);//escoje un numero al azar
                if(strlen($answer)<=5)
                        $parts=1;
                    elseif(strlen($answer)<=10)
                        $parts=2;
                    elseif(strlen($answer)<=15)
                        $parts=3;
                    elseif(strlen($answer)<=20)
                        $parts=4;
                    else
                        $parts=5;
                
            $sort=str_split($answer,$parts);//divide la sentencia en caracteres y lo guarda en el array $sort
            shuffle($sort);//Desordena el array        
        ?>
        <div>
           <font size='+1' color='red'>Ordene el significado de la sentencia, en el espacio en blanco:</font>
            <p class="dragAndDrop respuesta" ondrop="drop(event); $(this).addClass(' active');" ondragover="allowDrop(event);"></p>
                        
            <strong><font size="-1.5" color="blue">Sentencia: </font><?php echo $spanishOption;?></strong>

            <p class="dragAndDrop" ondrop="drop(event);" ondragover="allowDrop(event);">
                <?php  for($i=0; $i<count($sort);$i++){ ?>
                
                <span id="drag<?php echo $i.$sort[$i]; ?>" draggable="true" ondragstart="drag(event);" onclick="changeOftag(this);"><?php echo $sort[$i]; ?></span>
                
                <?php } ?>
            </p>
        </div>
        
        <?php break;
        case "Complete": 
                $complete=array();
            $complete=complete($complete,$nivel);//llena el arreglo
                $answer=$complete[0]; //guarda la reppuesta en ingles
                $spanishOption=$complete[1];//guarda la respuesta en espanol  
                 if(strlen($answer)>1){
                $pst=mt_rand(1,strlen($answer)-1);
                $parts=str_split($answer,$pst);
                 $hiddenPart=$parts[mt_rand(1,count($parts)-1)]; 
                 }
        ?>
        <div>
            <font size='+1' color='red'>Complete la siguiente sentencia:</font>
            <strong><font size="-1.5" color="blue">Sentencia en español: </font><?php echo $spanishOption;?></strong>
            <hr>
            <p class="compt" onclick="$(this).addClass(' active .completa');">
                 <?php echo str_replace($hiddenPart,"<span contenteditable='true' spellcheck='true'></span>",$answer); ?>
            </p>  
        </div>
        
        <?php  break;
            case "Translate":
                $tranlate=array();
                $tranlate=translate($tranlate,$nivel);//llena el array                       
                $answer=$tranlate[0];//guarda la respuesta en ingles
                $spanishOption=$tranlate[1];//guarda la respuesta en espanol        
        ?>
        <div>

            <font size='+1' color='red'>Traduzca la siguiente sentencia en el espacio en blanco:</font>
            <strong> <?php echo $spanishOption; ?></strong>            
                <hr>
                <p contenteditable="true" spellcheck="true" class=" pWrite" onclick="$(this).addClass(' active');"></p>
        </div>
        
        <?php break;
            default:
                echo "Oops, No se encontro el ejercicio.";
        }//END SWITCH ?>

        <br>
        <hr><br>
        <button class="btnNext icon-random" onclick="compare('<?php echo addslashes($answer); ?>'); plusSlides(1);"> Next</button>
    </div>
    <?php }//END WHILE	    ?>
   <br>

    <b>
        <font id='txtcrrnt' color='darkorange' size='+1'></font>
    </b><br>
    <meter class="mtrBar" min="0"></meter>
    <br>
    <b> <font id='txtprvs' color='blue' size='+1'> </font></b><br>
    <b id='txtansr'> <i></i> <font color='darkgreen' > </font> </b><br>
    <b id='txtinfo'> <i></i> <font> </font> </b><br>

    <button class="icon-calculator" onclick="check();" id="btnFinish" style="display:none"></button>
    <button class="icon-refresh" onclick="location.reload();" id="btnRenew" style="display:none"></button>
    <div id="divresults">
        <label class="icon-analytics6" id="l1" for="p1"> 0%</label>
        <meter id="p1" min="0" max="100" low="25" high="80" optimum="90"></meter>
        <label class="icon-analytics3" id="l2" for="p2"> 0%</label>
        <meter id="p2" min="0" max="100" low="25" high="80" optimum="90"></meter>
        <label class="icon-analytics4" id="l3" for="p3"> 0%</label>
        <meter id="p3" min="0" max="100" low="25" high="80" optimum="90"></meter>
        <label id="l4" for="p4"> 0%</label>
    </div>
    
    <center class="contAudio" style="display:none">

        <img src="../src/aplauso.gif" height="200px" alt="Congratulations">
        <strong id="mjsAudio" class="icon-unlock"> </strong>
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
</div>

 <script>
  //PLAY SLIDE
  
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var slides = document.getElementsByClassName("slideShow");
  if (n > slides.length) {slideIndex = 1}    
   $('.slideShow').css({'display':'none'});     
  $(slides[slideIndex-1]).css({'display':'block'});  
}

   var times;
    function btnSpeak(txt){
        clearTimeout(times);
        read(txt,'en-US',null,0.5,null); 
        times = setTimeout(function(){read(txt,'en-US',null,0.3,null)},3000);
    }
    let good = 0;
    let bad = 0;
    let total = 0;
    var limit = <?php echo $limite ?>;
    var valMeter = 1;
    $('meter').attr('max', limit);
    $('meter').attr('low', (25 * limit / 100)); 
    $('meter').attr('high', (80 * limit / 100));
    $('meter').attr('optimum', (90 * limit / 100));

    //FUNCION QUE CALCULA LAS RESPUESTAS
    function compare(text) {
        let answer = $('p.active').text();
        //formateo las cadenas antes de compararlas
        text = text.toLowerCase();
        text = text.trim();
        answer = answer.toLowerCase();
        answer = answer.trim();
        if (answer !== "") {
            if (text == answer) {
                good += 1;
                 document.getElementById('audioBell').play();
                $('#txtinfo font').removeClass(' icon-sad icon-star3');
                $('#txtinfo font').addClass(' icon-happy');
                $('#txtinfo font').attr('color', 'darkgreen');
            } else if (text.includes(answer)) {
                good += 0.5;
                document.getElementById('audioPop').play();
                navigator.vibrate(500);
                $('#txtinfo font').removeClass(' icon-sad icon-happy');
                $('#txtinfo font').addClass(' icon-star3');
                $('#txtinfo font').attr('color', 'darkorange');
            } else {
                bad += 1;
                document.getElementById('audioIncorrecto').play();
                navigator.vibrate(1000);
                $('#txtinfo font').removeClass(' icon-happy icon-star3');
                $('#txtinfo font').addClass(' icon-sad');
                $('#txtinfo font').attr('color', 'red');
            }
            total += 1;
            $('#txtinfo i').text('Your Answer: ');
            $('#txtinfo font').text( " "+answer);
            $('#txtansr i').text('Correct Answer: ');
            $('#txtansr font').text( " "+text);
            $('#txtansr font').addClass("icon-happy");


            $('#txtcrrnt').text('Topic ' + (total + 1) + " of " + limit);
            $('#txtprvs').text('Topic-'+(total) +' | Results:' );

            if (total >= limit) {
                document.getElementById("btnFinish").style.display = "block";
                $(".slideShow div, .btnNext, b font,#txtinfo i, #txtansr i").css({
                    'display': 'none'
                });
            }

        } else {
            alert("Select one option!");
            plusSlides(-1);valMeter--;
        }
        $('p').removeClass(' active');
        $('p.active').text("");
        $('.mtrBar').val(valMeter);
        valMeter++;
    }

    //FUNCION QUE MUESTRA LAS ESTADISTICAS
    function check() {
        document.getElementById("btnFinish").style.display = "none";
        document.getElementById("btnRenew").style.display = "block"; 
        let percent = good * 100 / total;
        document.getElementById("divresults").style.display = "grid";
        $('meter').attr('max', total);
        $('#l1').text(" " + limit + " Questions");
        $('#p1').val(total);
        $('#l2').text(" " + good + " Good");
        $('#p2').val(good);
        $('#l3').text(" " + bad + " Bad");
        $('#p3').val(bad);
        if (percent < 40) {
            $('#l4').text(" " + percent.toFixed(1) + "% Work harder!");
            $('#l4').addClass("icon-sad");
        } else if (percent < 50) {
            $('#l4').text(" " + percent.toFixed(1) + "% You're a beginner!");
            $('#l4').addClass("icon-sad");
        } else if (percent < 60) {
            $('#l4').text(" " + percent.toFixed(1) + "% You're a rookie!");
            $('#l4').addClass("icon-sad");
        } else if (percent < 70) {
            $('#l4').text(" " + percent.toFixed(1) + "% You're an amateur!");
            $('#l4').addClass("icon-happy");
        } else if (percent < 80) {
            $('#l4').text(" " + percent.toFixed(1) + "% You're a semi-pro!");
            $('#l4').addClass("icon-happy");
        } else if (percent < 90) {
            $('#l4').text(" " + percent.toFixed(1) + "% You're a pro!");
            $('#l4').addClass("icon-happy");
        } else {
            $('#l4').text(" " + percent.toFixed(1) + "% You're a master!");
            $('#l4').addClass("icon-happy");

            //cuando esto suceda se gana una insignia

            <?php  $idstudent=0; 
             if(isset($_SESSION['idstudent'])){
                 $idstudent=$_SESSION['idstudent'];         
             } ?>
            let nivel = <?php echo $nivel; ?>;
            let testLevel = $('#idLevel').text();
            if (nivel <= testLevel) {
                $.ajax({
                    type: 'POST',
                    url: '../adm/controller.php',
                    data: {
                        table: 'levelUp',
                        idStudent: <?php echo $idstudent ?>,
                        newLevel: (nivel + 1)
                    },
                    success: function(data) {
                        $('#mjsAudio').text(" "+data);
                       document.getElementById('audioAplauso').play();                        
                        $('.contAudio').show();
                        setTimeout(function() { $('.contAudio').hide();}, 8000);
                    }
                });
                return false;
            }
        } //END ELSE
        
    }

    //DRAG AND DROP
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }

//PASA LOS ELEMENTOS DE TAG A OTRO AL HACER CLICK
function changeOftag(tag){
    var p=$(tag).parent();
    $(tag).remove();
    p.siblings('.dragAndDrop').append($(tag));
    p.siblings('.respuesta').addClass(' active');

}
</script>
 
<?php }
