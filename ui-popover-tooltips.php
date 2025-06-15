<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Popover & Tooltips')); ?>
        
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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Popover & Tooltips')); ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Popovers</h4>
                                        <p class="card-title-desc">Add small overlay content, like those found in iOS, to any element for housing secondary information.</p>
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                Popover on top
                                            </button>
            
                                            <button type="button" class="btn btn-primary waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                Popover on right
                                            </button>
            
                                            <button type="button" class="btn btn-primary waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                Popover on bottom
                                            </button>
            
                                            <button type="button" class="btn btn-primary waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" title="Popover Title" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                                                Popover on left
                                            </button>
            
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Tooltips</h4>
                                        <p class="card-title-desc">Hover over the links below to see tooltips:</p>
        
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                                                Tooltip on top
                                            </button>
            
                                            <button type="button" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                                                Tooltip on right
                                            </button>
            
                                            <button type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                                                Tooltip on bottom
                                            </button>
            
                                            <button type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                                                Tooltip on left
                                            </button>

                                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>">
                                                Tooltip with HTML
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

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

        <script src="assets/js/app.js"></script>


    </body>
</html>
