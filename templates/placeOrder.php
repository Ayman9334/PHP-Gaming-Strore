<?php
$titles=$_GET['titles'];
require_once("../connexion/dbconfig.php");

$titles=explode(",",$titles);
for($i=0;$i<count($titles)-1;$i++){
    $title=$titles[$i];
    $inertprod = $db->query("UPDATE product SET Stock=Stock-1,ORDERS=ORDERS+1 WHERE Title='$title'");
}
header('location:../pages/checkout.php?success=true.php')
?>