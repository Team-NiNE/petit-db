<?php
namespace petitDb;
class data {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}

	private function newLog() {
		return true;
	}

	private function getLog() {
		return true;
	}

	private function newResult() {
		return true;
	}

	private function editResult() {
		return true;
	}

	private function getResult() {
		return true;
	}

	public function log($type) {
		switch($type) {
			case 'new':
				$return = null;
			break;
			case 'get':
				$return = null;
			break;
			default:
				die('Incorrect Log Type.');
			break;
		}
		if(!$return) { die('function log, Return Value Errored.'); }
		else return $return;
	}

	public function result($type) {
		switch($type) {
			case 'new':
				$return = null;
			break;
			case 'edit':
				$return = null;
			break;
			case 'get':
				$return = null;
			break;
			default:
				die('Incorrect Result Type.');
			break;
		}
		if(!$return) { die('function result, Return Value Errored.'); }
		else return $return;
	}
}