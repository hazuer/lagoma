    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
    
        <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                <span class="thumb-sm avatar pull-left"> 
                    <img src="<?php echo base_url(); ?>assets/images/avatar/<?php echo $this->session->userdata('id_system_users'); ?>.png"/> </span> <?php echo $this->session->userdata('usuario'); ?> <?php #echo $this->session->userdata('id_persona'); ?> <b class="caret"></b>
                 
            </a>
            <ul class="dropdown-menu animated fadeInRight">
                <span class="arrow top"></span>
                <!--<li> <a href="#"><i class="fa fa-edit"></i> Cambiar contraseña</a></li>            
                <li class="divider"></li>-->
                <li> <a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                <li class="divider"></li>
                <li> <a href="<?php echo base_url();?>inicio/cambiarPasswordForm"><i class="fa fa-lock"></i> Cambiar contraseña</a></li>
                    <?php
                    if($this->session->userdata('id_system_users')==1)#Usuario administrador
                    {
                    ?>
                    <li class="divider"></li>
                    <li> <a href="<?php echo base_url();?>configsys/cambiarUsuarioForm"><i class="fa fa-exchange"></i> Cambiar usuario</a></li>
                    <?php
                    } 
                    ?>
            </ul>
        </li>
    </ul>
</header>