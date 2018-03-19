/**
 * Created by BogdanKootz on 02.08.16.
 */
$('#type_select').on('change', function() {
	if($(this).val() == 5) {
		$('.js_project_input').slideDown();
		$('#project_id').removeAttr('disabled');

	} else {
		$('.js_project_input').slideUp();
		$('#project_id').attr('disabled', true);
	}
});
$(document).ready(function() {
	if($('#type_select').val() == 5) {
		$('.js_project_input').slideDown();
		$('#project_id').removeAttr('disabled');

	}
});
$('#title').on('change', function() {
	$title = $(this).val();
	$slug = getSlug($title);
	console.log($slug);

	if($('#slug').val() === '') {
		$('#slug').val($slug);
		$('.slug_block').addClass('is-dirty is-upgraded');
	}
});
$('#slug').on('change', function() {
	$link = $(this).val();
	$slug = getSlug($link);
	$(this).val($slug);
});
