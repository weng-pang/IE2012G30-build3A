<?php
	class UsersController extends AppController{
            
                var $name='Users';
                var $helpers=array('Html','Form');
		
		public function beforeFilter() {
                    parent::beforeFilter();
                    $this->Auth->autoRedirect = false;
                    //$this->Auth->allow('*');
                    $this->Auth->allow('login','logout');
                     
                    
                }
                
            public function login() {
                $this->theme='Login';
                //$this->redirect(array('controller' => 'organisations', 'action' => 'view'));
                if ($this->request->is('post')) { // check login action
                	
                    if ($this->Auth->login()) { // successful login 
                    	// check suspend status
                    	if (!$this->Session->read('Auth.User.is_suspended')){
                    		// var_dump($this->Session->read('Auth.User.access_level'));// DEBUG ONLY
	                        if($this->Session->read('Auth.User.access_level') == 'User' || $this->Session->read('Auth.User.access_level') == 'Superuser'){ 
    	                      		$this->redirect(array('controller' => 'products', 'action' => 'index'));
        	                  
            	            }else if(($this->Session->read('Auth.User.access_level') == 'Administrator')|| ($this->Session->read('Auth.User.access_level') == 'Staff'|| ($this->Session->read('Auth.User.access_level') == 'Superstaff'))){
                	        	
                    	   			 $this->redirect(array('controller' => 'jobs', 'action' => 'index'));
                        	} else { // unsuccessful login
                            	$this->Session->setFlash(__('Login is failed'));
                        	}
                    	} else {
                    		$this->Session->setFlash(__('Your access has been suspended'));
                    		$this->Auth->logout(); // Logout immediately for suspended access
                    	}
                    } else {
                        $this->Session->setFlash(__('Invalid username or password, try again'));
                    }
                    
                }
            }
            
//             public function isAuthorized($user){
//                    if($this->action==='index'){
//                        if($this->Session->read('Auth.User.role') == 'client'){
//                            return false;
//                        }
//                    }
//                    
//                }

            public function logout() {
                    $this->redirect($this->Auth->logout());
            }
            
            
            // NOTICE - ALL OF THE CODES BELOW MUST BE REMOVED BEFORE IMPLEMENTATION
            public function index() {
                                $this->User->recursive = 0;
                                $this->set('users', $this->paginate());
                            }
            // NOTICE - ALL OF THE CODES BELOW MUST BE REMOVED BEFORE IMPLEMENTATION
            public function view($id = null) {
            	$this->User->id = $id;
            	if (!$this->User->exists()) {
                	throw new NotFoundException(__('Invalid user'));
            	}
            	$this->set('user', $this->User->read(null, $id));
            }
                            
                            
                            
                            
         // NOTICE - ALL OF THE CODES BELOW MUST BE REMOVED BEFORE IMPLEMENTATION
            public function adduser() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
	 // NOTICE - ALL OF THE CODES BELOW MUST BE REMOVED BEFORE IMPLEMENTATION
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
	 // NOTICE - ALL OF THE CODES BELOW MUST BE REMOVED BEFORE IMPLEMENTATION
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
               
   
    
}