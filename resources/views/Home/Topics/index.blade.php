@extends('Home.Layout.index')
@section('content')
<link rel="stylesheet" type="text/css" href="/home/css/page.css">
<div id="wp" class="wp time_wp cl">
  <script src="/home/js/jquery.superslide.js" type="text/javascript"></script>
  <div id="pt" class="bm cl">
    <div class="z" style="padding-right: 0;">
      <a href="/">首页</a>
      <em>›</em>
      <a href="/cates/{{ $cate_prev->id }}">:::. {{$cate_prev->cname}} :::.</a>
      <em>›</em>
      <a href="/cates/topics/{{ $cate->id }}">{{ $cate->cname }}</a></div>
  </div>
  <style id="diy_style" type="text/css"></style>
  <div class="wp">
    <!--[diy=diy1]-->
    <div id="diy1" class="area"></div>
    <!--[/diy]--></div>
  <div class="box forum_top bm cl">
    <div class="forum_top_icon cl">
      <img src="/home/picture/common_252_icon.png" alt="战地日记"></div>
    <div class="forum_right cl" style="width: 935px;">
      <div class="forum_top_name cl">
        <h2>
          <a href="/cates/{{$cate->id}}">{{ $cate->cname }}</a></h2>
        <div class="cl" style="padding: 2px 0; color: #6f6f6f; font-size: 14px;">
          <p id="forum_rules_252">{{ $cate ->description }}</p></div>
      </div>
      <div class="forum_top_info cl">
        <span class="z">今日 : 0
          <span class="pipe">|</span>主题 : {{ $count }}</span>
      </div>
    </div>
  </div>
  <div class="boardnav cl" style="margin: 0;">
    <div id="ct" class="wp inside_box cl">
      <!-- 板块右侧 -->
      <div id="main_sidebar">
        <div class="itofeedback cl">
          <a class="bluebigbutton"  href="/topicsmodal" title="发新帖">发帖</a>
          <a href="/signin/create" target="_self" class="greenbigbutton" title="签到" style="margin-right: 0;">签到</a></div>
        <div id="recommendArticle">
          <!--[diy=diy7]-->
          <div id="diy7" class="area"></div>
          <!--[/diy]--></div>
        <div id="jiang108">
          <!--[diy=diy8]-->
          <div id="diy8" class="area"></div>
          <!--[/diy]--></div>
        <!--[diy=diy11]-->
        <div id="diy11" class="area">
          <div id="tabyL6q68" class="frame-tab move-span cl" >
            <div id="tabyL6q68_title" class="tab-title title column cl tab-style" switchtype="mouseover">
              <div id="portal_block_136" class="block move-span" >
                <div class="blocktitle title">
                  <span class="titletext" style="float:;margin-left:px;font-size:;color: !important;">版块排行贴</span></div>
                <div id="portal_block_136_content" class="dxb_bc" >
                  <div class="box s_timeline" style="height:530px">
                    <div class="s_text_list">
                      <div class="nano has-scrollbar">
                        <ul style="right: -17px;" tabindex="0" class="nano-content">
                          @foreach($topics_hot as $k=>$v)
                          <li>
                            <i>
                              <span></span>
                            </i>
                            <a href="/topics/{{$v->id}}" target="_blank">{{ $v->ttitle }}</a>
                            <p>{{ $v->created_at }}</p>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tabyL6q68_content" class="tb-c"></div>
            <script type="text/javascript">initTab("tabyL6q68", "mouseover");</script></div>
        </div>
        <!--[/diy]--></div>
      <!-- 板块右侧 -->
      <div class="forum-left cl" style="padding: 0; border-radius: 2px; box-shadow: 0px 1px 1px rgba(0,0,0,0.08); overflow: hidden; background: #FFFFFF;">
        <!--[diy=diynavtop]-->
        <div id="diynavtop" class="area"></div>
        <!--[/diy]-->
        <div class="mn" style="padding-top:0;">
          <div class="bm bml" style="margin: 20px 20px 0 20px;"></div>
          <div class="drag" style="padding: 0 20px;">
            <!--[diy=diy4]-->
            <div id="diy4" class="area">
              <div id="frameppanxO" class="frame move-span cl frame-1">
                <div id="frameppanxO_left" class="column frame-1-c">
                  <div id="frameppanxO_left_temp" class="move-span temp"></div>
                  <div id="portal_block_142" class="block move-span">
                    <div id="portal_block_142_content" class="dxb_bc">
                      <div class="listBlocks noticeWrap" style="width: 735px; padding: 0; margin-bottom: 0; box-shadow: none;">
                        <div id="notice">
                          <div style="width: 705px; margin-left: 0;" class="notices bd">
                            <div class="tempWrap" style="overflow:hidden; position:relative; height:30px">
                              <ul style="height: 180px; position: relative; padding: 0px; margin: 0px; top: -60px;">
                                @foreach($announcements as $k=>$v)
                                <li style="width: 705px; height: 30px;">
                                  <a class="imgAni_curr" href="/home/announcements/index/{{$v->id}}" title="{{ $v->title }}" target="_blank" style="width: 220px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">{{ $v->title }}</a>
                                  <i class="icon icon_zan" >{{ substr($v->created_at,0,10) }}</i>
                                </li>
                                @endforeach
                              </ul>s
                            </div>
                          </div>
                        </div>
                        <script type="text/javascript">jQuery.noConflict();
                          jQuery("#notice").slide({
                            titCell: ".hd",
                            mainCell: ".bd ul",
                            autoPage: true,
                            effect: "topLoop",
                            autoPlay: true,
                            delayTime: 1000
                          });</script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--[/diy]--></div>
          <div id="threadlist" class="tl bm bmw">
            <div class="th showmenubox">
              <div class="y">
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=lastpost&amp;orderby=lastpost" class="">最新</a>&nbsp;
                <span class="pipe">|</span>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=hot" class="">热帖</a>&nbsp;
                <span class="pipe">|</span>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=digest&amp;digest=1" class="">精华</a>&nbsp;
                <span class="pipe">|</span>
                <span id="atarget" onclick="setatarget(1)" title="在新窗口中打开帖子" style="margin-right: 0;">新窗</span></div>筛选：
              <span class="showmenu_outer">
                <a id="filter_special" href="javascript:;" class="showmenu " onclick="showMenu(this.id)">全部主题</a></span>
              <span class="showmenu_outer">
                <a id="filter_time" href="javascript:;" class="showmenu " onclick="showMenu(this.id)">全部时间</a></span>排序：
              <span class="showmenu_outer">
                <a id="filter_orderby" href="javascript:;" class="showmenu " onclick="showMenu(this.id)">最后发表</a></span>
              <table cellspacing="0" cellpadding="0" style="display: none">
                <!--hide for dev-->
                <tbody>
                  <tr>
                    <th colspan="2">
                      <div class="tf">
                        <span id="atarget" onclick="setatarget(1)" class="y" title="在新窗口中打开帖子">新窗</span>
                        <a id="filter_dateline" href="javascript:;" class="showmenu xi2" onclick="showMenu(this.id)">更多</a>&nbsp;
                        <span id="clearstickthread" style="display: none;">
                          <span class="pipe">|</span>
                          <a href="javascript:;" onclick="clearStickThread()" class="xi2" title="显示置顶">显示置顶</a></span>
                      </div>
                    </th>
                    <td class="by">作者</td>
                    <td class="num">回复/查看</td>
                    <td class="by">最后发表</td></tr>
                </tbody>
              </table>
            </div>
            <div class="bm_c" style="height:700px">
              <script type="text/javascript">var lasttime = 1550668141;
                var listcolspan = '5';</script>
              <div id="forumnew" style="display:none"></div>
              <form method="post" autocomplete="off" name="moderate" id="moderate" action="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=252&amp;infloat=yes&amp;nopost=yes">
                <input type="hidden" name="formhash" value="1a4beacd">
                <input type="hidden" name="listextra" value="page%3D1">
                <table summary="forum_252" cellspacing="0" cellpadding="0" id="threadlisttableid">
                	@foreach($data2 as $k=>$v)
                  <tbody id="stickthread_242317">
                    <tr>
                      <td class="icn">
                        <div class="time_reply">
                          <a href="http://bbs.itxdl.cn/read-htm-tid-242317-page-1.html" onclick="atarget(this)" target="_blank" title="156 个回复">156</a></div>
                      </td>
                      <th class="common forumtit">
                        <a href="javascript:void(0);" onclick="hideStickThread('242317')" class="showhide y" title="隐藏置顶帖">隐藏置顶帖</a>
                        <a href="/topics/{{ $v->id }}" onclick="atarget(this)" class="s xst">{{ $v->cates->cname }} | {{ $v->ttitle }}</a>
                        @if($v->cream == 1)
                        <img src="/home/picture/digest_1.png" align="absmiddle" alt="digest" title="精华 1">
                        @endif
                        @if($v->top == 1)
                        <img src="/home/picture/pin_3.gif" alt="全局置顶"> 
                        @endif
                        <div class="forumsummary"></div>
                        <div class="foruminfo">
                          <i class="z">
                            <a href="/users/index/{{$v->uid}}" c="1" mid="card_958">
                              <span style="margin-left: 0;">{{ $v->users->nickname }}</span></a>
                            <span style="margin-left: 5px;">@ {{ $v->created_at }}</span></i>
                          <i class="y">
                            <span>
                              <a href="http://d.bbs.itxdl.cn/space-username-%D3%D0%B9%CA%CA%C2%C6%A4%CD%AC%D1%A7.html" c="1" mid="card_6677">{{ $v->get_last_replys($v->id)['user_name'] }}</a></span> 
                            <span title="回帖时间">{{ $v->get_last_replys($v->id)['time'] }}</span></i>
                        </div>
                      </th>
                      <td class="by"></td>
                      <td class="num"></td>
                      <td class="by"></td>
                    </tr>
                  </tbody>
                  @endforeach
                  <tbody id="separatorline">
                    <tr class="ts" style=" height: 30px; line-height: 30px;">
                      <td style="border-left: 1px solid #EEEEEE;">&nbsp;</td>
                      <th style="border-right: 1px solid #EEEEEE;">
                        <a href="javascript:;" onclick="checkForumnew_btn('252')" title="查看更新" class="forumrefresh">版块主题</a></th>
                    </tr>
                  </tbody>
                  <script type="text/javascript">hideStickThread();</script> 
                  @foreach($data as $k=>$v)
                  <tbody id="normalthread_244149">
                    <tr>
                      <td class="icn">
                        <div class="time_reply">
                          <a href="http://bbs.itxdl.cn/read-htm-tid-244149-page-1.html" onclick="atarget(this)" target="_blank" title="{{ $v->replys->count() }} 个回复">{{ $v->replys->count() }}</a></div>
                      </td>
                      <th class="new forumtit">
                        <em>[
                          {{ $v->tmark }} ]</em>
                        <a href="/topics/{{$v->id}}" onclick="atarget(this)" class="s xst">{{ $v->ttitle }}</a>
                        <img src="/home/picture/011.small.gif" alt="新人帖" align="absmiddle">
                        @if(1 > 2)
                        <img src="/home/picture/image_s.gif" alt="attach_img" title="图片附件" align="absmiddle">
                        @endif
                        <a href="http://bbs.itxdl.cn/read-htm-tid-244149-page-1.html" title="有新回复 - 新窗口打开" target="_blank"></a>
                        <a href="http://bbs.itxdl.cn/forum.php?mod=redirect&amp;tid=244149&amp;goto=lastpost#lastpost" class="xi1">New</a>
                        <div class="forumsummary"></div>
                        <div class="foruminfo">
                          <i class="z">
                            <a href="/users/index/{{$v->uid}}" c="1" mid="card_5832">
                              <span style="margin-left: 0;">{{ $v->users->nickname }}</span></a>
                            <span style="margin-left: 5px;">@
                              <span title="2019-2-15">{{ floor((time()-strtotime($v->created_at))/86400) }}&nbsp;天前</span></span>
                          </i>
                          <i class="y">
                            <span>
                              <a href="http://d.bbs.itxdl.cn/space-username-%C1%F5%D3%B0.html" c="1" mid="card_7538">{{ $v->get_last_replys($v->id)['user_name'] }}</a></span>@
                            <span title="2019-2-15 18:10">{{ $v->get_last_replys($v->id)['time'] }}</span></i>
                        </div>
                      </th>
                      <td class="by"></td>
                      <td class="num"></td>
                      <td class="by"></td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
                <!-- end of table "forum_G[fid]" branch 1/3 --></form>
            </div>
          </div>
          <div id="filter_special_menu" class="p_pop showsub" style="display:none" change="location.href='forum.php?mod=forumdisplay&amp;fid=252&amp;filter='+$('filter_special').value">
            <ul>
              @foreach($tmark as $k=>$v)
              <li>
                <a  @if(strstr($_SERVER['REQUEST_URI'],'?'))
                    href="{{$_SERVER['REQUEST_URI']}}&keyword={{$v->tmark}}">
                    @else
                    href="{{$_SERVER['REQUEST_URI']}}?keyword={{$v->tmark}}">
                    @endif {{$v->tmark}} </a>
              </li>
              @endforeach
            </ul>
          </div>
          <div id="filter_reward_menu" class="p_pop showsub" style="display:none" change="forum.php?mod=forumdisplay&amp;fid=252&amp;filter=specialtype&amp;specialtype=reward&amp;rewardtype='+$('filter_reward').value">
            <ul>
              <li>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=specialtype&amp;specialtype=reward">全部悬赏</a></li>
              <li>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=specialtype&amp;specialtype=reward&amp;rewardtype=1">进行中</a></li>
              <li>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=specialtype&amp;specialtype=reward&amp;rewardtype=2">已解决</a></li>
            </ul>
          </div>
          <div id="filter_dateline_menu" class="p_pop showsub" style="display:none">
            <ul class="pop_moremenu">
              <li>排序:
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=author&amp;orderby=dateline">发帖时间</a>
                <span class="pipe">|</span>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=reply&amp;orderby=replies">回复/查看</a>
                <span class="pipe">|</span>
                <a href="http://bbs.itxdl.cn/forum.php?mod=forumdisplay&amp;fid=252&amp;filter=reply&amp;orderby=views">查看</a></li>
            </ul>
          </div>
          <div id="filter_time_menu" class="p_pop showsub" style="display:none">
            <ul>
              <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&time=70000">
                @else
                {{$_SERVER['REQUEST_URI']}}?time=70000">
                @endif
              全部时间</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&time=1">
                @else
                {{$_SERVER['REQUEST_URI']}}?time=1">
                @endif
              一天</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&time=2">
                @else
                {{$_SERVER['REQUEST_URI']}}?time=2">
                @endif
              两天</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&time=7">
                @else
                {{$_SERVER['REQUEST_URI']}}?time=7">
                @endif
              一周</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&time=30">
                @else
                {{$_SERVER['REQUEST_URI']}}?time=30">
                @endif
              一个月</a>
            </li>
            </ul>
          </div>
          <div id="filter_orderby_menu" class="p_pop showsub" style="display:none">
            <ul>
              <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&order=count">
                @else
                {{$_SERVER['REQUEST_URI']}}?order=count">
                @endif
              默认排序</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&order=created_at">
                @else
                {{$_SERVER['REQUEST_URI']}}?order=created_at">
                @endif
              发帖时间</a>
            </li>
            <li>
                <a href="
                @if(strstr($_SERVER['REQUEST_URI'],'?'))
                {{$_SERVER['REQUEST_URI']}}&order=last_replys_at">
                @else
                {{$_SERVER['REQUEST_URI']}}?order=last_replys_at">
                @endif
              最后发表</a>
            </li>
            </ul>
          </div>
          <a class="bm_h" href="javascript:;" rel="forum.php?mod=forumdisplay&amp;fid=252&amp;page=2" curpage="1" id="autopbn" totalpage="1000" picstyle="0" forumdefstyle="">下一页</a>
          <script src="/home/js/autoloadpage.js" type="text/javascript"></script>
        </div>
        <div class="bm npgs cl" id="page" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">
              {{ $data->appends($requests)->links() }}
        </div>
        <div>
          <!--[diy=diyfastposttop]-->
          <div id="diyfastposttop" class="area"></div>
          <!--[/diy]-->
          <script type="text/javascript">var postminchars = parseInt('10');
            var postmaxchars = parseInt('10000');
            var disablepostctrl = parseInt('0');
            var fid = parseInt('252');</script>
          <div id="f_pst" class="bm" style="display: none;">
            <div class="bm_c">
              <form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&amp;action=newthread&amp;fid=252&amp;topicsubmit=yes&amp;infloat=yes&amp;handlekey=fastnewpost" onsubmit="return fastpostvalidate(this)">
                <div id="fastpostreturn" style="margin:-5px 0 5px"></div>
                <div class="pbt cl">
                  <div class="ftid">
                    <select name="typeid" id="typeid_fast" width="80" selecti="0" style="display: none;">
                      <option value="0"></option>
                    </select>
                    <a href="javascript:;" id="typeid_fast_ctrl" style="width:80px" tabindex="1">选择主题分类</a></div>
                  <script type="text/javascript" reload="1">simulateSelect('typeid_fast');</script>
                  <input type="text" id="subject" name="subject" class="px" value="" onkeyup="strLenCalc(this, 'checklen', 80);" tabindex="11" style="width: 25em">
                  <span>还可输入
                    <strong id="checklen">80</strong>个字符</span></div>
                <div class="cl">
                  <div id="fastsmiliesdiv" class="y">
                    <div id="fastsmiliesdiv_data">
                      <div id="fastsmilies"></div>
                    </div>
                  </div>
                  <div class="hasfsl" id="fastposteditor">
                    <div class="tedt">
                      <div class="bar">
                        <span class="y">
                          <a href="http://bbs.itxdl.cn/forum.php?mod=post&amp;action=newthread&amp;fid=252" onclick="switchAdvanceMode(this.href);doane(event);">高级模式</a></span>
                        <script src="/home/js/seditor.js" type="text/javascript"></script>
                        <div class="fpd">
                          <a href="javascript:;" title="文字加粗" class="fbld">B</a>
                          <a href="javascript:;" title="设置文字颜色" class="fclr" id="fastpostforecolor">Color</a>
                          <a id="fastpostimg" href="javascript:;" title="图片" class="fmg">Image</a>
                          <a id="fastposturl" href="javascript:;" title="添加链接" class="flnk">Link</a>
                          <a id="fastpostquote" href="javascript:;" title="引用" class="fqt">Quote</a>
                          <a id="fastpostcode" href="javascript:;" title="代码" class="fcd">Code</a>
                          <a href="javascript:;" class="fsml" id="fastpostsml">Smilies</a></div>
                      </div>
                      <div class="area">
                        <div class="pt hm">您需要登录后才可以发帖
                          <a href="member.php?mod=logging&amp;action=login" onclick="showWindow('login', this.href)" class="xi2">登录</a>|
                          <a href="member.php?mod=register" class="xi2">立即注册</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="mtm sec">
                    <span id="seccode_cSQBTOAa" class="seccode_1"></span>
                    <script type="text/javascript" reload="1">updateseccode('cSQBTOAa', '<sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>', 'forum::forumdisplay');</script></div>
                  <input type="hidden" name="formhash" value="1a4beacd">
                  <input type="hidden" name="usesig" value=""></div>
                <p class="ptm pnpost">
                  <a href="http://d.bbs.itxdl.cn/home.php?mod=spacecp&amp;ac=credit&amp;op=rule&amp;fid=252" class="y" target="_blank">本版积分规则</a>
                  <button type="submit" name="topicsubmit" id="fastpostsubmit" value="topicsubmit" tabindex="13" class="pn pnc">
                    <strong>发表帖子</strong></button>
                </p>
              </form>
            </div>
          </div>
          <!--[diy=diyforumdisplaybottom]-->
          <div id="diyforumdisplaybottom" class="area"></div>
          <!--[/diy]--></div>
      </div>
    </div>
  </div>
  <script type="text/javascript">document.onkeyup = function(e) {
      keyPageScroll(e, 0, 1, 'forum.php?mod=forumdisplay&fid=252&filter=&orderby=lastpost&', 1);
    }</script>
  <script type="text/javascript">checkForumnew_handle = setTimeout(function() {
      checkForumnew(252, lasttime);
    },
    checkForumtimeout);</script>
  <div class="wp mtn">
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--></div>
  <script>fixed_top_nv();</script></div>
@endsection