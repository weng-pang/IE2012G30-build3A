<?php echo $this->Html->script('jtable.js',false);?>
<div class="jobs index">
<?php $this->extend('../Common/sidebar'); ?>

<h2><?php echo __('Jobs'); ?></h2>
<?php 
	//var_dump($loggedIn);
	//var_dump($userInfo);
	//var_dump($access_level);
	
 
?>
<table id="data" style="font-size:12px;">
    <thead>
	<tr>
        <th>Job ID</th>
        <th>Priority</th>        
		<th>Client</th>
		<th>User</th>
		<th>Type</th>  
		<th>Status</th>
		<th>Created Date</th>
        <th>Due Date</th>
        <th>Staff</th>
	</tr>
    </thead>
    <tbody>
	<?php
		 //var_dump($jobs); // Debug Only
		 //var_dump($staffs);
		 //var_dump($allocations);
		 // flip over allocation table - for latest records
		if(!empty($allocations)){
			$allocations = array_reverse($allocations);
		}
		foreach ($jobs as $job){
		// find the staff information
		// look for allocation table
		$allocationExist = false;
		$currentRecord = 0;
		foreach ($allocations as $allocation){
			// check against each allocation record
			$allocationExist = array_search($job['Job']['id'],$allocation['JobAllocation']);
			if ($allocationExist){
				break; // get out early if allocation does exist
			}
			// Set out for next try
			$currentRecord++;
		}
		
		if ($allocationExist){
		// if job ID exist - look for staff id and fetch the staff content
			$staff = $allocations[$currentRecord]['Staff']['name'];
		} else {
		// if not exist - show NO STAFF
			$staff = 'NO STAFF';
		}
		?>
		<tr>
			<td><?php echo $this->Html->link(($job['Job']['id']),array('action'=>'view',$job['Job']['id'])) ;?></td>       
            <td><?php echo h($job['JobPriority']['job_priority']); ?>&nbsp;</td>           
			<td><?php echo $job['Job']['client_name'];?></td>
			<td><?php echo $job['Job']['user_name'];?></td>
			<td><?php echo $job['Job']['type'];?></td>
			<td><?php echo $job['Job']['progress'];?></td>
			<td><?php echo date('d-m-Y H:i',strtotime($job['Job']['created']));?></td>
            <td><?php echo date('d-m-Y H:i',strtotime($job['Job']['due_date']));?></td>
            <td><?php echo $staff;?></td>
  
		</tr>
	<?php }?>
    </tbody> 
    <tfoot>
       <tr>
           <th><input type="text" name="search_job_id" value="" class="search_init" /></th>
           <th><input type="text" name="search_order_id" value="" class="search_init" /></th>
           <th><input type="text" name="search_client_name" value="" class="search_init" /></th>
           <th><input type="text" name="search_user_name" value="" class="search_init" /></th>
           <th><input type="text" name="search_type" value="" class="search_init" /></th>
           <th><input type="text" name="search_open_date" value="" class="search_init" /></th>
           <th><input type="text" name="search_status" value="" class="search_init" /></th>
           <th><input type="text" name="search_create_date" value="" class="search_init" /></th>
           <th><input type="text" name="search_due_date" value="" class="search_init" /></th>
           <!--<th><input type="text" name="search_closed_date" value="" class="search_init" /></th>
           <th><input type="text" name="search_note_customer" value="" class="search_init" /></th>
           <th><input type="text" name="search_solve" value="" class="search_init" /></th>-->
       </tr>    
    </tfoot>
</table>
</div>        
<div class="jobs actions">
	<p><?php echo $this->Html->link('New Job',array('action'=>'add'));?></p>
</div>