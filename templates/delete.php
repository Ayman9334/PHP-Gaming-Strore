<?php
@$title = $_GET['id'];
require_once("../connexion/dbconfig.php");
if (isset($title)) {
    $product = $db->query("DELETE FROM product WHERE Title='$title'");
    $image = $db->query("DELETE FROM images WHERE Title='$title'");
    header('location:../pages/productT.php');
}
