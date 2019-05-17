<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $modulo ?>|<?php echo $descripcion ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    
    <?php 
        foreach ($css_files as $css) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $css?>">
            <?php
        }
     ?>
</head>

<body>

    <?php echo $contenido; ?>

    <?php 
        foreach ($js_files as $js) {
            ?>
            <script type="text/javascript" src="<?php echo $js?>"></script>
            <?php
        }
    ?>
</body>

</html>