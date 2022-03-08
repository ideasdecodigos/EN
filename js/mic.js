 //################### ZONA DE SPEAK ALOUD########################
        var rec;
        if (!("webkitSpeechRecognition" in window)) {
            alert("API no soportada!");
        } else {
            rec = new(window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
            rec.lang = 'en-US';
            rec.continuous = true;
            //rec.interim=true; //no escribe en tiempo real
            rec.interimResults = true; 
            rec.addEventListener("result", iniciar);
        }

        function iniciar(event) {
            for (i = event.resultIndex; i < event.results.length; i++) {
                $(".txtrecord").append( event.results[i][0].transcript);
            }
        }

        rec.onend = function() {
            $('#txtinfo').text('Voice recognition disabled!');
//            compare();
        }

        rec.onerror = function(event) {
            $('#txtinfo').text("error");
            if (event.error == 'no-speech') {
                $('#txtinfo').text('No speech was detected. Try again.');
            }
        }

        //boton que ejecuta el microfono
        $('.btnSpeak').click(function() {
            alert("on");
                rec.start();
        });
