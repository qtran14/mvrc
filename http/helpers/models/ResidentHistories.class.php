<?php

class ResidentHistories {
	protected $table = 'resident_histories';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}

	public function ofMember($id, $desc_start_date=true) {
		$this->db->where('resident_member_id', $id);
		if ( $desc_start_date ) $this->db->orderBy('start_date', 'desc');

		return $this->db->get($this->table);
	}	
}
?>
