<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Flot Charts')); ?>

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

                    <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Charts' , 'title' => 'Flot Charts')); ?>
                        
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Bar Chart</h4>
                                    <p class="card-title-desc">Below is the basic bar chart example.</p>

                                    <div id="flot-bar-1" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Multi Bar Chart</h4>
                                    <p class="card-title-desc">Below is the multi bar chart example.</p>

                                    <div id="flot-bar-2" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Line Chart</h4>
                                    <p class="card-title-desc">Below is the basic line chart example.</p>

                                    <div id="flot-line-1" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Multi Line Chart</h4>
                                    <p class="card-title-desc">Below is the multi line chart example.</p>

                                    <div id="flot-line-2" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Line Chart with Dots</h4>
                                    <p class="card-title-desc">Below is the line chart with dots example.</p>

                                    <div id="flot-line-3" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Line Chart with Dots - Rounded</h4>
                                    <p class="card-title-desc">Below is the line chart rounded with dots example.</p>

                                    <div id="flot-line-4" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Area Chart</h4>
                                    <p class="card-title-desc">Below is the basic area chart example.</p>

                                    <div id="flot-area-1" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Area Chart - Rounded</h4>
                                    <p class="card-title-desc">Below is the rounded area chart example.</p>

                                    <div id="flot-area-2" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Real Time Updates - Line</h4>
                                    <p class="card-title-desc">Below is the real time line chart example.</p>

                                    <div id="flot-realtime-1" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Real Time Updates - Area</h4>
                                    <p class="card-title-desc">Below is the real time area chart example.</p>

                                    <div id="flot-realtime-2" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Pie Chart</h4>
                                    <p class="card-title-desc">Below is the pie chart example.</p>

                                    <div id="flot-pie" style="height: 320px"></div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card" dir="ltr">
                                <div class="card-body">

                                    <h4 class="card-title">Donut Chart</h4>
                                    <p class="card-title-desc">Below is the donut chart example.</p>

                                    <div id="flot-donut" style="height: 320px"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Combine Chart</h4>
                                    <p class="card-title-desc">Below is the combine chart example.</p>

                                    <div id="combine-chart">
                                        <div id="combine-chartContainer"
                                            style="height:300px;">
                                        </div>
                                        <div id="combine-chart-labels" class="mt-4 float-lable-box"> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Toggling Series</h4>
                                    <p class="card-title-desc">Below is the toggling series chart example.</p>

                                    <div id="toggle-chart">
                                        <div class="row">
                                            <div class="col-sm-6 mb-4">
                                                <h6>Chart Type :</h6>                                                
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="chartType1" name="custominlineRadio" value="line" class="form-check-input" checked>
                                                    <label class="form-check-label" for="chartType1">Line Chart</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="chartType2" name="custominlineRadio" value="bar" class="form-check-input">
                                                    <label class="form-check-label" for="chartType2">Bar Chart</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-4">
                                                <h6>Toggle Series :</h6>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="cbdata1" checked>
                                                    <label class="form-check-label" for="cbdata1">Data 1</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="cbdata2" checked>
                                                    <label class="form-check-label" for="cbdata2">Data 2</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="cbdata3" checked>
                                                    <label class="form-check-label" for="cbdata3">Data 3</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="toggle-chartContainer" style="height:270px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
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

    <!-- flot plugins -->
    <script src="assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.resize.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

    <!-- flot init -->
    <script src="assets/js/pages/flot.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>