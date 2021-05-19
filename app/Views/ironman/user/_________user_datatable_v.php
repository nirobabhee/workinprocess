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

                        return '<input onchange="edit_alert(this)" name="user_full_name"' +
                            'onchange="textChanged(this,' + data[0] + ')" class="form-control"   type="text" value="' + data[1] + '">';


                    }


                },
                {
                    "targets": [2],
                    // "orderable": false,

                },
                {
                    "targets": [3],
                    // "orderable": false,

                },
                {
                    "targets": [4],
                    // "orderable": false,

                },
                {
                    "targets": [5],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        // Combine the first and last names into a single table field
                        return '<select class="form-control" onchange="edit_alert(this,' + data[0] + ')" name="user_section"> ' +
                            '<option  value="0">-Select Section-</option>' +
                            '<option selected value="1">1</option>' +
                            '<option  value="2">2</option>' +
                            '<option  value="3">3</option>' +
                            '<option  value="4">4</option>' +
                            '</select>';

                    }

                },
                {
                    "targets": [6],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<div class="custom-control custom-switch">' +
                            '<input type="checkbox" onchange="edit_alert(this)" name="user_status" class="custom-control-input"  checked="" id="user_status' + data[7] + '" data-original-title="Inactive / Active">' +
                            '<label class="custom-control-label" for="user_status' + data[7] + '"></label>' +
                            '</div>';

                    }

                },
                {
                    "targets": [7],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" value="c" name="user_crud[]" class="custom-control-input" id="defaultInlineC">' +
                            '<label class="custom-control-label" for="defaultInlineC">C</label>' +
                            '</div>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" value="r" checked name="user_crud[]" class="custom-control-input" id="defaultInlineu">' +
                            '<label class="custom-control-label" for="defaultInlineu">R</label>' +
                            '</div> <br> <br>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" value="u" name="user_crud[]" class="custom-control-input" id="defaultInlinedr">' +
                            '<label class="custom-control-label" for="defaultInlinedr">U</label>' +
                            '</div>' +
                            '<div class="custom-control custom-checkbox custom-control-inline is-invalid">' +
                            '<input type="checkbox" value="d" name="user_crud[]" class="custom-control-input" id="defaultInlined">' +
                            '<label class="custom-control-label" for="defaultInlined">D</label>' +
                            '</div>';

                    }

                },
                {
                    "targets": [8],
                    // "orderable": false,
                    "data": null,
                    render: function(data, type, row) {

                        return '<a href="javascript:void(0);" onclick="edit_alert(' + data[7] + ')" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>' +
                            '<a href="javascript:void(0);" onclick="delete_alert(' + data[7] + ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';

                    }

                },
            ],
        }); //dt_user_list ends
    });
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
                    error: function(err) {

                    }
                })
                // Swal.fire("Deleted!", "User has been deleted.");
            }
        }); //alert ends

    }
    //
    function edit_alert(item, id) {


        Swal.fire({
            title: "Are you sure?",
            text: "You want to update this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, update it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('user/updateuseronchange') ?>',
                    method: 'get',
                    data: {
                        "field_name": item.name,
                        "field_value": item.value,
                        "field_id": id
                    },
                    contentType: 'application/x-www-form-urlencoded',
                    success: function(response) {

                        //  console.log(response);
                    },
                    error: function(err) {

                    },

                })
                // Swal.fire("Deleted!", "User has been deleted.");
            }
        }); //alert ends



    }
</script>