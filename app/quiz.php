<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 0001
	FECHA: 03 jun 2019
	
	PAGINA DE :DESCRIPCION
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Pratice and learn english">
    <meta name="keywords" content="pratice, test, learn, english">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>quiz</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/comments.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
   <script>var contenido;//variable que resetea los tags p</script>
        
</head>

<body> 
    <?php 
        $idpost=$_GET['idtext'];
            $formato=["Translate","Write","Sort","Complete","Select","Listen"];  
        $limite=10;
        if(isset($_GET['formated'])){
            if(is_array($_GET['formato'])){
                $formato=$_GET['formato'];
                $limite=$_GET['limite'];
            }
            echo "<script> $(function(){ $('#starting').show();$('#beging').hide(); });</script>";
        }
        
        include("menu.php"); ?>


    <section id="beging">
        <h1>Veamos, qué tanto has aprendido?</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <p> <font color="red">Escoge el formato de la práctica:</font></p>
            <p> <input type="checkbox" name="formato[]" value="Select" checked><label> Select</label></p>
            <p> <input type="checkbox" name="formato[]" value="Listen" checked><label> Listen</label></p>
            <p> <input type="checkbox" name="formato[]" value="Sort" checked><label> Sort</label></p>
            <p> <input type="checkbox" name="formato[]" value="Complete"><label> Complete</label></p>
            <p> <input type="checkbox" name="formato[]" value="Translate"><label> Translate</label></p>
            <p> <input type="checkbox" name="formato[]" value="Write"><label> Write</label></p>
            <p> <input type="number" value="10" name="limite" min="10" max="99" style="width:37px"><label> Ejercicios</label></p>
            <p> <input type="hidden" name="idtext" value="<?php echo $idpost; ?>"></p>
            <button class="icon-equalizer" type="submit" name="formated" value="<?php echo $idpost; ?>"> Get ready!</button>
        </form>
        <br>
        <p>Esta práctica consiste en responder una serie de preguntas sobre el vocabulario seleccionado, que pueden ser de selección múltiple, completa, ordena, traduce, escribe, etc. acerca del nivel actual que te ayuda a mejorar tu vocabulario, pronunciación, gramática e interpretación del idioma inglés.</p><br>
    </section>

    <section id="starting">
        <button class="icon-puzzle" onclick="$('.slideshow-container, h1').show();this.parentElement.style.display='none';"> Start</button>
        <p>
            <font color='red' size='+1' align='center'>¡Sube el volumen y al hablar, acércate al micrófono del dispositivo! </font>
            <br>
            <font color='dodgerblue' size='+1' align='center'>¡Go ahead!</font>
        </p>
        <br><br>
    </section>

    <h1 style="display:none">Practice:</h1>
    <div class="slideshow-container" style="display:none">

        <?php 
    
     function options($arreglo,$idpost){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT topic,description,categories,level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE idpost=$idpost ORDER BY RAND() LIMIT 5");

		$cont=0;
        while($row=mysqli_fetch_array($res)){            
          $topic=nl2br($row['topic']); 
          $description=nl2br($row['description']); 
          $category=$row['categories']; 
            
          $es=$row['spanish'];
          $arreglo[$cont]=$row['english']; 
          $cont++;
        } 
         $arreglo[5]=$es;
         $arreglo[6]=$topic;
         $arreglo[7]=$description;
         $arreglo[8]=$category;
         return $arreglo;
     } 
    
     function translate($arreglo,$idpost){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT topic,description,categories,level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE idpost=$idpost AND english NOT LIKE '% - %' ORDER BY RAND() LIMIT 1");

        while($row=mysqli_fetch_array($res)){
          $topic=nl2br($row['topic']); 
          $description=nl2br($row['description']); 
          $category=$row['categories'];
            
          $arreglo[0]=$row['english'];
          $arreglo[1]=$row['spanish'];
        } 
         $arreglo[2]=$topic;
         $arreglo[3]=$description;
         $arreglo[4]=$category;
         return $arreglo;
     
     } 
    
     function complete($arreglo,$idpost){
        include("../adm/connection.php"); 	
		$res = mysqli_query($con, "SELECT topic,description,categories,level,english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost WHERE idpost=$idpost AND english NOT LIKE '% - %' ORDER BY RAND() LIMIT 1");

        while($row=mysqli_fetch_array($res)){
          $topic=nl2br($row['topic']); 
          $description=nl2br($row['description']); 
          $category=$row['categories'];    
            
          $arreglo[0]=$row['english'];
          $arreglo[1]=$row['spanish'];
        }
         $arreglo[2]=$topic;
         $arreglo[3]=$description;
         $arreglo[4]=$category;
         return $arreglo;
     
     } 

     $contador=1;        
        while($contador<$limite){ $contador++;  ?>

        <div class="mySlides">
            <!--  ##############SWITCH START############  -->
            <?php 
                    
                         
            switch($formato[mt_rand(0,count($formato)-1)]){ 
            case "Select": 
                $select=array();
               $select=options($select,$idpost);//llena el array                       
                $answer=$select[4];//guarda la respuesta en ingles
                $spanishOption=$select[5];//guarda la respuesta en espanol
                $topic=$select[6];
                $description=$select[7];
                $category=$select[8];
                array_pop($select);//elimina el valor 9 en español de $select            
                array_pop($select);//elimina el valor 8 en español de $select            
                array_pop($select);//elimina el valor 7 en español de $select            
                array_pop($select);//elimina el valor 6 en español de $select            
                shuffle($select);//desordena el array ?>
            <div>
                <font size='+1' color='red'>Seleccione la traducción correcta:</font>
                <strong><?php echo $spanishOption;?></strong>

                <p onclick="$(this).toggleClass(' active');"><?php echo $select[0]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $select[1]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $select[2]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $select[3]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $select[4]; ?></p>
            </div>


            <?php break;
        case "Listen":
                $listen=array();
                $listen=options($listen,$idpost);//llena el array                       
                $answer=$listen[4];//guarda la respuesta en ingles
                $spanishOption=$listen[5];//guarda la respuesta en espanol
                $topic=$listen[6];
                $description=$listen[7];
                $category=$listen[8];
                array_pop($listen);//elimina el valor 9 en español de $listen            
                array_pop($listen);//elimina el valor 8 en español de $listen            
                array_pop($listen);//elimina el valor 7 en español de $listen            
                array_pop($listen);//elimina el valor 6 en español de $listen  
                shuffle($listen);//desordena el array ?>
            <div>
                <button onclick="btnSpeak('<?php echo addslashes($answer); ?>');" class="icon-soundalt"></button>
                <font size='+1' color='red'>Escuche y seleccione la opción correcta:</font>

                <p onclick="$(this).toggleClass(' active');"><?php echo $listen[0]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $listen[1]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $listen[2]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $listen[3]; ?></p>
                <p onclick="$(this).toggleClass(' active');"><?php echo $listen[4]; ?></p>
            </div>

            <?php break; 
        case "Write":
                $write=array();
                $write=translate($write,$idpost);//llena el array                       
                $answer=$write[0];//guarda la respuesta en ingles
                $spanishOption=$write[1];//guarda la respuesta en espanol
                $topic=$write[2];
                $description=$write[3];
                $category=$write[4]; 
        ?>
            <div>
                <button onclick="btnSpeak('<?php echo addslashes($answer); ?>');" class="icon-soundalt"></button>
                <font size='+1' color='red'>Escucha y escribe lo que escuches:</font>
                <strong>
                    <font size="-1.5" color="blue">Significado: </font><?php echo $spanishOption;?>
                </strong>
                
                <p contenteditable="true" spellcheck="true" class="escribir" onclick="$(this).addClass(' active');"></p>
            </div>

            <?php break;
        case "Sort":                     
            $sort=array();
            $sort=translate($sort,$idpost);
            $answer=$sort[0];//guarda la respuesta en ingles
            $spanishOption=$sort[1];//guarda la respuesta en espanol
            $topic=$sort[2];
            $description=$sort[3]; 
            $category=$sort[4];
//            $parts=mt_rand(1,strlen($answer)-1);
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
                <p class="dragAndDrop respuesta" ondrop="drop(event); $(this).addClass(' active');contenido=$(this).html();" ondragover="allowDrop(event);"></p>

                <strong>
                    <font size="-1.5" color="blue">Sentencia: </font><?php echo $spanishOption;?>
                </strong>

                <p class="dragAndDrop" ondrop="drop(event);" ondragover="allowDrop(event);">
                    <?php  for($i=0; $i<count($sort);$i++){ ?>

                    <span id="drag<?php echo $i.$sort[$i]; ?>" draggable="true" ondragstart="drag(event);" onclick="changeOftag(this);"><?php echo $sort[$i]; ?></span>

                    <?php } ?>
                </p>
            </div>

            <?php break;
        case "Complete":                   
                $complete=array();
                $complete=complete($complete,$idpost);//llena el arreglo
                $answer=$complete[0]; //guarda la reppuesta en ingles
                $spanishOption=$complete[1];//guarda la respuesta en espanol                
                $topic=$complete[2];                
                $description=$complete[3];                
                $category=$complete[4];   
                if(strlen($answer)>1){
                $pst=mt_rand(1,strlen($answer)-1);
                $parts=str_split($answer,$pst);
                 $hiddenPart=$parts[mt_rand(1,count($parts)-1)];  
                }
        ?>
            <div>                
                <font size='+1' color='red'>Complete la siguiente sentencia:</font>
                <strong>
                    <font size="-1.5" color="blue">Sentencia en español: </font><?php echo $spanishOption;?>
                </strong>
                
                <p onclick="$(this).addClass(' active completa');contenido=$(this).html();">
                    <?php echo str_replace($hiddenPart,"<span contenteditable='true' spellcheck='true'></span>",$answer); ?>
                </p>
            </div>

            <?php  break;
            case "Translate":
                $tranlate=array();
                $tranlate=translate($tranlate,$idpost);//llena el array                       
                $answer=$tranlate[0];//guarda la respuesta en ingles
                $spanishOption=$tranlate[1];//guarda la respuesta en espanol        
                $topic=$tranlate[2];        
                $description=$tranlate[3];        
                $category=$tranlate[4];        
        ?>
            <div>               
                <font size='+1' color='red'>Traduzca la siguiente sentencia en el espacio en blanco:</font>
                <strong> <?php echo $spanishOption; ?></strong>
                
                <p contenteditable="true" spellcheck="true" class="escribir" onclick="$(this).addClass(' active');"></p>
            </div>

            <?php break;
            default:
                echo "Oops, No se encontro el ejercicio."; ?>
            <div>
                <button class="icon-right" onclick="plusSlides(1);$('.btnCheck').show();$('.divresults, .btnNext').hide();"></button>
            </div>
            
            <?php 
        }//END SWITCH ?>

            <!--            BOTONES -->
            <br>
            <hr><br>
            <button class="btnCheck icon-checked" onclick="$('.divresults, .btnNext').show();$(this).hide();compare('<?php echo addslashes($answer); ?>');"> Check</button>
            <button class="btnNext icon-random" style="display:none"> Next</button>
        </div>
        <?php } //FIN DEL WHILE
			 ?>

        <br>
        <center><font color="darkgreen" size="+1" class="resinfo" style="display:none">Práctica completada correctamente!</font></center>
        <button class="icon-views" id="btnResult" onclick="$('#btnRenew').show();$(this).hide(); check();" style="display:none"> Results</button>
        <button class="icon-refresh" onclick="location.reload();" id="btnRenew" style="display:none"></button>
        <meter class="mtrBar" min="0"></meter>
        <!--    CONTENEDOR CON LOS RESULTADOS DE CADA EJERCICIO-->
        <div class="divresults">
            <b>
                <font id='txtCurrentTopic' color='dodgerblue' size='+1'></font>
            </b><br>
            <b id='txtansr'><i>Respuesta correcta:</i><br>
                <font color='darkgreen'></font>
            </b><br>
            <b id='txtinfo'><i>Tu respuesta:</i><br>
                <font></font>
            </b><br>
        </div>
        <!--    CONTENEDOR CON LOS AUDIOS Y LA IMG DE APLAUSOS-->
        <center class="contAudio">
            <img src="../src/aplauso.gif" height="200px" alt="Congratulations" style="display:none">
            <strong id="mjsAudio"> </strong>
            <strong id="mjsA"> </strong>
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

        <!--    CONTENEDOR CON EL TITULO Y LA DESCRIPCION DE LA PRACTICA-->
        <center>
            <b class="icon-down" onclick="$('center div').slideToggle();"> </b>
            <div><br>
                <hr><br>
                <h3><?php echo $topic; ?></h3>
                <i><?php echo $description; ?></i><br>
            </div>
        </center>
    </div>

    <script>
        var times;
        function btnSpeak(txt) {
            clearTimeout(times);
            read(txt, 'en-US', null, 0.5, null);
            times = setTimeout(function() {
                read(txt, 'en-US', null, 0.3, null)
            }, 3000);
        }

        let good = 0;
        let bad = 0;
        let cont = 0;
        let limit = <?php echo $limite; ?>;
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
                cont += 1;
                $('#txtCurrentTopic').text('Ejercicio ' + (cont) + " de " + limit);
                $('#txtansr font').text(" " + text);
                $('#txtansr font').addClass('icon-like');

                $('#txtinfo font').text(" " + answer);
            } else {
                alert("Select one option!");
                $('.btnNext').hide();
                $('.btnCheck').show();
            }
        }


        //FUNCION QUE MUESTRA LAS ESTADISTICAS
        function check() {
            let percent = good * 100 / cont;

            if (percent < 40) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Sigue estudiando!");
                $('#mjsAudio').addClass("icon-dislike");
            } else if (percent < 50) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Aun lo puedes hacer mejor!");
                $('#mjsAudio').addClass("icon-sad");
            } else if (percent < 60) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Vas por buen camino!");
                $('#mjsAudio').addClass("icon-star3");
            } else if (percent < 70) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Wao! Nada mal.");
                $('#mjsAudio').addClass("icon-like");
            } else if (percent < 80) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Buen trabajo!");
                $('#mjsAudio').addClass("icon-like");
            } else if (percent < 90) {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Uff! Eso fue pan comido.");
                $('#mjsAudio').addClass("icon-happy");
            } else {
                $('#mjsAudio').text(" " + percent.toFixed(1) + "% ¡Felicidades!");
                $('#mjsAudio').addClass("icon-level13");
                document.getElementById('audioAplauso').play();
                $('.contAudio img').show();
                setTimeout(function() {
                    $('.contAudio img').hide()
                }, 8000);

                //cuando esto suceda se gana una insignia
                <?php  $idstudent=0; 
             if(isset($_SESSION['idstudent'])){
                 $idstudent=$_SESSION['idstudent'];         
             } ?>
                $.ajax({
                    type: 'POST',
                    url: '../adm/curso.php',
                    data: {
                        'iduser': <?php echo $idstudent ?>,
                        'idpost': <?php echo $idpost ?>,
                        'addLearned': 'history'
                    },
                    success: function(data) {
                        $('#mjsAudio').append(" Lección superada!");
                    }
                }); 
                return false;

            } //END ELSE
        }

        $('.btnNext').click(function() {
            plusSlides(1);
            $('.btnCheck').show();
            $('.divresults, .btnNext').hide();

            $('p.active').html(contenido);
            $('p').removeClass(' active');
//            $('p.active').text("");
            $('.mtrBar').val(valMeter);
            valMeter++;

            if (cont >= limit) {
                document.getElementById("btnResult").style.display = "block";
                $(".resinfo").show();
                $(".mySlides div, .btnNext, .btnCheck, b font,#txtinfo i, #txtansr i").css({
                    'display': 'none'
                });
            }
        });

        //PLAY SLIDE
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
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
        function changeOftag(tag) {
            var p = $(tag).parent();
            $(tag).remove();
            p.siblings('.dragAndDrop').append($(tag));
            p.siblings('.respuesta').addClass(' active');



        }
    </script>

    <div style="width:80%;margin:auto">
        <?php 
           //COMENTARIOS
       include("../adm/functions.php");  
       comments("practices",$category);    
    ?>
    </div>

    <?php include("footer.php"); include("options.php"); ?>



</body>

</html>
