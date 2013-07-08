<?php

require_once 'SQLQuery.class.php';

class Mapper extends SQLQuery {

	protected $_mapperName;
	protected $_tableName;

	function __construct() {

		$this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$this->_mapperName = get_class($this); // just to get the name to create the table name
		$this->_tableName = strtolower($this->_mapperName) . "s";
	}

	function __destruct() {

	}

}

