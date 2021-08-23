<?php
$PadLeft = new Func("PadLeft", function($value = null, $length = null) {
  $PadLeft = Func::getCurrent();
  return get(call_method($value, "toString"), "length") < $length ? call($PadLeft, _concat("0", $value), $length) : $value;
});
$Datos = new Func("Datos", function() use (&$document, &$ValidarAlturaProyeccion, &$CalcAngulo, &$AnguloHorasMinutos, &$AnguloToHora) {
  $altura = get(call_method($document, "getElementById", "altura"), "value");
  $proyeccion = get(call_method($document, "getElementById", "proyeccion"), "value");
  if (is(call($ValidarAlturaProyeccion, $altura, $proyeccion))) {
    $angulo = call($CalcAngulo, $altura, $proyeccion);
    set(call_method($document, "getElementById", "angulo"), "innerHTML", call($AnguloHorasMinutos, $angulo));
    set(call_method($document, "getElementById", "hora"), "innerHTML", call($AnguloToHora, $angulo));
  }
});
$ValidarAlturaProyeccion = new Func("ValidarAlturaProyeccion", function($altura = null, $proyeccion = null) use (&$document, &$alert) {
  if ($proyeccion < 0.0) {
    set(call_method($document, "getElementById", "proyeccion"), "value", "0");
    call($alert, "No se puede ingresar valores negativos");
    return false;
  }
  if ($proyeccion > 1000000.0) {
    set(call_method($document, "getElementById", "proyeccion"), "value", "1000000");
    call($alert, "No se puede ingresar mayores a 1 mill\xC3\xB3n");
    return false;
  }
  if ($altura < 1.0) {
    set(call_method($document, "getElementById", "altura"), "value", "1");
    call($alert, "La altura no puede ser 0");
    return false;
  }
  if ($altura > 1000000.0) {
    set(call_method($document, "getElementById", "altura"), "value", "1000000");
    call($alert, "No se puede ingresar mayores a 1 mill\xC3\xB3n");
    return false;
  }
  return true;
});
$AnguloHorasMinutos = new Func("AnguloHorasMinutos", function($grados = null) use (&$parseInt, &$Math, &$PadLeft) {
  $minutos = (to_number($grados) - to_number(call($parseInt, $grados))) * 60.0;
  $segundos = (to_number($minutos) - to_number(call($parseInt, $minutos))) * 60.0;
  return _concat(call_method($Math, "trunc", $grados), "\xC2\xB0 ", call($PadLeft, call_method($Math, "trunc", $minutos), 2.0), "' ", call($PadLeft, call_method($Math, "trunc", $segundos), 2.0), "''");
});
$AnguloToHora = new Func("AnguloToHora", function($angulo = null) use (&$document, &$parseInt, &$PadLeft, &$Math) {
  $hora = is(get(call_method($document, "getElementById", "este"), "checked")) ? _plus(6.0, _divide($angulo, 15.0)) : (18.0 - _divide($angulo, 15.0));
  $minutos = (to_number($hora) - to_number(call($parseInt, $hora))) * 60.0;
  $segundos = (to_number($minutos) - to_number(call($parseInt, $minutos))) * 60.0;
  return _concat(call($PadLeft, call_method($Math, "trunc", $hora), 2.0), ":", call($PadLeft, call_method($Math, "trunc", $minutos), 2.0), "' ", call($PadLeft, call_method($Math, "trunc", $segundos), 2.0), "''");
});
$CalcAngulo = new Func("CalcAngulo", function($altura = null, $base = null) use (&$Math) {
  return to_number(call_method($Math, "atan", _divide($altura, $base))) * _divide(180.0, get($Math, "PI"));
});
