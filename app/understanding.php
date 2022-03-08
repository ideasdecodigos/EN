<style>
    #txtselected,
    #txtrecord {
        display: none
    }

</style>

<div class="fixed">
    <h3>How good is your understanding?</h3>
    <hr>
    <button class="icon-soundalt" id="listnng"> Escuchar</button>
    <font color="red" id="txtinfo">Escucha y selecciona la traducción correcta:</font>
    <hr>
    <div id="txtrecord"></div>
    <div id="txtselected"></div>

    <b id='txtmnsj'>
        <font size="+1.5" ></font>
         <br> <i></i>
    </b>
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
    <form>
        <script>
            var listening = [];
            var i = 0;
        </script>
        <h2><span class="icon-refresh" onclick="$('#main').load('understanding.php');" style="cursor:pointer;color:dodgerblue"> </span> Vocabulary:</h2>
        <?php while($fila=mysqli_fetch_array($res)){  ?>
        <div>
            <span class="tooltip">
                <input type="radio" name="radio" onclick="typeAloud($(this).parent()); compare();">
                <span style="display:none">
                    <?php echo str_replace("--","",$fila['english']); ?>
                </span>

            </span>
            <font class="tooltip"> <?php echo str_replace("--","",$fila['spanish']); ?>
                <span class="tooltiptext">Selecciona la traducción de lo que escuchas</span>
            </font>
            <!-- EL SIGUIENTE SCRIPT LLENA EL ARRAY CON LA PALABRA A ESCUCHAR-->
            <script>
                listening[i] = "<?php echo $fila['english']; ?>";
                i++;
            </script>
        </div>
        <?php } ?> 
    </form>
    <?php } ?>
</div>


<script>

    var times;
    var postn;
    $('#listnng').click(function() {
        clearTimeout(times);
        postn = Math.floor(Math.random() * 10);
        read(listening[postn], 'en-US', null, 0.5, null);
        times = setTimeout(function() {
            read(listening[postn], 'en-US', null, 0.3, null)
        }, 3000);
        $('#txtrecord').text(listening[postn]);
    });

    function typeAloud(tag) {
        $('#txtselected').text(tag.text());
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
        if (answer == "") {
            $('#txtinfo').text("Primero escucha, y luego selecciona!");
        } else if (text == "") {
            $('#txtinfo').text("Selecciona una opción!");
        } else {
            //ARRAY QUE CON LOS MENSAJES A MOSTRAR
            var well = ["Very well!", "Good job!", "Great!", "You understanding is good!", "You got it!"];
            var badly = ["Try again!", "Sorry, it's not the same!", "Try harder!", "Oh oh! You're wrong!", "Not match!"];
            var info = "";
            var postn = Math.floor(Math.random() * 5);
            if (text == answer) {
                $('#txtmnsj i').text(answer);
                read(answer,'en-US',null,0.5,null);
                info = well[postn];
                $('#txtmnsj font').removeClass(' icon-sad icon-star3');
                $('#txtmnsj font').addClass(' icon-happy');
                $('#txtmnsj font').attr('color', 'darkgreen');
            } else {
                $('#txtmnsj i').text("");
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
