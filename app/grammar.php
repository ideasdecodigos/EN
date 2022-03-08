<div class="fixed">

    <form method="post" id="formMatch">
        <button type="button" class="icon-confi" onclick="tool();"></button>
        <button type="reset" class="icon-refresh"></button>
        <select name="newLimite" id="limite">
            <option value="" selected>Limite</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
            <option value="35">35</option>
            <option value="50">50</option>
        </select>
        <select name="newTema" id="tema">
           <option value="" selected>Temas</option>
            <?php //MUESTRA LOS POST RECIENTES 
                include("../adm/connection.php");    
                $res = mysqli_query($con, "SELECT * FROM contents WHERE type='vocabulary' OR type='expressions' ORDER BY idcontent DESC");                
                if(mysqli_num_rows($res) > 0){
                    while($fila=mysqli_fetch_array($res)){ ?>
            <option value="<?php echo $fila['idcontent'];?>"><?php echo "Nivel-".$fila['level'].": ".$fila['topic'];?></option>
            <?php } 
                } ?>
        </select>
        <button type="submit" name="submit" class="icon-random"></button>
        <button type="button" class="icon-views" onclick="resultados();"></button>
<!--
        <input type="checkbox" id="inputes" checked style="display:non">
        <input type="checkbox" id="inputen" checked style="display:non">
-->
    </form>
</div>

<!-- MUESTRA LOS DATOS DEL ARCHIVO MATCH EN ADM-->
<div id="listas" class="body"></div>



<script>
function tool(){
 Swal.fire({
    icon:'info',
     title:'Herramientas',
     html:"<input type='checkbox' onchange='$(inputes).attr(checked,false);' checked>Silenciar palabras en Español.<br><input type='checkbox' id='inputen' checked>Silenciar paralabras en Inglés."
     
 });   
}
//MUESTRA EL CONTENIDO DEL MATCH
    $(function() {
        $('#formMatch').submit();
    });
    $('#formMatch').submit(function() {
         $('#calif').html("Buenas | Malas");
            $('#mjsAudio').html("Calificaciones!");           
        
        $.ajax({
            type: 'post',
            url: '../adm/match.php',
            data: $(this).serialize(),
            success: function(data) {
                $('#listas').html(data);
            }
        });
        return false;
    });

    //DRAG AND DROP 
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
        //ev.target.style.opacity = '0.4'; // Establece la opacidad del elemento que se va arrastrar
    }

    //PASA LOS ELEMENTOS DE TAG A OTRO AL HACER CLICK
    function changeOftag(tag) {
        $(tag).css({//RESTABLECE EL COLOR DE LOS LI VERIFICADOS
            color: 'black'
        });
        //EJECUTA EL DRAG AND DROP AL HACER CLICK
        let tagHtml = $(tag).parent().parent().siblings('.respuesta');
        $(tagHtml).children('.dragAndDrop').append($(tag));
//        if ($('#inputes').is(':checked')) { 
            read($(tag).text(), 'es-ES', null, 1, null); 
//        }
    }

    //EVALUA LAS RESPUESTAS
    function resultados() {

        const enList = $("#en li");
        const esList = $("#es li");

        let contGood = 0;
        let contBad = 0;
        let percent = 1;

        for (i = 0; i <= enList.length - 1; i++) {
            let enLi = enList[i];
            let esLi = esList[i];
            //COMPARA LAS RESPUSTAS DE CADA LI
            if ($(enLi).attr('data-type') === $(esLi).text()) {
                contGood++;
                $(enLi).css({
                    color: 'black'
                });
                $(esLi).css({
                    color: 'green'
                });
            } else {
                contBad++;
                $(enLi).css({
                    color: 'black'
                });
                $(esLi).css({
                    color: 'red'
                });
            }
            percent = i + 1;
        }
        let buenas = contGood * 100 / percent; //CONVIERTE EL TOTAL DE REPUESTAS EN 100
         $('#calif').html("<font color='green'>" + contGood + ": Buenas</font> | <font color='red'>" + contBad + ": Malas</font>");
        if (buenas < 40) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Sigue estudiando!");           
        } else if (buenas < 50) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Aun lo puedes hacer mejor!");
        } else if (buenas < 60) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Vas por buen camino!");
        } else if (buenas < 70) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Wao! Nada mal.");
        } else if (buenas < 80) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Buen trabajo!");
        } else if (buenas < 90) {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Uff! Eso fue pan comido.");
        } else {
            $('#mjsAudio').html("<h1>" + buenas.toFixed(1) + "%</h1> ¡Felicidades!");
            document.getElementById('audioAplauso').play();
            $('.contAudio img').show();
            setTimeout(function() {
                $('.contAudio img').hide();
            }, 8000);
        }
    }

</script>
