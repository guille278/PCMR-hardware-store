<?php

require_once 'Persona.php';
require_once 'Conexion.php';

class Empleado extends Persona
{

  private $idEmpleado;
  private $puesto;

  /**
   * @return mixed
   */
  public function getIdEmpleado()
  {
    return $this->idEmpleado;
  }

  /**
   * @param mixed $idEmpleado
   */
  public function setIdEmpleado($idEmpleado)
  {
    $this->idEmpleado = $idEmpleado;
  }

  /**
   * @return mixed
   */
  public function getPuesto()
  {
    return $this->puesto;
  }

  /**
   * @param mixed $puesto
   */
  public function setPuesto($puesto)
  {
    $this->puesto = $puesto;
  }


  public function Alta()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('p_registroUsuario :usuario, :pass, :tipo)');
      $pdo->bindValue(':usuario', $this->getUsuario());
      $pdo->bindValue(':pass', $this->getPassword());
      $pdo->bindValue(':tipo', 'empleado');
      $pdo->execute();
      $idUsuario = $conn->lastInsertId();
      $pdo = $conn->prepare('p_registroEmpleado :nombre, :apellidoP, :apellidoM, :direccion, :telefono, :puesto, :idUsuario');
      $pdo->bindValue(':nombre', $this->getNombre());
      $pdo->bindValue(':apellidoP', $this->getApellidoP());
      $pdo->bindValue(':apellidoM', $this->getApellidoM());
      $pdo->bindValue(':direccion', $this->getDireccion());
      $pdo->bindValue(':telefono', $this->getTelefono());
      $pdo->bindValue(':puesto', $this->getPuesto());
      $pdo->bindValue(':idUsuario', $idUsuario);
      $pdo->execute();

      $conn = null;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
  }


  function Modificar()
  {
    try {

      $pdo = new Conexion();
      $query = $pdo->prepare("SELECT e.*, u.* FROM empleado e JOIN usuario u ON e.idUsuario = u.idUsuario WHERE idEmpleado=" . $this->getIdEmpleado() . ";");
      $query->execute();
      $resultado = $query->fetchAll();
      foreach ($resultado as $value) {
        $this->setIdEmpleado($value['idEmpleado']);
        $this->setNombre($value['nombre']);
        $this->setApellidoP($value['apellidoP']);
        $this->setApellidoM($value['apellidoM']);
        $this->setDireccion($value['direccion']);
        $this->setTelefono($value['telefono']);
        $this->setPuesto($value['puesto']);
        $this->setIdUsuario($value['idUsuario']);
        $this->setUsuario($value['usuario']);
        $this->setPassword($value['password']);
      }
    } catch (PDOException $e) {
      echo $query . "<br>" . $e->getMessage();
    }

    $pdo = null;
  }

  function ModificarGuardar()
  {
    try {

      $pdo = new Conexion();
      $query = $pdo->prepare("UPDATE empleado"
        . " SET nombre = :nombre,"
        . " apellidoP = :apellidoP,"
        . " apellidoM = :apellidoM,"
        . " direccion = :direccion,"
        . " telefono = :telefono,"
        . " puesto = :puesto WHERE idEmpleado = :idEmpleado;");
      $query->bindValue(':nombre', $this->getNombre());
      $query->bindValue(':apellidoP', $this->getApellidoP());
      $query->bindValue(':apellidoM', $this->getApellidoM());
      $query->bindValue(':direccion', $this->getDireccion());
      $query->bindValue(':telefono', $this->getTelefono());
      $query->bindValue(':puesto', $this->getPuesto());
      $query->bindValue(':idEmpleado', $this->getIdEmpleado());
      $query->execute();
    } catch (PDOException $e) {
      echo $query . "<br>" . $e->getMessage();
    }

    $pdo = null;
  }


  function Consulta()
  {
    $pdo = new Conexion();
    $query = $pdo->prepare('SELECT e.*, u.* FROM empleado e JOIN usuario u ON e.idUsuario = u.idUsuario WHERE u.estado = 1');
    $query->execute();
    $resultado = $query->fetchAll();
    foreach ($resultado as $key => $value) {
      $modificar = '<a href="Modificar.php?id=' . $value['idEmpleado'] . '" class="btn btn-primary">Modificar</a>';
      $empleado[$key] = array(
        $value['idEmpleado'],
        $value['nombre'],
        $value['apellidoP'],
        $value['apellidoM'],
        $value['direccion'],
        $value['telefono'],
        $value['puesto'],
        $modificar
      );
    }
    return $empleado;
  }
}
