<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?php echo $title; ?></a>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li><!-- date -->
    </ol>
    <!-- <div class="alert alert-primary">
        <div class="d-flex flex-start w-100">
            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <p class="m-0">
                        Here Developer User Showing Insert Alert ! <a href="#" target="_blank">List View</a>
                    </p>
                </div>
            </div>
        </div>
    </div> -->
    <!--***************** Your main content goes below here: ******************-->
    <!-- **********************************Start************************************ -->
    <!-- ------------**1stDiv**-------- -->
    <div class="row">
        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-edit">&nbsp;</i> Backend Setting Edit
                    </h2>
                    </span>
                    </h2>
                </div>
                <div class="panel-container">
                    <!-- <div class="panel-content"> -->
                    <!-- ------Form start-------- -->
                    <form class="was-validated" enctype="multipart/form-data" method="post" action="<?= base_url() ?>/ironman/setting_backend_c/update_setting_backend_submit/<?= $backend_setting_data->setting_backend_id ?>" autocomplete="off">
                        <div class="panel-content">
                            <!-- ------Div start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label " for="addon-wrapping-left">Company Name:<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_company_name" value="<?= $backend_setting_data->setting_backend_company_name     ?>" class="form-control is-invalid" placeholder="Enter full name" aria-label="Full Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Full name is required!" required>
                                        </div>
                                        <span class="help-block">Update company full name.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="addon-wrapping-left">Phone Number:<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-phone-plus"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_phone" value="<?= $backend_setting_data->setting_backend_phone ?>" placeholder="+88" data-inputmask="'mask': '9999-9999999'" class="form-control is-invalid" aria-label="phonenumber" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Phone number must be 11 digit." required>
                                        </div>
                                        <span class="help-block">Update your valid length phone number.</span>
                                    </div>
                                </div>

                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------phn/UserGroup start-------- -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Email:<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-mail-bulk"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_email" value="<?= $backend_setting_data->setting_backend_email ?>" placeholder="Example.gmail.com" data-inputmask="'alias': 'email'" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="E-mail must be unique & valid format." required>
                                        </div>
                                        <span class="help-block">Update valid E-mail: example@xxx.com</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Registration No:</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-registered"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_registration_no" value="<?= $backend_setting_data->setting_backend_registration_no ?>" placeholder="Enter Registration No" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update registration no.">
                                        </div>
                                        <span class="help-block">Update registration no.</span>
                                    </div>
                                </div>


                            </div>
                            <!-- -------Div End--------- -->

                            <!-- ------Section/picture start-------- -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label">Logo:</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-image"></i></span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="setting_backend_logo" class="custom-file-input is-invalid" id="customControlValidation7" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select A valid Logo for Company.">
                                                <label class="custom-file-label" for="customControlValidation7">Choose Picture</label>
                                            </div>
                                        </div>
                                        <span class="help-block">Update your profile logo.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Address:<b style="color: red;">*</b></label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-address-card"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_address" value="<?= $backend_setting_data->setting_backend_address ?>" placeholder="Address" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update setting Address." required>
                                            <input type="hidden" name="setting_backend_id" value="<?= $backend_setting_data->setting_backend_id ?>">
                                        </div>
                                        <span class="help-block">Update Address.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------phn/UserGroup start-------- -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">VAT (%):</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-percent"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_vat" value="<?= $backend_setting_data->setting_backend_vat ?>" placeholder="Enter Vat" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update Vat % amount for company setting.">
                                        </div>
                                        <span class="help-block">Update VAT amount.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mt-2">
                                        <label class="form-label" for="addon-wrapping-left">Tax (%):</label>
                                        <div class="input-group input-group-sm flex-nowrap">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fal fa-badge-percent"></i></span>
                                            </div>
                                            <input type="text" name="setting_backend_tax" value="<?= $backend_setting_data->setting_backend_tax ?>" placeholder="Registration" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update Tax % amount for company setting.">
                                        </div>
                                        <span class="help-block">Update Tax amount.</span>
                                    </div>
                                </div>
                            </div>
                            <!-- -------Div End--------- -->
                            <!-- ------Update Button start-------- -->
                            <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Update Setting</button>
                            </div>
                            <!-- -------Div End--------- -->
                        </div>
                    </form>
                    <!-- -------Form End--------- -->
                    <!-- </div> -->
                </div>
            </div>
            <!-- ***********************************End*********************************** -->
        </div>
    </div>
    <!--*****************End Your main content. ******************-->

</main>