@extends('Home.Users.layout.index')
@section('body')

   <div id="ct" class="ct1 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<p class="tbmu">
<img src="/home/picture/s_service.png" style="height: 20px;">
<a href="/users/collection/{{ $id }}" class="a">收藏</a>
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
@foreach ($collection_data as $k=>$v) 
@foreach ($v['top'] as $kk=>$vv)
<tr>
  <td class="icn">
  <a href="javascript:;" title="新窗口打开" target="_blank">
  <img src="/home/picture/folder_common.gif">
  </a>
  </td>
  <th>
  <a href="/topics/{{ $vv->id }}" target="_blank">{{ $vv->ttitle }}</a>
  </th>
  @foreach ($vv['cate'] as $kkk=>$vvv)
  <td>
  <a href="/cates/topics/{{ $vvv->id }}" class="xg1" target="_blank">{{ $vvv->cname }}</a>
  </td> 
  @endforeach
  <td class="num">
  <a href="javascript:;" class="xi2" style="height: 20px;" target="_blank">{{ $vv->count }}</a>
  <em style="height: 10px;">收藏数</em>
  </td>

  <td class="by" style="width: 200px;">
  @foreach ($vv['user'] as $ku=>$vu)
  <cite><a href="/users/index/{{ $vu->id }}" target="_blank">{{ $vu->nickname }}</a></cite>
  @endforeach
  <em><a href="javascript:;"  target="_blank">{{ $vv->created_at }}</a></em>
  </td>
  @if ($id == session('homeuser')['id'])
  <td class="by">
    <!-- <p style="width: 6px;height: 30px; border: 1px solid #ddd;"> -->
      <div style="width: 60px;height: 20px; border: 1px solid #ddd;margin-left: 50px;padding: 6px 6px;text-align: center;line-height: 20px;background-color: #FFCC99;border-radius: 8px;">
        <a  href="/users/remove/{{ $v->id }}"><font  color="#555"><b>取消收藏</b></font></a>
      </div>
    <!-- </p> -->
  </td>
  @endif
</tr>
@endforeach
@endforeach
</tbody></table>

</form>

</div>
 <div class="bm npgs cl" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">
  <span id="fd_page_bottom">
    <div id="pages" >
      {{ $collection_data->links() }}
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