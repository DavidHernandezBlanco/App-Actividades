<?php
session_start();
$usuario = $_SESSION['nombre_user']; 
echo "<div class='row-c'>";
    echo "<div class='column-1 padding-m'>";
        echo "<h4 class='padding-m'>Actividades de $usuario</h4>";
    echo "</div>";

$conexion = mysqli_connect('localhost', 'root', '', 'db_app_activ');
$cons = "SELECT id_user FROM tbl_user WHERE nombre_user = '$usuario';";
$id_usu= mysqli_query($conexion, $cons);
$row = mysqli_fetch_array($id_usu);

$id_user = $row[0]; 

$connection = mysqli_connect('localhost', 'root', '', 'db_app_activ');
$sql = "SELECT * FROM tbl_activ WHERE nombre_user = $id_user;";
$listado_mis_act = mysqli_query($conexion, $sql);

$numero_filas = mysqli_num_rows($listado_mis_act);
$ruta = $_SERVER['SERVER_NAME']."/www/App_Actividades/img/";
    foreach ($listado_mis_act as $mis_actividades) {
    $rutacompleta = "http://".$ruta.$mis_actividades['foto_user'];

    echo "<div class='column-3 padding-mobile'>";
        echo "<a href='./actividad.php'><img src='{$rutacompleta}' class='target'></a>";

        echo "<div style='float: right;' class='padding-m'>";
        echo "<button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-link'></i></button>";
        echo "<a href='./actividad_like.php'><button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-heart'></i></button></a>";
        echo "</div>";
    echo "</div>";
}
?>