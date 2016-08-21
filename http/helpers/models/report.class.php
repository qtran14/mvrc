<?php

class Report {
	protected $table = 'report';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($id) {
		$this->db->where('id', $id);
		return $this->db->getOne($this->table);
	}

	public function exist($id) {
		$info = $this->info($id);
		if ( count($info) > 0 ) return true; 
		return false;
	}

	public function save($account_id, $name, $type, $generated_by, $start_period, $end_period) {
		$inputData = [
		    'account_id' => $account_id,
		    'name' => $name,
		    'type' => $type,
		    'generated_by' => $generated_by,
		    'start_period' => $start_period,
		    'end_period' => $end_period,
		];

		$this->db->insert($this->table, $inputData);
	}

	public function belongsTo($account_id, $type, $limit=0) {
		$this->db->where('account_id', $account_id);
		$this->db->where('type', $type);
		$this->db->orderBy('id', 'desc');
		return $this->db->get($this->table, ($limit == 0 ? null : $limit));
	}
}
?>