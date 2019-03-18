@extends('Home.Layout.index')
@section('content')
<div id="wp" class="wp time_wp cl">
  <script src="/home/js/jquery.superslide.js" type="text/javascript" type="text/javascript"></script>
  <style id="diy_style" type="text/css"></style>
  <!-- 闈㈠寘灞?-->
  <div id="pt" class="bm cl" style="padding: 0;display: none;">
    <div class="z">
      <a href="./" class="nvhm" title="首页">兄弟连论坛_每个人的交流社区</a>
      <em>&raquo;</em>
      <a href="http://bbs.itxdl.cn/forum.php">论坛</a></div>
    <div class="z"></div>
  </div>
  <div class="wp cl">
    <!--[diy=diy1]-->
    <div id="diy1" class="area">
      <div id="framePY40WZ" class="frame move-span cl frame-1">
        <div id="framePY40WZ_left" class="column frame-1-c">
          <div id="framePY40WZ_left_temp" class="move-span temp"></div>
        </div>
      </div>
    </div>
    <!--[/diy]--></div>
  <div class="wp cl" style="margin: 0;margin-top: 20px;">
    <!--[diy=diy_chart]-->
    <div id="diy_chart" class="area"></div>
    <!--[/diy]-->
    <div class="mn cl" style="float: left; width: 770px;">
      <!--[diy=diy_center]-->
      <div id="diy_center" class="area">
        <div id="framelap7iz" class="frame move-span cl frame-1">
          <div id="framelap7iz_left" class="column frame-1-c">
            <div id="framelap7iz_left_temp" class="move-span temp"></div>
            <div id="portal_block_3" class="block move-span">
              <div id="portal_block_3_content" class="dxb_bc">
                <div class="foucebox cl">
                  <!-- 大图 -->
                  <div class="bd">
                    @foreach($slides as $k=>$v)
                    <div class="showDiv">
                      <a href="{{ $v->surl }}" target="_blank">
                        <img src="/upload/{{ $v->simg }}" width="770" height="330" /></a>
                      <div class="foucebox_bg"></div>
                      <div>
                        <h2>
                          <a href="{{ $v->surl }}">{{ $v->stitle }}</a></h2>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- 小图 -->
                  <div class="hd">
                    <ul>
                      @foreach($slides as $k=>$v)
                      <li>
                        <a href="{{ $v->surl }}">
                          <img src="/upload/{{ $v->simg }}">
                          <span class="txt_bg"></span>
                          <span class="mask"></span>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <script type="text/javascript">jQuery(".foucebox").slide({
                    effect: "fold",
                    autoPlay: true,
                    delayTime: 300,
                    startFun: function(i) {
                      //下面代码控制文字显示
                      jQuery(".foucebox .showDiv").eq(i).find("h2").css({
                        display: "none",
                        bottom: 0
                      }).animate({
                        opacity: "show",
                        bottom: "15px"
                      },
                      300);
                      jQuery(".foucebox .showDiv").eq(i).find("p").css({
                        display: "none",
                        bottom: 0
                      }).animate({
                        opacity: "show",
                        bottom: "6px"
                      },
                      300);
                    }
                  });</script>
              </div>
            </div>
          </div>
        </div>
        <div id="frameUd9DWM" class="frame move-span cl frame-1">
          <div id="frameUd9DWM_left" class="column frame-1-c">
            <div id="frameUd9DWM_left_temp" class="move-span temp"></div>

            <div id="portal_block_10" class="block move-span">
              <div id="portal_block_10_content" class="dxb_bc">
                <div class="box cl" style="margin-bottom: 0; border-radius: 2px 2px 0 0;">
                  <h3 class="modname" style="padding: 0 25px;">推荐阅读</h3>
                  <div class="recommend_pic_small cl">
                    <ul>
                      @foreach($data_array[1] as $k=>$v)
                      <li>
                        <a href="/topics/{{ $v->tid }}" target="_blank" title="{{ $v->topics->ttitle }}">
                          <img src="/upload/images/{{ $v->rimg }}" alt="{{ $v->topics->ttitle  }}" height="100" width="228"></a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="recommend_article_list cl">
                    <!--<ul></ul>--></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--[/diy]-->
      <div class="cl" style="box-shadow: 0px 1px 1px rgba(0,0,0,0.08);">
        <div id="chart" class="bm mb10 cl" style="padding: 20px 25px; margin: 0; border-radius: 0; border-top: 1px solid #F1F1F1; border-bottom: 1px solid #F1F1F1; background: #F9F9F9; box-shadow: none;">
          <p class="chart z">今日:
            <em>{{ $topics_count_today }}</em>
            <span class="pipe">|</span>昨日:
            <em>{{ $topics_count_yesterday }}</em>
            <span class="pipe">|</span>帖子:
            <em>{{ $topics_count }}</em>
            <span class="pipe">|</span>会员:
            <em>{{ $users_count }}</em>
            <span class="pipe">|</span>欢迎新会员:
            <em>
              <a href="/users/index/{{ $user->id }}" target="_blank" class="xi2">{{ $user->nickname }}</a></em>
          </p>
        </div>
        <div class="Framebox cl" style="width: 720px; padding: 10px 25px; border-radius: 0 0 2px 2px; background: #FFFFFF; box-shadow: none; overflow: hidden;">
          <div class="fl bm">
            @foreach($data_array[0] as $k=>$v)
            <div class="bm bmw  flg cl">
              <div class="bm_h cl">
                <span class="o cl">
                  <img id="category_123_img" src="/home/picture/collapsed_no.gif" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_123');" /></span>
                <h2>
                  <a href="/cates/{{ $v-> id }}" style="">:::. {{ $v->cname }} :::.</a></h2>
              </div>
              <div id="category_123" class="bm_c" style="">
                <table cellspacing="0" cellpadding="0" class="fl_tb">
                  @foreach($v->sub as $kk=>$vv)
                  <tr>
                    <td class="fl_g" width="49.9%">
                      <div class="fl_icn_g" style="width: 50px;">
                        <a href="http://bbs.itxdl.cn/thread-htm-fid-271-page-1.html">
                          <img src="/upload/images/{{ $vv->profile }}"  style="width:60px" align="left" alt="" /></a>
                      </div>
                      <dl style="margin-left: 60px;">
                        <dt>
                          <a href="/cates/topics/{{ $vv->id }}">{{ $vv->cname}}</a></dt>
                        <dd>
                          <em>帖子: {{ count($vv->topics) }}</em>
                        <dd>
                          <a href="/topics/{{ $vv->last_topics()['topics']['id'] }}" class="xi2" style="color: #555555;">[{{ $vv->last_topics()['topics']['tmark']}}] |{{$vv->last_topics()['topics']['ttitle']}}</a>
                          <cite>{{ $vv->last_topics()["topics"]['created_at']}}
                            <a href="/users/index/{{$vv->last_topics()['users']['id'] }}">{{ $vv->last_topics()['users']['nickname'] }}</a></cite>
                        </dd>
                      </dl>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            @endforeach
          </div>
          <div class="wp mtn">
            <!--[diy=diy3]-->
            <div id="diy3" class="area"></div>
            <!--[/diy]--></div>
          <div id="online" class="bm oll">
            <div class="bm_h">
              
            </div>
          </div>
          <h1 style="font-size: 17px;"><strong>友情链接</strong></h1>
          <div class="bm lk" style="font-size: 15px;">
            <div id="category_lk" class="bm_c ptm">
              <ul class="x mbm cl">
                @foreach($friendlinks as $k=>$v)
                <li style="width: 150px;">
                  <a href="{{ $v->furl }}" onmousemove="over(this);" onmouseout="out(this);" target="_blank" title="{{ $v->ftitle }}" >{{ $v->ftitle }}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript"></script>
    <div id="main_sidebar" style="width: 310px;">
      <div class="cl" style="height: auto; margin: 0; overflow: hidden;">
        <!--[diy=diy6]-->
        <div id="diy6" class="area">
          <div id="frameW44663" class="frame move-span cl frame-1">
            <div id="frameW44663_left" class="column frame-1-c">
              <div id="frameW44663_left_temp" class="move-span temp"></div>
              <div id="portal_block_4" class="block move-span">
                <div id="portal_block_4_content" class="dxb_bc">
                  <div class="portal_block_summary">
                    <div class="itofeedback cl">
                      <a class="bluebigbutton"  href="/topicsmodal" title="发帖">发帖</a>
                      <a href="/signin/create" target="_blank" class="greenbigbutton" title="签到" style="margin-right: 0;">签到</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="frameyexZNq" class="frame move-span cl frame-1">
            <div id="frameyexZNq_left" class="column frame-1-c">
              <div id="frameyexZNq_left_temp" class="move-span temp"></div>
              <div id="portal_block_11" class="block move-span">
                <div id="portal_block_11_content" class="dxb_bc">
                  <div class="box">
                    <h3 class="modname">公告</h3>
                    <div class="s_topic">

                      <ul style="margin-left: 22px;line-height: 30px;">
                      @foreach($announcements as $k=>$v)
                        <a href="/home/announcements/index/{{ $v->id }}"><li style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" onmousemove="over(this);" onmouseout="out(this);">{{ $v->title }}</li></a>
                      @endforeach
                      </ul>
                      <script type="text/javascript">
                        function over(obj)
                        {
                            obj.style.color = "red";
                        }

                        function out(obj)
                        {
                            obj.style.color = "";
                        }
                        
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--[/diy]--></div>
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
        <div id="tabI6ABg6" class="frame-tab move-span cl">
          <div id="tabI6ABg6_title" class="tab-title title column cl tab-style" switchtype="mouseover">
            <div id="portal_block_17" class="block move-span">
              <div class="blocktitle title">
                <span class="titletext" style="float:;margin-left:px;font-size:;color: !important;">热帖排行榜</span></div>
              <div id="portal_block_17_content" class="dxb_bc">
                <div class="box s_timeline">
                  <div class="s_text_list">
                    <div class="nano has-scrollbar">
                      <ul style="right: -17px;" tabindex="0" class="nano-content">
                        @foreach($topics_hot as $k=>$v)
                        <li>
                          <i>
                            <span></span>
                          </i>
                          <a href="/topics/{{ $v->id }}" target="_blank">{{ $v->ttitle }}</a>
                          <p>{{ $v->created_at }}</p>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div id="tabrxfoEN_content" class="tb-c"></div>
              <script type="text/javascript">initTab("tabrxfoEN", "mouseover");</script></div>
            <div class="portal_block_summary">
              <div class="forum_newbie" style="display: block;background:none;height:130px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabp945F3_content" class="tb-c"></div>
      <script type="text/javascript">initTab("tabp945F3", "mouseover");</script></div>
  </div>
  <!--[/diy]--></div>
</div>
</div>
@endsection