<?php 



class Usuarios{
    public $idusuarios;
    public $nombre;
    public $password;




    function Constructor($iduser, $name, $pass){
        $this->idusuarios=$iduser;
        $this->nombre=$name;
        $this->password=$pass;
    }

    function SetUser($user){
        $this->nombre=$user;

   

    }

    function SetContra($pass){
        $this->password=$pass;

   

    }


    function ObtenerPassByUser($user,$Conexion){

        $query = "SELECT password from usuarios WHERE nombre="."'".$user."'";
        $result = mysqli_query($Conexion, $query);
        $Usuario = new Usuarios();
 
            while ($row = mysqli_fetch_array($result))
            {
              
              $Usuario->SetContra($row['password']);
              $Usuario->SetUser($user);
          
            }
        
          
        
        return $Usuario;
      }
}



?>