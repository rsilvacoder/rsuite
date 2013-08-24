<?php
App::uses('AppController', 'Controller');
/**
 * Infos Controller
 *
 * @property Info $Info
 */
class InfosController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($infos_category_id = null) {
		
		$this->Info->recursive = 0;

		if (!empty($infos_category_id)) {

			$this->paginate = array(
				'conditions' => array(
					'AND' => array(
						array(
							'Info.infos_category_id' => $infos_category_id
						)
					)
				)
			);

			$infos_category = $this->Info->InfosCategory->read(null, $infos_category_id);
			$this->set('infos_category', $infos_category);
		}

		$this->set('infos', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid info'));
		}
		$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
		$this->set('info', $this->Info->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {

		var_dump($this->request->data);

		if ($this->request->is('post')) {
			$this->Info->create();
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info could not be saved. Please, try again.'));
			}
		}
		$infosCategories = $this->Info->InfosCategory->find('list');
		$this->set(compact('infosCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		$this->request->data['Info']['chave'] = md5($this->request->data['Info']['name']);

		if (!$this->Info->exists($id)) {
			throw new NotFoundException(__('Invalid info'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Info->save($this->request->data)) {
				$this->Session->setFlash(__('The info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Info.' . $this->Info->primaryKey => $id));
			$this->request->data = $this->Info->find('first', $options);
		}
		$infosCategories = $this->Info->InfosCategory->find('list');
		$this->set(compact('infosCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Info->id = $id;
		if (!$this->Info->exists()) {
			throw new NotFoundException(__('Invalid info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Info->delete()) {
			$this->Session->setFlash(__('Info deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Info was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function admin_addinfo() {

	}
}
