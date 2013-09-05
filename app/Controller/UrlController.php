<?php
App::uses('AppController', 'Controller');

class UrlController extends AppController {
	public $name = 'Url';
	public $uses = array();

	public function _add() {

		$urls = explode("\n", $_POST['urls']);
		foreach ($urls as $_url) {

			if(!empty($_url)) {

				echo $_url."<br>";
				$save['Url']['url'] = trim($_url);
				$this->Url->create();
				$this->Url->save($save);
			}	
		}


		die();
	}

	public function admin_end() {
	}

	public function admin_index() {

		die('fim');
	}
}
