//确认两次密码一致性
var confirmPassword = function(obj){
	var $this = $(obj);
	var pass = $this.parent().parent().prev().children().find("input").val();
	var value = $this.val();
	var showInfo = $this.parent().next().children();
	if(value == ''){
		showInfo.eq(0)
		.removeClass("Validform_right")
		.addClass("Validform_wrong")
		.text("确认密码不能为空");
		return false;
	}
	if(pass != value) {
		showInfo.eq(0)
		.removeClass("Validform_right")
		.addClass("Validform_wrong")
		.text("两次密码不一致");
		return false;
	}
	showInfo.eq(0)
	.removeClass("Validform_wrong")
	.addClass("Validform_right")
	.text("");
}
//检验密码强度
var CheckPassword = function(obj,minLength,maxLength){
	var $this = $(obj);
	var value = $.trim($this.val());
	var valLength = value.length;
	var confimPass = $this.parent().parent().next().children().find("input");
	var confirmVal = confimPass.val();
	var showInfo = $this.parent().next().children();
	if(value == ''){
		showInfo.find("div").hide();
		showInfo.eq(0)
		.addClass("Validform_wrong")
		.text("不能为空")
		.show();
		return false;
	}
	if(valLength < minLength || valLength > maxLength){
		showInfo.find("div").hide();
		showInfo.eq(0)
		.addClass("Validform_wrong")
		.text("长度为"+minLength+"-"+maxLength+"的字符组合")
		.show();
		return false;
	}else{
		showInfo.eq(0)
		.removeClass("Validform_wrong")
		.text("")
		.hide();
		$.fn.passwordStrength($this);
		if(confirmVal!=''){
			confirmPassword(confimPass[0]);
		}
	}
}

$.fn.passwordStrength = function($this,settings) {
	settings = $.extend({}, $.fn.passwordStrength.defaults, settings);
		
		var scores = 0,
		pstrength = $this.parents("form").find(".passwordStrength");
		pstrength.find(".pwstr").hide();
		showmsg($this,scores,pstrength,settings);
}

function showmsg($this,scores,pstrength,settings){
	scores = $.fn.passwordStrength.ratepasswd($.trim($this.val()),
			settings);
	if (scores < 35 && scores >= 0) {
		pstrength.find(".pwstr:first").show()
				.siblings(".pwstr").hide();
	} else if (scores < 60 && scores >= 35) {
		pstrength.find(".pwstr").eq(1).show()
				.siblings(".pwstr").hide();
	} else if (scores >= 60) {
		pstrength.find(".pwstr").eq(2).show()
				.siblings(".pwstr").hide();
	}
}
$.fn.passwordStrength.ratepasswd = function(passwd, config) {
	// 判断密码强度
	var len = passwd.length, scores;
	if (len >= config.minLen && len <= config.maxLen) {
		scores = $.fn.passwordStrength.checkStrong(passwd);
	} else {
		scores = -1;
	}

	return scores / 4 * 100;

}

// 密码强度;
$.fn.passwordStrength.checkStrong = function(content) {
	var modes = 0, len = content.length;
	for (var i = 0; i < len; i++) {
		modes |= $.fn.passwordStrength.charMode(content.charCodeAt(i));
	}
	return $.fn.passwordStrength.bitTotal(modes);
}

// 字符类型;
$.fn.passwordStrength.charMode = function(content) {
	if (content >= 48 && content <= 57) { // 0-9
		return 1;
	} else if (content >= 65 && content <= 90) { // A-Z
		return 2;
	} else if (content >= 97 && content <= 122) { // a-z
		return 4;
	} else { // 其它
		return 8;
	}
}

// 计算出当前密码当中一共有多少种模式;
$.fn.passwordStrength.bitTotal = function(num) {
	var modes = 0;
	for (var i = 0; i < 4; i++) {
		if (num & 1) {
			modes++;
		}
		num >>>= 1;
	}
	return modes;
}

$.fn.passwordStrength.defaults = {
	minLen : 0,
	maxLen : 30,
	trigger : $.noop
}
