<?php
require_once("../connexion/dbconfig.php");

@$cat = $_POST['cat'];
@$Title = $_POST['Title'];
@$price = intval($_POST['price']);
@$desc = $_POST['desc'];
@$color = $_POST['color'];
@$stock = $_POST['stock'];
@$image = $_POST['image'];
@$submit = $_POST['submit'];
$status = $statusMsg = '';
if (isset($submit)) {
    // Insert product content into database 
    $inertprod = $db->query("UPDATE product SET Category='$cat',Title='$Title',Price='$price',Description='$desc',Color='$color',Stock='$stock' WHERE Title='$Title'");
    $status = 'error';
    if (isset($_FILES["image"]["name"])) {
        $delete = $db->query("DELETE FROM images WHERE Title='$Title'");
        for ($i = 0; $i < count($_FILES["image"]["name"]); $i++) {
            if (!empty($_FILES["image"]["name"][$i])) {
                
                // Get file info 
                $fileName = basename($_FILES["image"]["name"][$i]);
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $_FILES['image']['tmp_name'][$i];
                    $imgContent = addslashes(file_get_contents($image));

                    // Insert image content into database 
                    $insert = $db->query("INSERT into images (Title,image) VALUES ('$Title','$imgContent')");
                }
            }
        }
    }
}

header('location:../pages/productT.php');
