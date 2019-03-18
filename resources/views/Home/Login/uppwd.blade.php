
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>机锋用户中心 找回密码</title>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/common1.js"></script>
<script type="text/javascript" src="js/passwordstrength.js"></script>
<script type="text/javascript" src="js/location.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/dateformat.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.zh-cn.js"></script>
<link type='text/css' href='css/bootstrap-datetimepicker.min.css' rel='stylesheet'/>
<link type='text/css' href='css/bootstrap.min.css' rel='stylesheet' />
<link type='text/css' href='css/common.css' rel='stylesheet' />
<link type='text/css' href='css/jquery.colorbox.css' rel='stylesheet' />
<link type='text/css' href='css/rest.css' rel='stylesheet' />
<link type='text/css' href='css/ucenter.css' rel='stylesheet' />
<link type='text/css' href='css/validform.css' rel='stylesheet' />


</head>
<body>

	<div class="top_search">
		
		<div class="g_wapper">
			<a href="" title="" class="fl"><img
				alt="" src="picture/logo.png"
				width="237" height="50"></a>
			
		</div>

	</div>
	<!-- 找回密码 -->
	<div class="Uwrap clearfix">
		<div class="g_wapper ucont clearfix">
	<div class="uLoginBox fr">
        <h2 class="logintit">找回密码</h2>
        <!--找回密码-->
        <div class="findPw-cont">
            <span class="boxArrow"></span>
            <div>
                <ul class="findPwStep3 clearfix">
                    <li><em>1</em>选择找回方式</li>
                    <li><em>2</em>验证用户身份</li>
                    <li class="cur"><em>3</em>设置新密码</li>
                </ul>
                <p class="eContp">
                </p>
                <form action="/home/findpwd/save" method="post" class="form-horizontal registerform">
                	{{ csrf_field() }}
                    <fieldset>
                        <div class="control-group rePw">
                            <input type="hidden" name="restPwdToken" value="GXc60nNwrjtnulKvDKdLposFpdK9e0TmNNFrtA8vuvo=">
                            <!-- 密码 input-->
                            <label class="control-label" for="input01">密码</label>
                            <div class="controls">
                                <input id="resetPasswordStrengthID" type="password" class="input-xlarge" name="newPass" maxlength="15"
											placeholder="数字、字母、下划线组合"
											onkeyup="this.value=this.value.replace(/[^\w_]/g,'');">
                            </div>
                            <div>
                                <span id="resetPasswordError" class="Validform_checktip"></span>
                                <div class="passwordStrength">
                                    <div class="pwstr" style="display: none;">
                                        <span></span> <em class="cOrange">弱</em><i class="Validform_right cGray">您的密码还可以更复杂些</i>
                                    </div>
                                    <div class="pwstr" style="display: none;">
                                        <span class="mid"></span> <em class="cGreen">中等</em><i class="Validform_right cGray">复杂度还行，再加强一下？</i>
                                    </div>
                                    <div class="pwstr" style="display: none;">
                                        <span class="last"></span> <em class="cGreen">强</em><i class="Validform_right cGray">密码强度好，请记牢！</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- 确认密码 input-->
                            <label class="control-label" for="input01">确认密码</label>
                            <div class="controls">
                                <input type="password" class="input-xlarge" name="checkPass" maxlength="15"
											onkeyup="this.value=this.value.replace(/[^\w_]/g,'');" 
											onblur="confirmPassword(this)"/>
                            </div>
                            <div>
                                <span id="checkPassError" class="Validform_checktip"></span> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"></label>
                            <!-- 立即注册 -->
                            <div class="controls">
                            	<input type="submit" class="btn btNormal btRegis" id="resetPwdBtn" value="保存" style="width: 300px;">
                                
                            </div>
                        </div>
                    </fieldset>
                </form>
               
                <p class="findPwTip">
                    如以上方法还不能解决问题，请加机锋市场官方QQ群  117653524
                </p>
            </div>
        </div>
        <!--//找回密码-->
    </div>
   	<script type="text/javascript">
  //密码强度校验
	$("#resetPasswordStrengthID").bind("keyup blur",function(){
		CheckPassword(this,6,15);
	});
	//提交修改密码
    $("#resetPwdBtn").click(function(){
    	//校验表单参数
    	var post = beforeSubmit($(this).parents("form"));
    	//校验通过发送请求
    	if(post){
    		$.post("/reset",$(this).parents("form").serialize(),
            		function(data){
            	var code = data.code;
            	var msg = data.message;
            	console.log(data);
            	switch(code){
            	case '9':$("#resetPasswordError").next().hide();
            	$("#resetPasswordError").addClass("Validform_wrong").text(msg).show();break;     //密码长度或格式
            	case '10':$("#checkPassError").removeClass("Validform_right")
    			.addClass("Validform_wrong").text(msg);break;    //确认密码错误
            	case '0':alert(msg);
            	window.location.href = "/login";break;
            	default:alert(msg);
            	} 
    		},'json')
    	}
    });
</script>
</div>
							


						</div>
						<!-- 手机找回 -->
						<div id="findPwd_mobile" class="findPwd_Clear">
							

<form action="/home/findpwd/dofindpwd" method="post" class="form-horizontal registerform">
	{{ csrf_field() }}
	<div class="control-group">
		<!-- 手机号码 input-->
		<label class="control-label">手机号码</label>
		<div class="controls">
			<input type="text" class="input-xlarge search-query cGray"
				name="cellphone" id="findPwdmobile" maxlength="11" onblur="checkPhone(this,'','')">
		</div>
		<div>
			<span id="cellphoneError" class="Validform_checktip"></span>
		</div>
	</div>
	<div class="control-group">
		<!-- 验证码 input-->
		<label class="control-label">验证码</label>
		<div class="controls">
			<input class="span2 input-xlarge input-yzmtxt cGray" type="text"
				name="cellphoneCode" id="cellphoneCode" maxlength="6" onblur="CheckInput(this,'','6')">
			<div class="input-append input-yzm">
				<input type="button" id="findPwdSendMobile" class="btn btYZM" name="" onclick="setPhone(this);" value="免费获取短信验证码">
			</div>
		</div>
		<div>
			<span id="phoneAuthcodeError" class="Validform_checktip"></span>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label"></label>
		<!-- 手机找回密码 -->
		<div class="controls">
			<input type="submit" class="btn btNormal btRegis"
				id="findPwd_byphonebtn" value="确认" name="">
		</div>
	</div>
</form>
<script type="text/javascript">
	    // 设置按钮时间
    function editCon()
    {
        var t = 60;
        var time = null;
        if (time == null) {
            time = setInterval(function(){
                t--;
                // 修改当前button 内容
                $('#findPwdSendMobile').val('重新发送('+t+'s)');
                if(t < 1){
                    // 清除定时器
                    clearInterval(time);
                    $('#findPwdSendMobile').val('免费获取短信验证码');
                    $('#findPwdSendMobile').attr('disabled',false);
                }
            },1000);
        }
    }
    function setPhone(obj)
    {
        // 接收手机号码
        var phone = $('#findPwdmobile').val();
        // 定义正则检查手机号格式是否正确
        var phone_grep = /^1{1}[3456789]{1}[0-9]{9}$/;
        // 使用正则检查手机号
             if(!phone_grep.test(phone)){
                 return false;
             }
        // 将js对象转化为jquery对象
        var object = $(obj);
        // 设置button状态
        object.attr('disabled',true);
        // 获取当前按钮上的文字
        var text = object.val();
        if(text == '免费获取短信验证码'){
            // 发送ajax请求后台  
            $.get('/home/findpwd/info',{'phone':phone},function(data){
                if(data.code == 0){
                    editCon();
                }else{
                    alert(data.msg);
                }
            },'json');
        }else{
            return false;
        }
    }

</script>
						</div>
					<p id="prevclear" class="eContp prev_clear">
                    返回<span class="cOrange" onclick="prevStep()" style="cursor: pointer;">上一步</span>
                </p>
						
					</div>
					</div>
					<!-- 邮件获取成功显示 -->
					<div id="emailSuccess" style="display: none">
						<h2 class="eContit">马上验证邮件完成注册！</h2>
                <p class="eContp">
                    确认邮件已经发送到你的邮箱<em class="cOrange"></em>，点击邮件里的确认连接即可登录机锋网！
                </p>
                <p class="eContp"></p>
                <a class="btn btCheck" href="http://mail.qq.com/" target="_blank">立即查看邮件</a>
                <dl class="eContDl">
                    <dt>还没收到确认邮件？</dt>
                    <dd>• 尝试到邮箱的广告邮件、垃圾邮件目录里找找看；</dd>
                    <dd>
                        • 试试<input type="hidden" name="tokenEmail" id="tokenEmail">
                        <a href="javascript:;" class="cOrange" id="reSend">再次发送确认邮件</a>
                        ；
                    </dd>
                    <dd>
                        • 邮箱地址错了？换个地址
                        <a href="javascript:;" target="_blank" class="cOrange" onclick="registCick()">重新注册</a>
                        。
                    </dd>
                </dl>
					</div>
				</div>
				<!--//找回密码-->
			</div>
<!--发卡页弹出框1 -->
<div id="cardTips1">
  <div class="tipsBoxBg">
  </div>
  <div class="cardTips1 tipsPosition">
    <div class="tipsSubBox">
      <h2 class="tips-tit">提示</h2>
      <div class="tips-cont">
        <p>
          邮件已经发送成功！
        </p>
      </div>
      <a href="javascript:;" class="tips-close" id="tips-close1">×</a>
      <a href="javascript:;" class="tips-ok fr" id="tips-confirm1">确认</a>
    </div>
  </div>
</div>
<!--/发卡页弹出框1 -->
<!--发卡页弹出框2 -->
<div id="cardTips2">
  <div class="tipsBoxBg">
  </div>
  <div class="cardTips1 tipsPosition">
    <div class="tipsSubBox">
      <h2 class="tips-tit">提示</h2>
      <div class="tips-cont">
        <p>
          抱歉，邮件没有成功发送！
        </p>
      </div>
      <a href="javascript:;" class="tips-close" id="tips-close2">×</a>
      <a href="javascript:;" class="tips-ok fr" id="tips-confirm2">确认</a>
    </div>
  </div>
</div>
<!--/发卡页弹出框2 -->
			<script type="text/javascript">
			//跳转到邮箱找回
	    	$("#findPwdByEmail").click(function(){
	    		nextStep();
	    		$("#findPwd_email").show();
	    	});
			//跳转到手机找回
	    	$("#findPwdByMobile").click(function(){
	    		nextStep();
	    		$("#findPwd_mobile").show();
	    	});
			
			$("#findPwdByMobile2").click(function(){
				$("#findPwd_email").hide();
				$("#findPwd_mobile").show();
			});
			$("#findPwdByEmail2").click(function(){
				$("#findPwd_mobile").hide();
				$("#findPwd_email").show();
			});
			//重新发送
			$("#reSend").click(function get(){
                $.ajax({
                   type: "POST",
                   url: "/findPwd/sendfindPwdEmail",
                   data: {
                       "tokenEmail":$("#tokenEmail").val(),
                       "s":$("#hidSign").val()
                   },
                   success:function(data){
                	   console.log(data.code);
                           if(data.code == "0"){
                             $('#cardTips1').css({"marginLeft":-$('#cardTips1').outerWidth()/2,"marginTop":-$('#cardTips1').height()/2}).show();
                           }else if(data.code == "1"){
                             $('#cardTips2').css({"marginLeft":-$('#cardTips2').outerWidth()/2,"marginTop":-$('#cardTips2').height()/2}).show();
                           }
                   },
                   dataType:"json"
                });
        });
        //点击确认和关闭按钮
        $('#tips-close1,#tips-confirm1,#tips-close2,#tips-confirm2').click(function(){
            $("div[id^='cardTips']").hide();
        });
			</script>
		</div>
		<div class="footer g_wapper">
			
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<div class="web_info">
	<!--
        <p>
		<a href="http://www.gfan.com/about.html" target="_blank" title="关于我们">关于我们</a>|
		<a href="http://www.imopan.com/" target="_blank" title="营销服务">营销服务</a>|
		<a href="http://company.zhaopin.com/CC446289121.htm" target="_blank" title="诚聘英才">诚聘英才</a>|
		<a href="http://my.gfan.com/" target="_blank" title="成为会员">成为会员</a>|
		<a href="http://www.gfan.com/agreement.html" target="_blank" title="服务条款">服务条款</a>|
		<a href="http://www.gfan.com/copyright.html" target="_blank" title="权利保护">权利保护</a>
	</p>
	<p>
		<a href="http://www.gfan.com" target="_blank" title="机锋网">机锋网</a>|
		<a href="http://bbs.gfan.com/" target="_blank" title="机锋论坛">机锋论坛</a>|
		<a href="http://apk.gfan.com/" target="_blank" title="机锋市场">机锋市场</a>|
		<a href="http://game.gfan.com/" target="_blank" title="机锋游戏">机锋游戏</a>|
		<a href="http://www.imopan.com/" target="_blank" title="磨盘时代">磨盘时代</a>|
		<a href="http://dev.gfan.com/" target="_blank" title="线下渠道">开发者平台</a>|
		<a href="http://www.uyou.com/" target="_blank" title="U友商城">U友商城</a>
    </p>  -->

	<p>京ICP备15020343号 | 京公网安备11010802020450号 京网文 【2015】 0397-177号 |
		京ICP证150677号 北京机锋科技有限公司</p>
	<p>京网文（2015）0647-277号 | 京ICP证100461号 公司名称：迈奔灵动科技（北京）有限公司</p>
	<p>©2007-2016 机锋网 GFAN.COM | 联系电话：4006-400-401 | 举报电话：010-57495003
		| 公司地址：北京市海淀区上地三街9号C座C304</p>
</div>

		</div>
	</div>
</body>
</html>