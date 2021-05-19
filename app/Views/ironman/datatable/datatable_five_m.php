<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.export.js"></script>
<script>
    $(document).ready(function() {
        $('#dt_example').dataTable({
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            fixedHeader: true,
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
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
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
                    "targets": [10, 11, 12, 13, 14, 15, 16],
                    "className": "text-right",
                }
            ],
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
                    <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman//") ?>" autocomplete="off">
                        <div class="col-lg-3">
                            <div class="form-group mt-2">
                                <label class="form-label" for="addon-wrapping-left">Section</label>
                                <div class="input-group input-group-sm flex-nowrap">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fal fa-layer-group"></i></span>
                                    </div>
                                    <select class="custom-select form-control is-invalid" name="user_section">
                                        <option value="">-Select Section-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="help-block">Firstly select a section.</div>
                            </div>
                        </div>
                        <!-- <div class="panel-content"> -->
                            <table id="" class="table table-bordered table-hover table-striped w-100  nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Materials ID</th>
                                        <th>Name</th>
                                        <th title="Not changeable, As per demand,By permission">Alternative</th>
                                        <!-- <th>Section</th> -->
                                        <th>Materials Category</th>
                                        <th>Measurement</th>
                                        <th>Machine & Uses Hr</th>
                                        <th>Man Per Hr</th>
                                        <th>Unit</th>
                                        <th>QTY</th>
                                        <th>Wastage % Max</th>
                                        <th>Final Qty</th>
                                        <th>Unit Price ( 01 June 2021)</th>
                                        <th>Total Cost</th>
                                        <th>Start Day</th>
                                        <th>End Day</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <!-- <td>01</td> -->
                                    <td>Materials 1</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <!-- <td>Section 1</td> -->
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tbody>
                            </table>
                        <!-- </div> -->
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

                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- DataTable Start -->
                        <table id="dt_example" class="table table-bordered table-hover table-striped w-100  nowrap">
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
                                    <th>Unit Price ( 01 June 2021)</th>
                                    <th>Total Cost</th>
                                    <th>Start Day</th>
                                    <th>End Day</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Materials 1</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 1</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Materials 1</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 1</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>2</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Materials 2</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 1</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Materials 3</td>
                                    <td>Name</td>
                                    <td>By permission</td>
                                    <td>Section 1</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>6</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Materials 4</td>
                                    <td>Name</td>
                                    <td>By permission</td>
                                    <td>Section 1</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td> 5.00</td>
                                    <td>500.00</td>
                                    <td>7</td>
                                    <td>9</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>Materials 5</td>
                                    <td>Name</td>
                                    <td>By permission</td>
                                    <td>Section 2</td>
                                    <td>Board</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>3</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td>Materials 2</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 2</td>
                                    <td>Chemical</td>
                                    <td>A: 40%, B: 30%, C: 30%</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>ltr</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td>Materials 4</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 2</td>
                                    <td>Chemical</td>
                                    <td>A: 40%, B: 30%, C: 30%</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>ltr</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td>Materials 5</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 2</td>
                                    <td>Chemical</td>
                                    <td>A: 20%, B: 30%, C: 50%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>ltr</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td>Materials 6</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 2</td>
                                    <td>Chemical</td>
                                    <td>A: 100%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>ltr</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Materials 7</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 2</td>
                                    <td>Chemical</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>ltr</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Materials 10</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 3</td>
                                    <td>Fabric</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>Yard</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>20</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Materials 2</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 3</td>
                                    <td>Fabric</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>25</td>
                                    <td>29</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Materials 4</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 3</td>
                                    <td>Board</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>NA</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>25</td>
                                    <td>28</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Materials 6</td>
                                    <td>Name</td>
                                    <td>By permission</td>
                                    <td>Section 3</td>
                                    <td>Fabric</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>Yard</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>25</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Materials 80</td>
                                    <td>Name</td>
                                    <td>By permission</td>
                                    <td>Section 3</td>
                                    <td>Fabric</td>
                                    <td>A: 45%, B: 55%</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>Yard</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>25</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Materials 4</td>
                                    <td>Name</td>
                                    <td>As per demand</td>
                                    <td>Section 4</td>
                                    <td>Wood</td>
                                    <td>Length: 450 cm, Width: 45 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>sft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>24</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Materials 7</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 4</td>
                                    <td>Wood</td>
                                    <td>Length: 450 cm, Width: 45 cm, Thickness: 4 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>cft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>22</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>Materials 9</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 4</td>
                                    <td>Wood</td>
                                    <td>Length: 450 cm, Width: 45 cm, Thickness: 4 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>cft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>22</td>
                                    <td>30</td>
                                <tr>
                                    <td>19</td>
                                    <td>Materials 54</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 4</td>
                                    <td>Wood</td>
                                    <td>Length: 450 cm, Width: 45 cm, Thickness: 4 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>cft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>22</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>Materials 50</td>
                                    <td>Name</td>
                                    <td>Not changeable</td>
                                    <td>Section 4</td>
                                    <td>Wood</td>
                                    <td>Length: 450 cm, Width: 45 cm, Thickness: 4 cm</td>
                                    <td>Machine: A & Uses: 4 Hr</td>
                                    <td>1Per: 4Hr</td>
                                    <td>cft</td>
                                    <td>100</td>
                                    <td>10</td>
                                    <td>90</td>
                                    <td>5.00</td>
                                    <td>500.00</td>
                                    <td>22</td>
                                    <td>30</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="10">Total</th>
                                    <th>QTY</th>
                                    <th>Wastage % Max</th>
                                    <th>Final Qty</th>
                                    <th>Unit Price ( 01 June 2021)</th>
                                    <th>Total Cost</th>
                                    <th>Start Day</th>
                                    <th>End Day</th>
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