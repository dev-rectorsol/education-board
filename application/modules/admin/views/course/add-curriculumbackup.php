<?php //pre($course); ?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="profile-info-inner">
          <div class="profile-img">
            <img src="<?php echo base_url( isset($image->thumb) ? $image->thumb : '' ); ?>" alt="">
          </div>
          <div class="profile-details-hr">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr">
                  <p><b>Name</b><br> <?php echo $course->name; ?></p>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                  <p><b>Category</b><br>
                    <?php foreach ($indexcategory as $value): ?>
                      <?php echo $this->common_model->select_category_name_by_id($value); ?>
                    <?php endforeach; ?></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                  <h3><?php echo $course->review; ?></h3>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-certificate" aria-hidden="true"></i></a>
                  <?php if ($course->is_publish): ?>
                    <h3>Publish</h3>
                  <?php else: ?>
                    <h3>Draft</h3>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="address-hr">
                  <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                  <p><?php echo my_date_show_time($course->created); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
          <div class="row">
            <div id="searchfield">
            	<form>
            		<input role="combobox" id="search" type="text" class="biginput" placeholder="Search Subject list" autocomplete="off" aria-owns="res" aria-autocomplete="both">
            		<input id="submit" type="submit" value="Add" class="btn btn-primary" class="button" />
            	</form>
            </div>
            <div class="autocomplete-suggestions" id="search-autocomplete"></div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="review-content-section">
                <div id="bucket" class="chat-discussion" style="height: auto">
                  <div class="chat-message">
                    <div class="message">
                      <a class="message-author" href="#"> Michael Smith </a>
                      <span class="message-date"> Mon Jan 26 2015 - 18:39:23 </span>
                      <div class="m-t-md mg-t-10">
                        <a class="btn btn-xs btn-default"><i class="fa fa-trash"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style media="screen">
.chat-discussion .chat-message .message {
  margin-left: 0px;
}
#res {
	margin: 0px;
	padding-left: 0px;
}

#res li {
	list-style-type: none;
}

#res li:hover,
#res li.highligt,
#res div:hover,
#res div.highligt {
	background: #110D3B;
	color: #FFF;
	cursor: pointer;
}

#searchfield {
	display: block;
	width: 100%;
	text-align: center;
	margin-bottom: 5px;
}

#searchfield form {
	display: inline-block;
	/* background: #eeefed;
	padding: 0;
	margin: 0;
	padding: 5px;
	border-radius: 3px;
	margin: 5px 0 0 0; */
}

#searchfield form .biginput {
	width: 600px;
	height: 40px;
	padding: 0 10px 0 10px;
	border: 1px solid #c8c8c8;
	border-radius: 3px;
	color: #000;
	font-weight: normal;
	font-size: 1.5em;
	-webkit-transition: all 0.2s linear;
	-moz-transition: all 0.2s linear;
	transition: all 0.2s linear;
	width: 600px;
	margin: 0 auto;
}

#searchfield form .biginput:focus,
input:focus {
	color: #000;
	outline: none;
}

.autocomplete-suggestions {
	border: 1px solid #999;
	background: #fff;
	cursor: default;
	overflow: auto;
  height: fit-content;
	width: auto;
	margin: 0 auto;
	display: none;
}

.autocomplete-suggestion {
	padding: 10px 5px;
	font-size: 1.2em;
	white-space: nowrap;
	overflow: hidden;
}

.autocomplete-selected {
	background: #f0f0f0;
}

.autocomplete-suggestions strong {
	font-weight: normal;
	color: #3399ff;
}

.visually-hidden {
	position: absolute !important;
	clip: rect(1px 1px 1px 1px);
	/* IE6, IE7 */
	clip: rect(1px, 1px, 1px, 1px);
	padding: 0 !important;
	border: 0 !important;
	height: 1px !important;
	width: 1px !important;
	overflow: hidden;
}

body:hover .visually-hidden a,
body:hover .visually-hidden input,
body:hover .visually-hidden button {
	display: none !important;
}

#hint {
	position: absolute;
	left: 777px;
	z-index: 10;
	background-color: #fff;
	text-transform: capitalize;
}

#search {
	z-index: 11;
	background-color: #fff;
	position: relative;
	text-transform: capitalize;
}
</style>

<script type="text/javascript">

$(document).ready(function() {
	var suburbs = '';
	var cache = {};
	var searchedBefore = false;
	var counter = 1;
	var highligtCounter = 0;
	var keys = {
		ESC: 27,
		TAB: 9,
		RETURN: 13,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40
	};
	$("#search").on("input", function(event) {
		doSearch();
	});

	$("#search").on("keydown", function(event) {
		doKeypress(keys, event);
	});
});

function doSearch() {
	var query = $("#search").val();

	$("#search").removeAttr("aria-activedescendant");
	//$('#hint').val('');

	if ($("#search").val().length >= 2) {

    $.ajax({
      url: '<?php echo base_url('admin/subject/get_sujcect'); ?>',
      type: 'POST',
      data: {'name' : query},
      success: function(response){
        var results = JSON.parse(response);
        if (response.length >= 1) {
          $("#res").remove();
          $('#announce').empty();
          $(".autocomplete-suggestions").show();
          $(".autocomplete-suggestions").append('<div id="res" role="listbox" tabindex="-1"></div>');
          counter = 1;
          //Add results to the list
      		for (term in results) {
      			if (counter <= 5) {
      				counter = counter + 1;
      			}

      		}
          $.each(results ,function( index  ){
            $("#res").append("<div role='option' tabindex='-"+index+"' data-id='"+ results[index]['subject_id'] +"' class='autocomplete-suggestion' id='suggestion-" + index + "'>" +results[index]['name'] + "</div>");
          });
        } else {

        }
      }
    });

		// //Case insensitive search and return matches to build the  array
		// var results = $.grep(suburbs, function(item) {
		// 	return item.search(RegExp("^" + query, "i")) != -1;
    //
		// });



	} else {
		$("#res").remove()
		$('#announce').empty();
		$(".autocomplete-suggestions").hide();
    $('#bucket').append('ADD NEW');
	}

}

//Bind click event to list elements in results
$("#res").on("click", "div", function() {
  $("#search").val($(this).text());
  $("#res").remove();
  $('#announce').empty();
  $(".autocomplete-suggestions").hide();
});


function doKeypress(keys, event) {
	var highligted = false;
	highligted = $('#res').children('div').hasClass('highligt');
	switch (event.which) {

		case keys.ESC:
			$("#search").removeAttr("aria-activedescendant");
			//$('#hint').val('');
			$("#res").remove();
			$('#announce').empty();
			$(".autocomplete-suggestions").hide();
			break;

		case keys.RIGHT:

			return selectOption(highligted)
			break;

		case keys.TAB:
			$("#search").removeAttr("aria-activedescendant");
			//$('#hint').val('');
			$("#res").remove();
			$('#announce').empty();
			$(".autocomplete-suggestions").hide();
			break;

		case keys.RETURN:
			if (highligted) {
				event.preventDefault();
				event.stopPropagation();
				return selectOption(highligted)
			}

		case keys.UP:
			event.preventDefault();
			event.stopPropagation();
			return moveUp(highligted);
			break;

		case keys.DOWN:
			event.preventDefault();
			event.stopPropagation();

			return moveDown(highligted);
			break;

		default:
			return;
	}
}

function moveUp(highligted) {
	var current;
	$("#search").removeAttr("aria-activedescendant");
	//$('#hint').val('');
	if (highligted) {
		console.log("Highlighted - " + highligted + "");
		current = $('.highligt');
		current.attr('aria-selected', false);
		current.removeClass('highligt').prev('div').addClass('highligt');
		current.prev('div').attr('aria-selected', true);
		$("#search").attr("aria-activedescendant", current.prev('div').attr('id'));
		//$('#hint').val($('.highligt').text());
		highligted = false;
	} else {

		//Go back to the bottom of the list

		current = $("#res").children().last('div');
		current.addClass('highligt');
		current.attr('aria-selected', true);
		$("#search").attr("aria-activedescendant", current.attr('id'));
		//$('#hint').val($('.highligt').text());

	}
}

function moveDown(highligted) {

	var current;
	$("#search").removeAttr("aria-activedescendant");
	//$('#hint').val('');
	if (highligted) {
		console.log("Highlighted - " + highligted + "");
		current = $('.highligt');
		current.attr('aria-selected', false);
		current.removeClass('highligt').next('div').addClass('highligt');
		current.next('div').attr('aria-selected', true);
		$("#search").attr("aria-activedescendant", current.next('div').attr('id'));
		//$('#hint').val($('.highligt').text());
		highligted = false;
	} else {

		//Go back to the top of the list
		current = $("#res").children().first('div');
		current.addClass('highligt');
		current.attr('aria-selected', true);
		$("#search").attr("aria-activedescendant", current.attr('id'));
		//$('#hint').val($('.highligt').text());

	}
}

function selectOption(highligted) {
	if (highligted) {
		$("#search").removeAttr("aria-activedescendant");
		//$('#hint').val('');
		$('#search').val($('.highligt').text());
		$('#search').focus();
		$("#res").remove();
		$('#announce').empty();
		$(".autocomplete-suggestions").hide();
	} else {
		return;
	}
}

</script>
