@extends('Home.Users.layout.index')
@section('body')

   <div id="ct" class="ct1 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<p class="tbmu">
<a href="/users/topics/{{ $id }}" class="a">主题</a>
<span class="pipe">|</span>
<a href="/users/replys/{{ $id }}">回复</a>
</p>
<div class="tl">
<form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
<input type="hidden" name="formhash" value="f84db2ea">
<input type="hidden" name="delthread" value="true">

<table cellspacing="0" cellpadding="0">
<tbody><tr class="th">
<td class="icn">&nbsp;</td>
<th>主题</th>
<td class="frm">版块/群组</td>
<td class="num">回复/查看</td>
<td class="by"><cite>最后发帖</cite></td>
</tr>
@foreach ($topics_data as $k=>$v)
<tr>
	<td class="icn">
	<a href="http://bbs.itxdl.cn/forum.php?mod=viewthread&amp;tid=244178&amp;highlight=" title="新窗口打开" target="_blank">
	<img src="/home/picture/folder_common.gif">
	</a>
	</td>
	<th>
	<a href="/topics/{{$v->id }}" target="_blank">{{ $v->ttitle }}</a>
	</th>
	@foreach ($v['cate'] as $kk=>$vv)
	<td>
	<a href="/cates/topics/{{ $vv->id }}" class="xg1" target="_blank">{{ $vv->cname }}</a>
	</td>	
	@endforeach
	<!-- <td class="num">
	<a href="http://bbs.itxdl.cn/read-htm-tid-244178-page-1.html" class="xi2" target="_blank">0</a>
	<em>60</em>
	</td> -->

	<td class="by" style="width: 200px;">
	<cite><a href="/users/index/{{ $v->users->id }}" target="_blank">{{ $v->users->nickname }}</a></cite>
	<em><a href="javascript:;"  target="_blank">{{ $v->users->created_at }}</a></em>
	</td>
	@if ($id == session('homeuser')['id'])
	<td class="by">
		<!-- <p style="width: 6px;height: 30px; border: 1px solid #ddd;"> -->
			<div style="width: 40px;height: 20px; border: 1px solid #ddd;margin-left: 50px;padding: 6px 6px;text-align: center;line-height: 20px;background-color: #FFCC99;border-radius: 8px;">
				<a onclick="confirm('您确定要删除吗?')" href="/users/destroy/{{ $v->id }}"><font  color="#555"><b>删&nbsp;除</b></font></a>
			</div>
		<!-- </p> -->
	</td>
	@endif
</tr>

@endforeach
</tbody></table>

</form>

</div>
 <div class="bm npgs cl" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">
	<span id="fd_page_bottom">
		<div id="pages" >
			{{ $topics_data->links() }}
		</div>
	</span>
</div>


<script type="text/javascript">
function fuidgoto(fuid) {
window.location.href = 'home.php?mod=space&do=thread&view=we&fuid='+fuid;
}
function viewforumthread(fid) {
window.location.href = 'home.php?mod=space&uid=450096&do=thread&view=me&order=dateline&from=space&fid='+fid;
}
</script>

<!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--></div>
</div>
</div>
</div>

@endsection