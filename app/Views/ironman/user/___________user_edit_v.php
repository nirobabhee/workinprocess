<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">WIPLayer</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User
                <i class="fal fa-angle-down"></i>
            </a>
            <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 114px; left: 110px;">
                <a class="dropdown-item" href="#">Create</a>
                <a class="dropdown-item" href="#">List</a>
            </div>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">Monday, April 12, 2021</span></li>
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
                        <i class="fal fa-layer-plus">&nbsp;</i>User Edit
                    </h2>
                    </span>
                    </h2>
                </div>
                <div class="panel-container">
                    <!-- <div class="panel-content"> -->
                        <!-- ------Form start-------- -->
                        <form class="was-validated" enctype="multipart/form-data" method="post" action="<?= base_url() ?>/ironman/user_c/update_user_submit/<?= $user_id ?>" autocomplete="off">
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
                                                <input type="text" name="user_full_name" value="<?= $user_data->user_full_name ?>" class="form-control is-invalid" placeholder="Enter full name" aria-label="Full Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Full name is required!" required>
                                            </div>
                                            <span class="help-block">Update your full name.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="addon-wrapping-left">MAC Address</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-computer-classic"></i></span>
                                                </div>
                                                <input type="text" name="user_mac_address" value="<?= $user_data->user_mac_address ?>" placeholder="99:99:99:99:99:99" data-inputmask="'alias': 'mac'" class="form-control is-invalid" aria-label="phonenumber" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update your valid MAC address.">
                                            </div>
                                            <span class="help-block">Update your MAC address.</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- -------Div End--------- -->
                                <!-- ------phn/UserGroup start-------- -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-3">
                                            <label class="form-label" for="addon-wrapping-left">Phone Number<b style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-phone-plus"></i></span>
                                                </div>
                                                <input type="text" name="user_phone" value="<?= $user_data->user_phone ?>" placeholder="+88" data-inputmask="'mask': '9999-9999999'" class="form-control is-invalid" aria-label="phonenumber" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Phone number must be digit with *(11) Character." required>
                                            </div>
                                            <span class="help-block">Update your valid length phone number.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-3">
                                            <label class="form-label" for="addon-wrapping-left">User Group<b style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-crown"></i></span>
                                                </div>
                                                <select class="form-control custom-select is-invalid" name="user_group" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update Your Privilege User Group." required>
                                                    <!-- <option value="">-Select Group-</option> -->
                                                    <option <?php if ($user_data->user_group == "accounts") echo "selected" ?> value="accounts">Accounts</option>
                                                    <option <?php if ($user_data->user_group == "administrator") echo "selected" ?> value="administrator">Administrator</option>
                                                    <option <?php if ($user_data->user_group == "audit") echo "selected" ?> value="audit">Audit</option>
                                                    <option <?php if ($user_data->user_group == "data_entry") echo "selected" ?> value="data_entry">Data Entry Operator</option>
                                                    <option <?php if ($user_data->user_group == "developer") echo "selected" ?> value="developer">Developer</option>
                                                    <option <?php if ($user_data->user_group == "hr") echo "selected" ?> value="hr">HR</option>
                                                    <option <?php if ($user_data->user_group == "it") echo "selected" ?> value="it">IT</option>
                                                    <option <?php if ($user_data->user_group == "it") echo "selected" ?> value="it">IT</option>
                                                    <option <?php if ($user_data->user_group == "interior") echo "selected" ?> value="interior">Interior</option>
                                                    <option <?php if ($user_data->user_group == "logistic") echo "selected" ?> value="logistic">Logistic</option>
                                                    <option <?php if ($user_data->user_group == "management") echo "selected" ?> value="management">Management</option>
                                                    <option <?php if ($user_data->user_group == "marketing") echo "selected" ?> value="marketing">Marketing</option>
                                                    <option <?php if ($user_data->user_group == "pd") echo "selected" ?> value="pd">PD</option>
                                                    <option <?php if ($user_data->user_group == "pdqms") echo "selected" ?> value="pdqms">PDQMS</option>
                                                    <option <?php if ($user_data->user_group == "purchase_and_procurement") echo "selected" ?> value="purchase_and_procurement">Purchase & Procurement</option>
                                                    <option <?php if ($user_data->user_group == "qc") echo "selected" ?> value="qc">QC</option>
                                                    <option <?php if ($user_data->user_group == "sales_person") echo "selected" ?> value="sales_person">Sales Person</option>
                                                    <option <?php if ($user_data->user_group == "store_incharge") echo "selected" ?> value="store_incharge">Store Incharge</option>
                                                    <option <?php if ($user_data->user_group == "store") echo "selected" ?> value="store">Store</option>
                                                    <option <?php if ($user_data->user_group == "supplier") echo "selected" ?> value="supplier">Supplier</option>
                                                    <option <?php if ($user_data->user_group == "wip") echo "selected" ?> value="wip">WIP</option>
                                                    <option <?php if ($user_data->user_group == "wip_incharge") echo "selected" ?> value="wip_incharge">WIP Incharge</option>
                                                </select>
                                            </div>
                                            <span class="help-block">Update your user group.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------Div End--------- -->
                                <!-- ------Section/picture start-------- -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="addon-wrapping-left">Email<b style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-mail-bulk"></i></span>
                                                </div>
                                                <input type="text" name="user_email" value="<?= $user_data->user_email ?>" placeholder="Example.gmail.com" data-inputmask="'alias': 'email'" class="form-control is-invalid" aria-label="Email" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="E-mail must be unique & valid format." required>
                                            </div>
                                            <span class="help-block">Update valid E-mail: example@xxx.com</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="addon-wrapping-left">Section</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-layer-group"></i></span>
                                                </div>
                                                <select class="custom-select form-control is-invalid" name="user_section" id="customControlValidation5" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update your 
                                                desire section..">
                                                    <option value="">-Select section-</option>
                                                    <option <?php if ($user_data->user_section == "1") echo "selected" ?> value="1">1</option>
                                                    <option <?php if ($user_data->user_section == "2") echo "selected" ?> value="2">2</option>
                                                    <option <?php if ($user_data->user_section == "3") echo "selected" ?> value="3">3</option>
                                                    <option <?php if ($user_data->user_section == "4") echo "selected" ?> value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="help-block">Update your section.</div>
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
                                                    <input type="file" name="user_picture" class="custom-file-input is-invalid" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Select a valid Image.">
                                                    <label class="custom-file-label" for="customControlValidation7">Choose Picture</label>
                                                </div>
                                            </div>
                                            <span class="help-block">Update your profile picture.</span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="addon-wrapping-left">Godown</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-house"></i></span>
                                                </div>
                                                <select class="custom-select form-control is-invalid" name="user_godown" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Update your godown.">
                                                    <option value="">-Select Godown-</option>
                                                    <option <?php if ($user_data->user_godown == "1") echo "selected" ?> value="1">godown 1</option>
                                                    <option <?php if ($user_data->user_godown == "2") echo "selected" ?> value="2">godown 2</option>
                                                </select>
                                            </div>
                                            <span class="help-block">Update your godown.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------Div End--------- -->
                                <!-- ------CRUD/UserGroup start-------- -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-3">
                                            <label class="form-label" for="addon-wrapping-left" title="Create: Read: Update: Delete:">Privilege:</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <!-- </?php  $crud=explode(",", $user_data->user_crud);
                                               if ($crud[0]=="c" ) echo "checked" 
                                                ?> -->
                                                <div class="frame-wrap">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" value="c" name="user_crud[]" class="custom-control-input" id="defaultInline1">
                                                        <label class="custom-control-label" for="defaultInline1">Create</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" value="r" checked name="user_crud[]" class="custom-control-input" id="defaultInline2">
                                                        <label class="custom-control-label" for="defaultInline2">Read</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" value="u" name="user_crud[]" class="custom-control-input" id="defaultInlined">
                                                        <label class="custom-control-label" for="defaultInlined">Update</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" value="d" name="user_crud[]" class="custom-control-input" id="defaultInline3">
                                                        <label class="custom-control-label" for="defaultInline3">Delete</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block">Update your perform criteria.</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mt-3">
                                            <label class="form-label" for="addon-wrapping-left"> Status:</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="frame-wrap">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" value="active" id="statusRadio1" name="user_status" <?php if ($user_data->user_status == "active") echo "checked" ?>>
                                                        <label class="custom-control-label" for="statusRadio1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" value="inactive" id="unstatusRadio1" name="user_status" <?php if ($user_data->user_status == "inactive") echo "checked" ?>>
                                                        <label class="custom-control-label" for="unstatusRadio1">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block">Update your status.</span>

                                        </div>
                                    </div>
                                </div>
                                <!-- -------Div End--------- -->
                                <!-- ------password start-------- -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mt-3">
                                            <label class="form-label" for="addon-wrapping-left">New Password</label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fal fa-waveform-path"></i></span>
                                                </div>
                                                <input type="password" class="form-control" value="<?= $user_data->user_password ?>" name="user_password" placeholder="Enter password" aria-label="password" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your Estimated password.">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6 mt-5 ">
                                        <button class="btn btn-primary ml-auto waves-effect waves-themed float-right" type="submit"><i class="fal fa-crosshairs"> Update User</i></button>
                                    </div> -->
                                    <div class=" col-lg-6 panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-3">
                                        <button class="btn btn-primary ml-auto px-6" type="submit">Update</button>
                                    </div>
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