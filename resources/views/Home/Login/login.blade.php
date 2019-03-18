
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>机枫用户中心 登录</title>
    <link rel="stylesheet" href="css/reset.css">
    <!--<link rel="stylesheet" href="css/reset_1.css">-->
    <link rel="stylesheet" href="css/public.css">
    <!--<link rel="stylesheet" href="css/public_1.css">-->
    <link rel="stylesheet" href="css/login.css">
    <!--<link rel="stylesheet" href="css/login_1.css">-->

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
                <img src="/upload/{{ $data_array[2]->wlogo }}" alt="" style="width: 150%;height: 150%;">
            </div>
                <div class="title fl" style="margin-left: 20px;">
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
        <div class="mws-form-message success text-danger bg-danger" style="padding-left: 300px;font-size: 20px;">
            {{ session('success') }}
        </div>
    @endif
    <!-- 显示失败信息  -->
    @if (session('error'))
        <div class="mws-form-message error text-danger bg-danger" style="padding-left: 300px;font-size: 20px;">
            {{ session('error') }}
        </div>
    @endif
    <div class="main">
        <div class="cover">
            <div class="main-content clearfix">
                <div class="phone-bg fl">
                    <img src="picture/phone_bg.png" alt="">
                </div>
                <div class="main-right fr">

                    <div id="writeLogin" class="writeLogin ">
                    <div class="writeLogin-header">
                        <div class="qr-container clearfix">
                            <div class="qrText fr none">扫码登录，更快更安全</div>
                            <div id="qrCode" class="qrImg none">
                                <img src="picture/qr.jpg" alt="">
                            </div>
                        </div>
                        <div class="title-container">
                            <ul class="title-cover clearfix">
                                <li id="account" class="loginType fl active">账号登录</li>
                            </ul>
                        </div>
                    </div>
                    <form action="/home/dologin" method="post">
                    {{ csrf_field() }}
                    <ul class="loginTypeMain">
                    <li id="accountMain" class="main-login-number-content">
                        <div class="inputGroup">
                            <input class="inputItem" type="text" placeholder="用户名/手机号" id="accountNum" name="uname" value="{{ old('uname') }}">
                        </div>
                        <div class="inputGroup">
                            <input class="inputItem upwd" type="password" placeholder="密码" id="accountPwd" name="upass">
                        </div>

                        <div class="inputState clearfix">
                            <label for="inputState">
                                <input type="checkbox" id="inputState" value="0">
                                <span>记住密码</span>
                            </label>
                            <a id="findPwd" href="/home/findpwd/index" class="Forgetpassword fr">忘记密码？</a>
                        </div>
                        <div class="hintMsg none" id="accountMain-hintMsg">
                            <span>请填写必要信息</span>
                        </div>
                            <input type="submit" value="登录" class="btn" id="accountLogin" style="padding-top: 0px;">
                        <div class="main-login-footer clearfix">
                            
                            <!-- <a href="#" class="loginMode">
                                <div class="loginModeImg fl">
                                    <img src="picture/qq.png" alt="">
                                </div>
                                <span class="loginModeText fl">QQ</span>
                            </a> -->
                            <a id="regist" href="/home/register" class="register fr" style="padding-top: 0px;margin-top: 0px;top: 0px;">
                                <div class="registerImg fl">
                                    <img src="picture/direction.png" alt="">
                                </div>
                                <span class="registerText fl">立即注册</span>
                            </a>
                        </div>
                    </li>
                    </ul>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="footer">
    <p>©2007-2018 {{ $data_array[2]->wname }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $data_array[2]->wfiling }}</p>
    <p>{{ $data_array[2]->wcright }}</p>
</div>
    <script src="js/jquery-1.7.2.min.js"></script>
    <!-- <script src="js/jquery-1.11.1.min.js"></script> -->
    <script src="js/login.js"></script>
    <!--<script src="js/login.js"></script>-->
</body>
</html>