<?php
	class User extends AppModel{
		public $name = "User";
                 public $validate = array(
                    'username' => array(
                        'alphaNumberic' =>array(
                            'rule'      =>'alphaNumeric',
                            'required'  =>true,
                            'message'   =>'Alphabets and numbers only'
                        ),
                           'isUnique' =>array(
                            'rule' =>'isUnique',
                            'message' =>'This username has already been taken.'
                        ),
                        'required' => array(
                            'rule' => array('notEmpty'),
                            'required'=>true,
                            'message' => 'A username is required'
                        )
                    ),
                    'password' => array(
                        'minLength'=>array(
                            'rule' =>array('currentUser'),
                            'message'=>'Minimum 8 Characters long'
                            ),
						

                    ),
                    'role' => array(
                        'valid' => array(
                            'rule' => array('inList', array('admin', 'staff','superstaff','client')),
                            'message' => 'Please enter a valid role',
                            'allowEmpty' => false
                        )
                    )
                );
				 
		public function currentUser($data){
			//var_dump($data); // debug only
			//var_dump($this->data);
			// overwrites minimum 8-character on password unchange option
			if ($this->data['User']['id'] && $data['password']==''){
				return true;
			} elseif(strlen($data['password']) >= 8){
				// Otherwise follow normal rules
				return true;
			}
			return false;
		}
          public function beforeSave($options = array()) {
			  // empty password field for current user - password is not changed.
			  if ($this->data['User']['id'] && $this->data['User']['password']==''){
				  // prevent password double-hashing and updating
				  unset($this->data['User']['password']);
				  // all other scenarios - hash the password.
			  }elseif (isset($this->data[$this->alias]['password'])) {
                $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
            }
                return true;
         }
	}