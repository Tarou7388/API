<?php

//Variables
$apellidos = "FRANCIA MINAYA";
$nombres= "Jhon Edward";

//constantes
define("DNI", "45406071");

//echo $apellidos . $nombres . DNI;

//Arreglo 1 UNI_DIMENCIONAL
$amigos = array("Karina", "Melissa", "Vania", "Emily", "Sheyla");

//arreglo 2 UNI_DIMENCIONAL
$paises = ["Perú", "Argentina", "#Venezuela", "Brasil"];

//forma1
/* var_dump ($amigos); */

//forma2
/* foreach($amigos as $amigo){
  echo $amigo;
} */

//arreglo 3 MULTI_DIMENCIONAL
$softwate=[
  ["Eset", "Avast", "Windows Defender", "Avira", "Karspesky"],
  ["WarZone", "GOW", "FreeFire", "Pepsiman", "MarioBross"],
  ["VSCode", "NetBeans", "AndroidStudio", "PSeint"]
];

/* foreach($softwate as $softwate1){
  foreach($softwate1 as $softwate2){
    echo $softwate2 . "<br>";
  }
}
 */
/* echo $softwate[0][3] . "<br>";
echo $softwate[2][0] . "<br>";
echo $softwate[2][2] . "<br>";
echo $softwate[1][0] . "<br>";
 */

//arreglo 4 Asociativo

$catalogo = [
  "so" => "windows 10",
  "antivirus" => "Panda",
  "utilitario" => "WinRAR",
  "videojuego" => "MarioBross"
];

/* echo $catalogo["utilitario"]; */

//arreglo 5 MULTI_DIMENCIONAL+ Asociativo

$desarrollador =[
  "datosPersonales" => [
    "apellidos" => "Matta Ramos",
    "nombres"   => "Jesús Eduardo",
    "edad"      => 18,
    "telefono"  => ["789456123", "987654321"]
  ],
  "formacion"       => [
    "inicial"   => ["Los terribles"],
    "primaria"  => ["Eso Tilin"],
    "secundaria" => ["Insanos", "Maranguita School"]
  ],
  "habilidades"     => [
    "bd"        => ["MySQL", "MSSQL", "MongoSQL"],
    "frameworks"=> ["Laravel", "CodeIgniter", "Hibernite", "ZEND"]
  ]
];

/* echo "<pre>";
var_dump($desarrollador);
"</pre>"; */

echo json_encode($desarrollador);