<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Read Email')); ?>

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Email' , 'title' => 'Read Email')); ?>

                        <div class="row mb-4">
                            <div class="col-xl-3 mb-4 mb-xl-0">
                                <div class="card h-100">
                                    <div class="card-body email-leftbar">
                                        <div class="d-grid">
                                            <a href="email-compose.php" class="btn btn-danger btn-rounded waves-effect waves-light"><i class="mdi mdi-plus me-1"></i> Compose</a>
                                        </div>

                                        <div class="mail-list mt-4">
                                            <a href="#" class="active"><i class="mdi mdi-inbox me-2"></i> Inbox <span class="ms-1 float-end">(18)</span></a>
                                            <a href="#"><i class="mdi mdi-star-outline me-2"></i>Starred</a>
                                            <a href="#"><i class="mdi mdi-diamond-stone me-2"></i>Important</a>
                                            <a href="#"><i class="mdi mdi-file-outline me-2"></i>Draft</a>
                                            <a href="#"><i class="mdi mdi-send-check-outline me-2"></i>Sent Mail</a>
                                            <a href="#"><i class="mdi mdi-trash-can-outline me-2"></i>Trash</a>
                                        </div>

                                        <div>
                                            <h6 class="mt-4">Labels</h6>
        
                                            <div class="mail-list mt-1">
                                                <a href="#"><span class="mdi mdi-circle-outline me-2 text-info"></span>Theme Support</a>
                                                <a href="#"><span class="mdi mdi-circle-outline me-2 text-warning"></span>Freelance</a>
                                                <a href="#"><span class="mdi mdi-circle-outline me-2 text-primary"></span>Social</a>
                                                <a href="#"><span class="mdi mdi-circle-outline me-2 text-danger"></span>Friends</a>
                                                <a href="#"><span class="mdi mdi-circle-outline me-2 text-success"></span>Family</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="btn-toolbar" role="toolbar">
                                        <div class="btn-group me-2 mb-3">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="btn-group me-2 mb-3">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn-toolbar justify-content-md-end" role="toolbar">
                                        <div class="btn-group ms-md-2 mb-3">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Updates</a>
                                                <a class="dropdown-item" href="#">Social</a>
                                                <a class="dropdown-item" href="#">Team Manage</a>
                                            </div>
                                        </div>
        
                                        <div class="btn-group ms-2 mb-3">
                                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                More <i class="mdi mdi-dots-vertical ms-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Mark as Unread</a>
                                                <a class="dropdown-item" href="#">Mark as Important</a>
                                                <a class="dropdown-item" href="#">Add to Tasks</a>
                                                <a class="dropdown-item" href="#">Add Star</a>
                                                <a class="dropdown-item" href="#">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="d-flex mb-4">
                                            <div class="flex-shrink-0 me-3">
                                                <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-1.jpg" alt="Generic placeholder image">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h4 class="font-size-16">Frankie Dyer</h4>
                                                <p class="text-muted font-size-13">support@domain.com</p>
                                            </div>
                                        </div>
                                        <h4 class="font-size-16">This Week's Top Stories</h4>
        
                                        <p>Dear Shane,</p>
                                        <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus
                                            convallis.</p>
                                        <p>Sed elementum turpis eu lorem interdum, sed porttitor eros commodo. Nam eu venenatis tortor, id lacinia diam. Sed aliquam in dui et porta. Sed bibendum orci non tincidunt ultrices. Vivamus fringilla, mi lacinia dapibus condimentum, ipsum urna lacinia
                                            lacus, vel tincidunt mi nibh sit amet lorem.</p>
                                        <p>Sincerly,</p>
                                        <hr/>

                                        <div class="row">
                                            <div class="col-xl-2 col-6">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                                                    <div class="py-2 text-center">
                                                        <a href="" class="fw-medium">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-6">
                                                <div class="card">
                                                    <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                                                    <div class="py-2 text-center">
                                                        <a href="" class="fw-medium">Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <a href="email-compose.php" class="btn btn-secondary waves-effect mt-4"><i class="mdi mdi-reply"></i> Reply</a>
                                    </div>
                                </div>
                                <!-- end card -->

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
