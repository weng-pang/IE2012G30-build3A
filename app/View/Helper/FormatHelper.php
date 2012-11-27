<?php
	/* /app/View/Helper/LinkHelper.php */
	App::uses('AppHelper', 'View/Helper');

class FormatHelper extends AppHelper
{
  function hyphenateISBN($ISBN)
  {
    return substr($ISBN, 0,5)."-".substr($ISBN, 5,2)."-".substr($ISBN, 7,2)."-".substr($ISBN, 9,1);
  }
}

?>



