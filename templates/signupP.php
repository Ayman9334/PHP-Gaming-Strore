<?php
require_once("../connexion/dbconnect.php");

$firstname = strtolower($_POST["fname"]);
$secondname = strtolower($_POST["lname"]);
$email = strtolower($_POST["email"]);
$password = $_POST["pass"];
$check = "SELECT * FROM customers WHERE email='$email'";
$res = $db->query($check);
if ($res->num_rows > 0) {
    header('Location:../pages/signup.php?error=this email already exists in our records ');
} else {
    $user = "INSERT INTO customers(firstname,secondname,email,password) VALUES('$firstname','$secondname','$email','$password')";
    if ($db->query($user) === TRUE) {
        header("location:../pages/login.php?succ=Your account has been created successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
