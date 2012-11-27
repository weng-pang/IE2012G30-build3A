<?php
	class JobsController extends AppController{
		public $name = "Jobs";
		//public $uses = array('Job','JobStatus');
		
		/*
		index method - Portal method for accessing job table
					- User Priviledge is checked and redirection will be given.
					- For all customers , custjobindex is leaded .
					- For all staffs, staffjobindex is leaded.
		
		*/
		public function index(){
			// read current user level
			
			switch($this->Session->read('Auth.User.role')){
				case 'client':
				$role = 'client';
				break;
				case 'superclient':
				$role = 'client';
				break;
				case 'staff':
				$role = 'staff';
				break;
				case 'superstaff':
				$role = 'staff';
				break;
				case 'admin':
				$role = 'staff';
				break;
				
			}
			// provide redirection
			if ($role == 'staff'){
				// Staff: to staff page
				$this->redirect(array('action'=>'staffjobindex'));
			} else {
				// Client: to client page
				$this->redirect(array('action'=>'custjobindex'));
			}
			
		}
		
		public function testdisplay(){
			
				 $this->set("jobs",$this->paginate());
                  // $this->set("jobs",$this->Job->find("all",$conditions));
				  // store staff list
				$this->set('staffs',$this->Job->JobAllocation->Staff->find('all'));
					   // store allocation list
					   $this->set('allocations',$this->Job->JobAllocation->find('all'));
		}
		
		public function staffjobindex(){
			//$this->Job->recursive=2;
			$this->paginate=array('order'=>'type ASC');
			// $conditions=array('order'=>'id ASC');
			$this->set("jobs",$this->paginate());
			// $this->set("jobs",$this->Job->find("all",$conditions));
			// store staff list
			$this->set('staffs',$this->Job->JobAllocation->Staff->find('all'));
			// store allocation list
			$this->set('allocations',$this->Job->JobAllocation->find('all'));
			//$this->Session->setFlash('Good Message.', 'default', array(), 'good'); // Use for message Test display
			//$this->Session->setFlash('Bad Message.', 'default', array(), 'bad');
		}
                
        public function custjobindex(){
                        $this->Job->recursive=0;
                        $this->paginate=array('order'=>'type ASC');
                       // $conditions=array('order'=>'id ASC');
                       $this->set("jobs",$this->paginate());
                       // $this->set("jobs",$this->Job->find("all",$conditions));
		}
        /*
			View Method - This function has several capabilities:
				- View Each individual Job with All Notes and latest status
				- Add New Job Note with New Status
				- Update Priority Level and Staff Allocation
		*/
		// Authenication View Mechanism
		public function jobview($id=null){
			// redirect to view
			$this->redirect(array('action'=>'view',$id));
		}
        public function view($id=null){
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
							$this->JobStatus->id = $this->request->data['JobNote']['job_status_id'];
							$jobStatus = $this->JobStatus->read();
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
 * FOR ORIGINAL CODE - DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
   This method redirects user to Newjob Controller for actual New Job lodgement
 
 * @return void
 */
	public function add() {
		/*if ($this->request->is('post')) { //- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Session->setFlash(__('The job has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'));
			}
		}*/
		
		// Redirect to New Job Selection Page.
		$this->redirect(array('controller'=>'Newjobs','action'=>'index'));
	}

/**
 * edit method - DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {  //- DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
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
	}

/**
 * delete method - DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) { // - DO NOT UTILISE! - MUST BE REMOVED BEFORE IMPLEMENTATION
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
 /*
   Logout method - This method calls for Auth Component for logout procedures.
 */
   	public function logout(){
        $this->redirect($this->Auth->logout());
                    
    }
                
}