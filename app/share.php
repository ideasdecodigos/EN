<style>
.compartirEnRedes{
    text-align: center;
    }
 .compartirEnRedes a{
     text-decoration: none; 
        display: inline-block;
        padding: 5px;
        font-size: 1em; 
        margin: 2px 0;
        border-radius: 50%;
       color: #fff; 
        height: 25px;
        transition: .5s;
    }
        .compartirEnRedes > a:hover{background: rgba(0,0,0,.2); color: #333;}
     
    .icon-whatsapp{background-color: limegreen;} 
    .icon-facebook{background-color:darkblue;}
    .icon-twitter{background-color:darkturquoise;}
    .icon-linkedin{background-color:deepskyblue;}
    .icon-pinterest{background-color:#bc0404;}
    #sendcorreo{background-color:#80089b;}

</style>

   <?php 
    function compartir($titulo){ ?>
       
<div class="compartirEnRedes" >
        <h3 class="icon-share3"> Share</h3>
         <a style="color:#fff;" href="" title="Share it on Whatsapp" class="icon-whatsapp" id="whatsapp" data-action="share/whatsapp/share" target="_blank" ></a>
        <a style="color:#fff;" href="javascript:void(0)" title="Share it on FaceBook" class="icon-facebook" onclick="javascript:compartirEnRedes('http://www.facebook.com/sharer.php?u=')"></a>
        <a style="color:#fff;" href="javascript:void(0)" title="Share it on Twitter" class="icon-twitter" onclick="javascript:compartirEnRedes('http://twitter.com/share?text=<?php echo $titulo ?>&url=')"></a>
        <a style="color:#fff;" href="javascript:void(0)" title="Share it on Linkedin" class="icon-linkedin" onclick="javascript:compartirEnRedes('http://www.linkedin.com/shareArticle?mini=true&url=')"></a>
        <a style="color:#fff;" href="javascript:void(0)" title="Share it on Pinterest" class="icon-pinterest" onclick="javascript:shareTo('http://pinterest.com/pin/create/button/?url=','&media=../src/img/logo.png')"></a>
        <a style="color:#fff;" href="javascript:void(0)" title="Share it by Mail" class="icon-arroba" id="sendcorreo"></a>
</div>
    <script type="text/javascript">
            function compartirEnRedes(url){
                window.open(url + window.location.href,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            function shareTo(url,media){
                window.open(url + window.location.href + media,'sharer','toolbar=0,status=0,width=648,height=395');
                return true;
            }
            $(function() { 
                document.getElementById('sendcorreo').href = "mailto:?subject=<?php echo $titulo ?>&body=Visita el sitio: " + window.location.href;

          
                if (screen.width < 700){
                    document.getElementById('whatsapp').href = "whatsapp://send?text=<?php echo $titulo ?> "+window.location.href;
                }else{
                    document.getElementById('whatsapp').href = "https://web.whatsapp.com/send?text=<?php echo $titulo ?>" +window.location.href;
                }
            });

    </script>
<?php   
   }
?> 