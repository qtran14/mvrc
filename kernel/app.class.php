<?php
class App {
	public function process($argv) {
		$this->dieIfSizeLessThan2($argv);

		for ( $i=1; $i<count($argv); $i++ ) {
		    $dir_name = trim(trim($argv[$i], '/'));
		    $path = getPath('kernel') . DS . $dir_name;

		    if ( $this->isPhpFile($dir_name) && file_exists($path) ) {
		    	echo "\nStart at: " . date('Y-m-d H:i:s') . "\n";
		    	echo "Processing > " . $path . "\n";
		        $this->run($path);
		        echo "End at: " . date('Y-m-d H:i:s') . "\n";

		        mkdirIfNotExist(getPath('storage') . DS . 'kernel' . DS . basename(dirname($path)));
		        rename($path, getPath('storage') . DS . 'kernel' . DS . $dir_name);
		        continue;
		    }

		    $this->dieIfNotValidDirectory($dir_name, $path);

		    foreach ( scandir($path) as $filename ) {
		        if ( $this->isPhpFile($filename) ) {
		        	echo "\nStart at: " . date('Y-m-d H:i:s') . "\n";
			    	echo "Processing > " . $path . DS . $filename . "\n";
		        	$this->run($path . DS . $filename);
		        	echo "End at: " . date('Y-m-d H:i:s') . "\n";

		        	mkdirIfNotExist(getPath('storage') . DS . 'kernel' . DS . $dir_name);
		        	rename($path . DS . $filename, getPath('storage') . DS . 'kernel' . DS . $dir_name . DS . $filename);
		        }
		    }
		}

		die("\n\nCompleted!\n");
	}

	private function run($path) {
		require_once $path;
	}

	private function dieIfNotValidDirectory($dir_name, $path) {
	    if ( empty($dir_name) ) die("Empty argument!\n");
	    if ( ! file_exists($path) || ! is_dir($path) ) die("Invalid argument!\n");
	}

	private function dieIfSizeLessThan2($argv) {
	    if ( count($argv) < 2 ) die("Missing argument!\n");
	}

	private function isPhpFile($filename) {
		if ( $filename != '.' && $filename != '..' && preg_match('/\.php$/', $filename) ) return true;

		return false;
	}
}
?>