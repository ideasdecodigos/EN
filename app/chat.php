<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="profile, library">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>chat</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
        <link rel="stylesheet" href="../css/chat.css">

    <link rel="stylesheet" href="../css/menu.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php  include("menu.php"); ?>
    <div class="row">
        <div class="left" id="left">
               <div class="search">
                <input type="search" placeholder="Buscar " id="filtro1" onkeyup="filterByName()">
            </div>
                <div class="subleft">
                    <?php 
                    include("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT idstudent,name,foto FROM students WHERE idstudent!=".$_SESSION['idstudent']." ORDER BY name");
                    while($row=mysqli_fetch_array($res)){ ?>
                    <p>
                        <?php if($row['foto']!=null){  ?>
                        <img src="<?php echo $row['foto']; ?>" alt="foto" onclick="location.href='profile.php?iduser=<?php echo $row['idstudent'] ?>'">
                        <?php }else{?>
                        <font onclick="location.href='profile.php?iduser=<?php echo $row['idstudent'] ?>'"><?php echo strtoupper(substr($row['name'],0,1)); ?> </font>
                        <?php } ?>
                        <a href="javascript:void(0);" onclick="showAndOpenChats('<?php echo $row['idstudent']; ?>','<?php echo $row['name']; ?>');"><?php echo $row['name'] ?></a>
                        <span class="icon-delete close"></span>
                    </p>
                    <?php }   
                    mysqli_free_result($res);  
                    mysqli_close($con);    ?>
            </div>
        </div>
        <script>
            //  FILTRA LA BUSQUEDA POR NOMBRE
            function filterByName() {
                var input, filter, p, i, div;
                input = document.getElementById("filtro1");
                filter = input.value.toUpperCase();
                div = document.getElementById("left");
                p = div.getElementsByTagName("p");
                for (i = 0; i < p.length; i++) {
                    txtValue = p[i].textContent || p[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        p[i].style.display = "";
                    } else {
                        p[i].style.display = "none";
                    }
                }
            }
            //ELIMINA LOS CHATS 
            var closebtns = document.getElementsByClassName("close");
            var i;

            for (i = 0; i < closebtns.length; i++) {
                closebtns[i].addEventListener("click", function() {
                    this.parentElement.style.display = 'none';
                });
            }

            function showAndOpenChats(idStudent, perfil) {
                $('#costum').val(idStudent);
              
                    $('.left').hide();
                    $('.right').show();
                
                chat();

                $('#perfil').empty();
                $('#perfil').append("Chat con " + perfil);
                 setTimeout(function() {
                        $('#chatvista').scrollTop($('#chatvista').prop('scrollHeight'));
                    }, 100);
            }

        </script>
        
        <div class="right">
            <div class="perfil">
                <button class="icon-left" onclick="$('.left').show();$('.right').hide();"></button>
                <span id="perfil"></span>
            </div>

            <div id="chatvista"> </div>
            <button class="icon-down" onclick="$('#chatvista').scrollTop($('#chatvista').prop('scrollHeight'));"></button> 
            <form id="chatform">
                <div class="hide">
                    <input type="hidden" name="idreplay" id="idreplay">
                    <span class="icon-delete" title="Quitar adjunto" onclick="$('#idreplay,#txtreplay').val(''); $('.hide').slideUp();"></span>
                    <textarea name="txtreplay" id="txtreplay" rows="3" readonly></textarea>
                </div> 
                <div class="show"> 
                    <input type="text" name="admin" id="admin" value="<?php echo $_SESSION['idstudent']; ?>">
                    <input type="text" name="costum" id="costum">
                    <textarea name="mensaje" id="chatmsg" placeholder="Mensaje..."></textarea>
                    <button type="submit" id="submitChat"><span class="icon-share"></span></button>
                </div>
            </form>
        </div>
    </div> 
    
    <script>
        $('#chatform').submit(function() {
            $.ajax({
                type: 'POST',
                url: 'chatmngr.php',
                data: $(this).serialize(),
                success: function(data) {
                    $('#chatmsg,#txtreplay,#idreplay').val('');
                    $('.hide').slideUp();
                    scrll=false;
                    chat();
                }
            });
            return false;
        });

        let scrll=false;
        $('#chatvista').scroll(function(){
            scrll=true;
            $('button.icon-down').show();
            setTimeout(function(){$('button.icon-down').hide();},3000);
        });

        function chat() {           
            $.ajax({
                type: 'POST',
                url: '../adm/chathistory.php',
                data: $("#chatform").serialize(),
                success: function(data) {
                    $("#chatvista").html(data);
                    if(!scrll){ 
                        $('#chatvista').scrollTop($('#chatvista').prop('scrollHeight'));
                        $('button.icon-down').hide();
                    }
                }
            });
            return false;
        }

        setInterval(function() {chat() }, 1000);
 
        function del(idchat,idstudent,perfil) {
        $.ajax({
            type: 'POST',
            url: 'chatmngr.php',
            data: {idchat:idchat},
            success: function(data) {
                showAndOpenChats(idStudent, perfil);
            }
        });
        return false;
    }
    </script>

    <?php include("options.php"); ?>
    <script src="../js/script.js"></script>

    <?php //LINK DEL CHAT PERFIL
if(isset($_GET['iduser'])){ ?>
    <script>
        showAndOpenChats('<?php echo $_GET['iduser']?>');
    </script>
    <?php } //FIN DEL LINK?>


</body>

</html>
