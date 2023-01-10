<?php
require_once("../connexion/dbconfig.php");

$product = $db->query("SELECT * FROM product ORDER BY ORDERS DESC;");
$pd2 = $db->query("SELECT * FROM product ORDER BY Title DESC LIMIT 4;")

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

    <link rel="stylesheet" href="../css/mainCss.css">


</head>

<body>
    <div><?php include('../templates/headerNav.php'); ?></div>

    <main>
        <div class="main-ctn">
            <!-- BUILD PC -->

            <div style="cursor: pointer;" onclick="location.href='../pages/erorpage.html'" class="Build-pc">
                <div class="bg-cl"></div>
                <p>BUILD YOUR OWN<br>PC</p>
                <p class="buildNow">BUILD NOW <i class="fa-solid fa-circle-arrow-right"></i></p>
            </div>

            <!-- TOP SELL -->
            <div class="Products-ctn topSell row">
                <h3 class="col-12">TOP PRODUCT : </h3>
                <?php $i = 0;
                if ($product->num_rows > 0) {
                ?>
                    <?php while ($row1 = $product->fetch_assoc()) {
                        if ($i == 8) {
                            break;
                        } else {
                            $i++;
                        }

                    ?>
                        <?php
                        $title = $row1['Title'];
                        $result = $db->query("SELECT image FROM images WHERE Title='" . $row1['Title'] . "' limit 1"); ?>
                        <?php if ($result->num_rows > 0) { ?>
                            <div style="cursor:pointer;" class="Card">
                                <div class="Discount">-30%</div>
                                <div class="CardImg-ctn">
                                    <?php while ($row2 = $result->fetch_assoc()) {
                                    ?>
                                        <img class="CardImg tet" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']);
                                                                                                            $thisImage = base64_encode($row2['image']) ?>" alt="">
                                </div>
                                <a href='../pages/productinfo.php?title=<?php echo  $row1['Title'] ?>' id="Title" class="TitleCard"><?php }
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
                                    <button class="test1" name="test0" value='<?php echo $row1['Title']   ?> ,<?php echo $thisImage;  ?>,<?php echo $row1['Price'] ?>'> ADD TO CART

                                </div>
                            </div>
                    <?php }
                }


                    ?>


            </div>
            <hr style="border: 2px solid #4daa2e;">

            <!-- NEW PRODUCT -->



            <div class="Products-ctn NewProducts row">
                <h3 class="col-12">NEW PRODUCTS : </h3>
                <?php $i = 0;
                if ($pd2->num_rows > 0) {
                ?>
                    <?php while ($r1 = $pd2->fetch_assoc()) {
                        if ($i == 4) {
                            break;
                        } else {
                            $i++;
                        }

                    ?>
                        <?php
                        $title = $row1['Title'];
                        $res = $db->query("SELECT image FROM images WHERE Title='" . $r1['Title'] . "' limit 1"); ?>
                        <?php if ($res->num_rows > 0) { ?>
                            <div class="Card">
                                <div class="Discount">-30%</div>
                                <div class="CardImg-ctn">
                                    <?php while ($r2 = $res->fetch_assoc()) {
                                    ?>
                                        <img class="CardImg tet" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($r2['image']);
                                                                                                            $thisImage = base64_encode($r2['image']) ?>" alt="">
                                </div>
                                <a href='../pages/productinfo.php?title=<?php echo  $r1['Title'] ?>' id="Title" class="TitleCard"><?php }
                                                                                                                            }
                                                                                                                            echo  $r1['Title'] ?></a>
                                <div class="item-ctn">
                                    <span class="frstprx">
                                        <span class="Price"><?php echo $r1['Price'] ?> MAD </span>
                                    </span>
                                    <span class="scndprx">
                                        <span class="oldPrice"><?php echo $r1['OldPrice'] ?> MAD </span>
                                    </span>
                                </div>
                                <div class="item-ctn">
                                    <i class="fa-regular fa-heart" onclick=""></i>
                                    <button class="test1" name="test0" value='<?php echo $row1['Title']   ?> ,<?php echo $thisImage;  ?>,<?php echo $r1['Price'] ?>'>ADD TO CART</button>
                                </div>
                            </div>
                    <?php }
                }


                    ?>

            </div>
            <hr style="border: 2px solid #4daa2e;">
            <div><?php include('../templates/subscribe.php'); ?></div>
        </div>
    </main>
    <div style="padding-top: 50px;"><?php include('../templates/footer.php'); ?></div>
    <?php if (!@$_SESSION['valid']) { ?>
        <script>
            setTimeout(loginnn, 10000);

            function loginnn() {
                location.href = "../pages/signup.php"
            }
        </script>
    <?php } ?></button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/Main.js"></script>

</body>

</html>