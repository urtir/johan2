<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Typography')); ?>
        
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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Typography')); ?>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Headings</h4>
                                        <p class="card-title-desc">All HTML headings, <code
                                                >&lt;h1&gt;</code> through <code
                                                >&lt;h6&gt;</code>, are available.</p>
        
                                        <h1>h1. Bootstrap heading <small class="text-muted font-size-14">Semibold 2.19rem (35px)</small></h1>
                                        <h2>h2. Bootstrap heading <small class="text-muted font-size-14">Semibold 1.75rem (28px)</small></h2>
                                        <h3>h3. Bootstrap heading <small class="text-muted font-size-14">Semibold 1.53rem (24.5px)</small></h3>
                                        <h4>h4. Bootstrap heading <small class="text-muted font-size-14">Semibold 1.31rem (21px)</small></h4>
                                        <h5>h5. Bootstrap heading <small class="text-muted font-size-14">Semibold 1.09rem (17.5px)</small></h5>
                                        <h6 class="mb-0">h6. Bootstrap heading <small class="text-muted font-size-14">Semibold .875rem (14px)</small></h6>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Inline text elements</h4>
                                        <p class="card-title-desc">Styling for common inline HTML5 elements.</p>
        
                                        <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                                        <p><del>This line of text is meant to be treated as deleted text.</del></p>
                                        <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                                        <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                                        <p><u>This line of text will render as underlined</u></p>
                                        <p><small>This line of text is meant to be treated as fine print.</small></p>
                                        <p><strong>This line rendered as bold text.</strong></p>
                                        <p class="mb-0"><em>This line rendered as italicized text.</em></p>
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Unstyled List</h4>
                                        <p class="card-title-desc">Remove the default <code
                                                >list-style</code> and left margin on list
                                            items (immediate children only). <strong>This only applies to immediate
                                                children list items</strong>, meaning you will need to add the class
                                            for any nested lists as well.</p>
        
                                        <ul class="list-unstyled mb-0">
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Nulla volutpat aliquam velit
                                                <ul>
                                                    <li>Phasellus iaculis neque</li>
                                                    <li>Purus sodales ultricies</li>
                                                    <li>Vestibulum laoreet porttitor sem</li>
                                                </ul>
                                            </li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                        </ul>
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Display headings</h4>
                                        <p class="card-title-desc">Traditional heading elements are designed to work best in the meat of your page content. </p>
        
                                        <h1 class="display-1">Display 1</h1>
                                        <h1 class="display-2">Display 2</h1>
                                        <h1 class="display-3">Display 3</h1>
                                        <h1 class="display-4">Display 4</h1>
                                        <h1 class="display-5">Display 5</h1>
                                        <h1 class="display-6 mb-0">Display 6</h1>
        
                                    </div>
                                </div>
        
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Blockquotes</h4>
                                        <p class="card-title-desc">For quoting blocks of content from
                                            another source within your document. Wrap <code
                                                    >&lt;blockquote
                                                class="blockquote"&gt;</code> around any <abbr
                                                    title="HyperText Markup Language">HTML</abbr> as the quote.</p>
        
                                        <blockquote class="blockquote">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                        </blockquote>
        
                                        <blockquote class="blockquote blockquote-reverse mb-0">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                        </blockquote>
        
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        <div class="row">
                            <div class="col-12">
        
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Description list alignment</h4>
                                        <p class="card-title-desc">Align terms and descriptions
                                            horizontally by using our grid system’s predefined classes (or semantic
                                            mixins). For longer terms, you can optionally add a <code
                                                    >.text-truncate</code> class to
                                            truncate the text with an ellipsis.</p>
        
                                        <dl class="row mb-0">
                                            <dt class="col-sm-3">Description lists</dt>
                                            <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
        
                                            <dt class="col-sm-3">Euismod</dt>
                                            <dd class="col-sm-9">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                            <dd class="col-sm-9 offset-sm-3">Donec id elit non mi porta gravida at eget metus.</dd>
        
                                            <dt class="col-sm-3">Malesuada porta</dt>
                                            <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>
        
                                            <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                                            <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
        
                                            <dt class="col-sm-3">Nesting</dt>
                                            <dd class="col-sm-9">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-4">Nested definition list</dt>
                                                    <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc.</dd>
                                                </dl>
                                            </dd>
                                        </dl>
        
                                    </div>
                                </div>
        
                            </div><!-- end col -->
                        </div><!-- end row -->  

                    </div><!-- container-fluid -->
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
