<?php


class Conexion extends PDO
{

  public function __construct()
  {
    try {
      parent::__construct('sqlsrv:server=localhost;database=hardwareBD', 'usrAdmin', '12345');
    } catch (Exception $e) {
      echo 'Error al conectar: ' . $e->getMessage();
    }
  }

}
