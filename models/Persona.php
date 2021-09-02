<?php

require_once 'Usuario.php';

class Persona extends Usuario
{

  private $nombre;
  private $apellidoP;
  private $apellidoM;
  private $direccion;
  private $telefono;
  private $email;

  /**
   * @return mixed
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * @param mixed $nombre
   */
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  /**
   * @return mixed
   */
  public function getApellidoP()
  {
    return $this->apellidoP;
  }

  /**
   * @param mixed $apellidoP
   */
  public function setApellidoP($apellidoP)
  {
    $this->apellidoP = $apellidoP;
  }

  /**
   * @return mixed
   */
  public function getApellidoM()
  {
    return $this->apellidoM;
  }

  /**
   * @param mixed $apellidoM
   */
  public function setApellidoM($apellidoM)
  {
    $this->apellidoM = $apellidoM;
  }

  /**
   * @return mixed
   */
  public function getDireccion()
  {
    return $this->direccion;
  }

  /**
   * @param mixed $direccion
   */
  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  /**
   * @return mixed
   */
  public function getTelefono()
  {
    return $this->telefono;
  }

  /**
   * @param mixed $telefono
   */
  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }



}
