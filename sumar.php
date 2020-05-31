<?php
include "conexion.php";
$valores=$_POST[valores];
$longitud = count($valores);
 	if($con){
		$sql = "SELECT MAX(SUBSTR(numero_guia,2))+1 as nuevo FROM guia";
		$resultado = $con->query($sql) or die($con->error);
    	if ($resultado){
    		$nuevaguia = mysqli_fetch_array($resultado);
    		$nuevo=$nuevaguia["nuevo"];
    		if ($nuevo<10){
    			$nuevo="P000".$nuevo;
    			}elseif($nuevo<100){
    				$nuevo="P00".$nuevo;
    			}elseif($nuevo<1000){
    				$nuevo="P0".$nuevo;
    			}elseif($nuevo<10000){
    				$nuevo="P".$nuevo;
    			}else{
    				$nuevo="P0001";
    			}
    		

    		foreach($valores as $producto)
 			{
			$agrego=$producto["id"];
			$sql = "insert into guia (numero_guia, id_productos) values ('$nuevo', '$agrego')";
			$resultado = $con->query($sql) or die($con->error);
			}

				echo '<br><div class="alert alert-success" role="alert">
		         <button type="button" class="close" data-dismiss="alert">&times;</button>
		         <strong>la guia '.$nuevo.' se ha dado de alta correctamente</strong><br>
			     </div>';
		
		}
	}
?>