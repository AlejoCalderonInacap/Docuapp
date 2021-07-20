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

if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  $fname = $name;
  $chk = $conn->query("SELECT * FROM  subida where name = '$name' ")->rowCount();
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
            <form enctype="multipart/form-data" action="" name="form" method="post"></form>
            <tr><th><h1>Mis Archivos</h1></th></tr>
            </br>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Archivos</th>
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from subida order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
            ?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
                			<?php }?>
        </table>
    </div>
        </div>
            </div>
        </body>

<?php
require('layout/footer.php');
?>