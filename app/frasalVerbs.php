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
    <meta name="keywords" content="write, aloud, english, spanish, language, learn, speak">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>phrasal-verbs</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/fvfrasal.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body>
    <?php  include("menu.php");                    
        
        function mostrarVerbos($nivel){
    include("../adm/connection.php");
    $res = mysqli_query($con, "SELECT * FROM phrasalverb WHERE fvlevel=$nivel ORDER BY fvenglish ASC"); 
   
    if(mysqli_num_rows($res) > 0){ $letra="";
         while($celda=mysqli_fetch_array($res)){  ?>
    <div class="container">
        <?php      
                //MUESTRA LA dateforo POR GRUPO
                if(strtoupper(substr($celda['fvenglish'],0,1))!=$letra){  ?>
        <button class="accordion" onclick="$('.letra<?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?>').slideToggle();">
            <?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?>
        </button>

        <?php   }  
                $letra=strtoupper(substr($celda['fvenglish'],0,1));  ?>

        <section class="body letra<?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?>">
            <p class="enVerb icon-soundalt" onclick="read($(this).text(),'en-US',null,0.3,null);">
                <?php echo $celda['fvenglish'];
                if(session_id() ===""){ session_start();}
                if(isset($_SESSION['idstudent']) and $_SESSION['level']>=5){ ?>
                <button class="icon-trash" onclick="deleteVerb('<?php echo $celda['idverb']?>');"></button>
                <button class="icon-edit" onclick="location.href='editall.php?id=<?php echo $celda['idverb'] ?>&type=<?php echo 'frasalVerbs'; ?>'"></button>
                <?php } ?>
            </p>
            <p class="esVerb" onclick="read($(this).text(),'es-ES',null,0.3,null);"><?php echo $celda['fvspanish'] ?></p>
            <?php if($celda['fvdescription']!=""){            
                        echo "<p class='desVerb'>". nl2br($celda['fvdescription'])."</p>";     
                    } ?>
        </section>
    </div>
    <?php  } 
            mysqli_free_result($res);
			mysqli_close($con); ?>
    <?php   } 
}        
    ?>
    <script>
        function editVerb(id, en, es, des) {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: {
                    'id': id,
                    'en': en,
                    'es': es,
                    'des': des,
                    'editVerb': 'editar'
                },
                success: function(data) {
                    alert(data);
                }
            });
            return false;
        }

        function deleteVerb(idverb) {
            $.ajax({
                type: 'POST',
                url: '../adm/manager.php',
                data: {
                    'deleteVerb': idverb
                },
                success: function(data) {
                    location.reload();
                }
            });
            return false;
        }

        //OPEN AND CLOSE EVERY WINDOWS
        function openGrupo(btn, tagshow) {
            $('.grupo1,.grupo2,.grupo3').css({
                'display': 'none'
            });
            $(tagshow).css({
                'display': 'block'
            });
            $('.btn').removeClass('select');
            $(btn).addClass('select');
        }

    </script>


    <div class="divbtn">
        <button class="btn" id="default" onclick="openGrupo(this, '.grupo1');">Básico</button>
        <button class="btn" onclick="openGrupo(this, '.grupo2');">Intermedio</button>
        <button class="btn" onclick="openGrupo(this, '.grupo3');">Avanzado</button>
    </div>


    <button class="accordion" onclick="$('#intro').slideToggle();">Introducción</button>
    <section class="panel" id="intro">
        <button class="icon-sound" onclick="read($('#intro').text(), 'es-ES', null, 0.5, null);"> </button>
        <button class="icon-volumedown" onclick="pause();"> </button>
        <button class="icon-volumeup" onclick="resume();"> </button>
        <button class="icon-mute" onclick="stop();"> </button>
        <p>Los verbos frasales son uno de los aspectos del inglés que más "miedo" dan a los estudiantes… pero en realidad, usarlos es mucho más fácil de lo que piensas. En4Es te explicamos las normas para que puedas y comiences a usar los verbos frasales. Veamos algunos ejemplos de cada tipo.</p>

        <h2>¿qué son exactamente los verbos frasales?</h2>
        <p>
            Los verbos frasales o phrasal verbs son verbos seguidos de una preposición o un adverbio que cambia su significado. Por ejemplo, no es lo mismo <b>to give</b> (dar) que <b>to give up</b> (abandonar, rendirse). Aunque algunos de ellos son bastante transparentes. Por ejemplo: (to sit=sentar) y (to sit down=sentarse), lo normal es que tengamos que aprendernos ese significado nuevo.</p>
        <p>
            Los verbos frasales se usan constantemente, tanto en inglés escrito como hablado, y son muy importantes si quieres entender a los nativos y sonar "natural" a la hora de expresarte. Algunos de ellos son más apropiados para contextos formales, mientras que otros campan a sus anchas en el lenguaje coloquial. Además, como los idiomas no dejan de evolucionar, todo el tiempo surgen nuevos phrasal verbs.

        </p>
<!--        <h2>Conjugacion</h2>-->
        <h2>Verbos transitivos e intransitivos</h2>
        <p>
            Aunque normalmente se enseñan todos juntos, existen tres tipos diferentes de verbos frasales, y tienen normas de uso diferentes.
            Pero primero, para distinguir los verbos frasales entre sí, primero toca dar un repaso rápido a la gramática: </p>
        <b>¿sabes cuál es la diferencia entre un verbo transitivo y uno intransitivo?</b><br>

        <font color="red">Los verbos transitivos son aquellos que necesitan un complemento directo para completar su significado. Algunos ejemplos (el complemento directo está subrayado):</font>

        <ul>
            <li>Sarah always eats apples for breakfast.</li>
            <li>Jack built a house with his own hands.</li>
            <li>Could you bring some beers to the party?</li>
        </ul>


        <p>
            Por el contrario, los verbos intransitivos son los que tienen significado completo por sí mismos y por lo tanto no necesitan objeto o complemento para que la frase tenga sentido. Por ejemplo:</p>
        <ul>
            <li>She is standing on one foot.</li>
            <li>The kids are sleeping.</li>
        </ul>


        <i>Una vez que tenemos esto claro, vamos a ver qué pasa con los diferentes tipos de verbos frasales.</i>

        <p>Los tres tipos de verbos frasales y su uso</p>
        <strong>1. Verbos frasales intransitivos.</strong>
        <p>Aquí no necesitamos ningún complemento directo, así que la preposición y el verbo van juntos. Algunos ejemplos:</p>
        <ul>
            <li>My friend and I were angry, but we made up the next day.</li>
            <li> Calm down, please! I can’t hear a thing.</li>
            <li>Will you please sit down?</li>
        </ul>
        <strong>2. Verbos frasales transitivos inseparables.</strong>
        <p> En este caso, el verbo y la preposición van juntos y el complemento directo debe ir después. Por ejemplo:</p>
        <ul>
            <li>Sam is feeling unwell today, so I’m looking after him.</li>
            <li>I’m looking forward to working with you.</li>
            <li>I can’t do without my coffee in the morning.</li>
        </ul>
        <strong>3. Verbos frasales transitivos separables.</strong>
        <p> Por último, tenemos los verbos frasales en los que el complemento directo va entre el verbo y la preposición:</p>
        <ul>
            <li> Her hard work sets her apart from her peers.</li>
            <li> Don’t let me down.</li>
            <li>She’s picking her things up.</li>
        </ul>
        <p>
            Un último detalle: algunos verbos frasales admiten ambos usos (transitivo e intransitivo) o bien pueden usarse tanto de manera separable como inseparable.Y por supuesto, la mejor manera de aprender a usarlos es hacer ejercicios y verlos en contexto. Practice, practice, practice!
        </p>
    </section>
    <div class="divtab grupo1"><?php mostrarVerbos(1);  ?></div>
    <div class="divtab grupo2"><?php mostrarVerbos(2);  ?></div>
    <div class="divtab grupo3"><?php mostrarVerbos(3);  ?></div>


    <?php  include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>

</html>
