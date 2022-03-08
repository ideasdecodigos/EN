//OPEN AN WINDOW BY DEFAULT  
$(function () {
    $("#default").click();
    verifyCookies();

});
/********Read aloud block begin**********/
var msg;
var voices;
//this function is the one reads the text aloud
// es-ES español | en-US ingles usa |  en-GB ingles uk |  fr-FR frances it-IT italiano de-DE deutsch ja-JP japones
function read(textAloud, lang, volume, rate, pitch) {
    if (volume == null) {
        volume = 1;
    }
    if (rate == null) {
        rate = 1;
    } 
    if (pitch == null) {
        pitch = 1;
    }
    msg = new SpeechSynthesisUtterance();
    voices = window.speechSynthesis.getVoices();
    msg.voice = voices[10]; 
    msg.voiceURI = 'native';
    msg.volume = volume;
    msg.rate = rate;
    msg.pitch = pitch;
    msg.text = textAloud;
    msg.lang = lang;
    speechSynthesis.speak(msg);
}

function pause() {
    speechSynthesis.pause(msg);
}

function resume() {
    speechSynthesis.resume(msg);
}

function stop() {
    speechSynthesis.cancel(msg);
}
/********Read aloud block end**********/

//############NOTIFICACIONES#############
function notifications(body) {
    Push.Permission.request();

    Push.create("Hemos publicado nuevo contenido!", {
        body: body,
        icon: '../src/en4es68.png',
        timeout: 5000,
        vibrate: [100, 100, 100],
        onClick: function () {
            window.focus();
            window.location.href = "https://en4es.com/en/main.php";
            this.close();
        }
    });
    Push.clear();
}


//OPEN AND CLOSE EVERY WINDOWS
function openwindows(btn, tagshow) {
    $('.divtab').css({
        'display': 'none'
    });
    $(tagshow).css({
        'display': 'block'
    });
    $('.btn').removeClass('active');
    $(btn).addClass('active');
}

//ALERTA DE COOKIES 
function aceptarCookies() {
    localStorage.aceptarCookies = 'true';
    $("#cajacookies").hide();
}

function verifyCookies() {
    if (localStorage.aceptarCookies == 'true') {
        $("#cajacookies").hide();
    }
    setTimeout(function () {
        $("#cajacookies").hide();
    }, 10000);
}

    //AGREGA UNA CLASE A LOS ELEMENTOS
function myscroll(elements, clase, num) {
    //captura todos los eslementos con x clase
    var elements = document.getElementsByClassName(elements);
    var top = window.pageYOffset; //captura el alto del documento
    var alto = window.outerHeight; //captura el alto de la ventana

   for (i = 0; i < elements.length; i++) { //va selecionando cada elemento con la clase x
        if (top > (elements[i].offsetTop - alto + num)) { //si el elemento es visible en el veiwport
            if (i > 3) { //inicia agregar la clase al 4ta elemento
                elements[i].classList.add(clase);
            }
        } else { //queta la calse de los elementos mostrados
            elements[i].classList.remove(clase);
        }
    }
}
    
