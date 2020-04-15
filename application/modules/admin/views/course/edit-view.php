
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <form action="<?php echo base_url('admin/course/update')?>" method="POST">
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="product-status-wrap drp-lst">

              <h4>Edit Course</h4>
              <div class="form-group">
                <label class="login2">Course Name</label>
                <input name="coursename" type="text" class="form-control" placeholder="Course Name" value="<?php echo $course->name; ?>">
              </div>

              <div class="form-group">
                <label class="login2">Course Description</label>
                <textarea name="description" id="summernote1"><?php echo  $course->description ?></textarea>
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
              <div class="form-group">
                <label class="login2">Course Category</label>
                <select class="select2_demo_2 form-control" name='category[]' data-placeholder="Choose a Category..." multiple="multiple">
                  <?php foreach($category as $row){ ?>
                    <?php if(in_array($row['id'], $indexcategory)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="login2">Course Tag</label>
                <select class="select2_demo_2 form-control" name='tag[]' data-placeholder="Choose a Tags..." multiple="multiple">
                  <?php foreach($tag as $row){ ?>
                    <?php if(in_array($row['id'], $indextags)): ?>
                      <option selected value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php else: ?>
                      <option value="<?php echo $row['id'] ?>"> <?php echo $row['title'] ?> </option>
                    <?php endif; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="login2">Create Date:</label>
                <span><?php echo my_date_show_time($course->created); ?></span>
              </div>
              <div class="form-group">
                <label class="login2">Status:</label>
                <?php if ($course->is_publish): ?>
                  <span>Publish</span>
                <?php else: ?>
                  <span>Save in Draft</span>
                <?php endif; ?>
              </div>
              <div class="payment-adress">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="course_id" value="<?php echo $course->course_id; ?>">

                <?php if ($course->is_publish): ?>
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
