<!DOCTYPE html>
<html lang="es">
    <?php require 'views/head.php'; ?>
    <style>
    /* BASIC */

html{
    
        padding: 0px;
        margin: 0px;
    
}
body {
  font-family: Arial, Helvetica, sans-serif;
  
}
/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;  
}
.login{    
    background: #f1f1f1;
    min-width: 325px;
    padding: 15px;
}




    </style>
<body style="height:100vh !important;">    
    <div class="wrapper">
        <form class="login p1">
            <!-- Icon -->
            <div class="text-center form-grop mb-3">
                <h3>Iniciar Sesión</h3>
                <img src="./public/img/login.png" class="rounded-circle"  style="width: 100px;"/>
            </div>

            <!-- Login Form -->
           <div class="form-group">
               <div class="col-xs-6">
                   <label for="txtEmail">Correo Electrónico:</label>
                   <input type="email" class="form-control" id="txtEmail" placeholder="Correo electrónico" autofocus require>
               </div>
               <div class="col-xs-6">
                   <label for="txtPassword">Contraseña:</label>
                   <input type="text" class="form-control" id="txtPassword" placeholder="Constraseña" require>
               </div>               
           </div>
           <div class="form-group text-center">
                   <button type="submit" id="btnIniciarSesion" class="btn btn-primary">Iniciar Sesión</button>
            </div>

            
            <div>
                <a class="underlineHover" href="javascript:void(0);" id="abrirModalCrearCuenta">Crear una cuenta.</a>
            </div>
            
        </form>
    </div>

    <?php require 'views/login/_modal-registrousuario.php';?>

    <script src="./public/vendor/jquery/jquery.min.js"></script>
    <script src="./public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./public/vendor/jquery.blockUI.js"></script>
    <script src="./public/vendor/sweetalert2-9.7.1/js/sweetalert2.min.js"></script> 
    <script src="./public/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="./public/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="./public/js/utils.js"></script> 

    <script src="./public/js/login/login.js"></script>
    <script>
        $(document).ready(()=>Login.init());        
    </script>
</body>
</html>



