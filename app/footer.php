
    <footer>

    <div class="redes">
        <a href="https://www.facebook.com/ideas.decodigos.3" target="_blank" title="Follow me in FaceBook"><img src="../src/facebook.png" alt="facebook"></a>
        <a href="https://www.instagram.com/ideasdcodigos/" target="_blank" title="Follow me in Instagram"><img src="../src/instagram.png" alt="instagram"></a>
        <a href="https://twitter.com/de_ideas" target="_blank" title="Follow me in Twitter"><img src="../src/twitter.png" alt="twitter"></a>
        <a href="https://www.youtube.com/channel/UCwN59VLiuiL_GMX3fHTOf_A" target="_blank" title="Follow me in YouTube"><img src="../src/youtube.png" alt="youtube"></a>
    </div>
    
		<form id="formboletin">
		    <font>¡Suscríbete a nuestro boletín!</font>
            <p>Queremos mantenerte informado por email de todo el contenido que subimos.</p>
			<div class="con-text"> 				
				<input type="email" name="email" placeholder="E-mail@ejemplo.com" required>
				<input type="submit" name="suscribe" value="Suscribirse">
			</div>
		</form>
		<script>        
         //ENVIA EL FORMULARIO PHRASES                    
            $('#formboletin').submit(function() {
                $.ajax({
                    type: 'POST',
                    url: '../adm/boletin.php',
                    data: $(this).serialize(), 
                    success: function(data) {                        
                        alert(data);                     
                        document.getElementById('formboletin').reset();
                    }
                });
                return false;
            }); 
        </script>
<br>
    <p>Copy rights © 2020 | All rights reserved IDCSchool</p>
    <i>en4es.com | Desarrollado por Juan Paniagua</i>
    <div id="subir">
        <a href="#top" class="icon-up" title="Back to top"></a>
    </div>

    <br>
    <hr>
    <br>
    <p >
        <a href="terms.php" target="_blank">Terms and Conditions</a> |
        <a href="privacy.php" target="_blank">Privacy Policy</a> |
        <a lang="en" translate="no" target="_blank" href="https://es.wikipedia.org/wiki/Cookie_(inform%C3%A1tica)">Cookies</a>
    </p>
<br>
<br>
</footer>
