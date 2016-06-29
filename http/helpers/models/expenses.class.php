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
		$info = $this->info($hash, $accountHash);

		if ( count($info) > 0 ) return true; 

		return false;
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}

	public function update($inputData, $expenseHash, $accountHash) {
		$this->db->where('hash', $expenseHash);
		$this->db->where('account_hash', $accountHash);
		return $this->db->update($this->table, $inputData);
	}
}
?>