<?php
App::uses('AppController', 'Controller');
/**
 * Organisations Controller
 *
 * @property Organisation $Organisation
 */
class OrganisationsController extends AppController {
	public $paginate = array('limit'=>1000);
	// Authorisation component
	/**
	 * Authority method
	 * 
	 * Only senior Staff members have full access to this area, junior staff members can view this page only
	 * 
	* @return boolean
	*/
	public function isAuthorized($user){
		
		if ($this->access_level == 'User'){
			return false;
		}
		if ($user['access_level'] == 'Staff' && in_array($this->action,array('add','edit','delete'))){
			return false;
		}
		return true;
	}
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Organisation->recursive = -1;
		$this->set('organisations', $this->paginate());
		// store priority list
		$this->set('jobPriorities',$this->Organisation->JobPriority->find('list',array('fields' => array('job_priority'))));
		// store price level list
		$this->set('priceLevel',$this->Organisation->PriceLevel->find('list',array('fields'=>array('price_level'))));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Organisation->recursive = 2;
		$this->Organisation->id = $id;
		if (!$this->Organisation->exists()) {
			throw new NotFoundException(__('Invalid organisation'));
		}
		$this->set('organisation', $this->Organisation->read(null, $id));
		// selection list
		$this->obtainList();
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Organisation->create();
			if ($this->Organisation->save($this->request->data)) {
				$this->Session->setFlash(__('The organisation has been saved'), 'default', array(), 'good');
				$this->redirect(array('action' => 'view',$this->Organisation->id));
			} else {
				$this->Session->setFlash(__('The organisation could not be saved. Please, try again.'));
			}
		}
		// selection list
		$this->obtainList();
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Organisation->id = $id;
		if (!$this->Organisation->exists()) {
			throw new NotFoundException(__('Invalid organisation'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Organisation->save($this->request->data)) {
				$this->Session->setFlash(__('The organisation has been saved'), 'default', array(), 'good');
				$this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The organisation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Organisation->read(null, $id);
			$this->set('organisation', $this->Organisation->read(null, $id));
			
			// selection list
			$this->obtainList();
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
		$this->Organisation->id = $id;
		if (!$this->Organisation->exists()) {
			throw new NotFoundException(__('Invalid organisation'));
		}
		if ($this->Organisation->delete()) {
			$this->Session->setFlash(__('Organisation deleted'),'default',array(),'good');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Organisation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	// This function collects all essential list to be displayed in selection
	public function obtainList(){
		// store priority list
		$this->set('jobPriorities',$this->Organisation->JobPriority->find('list',array('fields' => array('job_priority'))));
		// store freight list
		$this->set('freights',$this->Organisation->Freight->find('list',array('fields'=>array('freight_name'))));
		// store price level list
		$this->set('priceLevels',$this->Organisation->PriceLevel->find('list',array('fields'=>array('price_level'))));
		// store staff list
		$this->set('staffs',$this->Organisation->Staff->find('list'));
	}
}
