<!-- zona php -->
<?php
/* conector basico  de Musql
(user 'root' validar contraseña */
$link = mysqli_connect("localhost", "noticia", "noticia", "noticias");

// valida coneccion
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  // Escape de las entradas del usuario por seguridad
$titulo = mysqli_real_escape_string($link, $_REQUEST['titulo']);

$contenido = mysqli_real_escape_string($link, $_REQUEST['contenido']);

// Agrgalos valores recibidos en la base de datos
$sql = "INSERT INTO noticias (titulo, contenido) VALUES ('$titulo',  '$contenido')";
if(mysqli_query($link, $sql)){

echo'    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Noticas de Misiones</h5>
  <nav class="my-2 my-md-0 mr-md-3">
  <a class="p-2 text-dark" href="/Emi">Agregar noticias</a>
  <a class="p-2 text-dark" href="/Emi/noticias.php">Ver Nonticias</a>

  </div>  ';
  echo '<body class="bg-light">';

$result = mysqli_query($link,"SELECT * FROM noticias order by id DESC");



echo '<div class="blog-post">';

while($row = mysqli_fetch_array($result))
{
echo ' <h2 class="blog-post-title">'. $row[titulo] . "</h2>";
echo '<p>' . $row[contenido] . '</p>';
}
echo '</div>';

} else{
    echo "error .. $sql. " . mysqli_error($link);
}

// mata la coneccion
mysqli_close($link);
?>
<!-- fin zona php -->
<!-- zona html -->


</div>
<!-- fin zona html -->


<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  </head>

  <body>


  </body>
</html>