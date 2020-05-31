<?php
require "conexion.php";
if($con){
    $sql = "SELECT distinct(numero_guia) FROM guia order by numero_guia desc";
    $query = $con->query($sql);
    $data = array();
    while($r = $query->fetch_assoc()){
        $data[] = $r;
    }
    echo json_encode(array("obras"=>$data));
}




?>