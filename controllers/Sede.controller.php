<?php
require_once'../models/Sede.php';
//1. Recibe la solicitud
//2. Realiza una solicitud
//3. Entrega un resultado
$Sede = new Sede();

if(isset($_GET['operation'])){
  if ($_GET['operation']=='listar'){
    $resultado = $Sede->getAll();
    echo json_encode($resultado);
  }
}
if(isset($_GET['operation'])){
  if ($_GET['operation']=='contar'){
    $resultado = $Sede->getCantidad();
    echo json_encode($resultado);
  }
}
?>
