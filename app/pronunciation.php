 <style>
        #txtselected {
            display: none
        }
    </style>

    <div class="fixed">
        <h3>How good is your pronunciation?</h3>
        <hr>
        <button lang="en" translate="no" class="icon-mic" id="btnSpeak"> Speak</button>
         <font color="red" id="txtinfo">Pronuncia en inglés, la opción seleccionada:</font>
        <hr>
        <div id="txtrecord"></div> 
        <div id="txtselected"></div>

        <b id='txtmnsj'><font size="+2"></font> <i></i> </b>
    </div>

    <div class="body">
        <?php  
         $nivel=1;
        if(isset($_SESSION['idstudent'])){
            $nivel=$_SESSION['idstudent'];
        }
        
        include("../adm/connection.php"); 
        $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost 
        WHERE english != '--' AND level=$nivel ORDER BY RAND() LIMIT 5");  
       
        if(mysqli_num_rows($res) > 0){ ?>
        <form class="conten">
            <h2><span class="icon-refresh" onclick="$('#main').load('pronunciation.php');" style="cursor:pointer;color:dodgerblue"> </span> Vocabulary:</h2>
            <?php while($fila=mysqli_fetch_array($res)){ ?>
            <div>
                <p class="tooltip">
                    <input type="radio" name="radio" onclick="typeAloud($(this).parent());$('#btnSpeak').click();">
                    <span onclick="read($(this).text(),'en-US',null,0.5,null);">
                        <?php echo str_replace("--","",$fila['english']); ?>
                    </span>
                    <span class="tooltiptext icon-sound"></span>
                </p>
                <i><?php echo str_replace("--","",$fila['spanish']); ?></i>
            </div>
            <?php } ?>
        </form>
        <?php } ?>
    </div>
      
    
    <script>
        function typeAloud(tag) {
            $('#txtselected').text(tag.text());
            $('#txtrecord').text("");
        }

        //FUNCION QUE CALCULA LAS RESPUESTAS
        function compare() {
            let answer = $('#txtrecord').text();
            let text = $('#txtselected').text();

            //formateo las cadenas antes de compararlas
            text = text.toLowerCase();
            text = text.trim();
            answer = answer.toLowerCase();
            answer = answer.trim();
            if (text == "") {
                $('#txtinfo').text("Seleccione una opción!");
            }else if (answer == "") {
                $('#txtinfo').text("No escuche. Hable en voz alta!");            
            } else {
                //ARRAY QUE CON LOS MENSAJES A MOSTRAR
                var well = ["Very well!", "Good job", "Great!", "You sound like a native!", "You got it good!"];
                var between = ["Good, but not perfect!", "More or less!", "It's almost the same!", "You can do it better!", "You almost get it!"];
                var badly = ["Try again!", "Sorry, it's not the same!", "Try harder!", "Oh oh! You're wrong!", "You need to work your ponunciation!"];
                var info = "";
                var postn = Math.floor(Math.random() * 5);
                if (text == answer) {
                    read(answer,'en-US',null,0.5,null);
                    info = well[postn];
                    $('#txtmnsj font').removeClass(' icon-sad icon-star3');
                    $('#txtmnsj font').addClass(' icon-happy');
                    $('#txtmnsj font').attr('color', 'darkgreen');
                } else if (text.includes(answer)) {
                    info = between[postn];
                    navigator.vibrate(100);
                    $('#txtmnsj font').removeClass(' icon-sad icon-happy');
                    $('#txtmnsj font').addClass(' icon-star3');
                    $('#txtmnsj font').attr('color', 'darkorange');
                } else {
                    info = badly[postn];
                    navigator.vibrate(500);
                    $('#txtmnsj font').removeClass(' icon-happy icon-star3');
                    $('#txtmnsj font').addClass(' icon-sad');
                    $('#txtmnsj font').attr('color', 'red');
                }
                $('#txtmnsj i').text(info);
            }
        }

        //################### ZONA DE SPEAK ALOUD########################
        var rec;
        if (!("webkitSpeechRecognition" in window)) {
            alert("API no soportada!");
        } else {
            rec = new(window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
            rec.lang = 'en-US';
            rec.continuous = true;
            //rec.interim=true; //no escribe en tiempo real
            rec.interimResults = true; // escribe en tiempo real
            rec.addEventListener("result", iniciar);
        }

        function iniciar(event) {
            for (i = event.resultIndex; i < event.results.length; i++) {
                document.getElementById("txtrecord").innerHTML = event.results[i][0].transcript;
            }
        }

        rec.onend = function() {
            $('#txtinfo').text('Voice recognition disabled!');
            $('#btnSpeak').text('Speak');
            compare();
        }

        rec.onerror = function(event) {
            $('#txtinfo').text("error");
            if (event.error == 'no-speech') {
                $('#txtinfo').text('No speech was detected. Try again.');
            }
        }

        //boton que ejecuta el microfono
        $('#btnSpeak').click(function() {
            if ($(this).text() == 'Speak') {
                rec.start();
                $(this).text('Stop');
                $("#txtinfo").text('Escuchando...');
            } else {
                rec.stop();
                $(this).text('Speak');
                compare();
            }
        });

    </script>