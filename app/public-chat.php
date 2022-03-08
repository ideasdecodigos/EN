<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="profile, library">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>public-chat</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/public-chat.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php  include("menu.php"); ?>

    <div class="public-chat">
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
                <textarea name="mensaje" id="chatmsg" placeholder="Mensaje..."></textarea>
                <button type="submit" id="submitChat"><span class="icon-share"></span></button>
            </div>
        </form>
    </div>

    <script>
        $(function() {
            $('#chatform').submit();
        });
        var scrll = false;
        $('#chatvista').scroll(function() {
            scrll = true;
            $('button.icon-down').show();
            setTimeout(function() {
                $('button.icon-down').hide();
            }, 3000);
        });

        $('#chatform').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/public-chat.php',
                data: $(this).serialize(),
                success: function(data) {
                    $('#chatmsg,#idreplay,#txtreplay').val('');
                    $("#chatvista").html(data);
                    $('.hide,button.icon-down').slideUp();                    
                    $('#chatvista').scrollTop($('#chatvista').prop('scrollHeight'));
                }
            });
            return false;
        }); 

        function del(idchat) {
            $.ajax({
                type: 'POST',
                url: '../adm/public-chat.php',
                data: {
                    idchat: idchat
                },
                success: function(data) {
                    $("#chatvista").html(data);
                    if (!scrll) {
                        $('#chatvista').scrollTop($('#chatvista').prop('scrollHeight'));
                        $('button.icon-down').hide();
                    }
                }
            });
            return false;
        }

    </script> 

   <?php  include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>

</html>
