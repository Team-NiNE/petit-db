<?php

namespace petitDb;
class open {
	public function __construct($host, $user, $pass, $name) {
		$this->db = new mysqli($host, $user, $pass, $name);
	}

	private function _arrCol($string) {
		return implode(", ", array_keys($string));
	}
	private function _arrVal($string) {
		return implode(", ", $string);
	}
	private function _escape($string) {
		return $this->db->real_escape_string($string);
	}

	private function newTournamentData($admin, $isOpen) {
		$dbCol = 'number, date, modefiedBy, isOpen';
		$dbVal = "NULL, NULL, ($admin), ($isOpen)";
		$sql = "INSERT INTO `tnmt_data` ($dbCol) VALUES ($dbVal)";
		if($this->db->query($sql) === TRUE) {
			return true;
		} else {
			die('function newTournamentData, DB Errored. '.$this->db->error);
		}
	}
	private function newTournamentOpen($admin, $dataNum, $std, $taiko, $ctb, $mania) {
		if(!is_array($std) || !is_array($taiko) || !is_array($ctb) || !is_array($mania)) {
			die('function newTournamentOpen, Mode Data Must be Array.');
		}

		$stdCol = $this->_arrCol($std);
		$taikoCol = $this->_arrCol($taiko);
		$ctbCol = $this->_arrCol($ctb);
		$maniaCol = $this->_arrCol($mania);

		$stdVal = $this->_arrVal($this->_escape($std));
		$taikoVal = $this->_arrVal($this->_escape($taiko));
		$ctbVal = $this->_arrVal($this->_escape($ctb));
		$maniaVal = $this->_arrVal($this->_escape($mania));

		$defCol = 'number, date, modefiedBy, dataNumber';
		$defVal = "NULL, NULL, ($admin)";

		$insCol = "($defCol), ($stdCol), ($taikoCol), ($ctbCol), ($maniaCol)";
		$insVal = "($defVal), ($stdVal), ($taikoVal), ($ctbVal), ($maniaVal)";

		$sql = "INSERT INTO `tnmt_open` ($insCol) VALUES ($insVal)";
		if($this->db->query($sql) === TRUE) {
			return true;
		} else {
			die('function newTournamentOpen, DB Errored. '.$this->db->error);
		}
	}

	public function openNewTournament($admin, $isOpen, $std, $taiko, $ctb, $mania) {
		newTournamentData($admin, $isOpen);
		$sql = "SELECT `number` FROM `tnmt_data` ORDER BY `number` DESC LIMIT 1";
		$result = $this->db->query($sql);
		$sqlarray = $result->fetch_array(MYSQLI_ASSOC);
		if(is_null($sqlarray)) {
			die('function openNewTournament, DB Query Errored.');
		}
		newTournamentOpen($admin, $sqlarray['number'], $std, $taiko, $ctb, $mania);

		return true;
	}
}