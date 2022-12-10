<?php
	session_start();
    include_once 'database.php';
    
	$Usuario = $_POST['usuario'];
	$Contraseña = $_POST['contra'];
    $query = $conexion->prepare('SELECT * FROM usuarios WHERE nombre = ? AND 
    password = ?;' );
    $query->execute([$Usuario, $Contraseña]);
    $datos = $query->fetch(PDO::FETCH_OBJ);
    //print_r($datos);

    if ($datos === FALSE){
        
        echo "<script> alert('Credenciales incorrectas'); window.location= 'index.php' </script>";
    }elseif($query->rowCount() == 1){
        $_SESSION['User'] = $datos->nombre;
        $_SESSION['Rol'] = $datos->idrol;	
        $_SESSION['iduser'] = $datos->idusuarios;
        echo <<<EOT
            <html>
            <body>
                <script src="js/jquery.min.js"></script>
                <script>

                    (function(){
                        Vitacora(8, "EL USUARIO SE LOGEO", GetIdUser(), 7,hora(), fecha());
                    })();

                    function hora(){
                        const fecha = new Date();
                        var now = fecha.toLocaleTimeString('en-GB');
                        return now;
                    }

                    function fecha(){
                        const fecha = new Date();
                        var idfecha = formatoFecha(fecha, "yy-mm-dd");
                        return idfecha;
                    }

                    function formatoFecha(fecha, formato) {
                        const map = {
                        dd: fecha.getDate(),
                        mm: fecha.getMonth() + 1,
                        yy: fecha.getFullYear().toString().slice(-2),
                        yyyy: fecha.getFullYear()
                        }

                        return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
                    }

                    function GetIdUser(){
                        let idusuario = "$datos->idusuarios";
                        return idusuario;
                    }


                    function Vitacora(modulo, descripcion, usuarioResponsable, accion, hora, fecha){
                        $.post("controllers/Vitacora/InsertarItemVitacoraController.php",
                        {"modulo":modulo,"descripcion":descripcion, "usuarioResponsable":usuarioResponsable, "accion":accion, "hora":hora, "fecha":fecha}, 
                        function(data)
                        {
                        var resp = JSON.parse(data);
                        console.log(resp);
                        window.location= 'panelp.php'

                        });

                    }
                
                </script>
            </body>
        </html>
        
    EOT;
    
       
       
    }
?>	
