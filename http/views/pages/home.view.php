<div class="header-content">
    <h2><i class="fa fa-home"></i>Welcome</h2>
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
<div class="body-content animated fadeIn bg-twitter" style="min-height: 1000px;">
    
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
            </div>
        </div>
    </div>
</div>
