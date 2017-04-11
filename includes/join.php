<?php
namespace petitDb;
class join {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}
}