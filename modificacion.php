<?php
	/* conexion a la base de datos */
	$connect=mysqli_connect("127.0.0.1", "root", "", "registro");


/*inicializa en blanco variables auxiliares */
$enferemedad2 = '';
$gravedad2= '';
$descripción2 = '';
$contagio2= '';
$cura2 = '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "SELECT * FROM enfermedades WHERE id=$id";
  $result = mysqli_query($connect, $consulta);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $enfermedad2 = $row['enfermedad'];
    $gravedad2 = $row['gravedad'];
    $descripción2 = $row['descripción'];
    $contagio2 = $row['contagio'];
    $cura2 = $row['cura'];

	
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $enfermedad2 = $_POST['enfermedad'];
  $gravedad2 = $_POST['gravedad'];
  $descripción2 = $_POST['descripción'];
  $contagio2 = $_POST['contagio'];
  $cura2 = $_POST['cura'];

  $actualiza = "UPDATE enfermedades set enfermedad = '$enfermedad2', gravedad = '$gravedad2', descripción = '$descripción2', contagio = '$contagio2', cura = '$cura2'      WHERE id=$id";
 
 mysqli_query($connect, $actualiza);
  $_SESSION['message'] = 'Enfermedad actualizada correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: lista.php');
}

?>


      <form action="modificacion.php?id=<?php echo $_GET['id']; ?>" method="POST">
        
        <input name="enfermedad" type="text" class="form-control" value="<?php echo $enfermedad2; ?>" placeholder="Update Title">
        <input name="gravedad" type="text" class="form-control" value="<?php echo $gravedad2; ?>" placeholder="Update Title">
		<input name="descripción" type="text" class="form-control" value="<?php echo $descripción2; ?>" placeholder="Update Title">	                
		<input name="contagio" type="text" class="form-control" value="<?php echo $contagio2; ?>" placeholder="Update Title">
		<input name="cura" type="text" class="form-control" value="<?php echo $cura2; ?>" placeholder="Update Title">
		
        <button class="btn-success" name="update">Modificar</button>
      </form>

