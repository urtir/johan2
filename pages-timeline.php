<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Timeline')); ?>

        <!-- slick css -->
                <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
                <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <?php include 'partials/head-css.php'; ?>

    </head>

    <?php include 'partials/body.php'; ?>

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php include 'partials/menu.php'; ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Utility' , 'title' => 'Timeline')); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Horizontal Timeline</h4>
                                        <div dir="ltr">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-8">
                                                    <div class="slick-slider slider-for hori-timeline-desc">
                                                        <div>
                                                            <h5 class="text-primary">2013 - 14</h5>
                                                            <p>UI / UX Designer of xyz Company</p>
    
                                                            <p>" To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language of the individual languages. "</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary">2014 - 16</h5>
                                                            <p>Frontend Developer of abc Company</p>
    
                                                            <p>" If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will than the existing European languages. "</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary">2016 - 18</h5>
                                                            <p>Backend Developer of xyz Company</p>
    
                                                            <p>" The new common language will be more simple and regular than the existing European languages. It will be as simple as in fact, it will be Occidental. To an English person, it will seem like simplified "</p>
                                                        </div>
                                                        <div>
                                                            <h5 class="text-primary">2018 - 19</h5>
                                                            <p>Full stack Developer of abc Company</p>
    
                                                            <p>" Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. "</p>
                                                        </div>
                                                    </div>
    
                                                    <div class="slick-slider slider-nav hori-timeline-nav">
                                                        <div class="slider-nav-item py-2">
                                                            <h5 class="mb-1">2013 - 14</h5>
                                                            <p class="mb-0 d-none d-sm-block font-size-13">UI / UX Designer</p>
                                                        </div>
                                                        <div class="slider-nav-item py-2">
                                                            <h5>2014 - 16</h5>
                                                            <p class="mb-0 d-none d-sm-block font-size-13">Frontend Developer</p>
                                                        </div>
                                                        <div class="slider-nav-item py-2">
                                                            <h5>2016 - 18</h5>
                                                            <p class="mb-0 d-none d-sm-block font-size-13">Backend Developer</p>
                                                        </div>
                                                        <div class="slider-nav-item py-2">
                                                            <h5>2018 - 19</h5>
                                                            <p class="mb-0 d-none d-sm-block font-size-13">Full stack Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Vertical Timeline</h4>

                                        <ul class="verti-timeline list-unstyled">
                                            <li class="event-list">
                                                <div>
                                                    <p class="text-primary">07 Nov</p>
                                                    <h5>Ordered</h5>
                                                    <p class="text-muted">New common language will be more simple and regular than the existing.</p>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div>
                                                    <p class="text-primary">09 Nov</p>
                                                    <h5>Packed</h5>
                                                    <p class="text-muted">To achieve this, it would be necessary to have uniform grammar.</p>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div>
                                                    <p class="text-primary">10 Nov</p>
                                                    <h5>Shipped</h5>
                                                    <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental.</p>
                                                </div>
                                            </li>
                                            <li class="event-list">
                                                <div>
                                                    <p class="text-primary">11 Nov</p>
                                                    <h5>Delivered</h5>
                                                    <p class="text-muted">To an English person, it will seem like simplified English.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <?php include 'partials/right-sidebar.php'; ?>

        <?php include 'partials/vendor-scripts.php'; ?>
        
        <script src="assets/libs/slick-slider/slick/slick.min.js"></script>

        <script src="assets/js/pages/timline.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
