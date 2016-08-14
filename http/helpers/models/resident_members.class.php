<?php

class ResidentMembers {
	protected $table = 'resident_members';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}

	public function all() {
		return $this->db->get($this->table);
	}	
}
?>
