<?php
require('layout/header.php');


require 'includes/database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $stmt->bindParam(':password', $password);

if ($stmt->execute()) {
  $message = 'Successfully created new user';
} else {
  $message = 'Sorry there must have been an issue creating your account';
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
    <p>
        <?= $message ?>
    </p>
    <?php endif; ?>


    <div id="titulo_registro">
        <h1>SignUp</h1>



        <span>
            or
            <a href="login.php">Login</a>
        </span>

        <form action="registro.php" method="POST">
            <input name="email" type="email" placeholder="Enter your email" />
            <input name="password" type="password" placeholder="Enter your Password" />
            <input name="confirm_password" type="password" placeholder="Confirm Password" />
            <input type="submit" value="Registrar" />
        </form>
    </div>
    <!-- hacemos la llamada al Footer -->
    <?php require('layout/footer.php'); ?>
</body>
</html>