<!--========= Start - script =========-->
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
<script>
    $(document).ready(function() {
        $('#dt_productList').dataTable({
            //responsive: true, // not compatible
            scrollY: 1000,
            scrollX: true,
            scrollCollapse: true,
            // paging: false,
            fixedHeader: true,
            //fixedColumns:   true,
            fixedColumns: {
                leftColumns: 2
            },
            columnDefs: [{
                    targets: -1,
                    title: 'Action Controls',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        /*
                        -- ES6
                        -- convert using https://babeljs.io online transpiler
                        return `
                        <div class='d-flex mt-2'>
                        	<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger mr-2' title='Delete Record'>
                        		<i class="fal fa-times"></i> Delete Record
                        	</a>
                        	<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary mr-2' title='Edit'>
                        		<i class="fal fa-edit"></i> Edit
                        	</a>
                        	<div class='dropdown d-inline-block'>
                        		<a href='#'' class='btn btn-sm btn-outline-primary mr-2' data-toggle='dropdown' aria-expanded='true' title='More options'>
                        			<i class="fal fa-plus"></i>
                        		</a>
                        		<div class='dropdown-menu'>
                        			<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                        			<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                        		</div>
                        	</div>
                        </div>`;
                        	
                        ES5 example below:	

                        */
                        return "\n\t\t\t\t\t\t<div class='d-flex demo'>\n\t\t\t\t\t\t\t<button id=''  class='btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1' title='View Details'><i class=\"fal fa-eye\"></i></button>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1' title='Edit'><i class=\"fal fa-edit\"></i></a>\n\t\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1' title='Delete Record'><i class=\"fal fa-times\"></i></a>\n\t\t\t\t\t\t\t<div class='dropdown d-inline-block'>\n\t\t\t\t\t\t\t\t<a href='#' class='btn btn-sm btn-outline-primary btn-icon' data-toggle='dropdown' aria-expanded='true' title='More options'><i class=\"fal fa-plus\"></i></a>\n\t\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                    },
                },

            ],
        });
    });
</script>
<script>
    // Class definition
    var controls = {
        leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
        rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }
    $(document).ready(function() {
        // orientation 
        $('#datepicker_start').datepicker({
            orientation: "top left",
            todayHighlight: true,
            templates: controls
        });

        $('#datepicker_end').datepicker({
            orientation: "top right",
            todayHighlight: true,
            templates: controls
        });
        // range picker
        $('#dateRangePicker').datepicker({
            todayHighlight: true,
            templates: controls
        });
    });
</script>
<!-- ==========End - script========== -->
<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?php echo $title; ?></a>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li><!-- date -->
    </ol>
    <div hidden id="alert_div" class="alert alert-primary">
        <div class="d-flex flex-start w-100">
            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <p class="m-0">
                        <?php
                        $session = session();
                        $insert_alert = $session->getFlashdata('insert_alert');
                        if ($insert_alert) {
                        ?>
                            <script>
                                document.getElementById("alert_div").hidden = false;
                            </script>
                            <?php
                            echo '<font style="color:green">' . $insert_alert . '</font>';
                            // $this->session->remove('insert_alert');
                            ?>
                        <?php
                        }
                        $delete_alert = $session->getFlashdata('delete_alert');
                        if ($delete_alert) {
                        ?>
                            <script>
                                document.getElementById("alert_div").hidden = false;
                            </script>
                            <?php
                            echo '<font style="color:red">' . $delete_alert . '</font>';
                            // $this->session->remove('delete_alert');
                            ?>
                        <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--***************** Your main content goes below here: ******************-->
    <!-- **********************************Start************************************ -->
    <!-- ------------**1stDiv**-------- -->
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <!-- -------- -->

                <div class="panel-container show">
                    <div class="panel-hdr bg-primary-500">
                        <h2>
                            <i class="fal fa-list-alt"></i>&nbsp; Product List
                        </h2>
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-success">
                                        <i class="fal fa-tag"></i>
                                    </span>
                                </div>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Product Code" id="user">
                                <div class="input-group-append input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fal fa-globe-snow"></i>
                                    </span>
                                </div>
                                <select class="custom-select" id="Category" aria-label="Category">
                                    <option selected="" disabled>Category</option>
                                    <option value="Chair">Chair</option>
                                    <option value="Sofa">Sofa</option>
                                    <option value="Customize Order">Customize Order</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-success shadow-0"><i class="fal fa-search"> Filter</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt_productList" class="table table-bordered table-hover table-striped w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SN.</th>
                                    <th>Category</th>
                                    <th>DB ID</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Sale Price</th>
                                    <th>Cost Price</th>
                                    <th>Color</th>
                                    <th>Wages</th>
                                    <th>Quantity Set</th>
                                    <th>Entry Date</th>
                                    <th title="Active ? Inactive">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>111</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active">
                                                    <label class="custom-control-label" for="customSwitch2"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>222</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="22" name="2222" checked>
                                                    <label class="custom-control-label" for="22">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="222" name="2222">
                                                    <label class="custom-control-label" for="222">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>333</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="33" name="3333" checked>
                                                    <label class="custom-control-label" for="33">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="333" name="3333">
                                                    <label class="custom-control-label" for="333">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>444</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="44" name="4444" checked>
                                                    <label class="custom-control-label" for="44">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="444" name="4444">
                                                    <label class="custom-control-label" for="444">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>555</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="55" name="5555" checked>
                                                    <label class="custom-control-label" for="55">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="555" name="5555">
                                                    <label class="custom-control-label" for="555">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>666</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>96.86623</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="66" name="6666" checked>
                                                    <label class="custom-control-label" for="66">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="666" name="6666">
                                                    <label class="custom-control-label" for="666">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>777</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="77" name="7777" checked>
                                                    <label class="custom-control-label" for="77">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="777" name="7777">
                                                    <label class="custom-control-label" for="777">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Samuel A. Townsend</td>
                                    <td>888</td>
                                    <td>Togo</td>
                                    <td>Monceau-sur-Sambre</td>
                                    <td>Dorian Mcintyre</td>
                                    <td>Gravida Molestie PC</td>
                                    <td>00439892299</td>
                                    <td>17.61388</td>
                                    <td>96.86623</td>
                                    <td>2019-10-06 21:27:12</td>
                                    <td>
                                        <div class="input-group flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="active" id="88" name="8888" checked>
                                                    <label class="custom-control-label" for="88">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" value="inactive" id="888" name="8888">
                                                    <label class="custom-control-label" for="888">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************Rnd Your main content. ******************-->

</main>
<!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->