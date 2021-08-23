<?php
$iniciar = new Func("iniciar", function($event = null) use (&$respuesta) {
  for ($i = get($event, "resultIndex"); $i < get(get($event, "results"), "length"); $i++) {
    set($respuesta, "innerHTML", get(get(get(get($event, "results"), $i), 0.0), "transcript"));
  }
});
$CapturarTexto = new Func("CapturarTexto", function() use (&$boton, &$boton_13, &$rec_13, &$iniciar, &$respuesta_1, &$respuesta_2, 
                                                           &$window, &$alert, &$rec, &$webkitSpeechRecognition, &$respuesta) {
  if (get($boton, "value") === "Escuchar") {
    if (get($boton_13, "value") === "Detener") {
      call_method($rec_13, "stop");
      call_method($rec_13, "removeEventListener", "result", $iniciar);
      set(get($boton_13, "style"), "backgroundColor", "#1e90ff");
      set($boton_13, "value", "Escuchar");
      set($respuesta_1, "innerHTML", "Clic para empezar a escuchar");
      set($respuesta_2, "innerHTML", "");
    }
    if (!_in("webkitSpeechRecognition", $window)) {
      call($alert, "App no compatible,use otro navegador");
    } else {
      $rec = _new($webkitSpeechRecognition);
      set($rec, "lang", "es-EC");
      set($rec, "continuous", true);
      set($rec, "interim", true);
      call_method($rec, "addEventListener", "result", $iniciar);
      call_method($rec, "start");
      set(get($boton, "style"), "backgroundColor", "#FF0000");
      set($boton, "value", "Detener");
      set($respuesta, "innerHTML", "Escuchando...");
    }

  } else {
    call_method($rec, "stop");
    call_method($rec, "removeEventListener", "result", $iniciar);
    set(get($boton, "style"), "backgroundColor", "#1e90ff");
    set($boton, "value", "Escuchar");
    set($respuesta, "innerHTML", "Clic para empezar a escuchar");
  }

});
$boton = call_method($document, "querySelector", "#capturar_12");
$respuesta = call_method($document, "querySelector", "#texto");
