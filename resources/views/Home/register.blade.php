
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>机枫用户中心 注册</title>
    <link rel="stylesheet" href="css/reset.css">
    <!--<link rel="stylesheet" href="css/reset_1.css">-->
    <link rel="stylesheet" href="css/public.css">
    <!--<link rel="stylesheet" href="css/public_1.css">-->
    <link rel="stylesheet" href="css/register.css">
    <!--<link rel="stylesheet" href="css/register_1.css">-->

    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="header">
    <div class="container">
        <div class="content clearfix">
            <div class="logo fl">
                <img src="/upload/{{ $data_array[2]->wlogo }}" style="width: 150%;height: 150%;" alt="">
            </div>
            <div class="title fl" style="margin-left: 30px;">
                科技新闻，尽在机枫！
            </div>
        </div>
    </div>
</div>
    <!-- 显示错误信息 -->
    @if (count($errors) > 0)
        <div class="mws-form-message error text-danger bg-danger" style="color:red;">
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li style="margin-left: 300px;font-size: 20px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 显示成功信息  -->
    @if (session('success'))
        <div class="mws-form-message success" style="padding-left: 300px;font-size: 20px;">
            {{ session('success') }}
        </div>
    @endif
    <!-- 显示失败信息  -->
    @if (session('error'))
        <div class="mws-form-message error text-danger bg-danger" style="padding-left: 300px;font-size: 20px;">
            {{ session('error') }}
        </div>
    @endif
<form action="/home/register" method="post">
    {{ csrf_field() }}
<div class="main">
    <div class="cover">
        <div class="main-content clearfix">
            <div class="phone-bg fl">
                <img src="picture/phone_bg.png" alt="">
            </div>
            
            <div class="main-right fr">
                <div class="register">
                    <div class="register-title">手机号注册</div>
                    <div class="register-main">
                        <div class="inputGroup">
                            <input class="inputItem" name="phone" type="text" placeholder="请输入手机号" id="registerNum" onchange="checkphone();" value="{{ old('phone') }}">
                        </div>
                        <div class="inputGroup">
                            <input class="inputItem upwd" name="upass" type="password" placeholder="请设置6-15位密码" id="registerPwd"
                            maxlength="15" onchange="checkpwd();" value="">
                        </div>
                        <div class="inputGroup">
                            <input class="inputItem reupwd" name="reupass" type="password" placeholder="请确认密码" id="registerrePwd" onchange="checkrepwd();">
                            
                        </div>
                        <div class="inputGroup smsCode clearfix">
                            <input class="inputItem CodeInput" type="code" name="yzcode" placeholder="短信验证码" id="registerSmsCode">
                            <input type="button" id="obtainValidation" class="obtainValidation fr " name="" onclick="setPhone(this);" value="免费获取短信验证码">
                            
                        </div>
                        <div id="register-hintMsg" class="hintMsg none">
                            <span>请填写必要信息</span>
                        </div>
                        
                        <button class="btn freeRegister" id="registerBtn" type="submit" value="true" tabindex="1" onclick="dianji();" style="padding-top: 0px;">立即注册</button>
                        <div class="returnLogin fr">已有账号？<a id="forwardLogin" href="/home/login">立即登录</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="footer">
    <p>©2007-2018 {{ $data_array[2]->wname }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $data_array[2]->wfiling }}</p>
    <p>{{ $data_array[2]->wcright }}</p>
</div>
<script src="js/jquery-1.7.2.min.js"></script>
<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
<!-- <script src="js/register.js"></script> -->
</body>
</html>
<script type="text/javascript">
    // 验证手机号
    function checkphone()
    {
        var reg = /^1[34578]\d{9}$/;
        if (!reg.test($("#registerNum").val())){
            $('#registerNum').css('color','red');
            $('#registerNum').css('border','1px solid red');
            alert("请输入正确的手机号！");
            $("#registerNum").focus();
        }else{
            $('#registerNum').css('color','green');
            $('#registerNum').css('border','');
        }

    }

    // 验证密码
    function checkpwd(){
        // 定义正则表达式
        var reg1 = /^[a-zA-Z0-9]{6,15}$/;
        if(!reg1.test($("#registerPwd").val())){
            $('#registerPwd').css('color','red');
            $('#registerPwd').css('border','1px solid red');
            alert("密码格式不正确！");
            $("#registerPwd").focus();
        }else{
            $('#registerPwd').css('color','green');
            $('#registerPwd').css('border','');
        };
    }

    // 验证确认密码
    function checkrepwd(){
        var $pwd = $("#registerPwd").val();
        var $repwd = $("#registerrePwd").val();
        if($pwd != $repwd){
            $('#registerrePwd').css('color','red');
            $('#registerrePwd').css('border','1px solid red');
            alert("两次密码不一致！");
        }else{
            $('#registerrePwd').css('color','green');
            $('#registerrePwd').css('border','');
        }
     }


</script>
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
                $('#obtainValidation').val('重新发送('+t+'s)');
                if(t < 1){
                    // 清除定时器
                    clearInterval(time);
                    $('#obtainValidation').val('免费获取短信验证码');
                    $('#obtainValidation').attr('disabled',false);
                }
            },1000);
        }
    }
    function setPhone(obj)
    {
        // 接收手机号码
        var phone = $('#registerNum').val();
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
        // editCon();
            // 发送ajax请求后台  
            $.get('/home/register/info',{'phone':phone},function(data){
                if(data.code == 0){
                    editCon();
                }else{
                    data.msg();
                }
            },'json');
        }else{
            return false;
        }
    }
        

    

</script>