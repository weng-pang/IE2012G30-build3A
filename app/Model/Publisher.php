<?php
/**
 * @property Publisher $Publisher
 */
    class Publisher extends AppModel
    {
        public $name = "Publisher";
        var $displayField='company_name';

        var $validate = array(
        'company_name' => array('rule' => 'notEmpty','message' => 'Please enter a value for the company name field.'),
        'contact_fname'=>array('rule'=>'notEmpty','message'=>'Please enter a value for the contact firstname field.'),
        'contact_sname'=>array('rule'=>'notEmpty','message'=>'Please enter a value for the contact surname field.'),
        'phone'=>array('rule1'=>array('rule'=>'notEmpty','message'=>'Please enter a value for the phone field.')));
    }
 ?>
