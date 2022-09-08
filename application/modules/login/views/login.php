<!DOCTYPE html>
<html lang="en" class="app">
	<head>
		<meta charset="utf-8" />
		<title>LA GOMA | Papelería</title>
		<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/title_scop.png" />
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.v1.css" type="text/css" />
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css" type="text/css" />
	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<div class="card card-container">
					<img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>assets/images/login_scop.png" />
					<?php $attributes = array('class' => 'form', 'id' => 'validaLogin'); ?>
					<?php echo form_open('login/valida_login',$attributes) ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<?php
								$atribInput = [
								"type"        => "text",
								"id"          => "id",
								"name"        => "username",
								"placeholder" => "Usuario",
								"class"       => "form-control",
								"autofocus"   => ""];
								$this->crearelemento->Input($atribInput);
								?>
							</div>
							<?php echo form_error('username'); ?>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<?php
								$atribInput = [
								"type"        => "password",
								"id"          => "password",
								"name"        => "password",
								"placeholder" => "Contraseña",
								"class"       => "form-control"];
								$this->crearelemento->Input($atribInput);?>
							</div>
							<?php echo form_error('password'); ?>
						</div>
						<div class="form-group">
							<?php
							$atribButton = [
							"type"  => "submit",
							"id"    => "login",
							"name"  => "login",
							"value" => "login",
							"class" => "btn btn-lg btn-primary btn-block btn-signin"];
							$this->crearelemento->Button($atribButton,"Iniciar sesión","fa fa-sign-in");?>
						</div>
					</form><!-- /form -->
				</div><!-- /card-container -->
			</div><!-- /container -->
		</div><!-- /wrapper -->
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</body>
</html>