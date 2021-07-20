<?php
require 'includes/database.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<!DOCTYPE html>
<html lang="es-es">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS ocuparemos Bootstrap para aprovechar sus estilos y dar mayor mejora en dise�o al sitio web -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Estilos de la pagina -->
    <link rel="stylesheet" href="style/style.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>DocuApp</title>
</head>
<body>

        <nav id="header" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/imagenes/DocuApp.png" alt="Logo DocuApp" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="usuario_logeado.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">¿Porque DocuApp?</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Redes Sociales
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fab fa-facebook-f"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fab fa-linkedin"></i> linkedin
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="text-light d-flex my-auto">
                            <div id="circle" class="mt-2 mr-2"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">
                                <?= $user['email'];?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"> Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    

    
    <script>
$(document).ready(function(){
   $('button').click(function(){
       $('.sidebar').toggleClass('fliph');
   });

});

    </script>
</body>
</html>
