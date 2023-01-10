<?php
require_once("../connexion/dbconfig.php");
@$title = $_GET['title'];
$cat = '';
$array = NULL;
$pinfo = $db->query("SELECT * FROM product WHERE Title='$title'");
$pinfo2 = $db->query("SELECT * FROM product WHERE Title='$title'");


?>
<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ecb124b51.js" crossorigin="anonymous"></script>
    <title>Mega-PC</title>
    <link rel="stylesheet" href="../css/productifocss.css">
</head>

<body>
    <div>
        <?php include('../templates/headerNav.php') ?>
    </div>
    <main style="max-width: 1080px; margin: 40px auto;">

        <div class="Card-wrapper">
            <div class="CARD">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <?php if ($pinfo->num_rows > 0) {
                                while ($row1 = $pinfo->fetch_assoc()) {
                                    $cat = $row1['Category'];
                                    $result = $db->query("SELECT image FROM images WHERE Title='" . $row1['Title'] . "' ");
                                    while ($row2 = $result->fetch_assoc()) {
                            ?><?php $array = $array . "," . base64_encode($row2['image']); ?>
                            <!-- loop 3la smiya dlimag -->

                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']);
                                                                            $thisImage = base64_encode($row2['image']) ?>" alt="error frst imagae">

                        <?php
                                    } ?>
                        </div>
                    </div>
                    <div class="img-select">
                        <?php $array = explode(",", $array);
                                    $ln = count($array);
                                    for ($i = 1; $i < $ln; $i++) {

                        ?>
                            <div class="img-item">
                                <a href="#" data-id="<?php echo $i; ?>">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo $array[$i];
                                                                                    ?>" alt="error frst imagae">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- card right -->
                <div class="product-content">
                    <h5 class="product-title"><?php echo $row1['Title']; ?></h5>

                    <div class="product-price">
                        <span class="new-price Price"><?php echo $row1['Price']; ?> DH</span>
                        <span class="last-price oldPrice"><?php echo $row1['OldPrice']; ?> DH</span>
                        <div class="Discount2">-30%</div>
                    </div>

                    <div class="product-detail">
                        <h4>about this item: </h4>
                        <p><?php echo $row1['Description']; ?></p>
                        <ul>
                            <li>Color: <span><?php echo $row1['Color']; ?></span></li>
                            <li>Stock: <span><?php echo $row1['Stock']; ?></span></li>
                            <li>Category: <span><?php echo ucfirst(strtolower($row1['Category'])); ?></span></li>
                        </ul>
                    </div>

                    <div class="purchase-info">
                        <button value='<?php echo $row1['Title']   ?> ,<?php echo $thisImage;  ?>,<?php echo $row1['Price'] ?>' type="button" class="btn text-white ps-5 pe-5 test1" name="test0" style="background-color: #6ad048;">
                            Add to Cart <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>

    <?php }
                            }
                            $product = $db->query("SELECT * FROM product WHERE Category ='$cat' ORDER BY Title DESC") ?>

        </div>
        <hr style="border: 2px solid #4daa2e;">

        <div class="Products-ctn topSell row">
            <h3 class="col-12">RELEATED PRODUCTS : </h3>
            <?php $i = 0;
            if ($product->num_rows > 0) {
            ?>
                <?php while ($row1 = $product->fetch_assoc()) {
                    if ($i == 4) {
                        break;
                    } else {
                        $i++;
                    }

                ?>
                    <?php
                    $title = $row1['Title'];
                    $result = $db->query("SELECT image FROM images WHERE  Title='" . $row1['Title'] . "'   limit 1"); ?>
                    <?php if ($result->num_rows > 0) {
                    ?>
                        <div class="Card">
                            <div class="Discount">-30%</div>
                            <div class="CardImg-ctn">
                                <?php while ($row2 = $result->fetch_assoc()) {
                                ?>
                                    <img class="CardImg tet" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']);
                                                                                                        $thisImage = base64_encode($row2['image']) ?>" alt="">
                            </div>
                            <a href="productinfo.php?title=<?php echo  $row1['Title'] ?>" id="Title" class="TitleCard"><?php }
                                                                                                                }
                                                                                                                echo  $row1['Title'] ?></a>

                            <div class="item-ctn">
                                <span class="frstprx">
                                    <span class="Price"><?php echo $row1['Price'] ?> MAD </span>
                                </span>
                                <span class="scndprx">
                                    <span class="oldPrice"><?php echo $row1['OldPrice'] ?> MAD </span>
                                </span>
                            </div>
                            <div class="item-ctn">
                                <i class="fa-regular fa-heart" onclick=""></i>
                                <button class="test1" name="test0" value='<?php echo $row1['Title']   ?> ,<?php echo $thisImage;  ?>,<?php echo $row1['Price'] ?>'>ADD TO CART</button>
                            </div>
                        </div>
                <?php }
            }


                ?>


        </div>

        <hr style="border: 2px solid #4daa2e;">


        <div style="margin: 30px 0;"><?php include('../templates/subscribe.php'); ?></div>
    </main>
    <div style="padding-top: 50px;"><?php include('../templates/footer.php'); ?></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/mainjs.js"></script>
    <script src="../js/Main.js"> </script>
    <?php if (!@$_SESSION['valid']) { ?>
        <script>
            setTimeout(loginnn, 10000);

            function loginnn() {
                location.href = "../pages/login.php"
            }
        </script>
    <?php } ?></button>
</body>

</html>