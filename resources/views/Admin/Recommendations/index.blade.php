@extends('Admin.Layout.index')
@section('content')
<!-- 推荐列表start -->
<div class="mws-panel grid_8 mws-collapsible">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 推荐位列表</span>
    	<div class="mws-collapse-button mws-inset">
    		<span></span>
    	</div>
	</div>
    <div class="mws-panel-inner-wrap">
    	<div class="mws-panel-body no-padding">
	        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
	        <table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
	            <thead>
	                <tr role="row" >
						<th style="width: 40px;">ID</th>
						<th style="width: 500px;">标题</th>
						<th style="width: 100px;">封面</th>
						<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 100px;">操作</th>
					</tr>
	            </thead>
		        <tbody role="alert" aria-live="polite" aria-relevant="all">
		        	@foreach($data as $k=>$v)
	                <tr class="even" style="text-align:center">
	                    <td class="  sorting_1">{{ $v->id }}</td>
	                    <td class=" ">{{ $v->topics->ttitle }}</td>
	                    <td class=" "><img src="/upload/images/{{ $v->rimg }}" style="width:80px;height:60px;"></td>
	                    <td class=" ">
	                        <span class="btn-group">
	                        	<a href="/admin/topics/{{$v->tid}}" class="btn btn-info">查看</a>
	                            <a href="/admin/recommendations/{{ $v->id}}/edit" class="btn btn-warning">修改</a>
	                            <form action="/admin/recommendations/{{ $v->id}}" method="post" style="display:inline-block" >
	                            	{{ csrf_field() }}
	                            	{{ method_field('DELETE') }}
	                            	<input type="submit" value="删除" class="btn btn-danger" onclick="return confirm('确定要删除吗？')">
	                           	</form>
	                        </span>
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
	            </table>
	        </div>
    	</div>
	</div>
</div>
<!-- 推荐列表end -->

@endsection