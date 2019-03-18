@extends('Admin.Layout.index')
@section('content')

<div class="mws-panel grid_8"> 
   	<div class="mws-panel-header"> 
    	<span>
    		<font style="vertical-align: inherit;">
    			<font style="vertical-align: inherit;">用户修改</font>
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

			<form class="mws-form" action="/admin/users/{{ $data->id }}" method="post" enctype="multipart/form-data">
					{{ method_field('PUT') }}
			      	{{ csrf_field() }} 
			    <div class="mws-form-inline"> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">权限</label> 
			       		<div class="mws-form-item"> 
				        	<select name="auth" id="catid" class="required">
					        	 <option value="1" @if ( isset($data->auth) && $data->auth == 1 ) selected @endif>超级管理员</option> 
					        	 <option value="2" @if ( isset($data->auth) && $data->auth == 2 ) selected @endif>普通管理员</option> 
					        	 <option value="3" @if ( isset($data->auth) && $data->auth == 3 ) selected @endif>会员</option> 
				        	</select> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">用户名</label> 
			       		<div class="mws-form-item"> 
			        		<input type="text" name="uname" readonly class="small" value="{{ $data->uname }}" /> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">昵称</label> 
			       		<div class="mws-form-item"> 
			        		<input type="text" name="nickname" class="small" value="{{ $data->nickname }}"/> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">手机号</label> 
			       		<div class="mws-form-item"> 
			        		<input type="number" name="phone" class="small" value="{{ $data->phone }}"/> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row"> 
			       		<label class="mws-form-label">邮箱</label> 
			       		<div class="mws-form-item"> 
			        		<input type="email" name="email" class="small" value="{{ $data->email }}"/> 
			       		</div> 
			      	</div> 
			      	<div class="mws-form-row">
                    	<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">文件输入验证</font></font></label>
                    	<div class="mws-form-item">
                        	<div class="fileinput-holder" style="position: relative;">
                        		<input type="file" name="face" class="fileinput-preview small" style="width:100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
                        		
                        	</div>
                            <!-- <label for="picture" class="error" generated="true" style="display:none"></label> -->
                        </div>
                    </div>
                    <div class="mws-form-row"> 
			       		<label class="mws-form-label">积分</label> 
			       		<div class="mws-form-item"> 
			        		<input type="number" name="ascore" class="small" value="{{ $data->ascore }}"/> 
			       		</div> 
			      	</div> 
			    </div> 
			    <div class="mws-button-row"> 
				    <font style="vertical-align: inherit;"> <font style="vertical-align: inherit;"> <input type="submit" value="修改" class="btn btn-success" /> </font> </font> 
				    <input type="reset" value="重置" class="btn btn-info " /> 
			   </div>  
			</form>
	  	</div> 
</div>	   	
</div>

@endsection                	
