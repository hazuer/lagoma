<div class="container" style="margin-top:120px">
        <div class="row">
        <div class="center-block" title="SCOP">
            <img style="max-width:250px; display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            margin-top: 20px;" 
            src="<?php echo base_url(); ?>assets/images/login_scop.png">
        </div>
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaLogin'); ?>
                    <?php echo form_open('login/valida_login',$attributes) ?>
                    <fieldset>
                        
                        <div class="row"><strong><p class="text-center" style="color: #717171;">Ingresar al Sistema</p></strong></div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php 
                                        $atribInput = [
                                        "type"        => "text",
                                        "id"          => "id",
                                        "name"        => "username",
                                        "placeholder" => "Usuario",
                                        "class"       => "form-control input-lg",
                                        "autofocus"   => ""];
                                        $this->crearelemento->Input($atribInput);
                                        ?>
                                    </div>
                                    <?php echo form_error('username'); ?>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                        </span>
                                        <?php 
                                        $atribInput = [
                                        "type"        => "password",
                                        "id"          => "password",
                                        "name"        => "password",
                                        "placeholder" => "Contraseña",
                                        "class"       => "form-control input-lg"];
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
                                    "class" => "btn btn-primary btn-lg btn-block"];

                                    $this->crearelemento->Button($atribButton,"Iniciar sesión","fa fa-sign-in");?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/modules/login/login.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>