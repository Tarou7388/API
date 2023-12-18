<?php

require_once'../models/Marca.php';
//1. Recibe la solicitud
//2. Realiza una solicitud
//3. Entrega un resultado

if(isset($_GET['operation'])){
  $marca = new Marca();
  if ($_GET['operation']=='listar'){
    $resultado = $marca->getAll();
    echo json_encode($resultado);
  }
}