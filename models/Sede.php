<?php
require_once 'Conexion.php';

class Sede extends Conexion{

  private $pdo;

  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }

  public function getAll(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_buscar_sede()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  public function getCantidad(){
    try{
      $consulta = $this->pdo->prepare("CALL SPU_CANTIDAD_EMPLEADOS_SEDE()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

}

/* $Sede=new Sede();
$resultado = $Sede->getCantidad();
$resultado2 = $Sede->getAll();
echo json_encode($resultado);
echo json_encode($resultado2); */