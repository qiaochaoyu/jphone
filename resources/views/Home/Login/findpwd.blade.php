
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>机枫论坛 找回密码</title>

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
				alt="" src="/upload/public/logo.png"
				width="220" height="75"></a>
			
		</div>

	</div>

	<!-- 找回密码 -->
	<div class="Uwrap clearfix">
		<div class="g_wapper ucont clearfix">
			<div class="uLoginBox fr">
				<h2 class="logintit">找回密码</h2>
				<!--找回密码-->
			   <!-- 显示错误信息 -->
			    @if (count($errors) > 0)
			        <div class="mws-form-message error text-danger bg-danger" style="color:red;">
			            <ul style="color: red">
			                @foreach ($errors->all() as $error)
			                    <li style="margin-left: 100px;font-size: 20px;margin-left: 50px;margin-bottom: 10px;color: red;">{{ $error }}</li>
			                @endforeach
			            </ul>
			        </div>
			    @endif 
			    <!-- 显示成功信息  -->
			    @if (session('success'))
			        <div class="mws-form-message success text-danger bg-danger" style="padding-left: 0px;font-size: 20px;color: green;">
			            {{ session('success') }}
			        </div>
			    @endif
			    <!-- 显示失败信息  -->
			    @if (session('error'))
			        <div class="mws-form-message error text-danger bg-danger" style="padding-left: 0px;font-size: 20px;color: red;">
			            {{ session('error') }}
			        </div>
			    @endif
				<div class="findPw-cont" style="margin-top: 10px;">
					<div id="findPwd_main">
						<ul class="findPwStep clearfix">
							<li class="cur"><em>1</em>选择找回方式</li>
							<li><em>2</em>验证用户身份</li>
							<li><em>3</em>设置新密码</li>
						</ul>
						<!-- 邮箱或者手机找回确认成功后  #findPwSus移除  -->
						<div id="findPwSus">
						<ul id="findPwd_Mode" class="findPwMode clearfix">
							<li><a id="findPwdByMobile" href="javascript:;">手机找回</a> <span class="modetxt">登录使用手机号码</span></li>
						</ul>
						<!-- 邮箱找回  -->
						<div id="findPwd_email" class="findPwd_Clear">
							

</script>

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
				<input type="button" id="findPwdSendMobile" class="btn btYZM" name="" onclick="setPhone(this);" value="免费获取短信验证码" style="
    padding-top: 0px;
">
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
				id="findPwd_byphonebtn" value="确认" name="" style="width: 300px;">
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
					
				</div>
				<!--//找回密码-->
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
		京ICP证150677号 北京机枫科技有限公司</p>
	<p>京网文（2015）0647-277号 | 京ICP证100461号 公司名称：北京机枫科技有限公司</p>
	<p>©2007-2016 机枫网 GFAN.COM </p>
</div>

		</div>
	</div>
</body>
</html>