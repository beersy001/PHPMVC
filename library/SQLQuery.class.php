<?php

class SQLQuery {

	protected $_connection;
	protected $_result;

	// ----- Create database connection --------------------------------------------------------------------
	public function connect($address, $account, $pwd, $name) {
		$this->_connection = @mysql_connect($address, $account, $pwd);
		if ($this->_connection != 0) {
			if (mysql_select_db($name, $this->_connection)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	// ----- Disconnect from database ----------------------------------------------------------------------
	public function disconnect() {
		if (@mysql_close($this->_connection) != 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function selectAll() {
		$query = 'select * from `' . $this->_tableName . '`';
		return $this->queryMultiArray($query);
	}

	function select($id) {
		$query = 'select * from `' . $this->_tableName . '` where `id` = \'' . mysql_real_escape_string($id) . '\'';
		return $this->queryMultiArray($query, 1);
	}

	// ----- run a multi array select statement ------------------------------------------------------------
	private function _queryMultiArray($query, $singleResult = 0) {

		$this->_result = mysql_query($query, $this->_connection);

		if (preg_match("/select/i", $query)) {
			$result = array();
			$table = array();
			$field = array();
			$tempResults = array();

			$numOfFields = mysql_num_fields($this->_result);

			for ($i = 0; $i < $numOfFields; ++$i) {
				array_push($table, mysql_field_table($this->_result, $i));
				array_push($field, mysql_field_name($this->_result, $i));
			}

			while ($row = mysql_fetch_row($this->_result)) {
				for ($i = 0; $i < $numOfFields; ++$i) {
					$table[$i] = trim(ucfirst($table[$i]), "s");
					$tempResults[$table[$i]][$field[$i]] = $row[$i];
				}
				if ($singleResult == 1) {
					mysql_free_result($this->_result);
					return $tempResults;
				}
				array_push($result, $tempResults);
			}
			mysql_free_result($this->_result);
			return($result);
		}
	}

	// ----- New custom SQL Query --------------------------------------------------------------------------
	protected function _sqlQuery($queryString) {

		$results = array();
		$number = 0;

		if (preg_match("/select/i", $queryString)) {

			$this->_result = mysql_query($queryString, $this->_connection);

			$numOfFields = mysql_num_fields($this->_result);

			while ($db_field = mysql_fetch_assoc($this->_result)) {
				$number++;
				$singleResult = array();

				for ($i = 0; $i < $numOfFields; ++$i) {

					$_fieldName = mysql_field_name($this->_result, $i);

					$singleResult[$_fieldName] = $db_field[$_fieldName];
				}

				$results[$number] = $singleResult;
			}
		}
		return $results;
	}

	private function _sqlInsert($query) {

		mysql_query($query);

		return mysql_affected_rows();
	}

}

