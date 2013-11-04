<?php
	/***
	 * Wololo - Index
	 * 
	 * @Author		Rafael Keramidas <rafael@keramid.as>
	 * @Version     1.0
	 * @Date        4th November 2013
	 * @Licence     MIT <Look at license.txt>
	 ***/
	 
	session_start();
	
	require('includes/config.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="favicon.png">

		<title>Wololo</title>

		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div class="container">
		<div class="header">
			<h3 class="text-muted">Wololo - Easy Wake on LAN</h3>
		</div>

		<?php
			if($aMainConfig['password'] !== false && !isset($_SESSION['logged'])) {
				if(isset($_POST['password'])) {
					if($_POST['password'] == $aMainConfig['password']) {
						$_SESSION['logged'] = true;
						header('Location: index.php');
					}
					else {
						echo '<div class="alert alert-danger">Wrong password</div>';
					}
				}
				
				echo '<div class="jumbotron">
					<h2>This page is password protected</h2>
					<form method="POST" action="index.php">
						<input type="password" name="password" class="form-control" />
						<input type="submit" value="Continue" class="btn btn-primary" />
					</form>
				</div>';
			}	
			else {
				echo '<div class="row marketing">';
				foreach($aComputers as $iKey => $aComputer) {
					echo '<div class="col-lg-6">
						<h4>' . $aComputer['alias'] . '</h4>
						<p>IP: ' . $aComputer['checkip'] . '<br>MAC: ' . $aComputer['mac'] . '</p>
						<button name="' . $iKey . '" type="button" class="btn btn-info wake">Wake</button> <button name="' . $iKey . '" type="button" id="status-' . $iKey . '"class="btn btn-danger status" data-toggle="tooltip" data-placement="right" title data-original-title="Click to refresh">Offline</button>
						<img src="css/loading.gif" id="loading-' . $iKey . '" class="hidden" />
					</div>';
				}
				echo '</div>';
			}
		?>

		<div class="footer">
			<p><a href="https://github.com/rafaelkeramidas/wololo/">Wololo</a> - Developed by Rafael Keramidas</p>
		</div>

	</div> 
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/wololo.js"></script>
	
	<script>
		<?php
		foreach($aComputers as $iKey => $aComputer)
			echo "isOnline($iKey);\n";
		?>
	</script>
	
	</body>
</html>
