<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>
<?php
echo $this->html->script('addtocart.js');
?>
<div id="products index">
<h3>Products view</h3>
<?php
$urlEdit = array('controller' => '/products/', 'action' => 'index', $Product['Product']['id']);
echo $this->Form->button('Back', array('onclick' => "location.href='" . $this->Html->url($urlEdit) . "'"));
?> 
<?php
echo $this->html->script('jquery-1.8.2.js');
?>
<script>
    $(document).ready(function ()
    {    
        $("#newService").click(function(){
            $("#newServiceTable").show();
            $("#existServiceTable").hide();
            $("#upgradeWarning").hide();
            $("#tooWarning").hide();
            $("#tooForms").hide();
            $("#uploadTooForm").hide();
            $("#portWarning").hide();
            $("#portForms").hide();
            $("#uploadPortForm").hide();
            $("#dispartchSIM").hide();
            $("#simSerial").hide();
        });
        
        $("#existService").click(function(){
            $("#newServiceTable").hide();
            $("#existServiceTable").show();
            $("#upgradeWarning").hide();
            $("#tooWarning").hide();
            $("#tooForms").hide();
            $("#uploadTooForm").hide();
            $("#portWarning").hide();
            $("#portForms").hide();
            $("#uploadPortForm").hide();
            $("#dispartchSIM").hide();
            $("#simSerial").hide();
        });
        
        $("#selectData").click(function(){
            $("#selectDatapack").show();
            $("#upgradeWarning").hide();
            $("#tooWarning").hide();
            $("#simSerial").hide();
            //            $("#tooForms").hide();
            //            $("#uploadTooForm").hide();
        });
        
        $("#notSelectData").click(function(){
            $("#selectDatapack").hide();
            $("#upgradeWarning").hide();
            $("#tooWarning").hide();
            //             $("#simSerial").hide();
            
            //            $("#tooForms").hide();
            //            $("#uploadTooForm").hide();
            
        });
        $("#upgrade").click(function(){
            $("#upgradeWarning").show();
            $("#newServiceTable").show();
            $("#tooWarning").hide();
            $("#tooForms").hide();
            $("#uploadTooForm").hide();
            $("#portWarning").hide();
            $("#portForms").hide();
            $("#uploadPortForm").hide();
            $("#dispartchSIM").hide();
            $("#simSerial").hide();
        });
        
        $("#too").click(function(){
            $("#tooWarning").show();
            $("#tooForms").show();
            $("#newServiceTable").show();
            $("#uploadTooForm").show();
            $("#upgradeWarning").hide();
            $("#portWarning").hide();
            $("#portForms").hide();
            $("#uploadPortForm").hide();
            $("#dispartchSIM").hide();
            $("#simSerial").hide();
            
        });
        
        $("#port").click(function(){
            $("#portWarning").show();
            $("#portForms").show();
            $("#newServiceTable").show();
            $("#uploadPortForm").show();
            $("#dispartchSIM").show();
            $("#simSerial").hide();
            $("#upgradeWarning").hide();
            $("#portWarning").hide();
            $("#tooForms").hide();
            $("#uploadTooForm").hide();
            
        });
        
        $("#dispartchYes").click(function(){
            $("#simSerial").show();
        });
        
        $("#dispartchNo").click(function(){
            $("#simSerial").hide();
        });
        
    });


</script>
//<?php // print_r($Accessories);
//echo $this->Form->create('Productform', array('enctype' => 'multipart/form-data'));
//
//?>
<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cart'))); ?>

<table>
    <th><?php echo $Product['Product']['brand']; ?></th>
    <tr>
        <td><?php echo $Product['Product']['model']; ?></td>
    </tr></br>
    <tr>
        <td><?php echo $this->Html->image('files/' . $Product['Product']['image']); ?></td>
    </tr></br> 
    <td>$<?php echo $Product['Product']['basePrice'] ?> ex GST</td>
</tr></br>
<tr>
    <td> <?php echo $Product['Product']['description'] ?></td>
</tr></br>
<tr>
    <td><?php
echo $this->Form->input('Productform.handset', array(
    'options' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10')));
?></td>    
</tr></br>

</table>

<table width="300px">
    <tr>
        <td></td>
        <td>Model</td>
        <td>Price</td>
    </tr>    
    <?php
    
        foreach ($Accessories as $Accessory) {
            if ($Accessory['products']['brand'] == $Product['Product']['brand']) {
       ?>
    <tr>
        <td><?php echo $this->Form->text('accQty'); ?></td>
        <td><?php echo$Accessory['products']['model']; ?></td>
        <td>$<?php echo$Accessory['products']['basePrice']; ?> ex GST</td>
    </tr>    
    <?php    
        }
    }
    ?>
</table>
<table>    
    <tr>CONNECTION</tr>
</table>
<table border="1" width="30" >
    <tr>
        <th>Choose Options</th>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Productform.serviceType', array('type' => 'radio', 'options' => array('New Service' => 'New Service'), 'div' => array('id' => 'newService'))); ?></td>
    </tr> 
    <tr>
        <td><?php echo $this->Form->input('Productform.serviceType', array('type' => 'radio', 'options' => array('Exist Service' => 'Exist Service'), 'div' => array('id' => 'existService'))); ?></td>
    </tr>    
</table>    

<table id="existServiceTable" border="1" cellpadding="0" cellspacing="0" style="display:none;width:200px;">
    <tr>
        <th>Choose Options</th>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Productform.existService', array('type' => 'radio', 'options' => array('Upgrade' => 'Upgrade'), 'div' => array('id' => 'upgrade'))); ?></td>
    </tr>   
    <tr>
        <td><?php echo $this->Form->input('Productform.existService', array('type' => 'radio', 'options' => array('TOO' => 'TOO'), 'div' => array('id' => 'too'))); ?></td>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('Productform.existService', array('type' => 'radio', 'options' => array('Port' => 'Port'), 'div' => array('id' => 'port'))); ?></td>
    </tr>    

</table>    

<table id="upgradeWarning" cellpadding="0" cellspacing="0" style="display:none;width:780px;">
    <tr><td color="red">WARNING MESSAGE</td>
    </tr>    
    <tr>
        <td>Please be aware if the service is currently under contract and you wish to cancel or lower the spend
            level during the minimum contract term as Early Termination Charges(ETC) will apply.</td>
    </tr>    
</table>

<table id="tooWarning" cellpadding="0" cellspacing="0" style="display:none;width:780px;">
    <tr><td>WARNING MESSAGE</td>
    </tr>    
    <tr>
        <td>Please be aware if the service is currently under contract and you wish to cancel or lower the spend
            level during the minimum contract term as Early Termination Charges(ETC) will apply.This request
            will not be processed unless the completed forms and relavent details supplied prior to completion of this
            online request.Please note if this is a prepaid service we will require 100 points of ID and it may take
            5 to 10 business days to process.</td>
    </tr>    
</table>


<table id="portWarning" cellpadding="0" cellspacing="0" style="display:none;width:780px;">
    <tr><td>WARNING MESSAGE</td>
    </tr>    
    <tr>
        <td>Please be aware if the service is currently under contract and you wish to cancel or lower the spend
            level during the minimum contract term as Early Termination Charges(ETC) will apply.This request
            will not be processed unless the completed forms and relavent details supplied prior to completion of this
            online request.</td>
    </tr>    
</table>

<table id="tooForms" border="1" cellpadding="0" cellspacing="0" style="display:none;width:300px;">

    <tbody>
        <tr><td>TOO FORMS</td></tr>
        <tr>
            <td>Business to business</td>
            <td><?php
    $fileName = 'B2Bform.pdf';
    echo $this->Html->link('Click here to download', array('action' => 'download', $fileName));
    ?></td>
        </tr>   
        <tr>
            <td>Consumer to business</td>
            <td><?php echo $this->Html->link('Click here to download', '') ?></td>
        </tr>   
    </tbody>    
</table>  

<table id="portForms" border="1" cellpadding="0" cellspacing="0" style="display:none;width:300px;">
    <tbody>
        <tr><td>Port FORM</td><tr>
        <tr>
            <td>PORTING FORM</td>
            <td><?php echo $this->Html->link('Click here to download', '') ?></td>
        </tr>   

    </tbody>    
</table>
<div>
<?php
//$this->start('form');
// echo $this->From->create('Job',array('enctype'=>'multipart/form-data'));
?>
    <table id="newServiceTable" border="1" cellpadding="0" cellspacing="0" style="display:none;width:750px;">
        <tr>
            <td>Choose</td>
            <td>Plan</td>
            <td>Upfront Cost</td>
            <td>Plan Duration</td>
            <td>Monthly Cost</td>
            <td>Minimum Total Cost</td>
            <td>Included Calls</td>
            <td>Included Email</td>
            <td>Included Data</td>
            <td>Quantity</td>

        </tr>
<?php
foreach ($plans as $plan) {
    //print_r($plan);
    ?>
            <tr>
                <td><?php echo $this->Form->input('Productform.plan', array('type' => 'radio', 'options' => array($plan['plans']['name'] => $plan['plans']['name']), 'label' => '', 'legend' => false)); ?></td>
                <?php
//              print_r($options);
                // foreach($options as $option){
//                echo $this->Form->radio('',$options);          
//            }
                ?>
                <td><?php echo $plan['plans']['up_front_cost']; ?></td>
                <td><?php echo $plan['plans']['duration']; ?></td>
                <td><?php echo $plan['plans']['monthly_cost']; ?></td>
                <td><?php echo $plan['plans']['min_total_cost']; ?></td>
                <td><?php echo $plan['plans']['included_calls']; ?></td>
                <td><?php echo $plan['plans']['included_sms']; ?></td>
                <td><?php echo $plan['plans']['inlcuded_email']; ?></td>
                <td><?php echo $plan['plans']['included_data']; ?></td>
                <td><?php echo $this->Form->text('quantity'); ?></td>

            </tr>
<?php } ?>       

    </table>
</div> 



<table border="1">
    <tr>
        <th>Choose Options</th>
    </tr>
    <tr>
        <td><?php echo $this->Form->input('needDatapack', array('type' => 'radio', 'options' => 'I would like to purchase a data package', 'div' => array('id' => 'selectData'))); ?></td>
    </tr> 
    <tr>
        <td><?php echo $this->Form->input('noDatapack', array('type' => 'radio', 'options' => 'I do not require a data package', 'div' => array('id' => 'notSelectData'))); ?></td>
    </tr>    
</table>

<table border="1" id="selectDatapack" border="1" cellpadding="0" cellspacing="0" style="display:none;width:580px;">
    <tr>
        <td width:25px>Choose</td>
        <td>Monthly Cost</td>
        <td>Included Data</td>
        <td>Excess Data</td>

    </tr>
<?php
//    print_r($packages);
foreach ($packages as $package) {
    ?>

        <tr>
            <td width="25px"><?php echo $this->Form->input('Productform.datapack', array('type' => 'radio', 'options' => array($package['plans']['name'] => $package['plans']['name']), 'label' => '', 'legend' => false)); ?></td>
            <td>$<?php echo $package['plans']['monthly_cost']; ?></td>
            <td><?php echo $package['plans']['included_data']; ?>GB</td>
            <td><?php echo $package['plans']['excess_data']; ?>GB</td>
        </tr>
    <?php
}
?>

</table> 
<table id="uploadTooForm" border="1" cellpadding="0" cellspacing="0" style="display:none;width:300px;">
    <tr><td>UPLOAD TOO FORM</td></tr>
    <tr>
        <td><?php echo $this->Form->file('Productform.tooform'); ?><td>
    <tr>    

</table>   

<table id="uploadPortForm" border="1" cellpadding="0" cellspacing="0" style="display:none;width:300px;">
    <tr><td>UPLOAD PART FORM</td></tr>
    <tr>
        <td><?php echo $this->Form->file('Productform.portform'); ?><td>
    <tr>    

</table> 

<table id="dispartchSIM" border="1" cellpadding="0" cellspacing="0" style="display:none;width:300px;">

    <tbody>
        <tr><th>Has the user been provided with a blank sim</th></tr>
        <tr>
            <td><?php echo $this->Form->input('Productform.isSimDispartch', array('type' => 'radio', 'options' => array('Yes' => 'Yes'), 'div' => array('id' => 'dispartchYes'))); ?></td>

        <tr>   
        <tr>
            <td><?php echo $this->Form->input('Productform.isSimDispartch', array('type' => 'radio', 'options' => array('No' => 'No'), 'div' => array('id' => 'dispartchNo'))); ?></td>

        <tr>       
    </tbody>    
</table> 

<table id="simSerial" border="1" cellpadding="0" cellspacing="0" style="display:none;width:350px;">
    <tr>
        <td>Sim Serial</td>
        <td><?php echo $this->Form->text('Productform.simSerial'); ?></td>
    </tr>    

</table>

<table>
    <tr>
        <td>
<?php echo $this->Form->input('Productform.accept', array('type' => 'checkbox', 'label' => 'I have read and accept the Terms and Conditions')) ?></td>
<?php echo $this->Html->link('Click here to download the Terms and Conditions', ''); ?> 
    </tr>
</table>  
<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $Product['Product']['id'])); ?>
<?php echo $this->Form->input('brand', array('type' => 'hidden', 'value' => $Product['Product']['brand'])); ?>
<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => $Product['Product']['id'],'escape' => false));?>
<?php
//  
//  echo $this->Form->button('Add to cart');
echo $this->Form->end();
?>
</div>
