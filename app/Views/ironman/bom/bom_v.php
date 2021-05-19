
<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
<script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.export.js"></script>
<script>
    $(document).ready(function() {

        // --------1st-Start Cart Form & Table------------
        $('#bom_cart').dataTable({
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            fixedHeader: true,
            searching: false,
            paging: false,
            orderable: false,
            // responsive: true,
            lengthChange: false,
            bInfo: false,
            // pageLength : 100,
            // fixedColumns: true,
            // fixedColumns: {
            //     leftColumns: 3
            // },

            //   ----------Group by End-------
            columnDefs: [],

        });
        // ---------------2nd----------------------
        $('#dt_bom_list').dataTable({
            "order": [],
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            fixedHeader: true,
            "serverSide": true,
            "processing": true,
            // responsive: true,
            // lengthChange: false,
            // pageLength : 100,
            // fixedColumns: true,
            // fixedColumns: {
            //     leftColumns: 3
            // },
            dom:
                /*	--- Layout Structure 
                	--- Options
                	l	-	length changing input control
                	f	-	filtering input
                	t	-	The table!
                	i	-	Table information summary
                	p	-	pagination control
                	r	-	processing display element
                	B	-	buttons
                	R	-	ColReorder
                	S	-	Select

                	--- Markup
                	< and >				- div element
                	<"class" and >		- div with a class
                	<"#id" and >		- div with an ID
                	<"#id.class" and >	- div with an ID and a class

                	--- Further reading
                	https://datatables.net/reference/option/dom
                	--------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                // { //Column visibility
                //     extend: 'colvis',
                //     text: 'Column Visibility',
                //     titleAttr: 'Col visibility',
                //     className: 'mr-sm-3'
                // },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ],
            //   ----------Group by Start-------
            rowGroup: {
                dataSrc: 4,
                "className": "text-uppercase",
            },
            //   ----------Group by End-------
            columnDefs: [{
                    "targets": [4],
                    "visible": false,
                    "searchable": false,
                    // "className": "text-center",
                },
                {
                    "targets": [0,1, 2, 3, 5, 6, 7, 8, 9],
                    "className": "text-center",
                },
                // {
                //     targets: [17],
                //     className: "text-right text-danger"
                // },
                // {
                //     targets: [16],
                //     className: "text-right text-success"
                // },
                {
                    "targets": [10, 11, 12, 13, 14, 15,16],
                    "className": "text-right",
                },
                {
                    "targets": [17],
                    "orderable": false,
                    "data": null,
                    render: function(data, type, row) {
                        var update_btn = "";
                        var delete_btn = "";
                        <?php if (crud_check("update")) : ?>
                            update_btn = '<a href="javascript:void(0);" onclick="pass_user_id_to_modal_ajax(' + data[1] + ')" data-toggle="modal" data-target="#default-example-modal-center" class="btn btn-success btn-sm btn-icon js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>';
                        <?php endif ?>
                        <?php if (crud_check("delete")) : ?>
                            delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[1] + ')" class="btn btn-danger btn-sm btn-icon js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                        <?php endif ?>
                        return update_btn + delete_btn;
                    }
                },
            ],
            "ajax": {
                url: "<?php echo base_url('/ironman/bom_c/get_bom_details_by_fg_id'); ?>",
                type: "POST",
                // success:function(response){
                //     console.log(response)

                // },
                // error:function(err){
                // },
            },
            // :::::::Footer_Calculation::::::::
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api(),
                    data;
                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '') * 1 :
                        typeof i === 'number' ?
                        i : 0;
                };
                // -Start----10-----------**
                // Total over all pages
                total = api
                    .column(10)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(10, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(10).footer()).html(
                    'QTY ' + pageTotal + '<br/> (Total-QTY ' + total + ')'
                );
                ///----End----10-----------**

                // ----Start----11---------**
                // Total over all pages
                total = api
                    .column(11)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(11, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(11).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                // ----End----11-----------**

                // ----Start----12---------**
                // Total over all pages
                total = api
                    .column(12)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(12, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(12).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///----End----12-----------**

                // ----Start----13---------**
                // Total over all pages
                total = api
                    .column(13)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(13, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(13).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///----End----13-----------**

                // ----Start----14---------**
                // Total over all pages
                total = api
                    .column(14)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(14, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(14).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///----End----14-----------**

                // ----Start----15---------**
                // Total over all pages
                total = api
                    .column(15)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(15, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(15).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///----End----15-----------**

                // ----Start----16---------**
                // Total over all pages
                total = api
                    .column(16)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(16, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(16).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///---End----16---------**
            },

            // :::::::Footer_Calculation::::::::
        });

    });
</script>
<script>
    function finalCost() {
        var final_qty = $('#final_qty').val();
        var unit_price = $('#unit_price').val();
        $('#total_cost').val(final_qty * unit_price);
    }

    function finalQty() {
        var qty = $('#bomQty').val();
        var wastage_qty = $('#bomWastage').val();
        $('#final_qty').val(qty * 1.00 + (wastage_qty/100) * qty * 1.00);
    }
    // -----start------___Session Cart Delete____----------------//
    function delete_alert(key) {
        console.log(key);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url() ?>/ironman/bom_c/delete_bom_item/' + key,
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
    // -----end------___Session Cart Delete____----------------//
   
</script>
<script>
    function pass_bom_id_to_modal_ajax(key,session_data_for_modal){
    //   console.log(session_data_for_modal);
      $('#modal_session_index').val(key);
        $('#modal_bom_name').val(session_data_for_modal.bom_name);

        $('#modal_bom_alternative').val(session_data_for_modal.bom_alternative);
       
        $('#modal_bom_length').val(session_data_for_modal.bom_length);
        $('#modal_bom_length_mixture').val(session_data_for_modal.bom_length_mixture);
       
        $('#modal_bom_width').val(session_data_for_modal.bom_width);
        $('#modal_bom_width_mixture').val(session_data_for_modal.bom_width_mixture);
       
        $('#modal_bom_thickness').val(session_data_for_modal.bom_thickness);
        $('#modal_bom_thickness_mixture').val(session_data_for_modal.bom_thickness_mixture);
       
        $('#modal_bom_machine').val(session_data_for_modal.bom_machine);
        $('#modal_bom_machine_hour').val(session_data_for_modal.bom_machine_uses_hours);
       
        $('#modal_bom_per_person').val(session_data_for_modal.bom_per_person);
        $('#modal_bom_per_person_hour').val(session_data_for_modal.bom_per_person_hours);
       
        $('#modal_bom_qty').val(session_data_for_modal.bom_qty);
        $('#modal_bom_wastage_max_percent').val(session_data_for_modal.bom_wastage_max_percent);
        $('#modal_bom_final_qty').val(session_data_for_modal.bom_final_qty);
       
        $('#modal_bom_unit_price').val(session_data_for_modal.bom_unit_price);
        $('#modal_bom_total_cost').val(session_data_for_modal.bom_total_cost);
       
        $('#modal_bom_start_day').val(session_data_for_modal.bom_start_day);
        $('#modal_bom_end_day').val(session_data_for_modal.bom_end_day);
        
        
    }
</script>
<!-- bom update modal part ↓↓↓↓↓↓ -->
<div class="modal fade" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="breadcrumb page-breadcrumb">
                        Edit BOM
                    </span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ......modal Form...Start.......... -->
                <div class="table-responsive">
                    <div class="container-fluid">
                        <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/bom_c/update_bom_before_submit") ?>" autocomplete="off">
                            <input type="hidden" name="modal_session_index" id="modal_session_index">
                            <table class="table table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Name<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_name" required name="modal_bom_name" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update your BOM name.</span>
                                        </td>
                                    </tr>



                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left">Alternative</label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-house"></i></span>
                                                </div>
                                                <select class="custom-select form-control is-invalid" id="modal_bom_alternative" name="modal_bom_alternative">
                                                    <option value="Not changeable">Not changeable</option>
                                                    <option value="As per demand">As per demand</option>
                                                    <option value="By permission">By permission</option>
                                                </select>
                                            </div>
                                            <span class="help-block">Update BOM alternative.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:"> Measurement:<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <table class="float-right">
                                                <tr>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Length:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_length" name="modal_bom_length" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Mixture:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_length_mixture" name="modal_bom_length_mixture" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                        <!-- <span class="help-block">Update BOM length and mixture.</span> -->
                                                </tr>
                                                
                                                <tr>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Width:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_width" name="modal_bom_width" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Mixture:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_width_mixture" name="modal_bom_width_mixture" class="form-control is-invalid">
                                                        </div>
                                                        <!-- <span class="help-block">Update BOM width and mixture.</span> -->
                                                    </td>
                                                </tr>
                                              
                                                <tr>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Thickness:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_thickness" name="modal_bom_thickness" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Mixture:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_thickness_mixture" name="modal_bom_thickness_mixture" class="form-control is-invalid">
                                                        </div>
                                                        <!-- <span class="help-block">Update BOM thickness and mixture.</span> -->
                                                    </td>
                                                </tr>
                                              
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:"> Machine & Uses Hr:<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <table class="float-right">
                                                <tr>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Machine:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_machine" name="modal_bom_machine" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Uses:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_machine_hour" name="modal_bom_machine_hour" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                             
                                              
                                            </table>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:"> Man Per Hr:<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <table class="float-right">
                                                <tr>
                                                <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Man:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_per_person" name="modal_bom_per_person" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                    <th style="text-align:right;">
                                                        <label class="form-label" for="addon-wrapping-left">Hour:</label>
                                                    </th>
                                                    <td style="text-align: left">
                                                        <div class="input-group input-group-sm flex-nowrap">
                                                            <input type="text" id="modal_bom_per_person_hour" name="modal_bom_per_person_hour" class="form-control is-invalid">
                                                        </div>
                                                    </td>
                                                </tr>
                                              
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">QTY<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_qty" name="modal_bom_qty" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update your QTY.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Wastage % Max<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_wastage_max_percent" name="modal_bom_wastage_max_percent" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update Wastage % Max.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Final QTY<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" readonly id="modal_bom_final_qty" name="modal_bom_final_qty" class="form-control">
                                            </div>
                                            <span class="help-block">Update Final QTY.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Unit Price<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_unit_price" name="modal_bom_unit_price" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update Unit Price.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Total Cost<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" readonly id="modal_bom_total_cost" name="modal_bom_total_cost" class="form-control">
                                            </div>
                                            <span class="help-block">Update Total Cost.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">Start Day<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_start_day" name="modal_bom_start_day" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update Start Day.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">
                                            <label class="form-label " for="addon-wrapping-left">End Day<b style="color: red;">*</b></label>
                                        </th>
                                        <td style="text-align: left">
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" id="modal_bom_end_day" name="modal_bom_end_day" class="form-control is-invalid">
                                            </div>
                                            <span class="help-block">Update End Day.</span>
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
                <!-- ......modal Form...End.......... -->
            </div>

        </div>
    </div>

</div>
<!-- bom update modal part ends ↑↑↑↑↑ -->


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
    <!-- ------------**1stDiv**-------- -->
    <div class="row">
        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-layer-plus">&nbsp;</i> BOM
                    </h2>
                </div>

                <div class="panel-container">
                    <!-- <div class="panel-content"> -->
                    <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/bom_c/bom_add_to_session") ?>" autocomplete="off">
                        <!-- <div class="panel-content"> -->
                        <table id="bom_cart" class="table table-bordered table-striped w-100  nowrap text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th>Materials ID</th> -->
                                    <th>Name</th>
                                    <th title="Not changeable, As per demand,By permission">Alternative</th>
                                    <th>Measurement</th>
                                    <th>Machine & Uses Hr</th>
                                    <th>Man Per Hr</th>
                                    <th>QTY</th>
                                    <th>Wastage % Max</th>
                                    <th>Final QTY</th>
                                    <th>Unit Price</th>
                                    <th>Total Cost</th>
                                    <th>Start Day</th>
                                    <th>End Day</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- <th><input type="text" id="" name="bom_material_id" placeholder=" Material ID"></th> -->
                                    <th>
                                        <input type="text" id="bom_name" name="bom_name" placeholder="Raw material name" class="is-valid " autocomplete="off" required="">
                                    </th>
                                    <th>
                                        <select name="bom_alternative">
                                            <option value="Not changeable">Not changeable</option>
                                            <option value="As per demand">As per demand</option>
                                            <option value="By permission">By permission</option>
                                        </select>
                                    </th>
                                    <th>
                                        <span class="ml-1">Length:</span><input type="number" class="text-right"   name="bom_length" value="0" placeholder="length cm" style="width: 65px;">
                                        <span class="ml-3">Width:</span> <input type="number" class="text-right"  name="bom_width" value="0" placeholder="width cm" style="width: 65px;">
                                        <span>Thickness</span> : <input type="number" class="text-right" name="bom_thickness" value="0" placeholder="Thickness" style="width: 70px;">
                                    </br>

                                        <span class="float-left pt-2">Mixture:</span> <input type="number" class="text-right" name="bom_length_mixture" value="0" placeholder="%" style="width: 65px;" class="mt-2 float-left">
                                        <span class="ml-1 ">Mixture:</span> <input type="number" class="text-right" name="bom_width_mixture" value="0" placeholder="%" style="width: 65px;" class="mt-2 ">
                                        <span class="ml-3 ">Mixture:</span> <input type="number" class="text-right mt-2 ml-1" name="bom_thickness_mixture" value="0" placeholder="%" style="width: 70px;" >
                                    </th>
                                    <th>
                                        <!-- Machine:<input type="text" name="bom_machine" placeholder="Machine" style="width: 60px;"> -->
                                        Machine: <select name="bom_machine">
                                                <?php
                                                foreach ($machines as $machine) {
                                                ?>
                                                    <option value="<?= $machine->machine_name; ?>"><?= $machine->machine_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        Hour:<input type="number" class="text-right" name="bom_machine_uses_hours" value="0" placeholder="Uses" style="width: 60px;">
                                    </th>
                                    <th>
                                        Person:<input type="number" class="text-right" name="bom_per_person" value="0" placeholder="Per person" style="width: 60px;">
                                        Hour:<input type="number" class="text-right" name="bom_per_person_hours" value="0" placeholder="Uses" style="width: 60px;">
                                    </th>
                                    <th><input type="number" class="text-right" id="bomQty" name="bom_qty" value="0" placeholder=" Quantity" onkeyup=finalQty();></th>
                                    <th ><input type="number" class="text-right" id="bomWastage" name="bom_wastage_max_percent" value="0" placeholder="Wastage % max" onkeyup=finalQty(); ></th>

                                    <th title="Final qty =Quantity + Max wastage % "><input style="border: none;" class="text-right" type="number" id="final_qty" name="bom_final_qty" placeholder=" Final Qty" value="0" readonly=""></th>

                                    <th title="Enter Unit Price"><input type="number" class="text-right" id="unit_price" class="text-right" name="bom_unit_price" value="0" placeholder=" Unit Price" onkeyup="finalCost()"></th>

                                    <th title="Total Cost = Final Quantity * Unit Price"><input type="number" class="text-right"  style="border: none;" id="total_cost" name="bom_total_cost" placeholder="Total Cost" value="0" readonly=""></th>

                                    <th title="Enter Start Duration Days."><input type="number" class="text-right" name="bom_start_day" value="0" placeholder="Day Start"></th>
                                    <th title="Enter End Duration Days."><input type="number" class="text-right" name="bom_end_day" value="0" placeholder="Day End"></th>
                                    <th title="Add Layer"> <button class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle"><i class="fal fa-plus-octagon"></i></button></th>
                                </tr>

                                <?php
                                if (!empty($_SESSION['bomdata'])) {
                                    foreach ($_SESSION['bomdata'] as $key => $bom_cart_session) {
                                ?>
                                        <div id="">
                                            <tr>
                                                <td><?= $bom_cart_session['bom_name']; ?></td>
                                                <td><?= $bom_cart_session['bom_alternative']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b>Length:</b><?= $bom_cart_session['bom_length']; ?>,     
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Width:</b><?= $bom_cart_session['bom_width']; ?>,    
                                                        </div>
                                                        <div class="col-md-4">
                                                            <b>Thickness:</b> <?= $bom_cart_session['bom_thickness']; ?>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 p-0">
                                                        <b>Length Mixture:</b><?= $bom_cart_session['bom_length_mixture']; ?>,  
                                                        </div>
                                                        <div class="col-md-4 p-0">
                                                        <b>Width Mixture:</b><?= $bom_cart_session['bom_width_mixture']; ?>,  
                                                        </div>
                                                        <div class="col-md-4 p-0">
                                                        <b>Thickness Mixture:</b> <?= $bom_cart_session['bom_thickness_mixture']; ?>
                                                        </div>
                                                    </div>
                                                     
                                                    <br>
                                                     
                                                </td>
                                                <td><b>Machine:</b><?= $bom_cart_session['bom_machine']; ?> <b>Hour:</b><?= $bom_cart_session['bom_machine_uses_hours']; ?></td>
                                                <td><b>Man:</b><?= $bom_cart_session['bom_per_person']; ?> <b>Hour:</b> <?= $bom_cart_session['bom_per_person_hours']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_qty']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_wastage_max_percent']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_final_qty']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_unit_price']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_total_cost']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_start_day']; ?></td>
                                                <td class="text-right"><?= $bom_cart_session['bom_end_day']; ?></td>
                                                <!-- <td/ $bom_cart_session['bom_end_day']; ?></td> -->
                                                <td>
                                                    <a href="javascript:void(0);" onclick='pass_bom_id_to_modal_ajax(<?=$key?>,<?=json_encode($bom_cart_session)?>)' data-toggle="modal" data-target="#default-example-modal-center" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7 mr-2" id="s-sweetalert2-example-7"><i class="fal fa-edit"></i></a>
                                                    <a onclick="delete_alert(<?= $key ?>)" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle"><i class="fal fa-times"></i></a>
                                                </td>
                                            </tr>
                                        </div>
                                <?php }
                                }
                                ?>
                            <tfoot>
                                <tr>
                                    <!-- <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th> -->
                                    <th colspan="5">Total:</th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_qty_total)) echo $footer_qty_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_wastage_total)) echo $footer_wastage_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_final_qty_total)) echo $footer_final_qty_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_unit_price_total)) echo $footer_unit_price_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_total_cost_total)) echo $footer_total_cost_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_start_day_total)) echo $footer_start_day_total; else echo 0.0?>">
                                    </th>
                                    <th>
                                        <input type="text" class="text-right" style="border: none;" readonly value="<?php if(isset($footer_end_day_total)) echo $footer_end_day_total; else echo 0.0?>">
                                    </th>
                                  
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                        </table>
                    </form>

                    <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/bom_c/bom_create") ?>" autocomplete="off">

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="col-lg-6 col-md-8">
                                    <div class="form-group">
                                        <label class="form-label" for="addon-wrapping-left">Section</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <select class="custom-select form-control is-invalid" required name="bom_section">
                                                <option value="">-Select Section-</option>
                                                <?php
                                                foreach ($sections as $section) {
                                                ?>
                                                    <option value="<?= $section->section_name; ?>"><?= $section->section_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="help-block"> Confirm Your Section.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="form-group mt-4 float-right">
                                        <?php if (crud_check("create")) : ?>
                                            <div class=" d-flex flex-row align-items-center ">
                                                <button class="btn btn-primary ml-auto px-6" type="submit">Create</button>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </form>

                </div>
                <!-- </div> -->
            </div>
            <!-- ***********************************End*********************************** -->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">

                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- DataTable Start -->
                        <table id="dt_bom_list" class="table table-bordered table-hover table-striped w-100  nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SN.</th>
                                    <th>Materials ID</th>
                                    <th>Name</th>
                                    <th title="Not changeable, As per demand,By permission">Alternative</th>
                                    <th>Section</th>
                                    <th>Materials Category</th>
                                    <th>Measurement</th>
                                    <th>Machine & Uses Hr</th>
                                    <th>Man Per Hr</th>
                                    <th>Unit</th>
                                    <th>QTY</th>
                                    <th>Wastage % Max</th>
                                    <th>Final Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total Cost</th>
                                    <th>Start Day</th>
                                    <th>End Day</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="10">Total</th>
                                    <th>QTY</th>
                                    <th>Wastage % Max</th>
                                    <th>Final Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total Cost</th>
                                    <th>Start Day</th>
                                    <th>End Day</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- DataTable End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--*****************End Your main content. ******************-->