@extends('Admin.Layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   	<div class="mws-panel-header"> 
    	<span>
    		<font style="vertical-align: inherit;">
    			<font style="vertical-align: inherit;">推荐阅读添加</font>
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
		<form class="mws-form" action="/admin/recommendations/{{$data2->id}}" method="post" enctype="multipart/form-data">
		     	{{ csrf_field() }} 
		     	{{ method_field('PUT') }} 
		    <div class="mws-form-inline"> 
		    	<div class="mws-form-row"> 
		       		<label class="mws-form-label">帖子列表</label> 
		       		<div class="mws-form-item"> 
		        		<select name="tid">
		        			<option value="" disabled selected hidden>------------------请选择帖子------------------</option>
		        			@foreach($data as $k=>$v)
		        			<option value="{{ $v->id }}" @if($data2->tid == $v->id) selected @endif >{{$v->ttitle}}</option>
		        			@endforeach
		        		</select>
		       		</div> 
		      	</div> 
		      	<div class="mws-form-row">
                	<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">上传封面图片</font></font></label>
                	<div class="mws-form-item">
                    	<div class="fileinput-holder" style="width:500px; padding-right: 84px;position: relative;">
                    		<input type="file" name="face" class="fileinput-preview small"  readonly="readonly" placeholder="No file selected...">
                    		
                    	</div>
                        <!-- <label for="picture" class="error" generated="true" style="display:none"></label> -->
                    </div>
                </div>
		      	
		    <div class="mws-button-row text-center"> 
			    <font style="vertical-align: inherit;"> <font style="vertical-align: inherit;"> <input type="submit" value="修改" class="btn btn-success" /> </font> </font><a href="/admin/recommendations"class="btn btn-info">返回</a>
		   </div>  
		</form>
  	</div> 
</div>	   	
</div>
@endsection                	

