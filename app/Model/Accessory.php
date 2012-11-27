<?php

class Accessory extends AppModel {

    public $name = "Accessory";
    public $belongsTo=array(
        'AccessoryType'=>array(
            'className'=>'AccessoryType',
            'foreignKey'=>'accessory_type_id'
            
        )
        
    );
    
//    public $belongsTo=array(
//        'Product'=>array(
//            'className'=>'ProductAcc',
//            'foreignKey'=>'product_id'
//        )
//    );
      public $hasMany=array(
        'Product'=>array(
            'foreignKey'=>'product_id'
        )  
      );      

   
}

?>