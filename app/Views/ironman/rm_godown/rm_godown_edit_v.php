<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?php echo $title; ?></a>
        </li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date">Monday, April 12,
                2021</span></li>
    </ol>
    <div hidden id="alert_div" class="alert alert-primary">
        <div class="d-flex flex-start w-100">
            <div class="d-flex flex-fill">
                <div class="flex-fill">
                    <p class="m-0">
                        <!-- Here Developer User Showing Insert Alert !-->
                        <?php
                        $session = session();

                        $green_alert = $session->getFlashdata('green_alert');
                        if ($green_alert) {
                        ?>
                        <script>
                        document.getElementById("alert_div").hidden = false;
                        </script>
                        <?php
                            echo '<font style="color:green">' . $green_alert . '</font>';
                            ?>
                        <?php
                        }
                        $red_alert = $session->getFlashdata('red_alert');

                        if ($red_alert) {
                        ?>
                        <script>
                        document.getElementById("alert_div").hidden = false;
                        </script>
                        <?php
                            echo '<font style="color:red">' . $red_alert . "<br>" . $session->get("warning") . '</font>';
                            ?>
                        <?php
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
                <div class="panel-hdr">
                    <h2>
                        <i class="fal fa-layer-plus">&nbsp;</i> Category Create
                    </h2>
                </div>
                <!-- *****Filter Start****** -->
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- <div class="panel-tag"> -->
                        <form class="was-validated" method="post" enctype="multipart/form-data"
                            action="<?= base_url("/ironman/Rm_category_c/insert_category") ?>" autocomplete="off">
                            <div class="panel-content">
                                <!-- ------Div start-------- -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="addon-wrapping-left">Parent Category <b
                                                    style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fal fa-layer-group"></i></span>
                                                </div>
                                                <select class="custom-select form-control is-invalid"
                                                    name="rm_category_chain_parent" id="customControlValidation5"
                                                    required>
                                                    <option value="">-Select Section-</option>
                                                    <option value="0">No Parent</option>
                                                    <?php
                                                    if ($categories) {
                                                        foreach ($categories as $cat) { ?>
                                                    <option value="<?php echo $cat->rm_category_id; ?>">
                                                        <?php $cat_arr = explode(",", $cat->rm_category_chain_parent);
                                                                $keys = array_keys($cat_arr);
                                                                for ($i = 0, $l = count($cat_arr); $i < $l; ++$i) {
                                                                    $cat_arr_data_id = $cat_arr[$i];
                                                                    $this->rm_category_model = model('App\Models\ironman\Rm_category_m');
                                                                    $val = $this->rm_category_model->get_row_by_id($cat_arr_data_id);
                                                                    $isLastItem = ($i == ($l - 1));
                                                                    if ($cat_arr_data_id > $isLastItem) {
                                                                        echo $val->rm_category_name . ' > ';
                                                                    } elseif ($cat_arr_data_id == $isLastItem) {
                                                                        echo $val->rm_category_name;
                                                                    } else {
                                                                        echo ($val->rm_category_name);
                                                                    }
                                                                }
                                                                ?>
                                                    </option>
                                                    <?php }
                                                    } ?>

                                                </select>
                                            </div>
                                            <div class="help-block">Select your section.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label " for="addon-wrapping-left">Category Name<b
                                                    style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fal fa-user-circle"></i></span>
                                                </div>
                                                <input type="text" name="rm_category_name"
                                                    class="form-control is-invalid" placeholder="Enter Category name"
                                                    aria-label="Full Name" aria-describedby="addon-wrapping-left"
                                                    data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                    data-toggle="tooltip" data-original-title="Full name is required!"
                                                    required>
                                            </div>
                                            <span class="help-block">Enter category name.</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- -------Div End--------- -->

                                <!-- ------password start-------- -->
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group mt-2">
                                            <label class="form-label" for="addon-wrapping-left"> Status:<b
                                                    style="color: red;">*</b></label>
                                            <div class="input-group input-group-sm flex-nowrap">
                                                <div class="frame-wrap">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" value="active"
                                                            id="statusRadio1" name="rm_category_status" checked>
                                                        <label class="custom-control-label"
                                                            for="statusRadio1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                            value="inactive" id="unstatusRadio1"
                                                            name="rm_category_status">
                                                        <label class="custom-control-label"
                                                            for="unstatusRadio1">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="help-block">Select category status.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------Div End--------- -->
                                <!-- ------Status/button start-------- -->
                                <div
                                    class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                    <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                </div>
                                <!-- -------Div End--------- -->
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--*****************Rnd Your main content. ******************-->

</main>
<!-- this overlay is activated only when mobile menu is triggered -->
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->