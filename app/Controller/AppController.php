<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
     var $beforeFilter = array('checkAccess'); 
     //var $components = array('Acl');
   	 var $access_level = '';
   	 var $userInfo;
    
     //set component for auto direct page for login&logout
     public $components = array(
        'Session',
         'Auth' => array(
          
          // 'loginRedirect' => array('controller' => 'jobs', 'action' => 'index'),
           'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
         		'authError' => 'You do not have access to this area!',
            'authorize' => array('Controller') 
            )
    );
     
        //this method is used for check user is authorized for access pages.
        public function isAuthorized($user) {
           // Debug($user);
            // Admin can access every action
            /*
            if ((isset($user['access_level']) && $user['access_level'] == 'Administrator')||
                (isset($user['access_level']) && $user['access_level'] == 'Superstaff')||
                (isset($user['access_level']) && $user['access_level'] == 'Staff')) {
                 return true;
            }else if(isset($user['access_level']) && $user['access_level'] == 'Client'){
                return true;
            }
            // Default deny
               return false;
               */
        	return true;
        }
        
        
        //use for check which page user can access. 
        function checkAccess() {
	        // here we check the permissions based on 
    	    // username and controller name (which is 
        	// is the first part of the URL) 
    	    /*
        	$user = $this->Session->read(USER_LOGIN_KEY);
        	$aco = $this->params['controller'];
        	if ($this->Acl->check($user, "/$aco", '*')) {
	            return;
    	    } else {
        	    // if anonymous, redirect to login 
            	// otherwise, give permission error 
            	if ($user == ANONY_USER) {
	                $this->redirect("/user/login");
    	        } else {
        	        $this->redirect("/pages/permission_denied");
            	}
        	}
        	*/
        	return true;
    	}
	// areas allow non-login user access
	// and parameters for login information.
    public function beforeFilter(){
    	//$this->Auth->allow('*'); // This allows all users accessing all part of system. (Debug Only!)
    	// Define current login information
    	$this->set('loggedIn',$this->Auth->loggedIn());
    	$this->set('userInfo',$this->Auth->user());
    	// Define user access level...
    	$this->userInfo = $this->Auth->user();
    	
		switch ($this->userInfo['access_level']){
			case 'Administrator':
				//echo 'admin';
			case 'Superstaff':
				//echo 'superstaff';
			case 'Staff':
				//echo 'staff';
				$this->access_level = 'staff';
				$this->set('isStaff',true);
			break;
			default:
				//echo 'user only';
				$this->access_level = 'user';
				$this->set('isStaff',false);
		}  	
    }

   
}
