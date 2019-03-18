@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-leaf"></i>轮播图添加</span>
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

		<form class="mws-form" action="/admin/slides" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">标题</label>
					<div class="mws-form-item">
						<input type="text" name="stitle" class="small" style="width:558px" value="{{ old('stitle') }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">图片</label>
					<div class="mws-form-item" style="width: 558px;">
						<input type="file" name="simg" class="small">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">目标链接</label>
					<div class="mws-form-item">
						<input type="text" name="surl" class="small" style="width:558px" value="{{ old('surl') }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
						<label>
	                        <input class="radio" name="sstatu" type="radio" checked value="1">
	                        <span>显示</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="sstatu" type="radio" value="2">
	                        <span>不显示</span>
	                    </label>
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