<?php
session_start();

if (!empty($_SESSION['correo_user'])) {
    if (!empty($_POST['nombre_activ']) && !empty($_FILES['foto_user'])) {
        
        $nombre_activ = $_POST['nombre_activ'];
        $desc_activ = $_POST['desc_activ'];
        $lugar_activ = $_POST['lugar_activ'];
        $foto_user = $_FILES['foto_user'];

        require "../php/conexion.php";

        $last_insert_query = "SELECT MAX(id) FROM tbl_activ;";
        $last_insert_request = mysqli_query($conexion, $last_insert_query);
        $last_insert_array = mysqli_fetch_array($last_insert_request);

        $path = "/www/App-Actividades/img/actividades/";
        $tipo = explode('/',$foto_user['type']);
        $destinoLocal = $_SERVER['DOCUMENT_ROOT'].$path.$nombre_foto;
        $destinoRed = "http://".$_SERVER['SERVER_NAME'].$path.$nombre_foto;

        if (($foto_user['size'] < 1000*1024) && ($foto_user['type'] == 'image/png' || $foto_user['type'] == 'image/jpeg' || $foto_user['type'] == 'image/gif')) {
            $exito = move_uploaded_file($foto_user['tmp_name'], $destinoLocal);
            
            if ($exito) {
                
                $act_insert_query = "INSERT INTO tbl_activ (nombre_activ, desc_activ, foto_user, lugar_activ) VALUES ('$nombre_activ', '$desc_activ', '$lugar_activ', '$foto_user', '$nombre_user');";
                $act_insert_request = mysqli_query($conexion, $act_insert_query);

            } else {
                echo "<script>window.location.href = '../view/subir.actividades.php?val=\"img_error\"';</script>";
            }
        } else {
        echo "<script>window.location.href = '../view/subir.actividades.php?val=\"field_error\"';</script>";
        }
    }
} else {
    echo "<script>window.location.href = '../view/login.php';</script>";
}