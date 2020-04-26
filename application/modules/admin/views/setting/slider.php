<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline13-list">
          <div class="sparkline13-hd">
            <div class="main-sparkline13-hd">
              <h1>Lesson <span class="table-project-n">Data</span> List</h1>
              <div class="add-product">
                <a class="Danger danger-color" href="#" data-toggle="modal" data-target="#addSliderImage">New Image</a>
              </div>
            </div>
          </div>
          <div class="sparkline13-graph">
            <div class="datatable-dashv1-list custom-datatable-overright">
              <div id="toolbar">
                <select class="form-control dt-tb">
                  <option value="">Delete All</option>
                  <option value="all">Save To Draft</option>
                </select>
              </div>
              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                  <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th>Heading</th>
                    <th>Details</th>
                    <th class="text-center">Image</th>
                    <th>Button</th>
                    <th data-field="action">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($slider as $key => $value): ?>

                  <tr>
                    <td></td>
                    <td><?php echo $value['heading'] ?></td>
                    <td>
                      <?php echo $value['details'] ?>
                    </td>
                    <td class="text-center">
                      <img src="<?php echo base_url($value['source']) ?>" alt="" width="120" height="80">
                    </td>
                    <td>
                      <a href="<?php echo $value['buttonUrl'] ?>"></a>
                    </td>
                    <td>
                      <a href="<?php echo base_url('admin/lesson/edit/'); ?>"> <button type="button" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>
                      <button type="button" onclick="delete_detail('<?php echo $key; ?>')" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Static Table End -->

<div id="addSliderImage" class="modal modal-edu-general FullColor-popup-DangerModal fade in" role="dialog" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-4">
        <h4 class="modal-title">Slider Image Update</h4>
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
        </div>
      </div>
      <form id="sliderForm" action="<?php echo base_url('admin/setting/addslider'); ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="product-status-wrap drp-lst">
                <div class="form-group">
                  <input name="heading" type="text" class="form-control" placeholder="Slider Heading (optional)">
                </div>
                <div class="form-group">
                    <textarea name="details" style="height: auto;" placeholder="Enter some detail here (optional)"></textarea>
                </div>
                <div class="form-group">
                  <input name="url" type="url" class="form-control" placeholder="Button Url (optional)">
                </div>
                <span id="addfeaturepreview">
  							</span>
  							<button id="removepreview" type="button" class="btn btn-link hide">remove</button>
  							<button id="addfeatureimage" type="button" class="btn btn-link" name="button">Add Slider image</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer danger-md">
          <span id="msg" style="color: red;"></span>
          <input type="reset" class="btn btn-primary" class="close" data-dismiss="modal" value="Cancel">
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  function delete_detail(id) {
    var del = confirm("Do you want to Delete");
    if (del == true) {
      window.location = "<?php echo base_url()?>admin/setting/deleteslider/" + id;
    }
  }

  $('#sliderForm').on('submit', function(event){
    event.preventDefault();
    if($('input[name=featureImage]').length){
      $(this)[0].submit();
    }else{
      $('#msg').html('Select Image file After Click Save');
    }
  })
</script>
