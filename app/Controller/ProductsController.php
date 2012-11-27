<?php

class ProductsController extends AppController {

//    public $name = "Products";
    public $helpers = array('Html', 'Form');
    var $uses = array('Plan', 'Product', 'Accessory','AccessoryType','Job', 'Productform');


    public function index() {
        // $this->Product->recursive = 0;
        // $this->paginate = array('order' => 'type ASC');
        // $conditions=array('order'=>'id ASC');
        //  $this->set("products", $this->paginate());
        $this->set("products", $this->Product->find('all'));
        $this->set("productBrands", $this->Product->query("SELECT DISTINCT brand FROM products"));
    }

    public function mantainance() {
        $this->set("Brands", $this->Product->query("SELECT DISTINCT brand FROM products"));
    }

    public function select($brand = null) {

        //$this->set("Selects",$this->Product->findByBrand($brand));
        $this->set("Selects", $this->Product->find('all', array('conditions' => array('brand' => $brand))));
    }

    public function editBrand($brand = null) {
        $this->Product->brand = $brand;
        if (empty($this->data)) {
            $this->data = $this->Product->findByBrand($brand);
        } else {
            if ($this->Product->save($this->data)) {
                $this->Session->setFlash('Product Updated Successfully');
                $this->redirect(array('action' => 'mantainance'));
            }
        }
    }

    function deleteBrand($brand) {
        $this->Product->brand = $brand;
        $this->Session->setFlash('The brand ' . $brand . ' has been deleted.');
        $this->Product->delete($brand);
        $this->redirect(array('action' => 'mantainance'));
    }

    public function viewProduct($id = null,$brand=null) {
        $this->Product->id = $id;
        $this->Product->brand = $brand;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid Product'));
        }
        $this->set('Product', $this->Product->read(null, $id));
        $this->set("plans", $this->Plan->query("SELECT * FROM plans WHERE name LIKE 'Plan%'"));
//                        $this->set("plans",$this -> Plan ->query("SELECT * FROM plans"));
//                        $this->set("plans",$this->Plan->find('list',array('conditions'=>array('name'=>'Plan%'))));
        $this->set("packages", $this->Plan->query("SELECT * FROM plans WHERE name LIKE 'Data Pack%'"));
        
        $this->set("Accessories",$this->Product->query("SELECT * FROM products WHERE category_id=2"));

        $options = $this->Plan->find('list', array('fields' => array('Plan.name', 'Plan.duration')));
        $attributes = array('separator' => '<td><td>');
        $this->set('options', $options, $attributes);
        


        // Check data existence
//        if ($this->request->is('post')) {
//            $this->Productform->create();
//            $id = $this->request->data['Product']['id'];
	
//            //Data Validations
//            if ($this->Productform->saveAll($this->request->data, array('validate' => 'only'))) {
////                print_r($this->request->data);
//                // process data
//                // create metadata
//                $this->Job->create();
//                $this->Job->set('metadata', '<h3>Product Details</h3>
//					                <p>Quantity of Handset: ' . $this->request->data["Productform"]["handset"] . '</p>
//						        <p>Connection: ' . $this->request->data["Productform"]["serviceType"] . '</p>
//                                                        <p>Changes: ' . $this->request->data["Productform"]["existService"] . '</p>
//                                                        <p>TOO FORM: ' . $this->request->data["Productform"]["tooform"] . '</p>  
//                                                        <p>Port Form: ' . $this->request->data["Productform"]["portform"] . '</p>
//							<p>Plan: ' . $this->request->data["Productform"]["plan"] . '</p>
//							<p>Data Pack: ' . $this->request->data["Productform"]["datapack"] . '</p>
//							<p>SIM dispartch' . $this->request->data["Productform"]["isSimDispartch"] . '</p>
//							<p>SIM Serial: ' . $this->request->data["Productform"]["simSerial"] . '</p>
//									');
//                // prepare rest of information (set)
////                print_r($this->request->data["Productform"]["serviceType"]);
//                $this->Job->set('client_name', 'monash');
//                $this->Job->set('organisation_id','1');
//                $this->Job->set('type', 'Phone procument');
////                $this->Job->set('created', date('Y-m-d H:i:s'));
//                $this->Job->set('priority', '');
//                $this->Job->set('user_name', $this->Session->read('Auth.User.username'));
////                $data=array('client_name'=>$this->Session->read('Auth.User.username'),'type'=>$this->request->data["Productform"]["serviceType"],
////                    'created'=> date('Y-m-d H:i:s'),'job_priority'=> '','user_name', $this->Session->read('Auth.User.username'));
//                
////                $this->Job->set('order_id','0');
////                $this->Job->set('progress','complete');
////                $this->Job->set('client_name','monash');
////                $this->Job->set('user_name','da');
////                $this->Job->set('type','new ');
////                $this->Job->set('created','2012-08-11 11:22:31');
////                $this->Job->set('due_date','0000-00-00');
////                $this->Job->set('closed_date','0000-00-00');
////                $this->Job->set('priority','silver');
//                $result=$this->Job->save();
//                
////                debug($result);
//                // store into model
////                print_r($result);
//                if ($result) {
//                    // Prompt a message to the user as it job has been submitted.
//                    $this->Session->setFlash('Your request has been lodged.', 'default');
//                    // Redirect back to Job page
//                    $this->redirect(array('action' => 'index'));
//                } else {
////                      print_r($this->Job->data);
//                    // Prompt a message to the user as it job has not been submitted.
//                    $this->Session->setFlash('Your request has not been lodged.');
//                }
//            } else {
//              
//                // Failed Validation
//                // Prompt a message to the user to correct the issues.
//                $this->Session->setFlash('Please check the form before submitting.');
//            }
//        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Product->create();
            $fileOK = $this->uploadFiles('img/files', $this->data['Product']['image']);

            if (array_key_exists('urls', $fileOK)) {
                $this->request->data['Product']['image'] = $fileOK['urls'][0];
            } else {
                $message = 'Image upload failed';
                $this->request->data['Product']['image'] = null;
            }
            if ($this->Product->saveAll($this->request->data)) {
                print_r($this->request->data);
//                if($this->request->data['Product']['category_id']==2){
//                    $this->Accessory->create();
//                    $this->Accessory->set('productId',$this->request->data['Product']['id']);
//                    $this->Accessory->set('supplierCode',$this->request->data['Product']['Accessory.supplierCode']);
//                    $this->Accessory->set('accessoryTypeId',$this->request->data['Product']['Accessory.accessoryTypeId']);
//                    
//                    if($this->Accessory->save()){
                     $this->Session->setFlash(_('The product has been saved'));
//                    }
//                }
            } else {
                if (isset($message)) {
                    $this->Session->setFlash(_($message));
                } else {
                    $this->Session->setFlash(_('The product could not be saved. Please, try again'));
                }
            }
        }
    }

    function edit($id = null) {
        $this->Product->id = $id;
        if (empty($this->data)) {
            $this->data = $this->Product->findById($id);
        } else {
            if ($this->Product->save($this->data)) {
                $this->Session->setFlash('Product Updated Successfully');
                $this->redirect(array('action' => 'mantainance'));
            }
        }
    }

    function delete($id) {
        $this->Product->id = $id;
        $this->Session->setFlash('The product has been deleted.');
        $this->Product->delete($id);
        $this->redirect(array('action' => 'mantainance'));
    }

    function download($fileName) {
        $this->viewClass = 'Media';
        $params = array('id' => '',
            'name' => $fileName,
            'download' => true, // force the download, don't just open.
            'extension' => 'pdf',
            'path' => APP . 'webroot/' . DS// force the download, don't just open.
        );
var_dump(APP . 'webroot/files' . DS);
        $this->set($params);
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

}