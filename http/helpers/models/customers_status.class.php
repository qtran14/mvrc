<?php

class Customers_Status {
	protected $table = 'customers_status';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function getList() {
		$results = 	$this->db->get($this->table);
		$list = []; foreach ( $results as $row ) $list[$row['id']] = $row['name'];

		return $list;
	}

}
?>