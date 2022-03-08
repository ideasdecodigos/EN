<?php
if(isset($_POST['mensaje']) and $_POST['admin']!=="" and $_POST['costum']!=="" and $_POST['mensaje']!=""){
    include("../adm/connection.php");
    $txtreplay = str_replace(" |#","<br><span class='icon-reply'></span>",$_POST["txtreplay"]);
    $admin = mysqli_real_escape_string($con,$_POST['admin']);
    $costum =mysqli_real_escape_string($con,$_POST['costum']);
    $mensaje = mysqli_real_escape_string($con,$_POST['mensaje']);
    $txtreplay = mysqli_real_escape_string($con,$txtreplay);
    $idreplay = mysqli_real_escape_string($con,$_POST['idreplay']);     

    mysqli_query($con,"INSERT INTO chats (mensaje,idreplay,txtreplay,admin,costum) VALUES ('$mensaje','$idreplay','$txtreplay','$admin', '$costum')");
}


if(isset($_POST['idchat'])){
    include("../adm/connection.php");
    $idchat = mysqli_real_escape_string($con,$_POST["idchat"]);          
            
    mysqli_query($con, "DELETE FROM chats WHERE idchat=$idchat");
    mysqli_close($con);  
} 