
<?php 
//llamamos la conexion de la BD.
require_once '../configuracion.php';

//creamos una consulta sql y creamos una var para el resultado.
$result = false;
$sql = "select * from blog_post where id=:id";

$sqlupdate = "update blog_post set titulo=:titulo, contenido=:contenido where id=:id";

if (!empty($_POST)) {
	//preparamos la consulta
	$query = $pdo->prepare($sqlupdate);
	//executamos la consulta.
	$result = $query->execute([
		'titulo' => $_POST['titulo'],
		'contenido' => $_POST['contenido'],
		'id' => $_POST['id']
		]);
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];

}else{
	//preparamos la consulta
	$query = $pdo->prepare($sql);
	//executamos la consulta
	$query->execute([
		'id' => $_GET['id']
		]);
	//obtnemos la fila que viene en la consulta.
	$blogPost = $query->fetch(PDO::FETCH_ASSOC);

	$titulo = $blogPost['titulo'];
	$contenido = $blogPost['contenido'];
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
						echo '<div class="alert alert-success">Post Updated</div>';
					}
				 ?>
					<form action="update.php" method="post">
						<div class="form-group">
							<div class="input-group">
								<label for="titulo">Titulo</label>
								<input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" value="<?php echo $titulo ?>" required>
								<textarea name="contenido" id="contenido" cols="35" rows="5" class="form-control"  required><?php echo $contenido ?></textarea>
							</div>
							<label for="contenido">Contenido</label>
							<div class="input-group">
								<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
							</div>
							<br>
							<div class="input-group bajar">
								<input type="submit" value="Update" class="btn btn-primary ">
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