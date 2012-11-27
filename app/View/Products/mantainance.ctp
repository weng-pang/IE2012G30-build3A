<h3>Products view</h3>
<table>

    <td>test side</td>
    <text>Welcome,<?php echo $this->Session->read('Auth.User.username'); ?></text></br>
    <a href="/ie-gui/products/logout">LOGOUT</a></br>
    <a href="/ie-gui/jobs/staffjobindex">jobs</a></br>
    <a href="/ie-gui/products/add">Add Products</a></br>
    <a href="/ie-gui/products/mantainance">Products Mantainance</a></br>
</table>



<table>
    
<?php
  foreach($Brands as $brand){
    ?>
        <tr>
            <td><?php echo $brand['products']['brand'] ?></td>
            <td><?php echo $this->Html->link('Select', array('action' => 'select', $brand['products']['brand'])); ?></td>
            <td><?php echo $this->Html->link('Edit', array('action' => 'editBrand', $brand['products']['brand'])); ?></td>
            <td><?php echo $this->Html->link('Delect', array('action' => 'deleteBrand', $brand['products']['brand'])); ?></td>
        </tr>  

          
       

    <?php
  }
?>        

</table>   


