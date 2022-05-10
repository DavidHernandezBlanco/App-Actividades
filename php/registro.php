<?php

if ((!empty($_POST['nombre_user']) && !empty($_POST['correo_user']) && !empty($_POST['contra_user']) && !empty($_POST['contra_user2'])) && ($_POST['contra_user'] == $_POST['contra_user2'])) {
    
    $nombre_user = $_POST['nombre_user'];
    $correo_user = $_POST['correo_user'];
    $contra_user = $_POST['contra_user'];

    require "../php/conexion.php";

    if (!$conexion) {
        echo "ERROR DE CONEXION";
        echo "<a href='../view/register.php'>Volver</a>";
        die;
    }

    $validation_query = "SELECT id_user FROM tbl_user WHERE correo_user = '$correo_user'";

    $valid_login = mysqli_query($conexion, $validation_query);

    $match = $valid_login -> num_rows;

    if ($match === 1) {

        echo "<script>window.location.href = '../view/registro.php?validation=false';</script>";
        
    } elseif ($match === 0) {

        $insert_query = "INSERT INTO tbl_user (id_user, correo_user, contra_user, nombre_user) VALUES (NULL, '{$correo_user}', '{$contra_user}', '{$nombre_user}')";
        $insert_sql = mysqli_query($conexion, $insert_query);

        if ($insert_sql) {
            require "./login.php";
            login($email,$password);
        } else {
            echo "NO SE HA PODIDO CREAR EL USUARIO";
        }

    } else {
        echo "<script>window.location.href = '../view/register.php?validation=false';</script>";
    }

} else {
    echo "<script>window.location.href = '../view/register.php?validation=false';</script>";
}