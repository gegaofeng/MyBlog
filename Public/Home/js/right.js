$(function () {
	$('#li_liuyan').mouseover(function(){
		$('#li_liuyan').addClass('active');
		$('#li_dianji').removeClass('active');
		$('#li_youlian').removeClass('active');
		$('#tab_liuyan').addClass('active');
		$('#tab_dianji').removeClass('active');
		$('#tab_youlian').removeClass('active');
	});
	$('#li_dianji').mouseover(function(){
		$('#li_liuyan').removeClass('active');
		$('#li_dianji').addClass('active');
		$('#li_youlian').removeClass('active');
		$('#tab_liuyan').removeClass('active');
		$('#tab_dianji').addClass('active');
		$('#tab_youlian').removeClass('active');
	});
	$('#li_youlian').mouseover(function(){
		$('#li_liuyan').removeClass('active');
		$('#li_dianji').removeClass('active');
		$('#li_youlian').addClass('active');
		$('#tab_liuyan').removeClass('active');
		$('#tab_dianji').removeClass('active');
		$('#tab_youlian').addClass('active');
	});
})