@extends('Admin.Layout.index')

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span><i class="icon-tools"></i>轮播图修改</span>
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

		<form class="mws-form" action="/admin/slides/{{ $data->id }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="mws-form-inline">
				<div class="mws-form-row">
					<label class="mws-form-label">标题</label>
					<div class="mws-form-item">
						<input type="text" name="stitle" style="width:558px" class="small" value="{{ $data['stitle'] }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">图片</label>
					<div class="mws-form-item" style="width: 558px;">
						<input type="file" name="simg" class="small" placeholder="aaa">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">链接</label>
					<div class="mws-form-item">
						<input type="text" name="surl" style="width:558px" class="small" value="{{ $data['surl'] }}">
					</div>
				</div>
				<div class="mws-form-row">
					<label class="mws-form-label">状态</label>
					<div class="mws-form-item">
						<label>
	                        <input class="radio" name="sstatu" type="radio" @if($data->sstatu == '1') checked  @elseif($data->sstatu == '2')  @endif value="1">
	                        <span>显示</span>
	                    </label>
	                    <label>
	                        <input class="radio" name="sstatu" type="radio" @if($data->sstatu == '2') checked  @elseif($data->sstatu == '1')  @endif value="2">
	                        <span>不显示</span>
	                    </label>
					</div>
				</div>

				

			</div>
			<div class="mws-button-row">
				<input type="submit" value="修改" class="btn btn-info">
				<input type="reset" value="重置" class="btn btn-warning">
			</div>

		</form>
	</div>    	
	</div>
@endsection