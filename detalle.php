<?php
include 'conexion.php';
$id=$_POST[id];
if($con){
    $sql = "SELECT * from guiacompleta where numero_guia like '$id'";
    $query = $con->query($sql);
    
    if(mysqli_num_rows($query)) 
        { 
            $texto="";
            while($guia = mysqli_fetch_assoc($query)) 

            { 
                 $pro1=$guia["descripcion"];
                 $pro2=$guia["nombre_producto"];
                 $pro3=$guia["total_producto"];
                $texto=$texto."Descripcion: ".$pro1."-".$pro2." Valor: ".$pro3."<br>";
            }
echo $texto;
}

}


?>