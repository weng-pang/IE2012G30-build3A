<?php

// - DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
App::uses('AppController', 'Controller');
/**
 * JobAllocations Controller
 *
 * @property JobAllocation $JobAllocation
 */
class JobAllocationsController extends AppController {

/**
 * index method- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @return void
 */
	public function joballocateindex() {
		$this->JobAllocation->recursive = 0;
		$this->set('jobAllocations', $this->paginate());
	}

/**
 * view method- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function joballocateview($id = null) {
		$this->JobAllocation->id = $id;
		if (!$this->JobAllocation->exists()) {
			throw new NotFoundException(__('Invalid job allocation'));
		}
		$this->set('jobAllocation', $this->JobAllocation->read(null, $id));
	}

/**
 * add method- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @return void
 */
	public function joballocateadd() {
		if ($this->request->is('post')) {
			$this->JobAllocation->create();
			if ($this->JobAllocation->save($this->request->data)) {
				$this->Session->setFlash(__('The job allocation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job allocation could not be saved. Please, try again.'));
			}
		}
		$jobs = $this->JobAllocation->Job->find('list');
		$staffs = $this->JobAllocation->Staff->find('list');
		$this->set(compact('jobs', 'staffs'));
	}

/**
 * edit method- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function joballocateedit($id = null) {
		$this->JobAllocation->id = $id;
		if (!$this->JobAllocation->exists()) {
			throw new NotFoundException(__('Invalid job allocation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->JobAllocation->save($this->request->data)) {
				$this->Session->setFlash(__('The job allocation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job allocation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->JobAllocation->read(null, $id);
		}
		$jobs = $this->JobAllocation->Job->find('list');
		$staffs = $this->JobAllocation->Staff->find('list');
		$this->set(compact('jobs', 'staffs'));
	}

/**
 * delete method- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->JobAllocation->id = $id;
		if (!$this->JobAllocation->exists()) {
			throw new NotFoundException(__('Invalid job allocation'));
		}
		if ($this->JobAllocation->delete()) {
			$this->Session->setFlash(__('Job allocation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Job allocation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
