<?php

class Expenses_Status {
	protected $table = 'expenses_status';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function getListForEdit() {
					$this->db->where('edit_flag', 1);
		$results = 	$this->db->get($this->table);
		$list = []; foreach ( $results as $row ) $list[$row['id']] = $row['name'];

		return $list;
	}

	public function getList() {
		$results = 	$this->db->get($this->table);
		$list = []; foreach ( $results as $row ) $list[$row['id']] = $row['name'];

		return $list;
	}

}
?>