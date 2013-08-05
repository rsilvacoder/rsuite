<?php
App::uses('AppController', 'Controller');

/**
 * InfosCategories Controller
 *
 * @property InfosCategory $InfosCategory
 */
class InfosCategoriesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->InfosCategory->recursive = 0;
		$this->set('infosCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->InfosCategory->exists($id)) {
			throw new NotFoundException(__('Invalid infos category'));
		}
		$options = array('conditions' => array('InfosCategory.' . $this->InfosCategory->primaryKey => $id));
		$this->set('infosCategory', $this->InfosCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->InfosCategory->create();
			if ($this->InfosCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The infos category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The infos category could not be saved. Please, try again.'));
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
		if (!$this->InfosCategory->exists($id)) {
			throw new NotFoundException(__('Invalid infos category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InfosCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The infos category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The infos category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InfosCategory.' . $this->InfosCategory->primaryKey => $id));
			$this->request->data = $this->InfosCategory->find('first', $options);
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
		$this->InfosCategory->id = $id;
		if (!$this->InfosCategory->exists()) {
			throw new NotFoundException(__('Invalid infos category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InfosCategory->delete()) {
			$this->Session->setFlash(__('Infos category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Infos category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function _infos_categories_list() {

		$categories = $this->InfosCategory->find('all');
		return $categories;
	}
}
