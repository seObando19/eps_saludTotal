<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
	<title>Bienvenidos al sistema principal</title>
	<?php include('incluidos/css.php'); ?> 
</head>
<body class="nav-md">
	<?php include('incluidos/menu_lateral.php'); ?>
	<?php include('incluidos/menu_derecho.php'); ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<?php include('incluidos/aside.php');?>
		<?php include('incluidos/caja1.php');?>
		<br>
	</div>		
		<?php include('incluidos/footer.php');?>
	</div>	
	<!--<p class="footer">Desarrollado por @DesarrollosSACV</p>-->
	<?php include('incluidos/js.php'); ?>
</body>
</html>