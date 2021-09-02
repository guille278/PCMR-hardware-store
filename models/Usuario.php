<?php


class Usuario
{
  private $idUsuario;
  private $usuario;
  private $password;
  private $tipo;
  private $estado;

  /**
   * @return mixed
   */
  public function getIdUsuario()
  {
    return $this->idUsuario;
  }

  /**
   * @param mixed $idUsuario
   */
  public function setIdUsuario($idUsuario)
  {
    $this->idUsuario = $idUsuario;
  }

  /**
   * @return mixed
   */
  public function getUsuario()
  {
    return $this->usuario;
  }

  /**
   * @param mixed $usuario
   */
  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }

  /**
   * @return mixed
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * @param mixed $password
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }

  /**
   * @return mixed
   */
  public function getTipo()
  {
    return $this->tipo;
  }

  /**
   * @param mixed $tipo
   */
  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

  /**
   * @return mixed
   */
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * @param mixed $estado
   */
  public function setEstado($estado)
  {
    $this->estado = $estado;
  }






}
