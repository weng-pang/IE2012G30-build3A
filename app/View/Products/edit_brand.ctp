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
	$goBrand = array('controller' => '/products/','action' => 'mantainance');
	echo $this->Form->button('Back to brand selection',array('onclick' => "location.href='".$this->Html->url($goBrand)."'"));
?> 
<?php
	echo "<h1>Edit Brand</h1>";
	echo $this->Form->create('Product');
	echo $this->Form->input('id', array('type'=>'hidden'));
        echo $this->Form->input('brand',array('type'=>'text','label' =>'Brand:'));
	
	echo $this->Form->end('Save');
?>