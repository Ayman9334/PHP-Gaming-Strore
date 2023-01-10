<?php
session_start();
require_once("../connexion/dbconnect.php");

$email = strtolower($_POST["email"]);
$password = $_POST["pass"];
$checkinA = "SELECT firstname,secondname,email,password FROM admins WHERE email='$email'";
$checkinC = "SELECT firstname,secondname,email,password FROM customers WHERE email='$email'";
$resA = $db->query($checkinA);
$resC = $db->query($checkinC);
if ($resA->num_rows > 0) {
    while ($row1 = $resA->fetch_assoc()) {
        if ($row1["email"] == $email && $row1["password"] == $password) {
            $_SESSION['valid'] = true;
            $_SESSION['Admin'] = true;
            $_SESSION['frstn'] = $row1["firstname"];
            $_SESSION['secn'] = $row1["secondname"];
            header('Location:../Home/main.php');
            break;
        }
    
    };
    
}
elseif ($resC->num_rows > 0) {
    while ($row2 = $resC->fetch_assoc()) {
        if ($row2["email"] == $email && $row2["password"] == $password) {
            $_SESSION['valid'] = true;
            $_SESSION['Admin'] = false;
            $_SESSION['frstn'] = $row2["firstname"];
            $_SESSION['secn'] = $row2["secondname"];
            header('Location:../Home/main.php');
            break;
        }
        header('Location:../pages/login.php');
    };
} 
else {
    header('Location:../pages/login.php');
}
