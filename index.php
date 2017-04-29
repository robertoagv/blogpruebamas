<?php 
//llamamos el archivo que contiene la conexion haca la base de datos.
require_once 'configuracion.php';

try {
	//creamos un consulta sql
$sql = "SELECT * FROM blog_post ORDER BY id DESC";

//preparamos la consulta, utilizando $pdo que viene como un objeto desde configuracion.php.
$query = $pdo->prepare($sql);

//ejecutamos la consulta
$query->execute();

//ponemos en una var el resultado de la consulta.
$blogPost = $query->fetchAll(PDO::FETCH_ASSOC);
	
} catch (Exception $e) {
	echo $e->getMessage();
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog Prueba</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Blog</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="blog-post">
					<?php 
						foreach ($blogPost as $blog) {
							echo '<h2>'.$blog['titulo'] .'</h2>';
							echo '<p>Jan 1, 2020 by <a href="#">Alex</a></p>';
							echo '<div class="blog-post-image">';
								echo '<img src="images/slide3.png">';
							echo '</div>';
							echo '<div class="blog-post-content">';
								echo $blog['contenido'];
							echo '</div>';
						}
					 ?>					
				</div>
			</div>
			<div class="col-md-4">
			fsdfd</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="blog-post-footer">
					<p><a href="admin/index.php" class="btn btn-default">Admin</a></p>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>