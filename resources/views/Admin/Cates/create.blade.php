@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<div class="mws-panel-header text-center">
    	<span >版块添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/cates" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">所属分类</label>
    				<div class="mws-form-item">
    					<select class="small" name="pid">
    						<option value="0">请选择分类</option>
                            @foreach($data as $k=>$v)
    						<option value="{{ $v->id }}" @if($v->id ==  $id) selected @endif >{{ $v->cname }} </option>
                            @endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label ">版块名称</label>
    				<div class="mws-form-item">
    					<input type="text" name="cname" class="small">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">版块图标</label>
                    <div class="mws-form-item" style="width:588px">
                        <input  type="file" name="profile">
                    </div>
                </div>
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-success">
    			<input type="reset" value="重置" class="btn btn-info">
    		</div>
    	</form>
    </div>
</div>
@endsection