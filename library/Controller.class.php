<?php

require LIBRARY . DS . 'Template.class.php';

class Controller {

	protected $_template;
	protected $_controller;
	protected $_action;
	protected $_service;

	function __construct($service, $controller, $action) {

		$this->_controller = $controller;
		$this->_action = $action;

		$this->_service = new $service;
		$this->_template = new Template($controller, $action);
	}

	function setTemplateVars($name, $value) {
		$this->_template->set($name, $value);
	}

	function __destruct() {
		//$this->_template = new Template($this->_controller, $this->_action);
		$this->_template->render();
	}

}

?>
