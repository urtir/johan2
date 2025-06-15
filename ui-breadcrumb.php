<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Breadcrumb')); ?>
        
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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Breadcrumb')); ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Example</h4>
                                        <p class="card-title-desc">Use an ordered or unordered list with linked list items to create a minimally styled breadcrumb. Use our utilities to add additional styles as desired.</p>
        
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                                            </ol>
                                        </nav>
                                        
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                                            </ol>
                                        </nav>
                                        
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                                            </ol>
                                        </nav>

                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#"><i class="ri-home-5-fill"></i></a></li>
                                                <li class="breadcrumb-item"><a href="#">Base UI</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">General</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Dividers</h4>
                                        
                                        <p class="card-title-desc">We default to our Sass variable, which is set as a fallback to the custom property. For example, using <code>&gt;</code>, <code>/</code> & <code>|</code> as the dividers</p>
        
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                                            </ol>
                                        </nav>

                                        <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                                            </ol>
                                        </nav> 
                                        
                                        <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Data</li>
                                            </ol>
                                        </nav> 
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Icon Dividers</h4>
                                        <p class="card-title-desc">It’s also possible to use an <strong>embedded SVG icon</strong>. Apply it via our CSS custom property, or use the Sass variable.</p>

                                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                                              <li class="breadcrumb-item active" aria-current="page">Library</li>
                                            </ol>
                                        </nav>

                                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                            <ol class="breadcrumb bg-light rounded">
                                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                                              <li class="breadcrumb-item"><a href="#">Library</a></li>
                                              <li class="breadcrumb-item active" aria-current="page">Data</li>
                                            </ol>
                                        </nav>
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
