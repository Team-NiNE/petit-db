<?php
namespace petitDb;
class edit {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}
}