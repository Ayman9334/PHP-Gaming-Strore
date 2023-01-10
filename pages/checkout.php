<?php
@$Table = $_GET['khdma'];
@$succ = $_GET['success'];

?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6ecb124b51.js" crossorigin="anonymous"></script>
    <title>Mega-PC/Checkout</title>
    <link rel="stylesheet" href="../css/checkout.css">
</head>

<body>
    <?php
    include('../templates/headerNav.php');
    ?>
    <div class="section">
        <?php
        if (isset($succ)) {
        ?> <div class="success" style="height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
        font-weight: 500;
        width: 100vw;">
                <p> your order(s) has been success go back to <a href="../Home/main.php" style="color: #6ad048; text-decoration: none;"> Home page</a> </p>
            </div>
        <?php } else {
        ?>
            <div class="container mt-5 mb-5">
                <div class="row">

                    <div class="col-md-6 me-3 mb-5">

                        <div class="billing-details">
                            <div class="section-title pb-4">
                                <h3 class="title">Billing address</h3>
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="first-name" placeholder="First Name">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="last-name" placeholder="Last Name">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group pb-3">
                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                            </div>

                        </div>

                        <div class="order-notes">
                            <textarea class="input" placeholder="Order Notes"></textarea>
                        </div>
                    </div>

                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>PRODUCT</strong></div>
                                <div><strong>TOTAL</strong></div>
                            </div>

                            <div class="order-products">
                                <?php

                                $product = explode("*", $Table);
                                $titles = "";
                                @$Total = 0;
                                for ($i = 0; $i < count($product) - 1; $i++) {
                                    $pr = $product[$i];
                                    $pr = explode(",", $pr);
                                    @$titles = $titles . $pr[0] . ",";
                                    @$Total += $pr[1];

                                ?>
                                    <div class="order-col">
                                        <div><?php echo @$pr[0]; ?></div>
                                        <div><?php echo @$pr[1]; ?> DH</div>
                                    </div>
                                <?php }
                                ?>
                            </div>

                            <div class="order-col">
                                <div>Shiping</div>
                                <div><strong>FREE</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><strong class="order-total"><?php echo @$Total; ?> DH</strong></div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="input-radio mb-2">
                                <input type="radio" name="payment" id="payment-1">
                                <label for="payment-1">
                                    Direct Bank Transfer
                                </label>
                            </div>
                            <div class="input-radio mb-2">
                                <input type="radio" name="payment" id="payment-2">
                                <label for="payment-2">
                                    Cheque Payment
                                </label>
                            </div>
                            <div class="input-radio mb-2">
                                <input type="radio" name="payment" id="payment-3">
                                <label for="payment-3">
                                    Paypal System
                                </label>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="terms">
                            <label for="terms">
                                <span></span>
                                I've read and accept the <a href="#">terms & conditions</a>
                            </label>
                        </div>
                        <a href="../templates/placeOrder.php?titles=<?php echo $titles ?>" class="btn order-submit text-white" style="background-color: #6ad048;">Place order</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (!@$_SESSION['valid']) { ?>
            <script>
                location.href = "../pages/signup.php"
            </script>
        <?php } ?></button>
</body>

</html>