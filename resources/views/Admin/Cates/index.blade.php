@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 版块列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<form action="/admin/cates" method="get">
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		<label>显示 
        		<select size="1" name="count" aria-controls="DataTables_Table_1">
        			<option value="10" @if(isset($request['count']) && $request['count'] == 10)selected @endif>10</option>
        			<option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
        			<option value="20" @if(isset($request['count']) && $request['count'] == 20) selected @endif>20</option>
        		</select> 条</label>
        	</div>
        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
        		<label>关键字: <input type="text" aria-controls="DataTables_Table_1" name="keyword" value="{{ $request['keyword'] or ''}}"></label>
        		<input class="btn btn-info" type="submit" value="搜索">
        	</div>
        	</form>
	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
		        <thead>
		            <tr role="row">
					  <th  style="width: 171px;">ID</th>
					  <th  style="width: 171px;">分类名称</th>
					  <th  style="width: 100px;">图标</th>
					  <th  style="width: 126px;">pid</th>
					  <th  style="width: 208px;">path</th>
					  <th  style="width: 258px;">操作</th>
					</tr>
		        </thead>
		        <tbody role="alert" aria-live="polite" aria-relevant="all">
		        	@foreach($data as $k=>$v)
		        	<tr class="odd">
		                <td class="">{{ $v->id }}</td>
		                <td class="">{{ $v->cname }}</td>
		                <td  style="width:100px;height:100px"><img class="thumbnail" src ="/upload/images/{{ $v->profile }}"></td>
		                <td class=" ">{{ $v->pid }}</td>
		                <td class=" ">{{ $v->path }}</td>
		                <td class="">
		                	<form style="display:inline-block" action="/admin/cates/{{ $v->id}}" method="post">
		                		{{ csrf_field() }}
		                		{{ method_field('DELETE')}}
		                		<input class="btn btn-danger" type="submit" onclick="return confirm('确定要删除该版块吗！')" value="删除">
		                	</form>
		                	<a href="/admin/cates/{{ $v->id }}" class="btn btn-info">添加子分类</a>
		                </td>
		            </tr>
		            @endforeach
		        </tbody>
		        <script type="text/javascript">
		        </script>
	        </table>
    	</div>
    	<div id="page_page">{{ $data->appends($request)->links() }}</div>
    </div>
</div>
@endsection