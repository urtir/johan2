<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Buttons')); ?>
        
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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'UI Elements' , 'title' => 'Buttons')); ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Basic Examples</h4>
                                        <p class="card-title-desc">Bootstrap includes six predefined button styles, each serving its own semantic purpose.</p>

                                        <!-- Basic Examples -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Primary</button>
                                            <button type="button" class="btn btn-secondary waves-effect waves-light">Secondary</button>
                                            <button type="button" class="btn btn-success waves-effect waves-light">Success</button>
                                            <button type="button" class="btn btn-info waves-effect waves-light">Info</button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light">Warning</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">Danger</button>
                                            <button type="button" class="btn btn-light waves-effect">Light</button>
                                            <button type="button" class="btn btn-dark waves-effect waves-light">Dark</button>
                                            <button type="button" class="btn btn-link waves-effect">Link</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Outline Buttons</h4>
                                        <p class="card-title-desc">In need of a button, but not the hefty
                                            background colors they bring? Replace the default modifier classes with
                                            the <code>.btn-outline-*</code> ones to remove
                                            all background images and colors on any button.</p>

                                        <!-- Outline Buttons -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Primary</button>
                                            <button type="button" class="btn btn-outline-secondary waves-effect waves-light">Secondary</button>
                                            <button type="button" class="btn btn-outline-success waves-effect waves-light">Success</button>
                                            <button type="button" class="btn btn-outline-info waves-effect waves-light">Info</button>
                                            <button type="button" class="btn btn-outline-warning waves-effect waves-light">Warning</button>
                                            <button type="button" class="btn btn-outline-danger waves-effect waves-light">Danger</button>
                                            <button type="button" class="btn btn-outline-dark waves-effect waves-light">Dark</button>
                                            <button type="button" class="btn btn-outline-light waves-effect">Light</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Rounded Buttons</h4>
                                        <p class="card-title-desc">Use class <code>.btn-rounded</code> for button round border.</p>

                                        <!-- Rounded Buttons -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Primary</button>
                                            <button type="button" class="btn btn-light btn-rounded waves-effect">Light</button>
                                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Success</button>
                                            <button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Info</button>
                                            <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light">Warning</button>
                                            <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Danger</button>
                                            <button type="button" class="btn btn-dark btn-rounded waves-effect waves-light">Dark</button>
                                            <button type="button" class="btn btn-link btn-rounded waves-effect">Link</button>
                                            <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light">Secondary</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Buttons with Icon</h4>
                                        <p class="card-title-desc">Add icon in button.</p>

                                        <!-- Buttons with Icon -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Primary <i class="ri-arrow-right-line align-middle ms-2"></i> 
                                            </button>
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <i class="ri-check-line align-middle me-2"></i> Success
                                            </button>
                                            <button type="button" class="btn btn-warning waves-effect waves-light">
                                                <i class="ri-error-warning-line align-middle me-2"></i> Warning
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                                <i class="ri-close-line align-middle me-2"></i> Danger
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->                      

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Tags</h4>
                                        <p class="card-title-desc">The <code>.btn</code>
                                            classes are designed to be used with the <code>&lt;button&gt;</code> element.
                                            However, you can also use these classes on <code>&lt;a&gt;</code> or <code>&lt;input&gt;</code> elements (though
                                            some browsers may apply a slightly different rendering).</p>

                                        <!-- Buttons Tags -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-success" href="#" role="button">Link</a>
                                            <button class="btn btn-primary" type="submit">Button</button>
                                            <input class="btn btn-info" type="button" value="Input">
                                            <input class="btn btn-warning" type="submit" value="Submit">
                                            <input class="btn btn-danger" type="reset" value="Reset">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Sizes</h4>
                                        <p class="card-title-desc">Fancy larger or smaller buttons? Add
                                            <code>.btn-lg</code> or <code>.btn-sm</code> for additional sizes.
                                        </p>

                                        <!-- Buttons Size -->
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <button type="button" class="btn btn-info btn-lg waves-effect waves-light">Large Button</button>
                                            <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light">Large Button</button>
                                            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">Small Button</button>
                                            <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Small Button</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Disabled State</h4>
                                        <p class="card-title-desc">Make buttons look inactive by adding the <code>disabled</code> boolean attribute to any <code>&lt;button&gt;</code> element. Disabled buttons have <code>pointer-events: none</code> applied to, preventing hover and active states from triggering.</p>

                                        <!-- Button Disabled state -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <button type="button" class="btn btn-primary" disabled>Primary Button</button>
                                            <button type="button" class="btn btn-secondary" disabled>Button</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Link Functionality Caveat Disable Buttons</h4>
                                        <p class="card-title-desc"><code>&lt;a&gt;</code>s don’t support the <code>disabled</code> attribute, so you must add the <code>.disabled</code> class and <code>aria-disabled="true"</code> to make it visually appear disabled. also include a <code>tabindex="-1"</code> attribute.</p>

                                        <!-- Link Functionality Caveat Disable Buttons -->
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-primary disabled" role="button" aria-disabled="true">Primary link</a>
                                            <a class="btn btn-secondary disabled" role="button" aria-disabled="true">Link</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Block Buttons</h4>
                                        <p class="card-title-desc">Create block level buttons—those that
                                            span the full width of a parent—by adding <code>.d-grid</code>.</p>

                                        <!-- Block Buttons (Full Width Buttton) -->
                                        <div class="d-grid flex-wrap gap-2 align-items-center">
                                            <button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Block level button</button>
                                            <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Block level button</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Toggle States</h4>
                                        <p class="card-title-desc">Add <code>data-bs-toggle="button"</code>
                                            to toggle a button’s <code>active</code>
                                            state. If you’re pre-toggling a button, you must manually add the <code>.active</code> class
                                            <strong>and</strong> <code>aria-pressed="true"</code> to the
                                            <code>&lt;button&gt;</code>.
                                        </p>

                                        <!-- Toggle States -->
                                        <div class="d-flex flex-wrap gap-3">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off">Toggle Button</button>
                                            <button type="button" class="btn btn-primary active" data-bs-toggle="button" autocomplete="off"
                                                aria-pressed="true">Active toggle Button</button>
                                            <button type="button" class="btn btn-primary" disabled data-bs-toggle="button" autocomplete="off">Disabled
                                                toggle
                                                Button</button>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            <a href="#" class="btn btn-primary" role="button" data-bs-toggle="button">Toggle link</a>
                                            <a href="#" class="btn btn-primary active" role="button" data-bs-toggle="button" aria-pressed="true">Active Toggle link</a>
                                            <a class="btn btn-primary disabled" aria-disabled="true" role="button" data-bs-toggle="button">Disabled Toggle link</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Group</h4>
                                        <p class="card-title-desc">Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.</p>
                                    
                                        <!-- Button Group -->
                                        <div class="d-flex flex-wrap gap-3 align-items-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary">Left</button>
                                                <button type="button" class="btn btn-primary">Middle</button>
                                                <button type="button" class="btn btn-primary">Right</button>
                                            </div>
                                    
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary active" aria-current="page">Active link</a>
                                                <a href="#" class="btn btn-primary">Link</a>
                                                <a href="#" class="btn btn-primary">Link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Group Style</h4>
                                        <p class="card-title-desc">Wrap a series of buttons with Mixed Style and Outline button</p>
        
                                        <!-- Button Group Style -->
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-danger">Left</button>
                                                <button type="button" class="btn btn-warning">Middle</button>
                                                <button type="button" class="btn btn-success">Right</button>
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-primary">Left</button>
                                                <button type="button" class="btn btn-outline-primary">Middle</button>
                                                <button type="button" class="btn btn-outline-primary">Right</button>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="card-title">Checkbox Buttons</h4>
                                        <p class="card-title-desc">Bootstrap’s <code>.button</code> styles can be applied to
                                            other elements, such as <code> &lt;label&gt;</code>s, to provide checkbox style button
                                            toggling. Add <code>data-bs-toggle="buttons"</code> to a
                                            <code>.btn-group</code> containing those
                                            modified buttons to enable toggling in their respective styles.
                                        </p>

                                        <!-- Checkbox Buttons -->
                                        <div class="d-flex flex-wrap gap-3 align-items-start">
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck1">Checkbox 1</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck2">Checkbox 2</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck3">Checkbox 3</label>
                                            </div>

                                            <!-- Checkbox Outline Buttons -->
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck4">Checkbox 4</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck5">Checkbox 5</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck6">Checkbox 6</label>
                                            </div>
                                        </div>

                                        <!-- Checkbox Buttons With Icon -->
                                        <div class="d-flex flex-wrap gap-3 align-items-start mt-2">
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck7"><i class="mdi mdi-microphone"></i> Singing</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck8"><i class="mdi mdi-book-open"></i> Reading</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck9"><i class="mdi mdi-gamepad-variant-outline"></i> Playing</label>
                                            </div>

                                            <!-- Checkbox Outline Buttons -->
                                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck10" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck10"><i class="mdi mdi-microphone"></i> Singing</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck11" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck11"><i class="mdi mdi-book-open"></i> Reading</label>
                                            
                                                <input type="checkbox" class="btn-check" id="btncheck12" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck12"><i class="mdi mdi-gamepad-variant-outline"></i> Playing</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="card-title">Radio Buttons</h4>
                                        <p class="card-title-desc">Bootstrap’s <code>.button</code> styles can be applied to
                                            other elements, such as <code> &lt;label&gt;</code>s, to provide radio style button
                                            toggling. Add <code>data-bs-toggle="buttons"</code> to a
                                            <code>.btn-group</code> containing those
                                            modified buttons to enable toggling in their respective styles.
                                        </p>
        
                                        <!-- Radio Buttons -->
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                                <label class="btn btn-primary" for="btnradio1">Radio 1</label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-primary" for="btnradio2">Radio 2</label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                                <label class="btn btn-primary" for="btnradio3">Radio 3</label>
                                            </div>

                                            <!-- Radio Outline Buttons -->
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="btnradio4">Radio 4</label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio5">Radio 5</label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio6" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio6">Radio 6</label>
                                            </div>
                                        </div>

                                        <!-- Radio Buttons With Icons -->
                                        <div class="d-flex flex-wrap gap-3 mt-2">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioMale" autocomplete="off" checked>
                                                <label class="btn btn-primary" for="btnradioMale"><i class="mdi mdi-human-male"></i> Male</label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioFemale" autocomplete="off">
                                                <label class="btn btn-primary" for="btnradioFemale"><i class="mdi mdi-human-female"></i> Female</label>
                                            </div>

                                            <!-- Radio Outline Buttons -->
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="align-left" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="align-left"><i class="mdi mdi-format-align-left"></i></label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="align-center" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="align-center"><i class="mdi mdi-format-align-center"></i></label>
                                                
                                                <input type="radio" class="btn-check" name="btnradio" id="align-right" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="align-right"><i class="mdi mdi-format-align-right"></i></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Toolbar</h4>
                                        <p class="card-title-desc">Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.</p>

                                        <!-- Button Toolbar -->
                                        <div class="d-flex flex-wrap gap-3 align-items-center">
                                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                                <div class="btn-group me-2" role="group" aria-label="First group">
                                                    <button type="button" class="btn btn-primary">1</button>
                                                    <button type="button" class="btn btn-primary">2</button>
                                                    <button type="button" class="btn btn-primary">3</button>
                                                    <button type="button" class="btn btn-primary">4</button>
                                                </div>
                                                <div class="btn-group me-2" role="group" aria-label="Second group">
                                                    <button type="button" class="btn btn-secondary">5</button>
                                                    <button type="button" class="btn btn-secondary">6</button>
                                                    <button type="button" class="btn btn-secondary">7</button>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Third group">
                                                    <button type="button" class="btn btn-info">8</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Nesting</h4>
                                        <p class="card-title-desc">Place a <code>.btn-group</code> within another <code>.btn-group</code> when you want dropdown menus mixed with a series of buttons.</p>

                                        <!-- Button Toolbar -->
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-primary">1</button>
                                            <button type="button" class="btn btn-primary">2</button>

                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Dropdown <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                    <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Button Group Size</h4>
                                        <p class="card-title-desc">Instead of applying button sizing classes to every button in a group, just add
                                            <code>.btn-group-*</code> to each <code>.btn-group</code>, including each one when nesting multiple
                                            groups.
                                        </p>

                                        <!-- Button Toolbar -->
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                                                <button type="button" class="btn btn-outline-primary">Left</button>
                                                <button type="button" class="btn btn-outline-primary">Middle</button>
                                                <button type="button" class="btn btn-outline-primary">Right</button>
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Default button group">
                                                <button type="button" class="btn btn-outline-danger">Left</button>
                                                <button type="button" class="btn btn-outline-danger">Middle</button>
                                                <button type="button" class="btn btn-outline-danger">Right</button>
                                            </div>

                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <button type="button" class="btn btn-outline-warning">Left</button>
                                                <button type="button" class="btn btn-outline-warning">Middle</button>
                                                <button type="button" class="btn btn-outline-warning">Right</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Vertical Variation</h4>
                                        <p class="card-title-desc">Make a set of buttons appear vertically
                                            stacked rather than horizontally. <b>Split button dropdowns are not
                                                supported here.</b></p>
                                    
                                        <div class="d-flex flex-wrap gap-4 align-items-end">

                                            <!-- Vertical Variation Button -->
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                <button type="button" class="btn btn-secondary">Button</button>
                                                <button type="button" class="btn btn-secondary">Button</button>
                                                <button type="button" class="btn btn-secondary">Button</button>
                                            </div>

                                            <!-- Vertical Variation Outline Button -->
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                <button type="button" class="btn btn-outline-danger">Button</button>
                                                <button type="button" class="btn btn-outline-danger">Button</button>
                                                <button type="button" class="btn btn-outline-danger">Button</button>
                                            </div>

                                            <!-- Vertical Variation Button With Dropdown -->
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                <button type="button" class="btn btn-secondary">Button</button>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Dropdown <i class="mdi mdi-chevron-down"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-secondary">Button</button>
                                            </div>

                                            <!-- Vertical Variation Checkbox Button -->
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
                                                <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked>
                                                <label class="btn btn-outline-danger" for="vbtn-radio1">Radio 1</label>
                                                <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="vbtn-radio2">Radio 2</label>
                                                <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
                                                <label class="btn btn-outline-danger" for="vbtn-radio3">Radio 3</label>
                                            </div>

                                            <!-- Vertical Variation Checkbox Outline Button -->
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck13" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck13"><i class="mdi mdi-microphone"></i> Singing</label>

                                                <input type="checkbox" class="btn-check" id="btncheck14" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck14"><i class="mdi mdi-book-open"></i> Reading</label>

                                                <input type="checkbox" class="btn-check" id="btncheck15" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck15"><i class="mdi mdi-gamepad-variant-outline"></i>
                                                    Playing</label>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div><!-- end col -->
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
