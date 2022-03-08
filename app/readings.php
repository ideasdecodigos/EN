
<?php  function readings($id){ ?> 
<h1>Listen aloud.</h1><hr>    
    <div class="controls">       
        <div class="range">
            <label for="volume" id="vlm">Volumen 1</label>
            <input type="range" max="1" min="0" step="0.1" value="1" id="volume" onchange="$('#vlm').text('Volume '+$(this).val());">
        </div>
        <div class="range">
            <label for="rate" id="rt">Velocidad 1</label>
            <input type="range" max="5" min="0" step="0.5" value="1" id="rate" onchange="$('#rt').text('Rate '+$(this).val());">
        </div>
        <div class="range">
            <label for="pitch" id="ptch">Tono 1</label>
            <input type="range" max="2" min="0" step="0.1" value="1" id="pitch" onchange="$('#ptch').text('Pitch '+$(this).val());">
        </div>
        <div class="range">
            <label for="language">Idioma</label>
            <select name="" id="language">
               <option value="es-ES">Spanish(Spain)</option>
                <option value="es-MX">Spanish(Mexico)</option>
                <option value="de-DE">German(Germany)</option>
                <option value="en-US" selected>English</option>
                <option value="en-AU">English(Australia)</option>
                <option value="it-IT">Italian</option>
                <option value="ar-EG">Arabic(Egypt)</option>
                <option value="pt-BR">Portuguese(Brazil)</option>
                <option value="zh-CN">Chinese</option>
                <option value="ar-SA">Arabic(Saudi Arabia)</option>
                <option value="bg-BG">Bulgarian</option>
                <option value="ca-ES">Catalan(Spain)</option>                
                <option value="fi-FI">Finnish</option>
                <option value="fr-CA">French</option>
                <option value="fr-FR">French(France)</option>
                <option value="he-IL">Hebrew(Israel)</option>
                <option value="hu-HU">Hungarian</option>
                <option value="hi-IN">Hindi(India)</option>
                <option value="id-ID">Hindonesian</option>
                <option value="ja-JP">Japansese</option>
                <option value="ko-KR">Korean</option>
                <option value="ms-MY">Malay</option>
                <option value="nb-NO">Norwegian</option>
                <option value="nl-NL">Dutch</option>
                <option value="nl-NL">Dutch</option>
                <option value="ro-RO">Romanian</option>
                <option value="ru-RU">Rusian</option>
                <option value="si-SI">Slovenian</option>
                <option value="sv-SE">Swedish</option>
                <option value="ta-IN">Tamil(India)</option>
                <option value="th-TH">Thai</option>
                <option value="tr-TR">Turkish</option>
                <option value="vi-VN">Vietnamese</option>
                <option value="vi-VN">Vietnamese</option>
            </select>
        </div>
    </div> 
    <div class="buttons">
        <button class="icon-volume" onclick="read($('#text').text(),$('#language').val(),$('#volume').val(),$('#rate').val(),$('#pitch').val());">Listen</button>
        <button class="icon-volumedown" onclick="pause();">Pause</button>
        <button class="icon-volumeup" onclick="resume();">Resume</button>
        <button class="icon-mute" onclick="stop();">Stop</button>
        <button class="icon-up" onclick="$('.controls').slideToggle();$(this).toggleClass(' icon-down');"></button>
        <button class="icon-play-circle" onclick="textoAvoz($('span.icon-soundalt').click());"></button>
    </div>
   
<?php 
    include("../adm/connection.php");         
    $res = mysqli_query($con, "SELECT * FROM contents WHERE idcontent=".$id.""); 
     if(mysqli_num_rows($res) > 0){
        while($fila=mysqli_fetch_array($res)){ 
            $category=$fila['categories']; ?>
           
             <div class="contents" id="text">
                 <strong> <font size="+2" color="darkblue"><?php echo $fila['topic'] ?></font></strong>
                 <br><hr><br>
                 <?php 
                    if (strpos($fila['description'], "[..") !== false){
                        echo "<script> $('button.icon-play-circle').show(); </script>";
                    }else{
                        echo "<script> $('button.icon-play-circle').hide(); </script>";
                    }
                 
                    $description = str_replace("[.."," <span lang='en' translate='no' class='icon-soundalt' onclick='textoAvoz(this);'> ", $fila['description']); 
                    $description = str_replace("..]","</span> ",$description); 
                    echo $description; 
                 ?>
             </div> 
              <script>
                  $(function() {
                      $('.controls').slideToggle();
                  });

                  function textoAvoz(tagTxt) {
                      $(tagTxt).css({
                          'background': 'lime',
                      });
                      stop();
                      read($(tagTxt).text() + ". ...", 'en-US', null, null, null);
                      setTimeout(function() {
                          $(tagTxt).css({
                              'background': 'none'
                          });
                      }, 3000);
                  }
              </script>
<?php 
            include("../adm/functions.php");  
            comments("readings",$category);                                     
        }  
    }
}
?>        
