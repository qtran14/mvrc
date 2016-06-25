<?php

class Accounts {
	protected $table = 'accounts';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($hash) {
		$this->db->where('hash', $hash);
		return $this->db->getOne($this->table);
	}

	public function exist($hash) {
		$accountInfo = $this->info($hash);

		if ( count($accountInfo) > 0 ) return true; 

		return false;
	}

	public function save($hash, $name, $description, $createdBy) {
		$inputData = [
		    'hash' => $hash,
		    'name' => $name,
		    'status' => 1,
		    'description' => $description,
		    'created_by' => $createdBy,
		];

		$this->db->insert($this->table, $inputData);
	}
}
?>