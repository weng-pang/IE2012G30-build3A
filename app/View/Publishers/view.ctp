<h2><?php echo $publisher['Publisher']['company_name']; ?></h2>
<table width="50%">
    <tr>
        <th width="20%">Contact</th>
        <td><?php echo $publisher['Publisher']['contact_fname']." ".$publisher['Publisher']['contact_sname']; ?></td>
    </tr>
    <tr>
        <th valign="top">Address</th>
        <td>
            <?php echo $publisher['Publisher']['pub_street']."<br />".
            $publisher['Publisher']['pub_suburb']." ".$publisher['Publisher']['pub_state']."<br />".
 				$publisher['Publisher']['pub_pc']; ?>
 	</td>
    </tr>
     <tr>
        <th>Phone</th>
        <td><?php echo $publisher['Publisher']['phone']; ?></td>
    </tr>
     <tr>
        <th>Email</th>
        <td><?php echo $publisher['Publisher']['email']; ?></td>
    </tr>
</table>

<table width="20%">
    <tr>
        	<td>
<?php
	 			$urlEdit = array('controller' => '/publishers/','action' => 'edit',$publisher['Publisher']['id']);
				echo $this->Form->button('Edit', array('onclick' => "location.href='".$this->Html->url($urlEdit)."'"));
?>
			</td>
 			<td>
<?php
				$urlDel = array('controller'=>'publishers','action'=>'delete', $publisher['Publisher']['id'], $publisher['Publisher']['company_name']);
    			echo $this->Form->button('Delete', array('onclick' => "if(confirm('Are you sure you want to delete this publisher?'))location.href='".$this->Html->url($urlDel)."'"));
?>
     	</td>
    </tr>
</table>