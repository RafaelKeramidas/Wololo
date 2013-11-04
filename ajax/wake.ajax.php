<?php
	/***
	 * Wololo - AJAX Wake
	 * 
	 * @Author		Rafael Keramidas <rafael@keramid.as>
	 * @Version     1.0
	 * @Date        4th November 2013
	 * @Licence     MIT <Look at license.txt>
	 ***/
	 
	error_reporting(0);		/* Getting useless warnings if the server is offline */
	session_start();
	
	require('../includes/config.inc.php');
	require('../classes/wololo.class.php');
	
	$oWololo = new Wololo();

	if($aMainConfig['password'] !== false && !isset($_SESSION['logged'])) {
		echo 'Session expired. Refresh the page.';
	}
	else {
		if(isset($_GET['id']) && array_key_exists($_GET['id'], $aComputers)) {
			$iComputerID = $_GET['id'];
			
			for($i = 0; $i < $aMainConfig['packetcount']; $i++) {
				$oWololo->wake($aMainConfig['broadcast'], $aComputers[$iComputerID]['mac']);
				usleep($aMainConfig['interval'] * 1000);
			}
			echo 'Magic Packets sent !';
		}
		else {
			echo 'Unknown computer.';
		}
	}
?>