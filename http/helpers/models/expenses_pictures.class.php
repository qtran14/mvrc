<?php

class Expenses_Pictures {
	protected $table = 'expenses_pictures';
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

	public function belongsTo($expenseHash) {
		$this->db->where('expense_hash', $expenseHash);
		return $this->db->get($this->table, null, ['expense_hash', 'name', 'uploaded_name']);
	}

}
?>
