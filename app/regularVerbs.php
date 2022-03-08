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
    <meta name="description" content="Pratice and learn english">
    <meta name="keywords" content="pratice, test, learn, english">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>regular-verbs</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/courses.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body>
    <?php include("menu.php"); ?>

    <div>

        <h2>Verbos regulares - Regular Verbs</h2>
        <button class="accordion" onclick="$('#nv0').slideToggle();">Introducción</button>
        <section class="panel" id="nv0">
            <button class="icon-sound" onclick="read($('#nv0').text(), 'es-ES', null, 0.5, null);"> </button>
            <button class="icon-volumedown" onclick="pause();"> </button>
            <button class="icon-volumeup" onclick="resume();"> </button>
            <button class="icon-mute" onclick="stop();"> </button>
            <p>
                En principio, los verbos en el idioma inglés son mucho más fáciles de aprender que en español, porque la mayoría de los verbos son regulares. Los verbos regulares mantienen la misma lógica de conjugación en presente y futuro, sin embargo, sus cambios saltan a la vista cuando se trata de los tiempos en pasado.
                En este caso, para conjugar los verbos regulares en inglés, basta con añadir “ed” (en la mayoría de los casos) al final para formar el pasado simple y el pasado participio. Lo difícil es saber si un verbo es regular o irregular, pues estos últimos no siguen ninguna regla.</p>

            <p>
                Para que aprendas a identificar y a conjugar los verbos regulares en todos los tiempos del idioma inglés, hemos preparado una lista de verbos regulares que te ayudará a entender su estructura de conjugación en los distintos tiempos.
            </p>
            <p>Para saber más sobre la estructura gramatical de los verbos regulares en inglés, visita los siguientes enlaces:</p>
            <ul>
                <li>
                    <a href="#">Pasado simple y pasado participio.</a>
                </li>
                <li>
                    <a href="#">Presente simple.</a>
                </li>
                <li>
                    <a href="#">Presente continuo.</a>
                </li>
                <li>
                    <a href="#">Futuro simple.</a>
                </li>
            </ul>
        </section>

        <button onclick="$('#ejemplo').slideToggle();" class="accordion">Ejemplo de los tiempos en español:</button>
        <section id="ejemplo" class="panel">
            <table>
               <tr><th colspan="3">Verbos en Infinitivo</th></tr>
               <tr>
                   <td>Aprender</td>
                   <td>Estudiar</td>
                   <td>Hablar</td>
               </tr>
                <tr><th colspan="3">Pasado Simple</th></tr>
                <tr><td colspan="3">Yo aprendí</td></tr>
                <tr><td colspan="3">Ella aprendió</td></tr>
                <tr><td colspan="3">Nosotros aprendimos</td></tr>
                
                <tr><th colspan="3">Pasado Participio</th></tr>
                <tr><td colspan="3">Él ha estudiado</td></tr>
                <tr><td colspan="3">Usted ha estudiado</td></tr>
                <tr><td colspan="3">Ellos han estudiado</td></tr>
                
                <tr><th colspan="3">Presente Simple</th></tr>
                <tr><td colspan="3">Yo hablo</td></tr>
                <tr><td colspan="3">Ella habla</td></tr>
                <tr><td colspan="3">Nosotros hablamos</td></tr>
                
                <tr><th colspan="3">Presente Continuo</th></tr>
                <tr><td colspan="3">Tú estás aprendiendo</td></tr>
                <tr><td colspan="3">Ustedes están aprendiendo</td></tr>
                <tr><td colspan="3">Ella está aprendiendo</td></tr>
                
                <tr><th colspan="3">Futuro Simple</th></tr>
                <tr><td colspan="3">Yo estudiaré</td></tr>
                <tr><td colspan="3">Nosotros estudiaremos</td></tr>
                <tr><td colspan="3">Ellas estudiarán</td></tr>
            </table>
        </section>

        <nav>
                      <font color="red">Vea la conjugación del siguiente verbo en todos los tiempos: </font><br>
            <select id="enRegularVerbs" title="Inglés">
                <script>
                    /*An array containing all the country names in the world:*/
                    var enRegularVerbs = ["Act", "Add", "Arrest", "Assist", "Address", "Advertise", "Amuse", "Approach", "Ask", "Agree", "Annoy", "Answer", "Appear", "Arrange", "Arrive", "Abandon", "Abuse", "Acquire", "Admire", "Adore", "Advance", "Advice", "Announce", "Attempt", "Avoid", "Attack", "Assure", "Apologize", "Allow", "Admit", "Accuse", "Accede", "Absorb", "Abolish", "Accent", "Beg", "Believe", "Blame", "Belong", "Balance", "Bless", "Brush", "Behave", "Breathe", "Complete", "Consist", "Count", "Close", "Cook", "Crash", "Cross", "Call", "Care", "Carry", "Change", "Check", "Charge", "Clean", "Climb", "Cover", "Cry", "Cash", "Claim", "Command", "Compare", "Compose", "Consider", "Contain", "Copy", "Crown", "Continue", "Commit", "Combine", "Collect", "Dance", "Dress", "Drop", "Die", "Declare", "Delay", "Deliver", "Deny", "Dry", "Destroy", "Devote", "Enjoy", "Engage", "Envy", "Express", "Exclaim", "Explain", "Fail", "File", "Fire", "Fill", "Follow", "Fry", "Finish", "Fish", "Fix", "Gain", "Guess", "Help", "Hope", "Happen", "Hurry", "Imagine", "Judge", "Kiss", "Kill", "Laugh", "Like", "Look", "Mark", "Miss", "Manage", "Maintain", "Marry", "Massage", "Measure", "Move", "Notice", "Number", "Name", "Note", "Observe", "Offer", "Open", "Order", "Perform", "Phone", "Plan", "Play", "Pray", "Prefer", "Prepare", "Park", "Pass", "Pick", "Please", "Practice", "Promise", "Pronounce", "Punish", "Push", "Repeat", "Report", "Request", "Refuse", "Raise", "Register", "Receive", "Remember", "Repair", "Require", "Reserve", "Resolve", "Search", "Save", "Serve", "Sign", "Smile", "Stay", "Study", "Suffer", "Smoke", "Stop", "Start", "Sound", "Surprise", "Sail", "Talk", "Touch", "Train", "Taste", "Translate", "Travel", "Trouble", "Tie", "Test", "Try", "Trust", "Turn", "Use", "Unite", "Visit", "Vary", "Wait", "Want", "Walk", "Wash", "Watch", "Wish", "Work", "Warm", "Water", "Weigh", "Whistle", "Worry", "Wound"];

                    for (i = 0; enRegularVerbs.length > i; i++) {
                        document.getElementById("enRegularVerbs").innerHTML += "<option value='" + i + "'>" + enRegularVerbs[i] + "</option> <br>";
                    }

                </script>
            </select>
            <select id="esRegularVerbs" title="Español">
                <script>
                    /*An array containing all the country names in the world:*/
                    var esRegularVerbs = ["Actuar", "Añadir", "Arrestar", "Asistir", "Dirigirse", "Anunciar", "Entretener", "Acercarse", "Preguntar", "Concordar", "Molestar", "Responder", "Aparecer", "Arreglar", "Llegar", "Abandonar", "Abusar", "Adquirir", "Admirar", "Adorar", "Avanzar", "Aconsejar", "Anunciar", "Intentar", "Evitar", "Atacar", "Asegurar", "Disculparse", "Permitir", "Admitir", "Acusar", "Acceder", "Absorber", "Abolir", "Acentuar", "Rogar", "Creer", "Culpar", "Pertenecer", "Equilibrar", "Bendecir", "Cepillar", "Comportarse", "Respirar", "Completar", "Consistir", "Contar", "Cerrar", "Cocinar", "Chocar", "Cruzar", "Llamar", "Cuidar", "Llevar", "Cambiar", "Chequear", "Cargar", "Limpiar", "Escalar", "Cubrir", "Llorar", "Cobrar", "Reclamar", "Mandar", "Comparar", "Componer", "Considerar", "Contener", "Copiar", "Coronar", "Continuar", "Cometer", "Combinar", "Colectar", "Bailar", "Vestir", "Dejar Caer", "Morir", "Declarar", "Demorar", "Entregar", "Denegar", "Secar", "Destruir", "Dedicar", "Disfrutar", "Comprometer", "Envidiar", "Expresar", "Exclamar", "Explicar", "Fracasar", "Archivar", "Despedir", "Llenar", "Seguir", "Freir", "Terminar", "Pescar", "Arreglar", "Ganar", "Adivinar", "Ayudar", "Desear", "Suceder", "Apurarse", "Imaginar", "Juzgar", "Besar", "Matar", "Reir", "Gustar", "Mirar", "Marcar", "Extrañar", "Manejar", "Mantener", "Casarse", "Masajear", "Medir", "Mover", "Notificar", "Enumerar", "Nombrar", "Notar", "Observar", "Ofrecer", "Abrir", "Ordenar", "Ejecutar", "Telefonear", "Planificar", "Jugar", "Orar", "Preferir", "Preparar", "Estacionar", "Pasar", "Recoger", "Complacer", "Practicar", "Prometer", "Pronunciar", "Castigar", "Empujar", "Repetir", "Reportar", "Solicitar", "Rechazar", "Levantar", "Registrar", "Recibir", "Recordar", "Reparar", "Requerir", "Reservar", "Resolver", "Buscar", "Salvar", "Servir", "Firmar", "Sonreír", "Permanecer", "Estudiar", "Sufrir", "Fumar", "Detener", "Comenzar", "Sonar", "Sorprender", "Navegar", "Conversar", "Tocar", "Entrenar", "Probar", "Traducir", "Viajar", "Molestar", "Atar", "Probar", "Intentar", "Confiar", "Girar", "Usar", "Unir", "Visitar", "Variar", "Esperar", "Querer", "Caminar", "Lavar", "Observar", "Desear", "Trabajar", "Calentar", "Regar", "Pesar", "Silbar", "Preocuparse", "Herir"];
                    for (i = 0; esRegularVerbs.length > i; i++) {
                        document.getElementById("esRegularVerbs").innerHTML += "<option value='" + i + "'>" + esRegularVerbs[i] + "</option> <br>";
                    }

                </script>
            </select>
        </nav>


        <button id="btnpast" class="accordion">Pasado Simple - Simple Past</button>
        <section class="panel" id="simplePast">
            <table>
                <tr>
                    <th colspan="2" onclick="btnSpeak($(this).children('span').text());"><span>To </span> <i></i></th>
                </tr>
                <tr>
                    <th colspan="2">Pasado simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">I</td>
                    <td rowspan="8" id="tdPast"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast').text());">They</td>
                </tr>
                <tr>

                <tr>
                    <th colspan="2">Pasado simple con el auxiliar did</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">I</td>
                    <td rowspan="8" id="tdPastdd"> did <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdd').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Negación del pasado simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdo').text());">I</td>
                    <td rowspan="2" id="tdPastdo"> do not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdo').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3p').text());">He</td>
                    <td rowspan="3" id="tdPast3p"> does not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3p').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3p').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdo').text());">We</td>
                    <td rowspan="3" id="tdPastdo"> do not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdo').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdo').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Negación contraida del pasado simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdn').text());">I</td>
                    <td rowspan="2" id="tdPastdn"> don't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3pdn').text());">He</td>
                    <td rowspan="3" id="tdPast3pdn"> doesn't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3pdn').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPast3pdn').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdn').text());">We</td>
                    <td rowspan="3" id="tdPastdn"> don't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastdn').text());">They</td>
                </tr>

                <tr>
                    <th colspan="2">Negación contraida del pasado simple con el auxiliar did</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">I</td>
                    <td rowspan="8" id="tdPastddnt"> didn't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastddnt').text());">They</td>
                </tr>

                <tr>
                    <th colspan="2">Interrogantes con el pasado simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Do I</td>
                    <td rowspan="8" id="tdPastintdo"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Do you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Does he</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Does she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Does it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Do we</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Do you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastintdo').text());">Do they</td>
                </tr>

                <tr>
                    <th colspan="2">Interrogantes con el auxiliar did en el pasado simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did I</td>
                    <td rowspan="8" id="tdPastint"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did he</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did we</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPastint').text());">Did they</td>
                </tr>

            </table>
        </section>

      
        <button id="btnparticiple" class="accordion">Pasado Participio - Past Participle</button>
        <section class="panel" id="pastParticiple">
            <table>
                <tr>
                    <th colspan="2" onclick="btnSpeak($(this).children('span').text());"><span>To </span> <i></i></th>
                </tr>
                <tr>
                    <th colspan="2">Pasado participio</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple').text());">I</td>
                    <td rowspan="2" id="tdParticiple"> have <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3p').text());">He</td>
                    <td rowspan="3" id="tdParticiple3p"> has <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3p').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3p').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple').text());">We</td>
                    <td rowspan="3" id="tdParticiple"> have <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple').text());">you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple').text());">They</td>
                </tr>
                <tr>

                <tr>
                    <th colspan="2">Pasado participio</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">I've</td>
                    <td rowspan="8" id="tdParticipledd"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">You've</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">He's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">She's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">It's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">You've</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">We've</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledd').text());">They've</td>
                </tr>
                <tr>
                    <th colspan="2">Negación del pasado participio</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledo').text());">I</td>
                    <td rowspan="2" id="tdParticipledo"> have not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledo').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3phvn').text());">He</td>
                    <td rowspan="3" id="tdParticiple3phvn"> has not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3phvn').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3phvn').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledo').text());">We</td>
                    <td rowspan="3" id="tdParticipledo"> have not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledo').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledo').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Negación contraida del pasado participio</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledn').text());">I</td>
                    <td rowspan="2" id="tdParticipledn"> haven't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3pdn').text());">He</td>
                    <td rowspan="3" id="tdParticiple3pdn"> hasn't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3pdn').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticiple3pdn').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledn').text());">We</td>
                    <td rowspan="3" id="tdParticipledn"> haven't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipledn').text());">They</td>
                </tr>


                <tr>
                    <th colspan="2">Interrogantes con el pasado participio</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Have I</td>
                    <td rowspan="8" id="tdParticipleint"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Have you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Has he</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Has she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Has it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Have we</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Have you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdParticipleint').text());">Have they</td>
                </tr>

            </table>
        </section>


        <button id="btnpresent" class="accordion">Presente Simple - Simple Present</button>
        <section class="panel" id="simplePresent">
            <table>
                <tr>
                    <th colspan="2" onclick="btnSpeak($(this).children('span').text());"><span>To </span> <i></i></th>
                </tr>
                <tr>
                    <th colspan="2">Presente simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent').text());">I</td>
                    <td rowspan="2" id="tdPresent"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent3ra').text());">He</td>
                    <td rowspan="3" id="tdPresent3ra" class="3ra"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent3ra').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent3ra').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent').text());">We</td>
                    <td rowspan="3"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresent').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Negación del presente simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn').text());">I</td>
                    <td rowspan="2" id="tdPresentn"> do not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn3ra').text());">He</td>
                    <td rowspan="3" id="tdPresentn3ra"> does not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn3ra').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn3ra').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn').text());">We</td>
                    <td rowspan="3"> do not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentn').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Contracción del presente simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn').text());">I</td>
                    <td rowspan="2" id="tdPresentdn"> don't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn3ra').text());">He</td>
                    <td rowspan="3" id="tdPresentdn3ra"> doesn't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn3ra').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn3ra').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn').text());">We</td>
                    <td rowspan="3"> don't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentdn').text());">They</td>
                </tr>

                <tr>
                    <th colspan="2">Interrogantes con el presente simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Do I</td>
                    <td rowspan="8" id="thPresentq"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Do you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Does he</td>
                    <!--                    <td rowspan="3" id="thPresentq3ra"> doesn't  <span></span></td>-->
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Does she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Does it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Do we</td>
                    <!--                    <td rowspan="3"> don't <span></span></td>-->
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Do you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentq').text());">Do they</td>
                </tr>
            </table>
        </section>


        <button id="btncontinuo" class="accordion">Presente Continuo - Present Continuous</button>
        <section class="panel" id="presentContinuo">
            <table>
                <tr>
                    <th colspan="2" onclick="btnSpeak($(this).children('span').text());"><span>To </span> <i></i></th>
                </tr>
                <tr>
                    <th colspan="2">Presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo').text());">I</td>
                    <td rowspan="" id="tdPresentContinuo"> am <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo1').text());">You</td>
                    <td rowspan="" id="tdPresentContinuo1"> are <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo3ra').text());">He</td>
                    <td rowspan="3" id="tdPresentContinuo3ra" class="3ra"> is <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo3ra').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo3ra').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo1').text());">We</td>
                    <td rowspan="3"> are <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo1').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo1').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Contracción del presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">I'm</td>
                    <td rowspan="8" id="tdPresentContinuodn"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">You're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">He's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">She's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">It's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">We're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">You're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuodn').text());">They're</td>
                </tr>

                <tr>
                    <th colspan="2">Negación del presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon').text());">I</td>
                    <td id="tdPresentContinuon"> am not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2').text());">You</td>
                    <td id="tdPresentContinuo2"> are not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3ra').text());">He</td>
                    <td rowspan="3" id="tdPresentContinuon3ra"> is not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3ra').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3ra').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2').text());">We</td>
                    <td rowspan="3"> are not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Contracción negativa del presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">I'm</td>
                    <td rowspan="8" id="tdPresentContinuo4"> not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">You're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">He's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">She's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">It's</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">We're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">You're</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo4').text());">They're</td>
                </tr>
                <tr>
                    <th colspan="2">Contracción negativa 2 del presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuonbe').text());">Ain't </td>
                    <td id="tdPresentContinuonbe"> <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2be').text());">You</td>
                    <td id="tdPresentContinuo2be"> aren't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3rabe').text());">He</td>
                    <td rowspan="3" id="tdPresentContinuon3rabe"> isn't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3rabe').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuon3rabe').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2be').text());">We</td>
                    <td rowspan="3"> aren't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2be').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdPresentContinuo2be').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Interrogantes con el presente continuo</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Am I</td>
                    <td rowspan="8" id="thPresentContinuoq"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Are you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Is he</td>
                    <!--                    <td rowspan="3" id="thPresentq3ra"> doesn't  <span></span></td>-->
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Is she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Is it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Are we</td>
                    <!--                    <td rowspan="3"> don't <span></span></td>-->
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Are you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#thPresentContinuoq').text());">Are they</td>
                </tr>
            </table>
        </section>


        <button id="btnfuture" class="accordion">Futuro Simple - Simple Future</button>
        <section class="panel" id="simpleFuture">
            <table>
                <tr>
                    <th colspan="2" onclick="btnSpeak($(this).children('span').text());"><span>To </span> <i></i></th>
                </tr>
                <tr>
                    <th colspan="2">Futuro simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">I</td>
                    <td rowspan="8" id="tdFuture"> will <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuture').text());">They</td>
                </tr>

                <tr>
                    <th colspan="2">Negación del futuro simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">I</td>
                    <td rowspan="8" id="tdFuturent"> will not <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFuturent').text());">They</td>
                </tr>

                <tr>
                    <th colspan="2">Contracción del futuro simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">I</td>
                    <td rowspan="8" id="tdFutureWnt"> won't <span></span></td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">He</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">She</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">It</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">We</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">You</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWnt').text());">They</td>
                </tr>
                <tr>
                    <th colspan="2">Interrogantes con el futuro simple</th>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will I</td>
                    <td rowspan="8" id="tdFutureWll"> <span></span>?</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will he</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will she</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will it</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will we</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will you</td>
                </tr>
                <tr>
                    <td onclick="btnSpeak($(this).text() + $('#tdFutureWll').text());">Will they</td>
                </tr>

            </table>
        </section>
      

    </div>
    <script>
        var verbEN;
        var verbES;
        var enRverbVal;

        function btnSpeak(txt) {
            read(txt, 'en-US', null, 0.5, null);
        }

        $(function() {
            $('.accordion').click(function() {
                $(this).toggleClass("active");
            });

            $('#btnpast').click(function() {
                conjugateSimplePast();
                $('#simplePast').slideToggle();
            });
            $('#btnparticiple').click(function() {
                conjugatePastParticiple();
                $('#pastParticiple').slideToggle();
            });
            $('#btnpresent').click(function() {
                conjugateSimplePresent();
                $('#simplePresent').slideToggle();

            });
            $('#btncontinuo').click(function() {
                conjugatePresentContinuo();
                $('#presentContinuo').slideToggle();

            });
            $('#btnfuture').click(function() {
                conjugateSimpleFuture();
                $('#simpleFuture').slideToggle();

            });

            $('#enRegularVerbs').change(function() {
                conjugateSimplePast();
                conjugateSimplePresent();
                conjugatePresentContinuo();
                conjugateSimpleFuture();
            });

            $('#esRegularVerbs').change(function() {
                $("#enRegularVerbs").val($(this).val());
                conjugateSimplePast();
                conjugateSimplePresent();
                conjugatePresentContinuo()
                conjugateSimpleFuture();
            });
        });

        //FUNCION QUE CONJUGA AL PASADO SIMPLE
        function conjugateSimplePast() {
            enRverbVal = $('#enRegularVerbs').val();
            verbEN = $('#enRegularVerbs option:selected').text();
            $('#esRegularVerbs').val(enRverbVal);
            verbES = $('#esRegularVerbs option:selected').text();

            //AUXILIARES PARA DUPLICAR LA ULTIMA LETRA
            var expLetra = /[qertplkjhgfdszxcvbnm]/;
            var expVocal = /[aeiou]/;
            var subLetra = verbEN.charAt(verbEN.length - 3);
            var vocal = verbEN.charAt(verbEN.length - 2);
            var letra = verbEN.charAt(verbEN.length - 1);
            //formateo las cadenas antes de compararlas
            verbEN = verbEN.toLowerCase();
            verbEN = verbEN.trim();

            var pasado;
            var duplicar = "stop sin clap program hug tap refer admit debug workship kidnap plan beg drop";

            if (duplicar.includes(verbEN)) {
                let letter = verbEN.charAt(verbEN.length - 1);
                pasado = verbEN + letter + "ed";
            } else if (verbEN.endsWith("e")) {
                pasado = verbEN + "d";
            } else if (verbEN.endsWith("y")) {
                if (verbEN.endsWith("ay") || verbEN.endsWith("ey") || verbEN.endsWith("iy") || verbEN.endsWith("oy") || verbEN.endsWith("uy")) {
                    pasado = verbEN + "ed";
                } else {
                    pasado = verbEN.slice(0, -1) + "ied";
                }
            } else if (verbEN.endsWith("c")) {
                if (verbEN.endsWith("ac") || verbEN.endsWith("ec") || verbEN.endsWith("ic") || verbEN.endsWith("oc") || verbEN.endsWith("uc")) {
                    pasado = verbEN + "ked";
                } else {
                    pasado = verbEN + "ed";
                }
            } else if (verbEN.length <= 4) {
                if (subLetra.match(expLetra)) {
                    if (vocal.match(expVocal)) {
                        if (letra.match(expLetra)) {
                            let letter = verbEN.charAt(verbEN.length - 1);
                            pasado = verbEN + letter + "ed";
                        } else {
                            pasado = verbEN + "ed";
                        }
                    } else {
                        pasado = verbEN + "ed";
                    }
                } else {
                    pasado = verbEN + "ed";
                }

            } else {
                pasado = verbEN + "ed";
            }
            
            $('#simplePast th span').text("To " + verbEN);
            $('#simplePast th i').text(" - " + verbES);

            $('#simplePast td span').text(pasado);
            $('#simplePast #tdPastdd span').text(verbEN);
            $('#simplePast #tdPastint span').text(verbEN);
            $('#simplePast #tdPastddnt span').text(verbEN);
        }

        //FUNCION QUE CONJUGA AL PASADO SIMPLE
        function conjugatePastParticiple() {
            enRverbVal = $('#enRegularVerbs').val();
            verbEN = $('#enRegularVerbs option:selected').text();
            $('#esRegularVerbs').val(enRverbVal);
            verbES = $('#esRegularVerbs option:selected').text();

            //AUXILIARES PARA DUPLICAR LA ULTIMA LETRA
            var expLetra = /[qertplkjhgfdszxcvbnm]/;
            var expVocal = /[aeiou]/;
            var subLetra = verbEN.charAt(verbEN.length - 3);
            var vocal = verbEN.charAt(verbEN.length - 2);
            var letra = verbEN.charAt(verbEN.length - 1);
            //formateo las cadenas antes de compararlas
            verbEN = verbEN.toLowerCase();
            verbEN = verbEN.trim();

            var pasado;
            var duplicar = "stop sin clap program hug tap refer admit debug workship kidnap plan beg drop";

            if (duplicar.includes(verbEN)) {
                let letter = verbEN.charAt(verbEN.length - 1);
                pasado = verbEN + letter + "ed";
            } else if (verbEN.endsWith("e")) {
                pasado = verbEN + "d";
            } else if (verbEN.endsWith("y")) {
                if (verbEN.endsWith("ay") || verbEN.endsWith("ey") || verbEN.endsWith("iy") || verbEN.endsWith("oy") || verbEN.endsWith("uy")) {
                    pasado = verbEN + "ed";
                } else {
                    pasado = verbEN.slice(0, -1) + "ied";
                }
            } else if (verbEN.endsWith("c")) {
                if (verbEN.endsWith("ac") || verbEN.endsWith("ec") || verbEN.endsWith("ic") || verbEN.endsWith("oc") || verbEN.endsWith("uc")) {
                    pasado = verbEN + "ked";
                } else {
                    pasado = verbEN + "ed";
                }
            } else if (verbEN.length <= 4) {
                if (subLetra.match(expLetra)) {
                    if (vocal.match(expVocal)) {
                        if (letra.match(expLetra)) {
                            let letter = verbEN.charAt(verbEN.length - 1);
                            pasado = verbEN + letter + "ed";
                        } else {
                            pasado = verbEN + "ed";
                        }
                    } else {
                        pasado = verbEN + "ed";
                    }
                } else {
                    pasado = verbEN + "ed";
                }

            } else {
                pasado = verbEN + "ed";
            }
            
            $('#pastParticiple th span').text("To " + verbEN);
            $('#pastParticiple th i').text(" - " + verbES);

            $('#pastParticiple td span').text(pasado);
//            $('#pastParticiple #tdParticiple3p span').text(verbEN);
//            $('#pastParticiple #tdPastint span').text(verbEN);
        } 

        //FUNCION QUE CONJUGA AL PRESENTE SIMPLE
        function conjugateSimplePresent() {
            enRverbVal = $('#enRegularVerbs').val();
            verbEN = $('#enRegularVerbs option:selected').text();
            $('#esRegularVerbs').val(enRverbVal);
            verbES = $('#esRegularVerbs option:selected').text();

            verbEN = verbEN.toLowerCase();
            verbEN = verbEN.trim();

            var presenteSimple3p;
            var duplicar = "quiz";

            if (duplicar.includes(verbEN)) {
                let letter = verbEN.charAt(verbEN.length - 1);
                presenteSimple3p = verbEN + letter + "es";
            } else if (verbEN.endsWith("e")) {
                presenteSimple3p = verbEN + "s";
            } else if (verbEN.endsWith("y")) {
                if (verbEN.endsWith("ay") || verbEN.endsWith("ey") || verbEN.endsWith("iy") || verbEN.endsWith("oy") || verbEN.endsWith("uy")) {
                    presenteSimple3p = verbEN + "s";
                } else {
                    presenteSimple3p = verbEN.slice(0, -1) + "ies";
                }
            } else if (verbEN.endsWith("o") || verbEN.endsWith("s") || verbEN.endsWith("z") || verbEN.endsWith("sh") || verbEN.endsWith("ch") || verbEN.endsWith("x")) {
                presenteSimple3p = verbEN + "es";

            } else {
                presenteSimple3p = verbEN + "s";
            }

            $('#simplePresent th span').text("To " + verbEN);
            $('#simplePresent th i').text(" - " + verbES);
            $('#simplePresent td span').text(verbEN);
            $('#simplePresent td.3ra span').text(presenteSimple3p);
        }
        //FUNCION QUE CONJUGA AL PRESENTE CONTINUO*****************
        function conjugatePresentContinuo() {
            enRverbVal = $('#enRegularVerbs').val();
            verbEN = $('#enRegularVerbs option:selected').text();
            $('#esRegularVerbs').val(enRverbVal);
            verbES = $('#esRegularVerbs option:selected').text();


            //AUXILIARES PARA DUPLICAR LA ULTIMA LETRA
            var expLetra = /[qertplkjhgfdszxcvbnm]/;
            var expVocal = /[aeiou]/;
            var subLetra = verbEN.charAt(verbEN.length - 3);
            var vocal = verbEN.charAt(verbEN.length - 2);
            var letra = verbEN.charAt(verbEN.length - 1);
            //formateo las cadenas antes de compararlas
            verbEN = verbEN.toLowerCase();
            verbEN = verbEN.trim();

            var presenteContinuo;
            //                var duplicar = "be want need know prefer remember understand care see hear smell believe belong cost seem exist own like dislike love hate fear envy mind imagine suppose doubt assume hate hope";

            //                if (duplicar.includes(verbEN)) {
            //                    presenteContinuo = verbEN;
            //                } else 
            if (verbEN.endsWith("ie")) {
                presenteContinuo = verbEN.slice(0, -2) + "ying";
            } else if (verbEN.endsWith("e")) {
                presenteContinuo = verbEN.slice(0, -1) + "ing";
            } else if (verbEN.endsWith("s") || verbEN.endsWith("z") || verbEN.endsWith("sh") || verbEN.endsWith("ch") || verbEN.endsWith("x")) {
                presenteContinuo = verbEN + "ing";
            } else if (verbEN.length <= 4) {
                if (subLetra.match(expLetra)) {
                    if (vocal.match(expVocal)) {
                        if (letra.match(expLetra)) {
                            let letter = verbEN.charAt(verbEN.length - 1);
                            presenteContinuo = verbEN + letter + "ing";
                        } else {
                            presenteContinuo = verbEN + "ing";
                        }
                    } else {
                        presenteContinuo = verbEN + "ing";
                    }
                } else {
                    presenteContinuo = verbEN + "ing";
                }

            } else {
                presenteContinuo = verbEN + "ing";
            }

            $('#presentContinuo th span').text("To " + verbEN);
            $('#presentContinuo th i').text(" - " + verbES);
            $('#presentContinuo td span').text(presenteContinuo);

        }


        //FUNCION QUE CONJUGA AL FUTURE SIMPLE
        function conjugateSimpleFuture() {
            enRverbVal = $('#enRegularVerbs').val();
            verbEN = $('#enRegularVerbs option:selected').text();
            $('#esRegularVerbs').val(enRverbVal);
            verbES = $('#esRegularVerbs option:selected').text();

            //formateo las cadenas antes de compararlas
            verbEN = verbEN.toLowerCase();
            verbEN = verbEN.trim();

            $('#simpleFuture th span').text("To " + verbEN);
            $('#simpleFuture th i').text(" - " + verbES);
            $('#simpleFuture td span').text(verbEN);
        }

    </script>
    <?php include("footer.php"); include("options.php"); ?>
</body>

</html>
