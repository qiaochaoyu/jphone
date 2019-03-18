@extends('Admin.Layout.index')

@section('content')
	<link rel="stylesheet" href="/admin/layui-v2.4.5/layui/css/layui.css">
	<script src="/admin/layui-v2.4.5/layui/layui.js"></script>
	<script>
	//一般直接写在一个js文件中
	layui.use(['layer', 'form'], function(){
	  var layer = layui.layer
	  ,form = layui.form;	  
	});
	</script> 

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="/admin/announcements" method="get">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>显示
                        <select size="1" name="count" aria-controls="DataTables_Table_1">
                            <option value="5"  @if(isset($request['count']) && $request['count'] == 5) selected  @endif>5</option>
                            <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected  @endif>10</option>
                            <option value="20" @if(isset($request['count']) && $request['count'] == 20) selected  @endif>20</option>
                            <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected  @endif>50</option>
                        </select> 页
                     </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">关键字：</font></font>
                        <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1" placeholder="标题">
                    </label>
                    <input type="submit" value="搜索"  class="btn btn-info">
                </div>
        </form>
    <table class="mws-datatable-fn mws-table dataTable"  id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>公告标题</th>
                    <th>作者</th>
                    <th>内容</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($data as $k=>$v)
                    <tr class="odd" style="text-align: center;" >
                        <td>{{ $v->id }}</td>
                        <td>
                            <abbr title="{{ $v->title }}">
                            <p style="width: 200px;overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                 {{ $v->title }}
                            </p>
                            </abbr>
                        </td>
                        <td>{{ $v->author }}</td>
                        <td>
                        	<a href="javascript:;" class="btn btn-info" onclick="show({{ $v->id }})">查看内容详情</a>
                        </td>
                        <td style="width: 150px;">{{ $v->created_at }}</td>
                        <td>
                            <a href="/admin/announcements/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                            <form action="/admin/announcements/{{ $v->id }}" method="post" style="display: inline-block;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" value="删除" onclick="confirm('您确认要删除吗?')" class="btn btn-danger">
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div id="page_page">
                {{ $data->appends($request)->links() }}
            </div>
    </div>
</div>  
</div>
<script type="text/javascript">
		function show(id)
		{
			//iframe层
			layer.open({
			  type: 2,
			  title: '<h3 style="text-align:center;">公告内容</h3>',
			  shadeClose: true,
			  shade: 0.8,
			  area: ['400px', '90%'],
			  content: '/admin/announcements/'+id //iframe的url
			});
		}

	</script>  
@endsection

