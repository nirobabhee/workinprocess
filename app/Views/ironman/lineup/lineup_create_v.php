  <!-- BEGIN Page Content -->
  <!-- the #js-page-content id is needed for some plugins to initialize -->
  <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
  </link>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

  <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
  <script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
  <script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>

  <script>
      $(document).ready(function() {
          $('#lineup_list').dataTable({
              //responsive: true, // not compatible
              scrollY: 600,
              scrollX: true,
              scrollCollapse: true,
              // paging: false,
              fixedHeader: true,
              deferRender: true,
              scroller: true,
              //fixedColumns:   true,
              // fixedColumns: {
              //     leftColumns: 2
              // },
              columnDefs: [{
                      "targets": [0],
                      "orderable": false,

                  },
                  {
                      "targets": [4],
                      "orderable": false,

                  },

              ],
          });

      });

      // Delete_category//
      function delete_alert(lineup_id) {
          // console.log(lineup_id);
          Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
          }).then(function(result) {
              if (result.value) {
                  $.ajax({
                      url: '<?= base_url() ?>/ironman/lineup_c/delete_lineup/' + lineup_id,
                      method: 'get',

                      contentType: 'application/x-www-form-urlencoded',
                      success: function(response) {
                          location.reload();
                      },
                      error: function(err) {

                      }
                  })
                  Swal.fire("Deleted!", "Lineup status has been deleted.");
              }
          }); //alert ends

      }

      //update_category_STATUS//
      function edit_status(item, id) {
          console.log(id);
          if (item.checked == true) {
              var status = "active";
          } else {

              var status = "inactive";
          }
          <?php if (crud_check("update")) : ?>
              Swal.fire({
                  title: "Are you sure?",
                  text: "You want to update this!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, update it!"
              }).then(function(result) {
                  if (result.value) {
                      $.ajax({
                          url: '<?= base_url('ironman/lineup_c/update_lineup_status') ?>',
                          method: 'post',
                          data: {
                              "lineup_id": id,
                              "lineup_status": status,
                          },
                          //   contentType: 'application/x-www-form-urlencoded',
                          success: function(response) {
                              location.reload();
                          },
                          error: function(err) {},
                      })
                      Swal.fire("Updated!", "Lineup status has been deleted.");
                  } else {
                      location.reload();
                  }
              }); //alert ends

          <?php else : ?>
              Swal.fire("You are not allowed to update any Lineup status information").then(function(result) {
                  if (result.value) {
                      location.reload();
                  }
              });
          <?php endif ?>


      }
  </script>







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
                      <p class="m-0">
                      <?= \Config\Services::validation()->listErrors(); ?>
                      </p >
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
                          <i class="fal fa-layer-plus">&nbsp;</i>Lineup Create
                      </h2>
                  </div>
                  <div class="panel-container">
                      <!-- <div class="panel-content"> -->
                      <form class="was-validated" method="post" enctype="multipart/form-data" action="<?= base_url("/ironman/lineup_c/lineup_submit") ?>" autocomplete="off">
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
                                              <input type="text" name="lineup_code" placeholder="Line up Code" class="form-control is-invalid" aria-label="" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Lineup code." required>
                                          </div>
                                        
                                          <div class="help-block">
                                                    
                                                    </div>

                                          <div class="help-block">Enter line up code.</div>
                                      </div>
                                      <div class="form-group mt-2">
                                          <label class="form-label" for="addon-wrapping-left">Line up name</label>
                                          <div class="input-group input-group-sm flex-nowrap">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text"><i class="fal fa-chart-line"></i></span>
                                              </div>
                                              <input type="text" name="lineup_name" placeholder="Line up name" class="form-control is-invalid" aria-label="" aria-describedby="addon-wrapping-left" data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>' data-toggle="tooltip" data-original-title="Lineup Name." required>
                                          </div>
                                          <div class="help-block">Enter line up name.</div>
                                      </div>
                                      
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="frame-wrap">
                                          <div class="" id="add_table">
                                              <hr>
                                              <div class="add_tble">
                                                  <table class="table table-striped table-sm ">
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
                                                                      <input type="text" id="short_order" name="short_order[]" class="form-control is-valid" placeholder="Enter Short Order" readonly value="1" required>
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
                                                                              <option value="<?php echo $location->location_id ?>"><?php echo $location->location_name ?></option>
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
                                                                          <option value="">-Select section name-</option>
                                                                          <option value="Machine">Machine</option>
                                                                          <option value="Carpenter">Carpenter </option>
                                                                          <option value="Lacquer">Lacquer </option>
                                                                          <option value="Upholstery">Upholstery </option>
                                                                          <option value="Packing">Packing </option>
                                                                      </select>
                                                                  </div>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <th style="text-align:right;">
                                                                  <label class="form-label " for="addon-wrapping-left">Process Lead Time<b style="color: red;">*</b></label>
                                                              </th>
                                                              <td style="text-align: left">
                                                                  <div class="input-group input-group-sm flex-nowrap">
                                                                      <div class="input-group-prepend">
                                                                          <span class="input-group-text"><i class="fal fa-business-time"></i></span>
                                                                      </div>
                                                                      <input type="text" id="process_day" name="process_lead_time[]" required class="form-control is-invalid " placeholder="Enter Day's" aria-label="day" value="0" aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" data-original-title="Full name is required!" required="">
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
                                                                          <option value="Day">Day</option>
                                                                          <option value="Hour">Hour </option>
                                                                      </select>
                                                                  </div>
                                                                  <div class="help-block">Fill out above those field.</div>
                                                              </td>
                                                          </tr>


                                                      </tbody>
                                                  </table>
                                                  <hr>
                                              </div>
                                              <div class="btn-area float-right">
                                                  <button type="button" class="btn btn-success waves-effect waves-themed add"> + Add Another</button>
                                                  <button type="button" class="btn btn-warning waves-effect waves-themed " id="remove"> - Remove Last One</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- -------Div End--------- -->
                              <hr>

                              <!-- ------Status/button start-------- -->
                              <?php if (crud_check("create")) : ?>
                                  <div class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                      <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                  </div>
                              <?php endif ?>
                              <!-- -------Div End--------- -->
                          </div>
                      </form>
                  </div>
                  <!-- </div> -->
              </div>

              <div class="panel-container show">
                  <div class="panel-content">
                      <!-- datatable start -->
                      <table id="lineup_list" class="table  table-bordered table-hover table-striped w-100">
                          <thead class="thead-dark">
                              <tr>
                                  <th>SN.</th>
                                  <th>lineup Name</th>
                                  <th>lineup Code</th>
                                  <th>lineup</th>
                                  <th>Status</th>
                                  <th>Used</th>
                                  <th class="text-center">Action</th>

                              </tr>
                          </thead>
                          <tbody>
                              <?php

                                $i = 1;
                                foreach ($lineup_list as $key => $lineup) {
                                ?>
                                  <tr>
                                      <td><?php echo  $lineup->lineup_id ?></td>
                                      <td><?php echo $lineup->lineup_name ?></td>
                                      <td><?php echo $lineup->lineup_code ?></td>
                                      <td><?php $ds = json_decode($lineup->lineup_section);
                                            if (!empty($ds)) {
                                                $i = 0;
                                                foreach ($ds as $key => $value) {
                                                    $total = count($ds);
                                                    $i++;
                                                    $this->lineup_model = model('App\Models\ironman\Lineup_model');
                                                    $location = $this->lineup_model->get_location_by_id($value->location_id);
                                                    $location_name = isset($location->location_name) ? $location->location_name : '';
                                                    echo $value->short_order . ' || ' . $location_name . ' || ' . $value->section_name . ' || ' . $value->process_lead_time;
                                                    if ($total - $i == 0) {
                                                        echo '  ';
                                                    } else {
                                                        echo ' > ';
                                                    }
                                                }
                                            }
                                            ?>
                                      </td>
                                      <td>
                                          <?php
                                            if ($lineup->lineup_status == "active") { ?>
                                              <div class="custom-control custom-switch">
                                                  <input type="checkbox" onchange="edit_status(this,<?= $lineup->lineup_id; ?> )" value="active" name="lineup_status" class="custom-control-input" checked id="lineup_status<?= $lineup->lineup_id; ?>" title="Inactive / Active">
                                                  <label class="custom-control-label" for="lineup_status<?= $lineup->lineup_id; ?>"></label>
                                              </div>
                                          <?php } else { ?>
                                              <div class="custom-control custom-switch">
                                                  <input type="checkbox" onchange="edit_status(this,<?= $lineup->lineup_id; ?>)" value="inactive" name="lineup_status" class="custom-control-input" id="lineup_status<?= $lineup->lineup_id; ?>" title="Inactive / Active">
                                                  <label class="custom-control-label" for="lineup_status<?= $lineup->lineup_id; ?>"></label>
                                              </div>
                                          <?php } ?>

                                      </td>
                                      <td></td>
                                      <td>
                                          <?php if (crud_check("update")) : ?>
                                              <a href="/ironman/lineup_c/lineup_edit/<?php echo  $lineup->lineup_id ?>" class="btn btn-success btn-sm btn-icon" title="Edit">
                                                  <i class="fal fa-edit"></i>
                                              </a>
                                          <?php endif ?>

                                          <a href="javascript:void(0);" onclick="copy_lineup(<?php echo  $lineup->lineup_id ?>)" class="btn btn-info btn-sm btn-icon" title="Copy">
                                              <i class="fal fa-copy"></i>
                                          </a>

                                          <?php if (crud_check("delete")) : ?>
                                              <a href="javascript:void(0);" onclick="delete_alert(<?php echo  $lineup->lineup_id ?>)"  class="btn btn-danger btn-sm btn-icon">
                                                  <i class="fal fa-times"></i>
                                              </a>
                                          <?php endif ?>
                                      </td>
                                      
                                  </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                      <!-- datatable end -->
                  </div>
              </div>
              <!-- ***********************************End*********************************** -->
          </div>
      </div>
      <!-- ------------**2stDiv**-------- -->

      <!--*****************End Your main content. ******************-->
  </main>

  <script>
      var max_fields_limit = 20;
      var x = 1;
      $(".add").click(function() {
          x++;

          if (x < max_fields_limit) {
              // alert(x);
              $(".add_tble").append('<table id="lineup_list' + x + '" class="table table-striped table-sm" ><tbody><tr id="row' + x + '"><th style="text-align:right;"><label class="form-label " for="addon-wrapping-left">Short Order</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-sort"></i></span></div><input type="text" id="short_order' + x + '" name="short_order[] required" readonly class="form-control is-valid" placeholder="Enter Short Order" aria-label="day" value="' + x + '"  aria-describedby="addon-wrapping-left" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" ></div><span class="help-block">Update Order</span></td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Location Name</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-search-location"></i></span></div><select id="location_id" class="custom-select form-control is-invalid" name="location_id[]" required><option value="">-Select  Location-</option><?php foreach ($locations as $location) { ?><option value="<?php echo $location->location_id ?>"><?php echo $location->location_name ?></option><?php } ?></select></div> </td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Section Name</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-user-circle"></i></span></div><select id="section_name" required class="custom-select form-control is-invalid" name="section_name[]"><option value="">-Select section name-</option><option value="Machine">Machine</option><option value="Carpenter">Carpenter </option><option value="Lacquer">Lacquer </option><option value="Upholstery">Upholstery </option><option value="Packing">Packing </option></select></div></td></tr><tr><th style="text-align:right;"><label class="form-label " for="addon-wrapping-left">Process Lead Time<b style="color: red;">*</b></label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-business-time"></i></span></div><input type="text" id="process_lead_time" name="process_lead_time[] required" class="form-control is-invalid" placeholder="Enter time"  value="0"></div></td></tr><tr><th style="text-align:right;"><label class="form-label" for="addon-wrapping-left">Process Lead Type</label></th><td style="text-align: left"><div class="input-group input-group-sm flex-nowrap"><div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-user-circle"></i></span></div><select id="section_name" class="custom-select form-control is-invalid" name="process_lead_type[]" required><option value="Day">Day</option><option value="Hour">Hour </option></select></div><span class="help-block"> Fill out above those field.</span></td></tr></tbody></table><hr>');
          }
      });

      $(document).on('click', '#remove', function() {

          var button_id = $(this).attr("id");
          $('#lineup_list' + x + '').remove();
          x--;
      });
  </script>