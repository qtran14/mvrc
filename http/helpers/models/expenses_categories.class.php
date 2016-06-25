<?php

class Expenses_Categories {
	protected $table = 'expenses_categories';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($id) {
		$this->db->where('id', $id);
		return $this->db->getOne($this->table);
	}

	public function exist($id) {
		$userInfo = $this->info($id);

		if ( count($userInfo) > 0 ) return true; 

		return false;
	}

	public function all() {
		return $this->db->get($this->table);
	}

	public function getList() {
		$list = [];
		foreach ( $this->all() as $row ) $list[$row['id']] = $row['name'];

		return $list;
	}
}
?>