@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 帖子列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<form action="/admin/topics" method="get">
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
                	<th  style="width: 50px;">浏览量</th>
                	<th  style="width: 50px;">回帖数</th>
                	<th  style="width: 30px;">置顶</th>
                	<th  style="width: 40px;">精华</th>
                	<th  style="width: 60px;">可否回复</th>
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
                <td class=" ">{{ $v->count }}</td>
                <td class=" ">{{ $v->recount }}</td>
                <td class=" " >
                	<a  href="/admin/topics/zd/{{$v->id}}" @if($v->top == 1) hidden @endif">
                		<button class="btn btn-info" >否</button>
                	</a>
					<a  href="/admin/topics/zd/{{$v->id}}" @if($v->top == 0) hidden @endif>
                		<button class="btn btn-warning" >是</button>
                	</a>
                </td>
                <td class=" ">	
                	<a  href="/admin/topics/jh/{{$v->id}}" @if($v->cream == 1) hidden @endif">
                		<button class="btn btn-info" >否</button>
                	</a>
					<a  href="/admin/topics/jh/{{$v->id}}" @if($v->cream == 0) hidden @endif>
                		<button class="btn btn-warning" >是</button>
                	</a>
                </td>
				<td class=" ">
                	<a  href="/admin/topics/re/{{$v->id}}" @if($v->stoprep == 1) hidden @endif">
                		<button class="btn btn-info" >是</button>
                	</a>
					<a  href="/admin/topics/re/{{$v->id}}" @if($v->stoprep == 0) hidden @endif>
                		<button class="btn btn-warning" >否</button>
                	</a>
                </td>
                <td class=" ">
                	<a  href="/admin/topics/{{ $v->id }}"class="btn btn-info">查看</a>
                	<form style="display:inline-block" action="/admin/topics/{{$v->id}}" method="post">
                		{{ csrf_field() }}
                		{{ method_field('DELETE') }}
                		<input class="btn btn-danger" type="submit" onclick="return confirm('确实能够要删除帖子吗？')" value="删除">
                	</form>
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