
<div id="main">
	<?php echo $this->fetch('content'); ?>
</div>

<div id="sidebar">
	<p>Welcome, <?php echo $this -> Session -> read('Auth.User.username');?></p>
	<?php if($isStaff){
				echo __('<p>Staff Member:'. $userInfo['access_level'].'</p>');
	}?>
	<h2>Tasks</h2>
	<!--<p>Jobs</p>-->

	<p><?php  if ($isStaff) {echo $this -> Html ->link('Client Maintenance', array('controller'=>'organisations','action'=>'index')); }?></p>
    
    <p><?php echo $this -> Html ->link('View Catalogue', array('controller'=>'products','action'=>'index'));?></p>
    
    <p><?php echo $this -> Html ->link('Job Maintenance', array('controller'=>'jobs','action'=>'index')); ?></p>
    
    <p><?php echo $this -> Html ->link('New Job', array('controller'=>'Newjobs','action'=>'index'));?></p>

	<p><?php
		if ($isStaff){ 
		echo $this -> Html ->link('Freight Charge', array('controller'=>'freights','action'=>'index'));}
	?></p>

	<p><?php
		
		if($userInfo['access_level'] == 'Administrator'){
			echo $this-> Html->link('Staff Maintenance', array('controller'=>'staffs','action'=>'index'));
		}
	
	?></p>
	
	<p><?php echo $this -> Html ->link('Logout', array('controller'=>'users','action'=>'logout'));?></p>

	<!--<p>System Administration</p>-->

	
	<h2>Job Status</h2>
</div>