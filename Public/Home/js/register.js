var google_tag_params = { prodid: '', pagetype: '', pname: '', pcat: '', dangdangprice: '', marketprice: '', discountprice: '', promotionprice: '', ordervalue: '', pbrand: '', author: '', publisher: '', login: 'regpage' };
var usernameIsOk = false;
var preUsernameIsEmail = false;//上次填写的用户名是否为邮箱
var nowUsernameIsEmail = false;//当前用户名是否为邮箱
var passwordIsOk = false;
var rePasswordIsOk = false;
var mobileIsOk = false;
var vcodeIsOk = false;
var mobileCodeIsOk = false;
var agreementIsOk = true;
var isUpdateEmail = false; //用户名框中是否更新
var isUpdatePhone = false; //验证手机框电话号码是否更新，包括用户名框中是邮箱情况
var oldUsername = ''; //记录上一次用户名，用于判断用户名是否变化
var oldMobile = '';//记录上一次验证电话，用于判断电话是否变化
var selectdomin = -1;
var getMoblieCodeInterval = 120; //可重新获取手机验证码时间间隔 单位秒
var miao = getMoblieCodeInterval;
var timeoutrun = 0; //倒计时计数器
var vcodeGenerateTiem ;//最新图形验证码生成的时间
var vcodeOvertimeInterval = 10 * 60 * 1000;//图形验证码有效期为10分钟
var checkLogin = {
    usernameReg:/^([a-zA-Z]+[a-zA-Z0-9]{5,11})$/, //匹配用户名
	emailNameReg: /^(([a-zA-Z0-9]+\w*((\.\w+)|(-\w+))*[\.-]?[a-zA-Z0-9]+)|([a-zA-Z0-9]))$/, //匹配邮箱名称
    emailReg: /^(([a-zA-Z0-9]+\w*((\.\w+)|(-\w+))*[\.-]?[a-zA-Z0-9]+)|([a-zA-Z0-9]))\@[a-zA-Z0-9]+((\.|-)[a-zA-Z0-9]+)*\.[a-zA-Z0-9]+$/, //匹配邮箱
    mobileReg: /^1[3,4,5,7,8][0-9]{9}$/,//匹配电话号码
    vcodeReg: /^[a-zA-Z0-9]*$/,//匹配图形验证码
    msg: {
    	'101' : '用户名用于登陆,字母或数字,字母开头,6~20个字符',
    	'102' : '用户名不能为空',
    	'103' : '用户名已被占用',
    	'104' : '用户名格式不对',
    	'105' : '此手机号已注册，请更换其它手机号，或使用该&nbsp;<a href=\"signin.php?Email={#Email#}\" name=\"mobile_login _link\" class=\"more\">手机号登录</a>',
    	'111' : '密码为6-20个字符，可由英文、数字及符号组成',
    	'112' : '登录密码不能为空',
    	'113' : '密码长度6-20个字符，请重新输入',
    	'115' : '密码不能包含“空格”，请重新输入',
    	'116' : '密码为6-20位字符,只能由英文、数字及符号组成',
    	'121' : '请再次输入密码',
    	'122' : '密码不能为空',
    	'123' : '两次输入的密码不一致，请重新输入',
    	'131' : '请输入你要验证的手机号码',
    	'132' : '验证手机号不能为空',
    	'133' : '手机号码格式有误，请输入正确的手机号码',
    	'141' : '请输入短信验证码',
    	'142' : '验证码已发送，请注意查收',
    	'143' : '您的手机号码获取验证码过于频繁，请于24小时后重试',
    	'144' : '还是没有收到短信？请于24小时后重试，或更换验证手机号码',
    	'145' : '网络繁忙，请稍后重试',
    	'146' : '重新获取验证码',
    	'147' : '完成验证后，您可以用该手机登录和找回密码',
    	'148' : '验证码错误',
    	'149' : '您的手机号码获取验证码过于频繁，请2分钟后重试',
    	'151' : '您必须同意当当服务条款后，才能提交注册。',
    	'161' : '请填写图片中的字符，不区分大小写',
    	'162' : '请输入图形验证码',
    	'163' : '图形验证码输入错误，请重新输入',
    	'164' : '图形验证码已失效，请重新输入'

    },
    userName:{
    	checkUsernameFocus: function(){
    		checkFocus('txt_username', 'spn_username_ok', 'J_tipUsername');
            $('#J_tipUsername').html(checkLogin.msg['101']);
            $("#select_emaildomain").hide();
    	},
        checkUsername: function(){//输入用户名验证
            $("#select_emaildomain").hide();
            usernameIsOk = false;
            nowUsernameIsEmail = false;
            var usernameExist = false;
            var username = $.trim($('#txt_username').val());
            if( oldUsername != username){
            	isUpdateEmail = true;
            	oldUsername = username;
            }
            if (username == '') {
                return false;
            }
            checkFocus('txt_username', 'spn_username_ok', 'J_tipUsername');
            //if (!/^\d+$/.test(username)) {
                /*
            if (username.length > 40 ) {
                $('#txt_username').addClass('wrong');
                $('#J_tipUsername').removeClass('warn').html(checkLogin.msg['103']);
                $('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                return false;
            }
            if (/[ ]/.test(username)) {
            	$('#txt_username').addClass('wrong');
            	$('#J_tipUsername').removeClass('warn').html(checkLogin.msg['103']);
            	$('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                return false;
            }
            */
            //alert('ajax')
            //匹配用户名格式
            if (!checkLogin.usernameReg.test(username)) {
                $('#txt_username').addClass('wrong');
                $('#J_tipUsername').removeClass('warn').html(checkLogin.msg['104']);
                $('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'checkUserName',
                data: 'username=' + username,
                async: false,
                success: function (flg) {
                    //alert(flg);
                    //alert(flg==true);
                    if (flg == false) {
                        $('#txt_username').addClass('wrong')
                        $('#J_tipUsername').removeClass('warn').html(checkLogin.msg['103'].replace('{#Email#}', username));
                        $('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                        usernameExist = true;
                        return ;
                    }else{

                    }
                }
            });
            if (usernameExist == true) {
                return false;
            }
            $('#spn_username_ok').removeClass('icon_wrong').addClass('icon_yes').show();
            usernameIsOk = true;
            return true;
        }
    },
    password: {
    	checkPasswordFocus: function() {
    		checkFocus('txt_password', 'spn_password_ok', 'J_tipPassword');
            $('#J_tipPassword').html(checkLogin.msg['111']).show();
            $('#J_tipUpperCaseBox').hide();
            $('#spnPwdStrongTips').hide(); //密码强度提醒
    	},
    	checkPasswordInput: function() {
            if($('#J_tipUpperCaseBox').is(':hidden')){
            	checkFocus('txt_password', 'spn_password_ok', 'J_tipPassword');
                $('#J_tipPassword').hide();
                $('#spnPwdStrongTips').hide();

                var passwordTrim = $.trim($('#txt_password').val());
                if (passwordTrim.length == 0) {
                    $('#J_tipPassword').html(checkLogin.msg['111']).show();
                    return false;
                }

                if (passwordTrim.length < 6) {
                    $('#spnPwdStrongTips').show();
                    $('.j_pwdStrong').hide();
                    $('#spnPwdStrong1').show();
                    return false;
                }

                if (passwordTrim.length > 20){
                    $('#txt_password').addClass('wrong');
                    $('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                    $('#J_tipPassword').removeClass('warn').html(checkLogin.msg['113']).show();
                    return false;
                }
                var chenum = checkLogin.password.checkStrong();
                if (chenum == 0) {
                    return false;
                } else if (chenum == 1) {
                    $('.j_pwdStrong').hide();
                    $('#spnPwdStrong1').show();
                } else if (chenum == 2) {
                    $('.j_pwdStrong').hide();
                    $('#spnPwdStrong2').show();
                } else if (chenum >= 3) {
                    $('.j_pwdStrong').hide();
                    $('#spnPwdStrong3').show();
                }
                $('#spnPwdStrongTips').show();
                $('#spn_password_ok').removeClass('icon_wrong').addClass('icon_yes').show();
                return true;
            }
    	},
    	checkPassword: function() {
    		checkFocus('txt_password', 'spn_password_ok', 'J_tipPassword');
    		$('#spnPwdStrongTips').hide();
            $("#J_tipUpperCaseBox").hide();
            $("#J_tipPassword").show();
            passwordIsOk = false;
    		var password = $('#txt_password').val();
            if (password == '') {
                return false;
            }
            if (password.length < 6 || password.length > 20) {
                $('#txt_password').addClass('wrong');
                $('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                $('#J_tipPassword').removeClass('warn').html(checkLogin.msg['113']);
                return false;
            }
            if (!/^\S{1,20}$/.test(password)) {
                $('#txt_password').addClass('wrong');
                $('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                $('#J_tipPassword').removeClass('warn').html(checkLogin.msg['115']);
                return false;
            }

            for(var i=0;i<password.length;i++){
                if(password.charCodeAt(i)>127){
                    $('#txt_password').addClass('wrong');
                    $('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                    $('#J_tipPassword').removeClass('warn').html(checkLogin.msg['116']);
                    return false;
                }
            }
            if(!checkLogin.password.checkPasswordInput()){
            	return false;
            }
            passwordIsOk = true;
            //当确认密码不为空时，密码修改后再一次验证确认密码和密码是否相等
            checkLogin.rePassword.checkRePassword();
            return true;
    	},
    	checkCapslockOpen: function(e) {
    		var  e= window.event || e;
            var  n=e.keyCode || e.which;
            var  m=e.shiftKey||(n==16)||false;
            if (((n >= 65 && n <= 90) && !m) || ((n >= 97 && n <= 122 )&& m)) {
            	$('#spnPwdStrongTips').hide();
                $('#J_tipPassword').hide();
                $("#J_tipUpperCaseBox").show();
            } else if(n >= 97 && n <= 122 && !m){
                $("#J_tipUpperCaseBox").hide();
            } else if(n==27){
                $("#J_tipUpperCaseBox").hide();
            } else{
            	$("#J_tipUpperCaseBox").hide();
            }
    	},
    	checkStrong: function(){
            var sPW = $('#txt_password').val();
            if (sPW.length < 1){
                return 0;
            }
            var Modes = 0;
            for (i = 0; i < sPW.length; i++) {
                Modes |= Evaluate(sPW.charCodeAt(i));
            }
            var num = bitTotal(Modes);
            return num;
        }
    },
    rePassword: {
    	checkRePasswordFocus: function() {
    		checkFocus('txt_repassword', 'spn_repassword_ok', 'J_tipSurePassword');
            $('#J_tipSurePassword').html(checkLogin.msg['121']);
    	},
    	checkRePassword: function() {
    		checkFocus('txt_repassword', 'spn_repassword_ok', 'J_tipSurePassword');
    		rePasswordIsOk = false;
            var passsword = $('#txt_password').val();
    		var rep_password = $('#txt_repassword').val();
            if (rep_password == '') {
                return false;
            }
            if (rep_password != passsword) {
                $('#txt_repassword').addClass('wrong');
                $('#spn_repassword_ok').removeClass('icon_yes').addClass('icon_wrong').show();
                $('#J_tipSurePassword').removeClass('warn').html(checkLogin.msg['123']);
                return false;
            }
            $('#spn_repassword_ok').removeClass('icon_wrong').addClass('icon_yes').show();
            rePasswordIsOk = true;
            return true;
    	}
    },
    vcode: {
    	checkVcodeFocus: function(){
    		checkFocus('txt_vcode', 'spn_vcode_ok', 'J_tipVcode');
            $('#J_tipVcode').html(checkLogin.msg['161']);
    	},
    	checkVcode: function(e){
    			vcodeIsOk = false;
        		checkFocus('txt_vcode', 'spn_vcode_ok', 'J_tipVcode');
        		var txtVcode = $.trim($("#txt_vcode").val());
        		var txtVcodeLen = txtVcode.length;
                if (txtVcodeLen==4) {
                		//验证图形验证码是否正确
            	checkLogin.vcode.checkVcodeIsOk(txtVcode);
            }else{
                $('#txt_vcode').addClass('wrong');
                $('#spn_vcode_ok').removeClass('icon_yes').addClass('icon_wrong').css({'display':'inline-block'});
                $('#J_tipVcode').removeClass('warn').html(checkLogin.msg['163']);
            	return false;
            }
    	},
    	checkVcodeIsOk: function(vcode){
    		var type=0;
            //alert('ajax');
    		$.ajax({
    	        type: 'POST',
    	        url: 'checkVerifyCode',
    	        data: 'vcode=' + vcode,
    	        async: false,
    	        success: function (flg) {
                    //alert(flg);
    	        	if (flg == false) {
    	            	$('#txt_vcode').addClass('wrong');
    	                $('#spn_vcode_ok').removeClass('icon_yes').addClass('icon_wrong').css({'display':'inline-block'});
    	                $('#J_tipVcode').removeClass('warn').html(checkLogin.msg['163']);
    	                return false;
    	            }else{
    	            	checkFocus('txt_vcode', 'spn_vcode_ok', 'J_tipVcode');
    	            	$('#spn_vcode_ok').removeClass('icon_wrong').addClass('icon_yes').css({'display':'inline-block'});
    	            	vcodeIsOk = true;
    	            	return true;
    	            }
    	        }
    	    });
    	},
    	checkVcodeOvertime: function(){
    		var nowTime = new Date().getTime();
    		if( (nowTime - vcodeGenerateTiem)> vcodeOvertimeInterval ){
    			show_vcode('imgVcode');
    			return false;
    		}else{
    			return true;
    		}
    	}
    },
    agreement: {
    	checkAgreement: function() {
    		if ('checked' == $('#chb_agreement').attr('checked')) {
    			$('#J_tipAgreement').html('')
    			agreementIsOk = true;
	            return true;
	        } else {
	        	$('#J_tipAgreement').html(checkLogin.msg['151']);
	        	agreementIsOk = false;
	            return false;
	        }
    	}
    },
    tool: {
    	isFunc: function(funcName){
    	    return typeof funcName == 'function';
    	},
    }
};

//将单元格恢复到最初样式
function checkFocus(inputId, iconId, tipId , clearTip) {
    $('#' + inputId).removeClass('wrong');
    $('#' + iconId).hide();
    if( clearTip === 'no'){
    	$('#' + tipId).addClass('warn');
    }else{
    	$('#' + tipId).addClass('warn').html('');
    }

}
//密码强度验证
function Evaluate(character){
    if (character >= 48 && character <= 57){
        return 1;
    } else if (character >= 65 && character <= 90) {
        return 2;
    } else if (character >= 97 && character <= 122) {
        return 4;
    } else {
        return 8;
    }
}
//密码强度验证
function bitTotal(num){
    var modes = 0;
    for (i = 0; i < 4; i++) {
        if (num & 1) modes++;
        num >>>= 1;
    }
    return modes;
}

//提交注册
function check_register() {
    var usernameTrim = $.trim($('#txt_username').val());
    var passwordTrim = $.trim($('#txt_password').val());
    var repasswordTrim = $.trim($('#txt_repassword').val());
    var mobile = $.trim($('#txt_mobile').val());
    var vcode = $.trim($('#txt_vcode').val());
    var mobileCode = $.trim($('#J_MobileCode').val());
    if (usernameTrim == "" || passwordTrim == "" || repasswordTrim == "" || vcode == ''
    	|| ($('#J_mobileV').is(':visible') && mobile=='')
    	|| ($('.j-phoneVcode').is(':visible') && mobileCode == "")) {
        if (usernameTrim == "") {
            $('#txt_username').addClass('wrong');
            $('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            $('#J_tipUsername').removeClass('warn').html(checkLogin.msg['102']);
        }
        if (passwordTrim == "") {
        	$('#txt_password').addClass('wrong');
            $('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            $('#J_tipPassword').removeClass('warn').html(checkLogin.msg['112']);
            $('#J_tipUpperCaseBox').hide();
            $('#spnPwdStrongTips').hide();
        }
        if (repasswordTrim == "") {
        	$('#txt_repassword').addClass('wrong');
            $('#spn_repassword_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            $('#J_tipSurePassword').removeClass('warn').html(checkLogin.msg['122']);
        }
        if( vcode =='' ) {
        	$('#txt_vcode').addClass('wrong');
            $('#spn_vcode_ok').removeClass('icon_yes').addClass('icon_wrong').css({'display':'inline-block'});
            $('#J_tipVcode').removeClass('warn').html(checkLogin.msg['162']);
        }
        //防止重复提交
        submitBtnAvailability('enable');
        return false;
    }
    if(!vcodeIsOk){
    	$('#txt_vcode').addClass('wrong');
        $('#spn_vcode_ok').removeClass('icon_yes').addClass('icon_wrong').css({'display':'inline-block'});
        $('#J_tipVcode').removeClass('warn').html(checkLogin.msg['163']);
        submitBtnAvailability('enable');
        return false;
    }

    if(usernameIsOk && passwordIsOk && rePasswordIsOk && vcodeIsOk){
        $('#hdn_username').val(usernameTrim);
        $('#hdn_password').val(passwordTrim);
        $("#register_form").attr("onsubmit","return true;");
        $('#btn_confirm').click();
        //防止重复提交
        submitBtnAvailability('enable');
        return true;
    }
    //防止重复提交
    submitBtnAvailability('enable');
    return false;
}
//防止重复提交注册
function submitBtnAvailability( type ){
	if( type == 'disable' ) {
		$('#J_submitRegisterUnclick').show();
		$('#J_submitRegister').hide();
	} else {
		$('#J_submitRegisterUnclick').hide();
		$('#J_submitRegister').show();
	}
}

//后台验证各种错误并返回提示信息，用于错误兼容
function show_error(err_code) {
    switch (err_code) {
        case 0:
            break;
        case 1: //验证码错误
            break;
        case 2: //该邮箱已被注册
        	$('#txt_username').addClass('wrong');
        	$('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
        	$('#J_tipUsername').removeClass('warn').html(checkLogin.msg['104'].replace('{#Email#}', $('#txt_username').val()));
        	break;
        case 3: //邮箱/手机格式不正确
        	$('#txt_username').addClass('wrong');
        	$('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
        	$('#J_tipUsername').removeClass('warn').html(checkLogin.msg['103']);
            break;
        case 4: //电话验证码面板 图形验证码错误
            break;
        case 5: // 邮箱/手机格式不正确
        	$('#J_MobileCode').val('');
        	if($('#J_mobileV').is(':visible')) {
        		$('#txt_mobile').addClass('wrong');
            	$('#spn_mobile_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            	$('#J_tipMobile').removeClass('warn').html(checkLogin.msg['133']);
        	}else{
        		$('#txt_username').addClass('wrong');
            	$('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            	$('#J_tipUsername').removeClass('warn').html(checkLogin.msg['103']);
        	}
            break;
        case 6: //验证码错误
        	$('#J_MobileCode').addClass('wrong').val('');
        	$('#spn_mobileCode_ok').removeClass('icon_yes').addClass('icon_wrong').show();
        	$('#J_tipMobileCode').removeClass('warn').html(checkLogin.msg['148']);
            break;
        case 7://此手机号已注册
        	$('#J_MobileCode').val('');
        	if($('#J_mobileV').is(':visible')) {
        		$('#txt_mobile').addClass('wrong');
            	$('#spn_mobile_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            	$('#J_tipMobile').removeClass('warn').html(checkLogin.msg['105'].replace('{#Email#}', $('#txt_username').val()));
        	}else{
        		$('#txt_username').addClass('wrong');
            	$('#spn_username_ok').removeClass('icon_yes').addClass('icon_wrong').show();
            	$('#J_tipUsername').removeClass('warn').html(checkLogin.msg['105'].replace('{#Email#}', $('#txt_username').val()));
        	}
            break;
        case 8: //网络繁忙，请稍后重试
        	$('#J_MobileCode').removeClass('wrong').val('');
        	$('#spn_mobileCode_ok').hide();
        	$('#J_tipAgreement').removeClass('warn').html(checkLogin.msg['145']);
            break;
        case 9: //密码长度6-20个字符,请重新输入
        	$('#txt_password').addClass('wrong');
        	$('#spn_password_ok').removeClass('icon_yes').addClass('icon_wrong').show();
        	$('#J_tipPassword').removeClass('warn').html(checkLogin.msg['113']).show();
            break;
        default:
            break;
    }
}

$(function() {
	show_error($('#J_errorCode').val());
	if ($('#txt_username') != '') {
        if(!$('#txt_username').hasClass('wrong')) {
            $('#txt_username').focus();
//            $('#J_tipUsername').html(checkLogin.msg['101']);
        }
    }

	//设置鼠标焦点在输入框内时提示信息
    $('#txt_username').bind("focus",function(){
    	checkLogin.userName.checkUsernameFocus();
    });

    //账号输入框失去焦点时，触发账号合法性验证
    $("#txt_username").blur(function(){
        checkLogin.userName.checkUsername();
    });

    //密码输入框
    $('#txt_password').bind("focus",function(){
        checkLogin.password.checkPasswordFocus();
    });
    $("#txt_password").keyup(function(){
        checkLogin.password.checkPasswordInput();
    });
    $("#txt_password").blur(function(){
        checkLogin.password.checkPassword();
    });
    $("#txt_password").keypress(function(e) {
        checkLogin.password.checkCapslockOpen(e);
    });

    //确认密码输入框
    $('#txt_repassword').bind("focus",function(){
        checkLogin.rePassword.checkRePasswordFocus();
    });
    $("#txt_repassword").blur(function(){
        checkLogin.rePassword.checkRePassword();
    });

    //图形验证码
    $('#txt_vcode').bind("focus",function(e){
    	checkLogin.vcode.checkVcodeFocus(e);
    });
    $('#txt_vcode').blur(function(e){
    	checkLogin.vcode.checkVcode(e);
    });

    //提交注册
    $('#J_submitRegister').bind("click",function(){
    	//防止重复提交
    	submitBtnAvailability('disable');
//    	setTimeout(function(){
    		check_register();
//        }, 300);

    });
});