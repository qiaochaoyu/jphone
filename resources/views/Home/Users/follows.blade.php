@extends('Home.Users.layout.index')
@section('body')

<div id="ct" class="ct1 wp cl">
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bm bw0">
<div class="bm_c">
<p class="tbmu">
<a href="/users/follows/{{$id}}" class="a">关注</a>
<span class="pipe">|</span>
<a href="/users/fans/{{$id}}">粉丝</a>
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
@foreach ($follows_data as $k=>$v)
@foreach ($v['user'] as $kk=>$vv)
<tr style="width: 100%;background-image: url(/home/images/bb.jpg);">
  <td >
    
      <a href="/users/index/{{$vv->id}}" title="新窗口打开" target="_blank">
      <img src="/upload/{{ $vv->face }}" style="border-radius: 50%;width: 60px;height: 60px;border: 3px solid white;">
  </a>
  </td>
  <th  style="width: 600px;">
  <a href="javascript:;" style="text-align: left;"><strong><font style="font-size: 25px;color: purple;">{{ $vv->nickname }}</font>(昵称)</strong></a>
  </th>
  </th>

  @if ($id == session('homeuser')['id'])
  <td class="by">
    <!-- <p style="width: 6px;height: 30px; border: 1px solid #ddd;"> -->
      <div style="width: 60px;height: 20px; border: 1px solid #ddd;margin-left: 30px;padding: 6px 6px;text-align: center;line-height: 20px;background-color: #FFCC99;border-radius: 8px;">
        <a onclick="confirm('您确定要取消关注吗?')" href="/users/unfollows/{{ $vv->id }}"><font  color="#555"><b>取消关注</b></font></a>
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
      {{ $follows_data->links() }}
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