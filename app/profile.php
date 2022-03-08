<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 20122019
	FECHA: 20 dec 2019
	
	PAGINA DE : inicio de secsion
-->
 <?php if(isset($_GET['iduser'])){ 
    include("../adm/functions.php");
    //   ########## ABREVIA LOS NUMEROS CON K Y M #############             
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="profile, library">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>Perfil</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/skills.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery.knob.min.js"></script>
</head>
<body>
    <?php include("menu.php"); ?>
     <!-- --------------CONTENEDOR PERFIL---------------->
    <div class="divbody">
       
        <?php   $rango=""; 
                include ("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT * FROM students WHERE idstudent='".$_GET['iduser']."'");
                    if(mysqli_num_rows($res) > 0 ){  
                         while($fila=mysqli_fetch_array($res)){ 
                             
                            if($fila['level'] <= 1)
                                 $rango=" Principiante"; 
                            elseif($fila['level'] <= 2)
                                 $rango=" Intermedio";
                            elseif($fila['level'] <= 3)
                                 $rango=" Advanzado";
                            elseif($fila['level'] <= 4)
                                 $rango=" Profesional"; 
                            else
                                 $rango.=" Admin";  
                             
        ?>      
                            
          <div class="containerImg">                               
             <div class="img">
                 <?php if($fila['foto']==null  || $fila['foto']=="null" || $fila['foto']==""){ 
                       echo "<h1>".strtoupper(substr($fila['name'],0,1))."</h1>";             
                    }else{ ?> 
                         <img src="<?php echo $fila['foto']; ?>" alt="foto"> 
                    <?php } ?> 
              </div>
                <h1><?php echo $fila['name']; ?></h1>                                 
                <span class="icon-level8"> <?php echo $rango; ?></span>
                <span class="icon-location"> <?php echo $fila['country']; ?></span>
                <span class="icon-calendar1"> Se unió el: <?php echo date("j M Y",strtotime($fila['date'])); ?></span>                
        
         <?php 
            if(isset($_SESSION['idstudent'])){  
                $susc = mysqli_query($con, "SELECT followed FROM friends WHERE following=".$_SESSION['idstudent']." AND followed=".$_GET['iduser']."");
                if(mysqli_num_rows($susc) > 0){  ?>
             <button onclick='$("#suscribirse").submit();' id="infor" ><span class='icon-heart' style='color:red;'></span> Siguiendo </button>
        <?php }else{ ?>
              <button onclick='$("#suscribirse").submit();' id="infor" ><span class='icon-heart' style='color:dodgerblue;'></span> Seguir </button> 
              
        <?php } }else{ ?>
              <p><a href="../index.php#login">Entra</a> o <a href="../index.php#signup">Registrate</a>, para seguir a este usuario.</p>
           <?php } ?>
<!--           LINK AL CHAT-->
<!--           <button onclick="location.href='chat.php?iduser=<?php// echo $_GET['iduser']; ?>'">Chat</button>-->
           
            <form id="suscribirse">
             <input type="hidden" name="following" value="<?php echo $_SESSION['idstudent'] ?>">
             <input type="hidden" name="followed" value="<?php echo $_GET['iduser'] ?>">
             <input type="hidden" name="action" value="friends">
         </form>
          <script> 
    $('#suscribirse').submit(function() {
        $.ajax({
            type: 'POST', 
            url: '../adm/manager.php',
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#infor').html(data);
            }
        });
        return false;
    });
 
</script>
        
            <?php   $seguidores=0;$siguiendo=0;          
              $seg=mysqli_query($con,"SELECT COUNT(*) AS seguidores FROM friends WHERE followed=".$_GET['iduser']);
                             if(mysqli_num_rows($seg)>0){
                                 while($sgdrs=mysqli_fetch_array($seg)){ 
                                     $seguidores=$sgdrs['seguidores'];
                                 }
                             }
                    $sig=mysqli_query($con,"SELECT COUNT(*) AS siguiendo FROM friends WHERE following=".$_GET['iduser']);
                             if(mysqli_num_rows($sig)>0){
                                 while($sgnd=mysqli_fetch_array($sig)){ 
                                     $siguiendo=$sgnd['siguiendo'];
                                 }
                             } 
                    $suma=mysqli_query($con,"SELECT COUNT(*) AS aprendido FROM history WHERE status='Learned' AND iduser=".$_GET['iduser']);
                             if(mysqli_num_rows($suma)>0){
                                 while($ap=mysqli_fetch_array($suma)){ 
                                     $aprendido=$ap['aprendido'];
                                 }
                             } 
            ?>
                
         </div> <br><hr><br>
           
           <div class="row1">
               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-users"></i></p>
                       <h3><?php echo notacionKM($seguidores); ?></h3>
                       <p>Seguidores</p>
                   </div>
               </div>

               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-usersecret"></i></p>
                       <h3><?php echo notacionKM($siguiendo); ?></h3>
                       <p>Siguiendo</p>
                   </div>
               </div>


               <div class="column1">
                   <div class="card1">
                       <p><i class="icon-checked"></i></p>
                       <h3><?php echo notacionKM($aprendido); ?></h3>
                       <p>Aprendido</p>
                   </div>
               </div>
           </div>
           <br><hr><br>
            <?php                                                                
                 }    //END WHILE                 
                 mysqli_free_result($res);
                 mysqli_close($con);                     
             } //END IF  
        
            include("skill.php"); skills($_GET['iduser']);
        
        ?>  
            
      </div>     

 
        <?php include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>
</html>
<?php }else{echo "no id";} ?>