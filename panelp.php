<?php
  session_start();
  if(isset($_SESSION['Rol'])){
  
?>
<!DOCTYPE html>
<html lang="en">

        <!--header-->
        <?php
            require("header.php");
         ?>

            <!--sidebar-->
            <?php
                require("sidebar.php");
            ?>
                        <!-- contenido-->
                        <div id="layoutSidenav_content">
                            
                            <?php
                            require("content.php");
                            ?>    
                        <!-- fin contenido-->

            <!-- footer-->
            <?php
                require("footer.php");
            ?>
            
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            

        </script>

    </body>
</html>
<?php
	}else{
		header("Location:index.php");
	}
?>