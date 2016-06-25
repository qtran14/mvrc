<div class="header-content">
    <h2><i class="fa fa-home"></i>Home</h2>
<!--    <div class="breadcrumb-wrapper hidden-xs">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="dashboard.html">Dashboard</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Layouts</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li class="active">Blank Page</li>
        </ol>
    </div>-->
</div>

<!-- Start body content -->
<div class="body-content animated fadeIn">
    <div id="tour-12" class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-facebook rounded">
                <span class="mini-stat-icon"><i class="fa fa-facebook fg-facebook"></i></span>
                <div class="mini-stat-info">
                    <span class="counter">5,762</span>
                    Facebook Like
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-twitter rounded">
                <span class="mini-stat-icon"><i class="fa fa-twitter fg-twitter"></i></span>
                <div class="mini-stat-info">
                    <span class="counter">7,153</span>
                    Twitter Followers
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-googleplus rounded">
                <span class="mini-stat-icon"><i class="fa fa-google-plus fg-googleplus"></i></span>
                <div class="mini-stat-info">
                    <span class="counter">793</span>
                    Google+ Posts
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="mini-stat clearfix bg-bitbucket rounded">
                <span class="mini-stat-icon"><i class="fa fa-bitbucket fg-bitbucket"></i></span>
                <div class="mini-stat-info">
                    <span class="counter">8,932</span>
                    Repository
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">

                    <!-- Start weather widget -->
                    <div id="tour-14" class="widget-wrapper bg-lilac rounded">
                        <div class="weather-current-city">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <span class="current-city">
                                        <?= $data['weatherInfo']['current_observation']['display_location']['full']; ?>
                                    </span>
                                    <span class="current-temp">
                                        <?= $data['weatherInfo']['current_observation']['temp_f']; ?>&deg;F
                                    </span>
                                    <span class="current-day"><?= date('D, F j, Y') ?></span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top: -30px;">
                                    <img alt="<?= $data['weatherInfo']['current_observation']['weather']; ?>" src="http://icons.wxug.com/i/c/v4/<?= $data['weatherInfo']['current_observation']['icon']; ?>.svg" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <!-- <ul class="days">
                                <li class="col-md-4 col-sm-4 col-xs-4">
                                    <strong>Tue</strong>
                                    <canvas id="snow" width="45" height="45"></canvas>
                                    <span>20°</span>
                                </li>
                                <li class="col-md-4 col-sm-4 col-xs-4"><strong>Fri</strong>
                                    <canvas id="rain" width="45" height="45"></canvas>
                                    <span>18°</span>
                                </li>
                                <li class="col-md-4 col-sm-4 col-xs-4"><strong>Sat</strong>
                                    <canvas id="sleet" width="45" height="45"></canvas>
                                    <span>24°</span>
                                </li>
                            </ul> -->
                        </div>
                    </div><!-- /.widget-wrapper -->
                    <!--/ End weather widget -->

                    <div class="divider"></div>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12">

                    <!-- Start blog post widget -->
                    <div id="tour-15" class="blog-item blog-quote rounded shadow">
                        <div class="quote quote-lilac">
                            <a href="page-blog-single.html">
                                Stay Hungry, Stay Foolish
                                <small class="quote-author">- Steve Jobs -</small>
                            </a>
                        </div>
                        <div class="blog-details">
                            <ul class="blog-meta">
                                <li>By: <a href="">Djava UI</a></li>
                                <li>Jun 08, 2014</li>
                                <li><a href="">2 Comments</a></li>
                            </ul>
                        </div><!-- blog-details -->
                    </div><!-- blog-item -->
                    <!--/ End blog post widget -->

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="table-responsive rounded mb-20">
                <table id="tour-16" class="table table-striped table-theme">
                    <thead>
                    <tr>
                        <th class="text-center border-right">No.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Position</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center border-right">1</td>
                        <td>
                            <img src="http://img.djavaui.com/?create=35x35,81B71A?f=ffffff" class="img-circle img-bordered-theme" alt="John Kribo">
                            <span>John Kribo</span>
                        </td>
                        <td>United State</td>
                        <td>Senior Web Designer</td>
                        <td class="text-center">
                            <div class="rating">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star active"></span>
                                <span class="star"></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-right">2</td>
                        <td>
                            <img src="http://img.djavaui.com/?create=35x35,A90329?f=ffffff" class="img-circle img-bordered-theme" alt="Jennifer Poiyem">
                            <span>Jennifer Poiyem</span>
                        </td>
                        <td>Spain</td>
                        <td>Senior UX Designer</td>
                        <td class="text-center">
                            <div class="rating">
                                <span class="star"></span>
                                <span class="star active"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-right">3</td>
                        <td>
                            <img src="http://img.djavaui.com/?create=35x35,F4645F?f=ffffff" class="img-circle img-bordered-theme" alt="Clara Wati">
                            <span>Clara Wati</span>
                        </td>
                        <td>United State</td>
                        <td>Developer</td>
                        <td class="text-center">
                            <div class="rating">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star active"></span>
                                <span class="star"></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-right">4</td>
                        <td>
                            <img src="http://img.djavaui.com/?create=35x35,6880B0?f=ffffff" class="img-circle img-bordered-theme" alt="Toni Mriang">
                            <span>Toni Mriang</span>
                        </td>
                        <td>Germany</td>
                        <td>Assistant</td>
                        <td class="text-center">
                            <div class="rating">
                                <span class="star"></span>
                                <span class="star active"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center border-right">5</td>
                        <td>
                            <img src="http://img.djavaui.com/?create=35x35,5a67a5?f=ffffff" class="img-circle img-bordered-theme" alt="Bella negoro">
                            <span>Bella negoro</span>
                        </td>
                        <td>England</td>
                        <td>Developer</td>
                        <td class="text-center">
                            <div class="rating">
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star"></span>
                                <span class="star active"></span>
                                <span class="star"></span>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-success btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-primary btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger btn-xs rounded" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center border-right">No.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Position</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div id="tour-17" class="row">
                <div class="col-md-12  col-xs-4 col-xs-override">

                    <div class="panel rounded shadow">
                        <div class="panel-heading text-center bg-youtube">
                            <p class="inner-all no-margin">
                                <i class="fa fa-youtube fa-5x"></i>
                            </p>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body text-center">
                            <p class="h4 no-margin inner-all text-strong">
                                <span class="block counter">342</span>
                                <span class="block">Videos</span>
                            </p>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
                <div class="col-md-12 col-sm-4 col-xs-4 col-xs-override">

                    <div class="panel rounded shadow">
                        <div class="panel-heading text-center bg-dribbble">
                            <p class="inner-all no-margin">
                                <i class="fa fa-dribbble fa-5x"></i>
                            </p>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body text-center">
                            <p class="h4 no-margin inner-all text-strong">
                                <span class="block counter">2,341</span>
                                <span class="block">Designs</span>
                            </p>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
                <div class="col-md-12 col-sm-4 col-xs-4 col-xs-override">

                    <div class="panel rounded shadow">
                        <div class="panel-heading text-center bg-soundcloud">
                            <p class="inner-all no-margin">
                                <i class="fa fa-soundcloud fa-5x"></i>
                            </p>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body text-center">
                            <p class="h4 no-margin inner-all text-strong">
                                <span class="block counter">34,282</span>
                                <span class="block">Musics</span>
                            </p>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
            </div>
        </div>
    </div>
</div>
