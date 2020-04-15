<div class="modal modal-edu-general default-popup-PrimaryModal fade in" role="dialog" style="display: block; padding-right: 17px;">
  <div class="modal-dialog" style="min-width: auto; min-height: auto; width: 75%;">
    <div class="modal-content">
      <div class="modal-header header-color-modal bg-color-1">
        <input type="text" id="input" placeholder="Search..." class="form-control">
        <div class="modal-close-area modal-close-df">
          <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
        </div>
      </div>
      <div class="modal-body">
          <div class="row">
          <?php foreach ($video as $value): ?>
              <?php  $temp = getFileInfo($value); ?>
              <div class="col-sm-4 mix <?php echo $temp['basename'] ?>">
                <div class="hpanel widget-int-shape responsive-mg-b-30 title">
                  <div class="panel-body">
                    <div class="text-center content-box __video-file"
                    data-src="<?php echo base_url($value) ?>"
                    data-path="<?php echo $value ?>"
                    data-name="<?php echo $temp['basename'] ?>">
                        <div class="m icon-box">
                          <video class="afterglow" width="250" height="180">
                            <source type="video/mp4" src="<?php echo base_url($value) ?>" />
                          </video>
                        </div>
                        <p class="small mg-t-box">
                          <h5 class="m-b-xs"><?php echo $temp['basename'] ?></h5>
                        </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" name="button">upload new</button>
      </div>
    </div>
  </div>
</div>
<style media="screen">
.modal-edu-general .modal-body {
  text-align: center;
  /* padding: 50px 70px; */
  overflow: scroll;
  height: 382px;
  overflow-y: auto;
  overflow-x: hidden;
}

.form-control{
    color: #181818;
}

.text-center.content-box.__video-file {
    border: 1px solid #ccc;
    width: fit-content;
    padding: 0px;
    margin: 0px;
}

.mix {
  display: none;
  text-align: center;
}
</style>
<script src="<?php echo base_url('optimum/js/jquery.mixitup.min.js'); ?>" charset="utf-8"></script>
<script type="text/javascript">
  $('.__video-file').on('click', function() {
    var obj = $(this);
    var preview = $('#addfeaturepreview');
    var button = $('#addfeatureimage');
    var remove = $('#removepreview');
    var name = obj.attr('data-name');
    var path = obj.attr('data-path');
    var url = obj.attr('data-src');
    var html = '<video class="afterglow" width="250" height="180"><source type="video/mp4" src="'+url+'" /></video><h5 class="m-b-xs">'+name+'</h5>';
    html += '<input type="hidden" name="lactureVideo[]" value="'+path+'" >';
    preview.append(html);
    $('.modal').hide();
    remove.removeClass('hide');
    button.html('Add More');
  });

  $(function() {

  $(".modal-body").mixItUp();

  var inputText;
  var $matching = $();

  // Delay function
  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  $("#input").keyup(function(){
    // Delay function invoked to make sure user stopped typing
    delay(function(){
      inputText = $("#input").val().toLowerCase();

      // Check to see if input field is empty
      if ((inputText.length) > 0) {
        $( '.mix').each(function() {
          $this = $("this");

           // add item to be filtered out if input text matches items inside the title
           if($(this).children('.title').text().toLowerCase().match(inputText)) {
            $matching = $matching.add(this);
          }
          else {
            // removes any previously matched item
            $matching = $matching.not(this);
          }
        });
        $(".modal-body").mixItUp('filter', $matching);
      }

      else {
        // resets the filter to show all item if input is empty
        $(".modal-body").mixItUp('filter', 'all');
      }
    }, 200 );
  });
})
</script>
