<ul class="nav navbar-nav navbar-left m-n hidden-xs nav-user">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book" aria-hidden="true"></i> Catalogos del sistema <b class="caret"></b></a>

        <ul class="dropdown-menu animated fadeInRight">
        <span class='arrow top'></span>
            <?php
                navmenuitem(2,"fa fa-cogs","configsys/modulosLs");
                navmenuitem(3,"fa fa-cogs","configsys/submodulosLs");
                navmenuitem(4,"fa fa-cogs","configsys/usuariosLs");
            ?>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book" aria-hidden="true"></i> Privilegios <b class="caret"></b></a>
        <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>

            <?php
                navmenuitem(5,"fa fa-cogs","configsys/privModuloLs");
                navmenuitem(6,"fa fa-cogs","configsys/privSubModuloLs");
                navmenuitem(7,"fa fa-cogs","configsys/privUsuarioLs");
            ?>
        </ul>
    </li>
</ul>