<html>
<body>
<?php
	/* conexion a la base de datos */
	$connect=mysqli_connect("127.0.0.1", "root", "", "registro");

			/* traspaso de datos ingresados en la página anterior */
			$enfermedad2= $_POST ['enfermedad'];
			$gravedad2= $_POST ['gravedad'];
			$descripción2= $_POST ['descripción'];
			$contagio2= $_POST ['contagio'];
			$cura2= $_POST ['cura'];
			
			/* creación de la sentencia SQL que inserta datos */
			$consulta="insert into enfermedades  (enfermedad, gravedad, descripción, contagio, cura) values ('$enfermedad2','$gravedad2','$descripción2','$contagio2','$cura2')";
	
	/* ejecución de la sentencia creada*/	
	$resultado=mysqli_query($connect,$consulta);
		
	header('Location: lista.php');

?>


</body>
</html>
