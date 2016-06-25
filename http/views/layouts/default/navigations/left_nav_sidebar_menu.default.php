<!-- Start left navigation - menu -->
<ul id="tour-9" class="sidebar-menu">

    <!-- Start navigation - dashboard -->
    <!-- <li class="submenu<?= isset($active_dashboard) ? ' '. $active_dashboard : ''; ?>">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-home"></i></span>
            <span class="text">Main Menu</span>
            <span class="arrow"></span>
            <span class="selected"></span>
        </a>
        <ul>
            <li<?= isset($active_home) ? ' class="'. $active_home .'"' : ''; ?>><a href="/">Home</a></li>
            <li<?= isset($active_about) ? ' class="'. $active_about .'"' : ''; ?>><a href="/about">About</a></li>
        </ul>
    </li> -->
    <!--/ End navigation - dashboard -->

    <!-- Start category apps -->
    <li class="sidebar-category">
        <span>APPS</span>
        <span class="pull-right"><i class="fa fa-trophy"></i></span>
    </li>
    <!--/ End category apps -->

    <!-- Start navigation - mail -->
    <li class="submenu<?= isset($data['active_expenses']) ? ' '. $data['active_expenses'] : ''; ?>">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-dollar"></i></span>
            <span class="text">Expenses</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li<?= isset($data['active_expense_main']) ? ' class="'. $data['active_expense_main'] .'"' : ''; ?>><a href="/expenses">Main</a></li>
        </ul>
    </li>
    <!--/ End navigation - mail -->

    <!-- Start navigation - blog -->
    <!-- <li class="submenu<?= isset($active_blog) ? ' '. $active_blog : ''; ?>">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-globe"></i></span>
            <span class="text">Blog</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li<?= isset($active_posts) ? ' class="'. $active_posts .'"' : ''; ?>><a href="/posts">View Posts</a></li>
        </ul>
    </li> -->
    <!--/ End navigation - blog -->

</ul><!-- /.sidebar-menu -->
<!--/ End left navigation - menu -->
