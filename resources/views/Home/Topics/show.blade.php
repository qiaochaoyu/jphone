@extends('Home.Layout.index')
@section('content')
@if (session('success'))
            <div class="alert alert-success" style="width:100%,height:50px;color: #2BDA3D;font-size:25px;margin-left:250px;">
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
      <a href="/cates/{{ $cates_prev->id }}">:::. {{ $cates_prev->cname }} :::.</a>
      <em>›</em>
      <a href="/cates/topics/{{ $cates->id }}">{{ $cates->cname }}</a>
      <em>›</em>
      <a href="/topics/{{ $topics->id }}">查看内容</a></div>
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
  <div id="ct" class="wp ct2 cl">
    <div class="cl" >
      <div class="sd" style="padding-right: 0px;padding-left: 0px;">
        <div class="quater_author_info cl">
          <div class="quater_author_info_1 cl">
            <a href="/users/index/{{ $users->id }}" target="_blank" class="toux">
              <img src="/upload/{{ $users->face }}" data-bd-imgshare-binded="1"></a>
            <p>
              <a href="http://d.bbs.itxdl.cn/space-uid-442070.html" target="_blank">{{ $users->nickname }}</a></p>
            <p style="margin-top: 3px;">
              <a href="#" target="_blank" style="color: #FF0000;">
                @if($users->ascore >=  3000)
                班长
                @elseif($users->ascore >=  750)
                士官
                @elseif($users->ascore >=  350)
                上士
                @elseif($users->ascore >=  200)
                中士
                @elseif($users->ascore >=  100)
                下士
                @elseif($users->ascore >=  35)
                新兵
                @elseif($users->ascore >=  1)
                预备役
                @else
                民兵
                @endif
              </a></p>
            <div class="time_thread_stat cl">
              <ul>
                <li>
                  <a>{{ $users->ascore }}</a>
                  <p>积分</p>
                </li>
                <li>
                  <a>{{ $count }}</a>
                  <p>帖子</p>
                </li>
                <li style="border-right: 0;">
                  <a>{{ $count_cream }}</a>
                  <p>精华</p>
                </li>
              </ul>
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
                        <a href="http://bbs.itxdl.cn/read-htm-tid-240393-page-1.html" onclick="return copyThreadUrl(this, '兄弟连论坛_每个人的交流社区')">{{ $topics->ttitle }}</a></h1>
                    </div>
                    <div class="moquu_small">
                      <p>
                        <a href="/vip" class=""></a>©
                        <a href="/users/index/{{ $users->id }}" target="_blank">{{ $users->nickname }}</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$topics->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span>
                          <a href="http://d.bbs.itxdl.cn/home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=240393&amp;formhash=327233d2" id="k_favorite" onclick="showWindow(this.id, this.href, 'get', 0);" onmouseover="this.title = $('favoritenumber').innerHTML + ' 人收藏'" title="收藏本帖" class="k_favorite" style="padding-right: 10px;">
                            <i></i>{{ $collections }} 人收藏</a>
                         </span>
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
                                  <td class="t_f" id="postmessage_1154080">{!! $topics->tcontent !!}</td>
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
                    <td class="plc plm">
                      <div id="p_btn" class="mtw hm cl" style="margin-bottom: 30px;"></div>
                      <div id="viewthread_foot cl">
                        <div class="viewthread_foot cl" style="margin-bottom: 0; border-bottom: 0;">
                          <span class="cutline" style="margin: 9px 10px 0 0;"></span>
                          @if (!$collection &&  session('homeuser')['id'])
                          <a href="/topics/addcollection/{{ session('homeuser')['id'] }}/{{$topics->id }}" id="k_favorite"   title="收藏本帖" class="k_favorite">收藏</a>
                          @elseif (!session('homeuser')['id'])
                          <a href="/home/login" id="k_favorite"   title="收藏本帖" class="k_favorite">收藏</a>
                          @else
                          <a href="/users/remove/{{ $collection->id }}" id="k_favorite"   title="收藏本帖" class="k_favorite">已收藏</a>
                          @endif
                        </div>
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
        <div class="box cl" style="padding: 25px 25px 0 25px;">
          <div id="postlist" class="pl bm postlist_reply">
            <div class="reply_tit cl">
              <h2>
                <strong>{{ $topics->replys->count() }}</strong>个回复</h2>
            </div>
            <div id="post_1068720">
              <table id="pid1068720" class="plhin" summary="pid1068720" cellspacing="0" cellpadding="0">
                @foreach($replys as $k=>$v)
                <tbody>
                  <tr>
                    <td class="plc" style="width:100%">
                      <i class="arr"></i>
                      <div class="pi " style="height: 50px; padding-bottom: 0; border-bottom: 0;">
                        <div class="pti" style="color: #515151;">
                          <div class="authi">
                            <div class="cl" style="float: left; width: 50px; overflow: hidden;">
                              <a href="/users/index/{{ $v->users->id }}" target="_blank" class="xi2 z inside_avt" style="padding-right: 0;">
                                <img src="/upload/{{ $v->users->face }}" data-bd-imgshare-binded="1"></a>
                            </div>
                            <div class="cl" style="float: right; width: 660px; overflow: hidden;">
                              <div class="cl" style="height: 30px; margin: 7px 0 0 0; overflow: hidden;">
                                <em id="authorposton1068720">
                                  <a href="http://d.bbs.itxdl.cn/space-uid-442000.html" target="_blank" style="padding: 0 5px 0 0; color: #333333; font-size: 14px; font-weight: 400;">{{ $v->users->nickname }}</a></em>
                                <a href="http://d.bbs.itxdl.cn/home.php?mod=spacecp&amp;ac=usergroup&amp;gid=20" target="_blank" style="padding: 0 10px 0 5px;">
                                  @if($v->users->ascore >=  3000)
                                  班长
                                  @elseif($users->ascore >=  750)
                                  士官
                                  @elseif($users->ascore >=  350)
                                  上士
                                  @elseif($users->ascore >=  200)
                                  中士
                                  @elseif($users->ascore >=  100)
                                  下士
                                  @elseif($users->ascore >=  35)
                                  新兵
                                  @elseif($users->ascore >=  1)
                                  预备役
                                  @else
                                  民兵
                                  @endif
                                </a>
                                <em style="padding: 0 10px 0 0; color: #BBBBBB;">{{ $v->created_at }}</em>
                                <div style="display:none;">
                                  <span class="pipe">|</span>
                                  <a href="http://bbs.itxdl.cn/forum.php?mod=viewthread&amp;tid=240393&amp;page=1&amp;authorid=442000" rel="nofollow">只看该作者</a></div>
                                <div style="display:none;"></div>
                                <strong style="margin: 0;" class="floors y">
                                  <a href="http://bbs.itxdl.cn/forum.php?mod=redirect&amp;goto=findpost&amp;ptid=240393&amp;pid=1068720" id="postnum1068720" onclick="setCopy(this.href, '帖子地址复制成功');return false;" style="line-height: 18px; padding: 2px 5px;">
                                  @if($k == 0)
                                  沙发
                                  @elseif($k == 1)
                                  板凳
                                  @elseif($k == 2)
                                  地板
                                  @else
                                  {{$k+2}}#
                                  @endif
                                </a></strong>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pct" style="padding-left: 60px; color: #515151;">
                        <div class="pcb">
                          <div class="t_fsz">
                            <table cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr>
                                  <td class="t_f" id="postmessage_1068720">{!! $v->rcontent !!}</td>
                                </tr>
                                @foreach($v->answers as $kk=>$vv)
                                <tr>
                                 <td style="padding-left: 60px;"> {{$vv->created_at}}</td>
                                </tr>
                                <tr>
                                 <td style="padding-left: 80px;"> {!! $vv->users->nickname !!} &nbsp; : &nbsp; {!! $vv->acontent !!}</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                          <div id="comment_1068720" class="cm"></div>
                          <div id="post_rate_div_1068720"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="plc plm" style="overflow: visible;"></td>
                  </tr>
                  <tr id="_postposition1068720"></tr>
                  <tr>
                    <td class="plc" style="overflow:visible;--> width:100%">
                      <div class="po bbd reply_p">
                      <script type="text/javascript" src='/home/js/jquery-1.11.1.min.js'></script>
                 
                        <div class="pob cl">
                          <span style="float: left;" > 
                            <a  href="javascript:;" id="answer{{$v->id}}" onclick="answer( {{$v->id}} )"> 回复</a> 
                          </span> 
                          <script type="text/javascript" reload="1">checkmgcmn('post_1068720')</script></div>
                          <form  action="/answers/store" id="answer_form{{ $v->id }}" method="post" hidden>
                            {{ csrf_field() }}
                            <input type="text" id="acontent{{$v->id}}" name="acontent" >
                            <input type="hidden" name="rid" value="{{$v->id}}">
                            <input type="hidden" name="tid" value="{{ $topics->id }}">
                            <input type="button" value="回复" onclick="validata({{ $v->id }})">
                            <input type="button" value="关闭" onclick="closer({{ $v->id }})">
                          </form>
                      </div>
                    </td>
                  </tr>
                  <tr class="ad">
                    <td class="pls"></td>
                  </tr>
                </tbody>
                @endforeach
                 <script type="text/javascript">
                    //显示回复表单方法
                    function answer(rid)
                    {
                    //回复
                     var answer = 'answer' + rid;
                     document.getElementById(answer).hidden=true;
                     //回复表单
                     var answer_form = 'answer_form' + rid;
                     document.getElementById(answer_form).hidden=false;
                    }
                    //隐藏回复表单方法
                    function closer(rid){
                      //定义回复的变量
                     var answer = 'answer' + rid;
                     document.getElementById(answer).hidden=false;
                     //回复表单
                     var answer_form = 'answer_form' + rid;
                     document.getElementById(answer_form).hidden=true;
                    }
                    //验证数据方法
                    function validata(rid){
                      var answer_form = 'answer_form' + rid;
                      var acontent_id = 'acontent' + rid;
                      var acontent = document.getElementById(acontent_id);
                      if(acontent.value == ""){
                        alert("回复不能为空！囧!");
                        return false;
                      }
                      document.getElementById(answer_form).submit();
                    }
                  </script>
              </table>
            </div>
            <div id="postlistreply" class="pl">
              <div id="post_new" class="viewthread_table" style="display: none;"></div>
            </div>
          </div>
          
          <div class="pgs mtm mbm cl" style="padding: 20px 0 0 0;"></div>
          <!--[diy=diyfastposttop]-->
          <div id="diyfastposttop" class="area"></div>
          <!--[/diy]-->
          <script type="text/javascript">document.onkeyup = function(e) {
              keyPageScroll(e, 0, 0, 'forum.php?mod=viewthread&tid=240393', 1);
            }</script>
        </div>

        
        <!--[diy=diy_like1]-->
        <div id="diy_like1" class="area"></div>
        <!--[/diy]-->
        <div id="f_pst" class="pl bm bmw" @if($topics->stoprep) hidden @endif>
          <form method="post" autocomplete="off" id="fastpostform" action="/replys" hidde >
            <table cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="plc">
                    <span id="fastpostreturn"></span>
                    <div class="cl">
                      <div id="fastsmiliesdiv" class="y" style="margin-top: 60px;">
                        <div id="fastsmiliesdiv_data">
                          <div id="fastsmilies"></div>
                        </div>
                      </div>
                      <div class="hasfsl" id="fastposteditor">
  
                        <div class="tedt mtn" >
                          
                            <div @if(!session('homeuser')) hidden @endif>
                                {{ csrf_field() }}
                                <input type="hidden" name="tid" value="{{ $topics->id }}">
                                <script id="container" name="rcontent" type="text/plain">
                                </script>
                                <script type="text/javascript" src="/admin/utf8-php/ueditor.config.js"></script>
                                <!-- 编辑器源码文件 -->
                                <script type="text/javascript" src="/admin/utf8-php/ueditor.all.js"></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('container',{
                                      toolbars: [
                                    ['fullscreen', 'source', 'undo', 'redo'],
                                    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
                                  ],
                                  initialFrameHeight:120,
                                  initialFrameWidth:798
                                    });
                                    //回帖提交
                                    function replys_submit(){
                                        $("#replys_form").submit();
                                    }
                                </script>
                            </div> 
                          
                          <div class="area" @if(session('homeuser')) hidden @endif >
                            <div class="pt hm">您需要登录后才可以回帖
                              <a href="/home/login"  class="xi2"><b>登录</b></a>|
                              <a href="/home/register" class="xi2"><b>立即注册</b></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="pnpost cl" style="padding-top: 10px;" @if(!session('homeuser')) hidden @endif>
                      <button  onclick="replys_submit()"  class="pn pnc vm" tabindex="5" style="float: right; padding: 0; height: 35px; line-height: 35px;">
                        <strong style="padding: 0 15px; font-size: 14px; font-weight: bold;">发表回复</strong>
                      </button>
                      <em style="float: right; margin: 2px 0 0 0;"></em>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="wp mtn">
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--></div>
</div>
@endsection