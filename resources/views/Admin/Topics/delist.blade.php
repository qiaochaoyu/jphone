@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 帖子列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<form action="/admin/topics/delist" method="get">
	        	<div id="DataTables_Table_1_length" class="dataTables_length">
	        		<label>显示 
	        			<select size="1" name="size" aria-controls="DataTables_Table_1">
	        			<option value="10" @if($size == 10) selected @endif>10</option>
	        			<option value="15" @if($size == 15) selected @endif>15</option> 
	        			<option value="20" @if($size == 20) selected @endif>20</option>
	        			<option value="30" @if($size == 30) selected @endif>30</option>
	        		</select>条</label>
	        	</div>
	        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
	        		<label>关键字: <input name="keyword" type="text" aria-controls="DataTables_Table_1" value="{{ $requests['keyword'] or '' }}"></label>
	        						<input type="submit" value="查询">
	        	</div>
	        </form>
        	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row" style="text-align:center">
                	<th  style="width: 40px;">ID</th>
                	<th  style="width: 150px;">标题</th> 
                	<th  style="width: 200px;">内容</th>
                	<th  style="width: 70px;">发帖人</th>
                	<th  style="width: 150px;">操作</th>
                </tr>
            </thead> 
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	@foreach($data as $k=>$v)
        	<tr class="odd" style="text-align:center">
                <td class=" ">{{ $v->id }}</td>
                <td>
            		<abbr title="{{ $v->ttitle }}">
            		<p style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $v->ttitle }}</p>
            		</abbr>
            	</td>
               	<td>
            		<abbr title="{{ $v->tcontent }}">
            		<p style="width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $v->tcontent }}</p>
            		</abbr>
            	</td>
                <td>
            		<abbr title="{{ $v->uid }}">
            		<p style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap">{{ $v->uid }}</p>
            		</abbr>
            	</td>
                <td class=" ">
                	<a  href="/admin/topics/rec/{{ $v->id }}"class="btn btn-info">恢复</a>
                	<a  href="/admin/topics/de/{{ $v->id }}"class="btn btn-danger" onclick="return confirm('确定要彻底删除帖子吗？')">彻底删除</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="page_page">
		{{ $data->appends($requests)->links() }}
    </div>
</div>
    </div>
</div>
@endsection