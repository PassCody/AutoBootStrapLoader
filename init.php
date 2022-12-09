<?php
	class Initialisation {
		
		private $direct;
		
		function getFileLocation() {
			$value = "";
			$value = $_SERVER["REQUEST_URI"];
			return($value);
		}
		function getCurrentDirectory() {
			$dir = "";
			$getFileLocation = $this->getFileLocation();
			$countetSlashes = substr_count($getFileLocation,"/")-1;
			
			if ($getFileLocation !== "") {
				for ($i = 0; $i < $countetSlashes; $i++) {
					$dir = $dir."../";
				}
			}
			$dir = $dir."./Libarys/bootstrap";
			return $dir;
		}
		function setDirect($dir) {
			$this->direct = $dir;
		}
		function getDirect() {
			return $this->direct;
		}
		function loadBS() {
			$this->setDirect($this->getCurrentDirectory());
			include_once($this->getDirect()."/index.php");
			$loadBS = new LoadBootStrap();
			$loadBS->loadBootStrap();
		}
	}
?>
