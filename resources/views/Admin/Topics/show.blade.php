@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-bold"></i>帖子详情</span>
    </div>
    <div class="mws-panel-body">
		<h4>标题：{{ $data->ttitle }}</h4>
		<h5>发帖人：{{ $data->users->nickname }}  <br>发帖时间：{{ $data->created_at }}</h5>
		<p>发帖内容:<br>{{ $data->tcontent }}</p>
		<hr>
		@if($rep_data)
		@foreach($rep_data as $k=>$v)
		<h5>回帖人：{{$v->uid}}  <br>回帖时间：{{ $v->created_at }}</h5>
		<p>回帖内容:<br>
		{{ $v->rcontent }}</p>
		<form action="/admin/replys/{{ $v->id }}" method="post">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<input type="submit" value="删除">
		</form>
		<hr>
		@endforeach
		@endif
    </div>
</div>
@endsection