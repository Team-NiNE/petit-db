<?php
namespace petitDb;
class admin {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}

	private function banUser() {
		return null;
	}
}