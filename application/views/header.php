<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="/PBSiteMVC/public/css/layout.css" type="text/css">
		<link rel="stylesheet" href="/PBSiteMVC/public/css/style.css" type="text/css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PB's Site</title>
    </head>
    <body>
        <div class="container">
			<br>

			<div class="row">
				<div class="col twelvecol" id="topMenu">
					<div style="float: left; width: 50%; text-align: left;">
						<?php
						if ($_SESSION['authenticated'] === true) {
							print 'Welcome ' . $_SESSION['username'];
							?>
							<form method = "get" action = "/PBSiteMVC/user/logoutResponse" style = "float:left">
								<button type = "submit">Logout</button>
							</form>

							<?php
						} else {
							?>
							<form method = "get" action = "/PBSiteMVC/user/loginRequest" style = "float:left">
								<button type = "submit">Login</button>
							</form>
							<form method = "get" action = "/PBSiteMVC/user/registerNewUserRequest" style = "float:left">
								<button type = "submit">Register</button>
							</form>

							<?php
						}
						?>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col twelvecol">
					<h1> PB's Site </h1>
				</div>
			</div>            <div class="row">
                <div class="col threecol" >
					<?php include 'leftsidebar.php'; ?>


                </div>

				<div class="col ninecol last">