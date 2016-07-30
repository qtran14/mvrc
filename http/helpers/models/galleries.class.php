<?php

class Galleries {
	protected $table = 'galleries';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function totalRows() {
		return $this->db->getValue($this->table, "COUNT(*)");
	}

	public function save($inputData) {
		return $this->db->insert($this->table, $inputData);
	}

	public function photo($page = 1, $limit = 20) {
		return $this->db->get($this->table);
	}
}
?>
