<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Material Design Icons')); ?>

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Icons' , 'title' => 'Material Design Icons')); ?>

                        <div class="row icons-demo-content">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title">New Icons</h4>
                                        <p class="card-title-desc mb-2">Use <code>&lt;i class="mdi mdi-speedometer-slow"&gt;&lt;/i&gt;</code> <span class="badge bg-success">v 5.8.55</span>.</p>

                                        <div class="row icon-demo-content" id="newIcons"></div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">All Icons</h4>
                                        <div class="row icon-demo-content" id="icons"></div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title">Size</h4>

                                        <div class="row icon-demo-content">
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-18px mdi-account"></i> mdi-18px
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-24px mdi-account"></i> mdi-24px
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-36px mdi-account"></i> mdi-36px
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-48px mdi-account"></i> mdi-48px
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title">Rotate</h4>

                                        <div class="row icon-demo-content">
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-45 mdi-account"></i> mdi-rotate-45
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-90 mdi-account"></i> mdi-rotate-90
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-135 mdi-account"></i> mdi-rotate-135
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-180 mdi-account"></i> mdi-rotate-180
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-225 mdi-account"></i> mdi-rotate-225
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-270 mdi-account"></i> mdi-rotate-270
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-rotate-315 mdi-account"></i> mdi-rotate-315
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <h4 class="card-title">Spin</h4>

                                        <div class="row icon-demo-content">
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-spin mdi-loading"></i> mdi-spin
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                                <i class="mdi mdi-spin mdi-star"></i> mdi-spin
                                            </div>
                                        </div>
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

        <!-- materialdesign icon js-->
        <script src="assets/js/pages/materialdesign.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
