<?php
class TasksController extends AppController{
	//public $uses = array('Job');
	
	
	public function index(){
		//$this->Task->recursive=2;
		$this->paginate=array('order'=>'type ASC');
        $this->set("tasks",$this->paginate());
        // store staff list
		$this->set('staffs',$this->Task->JobAllocation->Staff->find('all'));
		// store allocation list
		$this->set('allocations',$this->Task->JobAllocation->find('all'));
		
	}
	
	public function view($id=null){
		$this->recursive = -1;
		// Provide Job Id information
		$this->Task->id=$id;
		// Verify the id is valid
		if(!$this->Task->exists()){
			throw new NotFoundException(__('Invalid Job!'));
		}
		// Check for existance of Job note form - Verified by Post content
		if ($this->request->is('post')){
			if (array_key_exists('JobNote',$this->request->data)){
				// for update job notes
				// If the form DOES exist, go through new Note addition procedures
				$this->Task->JobNote->create();
				// Provide some Job note metedata: Job ID and Staff ID
				$this->Task->JobNote->set('job_id',$id);
				$this->Task->JobNote->set('staff_id',$this->Session->read('Auth.User.id'));
				// Attempt to save data into Database
				if ($this->Task->JobNote->save($this->request->data)){
					// Successful  - Give Update message
					$this->Session->setFlash('Job Note Entered', 'default', array(), 'good');
					// Reflect Job Status into Current Job for display purpose
					// re-read current job content
					$this->Task->read(null, $id);
					// update status - This mechansim stores the actual name only
					// obtain the status name
					$this->JobStatus->id = $this->request->data['JobNote']['job_status_id'];
					$jobStatus = $this->JobStatus->read();
					$this->Task->set('progress',$jobStatus['JobStatus']['job_status']);
					// store all data back to database
					$this->Task->save();
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
				$this->Task->read(null, $id);
				// update priority level
				$this->Task->set('job_priority',$this->request->data['JobPriority']['job_priority']);
				// update allocation information
				$this->Task->JobAllocation->set('job_id',$id);
				$this->Task->JobAllocation->set('staff_id',$this->request->data['JobAllocation']['staff_id']);
				// store all data back to database
				$this->Task->save();
				$this->Task->JobAllocation->save();
				$this->Session->setFlash('Job Information Updated', 'default', array(), 'good');
			}
		}
		// finally, show current Job Details
		$this->set('job',$this->Task->read());
		$this->set('jobNotes', $this->Task->JobNote->findAllByJobId($id));
		$this->set('jobStatuses',$this->Task->JobNote->JobStatus->find('list',array('fields' => array('job_status'))));
		$this->set('jobPriorities',$this->Task->JobPriority->find('list',array('fields' => array('job_priority'))));
		$this->set('staff',$this->Task->JobAllocation->findAllByJobId($id));
		$this->set('staffs',$this->Task->JobAllocation->Staff->find('list'));
	}
}