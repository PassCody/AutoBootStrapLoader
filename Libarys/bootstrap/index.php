<?php
	class LoadBootStrap {
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
