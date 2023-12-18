<?php
require_once '../models/Empleado.php';
if (isset($_POST['operacion'])) {
  //Instanciar la clase
  $empleado = new Empleado();
  if ($_POST['operacion'] == 'search') {
    $respuesta = $empleado->search(["idempleado" => $_POST['idempleado']]);


    sleep(2);
    echo json_encode($respuesta);
  }
  //nuevo proceso
  if ($_POST['operacion'] == 'searchAll') {
    $resultado = $empleado->searchAll("");
    echo json_encode($resultado);
  }
  if ($_POST['operacion'] == 'add') {
    //Almacenar los datos recibiendo de la vista en un arreglo
    $datosRecibidos = [
      "idsede"            => $_POST["idsede"],
      "apellidos"         => $_POST["apellidos"],
      "nombres"           => $_POST["nombres"],
      "nrodocumento"      => $_POST["nrodocumento"],
      "fechanac"          => $_POST["fechanac"],
      "telefono"          => $_POST["telefono"]
    ];


    //Enviamos el arreglo como un parámetro del método add
    $idobtenido = $empleado->add($datosRecibidos);
    echo json_encode($idobtenido);
  }
}
