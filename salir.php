<?php
session_start();
include_once 'database.php';
echo $_SESSION['iduser'];

$query = $conexion->prepare('SELECT * FROM usuarios WHERE idusuarios = ?;' );
$query->execute([ $_SESSION['iduser']]);
$datos = $query->fetch(PDO::FETCH_OBJ);

echo <<<EOT
<script src="js/jquery.min.js"></script>
<script>
        (function(){
            Vitacora(9, "EL USUARIO HA CERRADO LA SESION", GetIdUser(), 7, hora(), fecha());
        }
        )();

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
                    let idusuario ="$datos->idusuarios";
                    return idusuario;
                }
        
                function Vitacora(modulo, descripcion, usuarioResponsable, accion, hora, fecha){
                    $.post("controllers/Vitacora/InsertarItemVitacoraController.php",
                    {"modulo":modulo,"descripcion":descripcion, "usuarioResponsable":usuarioResponsable, "accion":accion, "hora":hora, "fecha":fecha}, 
                    function(data)
                    {
                        var resp = JSON.parse(data);
                        console.log(resp);
        
                    });
        
                }
                
                
                </script>
EOT;
session_destroy();
header('location: index.php');
?>