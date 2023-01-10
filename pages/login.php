<?php @$success = $_GET['succ']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>MEGA-PC/Login</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/6ecb124b51.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
	<div style="position: fixed;top: 0;left:0;z-index: 2;background-color: #6ad048;border-radius: 0 0 12px 0;">
		<a href="../Home/main.php" style="text-decoration: none;color: #fff;font-size: 30px;font-family: FontAwesome;">
			<i class="fa-solid fa-arrow-left" style="padding: 10px 20px;"></i>
		</a>
	</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../templates/loginP.php" method="post">
					<div class="succ" style="text-align: center;margin-bottom: 15px;"><?php echo $success; ?></div>
					<span class="login100-form-title p-b-43 pb-5">
						LOGIN TO CONTINUE
					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">E-mail</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox p-2">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>


					<div class="container-login100-form-btn pt-2">
						<button class="login100-form-btn" type="submit" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt1">
							or <a href="signup.php" style="text-decoration: none;color: #6ad048;">sign up</a> to continue
						</span>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('../images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	<script src="../js/login.js"></script>

</body>

</html>