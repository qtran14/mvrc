<?php

class Expenses {
	protected $table = 'expenses';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($hash, $accountHash) {
		$this->db->where('hash', $hash);
		$this->db->where('account_hash', $accountHash);
		return $this->db->getOne($this->table);
	}

	public function exist($hash, $accountHash) {
		$userInfo = $this->info($hash, $accountHash);

		if ( count($userInfo) > 0 ) return true; 

		return false;
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}
}
?>