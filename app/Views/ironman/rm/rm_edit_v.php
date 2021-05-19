      <!-- BEGIN Page Content -->
      <!-- the #js-page-content id is needed for some plugins to initialize -->
      <style>
#taglist ul {
    margin-top: 0px;
    background: #fff;
    color: #000;
}

#taglist li {
    padding: 12px;
    cursor: pointer;
    color: black;
    width: 100%;
    background: #eee;
}

#taglist li:hover {
    background: #eadddd;
}
      </style>
      <main id="js-page-content" role="main" class="page-content">
          <ol class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-item">
                  <a href="#"><?php echo $title; ?></a>
              </li>
              <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
              <!-- date -->
          </ol>
          <div hidden id="alert_div" class="alert alert-primary">
              <div class="d-flex flex-start w-100">
                  <div class="d-flex flex-fill">
                      <div class="flex-fill">
                          <p class="m-0">
                              <?php
                                $session = session();
                                $insert_alert = $session->getFlashdata('insert_alert');
                                if ($insert_alert) {
                                ?>
                              <script>
                              document.getElementById("alert_div").hidden = false;
                              </script>

                              <?php
                                    echo '<font style="color:green">' . $insert_alert . '</font>';
                                    // $this->session->remove('insert_alert');
                                    ?>
                              <?php
                                }
                                $delete_alert = $session->getFlashdata('delete_alert');

                                if ($delete_alert) {
                                ?>
                              <script>
                              document.getElementById("alert_div").hidden = false;
                              </script>

                              <?php
                                    echo '<font style="color:red">' . $delete_alert . '</font>';
                                    // $this->session->remove('delete_alert');
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
              <div class="col-md-12">
                  <div id="panel-1" class="panel">
                      <div class="panel-hdr">
                          <h2>
                              <i class="fal fa-layer-plus">&nbsp;</i> Raw Material Edit
                          </h2>
                      </div>
                      <div class="panel-container">
                          <div class="panel-content">
                              <form class="was-validated" id="raw_material_form" method="post"
                                  enctype="multipart/form-data"
                                  action="<?= base_url("/ironman/RM_c/update_raw_material") ?>" autocomplete="off">
                                  <div class="panel-content">
                                      <!-- ------Div start-------- -->
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Raw Material SKU<b
                                                          style="color: red;">*</b>
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="text" id="raw_material_sku" name="raw_material_sku"
                                                          placeholder="Enter raw material sku"
                                                          class="form-control is-invalid" aria-label="rawmaterialsku"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Your raw material sku." required
                                                          value="<?php echo $raw_material_data->rm_sku; ?>" readonly>
                                                  </div>
                                                  <span id="warning_message" style="color : red"></span>
                                                  <span class="help-block">Enter your raw material SKU</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label " for="addon-wrapping-left">Raw Material
                                                      Name<b style="color: red;">*</b></label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-user-circle"></i></span>
                                                      </div>
                                                      <input type="text" name="raw_material_name"
                                                          class="form-control is-invalid"
                                                          placeholder="Enter raw material name"
                                                          aria-label="Raw material Name"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Raw material name is required!" required
                                                          value="<?php echo $raw_material_data->rm_name; ?>">
                                                  </div>
                                                  <span class="help-block">Enter your raw material name</span>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- -------Div End--------- -->
                                      <!-- ------phn/UserGroup start-------- -->

                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group mt-2">
                                                  <label class="form-label" for="addon-wrapping-left">Material
                                                      Category<b style="color: red;">*</b></label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-crown"></i></span>
                                                      </div>
                                                      <select class="form-control custom-select is-invalid"
                                                          name="material_category"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Select Your Material Category." required>
                                                          <option value="">-Select Material Category-</option>
                                                          <?php
                                                            if ($get_category) {
                                                                $this->crud_generator_model = model('App\Models\ironman\Crud_generator_m.php');
                                                                foreach ($get_category as $cat) { ?>
                                                          <option value="<?php echo $cat->rm_category_id; ?>"
                                                              <?php if ($raw_material_data->rm_category == $cat->rm_category_id) {
                                                                                                                            echo 'selected="selected"';
                                                                                                                        } ?>>
                                                              <?php $cat_arr = explode(",", $cat->rm_category_chain_parent);
                                                                        for ($i = 0; $i < count($cat_arr); $i++) {
                                                                            $cat_arr_data_id = $cat_arr[$i];
                                                                            $val = $this->crud_generator_model->get_data_by_id('rm_category', '*', 'rm_category_id', $cat_arr_data_id);
                                                                            if (count($cat_arr) > 1) {
                                                                                echo ($val->rm_category_name);
                                                                                echo ' > ';
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
                                                  <span class="help-block">Select your material category</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label " for="addon-wrapping-left">Raw Material
                                                      Attribute<b style="color: red;">*</b></label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-user-circle"></i></span>
                                                      </div>
                                                      <select id="raw_material_attribute"
                                                          class="select2 custom-select form-control is-invalid"
                                                          name="raw_material_attribute[]" multiple="multiple"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Select Your Material Attribute.">
                                                          <?php
                                                            if ($get_attribute) {
                                                                foreach ($get_attribute as $attr) { ?>
                                                          <option value="<?php echo $attr->rm_attribute_id; ?>"
                                                              <?php
                                                                                                                        $individual_rm_attribute = explode(",", $raw_material_data->rm_attribute);
                                                                                                                        for ($i = 0; $i < count($individual_rm_attribute); $i++) {
                                                                                                                            if ($individual_rm_attribute[$i] == $attr->rm_attribute_id) {
                                                                                                                                echo 'selected="selected"';
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>><?php echo $attr->rm_attribute_name; ?>
                                                          </option>
                                                          <?php }
                                                            } ?>
                                                      </select>
                                                  </div>
                                                  <span class="help-block">Enter your raw material attribute</span>
                                              </div>
                                          </div>

                                      </div>
                                      <!-- -------Div End--------- -->
                                      <!-- ------Mac/godown start-------- -->
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Minimum Stock
                                                      Level<b style="color: red;">*</b>
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="number" name="minimum_stock_level"
                                                          placeholder="Enter minimum stock level"
                                                          data-inputmask="'alias': 'minimumstocklevel'"
                                                          class="form-control is-invalid" aria-label="minimumstocklevel"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Your minimum stock level." required
                                                          value="<?php echo $raw_material_data->rm_minimum_stock_level; ?>">
                                                  </div>
                                                  <span class="help-block">Enter your minimum stock level</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Maximum Stock
                                                      Level<b style="color: red;">*</b>
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="number" name="maximum_stock_level"
                                                          placeholder="Enter maximum stock level"
                                                          data-inputmask="'alias': 'maximumstocklevel'"
                                                          class="form-control is-invalid" aria-label="maximumstocklevel"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip"
                                                          data-original-title="Your maximum stock level." required
                                                          value="<?php echo $raw_material_data->rm_maximum_stock_level; ?>">
                                                  </div>
                                                  <span class="help-block">Enter your maximum stock level</span>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- -------Div End--------- -->
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Unit Price<b
                                                          style="color: red;">*</b>
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="number" name="unit_price"
                                                          placeholder="Enter unit price"
                                                          data-inputmask="'alias': 'unitprice'"
                                                          class="form-control is-invalid" aria-label="unitprice"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip" data-original-title="Your unit price."
                                                          required
                                                          value="<?php echo $raw_material_data->rm_unit_price; ?>">
                                                  </div>
                                                  <span class="help-block">Enter your unit price</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Cost Price<b
                                                          style="color: red;">*</b>
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="number" name="cost_price"
                                                          placeholder="Enter cost price"
                                                          data-inputmask="'alias': 'costprice'"
                                                          class="form-control is-invalid" aria-label="costprice"
                                                          aria-describedby="addon-wrapping-left"
                                                          data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                          data-toggle="tooltip" data-original-title="Your cost price."
                                                          required
                                                          value="<?php echo $raw_material_data->rm_cost_price; ?>">
                                                  </div>
                                                  <span class="help-block">Enter your cost price</span>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- -------Div Start--------- -->
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="form-group mt-2">
                                                  <label class="form-label">Raw Material Picture</label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-image"></i></span>
                                                      </div>
                                                      <div class="custom-file">
                                                          <input type="file" name="raw_material_picture"
                                                              class="custom-file-input is-invalid"
                                                              id="customControlValidation7"
                                                              aria-describedby="addon-wrapping-left"
                                                              data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                              data-toggle="tooltip"
                                                              data-original-title="Select A valid Image.">
                                                          <label class="custom-file-label"
                                                              for="customControlValidation7">Choose Picture</label>
                                                      </div>
                                                  </div>
                                                  <span class="help-block">Select a raw material picture</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-group">
                                                  <label class="form-label" for="addon-wrapping-left">Tag
                                                  </label>
                                                  <div class="input-group input-group-sm flex-nowrap">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text"><i
                                                                  class="fal fa-computer-classic"></i></span>
                                                      </div>
                                                      <input type="text" id="tag" name="tag" placeholder="Enter tag"
                                                          class="form-control is-invalid tag" aria-label="tag"
                                                          aria-describedby="addon-wrapping-left" autocomplete="off"
                                                          value="<?php echo $raw_material_data->rm_tag; ?>">
                                                  </div>
                                                  <div id="taglist" class="taglist"></div>
                                                  <span class="help-block">Enter your tag</span>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <input type="hidden" name="rm_id"
                                                  value="<?php echo $raw_material_data->rm_id; ?>">
                                          </div>
                                      </div>
                                      <!-- -------Div End--------- -->
                                      <!-- ------Status/button start-------- -->
                                      <div class="mb-3 pt-2">
                                          <button class="btn btn-primary ml-auto waves-effect waves-themed float-right"
                                              type="submit"><i class="fal fa-save"> Update</i></button>
                                      </div>
                                      <!-- -------Div End--------- -->
                                  </div>
                              </form>

                          </div>
                      </div>
                  </div>
                  <!-- ***********************************End*********************************** -->
              </div>
          </div>
          <!-- ------------**2stDiv**-------- -->
          <!--*****************End Your main content. ******************-->

          <!--*********Start*********** 3rd____div -->

          <!--***********End********* 3rd____div -->

      </main>
      <!-- this overlay is activated only when mobile menu is triggered -->
      <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
      <!-- ---------------***datatableSCRIPT***-------------------- -->