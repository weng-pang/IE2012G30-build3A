<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$this->set('customers', $this->paginate());
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
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->saveall($this->request->data)) {
				$this->returnOrganisation();
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'),'default',array(),'bad');
			}
		}
		// provide organisation id
		$this->request->data['Customer']['organisation_id'] = $id;
		$organisations = $this->Customer->Organisation->find('list');
		$this->set(compact('organisations'));
		// provide address information
		$this->defineAddress($id);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null,$organisation_id) {
		$this->Customer->id = $id;
		
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// Customer ID is equal to User ID
			$this->request->data['User']['id']=$this->request->data['Customer']['id'];
			//$this->Customer->User->Behaviors->attach('Tools.Passwordable', array('allowEmpty' => true));
			if ($this->Customer->saveall($this->request->data)) {
				$this->returnOrganisation();
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Customer->read(null, $id);
			// ensure no accidental password change
			$this->request->data['User']['password']='';
		}
		$organisations = $this->Customer->Organisation->find('list');
		$this->set(compact('organisations'));
		$this->defineAddress($organisation_id);
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
		// Obtain Customer and Login information
		$customer = $this->Customer->read();
		$this->Customer->User->id = $customer['Customer']['id'];
		//var_dump($customer);
		if ($this->Customer->delete() && $this->Customer->User->delete()) {
			$this->Session->setFlash(__('Customer deleted'),'default',array(),'good');
			
		} else {
			$this->Session->setFlash(__('Customer was not deleted'),'default',array(),'bad');
		}
		$this->redirect(array('controller'=>'organisations','action' => 'view',$customer['Customer']['organisation_id']));
		//$this->redirect(array('action' => 'index'));
	}
	/**
	 * returnOrganisation method
	 * This method redirects user back to organisation view page
	 * @param void
	 * @return void
	 */	
	public function returnOrganisation(){
		$this->Session->setFlash(__('The customer ('.$this->request->data['User']['username'].') has been saved'), 'default', array(), 'good');
		// redirect back to the organisation page
		$this->redirect(array('controller'=>'Organisations','action' => 'view',$this->request->data['Customer']['organisation_id']));
	}
	
	/**
	 * defineAddress method
	 * Addresses are provided under the organisation given 
	 *
	 * @param string $id
	 * @return void
	 */
	public function defineAddress($id = null){
		$rawAddresses = $this->Customer->Organisation->Address->find('all',array('conditions'=>array('organisation_id' => $id)));
		foreach ($rawAddresses as $address){
			$addresses[$address['Address']['id']] = $address['Address']['address'].','.$address['Address']['suburb'].','.$address['Address']['state'].' '.$address['Address']['postcode'];
		}
		if (!isset($addresses)){
			
			$addresses[0]="NO ADDRESS";
		}
		$this->set('addresses',$addresses);
	}
}
