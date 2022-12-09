<?php
	class BootStrap {
		function loadFileGeter($param, $direct) {
			switch ($param) {
				case "CSS":
					$this->loadFiles($direct."/".strtolower($param), $param);
				break;
				case "JS":
					$this->loadFiles($direct."/".strtolower($param), $param);
				break;
			}
		}
		function loadFiles($dir, $param) {
			$files = $this->getFileList($dir, $param);
			print_r($files);
		}
		function getFileList($dir, $param) {
			$dir = $dir;
			$files	= scandir($dir, 1);
			sort($files);
			foreach ($files as &$value) {
				if (str_ends_with($value,".".strtolower($param))) {
					switch ($param) {
						case "CSS":
							$string = '<link rel="stylesheet" type="text/css" href="'.$dir.'/'.$value.'" />'."\n";
							ECHO($string);
						break;
						case "JS":
							$string = '<script async="" src="'.$dir.'/'.$value.'"></script>'."\n";
							ECHO($string);
						break;
					}
				}
			}
		}
	}
?>
