<?php
require_once("../connexion/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>
    <H4 style="text-align: center;padding-top:15px ;">ADD PRODUCT :</H4>
    <form action="../templates/addProduct.php" method="post" enctype="multipart/form-data">
        <br>
        <div class="row justify-content-center">
            <label class="col-3">Category of Product:</label>
            <select name="cat" class="col-3">
                <option value="REFROIDISSEMENT">REFROIDISSEMENT</option>
                <option value="ALIMENTATION">ALIMENTATION</option>
                <option value="Ram">Ram</option>
                <option value="HDD storage">HDD storage</option>
                <option value="SSD storage">SSD storage</option>
                <option value="Graphics card">Graphics card</option>
                <option value="Processor">Processor</option>
                <option value="Cases">Cases</option>
                <option value="Motherboard">Motherboard</option>
                <option value="Mouse">Mouse</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Mouse pad">Mouse pad</option>
                <option value="Headset">Headset</option>
                <option value="Monitors">Monitors</option>
                <option value="Gaming Laptop">Gaming Laptop</option>
                <option value="Gaming Chair">Gaming Chair</option>
            </select>
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3">Title of Product:</label>
            <input class="col-3" type="text" name="Title">
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3">Price of Product(Dh):</label>
            <input class="col-3" type="text" name="price">
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3" class="a">Description of Product:</label>
            <textarea class="col-3" class="a" type="text" name="desc" cols="30" row justify-content-centers="10"></textarea>
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3">Color of Product:</label>
            <input class="col-3" type="text" name="color">
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3">Stock of Product:</label>
            <input class="col-3" type="text" name="stock">
        </div><br>
        <div class="row justify-content-center">
            <label class="col-3">Select Image For the product: </label>
            <input class="col-3 " type="file" name="image[]" multiple>
        </div><br>
        <div class="row justify-content-center">
            <input class="col-3 center btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
    </form>
</body>

</html>