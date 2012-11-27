<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 */
class JobsController extends AppController {
	public $uses = array('Job','Customer','JobAllocation','Staff');
	public $paginate = array('limit'=>1000);
	
	// Authorisation component
	/*
	 * All members have access to this area, with no modifications required
	 * 
	 */
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		// For user(client) only - only their own oragnisation jobs can be seen
		if ($this->access_level == 'user'){
			$this->Customer->id = $this->userInfo['id'];
			$theCustomer = $this->Customer->read();
			//var_dump($theCustomer); // debug only
			$this->paginate = array('conditions' => array('Job.organisation_id' => $theCustomer['Customer']['organisation_id']));
			// For user(client) only - Restriction to the user's own job creation
			if ($theCustomer['Customer']['all_jobs'] != true){
				// another pagination rule applies
				//$this->paginate = array('conditions' => array('Job.user_name LIKE' => $this->userInfo['username']));
			}
		}
		
		
		//$this->Job->recursive=2;
		//$this->paginate=array('order'=>'type ASC');
		
		// $conditions=array('order'=>'id ASC');
		$this->set("jobs",$this->paginate());
		// $this->set("jobs",$this->Job->find("all",$conditions));
		// store staff list
		$this->set('staffs',$this->Staff->find('all'));
		// store allocation list
		$this->set('allocations',$this->JobAllocation->find('all'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->recursive = -1; 
			// Provide Job Id information
			$this->Job->id=$id;
			// Verify the id is valid
			if(!$this->Job->exists()){
            	throw new NotFoundException(__('Invalid Job!')); 
            }
			// Check for existance of Job note form - Verified by Post content
			if ($this->request->is('post')){
				if (array_key_exists('JobNote',$this->request->data)){
					// for update job notes
					// If the form DOES exist, go through new Note addition procedures
					$this->Job->JobNote->create();
					// Provide some Job note metedata: Job ID and Staff ID
					$this->Job->JobNote->set('job_id',$id);
					$this->Job->JobNote->set('staff_id',$this->Session->read('Auth.User.id'));
					// Attempt to save data into Database
					if ($this->Job->JobNote->save($this->request->data)){
						// Successful  - Give Update message
						$this->Session->setFlash('Job Note Entered', 'default', array(), 'good');
						// Reflect Job Status into Current Job for display purpose
							// re-read current job content
							$this->Job->read(null, $id);
							// update status - This mechansim stores the actual name only
							// obtain the status name
							$this->Job->JobNote->JobStatus->id = $this->request->data['JobNote']['job_status_id'];
							$jobStatus = $this->Job->JobNote->JobStatus->read();
							$this->Job->set('progress',$jobStatus['JobStatus']['job_status']);
							// store all data back to database
							$this->Job->save();
						// Clear current form for new input.
						$this->request->data['JobNote']['note'] = '';
						$this->request->data['JobNote']['private_note'] = '';
					} else{
						// Unsuccessful - Alert the user
						$this->Session->setFlash('Please Check Your Inputs', 'default', array(), 'bad');
					}
				} else if (array_key_exists('JobPriority',$this->request->data)){
					// for updating job priorities	
					// re-read current job content
					$this->Job->read(null, $id);
					// update priority level
					$this->Job->set('job_priority',$this->request->data['JobPriority']['job_priority']);
					// update allocation information
					$this->Job->JobAllocation->set('job_id',$id);
					$this->Job->JobAllocation->set('staff_id',$this->request->data['JobAllocation']['staff_id']);
					// store all data back to database
					$this->Job->save();
					$this->Job->JobAllocation->save();
					$this->Session->setFlash('Job Information Updated', 'default', array(), 'good');
				}
			} 
			// finally, show current Job Details
            $this->set('job',$this->Job->read());
           	$this->set('jobNotes', $this->Job->JobNote->findAllByJobId($id)); 
			$this->set('jobStatuses',$this->Job->JobNote->JobStatus->find('list',array('fields' => array('job_status'))));
			$this->set('jobPriorities',$this->Job->JobPriority->find('list',array('fields' => array('job_priority'))));
			$this->set('staff',$this->Job->JobAllocation->findAllByJobId($id));
			$this->set('staffs',$this->Job->JobAllocation->Staff->find('list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// Redirect to New Job Selection Page.
		$this->redirect(array('controller'=>'Newjobs','action'=>'index'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid job'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('The job has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Job->read(null, $id);
		}
		$orders = $this->Job->Order->find('list');
		$this->set(compact('orders'));
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid job'));
		}
		if ($this->Job->delete()) {
			$this->Session->setFlash(__('Job deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Job was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
