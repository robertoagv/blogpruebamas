<?php 
//requerimos del uso de la conexion de la BD.
require_once '../configuracion.php';
//creamos una consulta con mysql y creamos una var para verificar si se inserto.
$result = false;
$sql = "insert into blog_post(titulo, contenido) values(:titulo, :contenido)";
//preparamos la consulta con $pdo y verificamos si el POST no viene vacio.
if (!empty($_POST)) {
	$query = $pdo->prepare($sql);
	//ejecutamos la consuta con execute pasando un array associtivo con sus valores.
	$result = $query->execute([
		'titulo' => $_POST['titulo'],
		'contenido' => $_POST['contenido']
		]);
}


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
				<div class="blog-post">
				<?php 
					if ($result) {
						echo '<div class="alert alert-success">Post Inserted</div>';
					}
				 ?>
					<form action="insertblog.php" method="post">
						<div class="form-group">
							<div class="input-group">
								<label for="titulo">Titulo</label>
								<input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" required>
							</div>
							<label for="contenido">Contenido</label>
							<div class="input-group">
								<textarea name="contenido" id="contenido" cols="35" rows="5" class="form-control" required></textarea>
							</div>
							<br>
							<div class="input-group bajar">
								<input type="submit" value="Insert" class="btn btn-primary ">
							</div>
						</div>
					</form>		
				</div>
			</div>
			<div class="col-md-4">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam quo doloribus harum quaerat laborum ab cumque adipisci veniam, repellat laboriosam perferendis ipsam dignissimos ipsum, et. Suscipit error accusamus molestiae nostrum.</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<footer class="blog-post-footer">
					<p><a href="post.php" class="btn btn-default">Table Post</a></p>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>