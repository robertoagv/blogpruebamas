<?php 

//llamamos a la conexion de BD
require_once '../configuracion.php';

//creamos una cosulta sql y creamos una var para verificar si se ejecuto la consulta.
$result = false;
$sql = "delete from blog_post where id = :id";

//preparamos la consulta
$query = $pdo->prepare($sql);

//ejecutamos al consulta.
$result = $query->execute([
	'id' => $_GET['id']
	]);

if ($result) {

	header('location:post.php');
}
 ?>