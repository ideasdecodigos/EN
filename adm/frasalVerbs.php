<?php   
function level($nivel){           
        include("../adm/connection.php");
        $res = mysqli_query($con, "SELECT * FROM phrasalverb WHERE fvlevel=$nivel ORDER BY fvenglish ASC"); 
   
   if(mysqli_num_rows($res) > 0){ ?>
        <table>
            <?php $letra="";
                 while($celda=mysqli_fetch_array($res)){       
                       //MUESTRA LA dateforo POR GRUPO
                    if(strtoupper(substr($celda['fvenglish'],0,1))!=$letra){  ?>
            <tr>
                <th class="icon-sort" onclick="$('.latra<?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?>').slideToggle();"></th>
                <th colspan="2"><?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?></th>
<!--                <th colspan=""></th>-->
            </tr>
            <?php   }  $letra=strtoupper(substr($celda['fvenglish'],0,1));  ?>
            <tr class="latra<?php echo strtoupper(substr($celda['fvenglish'],0,1)); ?>">
                <td onclick="read($(this).text(),'en-US',null,0.3,null);"><?php echo $celda['fvenglish'] ?></td>
                <td onclick="read($(this).text(),'es-ES',null,0.3,null);"><?php echo $celda['fvspanish'] ?></td>
                <?php if(session_id() ===""){ session_start();}
                if(isset($_SESSION['idstudent']) and $_SESSION['level']>=5){ ?>
                    <td class="icon-trash" onclick="deleteVerb(<?php echo $celda['idverb']?>);" rowspan="<?php if($celda['fvdescription']!=""){
                        echo '2'; }else{ echo '2'; } ?>" style="width:20px;color:red"></td>
                <?php }    ?>
            </tr>
            <?php if($celda['fvdescription']!=""){ ?>
            <tr>
                <td colspan="2"><?php echo $celda['fvdescription'] ?></td>
            </tr>
                <?php } 
                 } 
            mysqli_free_result($res);
			mysqli_close($con); ?>
        </table>
<?php   }   
}//FUN DE LA FUNCION

if(isset($_POST['nivel'])){
 level($_POST['nivel']);
}

if(isset($_POST['deleteVerb'])){
    include("connection.php");
    $idverb=mysqli_real_escape_string($con,$_POST['deleteVerb']);
    
    mysqli_query($con, "DELETE FROM phrasalVerb WHERE idverb=$idverb");
	mysqli_close($con); 
}
 
