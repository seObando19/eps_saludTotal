<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>SaludTotal | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>/assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>/assets/build/css/custom.min.css" rel="stylesheet">	
</head>
<body class="login">
<div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  	<?php echo form_open('login/acceso') ?>
              <h1>Inicio de sesion</h1>
              <div>
			  <input type="email" class="form-control" name="correo" id="correo" placeholder="Email"  maxlength="50" required="">
              </div>
              <div>
			  <input type="password" class="form-control" name="clave" id="clave" placeholder="Paswoord" required maxlength="255" required="">
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" name="enviar" id="enviar">Acceder al sistema</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Nuevo por aqui?
                  <a href="#signup" class="to_register"> Crea tu usuario </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SaludTotal</h1>
                  <p>©2019 All Rights Reserved. EPS SaludTotal - developed by <a href="https://github.com/seObando19">Sebastian Obando</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Creacion de usuario</h1>
              <div>
                <input type="text" class="form-control" placeholder="Nombre" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Correo" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Telefono" required="" />
              </div>              
              <div>
                <a class="btn btn-default submit" href="index.html">Registrarme</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2019 All Rights Reserved. EPS SaludTotal - developed by <a href="https://github.com/seObando19">Sebastian Obando</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
</body>
</html>