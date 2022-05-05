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


        if ($contra_user){
            $sql = "INSERT INTO `tbl_user` (`nombre_user`,`correo_user`, `contra_user`) VALUES ('$nombre_user','$correo_user','$contra_user')";
            $insert = mysqli_query($conexion, $sql);
            ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: 'Has iniciado sesión',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Acceder'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = url;
                                }
                            })
                    }

                    aviso('../view/nosotros.html');
                </script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php
        }
    ?>
</body>
</html>