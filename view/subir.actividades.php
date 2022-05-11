<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">ActiviGo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                        <li class="nav-item">
                            <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link active disabled" aria-current="page" href="./actividades.php">Actividades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                        <button class="btn btn-light form-control me-1" type="submit"><i
                                class="fa-solid fa-arrow-up-from-bracket"></i></button>
                        <button class="btn btn-light form-control ms-1" type="submit">Acceder</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="column-3">
            <br>
        </div>
        <?php
            // if (isset($_GET['validation']) && ($_GET['validation']=="false")) {
            //     echo "<h2 id='error'>Usuario o contraseña incorrecto</h2>";
            // }else{
            //    echo "<h2 id='NoError'>Por favor, ingresa tus datos</h2>";
            // }
            ?>
        <div class="column-3 form">
            <div><h2>Sube una actividad:</h2></div>
            <div class="flex ffrom">
                <form action="../php/subiractividad.php" method="post">
                    <input class="textbox" type="text" name="nombre_activ" placeholder="Nombre actividad">
                    <br>
                    <input class="textbox" type="textarea" name="desc_activ" placeholder="Descripción">
                    <br>
                    <input class="textbox" type="text" name="lugar_activ" placeholder="Lugar actividad">
                    <br>
                    <input type="file" name="foto_user" placeholder="Actividad foto">
                    <br>
                    <br>
                    <input type="submit" value="Insertar">
                </form>
            </div> 
        </div>
    </body>

</body>

</html>