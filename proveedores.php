<?php
require 'includes/database.php';
require 'layout/header_logeado.php';
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


 $move =  move_uploaded_file($temp,"documentos/".$fname);
 if($move){
 	$query=$conn->query("insert into subida(name,fname)values('$name','$fname')");
     	if($query){
	header("location:proveedores.php");
	}
	else{
	die(mysql_error());
	}
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
    <div id="perfil_usuario" class="mt-4 mb-4 ">
        
            <div class="col text-center mt-4 mb-4">
                <h1>
                    Proveedores
                </h1>
                <div class="row">
                    <div class="card_perfil col-12 col-md-6 col-lg-4 mb-4 mt-4">
                        <div class="card">
                            <img src="assets/imagenes/foto13.jpg" class="card-img-top" alt="Foto 11">
                            <div class="card-body">
                                <h5>SII</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="card_perfil col-12 col-md-6 col-lg-4 mb-4 mt-4">
                        <div class="card">
                            <img src="assets/imagenes/foto12.jpg" class="card-img-top" alt="Foto 12">
                            <div class="card-body">
                                <h3>Municipios</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                                        <div class="card_perfil col-12 col-md-6 col-lg-4 mb-4 mt-4">
                        <div class="card">
                            <img src="assets/imagenes/foto14.jpg" class="card-img-top" alt="Foto 12">
                            <div class="card-body">
                                <h3>Registro Civil</h3>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 	        <div class="span12">
	            <div class="container">
		<br />
		<h1><p>Descargar Archivos </p></h1>	
		<br />
		<br />
			<form enctype="multipart/form-data" action="" name="form" method="post">
                    </form>
		<br />
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Archivos</th>
					<th align="center">Accion</th>	
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
				<td>
					<button class="alert-success"><a href="visualizar/descarga.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Descargar</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>
	</div>   
                </div>
            </div>
        </div>
    </div>

        </body>
    <footer>
<?php
require('layout/footer.php');
?>
        </footer>