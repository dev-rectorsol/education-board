
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/question/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Edit Question</h4>
              <div class="form-group">
                <label class="login2">Question Name</label>
                <input name="name" type="text" class="form-control" placeholder="Test Title" value="<?php echo $data->name; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Question</label>
                <textarea name="title" id="summernote1"><?php echo $data->title; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <div class="payment-adress">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="qusid" value="<?php echo $data->qusid; ?>">
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
              </div>
              <hr>
              <div class="form-group">
                <label class="login2">Create Date:</label>
                <span><?php echo my_date_show_time($data->created); ?></span>
              </div>
              <div class="form-group">
                <label class="login2">Marks</label>
                <input type="text" class="form-control" name="values" placeholder="Enter Question Marks" value="<?php echo $data->values; ?>">
              </div>
              <div class="form-group">
                <label class="login2">Question Type</label>
                <select class="form-control" name="type">
                  <option selected>Select Question Type</option>
                  <option value="dichotomous">Dichotomous</option>
                  <option value="multiple-choice">Multiple Choice</option>
                  <option value="open-ended">Open Ended</option>
                  <option value="image-question" disabled>Image Question</option>
                </select>
              </div>
              <span id="qus-view"></span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var qusType = '<?php echo  $data->type; ?>';
    $('select[name="type"]').val(qusType).attr('selected');
    if (qusType = 'multiple-choice') {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/question/get_multiplechoice') ?>",
        data: {id: '<?php echo $data->qusid; ?>'},
        cache: false,
        beforeSend: function() {
           $("#qus-view").html('<img src="<?php echo base_url('assets/images/preloder-0.2s-200px.svg') ?>" width="60" height="40" alt="">');
        },
        success: function(data){
           $("#qus-view").html(data);
        }
      })
    }
  });
</script>
