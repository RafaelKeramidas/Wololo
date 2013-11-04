<?php
	/***
	 * Wololo - Config
	 * 
	 * @Author		Rafael Keramidas <rafael@keramid.as>
	 * @Version     1.0
	 * @Date        4th November 2013
	 * @Licence     MIT <Look at license.txt>
	 ***/

	$aMainConfig = array(
		'password' => false,				/* Set a password (string) or put false to disable the password protection */
		'broadcast' => '255.255.255.255',	/* Broadcast IP */
		'packetcount' => 5,					/* Amount of MagicPackets to send */
		'interval' => 1000					/* Interval between the packets (in ms) */
	);
	
	$aComputers = array(
		array(
			'alias' => 'Windows PC',		/* Computer name/alias */
			'mac' => 'AB:CD:EF:00:11:22',	/* Computer MAC address (six groups of two hexadecimal digits, separated by colons (:)) */
			'checkip' => '192.168.1.4',		/* Computer IP (to check if it's online) */
			'checkport' => 3389				/* TCP port to check (3389 is RDP, enabled on most Windows hosts) */
		),
		array(
			'alias' => 'My NAS',
			'mac' => '00:11:22:33:44:55',
			'checkip' => '192.168.1.2',
			'checkport' => 22
		)
		/** And so on to add other computers
		array(
			'alias' => 'My super computer',
			'mac' => '00:11:22:33:44:55',
			'checkip' => '192.168.1.3',		
			'checkport' => 3389
		)
		**/
	)

?>