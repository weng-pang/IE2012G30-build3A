<h3>Products view</h3>
<table>


    <text>Welcome,<?php echo $this->Session->read('Auth.User.username'); ?></text></br>
    <a href="/ie-gui/products/logout">LOGOUT</a></br>
    <a href="/ie-gui/jobs/staffjobindex">jobs</a></br>
    <a href="/ie-gui/products/add">Add Products</a></br>
</table>


<?php
	$goBrand = array('controller' => '/products/','action' => 'mantainance');
	echo $this->Form->button('Back to brand selection',array('onclick' => "location.href='".$this->Html->url($goBrand)."'"));
?> 
<table>
    <tr>
  
    <td>Thumbnall</td>
    <td>Model</td>
    <td>Base Price</td>
    <td>Avaliable</td>
    <td>Options</td>

 </tr>  
<?php
//print_r($Selects);
foreach ($Selects as $select) {
    //print_r($select);
    ?>
    <tr>
        <td><?php echo $this->Html->image('files/' . $select['Product']['image']); ?></td>
        <td><?php echo $select['Product']['model'] ?></td>
        <td><?php echo $select['Product']['basePrice'] ?></td>
        <td><?php if ($select['Product']['model'] == 0) {
        ?> 
                Available    
            <?php } else {
                ?>
                Not Available
                <?php }
            ?></td>
        <td><?php echo $this->Html->link('Edit', array('action' => 'edit', $select['Product']['id'])); ?></br>
        <?php echo $this->Html->link('Delete', array('action' => 'delete', $select['Product']['id'])); ?></td>
        

    </tr>    

    <?php
}
?>

</table>    