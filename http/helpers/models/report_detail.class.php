<?php

class ReportDetail {
	protected $table = 'report_detail';
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

	public function update($inputData, $expense_id) {
		$this->db->where('expense_id', $expense_id);
		return $this->db->update($this->table, $inputData);
	}

	public function save($report_id, $category_id, $expense_id, $created_by) {
		$inputData = [
		    'report_id' => $report_id,
		    'category_id' => $category_id,
		    'expense_id' => $expense_id,
		    'created_by' => $created_by,
		];

		$this->db->insert($this->table, $inputData);
	}

	public function summary($report_id, $categories) {
		$category_count = [];

		foreach ( $categories as $category ) {
			$category_id = $category['id'];

			$result = $this->db->rawQueryOne("
							SELECT COUNT(*) AS total
							FROM report_detail
							WHERE 1=1
								AND report_detail.report_id='{$report_id}'
								AND report_detail.category_id='{$category_id}'
						");
			$result2 = $this->db->rawQueryOne("
							SELECT SUM(expenses.amount) AS amount
							FROM report_detail
								INNER JOIN expenses ON 1=1
												AND expenses.id=report_detail.expense_id
							WHERE 1=1
								AND report_detail.report_id='{$report_id}'
								AND report_detail.category_id='{$category_id}'
						");

			$category_count[$category_id] = [
				'name' => $category['name'],
				'count' => $result['total'],
				'amount' => $result2['amount'],
			];
		}

		return $category_count;
	}
}
?>