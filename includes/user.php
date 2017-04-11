<?php
namespace petitDb;
class user {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}

	private function newUser() {
		return null;
	}

	private function editUser() {
		return null;
	}
}