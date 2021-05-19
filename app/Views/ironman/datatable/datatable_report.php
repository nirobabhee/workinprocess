<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
<script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.export.js"></script>


<script>
    $(document).ready(function() {
        $('#dt_example').dataTable({
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            fixedHeader: true,
            fixedColumns: true,
            // responsive: true,
            // lengthChange: false,
            // pageLength : 100,
            fixedColumns: {
                leftColumns: 3
            },
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
            // responsive: {
            //     details: {
            //         display: $.fn.dataTable.Responsive.display.modal({
            //             header: function(row) {
            //                 var data = row.data();
            //                 return 'Details for ' + data[0] + ' ' + data[1];
            //             }
            //         }),
            //         renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            //             tableClass: 'table table-responsive'
            //         })
            //     }
            // },
            // rowGroup: {
            //     dataSrc: 3,
            //     "className": "text-uppercase bg-primary",
            // },
            //   ----------Group by End-------
            columnDefs: [{
                    "targets": [3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                    "className": "text-center",
                },
                {
                    targets: [0, 1, 2],
                    className: "text-right"
                },
                {
                    targets: [17],
                    className: "text-right text-danger"
                },
                {
                    targets: [16],
                    className: "text-right text-success"
                },
                {
                    "targets": [13, 14, 15, 18],
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
                // -Start----13---------
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
                ///-End----13---------
                // -Start----14---------
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
                ///-End----14---------
                // -Start----15---------
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
                ///-End----15---------

                // -Start----16---------
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
                ///-End----16---------
                // -Start----17---------
                // Total over all pages
                total = api
                    .column(17)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(17, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(17).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///-End----17---------
                // -Start----18---------
                // Total over all pages
                total = api
                    .column(18)
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Total over this page
                pageTotal = api
                    .column(18, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Update footer
                $(api.column(18).footer()).html(
                    'Tk ' + pageTotal + '<br/> (Total-Tk ' + total + ')'
                );
                ///-End----18---------
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
    <!-- **********************************Start************************************ -->
    <!-- ------------**1stDiv**-------- -->
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">

                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt_example" class="table table-bordered table-hover table-striped w-100  nowrap">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SN.</th>
                                    <th>Req. Date</th>
                                    <th>Req. ID</th>
                                    <th>Section</th>
                                    <th>Store</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Req. Date</th>
                                    <th>Req. ID</th>
                                    <th>Section</th>
                                    <th>Store</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>BOM Total</th>
                                    <th>Payment Total</th>
                                    <th>Hour Total</th>
                                    <th>Timezone</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627890</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627891</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627892</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130023</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627894</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627895</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>06</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627896</td>
                                    <td>Liquid</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>07</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627897</td>
                                    <td>Liquid</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>08</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627898</td>
                                    <td>Liquid</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>09</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Liquid</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627810</td>
                                    <td>Blue</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627811</td>
                                    <td>Blue</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627812</td>
                                    <td>Blue</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627813</td>
                                    <td>Pin</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627814</td>
                                    <td>Pin</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>2020-02-05 07:40:16</td>
                                    <td>25275627899</td>
                                    <td>Machine</td>
                                    <td>6938 Volutpat</td>
                                    <td>nirob@gmail.com</td>
                                    <td>01653130025</td>
                                    <td>1</td>
                                    <td>1109.41</td>
                                    <td>110</td>
                                    <td>157</td>
                                    <td>6</td>
                                    <td>450</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="thead-dark">
                                    <th colspan="3">Total:</th>
                                    <th colspan="10"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************Rnd Your main content. ******************-->

</main>