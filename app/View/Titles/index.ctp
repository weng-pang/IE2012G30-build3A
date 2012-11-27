<h1>Titles</h1>
<?php
	if(empty($titles))
	{
?>
	There are no titles in the database
<?php
	}
	else
	{
		$urlAdd = array('controller' => '/titles/','action' => 'edit');
		echo $this->Form->button('Add Title', array('onclick' => "location.href='".$this->Html->url($urlAdd)."'"));
?>
		<table class="list">
    	<tr>
	        <th>Title</th>
	        <th>ISBN</th>
	        <th>Year Pub.</th>
	        <th>Cost</th>
	        <th>Retail</th>
	        <th>Publisher</th>
	        <th>View</th>
    	</tr>

   		<!-- Here's where we loop through our $titles array, printing out title info -->

<?php
		foreach ($titles as $title)
		{
?>
		    <tr>
		        <td><?php echo $title['Title']['title']; ?></td>
		        <td><?php echo $this->Format->hyphenateISBN($title['Title']['ISBN']); ?></td>
		        <td><?php echo $title['Title']['year_published']; ?></td>
		        <td class="right"><?php echo "$".number_format($title['Title']['cost_price'],2); ?></td>
		        <td class="right"><?php echo "$".number_format($title['Title']['retail_price'],2); ?></td>
		        <td><?php echo $title['Publisher']['company_name']; ?></td>
		        <td><?php echo $this->Html->link("Details", "/titles/view/".$title['Title']['ISBN']); ?></td>
		    </tr>
<?php
		}
?>

</table>
<?php
	}
?>