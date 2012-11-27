
<?php
	if(empty($this->data['Title']['title']))
	{
		echo "<h1>Add Title</h1>";
	}
	else
	{
		echo "<h1>Edit Title</h1>";
	}
	//echo "this data is " .print_r($this->data['Title']['ISBN'])."<br />";
	echo $this->Form->create('Title');
	echo $this->Form->input('Title.ISBN', array('type' => 'text','label' => 'ISBN:'));
	echo $this->Form->input('title', array('label' => 'Title:', 'size'=>'60'));
	echo $this->Form->input('Title.ISBN', array('type' => 'text','label' => 'ISBN:'));
	echo $this->Form->input('year_published',array('label' => 'Year Published:'));
	echo $this->Form->input('description', array('rows' => '3','label' => 'Description:'));
	echo $this->Form->input('topic', array('label' => 'Topic:'));
	echo $this->Form->input('comments', array('rows' => '3','label' => 'Comments:'));
	echo $this->Form->input('cost_price', array('label' => 'Cost Price:'));
	echo $this->Form->input('retail_price', array('label' => 'Retail Price:'));
	echo $this->Form->input('no_in_stock', array('label' => 'In Stock:'));
	echo $this->Form->input('PubID',array ('type'=>'select','options'=>$publishers, 'label'=>'Publisher'));
	echo $this->Form->end('Save Changes');
?>