
<?php
include("functions.php");
include("connection.php");
  
$salida= "";
$query="SELECT * contents ORDER BY RAND()";
if(isset($_POST['consulta'])){
    $letra= mysqli_real_escape_string($con,$_POST['consulta']);
   
    $query = "SELECT * FROM contents WHERE topic like '%".$letra."%' or categories like '%".$letra."%' 
        or description like '%".$letra."%' or type like '%".$letra."%' ORDER BY RAND()";

    $resultado = mysqli_query($con,$query); 
    if(mysqli_num_rows($resultado) > 0){
    $salida.="<center><b class='icon-bucar'> ".mysqli_num_rows($resultado)."</b> Topics to read! </center>";

        while($fila=mysqli_fetch_array($resultado)){  
					$topic=$fila['topic'];
				if(strlen($topic) > 50){
					$topic=substr($topic, 0, 50). "...";
				}
            $descrptn=$fila['description'];
				if(strlen($descrptn) > 50){
					$descrptn=substr($descrptn, 0, 50). "...";
				}
            if($fila['type']=='practice'){
            $salida.="	
			<div class='result' onclick=\"location.href='../app/pratices.php?idtext=". $fila['idcontent']."&lavel=". $fila['level']."'\">				
				<p translate'no'> ".strip_tags($topic)." </p> 
				<i> ". strip_tags($descrptn). "</i><br>
				<font color='dodgerblue'> ".$fila['type']. "</font>
			</div>"; 
            }else{
                 $salida.="	
			<div class='result' onclick=\"location.href='../app/texts.php?idtext=". $fila['idcontent']."&type=". $fila['type']."'\">				
				<p translate'no'> ".strip_tags($topic)." </p> 
				<i> ". strip_tags($descrptn). "</i><br>
				<font color='dodgerblue'> ".$fila['type']. "</font>
			</div>"; 
            }
                
        }mysqli_free_result($resultado);mysqli_close($con);		
    
    }else{ echo "<center><b class='icon-load'></b> Sin Coincidencias!</center>";}}
echo $salida;


