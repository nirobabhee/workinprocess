<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?php echo $title; ?></a>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <!--***************** Your main content goes below here: ******************-->
    <!-- **********************************Start************************************ -->
    <!-- ------------**1stDiv**-------- -->
    <div class="row">
        <div class="col-md-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-edit">&nbsp; <?php echo $title; ?></i>
                        </span>
                    </h2>
                </div>
                <!-- <div class="panel-container"> -->
                <div class="panel-content">
                    <!-- ------Form start-------- -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="panel-1">
                                <div class="panel-container">
                                    <div class="panel-content">
                                        <form class="was-validated" method="POST" action="<?= base_url() ?>/ironman/Menu_setting_c/update_menu_submit" autocomplete="off">
                                            <div class="panel-content">
                                                <!-- ------Name/Url div-------- -->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="addon-wrapping-left">Menu Name:<b style="color: red;">*</b></label>
                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fal fa-spider-web"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control is-invalid" value="<?php echo $menu_info->menu_admin_name ?>" name="menu_admin_name" placeholder="Update Menu Name" aria-label="menu name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit your menu name." required>
                                                                
                                                                <input type="hidden" name="menu_admin_type" value="<?php echo $menu_info->menu_admin_type; ?>" />
                                                                <input type="hidden" name="menu_admin_id" value="<?= $menu_info->menu_admin_id ?>" />
                                                            </div>
                                                            <span class="help-block">Update your menu name.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="addon-wrapping-left">URL:<b style="color: red;">*</b></label>
                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fal fa-link"></i></span>
                                                                </div>
                                                                <input type="text" name="menu_admin_url" class="form-control is-invalid" value="<?php echo $menu_info->menu_admin_url ?>" placeholder="Update URL" aria-label="URL Name" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Edit target menu URL.">
                                                            </div>
                                                            <span class="help-block">Update URL- http://base_url/...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -------Div End--------- -->
                                                <!-- ------Parent/iconename-------- -->
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
                                                                    <?php
                                                                    $attr = "";
                                                                    $search_for_parent_menu = true;
                                                                    foreach ($side_menu_chain_menu as $menu) {
                                                                        if ($parent_menu_name) {
                                                                            $chain =  $menu['menu_chain'] . "_";
                                                                            if (strpos($chain, $parent_menu_name->menu_admin_name . "_") != false &&   $search_for_parent_menu == true) {
                                                                                $attr = "selected";
                                                                                $search_for_parent_menu = false;
                                                                            } else {
                                                                                $attr = "";
                                                                            }
                                                                        }
                                                                    ?>
                                                                        <option value="<?php echo $menu["menu_id"]; ?>" <?= $attr ?>><?php echo $menu['menu_chain']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="help-block">Update your parent menu.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="addon-wrapping-left">Icon Name:</label>
                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control is-invalid" name="menu_admin_icon" value="<?php echo $menu_info->menu_admin_icon ?>" placeholder="Enter icon Name" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name.">
                                                            </div>
                                                            <div class="help-block">Update your menu icon.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -------Div End--------- -->
                                                <!-- ------sorting/priviledge start-------- -->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="addon-wrapping-left">Sorting:<b style="color: red;">*</b></label>
                                                            <div class="input-group input-group-sm flex-nowrap">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fal fa-icons"></i></span>
                                                                </div>
                                                                <input type="number" class="form-control is-invalid" name="menu_admin_sort_order" value="<?php echo $menu_info->menu_admin_sort_order ?>" placeholder="Sorting Your Menu" aria-label="menu admin icon" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Enter your icon name." required>
                                                            </div>
                                                            <div class="help-block">Update your sorting order.</div>
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
                                                                    <option <?php if (in_array("accounts", $explode_user_privilege)) echo "selected" ?> value="accounts">Accounts</option>
                                                                    <option <?php if (in_array("administrator", $explode_user_privilege)) echo "selected" ?> value="administrator">Administrator</option>
                                                                    <option <?php if (in_array("audit", $explode_user_privilege)) echo "selected" ?> value="audit">Audit</option>
                                                                    <option <?php if (in_array("data_entry", $explode_user_privilege)) echo "selected" ?> value="data_entry">Data Entry Operator</option>
                                                                    <option <?php if (in_array("developer", $explode_user_privilege)) echo "selected" ?> value="developer">Developer</option>
                                                                    <option <?php if (in_array("hr", $explode_user_privilege)) echo "selected" ?> value="hr">HR</option>
                                                                    <option <?php if (in_array("it", $explode_user_privilege)) echo "selected" ?> value="it">IT</option>
                                                                    <option <?php if (in_array("interior", $explode_user_privilege)) echo "selected" ?> value="interior">Interior</option>
                                                                    <option <?php if (in_array("logistic", $explode_user_privilege)) echo "selected" ?> value="logistic">Logistic</option>
                                                                    <option <?php if (in_array("management", $explode_user_privilege)) echo "selected" ?> value="management">Management</option>
                                                                    <option <?php if (in_array("marketing", $explode_user_privilege)) echo "selected" ?> value="marketing">Marketing</option>
                                                                    <option <?php if (in_array("pd", $explode_user_privilege)) echo "selected" ?> value="pd">PD</option>
                                                                    <option <?php if (in_array("pdqms", $explode_user_privilege)) echo "selected" ?> value="pdqms">PDQMS</option>
                                                                    <option <?php if (in_array("purchase_and_procurement", $explode_user_privilege)) echo "selected" ?> value="purchase_and_procurement">Purchase & Procurement</option>
                                                                    <option <?php if (in_array("qc", $explode_user_privilege)) echo "selected" ?> value="qc">QC</option>
                                                                    <option <?php if (in_array("sales_person", $explode_user_privilege)) echo "selected" ?> value="sales_person">Sales Person</option>
                                                                    <option <?php if (in_array("store_incharge", $explode_user_privilege)) echo "selected" ?> value="store_incharge">Store Incharge</option>
                                                                    <option <?php if (in_array("store", $explode_user_privilege)) echo "selected" ?> value="store">Store</option>
                                                                    <option <?php if (in_array("supplier", $explode_user_privilege)) echo "selected" ?> value="supplier">Supplier</option>
                                                                    <option <?php if (in_array("wip", $explode_user_privilege)) echo "selected" ?> value="wip">WIP</option>
                                                                    <option <?php if (in_array("wip_incharge", $explode_user_privilege)) echo "selected" ?> value="wip_incharge">WIP Incharge</option>
                                                                </select>
                                                            </div>
                                                            <div class="help-block">Update your privilege.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -------Div End--------- -->
                                                
                                                <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                                    <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Update</button>
                                                </div>
                                            </div>
                                            <!-- -------Div End--------- -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************End Your main content. ******************-->
</main>