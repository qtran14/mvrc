<!-- Start header right -->
<div class="header-right">
    <!-- Start navbar toolbar -->
    <div class="navbar navbar-toolbar">


        <!-- Start right navigation -->
        <ul class="nav navbar-nav navbar-right"><!-- /.nav navbar-nav navbar-right -->


        <!-- Start profile -->
        <li id="tour-6" class="dropdown navbar-profile">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="meta">
                    <?php if ( Session::isLogin() ) { ?>
                        <!-- <span class="avatar"><img src="/images/avatars/<?= getAvatar(); ?>.jpg" class="img-circle" alt="avatar"></span> -->
                        <span class="text hidden-xs hidden-sm text-muted"><?= getLoginUser(); ?></span>
                        <span class="caret"></span>
                    <?php } else { ?>
                        <a href="/login"><span class="text hidden-xs hidden-sm text-muted">Sign in</span></a>
                    <?php } ?>
                </span>
            </a>
            <!-- Start dropdown menu -->
            <ul class="dropdown-menu animated flipInX">
                <li><a href="/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
            <!--/ End dropdown menu -->
        </li><!-- /.dropdown navbar-profile -->
        <!--/ End profile -->

        </ul>
        <!--/ End right navigation -->

    </div><!-- /.navbar-toolbar -->
    <!--/ End navbar toolbar -->
</div><!-- /.header-right -->
<!--/ End header left -->