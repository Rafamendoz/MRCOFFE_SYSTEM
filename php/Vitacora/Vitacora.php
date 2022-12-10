<?php 

include("../Respuesta.php");

class Vitacora{


    public $modulo;
    public $descripcion;
    public $usuarioResponsable;
    public $accion;
    public $hora;
    public $fecha;
    
    

    function Constructor($modulo, $descripcion, $usuarioResponsable, $accion, $hora, $fecha){
        $this->modulo = $modulo;
        $this->descripcion = $descripcion;
        $this->usuarioResponsable = $usuarioResponsable;
        $this->accion = $accion;
        $this->hora = $hora;
        $this->fecha = $fecha;

    }


    function GuardarAccion($conexion){
        $res= new Respuesta();
        $query = "INSERT INTO Vitacora (modulo, descripcion, usuarioResponsable, accion, hora, fecha) VALUES($this->modulo, '$this->descripcion', $this->usuarioResponsable, $this->accion, '$this->hora', '$this->fecha');";
        if(mysqli_query($conexion, $query)==true){
                $res->Succes("Exito");
        }else{
            $res->NoSucces("Fallo");
        }

        return $res;
        
    }


}

?>