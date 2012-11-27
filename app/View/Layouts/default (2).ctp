
<?php
/**
 *	Monash University IE Group 30 - SO2
 *  Standard default template for Solve Communications
 *  This page is prepared by WENG LONG PANG.
 *  This page is derived from default page for CakePHP.
 *
 *	Note: This page contains mockup content for aligment and layout test, Please REMOVE those content before each build.
 *
 * CakePHP Information
 *=========================================================================================================
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription.':' ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<!--<div id="container">
		
		<!--<div id="header">
			<h1><img src="http://www.solve.com.au/newhomepics/home2_r1_c1.gif" /></h1>
			<!--<p>Welcome Chris<br />
			<a href="">logout</a></p>-->
		</div>-->
		
           <!-- <div id="navigation">
			<ul>
				<li><a href="dashboard.ctp">Dashboard</a></li>
				<li><a href="">Procurement</a></li>
				<li><a href="">Helpdesk</a></li>
				<li><a href="">Reports</a></li>
				<li><a href="">Administration</a></li>
			</ul>
		</div>-->
		<!-- Test Content starts here -->
		<!--<div id="addons">
			<div id="box">
				<h3>Welcome</h3>
				<p>Welcome to the new home of all your corporate and personal communication needs. <br />We hope you enjoy.</p>
				<br />
				<p>Solve Communications<br />
				South Melbourne<br />
				VIC 3100<br />
				phone: 03 8635 2367<br />
				fax: 03 8635 3644<br />
				email: helpdesk@solve.com.au</p>
			</div>
			<div id="box">
				<h3>Statistics</h3>
				<p>Outstanding Jobs: 4</p>
				<p>Jobs loged last 24 hours: 0</p>
				<p>Average resolution time: 48 min</p>
			</div>
		</div> -->
		<!-- Test Content ends here -->
		<div id="content">

		    <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		<p>&copy; Solve Communications.</p>
		</div>
		
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
