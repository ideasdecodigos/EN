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
    <title>exercises</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/practice.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    
    
<!--
<script src="../js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="../src/icons/styles.css">
-->

<!--
<link rel="stylesheet" href="../src/sweetAlert2/sweetalert2.min.css">
<script src="../src/sweetAlert2/sweetalert2.all.min.js"></script>
-->

</head> 
<body> 
    <?php include("menu.php"); ?>   
    <div class="container">
    <div class="divbtn">
        <button class="btn icon-mic" onclick="$('#main').load('pronunciation.php');btnActived('.btn', this);"></button>
        <button class="btn icon-headphones" onclick="$('#main').load('understanding.php');btnActived('.btn',this);"></button>
        <button class="btn icon-text1" onclick="$('#main').load('writing.php');btnActived('.btn',this);"></button>
        <button class="btn icon-puzzle1" onclick="$('#main').load('grammar.php');btnActived('.btn',this);"></button>
        <script>
            $(function() {
                var pronctn = location.href;
                if (pronctn.includes("#pronunciation")) {
                    $('#main').load('pronunciation.php');
                } else if (pronctn.includes("#understanding")) {
                    $('#main').load('understanding.php');
                } else if (pronctn.includes("#writing")) {
                    $('#main').load('writing.php');
                }
            });

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
    
        <div id="main">

   <img src="../src/img/practiceimg.png" alt="imagen" id="img">
    </div>
    
    </div>
    <?php include("footer.php");  include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>

</html>
