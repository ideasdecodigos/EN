<!--BUSCAR-->

<form>
    <input type="search" id="txtLiveSerch" placeholder="Buscar" list="srchctgr">
    <datalist id="srchctgr"> 
        <option value="readings">readings</option>
        <option value="expressions">expressions</option>
        <option value="vocabulary">vocabulary</option>
        <option value="videos">videos</option>
        <option value="practice">practice</option>
        <option value="conversation">conversation</option>
        <option value="grammar">grammar</option>
    </datalist>
    <span class="icon-delete" style="cursor:pointer" onclick="$('#divSearch').slideToggle();" title="Close"></span>
</form> 

<div id="results"> <?php echo $salida; ?> </div>
<script>
   $(function(){
        buscar_datos(); //LLAMADA DA LA FUNCION BUSCAR_DATOS
   });

    //FUNCION BUSCAR_DATOS
    function buscar_datos(consulta) {     
        //ENVIA LA CONSULATA
        $.ajax({
                url: "../adm/liveSearch.php",
                type: 'POST',
                datatype: 'html',
                data: { consulta: consulta },
            success:function(data) {
                $("#results").html(data);
            }
        }); return false;
    } //FIN DE LA FUNCION BUSCAR_DATOS

    //SE ENVIAR LOS PARAMETROS A LA FUNCION BUSCAR_DATOS
    $(document).on('keyup', '#txtLiveSerch', function() {
        var valor = $(this).val();
        if (valor != "") {
            buscar_datos(valor);
        } else {
            buscar_datos();
        }
    }); //FIN DE ENVIAR PARAMETROS

</script>
