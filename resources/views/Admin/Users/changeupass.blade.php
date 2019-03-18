@extends('Admin.Layout.index')
@section('content')





<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改密码</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/users/newpass/{{ $id }}" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原密码</font></font></label>
    				<div class="mws-form-item">
    					<input type="text" name="upass" class="small" >
    					<span style="margin-left:30px;color: red;" > {{ $errors->first('upass') }}</span>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新密码</font></font></label>
    				<div class="mws-form-item">
    					<input type="text" name="newpass" class="small">
    					<span style="margin-left:30px;color: red;" > {{ $errors->first('newpass') }}</span>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认新密码</font></font></label>
    				<div class="mws-form-item">
    					<input type="text" name="repass" class="small">
    					<span style="margin-left:30px;color: red;" > {{ $errors->first('repass') }}</span>
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" value="提交" class="btn btn-success"></font></font>
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>    	
</div>
@endsection