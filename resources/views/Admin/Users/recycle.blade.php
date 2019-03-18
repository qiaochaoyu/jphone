@extends('Admin.Layout.index')

@section('content')


<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户列表</font></font></span>
    </div>
    <div class="mws-panel-body no-padding">
        <!-- <form action="/admin/users" method="get">
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
                        <input type="text" name="search" value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1">
                    </label>
                    <input type="submit" value="搜索"  class="btn btn-info">
                </div>
        </form> -->
    <table class="mws-datatable-fn mws-table dataTable"  id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>手机号</th>
                    <th>邮箱</th>
                    <th>头像</th>
                    <th>积分</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                @foreach ($del_data as $k=>$v)
                    <tr class="odd">
                            <td>{{ $v->id }}</td>
                        <td>{{ $v->uname }}</td>
                        <td>{{ $v->nickname }}</td>
                        <td>{{ $v->phone }}</td>
                        <td>{{ $v->email }}</td>
                        <td>
                            <img src="/upload/{{ $v->face }}" class="thumbnail" style="width: 110px;height: 75px;">
                        </td>
                        <td>{{ $v->ascore }}</td>
                        <td>{{ $v->auth }}</td>
                        <td>
                            <a href="/admin/users/recovery/{{ $v->id }}" onclick="return confirm('您确认要恢复吗?')" class="btn btn-warning">恢复</a>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            <div id="page_page">
                {{ $del_data->links() }}
            </div>
    </div>
</div>  
</div>  
@endsection
