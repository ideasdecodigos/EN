
<?php   
function level($niveles,$user,$nivelUser){           
        include("../adm/connection.php");
    if($nivelUser>=5){ 
        $res = mysqli_query($con, "SELECT *,(SELECT idtopic FROM courses WHERE idtopic=idcontent)AS added,(SELECT idhistory FROM history WHERE idpost=idcontent AND iduser=$user AND status='Learned')AS learned FROM contents LEFT JOIN courses ON contents.idcontent=courses.idtopic WHERE level=$niveles ORDER BY orden"); 
    }else{
        $res = mysqli_query($con, "SELECT *,(SELECT idhistory FROM history WHERE idpost=idcontent AND iduser=$user AND status='Learned')AS learned FROM contents RIGHT JOIN courses ON contents.idcontent=courses.idtopic WHERE level=$niveles ORDER BY orden ASC"); 
    }
        if(mysqli_num_rows($res) > 0){
            $esl=1; $percent=0;
		    while($fila=mysqli_fetch_array($res)){ ?>
<p>
    <span><?php echo "ESL ".$esl.": " ?></span>
    <a href="../app/texts.php?idtext=<?php echo $fila['idcontent'];?>&type=<?php echo $fila['type']; ?>"><?php echo $fila['topic'] ?></a>

    <!--    AGREGA Y QUITA DE APRENDIDO -->
    <?php
    if($fila['learned']!=null){ $percent++;?>
    <input type="checkbox" title="Quitar de aprendido" checked onchange="deleteFromLearned(<?php echo $fila['idcontent']; ?>);views(<?php echo $fila['level'] ?>,$(this).parent().parent());">
    <?php }else{ ?>
    <input type="checkbox" title="Añadir como aprendido" onchange="addToLearned(<?php echo $fila['idcontent'] ?>);
    views(<?php echo $fila['level'] ?>,$(this).parent().parent());">
    <?php } ?>

    <!--    AGREGA Y QUITA DEL CURSO -->
    <?php 
    if($nivelUser>=5){ 
    if($fila['added']!=null){ ?>
    <input type="checkbox" title="Quitar del curso" checked onchange="deleteFromCourse(<?php echo $fila['idcontent']; ?>);views(<?php echo $fila['level'] ?>,$(this).parent().parent());">
    <?php }else{ ?>
    <input type="checkbox" title="Añadir al curso" onchange="addToCourse(<?php echo $fila['idcontent'] ?>);views(<?php echo $fila['level'] ?>,$(this).parent().parent());">
    <?php }} ?>
</p>
<?php  
               $esl++; } 
            
            $low=intval(mysqli_num_rows($res)/4);
            $high=mysqli_num_rows($res)-$low;
            
            switch($niveles){
                case 1:
                    echo  "<script>$('#m1').attr({'max':".mysqli_num_rows($res).",'low':'$low','high':'$high','value':'$percent'});</script>" ;        
                    break;
                case 2:
                    echo  "<script>$('#m2').attr({'max':".mysqli_num_rows($res).",'low':'$low','high':'$high','value':'$percent'});</script>" ;        
                    break;
                case 3:
                    echo  "<script>$('#m3').attr({'max':".mysqli_num_rows($res).",'low':'$low','high':'$high','value':'$percent'});</script>" ;        
                    break;
                case 4:
                    echo  "<script>$('#m4').attr({'max':".mysqli_num_rows($res).",'low':'$low','high':'$high','value':'$percent'});</script>" ;        
                    break;
                default:
                    echo "";
            }
         } 
             mysqli_free_result($res);
			mysqli_close($con);   
}

if(isset($_POST['view'])){
    session_start();
 level($_POST['view'],$_SESSION['idstudent'],$_SESSION['level']);
}

if(isset($_POST['addToCouse'])){
    $tema=$_POST['addToCouse'];
    include("connection.php");
    mysqli_query($con, "INSERT INTO courses(idtopic)VALUES('$tema')");
	mysqli_close($con); // Cierra la conexion
}

if(isset($_POST['deleteFromCouse'])){
    $del=$_POST['deleteFromCouse'];
    include("connection.php");
    mysqli_query($con, "DELETE FROM courses WHERE idtopic = $del");
	mysqli_close($con); // Cierra la conexion
}
 

if(isset($_POST['addLearned'])){
    session_start();
    if(isset($_POST['iduser'])){//post del document quiz
        $idtema=$_POST['idpost'];
        $user=$_POST['iduser']; 
    }else{ //post del document courso
    $user=$_SESSION['idstudent'];
    $idtema=$_POST['addLearned'];
    }
    include("connection.php");
    mysqli_query($con, "INSERT INTO history(iduser,idpost,status)VALUES($user,$idtema,'Learned')");
	mysqli_close($con); // Cierra la conexion
}


if(isset($_POST['deleteLearned'])){
    session_start();
    $user=$_SESSION['idstudent'];
    $idtema=$_POST['deleteLearned'];
    include("connection.php");
    mysqli_query($con, "DELETE FROM history WHERE iduser=$user AND idpost=$idtema AND status='Learned'");
	mysqli_close($con); // Cierra la conexion
}
 
