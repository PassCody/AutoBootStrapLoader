<?php
	class BootStrap_Loader_JS {
	
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
				$dir = "./Libarys/bootstrap/js";
			}
			else {
				for ($i = 0; $i < $countetSlashes; $i++) {
					$dir = $dir."../";
				}
				$dir = $dir."./Libarys/bootstrap/js";
			}
			return $dir;
		}

		function getFiles() {
			$files = scandir($this->getDirectory(), 1);
			sort($files);
			return $files;
		}

		function getSingleFiles($files){
			$fileArray;
			for ($i = 0; $i < sizeof($files); $i++) {
				if (str_ends_with($files[$i], ".js")) {
					$fileArray[$i] = $this->getDirectory()."/".$files[$i];
				}
			}
			return $fileArray;
		}
	}
	
	class BootStrap_Loader_CSS {
	
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
				$dir = "./Libarys/bootstrap/css";
			}
			else {
				for ($i = 0; $i < $countetSlashes; $i++) {
					$dir = $dir."../";
				}
				$dir = $dir."./Libarys/bootstrap/css";
			}
			return $dir;
		}

		function getFiles() {
			$files = scandir($this->getDirectory(), 1);
			sort($files);
			return $files;
		}

		function getSingleFiles($files){
			$fileArray;
			for ($i = 0; $i < sizeof($files); $i++) {
				if (str_ends_with($files[$i], ".css")) {
					$fileArray[$i] = $this->getDirectory()."/".$files[$i];
				}
			}
			return $fileArray;
		}
	}
	
	class BootStrap {
	
		function loadCSSFiles() {
			$bootstrap_css = new BootStrap_Loader_CSS();
			$files = $bootstrap_css->getSingleFiles($bootstrap_css->getFiles());
			foreach ($files as &$value) {
				$string = '<link rel="stylesheet" type="text/css" href="'.$value.'" />'."\n";
				echo($string);
			}
		}

		function loadJSFiles() {
			$bootstrap_js = new BootStrap_Loader_JS();
			$files = $bootstrap_js->getSingleFiles($bootstrap_js->getFiles());
			foreach ($files as &$value) {
				$string = '<script async="" src="'.$value.'"></script>'."\n";
				echo($string);
			}
		}
	}
?>