  <!-- BEGIN Page Content -->
  <!-- the #js-page-content id is needed for some plugins to initialize -->

  <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
  <script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
  <script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>

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
          <div class="col-md-12">
              <div id="panel-1" class="panel">
                  <div class="panel-hdr">
                      <h2>
                          <i class="fal fa-layer-plus">&nbsp;</i> Product Lineup Create
                      </h2>
                  </div>
                  <div class="panel-container">
                      <!-- <div class="panel-content"> -->
                      <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/lineup_c/update_lineup") ?>" autocomplete="off">
                          <div class="panel-content">
                              <!-- ------Div start-------- -->
                              <div class="row">
                                  <div class="col-lg-6">
                                     <div class="form-group mt-2">
                                          <label class="form-label" for="addon-wrapping-left">Line Up Code</label>
                                          <div class="input-group input-group-sm flex-nowrap">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fal fa-tag"></i></span>
                                              </div>
                                              <input type="text" name="lineup_code" value="<?php echo $lineup_data->lineup_code ?>" placeholder="Line up Code" readonly class="form-control is-invalid" aria-label="" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Lineup code." required>
                                          </div>
                                          <div class="help-block">Update line up code.</div>
                                      </div>
                                      <div class="form-group mt-2">
                                          <label class="form-label" for="addon-wrapping-left">Line up name</label>

                                          <div class="input-group input-group-sm flex-nowrap">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fal fa-chart-line"></i></span>
                                              </div>
                                              <input type="text" name="lineup_name" value="<?php echo $lineup_data->lineup_name ?>" class="form-control is-invalid" aria-label="" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Lineup Name." required>
                                              <input type="hidden" name="lineup_id" value="<?php echo $lineup_data->lineup_id ?>" class="form-control is-invalid" aria-label="" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Lineup Id.">
                                          </div>
                                          <div class="help-block">Update line up name.</div>
                                      </div>
                                    
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="frame-wrap">
                                          <div class="" id="add_table">
                                              <hr>
                                              <div class="add_tble">
                                                  <?php $sections = json_decode($lineup_data->lineup_section);
                                                    $maxorder_id = max(array_column($sections, 'short_order'));
                                                    //   echo '<pre>';
                                                    //   print_r($maxorder_id);
                                                    //   exit;
                                                    foreach ($sections as $key => $section) { ?>


                                                      <table id="lineup_list<?php echo $section->short_order ?>" class="table table-striped table-sm ">
                                                          <tbody>
                                                              <tr>
                                                                  <th style="text-align:right;">
                                                                      <label class="form-label " for="addon-wrapping-left">Short Order</label>
                                                                  </th>
                                                                  <td style="text-align: left">
                                                                      <div class="input-group input-group-sm flex-nowrap">
                                                                          <div class="input-group-prepend">
                                                                              <span class="input-group-text"><i class="fal fa-sort"></i></span>
                                                                          </div>
                                                                          <input type="text" id="short_order" value="<?php echo $section->short_order ?>" name="short_order[]" class="form-control is-valid" placeholder="Update Short Order" readonly aria-label="day" value="1" aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip">
                                                                      </div>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <th style="text-align:right;">
                                                                      <label class="form-label" for="addon-wrapping-left">Location Name</label>
                                                                  </th>
                                                                  <td style="text-align: left">
                                                                      <div class="input-group input-group-sm flex-nowrap">
                                                                          <div class="input-group-prepend">
                                                                              <span class="input-group-text"><i class="fal fa-search-location"></i></span>
                                                                          </div>
                                                                          <select id="location_id" class="custom-select form-control is-invalid" name="location_id[]" required>
                                                                              <option value="">-Select Location-</option>
                                                                              <?php foreach ($locations as $location) { ?>

                                                                                 <option value="dollar"  <?=$location->location_id == $section->location_id ? ' selected="selected"' : '';?> ><?php echo $location->location_name?></option>
                                                                              <?php } ?>
                                                                          </select>
                                                                      </div>

                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <th style="text-align:right;">
                                                                      <label class="form-label" for="addon-wrapping-left">Section Name</label>
                                                                  </th>
                                                                  <td style="text-align: left">
                                                                      <div class="input-group input-group-sm flex-nowrap">
                                                                          <div class="input-group-prepend">
                                                                              <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                                          </div>
                                                                          <select id="section_name" class="custom-select form-control is-invalid" name="section_name[]" required>
                                                                              <option value="Machine" <?php if ($section->section_name == "Machine") echo 'selected'; ?>>Machine</option>
                                                                              <option value="Carpenter" <?php if ($section->section_name == "Carpenter") echo 'selected'; ?>>Carpenter </option>
                                                                              <option value="Lacquer" <?php if ($section->section_name == "Lacquer") echo 'selected'; ?>>Lacquer </option>
                                                                              <option value="Upholstery" <?php if ($section->section_name == "Machine") echo 'selected'; ?>>Upholstery </option>
                                                                              <option value="Packing" <?php if ($section->section_name == "Machine") echo 'selected'; ?>>Packing </option>
                                                                          </select>
                                                                      </div>

                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <th style="text-align:right;">
                                                                      <label class="form-label " for="addon-wrapping-left">Process Leads Time<b style="color: red;">*</b></label>
                                                                  </th>
                                                                  <td style="text-align: left">
                                                                      <div class="input-group input-group-sm flex-nowrap">
                                                                          <div class="input-group-prepend">
                                                                              <span class="input-group-text"><i class="fal fa-business-time"></i></span>
                                                                          </div>
                                                                          <input type="text" id="process_day" value="<?php echo $section->process_lead_time ?>" name="process_lead_time[]" required class="form-control is-invalid" placeholder="Enter Day's" aria-label="day" value="0" aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" data-original-title="Full name is required!" required="">
                                                                      </div>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <th style="text-align:right;">
                                                                      <label class="form-label" for="addon-wrapping-left">Process Lead Type</label>
                                                                  </th>
                                                                  <td style="text-align: left">
                                                                      <div class="input-group input-group-sm flex-nowrap">
                                                                          <div class="input-group-prepend">
                                                                              <span class="input-group-text"><i class="fal fa-user-circle"></i></span>
                                                                          </div>
                                                                          <select id="section_name" class="custom-select form-control is-invalid" name="process_lead_type[]" required>
                                                                              <option value="Day" <?php if ($section->process_lead_type == "Day") echo 'selected'; ?>>Day</option>
                                                                              <option value="Hour" <?php if ($section->process_lead_type == "Hour") echo 'selected'; ?>>Hour </option>
                                                                          </select>
                                                                      </div>
                                                                  </td>
                                                              </tr>


                                                          </tbody>
                                                      </table>
                                                      <hr>
                                                  <?php } ?>
                                              </div>
                                              <div class="btn-area float-right">
                                                  <button type="button" class="btn btn-success waves-effect waves-themed add" id="edit_another" @click=> + Add Another</button>
                                                  <button type="button" class="btn btn-warning waves-effect waves-themed " id="remove"> - Remove Last One</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- -------Div End--------- -->
                              <hr>

                              <!-- ------Status/button start-------- -->
                              <?php if (crud_check("update")) : ?>
                                  <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                      <button class="btn btn-primary ml-auto px-6 mt-3" id="update" type="submit">Update</button>
                                  </div>
                              <?php endif ?>
                              <!-- -------Div End--------- -->
                          </div>
                      </form>
                  </div>
                  <!-- </div> -->
              </div>

          </div>
      </div>
      <!-- ------------**2stDiv**-------- -->

      <!--*****************End Your main content. ******************-->
  </main>

  <script>
      var max_fields_limit = 50;
      var x = '<?php echo $maxorder_id; ?>';
      $(".add").click(function() {
          //  alert(x);
          x++;

          if (x < max_fields_limit) {

              $(".add_tble").append('<table id="lineup_list' + x + '" class="table table-striped table-sm" ><tbody><tr id="row' + x + '"><th style="text-align:right;"><label class="form-label " for="addon-wrapping-left">Short Order</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-sort"></i></span></div><input type="text" id="short_order' + x + '" name="short_order[] required" readonly class="form-control is-valid" placeholder="Enter Short Order" aria-label="day" value="' + x + '"  aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" ></div><span class="help-block">Update Order</span></td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Location Name</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-search-location"></i></span></div><select id="location_id" class="custom-select form-control is-invalid" name="location_id[]" required><option value="">-Select  Location-</option><?php foreach ($locations as $location) { ?><option value="<?php echo $location->location_id ?>"><?php echo $location->location_name ?></option><?php } ?></select></div> </td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Section Name</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-user-circle"></i></span></div><select id="section_name" required class="custom-select form-control is-invalid" name="section_name[]"><option value="Machine">Machine</option><option value="Carpenter">Carpenter </option><option value="Lacquer">Lacquer </option><option value="Upholstery">Upholstery </option><option value="Packing">Packing </option></select></div></td></tr><tr><th style="text-align:right;"><label class="form-label " for="addon-wrapping-left">Process Leads Time<b style="color: red;">*</b></label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-business-time"></i></span></div><input type="text" id="process_day" value="<?php echo $section->process_lead_time ?>" name="process_lead_time[]" required class="form-control is-invalid" placeholder="Enter Days" aria-label="day" value="0" aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" data-original-title="Full name is required!" required=""></div></td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Process Lead Type</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-user-circle"></i></span></div><select id="section_name" class="custom-select form-control is-invalid" name="process_lead_type[]" required><option value="Day" <?php if ($section->process_lead_type == "Day") echo 'selected'; ?>>Day</option><option value="Hour" <?php if ($section->process_lead_type == "Hour") echo 'selected'; ?>>Hour </option></select></div></td></tr></tbody></table><hr>');
          }
      });

      $(document).on('click', '#remove', function() {
          var button_id = $(this).attr("id");
          $('#lineup_list' + x + '').remove();
          alert(x);
          x--;
      });
  </script>