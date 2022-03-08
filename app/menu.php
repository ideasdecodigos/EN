<?php if(session_id() ===""){ session_start();} ?>
<style>
    #menuContent button a{text-decoration: none; color: dodgerblue;}
</style>
<div class="menu">
    <a href="../index.php"><img src="../src/logot.png" alt="Icon"></a>
    <a href="https://paypal.me/jcpaniagua?locale.x=es_XC" target="_blank" title="Donar"><img src="../src/paypal.png" alt="Paypal"></a>
    
<!--
    <button class='btn icon-bell1' onclick=\"$('#notificatons').slideToggle(500);$(this).toggleClass('icon-bell2');\">
    <span>54</span></button>
-->
    <span>
    
    <?php if(isset($_SESSION['idstudent'])){ 
    $name=explode(' ',$_SESSION['name']);
    echo " 
    Hello,<a style='color:dodgerblue' href='account.php'>".ucfirst($name[0])."</a>";  
}else{ echo "<a style='color:dodgerblue' href='../index.php#login'>Login</a>";} ?></span>

    <div class="menuIcon" onclick="menu(this);">
        <div class="line1"></div>
        <div class="line2"></div> 
        <div class="line3"></div>
    </div> 
    <script>
         function menu(x){x.classList.toggle("change");
$('#menuContent').slideToggle();
$('#divAccess, #divCompany').hide();}
    </script>
    
</div>
<!--<div id="notificatons" >dfhgjkhg</div>-->
<div id="menuContent">
    <button onclick="window.location.href='../index.php';">Inicio <span class="icon-home"></span></button>  
    <button onclick="window.location.href='main.php';">Temas <span class="icon-globe"></span></button>
    <button onclick="window.location.href='exercises.php';">Ejercicios <span class="icon-grid"></span></button>
       
    <?php if(isset($_SESSION['idstudent'])){  ?> 
    <button onclick="$('#divAccess').slideToggle();"><i class="icon-sort"></i>Estudiante <span class="icon-confi"></span></button>
    <div class="divtab" id="divAccess">
        <button onclick="window.location.href='chat.php';">Chat <span class="icon-chat"></span></button>
        <button onclick="window.location.href='foro.php';">Foro <span class="icon-tags"></span></button>
        <button onclick="window.location.href='friends.php';">Amigos <span class="icon-users"></span></button>
        <button onclick="window.location.href='cuorses.php';">Curso <span class="icon-level8"></span></button>
        <button onclick="window.location.href='account.php';">Cuenta <span class="icon-usercircle"></span></button>
        <button onclick="window.location.href='../adm/logout.php'">Salir <span class="icon-logout"></span></button>
    </div>
    <?php }else{ ?>
    <button onclick="$('#divAccess').slideToggle();"><i class="icon-sort"></i>Acceder <span class="icon-unlock"></span></button>
    <div class="divtab" id="divAccess">
        <button onclick="window.location.href='../index.php#login';">Entrar <span class="icon-login"></span></button>
        <button onclick="window.location.href='../index.php#signup';">Registrarse <span class="icon-user"></span></button>
    </div>
    <?php } ?>
    
     <button onclick="$('#divCompany').slideToggle();"><i class="icon-sort"></i>Organización <span class="icon-university"></span></button>
    <div class="divtab" id="divCompany">   
        <button onclick="window.location.href='company.php';">Nosotros <span class="icon-heart"></span></button>
        <button onclick="window.location.href='help.php';">Ayuda & FAQs <span class="icon-question"></span></button>
        <button onclick="window.location.href='terms.php';">Términos <span class="icon-file2"></span></button>
        <button onclick="window.location.href='privacy.php';">Privacidad <span class="icon-file1"></span></button>
        <button><a href="https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)" target="_blank">Cookies <span class="icon-files"></span></a></button>
    </div>
    
    <button onclick="$('#divSearch').slideToggle();">Buscar <span class="icon-search"></span></button>
</div>

<div class="divtab" id="divSearch" style="display:none"></div> 
<script>
    $('#divSearch').load("liveSearch.php");    
</script>



