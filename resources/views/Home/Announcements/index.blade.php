@extends('Home.Layout.index')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<link rel="stylesheet" type="text/css" href="/home/css/style_2_forum_viewthread.css" />
<div id="wp" class="wp time_wp cl">
  <script type="text/javascript">var fid = parseInt('271'),
    tid = parseInt('240393');</script>
  <script src="/home/js/forum_viewthread.js" type="text/javascript"></script>
  <script type="text/javascript">zoomstatus = parseInt(1);
    var imagemaxwidth = '600';
    var aimgcount = new Array();</script>
  <style id="diy_style" type="text/css"></style>
  <!--[diy=diynavtop]-->
  <div id="diynavtop" class="area"></div>
  <!--[/diy]-->
  <div id="pt" class="bm cl">
    <div class="z">
      <a href="/">首页</a>
      <em>›</em>
      <a href="">:::. 公告 :::.</a>
      <em>›</em>

      <a href="">查看内容</a></div>
  </div>
  <script src="/home/js/jquery-1.4.4.min.js" type="text/javascript"></script>
  <script type="text/javascript">jQuery.noConflict();</script>
  <script type="text/javascript">(function(d) {
      j = d.createElement('script');
      j.src = '//openapi.guanjia.qq.com/fcgi-bin/getdzjs?cmd=urlquery_gbk_zh_cn';
      j.setAttribute('ime-cfg', 'lt=2');
      d.getElementsByTagName('head')[0].appendChild(j)
    })(document)</script>
  <link rel="stylesheet" type="text/css" href="/home/css/style.css">
  <style id="diy_style" type="text/css"></style>
  <div class="wp">
    <!--[diy=diy1]-->
    <div id="diy1" class="area"></div>
    <!--[/diy]--></div>
    @foreach($users as $k=>$v)
  <div id="ct" class="wp ct2 cl">
    <div class="cl" >
      <div class="sd" style="padding-right: 0px;padding-left: 0px;">
        <div class="quater_author_info cl">
          <div class="quater_author_info_1 cl">
            <a href="/users/index/{{ $v->id }}" target="_blank" class="toux">

              <img src="/upload/{{ $v->face }}" data-bd-imgshare-binded="1"></a>
            <p>
              <a href="/users/index/{{ $v->id }}" target="_blank">{{ $v->nickname }}</a></p>
            <p style="margin-top: 3px;">
              <a href="#" target="_blank" style="color: #FF0000;">
                
              </a></p>
            <div class="time_thread_stat cl">
              
            </div>
          </div>
          <div class="quater_author_info_3 cl" style="background: #F9F9F9;">
            <div class="s_timeline s_timeline2 cl" style="margin: 0 20px 20px 20px;">
              <ul style="border-top: 0;"></ul>
            </div>
          </div>
        </div>
        <!-- 如果想要右边出现，请去掉display: none -->
        <!--[diy=diy_right_1]-->
        <div id="diy_right_1" class="area" style="display: none;"></div>
        <!--[/diy]-->
        <!--[diy=diy_right_2]-->
        <div id="diy_right_2" class="area" style="display: none;"></div>
        <!--[/diy]--></div>

        <div class="mn">
          <div class="box cl" style="padding: 25px 25px 10px 25px; background: #FFFFFF;">
            <div class="zprrtt cl">
              <div class="moquu_rrskzx">
                <div class="moquu_date">
                  <div class="moquu_rrbt cl">
                    <div class="css cl">
                      <div class="moquu_mz cl">
                        <h1>
                          <a href="http://bbs.itxdl.cn/read-htm-tid-240393-page-1.html" onclick="return copyThreadUrl(this, '兄弟连论坛_每个人的交流社区')">{{ $announcements->title }}</a></h1>
                      </div>
                      <div class="moquu_small" style="margin-top: 20px;">
                        <p>
                          <a href="/vip" class=""></a>©
                          <a href="" target="_blank">{{ $announcements->author }}</a>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布时间&nbsp;&nbsp;{{ $announcements->created_at }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="postlist" class="pl bm" style="padding: 25px 0 0 0;">
              <div id="post_1154080">
                <table id="pid1154080" class="plhin" summary="pid1154080" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="plc" style="width:100%">
                        <div class="pct">
                          <style type="text/css">.pcb{margin-right:0}</style>
                          <div class="pcb">
                            <div class="t_fsz">
                              <table cellspacing="0" cellpadding="0">
                                <tbody>
                                  <tr>
                                    <td class="t_f" id="postmessage_1154080">{!! $announcements->content !!}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div id="comment_1154080" class="cm"></div>
                            <div id="post_rate_div_1154080"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="plc plm" style="height: 400px;">
                        <div id="p_btn" class="mtw hm cl" style="margin-bottom: 30px;"></div>
                        <div id="viewthread_foot cl">
                          
                        </div>
                      </td>
                    </tr>
                    <tr id="_postposition1154080"></tr>
                    <tr>
                      <td class="plc" style=" padding:0;"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--[diy=diy_like]-->
          <div id="diy_like" class="area"></div>
          <!--[/diy]-->

          <!--[diy=diy_like1]-->
          <div id="diy_like1" class="area"></div>
          <!--[/diy]-->

        </div>
    </div>
  </div>
  @endforeach
  <div class="wp mtn">
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--></div>
</div>
@endsection