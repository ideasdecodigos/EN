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
    <meta name="description" content="Oficial website to learn english">
    <meta name="keywords" content="english,ingles,spanish,español,languages,idiomas,usa,us,states">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>Main</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/efects.css">
    <script src="../js/jquery-3.3.1.min.js"></script>

</head>

<body>
  
    <?php include("menu.php");include("../adm/functions.php");
    $level=1; 
    $iduser=1; 
    if(isset($_SESSION['level'])){ 
        $iduser=$_SESSION['idstudent'];
        
        if($_SESSION['level'] < 5){
            $level=$_SESSION['level'];
        }else{ $level=5; ?>
            <script>//MUESTRA CONTENIDO CON EL USER ROOT
                $(function() {
                    varPage = 1;
                    buttons('', '');
                });
            </script>
    
     <?php   }         
    }    ?>
    
    <!--    CODIGO DEL FINTRO POR NIVELES Y CATEGORIAS-->
    <div class="filtro">
        <button class="bntsubmenu" onclick="openSubMenu(this, '#filtro');">Filtro</button>
        <?php  //PRUEBA DE NIVEL    
        if(isset($_SESSION['level'])){
            if($_SESSION['level'] < 5){  ?>
                <button class="bntsubmenu" onclick="openSubMenu(this, '#school');">Curso</button>        
                <?php }else{ ?>
                <button class="bntsubmenu" onclick="openSubMenu(this, '#school2');">Curso</button>        
                <?php } ?>
                <button class="bntsubmenu" onclick="openSubMenu(this, '#social');">Social</button>       
      <?php } else{ ?>    
            <button class="bntsubmenu" onclick="openSubMenu(this, '#school3');">Verbos</button>
             <?php } ?>              
            <button class="bntsubmenu icon-delete" onclick="openSubMenu(this, '');"></button>        
    </div>
    
   <div class="contFiltro">
       <div class="divSubMenu" id="filtro">
           <span class="icon-tags" onclick="openClose('.categorias','.niveles',this);"> Categoria</span> 
           <span class="icon-level13" onclick="openClose('.niveles','.categorias',this);"> Nivel</span>
           
           <div class="categorias" style="display:none">
               <span class="btn icon-tags" onclick="varPage=1;buttons('','');btnActived('.btn, .nivel',this);openClose('.categorias','.niveles','.icon-down');"> Todo</span>
               <span class="btn icon-database" onclick="varPage=1;buttons('vocabulary',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Vocabulario</span>
               <span class="btn icon-book1" onclick="varPage=1;buttons('readings',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Lectura</span>
               <span class="btn icon-text2" onclick="varPage=1;buttons('grammar',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Gramatica</span>
               <span class="btn icon-quoteleft" onclick="varPage=1;buttons('expressions',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Expresiones
               </span>
               <span class="btn icon-video" onclick="varPage=1;buttons('videos',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Videos</span>
               <span class="btn icon-chat" onclick="varPage=1;buttons('conversation',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Conversaciones</span>
               <span class="btn icon-puzzle" onclick="varPage=1;buttons('practice',varLevel); btnActived('.btn',this);openClose('.categorias','.niveles','.icon-down');"> Practicas</span>
           </div>
           
           <div class="niveles" style="display:none">
               <span class="nivel icon-level0" onclick="varPage=1;buttons(varType,1); btnActived('.nivel',this);openClose('.niveles','.categorias','.icon-down')"> Principiante</span>
               <span class="nivel icon-readernaut" onclick="varPage=2;buttons(varType,2); btnActived('.nivel',this);openClose('.niveles','.categorias','.icon-down')"> Intermedio</span>
               <span class="nivel icon-level8" onclick="varPage=3;buttons(varType,3); btnActived('.nivel',this);openClose('.niveles','.categorias','.icon-down')"> Avanzado</span>
               <span class="nivel icon-level9" onclick="varPage=4;buttons(varType,4); btnActived('.nivel',this);openClose('.niveles','.categorias','.icon-down')"> Profesional</span>
           </div>
       </div>
       
       <div class="divSubMenu" id="school">
           <div>
               <a class="icon-level8" href="cuorses.php"> Guía de estudio</a>
               <a class="icon-address" href="regularVerbs.php"> Verbos Regulares</a>
               <a class="icon-adress2" href="irregularVerbs.php"> Verbos Irregulares</a>
               <a class="icon-quoteleft" href="frasalVerbs.php"> Verbos Frasales</a>
               <a class="icon-lock" href="texts.php?idtext=0&type=tests&level=<?php echo $level ?>"> Examen de nivel: <?php echo $level; ?></a>
           </div>
       </div>
       
       <div class="divSubMenu" id="school2">
           <div>
               <a class="icon-level9" href="cuorses.php"> Guía de estudio superada</a>
               <a class="icon-address" href="regularVerbs.php"> Verbos Regulares</a>
               <a class="icon-adress2" href="irregularVerbs.php"> Verbos Irregulares</a>
               <a class="icon-quoteleft" href="frasalVerbs.php"> Verbos Frasales</a>

           </div>
       </div>
       
        <div class="divSubMenu" id="school3">
           <div>
               <a class="icon-address" href="regularVerbs.php"> Verbos Regulares</a>
               <a class="icon-adress2" href="irregularVerbs.php"> Verbos Irregulares</a>
               <a class="icon-quoteleft" href="frasalVerbs.php"> Verbos Frasales</a>
           </div>
       </div>
       
       <div class="divSubMenu" id="social">
          <div>
           <a class="icon-chat" href="chat.php"> Chat privado</a>
           <a class="icon-question" href="public-chat.php"> Chat público</a>
           <a class="icon-tags" href="foro.php"> Foro</a>
           </div>
       </div>
       
    </div>
   
    <script>
       
        var varLevel = <?php echo $level ?>;
        var varUser = <?php echo $iduser ?>;
        var varType = "";
        var varPage = 1;

        function buttons(tg, nvl) {
            $('.resultado').text('');
            varLevel = nvl;
            varType = tg;
            paginacion(varPage, varType, varLevel, varUser);
        }

        function btnActived(btns, tag) {
            $(btns).css({
                'opacity':''
            });
            $(tag).css({
                'opacity':'0.5'
            });

        }

        function openClose(shw, hd, btn) {
            $(hd).slideUp();
            $(shw).slideToggle();
            $(btn).toggleClass(' icon-down');

        }

//OPEN AND CLOSE EVERY WINDOWS
function openSubMenu(bntsubmenu, tagshow) {
    $('.divSubMenu').css({
        'display': 'none'
    });
    $(tagshow).css({
        'display': 'block'
    });
    
    $('.bntsubmenu').removeClass('active');
    $(bntsubmenu).addClass('active');
}

    </script>
   
    <!--      MENU DE AMIGOS-->
    <div class="friends">
        <div class='img' title='Amigos'><a href='friends.php' style='background:black;border:3px solid white;' class="icon-users"></a></div>
        <?php include("../adm/connection.php"); 
            $res = mysqli_query($con,"SELECT idstudent,name,foto FROM students ORDER BY RAND()");
            while($row=mysqli_fetch_array($res)){
                if($row['foto']==null  || $row['foto']=="null" || $row['foto']==""){  
                    echo "<div class='img' title='".$row['name']."'><a href='profile.php?iduser=".$row['idstudent'] ."' style='background:".fondos()."'>".strtoupper(substr($row['name'],0,1))."</a></div>";
                }else{ ?>
        <a href="profile.php?iduser=<?php echo $row['idstudent'] ?>" title="<?php echo $row['name'] ?>"><img src="<?php echo $row['foto']; ?>" alt="foto"></a>
        <?php   } 
            }?>
    </div>

    <!--///////////////////COLUMNA PRINCIPAL///////////////////-->
    <div class="divtab" id="divContents" style="display:block">
        <div class="resultado"></div>
        <center id="loading"> </center>
    </div>

    <div style="display:none">
        <center class="linkRandom"><a href="exercises.php" class="icon-grid"> Práctica tu Inglés</a></center>
       <?php if(isset($_SESSION['level'])){ ?>
        <center class="linkRandom"><a href="friends.php" class="icon-user"> Encuentra Amigos</a></center>
        <center class="linkRandom"><a href="chat.php" class="icon-chat"> Chat Prívado</a></center>
        <center class="linkRandom"><a href="public-chat.php" class="icon-users"> Chat Público</a></center>
        <center class="linkRandom"><a href="foro.php" class="icon-tags"> Foro</a></center>
        <?php } ?>
        <center class="linkRandom"><a href="exercises.php#writing" class="icon-text1"> Práctica tu Escritura</a></center>
        <center class="linkRandom"><a href="exercises.php#understanding" class="icon-headphones"> Práctica tu Comprensión</a></center>
        <center class="linkRandom"><a href="exercises.php#pronunciation" class="icon-mic"> Práctica tu Pronunciación</a></center>
    </div>
    <script>
        let linkTagRandom = document.getElementsByClassName("linkRandom");

        paginacion(varPage, varType, varLevel, varUser);

        $(window).scroll(function() {
            myscroll("divRandom", "scrollUp", 10); //ANIMA EL DIVRANDOM

            if (($(window).scrollTop() + $(window).height()) >= ($(document).height() - 200)) {
                varPage++;
                paginacion(varPage, varType, varLevel, varUser);
                if (varPage == 1 || varPage == 2 || varPage == 3 || varPage == 4 || varPage == 5 || varPage == 6) {
                    $(".resultado").append(linkTagRandom[Math.floor(Math.random(0, linkTagRandom.length) * linkTagRandom.length)]);
                }
            }
        });

        function paginacion(pagina, tipo, nivel, iduser) {
            $.post('../adm/contents.php', {
                page: pagina,
                type: tipo,
                level: nivel,
                iduser: iduser
            }, function(data) {
                if (data.trim().length >= 0) {
                    $("#loading").html("<center onclick='location.reload();'><img src='../src/updated.gif' height='100px'><br> <b>Estas Actualizado!</center><br><br><br>");
                }
                $(".resultado").append(data);
            });
        }

    </script>

    <?php include("options.php"); ?>
    <script src="../js/script.js"></script>

    <!--   ***********ALERTA DE COOKIES**************-->
    <style>
        #cajacookies a {
            text-decoration: none;
            color: dodgerblue;
        }

        #cajacookies button {
            background: dodgerblue;
            color: white;
            border: none;
            padding: 10px;
            display: inline;
            display: block;
            margin: 10px auto;

        }

        #cajacookies {
            padding: 20px;
            position: fixed;
            bottom: 2px;
            z-index: 10;
            color: white;
            background: rgba(0, 0, 0, 0.8);
            display: block;
            width: 80%;
            border-radius: 5px;
            right: 5px;
        }

    </style>
    <div id="cajacookies">
        <p>Este sitio usa cookies para mejorar tu experiencia mientras navegas en él, si permaneces aqui aceptas su uso. Saber más sobre las <a lang="en" translate="no" target="_blank" href="https://es.wikipedia.org/wiki/Cookie_(inform%C3%linkRandomtica)">Cookies.</a> </p>
        <button onclick="aceptarCookies();"> Aceptar</button>
    </div>
</body>

</html>
