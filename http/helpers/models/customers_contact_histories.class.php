<?php

class Customers_Contact_Histories {
	protected $table = 'customers_contact_histories';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($id, $customer_id) {
		$this->db->where('id', $id);
		$this->db->where('customer_id', $customer_id);
		return $this->db->getOne($this->table);
	}

	public function exist($id, $customer_id) {
		$info = $this->info($id, $customer_id);

		if ( count($info) > 0 ) return true; 

		return false;
	}

	public function save($input_data) {
		return $this->db->insert($this->table, $input_data);
	}

	public function all($customer_id) {
		$sql = "SELECT 
						customers_contact_histories.contact_date,
						customers_contact_histories.notes,
						customers.first_name,
						customers.last_name,
						users.username

				FROM customers_contact_histories

					LEFT JOIN customers ON 1=1
										AND customers.id=customers_contact_histories.customer_id
					LEFT JOIN users ON 1=1
									AND users.id=customers_contact_histories.created_by

				WHERE 1=1
					AND customers_contact_histories.customer_id='{$customer_id}'
				";
		return $this->db->rawQuery($sql);
	}
}
?>
