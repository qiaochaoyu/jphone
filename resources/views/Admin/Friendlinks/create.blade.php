@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-plus-sign"></i>友情链接添加</span>
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

		<form class="mws-form" action="/admin/friendlinks" method="post">
			{{ csrf_field() }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">标题</label>
					<div class="mws-form-item">
						<input type="text" name="ftitle" class="small" style="width:558px" value="{{ old('ftitle') }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">链接</label>
					<div class="mws-form-item">
						<input type="text" name="furl" class="small" value="{{ old('furl') }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
						<label>
	                        <input class="radio" name="fstatu" type="radio" checked value="1">
	                        <span>显示</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="fstatu" type="radio" value="2">
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