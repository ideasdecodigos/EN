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
    <meta name="keywords" content="english,ingles,spanish,español,languages,idiomas,usa,us,states, unnites">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="Juan C. Paniagua R.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="google" value="notranslate">
    <link rel="shortcut icon" href="../src/logot.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../src/logot.png" type="image/x-icon">
    <title>contents</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/test.css">
        <link rel="stylesheet" href="../css/temaforo.css"> 

    <link rel="stylesheet" href="../css/comments.css">
    <link rel="stylesheet" href="../src/icons/styles.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php include("menu.php");?>
       <div class="container"> 
    <?php  
            if(isset($_GET["idtext"])) {  
                switch($_GET['type']){ 		
                    case "vocabulary":
                       include("vocabulary.php"); vocabulary($_GET['idtext']);
                    break;
                    case "conversation": 
                       include("conversation.php"); conversation($_GET['idtext']);
                    break;
                   case "readings":
                       include("readings.php"); readings($_GET['idtext']);
                    break;
                   case "grammar":
                       include("readings.php"); readings($_GET['idtext']);
                    break;
                    case "expressions":
                        include("phrases.php"); phrases($_GET['idtext']);
                    break; 
                    case "videos":
                        include("videos.php"); videos($_GET['idtext']);
                    break;
                    case "foro":
                        include("foroview.php"); foro($_GET['idtext']);
                    break;
                    default:                       
                        include("exam.php"); tests($_GET['level']);
                }//end switch            
            }//end if get ?>    
        </div>        
          <?php include("footer.php"); include("options.php"); ?>
    <script src="../js/script.js"></script>
</body>
</html>
