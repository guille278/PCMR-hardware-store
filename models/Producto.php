<?php

require_once 'Conexion.php';

class Producto
{


  private $idProducto;
  private $imagen;
  private $nombre;
  private $marca;
  private $descripcion;
  private $precio;
  private $stock;
  private $estado;
  private $categoria;

  /**
   * @return mixed
   */
  public function getIdProducto()
  {
    return $this->idProducto;
  }

  /**
   * @param mixed $idProducto
   */
  public function setIdProducto($idProducto)
  {
    $this->idProducto = $idProducto;
  }

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
  public function getMarca()
  {
    return $this->marca;
  }

  /**
   * @param mixed $marca
   */
  public function setMarca($marca)
  {
    $this->marca = $marca;
  }

  /**
   * @return mixed
   */
  public function getDescripcion()
  {
    return $this->descripcion;
  }

  /**
   * @param mixed $descripcion
   */
  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;
  }

  /**
   * @return mixed
   */
  public function getPrecio()
  {
    return $this->precio;
  }

  /**
   * @param mixed $precio
   */
  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }

  /**
   * @return mixed
   */
  public function getStock()
  {
    return $this->stock;
  }

  /**
   * @param mixed $stock
   */
  public function setStock($stock)
  {
    $this->stock = $stock;
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

  /**
   * @return mixed
   */
  public function getCategoria()
  {
    return $this->categoria;
  }

  /**
   * @param mixed $categoria
   */
  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;
  }

  /**
   * @return mixed
   */
  public function getImagen()
  {
    return $this->imagen;
  }

  /**
   * @param mixed $imagen
   */
  public function setImagen($imagen)
  {
    $this->imagen = $imagen;
  }




  public function consultaTodo()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('SELECT * FROM v_productoTodo');
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $producto[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombre' => $value['nombre'],
          'marca' => $value['marca'],
          'descripcion' => $value['descripcion'],
          'precio' => '$' . number_format($value['precio'], 2, '.', ','),
          'stock' => $value['stock'],
          'estado' => $value['estado'],
          'categoria' => $value['categoria']
        );
      }

      return $producto;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function consultaCategoria($categoria)
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_productoCategoria :categoria');
      $pdo->bindValue(':categoria', $categoria);
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $producto[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombre' => $value['nombre'],
          'marca' => $value['marca'],
          'descripcion' => $value['descripcion'],
          'precio' => '$' . number_format($value['precio'], 2, '.', ','),
          'stock' => $value['stock'],
          'estado' => $value['estado'],
          'categoria' => $value['categoria']
        );
      }
      return $producto;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }

  public function consultaNuevo()
  {
    try {
      $con = new Conexion();
      $pdo = $con->prepare('SELECT * FROM v_nuevoProducto');
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $productos[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombre' => $value['nombre'],
          'marca' => $value['marca'],
          'descripcion' => $value['descripcion'],
          'precio' => '$' . number_format($value['precio'], 2, '.', ','),
          'stock' => $value['stock'],
          'estado' => $value['estado'],
          'categoria' => $value['categoria']
        );
      }

      return $productos;
    } catch (Exception $e) {
      echo 'Error de consulta: ' . $e->getMessage();
    }
    $pdo = null;
  }


  public function consultaDetalle()
  {
    try {
      $conn = new Conexion();
      $pdo = $conn->prepare('EXECUTE p_productoDetalle :idProducto');
      $pdo->bindValue(':idProducto', $this->getIdProducto());
      $pdo->execute();
      $resultado = $pdo->fetchAll();
      foreach ($resultado as $key => $value) {
        $detalle[$key] = array(
          'idProducto' => $value['idProducto'],
          'imagen' => $value['imagen'],
          'nombre' => $value['nombre'],
          'marca' => $value['marca'],
          'descripcion' => $value['descripcion'],
          'precio' => '$'.number_format($value['precio'], 2, '.', ','),
          'stock' => $value['stock']
        );
      }

      return $detalle;
    } catch (Exception $e) {
      echo 'Error en la consulta: ' . $e->getMessage();
    }
  }


  function productoAlta()
  {
    try {

      $pdo = new Conexion();
      $query = $pdo->prepare("INSERT INTO producto(nombre,imagen,marca,
      descripcion, precio, stock,categoria) VALUES ('" . $this->getNombre() . "',
      '" . $this->getImagen() . "',
      '" . $this->getMarca() . "',
      '" . $this->getDescripcion() . "',
      '" . $this->getPrecio() . "',
      '" . $this->getStock() . "',
      '" . $this->getCategoria() . "');");


      $query->execute();
    } catch (PDOException $e) {
      echo $query . "<br>" . $e->getMessage();
    }

    $pdo = null;
  }

  function productoModificar()
  {
    try {

      $pdo = new Conexion();
      $query = $pdo->prepare("SELECT * FROM producto WHERE idProducto=" . $this->getIdProducto() . ";");
      $query->execute();
      $resultado = $query->fetchAll();
      foreach ($resultado as $value) {
        $this->setIdProducto($value['idProducto']);
        $this->setImagen($value['imagen']);
        $this->setNombre($value['nombre']);
        $this->setMarca($value['marca']);
        $this->setDescripcion($value['descripcion']);
        $this->setPrecio($value['precio']);
        $this->setStock($value['stock']);
        $this->setEstado($value['estado']);
        $this->setCategoria($value['categoria']);
      }
    } catch (PDOException $e) {
      echo $query . "<br>" . $e->getMessage();
    }

    $pdo = null;
  }

  function productoModificarGuardar()
  {
    try {

      $pdo = new Conexion();
      $query = $pdo->prepare("UPDATE producto"
        . " SET imagen = :imagen,"
        . " nombre = :nombre,"
        . " marca = :marca,"
        . " descripcion = :descripcion,"
        . " precio = :precio,"
        . "stock = :stock,"
        . "estado = :estado,"
        . "categoria = :categoria
              WHERE idProducto = :id_p;");
      $query->bindValue(':imagen', $this->getImagen());
      $query->bindValue(':nombre', $this->getNombre());
      $query->bindValue(':marca', $this->getMarca());
      $query->bindValue(':descripcion', $this->getDescripcion());
      $query->bindValue(':precio', $this->getPrecio());
      $query->bindValue(':stock', $this->getStock());
      $query->bindValue(':estado', $this->getEstado());
      $query->bindValue(':categoria', $this->getCategoria());
      $query->bindValue(':id_p', $this->getIdProducto());
      $query->execute();
    } catch (PDOException $e) {
      echo $query . "<br>" . $e->getMessage();
    }

    $pdo = null;
  }

  function productoConsulta()
  {
    $pdo = new Conexion();
    $query = $pdo->prepare('SELECT * FROM producto where estado=1;');
    $query->execute();


    $resultado = $query->fetchAll();

    foreach ($resultado as $key => $value) {
      $modificar = '<a href="productoModificar.php?id=' . $value['idProducto'] . '"class="btn btn-primary">Modificar</a>';
      /* $eliminar = '<a href="productoEliminar.php?id=' . $value['id_p'] . '"class="btn btn-danger">Eliminar</a>';*/
      $producto[$key] = array(
        $value['idProducto'],
        $value['imagen'],
        $value['nombre'],
        $value['marca'],
        $value['descripcion'],
        '$' . number_format($value['precio'], 2, '.', ','),
        $value['stock'],
        $value['categoria'],
        $modificar
        /*$eliminar*/


      );
    }

    return $producto;
  }
}
