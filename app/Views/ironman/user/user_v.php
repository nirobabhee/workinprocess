<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
<script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
<script>
    $(document).ready(function() {
        $('#dt_user_list').dataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            responsive: true,
            destroy: true,
            //   ----------Start Scroller-------
            scroller: true,
            scrollY: 400,
            //   paging: true,
            fixedHeader: true,
            scrollX: true,
            //   ----------End Scroller-------
            rowGroup: {
                dataSrc: 5,
                "className": "text-uppercase",
            },
            //   ----------Group by End-------
            "ajax": {
                url: "<?php echo base_url('/ironman/user_c/get_all_user_dt_ajax'); ?>",
                type: "POST",
                // success:function(response){
                //     console.log(response)

                // },
                // error:function(err){
                // },
            },
            "columnDefs": [{
                    "targets": [0],
                    "orderable": false,

                },
                {
                    "targets": [1],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<a id="user_full_name' + data[1] + '" style="cursor:pointer;" >' + data[2] + '</a>';


                        // return '<input id="user_full_name'+data[7]+'" onfocusin="(function(e){$(e.target).attr(`class`,`form-control border-1`);})(arguments[0]);return false;" '+
                        //   'onfocusout="(function(e){$(e.target).attr(`class`,`form-control border-0`);})(arguments[0]);return false;" name="user_full_name"' +
                        //     'onchange="textChanged(this,' + data[0] + ')" class="form-control border-0"   type="text" value="' + data[1] + '">';

                    }
                },
                {
                    "targets": [2],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        return '<a style="cursor:pointer;" >' + data[3] + '</a>';
                    }
                },
                {
                    "targets": [3],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<a style="cursor:pointer;" >' + data[4] + '</a>';

                    }
                },
                {
                    "targets": [4],
                    "visible": false,
                    "data": null,
                    render: function(data, type, row) {

                        //   return '<p id="user_full_name' + data[7] + '" onclick="pass_user_id_to_modal_ajax(' + data[7] + ')" ' +
                        //       ' >'+data[1]+' </p>';
                        return '<a style="cursor:pointer;" >' + data[5] + '</a>';

                    }
                },
                {
                    "targets": [5],
                    // "orderable": false,

                    "data": null,
                    render: function(data, type, row) {

                        return '<a style="cursor:pointer;" >' + data[6] + '</a>';

                    }
                },
                {
                    "targets": [6],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        // Combine the first and last names into a single table field
                        //   return '<select class="form-control" onchange="edit_alert(this,' + data[0] + ')" name="user_godown"> ' +
                        //       '<option  value="0">-Select Section-</option>' +
                        //       '<option selected value="1">Go-down 1</option>' +
                        //       '<option  value="2">Go-down 2</option>' +
                        //       '<option  value="3">Go-down 3</option>' +
                        //       '<option  value="4">Go-down 4</option>' +
                        //       '</select>';
                        return '<a style="cursor:pointer;" >' + data[7] + '</a>';

                    }
                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        return '<a id="user_section' + data[1] + '" style="cursor:pointer;" >' + data[8] + '</a>';
                    }
                },
                {
                    "targets": [8],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var crud = data[9];
                        if (crud.includes("c")) {
                            $("#crud_create_id" + data[1]).prop("checked", true);
                        }
                        if (crud.includes("r")) {
                            $("#crud_read_id" + data[1]).prop("checked", true);
                        }
                        if (crud.includes("u")) {
                            $("#crud_update_id" + data[1]).prop("checked", true);
                        }
                        if (crud.includes("d")) {
                            $("#crud_delete_id" + data[1]).prop("checked", true);
                        }

                        return '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" onchange="edit_privilege(this,' + data[1] + ')" id="crud_create_id' + data[1] + '" value="c" <?php  ?> name="user_crud[]" class="custom-control-input" >' +
                            '<label class="custom-control-label" for="crud_create_id' + data[1] + '">C</label>' +
                            '</div>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" onchange="edit_privilege(this,' + data[1] + ')" id="crud_read_id' + data[1] + '" value="r" checked name="user_crud[]" class="custom-control-input" >' +
                            '<label class="custom-control-label" for="crud_read_id' + data[1] + '">R</label>' +
                            '</div> <br> <br>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" onchange="edit_privilege(this,' + data[1] + ')" id="crud_update_id' + data[1] + '" value="u" name="user_crud[]" class="custom-control-input" >' +
                            '<label class="custom-control-label" for="crud_update_id' + data[1] + '">U</label>' +
                            '</div>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" onchange="edit_privilege(this,' + data[1] + ')" id="crud_delete_id' + data[1] + '" value="d" name="user_crud[]" class="custom-control-input">' +
                            '<label class="custom-control-label" for="crud_delete_id' + data[1] + '">D</label>' +
                            '</div>';
                    }

                },
                {
                    "targets": [9],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        if (data[10] == "active") {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="active" name="user_status" class="custom-control-input"  checked id="user_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="user_status' + data[1] + '"></label>' +
                                '</div>';
                        } else {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="inactive" name="user_status" class="custom-control-input" id="user_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="user_status' + data[1] + '"></label>' +
                                '</div>';
                        }
                    }
                },
                {
                    "targets": [10],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="javascript:void(0);" onclick="pass_user_id_to_modal_ajax(' + data[1] + ')" data-toggle="modal" data-target="#default-example-modal-center" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                        //   return '<a href="javascript:void(0);" onclick="pass_user_id_to_modal_ajax(' + data[1] + ')" data-toggle="modal" data-target="#default-example-modal-center" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>' +
                        //       '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                    }
                },
            ],
        }); //dt_user_list ends

    });


    function pass_user_id_to_modal_ajax(id) {
        var user_id_to_modal_ajax = id;

        var user_full_name = $('#user_full_name' + id).text();
        //   var user_section = $('#user_section' + id).text();
        if ($("#crud_create_id" + id).prop("checked")) {
            $("#crud_modal_create_id").prop("checked", true)
        }

        if ($("#crud_read_id" + id).prop("checked")) {
            $("#crud_modal_read_id").prop("checked", true)

        }

        if ($("#crud_update_id" + id).prop("checked")) {
            $("#crud_modal_update_id").prop("checked", true)

        }

        if ($("#crud_delete_id" + id).prop("checked")) {
            $("#crud_modal_delete_id").prop("checked", true)
        }

        if ($("#user_status" + id).prop("checked")) {
            $("#modal_user_status").prop("checked", true);
        }




        $("#modal_user_full_name").val(user_full_name);
        $("#modal_user_id").val(id);

    }
</script>
<script>
    function delete_alert(user_id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url() ?>/ironman/user_c/delete_user/' + user_id,
                    method: 'get',
                    contentType: 'application/x-www-form-urlencoded',
                    success: function(response) {
                        location.reload();
                    },
                    error: function(err) {}
                })
                // Swal.fire("Deleted!", "User has been deleted.");
            }
        }); //alert ends
    }
    //
    function edit_status(item, id) {
        if (item.checked == true) {
            var status = "active";
        } else {

            var status = "inactive";
        }
        <?php if (crud_check("update")) : ?>
            Swal.fire({
                title: "Are you sure?",
                text: "You want to update this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '<?= base_url('ironman/user_c/update_user_status') ?>',
                        method: 'post',
                        data: {
                            "user_id": id,
                            "user_status": status,
                        },
                        //   contentType: 'application/x-www-form-urlencoded',
                        success: function(response) {
                            location.reload();
                        },
                        error: function(err) {},
                    })
                    // Swal.fire("Deleted!", "User has been deleted.");
                } else {
                    location.reload();
                }
            }); //alert ends

        <?php else : ?>
            Swal.fire("You are not allowed to update any user information").then(function(result) {
                if (result.value) {
                    location.reload();
                }
            });
        <?php endif ?>


    }

    function edit_privilege(item, id) {
        // console.log(item);
        var crud = "";
        if ($("#crud_create_id" + id).prop("checked")) {
            crud += "c,";
        }
        if ($("#crud_read_id" + id).prop("checked")) {
            crud += "r,";
        }
        if ($("#crud_update_id" + id).prop("checked")) {
            crud += "u,";
        }
        if ($("#crud_delete_id" + id).prop("checked")) {
            crud += "d";
        }
        <?php if (crud_check("update")) : ?>
            Swal.fire({
                title: "Are you sure?",
                text: "You want to update this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update it!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '<?= base_url('ironman/user_c/update_user_privilege') ?>',
                        method: 'post',
                        data: {
                            "user_id": id,
                            "user_crud": crud,
                        },
                        //   contentType: 'application/x-www-form-urlencoded',
                        success: function(response) {

                            location.reload();

                        },
                        error: function(err) {

                        },

                    })
                    // Swal.fire("Deleted!", "User has been deleted.");
                } else {
                    location.reload();
                }
            }); //alert ends

        <?php else : ?>
            Swal.fire("You are not allowed to update any user information").then(function(result) {
                if (result.value) {
                    location.reload();
                }
            });
        <?php endif ?>
    }
</script>

<!-- user update modal part ↓↓↓↓↓↓ -->
<div class="modal fade" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="breadcrumb page-breadcrumb">
                        Edit User
                    </span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ......Form...Start.......... -->
                <div class="table-responsive">
                    <div class="container-fluid">
                        <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/user_c/update_user_submit") ?>" autocomplete="off">
                            <input type="hidden" name="user_id" id="modal_user_id">
                            <table class="table table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Full Name<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_user_full_name" name="user_full_name" class="form-control is-invalid" placeholder="Enter full name" aria-label="Full Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Full name is required!" required>
                                            </div>
                                            <span class="help-block">Update your full name.</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left">Section</label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-layer-group"></i></span>
                                                </div>
                                                <select id="update_user_section" class="custom-select form-control is-invalid" name="user_section">
                                                    <option value="">-Select Section-</option>
                                                    <?php
                                                    foreach ($all_section as $section) {
                                                    ?>
                                                        <option value="<?php echo $section->section_id; ?>"><?php echo $section->section_name; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="help-block">Update your section.</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left">RM Godown</label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-house"></i></span>
                                                </div>
                                                <select id="update_user_rm_godown" class="custom-select form-control is-invalid" name="user_rm_godown">
                                                    <option value="">-Select RM Godown-</option>
                                                    <?php
                                                    foreach ($all_rm_godown as $rm_godown) {
                                                    ?>
                                                        <option value="<?php echo $rm_godown->rm_godown_id; ?>"><?php echo $rm_godown->rm_godown_name ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <span class="help-block">Update your godown.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left">FG Godown</label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-house"></i></span>
                                                </div>
                                                <select class="custom-select form-control is-invalid" name="user_fg_godown">
                                                    <option value="">-Select FG Godown-</option>
                                                    <?php
                                                    foreach ($all_fg_godown as $fg_godown) {
                                                    ?>
                                                        <option value="<?php echo $fg_godown->fg_godown_id; ?>"><?php echo $fg_godown->fg_godown_name ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <span class="help-block">Update your godown.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:"> Privilege<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="frame-wrap">
                                                    <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                        <input type="checkbox" value="c" name="user_crud[]" class="custom-control-input" id="crud_modal_create_id">
                                                        <label class="custom-control-label" for="crud_modal_create_id">Create</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                        <input type="checkbox" value="r" checked name="user_crud[]" class="custom-control-input" id="crud_modal_read_id">
                                                        <label class="custom-control-label" for="crud_modal_create_id">Read</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                        <input type="checkbox" value="u" name="user_crud[]" class="custom-control-input" id="crud_modal_update_id">
                                                        <label class="custom-control-label" for="crud_modal_create_id">Update</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                        <input type="checkbox" value="d" name="user_crud[]" class="custom-control-input" id="crud_modal_delete_id">
                                                        <label class="custom-control-label" for="crud_modal_create_id">Delete</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block">Update privilege criteria.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group flex-nowrap">
                                                    <div class="frame-wrap">
                                                        <div class="custom-control custom-switch">
                                                            <!-- <input type="checkbox" name="user_status" class="custom-control-input" id="user" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active"> -->
                                                            <input type="checkbox" name="user_status" class="custom-control-input" id="modal_user_status" data-original-title="Inactive / Active">
                                                            <label class="custom-control-label" for="modal_user_status"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block">Update your status.</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ......Form...End.......... -->
            </div>

        </div>
    </div>

</div>
<!-- user update modal part ends ↑↑↑↑↑ -->


<!-- data table part ends -->
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
        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-layer-plus">&nbsp;</i> User Create
                    </h2>
                </div>
                <div class="panel-container">
                    <!-- <div class="panel-content"> -->
                    <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/user_c/create_user_submit") ?>" autocomplete="off">
                        <div class="panel-content">
                            <!-- ------Div start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label " for="addon-wrapping-left">Full Name<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                            </div>
                                            <input type="text" name="user_full_name" class="form-control is-invalid" placeholder="Enter full name" aria-label="Full Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Full name is required!" required>
                                        </div>
                                        <span class="help-block">Enter your full name.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Section</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-layer-group"></i></span>
                                            </div>
                                            <select class="custom-select form-control is-invalid" name="user_section">
                                                <option value="">-Select Section-</option>
                                                <?php
                                                foreach ($all_section as $section) {
                                                ?>
                                                    <option value="<?= $section->section_id; ?>"><?= $section->section_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="help-block">Select your section.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------phn/UserGroup start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Phone Number<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-phone-plus"></i></span>
                                            </div>
                                            <input type="text" name="user_phone" placeholder="+88XXXXXXXXXXX" data-inputmask="'mask': '99999999999'" class="form-control is-invalid" aria-label="phonenumber" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Phone number must be digit with *(11) Character." required>
                                        </div>
                                        <span class="help-block">Enter your valid length phone number.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">User Group<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                            </div>
                                            <select class="form-control custom-select is-invalid" name="user_group" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Privilege Group User." required>
                                                <option value="">-Select Group-</option>
                                                <option value="accounts">Accounts</option>
                                                <option value="administrator">Administrator</option>
                                                <option value="audit">Audit</option>
                                                <option value="data_entry">Data Entry Operator</option>
                                                <option value="developer">Developer</option>
                                                <option value="hr">HR</option>
                                                <option value="it">IT</option>
                                                <option value="interior">Interior</option>
                                                <option value="logistic">Logistic</option>
                                                <option value="management">Management</option>
                                                <option value="marketing">Marketing</option>
                                                <option value="pd">PD</option>
                                                <option value="pdqms">PDQMS</option>
                                                <option value="purchase_and_procurement">Purchase & Procurement</option>
                                                <option value="qc">QC</option>
                                                <option value="sales_person">Sales Person</option>
                                                <option value="store_incharge">Store Incharge</option>
                                                <option value="store">Store</option>
                                                <option value="supplier">Supplier</option>
                                                <option value="wip">WIP</option>
                                                <option value="wip_incharge">WIP Incharge</option>
                                            </select>
                                        </div>
                                        <span class="help-block">Select your user group.</span>
                                    </div>
                                </div>

                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------Section/email start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Email<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-mail-bulk"></i></span>
                                            </div>
                                            <input name="user_email" type="text" placeholder="Example.gmail.com" data-inputmask="'alias': 'email'" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="E-mail must be unique & valid format." required>
                                        </div>
                                        <span class="help-block">Enter valid E-mail: example@xxx.com</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">RM Godown</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-house"></i></span>
                                            </div>
                                            <select class="custom-select form-control is-invalid" name="user_rm_godown">
                                                <option value="">-Select RM Godown-</option>
                                                <?php
                                                foreach ($all_rm_godown as $rm_godown) {
                                                ?>
                                                    <option value="<?= $rm_godown->rm_godown_id; ?>"><?= $rm_godown->rm_godown_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <span class="help-block">Select your godown.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------Mac/godown start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label">Picture</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-image"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="user_picture" class="custom-file-input is-invalid" id="customControlValidation7" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select A valid Image.">
                                                <label class="custom-file-label" for="customControlValidation7">Choose Picture</label>
                                            </div>
                                        </div>
                                        <span class="help-block">Select a profile picture.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">FG Godown</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-house"></i></span>
                                            </div>
                                            <select class="custom-select form-control is-invalid" name="user_fg_godown">
                                                <option value="">-Select FG Godown-</option>
                                                <?php
                                                foreach ($all_fg_godown as $fg_godown) {
                                                ?>
                                                    <option value="<?= $fg_godown->fg_godown_id; ?>"><?= $fg_godown->fg_godown_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <span class="help-block">Select your godown.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------Privilege/Status /Password-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Password<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-waveform-path"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="user_password" placeholder="Enter password" aria-label="password" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your Estimated password." required>
                                        </div>
                                        <span class="help-block">Enter a strong password for security.</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:"> Privilege:</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="frame-wrap">
                                                <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                    <input type="checkbox" value="c" name="user_crud[]" class="custom-control-input" id="defaultInline1">
                                                    <label class="custom-control-label" for="defaultInline1">Create</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                    <input type="checkbox" value="r" checked name="user_crud[]" class="custom-control-input" id="defaultInline2">
                                                    <label class="custom-control-label" for="defaultInline2">Read</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                    <input type="checkbox" value="u" name="user_crud[]" class="custom-control-input" id="defaultInlined">
                                                    <label class="custom-control-label" for="defaultInlined">Update</label>
                                                </div>
                                                <div class="custom-control custom-checkbox custom-control-inline is-invalid">
                                                    <input type="checkbox" value="d" name="user_crud[]" class="custom-control-input" id="defaultInline3">
                                                    <label class="custom-control-label" for="defaultInline3">Delete</label>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="help-block">Choose your perform criteria.</span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group flex-nowrap">
                                                <div class="frame-wrap">
                                                    <div class="custom-control custom-switch">
                                                        <!-- <input type="checkbox" name="user_status" class="custom-control-input" id="user" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active"> -->
                                                        <input type="checkbox" name="user_status" class="custom-control-input" id="user" checked="" data-original-title="Inactive / Active">
                                                        <label class="custom-control-label" for="user"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="help-block">Check your status</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End Privilege/Status /Password--------- -->
                            <!-- -------------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="addon-wrapping-left">MAC Address</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-computer-classic"></i></span>
                                            </div>
                                            <input type="text" name="user_mac_address" placeholder="99:99:99:99:99:99" data-inputmask="'alias': 'mac'" class="form-control is-invalid" aria-label="phonenumber" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Your MAC address.">
                                        </div>
                                        <span class="help-block">Enter your MAC address.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End --------- -->
                            <!-- ------Status/button start-------- -->
                            <?php if (crud_check("create")) : ?>
                                <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                    <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                </div>
                            <?php endif ?>
                            <!-- -------Div End--------- -->
                        </div>
                    </form>
                </div>
                <!-- </div> -->
            </div>
            <!-- ***********************************End*********************************** -->
        </div>
    </div>
    <!-- ------------**2stDiv**-------- -->
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-list-alt">&nbsp;</i> User List
                        </span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt_user_list" class="table table-bordered table-sm table-hover table-striped w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th title="Serial Number">SN.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>User Group</th>
                                    <th>RM Godown</th>
                                    <th>FG Godown</th>
                                    <th>Section</th>
                                    <th>Privilege</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th title="Serial Number">SN.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>User Group</th>
                                    <th>RM Godown</th>
                                    <th>FG Godown</th>
                                    <th>Section</th>
                                    <th>Privilege</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************End Your main content. ******************-->
</main>