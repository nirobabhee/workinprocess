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
      <link rel="stylesheet" media="screen, print"
          href="<?php echo base_url(); ?>/assets/css/notifications/sweetalert2/sweetalert2.bundle.css">
      <script src="<?php echo base_url(); ?>/assets/js/notifications/sweetalert2/sweetalert2.bundle.js"></script>
      <script src=" <?php echo base_url() ?>/assets/js/datagrid/datatables/datatables.bundle.js"></script>
      <script>
function callServer() {
    var url = "<?php echo base_url('ironman/RM_c/edit_raw_material/'); ?>"
    var img_url = "<?php echo base_url() . '/raw_material/'; ?>";
    $('#dt_raw_material_list').dataTable({
        "order": [],
        "destroy": true,
        "pageLength": 50,
        "processing": true,
        "serverSide": true,
        //   "ordering": false,
        "language": {
            "infoFiltered": ""
        },
        "ajax": {
            url: "<?php echo base_url('ironman/RM_c/get_raw_material_list'); ?>",
            type: 'POST',
            data: {

            }
        },
        "columns": [{
                "data": null,
                className: "text-center",
                render: function(data, type, row) {
                    return data[0];
                }
            },
            {
                "data": null,
                // "orderable": false,
                className: "text-left",
                render: function(data, type, row) {
                    return data[1];
                }
            },

            {
                "data": null,
                className: "text-left",
                render: function(data, type, row) {
                    return data[2];
                }
            },
            {
                "data": null,
                className: "text-left",
                render: function(data, type, row) {
                    return data[3];
                }
            },
            {
                "data": null,
                className: "text-left",
                render: function(data, type, row) {
                    return data[4];
                }
            },
            {
                "data": null,
                className: "text-right",
                render: function(data, type, row) {
                    return data[5];
                }
            },
            {
                "data": null,
                className: "text-right",
                render: function(data, type, row) {
                    return data[6];
                }
            },
            {
                "data": null,
                className: "text-right",
                render: function(data, type, row) {
                    return data[7];
                }
            },
            {
                "data": null,
                className: "text-right",
                render: function(data, type, row) {
                    return data[8];
                }
            },
            {
                "data": null,
                className: "text-center",
                render: function(data, type, row) {
                    if (data[9]) {
                        return '<a href="' + img_url + data[9] +
                            '" target="_blank" class="" target="_blank"><img height="50px" width="50px" alt="Picture Of ' +
                            data[1] + '" src="' +
                            img_url + data[9] +
                            '"></a>';
                    } else {
                        return '<a href="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg" target="_blank" class="" target="_blank"><img height="50px" width="50px" alt="No Picture" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"></a>';
                    }
                }
            },
            {
                "data": null,
                className: "text-left",
                render: function(data, type, row) {
                    return data[10];
                }
            },
            {
                "data": null,
                className: "text-center",
                "width": "6%",
                render: function(data, type, row) {
                    var update_btn = "";
                    var delete_btn = "";
                    <?php if (crud_check("update")) : ?>
                    update_btn = '<a href="' + url + '/' + data[11] +
                        ' " target="_blank" class="btn btn-sm btn-outline-success btn-icon btn-inline-blockrounded-circle" target="_blank" data-template="<div class=&quot;tooltip&quot; role=&quot;tooltip&quot;><div class=&quot;tooltip-inner small fw-400&quot;></div></div>" data-toggle="tooltip" data-original-title="Edit Your Raw Material ??"><i class="fal fa-edit"></i></a>';
                    <?php endif ?>
                    <?php if (crud_check("delete")) : ?>
                    delete_btn = '<a href="javascript:void(0);" onclick="delete_alert(' + data[11] +
                        ')" class="btn btn-sm btn-outline-danger btn-icon btn-inline-blockrounded-circle js-sweetalert2-example-7" id="s-sweetalert2-example-7"><i class="fal fa-times"></i></a>';
                    <?php endif ?>
                    return update_btn + '&nbsp;' + delete_btn;
                }
            },
            {
                "data": null,
                className: "text-left",
                visible: false,
                render: function(data, type, row) {
                    return data[11];
                }
            }
        ]
    });
}
$(document).ready(function() {
    $('#raw_material_sku').on('keyup', function() {
        var raw_material_sku = $('#raw_material_sku').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ironman/RM_c/check_data_existence'); ?>",
            data: {
                raw_material_sku: raw_material_sku
            },
            success: function(response) {
                if (response) {
                    if (response == 1) {
                        $('#warning_message').html(
                            'SKU already exists !<br/>');
                        return false;
                    } else {
                        $('#warning_message').html('');
                    }
                }
            }
        });
    });
    $("#tag").on("keyup", function() {
        var tag = $(this).val();
        if (tag !== "") {
            $.ajax({
                url: "<?php echo base_url('ironman/RM_c/get_tag_values'); ?>",
                type: "POST",
                cache: false,
                data: {
                    tag: tag
                },
                success: function(data) {
                    $("#taglist").html(data);
                    $("#taglist").fadeIn();
                }
            });
        }
    });
    $(document).on("click", ".for_tags li", function() {
        var value = $('#tag').val();
        $('#tag').val($(this).text());
        $('#taglist').fadeOut("fast");
    });
    $('#raw_material_form').on('submit', function(e) {
        var max_val = $('#maximum_stock_level').val();
        var min_val = $('#minimum_stock_level').val();
        if (min_val > max_val) {
            alert('Minimum Stock Level Can Not Be Greater Than The Minimum Stock Level !');
            e.preventDefault();
        }
    });
    callServer();
});
      </script>
      <script>
function delete_alert(rm_id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!"
    }).then(function(result) {
        //   console.log(rm_id);
        if (result.value) {
            $.ajax({
                url: '<?= base_url() ?>/ironman/rm_c/delete_raw_material/' + rm_id,
                method: 'get',
                contentType: 'application/x-www-form-urlencoded',
                success: function(response) {
                    location.reload();
                },
                error: function(err) {}
            })
            // Swal.fire("Deleted!", "User has been deleted.");
        }
    }); //alert ends
}
      </script>
      <main id="js-page-content" role="main" class="page-content">
          <ol class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-item">
                  <a href="#"><?php echo $title; ?></a>
              </li>
              <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
              <!-- date -->
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
                              <i class="fal fa-layer-plus">&nbsp;</i> Raw Material Create
                          </h2>
                      </div>
                      <div class="panel-container">
                          <!-- <div class="panel-content"> -->
                          <form class="was-validated" id="raw_material_form" method="post" enctype="multipart/form-data"
                              action="<?= base_url("/ironman/RM_c/create_raw_material_submit") ?>" autocomplete="off">
                              <div class="panel-content">
                                  <!-- ------Div start-------- -->
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Raw Material SKU<b
                                                      style="color: red;">*</b>
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fal fa-cubes"></i></span>
                                                  </div>
                                                  <input type="text" id="raw_material_sku" name="raw_material_sku"
                                                      placeholder="Enter raw material sku"
                                                      class="form-control is-invalid" aria-label="rawmaterialsku"
                                                      aria-describedby="addon-wrapping-left"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip" data-original-title="Your raw material sku."
                                                      required>
                                              </div>
                                              <span id="warning_message" style="color : red"></span>
                                              <span class="help-block">Enter raw material SKU.</span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label " for="addon-wrapping-left">Raw Material Name<b
                                                      style="color: red;">*</b></label>
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
                                                      data-original-title="Raw material name is required!" required>
                                              </div>
                                              <span class="help-block">Enter raw material name.</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- -------Div End--------- -->
                                  <!-- ------Category/attribute start-------- -->
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Material Category<b
                                                      style="color: red;">*</b></label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fal fa-crown"></i></span>
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
                                                      <option value="<?php echo $cat->rm_category_id; ?>">
                                                          <?php
                                                                    $cat_arr = explode(",", $cat->rm_category_chain_parent);
                                                                    for ($i = 0; $i < count($cat_arr); $i++) {
                                                                        $cat_val = $this->crud_generator_model->get_data_by_id('rm_category', '*', 'rm_category_id', $cat_arr[$i]);
                                                                        if (count($cat_arr) > 1) {
                                                                            echo ($cat_val->rm_category_name) . ' >  ';
                                                                        } else {
                                                                            echo ($cat_val->rm_category_name);
                                                                        }
                                                                    }
                                                                    ?>
                                                      </option>
                                                      <?php }
                                                        } ?>
                                                  </select>
                                              </div>
                                              <span class="help-block">Select raw material category.</span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label " for="addon-wrapping-left">Raw Material
                                                  Attribute<b style="color: red;">*</b></label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-trophy-alt"></i></span>
                                                  </div>
                                                  <select id="raw_material_attribute"
                                                      class="select2 custom-select form-control is-invalid"
                                                      name="raw_material_attribute[]" multiple="multiple"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip"
                                                      data-original-title="Select Your Material Attribute." required>
                                                      <?php
                                                        if ($get_attribute) {
                                                            foreach ($get_attribute as $attr) { ?>
                                                      <option value="<?php echo $attr->rm_attribute_id; ?>" selected="">
                                                          <?php echo $attr->rm_attribute_name; ?></option>
                                                      <?php }
                                                        } ?>
                                                  </select>
                                              </div>
                                              <span class="help-block">Choose raw material attributes.</span>
                                          </div>
                                      </div>

                                  </div>
                                  <!-- -------Div End--------- -->
                                  <!-- ------Mac/godown start-------- -->
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Minimum Stock Level<b
                                                      style="color: red;">*</b>
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-sort-numeric-down-alt"></i></span>
                                                  </div>
                                                  <input id="minimum_stock_level" type="number"
                                                      name="minimum_stock_level" placeholder="Enter minimum stock level"
                                                      data-inputmask="'alias': 'minimumstocklevel'"
                                                      class="form-control is-invalid" aria-label="minimumstocklevel"
                                                      aria-describedby="addon-wrapping-left"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip"
                                                      data-original-title="Your minimum stock level." required>
                                              </div>
                                              <span class="help-block">Enter raw material minimum stock level.</span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Maximum Stock Level<b
                                                      style="color: red;">*</b>
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-sort-numeric-up-alt"></i></span>
                                                  </div>
                                                  <input id="maximum_stock_level" type="number"
                                                      name="maximum_stock_level" placeholder="Enter maximum stock level"
                                                      data-inputmask="'alias': 'maximumstocklevel'"
                                                      class="form-control is-invalid" aria-label="maximumstocklevel"
                                                      aria-describedby="addon-wrapping-left"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip"
                                                      data-original-title="Your maximum stock level." required>
                                              </div>
                                              <span class="help-block">Enter raw material maximum stock level.</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- -------Div End--------- -->
                                  <!-- ------Mac/godown start-------- -->
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Unit Price<b
                                                      style="color: red;">*</b>
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-funnel-dollar"></i></span>
                                                  </div>
                                                  <input type="number" name="unit_price" placeholder="Enter unit price"
                                                      data-inputmask="'alias': 'unitprice'"
                                                      class="form-control is-invalid" aria-label="unitprice"
                                                      aria-describedby="addon-wrapping-left"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip" data-original-title="Your unit price."
                                                      required>
                                              </div>
                                              <span class="help-block">Enter raw material unit price.</span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Cost Price<b
                                                      style="color: red;">*</b>
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-funnel-dollar"></i></span>
                                                  </div>
                                                  <input type="number" name="cost_price" placeholder="Enter cost price"
                                                      data-inputmask="'alias': 'costprice'"
                                                      class="form-control is-invalid" aria-label="costprice"
                                                      aria-describedby="addon-wrapping-left"
                                                      data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                                      data-toggle="tooltip" data-original-title="Your cost price."
                                                      required>
                                              </div>
                                              <span class="help-block">Enter raw material cost price.</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- -------Div End--------- -->
                                  <!-- -------Div Start--------- -->
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label">Raw Material Picture</label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i
                                                              class="fal fa-file-image"></i></span>
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
                                              <span class="help-block">Select a raw material picture.</span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group mt-2">
                                              <label class="form-label" for="addon-wrapping-left">Tag
                                              </label>
                                              <div class="input-group input-group-sm flex-nowrap">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fal fa-tags"></i></span>
                                                  </div>
                                                  <input type="text" id="tag" name="tag" placeholder="Enter tag"
                                                      class="form-control is-invalid tag" aria-label="tag"
                                                      aria-describedby="addon-wrapping-left" autocomplete="off">
                                              </div>
                                              <div id="taglist" class="taglist"></div>
                                              <span class="help-block">Enter raw material tags.</span>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- -------Div End--------- -->
                                  <!-- ------button start-------- -->
                                  <?php if (crud_check("create")) : ?>
                                  <div
                                      class="border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center mt-2">
                                      <button class="btn btn-primary ml-auto px-6 mt-3" type="submit">Create</button>
                                  </div>
                                  <?php endif ?>
                                  <!-- -------Div End--------- -->
                              </div>
                          </form>
                          <!-- </div> -->
                      </div>
                  </div>
                  <!-- ***********************************End*********************************** -->
              </div>
          </div>
          <!-- ------------**2stDiv**-------- -->
          <div class="row">
              <div class="col-xl-12">
                  <div id="panel-1" class="panel">
                      <div class="panel-hdr">
                          <h2>
                              <i class="fal fa-list-alt">&nbsp;</i> Raw Material List
                              </span>
                          </h2>
                      </div>
                      <div class="panel-container show">
                          <div class="panel-content">
                              <!-- datatable start -->
                              <table id="dt_raw_material_list"
                                  class="table table-sm table-bordered table-hover table-striped w-100">
                                  <thead class="thead-dark">
                                      <tr>
                                          <th title="Serial Number">SN.</th>
                                          <th>Material Name</th>
                                          <th>Material SKU</th>
                                          <th>Material Category</th>
                                          <th>Material Attribute</th>
                                          <th>Minimum Stock Level</th>
                                          <th>Maximum Stock Level</th>
                                          <th>Unit Price</th>
                                          <th>Cost Price</th>
                                          <th>Material Picture</th>
                                          <th>Tag</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                              </table>
                              <!-- datatable end -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--*****************End Your main content. ******************-->
      </main>