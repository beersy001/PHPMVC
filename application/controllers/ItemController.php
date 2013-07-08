<?php

require LIBRARY . DS . 'Controller.class.php';

class ItemController extends Controller {

	function view($id = null, $name = null) {

		$this->setTemplateVars('title', 'Todo Item');
		$this->setTemplateVars('todo', $this->_model->select($id));
	}

	function viewall() {

		$this->setTemplateVars('title', 'All Todo Items');
		$this->setTemplateVars('todoList', $this->_model->selectAll());
	}

	function add() {

		$todo = $_POST['todo'];
		$this->setTemplateVars('title', 'New Item Added!');
		$this->setTemplateVars('todo', $this->_model->queryMultiArray('insert into items (item_name) values (\'' . mysql_real_escape_string($todo) . '\')'));
	}

	function delete($id = null) {

		$this->setTemplateVars('title', 'Item Deleted!');
		$this->setTemplateVars('todo', $this->_model->queryMultiArray('delete from items where id = \'' . mysql_real_escape_string($id) . '\''));
	}

}

?>