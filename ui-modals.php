<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Modals')); ?>
        
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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Modals')); ?>

                        <!-- Start Row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Modals Examples</h4>
                                        <p class="card-title-desc">Modals are streamlined, but flexible
                                            dialog prompts powered by JavaScript. They support a number of use cases
                                            from user notification to completely custom content and feature a
                                            handful of helpful subcomponents, sizes, and more.</p>

                                        <div class="modal bs-example-modal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>One fine body&hellip;</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">

                                        <h4 class="card-title">Modal Demos</h4>
                                        <p class="card-title-desc">Toggle a working modal demo by clicking the button below.</p>
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0">

                                                <tbody>
                                                    <tr>
                                                        <td>Standard Modal</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Modal Demo</button>
                                                            <!-- sample modal content -->
                                                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5 class="font-size-16">Overflowing text to show scroll behavior</h5>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Extra Large Modal</td>
                                                        <td>
                                                            <!-- Extra Large modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">Modal Demo</button>

                                                            <!--  Modal content for the above example -->
                                                            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Extra Large Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Large Modal</td>
                                                        <td>
                                                            <!-- Large modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Modal Demo</button>
                                                        
                                                            <!--  Modal content for the above example -->
                                                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myLargeModalLabel">Large Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Small Modal</td>
                                                        <td>
                                                            <!-- Small modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Modal Demo</button>
                                                            
                                                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="mySmallModalLabel">Small Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Center Modal</td>
                                                        <td>
                                                            <!-- Small modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Modal Demo</button>
                                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Center Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Scrollable Modal</td>
                                                        <td>
                                                            <!-- Small modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Modal demo</button>
                                                        
                                                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Scrollable Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>FullScreen Modal</td>
                                                        <td>

                                                            <!-- Full screen modal -->
                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Modal Demo</button>
                                                    
                                                            <!-- sample modal content -->
                                                            <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-fullscreen">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalFullscreenLabel">Fullscreen Modal</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>Overflowing text to show scroll behavior</h5>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                                                Praesent commodo cursus magna, vel scelerisque
                                                                                nisl consectetur et. Donec sed odio dui. Donec
                                                                                ullamcorper nulla non metus auctor
                                                                                fringilla.</p>
                                                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                                                Cras justo odio, dapibus ac facilisis in,
                                                                                egestas eget quam. Morbi leo risus, porta ac
                                                                                consectetur ac, vestibulum at eros.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Toggle Between Modals</td>
                                                        <td>
                                                            <div>
                                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#firstmodal">Modal Demo</button>

                                                                <!-- First modal dialog -->
                                                                <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Modal 1</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Show a second modal and hide this one with the button below.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <!-- Toogle to second dialog -->
                                                                                <button class="btn btn-primary" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Open Second Modal</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Second modal dialog -->
                                                                <div class="modal fade" id="secondmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Modal 2</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Hide this modal and show the first with the button below.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                                                                                <button class="btn btn-primary" data-bs-target="#firstmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to First</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Varying Modal Content</h4>
                                        <p class="card-title-desc">Modal of buttons that all trigger the same modal with slightly different contents. Use <code>event.relatedTarget</code> and HTML <code>data-bs-target</code> attributes to vary the contents of the modal depending on which button was clicked.</p>
                                        
                                        <div>
                                            <div class="d-flex flex-wrap gap-3">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@mdo">Open modal for @mdo</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@fat">Open modal for @fat</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>
                                            </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                                    <input type="text" class="form-control" id="recipient-name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                                    <textarea class="form-control" id="message-text"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Send message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
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

        <!-- Modal js -->
        <script src="assets/js/pages/modal.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>