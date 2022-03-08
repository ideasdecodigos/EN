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
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>curso</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/courses.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <?php  include("menu.php");                    
    if(isset($_SESSION['idstudent'])){   ?> 

    <h2>Guía de estudios:</h2>
    <button class="accordion" onclick="$('#nv0').slideToggle();">Introducción</button>
    <section class="panel" id="nv0">
       <button class="icon-sound" onclick="read($('#nv0').text(), 'es-ES', null, 0.5, null);"> </button>
       <button class="icon-volumedown" onclick="pause();"> </button>
        <button class="icon-volumeup" onclick="resume();"> </button>
        <button class="icon-mute" onclick="stop();"> </button>
        <p>Dominar el inglés es importante para adaptarse a la vida en estados unidos, estudiar y abrirse paso en el campo laboral. No siempre es fácil encontrar el tiempo y los medios más eficientes para estudiar un idioma nuevo, por eso, te ofrecemos esta guía de estudio, ¡totalmente gratis! Para que aprendas (desde cero) hablar, a entender y a escribir inglés, como lo hacen los nativos. </p>

        <p>En4Es hemos clasificado los contenidos en 4 niveles, que van desde lo más básico hasta lo mas complejo. </p>
        <ul>
            <li>En la sesión <font color="red">beginner</font> aprenderás <strong>ingles básico</strong>, lo que todo estudiante debe aprender, lo más esencial. </li>
            <li>La sesión <font color="red">intermediate</font> se basa en la <strong>gramática</strong>, en los vocabularios con las palabras más relevantes del idioma ingles. </li>
            <li>En la sesión <font color="red">advanced</font> encontraras una serie de <strong>frases y expresiones</strong> que te adiestran en la cultura inglesa.</li>
            <li>La sesión <font color="red">master</font> esta centrada en su gran parte por <strong>conversaciones</strong>, en este punto encontraras expresiones y frases muy nativas de la cultura inglesa.</li>
        </ul>
        <p>En todos los niveles podrás trabajar con los verbos, tanto regulares, como irregulares, con la pronunciación de las palabras y con las curiosidades que trae consigo estudiar un idioma nuevo.
        </p>
        <p>Esperamos que esta guía de estudio te sea de ayuda, porque tal vez, este no sea el método para aprender inglés más moderno, pero si es el más seguro. ¡Muchos éxitos! te desea: En4Es team.</p>
    </section>

    <button class="accordion" onclick="$('#nv1').slideToggle();">Beginner<meter id="m1" min="0"></meter></button>
    <section class="panel" id="nv1"> </section>

    <button class="accordion" onclick="$('#nv2').slideToggle();">Intermediate<meter id="m2" min="0"></meter></button>
    <section class="panel" id="nv2"> </section>

    <button class="accordion" onclick="$('#nv3').slideToggle();">Advanced<meter id="m3" min="0"></meter></button>
    <section class="panel" id="nv3"> </section>

    <button class="accordion" onclick="$('#nv4').slideToggle();">Master<meter id="m4" min="0"></meter></button>
    <section class="panel" id="nv4"> </section>

    <script>
        function views(vl, nvl) {
            $.ajax({
                type: 'POST', 
                url: '../adm/curso.php',
                data: {
                    'view': vl
                },
                success: function(data) {
                    $(nvl).html(data);
                }
            });
            return false;
        }

        function addToCourse(idtema) {
            $.ajax({
                type: 'POST',
                url: '../adm/curso.php',
                data: {
                    'addToCouse': idtema
                }
            });
            return false;
        }

        function deleteFromCourse(idtema) {
            $.ajax({
                type: 'POST',
                url: '../adm/curso.php',
                data: {
                    'deleteFromCouse': idtema
                }
            });
            return false;
        }

        function addToLearned(idtema) {
            $.ajax({
                type: 'POST',
                url: '../adm/curso.php',
                data: {
                    'addLearned': idtema
                }
            });
            return false;
        }

        function deleteFromLearned(idtema) {
            $.ajax({
                type: 'POST',
                url: '../adm/curso.php',
                data: {
                    'deleteLearned': idtema
                }
            });
            return false;
        }

        $(function() {
            views(1, '#nv1');
            views(2, '#nv2');
            views(3, '#nv3');
            views(4, '#nv4');
            $('.accordion').click(function() {
                $(this).toggleClass("active");
            });
        });

    </script>

    <?php 
include("footer.php"); include("options.php");    
    
    }else{	echo " <script>  window.history.go(-1);  </script>";
}
?>
</body>

</html>
