<?php

class Customers {
	protected $table = 'customers';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($id, $accountHash) {
		$this->db->where('id', $id);
		$this->db->where('account_hash', $accountHash);
		return $this->db->getOne($this->table);
	}

	public function exist($id, $accountHash) {
		$info = $this->info($id, $accountHash);

		if ( count($info) > 0 ) return true; 

		return false;
	}

	public function udpate($inputData, $id, $accountHash) {
		$this->db->where('id', $id);
		$this->db->where('account_hash', $accountHash);
		$this->db->update($this->table, $inputData);
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}
}
?>