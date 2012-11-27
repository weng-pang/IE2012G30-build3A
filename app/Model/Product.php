<?php

class Product extends AppModel {

    public $name = "Product";
    
   
    
    public $belongsTo=array(
        'Category'=>array(
            'className' =>'Category',
            'foreignKey'=>'category_id'
        )
    );
    
    public $hasMany='Accessory';
    
//    public $hasMany='ProductAccess';
            

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}

?>