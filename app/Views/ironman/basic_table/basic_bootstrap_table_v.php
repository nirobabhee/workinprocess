<link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
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
                    <!-- Notificatiojn Div -->
                </div>
            </div>
        </div>
    </div>
    <!--***************** Your main content goes below here: ******************-->

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-list-alt">&nbsp;</i> Basic Bootstrap Table
                        </span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content ">
                        <div class="table-responsive-lg sticky-header-container fixed-table-container">
                            <table class="table table-sm table-bordered table-striped m-0 ">
                                <thead class="bg-fusion-50 undefined sticky-header">
                                    <tr>
                                        <th>SN</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Phone Number</th>
                                        <th>E-mail</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" text-align>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item?">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</td>
                                        <td>John</td>
                                        <td>Ketty</td>
                                        <td>Kettyparry</td>
                                        <td>0147895623</td>
                                        <td>well@gmail.com</td>
                                        <td>Mirpur,Dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item?">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Solo</td>
                                        <td>Moto</td>
                                        <td>Solaiman</td>
                                        <td>0231546987</td>
                                        <td>solo@gmail.com</td>
                                        <td>Kazipara,Dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">4</td>
                                        <td>mokku</td>
                                        <td>ulla</td>
                                        <td>Mukul</td>
                                        <td>0147896332587</td>
                                        <td>Mark@gmail.com</td>
                                        <td>dhanmondhi</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Martto</td>
                                        <td>01424578</td>
                                        <td>good@gmail.com</td>
                                        <td>dhaka</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit Your Item">
                                                <i class="fal fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle delete_identifier" id="" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Sure To Delete?">
                                                <i class="fal fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************End Your main content. ******************-->
</main>
<script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
<script>
    $(document).ready(function() {
        // "use strict";
        $(".delete_identifier").on("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                if (result.value) {
                    Swal.fire("Deleted!", "Your item has been deleted.", "success");
                }
            });
        }); // ... and by passing a parameter, you can execute something else for "Cancel".

    });
</script>