<?php
App::uses('AppController', 'Controller');
/**
 * InfosKeys Controller
 *
 * @property InfosKey $InfosKey
 */
class InfosKeysController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->InfosKey->recursive = 0;
		$this->set('infosKeys', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->InfosKey->exists($id)) {
			throw new NotFoundException(__('Invalid infos key'));
		}
		$options = array('conditions' => array('InfosKey.' . $this->InfosKey->primaryKey => $id));
		$this->set('infosKey', $this->InfosKey->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->InfosKey->create();
			if ($this->InfosKey->save($this->request->data)) {
				$this->Session->setFlash(__('The infos key has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The infos key could not be saved. Please, try again.'));
			}
		}
		$infos = $this->InfosKey->Info->find('list');
		$this->set(compact('infos'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->InfosKey->exists($id)) {
			throw new NotFoundException(__('Invalid infos key'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InfosKey->save($this->request->data)) {
				$this->Session->setFlash(__('The infos key has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The infos key could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InfosKey.' . $this->InfosKey->primaryKey => $id));
			$this->request->data = $this->InfosKey->find('first', $options);
		}
		$infos = $this->InfosKey->Info->find('list');
		$this->set(compact('infos'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->InfosKey->id = $id;
		if (!$this->InfosKey->exists()) {
			throw new NotFoundException(__('Invalid infos key'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InfosKey->delete()) {
			$this->Session->setFlash(__('Infos key deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Infos key was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
