<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>
<div id="shop index">
<h1>Shopping Cart</h1>
<?php 
	// Display Results
	echo $this->Session->flash('bad');
	echo $this->Session->flash('good');

?>
<?php if(empty($shop['OrderItem'])) : ?>

	<p><?php echo __('Shopping Cart is empty');?></p>

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>

<hr>
<table>
<thead>
<tr>

	<td>#</td>
	<td>ITEM</td>
	<td>PRICE</td>
	<td>QUANTITY</td>
	<td>SUBTOTAL</td>
	<td></td>

</tr>
</thead>
<tbody>
<?php $tabindex = 1; 
	//var_dump($shop['OrderItem']); // DEBUG ONLY?>
<?php foreach ($shop['OrderItem'] as $item): ?>
	<tr class="row" id="row-<?php echo $item['Product']['id']; ?>">
		<td class="span1"><?php echo $this->Html->image('files/' . $item['Product']['image'], array('class' => 'px60')); ?></td>
		<td class="span7"><strong><?php echo $this->Html->link($item['Product']['model'], array('controller' => 'products', 'action' => 'view')); ?></strong></td>
		<td class="span1" id="price-<?php echo $item['Product']['id']; ?>"><?php echo $item['Product']['basePrice']; ?></td>
		<td class="span1"><?php echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Product']['id'], 'value' => $item['quantity'])); ?></td>
		<td class="span1" id="subtotal-<?php echo $item['Product']['id']; ?>"><?php echo $item['subtotal']; ?></td>
		<td class="span1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span><?php echo $this->Html->link('Remove',array('action'=>'remove'));?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
<hr>

<div class="row">
	<div class="span6 offset6 tr">
		<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?>
		&nbsp; &nbsp;
		<?php echo $this->Form->button('<i class="icon-refresh icon"></i> Recalculate', array('class' => 'btn', 'escape' => false));?>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<hr>

<div class="row">
	<div class="span3 offset9 tr">
		Subtotal: <span class="normal" id="subtotal">$<?php echo $shop['Order']['subtotal']; ?></span>
		<br />
		Sales Tax: <span class="normal">N/A</span>
		<br />
		Shipping: <span class="normal">N/A</span>
		<br />
		Order Total: <span class="red" id="total">$<?php echo $shop['Order']['total']; ?></span>
		<br />
		<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Proceed to Request', array('controller' => 'shop', 'action' => 'address'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
		<br />
		<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
		<!--<input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />-->
		<?php echo $this->Form->end(); ?>

		<?php // echo $this->Html->image('https://checkout.google.com/buttons/checkout.gif?w=180&h=46&style=white&variant=text&loc=en_US', array('url' => array('controller' => 'shop', 'action' => 'googlecheckout'))); ?>

	</div>
</div>
<?php endif; ?>
</div>