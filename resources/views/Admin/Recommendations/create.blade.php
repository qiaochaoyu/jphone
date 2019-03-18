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
		<form action="/admin/recommendations/create" method="get" style="margin-left:800px">
        	<div class="dataTables_filter" id="DataTables_Table_1_filter" >
        		<label>关键字: <input name="keyword" type="text" aria-controls="DataTables_Table_1" value="{{ $keyword or '' }}"></label>
        						<input type="submit" value="查询" class="btn btn-info">
        	</div>
        </form>
		<form class="mws-form" action="/admin/recommendations" method="post" enctype="multipart/form-data">
		     	{{ csrf_field() }} 
		    <div class="mws-form-inline"> 
		    	<div class="mws-form-row"> 
		       		<label class="mws-form-label">帖子列表</label> 
		       		<div class="mws-form-item"> 
		        		<select name="tid">
		        			<option value="" disabled selected hidden>------------------请选择帖子------------------</option>
		        			@foreach($data as $k=>$v)
		        			<option value="{{ $v->id }}">{{$v->ttitle}}</option>
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
			    <font style="vertical-align: inherit;"> <font style="vertical-align: inherit;"> <input type="submit" value="添加" class="btn btn-success" /> </font> </font> 
			    <input type="reset" value="重置" class="btn btn-info " /> 
		   </div>  
		</form>
  	</div> 
</div>	   	
</div>
@endsection                	

