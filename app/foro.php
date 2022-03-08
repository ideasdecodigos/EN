<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="profile, library">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>foro</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/foro.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../src/ckeditor/ckeditor.js"></script>

</head>

<body>
    <?php include("menu.php"); 
        if(isset($_SESSION['idstudent'])){   ?>
    <div class="container">
        <div class="divbtn">
            <button class="btn icon-chat active" onclick="openwindows(this, '#divanswers');btnActived('.btn',this);">
                Temas y Respuestas
            </button>
            <button class="btn icon-question" onclick="openwindows(this, '#divquestion');btnActived('.btn',this);">
                Explicar o Preguntar
            </button>
            <script>
                function btnActived(btns, tag) {
                    $(btns).css({
                        'background-color': '',
                        'color': 'black'
                    });
                    $(tag).css({
                        'background-color': '#aaa',
                        'color': 'white'
                    });
                }

            </script>
        </div>

        <div id="divanswers" class="divtab">
            <input type="search" placeholder="Buscar " id="filtro" onkeyup="siguiendo()">
            <!--   *******SLIDE SHOW*******-->
            <div class="slideshow">
                <h1 id="slidetitulo">RECIENTES</h1>
                <?php
	       include("../adm/connection.php");
		//EL USUARIO DEBE PODER INICIAR SECCION CON SU CORREO O TELEFONO Y SU CONTRASENA
		$res = mysqli_query($con, "SELECT name,idforo,question,student,dateforo FROM students RIGHT JOIN foro ON students.idstudent=foro.student ORDER BY idforo LIMIT 5");
		if( mysqli_num_rows($res) > 0 ){ //SI EL USER Y EL PASS SON VALIDOS, SE INICIA LA SECSION			
			while($fila=mysqli_fetch_array($res)){ ?>
                <div class="mySlides" onclick="location.href='texts.php?idtext=<?php echo $fila['idforo'];?>&type=<?php echo "foro"; ?>'">
                    <div><?php if(strlen($fila['question'])>100){echo substr($fila['question'],0,100). "...";}else{echo $fila['question'];} ?></div>
                    <q class="author"> - <?php echo $fila['name']; ?></q>
                    <i><?php echo date("M d y",strtotime($fila['dateforo'])); ?></i>
                </div>
                <?php }
			 mysqli_free_result($res);//libera la memoria
			 mysqli_close($con);						
		}    ?>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
            </div>
            <script>
                setInterval(function() {
                    plusSlides(1);
                }, 5000);

                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
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
            <!--******FIN SLIDE SHOW*********-->
            <?php 
             include("../adm/connection.php");
             $res = mysqli_query($con,"SELECT name,foto,idforo,question,student,dateforo FROM students RIGHT JOIN foro ON students.idstudent=foro.student ORDER BY RAND()");
             while($row=mysqli_fetch_array($res)){ ?>
            <section onclick="location.href='texts.php?idtext=<?php echo $row['idforo'];?>&type=<?php echo "foro"; ?>'">
                <?php if($row['foto']!=null){  ?>
                <img src="<?php echo $row['foto']; ?>" class="img">
                <?php }else{echo "<span class='img'>".strtoupper(substr($row['name'],0,1))."</span>";} ?>
                <font color="blue"><?php echo $row['name']; ?></font>
                <?php   if($_SESSION['idstudent']==$row['student']){  ?>
                <span class="icon-trash" onclick="del(<?php echo $row['idforo'] ?>);"></span>
                <?php } ?>
                <a> <?php if(strlen($row['question']) > 100){ echo substr($row['question'], 0, 100). "...";}else{echo $row['question'];}  ?></a> <br>
                <i class="time-right"><?php echo date("M d, Y",strtotime($row['dateforo'])); ?></i>
            </section>
            <?php
                    }   
                    mysqli_free_result($res); 
                    mysqli_close($con);  ?>
        </div>
        <script>
            function siguiendo() {
                var input, filter, div, a, i;
                input = document.getElementById("filtro");
                filter = input.value.toUpperCase();
                div = document.getElementById("divanswers");
                section = div.getElementsByTagName("section");
                for (i = 0; i < section.length; i++) {
                    txtValue = section[i].textContent || section[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        section[i].style.display = "";
                    } else {
                        section[i].style.display = "none";
                    }
                }
            }

        </script>

        <!--  ----------CONTENEDOR LECTURA--------------->
        <div class="divtab" id="divquestion">
            <h3>Has una pregunta o escribe sobre un tema de interés.</h3>

            <form id="formReadings">
                <textarea id="texto" required></textarea>
                <textarea id="txtdesc" name="question" style="display:none"></textarea>
                <input type="hidden" name="student" required value="<?php echo $_SESSION['idstudent']; ?>">
                <button type="submit">Publicar</button>
            </form>
            <script>
                CKEDITOR.replace('texto');
                //ENVIA EL FORMULARIO READINGS                   
                $('#formReadings').submit(function() {
                    $('#txtdesc').val(CKEDITOR.instances.texto.getData());
                    $.ajax({
                        type: 'POST',
                        url: '../adm/saveforo.php',
                        data: $(this).serialize(),
                        success: function(data) {
                            location.reload();
                        }
                    });
                    return false;
                });

            </script>
        </div>
    </div>
    <?php } ?>

    <?php include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
    <script>
        function del(idforo) {
            var eliminar = confirm('By clicking accept, all data linked to this post will be permanently deleted.\n\nFor sure you want to delete the post?');
            if (eliminar) {
                $.ajax({
                    type: 'POST',
                    url: '../adm/saveforo.php',
                    data: {
                        idforo: idforo
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
                return false;
            }
        }

    </script>

</body>

</html>
