/**
 * Created by BogdanKootz on 08.08.16.
 */
$('#news').hover( function() {
	//$('.nav_block.active').hide();
	$('.nav_block').removeClass('active');
	$('.articles_more').addClass('active');
});
$('#index').hover( function() {
	//$('.nav_block.active').hide();
	$('.nav_block').removeClass('active');
	$('.last_article').addClass('active');
});
$('#opportunities').hover( function() {
	//$('.nav_block.active').hide();
	$('.nav_block').removeClass('active');
	$('.opportunities').addClass('active');
});
$('#projects').hover( function() {
	//$('.nav_block.active').hide();
	$('.nav_block').removeClass('active');
	$('.projects').addClass('active');
});
$('#about').hover( function() {
	//$('.nav_block.active').hide();
	$('.nav_block').removeClass('active');
	$('.about').addClass('active');
});