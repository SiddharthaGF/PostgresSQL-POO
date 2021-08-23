<?php
$Datos_6 = new Func("Datos_6", function() use (&$document, &$CalculoPago) {
  $kilometros = get(call_method($document, "getElementById", "kilometraje"), "value");
  $pago = call($CalculoPago, $kilometros);
  set(call_method($document, "getElementById", "pago"), "innerHTML", _concat("\$ ", $pago));
  set(call_method($document, "getElementById", "impuesto"), "innerHTML", _concat("\$ ", to_number($pago) * 0.2));
});
$CalculoPago = new Func("CalculoPago", function($kilometros = null) use (&$suma) {
  $suma = 300000.0;
  if ($kilometros <= 1000.0 && $kilometros > 300.0) {
    $suma = _plus($suma, (to_number($kilometros) - 300.0) * 15000.0);
  }
  if ($kilometros > 1000.0) {
    $suma = _plus($suma, (to_number($kilometros) - 1000.0) * 10000.0);
  }
  return $suma;
});
