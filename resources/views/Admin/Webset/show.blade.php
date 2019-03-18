<!DOCTYPE html>
<html>
<head>
	<title>网站信息详情</title>
	<style type="text/css">

	table tr{
		line-height: 50px;
	}
	table{
		margin-left: 50px;
		margin-right: 50px;
	}
	table td{
		padding-left: 30px;
	}
	td{
		border-bottom:1px solid #ccc;
	}
	th{
		border-bottom:1px solid #ccc;
		width:100px;
	}
	</style>

</head>
<body>
	<h1 style="text-align: center;"><small>网站信息详情</small></h1>
	<table class="table table-condensed">
		<tr>
			<th>id</th>
			<td>{{ $webs->id }}</td>
		</tr>
		<tr>
			<th>网站名称</th>
			<td>{{ $webs->wname }}</td>
		</tr>
		<tr>
			<th>网站描述</th>
			<td>{{ $webs->wdescribe }}</td>
		</tr>
		<tr>
			<th>网站备案号</th>
			<td>{{ $webs->wfiling }}</td>
		</tr>
		<tr>
			<th>网站状态</th>
			<td>
				@if($webs->wstatu == 1)
				正在运行
				@else
				正在维护
				@endif
				</td>
		</tr>
		<tr>
			<th>网站地址</th>
			<td>{{ $webs->wurl }}</td>
		</tr>
		<tr>
			<th>版权信息</th>
			<td>{{ $webs->wcright }}</td>
		</tr>
		<tr>
			<th>网站logo</th>
			<td>
				<img src="/upload/{{ $webs->wlogo }}" style="margin-top:15px;">
				</td>
		</tr>
		<tr>
			<th>创建时间</th>
			<td>{{ $webs->created_at }}</td>
		</tr>
		<tr>
			<th>创建时间</th>
			<td>{{ $webs->updated_at }}</td>
		</tr>
	</table>
</body>
</html>