<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Badge')); ?>
        

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Badge')); ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">Badges scale to match the size of the
                                            immediate parent element by using relative font sizing and <code>em</code> units.</p>
        
                                        <div class="">
                                            <h1>Example heading <span class="badge bg-light">New</span></h1>
                                            <h2>Example heading <span class="badge bg-light">New</span></h2>
                                            <h3>Example heading <span class="badge bg-light">New</span></h3>
                                            <h4>Example heading <span class="badge bg-light">New</span></h4>
                                            <h5>Example heading <span class="badge bg-light">New</span></h5>
                                            <h6 class="mb-0">Example heading <span class="badge bg-light">New</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Default badge</h4>
                                        <p class="card-title-desc">Add any of the below mentioned modifier
                                            classes to change the appearance of a badge.</p>
        
                                        <div>
                                            <span class="badge bg-light">Light</span>
                                            <span class="badge bg-primary">Primary</span>
                                            <span class="badge bg-success">Success</span>
                                            <span class="badge bg-info">Info</span>
                                            <span class="badge bg-warning">Warning</span>
                                            <span class="badge bg-danger">Danger</span>
                                            <span class="badge bg-dark">Dark</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Badge Pills</h4>
                                        
                                        <p class="text-muted">Use the <code
                                                class="highlighter-rouge">.rounded-pill</code> modifier class to make
                                            badges more rounded (with a larger <code>border-radius</code>
                                            and additional horizontal <code>padding</code>).
                                            Useful if you miss the badges from v3.</p>
        
                                        <div>
                                            <span class="badge rounded-pill bg-light">light</span>
                                            <span class="badge rounded-pill bg-primary">Primary</span>
                                            <span class="badge rounded-pill bg-success">Success</span>
                                            <span class="badge rounded-pill bg-info">Info</span>
                                            <span class="badge rounded-pill bg-warning">Warning</span>
                                            <span class="badge rounded-pill bg-danger">Danger</span>
                                            <span class="badge rounded-pill bg-dark">Dark</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Links</h4>
                                        <p class="card-title-desc">Using the contextual <code>.bg-*</code> classes on an <code>&lt;a&gt;</code> element quickly provide <em>actionable</em> badges with hover and focus states.</p>
                                        <div>
                                            <a href="#" class="badge bg-light">light</a>
                                            <a href="#" class="badge bg-primary">Primary</a>
                                            <a href="#" class="badge bg-success">Success</a>
                                            <a href="#" class="badge bg-info">Info</a>
                                            <a href="#" class="badge bg-warning">Warning</a>
                                            <a href="#" class="badge bg-danger">Danger</a>
                                            <a href="#" class="badge bg-dark">Dark</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Badge Lighten</h4>
                                        <p class="card-title-desc">Using the <code>.badge-soft-**</code> classes for Badge lighten.</p>
                                        <div>
                                            <span class="badge bg-primary-subtle text-primary">Primary</span>
                                            <span class="badge bg-success-subtle text-success">Success</span>
                                            <span class="badge bg-info-subtle text-info">Info</span>
                                            <span class="badge bg-warning-subtle text-warning">Warning</span>
                                            <span class="badge bg-danger-subtle text-danger">Danger</span>
                                            <span class="badge bg-dark-subtle text-body">Dark</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Badge in Buttons</h4>
                                        <p class="card-title-desc">Badges can be used as part of links or buttons to provide a counter.</p>
                                        <div class="d-flex flex-wrap gap-4">
                                            <button type="button" class="btn btn-primary me-1">
                                                Notifications <span class="badge bg-warning ms-1">3</span>
                                            </button>

                                            <button type="button" class="btn btn-success">
                                                Messages <span class="badge bg-danger ms-1">5</span>
                                            </button>

                                            <button type="button" class="btn btn-primary position-relative">
                                                Inbox
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    99+
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>

                                            <button type="button" class="btn btn-primary position-relative">
                                                Profile
                                                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                </span>
                                            </button>
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

        <script src="assets/js/app.js"></script>

    </body>
</html>
