<?php
App::uses('AppController', 'Controller');
/**
 * Staffs Controller
 *
 * @property Staff $Staff
 */
class StaffsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Staff->recursive = 0;
		$this->set('staffs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$this->set('staff', $this->Staff->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Staff->create();
			if ($this->Staff->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved'),'default',array(),'good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'),'default',array(),'bad');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// Staff ID is equal to User ID
			$this->request->data['User']['id']=$this->request->data['Staff']['id'];
			if ($this->Staff->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved'),'default',array(),'good');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'),'default',array(),'bad');
			}
		} else {
			$this->request->data = $this->Staff->read(null, $id);
			// ensure no accidental password change
			$this->request->data['User']['password']='';
		}
	}

/**
 * delete method
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
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		// Access to Current Profile
		$staff = $this->Staff->read();
		$this->Staff->User->id = $staff['User']['id'];
		if ($this->Staff->delete() && $this->Staff->User->delete()) {
			$this->Session->setFlash(__('Staff deleted'),'default',array(),'good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Staff was not deleted'),'default',array(),'bad');
		$this->redirect(array('action' => 'index'));
	}


/**
 *send email method
 */
	public function sendEmail($id = null) {
		App::uses('CakeEmail', 'Network/Email');
		
		$this->Staff->id = $id;
			if (!$this->Staff->exists()) {
				throw new NotFoundException(__('Invalid staff'));
			}
		$aStaff = $this->Staff->find('first', array('conditions' => array('Staff.id' => $id)));
		
		$email = new CakeEmail('gmail');
		$email->viewVars(array('Staff' => $aStaff));
		$email->to('alvin282@hotmail.com');
		$email->from('aesub1@student.monash.edu');
		$email->subject('Test E-mail for Solve Staffs');
		$email->template('html_email');
		$email->emailFormat('html');
		$email->send();
	}
}		
