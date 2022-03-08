<!--
	DESARROLLADOR: JUAN CARLOS PANIAGUA
	VERSION: 20122019
	FECHA: 20 dec 2019
	
	PAGINA DE : inicio de secsion
-->
<?php 
if(isset($_GET['id']) && isset($_GET['type'])){ 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>Edit</title>
    <link rel="stylesheet" href="../src/icons/styles.css">
    <link rel="stylesheet" href="../css/menu.css"> 
    <link rel="stylesheet" href="../css/account.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../src/ckeditor/ckeditor.js"></script>
    
</head>

<body>
    <script>
        $(function() {
            openwindows(this, '#divPhrase');
        });

    </script>
    <div class="divtab" id="divPhrase" style="margin-left: 0;">
        <?php include("menu.php"); 
    include ("../adm/connection.php");
    switch($_GET['type']){
       
     case "vocabulary":
            $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
        <form class="slideform" id="formVocabulary">
            <h2>EDIT VOCABULARY </h2>
            <input type="text" name="title" placeholder="Title" value="<?php echo $fila['topic'] ?>">
            <textarea name="desc" rows="3" placeholder="Description" ><?php echo $fila['description'] ?></textarea>
            <input type="text" name="category" placeholder="Enter cathegories" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" >
                <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>    
            <button type="submit">Edit</button>
            <button type="button" onclick="deletePost('<?php echo $_GET['id'] ?>');">Delete</button>
        </form> 
        <?php                                       
                }//END WHILE VOCABULARY 
                 $res = mysqli_query($con,"SELECT * FROM subcontents WHERE idpost='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   ?>
        <div class="container">
            <div class="contents">
                <h2>ENGLISH WORDS</h2>
                <table>
                    <tr>
                        <th>English</th>
                        <th>Spanish</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                    <?php  while($fila=mysqli_fetch_array($res)){ ?>
                    <tr>
                        <form id="formNo<?php echo $fila['idsubcontent'] ?>">
                            <td><input type="text" name="word" value="<?php echo $fila['english'] ?>" placeholder="Word"></td>
                            <td><input type="text" name="meaning" value="<?php echo $fila['spanish'] ?>" placeholder="Meaning"></td>
                            <input type="hidden" name="id" value="<?php echo $fila['idsubcontent'] ?>">
                            <input type="hidden" name="table" value="word">
                            <td><button type="submit" class="icon-edit"></button></td>
                            <td><button type="button" onclick="deleter('words',<?php echo $fila['idsubcontent'] ?>,'subcontents','idsubcontent');" class='icon-trash'></button></td>
                        </form>
                    </tr>
                    <script>
                        //ENVIA EL FORMULARIO                    
                        $('#formNo<?php echo $fila['idsubcontent'] ?>').submit(function() {
                            $.ajax({
                                type: 'POST',
                                url: '../adm/controller.php',
                                data: $(this).serialize(),
                                success: function(data) {
                                    $(".lblinformation").html(data);
                                    $(".lblinformation").show();
                                    setTimeout(function() {
                                        $(".lblinformation").hide()
                                    }, 3000);
                                }
                            });
                            return false;
                        });

                    </script>
                    <?php  }   //END WHILE WORD
   ?>
                </table>
            </div>
        </div>
        <?php }//END IF WORD
            }//END IF VOCABULARY 
       
        break;
        case "conversation":
            $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
        <form class="slideform" id="formVocabulary">
            <h2>EDIT VOCABULARY </h2>
            <input type="text" name="title" placeholder="Title" value="<?php echo $fila['topic'] ?>">
            <textarea name="desc" rows="3" placeholder="Description" ><?php echo $fila['description'] ?></textarea>
            <input type="text" name="category" placeholder="Enter cathegories" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" >
                <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>    
            <button type="submit">Edit</button>
            <button type="button" onclick="deletePost('<?php echo $_GET['id'] ?>');">Delete</button>
        </form> 
        <?php                                       
                }//END WHILE CONVERSATION 
                 $res = mysqli_query($con,"SELECT * FROM conversations WHERE idpost='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   ?>
        <div class="container">
            <div class="contents">
                <h2>ENGLISH WORDS</h2>
                <table>
                    <tr>
                        <th>English</th>
                        <th>Spanish</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                    <?php  while($fila=mysqli_fetch_array($res)){ ?>
                    <tr>
                        <form id="formCnv<?php echo $fila['idconversation'] ?>">
                           
                            <td>
                                <div style="display:flex">
                                    <input type="text" class="inputword" name="person"  placeholder="Person" list="prsn" value="<?php echo $fila['person'] ?>">
                                    <datalist id="prsn">
                                        <option value="Max">Max</option>
                                        <option value="Lisa">Lisa</option>
                                        <option value="John">John</option>
                                        <option value="Mary">Mary</option>
                                        <option value="Peter">Peter</option>
                                        <option value="Eva">Eva</option>
                                        <option value="Ralph">Ralph</option>
                                        <option value="Julia">Julia</option>
                                        <option value="Charles">Charles</option>
                                        <option value="Rose">Rose</option>
                                    </datalist>
                                    <input type="number" name="position" min="1" max="4" value="<?php echo $fila['position'] ?>">
                                </div>
                            </td>                     
                            <td><input type="text" name="english" value="<?php echo $fila['english'] ?>" placeholder="english">
                            <input type="text" name="spanish" value="<?php echo $fila['spanish'] ?>" placeholder="spanish">
                            </td>
                            <input type="hidden" name="idpost" value="<?php echo $fila['idconversation'] ?>">
                            <input type="hidden" name="table" value="conversation">
                            <td><button type="submit" class="icon-edit"></button></td>
                            <td><button type="button" onclick="deleter('words',<?php echo $fila['idconversation'] ?>,'conversatios','idconversation');" class='icon-trash'></button></td>
                        </form>
                    </tr>
                    <script>
                        //ENVIA EL FORMULARIO                    
                        $('#formCnv<?php echo $fila['idconversation'] ?>').submit(function() {
                            $.ajax({
                                type: 'POST',
                                url: '../adm/controller.php',
                                data: $(this).serialize(),
                                success: function(data) {
                                    $(".lblinformation").html(data);
                                    $(".lblinformation").show();
                                    setTimeout(function() {
                                        $(".lblinformation").hide()
                                    }, 3000);
                                }
                            });
                            return false;
                        });

                    </script> 
                    <?php  }   //END WHILE WORD
   ?>
                </table>
            </div>
        </div>
        <?php }//END IF WORD
            }//END IF VOCABULARY 
       
        break;
        case "expressions":
            $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
        <form class="slideform" id="formVocabulary">
            <h2>EDIT VOCABULARY </h2>
            <input type="text" name="title" placeholder="Title" value="<?php echo $fila['topic'] ?>">
            <textarea name="desc" rows="2" placeholder="Description" ><?php echo $fila['description'] ?></textarea>
            <input type="text" name="category" placeholder="Enter cathegories" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" >
                <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>    
            <button type="submit">Edit</button>
            <button type="button" onclick="deletePost('<?php echo $_GET['id'] ?>');">Delete</button>
        </form> 
        <?php                                       
                }//END WHILE VOCABULARY 
                 $res = mysqli_query($con,"SELECT * FROM subcontents WHERE idpost='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   ?>
        <div class="container">
            <div class="contents">
                <h2>ENGLISH WORDS</h2>
                <table>
                    <tr>
                        <th>English</th>
                        <th>Spanish</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>
                    <?php  while($fila=mysqli_fetch_array($res)){ ?>
                    <tr>
                        <form id="formNo<?php echo $fila['idsubcontent'] ?>">
                            <td><input type="text" name="word" value="<?php echo $fila['english'] ?>" placeholder="Word"></td>
                            <td><input type="text" name="meaning" value="<?php echo $fila['spanish'] ?>" placeholder="Meaning"></td>
                            <input type="hidden" name="id" value="<?php echo $fila['idsubcontent'] ?>">
                            <input type="hidden" name="table" value="word">
                            <td><button type="submit" class="icon-edit"></button></td>
                            <td><button type="button" onclick="deleter('words',<?php echo $fila['idsubcontent'] ?>,'subcontents','idsubcontent');" class='icon-trash'></button></td>
                        </form>
                    </tr>
                    <script>
                        //ENVIA EL FORMULARIO                    
                        $('#formNo<?php echo $fila['idsubcontent'] ?>').submit(function() {
                            $.ajax({
                                type: 'POST',
                                url: '../adm/controller.php',
                                data: $(this).serialize(),
                                success: function(data) {
                                    $(".lblinformation").html(data);
                                    $(".lblinformation").show();
                                    setTimeout(function() {
                                        $(".lblinformation").hide()
                                    }, 3000);
                                }
                            });
                            return false;
                        });

                    </script>
                    <?php  }   //END WHILE WORD
   ?>
                </table>
            </div>
        </div>
        <?php }//END IF WORD
            }//END IF VOCABULARY 
            
        break;
        case "videos": 
            $res = mysqli_query($con,"SELECT * FROM contents WHERE type='videos' AND idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
        <h2>EDIT VIEDO</h2>
        <hr>
        <form class="slideform" id="formVideos">
            <input type="text" name="title" placeholder="Enter channel" value="<?php echo $fila['topic'] ?>">
            <textarea name="desc" placeholder="Enter a video link" rows="5"><?php echo $fila['description']; ?></textarea>
            <input type="text" name="category" placeholder="Enter catherogies" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" >
                <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit">Edit</button>
            <button type="button" onclick="deleter('idsql',<?php echo $fila['idcontent'] ?>,'contents','idcontent');">Delete</button>

        </form> <?php                                       
                }  
            } 
            
        break;
        case "readings": 
            $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){  
                while($fila=mysqli_fetch_array($res)){  ?>
        <h2>EDIT READING</h2>
        <hr>
        <form class="slideform" style="width:100%" id="formReadings">    
            <input type="text" name="title"  placeholder="Title" value="<?php echo $fila['topic'] ?>">
            <textarea id="texto" ><?php echo $fila['description'] ?></textarea>
            <textarea name="desc" id="txtdesc" style="display:none"></textarea>
            <input type="text" name="category" placeholder="Cathegories" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id']; ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" >
               <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>                
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit">Edit</button>
            <button type="button" onclick="deletePost('<?php echo $_GET['id'] ?>');">Delete</button>
 <script>
            CKEDITOR.replace('texto');
 //ENVIA EL FORMULARIO READINGS                   
            $('#formReadings').submit(function() {                
                $('#txtdesc').val(CKEDITOR.instances.texto.getData());
                $.ajax({
                    type: 'POST',
                    url: '../adm/controller.php',
                    data: $(this).serialize(),
                    success: function(data) {
                        $("#lblinformation").html(data); $("#lblinformation").show();  
                        setTimeout(function() {  $("#lblinformation").hide();window.location.reload(); }, 2000);                        
                    }
                });
                return false;
            });

        </script>
        </form>
        <?php                                       
                }  
            } 
            
        break;
        case "practices": 
            $res = mysqli_query($con,"SELECT * FROM contents WHERE idcontent='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   
                while($fila=mysqli_fetch_array($res)){  ?>
        <form class="slideform" id="formTest">
            <h2>EDIT PRATICE</h2>
            <input type="text" name="title" placeholder="Title" value="<?php echo $fila['topic'] ?>">
            <textarea name="desc" rows="2" placeholder="Description" ><?php echo $fila['description'] ?></textarea>
            <input type="text" name="category" placeholder="Enter cathegories" value="<?php echo $fila['categories'] ?>">
            <input type="hidden" name="idcontent" value="<?php echo $_GET['id'] ?>">
            <input type="hidden" name="table" value="contents">
            <select name="level" > 
                <option value="<?php echo $fila['level'] ?>" selected><?php echo $fila['level'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <button type="submit">Edit</button>
            <button type="button" onclick="deletePost('<?php echo $_GET['id'] ?>');">Delete</button>
        </form>
        <?php                                       
                } //END WHILE TEST 
                
                 $res = mysqli_query($con,"SELECT * FROM pratices WHERE idpost='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   ?>
            <br><hr>
        <div class="container">
            <div class="contents">
                <h2>EDIT CHALLENGES</h2>
                <table>
                    <tr>
                        <th>Topic</th>
                        <th>Text1</th>
                        <th>Answer</th>
                        <th>Edit</th>
                    </tr>
                    <?php  while($fila=mysqli_fetch_array($res)){ ?>
                    <tr>
                        <form id="topic<?php echo $fila['idpratice'] ?>">
                            <td>
                                <textarea rows="3" name="question" placeholder="Topic" ><?php echo $fila['pratice'] ?></textarea>
                            </td>
                            <td class="celda" style="display:inline-grid">
                                <input type="text" name="text1" placeholder="Text 1" value="<?php echo $fila['text1'] ?>">
                                <input type="text" name="text2" placeholder="Text 2" value="<?php echo $fila['text2'] ?>">
                                <input type="text" name="text3" placeholder="Text 3" value="<?php echo $fila['text3'] ?>">
                            </td>
                            <td>
                                <input type="text" name="answer" placeholder="Answer" value="<?php echo $fila['answer'] ?>">
                                <p><?php echo $fila['format'] ?></p>
                                <input type="hidden" name="table" value="challenge">
                                <input type="hidden" name="idpratice" value="<?php echo $fila['idpratice'] ?>">
                            </td>
                            <td class="celda" style="display:grid">
                                <button type="submit" class="icon-edit"></button>
                                <button type="button" onclick="deleter('words',<?php echo $fila['idpratice'] ?>,'pratices','idpratice');" class='icon-trash'></button>
                            </td>
                        </form>

                    </tr>
                    <script>
                        $('#topic<?php echo $fila['idpratice'] ?>').submit(function() {
                            $.ajax({
                                type: 'POST',
                                url: '../adm/controller.php',
                                data: $(this).serialize(),
                                success: function(data) {
                                    $(".lblinformation").html(data);
                                    $(".lblinformation").show();
                                    setTimeout(function() {
                                        $(".lblinformation").hide()
                                    }, 3000);
                                }
                            });
                            return false;
                        });

                    </script>
                    <?php  }  //END WHILE CHALLENGE 
   ?>
                </table>
            </div>
        </div>
        <?php }//END IF CHALLENGE
            } //END IF TEST
            
        break; 
        case "frasalVerbs": 
            $res = mysqli_query($con,"SELECT * FROM phrasalverb WHERE idverb='".$_GET['id']."'");
            if(mysqli_num_rows($res) > 0 ){   
                while($fila=mysqli_fetch_array($res)){  ?>
        <form class="slideform" id="formFrasalVerbs">
            <h2>EDIT PHRASALVERB</h2>
            <input type="hidden" name="id" value="<?php echo $fila['idverb'] ?>">            
            <input type="text" name="en" placeholder="English" value="<?php echo $fila['fvenglish'] ?>">
            <input type="text" name="es" placeholder="Spanish" value="<?php echo $fila['fvspanish'] ?>">
            <textarea id="txtArea" ><?php echo $fila['fvdescription'] ?></textarea>
            <textarea name="des" id="txtdes" style="display:none" ></textarea>
            <input type="hidden" name="table" value="frasalVerbs">
            <select name="level" > 
                <option value="<?php echo $fila['fvlevel'] ?>" selected><?php echo $fila['fvlevel'] ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button type="submit">Edit</button>
            <button type="button" onclick="history.back();">Back</button>
        </form>
        <script>
        CKEDITOR.replace('txtArea');
          //ENVIA EL FORMULARIO VERBS                  
        $('#formFrasalVerbs').submit(function() {
            $('#txtdes').val(CKEDITOR.instances.txtArea.getData());
            $.ajax({
                type: 'POST',
                url: '../adm/controller.php',
                data: $(this).serialize(),
                success: function(data) {
                    $(".lblinformation").html(data);
                    $(".lblinformation").show();
                    setTimeout(function() {
                        $(".lblinformation").hide()
                    }, 3000);
                }
            });
            return false;
        });
        </script>
        <?php                                       
                } //END WHILE TEST 
            } //END IF VERBS
             
        break; 
            mysqli_free_result($res);
			 mysqli_close($con);
    }//END SWITCH ?>


    </div>
<br>
<br>
<br>
    <font align='center'>
        <div class="lblinformation"></div>
    </font>
    <script>
        //ENVIA EL FORMULARIO PHRASES                    
        $('#formVocabulary').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/controller.php',
                data: $(this).serialize(),
                success: function(data) {
                    $(".lblinformation").html(data);
                    $(".lblinformation").show();
                    setTimeout(function() {
                        $(".lblinformation").hide();
                        location.reload();
                    }, 3000);

                }
            });
            return false;
        }); //ENVIA EL FORMULARIO PHRASES                    

        //ENVIA EL FORMULARIO PHRASES                    
        $('#formPhrases').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/controller.php',
                data: $(this).serialize(),
                success: function(data) {
                    $(".lblinformation").html(data);
                    $(".lblinformation").show();
                    setTimeout(function() {
                        $(".lblinformation").hide()
                    }, 3000);
                }
            });
            return false;
        });

        //ENVIA EL FORMULARIO PHRASES                    
        $('#formVideos').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/controller.php',
                data: $(this).serialize(),
                success: function(data) {
                    $(".lblinformation").html(data);
                    $(".lblinformation").show();
                    setTimeout(function() {
                        $(".lblinformation").hide()
                    }, 3000);
                }
            });
            return false;
        });

        //ENVIA EL FORMULARIO TEST                   
        $('#formTest').submit(function() {
            $.ajax({
                type: 'POST',
                url: '../adm/controller.php',
                data: $(this).serialize(),
                success: function(data) {
                    $(".lblinformation").html(data);
                    $(".lblinformation").show();
                    setTimeout(function() {
                        $(".lblinformation").hide()
                    }, 3000);
                }
            });
            return false;
        });

        function deleter(type, id, table, idsql) {
            var eliminar = confirm('By clicking accept, all data linked to this content will be permanently deleted. \n\nAre you sure you want to delete?');
            if (eliminar) {
                $.ajax({
                    type: 'post',
                    url: '../adm/controller.php',
                    data: {
                        id: id,
                        table: table,
                        idsql: idsql
                    },
                    success: function(data) {
                        if (type == "words") {
                            location.reload();
                        } else {
                            location.href = 'main.php';
                        }
                    }
                });
                return false;
            }
        }

        function deletePost(id) {
            var eliminar = confirm('By clicking accept, all data linked to this content will be permanently deleted. \n\nAre you sure you want to delete?');
            if (eliminar) {
                $.ajax({
                    type: 'POST',
                    url: '../adm/manager.php',
                    data: {
                        deletePost: id
                    },
                    success: function(data) {
                        location.href = "../app/main.php";
                    }
                });
                return false;
            }
        }
    </script>
<?php include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>

</html>
<?php }else{ echo "no encontre nada"; } ?>
