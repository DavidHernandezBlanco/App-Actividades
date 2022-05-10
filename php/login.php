<?php
    if (!empty($_POST['correo_user']) && !empty($_POST['contra_user'])) {
        function login($correo_user, $contra_user) {
            require "../php/conexion.php";
            if (!$conexion) {
                echo "ERROR DE CONEXION";
                echo "<a href='../view/login.php'>Volver</a>";
                die;
            }
            $query = "SELECT * FROM tbl_user WHERE correo_user = '{$correo_user}' AND contra_user = '{$contra_user}'";
            $valid_login = mysqli_query($conexion, $query);
            $match = $valid_login -> num_rows;
            if ($match === 1) {
                session_start();
                foreach ($valid_login as $key => $user) {
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['correo_user'] = $user['correo_user'];
                    $_SESSION['contra_user'] = $user['contra_user'];
                    $_SESSION['nombre_user'] = $user['nombre_user'];
                }
                echo "<script>window.location.href = '../view/nosotros.php';</script>";
            } else {
                echo "<script>window.location.href = '../view/login.php?validation=false';</script>";
            }
        }
        $email = $_POST['correo_user'];
        $password = $_POST['contra_user'];
        login($email,$password);
    } else {
        echo "<script>window.location.href = '../view/login.php?validation=false';</script>";
    }
