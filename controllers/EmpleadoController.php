<?php
  include("Respuesta.php");
  class Empleado{
    public $Idempleados;
    public $Nombre;
    public $Apellido;
    public $Identidad;
    public $FechaContratacion;
    public $Direccion;
    public $Telefono;
    public $IdCargo;
    public $Idusuarios;

    function ConstructorSobrecargado($idempleados, $nombre, $apellido, $identidad, $fechaContratacion, $direccion, $telefono, $idCargo, $idusuarios){
      $this->Idempleados=$idempleados;
      $this->Nombre=$nombre;
      $this->Apellido=$apellido;
      $this->Identidad=$identidad;
      $this->FechaContratacion=$fechaContratacion;
      $this->Direccion=$direccion;
      $this->Telefono=$telefono;
      $this->IdCargo=$idCargo;
      $this->Idusuarios=$idusuarios;
    }

    function SetEmpleado($nom, $ape, $ide, $fecha, $dire, $tele, $idcar, $idus){
      $this->Nombre=$nom;
      $this->Apellido=$ape;
      $this->Identidad=$ide;
      $this->FechaContratacion=$fecha;
      $this->Direccion=$dire;
      $this->Telefono=$tele;
      $this->IdCargo=$idcar;
      $this->Idusuarios=$idus;
    }

    function ConstructorS($idempleados){
      $this->Idempleados=$idempleados;
    }


    function __construct(){
      
    }

    function GetEmpleado($mysqli, $idempleados){
      $query = "SELECT * from empleados where idempleados='$idempleados'";
      $result = mysqli_query($mysqli, $query);
      $lista = array();
      while ($row = mysqli_fetch_array($result))
      {
        $EmpleadoActual = new Empleado();
        $EmpleadoActual->ConstructorSobrecargado($row['idempleados'],$row['nombre'],
        $row['apellido'],$row['identidad'],$row['fechaContratacion'],$row['direccion'],$row['telefono'],
        $row['idCargo'],$row['idusuarios']);
        $lista[]=$EmpleadoActual;
      }
      return $lista;
    }
    function AddEmpleado($mysqli){
      $Res = new Respuesta();
      if (trim($this->Descripcion)==""){
        $Res->NoSucces("Debe rellenar los campos");
      }else{
        mysqli_query($mysqli,
          "INSERT into empleados(nombre, apellido, identidad, fechaContratacion, direccion, telefono, idCargo, idusuarios)
            values('$this->Nombre', '$this->Apellido', '$this->Identidad', '$this->FechaContratacion',
               '$this->Direccion', '$this->Telefono', '$this->IdCargo', 
               '$this->Idusuarios')"
        );
        if (mysqli_error($mysqli)){
          $Res->NoSucces("Error al Insertar");
        }else{
          $Res->Succes("Se Ingreso Correctamente: ".$this->nombre );
        }
      }
      return $Res;
    }

    function EdtProducto(){

    }

    function EditarEmpleadoById($mysqli){
      $query = "UPDATE empleados set nombre='$this->Nombre', apellido='$this->Apellido', identidad='$this->Identidad',
      fechaContratacion='$this->FechaContratacion',
      direccion='$this->Direccion', telefono='$this->Telefono', idCargo='$this->IdCargo'
      , idusuarios='$this->Idusuarios' where idempleados=$this->idempleados";
      $result = mysqli_query($mysqli, $query);
      $Res = new Respuesta();
    
      if (mysqli_error($mysqli)){
    
        $Res->NoSucces("Error al Modificar");
    
      }else{
        $Res->Succes("Empleado Modificado: ".$this->nombre );
    
      }
    
      return $Res;
    
    
    }

    function EliminarEmpleadoById($mysqli){
      $query = "DELETE FROM empleados where idempleados=$this->Idempleados";
      $result = mysqli_query($mysqli, $query);
      $Res = new Respuesta();
    
      if (mysqli_error($mysqli)){
    
        $Res->NoSucces("Error al Eliminar");
    
      }else{
        $Res->Succes("Se Elimino Correctamente");
    
      }
    
      return $Res;
    
    }
    

  }

?>