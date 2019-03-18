@extends('Home.Users.layout.index')
@section('body')

<div id="ct" class="ct1 wp cl" >
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<p class="tbmu">
<a href="/users/follows/{{$id}}" >关注</a>
<span class="pipe">|</span>
<a href="/users/fans/{{$id}}" class="a">粉丝</a>
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
@foreach ($fans_data as $k=>$v)
@foreach ($v['user'] as $kk=>$vv)
<tr style="background-image: url(/home/images/aa.jpg);">
  <td>
      <a href="/users/index/{{$vv->id}}"  title="新窗口打开" target="_blank">
      <img src="/upload/{{ $vv->face }}" style="border-radius: 50%;width: 60px;height: 60px;border: 3px solid white;">
     </a>
  </td>
  <th  style="width: 800px;text-align: cneter;">
  <a href="javascript:;" target="_blank" style="text-align: left; "><strong><font style="font-size: 25px;color: purple;">{{ $vv->nickname }}</font>(昵称)</strong></a>
  </th>
  
</tr>
@endforeach
@endforeach

</tbody></table>

</form>

</div>
<div class="bm npgs cl" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">
  <span id="fd_page_bottom">
    <div id="pages" >
      {{ $fans_data->links() }}
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