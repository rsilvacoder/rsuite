<?php
App::uses('AppController', 'Controller');

class ScanController extends AppController {
	public $name = 'Scan';
	public $uses = array();

	public function admin_end() {

		App::import('Controller', 'Url');
		
		$Url = new UrlController;
		$Url = $Url->_add();

		die();
	}

	public function admin_index() {

		App::import('Controller', 'Infos');
		
		$Infos = new InfosController;
		$Infos = $Infos->_list();

		$this->set('vulls',$Infos);

		//$this->_scan_bing();

		$this->set('js',array('modules/scan/index.js'));		
	}
}
