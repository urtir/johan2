<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Toasts')); ?>
        
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
                        
                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Toasts')); ?>
        
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Live Example</h5>
                                        <p class="card-title-des">Click the button below to show a toast (positioned with our
                                            utilities in the
                                            lower right corner) that has been hidden by default.</p>
        
                                            <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

                                            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                                    <div class="toast-header">
                                                        <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                                                        <strong class="me-auto">Upzet</strong>
                                                        <small class="text-muted">11 mins ago</small>
                                                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="toast-body">
                                                        Hello, world! This is a toast message.
                                                    </div>
                                                </div>
                                            </div>
        
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

                                        <h5 class="card-title">Basic Toast</h5>
                                        <p class="card-title-desc">Toasts are as flexible as you need and have very little
                                            required markup.
                                            At a minimum, we require a single element to contain your
                                            “toasted” content and strongly encourage a dismiss button.</p>

                                        <div style="min-height: 110px;">
                                            <div class="toast fade show" role="alert" aria-live="assertive"
                                                data-bs-autohide="false" aria-atomic="true">
                                                <div class="toast-header">
                                                    <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                                                    <strong class="me-auto">Upzet</strong>
                                                    <small class="text-muted">11 mins ago</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body">
                                                    Hello, world! This is a toast message.
                                                </div>
                                            </div>
                                        </div>
                                        <!--end toast-->
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h5 class="card-title">Translucent</h5>
                                        <p class="card-title-desc">Toasts are slightly translucent, too, so they blend over
                                            whatever they might appear over. For browsers that
                                            support the <code>backdrop-filter</code> CSS property,
                                            we’ll also attempt to blur the elements under a toast.</p>
        
                                        <div style="min-height: 110px;">
                                            <div class="toast fade show" role="alert" aria-live="assertive"
                                                data-bs-autohide="false" aria-atomic="true">
                                                <div class="toast-header">
                                                    <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                                                    <strong class="me-auto">Upzet</strong>
                                                    <small class="text-muted">11 mins ago</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body">
                                                    Hello, world! This is a toast message.
                                                </div>
                                            </div>
                                            <!--end toast-->
                                        </div>
                                        <!--end /div-->
        
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
        
                                        <h5 class="card-title">Stacking</h5>
                                        <p class="card-title-desc">For systems that generate more notifications, consider using
                                            a wrapping element
                                            so they can easily stack.</p>
        
                                        <div style="min-height: 230px;">
                                            <div aria-live="polite" aria-atomic="true" class="position-relative">
                                                <!-- Position it: -->
                                                <!-- - `.toast-container` for spacing between toasts -->
                                                <!-- - `.position-absolute`, `top-0` & `end-0` to position the toasts in the upper right corner -->
                                                <!-- - `.p-3` to prevent the toasts from sticking to the edge of the container  -->
                                                <div class="toast-container position-absolute top-0 end-0 p-2 p-lg-3">
        
                                                    <!-- Then put toasts within -->
                                                    <div class="toast fade show" role="alert" aria-live="assertive"
                                                        data-bs-autohide="false" aria-atomic="true">
                                                        <div class="toast-header">
                                                            <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                                                            <strong class="me-auto">Upzet</strong>
                                                            <small class="text-muted">just now</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                            See? Just like this.
                                                        </div>
                                                    </div>
        
                                                    <div class="toast fade show" role="alert" aria-live="assertive"
                                                        data-bs-autohide="false" aria-atomic="true">
                                                        <div class="toast-header">
                                                            <img src="assets/images/logo-sm.png" alt="" class="me-2" height="18">
                                                            <strong class="me-auto">Upzet</strong>
                                                            <small class="text-muted">2 sec ago</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                            Heads up, toasts will stack automatically
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end /div-->
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h5 class="card-title">Custom content</h5>
                                        <p class="card-title-desc">Customize your toasts by removing sub-components, tweaking them with utilities, or by adding your own markup.</p>
                                     
                                        <div class="d-flex flex-column gap-3">
                                            <div aria-live="polite" aria-atomic="true" class="position-relative">
                                                <div class="toast fade show" role="alert" aria-live="assertive"
                                                    aria-atomic="true">
                                                    <div class="toast-body">
                                                        Hello, world! This is a toast message.
                                                        <div class="mt-2 pt-2 border-top">
                                                            <button type="button" class="btn btn-primary btn-sm">Take
                                                                action</button>
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="toast">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="toast align-items-center fade show" role="alert" aria-live="assertive" aria-atomic="true">
                                                <div class="d-flex">
                                                    <div class="toast-body">
                                                        Hello, world! This is a toast message.
                                                    </div>
                                                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                            </div>

                                            <div aria-live="polite" aria-atomic="true">
                                                <div class="toast fade show align-items-center text-white bg-primary border-0"
                                                    role="alert" aria-live="assertive" aria-atomic="true">
                                                    <div class="d-flex">
                                                        <div class="toast-body">
                                                            Hello, world! This is a toast message.
                                                        </div>
                                                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                            data-bs-dismiss="toast" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end /div-->
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
        
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Toasts Example</h5>
                                        <p class="card-title-des">Click the button below to show a toast</p>
        
                                        <div class="d-flex flex-wrap gap-2">
                                            <div class="position-relative">
                                                <div class="hstack flex-wrap gap-2">
                                                    <button type="button" class="btn btn-primary" id="borderedToast1Btn">Primary toast</button>
                                                    <button type="button" class="btn btn-success" id="borderedToast2Btn">Success toast</button>
                                                    <button type="button" class="btn btn-warning" id="borderedTost3Btn">Warning toast</button>
                                                    <button type="button" class="btn btn-danger" id="borderedToast4Btn">danger toast</button>
                                                </div>
            
                                                <div style="z-index: 11">
                                                    <div id="borderedToast1" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="align-items-center text-white bg-primary border-0">
                                                            <div class="d-flex">
                                                                <div class="toast-body">
                                                                    Hello, world! This is a toast message.
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div style="z-index: 11">
                                                    <div id="borderedToast2" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="align-items-center text-white bg-success border-0">
                                                            <div class="d-flex">
                                                                <div class="toast-body">
                                                                    Hello, world! This is a toast message.
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div style="z-index: 11">
                                                    <div id="borderedTost3" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="align-items-center text-white bg-warning border-0">
                                                            <div class="d-flex">
                                                                <div class="toast-body">
                                                                    Hello, world! This is a toast message.
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div style="z-index: 11">
                                                    <div id="borderedToast4" class="toast overflow-hidden mt-3" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="align-items-center text-white bg-danger border-0">
                                                            <div class="d-flex">
                                                                <div class="toast-body">
                                                                    Hello, world! This is a toast message.
                                                                </div>
                                                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Live Example</h5>
                                        <p class="card-title-des">Click the button below to show a toast (positioned with our
                                            utilities in the
                                            lower right corner) that has been hidden by default.</p>

                                            <form>
                                                <div class="mb-3">
                                                    <select class="form-select mt-2" id="selectToastPlacement">
                                                        <option value="" selected>Select a position...</option>
                                                        <option value="top-0 start-0">Top left</option>
                                                        <option value="top-0 start-50 translate-middle-x">Top center</option>
                                                        <option value="top-0 end-0">Top right</option>
                                                        <option value="top-50 start-0 translate-middle-y">Middle left</option>
                                                        <option value="top-50 start-50 translate-middle">Middle center</option>
                                                        <option value="top-50 end-0 translate-middle-y">Middle right</option>
                                                        <option value="bottom-0 start-0">Bottom left</option>
                                                        <option value="bottom-0 start-50 translate-middle-x">Bottom center</option>
                                                        <option value="bottom-0 end-0">Bottom right</option>
                                                    </select>
                                                </div>
                                            </form>
                                            <div aria-live="polite" aria-atomic="true" class="bd-example bg-light position-relative" style="height: 300px;">
                                                <div class="toast-container position-absolute p-3" id="toastPlacement">
                                                    <div class="toast">
                                                        <div class="toast-header">
                                                            <img src="assets/images/logo-sm.png" class="rounded me-2"
                                                                alt="..." height="20">
                                                            <strong class="me-auto">Upzet</strong>
                                                            <small>11 mins ago</small>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                            Hello, world! This is a toast message.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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

        <!-- Bootstrap Toasts Js -->
        <script src="assets/js/pages/bootstrap-toasts.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
