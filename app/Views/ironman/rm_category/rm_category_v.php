<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
<script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
        $('#rm_category_id').dataTable({
            //responsive: true, // not compatible
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            // paging: false,
            fixedHeader: true,
            deferRender: true,
            scroller: true,
            //fixedColumns:   true,
            // fixedColumns: {
            //     leftColumns: 2
            // },
            columnDefs: [{
                    "targets": [0],
                    "orderable": false,

                },
                {
                    "targets": [4],
                    "orderable": false,

                },

            ],
        });
    });

    // Delete_category//
    function delete_alert(cat_id) {
        // console.log(cat_id);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url() ?>/ironman/rm_category_c/delete_category/' + cat_id,
                    method: 'get',

                    contentType: 'application/x-www-form-urlencoded',
                    success: function(response) {
                        location.reload();
                    },
                    error: function(err) {

                    }
                })
                // Swal.fire("Deleted!", "User has been deleted.");
            }
        }); //alert ends

    }
    //update_category_STATUS//
    function edit_status(item, id) {

        if (item.checked == true) {
            var status = "active";
        } else {
            var status = "inactive";
        }
        console.log(id);

        Swal.fire({
            title: "Are you sure?",
            text: "You want to update Status!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, update it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: "<?php echo base_url('ironman/rm_category_c/update_list_of_category_status') ?>",

                    method: 'post',
                    data: {
                        "rm_category_id": id,
                        "rm_category_status": status,
                    },
                    //   contentType: 'application/x-www-form-urlencoded',
                    success: function(response) {
                        console.log(response);
                        // return false;

                        location.reload();
                    },
                    error: function(err) {
                        console.log(err)

                    },

                })
            } else {
                location.reload();
            }
        }); //alert ends



    }
</script>

<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?php echo $title; ?></a>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div hidden id="alert_div" class="alert alert-success" id="success-alert">
        <div class="d-flex flex-start w-100">
            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <p class="m-0">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        <?php
                        $session = session();
                        $green_alert = $session->getFlashdata('green_alert');
                        if ($green_alert) {
                        ?>
                            <script>
                                document.getElementById("alert_div").hidden = false;
                            </script>
                        <?php
                            echo '<font>' . $green_alert . '</font>';
                        }
                        $red_alert = $session->getFlashdata('red_alert');
                        if ($red_alert) {
                        ?>
                            <script>
                                document.getElementById("alert_div").hidden = false;
                            </script>
                        <?php
                            echo '<font style="color:red">' . $red_alert . "<br>" . $session->get("warning") . '</font>';
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
                <div id="panel-2" class="panel" data-panel-fullscreen data-panel-close data-panel-collapsed data-panel-locked data-panel-reset data-panel-color data-panel-custombutton data-refresh-timer="3000">
                    <div class="panel-hdr">
                        <h2>
                            <i class="fal fa-layer-plus">&nbsp;</i>RM Category Create
                        </h2>
                    </div>
                    <!-- *****Filter Start****** -->
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- <div class="panel-tag"> -->
                            <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/Rm_category_c/insert_category") ?>" autocomplete="off">
                                <div class="panel-content">
                                    <!-- ------Div start-------- -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="addon-wrapping-left">Parent Category <b style="color: red;">*</b></label>
                                                <div class="input-group input-group-sm flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fal fa-layer-group"></i></span>
                                                    </div>
                                                    <select class="custom-select form-control is-invalid" name="rm_category_chain_parent" id="customControlValidation5" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title=" Parent Category is required!" required>
                                                        <option value="">-Select Category Parent-</option>
                                                        <option value="0">No Parent</option>
                                                        <?php
                                                        if ($categories) {
                                                            foreach ($categories as $cat) { ?>
                                                                <option value="<?php echo $cat->rm_category_id; ?>">
                                                                    <?php $cat_arr = explode(",", $cat->rm_category_chain_parent);
                                                                    $keys = array_keys($cat_arr);
                                                                    for ($i = 0, $l = count($cat_arr); $i < $l; ++$i) {
                                                                        $cat_arr_data_id = $cat_arr[$i];
                                                                        $this->rm_category_model = model('App\Models\ironman\Rm_category_m');
                                                                        $val = $this->rm_category_model->get_row_by_id($cat_arr_data_id);
                                                                        $isLastItem = ($i == ($l - 1));
                                                                        if ($cat_arr_data_id > $isLastItem) {
                                                                            echo $val->rm_category_name . ' > ';
                                                                        } elseif ($cat_arr_data_id == $isLastItem) {
                                                                            echo $val->rm_category_name;
                                                                        } else {
                                                                            echo ($val->rm_category_name);
                                                                        }
                                                                    }
                                                                    ?>
                                                                </option>
                                                        <?php }
                                                        } ?>

                                                    </select>
                                                </div>
                                                <div class="help-block">Select your parent RM category.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label " for="addon-wrapping-left">Category Name<b style="color: red;">*</b></label>
                                                <div class="input-group input-group-sm flex-nowrap">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                    </div>
                                                    <input type="text" name="rm_category_name" class="form-control is-invalid" placeholder="Enter Category name" aria-label="Full Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Category name is required!" required>
                                                </div>
                                                <span class="help-block">Enter RM category name.</span>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- -------Div End--------- -->

                                                   <!-- ------Status/button start-------- -->
                                    <?php if (crud_check("create")) : ?>
                                        <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                            <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                        </div>
                                    <?php endif ?>

                                    <!-- -------Div End--------- -->
                                </div>
                            </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="rm_category_id" class="table  table-bordered table-hover table-striped w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SN.</th>
                                    <th>Category Name</th>
                                    <th>Parent Category</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($categories) { ?>

                                    <?php foreach ($categories as $key => $cat) { ?>
                                        <tr>
                                            <td><?php echo  $key + 1 ?></td>
                                            <td> <?php echo  $cat->rm_category_name ?></td>
                                            <td><?php
                                                // echo $cat->rm_category_chain_parent;
                                                $cat_arr = explode(",", $cat->rm_category_chain_parent);
                                                $keys = array_keys($cat_arr);
                                                for ($i = 0, $l = count($cat_arr); $i < $l; ++$i) {
                                                    $cat_arr_data_id = $cat_arr[$i];
                                                    $this->rm_category_model = model('App\Models\ironman\Rm_category_m');
                                                    $val = $this->rm_category_model->get_row_by_id($cat_arr_data_id);
                                                    $isLastItem = ($i == ($l - 1));
                                                    if ($cat_arr_data_id > $isLastItem) {
                                                        echo $val->rm_category_name . ' > ';
                                                    } elseif ($cat_arr_data_id == $isLastItem) {
                                                        echo $val->rm_category_name;
                                                    } else {
                                                        echo ($val->rm_category_name);
                                                    }
                                                }


                                                ?></td>
                                            <td>
                                                <!-- echo $cat->rm_category_status -->
                                                <?php if ($cat->rm_category_status == "active") { ?>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" onchange="edit_status(this,<?php echo  $cat->rm_category_id ?>)" value="active" name="rm_category_status" class="custom-control-input" checked id="rm_category_id(<?php echo  $cat->rm_category_id ?>)" >
                                                        <label class="custom-control-label" for="rm_category_id(<?php echo  $cat->rm_category_id ?>)"></label>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" onchange="edit_status(this,<?php echo  $cat->rm_category_id ?>)" value="inactive" name="rm_category_status" class="custom-control-input" id="rm_category_id(<?php echo  $cat->rm_category_id ?>)" >
                                                        <label class="custom-control-label" for="rm_category_id(<?php echo  $cat->rm_category_id ?>)"></label>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if (crud_check("update")) : ?>
                                                    <a href="/ironman/rm_category_c/rm_category_edit/<?php echo  $cat->rm_category_id ?>" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle">
                                                        <i class="fal fa-edit"></i>
                                                    </a>
                                                <?php endif ?>
                                                <?php if (crud_check("delete")) : ?>
                                                    <a href="javascript:void(0);" onclick="delete_alert(<?php echo  $cat->rm_category_id ?>)" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle">
                                                        <i class="fal fa-times"></i>
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
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