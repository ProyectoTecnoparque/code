<?php
if (isset($_SESSION['tipo_usuario'])) {
   header("Location: " . base_url('Inicio'));
   die();
}
?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hawah-Login</title>
    <link rel="icon" href="<?php echo base_url('/img/travel.png'); ?>" type="image/ico" />

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body class="" style="background-image: url(https://img2.viajar.elperiodico.com/63/c0/c5/eje-cafetero-colombiano.jpg);background-repeat:no-repeat; background-size:cover" >

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "><img  class="ml-4" src="<?php echo base_url('/img/TRAVELL.png');?>" height="400" width="350" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inicia Sesión!</h1>
                                    </div>
                                    <form class="user" id="formulario_ingreso" action="#" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Ingrese la dirección del correo electronico">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"  placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                
                                            </div>
                                        </div>
                                        <button  type="submit" class="btn btn-primary btn-user btn-block">Iniciar</button>
                                        <hr>
                                    </form>
                              
                                    <div class="text-center">
                                        <a class="text-center" href="">¿Has olvidado tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                    <a href="<?php echo base_url('Registrar'); ?>" class="text-center">Deseo registrarme!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/js/sb-admin-2.min.js'); ?>"></script>
    <!-- sweetalert2 -->
   <script src="<?php echo base_url('/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>


    <script type="text/javascript">

        $(document).ready(function() {
            $("#formulario_ingreso").submit(function(event) {
                event.preventDefault(); 
                validarDatosIngreso();
            });
        });

        function validarDatosIngreso() {
            email = $("#email").val();
            password = $("#password").val();

            if (email != "" && password != "") {
               
                $.ajax({
                        url: "<?php echo base_url('/Index/ValidarDatosIngreso');?>",
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            email: email,
                            password: password
                        },
                    })
                    .done(function(data) {
                        if (data == "OK##DATA##LOGIN") {
                            window.location = "<?php echo base_url('/Index/cargarVistaInicio'); ?>";
                              console.log(data);
                        }else if (data == "ERROR##INVALID##DATA") {
                         Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se pudo encontrar el usuario',
                            })
                        } 
                    })
                    .fail(function(data) {
                        console.log(data);
                        Swal.fire({
                        icon: 'warning',
                        title: 'Error!',
                        text: 'Intente de Nuevo'
                })
            });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos vacios!',
                    text: 'Debes llenar todos los campos.'
                })
            }
        }

    </script>
</body>

</html>