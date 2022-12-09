<?php
include("Respuesta.php");


class Usuarios
{
  public $idusuarios;
  public $nombre;
  public $password;
  public $correo;
  public $idrol;
  public $idEstado;




  function Constructor($iduser, $name, $pass, $email, $rol)
  {
    $this->idusuarios = $iduser;
    $this->nombre = $name;
    $this->password = $pass;
    $this->correo = $email;
    $this->idrol = $rol;
  }
  function ConstructorSobrecargado($iduser, $name, $pass, $email, $rol, $idEstado)
  {
    $this->idusuarios = $iduser;
    $this->nombre = $name;
    $this->password = $pass;
    $this->correo = $email;
    $this->idrol = $rol;
    $this->idEstado = $idEstado;
  }
  function ConstructorSob($iduser, $name, $email, $rol)
  {
    $this->idusuarios = $iduser;
    $this->nombre = $name;
    $this->correo = $email;
    $this->idrol = $rol;
  }

  function SetAdd($iduser, $name, $pass, $email, $rol)
  {
    $this->idusuarios = $iduser;
    $this->nombre = $name;
    $this->password = $pass;
    $this->correo = $email;
    $this->idrol = $rol;
  }
  function Setup($iduser, $name, $pass, $email, $idEstado)
  {
    $this->idusuarios = $iduser;
    $this->nombre = $name;
    $this->password = $pass;
    $this->correo = $email;
    $this->idEstado = $idEstado;
  }

  function SetUser($user)
  {
    $this->nombre = $user;
  }

  function SetContra($pass)
  {
    $this->password = $pass;
  }

  function SetRol($rol)
  {
    $this->idrol = $rol;
  }
  function modificarUsuario($Conexion)
  {
    $Res = new Respuesta();

    if (trim($this->nombre) == "") {
      $Res->NoSucces("El nombre o usuario no puede ir en blanco");
    }
    if (trim($this->password) == "") {
      $Res->NoSucces("Ingrese una contraseña");
    } else {

      mysqli_query(
        $Conexion,
        "UPDATE  usuarios SET nombre='$this->nombre',password='$this->password',correo='$this->correo',idestado='$this->idEstado'
          where idusuarios='$this->idusuarios'"
      );
      if (mysqli_error($Conexion)) {

        $Res->NoSucces("Error al Editar");
      } else {
        $Res->Succes("Se edito Correctamente el usuario: " . $this->nombre);
      }
    }
    return $Res;
  }


  function InsertarUsuario($Conexion)
  {
    $Res = new Respuesta();

    if (trim($this->nombre) == "") {
      $Res->NoSucces("El nombre o usuario no puede ir en blanco");
    }
    if (trim($this->password) == "") {
      $Res->NoSucces("Ingrese una contraseña");
    } else {
      mysqli_query(
        $Conexion,
        "INSERT into usuarios (idusuarios, nombre, password, idrol, correo, idestado)
              values('$this->idusuarios','$this->nombre','$this->password','$this->idrol','$this->correo',1)"
      );
      if (mysqli_error($Conexion)) {

        $Res->NoSucces("Error al Insertar");
      } else {
        $Res->Succes("Se Inserto Correctamente el usuario: " . $this->nombre);
      }
    }
    return $Res;
  }





  function ObtenerUsuariosById($iduser, $Conexion)
  {
    $query = "SELECT idusuarios,nombre, password, correo,idrol,idestado from usuarios where nombre='$iduser' AND idestado=1";
    $result = mysqli_query($Conexion, $query);
    $Usuario = new Usuarios();
    if ($row = mysqli_fetch_array($result)) {

      $Usuario->ConstructorSobrecargado($row['idusuarios'], $row['nombre'], $row['password'], $row['correo'], $row['idrol'], $row['idestado']);
    }
    return  $Usuario;
  }

  function ObtenerPassByUser($user, $Conexion)
  {

    $query = "SELECT password, idrol from usuarios WHERE nombre=" . "'" . $user . "' AND idestado=1";
    $result = mysqli_query($Conexion, $query);
    $Usuario = new Usuarios();

    while ($row = mysqli_fetch_array($result)) {

      $Usuario->SetContra($row['password']);
      $Usuario->SetUser($user);
      $Usuario->SetRol($row['idrol']);
    }



    return $Usuario;
  }

  function BuscarUsuarios($Conexion)
  {
    $query = "SELECT u.idusuarios,u.nombre, u.correo, iu.rol FROM usuarios as u INNER JOIN rol iu on iu.idrol = u.idrol WHERE idestado=1";
    $listadetalle = array();
    $result = mysqli_query($Conexion, $query);
    while ($row = mysqli_fetch_array($result)) {
      $Usuario = new Usuarios();
      $Usuario->ConstructorSob($row[0], $row[1], $row['correo'], $row['rol']);
      $listadetalle[] = $Usuario;
    }
    return $listadetalle;
  }
}