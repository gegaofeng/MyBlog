var msg={
	'101':'文章标题不能为空',
	'102':'作者不能为空',
	'103':'必须选择一个来源',
	'104':'必须选择一个分类',
	'105':'内容不能为空',
};
var titleISOK=false;
var authISOK=true;
var cateISOK=false;
var orignISOK=false;
var contISOK=false;

function checkTitle(){
	var titleTrim=$.trim($('#edit_title').val());
	if (titleTrim=='') {
		$('#edit_title').addClass('wrong');
		$('#title_tip').html(msg['101']);
	}else{
		titleISOK=true;
		//$('#title_tip').html('真+titleTrim');
	}
}
function checkAuth(){
	var authTrim=$.trim($('#edit_auth').val());
	checkFocus('edit_auth','autn_tip');
	if (authTrim=='') {
		$('#edit_auth').addClass('wrong');
		$('#auth_tip').html(msg['102']);
	}else{
		authISOK=true;
	}
}
function checkCate(){
	var cateTrim=$('input[name="category_id"]:checked').val();
	checkFocus('edit_cate','cate_tip');
	if (cateTrim=='') {
		$('#cate_tip').html(msg['104']);
	}else{
		cateISOK=true;
	}
}
function checkOrign(){
	var orignTrim=$('input[name="edit_orign"]:checked').val();
	checkFocus('edit_orign','orign_tip');
	if (orignTrim=='') {
		$('#orign_tip').html(msg['103']);
	}else{
		orignISOK=true;
	}
}
function checkCont(){
	var contTrim=$('#edit_cont').val();
	//var contTrim=CKEDITOR.instances.content.getData();
	//alert(contTrim);
	checkFocus('edit_cont','cont_tip')
	if (contTrim=='') {
		$('#edit_cont').addClass('wrong');
		$('#cont_tip').html(msg['105']);
	}else{
		contISOK=true;
	}
}

//将单元格恢复到最初样式
function checkFocus(inputId, tipId , clearTip) {
    $('#' + inputId).removeClass('wrong');
    if( clearTip === 'no'){
    	$('#' + tipId).addClass('warn');
    }else{
    	$('#' + tipId).addClass('warn').html('');
    }
}

function editSubmit(){
	var titleTrim=$.trim($('#edit_title').val());
	var authTrim=$.trim($('#edit_auth').val());
	var contTrim=$.trim($('#edit_cont').val());
	if (titleTrim=='') {
		$('#edit_title').addClass('wrong');
		$('#title_tip').html(msg['101']);
	};
	if (authTrim=='') {
		$('#edit_auth').addClass('wrong');
		$('#auth_tip').html(msg['102']);
	};
	if (!orignISOK) {
		$('#orign_tip').html(msg['103']);
	};
	if (!cateISOK) {
		$('#cate_tip').html(msg['104']);
	};
	checkCont();
	if (contTrim=='') {
		$('#edit_cont').addClass('wrong');
		$('#cont_tip').html(msg['105']);
	};
	//alert('title='+titleISOK+',auth='+authISOK+',orign='+orignISOK+'cate='+cateISOK+',cont='+contISOK);
	//alert($('#edit_content').val());
	if (titleISOK&&authISOK&&orignISOK&&cateISOK&&contISOK) {
        $("#edit_form").attr("onsubmit","return true;");
	}
}

//清空表格
function formReset(){
	$('#edit_title').val('');
	$('#edit_auth').val('');
	$('#edit_orign').val('');
	$('#edit_content').val('');
}

$(function(){
	$('#edit_title').focus(function(){
		checkFocus('edit_title','title_tip');
	});
	$('#edit_title').blur(function(){
		checkTitle();
	});
	$('#edit_auth').focus(function(){
		checkFocus('edit_auth','auth_tip');
	});
	$('#edit_auth').blur(function(){
		checkAuth();
	});
	$('#edit_orign').focus(function(){
		checkFocus('edit_orign','orign_tip');
	})
	$('input[name="edit_orign"]').blur(function(){
		checkOrign();
	});
	$('input[name="category_id"]').blur(function(){
		checkCate();
	});
	$('#edit_submit').click(function(){
		editSubmit();
	});
})