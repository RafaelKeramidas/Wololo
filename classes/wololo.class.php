<?php
	/***
	 * Wololo - Main class
	 * 
	 * @Author		Rafael Keramidas <rafael@keramid.as>
	 * @Version     1.0
	 * @Date        4th November 2013
	 * @Licence     MIT <Look at license.txt>
	 ***/
	 
	class Wololo {
	
		public function wake($sBroadcast, $sMac) {
			$sMagicPacket = null;
			$sHwAddr = null;
			$aMac = explode(':', $sMac);
			
			
			foreach($aMac as $sMac) 
				$sHwAddr .= chr(hexdec($sMac));
			
			for($i = 0; $i < 6; $i++) 
				$sMagicPacket .= chr(0xFF);
				
			for($i = 0; $i < 16; $i++)
				$sMagicPacket .= $sHwAddr;
			
			/* Old way, wasn't working well */
			// $rSocket = fsockopen('udp://' . $sBroadcast, 7);
			// fwrite($rSocket, $sMagicPacket);
			// fclose($rSocket);
			
			$rSocket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
			socket_set_option($rSocket, 1, 6, true);
			socket_sendto($rSocket, $sMagicPacket, strlen($sMagicPacket), 0, $sBroadcast, 7);
			socket_close($rSocket);
			
			return true;
		}
		
		public function isOnline($sIP, $iPort) {
			$rSocket = fsockopen('tcp://' . $sIP, $iPort);
			socket_set_timeout($rSocket, 1);
			
			return !$rSocket ? false : true;
		}
		
	}
?>