@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-wrench"></i></li>友情链接修改</span>
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

		<form class="mws-form" action="/admin/friendlinks/{{ $data->id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">标题</label>
					<div class="mws-form-item">
						<input type="text" name="ftitle" class="small" style="width:558px" value="{{ $data['ftitle'] }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">链接</label>
					<div class="mws-form-item">
						<input type="text" name="furl" class="small" value="{{ $data['furl'] }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
						<label>
	                        <input class="radio" name="fstatu" type="radio" @if($data->fstatu == '1') checked  @elseif($data->fstatu == '2')  @endif value="1">
	                        <span>显示</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="fstatu" type="radio" @if($data->fstatu == '2') checked  @elseif($data->fstatu == '1')  @endif value="2">
	                        <span>不显示</span>
	                    </label>
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