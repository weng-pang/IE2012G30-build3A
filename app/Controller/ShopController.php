<?php

App::uses('AppController', 'Controller');

class ShopController extends AppController {

//////////////////////////////////////////////////

    public $components = array(
        'Cart',
        'Paypal',
        'AuthorizeNet'
    );
//////////////////////////////////////////////////
    public $helpers = array('Html', 'Form');
    public $uses = array('Plan', 'Product', 'Accessory', 'AccessoryType', 'Job', 'Productform');

//////////////////////////////////////////////////

    public function beforeFilter() {
        parent::beforeFilter();
        $this->disableCache();
        //$this->Security->validatePost = false;
    }

//////////////////////////////////////////////////

    public function clear() {
        $this->Cart->clear();
        $this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error',array(),'good');
        $this->redirect(array('action'=>'cart'));
    }

//////////////////////////////////////////////////

    public function add() {
////        $this->Product->id = $id;
//        print_r($this->request->data);
//        $this->Product->brand = $brand;
//        if ($this->request->is('post')) {
////            $this->Productform->create();
//            $id = $this->request->data['Plan']['id'];
//            $product = $this->Cart->add($id, 1);
//            if (!empty($product)) {
//                $this->Session->setFlash($product['Product']['model'] . ' was added to your shopping cart.', 'flash_success');
//                if ($this->Productform->saveAll($this->request->data, array('validate' => 'only'))) {
////                print_r($this->request->data);
//                    // process data
//                    // create metadata
//                    $this->Job->create();
//                    $this->Job->set('metadata', '<h3>Product Details</h3>
//					                <p>Quantity of Handset: ' . $this->request->data["Productform"]["handset"] . '</p>
//						        <p>Connection: ' . $this->request->data["Productform"]["serviceType"] . '</p>
//                                                        <p>Changes: ' . $this->request->data["Productform"]["existService"] . '</p>                                                        
//							<p>Plan: ' . $this->request->data["Productform"]["plan"] . '</p>
//							<p>Data Pack: ' . $this->request->data["Productform"]["datapack"] . '</p>
//							<p>SIM dispartch' . $this->request->data["Productform"]["isSimDispartch"] . '</p>
//							<p>SIM Serial: ' . $this->request->data["Productform"]["simSerial"] . '</p>
//									');
//                    // <p>TOO FORM: ' . $this->request->data["Productform"]["tooform"] . '</p>  
////                <p>Port Form: ' . $this->request->data["Productform"]["portform"] . '</p>
//                    // prepare rest of information (set)
////                print_r($this->request->data["Productform"]["serviceType"]);
//                    $this->Job->set('client_name', 'mel');
//                    $this->Job->set('organisation_id', '1');
//                    $this->Job->set('type', 'Phone procument');
////                $this->Job->set('created', date('Y-m-d H:i:s'));
//                    $this->Job->set('priority', '');
//                    $this->Job->set('user_name', $this->Session->read('Auth.User.username'));
//
//
//                    // store into model
//                    $this->Job->save();
//                    // Prompt a message to the user as it job has been submitted.
//                    $this->Session->setFlash('Your request has been lodged.', 'default', array(), 'good');
//                    print_r('hello');
//                    // Redirect back to Job page
////                    $this->redirect(array('action' => 'cart'));
//              
//                    print_r('bye');
//
//                } else {
//
//                    // Failed Validation
//                    // Prompt a message to the user to correct the issues.
//                    $this->Session->setFlash('Please check the form before submitting.');
//                }
//            } else {
//                $this->Session->setFlash('product is not add');
//            }
//            //Data Validations
//        }

       
    }

//////////////////////////////////////////////////

    public function itemupdate() {
        if ($this->request->is('ajax')) {
            $this->Cart->add($this->request->data['id'], $this->request->data['quantity']);
        }
        $cart = $this->Session->read('Shop');
        echo json_encode($cart);
        $this->autoRender = false;
    }

//////////////////////////////////////////////////

    public function update() {
        $this->Cart->update($this->request->data['Product']['id'], 1);
    }

//////////////////////////////////////////////////

    public function remove($id = null) {
        $product = $this->Cart->remove($id);
        if (!empty($product)) {
            $this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error',array(),'good');
        }
        $this->redirect(array('action' => 'cart'));
    }

//////////////////////////////////////////////////

    public function cartupdate() {
        if ($this->request->is('post')) {
            foreach ($this->request->data['Product'] as $key => $value) {
                $p = explode('-', $key);
                $this->Cart->add($p[1], $value);
            }
            $this->Session->setFlash('Shoping Cart is updated.', 'flash_success', array(),'good');
        }
        $this->redirect(array('action' => 'cart'));
    }

//////////////////////////////////////////////////

    public function cart($id=null, $brand=null) {
        
        //  print_r($this->request->data); //DEBUG ONLY
        $this->Product->brand = $brand;
        if ($this->request->is('post')) {
//            $this->Productform->create();
            $id = $this->request->data['Plan']['id'];
            $product = $this->Cart->add($id, 1);
            if (!empty($product)) {
                $this->Session->setFlash($product['Product']['model'] . ' was added to your shopping cart.', 'flash_error',array(),'good');
                if ($this->Productform->saveAll($this->request->data, array('validate' => 'only'))) {
//                print_r($this->request->data);
                    // process data
                    // create metadata
                    $this->Job->create();
                    $this->Job->set('metadata', '<h3>Product Details</h3>
					                <p>Quantity of Handset: ' . $this->request->data["Productform"]["handset"] . '</p>
						        <p>Connection: ' . $this->request->data["Productform"]["serviceType"] . '</p>
                                                        <p>Changes: ' . $this->request->data["Productform"]["existService"] . '</p>                                                        
							<p>Plan: ' . $this->request->data["Productform"]["plan"] . '</p>
							<p>Data Pack: ' . $this->request->data["Productform"]["datapack"] . '</p>
							<p>SIM dispartch' . $this->request->data["Productform"]["isSimDispartch"] . '</p>
							<p>SIM Serial: ' . $this->request->data["Productform"]["simSerial"] . '</p>
									');
                    // <p>TOO FORM: ' . $this->request->data["Productform"]["tooform"] . '</p>  
//                <p>Port Form: ' . $this->request->data["Productform"]["portform"] . '</p>
                    // prepare rest of information (set)
//                print_r($this->request->data["Productform"]["serviceType"]);
                    $this->Job->set('client_name', 'mel');
                    $this->Job->set('organisation_id', '1');
                    $this->Job->set('type', 'Phone procument');
//                $this->Job->set('created', date('Y-m-d H:i:s'));
                    $this->Job->set('priority', '');
                    $this->Job->set('user_name', $this->Session->read('Auth.User.username'));
					// NOTE: JOB SAVING DISABLED HERE

                    // store into model
                    //$this->Job->save();
                    // Prompt a message to the user as it job has been submitted.
                    //$this->Session->setFlash('Your request has been lodged.', 'default', array(), 'good');
                   // print_r('hello');
                    // Redirect back to Job page
//                    $this->redirect(array('action' => 'cart'));
              
                  //  print_r('bye');

                } else {

                    // Failed Validation
                    // Prompt a message to the user to correct the issues.
                    $this->Session->setFlash('Please check the form before submitting.');
                }
            } else {
                $this->Session->setFlash('product is not add');
            }
            //Data Validations
        }
        
        $shop = $this->Session->read('Shop');
        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////

    public function googlecheckout() {
        $this->helpers[] = 'Google';
        $shop = $this->Session->read('Shop');
        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////

    public function address() {

        $shop = $this->Session->read('Shop');
        if (!$shop['Order']['total']) {
            $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $this->loadModel('Order');
            $this->Order->set($this->request->data);
            if ($this->Order->validates()) {
                $order = $this->request->data['Order'];
                $order['order_type'] = 'creditcard';
                $this->Session->write('Shop.Order', $order + $shop['Order']);
                $this->redirect(array('action' => 'review'));
            } else {
                $this->Session->setFlash('The form could not be saved. Please, try again.', 'flash_error',array(),'bad');
            }
        }
        if (!empty($shop['Order'])) {
            $this->request->data['Order'] = $shop['Order'];
        }
    }

//////////////////////////////////////////////////

    public function step1() {
        $paymentAmount = $this->Session->read('Shop.Order.total');
        if (!$paymentAmount) {
            $this->redirect('/');
        }
        $this->Session->write('Shop.Order.order_type', 'paypal');
        $this->Paypal->step1($paymentAmount);
    }

//////////////////////////////////////////////////

    public function step2() {

        $token = $this->request->query['token'];
        $paypal = $this->Paypal->GetShippingDetails($token);

        $ack = strtoupper($paypal["ACK"]);
        if ($ack == "SUCCESS" || $ack == "SUCESSWITHWARNING") {
            $this->Session->write('Shop.Paypal.Details', $paypal);
            $this->redirect(array('action' => 'review'));
        } else {
            $ErrorCode = urldecode($paypal["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($paypal["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($paypal["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($paypal["L_SEVERITYCODE0"]);
            echo "GetExpressCheckoutDetails API call failed. ";
            echo "Detailed Error Message: " . $ErrorLongMsg;
            echo "Short Error Message: " . $ErrorShortMsg;
            echo "Error Code: " . $ErrorCode;
            echo "Error Severity Code: " . $ErrorSeverityCode;
            die();
        }
    }

//////////////////////////////////////////////////

    public function review() {

        $shop = $this->Session->read('Shop');

        if (empty($shop)) {
            $this->redirect('/');
        }

        if ($this->request->is('post')) {

            $this->loadModel('Order');

            $this->Order->set($this->request->data);
            if ($this->Order->validates()) {
                $order = $shop;
                $order['Order']['status'] = 1;

//                if ($shop['Order']['order_type'] == 'paypal') {
//                    $paypal = $this->Paypal->ConfirmPayment($order['Order']['total']);
//                    //debug($resArray);
//                    $ack = strtoupper($paypal['ACK']);
//                    if ($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING') {
//                        $order['Order']['status'] = 2;
//                    }
//                    $order['Order']['authorization'] = $paypal['ACK'];
//                    //$order['Order']['transaction'] = $paypal['PAYMENTINFO_0_TRANSACTIONID'];
//                }
//
//                if ((Configure::read('Settings.AUTHORIZENET_ENABLED') == 1) && $shop['Order']['order_type'] == 'creditcard') {
//                    $payment = array(
//                        'creditcard_number' => $this->request->data['Order']['creditcard_number'],
//                        'creditcard_month' => $this->request->data['Order']['creditcard_month'],
//                        'creditcard_year' => $this->request->data['Order']['creditcard_year'],
//                        'creditcard_code' => $this->request->data['Order']['creditcard_code'],
//                    );
//                    try {
//                        $authorizeNet = $this->AuthorizeNet->charge($shop['Order'], $payment);
//                    } catch (Exception $e) {
//                        $this->Session->setFlash($e->getMessage());
//                        $this->redirect(array('action' => 'review'));
//                    }
//                    $order['Order']['authorization'] = $authorizeNet[4];
//                    $order['Order']['transaction'] = $authorizeNet[6];
//                }

                $save = $this->Order->saveAll($order, array('validate' => 'first'));
                // NOTE: INPUT NEW JOB REQUEST HERE
                if ($save) {

                    $this->set(compact('shop'));

//                    App::uses('CakeEmail', 'Network/Email');
//                    $email = new CakeEmail();
//                    $email->from(Configure::read('Settings.ADMIN_EMAIL'))
//                            ->cc(Configure::read('Settings.ADMIN_EMAIL'))
//                            ->to($shop['Order']['email'])
//                            ->subject('Shop Order')
//                            ->template('order')
//                            ->emailFormat('text')
//                            ->viewVars(array('shop' => $shop))
//                            ->send();
                    $this->redirect(array('action' => 'success'));
                } else {
                    $errors = $this->Order->invalidFields();
                    $this->set(compact('errors'));
                }
            }
        }

        if (($shop['Order']['order_type'] == 'paypal') && !empty($shop['Paypal']['Details'])) {
            $shop['Order']['first_name'] = $shop['Paypal']['Details']['FIRSTNAME'];
            $shop['Order']['last_name'] = $shop['Paypal']['Details']['LASTNAME'];
            $shop['Order']['email'] = $shop['Paypal']['Details']['EMAIL'];
            $shop['Order']['phone'] = '888-888-8888';
            $shop['Order']['billing_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
            $shop['Order']['billing_address2'] = '';
            $shop['Order']['billing_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
            $shop['Order']['billing_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
            $shop['Order']['billing_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
            $shop['Order']['billing_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

            $shop['Order']['shipping_address'] = $shop['Paypal']['Details']['SHIPTOSTREET'];
            $shop['Order']['shipping_address2'] = '';
            $shop['Order']['shipping_city'] = $shop['Paypal']['Details']['SHIPTOCITY'];
            $shop['Order']['shipping_zip'] = $shop['Paypal']['Details']['SHIPTOZIP'];
            $shop['Order']['shipping_state'] = $shop['Paypal']['Details']['SHIPTOSTATE'];
            $shop['Order']['shipping_country'] = $shop['Paypal']['Details']['SHIPTOCOUNTRYNAME'];

            $shop['Order']['order_type'] = 'paypal';

            $this->Session->write('Shop.Order', $shop['Order']);
        }

        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////

    public function success() {
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        if (empty($shop)) {
            $this->redirect('/');
        }
        $this->set(compact('shop'));
    }

//////////////////////////////////////////////////
}
