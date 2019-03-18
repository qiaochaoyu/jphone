
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/page.css" media="screen">


 <link rel="stylesheet" type="text/css" href="/admin/assets/css/basic.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap-fileupload.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/bootstrap-social.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/custom.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/error.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/font-awesome.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/invoice.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/prettyPhoto.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/pricing.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/wizard/jquery.steps.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/wizard/normalize.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/assets/css/wizard/wizardMain.css" media="screen"> 
<title>JFLT 机枫论坛后台管理系统 </title>

</head>

<body>

    
    <!-- Themer End -->

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/admin/images/mws-logo.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/upload/{{ session('face') }}" alt="">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        你好，{{ session('nickname') }}  
                    </div>
                    <ul>
                        @if(session('id'))
                        <li><a href="/admin/users/{{ session('id') }}/edit">修改头像</a></li>
                        @else 
                        <li><a href="/admin/login">修改头像</a></li>
                        @endif
                        @if(session('id'))
                        <li><a href="/admin/users/changeupass/{{ session('id') }}">更改密码</a></li>
                        @else 
                        <li><a href="/admin/login">更改密码</a></li>
                        @endif
                        <li><a href="javascript:;" onclick="out()">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active1">
                        <a href="#"><i class="icon-users"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">添加用户</a></li>
                            <li><a href="/admin/users/recycle">回收站</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active2">
                        <a href="#"><i class="icon-pie-chart-2"></i>板块管理</a>
                        <ul>
                            <li><a href="/admin/cates">板块列表</a></li>
                            <li><a href="/admin/cates/create">添加板块</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active3">
                        <a href="#"><i class="icon-file-openoffice"></i>帖子管理</a>
                        <ul>
                            <li><a href="/admin/topics">帖子列表</a></li>
                            <li><a href="/admin/topics/delist">回收站</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active4">
                        <a href="#"><i class="icon-picture"></i>轮播图管理</a>
                        <ul>
                            <li><a href="/admin/slides">轮播图列表</a></li>
                            <li><a href="/admin/slides/create">添加轮播图</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active5">
                        <a href="#"><i class="icon-sign-post"></i>友情链接管理</a>
                        <ul>
                            <li><a href="/admin/friendlinks">友情链接列表</a></li>
                            <li><a href="/admin/friendlinks/create">添加友情链接</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active6">
                        <a href="#"><i class="icon-calendar"></i>公告管理</a>
                        <ul>
                            <li><a href="/admin/announcements">公告列表</a></li>
                            <li><a href="/admin/announcements/create">添加公告</a></li>
                        </ul>
                    </li>
                </ul> 
                <ul>
                    <li class="active7">
                        <a href="#"><i class="icon-leaf"></i>推荐位管理</a>
                        <ul>
                            <li><a href="/admin/recommendations">推荐阅读列表</a></li>
                            <li><a href="/admin/recommendations/create">推荐阅读添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li class="active8">
                        <a href="#"><i class="icon-certificate"></i>网站配置管理</a>
                        <ul>
                            <li><a href="/admin/webset">配置列表</a></li>
                            <li><a href="/admin/webset/create">配置添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
    
            <!-- Inner Container Start -->
            <div class="container" style="margin-left: 200px;">
                <!-- 显示成功信息  -->
                @if (session('success'))
                    <div class="mws-form-message success">
                        {{ session('success') }}
                    </div>
                @endif
                 <!-- 显示失败信息  -->
                @if (session('error'))
                    <div class="mws-form-message error">
                        {{ session('error') }}
                    </div>
                @endif

            <!--后台首页 start-->
    <div class="row">

</div>

<div class="row">

    <!-- /.REVIEWS &  SLIDESHOW  -->
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">系统基本信息
            </font></font></div>

            <div class="panel-body" style="width: 730px;height: 430px;">
                <div class="list-group">

                    <a href="#" class="list-group-item">
                        <i class="icon-windows"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作系统
                     </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WINDOWS</font></font></em>
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="icon-chrome"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">运行环境
                     </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apache/3.2.2(Win64)PHP/7.1.12</font></font></em>
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="icon-tint"></i><font style="vertical-align: inherit;"><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;">apache3handler</font></em></span><font style="vertical-align: inherit;">PHP运行方式
                    </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"></font></em>
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="icon-gauge"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">北京时间
                     </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ date('Y-m-d H:i:s',time()) }}</font></font></em>
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="icon-creative-commons"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">服务器域名/IP
                    </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">jphone.com[127.0.0.1]</font></font></em>
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="icon-home-3"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Host
                     </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">127.0.0.1</font></font></em>
                    </span>
                    </a>

                    <a href="#" class="list-group-item">
                        <i class="icon-users"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">项目小组
                    </font></font><span class="pull-right text-muted small"><em><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">乔-孟-王</font></font></em>
                    </span>
                    </a>
                    
                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-info btn-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">机枫论坛欢迎你!</font></font></a>
            </div>

    <!--/.Chat Panel End-->
</div>

            <!--后台首页结束 -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admin/assets/js/bootstrap.js"></script>
    <script src="/admin/assets/js/bootstrap-fileupload.js"></script>
    <script src="/admin/assets/js/custom.js"></script>
    <script src="/admin/assets/js/galleryCustom.js"></script>
    <script src="/admin/assets/js/jquery.metisMenu.js"></script>
    <script src="/admin/assets/js/jquery.mixitup.min.js"></script>
    <script src="/admin/assets/js/jquery.prettyPhoto.js"></script>
    <script src="/admin/assets/js/jquery-1.10.2.js"></script>
    <script src="/admin/assets/js/wizard/jquery.cookie-1.3.1.js"></script>
    <script src="/admin/assets/js/wizard/jquery.steps.js"></script>
    <script src="/admin/assets/js/wizard/modernizr-2.6.2.min.js"></script>

</body>
</html>
<script type="text/javascript">
    function out()
    {
            if(confirm("你确定要退出登录吗？")){
                
                window.location.href = "/admin/login/logout";
            }
    }
</script>