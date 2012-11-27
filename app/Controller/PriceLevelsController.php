<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class PriceLevelsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PriceLevel->recursive = 0;
		$this->set('PriceLevels', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->set('customer', $this->Customer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		}
		$organisations = $this->Customer->Organisation->find('list');
		$this->set(compact('organisations'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Customer->read(null, $id);
		}
		$organisations = $this->Customer->Organisation->find('list');
		$this->set(compact('organisations'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('Customer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Customer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
