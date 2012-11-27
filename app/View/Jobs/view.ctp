<div class="jobs view">
<?php $this->extend('../Common/sidebar'); ?>
<h2><?php  echo __('Job Details'); ?></h2>

<?php 
		// Display Results
		echo $this->Session->flash('bad');
		echo $this->Session->flash('good');
		//var_dump($job); // Debug Only
		//var_dump($jobNotes); // Debug Only
		//var_dump($this->request->data);
		//var_dump($staff);
		$inDebug = false;
//$urlView=array('controller'=>'jobs','action'=>'staffjobindex');
//echo $this->Form->button('Back',array('onclick'=>"location.href='".$this->Html->url($urlView)."'"));
	if(!empty($jobNotes)){
		// reverse the Job Notes order - latest Note will be shown first
		$jobNotes = array_reverse($jobNotes);
	}
	if(!empty($staff)){
		// reverse the Job Notes order - latest Note will be shown first
		$staff = array_reverse($staff);
	}

?>                                                                                                                            
   	<?php
	if ($isStaff){
		// staff only
		echo $this->Form->create('JobPriority',array('hiddenField' => false));
	}	   	   
	?>
	<dl>
		<dt><?php echo __('Job ID'); ?></dt>
		<dd>
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Order ID'); ?></dt>
		<dd>
			<?php echo h($job['Job']['order_id']); ?>
			&nbsp;
		</dd>
         		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h(!empty($jobNotes) ? $jobNotes[0]['JobStatus']['job_status'] : 'Not Attended'); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo h($job['Job']['client_name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($job['Job']['user_name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($job['Job']['type']); ?>
			
		</dd>
        <dt><?php echo __('Staff'); ?></dt>
        <dd>
        	<?php
			if ($isStaff){
			// for Staff only
				if ( !empty($staff)){
					// With Staff
					echo $this->Form->input('JobAllocation.staff_id',array('label'=>false,'div'=>false,'default'=>$staff[0]['Staff']['id'],'hiddenField' => false));
				}else{
					//Without Staff - default setting
					echo h('NO STAFF');
					echo $this->Form->input('JobAllocation.staff_id',array('label'=>false,'div'=>false,'hiddenField' => false));
				}
			} else{
			// for customer only - only viewing capability
				echo h($staff[0]['Staff']['name']);
			}?>
			&nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h(date('d-m-Y H:i',strtotime($job['Job']['created'])));?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due'); ?></dt>
		<dd>
			<?php echo h(date('d-m-Y H:i',strtotime($job['Job']['due_date']))); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Closed Date'); ?></dt>
		<dd>
			<?php echo h(date('d-m-Y H:i',strtotime($job['Job']['closed_date']))); ?>
			&nbsp;
		<dt><?php echo __('Priority'); ?></dt>
		<dd><?php
			if ($isStaff){
			// for Staff only
				echo $this->Form->input('job_priority',array('label'=>false,'div'=>false,'default'=>$job['Job']['job_priority'],'hiddenField' => false));
			} else{
			// for customer only - only viewing capability
				echo h($job['JobPriority']['job_priority']);
			}?>
		</dd>
	</dl>
    <?php
	// for Staff only
		if ($isStaff){
			echo $this->Form->end('Update');
		}
	?>
    
</div>
<div class="notes actions">
	<h3><?php echo __('Job Note'); ?></h3>
    <?php
	// Job Note Form goes here
	// Status Report
		//var_dump($jobStatuses);
		if ($isStaff){
			// for Staff only
			echo $this->Form->create('JobNote',array('style'=>'float:left;'));
			echo $this->Form->input('note',array('type'=>'textarea'));
			echo $this->Form->input('private_note',array('type'=>'textarea'));
			if (!empty($jobNotes)){
				// If Job Notes are available
				echo $this->Form->input('job_status_id',array('default'=>$jobNotes[0]['JobNote']['job_status_id']));
			} else {
				// If no job Notes, use default option
				echo $this->Form->input('job_status_id');
			}
			echo $this->Form->end('Add Note');
		}
	?>
	
</div>

<div class="related">
	<h3><?php echo __('Previous Notes'); ?></h3>
    <?php 

		if(!empty($jobNotes)){?>
    	<?php 
		
		//var_dump($jobNotes); // Debug Only
		?>
    	<table>
    	<?php foreach($jobNotes as $jobNote){ ?>
	    	<tr>
            	<td>Status:<strong> <?php echo $jobNote['JobStatus']['job_status']; ?></strong> </td>
            	<td>Added:<strong> <?php echo date('d-m-Y H:i',strtotime($jobNote['JobNote']['created'])); ?></strong> By:<strong><?php echo $jobNote['Staff']['name'];//$this -> Session -> read('Auth.User.username');?></strong></td>
            </tr>
    	    <tr>
            	<td>Customer Note</td>
                <td><?php echo $jobNote['JobNote']['note']; ?></td>
            </tr>
            <?php if ($isStaff){ ?>
            <tr>
                <td>Solve Note</td>
                <td><?php echo $jobNote['JobNote']['private_note']; // configurated for staff only?></td>
            </tr>
        	<?php } ?>
        <?php } ?>
        </table>
    <?php }else{?>   
    	<p><?php echo __('No Job Notes'); ?></p>
    <?php }?>
    <h2><?php echo __('Job Information');?></h2>
    <?php echo $job['Job']['metadata'];?>
    
    <?php if ($inDebug): ?>
	<h3><?php echo __('Job Allocations'); ?></h3>
	<?php if (!empty($job['JobAllocation'])): ?>
	<table>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Staff Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($job['JobAllocation'] as $jobAllocation): ?>
		<tr>
			<td><?php echo $jobAllocation['id']; ?></td>
			<td><?php echo $jobAllocation['job_id']; ?></td>
			<td><?php echo $jobAllocation['staff_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'job_allocations', 'action' => 'view', $jobAllocation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'job_allocations', 'action' => 'edit', $jobAllocation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'job_allocations', 'action' => 'delete', $jobAllocation['id']), null, __('Are you sure you want to delete # %s?', $jobAllocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<?php endif; ?>
	<div class="actions">
    	
	</div>
</div>