<?php
	class LoadBootStrap {
		
		function getFileLocation() {
			$value = "";
			$value = $_SERVER["REQUEST_URI"];
			return($value);
		}
		
		function loadBootStrap() {
			$init = new Initialisation();
			$init->setDirect($init->getCurrentDirectory());
			include_once($init->getDirect()."/bootstrap_loader.php");
			$bootstrap = new BootStrap();
			$bootstrap->loadFileGeter("JS", $init->getDirect());
			$bootstrap->loadFileGeter("CSS", $init->getDirect());
		}
	}
?>
