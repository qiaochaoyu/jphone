@extends('Admin.Layout.index')

@section('content')
<div class="mws-panel grid_8"> 
   	<div class="mws-panel-header"> 
    	<span>
    		<font style="vertical-align: inherit;">
    			<font style="vertical-align: inherit;">公告修改</font>
    		</font>
    	</span> 
   	</div> 
	   <div class="mws-panel-body no-padding"> 
		    <!-- 显示错误信息 --> 
			    @if (count($errors) > 0)
				    <div class="mws-form-message error">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

			<form class="mws-form" action="/admin/announcements/{{ $data->id }}" method="post" enctype="multipart/form-data">
					{{ method_field('PUT') }}
			      	{{ csrf_field() }} 
			    <div class="mws-form-inline"> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">公告标题</label> 
			       		<div class="mws-form-item"> 
			        		<input type="text" name="title" class="small" value="{{ $data->title }}" /> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">作者</label> 
			       		<div class="mws-form-item"> 
			       	 		<input type="text" name="author" class="small" value="{{ $data->author }}" /> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">内容</label> 
			       		<div class="mws-form-item" style="width: 60%;height: auto;"> 
			        		<!-- 加载编辑器的容器 -->
						    <script id="container" name="content" value="" type="text/plain">
								{!! $data->content !!}
						    </script>
			       		</div> 
			      	</div> 
			    <div class="mws-button-row text-center"> 
				    <font style="vertical-align: inherit;"> <font style="vertical-align: inherit;"> <input type="submit" value="修改" class="btn btn-success" /> </font> </font> 
				    <input type="reset" value="重置" class="btn btn-info " /> 
			   </div>  
			</form>
	  	</div> 
</div>	   	
</div>


<!-- 百度编辑器 配置文件 -->
    <script type="text/javascript" src="/admin/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/admin/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endsection