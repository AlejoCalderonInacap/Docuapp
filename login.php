<?php
require('layout/header.php');
require('includes/database.php');
if (isset($_SESSION['user_id'])) {
    header('Location: /docuapp/login.php');
}

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /docuapp/usuario_logeado.php");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>
<!DOCTYPE html>
<html lang="es-es">
<head>
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
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
     <div id="titulo_registro">
         <h1>Ingresar</h1>
         <span>
             o desea
             <a href="registro.php">Registrarse</a>
         </span>

         <form action="login.php" method="POST">
             <input name="email" type="email" placeholder="Enter your email" />
             <input name="password" type="password" placeholder="Enter your Password" />
             <input type="submit" value="Aceptar" />
         </form>
         </div>
</body>
</html>