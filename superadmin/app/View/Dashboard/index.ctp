<?php
    $this->Html->css(SITE_URL.'/fonts/icomoon/icomoon.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/js/plugins/fullcalendar/fullcalendar.min.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/js/plugins/magnific/magnific-popup.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/js/plugins/c3charts/c3.min.css', array('block' => 'styles'));
    $this->Html->css(SITE_URL.'/allcp/forms/css/forms.css', array('block' => 'styles'));
    $this->Html->script(SITE_URL.'/js/plugins/circles/circles.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/jvectormap/jquery.jvectormap.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/fullcalendar/lib/moment.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/fullcalendar/fullcalendar.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/allcp/forms/js/jquery-ui-monthpicker.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/allcp/forms/js/jquery-ui-datepicker.min.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/plugins/magnific/jquery.magnific-popup.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/demo/widgets.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/demo/widgets_sidebar.js', array('block' => 'scripts'));
    $this->Html->script(SITE_URL.'/js/pages/dashboard1.js', array('block' => 'scripts'));
    $this->Html->scriptBlock("
    $(document).ready(function() {
        $('#high-area').highcharts({
        colors: [bgPrimaryLr, bgPrimary, bgPrimaryDr],
        credits: false,
        chart: {
            type: 'areaspline',
            spacing: 0
        },
        title: {
            text: null
        },
        legend: {
            enabled: true,
            verticalAlign: 'top',
            symbolHeight: 10,
            symbolWidth: 10,
            symbolRadius: 5
        },
        xAxis: {
            categories: ['".implode('\',\'',$monthData['label'])."'],
            tickmarkPlacement: 'on',
            min: 0,
            title: {
                enabled: false
            },
            startOnTick: false,
            minPadding: 0
        },
        yAxis: {
            title: {
                text: null
            },
            allowDecimals: false,
            gridLineColor: 'transparent',
            tickAmount: 13,
            tickInterval: 5,
            labels: {
                enabled: true
            }
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.99,
                marker: {
                    lineWidth: 2,
                    lineColor: '#fff',
                    enabled: true,
                    symbol: 'circle',
                    radius: 5,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            id: 0,
            name: 'Customers',
            data: [".implode(',',$monthData['usersCount'])."]
        },
        {
            id: 0,
            name: 'Sales',
            data: [".implode(',',$monthData['salesCount'])."]
        }]
    });

    });
    ", array('block' => 'scripts'));
?>
<!-- -------------- Column Center -------------- -->
<div class="chute chute-center">

    <!-- -------------- Quick Links -------------- -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="panel panel-tile">
                <div class="panel-body">
                    <div class="row pv10">
                        <div class="col-xs-5 ph10"><img src="<?php echo SITE_URL;?>/img/pages/clipart0.png"
                                                        class="img-responsive mauto" alt=""/></div>
                        <div class="col-xs-7 pl5">
                            <h6 class="text-muted">TICKETS SOLD</h6>

                            <h2 class="fs30 mt5 mbn"><?php echo $countOrders;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="panel panel-tile">
                <div class="panel-body">
                    <div class="row pv10">
                        <div class="col-xs-5 ph10"><img src="<?php echo SITE_URL;?>/img/pages/clipart1.png"
                                                        class="img-responsive mauto" alt=""/></div>
                        <div class="col-xs-7 pl5">
                            <h6 class="text-muted">REVENUE SOLD</h6>

                            <h2 class="fs30 mt5 mbn">$<?php echo $totalRevenue;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="panel panel-tile">
                <div class="panel-body">
                    <div class="row pv10">
                        <div class="col-xs-5 ph10"><img src="<?php echo SITE_URL;?>/img/pages/clipart2.png"
                                                        class="img-responsive mauto" alt=""/></div>
                        <div class="col-xs-7 pl5">
                            <h6 class="text-muted">PROSPECT SOCIAL MEDIA</h6>

                            <h2 class="fs30 mt5 mbn"><?php echo $countUsers;?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="panel panel-tile">
                <div class="panel-body">
                    <div class="row pv10">
                        <div class="col-xs-5 ph10"><img src="<?php echo SITE_URL;?>/img/pages/clipart3.png"
                                                        class="img-responsive mauto" alt=""/></div>
                        <div class="col-xs-7 pl5">
                            <h6 class="text-muted">CLICKS/VIEW</h6>

                            <h2 class="fs30 mt5 mbn">0</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------- AllCP Info -------------- -->
    <div class="allcp-panels fade-onload">

        <div class="row">

            <!-- -------------- AllCP Grid -------------- -->
            <div class="col-md-12 allcp-grid">

                <!-- -------------- Perfomance -------------- -->
                <div class="panel mbn" data-panel-title="false">
                    <div class=" text-dark pl25 fw700 fs25">
                        PERFORMANCE ( YEAR <?php echo date('Y');?> )
                    </div>
                    <div class="panel-body pn">
                        <div class="row">
                            <!-- -------------- Chart -------------- -->
                            <div class="col-md-12 mb10">
                                <div id="high-area"
                                     style="width: 100%; height: 350px; margin: 0 auto"></div>
                            </div>

                            <!-- -------------- Text -------------- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- -------------- /AllCP Grid -------------- -->

        </div>

        <div class="row">

            <div class="col-md-6">

                <!-- -------------- Task-list -------------- -->
                <div class="panel panel-widget task-widget sort-disable" id="spy12">
                    <div class="panel-heading cursor">
                        <span class="panel-title"> Recent Orders</span>
                    </div>
                    <div class="panel-body pn br-t">
                         <h6 class="fs14 mv20"><i class="fa fa-bell text-alert mr15"></i><span
                                class="text-muted">EVENTS NAME</span></h6>
                        <ul class="task-list task-current mb40">
                            <?php if(count($recentOrders)){ ?>
                                <?php foreach($recentOrders as $key=>$orders){ ?>
                                    <li class="task-item <?php echo $taskClasses[$key];?>">
                                        <div class="task-handle">
                                            <div class="checkbox-custom">
                                            </div>
                                        </div>
                                        <div class="task-desc"><a href="<?php echo SITE_URL;?>/orders/view/<?php echo $orders['Order']['id']?>" onclick="javascript:location.href=$(this).attr('href');"><?php echo $orders['Order']['event_name'];?></a></div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <!-- -------------- Task-list -------------- -->
                <div class="panel panel-widget task-widget sort-disable" id="spy13">
                    <div class="panel-heading cursor">
                        <span class="panel-title"> Recent Customers</span>
                    </div>
                    <div class="panel-body pn br-t">

                        <h6 class="fs14 mv20"><i class="fa fa-bell text-alert mr15"></i><span
                                class="text-muted">CUSTOMERS</span></h6>
                        <ul class="task-list task-current mb40">
                            <?php if(count($recentCustomers)){ ?>
                                <?php foreach($recentCustomers as $key=>$user){ ?>
                                    <li class="task-item <?php echo $taskClasses[$key];?>">
                                        <div class="task-handle">
                                            <div class="checkbox-custom">
                                            </div>
                                        </div>
                                        <div class="task-desc"><a href="<?php echo SITE_URL;?>/users/edit/<?php echo $user['WpUsers']['ID']?>" onclick="javascript:location.href=$(this).attr('href');"><?php echo $user['WpUsers']['display_name'];?></a></div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- -------------- /.col-md-6 -------------- -->


        </div>


    </div>


</div>
<!-- -------------- /Column Center -------------- -->

<!-- -------------- Column Right -------------- -->
<aside class="chute chute-right chute270 pn hidden" data-chute-height="match">

    <!-- -------------- Activity Timeline -------------- -->
    <ol class="timeline-list pl5 mt5">
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Genry</b> Added a new item to his store:
                <a href="#">Ipod</a>
            </div>
            <div class="timeline-date">1:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Lion</b> Added a new item to his store:
                <a href="#">Notebook</a>
            </div>
            <div class="timeline-date">3:05am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-success">
                <span class="fa fa-usd"></span>
            </div>
            <div class="timeline-desc">
                <b>Admin</b> created a new invoice for:
                <a href="#">Software</a>
            </div>
            <div class="timeline-date">4:15am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-warning">
                <span class="fa fa-pencil"></span>
            </div>
            <div class="timeline-desc">
                <b>Laura</b> edited her work experience
            </div>
            <div class="timeline-date">5:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-success">
                <span class="fa fa-usd"></span>
            </div>
            <div class="timeline-desc">
                <b>Admin</b> created a new invoice for:
                <a href="#">Apple Inc.</a>
            </div>
            <div class="timeline-date">7:45am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Genry</b> Added a new item to his store:
                <a href="#">Ipod</a>
            </div>
            <div class="timeline-date">8:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Lion</b> Added a new item to his store:
                <a href="#">Watch</a>
            </div>
            <div class="timeline-date">9:35am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-system">
                <span class="fa fa-fire"></span>
            </div>
            <div class="timeline-desc">
                <b>Admin</b> created a new invoice for:
                <a href="#">Software</a>
            </div>
            <div class="timeline-date">4:15am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-warning">
                <span class="fa fa-pencil"></span>
            </div>
            <div class="timeline-desc">
                <b>Laura</b> edited her work experience
            </div>
            <div class="timeline-date">5:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-success">
                <span class="fa fa-usd"></span>
            </div>
            <div class="timeline-desc">
                <b>Admin</b> created a new invoice for:
                <a href="#">Software</a>
            </div>
            <div class="timeline-date">4:15am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-warning">
                <span class="fa fa-pencil"></span>
            </div>
            <div class="timeline-desc">
                <b>Laura</b> edited her work experience
            </div>
            <div class="timeline-date">5:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-success">
                <span class="fa fa-usd"></span>
            </div>
            <div class="timeline-desc">
                <b>Admin</b> created a new invoice for:
                <a href="#">Apple Inc.</a>
            </div>
            <div class="timeline-date">7:45am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Genry</b> Added a new item to his store:
                <a href="#">Ipod</a>
            </div>
            <div class="timeline-date">8:25am</div>
        </li>
        <li class="timeline-item">
            <div class="timeline-icon bg-dark light">
                <span class="fa fa-tags"></span>
            </div>
            <div class="timeline-desc">
                <b>Lion</b> Added a new item to his store:
                <a href="#">Watch</a>
            </div>
            <div class="timeline-date">9:35am</div>
        </li>
    </ol>

</aside>
<!-- -------------- /Column Right -------------- -->
