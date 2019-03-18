//结合jQuery框架使用
/* 输入框空值和长度校验
 * param: obj 当前对象
 */
function CheckInput(obj, minLength, maxLength) {
	var $obj = $(obj);
	var value = $.trim($obj.val());
	var valLength = value.length;
	// 考虑注册时姓名可以为空，验证码不能为空
	if (maxLength != '') {
		if (value == '') {
			$obj.parent().next().children().eq(0)
					.removeClass("Validform_right").addClass("Validform_wrong")
					.text("不能为空");
			return false;
		}
	}
	if (minLength != '' && maxLength != '') {
		if (valLength < minLength || valLength > maxLength) {
			$obj.parent().next().children().eq(0)
					.removeClass("Validform_right").addClass("Validform_wrong")
					.text("长度为" + minLength + "-" + maxLength + "的字符组合");
			return false;
		}
	}
	$obj.parent().next().children().eq(0).text("").removeClass(
			"Validform_wrong").addClass("Validform_right");
}




// 校验邮箱格式,editFlag表示是修改邮箱还是修改密码    1=修改邮箱
//emailFlag表示是否是新邮箱
function checkEmail(obj,editFlag,emailFlag) {
	var reg = new RegExp(
			"^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
	var $this = $(obj);
	var value = $.trim($this.val());
	var errorInfoShow = $this.parent().next().children().eq(0);
	if (value == '') {
		errorInfoShow.removeClass("Validform_right")
				.addClass("Validform_wrong").text("不能为空");
		return false;
	}
	if (!reg.test(value)) {
		errorInfoShow.removeClass("Validform_right")
				.addClass("Validform_wrong").text("邮箱格式不正确");
		return false;
	}
	//后台验证
	$.post("/isthisEmail",
			{"email":value,"editFlag":editFlag,"emailFlag":emailFlag},
			function(data){
				var code = data.code;
				var msg = data.message;
				switch(code){
				case '5'://邮箱格式错误
				case '6'://邮箱已被注册
				case '32':errorInfoShow.removeClass("Validform_right").addClass("Validform_wrong")
				.text(msg);break;//用户邮箱有误
				case '0':errorInfoShow.text("").removeClass("Validform_wrong").addClass("Validform_right"); break;//成功
				default:alert(msg);
				}
			},'json');
}
//四种情况 1.使用手机号修改密码,需要保证用户存在此时（editFlag!=1,cellphoneFlag!=1）
//2.检验当前用户输入手机号是否正确，此时（editFlag=1,cellphoneFlag=0）
//3.用户更换手机号，需要保证更换的手机号没有用户使用，此时（editFlag!=1,cellphoneFlag=1）
//4.注册时适用3
//检验手机号,editFlag表示是修改手机号还是修改密码   1=修改手机号
//cellphoneFlag表示是否是新手机号 1=新手机号
function checkPhone(obj,editFlag,cellphoneFlag){
	var errorInfoShow = $(obj).parent().next().children().eq(0);
	var $this = $(obj);
	var value = $this.val();
	if($.trim(value)==''){
		errorInfoShow
		.removeClass("Validform_right").addClass("Validform_wrong")
		.text("不能为空");
		return false;
	}
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
	if(!myreg.test(value)) 
	{
		errorInfoShow
		.removeClass("Validform_right").addClass("Validform_wrong")
		.text("手机号格式错误");
		return false;
	}
	errorInfoShow.addClass("Validform_right").removeClass("Validform_wrong").text("");
	
	


	//后台验证
		// $.get("/home/findPwd",
		// 		{"cellphone":value,"editFlag":editFlag,"cellphoneFlag":cellphoneFlag},
		// 		function(data){
		// 			var code = data.code;
		// 			var msg = data.message;
		// 			switch(code){
		// 			case '16'://手机号格式错误
		// 			case '30'://手机号已被注册
		// 			case '31':errorInfoShow.removeClass("Validform_right").addClass("Validform_wrong")
		// 			.text(msg);break;//用户手机有误
		// 			case '0':errorInfoShow.text("").removeClass("Validform_wrong").addClass("Validform_right"); break;//成功
		// 			default:alert(msg);
		// 			}
		// 		},'json');
	}

//自动登陆和我同意协议的checkbox
function checkboxClick(obj){
	var $this = $(obj);
	var autoLoginBox = $this.prev();
	if($this.hasClass("checkInputC")){
		autoLoginBox.val(0);
		$this.removeClass("checkInputC").addClass("checkInput");
	}else if($this.hasClass("checkInput")){
		autoLoginBox.val(1);
		$this.removeClass("checkInput").addClass("checkInputC");
	}
}
	
//提交表单之前的校验
function beforeSubmit(form){
	var post = true;
	form.find(".input-xlarge").each(function(){
		$(this).blur();
		var checkSpan = $(this).parent().next().children().eq(0);
		if(checkSpan.hasClass("Validform_wrong")){
			$(this).focus();
			post = false;
			return post;
		}
	});
	return post;
}

//找回密码操作
function nextStep(){
	var ulStep = $("#findPwd_main").find("ul").eq(0);
	$("#findPwd_main").find("ul").eq(1).hide();
	ulStep.removeClass("findPwStep").addClass("findPwStep2");
	ulStep.find("li").eq(0).removeClass("cur");
	ulStep.find("li").eq(1).addClass("cur");
	$("#prevclear").show();
}
function prevStep(){
	var ulStep = $("#findPwd_main").find("ul").eq(0);
	$(".findPwd_Clear").hide();                //隐藏第二步
	$("#findPwd_main").find("ul").eq(1).show();//显示第一步
	ulStep.removeClass("findPwStep2").addClass("findPwStep");
	ulStep.find("li").eq(1).removeClass("cur");
	ulStep.find("li").eq(0).addClass("cur");
	$("#prevclear").hide();
}
//账户充值和消费明细查看并显示 form为表单id,div为div的id
function query(url,form,div){
	var $form = $("#"+form);
	var $showDiv = $("#"+div);
	$.post(url,$form.serialize(),
			function(data){
		$showDiv.html(data);
		$showDiv.show();
	});	
}
//分页时的跳转
function gotoPage (url,form,div){
	var $input = $("#goto"+form);
	var pageNo = $input.val();
	var $form = $("#"+form);
	var $showDiv = $("#"+div);
	$.post(url+'?pageNo='+pageNo,$form.serialize(),
			function(data){
		$showDiv.html(data);
		$showDiv.show();
	});
}