<?php $this->extend('../Common/sidebar'); ?>
<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<?php echo $this->Html->script(array('shop_review.js'), array('inline' => false)); ?>

<style type="text/css">
	#ccbox {
		background: transparent url("/img/cards.png");
		margin: 0 0 10px 0;
		padding: 0 0 0 150px;
		width: 0;
		height: 23px;
		overflow: hidden;
	}
</style>

<h2>Review</h2>
<p>Please Check the Information before Submitting</p>
<hr>

<div class="row">
<div class="span4">

First Name: <?php echo $shop['Order']['first_name'];?><br />
Last Name: <?php echo $shop['Order']['last_name'];?><br />
Email: <?php echo $shop['Order']['email'];?><br />
Phone: <?php echo $shop['Order']['phone'];?><br />

<br />

</div>
<div class="span4">

Billing Address: <?php echo $shop['Order']['billing_address'];?><br />
Billing Address 2: <?php echo $shop['Order']['billing_address2'];?><br />
Billing City: <?php echo $shop['Order']['billing_city'];?><br />
Billing State: <?php echo $shop['Order']['billing_state'];?><br />
Billing Zip: <?php echo $shop['Order']['billing_zip'];?><br />
Billing Country: <?php echo $shop['Order']['billing_country'];?><br />

<br />

</div>
<div class="span4">

Shipping Address: <?php echo $shop['Order']['shipping_address'];?><br />
Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
Shipping City: <?php echo $shop['Order']['shipping_city'];?><br />
Shipping State: <?php echo $shop['Order']['shipping_state'];?><br />
Shipping Zip: <?php echo $shop['Order']['shipping_zip'];?><br />
Shipping Country: <?php echo $shop['Order']['shipping_country'];?><br />

<br />

</div>
</div>

<hr>
<table>
<theader>
<tr>
<td>#</td>
<td>ITEM</td>
<td>PRICE</td>
<td style="text-align: right;">QUANTITY</td>
<td style="text-align: right;">SUBTOTAL</td>
</tr>
</theader>

<?php foreach ($shop['OrderItem'] as $item): ?>
<tr class="row">
<td class="span1"><?php echo $this->Html->image('files/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></td>
<td class="span6"><?php echo $item['Product']['model']; ?></td>
<!--<div class="span1"><?php // echo $item['Product']['weight']; ?></div>-->
<!--<div class="span1"><?php // echo $item['totalweight']; ?></div>-->
<td class="span1">$<?php echo $item['Product']['basePrice']; ?></td>
<td class="span1" style="text-align: right;"><?php echo $item['quantity']; ?></td>
<td class="span1" style="text-align: right;">$<?php echo $item['subtotal']; ?></td>
</tr>
<?php endforeach; ?>
</table>
<hr>

<div class="row">
	<div class="span10">Products: <?php echo $shop['Order']['order_item_count']; ?></div>
	<div class="span1" style="text-align: right;">Items: <?php echo $shop['Order']['quantity']; ?></div>
	<div class="span1" style="text-align: right;">Total<br /><strong>$<?php echo $shop['Order']['total']; ?></strong></div>
</div>

<hr>

<br />
<br />

<?php echo $this->Form->create('Order'); ?>

<?php // if($shop['Order']['order_type'] == 'creditcard'): ?>

<!--<div id="ccbox">
	Credit Card Type.
</div>-->

<?php // echo $this->Form->input('creditcard_number', array('class' => 'span2 ccinput', 'maxLength' => 16, 'autocomplete' => 'off')); ?>

<div>
	<div>
		<?php // echo $this->Form->input('creditcard_month', array(
//			'label' => 'Expiration Month',
//			'class' => 'span2',
//			'options' => array(
//				'01' => '01 - January',
//				'02' => '02 - February',
//				'03' => '03 - March',
//				'04' => '04 - April',
//				'05' => '05 - May',
//				'06' => '06 - June',
//				'07' => '07 - July',
//				'08' => '08 - August',
//				'09' => '09 - September',
//				'10' => '10 - October',
//				'11' => '11 - November',
//				'12' => '12 - December'
//			)
//		)); ?>
	</div>
	<div>
		<?php // echo $this->Form->input('creditcard_year', array(
//			'label' => 'Expiration Year',
//			'class' => 'span2',
//			'options' => array(
//				'13' => '2013',
//				'14' => '2014',
//				'15' => '2015',
//				'16' => '2016',
//				'17' => '2017',
//				'18' => '2018',
//				'19' => '2019',
//				'20' => '2020',
//				'21' => '2021',
//				'22' => '2022',
//			)
//		));?>
	</div>
</div>

<?php // echo $this->Form->input('creditcard_code', array('label' => 'Card Security Code', 'class' => 'span1', 'maxLength' => 4)); ?>

<br />

<?php // endif; ?>

<?php //echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

<?php echo $this->Form->end('Place Request'); ?>

<br />
<br />

