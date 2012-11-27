<script type="text/javascript">
$(document).ready(function ()
{
   // alert("something");
    var oTable=$('#data').dataTable( 

     );
         
    $("tfoot input").keyup(function(){
        /* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $("tfoot input").index(this) );
        
    });   
    
    $("tfoot input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("tfoot input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("tfoot input").index(this)];
		}
	} );
});

</script>
<?php
	$this->extend('../Common/sidebar'); 
	//var_dump($tasks);
?>	
	<h2><?php echo __('Jobs'); ?></h2>
	<?php 
		echo $this->Session->flash('bad');
		echo $this->Session->flash('good');
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
		foreach ($tasks as $job){
		// find the staff information
		// look for allocation table
		$allocationExist = false;
		$currentRecord = 0;
		foreach ($allocations as $allocation){
			// check against each allocation record
			$allocationExist = array_search($job['Task']['id'],$allocation['JobAllocation']);
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
			<td><?php echo $this->Html->link(($job['Task']['id']),array('action'=>'view',$job['Task']['id'])) ;?></td>       
            <td><?php echo h($job['JobPriority']['job_priority']); ?>&nbsp;</td>           
			<td><?php echo $job['Task']['client_name'];?></td>
			<td><?php echo $job['Task']['user_name'];?></td>
			<td><?php echo $job['Task']['type'];?></td>
			<td><?php echo $job['Task']['progress'];?></td>
			<td><?php echo $job['Task']['created'];?></td>
            <td><?php echo $job['Task']['due_date'];?></td>
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
    
    <div class="actions">
		<p><?php echo $this->Html->link('New Job',array('action'=>'add'));?></p>
	</div>