<?php

class Customers {
	protected $table = 'customers';
	protected $hasMany = 'customers_contact_histories';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($id, $account_hash) {
		$this->db->where('id', $id);
		$this->db->where('account_hash', $account_hash);
		return $this->db->getOne($this->table);
	}

	public function exist($id, $account_hash) {
		$info = $this->info($id, $account_hash);

		if ( count($info) > 0 ) return true; 

		return false;
	}

	public function existBy($first_name, $last_name, $account_hash) {
		$this->db->where('first_name', $first_name);
		$this->db->where('last_name', $last_name);
		$this->db->where('account_hash', $account_hash);
		$this->db->getOne($this->table);

		if ( $this->db->count > 0 ) return true; 

		return false;
	}

	public function udpate($input_data, $id, $account_hash) {
		$this->db->where('id', $id);
		$this->db->where('account_hash', $account_hash);
		$this->db->update($this->table, $input_data);
	}

	public function save($input_data) {
		return $this->db->insert($this->table, $input_data);
	}

	public function hasNote($id) {
		$this->db->where('customer_id', $id);
		$this->db->getOne($this->hasMany);
		if ( $this->db->count > 0 ) return true;

		return false;
	}

	public function belongsto($customer_id, $account_hash) {
		$this->db->where('id', $customer_id);
		$this->db->where('account_hash', $account_hash);
		$this->db->getOne($this->table);
		if ( $this->db->count > 0 ) return true;

		return false;
	}
}
?>