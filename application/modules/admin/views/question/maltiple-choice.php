<table class="type multiple-choice" style="display: block;">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th width="10%">Is Currect</th>
      <th width="80%">Multiple Choice</th>
      <th width="5%" ><span class="input-group-btn"><button type="button" class="btn btn-xs btn-success extra-fields"><i class="fa fa-plus" aria-hidden="true"></i></button></span></th>
    </tr>
  </thead>
  <tbody class="option_dynamic">
    <?php foreach ($options as $value): ?>
      <tr class="ques_r">
        <td class="count"><?php echo $value['count'] ?></td>
        <td>
          <div class="form-group">
            <?php if ($currect->answer == $value['count']): ?>
              <input name="currect" class="form-control" type="radio" checked value="<?php echo $value['count'] ?>">
              <?php else: ?>
                <input name="currect" class="form-control" type="radio" value="<?php echo $value['count'] ?>">
            <?php endif; ?>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input name="option[]" class="form-control" type="text" placeholder="Enter option here..." value="<?php echo $value['option'] ?>">
          </div>
        </td>
        <td><button type="button" class="btn-sm btn-danger remove-field"><i class="fa fa-times" aria-hidden="true"></i></button></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo $script; ?>
