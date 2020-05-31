<?php
require "conexion.php";
if($con){
    $sql = "SELECT * FROM productos order by id desc";
    $query = $con->query($sql);
    $data = array();
    while($r = $query->fetch_assoc()){
        $data[] = $r;
    }
    echo json_encode(array("obras"=>$data));
}




?>