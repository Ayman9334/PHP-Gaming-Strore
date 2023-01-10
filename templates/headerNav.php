<?php $admin = @$_SESSION['Admin'] ?>
<head>
    <link rel="stylesheet" href="../css/Header.css">
</head>

<body>

    <div class="header">
        <div class="header-top">
            <div class="container">
                <div class="admin">
                    <?php
                    if (isset($admin) and $admin==true) {
                        echo '<div><a href="../pages/productT.php">Control Panel
                            </a></div>
                        ';
                    }else{} ?>
                </div>
                <div class="elements">
                    <div>
                        <p>Currency : </p><select onchange="currency()" class="pe-3" name="" id="Currency">
                            <option value="MAD" selected>MAD</option>
                            <option value="Dollar">Dollar</option>
                        </select>
                    </div>

                    <div>
                        <i class="fa-solid fa-heart"></i>
                        <a href="" class="pe-3">wishlist</a>
                    </div>
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <p> <?php if (@$_SESSION['valid']) { ?>
                                <?php echo '<button class="login-name" onclick="shwlogout()">' . "Welcome " . ucfirst($_SESSION["frstn"]) . " " . ucfirst($_SESSION["secn"]) . "</button>"; ?>
                            <?php } else { ?> <a href="../pages/login.php">login</a> or <a href="../pages/signup.php">sing up</a> <?php } ?> </p>


                        <?php if (@$_SESSION['valid']) { ?>
                            <div class="logout-btn" id="logout-btn"><button onclick="location.href='../templates/logout.php'" class="btn">Log out</button></div>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </div>
        <div class="header-med">
            <div class="container">
                <div class="logo"><a href="../Home/main.php"><img src="../images/MegaPc.png" alt="logo"></a></div>
                <div class="searchbar-ctn1">
                    <input class="searchBar" type="search" name="" placeholder="Search">
                    <select name="" id="">
                        <option value="">All Categories</option>
                        <option value="">PC Components</option>
                        <option value="">PC Accessories</option>
                        <option value="">Monitors</option>
                        <option value="">Gaming Laptop</option>
                        <option value="">Gaming Chair</option>
                    </select>
                    <div class="searchicon-ctn"><i class="fa-solid fa-magnifying-glass"></i></div>
                </div>
                <div class="cart-ctn">
                    <i class="fa-solid fa-cart-shopping cartshoping" onclick="showcart()"></i>
                    <div class="cart-notif" id="cart-notif">0</div>

                    <div class="cart-dropdown" id="cart-dropdown">
                        <div class="cart-list">
                            <!-- loop hna -->
                            
                            <!---------------------------->
                        </div>
                        <div class="cart-summary">
                            <span id='itemnu'></span><small> Item(s) selected</small>
                            <h5>SUBTOTAL: <span id="Total" class="Price"></span></h5>
                        </div>
                        <div class="cart-btns">
                            <a href="../pages/checkout.php" id='khdma'>Checkout <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="header-but">
            <button class="but-arrow"><i class="fa-solid fa-chevron-down"></i></button>
            <div class="categories">
                <div class="dropdown">
                    <button class="drpdwn"><a href="../pages/products.php?ct=PC Component"> PC Component </a> <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <a href="../pages/products.php?ct=REFROIDISSEMENT">REFROIDISSEMENT</a>
                        <a href="../pages/products.php?ct=ALIMENTATION">ALIMENTATION</a>
                        <a href="../pages/products.php?ct=Ram">Ram</a>
                        <a href="../pages/products.php?ct=HDD storage">HDD storage</a>
                        <a href="../pages/products.php?ct=SSD storage">SSD storage</a>
                        <a href="../pages/products.php?ct=Graphics card">Graphics card</a>
                        <a href="../pages/products.php?ct=Processor">Processor</a>
                        <a href="../pages/products.php?ct=Cases">Cases</a>
                        <a href="../pages/products.php?ct=Motherboard">Motherboard</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="drpdwn"><a href="../pages/products.php?ct=PC Accessories"> PC Accessories </a><i class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <a href="../pages/products.php?ct=Mouse">Mouse</a>
                        <a href="../pages/products.php?ct=Keyboard">Keyboard</a>
                        <a href="../pages/products.php?ct=Mouse pad">Mouse pad</a>
                        <a href="../pages/products.php?ct=Headset">Headset</a>
                    </div>
                </div>
                <a href="../pages/products.php?ct=Monitors"><button>Monitors</button></a>
                <a href="../pages/products.php?ct=Gaming Laptop"><button>Gaming Laptop</button></a>
                <a href="../pages/products.php?ct=Gaming Chair"><button>Gaming Chair</button></a>
            </div>
        </div>
    </div>
    <script src="../js/Main.js"></script>
</body>

</html>