<h3>Products</h3>
<table>
    
<td>test side</td>
<text>Welcome,<?php echo $this->Session->read('Auth.User.username');  ?></text></br>
<a href="/ie-gui/products/logout">LOGOUT</a></br>
<a href="/ie-gui/jobs/staffjobindex">jobs</a></br>
<a href="/ie-gui/images/add">image</a></br>

<!--<script>
    $(document).ready(function ()
    {  
        if(categoryid==2){
        $("#categoryid").click(function(){
            $("#accessoryType").hide();
        });
        }
    });

</script>    -->
</table>
<?php echo $this->Form->create('Product',array('enctype'=>'multipart/form-data'));?>
    <fieldset>
        <?php
           
           echo $this->Form->file('image');
           echo $this->Form->input('brand');
           echo $this->Form->input('model');
           echo $this->Form->input('Accessory.supplierCode');
           echo $this->Form->input('basePrice');
           echo $this->Form->input('availibility');
           echo $this->Form->input('subsidised');
           echo $this->Form->input('visability');
           echo $this->Form->input('description');
           echo $this->Form->input('category_id',array('options'=>array('1'=>'Phone','2'=>'Accessory',
               '3'=>'Connection')));
           echo $this->Form->input('Accessory.accessory_type_id',array('options'=>array('0'=>'None','1'=>'Battery',
               '2'=>'Charger','3'=>'Data','4'=>'Bluetooth','5'=>'Car Kits','6'=>'Personal Hands Free',
               '7'=>'Enhancement','8'=>'Carry Cases')));
        
        ?>
   </fieldset>
<?php echo $this->Form->end(_('Submit')); ?>


