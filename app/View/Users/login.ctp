
<h2><?php echo __('Login Page');?></h2>
<div class="users form">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	    <?php
        	echo $this->Form->input('username');
	        echo $this->Form->input('password');
	    ?>
	    </fieldset>
	<?php echo $this->Form->end(__('Login')); ?>
</div>

<p class="description">"Striving to exceed our customers' expectations"<br />
   Success is hard fought,requiring vision,planning and dedicated hard working staff.Solve Communications has a 
   proud history dating back to 1984.Our willingness to embrace the latest technologies,and provide reliable 
   solutions has earned the respect of many of Australia's largest companies.
</p>
<p class="description">In today's dynamic business environment-finding time to shop for mobile phones is impossible!</p>
<p class="description">At Solve, you don't need to worry- our team of corporate specialists are dedicated to finding the best mobile
   communication solutions for your business needs - we'll even come to you.</p>



