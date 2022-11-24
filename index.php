<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <section class="inicio">
        <div class="imagen">

        </div>
        <div class="forma">
            <h1 id="title-2">LOGIN</h1>
                <form action="">
                    <div class="input">
                        <input type="text" name="usuario" id="usuario"> 
                    </div>
                    <div class="label">
                        <label for="nombre">USER</label>
                    </div>
                    <div class="input">
                        <input type="password" name="contra" id="contra" > 
                    </div>
                    <div class="label">
                        <label for="nombre">PASSWORD</label>
                    </div>

                    <div class="btn">
                            <input type="button" class="btnlogin" onclick="BuscarUsuario();" value="LOGIN" id="usuario">
                    </div>
                    
                </form>

        </div>

    </section>

    <script src="js/jquery.min.js"></script>


    <script>
        function BuscarUsuario(){
            var usuarioIngresado = document.getElementById('usuario').value;
            var contraIngresada =  document.getElementById('contra').value;
        
            $.post(
                "controllers/UsuarioController.php",
                {
                    'usuario':usuarioIngresado
                    
                },
                function(data){
                 
                    var resp = JSON.parse(data);
                    let timerInterval
                        Swal.fire({
                        title: 'Verificando Credenciales',
                        html: 'Por favor <b></b> espere.',
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            if(resp.password==contraIngresada){
                                console.log(data);
                                window.location.href='panelp.php';
                            }else{
                                Swal.fire(
                                'Credenciales Incorrectas',
                                'Verfique los valores ingresados',
                                'error'
                                )
                            }

                            
                            
                        }
                        })
                 
                    

                }




            );





        }



    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>











</body>
</html>