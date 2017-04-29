<?php 
//llamamos a la conexion de la DB.
require_once '../configuracion.php';

//creamos una consulta sql;
$sql = "select * from blog_post";

//preparamos la consulta con el objeto $pdo 
$query = $pdo->prepare($sql);

//ejecutamos la consulta
$query->execute();

//obtenemos las filas 
$blogPost = $query->fetchAll(PDO::FETCH_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Blog-Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/main.css">
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
				<div class="blog-post-create">
					<a href="insertblog.php" class="btn btn-primary">Create New</a>
				</div>
				<div class="blog-post">
					<table class="table table-striped">
						<tr>
							<th>Titulo</th>
							<th>Contenido</th>
							<th>Acciones</th>
						</tr>
						<?php 
						  foreach($blogPost as $post) {
						  	echo '<tr>';
								echo '<td>' .$post['titulo'] .'</td>';
								echo '<td>' .$post['contenido'] .'</td>';
								echo '<td><a href="update.php?id='.$post['id'] .'">Update </a><a href="delete.php?id=' .$post['id'] .'">Eliminar</a></td>';
							echo '</tr>';
						  }
						 ?>	
					</table>				
				</div>
			</div>
			<div class="col-md-4">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam quo doloribus harum quaerat laborum ab cumque adipisci veniam, repellat laboriosam perferendis ipsam dignissimos ipsum, et. Suscipit error accusamus molestiae nostrum.</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="blog-post-footer">
					<p><a href="index.php" class="btn btn-default">Admim</a></p>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>