<?php
class Model {
	protected $table;
	protected $db;

	public function __construct() {
		$this->init();
	}

	public function init() {
		$this->db = DbFactory::getInstance();
	}

	public function query($sql) {
		return $this->db->rawQuery($sql);
	}

	public function info($id) {
		$this->db->where('id', $id);
		return $this->db->getOne($this->table);
	}

	public function save($input) {
		return $this->db->insert($this->table, $input);
	}

	public function update($input, $where) {
		if ( is_array($where) && ! empty($where) ) {
			foreach ( $where as $db_field => $value ) $this->db->where($db_field, $value);
		}

		$this->db->update($this->table, $input);
	}

	public function now() {
		return $this->db->now();
	}

	public function getTable() {
		return $this->table;
	}

	public function setTable($table) {
		$this->table = $table;
		return $this;
	}

	public function getList($key_field, $value_field, $where=[]) {
		$list = [];
		
		if ( $this->valid($where) ) {
			foreach ( $where as $db_field => $value ) $this->db->where($db_field, $value);
		}
		foreach ( $this->db->get($this->table) as $row ) $list[$row[$key_field]] = $row[$value_field];

		return $list;
	}

	private function valid($where) {
		if ( ! empty($where) && is_array($where) ) return true;
		return false;
	}

}
