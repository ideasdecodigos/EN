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
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>company</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/skills.css">
    <link rel="stylesheet" href="../css/test.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.knob.min.js"></script>
</head>

<body>

    <?php include("menu.php"); ?>
    <style>
        h1,
        b {
            text-align: center;
            display: block
        }

        p,
        h3,
        h2 {
            margin: 10px 5%;
        }

        i {
            margin: 10px 10%;
            display: block;
        }

        ul,
        ol {
            margin-left: 50px
        }

    </style>

    <!--    ########## CONTENT SKILLS#############-->
    <?php          
            include ("../adm/connection.php");
            $res = mysqli_query($con,"SELECT COUNT(*)AS users,(SELECT COUNT(*) FROM contents)AS topics,(SELECT COUNT(*) FROM subcontents)AS words FROM students");
            if(mysqli_num_rows($res) > 0 ){  
                function notacionKM($num){
                        if($num>=1000000){
                            $num/=1000000;
                            $num=number_format($num,1)."M";
                        }elseif($num>=1000){
                            $num/=1000;
                            $num=number_format($num,1)."K";
                        }
                        return $num;
                    }    
                
                while($fila=mysqli_fetch_array($res)){ 
                    $total=  $fila['users']+$fila['topics']+($fila['words']*2);                    
                                
        ?>

    <div class="skills">
        <div>
            <input type="text" value="<?php echo  $fila['users'] ?>" class="circle b4">
            <span class="icon-users"> Users</span>
        </div>
        <div>
            <input type="text" value="<?php echo  $fila['topics'] ?>" class="circle b1">
            <span class="icon-tags"> Topics</span>
        </div>
        <div>
            <input type="text" value="<?php echo  $fila['words'] ?>" class="circle b2">
            <span class="icon-upload"> +Words</span>
        </div>
        <div>
            <input type="text" value="<?php echo ($fila['words']*3) ?>" class="circle b3">
            <span class="icon-puzzle1"> +Exercises</span>
        </div>
        <script>
            function skills(limit, bgColor) {
                $('.circle').knob({
                    "min": 0,
                    "max": limit,
                    "width": 100,
                    "height": 100,
                    "fgColor": bgColor,
                    "readOnly": true,
                    "displayInput": true,
                    "release": function() {

                    }
                });
            }
            skills(<?php echo  $total ?>, "dodgerblue");

            $('.b4').val("<?php echo  notacionKM($fila['users']); ?>");
            $('.b1').val("<?php echo  notacionKM($fila['topics']); ?>");
            $('.b2').val("<?php echo  notacionKM($fila['words']); ?>");
            $('.b3').val("<?php echo  notacionKM(($fila['words']*5)); ?>");

        </script>
    </div>

    <?php 
            }                         
         }  mysqli_free_result($res);
            mysqli_close($con); ?>
    <!-- ############# END SKILLS ################--> 

    
    

    <h1> Acerca de EN4ES </h1>
    <h2>¿Qué es EN4ES?</h2>

    <p>EN4ES es un sitio para aprender el idioma ingles, con tutoriales y referencias que te ayudan a mejorar tu vocabulario, lectura, escritura, gramática, comprensión, pronunciación, y cultura inglesa, que cubre la mayoría de los aspectos del aprendizaje del idioma ingles.</p>

    <p>El sitio deriva su nombre de: English para Español (English for Spanish), pero su contenido funciona para personas de que hablen otros idiomas.</p>

    <h2>Fácil aprendizaje</h2>

    <p>EN4ES es un sitio nuevo, pensado para reunir las mejores prácticas y medios tecnológicos para que las personas interesadas en aprender el idioma ingles, lo logren de una manera eficaz y eficiente, EN4ES se centra en la simplicidad, EN4ES practica un aprendizaje sencillo y directo. EN4ES usa explicaciones y orientaciones simples, con ilustraciones simples de cómo usarlo. Los contenidos de EN4ES comienzan desde cero, con los nocimientos básicos del idioma y terminan con expresiones y explicaciones que podrían educar a cualquier nativo profesional.</p>

    <h2>Evalúate tú mismo</h2>

    <p>En el menú inferior puedes dar clic en este ícono [ <span class="icon-grid"></span> ] y evaluar tu pronunciación, comprensión, escritura y gramática.</p>

    <h2>EN4ES es gratis</h2>

            <p>EN4ES es, y siempre será, un recurso para el aprendizaje del idioma ingles completamente gratuito.</p>

            <h2>Puedes ayudar</h2>

            <p>Trabajamos arduamente para garantizar que EN4ES siga siendo útil, educativo, actualizado e interesante. Si encuentra un error o un enlace roto, háganoslo saber. </p>

    <b>Utilice el enlace <a href="../index.php">"INFORME DE ERROR"</a> en la página principal o en el siguiente ícono [ <span class="icon-menu2"></span> ] de cada contenido.</b>




            <br><br>

       

            <?php include("footer.php"); include("options.php"); ?>
            <script src="../js/script.js"></script>
</body>

</html>
