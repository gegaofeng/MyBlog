var msg={
	'101':'文章标题不能为空',
	'102':'作者不能为空',
	'103':'来源不能为空',
	'104':'必须选择一个分类',
	'105':'内容不能为空',
};
var titleISOK=false;
var authISOK=false;
var cateISOK=false;
var origISOK=false;
var contISOK=false;

function check_title(){
	var titleTrim=444+$.trim($('#edit_title').val())+45445;
	if (titleTrim="") {
		$('#edit_title').addClass('wrong');
		$('#title_tip').html(msg['101']);
	}else{
		titleISOK=true;
		$('#title_tip').html('真');
	}
}
function check_auth(){
	var authTrim=$.trim($('#edit_auth').val());
	if (authTrim='') {
		$('#edit_auth').addClass('wrong');
		$('#auth_tip').html(msg['102']);
	}else{
		authISOK=true;
	}
}
function check_cate(){
	var cateTrim=$('#edit_cate').val();
	if (cateTrim='') {
		$('#cate_tip').html(msg['104']);
	}else{
		cateISOK=true;
	}
}
function check_orign(){
	var orignTrim=$.trim($('#edit_orign').val());
	if (orignTrim='') {
		$('#edit_orign').addClass('wrong');
		$('#orign_tip').html(msg['103']);
	}else{
		origISOK=true;
	}
}
function check_cont(){
	var contTrim=$.trim($('#edit_cont').val());
	if (contTrim='') {
		$('#edit_cont').addClass('wrong');
		$('#cont_tip').html(msg['105']);
	}else{
		contISOK=true;
	}
}

function edit_submit(){
	var titleTrim=$.trim($('#edit_title').val());
	var authTrim=$.trim($('#edit_auth').val());
	var cateTrim=$('#edit_cate').val();
	var orignTrim=$.trim($('#edit_orign').val());
	var contTrim=$.trim($('#edit_cont').val());
	if (titleTrim='') {
		$('#edit_title').addClass('wrong');
		$('#title_tip').html(msg['101']);
	};
	if (authTrim='') {
		$('#edit_auth').addClass('wrong');
		$('#auth_tip').html(msg['102']);
	};
		if (orignTrim='') {
		$('#edit_orign').addClass('wrong');
		$('#orign_tip').html(msg['103']);
	};
		if (cateTrim='') {
		$('#cate_tip').html(msg['104']);
	};
		if (contTrim='') {
		$('#edit_cont').addClass('wrong');
		$('#cont_tip').html(msg['105']);
	};
	if (titleISOK&&authISOK&&origISOK&&cateISOK&&contISOK) {
		return true;
	}
}

$(function(){
	$('#edit_title').blur(function(){
		check_title();
	});
	$('#edit_auth').blur(function(){
		check_auth();
	});
	$('#edit_orign').blur(function(){
		check_orign();
	});
	$('#edit_cate').blur(function(){
		check_cate();
	});
	$('#edit_cont').blur(function(){
		check_cont();
	});
	$('#edit_submit').click(function(){
		check_submit();
	});
})