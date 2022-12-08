<?php
	class Initialisation {
		function getFileLocation() {
			$value = "";
			$value = $_SERVER["REQUEST_URI"];
			return($value);
		}
		function getDirectory() {
			$dir = "";
			$getFileLocation = $this->getFileLocation();
			$countetSlashes = substr_count($getFileLocation,"/")-1;
			
			if ($getFileLocation === "") {
				$dir = "./Libarys/bootstrap";
			}
			else {
				for ($i = 0; $i < $countetSlashes; $i++) {
					$dir = $dir."../";
				}
				$dir = $dir."./Libarys/bootstrap";
			}
			return $dir;
		}
		function loadBS() {
			$dir = $this->getDirectory();
			include_once($dir."/index.php");
			$loadBS = new LoadBootStrap();
			$loadBS->loadBootStrap();
		}
	}
?>