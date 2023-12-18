<?php
// Acceso al archivo
require 'Conexion.php';

//Heredar sus atributos
class Vehiculo extends Conexion{

  //Este objeto almacena la conexion y se la dacilita a todos los metodos
  private $pdo;

  //almacenar la conexion en el objeto
  public function __CONSTRUCT(){
    $this->pdo = parent::getConexion();
  }

  //data es un arreglo asociativo que contiene los valores
  //requeridos por el SPU para registro de vehiculos
  public function add($data=[]){
    try{
      $consulta = $this->pdo->prepare("CALL spu_vehiculos_registrar(?,?,?,?,?,?,?)");
      $consulta->execute(
        array(
          $data['idmarca'],
          $data['modelo'],
          $data['color'],
          $data['tipocombustible'],
          $data['peso'],
          $data['afabricacion'],
          $data['placa']
        )
      );
      //Actualización, ahora retornamos el "idvehiculo"
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function search($data = []){
    try{
      //requiere numero de placa
      $consulta = $this->pdo->prepare("CALL spu_vehculos_buscar(?)");
      $consulta->execute(
        //obtiene la placa de la base de datos 
        array($data['placa'])
      );

      //devolver registro
      //fetch       : retorna la primera coicidencia (1)
      //fetchAll()  : retorna todas las coicidencias (n)
      //FECTCH_ASSOC: define el resultado como un objeto
      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function getResumenTipoCombustible(){
    try{
      $consulta = $this->pdo->prepare("CALL spu_resumen_tipocombustible()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}

//Prueba - Borrar
/* $vehiculo = new Vehiculo();
$registro = $vehiculo->search(["placa" => "ABC-111"]);
var_dump($registro); */

?>