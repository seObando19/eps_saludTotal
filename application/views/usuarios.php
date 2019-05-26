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
	<title><?php echo $modulo ?>|<?php echo $descripcion ?></title>
	<?php 
        foreach ($css_files as $css) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $css?>">
            <?php
        }
     ?>
	<?php include('incluidos/css.php'); ?> 
</head>
<body class="nav-md">
	<?php include('incluidos/menu_lateral.php'); ?>
	<?php include('incluidos/menu_derecho.php'); ?>
	<!-- page content -->
	<div class="right_col" role="main">
		<?php include('incluidos/aside.php');?>		
    	<a href="<?php echo site_url('principal');?>"><strong>Regresar</strong></a>    
    	<br>
    	<?php echo $contenido; ?>

	<!--<p class="footer">Desarrollado por @DesarrollosSACV</p>-->
	<?php 
        foreach ($js_files as $js) {
            ?>
            <script type="text/javascript" src="<?php echo $js?>"></script>
            <?php
        }
    ?>
	<?php include('incluidos/js.php'); ?>
</body>
</html>