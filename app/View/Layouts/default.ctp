<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakeLAMP');
header('X-Frame-Options GOFORIT'); 
header("Access-Control-Allow-Origin: http://agu114.co.kr");
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	      <a class="brand" href="#">CakeLAMP</a>
	      <div class="nav-collapse">
	        <ul class="nav">
	          <li><a href="/admin/clients">CRM</a></li>
	          <li><a href="#">SCANS</a></li>
	          <li><a href="#">GRABS</a></li>
	          <li><a href="/admin/campaigns">CAMPANHAS</a></li>
	          <li><a href="#">EXPLOITS</a></li>
	          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">INFOS</a>
	          	<ul class="dropdown-menu">
	            	<?php foreach ($InfosCategories as $InfosCategory): ?>
	            		<li><a href="/admin/infos/index/<?php echo $InfosCategory['InfosCategory']['id']; ?>"><?php echo $InfosCategory['InfosCategory']['name']; ?></a></li>
	            	<?php endforeach ?>
	            </ul>
	          </li>
	        </ul>
	        <form class="navbar-search pull-right" action="">
	          <input type="text" class="search-query span2" placeholder="Search">
	        </form>
	      </div><!-- /.nav-collapse -->
	    </div><!-- /.container -->
	  </div><!-- /.navbar-inner -->
	</div><!-- /.navbar -->

	<div id="cake" class="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

	<script src="http://code.jquery.com/jquery.js"></script>
	<?php
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('scripts');
	?>
</body>
</html>
