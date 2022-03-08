<?php 
   
    if(isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){
 include("adm/autentication.php"); 
} ?>
<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 0001
	FECHA: DAY MONTH 2019
	
	PAGINA DE :DESCRIPCION
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="learn, english, free">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="src/logot.png" type="image/x-icon">
    <title>en4es</title>
    <link rel="stylesheet" href="src/icons/styles.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/skills.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.knob.min.js"></script>
    <script src="js/script.js"></script>

</head>

<body>
    <div class="menu">
        <?php if(session_id() ===""){ session_start();} if(isset($_SESSION['idstudent'])){  ?>
        <button onclick="window.location.href='app/main.php';" class="icon-globe"></button>

        <span><?php if(isset($_SESSION['idstudent'])){ 
    $name=explode(' ',$_SESSION['name']);
    echo "Welcome, ".$name[0]; } ?></span>
        <button onclick="window.location.href='adm/logout.php';" class="icon-logout"></button>
        <?php }else{ ?>
        <button onclick="window.location.href='app/main.php';" class="icon-globe"></button>
        <span>
            <button style="font-size:15px" onclick="openwindows(this,'#divLogin');">Entrar</button>
            <button style="font-size:15px" onclick="openwindows(this,'#divSignup');">Registrarse</button>
        </span>
        <?php } ?>
    </div>
    <br>
   
    <br>
      <div style="text-align:center;padding:10px">
       <img src="src/logot.png" width="100px" alt="Logo" onclick="location.href='../'"><br>
        <font color='red'>Bienvenidos a</font>
        <h1 id="tituloprincipal">I</h1>
    </div>
   
    <div class="starthere">
        <?php  if(isset($_SESSION['idstudent'])){ ?>
        <a href="app/main.php"> Comienza aquí!</a>
        <?php }else{ ?>
        <a href="javascript:void(0);" onclick="openwindows(this,'#divLogin');">Entrar</a>
        <a href="javascript:void(0);" onclick="openwindows(this,'#divSignup');">Registrarse</a>
        <a href="app/main.php">Comenzar</a>
        <?php } ?>
        <br><br>
        <i>Aprende inglés GRATIS!</i>
    </div>

  <script>
        $(function() {
            var i = 0; //representa el caracter
            var txt = 'nglés Libre            '; //texto a mostrar
            var speed = 200; //velocidad de la funcion

            function typeWriter() {
                if (i < txt.length) {
                    document.getElementById("tituloprincipal").innerHTML += txt.charAt(i);
                    i++;
                } else {
                    i = 0;
                    $('#tituloprincipal').text('I');
                }
            }
            setInterval(typeWriter, speed);

       //SLIDE SHOW
	var divs = $('.slide');
	var puntos = $('.punto');
	var divActual = 0;

	$(puntos).on('click', function () {
		setSlide($(this).attr('data-num')); //PASA EL NUMERO DEL PUNTO CLICKIADO COMO PARAMETRO 
		clearInterval(interval); //REINICIA EL CONTEO

		interval = setInterval(function () {
			setSlide(++divActual);
		}, 10000);
	});

	//REPRODUCE AUTOMATICAMENTE EL SLIDER
	var interval = setInterval(function () { 
		setSlide(++divActual);
	}, 5000);

	//FUNCION QUE ACTIVA EL DIV ACTUAL Y PUNTO ACTUAL, Y DESACTIVA LOS DEMAS
	function setSlide(n) {
		divActual = (n < divs.length) ? n : 0;

		$(divs).each(function () {
			$(this).removeClass('active');
		});

		$(puntos).each(function () {
			$(this).removeClass('active');
		});

		$(divs[divActual]).addClass('active');
		$(puntos[divActual]).addClass('active');
	}
});


    </script>
 

    <a href="#tips" class="icon-down"></a>
  
    
   
    <!--    FORMULARIO LOGIN**************-->
    <div class="divtab" id="divLogin">
        <b class="btn icon-delete" onclick="openwindows(this,'');"></b>
        <h2 style="text-align:center">LOG IN</h2>
        <form action="adm/login.php" method="post">
            <input type="text" name="user" required placeholder="User">
            <input type="password" name="pass" id="loginpass" placeholder="Password">
            <span>
                <input type="checkbox" onchange="showpass('loginpass','#lpwl');" style="width:15px;">
                <span id="lpwl">Show password</span>
                <input type="checkbox" name="cookie" id="cookie" value="olvidame" style="width:15px;margin-left:5px;">
                <span id="ckinfo">Remenberme</span>
            </span>
            <button type="submit" name="login">Login</button>
        </form>
        <br>
        <p style="font-size:12px;text-align:center">
            <a href="app/help.php">How to access?</a> | <a href="javascript:void(0);" onclick="openwindows(this,'#divForgotPassword');">Forgot password.</a>
        </p>
    </div>
    <!--    FORMULARIO SIGNUP*************-->
    <div class="divtab" id="divSignup">
        <b class="btn icon-delete" onclick="openwindows(this,'');"></b>
        <form action="adm/signup.php" method="post">
            <h2 style="text-align:center">SUBSCRIBE</h2><br>
            <input type="text" name="user" required placeholder="Full name">
            <input type="tel" name="tel" required placeholder="Contact">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="pass" id="lpass" placeholder="Password">
            <span>
                <input type="checkbox" onchange="showpass('lpass','#lpws');" style="width:15px;">
                <span id="lpws">Show password</span>
            </span>
            <button type="submit" name="login">Signup</button>
        </form>
    </div>



    <div class="divtab" id="divForgotPassword">
        <b class="btn icon-delete" onclick="openwindows(this,'');"></b>
        <h2 style="font-size:;text-align:center">RECUPERAR <br>CONTRASEÑA</h2><br>
        <form id="formchngpass">
            <p>Para recuperar tu contraseña, debes ingresar el email con el que creaste la cuenta y dar clic en "Recuperar". Una vez hecho eso, te enviaremos un link mediante el cual prodras acceder a tu cuenta nuevamente, y cambiar tu contraseña por una que puedas recordar más facilmente.</p>
            <input type="text" id="mail" required placeholder="Ingrese Email@ej.com">
            <button type="button" id="sendpss">Recuperar</button>
        </form>
    </div>
    <script>
        $('#sendpss').click(function() {

            var codigo = Math.floor(Math.random() * 10000000000);
            console.log(codigo);
            var correo = $('#mail').val();
            console.log(correo);
            $.ajax({
                type: 'post',
                url: 'adm/resetPassword.php',
                data: {
                    mail: correo,
                    code: codigo
                },
                success: function(data) {
                    alert(data);
                    window.reload();
                }
            });
            return false;
        });


        $(function() {
            var entar = location.href;
            if (entar.includes("#login")) {
                openwindows(this, '#divLogin');
            } else if (entar.includes("#signup")) {
                openwindows(this, '#divSignup');
            }
        });
        //MUESTRA Y OCULTA EL PASSWORD
        function showpass(input, tag) {
            var pass = document.getElementById(input);
            if (pass.type === "password") {
                pass.setAttribute("type", "text");
                $(tag).text("Hide password");
            } else {
                pass.setAttribute("type", "password");
                $(tag).text("Show password");
            }
        }
        //RECORDAR PASSWORD
        $('#cookie').on('change', function() {
            if ($(this).is(':checked')) {
                $(this).val("rememberme");
                $("#ckinfo").text("Forgetme");
            } else {
                $(this).val("forgetme");
                $("#ckinfo").text("Rememberme");
            }
        });

    </script>

    <div id="tips">
        <ul>
            <li>Estudia gratis.</li>
            <li>Estudia en cualquier momento.</li>
            <li>Estudia desde cualquier dispositivo.</li>
        </ul>
    </div>

    <h1 style="padding-left:20px"> Report a problem</h1>
    <div class="contactos">
        <!--   contiene los telefonos de contactos-->
        <div class="column">
            <h2 class="icon-phone">Phone:</h2>
            <p>Tell me, how may I help you?</p>
            <a href="tel:+3402444327>">+1 340 244 4327</a>
            <br><br>

            <h2 class="icon-arroba">Email:</h2>
            <p>For all types of questions, comments and concerns; please text me at: <a href="mailto:ideasdecodigos@gmail.com">ideasdecodigos@gmail.com</a> or complete the next form.
            </p>
        </div>

        <div class="column">
            <form action="../adm/contacts.php" method="post">
                <input type="text" name="nombre" maxlength="100" required placeholder="Name" title="Enter name">
                <input type="email" name="correo" required maxlength="60" placeholder="Email" title="Enter email">
                <input type="tel" name="tel" maxlength="15" placeholder="Phone" title="Enter phone">
                <input type="text" name="asunto" maxlength="300" required placeholder="Subject" title="Enter subject">
                <textarea name="mensaje" required placeholder="Message" title="Enter massage" maxlength="5000"></textarea>
                <button type="submit">SEND</button>
            </form>
        </div>
    </div>
    <br>

    <div class="infoContent">
        <p> IDCSchool is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2020 by en4en.com Data. All Rights Reserved.
            Powered by IDCSchool.</p>
    </div>

    <div class="starthere">
        <?php  if(isset($_SESSION['idstudent'])){ ?>
        <a href="app/main.php"> Comienza aquí!</a>
        <?php }else{ ?>
        <a href="javascript:void(0);" onclick="openwindows(this,'#divLogin');">Entrar</a>
        <a href="javascript:void(0);" onclick="openwindows(this,'#divSignup');">Registrarse</a>
        <a href="app/main.php">Comenzar</a>
        <?php } ?>
        <br><br>
        <i>Aprende inglés GRATIS!</i>
    </div>


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
        <p>
            Este sitio usa cookies para mejorar tu experiencia mientras navegas en él, si permaneces aqui aceptas su uso. Saber más sobre las <a lang="en" translate="no" target="_blank" href="https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)">Cookies.</a> </p>
        <button onclick="aceptarCookies()"> Aceptar</button>
    </div>

    <footer>

        <div class="redes">
            <a href="https://www.facebook.com/ideasdecodigos" target="_blank" title="Follow me in FaceBook"><img src="src/facebook.png" alt="facebook"></a>
            <a href="https://www.instagram.com/ideasdcodigos/" target="_blank" title="Follow me in Instagram"><img src="src/instagram.png" alt="instagram"></a>
            <a href="https://twitter.com/de_ideas" target="_blank" title="Follow me in Twitter"><img src="src/twitter.png" alt="twitter"></a>
            <a href="https://www.youtube.com/channel/UCwN59VLiuiL_GMX3fHTOf_A" target="_blank" title="Follow me in YouTube"><img src="src/youtube.png" alt="youtube"></a>
        </div>

        <form id="formboletin">
            <font>¡Suscríbete a nuestro boletín!</font>
            <p>Queremos mantenerte informado por email de todo el contenido que subimos.</p>
            <div class="con-text">
                <input type="email" name="email" placeholder="E-mail@ej.com" required>
                <input type="submit" name="suscribe" value="Suscribirse">
            </div>
        </form>
<script>        
         //ENVIA EL FORMULARIO PHRASES                    
            $('#formboletin').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: 'adm/boletin.php',
                    data: $(this).serialize(), 
                    success: function(data) {                        
                        alert(data);                     
                        document.getElementById('formboletin').reset();
                    }
                });
                return false;
            }); 
        </script>

        <br>
        <p>Copy rights 2020 © | All rights reserved IDCSchool</p>
        <i><b>en4es.com</b> | Desarrollado por Juan Paniagua</i>
        <div id="subir">
            <a href="#top" class="icon-up" title="Back to top"></a>
        </div>

        <br>
        <hr>
        <br>
        <p>
            <a href="app/terms.php" target="_blank">Terms and Conditions</a> |
            <a href="app/privacy.php" target="_blank">Privacy Policy</a> |
            <a lang="en" translate="no" target="_blank" href="https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)">Cookies</a>
        </p>
        <br>
        <br>
    </footer>

</body>

</html>
