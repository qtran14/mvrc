<?php

class Users {
	protected $table = 'users';
	protected $db;

	public function __construct() {
		$this->db = getDB();
	}

	public function info($username) {
		$this->db->where('username', $username);
		return $this->db->getOne($this->table);
	}

	public function exist($username) {
		$userInfo = $this->info($username);

		if ( count($userInfo) > 0 ) return true; 

		return false;
	}

	public function emailExist($email) {
		$this->db->where('email', $email);
		$result = $this->db->getOne($this->table);

		if ( count($result) ) return true;

		return false;
	}

	public function save($username, $password, $email, $createdBy, $role=2, $type=2, $accountHash=null) {
		$salt = generateUUID(rand(5, 10));
		$pepper = generateUUID(rand(5, 10));
		$longPass = $salt.$password.$pepper;

		$options = [
		    'cost' => 12,
		];
		$pwHash = password_hash($longPass, PASSWORD_BCRYPT, $options);

		$inputData = [
		    'username' => $username,
		    'pw_hash' => $pwHash,
		    'salt' => $salt,
		    'pepper' => $pepper,
		    'email' => $email,
		    'type' => $type,
		    'role' => $role,
		    'status' => 1,
		    'created_by' => $createdBy
		];

		if ( ! empty($accountHash) ) $inputData['account_hash'] = $accountHash;

		$this->db->insert($this->table, $inputData);
	}
}
?>