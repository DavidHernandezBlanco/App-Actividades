<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>

    <?php
        include '../php/conexion.php';

        $nombre_user = $_POST['nombre_user'];
        $correo_user = $_POST['correo_user'];
        $contra_user = $_POST['contra_user'];

        if ($_POST['contra_user'] != $_POST['contra_user2']) {
            echo 'La contraseña de verificación no coincide.';
         } else {
            
         }
        $correo_encontrado=false;
        $consulta= "SELECT correo_user FROM tbl_user";
        $correo=mysqli_query($conexion,$consulta);
        foreach ($correo as $key => $tabla) {
        foreach ($tabla as $atributo => $email) {
            if ($correo_user == $email){
                 $correo_encontrado=true;
                }
            }
        }
        if (!$correo_encontrado){
            $sql = "INSERT INTO `tbl_user` (`nombre_user`,`correo_user`, `contra_user`) VALUES ('$nombre_user','$correo_user','$contra_user')";
            $insert = mysqli_query($conexion, $sql);
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                    title: 'Usuario creado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Iniciar sesión'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                        })
                    }
                aviso('../view/login.html');
            </script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php
            }else {
            ?>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                    title: 'Correo Existente',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                            }
                        })
                    }
                    aviso('../view/registro.php');
            </script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php                       
            }
    
        ?>

</body>
</html>