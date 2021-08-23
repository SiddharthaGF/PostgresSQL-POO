<?php
$Datos_5 = new Func("Datos_5", function() use (&$document, &$General) {
  $a = get(call_method($document, "getElementById", "ax2"), "value");
  $b = get(call_method($document, "getElementById", "bx"), "value");
  $c = get(call_method($document, "getElementById", "c"), "value");
  $raices = call($General, $a, $b, $c);
  set(call_method($document, "getElementById", "x1"), "innerHTML", get($raices, 0.0));
  set(call_method($document, "getElementById", "x2"), "innerHTML", get($raices, 1.0));
});
$General = new Func("General", function($a = null, $b = null, $c = null) use (&$Math, &$alert) {
  $discrimiante = call_method($Math, "sqrt", to_number(call_method($Math, "pow", $b, 2.0)) - 4.0 * to_number($a) * to_number($c));
  if ($discrimiante >= 0.0) {
    $x1 = _divide(_plus(_negate($b), $discrimiante), 2.0 * to_number($a));
    $x2 = _divide((_negate($b) - to_number($discrimiante)), 2.0 * to_number($a));
    return new Arr(call_method($x1, "toFixed", 4.0), call_method($x2, "toFixed", 4.0));
  } else {
    call($alert, "El discrimiante es menor a 0, no existe una soluci\xC3\xB3n para la funci\xC3\xB3n");
    return Object::$null;
  }
});
