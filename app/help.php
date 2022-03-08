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
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="pratice, test, learn, english">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>helps-&-FQ</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/test.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
    <style>
        div.body,
        ol,
        h1 {
            margin: 10px 5%
        }

        p {
            margin: 10px 0
        }

        p.title {
            font-weight: bold
        }

        div {
            display: grid
        }

        .color {
            display: inline-block;
            width: 15px;
            height: 15px
        }

    </style>
</head>
 
<body>
    <?php include("menu.php"); ?>
    <div class="body">
        <h1>Helps & FAQs</h1>

 
        <ol> Contenido:
            <li><a href="#main">Info sobre los icionos</a> </li>
            <li><a href="#colores">Info sobre los colores</a> </li>
            <li><a href="#perfil">Info sobre el perfil</a> </li>
            <li><a href="#practicar">Info sobre la ventana ejercicios</a> </li>
        </ol>

        <div id="access">
        
        <h2>¿CÓMO ACCEDER?</h2><br>
        <p>
            Para iniciar sesión, puedes usar el correo o el número de teléfono (celular) con el que creaste la cuenta "como usuario" de forma predeterminada, y la contraseña es la que ingresaste cuando te registraste. </p>
       
            <p>Una vez iniciada la sesión, podrás editar tu cuenta y proveer más información para tu perfil. Si llegas a olvidar tu contraseña o por alguna razón no puedes acceder a tu cuenta, por favor, no dudes en contactarons para ayudarte a recuperarla o simplemente has clic en "olvide contraseña" en el <a href="../index.php#login">formulario de iniciar sesión. </a></p>
    </div>
        <hr>

        <p id="main" class="title">En la ventana <a href="main.php">principal, sesión principal o main</a>, los iconos nos proporcionan información acerca de las posibles acciones a ejecutar o del contenido mostrado, las principales son las siguientes:</p>
        <br>
        <p>Este símbolo [ <span class="icon-lock"> Prueba de nivel X</span> ] indica que el nivel "X" aún no ha sido desbloqueaddo.</p>
        <br>
        <p>Al hacer clic en los siguientes símbolos:</p>
        <div>
            <span class="icon-level0"> Beginner</span>
            <span class="icon-level8"> Intermediate</span>
            <span class="icon-level9"> Advanced</span>
            <span class="icon-level13"> Master</span>
        </div>
        <p>solo se mostrará contenido segun el nivel y la categoría seleccionada.</p>
        <br>
        <p>Al hacer clic en este símbolo [ <span class="icon-text2"></span> ] solo se mostrará contenido de vocabularios, segun el nivel seleccionado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-text1"></span> ] solo se mostrará contenido de lecturas, segun el nivel seleccionado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-quoteleft"></span> ] solo se mostrará contenido de expresiones o frases, segun el nivel seleccionado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-video"></span> ] solo se mostrará contenido de videos, segun el nivel seleccionado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-puzzle"></span> ] solo se mostrará contenido de ejercicios, segun el nivel seleccionado.</p>
        <br>
        <p>Este símbolo [ <span class="icon-hide"></span> ] significa que el contenido publicado no ha sido visitado por el usuario actual.</p>
        <p>Este símbolo [ <span class="icon-views"></span> ] significa que el contenido publicado ya ha sido visitado por el usuario actual.</p>
        <p>Este símbolo [ <span class="icon-check"></span> ] significa que el contenido publicado aún no ha sido “marcado como aprendido”.</p>
        <p>Este símbolo [ <span class="icon-checked"></span> ] significa que el contenido publicado ya ha sido “marcado como aprendido”.</p>
        <br>
        <p>Este símbolo [ <span class="icon-like"></span> ] muestra la cantidad de "me gustas" que tiene el contenido publicado.</p>
        <p>Este símbolo [ <span class="icon-chat"></span> ] muestra la cantidad de "comentarios" que tiene el contenido publicado.</p>
        <p>Estos símbolos [ <span class="icon-views"></span> | <span class="icon-hide"></span> ] muestran la cantidad de "visitas" que tiene el contenido publicado.</p>
        <br>

        <p id="colores" class="title">Acerca de los colores:</p>
        <p>El color gris [ <span style="background:#ddd" class="color"></span> ] indica que el contenido no ha sido visto por el usuario actual, si hay una sesión iniciada.</p>
        <p>El color azul [ <span style="background:#99ddff" class="color"></span> ] indica que el contenido ya ha sido visto por el usuario activo, NOTA: sino se ha iniciado una sesión, todos los contenidos se mostraran en color gris. </p>
        <p>El color verde [ <span style="background:#b3ffcb" class="color"></span> ] indica que el contenido ha sido marcado como contenido estudiado y aprendido por el usuario activo, puedes cambiar esta acción en el símbolo [ <span class="icon-menu2"></span> ] A la derecha de los botones de comentarios, una vez entre en al pueblicación.</p>
        <br>

        <p id="perfil" class="title">En la ventana <a href="main.php">perfil (profile)</a>, los iconos nos proporcionan información acerca de las posibles acciones a ejecutar o del contenido mostrado, las principales son las siguientes:</p>
        <br>
        <p>Al hacer clic en este símbolo [ <span class="icon-usercircle"></span> ] se mostrará el perfil del estudiante o usuario logueado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-unlock"></span> ] se mostraran los contenidos marcados como aprendidos (Learned).</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-hide"></span> ] se mostraran los contenidos marcados como escondido (Hidden).</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-edit"></span> ] se mostrará la ventana de editar perfil de usuario, en donde prodras editar la información proporcionada del usuario logueado.</p>
        <p>Al hacer clic en este símbolo [ <span class="icon-trash"></span> ] se mostrará una ventana emergente, la cual nos permite eliminar definitivamente la cuenta de usurio.</p>
        <br>

        <div id="practicar">
            <p class="title">En4es.com es muy fácil y sencillo saber que tan bueno eres hablando, escribiendo y entendiendo el idioma inglés, así como, mejorar aquellos aspectos que necesitas practicar y mejorar también, tu gramática inglesa.</p>
            <p>Solo tienes que dar clic en este icono [ <span class="icon-grid"></span> ] del menú inferior y selecciona el aspecto que quieres practicar: pronunciación, escritura, comprensión y gramática.</p>

            <p class="title">Si vas a practicar tu pronunciación, sigue estos pasos:</p>
            <ol>
                <li>Busca el vocabulario con la lista de expresiones y palabras, el cual podrás recargar cuantas veces quieras, de manera aleatoria, dando clic en este icono [ <span class="icon-refresh"></span> ].</li>
                <li>Selecciona la palabra o expresión que deseas pronunciar.</li>
                <li>Da clic en el botón “Hablar”.</li>
                <li>Habla en voz alta y claro.</li>
                <li>Mira tus resultados en el texto de letras rojas, naranja o verde.</li>
            </ol>

            <p class="title">Si vas a practicar tu comprensión, sigue estos pasos:</p>
            <ol>
                <li>Busca el vocabulario con la lista de expresiones y palabras, el cual podrás recargar cuantas veces quieras, de manera aleatoria, dando clic en este icono [ <span class="icon-refresh"></span> ].</li>
                <li>Da clic en el botón “Escuchar”.</li>
                <li>Escucha atentamente.</li>
                <li>Selecciona traducción en español de la palabra o expresión que escuchaste en inglés.</li>
                <li>Mira tus resultados en el texto de letras rojas, naranja o verde.</li>
            </ol>


            <p class="title">Si vas a practicar tu escritura, sigue estos pasos:</p>
            <ol>
                <li>Busca el vocabulario con la lista de expresiones y palabras, el cual podrás recargar cuantas veces quieras, de manera aleatoria, dando clic en este icono [ <span class="icon-refresh"></span> ].</li>
                <li>El listado aparecerá en español, selecciona una opción.  </li>
                
                <li>Traduce la opción seleccionada a inglés, en el espacio en blanco. </li>
                <li>Da clic en el botón “Verificar”.</li>
                <li>Mira tus resultados en el texto de letras rojas, naranja o verde.</li>
            </ol>


            <p class="title">Si vas a practicar tu gramática, sigue estos pasos:</p>
            <ol>
                <li>Grammar helps and FAQs coming soon!</li>
            </ol>
        </div>


   

    <section>
        <style>
            form {
                padding: 50px 0
            }

            form label {
                display: block
            }

            form button {
                margin: 15px;
/*                padding: 5px*/
            }

        </style>
        <form action="">
            <label for="">¿Te fue de ayuda éste artículo?</label>
            <input type="hidden" name="idpost" value="">
            <button type="submit" name="si" class="icon-like"> SI</button>
            <button type="submit" name="no"  class="icon-dislike"> NO</button>
        </form>
    </section>
    </div>
    <?php include("footer.php");  include("options.php"); ?>

</body>

</html>
