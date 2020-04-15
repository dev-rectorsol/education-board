
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/product/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <h4>Add Product </h4>
              <div class="form-group">
                <label class="login2">Product name</label>
                <input name="name" type="text" class="form-control" placeholder="Product Name" required value="<?php echo $product->product ?>">
              </div>
              <div class="form-group">
                <label class="login2">Product Price</label>
                <input name="price" type="text" class="form-control" placeholder="Product Price" required value="<?php echo number_format($product->price, 0); ?>">
              </div>
              <div class="form-group">
                <label class="login2">Product Discount Price</label>
                <input name="discount" type="text" class="form-control" placeholder="Product Discount Price" required value="<?php echo number_format($product->discount, 0); ?>">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-status-wrap drp-lst">
              <?php if(isset($image->thumb)): ?>
              <span id="addfeaturepreview">
                <img src="<?php echo base_url().$image->thumb; ?>" alt="">
                <input type="hidden" name="featureImage" value="<?php echo $image->thumb; ?>">
              </span>
              <button id="removepreview" type="button" class="btn btn-link">remove</button>
              <button id="addfeatureimage" type="button" class="btn btn-link" name="button">change feature image</button>
              <?php else: ?>
                <span id="addfeaturepreview">
                </span>
                <button id="removepreview" type="button" class="btn btn-link hide">remove</button>
                <button id="addfeatureimage" type="button" class="btn btn-link" name="button">Add feature image</button>
              <?php endif; ?>
              <div class="form-group res-mg-t-15">
                <label class="login2">Course Name</label>
                <select class="select2_demo_2 form-control" name='courses[]' required data-placeholder="Choose a Category..." multiple="multiple">
                  <?php $source = explode(',', $product->source); ?>
                  <?php foreach($course as $row){ ?>
                    <?php if (in_array($row['course_id'] , $source)): ?>
                      <option selected value="<?php echo $row['course_id'] ?>"> <?php echo $row['name'] ?> </option>
                      <?php else: ?>
                        <option value="<?php echo $row['course_id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label class="login2">Create Date:</label>
                <span><?php echo my_date_show_time($product->created_at); ?></span>
              </div>
              <div class="form-group">
                <label class="login2">Status:</label>
                <?php if ($product->is_publish): ?>
                  <span>Publish</span>
                <?php else: ?>
                  <span>Save in Draft</span>
                <?php endif; ?>
              </div>
              <div class="payment-adress">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">

                <?php if ($product->is_publish): ?>
                  <button type="submit" name='submit' value="save" class="btn btn-primary pull-left ">Draft</button>
                <?php else: ?>
                  <button type="submit" name='submit' value="publish" class="btn btn-primary pull-left ">Publish</button>
                <?php endif; ?>
                <button type="submit" name="submit" value="update" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  function publish($id) {
    var val1 = $("form").serialize();
    $.ajax({
      type: "POST",
      url: "insert.php",
      data: val1,
      success: function(result) {
        alert(result);
      }
    });
  }
</script>
