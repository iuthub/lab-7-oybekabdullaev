<?php

include('connection.php');
include('index.php')

?>

<?
$username = '';
$pwd = '';
$confirmPwd = '';
$email = '';
$fullname = '';
$dob = '';
$usernamePattern = '^\w{4,}$/i';
$pwdPattern = '^\w{4,}$/i';
$fullnamePattern = '^[a-z]+( [a-z]+)*$/i';
$emailPattern = '^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i';
$dobPattern = '^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$';
$isValid = TRUE;
$isOk = TRUE;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>My Blog - Registration Form</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<?php include('header.php'); ?>

	<h2>User Details Form</h2>
	<h4>Please, fill below fields correctly</h4>
	<form action="register.php" method="post">
		<ul class="form">
			<li>
				<label for="username">Username</label>
				<input type="text" name="username" id="username" required form="registerForm" value="<?= $username ?>" />
				<?php if ($isPost && !preg_match($usernamePattern, $username)) : $isValid = false; ?>
					<span class="error">Required field.</span>
				<?php endif ?>
			</li>
			<li>
				<label for="fullname">Full Name</label>
				<input type="text" name="fullname" id="fullname" required form="registerForm" value="<?= $fullname ?>" />
				<?php if ($isPost && !preg_match($fullnamePattern, $fullname)) : $isValid = false; ?>
					<span class="error">Required field.</span>
				<?php endif ?>
			</li>
			<li>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" form="registerForm" <?= $email ?> />
				<?php if ($isPost && !preg_match($emailPattern, $emailname)) : $isValid = false; ?>
					<span class="error">Required field.</span>
				<?php endif ?>
			</li>
			<li>
				<label for="pwd">Password</label>
				<input type="password" name="pwd" id="pwd" required />
				<?php if ($isPost && (!preg_match($pwdPattern, $pwd) || $pwd != $confirmPwd)) : $isValid = false; ?>
					<span class="error">Required field.</span>
				<?php endif ?>
			</li>
			<li>
				<label for="confirm_pwd">Confirm Password</label>
				<input type="password" name="confirm_pwd" id="confirm_pwd" required form="registerForm" />
			</li>
			<?php
			if ($isPost && $isValid) {
				$isOk = $usersRepo->addUser($username, $pwd, $name, $email);
				if ($isOk) redirect('index.php');
			}
			?>
			<?php if (!$isOk) : ?>
				<span class="error">This user exists in database!</span>
			<?php endif ?>
			<li>
				<input type="submit" value="Submit" /> &nbsp; Already registered? <a href="index.php">Login</a>
			</li>
		</ul>
	</form>
</body>

</html>