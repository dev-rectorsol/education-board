
		<script type="text/javascript">
			$(document).ready(function(){
				$('select[name="type"]').on('change', function(){
					var type = $(this).val();
					$('.type').hide();
					$("."+type).show();
				});

				var count = (function(){
					$('.count').each(function(index){
						$(this).html(index+1);
					});
					$('input[name="currect"]').each(function(index){
						$(this).val(index+1);
					});
				});

				$('.extra-fields').click(function() {
				  var ques_r = $('.ques_r:last-child');
					ques_r.clone().appendTo('.option_dynamic');
					count();
				});

				$(document).on('click', '.remove-field', function(e) {
				  $(this).closest('tr').remove();
				  e.preventDefault();
					count();
				});


			});
		</script>
