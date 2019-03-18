@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-leaf"></i>网站信息修改</span>
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

		<form class="mws-form" action="/admin/webset/{{ $data->id }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">网站名称</label>
					<div class="mws-form-item">
						<input type="text" name="wname" class="small" value="{{ $data->wname }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">网站描述</label>
					<div class="mws-form-item">
						<input type="text" name="wdescribe" class="small" value="{{ $data->wdescribe }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">网站logo</label>
					<div class="mws-form-item" style="width:570px">
						<input type="file" name="wlogo" class="small" value="">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">网站备案号</label>
					<div class="mws-form-item">
						<input type="text" name="wfiling" class="small" value="{{ $data->wfiling }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">
		                    网站开关:
		                </label>
		                <div class="mws-form-item">
	                        <input class="radio" name="wstatu" type="radio" checked value="1">开
	                        <input class="radio" name="wstatu" type="radio" value="0">关
	                	</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">网站地址</label>
					<div class="mws-form-item">
						<input type="text" name="wurl" class="small" value="{{ $data->wurl }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">版权信息</label>
					<div class="mws-form-item">
						<input type="text" name="wcright" class="small" value="wcright">
					</div>
				</div>
			</div>
			<div class="mws-button-row">
				<input type="submit" value="修改" class="btn btn-warning">
				<input type="reset" value="重置" class="btn btn-info">
			</div>

		</form>
	</div>    	
	</div>
@endsection