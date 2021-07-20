<?php
require('layout/header_logeado.php');

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



    <!-- Perfil del usuario -->
    <body>
        <div class="container-fluid cew-10">
            <div class="row">
                <div class="col"
                <?php require('layout/sidebar.php') ?>
            </div>
  
        <div class="col-9">
        <?php if(!empty($user)): ?>
        <br /> Welcome. <?= $user['email']; ?>
        <br />You are Successfully Logged In
        <a href="logout.php">
            Logout
        </a>
        <?php else: ?>
        <h1>Please Login or SignUp</h1>

        <a href="login.php">Login</a> or
        <a href="signup.php">SignUp</a>
        <?php endif; ?>
    </div>
        </div>
            </div>
        </body>
    <footer>
<?php
require('layout/footer.php');
?>
        </footer>