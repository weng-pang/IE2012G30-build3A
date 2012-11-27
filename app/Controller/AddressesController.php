<?php

/**
 * Address Controller
 * Monash IE Group 30 SO2 - Weng Long Pang
 * Solve Communications
 * 
 * This Controller governs address information for Organisation and Customer data
 * 
 *
 * 
 * @author			Monash IE Team 30 S02, Weng Long Pang
 * @copyright		Copyright 2012, Monash University
 * @package			app.Controller
 * @since			Build 3
 * @property		Organisation $Organisation
 * @property		Customer $Customer
 */
App::uses('AppController', 'Controller');

class AddressesController extends AppController{
	/**
	 * index function
	 * Addresses will be listed out from this function
	 * 
	 * For Customer only - the organisation Id will be used for filitering addresses out
	 * @param null
	 * @return null
	 */
	public function index($id = null){
		
		// Obtain the organisaton id
		if ($this->access_level == 'staff'){
			$this->paginate = array('conditions' => array('organisation_id =' => $id));
			// provide organisation name
			$this->setOrganisation($id);
		} else {
			// Client can use organisation id from the profile
			$this->Address->Organisation->Customer->id = $this->userInfo['id'];
			$customer = $this->Address->Organisation->Customer->read();
			$this->paginate = array('conditions' => array('organisation_id =' => $customer['Customer']['organisation_id']));
			// provide organisation name
			$this->setOrganisation($customer['Customer']['organisation_id']);
		}
		$this->set('addresses',$this->paginate());
	}
	
	/**
	 * add function
	 * New address is created from this function
	 * Each organisation has its own id to be recored simultaneously
	 * 
	 * @param integer $id, array $referer
	 * @return null
	 * 
	 */
	public function add($id = null,$referer = null){
		if ($this->request->is('post')) {
			$this->Address->create();
			
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been created'), 'default', array(), 'good');
				if (is_null($referer)){
					$this->redirect(array('action' => 'index',$this->request->data['Address']['organisation_id']));
				} else{
					$this->redirect(array('controller'=>$referer[0],'action' => $referer[1]));
				}
			} else {
				$this->Session->setFlash(__('The adress could not be saved. Please, try again.'));
			}
		} else {
			// tell the form the organisation id
			if ($this->access_level == 'staff'){
				// Only staff can add any addresses from all organisaiton
				$this->request->data['Address']['organisation_id'] = $id;
			} else {
				// Customer use the organisation id from his details
				$this->Address->Organisation->Customer->id = $this->userInfo['id'];
				$customer = $this->Address->Organisation->Customer->read();
				$this->request->data['Address']['organisation_id'] = $customer['Customer']['organisation_id'];
			}
			// provide organisation name
			$this->setOrganisation($this->request->data['Address']['organisation_id']);
		}
	}
	
	/**
	 * edit function
	 * Address is modified from this function
	 * Each organisation has its own id to be recored simultaneously
	 * For Client - organisation must be validated before proceeding
	 *
	 * @param string $id
	 * @return null
	 *
	 */
	public function edit($id = null){
		// fetch id
		$this->Address->id = $id;
		// Preventative Mesarue for invalid entries
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid Entires. Press BACK to return'));
		}
		// check if ready to update
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been updated'),'default',array(),'good');
				$this->redirect(array('action' => 'index',$this->request->data['Address']['organisation_id']));
			} else {
				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
			}
		} else {
			// if not, obtain content
			$this->request->data = $this->Address->read(null, $id);
			// provide organisation name
			$this->setOrganisation($this->request->data['Address']['organisation_id']);
		}
		
		
	}
	
	/**
	 * delete function
	 * Address is deleted from this function
	 * 
	 * For Client - organisation must be validated before proceeding
	 *
	 * @param string $id
	 * @return null
	 *
	 */
	public function delete($id = null,$organisation_id){
		if (!$this->request->is('post')) {
			//throw new MethodNotAllowedException();
		}
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid Entires. Press BACK to return'));
		}
		if ($this->Address->delete()) {
			$this->Session->setFlash(__('Address deleted'),'default',array(),'good');
			$this->redirect(array('action' => 'index',$organisation_id));
		}
		$this->Session->setFlash(__('Address was not deleted'));
		$this->redirect(array('action' => 'index',$organisation_id));
	}
	/**
	 * setOrganisation function
	 * Orgisation details from this function
	 *
	 * @param null
	 * @return null
	 *
	 */
	public function setOrganisation($id) {
		$this->Address->Organisation->id = $id;
		$organisation = $this->Address->Organisation->read();
		$this->set('organisation',$organisation);
	}
}