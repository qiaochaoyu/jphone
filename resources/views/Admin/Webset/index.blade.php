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
    	<span><i class="icon-table"></i> 网站信息列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_0_length" class="dataTables_length">
          <label>显示
                  <select size="1" name="count" aria-controls="DataTables_Table_1">
                    <option value="5"  @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                    <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                    <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
                    <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                </select>条</label>
        </div>

        <div class="dataTables_filter" id="DataTables_Table_0_filter">
            <label>关键字 <input type="text" aria-controls="DataTables_Table_0" value="{{ $request['search'] or '' }}" name="search">
            </label>
            <input type="submit" value="搜索" class="btn btn-info">
        </div>
        </form>
        <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
			     <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>logo</th>
                    <th>地址</th>
                    <th>操作</th>
                 </tr>
			</thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($data as $k=>$v)
        		<tr class="odd" style="text-align: center;line-height: 20px">
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->wname }}</td>
                    
                    <td> 
                        <img src="/upload/{{ $v->wlogo }}"  style="width: 100px;height: 60px;margin:auto" class="thumbnail">
                    </td>
                    <td>{{ $v->wurl }}</td>
                    <td>
                    	<a href="javascript:;" onclick="shows({{ $v->id }})" class="btn btn-info">查看详情</a>
                        <form action="/admin/webset/{{ $v->id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="/admin/webset/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="page_page">
            {{ $data->links() }}
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //网站详细信息
    function shows(id)
    {
            layer.open({
			  type: 2,
			  title: '网站信息详情',
			  shadeClose: true,
			  shade: 0.8,
			  area: ['800px', '90%'],
			  content: '/admin/webset/'+id //iframe的url
			}); 
    }
</script>
@endsection