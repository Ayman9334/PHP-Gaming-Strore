<?php
require_once("../connexion/dbconfig.php");

@$title = $_GET['id'];
$result = $db->query("SELECT image FROM images WHERE Title='$title'  ");
$product = $db->query("SELECT * FROM product WHERE Title='$title'");
while ($row1 = $product->fetch_assoc()) {


?>
<?php session_start(); ?>
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
        <form action="../templates/editproduct.php" method="post" enctype="multipart/form-data">
            <br>
            <div class="row justify-content-center">
                <label class="col-3">Category of Product:</label>
                <input class="col-3" type="text" name="cat" value="<?php echo @$row1['Category'] ?>">
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3">Title of Product:</label>
                <input class="col-3" type="text" name="Title" value="<?php echo @$row1['Title'] ?>">
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3">Price of Product(Dh):</label>
                <input class="col-3" type="text" name="price" value="<?php echo @$row1['Price']."DH" ?>">
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3" class="a">Description of Product:</label>
                <textarea class="col-3 " id="myTextarea" class="a" type="text" name="desc" cols="30" row justify-content-centers="10"></textarea>
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3">Color of Product:</label>
                <input class="col-3" type="text" name="color" value="<?php echo @$row1['Color'] ?>">
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3">Stock of Product:</label>
                <input class="col-3" type="text" name="stock" value="<?php echo @$row1['Stock'] ?>">
            </div><br>
            <div class="row justify-content-center">
                <label class="col-3"> Images Of the product: </label>
                <div class="col-3">
                <?php if ($result->num_rows > 0) { ?>
                    <div>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <img class="w-25 h-25" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
                        <?php }} ?>
                    </div>
                    <input  type="file" name="image[]" multiple>
                </div>
                
            </div><br>
            <div class="row justify-content-center">
                <input class="col-3 center btn btn-primary" type="submit" name="submit" value="Submit">
                <a class="col-3 center btn btn-secondary" href="productT.php">return</a>
            </div>
        </form>
        <script>
            document.getElementById("myTextarea").value = "<?php echo @$row1['Description'] ?>";
        </script>
    </body>
<?php } ?>


</html>