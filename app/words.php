<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 0001
	FECHA: DAY MONTH 2019
	
	PAGINA DE :DESCRIPCION
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="vacabulary, english, learn">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>vocabulary</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/slide.css">
    <link rel="stylesheet" href="../css/comments.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php include("menu.php"); ?>

    <?php if(isset($_GET['type']) && ($_GET['type']=="expressions" || $_GET['type']=="vocabulary")){ ?>
    <div class="slideshow-container">
        <?php
	include("../adm/connection.php");
		$res = mysqli_query($con, "SELECT * FROM contents RIGHT JOIN subcontents ON  contents.idcontent=subcontents.idpost
        WHERE idcontent=".$_GET['idtext']);
		if( mysqli_num_rows($res) > 0 ){ $i=1; $iid=1;		
			while($fila=mysqli_fetch_array($res)){ $category=$fila['categories']; ?>
        <div class="mySlides">
          <div class="top" style="display:none"><br><br><br><br></div>
           <div class="progress">
            <?php
                        $total=mysqli_num_rows($res);                            
                        echo "Learn ".$i."/".$total;                 
                        $percent = $i * 100 / $total; 
                        echo "<br>Progress: ".number_format($percent,1)."%";                    
                    ?>
            <meter min="0" max="<?php echo $total ?>" low="<?php echo (25*$total/100); ?>" high="<?php echo (75*$total/100); ?>" optimum="<?php echo (90*$total/100); ?>" value="<?php echo $i; $i++;?>"></meter>
            </div>
            <h1 class="About"><?php echo  $fila['topic']; ?></h1>
            <br>

            <h2 id="en<?php echo $iid; ?>" class="english">
                <span onclick="read($('#en<?php echo $iid; ?>').text(),'en-US',null,null,null);" class="icon-soundalt"></span>
                <span style="font-size:18px" onclick="read($('#en<?php echo $iid; ?>').text(),'en-US',null,0.5,null);" class="icon-soundalt"></span>
                <span style="font-size:13px" onclick="read($('#en<?php echo $iid; ?>').text(),'en-US',null,0.1,null);" class="icon-soundalt"></span><br>
                <?php echo $fila['english'] ?>
            </h2>
<!--            <br>-->
            <hr style="width:50%;margin:5px auto;" > 
            <p id="es<?php echo $iid; ?>" class="english">
                <span style="font-size:18px" onclick="read($('#es<?php echo $iid; ?>').text(),'es-ES',null,null,null);" class="icon-sound"></span>
                <span style="font-size:13px" onclick="read($('#es<?php echo $iid; ?>').text(),'es-ES',null,0.5,null);" class="icon-sound"></span>
                <span style="font-size:10px" onclick="read($('#es<?php echo $iid; ?>').text(),'es-ES',null,0.1,null);" class="icon-sound"></span>
                <br><?php echo $fila['spanish']; ?>
            </p> 

            <br>
            <i class="About"><?php  echo (strlen($fila['description'])>100 ? substr($fila['description'],0,100). "..." : $fila['description'] ); ?></i><br>
            <a class="mp" style="color:red;text-decoration:none" href="quiz.php?idtext=<?php echo $_GET['idtext'] ?>"> Modo Práctica</a>
        </div>
        <?php $iid++; }
			 mysqli_free_result($res);//libera la memoria
			 mysqli_close($con);						
		} 
    ?>
        <div id="buttons">
            <a href="javascript:void(0);" class="prev icon-left" onclick="plusSlides(-1)"></a>
            <a href="javascript:void(0);" class="icon-play center" id="stopause"></a>
            <a href="javascript:void(0);" class="next icon-right" onclick="plusSlides(1)"></a>
        </div>
     <span class="icon-menu3 icon-configs" onclick="$('.configs').slideToggle(500);$(this).toggleClass('icon-up');"></span>
        <div class="configs" style="display:none">            
            <label for="intrvlTime" >
                <span class="grid">
                   <font color='dodgerblue'>Intervalos:</font>
                    <input type="range" value="5" min="1" max="30" id="intervalo">
                    <font color='dodgerblue'>Cada <span id="ranval">5</span> segundos.</font>
                </span>
            </label>
            <label for="automatic"><input type="checkbox" id="automatic"> Reproducir</label>
            <label for="escuchar"> <input type="checkbox" id="escuchar" checked> Pronunciar</label>            
            <label for="traducir"> <input type="checkbox" id="traducir" checked> Traducir</label>
            <label for="About"> <input type="checkbox" id="About" checked> Descripción</label>
            <label for="speakers"> <input type="checkbox" id="speakers" checked>  Altavoces</label>
            <label for="Progreso"> <input type="checkbox" id="Progreso" checked> Progreso</label>            
            <label for="top"> <input type="checkbox" id="top" checked> Margen</label>
            <label for="Controles"> <input type="checkbox" id="Controles" checked> Controles</label>
        </div>
    </div>

    <?php 
       //COMENTARIOS 
       include("../adm/functions.php");  
       comments($_GET['type'],$category);

    ?>
    <script>
       
        /*
        //ejecuta la accion deseada sobre el elmento seleccionado
        const displayContent = (entradas, observador) => {
            
            entradas.forEach((entrada) => {
               if(entrada.isIntersecting){
                 console.log('mostrando')  ;
                 console.log(entrada.target.textContent)  ;
//                   read(entrada.target.textContent,'en-US',null,null,null);
               }else{
                 console.log('oculto')  
               }
            });    
        } 
        //crea la observacion en el viewport
        const observador = new IntersectionObserver(displayContent,{
            root:null,
            rootMargin:'0px 0px',
            threshold: 1.0
        });
        //selecciona el elemento
        const tagg = document.getElementById("en2");
//        const tagg = $(".english");
        //ejecuta la observacion
         observador.observe(tagg);
        //ejecuta la observacion al hacer click
*/


        //********************SCRIPT PARA EL VISOR*************************
        //INICIA EL VALOR DE LA REPRODUCCION AUTOMATICA
        function intervalTime(range) {
            let time = range;//VALUE=5 MILISEGUNDOS
            return time *= 1000; //5 SEGUNDOS
        }
        
        //CONTROL RANDO DE SEGUNDOS PARA LA DIA
        $('#intervalo').change(function() {
            intervalTime($(this).val());
            $('#ranval').html($(this).val());//MUESTRA LA CANTIDAD DE SEGUNDOS ELEJIDOS
        });

        let intervalo;//INICIA Y DETIENE LA REPRODUCCION AUTOMATICA
        $('#automatic').change(function() {
            if ($(this).is(':checked')){ 
                $('#stopause').removeClass('icon-play');
                $('#stopause').addClass('icon-stop');
                intervalo = setInterval(function() {plusSlides(1); }, intervalTime($('#intervalo').val()) );
                
            } else {
                $('#stopause').addClass('icon-play');
                $('#stopause').removeClass('icon-stop');
                clearInterval(intervalo);
            }
        });

//SHOW AND HIDE DE SPEAKERS
  $('#speakers').change(function() { $('.english > span, .english > br').slideToggle(); });
  $('#About').change(function() { $('.About, .mp').slideToggle(); });
  $('#Controles').change(function() { $('#buttons').slideToggle(); });
  $('#Progreso').change(function() { $('.progress').slideToggle(); });
  $('#top').change(function() { $('.top').slideToggle(); });

 $('#stopause').click(function() {
           $('#automatic').click();
        });


    

        var time;
        //muestra la primera ventana automaticamente
        var slideIndex = 1;
        showSlides(slideIndex);

        //muestra la siguiente ventana
        function plusSlides(n) {
            stop(); //detiene el speakaloud
            //pasa a la proxima diapositiva del visor
            showSlides(slideIndex += n);

           console.log( $('#en'+slideIndex).text());//OBTIENE LA PALABRA EN INGLES
           console.log( $('#es'+slideIndex).text());//OBTIENE LA PALABRA EN SPANISH
            
//                clearTimeout(time);console.log(tag.textContent);                 
            if ($('#escuchar').is(':checked')) { 
                let tag = $('#en' + slideIndex);
                let etiqueta = $('#es' + slideIndex);
                clearTimeout(time);
                read($(tag).text(), 'en-US', null, null, null);
                time = setTimeout(function() { 
                    read($(tag).text(), 'en-US', null, 0.3, null);
                    if ($("#traducir").is(':checked')){//TRADUCE AL SPANISH
                        read($(etiqueta).text(), 'es-ES', null, 0.5, null);
                    }
                }, 3000);
            } 
        }



        function currentSlide(n) {
            showSlides(slideIndex = n);
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

    </script>

    <?php } else{ ?>
    <script>
        alert("El contenido no está disponible en modo visor!");
        window.history.go(-1);

    </script>
    <?php } ?>

    <?php include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>

</html>
