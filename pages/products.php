<!DOCTYPE html>
<html lang="en">
<?php require_once("../connexion/dbconfig.php");
@$title = $_GET['ct'];
$product = $db->query("SELECT * FROM product WHERE Category IN (SELECT Category FROM category WHERE `BIG Category`='$title');");
session_start(); ?>

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
    <div><?php
            include('../templates/headerNav.php');
            ?></div>

    <div class="Products-ctn prdca row">
        <h3 class="col-12"><?php echo $title . ":"; ?> </h3>
        <?php if ($product->num_rows > 0) { ?>
            <?php while ($row1 = $product->fetch_assoc()) { ?>
                <?php
                $title = $row1['Title'];
                $result = $db->query("SELECT image FROM images WHERE Title='" . $row1['Title'] . "' limit 1"); ?>
                <?php if ($result->num_rows > 0) { ?>
                    <div class="Card">
                        <div class="Discount">-30%</div>
                        <div class="CardImg-ctn">
                            <?php while ($row2 = $result->fetch_assoc()) { ?>
                                <img class="CardImg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']);
                                                                                                $thisImage = base64_encode($row2['image']) ?>" alt="">
                        </div>
                        <a href="productinfo.php?title=<?php echo  $row1['Title'] ?>" class="TitleCard"><?php }
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
        } else {
            $product = $db->query("SELECT * FROM product WHERE Category IN (SELECT Category FROM category WHERE `Category`='$title');"); ?>
                <?php if ($product->num_rows > 0) { ?>
                    <?php while ($row1 = $product->fetch_assoc()) { ?>
                        <?php
                        $title = $row1['Title'];
                        $result = $db->query("SELECT image FROM images WHERE Title='" . $row1['Title'] . "' limit 1"); ?>
                        <?php if ($result->num_rows > 0) { ?>
                            <div class="Card">
                                <div class="Discount">-30%</div>
                                <div class="CardImg-ctn">
                                    <?php while ($row2 = $result->fetch_assoc()) { ?>
                                        <img class="CardImg" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row2['image']);
                                                                                                        $thisImage = base64_encode($row2['image']) ?>" alt="">
                                </div>
                                <a href="productinfo.php?title=<?php echo  $row1['Title'] ?>" class="TitleCard"><?php }
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
            } ?>


    </div>
    <?php if (!@$_SESSION['valid']) { ?>
        <script>
            setTimeout(loginnn, 10000);

            function loginnn() {
                location.href = "../pages/login.php"
            }
        </script>
    <?php } ?></button>
    <div style="padding-top: 50px;"><?php include('../templates/footer.php'); ?></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/mainjs.js"></script>
    <script src="../js/Main.js"> </script>
</body>

</html>