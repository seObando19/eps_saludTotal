<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Principal</title>

</head>
<body>

<div id="container">
	<h1>Pag. Principal</h1>

	<div>
		<a href="<?php echo site_url('modpaciente')?>">Modulo paciente</a>
		<br>
		<a href="<?php echo site_url('modmedico')?>">Modulo medico</a>
		<br>
		<a href="<?php echo site_url('historiaclinica')?>">Modulo historias clinicas</a>
		<br>
		<a href="<?php echo site_url('modcitas')?>">Modulo citas</a>
		<br>
		<a href="<?php echo site_url('modformulamedica')?>">Modulo formulas medicas</a>
		<br>
		<a href="<?php echo site_url('modinformes')?>">Modulo informes</a>

	</div>

	<p class="footer">Desarrollado por @DesarrollosSACV</p>
</div>

</body>
</html>