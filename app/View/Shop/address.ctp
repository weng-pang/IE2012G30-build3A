<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php echo $this->Html->script(array('shop_address.js'), array('inline' => false)); ?>
<script>
$(document).ready(function(){

	$('#sameaddress').click(function(){
            //alert("teste");
		if($('#sameaddress').attr('checked')) {
			$('#OrderShippingAddress').val($('#OrderBillingAddress').val());
			$('#OrderShippingAddress2').val($('#OrderBillingAddress2').val());
			$('#OrderShippingCity').val($('#OrderBillingCity').val());
			$('#OrderShippingState').val($('#OrderBillingState').val());
			$('#OrderShippingZip').val($('#OrderBillingZip').val());
			$('#OrderShippingCountry').val($('#OrderBillingCountry').val());
		} else {
			$("#OrderShippingAddress").val('');
			$('#OrderShippingAddress2').val('');
			$('#OrderShippingCity').val('');
			$('#OrderShippingState').val('');
			$('#OrderShippingZip').val('');
			$('#OrderShippingCountry').val('');
		}
	});

});
</script>

<h2>Customer Information</h2>
<?php 
	// Display Results
	echo $this->Session->flash('bad');
	echo $this->Session->flash('good');

?>
<p>Please enter the content below:</p>
<?php echo $this->Form->create('Order'); ?>

<hr>

<div class="row">
<div class="span4">

<?php echo $this->Form->input('first_name'); ?>

<?php echo $this->Form->input('last_name'); ?>

<?php echo $this->Form->input('email'); ?>

<?php echo $this->Form->input('phone'); ?>

<br />

</div>
<div class="span4">

<?php echo $this->Form->input('billing_address'); ?>

<?php echo $this->Form->input('billing_address2'); ?>

<?php echo $this->Form->input('billing_city'); ?>

<?php echo $this->Form->input('billing_state'); ?>

<?php echo $this->Form->input('billing_zip'); ?>

<?php echo $this->Form->input('billing_country'); ?>

<br />

<?php echo $this->Form->input('sameaddress', array('type' => 'checkbox', 'label' => 'Copy Billing Address to Shipping','div' => array('id' => 'sameaddress'))); ?>

</div>
<div class="span4">

<?php echo $this->Form->input('shipping_address'); ?>

<?php echo $this->Form->input('shipping_address2'); ?>

<?php echo $this->Form->input('shipping_city'); ?>

<?php echo $this->Form->input('shipping_state'); ?>

<?php echo $this->Form->input('shipping_zip'); ?>

<?php echo $this->Form->input('shipping_country'); ?>

<br />

</div>
</div>

<br />

<?php //echo $this->Form->button('<i class="icon-arrow-right icon-white"></i> Continue', array('class' => 'btn btn-primary', 'escape' => false));?>
<?php echo $this->Form->end('Submit'); ?>

