<?php
class App {
	public $argv;
	private $_cronjob_id;
	private $_Cronjob;
	private $_CronjobHistory;
	private $_last_cronjob_history_id;
	private $_cronjob_runable;


	public function __construct() {
		$this->_Cronjob 		= new Cronjob;
		$this->_CronjobHistory 	= new CronjobHistory;
		$this->_cronjob_runable = false;
	}

	public function process($argv) {
		$this->dieIfSizeLessThan2($argv);
		$this->argv = $argv;
		
		$script = getPath('cron') . DS . trim(trim($argv[1], '/')) . '.php';
		if ( ! file_exists($script) ) die('Script not found.');

		$this->run($script);

		die("\n\nCompleted!\n");
	}

	public function setCronjob($id) {
		$this->_cronjob_id = trim($id);

		if ( ! $this->_Cronjob->isActive($this->_cronjob_id) ) die("This cronjob is disabled\n");

		$this->_cronjob_runable = true;
		$this->_last_cronjob_history_id = $this->_CronjobHistory->save([
																			'cronjob_id' => $this->_cronjob_id,
																			'started_at' => $this->_CronjobHistory->now(),
																		]);
	}

	private function run($path) {
		require_once $path;

		if ( $this->_cronjob_runable ) {
			$this->_CronjobHistory->update(
											[
												'success' => '1',
												'ended_at' => $this->_CronjobHistory->now()
											],

											['id' => $this->_last_cronjob_history_id]
										);
		}
	}

	private function dieIfSizeLessThan2($argv) {
	    if ( count($argv) < 2 ) die("Invalid input!\n");
	}

}
?>