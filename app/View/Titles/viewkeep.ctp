
	<h2><?php echo $title['Title']['title']; ?></h2>
	<table>
    <tr>
        <th width="20%">ISBN</th>
        <td class="view"><?php echo $this->Format->hyphenateISBN($title['Title']['ISBN']); ?></td>
    </tr>
    <tr>
        <th>Year Published</th>
 		<td class="view"><?php echo $title['Title']['year_published']; ?></td>
    </tr>
     <tr>
        <th>Description</th>
        <td class="view"><?php echo $title['Title']['description']; ?></td>
    </tr>
     <tr>
        <th>Topic</th>
        <td class="view"><?php echo $title['Title']['topic']; ?></td>
    </tr>
      <tr>
        <th>Comments</th>
        <td class="view"><?php echo $title['Title']['comments']; ?></td>
    </tr>
    <tr>
        <th>Cost Price</th>
        <td class="view"><?php echo $title['Title']['cost_price']; ?></td>
    </tr>
    <tr>
        <th>Retail</th>
        <td class="view"><?php echo $title['Title']['retail_price']; ?></td>
    </tr>
     <tr>
        <th>In Stock</th>
        <td class="view"><?php echo $title['Title']['no_in_stock']; ?></td>
    </tr>
    <tr>
        <th>Publisher</th>
        <td class="view"><?php echo $title['Publisher']['company_name']; ?></td>
	</tr>
	</table>

	<table class="button">
	<tr>
		<td class="button">
			<?php
				$urlEdit = array('controller' => '/titles/','action' => 'edit',$title['Title']['ISBN']);
				echo $this->Form->button('Edit', array('onclick' => "location.href='".$this->Html->url($urlEdit)."'"));
        	?>
        </td>
 		<td class="button">
			<?php

				//$urlDel = array('controller' => '/titles/','action' => 'delete',$title['Title']['ISBN'],addslashes($title['Title']['title']), 'Are you sure you want to delete this book?',false);
				//echo $form->button('Delete', array('onclick' => "location.href='".$this->Html->url($urlDel)."'"));

				 $urlDel = array('controller'=>'titles','action'=>'delete', $title['Title']['ISBN'],addslashes($title['Title']['title']));
                 echo $this->Form->button('Delete', array('onclick' => "if(confirm('Are you sure you want to delete this book?'))location.href='".$this->Html->url($urlDel)."'"));
     		?>
     	</td>
     	<td class="button">
			<?php
                 $urlView =  array('controller'=>'titles', 'action'=>'index');
                 echo $this->Form->button('Return to List', array('onclick' => "location.href='".$this->Html->url($urlView)."'"));
				//the following 2 lines would also work
				//$link = $this->webroot . 'titles/index/';
				//echo $form->button('Return to List', array('onclick' => "location.href='".$link."'"));
           	?>
		</td>
	</tr>
	</table>