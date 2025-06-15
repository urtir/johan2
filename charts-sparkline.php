<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Sparkline Charts')); ?>

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Charts' , 'title' => 'Sparkline Charts')); ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Line Chart</h4>
                                        <p class="card-title-desc">Example of line sparkline chart.</p>
    
                                        <div id="sparkline1"></div>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Bar Chart</h4>
                                        <p class="card-title-desc">Example of bar sparkline chart.</p>
    
                                        <div id="sparkline2" class="text-center"></div>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
    
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Pie Chart</h4>
                                        <p class="card-title-desc">Example of pie sparkline chart.</p>
    
                                        <div id="sparkline3" class="text-center"></div>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Mouse Speed Chart</h4>
                                        <p class="card-title-desc">Example of mouse speed sparkline chart.</p>
    
                                        <div id="sparkline4" class="text-center"></div>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
    
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Composite Bar Chart</h4>
                                        <p class="card-title-desc">Example of composite bar sparkline chart.</p>
                                        
                                        <div id="sparkline5" class="text-center"></div>
    
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Discrete Chart</h4>
                                        <p class="card-title-desc">Example of discrete sparkline chart.</p>
    
                                        <div id="sparkline6" class="text-center"></div>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

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

        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        <script src="assets/js/pages/sparklines.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
