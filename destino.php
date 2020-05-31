<?php
include "conexion.php";

$id=$_POST[id];
$situacion=$_POST[valor1];

if ($situacion=='1'){
	$nombre=$_POST[nombre];
	$apellido=$_POST[apellido];
	
	if($con){
		$sql = "select * from usuarios where documento like '$id'";
		$resultado = $con->query($sql) or die($con->error);
    	if ($resultado){
			if(mysqli_num_rows($resultado) > 0) {
       		//encontro el registro no se puede agregar
				echo '<br><div class="alert alert-danger" role="alert">
		         <button type="button" class="close" data-dismiss="alert">&times;</button>
		         <strong>El Documento Ingresado ya existe, por favor verifique el mismo e intente nuevamente</strong>
			     </div>';
			exit();
		}else{
			//agrego el registro
		$sql = "insert into usuarios (documento, nombre, apellido) values ('$id', '$nombre', '$apellido')";
    	$query = $con->query($sql);
			echo '<br><div class="alert alert-success" role="alert">
		         <button type="button" class="close" data-dismiss="alert">&times;</button>
		         <strong>El usuario se ha dado de alta correctamente</strong><br>
			     </div>';
			exit();

		}
        }else{
        	echo '<br><div class="alert alert-danger" role="alert">
		         <button type="button" class="close" data-dismiss="alert">&times;</button>
		         <strong>Ha ocurrido un error accediento a la base de datos!!!</strong>
			     </div>';
			exit();

        }
    }
}

if ($situacion=='2'){
	if($con){
		$sql = "delete from usuarios where documento like '$id'";
		$resultado = $con->query($sql) or die($con->error);
    	if ($resultado){
				echo '<br><div class="alert alert-danger" role="alert">
		         <button type="button" class="close" data-dismiss="alert">&times;</button>
		         <strong>El usuario ha sido dado de baja correctamente</strong>
			     </div>';
			exit();
	
}
}
}






?>