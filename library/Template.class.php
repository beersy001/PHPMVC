<?php

class Template {

	protected $variables = array();
	protected $_view;
	protected $_action;

	function __construct($controller, $action) {
		$this->_view = $controller;
		$this->_action = $action;
	}

	/** Set Variables * */
	function set($name, $value) {
		$this->variables[$name] = $value;
	}

	/** Display Template * */
	function render() {
		extract($this->variables);



		if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . DS . 'header.php')) {
			include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . DS . 'header.php');
		} else {
			include (ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
		}

		include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . DS . $this->_action . '.php');

		if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . DS . 'footer.php')) {
			include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_view . DS . 'footer.php');
		} else {
			include (ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
		}
	}

}

