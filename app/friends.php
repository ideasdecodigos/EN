<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 0001
	FECHA: DAY MONTH 2019
	
	PAGINA DE :DESCRIPCION
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ofical website to learn english">
    <meta name="keywords" content="write, aloud, english, spanish, language, learn, speak">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/en4es68.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/en4es68.png" type="image/x-icon">
    <title>friends</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/friends.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>

<body>

    <?php  include("menu.php");
    if(isset($_SESSION['idstudent'])){  ?>
    <div class="btns">
          <span class="icon-views" onclick="$('#myDropdown1').slideToggle();$(this).toggleClass(' icon-hide');"> Seguidores</span>
          <span class="icon-views" onclick="$('#myDropdown2').slideToggle();$(this).toggleClass(' icon-hide');"> Siguiendo</span>
          <span class="icon-views" onclick="$('#myDropdown3').slideToggle();$(this).toggleClass(' icon-hide');"> Seguir</span>
   </div>
       
    <div class="row">
              
        <div class="left">
            <div id="myDropdown1" class="dropdown-content">
                <h3 style="text-align:center;background:#eee;"><i class='icon-users'></i> Seguidores</h3>
                <input type="search" placeholder="Buscar " id="filtro1" onkeyup="Seguidores()">
                <?php 
                    include("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT idstudent,name,foto,following FROM students RIGHT JOIN friends ON students.idstudent=friends.following WHERE followed=".$_SESSION['idstudent']." and following!=".$_SESSION['idstudent']."");
                    while($row=mysqli_fetch_array($res)){ ?>
                <p>
                    <?php if($row['foto']!=null){  ?>
                    <img src="<?php echo $row['foto']; ?>" alt="foto">
                    <?php }else{echo "<font>".strtoupper(substr($row['name'],0,1))."</font>";} ?>
                    <a href="profile.php?iduser=<?php echo $row['idstudent'] ?>" title="Ver perfil"><?php echo $row['name'] ?></a>
                </p>
                <?php }   
                    mysqli_free_result($res);  
                    mysqli_close($con);    ?>
            </div>
            </div>
            <script>
                function Seguidores() {
                    var input, filter, p, i, div;
                    input = document.getElementById("filtro1");
                    filter = input.value.toUpperCase();
                    div = document.getElementById("myDropdown1");
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


                function addAndLessFriends(me, friend) {
                    $.ajax({
                        type: 'POST',
                        url: '../adm/manager.php',
                        data: {
                            action: "friends",
                            following: me,
                            followed: friend
                        }
                    });
                    return false;
                }
            </script>
            
        <div class="center">
            <div id="myDropdown2" class="dropdown-content">
                <h3 style="text-align:center;background:#eee;"><i class='icon-heart' style='color:red;'></i> Siguiendo</h3>
                <input type="search" placeholder="Buscar " id="filtro2" onkeyup="siguiendo()">
                <?php 
                    include("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT idstudent,name,foto,followed FROM students RIGHT JOIN friends ON students.idstudent=friends.followed WHERE following=".$_SESSION['idstudent']."");
                    while($row=mysqli_fetch_array($res)){ ?>
                <p>
                    <?php if($row['foto']!=null){  ?>
                    <img src="<?php echo $row['foto']; ?>" alt="foto">
                    <?php }else{echo "<font>".strtoupper(substr($row['name'],0,1))."</font>";} ?>
                    <a href="profile.php?iduser=<?php echo $row['idstudent'] ?>" title="Ver perfil"><?php echo $row['name'] ?></a>
                    <span class='icon-delete' style='color:red;' onclick="addAndLessFriends(<?php echo $_SESSION['idstudent'] ?>,<?php echo $row['idstudent'] ?>); location.reload();"></span>
                </p>
                <?php
                    }   
                    mysqli_free_result($res); 
                    mysqli_close($con);  ?>
            </div>
            <script>
                function siguiendo() {
                    var input, filter, div, p, i;
                    input = document.getElementById("filtro2");
                    filter = input.value.toUpperCase();
                    div = document.getElementById("myDropdown2");
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

            </script>
        </div>

        <div class="right">
            <div id="myDropdown3" class="dropdown-content">
                <h3 style="text-align:center;background:#eee;"><i class='icon-user' style='color:dodgerblue;'></i> Seguir</h3>
                <input type="search" placeholder="Buscar" id="filtro3" onkeyup="seguir()">
                <?php 
                    include("../adm/connection.php");
                    $res = mysqli_query($con,"SELECT idstudent,name,foto,(SELECT followed FROM friends WHERE following=".$_SESSION['idstudent']." and followed=idstudent)AS siguiendo FROM students WHERE idstudent!=".$_SESSION['idstudent']."");
                    while($row=mysqli_fetch_array($res)){ 
                        if($row['siguiendo']==null){ ?>

                <p>
                    <?php if($row['foto']!=null){  ?>
                    <img src="<?php echo $row['foto']; ?>" alt="foto">
                    <?php }else{echo "<font>".strtoupper(substr($row['name'],0,1))."</font>";} ?>
                    <a href="profile.php?iduser=<?php echo $row['idstudent'] ?>" title="Ver perfil"><?php echo $row['name'] ?></a>
                    <span class='icon-plus' style='color:dodgerblue;' onclick="addAndLessFriends(<?php echo $_SESSION['idstudent'] ?>,<?php echo $row['idstudent'] ?>); location.reload();"></span>
                </p>
                <?php
                        }
                    }
            mysqli_free_result($res); 
            mysqli_close($con);  
        ?>
            </div>
            <script>
                function seguir() {
                    var input, filter, div, p, i;
                    input = document.getElementById("filtro3");
                    filter = input.value.toUpperCase();
                    div = document.getElementById("myDropdown3");
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

            </script>
        </div>
        
    </div>

    <?php 
include("footer.php"); include("options.php");    
    
    }else{	echo " <script>  window.history.go(-1);  </script>";
}
?>
</body>

</html>
