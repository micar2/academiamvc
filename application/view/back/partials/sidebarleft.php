<?php use Mini\Libs\Sesion;  ?>
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <?php if(Sesion::get('tables')){

                foreach (Sesion::get('tables') as $table){?>

                    <li><a href="<?php echo URL.$table; ?>"><i class="fa fa-link"></i> <span><?= $table ?></span></a></li>

            <?php }} ?>
            <!-- Optionally, you can add icons to the links -->
<!--            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>-->
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
<!--            <li class="treeview">-->
<!--                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>-->
<!--                    <span class="pull-right-container">-->
<!--                <i class="fa fa-angle-left pull-right"></i>-->
<!--              </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="#">Link in level 2</a></li>-->
<!--                    <li><a href="#">Link in level 2</a></li>-->
<!--                </ul>-->
<!--            </li>-->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>