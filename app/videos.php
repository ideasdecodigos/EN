<?php      
    function videos($id){
        include("../adm/connection.php");         
        $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent=".$id." "); 
                if(mysqli_num_rows($res) > 0){
                    while($fila=mysqli_fetch_array($res)){ $category=$fila['categories']; ?>
                        <div class="contents">
                            <center><?php echo $fila['topic']; ?></center> 
                                <br>
                            <p><?php echo $fila['description']; ?><p><br>                           
                        </div>
                        <?php 
                     }
                    mysqli_free_result($res);
                    mysqli_close($con);
                    
                    
                    include("../adm/functions.php");  
                    comments("videos",$category);
                } 
    }
    