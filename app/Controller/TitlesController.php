<?php
/**
 * @property Publisher $Publisher
 */
    class TitlesController extends AppController
    {
        public $name = "Titles";
        public $helpers = array("Html", "Form", "Format");

        public function index()
        {
            $this->set("titles", $this->Title->find("all", array('order' => 'title ASC')));
        }

        public function view($id = null)
        {
            $this->Title->id = $id;
            $this->set('title', $this->Title->read());
        }


        function edit($ISBN = null)
			{
            $this->Title->id = $ISBN;
				$this->set('publishers', $this->Title->Publisher->find('list', array('order'=>'company_name ASC')));

            if (empty($this->data))
            {
                $this->data = $this->Title->findByIsbn($ISBN);
            }
            else
            {
                if ($this->Title->save($this->data))
                {
                    $this->Session->setFlash('Title Updated Successfully');
                    $this->redirect(array('action' => 'index'));
                }
            }
			}

        function delete($ISBN, $Title)
        {
            $this->Title->ISBN = $ISBN;
            $this->Title->title = $title;
            $this->Session->setFlash('Title '.$Title.' has been deleted.');
            $this->Title->delete($id);
	    		$this->redirect(array('action'=>'index'));
			}
    }

 ?>