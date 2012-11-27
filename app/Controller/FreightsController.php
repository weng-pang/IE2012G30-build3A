<?php
App::uses('AppController', 'Controller');
/**
 * Freights Controller
 *
 * @property Freight $Freight
 */
class FreightsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Freight->recursive = 0;
		$this->set('freights', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Freight->id = $id;
		if (!$this->Freight->exists()) {
			throw new NotFoundException(__('Invalid freight'));
		}
		$this->set('freight', $this->Freight->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Freight->create();
			if ($this->Freight->save($this->request->data)) {
				$this->Session->setFlash(__('The freight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freight could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Freight->id = $id;
		if (!$this->Freight->exists()) {
			throw new NotFoundException(__('Invalid freight'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Freight->save($this->request->data)) {
				$this->Session->setFlash(__('The freight has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The freight could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Freight->read(null, $id);
		}
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
		$this->Freight->id = $id;
		if (!$this->Freight->exists()) {
			throw new NotFoundException(__('Invalid freight'));
		}
		if ($this->Freight->delete()) {
			$this->Session->setFlash(__('Freight deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Freight was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
