
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="/admin/login2/css/bootstrap.min.css" rel="stylesheet">
	<link href="/admin/login2/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="/admin/login2/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="/admin/login2/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/admin/login2/css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="/admin/login2/css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="/admin/login2/img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(/admin/login2/img/bg-login.jpg) !important; }
		</style>	
		
</head>

<body>
    <!-- 显示成功信息  -->
                
                
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>登录到您的账户</h2>
					<form class="form-horizontal" action="/admin/login/dologin" method="post">
						<fieldset>
							{{ csrf_field() }}
							<div class="input-prepend" title="用户名">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="uname" id="username" type="text" placeholder="请输入您的用户名"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="密码">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="upass" id="password" type="password" placeholder="请输入您的密码"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="验证码">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class=""  name="captcha" id="captcha" type="text" placeholder="请输入验证码"/>
								<img style="vertical-align: top;width:90px;height: 30px;margin-left:20px;"  src="{{captcha_src()}}"  onclick="this.src='{{captcha_src()}}'+Math.random()">
                                
							</div>
                            @if($errors->has('captcha'))
                                <div class="col-md-12 text-left" style="margin-left: 60px;">
                                    <span class="text-danger" ><strong>{{$errors->first('captcha')}}</strong></span>
                                </div>
                            @endif 
							<div class="clearfix"></div>
	
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />记住密码</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">登录</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					
				</div><!--/span-->
			</div><!--/row-->
		

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="#">Admin templates</a></li>
					<li><a href="http://themescloud.org">Bootstrap themes</a></li>
				</ul>
			</div>
		</div>
	<!-- start: JavaScript-->

		<script src="/admin/login2/js/jquery-1.9.1.min.js"></script>
		<script src="/admin/login2/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="/admin/login2/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="/admin/login2/js/jquery.ui.touch-punch.js"></script>
	
		<script src="/admin/login2/js/modernizr.js"></script>
	
		<script src="/admin/login2/js/bootstrap.min.js"></script>
	
		<script src="/admin/login2/js/jquery.cookie.js"></script>
	
		<script src='/admin/login2/js/fullcalendar.min.js'></script>
	
		<script src='/admin/login2/js/jquery.dataTables.min.js'></script>

		<script src="/admin/login2/js/excanvas.js"></script>
	<script src="/admin/login2/js/jquery.flot.js"></script>
	<script src="/admin/login2/js/jquery.flot.pie.js"></script>
	<script src="/admin/login2/js/jquery.flot.stack.js"></script>
	<script src="/admin/login2/js/jquery.flot.resize.min.js"></script>
	
		<script src="/admin/login2/js/jquery.chosen.min.js"></script>
	
		<script src="/admin/login2/js/jquery.uniform.min.js"></script>
		
		<script src="/admin/login2/js/jquery.cleditor.min.js"></script>
	
		<script src="/admin/login2/js/jquery.noty.js"></script>
	
		<script src="/admin/login2/js/jquery.elfinder.min.js"></script>
	
		<script src="/admin/login2/js/jquery.raty.min.js"></script>
	
		<script src="/admin/login2/js/jquery.iphone.toggle.js"></script>
	
		<script src="/admin/login2/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="/admin/login2/js/jquery.gritter.min.js"></script>
	
		<script src="/admin/login2/js/jquery.imagesloaded.js"></script>
	
		<script src="/admin/login2/js/jquery.masonry.min.js"></script>
	
		<script src="/admin/login2/js/jquery.knob.modified.js"></script>
	
		<script src="/admin/login2/js/jquery.sparkline.min.js"></script>
	
		<script src="/admin/login2/js/counter.js"></script>
	
		<script src="/admin/login2/js/retina.js"></script>

		<script src="/admin/login2/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
@if(session('error')) 
     <input type="hidden" name="" id="error" value="{{session('error')}}">
     <script type="text/javascript">
            alert($('#error').val());
     </script>
@endif

@if(session('success')) 
     <input type="hidden" name="" id="success" value="{{session('success')}}">
     <script type="text/javascript">
            alert($('#success').val());
     </script>
@endif