@extends('Admin.Layout.index')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 友情链接列表</span>
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
                    <th>标题</th>
                    <th>链接</th>
                    <th>状态</th>
                    <th>添加时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                 </tr>
			</thead>

        <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach($data as $k=>$v)
        		<tr class="odd" style="text-align: center;">
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->ftitle }}</td>
                    <td>{{ $v->furl }}</td>
                    <td>
                        @if($v->fstatu == '1') 显示  
                        @elseif($v->fstatu == '2') 不显示 
                        @endif
                    </td>
                    <td>{{ $v->created_at }}</td>
                    <td>{{ $v->updated_at }}</td>
                    <td>
                        <form action="/admin/friendlinks/{{ $v->id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <input type="submit" value="删除" class="btn btn-danger" >
                        </form>
                        <a href="/admin/friendlinks/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        
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

@endsection