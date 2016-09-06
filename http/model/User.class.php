<?php

class User extends Model {
	protected $table = 'user';

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

	public function store($username, $password, $email) {
		$salt = generateUUID(rand(5, 10));
		$pepper = generateUUID(rand(5, 10));
		$password_hash = password_hash($salt.$password.$pepper, PASSWORD_BCRYPT, ['cost' => 12]);

		$input = [
		    'username' => $username,
		    'password_hash' => $password_hash,
		    'salt' => $salt,
		    'pepper' => $pepper,
		    'email' => $email,
		    'status' => 1
		];

		$this->db->insert($this->table, $input);
	}

}
?>