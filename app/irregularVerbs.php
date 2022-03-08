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
    <title>irregular-verbs</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/courses.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body>
    <?php include("menu.php"); ?>

    <script>
        var verbsPresent = ["arise ", "awake ", "bear ", "beat ", "become ", "begin ", "bend ", "bet ", "bid ", "bind ", "bite ", "bleed ", "blow ", "break ", "breed ", "bring ", "build ", "burn ", "burst ", "buy ", "cast ", "catch ", "choose ", "cling ", "come ", "cost ", "creep ", "cut ", "deal ", "dig ", "do ", "draw ", "dream ", "drink ", "drive ", "eat ", "fall ", "feed ", "feel ", "fight ", "find ", "flee ", "fly ", "forbid ", "forget ", "forgive ", "freeze ", "get ", "give ", "go ", "grind ", "grow ", "hang ", "have ", "hear ", "hide ", "hit ", "hold ", "hurt ", "keep ", "kneel ", "know ", "lay ", "lead ", "lean ", "leap ", "learn ", "leave ", "lend ", "let ", "lie ", "light ", "lose ", "make ", "mean ", "meet ", "overcome ", "pay ", "put ", "read ", "ride ", "ring ", "rise ", "run ", "saw ", "say ", "see ", "seek ", "sell ", "send ", "set ", "sew ", "shake ", "shear ", "shine ", "shoot ", "show ", "shrink ", "shut ", "sing ", "sink ", "sit ", "sleep ", "slide ", "smell ", "sow ", "speak ", "speed ", "spell ", "spend ", "spill ", "spit ", "split ", "spoil ", "spread ", "stand ", "steal ", "stick ", "sting ", "stink ", "strike ", "strive ", "swear ", "sweep ", "swim ", "swing ", "take ", "teach ", "tear ", "tell ", "think ", "throw ", "tread ", "undergo ", "understand ", "upset ", "wake ", "wear ", "weave ", "weep ", "win ", "wind ", "withdraw ", "wring ", "write"];

        var verbsPast = ["arose ", "awoke ", "bore ", "beat ", "became ", "began ", "bent ", "bet ", "bid ", "bound ", "bit ", "bled ", "blew ", "broke ", "bred ", "brought ", "built ", "burnt ", "burst ", "bought ", "cast ", "caught ", "chose ", "clung ", "came ", "cost ", "crept ", "cut ", "dealt ", "dug ", "did ", "drew ", "dreamt ", "drank ", "drove ", "ate ", "fell ", "fed ", "felt ", "fought ", "found ", "fled ", "flew ", "forbade ", "forgot ", "forgave ", "froze ", "got ", "gave ", "went ", "ground ", "grew ", "hung ", "had ", "heard ", "hid ", "hit ", "held ", "hurt ", "kept ", "knelt ", "knew ", "laid ", "led ", "leant ", "leapt ", "learnt ", "left ", "lent ", "let ", "lay ", "lit ", "lost ", "made ", "meant ", "met ", "overcame ", "paid ", "put ", "read ", "rode ", "rang ", "rose ", "ran ", "sawed ", "said ", "saw ", "sought ", "sold ", "sent ", "set ", "sewed ", "shook ", "sheared ", "shone ", "shot ", "showed ", "shrank ", "shut ", "sang ", "sank ", "sat ", "slept ", "slid ", "smelt ", "sowed ", "spoke ", "sped ", "spelt ", "spent ", "spilt ", "spat ", "split ", "spoilt ", "spread ", "stood ", "stole ", "stuck ", "stung ", "stank ", "struck ", "strove ", "swore ", "swept ", "swam ", "swung ", "took ", "taught ", "tore ", "told ", "thought ", "threw ", "trod ", "underwent ", "understood ", "upset ", "woke ", "wore ", "wove ", "wept ", "won ", "wound ", "withdrew ", "wrung ", "wrote"];

        var verbsParticiple = ["arisen ", "awoken ", "borne ", "beaten ", "become ", "begun ", "bent ", "bet ", "bid ", "bound ", "bitten ", "bled ", "blown ", "broken ", "bred ", "brought ", "built ", "burnt ", "burst ", "bought ", "cast ", "caught ", "chosen ", "clung ", "come ", "cost ", "crept ", "cut ", "dealt ", "dug ", "done ", "drawn ", "dreamt ", "drunk ", "driven ", "eaten ", "fallen ", "fed ", "felt ", "fought ", "found ", "fled ", "flown ", "forbidden ", "forgotten ", "forgiven ", "frozen ", "got ", "given ", "gone ", "ground ", "grown ", "hung ", "had ", "heard ", "hidden ", "hit ", "held ", "hurt ", "kept ", "knelt ", "known ", "laid ", "led ", "leant ", "leapt ", "learnt ", "left ", "lent ", "let ", "lain ", "lit ", "lost ", "made ", "meant ", "met ", "overcome ", "paid ", "put ", "read ", "ridden ", "rung ", "risen ", "run ", "sawn ", "said ", "seen ", "sought ", "sold ", "sent ", "set ", "sewn ", "shaken ", "shorn ", "shone ", "shot ", "shown ", "shrunk ", "shut ", "sung ", "sunk ", "sat ", "slept ", "slid ", "smelt ", "sown ", "spoken ", "sped ", "spelt ", "spent ", "spilt ", "spat ", "split ", "spoilt ", "spread ", "stood ", "stolen ", "stuck ", "stung ", "stunk ", "struck ", "striven ", "sworn ", "swept ", "swum ", "swung ", "taken ", "taught ", "torn ", "told ", "thought ", "thrown ", "trodden ", "undergone ", "understood ", "upset ", "woken ", "worn ", "woven ", "wept ", "won ", "wound ", "withdrawn ", "wrung ", "written"];

        var verbsSpanish = ["surgir ", "despertar(se) ", "soportar ", "golpear ", "convertirse en ", "empezar ", "doblar(se) ", "apostar ", "pujar ", "encuadernar ", "morder ", "sangrar ", "soplar ", "romper ", "criar ", "traer ", "construir ", "quemar(se) ", "estallar ", "comprar ", "tirar ", "coger ", "elegir ", "aferrarse ", "venir ", "costar ", "arrastrar ", "cortar ", "tratar ", "cavar ", "hacer ", "dibujar ", "soñar ", "beber ", "conducir ", "comer ", "caer(se) ", "alimentar ", "sentirse ", "pelearse ", "encontrar ", "huir ", "volar ", "prohibir ", "olvidar(se) ", "perdonar ", "helar(se) ", "conseguir ", "dar ", "irse ", "moler ", "crecer ", "colgar ", "haber, tener ", "escuchar ", "esconder(se) ", "golpear ", "agarrar(se) ", "hacer daño ", "guardar ", "arrodillarse ", "saber, conocer ", "poner ", "llevar ", "apoyarse ", "brincar ", "aprender ", "dejar ", "prestar ", "permitir ", "echarse ", "encender(se) ", "perder ", "hacer ", "significar ", "encontrar(se) ", "vencer ", "pagar ", "poner ", "leer ", "montar ", "sonar ", "levantarse ", "correr ", "serrar ", "decir ", "ver ", "buscar ", "vender(se) ", "enviar ", "poner ", "coser ", "agitar ", "esquilar ", "brillar ", "disparar ", "mostrar ", "encoger(se) ", "cerrar(se) ", "cantar ", "hundir(se) ", "sentar(se) ", "dormir ", "resbalar ", "oler ", "sembrar ", "hablar ", "acelerar ", "deletrear ", "pasar, gastar ", "derramar ", "escupir ", "hender ", "estropear(se) ", "extender(se) ", "estar de pie ", "robar ", "pegar(se) ", "picar ", "apestar ", "golpear ", "esforzarse ", "jurar ", "barrer ", "nadar ", "balancear(se) ", "tomar(se) ", "enseñar ", "romper(se) ", "contar, decir ", "pensar ", "lanzar ", "pisar ", "sufrir ", "entender ", "afligir ", "despertar(se) ", "llevar (puesto) ", "tejer ", "llorar ", "ganar ", "enrollar ", "retirar(se) ", "torcer ", "escribir"];

    </script>

    <div>

        <h2>Verbos irregulares - irregular Verbs</h2>
        <button class="accordion" onclick="$('#nv0').slideToggle();">Introducción</button>
        <section class="panel" id="nv0">
            <button class="icon-sound" onclick="read($('#nv0').text(),'es-ES', null,0.5, null);"> </button>
            <button class="icon-volumedown" onclick="pause();"> </button>
            <button class="icon-volumeup" onclick="resume();"> </button>
            <button class="icon-mute" onclick="stop();"> </button>
            <p>
            Los verbos irregulares, como su nombre lo indica, no siguen ninguna norma para formar el pasado simple o el pasado participio, aunque en el presente se comportan como verbos regulares. Estos son los que no forman su pasado simple o pasado participio añadiendo -ed al final de su estructura, es decir, que hay algunos verbos irregulares que no varían en ninguno de los tiempos o su estructura puede ser totalmente diferente en todos los tiempos (infinitivo, pasado simple y pasado participio).</p>
            
            <p>Aunque estos verbos en inglés parezcan complicados, son mucho más sencillos que los verbos en español, y son imprescindibles para comunicarte en inglés, ya que muchos de ellos son de lo más utilizado en la comunicación inglesa.  </p> 
            
            <p>Para saber más sobre la estructura gramatical de los verbos irregulares en inglés, visita los siguientes enlaces:</p>
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
            <select id="verbsPresent" title="Inglés">
                <script>
                    for (i = 0; verbsPresent.length > i; i++) {
                        document.getElementById("verbsPresent").innerHTML += "<option value='" + i + "'>" + verbsPresent[i] + "</option> <br>";
                    }

                </script>
            </select>
            <select id="verbsSpanish" title="Español">
                <script>
                    for (i = 0; verbsSpanish.length > i; i++) {
                        document.getElementById("verbsSpanish").innerHTML += "<option value='" + i + "'>" + verbsSpanish[i] + "</option> <br>";
                    }

                </script>
            </select>
            <select id="verbsPast" title="Pasado Simple" style="display:none">
                <script>
                    for (i = 0; verbsPast.length > i; i++) {
                        document.getElementById("verbsPast").innerHTML += "<option value='" + i + "'>" + verbsPast[i] + "</option> <br>";
                    }

                </script>
            </select>
            <select id="verbsParticiple" title="Pasado Participio" style="display:none">
                <script>
                    for (i = 0; verbsParticiple.length > i; i++) {
                        document.getElementById("verbsParticiple").innerHTML += "<option value='" + i + "'>" + verbsParticiple[i] + "</option> <br>";
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



        <button id="btnPresent" class="accordion">Presente Simple - Simple Present</button>
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


        <button id="btnPresentContinuo" class="accordion">Presente Continuo - Present Continuous</button>
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

        var time;

        function btnSpeak(txt) {
            //            clearTimeout(time);
            read(txt, 'en-US', null, 0.5, null);
            //            time = setTimeout(function() {
            //                read(txt, 'en-US', null, 0.2, null)
            //            }, 3000);
        }

        $(function() {
            $('.accordion').click(function() {
                $(this).toggleClass("active");
            });

            $('select').change(function() {
                indexSelect = $(this).val();
                $('select').val(indexSelect);
                conjugateSimplePast();
                conjugatePastParticiple();
                conjugateSimplePresent();
                conjugatePresentContinuo();
                conjugateSimpleFuture();
            });

            $('#btnpast').click(function() {
                conjugateSimplePast();
                $('#simplePast').slideToggle();
            });
            $('#btnparticiple').click(function() {
                conjugatePastParticiple();
                $('#pastParticiple').slideToggle();
            });
            $('#btnPresent').click(function() {
                conjugateSimplePresent();
                $('#simplePresent').slideToggle();

            });
            $('#btnPresentContinuo').click(function() {
                conjugatePresentContinuo();
                $('#presentContinuo').slideToggle();

            });
            $('#btnfuture').click(function() {
                conjugateSimpleFuture();
                $('#simpleFuture').slideToggle();

            });

        });

        //FUNCION QUE CONJUGA AL PASADO SIMPLE
        function conjugateSimplePast() {
            $('#simplePast th span').text("To " + $('#verbsPresent option:selected').text());
            $('#simplePast th i').text(" - " + $('#verbsSpanish option:selected').text());

            $('#tdPast span').text($('#verbsPast option:selected').text());
            $('#tdPastdd span').text($('#verbsPresent option:selected').text());
            $('#tdPast3p span').text($('#verbsPast option:selected').text());
            $('#tdPastdo span').text($('#verbsPast option:selected').text());
            $('#tdPast3pdn span').text($('#verbsPast option:selected').text());
            $('#tdPastdn span').text($('#verbsPast option:selected').text());
            $('#tdPastddnt span').text($('#verbsPresent option:selected').text());
            $('#tdPastintdo span').text($('#verbsPast option:selected').text());
            $('#tdPastint span').text($('#verbsPresent option:selected').text());

            //            $('#tdParticiple span').text($('#verbsParticiple option:selected').text());
        }

        //FUNCION QUE CONJUGA AL PASADO PARTICIPLE
        function conjugatePastParticiple() {
            $('#pastParticiple th span').text("To " + $('#verbsPresent option:selected').text());
            $('#pastParticiple th i').text(" - " + $('#verbsSpanish option:selected').text());

            $('#tdParticiple span,#tdParticipleint span,#tdParticiple3phvn span').text($('#verbsParticiple option:selected').text());
            $('#tdParticipledd span').text($('#verbsParticiple option:selected').text());
            $('#tdParticiple3p span').text($('#verbsParticiple option:selected').text());
            $('#tdParticipledo span').text($('#verbsParticiple option:selected').text());
            $('#tdParticiple3pdn span').text($('#verbsParticiple option:selected').text());
            $('#tdParticipledn span').text($('#verbsParticiple option:selected').text());
        }

        //FUNCION QUE CONJUGA AL PRESENTE SIMPLE
        function conjugateSimplePresent() {
            enRverbVal = $('#verbsPresent').val();
            verbEN = $('#verbsPresent option:selected').text();
            $('#verbsSpanish').val(enRverbVal);
            verbES = $('#verbsSpanish option:selected').text();

            if (!verbEN.empty) {
                //formateo las cadenas antes de compararlas
                verbEN = verbEN.toLowerCase();
                verbEN = verbEN.trim();

                var presenteSimple3p;
                var duplicar = "quiz";

                if (verbEN == "have") {
                    presenteSimple3p = "has";
                } else if (duplicar.includes(verbEN)) {
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

            } else {
                $('#irregularVerbsPresent').focus();
            }
        }

        //FUNCION QUE CONJUGA AL PRESENTE CONTINUO*****************
        function conjugatePresentContinuo() {
            enRverbVal = $('#verbsPresent').val();
            verbEN = $('#verbsPresent option:selected').text();
            $('#verbsSpanish').val(enRverbVal);
            verbES = $('#verbsSpanish option:selected').text();

            if (!verbEN.empty) {
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

            } else {
                $('#irregularVerbsPresent').focus();
            }
        }


        //FUNCION QUE CONJUGA AL FUTURE SIMPLE
        function conjugateSimpleFuture() {
            enRverbVal = $('#verbsPresent').val();
            verbEN = $('#verbsPresent option:selected').text();
            $('#verbsSpanish').val(enRverbVal);
            verbES = $('#verbsSpanish option:selected').text();

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
