@extends('Home.Users.layout.index')
@section('body')

<div id="ct" class="ct1 wp cl">
  <div class="mn">
  <!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
  <div class="bm bw0">
  <div class="bm_c">
  <p class="tbmu">
  <a href="/users/topics/{{ $id }}">主题</a>
  <span class="pipe">|</span>
  <a href="/users/replys/{{ $id }}" class="a">回复</a>
  </p>
  <div class="tl">
  <form method="post" autocomplete="off" name="delform" id="delform" action="home.php?mod=space&amp;do=thread&amp;view=all&amp;order=dateline" onsubmit="showDialog('确定要删除选中的主题吗？', 'confirm', '', '$(\'delform\').submit();'); return false;">
  <input type="hidden" name="formhash" value="f84db2ea">
  <input type="hidden" name="delthread" value="true">

<table cellspacing="0" cellpadding="0">
  <tbody>
  <tr class="th">
  <td class="icn">&nbsp;</td>
  <th>帖子</th>
  <td class="frm">版块/群组</td>
  <td class="num">回复/查看</td>
  <td class="by"><cite>最后发帖</cite>
  </td>
  </tr>
@foreach ($replys_data as $k=>$v)
@foreach ($v['top'] as $kk=>$vv)
  <tr class="bw0_all" >
    <td class="icn">
    <a href="javascript:;" title="新窗口打开" target="_blank">
    <img src="/home/picture/folder_common.gif">
    </a>
    </td>
    <th>
    <a href="/topics/{{ $vv->tid }}" target="_blank">{{ $vv->ttitle }}</a>
    <img src="/home/picture/common.gif" alt="附件" align="absmiddle">
    </th>
    @foreach ($vv['cate'] as $kkk=>$vvv)
    <td>
    <a href="/cates/topics/{{ $vvv->id }}" class="xg1" target="_blank">{{ $vvv->cname }}</a>
    </td>
    @endforeach
    <td class="num">
    <a href="javascript:;" class="xi2" target="_blank">{{ $vv->recount }}</a>
    <em></em>
    </td>

    <td class="by" style="width: 200px;">
    <cite><a href="" target="_blank">{{ $user_data->nickname }}</a></cite>
    <em><a href="" target="_blank">{{ $v->updated_at }}</a></em>
    </td>
  </tr>

   @endforeach
  <tr>
      <td colspan="5" class="xg1">&nbsp;<img src="/home/images/icon_quote_m_s.gif" style="vertical-align:middle;"> <a href="" target="_blank">{{ $v->rcontent }}</a> <img src="/home/images/icon_quote_m_e.gif" style="vertical-align:middle;"></td>
      
  </tr>
  @endforeach
 
  </tbody>
</table>
  </form>
  </div>
  <div class="bm npgs cl" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">
  <span id="fd_page_bottom">
    <div id="pages" >
      {{ $replys_data->links() }}
    </div>
  </span>
</div> 



  <script type="text/javascript">
  function fuidgoto(fuid) {
  window.location.href = 'home.php?mod=space&do=thread&view=we&fuid='+fuid;
  }
  function viewforumthread(fid) {
  window.location.href = 'home.php?mod=space&uid=450096&do=thread&view=me&type=reply&order=dateline&from=space&fid='+fid;
  }
  </script>

  <!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--></div>
  </div>
  </div>
</div>

@endsection