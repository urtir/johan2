<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Remix Icons')); ?>

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Upzet' , 'title' => 'Remix Icons')); ?>

                        <div class="row">
                            
                            <div class="col-12" id="icons"></div> <!-- end col-->

                        </div><!-- end row -->

                    </div><!-- container-fluid -->
                    
                </div><!-- End Page-content -->

                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <?php include 'partials/right-sidebar.php'; ?>

        <?php include 'partials/vendor-scripts.php'; ?>

        <!-- Remix icon js-->
        <script src="assets/js/pages/remix-icons-list.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
