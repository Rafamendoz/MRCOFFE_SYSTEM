<?php 



class Empleados{
    public $Nombre;
    public $Apellido;
    public $edad;
    public $Sexo;
    public $IdCargo;
    public $IdUsuario;




    function Constructor($iduser, $name, $pass, $rol){
        $this->idusuarios=$iduser;
        $this->nombre=$name;
        $this->password=$pass;
        $this->idrol=$rol;
    }

    function SetUser($user){
        $this->nombre=$user;

   

    }

    function SetContra($pass){
        $this->password=$pass;

   

    }

    function SetRol($rol){
        $this->idrol=$rol;

   

    }


    function ObtenerPassByUser($user,$Conexion){

        $query = "SELECT password, idrol from usuarios WHERE nombre="."'".$user."'";
        $result = mysqli_query($Conexion, $query);
        $Usuario = new Usuarios();
 
            while ($row = mysqli_fetch_array($result))
            {
              
              $Usuario->SetContra($row['password']);
              $Usuario->SetUser($user);
              $Usuario->SetRol($row['idrol']);
            
            }
        
          
        
        return $Usuario;
      }
}

?>