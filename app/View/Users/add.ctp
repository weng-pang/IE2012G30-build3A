<?php $this->extend('../Common/sidebar'); ?>
<table>
<tr>    

<td></td>
<td>
    
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        if($this->Session->read('Auth.User.role'=='staff')){
            echo $this->Form->input('role', array(
            'options' => array('client' => 'Client')
        ));
        }else if($this->Session->read('Auth.User.role'=='superstaff')){
            echo $this->Form->input('role', array(
            'options' => array('staff'=>'staff', 'client' => 'Client')
        ));
        }else if($this->Session->read('Auth.User.role'=='client')){
            echo $this->Form->input('role', array(
            'options' => array('client' => 'Client')
        ));
        }else{
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin','superstaff'=>'Superstaff','staff'=>'staff', 'client' => 'Client')
        ));
        }
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div></td>
</table>