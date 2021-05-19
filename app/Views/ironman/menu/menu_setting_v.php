<!-- data table part starts -->
<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
<script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function() {
        $('#dt_side_menu').dataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            "responsive": true,
            "destroy": true,
            "fixedHeader": true,

            "ajax": {
                url: "<?php echo base_url('/ironman/Menu_setting_c/get_menu_list_dt_ajax'); ?>",
                type: "POST",
                data: {
                    "menu_type": 'side_menu'
                },
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

                        return '<a style="cursor:pointer;" >' + data[2] + '</a>';

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
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

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
                        var privilege_array = data[7].split(",");
                        // console.log(privilege_array[0]);
                        var output = "";
                        for (let i = 0; i < privilege_array.length; i++) {
                            if (i % 3 == 0) {
                                output += '<br>';
                            }
                            if (i + 1 < privilege_array.length) {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a> ';

                            } else {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a>';
                            }
                        }
                        return output;
                        // console.log(data[7][0]);
                        // return '<a style="cursor:pointer;" >' + data[7] + '</a>';
                    },
                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        if (data[8] == "active") {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="active" name="menu_status" class="custom-control-input"  checked id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        } else {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="inactive" name="menu_status" class="custom-control-input" id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        }
                    }

                },
                {
                    "targets": [8],
                    "orderable": false,
                    "data": null,
                    // render: function(data, type, row) {

                    // return '<a href="</?= base_url() . '/ironman/menu_setting_c/edit_menu/' ?>' + data[1] + '"  class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>' +
                    //     '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';

                    // }
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="<?= base_url() . '/ironman/menu_setting_c/edit_menu/' ?>' + data[1] + '"  class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                    }
                },
            ],
        }); //dt_user_list ends
    });
</script>
<script>
    function delete_alert(menu_admin_id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url() ?>/ironman/menu_setting_c/delete_admin_menu/' + menu_admin_id,
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
    //
    function edit_status(item, id) {

        if (item.checked == true) {
            var status = "active";
        } else {
            var status = "inactive";
        }
        console.log(id);

        Swal.fire({
            title: "Are you sure?",
            text: "You want to update this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, update it!"
        }).then(function(result) {
            if (result.value) {

                $.ajax({
                    url: '<?php echo base_url('ironman/menu_setting_c/update_side_menu_status_list') ?>',
                    method: 'post',
                    data: {
                        "menu_admin_id": id,
                        "menu_admin_status": status,
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
<!-- _________________EndScript Area For Side Menu ============== -->



<!-- left top nav dt starts -->
<script>
    $(document).ready(function() {
        $('#dt_left_top_nav').dataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            "responsive": true,
            "fixedHeader": true,
            destroy: true,
            "ajax": {
                url: "<?php echo base_url('/ironman/Menu_setting_c/get_menu_list_dt_ajax'); ?>",
                type: "POST",
                data: {
                    "menu_type": 'left_top_nav'
                },
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

                        return '<a style="cursor:pointer;" >' + data[2] + '</a>';

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
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

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
                        var privilege_array = data[7].split(",");
                        // console.log(privilege_array[0]);
                        var output = "";
                        for (let i = 0; i < privilege_array.length; i++) {
                            if (i % 3 == 0) {
                                output += '<br>';
                            }
                            if (i + 1 < privilege_array.length) {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a> ';

                            } else {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a>';
                            }
                        }
                        return output;
                        // console.log(data[7][0]);
                        // return '<a style="cursor:pointer;" >' + data[7] + '</a>';
                    },
                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        if (data[8] == "active") {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="active" name="menu_status" class="custom-control-input"  checked id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        } else {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="inactive" name="menu_status" class="custom-control-input" id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        }
                    }

                },
                {
                    "targets": [8],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="<?= base_url() . '/ironman/menu_setting_c/edit_menu/' ?>' + data[1] + '"  class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                    }
                },
            ],
        }); //dt_user_list ends
    });
</script>
<script>
    function delete_alert(menu_admin_id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url() ?>/ironman/menu_setting_c/delete_admin_menu/' + menu_admin_id,
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
    //
    function edit_status(item, id) {

        if (item.checked == true) {
            var status = "active";
        } else {
            var status = "inactive";
        }
        console.log(id);

        Swal.fire({
            title: "Are you sure?",
            text: "You want to update this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, update it!"
        }).then(function(result) {
            if (result.value) {

                $.ajax({
                    url: '<?php echo base_url('ironman/menu_setting_c/update_side_menu_status_list') ?>',
                    method: 'post',
                    data: {
                        "menu_admin_id": id,
                        "menu_admin_status": status,
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
<!-- left top nav dt ends -->


<!-- right nav starts -->
<script>
    $(document).ready(function() {
        $('#dt_right_nav').dataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            "responsive": true,
            "fixedHeader": true,
            "destroy": true,
            "ajax": {
                url: "<?php echo base_url('/ironman/Menu_setting_c/get_menu_list_dt_ajax'); ?>",
                type: "POST",
                data: {
                    "menu_type": 'right_nav'
                },
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

                        return '<a style="cursor:pointer;" >' + data[2] + '</a>';

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
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

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
                        var privilege_array = data[7].split(",");
                        // console.log(privilege_array[0]);
                        var output = "";
                        for (let i = 0; i < privilege_array.length; i++) {
                            if (i % 3 == 0) {
                                output += '<br>';
                            }
                            if (i + 1 < privilege_array.length) {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a> ';

                            } else {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a>';
                            }
                        }
                        return output;
                        // console.log(data[7][0]);
                        // return '<a style="cursor:pointer;" >' + data[7] + '</a>';
                    },
                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        if (data[8] == "active") {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="active" name="menu_status" class="custom-control-input"  checked id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        } else {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="inactive" name="menu_status" class="custom-control-input" id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        }
                    }

                },
                {
                    "targets": [8],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="<?= base_url() . '/ironman/menu_setting_c/edit_menu/' ?>' + data[1] + '"  class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                    }
                },
            ],
        }); //dt_user_list ends
    });
</script>
<!-- right nav ends -->


<!-- mobile top menu starts -->
<script>
    $(document).ready(function() {
        $('#dt_mobile_top_menu').dataTable({
            "order": [],
            "serverSide": true,
            "processing": true,
            "responsive": true,
            "fixedHeader": true,
            "destroy": true,
            "ajax": {
                url: "<?php echo base_url('/ironman/Menu_setting_c/get_menu_list_dt_ajax'); ?>",
                type: "POST",
                data: {
                    "menu_type": 'mobile_top_menu'
                },
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

                        return '<a style="cursor:pointer;" >' + data[2] + '</a>';

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
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<a style="cursor:pointer;" >' + data[5] + '</a>';

                    }

                },
                {

                    "targets": [6],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var privilege_array = data[7].split(",");
                        // console.log(privilege_array[0]);
                        var output = "";
                        for (let i = 0; i < privilege_array.length; i++) {
                            if (i % 3 == 0) {
                                output += '<br>';
                            }
                            if (i + 1 < privilege_array.length) {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a> ';

                            } else {
                                output += i + 1 + '.<a style="cursor:pointer;" >' + privilege_array[i] + '</a>';
                            }
                        }
                        return output;
                        // console.log(data[7][0]);
                        // return '<a style="cursor:pointer;" >' + data[7] + '</a>';
                    },
                },
                {
                    "targets": [6],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<a style="cursor:pointer;" >' + data[7] + '</a>';

                    }


                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        if (data[8] == "active") {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="active" name="menu_status" class="custom-control-input"  checked id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        } else {
                            return '<div class="custom-control custom-switch">' +
                                '<input type="checkbox" onchange="edit_status(this,' + data[1] + ')" value="inactive" name="menu_status" class="custom-control-input" id="side_menu_status' + data[1] + '" data-original-title="Inactive / Active">' +
                                '<label class="custom-control-label" for="side_menu_status' + data[1] + '"></label>' +
                                '</div>';
                        }
                    }

                },
                {
                    "targets": [8],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="<?= base_url() . '/ironman/menu_setting_c/edit_menu/' ?>' + data[1] + '"  class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                    }
                },
            ],
        }); //dt_user_list ends
    });
</script>
<!-- mobile top menu ends -->
<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?= $title; ?></a>
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
                        <i class="fal fa-layer-plus">&nbsp;</i> Menu Create
                    </h2>
                </div>
                <div class="panel-container">
                    <div class="panel-content">
                        <!-- ------Form start-------- -->
                        <div class="panel-container show">
                            <div class="panel-content">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab_borders_icons-1" role="tab"><i class="ni ni-menu mr-1"></i> Side Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-2" role="tab"><i class="fal fa-align-left mr-1"></i> Left Top</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-3" role="tab"><i class="fal fa-align-right mr-1"></i> Right Top</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab_borders_icons-4" role="tab"><i class="fal fa-mobile-android-alt mr-1"></i> Mobile Menu</a>
                                    </li>
                                </ul>
                                <div class="tab-content border border-top-0 p-3">
                                    <div class="tab-pane fade show active" id="tab_borders_icons-1" role="tabpanel">
                                        <!--********* Side Menu************ -->
                                        <!-- ------------**1stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="panel-1">
                                                    <div class="panel-container">
                                                        <!-- <div class="panel-content"> -->
                                                        <form class="was-validated" method="POST" action="<?= base_url() ?>/ironman/Menu_setting_c/create_menu" autocomplete="off">
                                                            <div class="panel-content">
                                                                <!-- ------name/parent div-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">Menu Name:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-spider-web"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_name" class="form-control is-invalid" placeholder="Enter Menu Name" aria-label="Menu Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter Your Menu Name." required>
                                                                                <input type="hidden" name="menu_admin_type" value="side_menu" />
                                                                            </div>
                                                                            <span class="help-block">Enter your menu name</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">URL:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-link"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_url" class="form-control is-invalid" placeholder="Enter URL" aria-label="URL Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter the menu URL.">
                                                                            </div>
                                                                            <span class="help-block">http://base_url/...</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------url/iconename-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Parent Menu:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                                                                </div>
                                                                                <select class="custom-select form-control is-invalid" name="menu_admin_parent_menu" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="0">-No parent-</option>
                                                                                    <?php foreach ($side_menu_chain_menu as $menu) :  ?>
                                                                                        <option value="<?= $menu["menu_id"] ?>"> <?= $menu['menu_chain'] ?> </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">If; Select your parent menu.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Icon Name:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control is-invalid" name="menu_admin_icon" placeholder="Enter icon Name" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name.">
                                                                            </div>
                                                                            <div class="help-block">Enter your menu icon.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------sorting/status start-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Sorting:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control is-invalid" name="menu_admin_sort_order" placeholder="Sorting Your Menu" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your sorting order." required>
                                                                            </div>
                                                                            <div class="help-block">Enter your sorting order.</div>
                                                                        </div>
                                                                        <!-- ---- -->
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group flex-nowrap">
                                                                                    <div class="frame-wrap">
                                                                                        <div class="custom-control custom-switch">
                                                                                            <input type="checkbox" name="menu_admin_status" class="custom-control-input" id="side_admin_menu" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active">
                                                                                            <label class="custom-control-label" for="side_admin_menu"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span class="help-block">Select Your Status</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Privilege:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-broadcast-tower"></i></span>
                                                                                </div>
                                                                                <select class="select2 custom-select form-control is-invalid" name="menu_admin_user_privilege[]" multiple="multiple" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="accounts" selected="">Accounts</option>
                                                                                    <option value="administrator" selected="">Administrator</option>
                                                                                    <option value="audit" selected="">Audit</option>
                                                                                    <option value="data_entry" selected="">Data Entry Operator</option>
                                                                                    <option value="developer" selected="">Developer</option>
                                                                                    <option value="hr" selected="">HR</option>
                                                                                    <option value="it" selected="">IT</option>
                                                                                    <option value="interior" selected="">Interior</option>
                                                                                    <option value="logistic" selected="">Logistic</option>
                                                                                    <option value="management" selected="">Management</option>
                                                                                    <option value="marketing" selected="">Marketing</option>
                                                                                    <option value="pd" selected="">PD</option>
                                                                                    <option value="pdqms" selected="">PDQMS</option>
                                                                                    <option value="purchase_and_procurement" selected="">Purchase & Procurement</option>
                                                                                    <option value="qc" selected="">QC</option>
                                                                                    <option value="sales_person" selected="">Sales Person</option>
                                                                                    <option value="store_incharge" selected="">Store Incharge</option>
                                                                                    <option value="store" selected="">Store</option>
                                                                                    <option value="supplier" selected="">Supplier</option>
                                                                                    <option value="wip" selected="">WIP</option>
                                                                                    <option value="wip_incharge" selected="">WIP Incharge</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">Selects your privilege.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <?php if (crud_check("create")) : ?>
                                                                    <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                                                        <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </form>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- ***********************************End*********************************** -->
                                            </div>
                                        </div>
                                        <!-- ------------**2stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div id="panel-1">
                                                    <div class="panel-hdr">
                                                        <h2>
                                                            <i class="fal fa-list-alt">&nbsp;</i>Side Menu List
                                                            </span>
                                                        </h2>
                                                    </div>
                                                    <!-- <hr> -->
                                                    <div class="panel-container show">
                                                        <div class="panel-content">
                                                            <!-- datatable start -->
                                                            <table id="dt_side_menu" class="table  table-bordered table-hover table-striped w-100 nowrap">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th title="Serial Number">SN.</th>
                                                                        <th>Menu Name</th>
                                                                        <th>Parent Menu</th>
                                                                        <th>URL</th>
                                                                        <th>Icon Name</th>
                                                                        <th>Sort Order</th>
                                                                        <th>Privilege</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                            <!-- datatable end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_borders_icons-2" role="tabpanel">
                                        <!--********* Left Top Menu************ -->
                                        <!-- ------------**1stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="panel-1">
                                                    <div class="panel-container">
                                                        <!-- <div class="panel-content"> -->
                                                        <form class="was-validated" method="POST" action="<?= base_url() ?>/ironman/Menu_setting_c/create_menu" autocomplete="off">
                                                            <div class="panel-content">
                                                                <!-- ------name/parent div-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">Menu Name:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-spider-web"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_name" class="form-control is-invalid" placeholder="Enter Menu Name" aria-label="Menu Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter Your Menu Name." required>
                                                                                <input type="hidden" name="menu_admin_type" value="left_top_nav" />
                                                                            </div>
                                                                            <span class="help-block">Enter your menu name</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">URL:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-link"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_url" class="form-control is-invalid" placeholder="Enter URL" aria-label="URL Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter the menu URL.">
                                                                            </div>
                                                                            <span class="help-block">http://base_url/...</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------url/iconename-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Parent Menu:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                                                                </div>
                                                                                <select class="custom-select form-control is-invalid" name="menu_admin_parent_menu" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="0">-No parent-</option>
                                                                                    <?php foreach ($side_menu_chain_menu as $menu) :  ?>
                                                                                        <option value="<?= $menu["menu_id"] ?>"> <?= $menu['menu_chain'] ?> </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">If; Select your parent menu.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Icon Name:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control is-invalid" name="menu_admin_icon" placeholder="Enter icon Name" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name.">
                                                                            </div>
                                                                            <div class="help-block">Enter your menu icon.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------sorting/status start-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Sorting:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control is-invalid" name="menu_admin_sort_order" placeholder="Sorting Your Menu" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your sorting order." required>
                                                                            </div>
                                                                            <div class="help-block">Enter your sorting order.</div>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <!-- <div class="frame-wrap">
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" class="custom-control-input" value="active" id="statusRadio1" name="menu_admin_status" checked>
                                                                                        <label class="custom-control-label" for="statusRadio1">Active</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" class="custom-control-input" value="inactive" id="unstatusRadio1" name="menu_admin_status">
                                                                                        <label class="custom-control-label" for="unstatusRadio1">Inactive</label>
                                                                                    </div>
                                                                                </div> -->
                                                                                <div class="input-group flex-nowrap">
                                                                                    <div class="frame-wrap">
                                                                                        <div class="custom-control custom-switch">
                                                                                            <input type="checkbox" name="menu_admin_status" class="custom-control-input" id="left_admin_menu" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active">
                                                                                            <label class="custom-control-label" for="left_admin_menu"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span class="help-block">Select Your Status</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Privilege:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-broadcast-tower"></i></span>
                                                                                </div>
                                                                                <select class="select2 custom-select form-control is-invalid" name="menu_admin_user_privilege[]" multiple="multiple" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="accounts" selected="">Accounts</option>
                                                                                    <option value="administrator" selected="">Administrator</option>
                                                                                    <option value="audit" selected="">Audit</option>
                                                                                    <option value="data_entry" selected="">Data Entry Operator</option>
                                                                                    <option value="developer" selected="">Developer</option>
                                                                                    <option value="hr" selected="">HR</option>
                                                                                    <option value="it" selected="">IT</option>
                                                                                    <option value="interior" selected="">Interior</option>
                                                                                    <option value="logistic" selected="">Logistic</option>
                                                                                    <option value="management" selected="">Management</option>
                                                                                    <option value="marketing" selected="">Marketing</option>
                                                                                    <option value="pd" selected="">PD</option>
                                                                                    <option value="pdqms" selected="">PDQMS</option>
                                                                                    <option value="purchase_and_procurement" selected="">Purchase & Procurement</option>
                                                                                    <option value="qc" selected="">QC</option>
                                                                                    <option value="sales_person" selected="">Sales Person</option>
                                                                                    <option value="store_incharge" selected="">Store Incharge</option>
                                                                                    <option value="store" selected="">Store</option>
                                                                                    <option value="supplier" selected="">Supplier</option>
                                                                                    <option value="wip" selected="">WIP</option>
                                                                                    <option value="wip_incharge" selected="">WIP Incharge</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">Selects your privilege.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <?php if (crud_check("create")) : ?>
                                                                    <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                                                        <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </form>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- ***********************************End*********************************** -->
                                            </div>
                                        </div>
                                        <!-- ------------**2stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div id="panel-1">
                                                    <div class="panel-hdr ">
                                                        <h2>
                                                            <i class="fal fa-list-alt">&nbsp;</i> Left Menu List
                                                            </span>
                                                        </h2>
                                                    </div>
                                                    <div class="panel-container show">
                                                        <div class="panel-content">
                                                            <!-- datatable start -->
                                                            <table id="dt_left_top_nav" class="table table-bordered table-hover table-striped w-100">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th title="Serial Number">SN.</th>
                                                                        <th>Menu Name</th>
                                                                        <th>Parent Menu</th>
                                                                        <th>URL</th>
                                                                        <th>Icon Name</th>
                                                                        <th>Sort Order</th>
                                                                        <th>Privilege</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <!-- datatable end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_borders_icons-3" role="tabpanel">
                                        <!--********* Right Top Menu************ -->
                                        <!-- ------------**1stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="panel-1">
                                                    <div class="panel-container">
                                                        <!-- <div class="panel-content"> -->
                                                        <form class="was-validated" method="POST" action="<?= base_url() ?>/ironman/Menu_setting_c/create_menu" autocomplete="off">
                                                            <div class="panel-content">
                                                                <!-- ------name/parent div-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">Menu Name:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-spider-web"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_name" class="form-control is-invalid" placeholder="Enter Menu Name" aria-label="Menu Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter Your Menu Name." required>
                                                                                <input type="hidden" name="menu_admin_type" value="right_nav" />
                                                                            </div>
                                                                            <span class="help-block">Enter your menu name</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">URL:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-link"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_url" class="form-control is-invalid" placeholder="Enter URL" aria-label="URL Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter the menu URL.">
                                                                            </div>
                                                                            <span class="help-block">http://base_url/...</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------url/iconename-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Parent Menu:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                                                                </div>
                                                                                <select class="custom-select form-control is-invalid" name="menu_admin_parent_menu" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="0">-No parent-</option>
                                                                                    <?php foreach ($side_menu_chain_menu as $menu) :  ?>
                                                                                        <option value="<?= $menu["menu_id"] ?>"> <?= $menu['menu_chain'] ?> </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">If; Select your parent menu.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Icon Name:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control is-invalid" name="menu_admin_icon" placeholder="Enter icon Name" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name.">
                                                                            </div>
                                                                            <div class="help-block">Enter your menu icon.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------sorting/status start-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Sorting:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control is-invalid" name="menu_admin_sort_order" placeholder="Sorting Your Menu" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your sorting order." required>
                                                                            </div>
                                                                            <div class="help-block">Enter your sorting order.</div>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <!-- <div class="frame-wrap">
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" class="custom-control-input" value="active" id="statusRadio1" name="menu_admin_status" checked>
                                                                                        <label class="custom-control-label" for="statusRadio1">Active</label>
                                                                                    </div>
                                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                                        <input type="radio" class="custom-control-input" value="inactive" id="unstatusRadio1" name="menu_admin_status">
                                                                                        <label class="custom-control-label" for="unstatusRadio1">Inactive</label>
                                                                                    </div>
                                                                                </div> -->
                                                                                <div class="input-group flex-nowrap">
                                                                                    <div class="frame-wrap">
                                                                                        <div class="custom-control custom-switch">
                                                                                            <input type="checkbox" name="menu_admin_status" class="custom-control-input" id="rightTop_admin_menu" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active">
                                                                                            <label class="custom-control-label" for="rightTop_admin_menu"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span class="help-block">Select Your Status</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Privilege:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-broadcast-tower"></i></span>
                                                                                </div>
                                                                                <select class="select2 custom-select form-control is-invalid" name="menu_admin_user_privilege[]" multiple="multiple" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="accounts" selected="">Accounts</option>
                                                                                    <option value="administrator" selected="">Administrator</option>
                                                                                    <option value="audit" selected="">Audit</option>
                                                                                    <option value="data_entry" selected="">Data Entry Operator</option>
                                                                                    <option value="developer" selected="">Developer</option>
                                                                                    <option value="hr" selected="">HR</option>
                                                                                    <option value="it" selected="">IT</option>
                                                                                    <option value="interior" selected="">Interior</option>
                                                                                    <option value="logistic" selected="">Logistic</option>
                                                                                    <option value="management" selected="">Management</option>
                                                                                    <option value="marketing" selected="">Marketing</option>
                                                                                    <option value="pd" selected="">PD</option>
                                                                                    <option value="pdqms" selected="">PDQMS</option>
                                                                                    <option value="purchase_and_procurement" selected="">Purchase & Procurement</option>
                                                                                    <option value="qc" selected="">QC</option>
                                                                                    <option value="sales_person" selected="">Sales Person</option>
                                                                                    <option value="store_incharge" selected="">Store Incharge</option>
                                                                                    <option value="store" selected="">Store</option>
                                                                                    <option value="supplier" selected="">Supplier</option>
                                                                                    <option value="wip" selected="">WIP</option>
                                                                                    <option value="wip_incharge" selected="">WIP Incharge</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">Selects your privilege.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <?php if (crud_check("create")) : ?>
                                                                    <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                                                        <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </form>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- ***********************************End*********************************** -->
                                            </div>
                                        </div>
                                        <!-- ------------**2stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div id="panel-1">
                                                    <div class="panel-hdr">
                                                        <h2>
                                                            <i class="fal fa-list-alt">&nbsp;</i> Right Top Menu List
                                                            </span>
                                                        </h2>
                                                    </div>
                                                    <div class="panel-container show">
                                                        <div class="panel-content">
                                                            <!-- datatable start -->
                                                            <table id="dt_right_nav" class="table table-bordered table-hover table-striped w-100">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th title="Serial Number">SN.</th>
                                                                        <th>Menu Name</th>
                                                                        <th>Parent Menu</th>
                                                                        <th>URL</th>
                                                                        <th>Icon Name</th>
                                                                        <th>Sort Order</th>
                                                                        <th>Privilege</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <!-- datatable end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_borders_icons-4" role="tabpanel">
                                        <!--********* Mobile Menu************ -->
                                        <!-- ------------**1stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="panel-1">
                                                    <div class="panel-container">
                                                        <!-- <div class="panel-content"> -->
                                                        <form class="was-validated" method="POST" action="<?= base_url() ?>/ironman/Menu_setting_c/create_menu" autocomplete="off">
                                                            <div class="panel-content">
                                                                <!-- ------name/parent div-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">Menu Name:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-spider-web"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_name" class="form-control is-invalid" placeholder="Enter Menu Name" aria-label="Menu Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter Your Menu Name." required>
                                                                                <input type="hidden" name="menu_admin_type" value="mobile_top_menu" />
                                                                            </div>
                                                                            <span class="help-block">Enter your menu name</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="addon-wrapping-left">URL:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-link"></i></span>
                                                                                </div>
                                                                                <input type="text" name="menu_admin_url" class="form-control is-invalid" placeholder="Enter URL" aria-label="URL Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter the menu URL.">
                                                                            </div>
                                                                            <span class="help-block">http://base_url/...</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------url/iconename-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Parent Menu:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                                                                </div>
                                                                                <select class="custom-select form-control is-invalid" name="menu_admin_parent_menu" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="0">-No parent-</option>
                                                                                    <?php foreach ($side_menu_chain_menu as $menu) :  ?>
                                                                                        <option value="<?= $menu["menu_id"] ?>"> <?= $menu['menu_chain'] ?> </option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">If; Select your parent menu.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Icon Name:</label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="text" class="form-control is-invalid" name="menu_admin_icon" placeholder="Enter icon Name" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name.">
                                                                            </div>
                                                                            <div class="help-block">Enter your menu icon.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <!-- ------sorting/status start-------- -->
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Sorting:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                                </div>
                                                                                <input type="number" class="form-control is-invalid" name="menu_admin_sort_order" placeholder="Sorting Your Menu" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your sorting order." required>
                                                                            </div>
                                                                            <div class="help-block">Enter your sorting order.</div>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left"> Status:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group flex-nowrap">
                                                                                    <div class="frame-wrap">
                                                                                        <div class="custom-control custom-switch">
                                                                                            <input type="checkbox" name="menu_admin_status" class="custom-control-input" id="mobile_admin_menu" checked="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner bg-success-200"></div></div>' data-toggle="tooltip" title="" data-original-title="Inactive / Active">
                                                                                            <label class="custom-control-label" for="mobile_admin_menu"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <span class="help-block">Select Your Status</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group mt-2">
                                                                            <label class="form-label" for="addon-wrapping-left">Privilege:<b style="color: red;">*</b></label>
                                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text"><i class="fal fa-broadcast-tower"></i></span>
                                                                                </div>
                                                                                <select class="select2 custom-select form-control is-invalid" name="menu_admin_user_privilege[]" multiple="multiple" id="multiple_side_menu" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select Your Parent Menu." required>
                                                                                    <option value="accounts" selected="">Accounts</option>
                                                                                    <option value="administrator" selected="">Administrator</option>
                                                                                    <option value="audit" selected="">Audit</option>
                                                                                    <option value="data_entry" selected="">Data Entry Operator</option>
                                                                                    <option value="developer" selected="">Developer</option>
                                                                                    <option value="hr" selected="">HR</option>
                                                                                    <option value="it" selected="">IT</option>
                                                                                    <option value="interior" selected="">Interior</option>
                                                                                    <option value="logistic" selected="">Logistic</option>
                                                                                    <option value="management" selected="">Management</option>
                                                                                    <option value="marketing" selected="">Marketing</option>
                                                                                    <option value="pd" selected="">PD</option>
                                                                                    <option value="pdqms" selected="">PDQMS</option>
                                                                                    <option value="purchase_and_procurement" selected="">Purchase & Procurement</option>
                                                                                    <option value="qc" selected="">QC</option>
                                                                                    <option value="sales_person" selected="">Sales Person</option>
                                                                                    <option value="store_incharge" selected="">Store Incharge</option>
                                                                                    <option value="store" selected="">Store</option>
                                                                                    <option value="supplier" selected="">Supplier</option>
                                                                                    <option value="wip" selected="">WIP</option>
                                                                                    <option value="wip_incharge" selected="">WIP Incharge</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="help-block">Selects your privilege.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- -------Div End--------- -->
                                                                <?php if (crud_check("create")) : ?>
                                                                    <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                                                        <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </form>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- ***********************************End*********************************** -->
                                            </div>
                                        </div>
                                        <!-- ------------**2stDiv**-------- -->
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div id="panel-1">
                                                    <div class="panel-hdr">
                                                        <h2>
                                                            <i class="fal fa-list-alt">&nbsp;</i> Mobile Menu List
                                                            </span>
                                                        </h2>
                                                    </div>
                                                    <div class="panel-container show">
                                                        <div class="panel-content">
                                                            <!-- datatable start -->
                                                            <table id="dt_mobile_top_menu" class="table table-bordered table-hover table-striped w-100">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th title="Serial Number">SN.</th>
                                                                        <th>Menu Name</th>
                                                                        <th>Parent Menu</th>
                                                                        <th>URL</th>
                                                                        <th>Icon Name</th>
                                                                        <th>Sort Order</th>
                                                                        <th>Privilege</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                            <!-- datatable end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------Form End--------- -->
                    </div>
                </div>
            </div>
            <!-- ***********************************End*********************************** -->
        </div>
    </div>
    <!--*****************End Your main content. ******************-->
</main>
<!-- ---------------***datatableSCRIPT***-------------------- -->