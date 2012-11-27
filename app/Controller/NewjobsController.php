<?php
App::uses('AppController','Controller');
/*
Monash IE Group 30 SO2 - Weng Long Pang
Solve Communications
New Jobs Controller
This Controller administrates all new Job additions into the system.
All form data processed will mainly become metadata for permemant storage (No Deletion nor Modifiction)
Some entities may not be merged into metadata:
     client_name
     organisation_name
     jobtype
     create_date
     due_date
     
*/
class NewjobsController extends AppController {
	// Job Form validation rules are included here
	public $uses = array('Organisation','Customer','Job','JobAllocation','Customerform','Billingform','Repairform','Roamingform','Cancellationform','Suspensionform','Faultform','Pinform','Simform');

	public $helpers = array('Html', 'Form','Js');
	public $components = array('RequestHandler');
	// customer form content storage
	private $customerFormContent = '';
	
	public function index() {
	// User will be redirect to this area before going to any specific form.
	// Actual display layout is defined in View Layer (NewJob/index.ctp)
	}

// Job Types
// Each job type have its distinctive method to process form data, due to different form layouts.
// Note the actual layout is defined in View Layer (NewJob/repair.ctp)
	public function repair() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Repairform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<p>ADDRESS: '.$this->request->data["Repairform"]["address"].'</p>
								<h3>Mobile Phone Details</h3>
								<p>MOBILE NUMBER:'.$this->request->data["Repairform"]["mobile"].'</p>
								<p>MAKE: '.$this->request->data["Repairform"]["make"].'</p>
								<p>MODEL: '.$this->request->data["Repairform"]["model"].'</p>
								<p>IMEI NUMBER: '.$this->request->data["Repairform"]["imei"].'</p>
								<p>ACCESSORIES: '.$this->request->data["Repairform"]["accessories"].'</p>
								<p>FAULT DETAILS: '.$this->request->data["Repairform"]["fault"].'</p>
								<p>PURCHASE INVOICE NUMBER: '.$this->request->data["Repairform"]["invoice"].'</p>
								<p>CAP PRICE: '.$this->request->data["Repairform"]["price"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','Mobile Phone Repair');
				// store into model
				$this->saveJob();
				// Redirect back to Job page
				$this->returnJob();
			} else {
			// Failed Validation
			// Prompt a message to the user to correct the issues.
				$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
				// Staff Only: provide organisation list
				$this->defineOrganisationList();
			} 
			
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}
	}

	public function billenquiry() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Billingform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Billing Enquiry Details</h3>
								<p>ACCOUNT NUMBER: '.$this->request->data["Billingform"]["account"].'</p>
								<p>REQUEST AMOUNT: $'.$this->request->data["Billingform"]["amount"].'</p>
								<p>DESCRIPTION: '.$this->request->data["Billingform"]["details"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','Billing Enquiry');
				// store into model
				$this->saveJob();
				// Redirect back to Job page
				$this->returnJob();
				} else {
					// Failed Validation
					// Prompt a message to the user to correct the issues.
					$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
					// Staff Only: provide organisation list
					$this->defineOrganisationList();
				}
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}
	}

	public function roaming() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Roamingform->saveAll($this->request->data, array('validate' => 'only'))) {
				// additional validation for roaming
				$additionalValidation = true;
				// at least one option has been chosen
				if ($this->request->data['voice'] == 0 && $this->request->data['plan'] == 0 && $this->request->data['pack'] == 0){
					$additionalValidation = false;
					// Prompt user for selection
					$this->Session->setFlash('Please Select at least one Roaming Option.','default',array(),'bad');
				}
				// both data pack and data plan must not be selected
				if ( $this->request->data['plan'] != 0 && $this->request->data['pack'] != 0){
					$additionalValidation = false;
					// Prompt user for correction
					$this->Session->setFlash('Either a single Data Plan or Data Pack can be selected.','default',array(),'bad');
				}
				// if additional valdiation goes through
				if ($additionalValidation){
					// process data
					// create metadata
					$this->Job->set('metadata',
									$this->customerFormContent.
									'<h3>International Roaming Details</h3>
									<p>MOBILE: '.$this->request->data["Roamingform"]["mobile"].'</p>
									<p>SIM: '.$this->request->data["Roamingform"]["serial"].'</p>
									<p>COUNTRIES: '.$this->request->data["Roamingform"]["countries"].'</p>
									<p>HANDSET: '.$this->request->data["Roamingform"]["handset"].'</p>
									<p>VOICE PACK: $'.$this->request->data['voice'].'PACK</p>
									<p>DATA PACK: $'.$this->request->data['plan'].'PLAN</p>
									<p>DATA PLAN: $'.$this->request->data['pack'].'PACK</p>
									');
					// prepare rest of information (set)
					$this->Job->set('type','Internation Roaming');
					// store into model
					$this->saveJob();
					// Redirect back to Job page
					$this->returnJob();
					} else {
						// Failed Validation
						// Staff Only: provide organisation list
						$this->defineOrganisationList();
						// Prompt a message to the user to correct the issues.
						$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
					}
				}
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}	
	}

	public function cancellation() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Cancellationform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Cancellation Details</h3>
								<p>MOBILE NUMBER: '.$this->request->data["Cancellationform"]["mobile"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','Cancellation');
				// store into model
				$this->saveJob();
				// Redirect back to Job page
				$this->returnJob();
				} else {
					// Failed Validation
					// Staff Only: provide organisation list
					$this->defineOrganisationList();
					// Prompt a message to the user to correct the issues.
					$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
				}
			} else {
				// Assign Default Form Values.
				$this->assignForm();
		}
	}

	public function suspension() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Suspensionform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Suspension Details</h3>
								<p>MOBILE NUMBER: '.$this->request->data["Suspensionform"]["mobile"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','Suspension');
				// store into model
				$this->saveJob();
				// Redirect back to Job page
				$this->returnJob();
				} else {
					// Failed Validation
					// Staff Only: provide organisation list
					$this->defineOrganisationList();
					// Prompt a message to the user to correct the issues.
					$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
				}
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}
	}

	public function fault() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Faultform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Fault Details</h3>
								<p>MOBILE NUMBER: '.$this->request->data["Faultform"]["mobile"].'</p>
								<p>DEVICE TYPE: '.$this->request->data["Faultform"]["device"].'</p>
								<p>FAULT DETAILS: '.$this->request->data["Faultform"]["fault"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','Fault');
				// store into model
				$this->saveJob();
				// store Job Allocation
				$this->assignJob();
				// Redirect back to Job page
				$this->returnJob();
			} else {
			// Failed Validation
				// Staff Only: provide organisation list
				$this->defineOrganisationList();
			// Prompt a message to the user to correct the issues.
				$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
			} 
			
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}
	}

	public function pinrequest() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Pinform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Mobile Phone Details</h3>
								<p>MOBILE NUMBER: '.$this->request->data["Pinform"]["mobile"].'</p>
								<p>SIM SERIAL: '.$this->request->data["Pinform"]["serial"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('type','PUK/PIN Request');
				// store into model
				$this->saveJob();
				// Redirect back to Job page
				$this->returnJob();
			} else {
			// Failed Validation
				// Staff Only: provide organisation list
				$this->defineOrganisationList();
			// Prompt a message to the user to correct the issues.
				$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
			} 
			
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}	
	}

	public function simreplacement() {
		// Check data existence
		if ($this->request->is('post')) {
			// Prepare cusomterform content
			$this->obtaincustomerform();
			//Data Validations
			if ($this->Simform->saveAll($this->request->data, array('validate' => 'only'))) {
			// process data
				// create metadata
				$this->Job->set('metadata',
								$this->customerFormContent.
								'<h3>Mobile Phone Details</h3>
								<p>MOBILE NUMBER: '.$this->request->data["Simform"]["mobile"].'</p>
								<p>OLD SIM SERIAL: '.$this->request->data["Simform"]["oldserial"].'</p>
								<p>NEW SIM SERIAL: '.$this->request->data["Simform"]["newserial"].'</p>
								');
				// prepare rest of information (set)
				$this->Job->set('client_name',$this->request->data["Customerform"]["name"]);
				$this->Job->set('phone',$this->request->data["Customerform"]["contact"]);
				$this->Job->set('type','SIM Replacement');
				$this->Job->set('created',date('Y-m-d H:i:s'));
				$this->Job->set('job_priority','');
				$this->Job->set('user_name',$this->Session->read('Auth.User.username'));
				// store into model
				$this->Job->save();
				// Prompt a message to the user as it job has been submitted.
				$this->Session->setFlash('Your request has been lodged.', 'default', array(), 'good');
				// Redirect back to Job page
				$this->returnJob();
			} else {
			// Failed Validation
			// Prompt a message to the user to correct the issues.
				$this->Session->setFlash('Please check the form before submitting.','default',array(),'bad');
			} 
			
		} else {
			// Assign Default Form Values.
			$this->assignForm();
		}	
	}
// This is an special function to handle storage of the job before / after data processing
// Users are not supposed to enter this area
	// This function obtains and stores customer form data into Customerform model for validation only
	public function obtaincustomerform(){
		
		// STAFF Only: Use Generic data if a organisation has been chosen
		
		if ($this->access_level == 'staff' && $this->data['Customerform']['select'] != 0){
			// fetch data from organisation table
			$this->Organisation->id = $this->data['Customerform']['select'];
			$organisation = $this->Organisation->read();
			// Assing all data into $this->request->data
			// empty fields must not overwrite
			if ($this->request->data['Customerform']['company'] == ''){
				// Cusomter Name
				$this->request->data['Customerform']['company'] = $organisation['Organisation']['name'];
			}
			if ($this->request->data['Customerform']['name'] == ''){
				// Cusomter Contact
				$this->request->data['Customerform']['name'] = $organisation['Organisation']['name'];
			}
			if ($this->request->data['Customerform']['contact'] == ''){
				// Contact Number
				$this->request->data['Customerform']['contact'] = $organisation['Organisation']['phone'];
			}
			if ($this->request->data['Customerform']['email'] == ''){
				// Email Address
				$this->request->data['Customerform']['email'] = $organisation['Organisation']['e-mail'];
				// Job data information
				$this->Job->set('organisation_id',$this->request->data['Customerform']['select']);
			}
			// Assign organisation ID
			$this->Job->set('organisation_id',$this->request->data["Customerform"]["select"]);
			// Address: Wait for address book
			
		} 
		// Customer Only: Automatically provides organisation information
		elseif ($this->access_level == 'user'){
				// THIS PART MUST BE CORRECTED
			$organisation = $this->Customer->find('first',array('conditions' => array('Customer.id' => $this->userInfo['id'])));//array('field' => 'id', 'value' => $this->userInfo['id']));
			//var_dump($this->userInfo);
			//var_dump($organisation);
			$this->Job->set('organisation_id',$organisation['Organisation']['id']);
			
		}
		
		// Job data information
		if (isset($organisation['Organisation']['job_priority_id']))
		$this->Job->set('job_priority',$organisation['Organisation']['job_priority_id']);
		
		// prepare for allocation
		if(isset($organisation['Organisation']['staff_id']))
		$this->JobAllocation->set('staff_id',$organisation['Organisation']['staff_id']);
		
		// Once all data have been prepared, commence process
		$this->Customerform->data = $this->data;
		$this->customerFormContent = '<h3>Customer Information</h3>
								<p>COMPANY NAME: '.$this->request->data["Customerform"]["company"].'</p>
								<p>CONTACT NAME: '.$this->request->data["Customerform"]["name"].'</p>
								<p>CONTACT NUMBER: '.$this->request->data["Customerform"]["contact"].'</p>
								<p>EMAIL ADDRESS: '.$this->request->data["Customerform"]["email"].'</p>
								';
	}
	// This function provides users with automatic form information from its profile
	public function assignForm(){
		$this->defineOrganisationList();
		
		if ($this->access_level == 'user'){
			// For Customer Only:
			//fetch organisation and customer data
			$this->userInfo;
			
			// obtain current login information (for organisation details)
			
			$this->Customer->id = $this->userInfo['id'];
			$thisCustomer = $this->Customer->read();
			
			$this->Organisation->id = $thisCustomer['Customer']['organisation_id'];
			$thisOrganisation = $this->Organisation->read();
			$this->request->data['Customerform']['company'] = $thisOrganisation['Organisation']['name'];
			$this->request->data['Customerform']['name'] = $thisCustomer['Customer']['first_name'].' '.$thisCustomer['Customer']['last_name'];
			$this->request->data['Customerform']['contact'] = $thisCustomer['Customer']['phone'];
			$this->request->data['Customerform']['email'] = $thisCustomer['Customer']['email'];
		}
		// assign customer data into form
		//$this->request->data['Customerform']['company'] = 'SolveTest';
		
	}
	public function defineOrganisationList(){
		if ($this->access_level == 'staff'){
			// Staff Only: provide organisation list
			$this->set('organisations',$this->Organisation->find('list'));
		}
	}
	// This function collects job saving common components
	public function saveJob(){
		$this->Job->set('client_name',$this->request->data["Customerform"]["company"]); // move
		$this->Job->set('phone',$this->request->data["Customerform"]["contact"]); // move
		$this->Job->set('created',date('Y-m-d H:i:s'));	// move
		$this->Job->set('user_name',$this->request->data["Customerform"]["name"]);//$this->Session->read('Auth.User.username')); //move
		if ($this->access_level == 'user'){
			$this->Job->set('user_id',$this->Session->read('Auth.User.id'));
		}
		// store into model
		$this->Job->save();
		// store Job Allocation
		$this->assignJob();
		
	}
	// This function collects all new job functionality regarding to allocation
	// Jobs are allocated based on default allocation setting from each organisation
	public function assignJob(){
		$this->JobAllocation->set('job_id',$this->Job->id);
		
		$this->JobAllocation->save();
	}
	public function returnJob() {

		// redirect back to job table
		// Prompt a message to the user as it job has been submitted.
		$this->Session->setFlash('Your request ('.$this->Job->id.')has been lodged.', 'default', array(), 'good');
		
		// This area requires determination of current account access level for proper redirection
		$this->redirect(array('controller'=>'jobs','action'=>'index'));
		
	}
}
?>
