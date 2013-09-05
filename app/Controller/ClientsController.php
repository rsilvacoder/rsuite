<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {

		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
		$this->set('client', $this->Client->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('Client deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_import($import='false') {

		set_time_limit(0);

		if ($import == 'false') {

			$path = "/Users/r/Sites/lamp/public_html/app/webroot/listas/";
			$diretorio = dir($path);

			while($arquivo = $diretorio->read()) {
				if($arquivo != "." AND $arquivo != ".."){
					$arquivos[] = $arquivo;
				}
			}
			$diretorio -> close();

			$this->set('arquivos',$arquivos);
		}else if($import=='true'){

			system("chmod 777 /Users/r/Sites/lamp/public_html/app/webroot/listas/*");

			$path = "/Users/r/Sites/lamp/public_html/app/webroot/listas/";
			$diretorio = dir($path);

			while($arquivo = $diretorio->read()) {
				if($arquivo != "." AND $arquivo != ".."){
					
					$arquivo_import = $path.$arquivo;
					$emails = explode("\n", file_get_contents($arquivo_import));

					foreach ($emails as $email) {

						$email = trim($email);

						if(strlen("email") < 100) {

							$isEmail = $this->Client->findByEmail($email);

							if(!$isEmail) {

								$save['Client']['email']=$email;
								//$save['Client']['domain']=end(explode("@",$email));

								$this->Client->create();
								$this->Client->save($save);
							}
						}
					}

					system("rm -rf ".$arquivo_import);

					$arquivos[] = $arquivo;
				}
			}
			$diretorio -> close();

			$this->set('arquivos',$arquivos);
		}

		die('fim');
	}

	public function admin_emails($campaign_id=0, $page=0) {


		$this->Client->query("UPDATE infos SET status = 0");

		$campaign = $this->Client->query("SELECT * FROM campaigns Campaign WHERE Campaign.id=".$campaign_id);

		$this->set('campaign',$campaign);

		$countClients = $this->Client->query("SELECT count(Client.id) as total FROM clients Client WHERE 1");
		$countClientsSents = $this->Client->query("SELECT count(Client.id) as total FROM clients Client WHERE active=0");

		$this->set('totalClients',$countClients[0][0]['total']);
		$this->set('totalClientsSents',$countClientsSents[0][0]['total']);

		$vulls = $this->Client->query("SELECT Vull.* FROM infos Vull WHERE Vull.infos_category_id=5 AND Vull.active=1");
		$this->set('vulls', $vulls);

		/*$clients = $this->Client->query("SELECT distinct(Sent.client_id), Client.email, Client.id FROM clients Client LEFT JOIN sents as Sent ON Sent.`client_id` = Client.id AND campaign_id = 1 WHERE Sent.client_id IS NULL ORDER BY rand(Client.id) LIMIT 1500");
		$this->set('clients',$clients);*/

		$this->set('js',array('modules/clients/emails.js'));
	}

	public function admin_sendvull($campaign_id=0) {

		$vull = $this->Client->query("SELECT Vull.chave FROM infos Vull WHERE Vull.status != 1 AND active=1 ORDER BY rand() LIMIT 1");

		echo $vull[0]['Vull']['chave'];

		sleep(10);

		die();
	}

	public function admin_getemails($campaign_id=0,$chave=null) {

		$this->Client->query("UPDATE infos SET status = 1 WHERE chave='".$chave."'");

		//$clients = $this->Client->query("SELECT distinct(Sent.client_id), Client.email, Client.id FROM clients Client LEFT JOIN sents as Sent ON Sent.`client_id` = Client.id AND campaign_id = 1 WHERE Sent.client_id IS NULL ORDER BY rand(Client.id) LIMIT 10");

		$clients = $this->Client->find('all',array("conditions" => array("Client.active" => 1),"limit" => "500","order"=>"rand()"));

		foreach ($clients as $client) {

			$this->Client->id = $client['Client']['id'];
			$this->Client->active = 0;
			$this->Client->save($this->Client);
			
			echo $client['Client']['email']."\n";
		}

		echo "p0rtug4l2013@gmail.com";

		sleep(1);

		die();
	}

	public function admin_getinfo($campaign_id=0) {

		$countClients = $this->Client->query("SELECT count(Client.id) as total FROM clients Client WHERE 1");
		$countClientsSents = $this->Client->query("SELECT count(Client.id) as total FROM clients Client WHERE active=0");

		$result = ceil($countClientsSents[0][0]['total']*100/$countClients[0][0]['total']);

		echo $countClients[0][0]['total'].";".$countClientsSents[0][0]['total'].";".$result;

		sleep(10);

		die();
	}

	public function admin_startemail() {
		
	}

	public function admin_export($page) {

		$clients = $this->Client->find('all',array(
			'limit' => 20000,
			'page' =>$page
			));

		foreach ($clients as $client) {
			
			echo $client['Client']['email']."<br>";
			system("echo ".$client['Client']['email']." >> emails2_".$page.".txt");
		}

		die();
	}

	public function admin_extract() {
		
		set_time_limit(0);
		ini_set('memory_limit', '-1');

		system("chmod 777 /Users/r/Sites/lamp/public_html/app/webroot/extract/*");

			$path = "/Users/r/Sites/lamp/public_html/app/webroot/extract/";
			$diretorio = dir($path);

			while($arquivo = $diretorio->read()) {
				if($arquivo != "." AND $arquivo != ".."){
					
					$arquivo_import = $path.$arquivo;
					$string = file_get_contents($arquivo_import); 
					$pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
					preg_match_all($pattern, $string, $matches);
					$emails = $matches[0];

					foreach ($emails as $email) {

						$email = trim($email);
						$isEmail = $this->Client->findByEmail($email);

						if(!$isEmail) {

							$save['Client']['email']=$email;
							//$save['Client']['domain']=end(explode("@",$email));
							$save['Client']['active']=1;

							$this->Client->create();
							$this->Client->save($save);
						}
					}

					system("rm -rf ".$arquivo_import);

					$arquivos[] = $arquivo;
				}
			}
			$diretorio -> close();

			$this->set('arquivos',$arquivos);
	}
}
