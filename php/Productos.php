<?php 
include("Respuesta.php");
class Productos{
  public $codigo;
  public $descripcion;
  public $producto;
  public $precio;

  function ConstructorSobrecargado($cod, $descrip, $prod,$precio){
    $this->codigo=$cod;
    $this->descripcion=$descrip;
    $this->producto=$prod;
    $this->precio=$precio;
   
  }

  function SetAdd($cod, $descrip, $prod,$precio){
    $this->codigo=$cod;
    $this->descripcion=$descrip;
    $this->producto=$prod;
    $this->precio=$precio;
  }
  
  function SetId($id){
    $this->codigo=$id;



}
function insertarProducto($Conexion){
  $Res=new Respuesta();
    
    if (strlen($this->codigo)!=4){

    echo "<div class='alert alert-warning'>El Código debe ser de 4 digitos</div>";
    return;}
    //check length producto
            if (strlen($this->producto) > 50) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado largo debe contener maximo 30 caracteres</div>";
                return;
            }
            if (strlen($this->producto) < 3) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado corto debe contener al menos 3 caracteres</div>";
                return;
            
    }else{
      mysqli_query($Conexion,
      "INSERT INTO producto (idproducto, nombreproducto, descripcion, precio ) VALUES ('$this->codigo','$this->producto','$this->descripcion','$this->precio')"
      );
      if (mysqli_error($Conexion)){
    
        $Res->NoSucces("Error al Insertar");
        echo "<div class='alert alert-danger'>Error al Registrar </div>";
    
      }else{
        echo "<div class='alert alert-success'>Producto Registrado </div>";
        $Res->Succes("Se Inserto Correctamente el producto: ".$this->producto );

    
      }
    
    }
    return $Res;

}
function modificarProducto($Conexion){
  $Res=new Respuesta();
    
    if (strlen($this->codigo)!=4){

    echo "<div class='alert alert-warning'>El Código debe ser de 4 digitos</div>";
    return;}
    //check length producto
            if (strlen($this->producto) > 50) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado largo debe contener maximo 30 caracteres</div>";
                return;
            }
            if (strlen($this->producto) < 3) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado corto debe contener al menos 3 caracteres</div>";
                return;
            
    }else{
      mysqli_query($Conexion,
      "UPDATE  producto SET nombreproducto='$this->producto',descripcion='$this->descripcion',precio='$this->precio'
      where idproductos='$this->codigo'"
    );
      if (mysqli_error($Conexion)){
    
        $Res->NoSucces("Error al Modificar");
        echo "<div class='alert alert-success'>Error al Modificar </div>";
    
      }else{
        echo "<div class='alert alert-success'>Producto Modificado </div>";
        $Res->Succes("Se modifico Correctamente el producto: ".$this->producto );

    
      }
    
    }
    return $Res;

}


  }