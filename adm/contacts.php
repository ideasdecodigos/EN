<?php
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $tel = $_POST['tel'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $destino = "ideasdecodigos@gmail.com";
    $contenido = "Nombre: ".$nombre."\nCorreo: ".$correo."\nTel: ".$tel ."\n\n".$asunto.                                                                                                                                                                                                    "\n\nMensaje: ".$mensaje;

    $confirm = mail($destino,"Preguntas y Problemas: ".$asunto,$contenido);
    if($confirm){
       echo " <script>  alert('Enviado corectamente!'); location.href='../index.php'; </script>";   
    }else{
        echo " <script>  alert('Error al Enviar!'); history.back();  </script>";
    }
?>