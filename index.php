
<?php
require('layout/header.php');

session_start();
require 'includes/database.php';

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
<body>

        <!--  Main -->
        <main id="main">
            <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/imagenes/Foto0.jpg" class="d-block w-100" alt="Foto 0" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/imagenes/foto1.jpg" class="d-block w-100" alt="Foto 1" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/imagenes/Foto02.jpg" class="d-block w-100" alt="Foto 02" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/imagenes/Foto03.jpg" class="d-block w-100" alt="Foto 03" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/imagenes/Foto4.jpg" class="d-block w-100" alt="Foto 4" />
                    </div>
                    <div class="overlay">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 offset-md-6">
                                    <h1>DocuApp </h1>
                                    <p>
                                        DocuApp es la mejor experiencia para portar tus documentos personales de forma completamente
                                        digital de una manera segura y confiable, Manteniendo la validez de un documento fisico.
                                        DocuApp te invita a unirte y ser parte de la era digital donde todos tu problemas y inquietudes
                                        puedes solucionarla con tan solo un click!
                                    </p>
                                    <a href="registro.php" class="btn btn-outline-light">Quiero ser parte de DocuApp</a>
                                    <button type="button" class="btn btn-registrar">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main -->

        <!-- beneficios -->
        <section id="beneficios" class="mt-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col text-center text-uppercase">
                        <small>Beneficios de</small>
                        <h2>DocuApp</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/imagenes/Foto2.jpg" class="card-img-top" alt="Foto 2" />
                            <div class="card-body">
                                <h5 class="card-title">No mas plastico!</h5>
                                <div class="badges">
                                    <span class="badge bg-warning">Reducción de plastico</span>
                                    <span class="badge bg-info">Cuidado natural</span>
                                </div>
                                <p class="card-text">
                                    Con docuApp no tendras el problema del desgaste del
                                    material plastico y podras llevar tus documentos de forma digital a
                                    todas partes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/imagenes/Foto5.jpg" class="card-img-top" alt="Foto 5" />
                            <div class="card-body">
                                <h5 class="card-title">Inicia Sesion de cualquier parte</h5>
                                <div class="badges">
                                    <span class="badge bg-warning">Facilidad</span>
                                    <span class="badge bg-info">Rapidez</span>
                                </div>
                                <p class="card-text">
                                    Con docuApp puedes acceder a tu cuenta de cualquier
                                    dispositivo conectado a internet, con tan solo ingresar a la pagina y registarse
                                    podran obtener toda la informacion ingresada al sistema.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="assets/imagenes/Foto6.jpg" class="card-img-top" alt="Foto 6" />
                            <div class="card-body">
                                <h5 class="card-title">No mas Colapso</h5>
                                <div class="badges">
                                    <span class="badge bg-warning">Ahorro de tiempo</span>
                                    <span class="badge bg-info">Comodidad</span>
                                </div>
                                <p class="card-text">
                                    Con docuApp olvidate de las filas para obtener tus
                                    documentos personales, en caso de extravio o robo de tus pertenencias
                                    podras recuperarla de cualquier disposivo con tu cuenta.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /beneficios -->

        <!-- Informacion -->

        <section id="informacion">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-4 col-lg-6 ">
                        <img src="assets/imagenes/foto8.jpg" alt="Foto 8" />
                    </div>
                    <div class="col-12 col-lg-6 pb-4">
                        <h2>Sabias Que...</h2>
                        <p>
                            con DocuApp puedes obtener tu informacion personal desde cualquier dispoditivo
                            que tenga internet de manera facil y segura. Utilizando tu cuenta
                            puedes registarte desde cualquier aparato y hacer uso tu propia información.
                            Te invito a ser parte de esta gran funcionalidad que desarrollamos para tu Comodidad.
                            ¿Como ingrasar? muy facil completa todos los campos con la información solicitada y listo!.
                            Puedes ingresar dandole click al boton de aqui abajo.
                        </p>
                        <a href="#" class="btn btn-registrar">Registrar</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Informacion -->

    </body>
</html>
<?php
require('layout/footer.php');
?>
