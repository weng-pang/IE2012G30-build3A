<h3>Products view</h3>
<table>
    
<td>test side</td>
<text>Welcome,<?php echo $this->Session->read('Auth.User.username');  ?></text></br>
<a href="/ie-gui/products/logout">LOGOUT</a></br>
<a href="/ie-gui/jobs/staffjobindex">jobs</a></br>
<a href="/ie-gui/products/add">Add Products</a></br>
<a href="/ie-gui/products/mantainance">Products Mantainance</a></br>
</table>
<?php
	$goBack = array('controller' => '/products/','action' => 'select');
	echo $this->Form->button('Back to brand selection',array('onclick' => "location.href='".$this->Html->url($goBack)."'"));
?> 
<?php
	echo "<h1>Edit Product</h1>";
	echo $this->Form->create('Product');
	echo $this->Form->input('id', array('type'=>'hidden'));
	echo $this->Form->file('image',array('type'=>'text','label' =>'Image:'));
	echo $this->Form->input('brand',array('type'=>'text','label' =>'Brand:'));
	echo $this->Form->input('model',array('type'=>'text','label' =>'Model:'));
	echo $this->Form->input('basePrice', array('type'=>'text','label' =>'Base Price:'));
	echo $this->Form->input('availibility');
	echo $this->Form->input('subsidised');
	echo $this->Form->input('visability');
	echo $this->Form->input('description', array('type'=>'text','label' =>'Description'));
	echo $this->Form->input('category_id',array('options'=>array('1'=>'Phone','2'=>'Accessory',
               '3'=>'Connection')));
	echo $this->Form->end('Save');
?>


    