<?php

	class Title extends AppModel
	{
  		var $name = 'Title';
  		var $primaryKey='ISBN';

		var $belongsTo = array('Publisher' => array('className' => 'Publisher', 'foreignKey' => 'PubID'));
	}

?>
