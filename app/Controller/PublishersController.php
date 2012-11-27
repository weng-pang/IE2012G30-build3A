<?php
/**
 * @property Publisher $Publisher
 */
    class PublishersController extends AppController
    {
        public $name = "Publishers";
        public $helpers = array("Html", "Form");

        public function index()
        {
            $this->set("publishers", $this->Publisher->find("all", array('order' => 'company_name ASC')));
        }

        public function view($id = null)
        {
            $this->Publisher->id = $id;
            $this->set('publisher', $this->Publisher->read());
        }

        /*function edit($id = null)
        {
            $this->Publisher->id = $id;
            if ($this->request->is('get'))
            {
                $this->request->data = $this->Publisher->read();
            }
            else
            {
                if ($this->Publisher->save($this->request->data))
                {
                    $this->Session->setFlash('Publisher has been updated.');
                    $this->redirect(array('action' => 'index'));
                }
                else
                {
                    $this->Session->setFlash('Unable to update Publisher.');
                }
            }
        }*/

        function edit($id = null)
			{
            $this->Publisher->id = $id;
            //$this->set('publishers', $this->Title->Publisher->find('list', array('order'=>'company_name ASC')));

            if (empty($this->data))
            {
                //$this->render();
                //$this->data = $this->Title->read();
                $this->data = $this->Publisher->findById($id);
            }
            else
            {
                if ($this->Publisher->save($this->data))
                {
                    $this->Session->setFlash('Publisher Updated Successfully');
                    $this->redirect(array('action' => 'index'));
                }
            }
			}

        /*function delete($id)
        {
            if ($this->request->is('get'))
            {
                throw new MethodNotAllowedException();
            }
            if ($this->Post->delete($id))
            {
                $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
                $this->redirect(array('action' => 'index'));
            }
        }*/

        function delete($id, $companyName)
        {
            $this->Publisher->id = $id;
            $this->Publisher->company_name = $companyName;
            $this->Session->setFlash('Company '.$companyName.' has been deleted.');
            $this->Publisher->delete($id);
	    		$this->redirect(array('action'=>'index'));
			}
    }

 ?>
