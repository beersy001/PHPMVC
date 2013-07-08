<?php

require LIBRARY . DS . 'Controller.class.php';

class WelcomeController extends Controller {

	function view() {
		$this->setTemplateVars('title', 'Welcome!!!');
	}

}

?>