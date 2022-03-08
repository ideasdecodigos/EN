 
    <style>
     
        #txtrecord{ 
        background: white;
        min-height: 40px;
            margin: 5px 0;
            padding: 5px
        } 
        .body { 
            margin-top: 90px;
            padding: 0 5%;
        }

        #txtselected {
            display: none
        }


    </style>

    <div class="fixed">
        <h3>How good is your writing?</h3>
        <hr>
        <button class="icon-lang" id="btnSpeak" onclick="compare();"> Verificar</button>
        <font color="red" id="txtinfo">Seleccione una opción y traduzcala en el espacio en blanco:</font>
        <hr>
        <div id="txtrecord" contenteditable="true" spellcheck="true"></div>
        <div id="txtselected"></div>

         <b id='txtmnsj'> <font size="+1.5" ></font>  </b>
</div>


    <div class="body">
        <?php  
         $nivel=1;
        if(isset($_SESSION['idstudent'])){
            $nivel=$_SESSION['idstudent'];
        }
        
        include("../adm/connection.php"); 
        $res = mysqli_query($con, "SELECT english,spanish FROM contents RIGHT JOIN subcontents ON contents.idcontent=subcontents.idpost 
        WHERE english != '--' AND level=$nivel ORDER BY RAND() LIMIT 10");  
       
        if(mysqli_num_rows($res) > 0){ ?>
        <form class="conten">
            <h2><span class="icon-refresh" onclick="$('#main').load('writing.php');" style="cursor:pointer;color:dodgerblue"> </span> Vocabulary:</h2>
            <?php while($fila=mysqli_fetch_array($res)){  ?>
            <div>
                <span>
                    <input type="radio" name="radio" onclick="typeAloud($(this).parent());$('#txtrecord').focus();">
                    <span style="display:none">
                        <?php echo $fila['english']; ?>
                    </span>
                    
                </span>
                <font class="tooltip" onclick="speak('<?php echo str_replace("--","",$fila['english']); ?>');"> 
                    <?php echo str_replace("--","",$fila['spanish']); ?> 
                     <span class="tooltiptext">Listen</span>
                </font>
            </div>
            <?php } ?>
        </form>
        <?php } ?>
    </div>
    
    <script> 
        var times;
        function speak(txt) {
            clearTimeout(times);
            read(txt, 'en-US', null, null, null);
            times = setTimeout(function() {
                read(txt, 'en-US', null, 0.3, null)
            }, 3000);
        }

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
                $('#txtinfo').text("Selecciona una opción!");
                navigator.vibrate(500);
            } else if (answer == "") {
                $('#txtinfo').text("Traduzca al inglés la opción seleccionada!");
                $('#txtrecord').focus();
                navigator.vibrate(500);
            } else {
                //ARRAY QUE CON LOS MENSAJES A MOSTRAR
                var well = ["Very well!", "Good job!", "Great!", "Excellent!", "You got it good!"];
                var between = ["Good, but not perfect!", "More or less!", "It's almost the same!", "You can do it better!", "You almost get it!"];
                var badly = ["Try again!", "Sorry, it's not the same!", "Try harder!", "Oh oh! You're wrong!", "Not match!"];
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
                $('#txtmnsj font').text(" "+info);
            }
        }
    </script>
