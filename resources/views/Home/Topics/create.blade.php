@extends('Home.Layout.index')
@section('content')
<div id="wp" class="wp time_wp cl">
  <script type="text/javascript">
    var allowpostattach = parseInt('1');
    var allowpostimg = parseInt('1');
    var pid = parseInt('0');
    var tid = parseInt('0');
    var extensions = '';
    var imgexts = 'jpg, jpeg, gif, png, bmp';
    var postminchars = parseInt('10');
    var postmaxchars = parseInt('10000');
    var disablepostctrl = parseInt('1');
    var seccodecheck = parseInt('0');
    var secqaacheck = parseInt('0');
    var typerequired = parseInt('');
    var sortrequired = parseInt('');
    var special = parseInt('0');
    var isfirstpost = 1;
    var allowposttrade = parseInt('1');
    var allowpostreward = parseInt('1');
    var allowpostactivity = parseInt('1');
    var sortid = parseInt('0');
    var special = parseInt('0');
    var fid = 286;
    var postaction = 'newthread';
    var ispicstyleforum = 0;</script>
  <script src="/home/js/forum_post.js?Ac9" type="text/javascript"></script>
  <div id="pt" class="bm cl">
    <div class="z">
      <a href="/" class="nvhm" title="首页">机枫论坛_每个人的交流社区</a>
      <em>›</em>
      <a href="/">论坛</a>
      <em>›</em>
      <a href="/cates/{{ $cates->id }}">:::. {{ $cates_prev->cname}} :::.</a>
      <em>›</em>
      <a href="/cates/topics/{{ $cates->id }}">{{ $cates->cname }}</a>
      <em>›</em>发表帖子</div></div>
  <form method="post" autocomplete="off" id="postform" action="/topics"  >
    {{ csrf_field() }}
    <div id="ct" class="ct2_a ct2_a_r wp cl">
      <input type="hidden" name="uid" id="uid" value="{{session('homeuser')->id }}">
      <input type="hidden" name="cid" id="cid" value="{{ $cates->id }}">
      <div class="bm bw0 cl" id="editorbox">
        <ul class="tb cl mbw">
          <li class="a">
            <a href="javascript:;">发表帖子</a></li>
        </ul>
        <div id="draftlist_menu" style="display:none">
          <ul class="xl xl1">
          </ul>
        </div>
        <div id="postbox">
          <div class="pbt cl">
            <div class="ftid">
              <select name="tmark" id="tmark" width="80" selecti="0" style="height:27px;width:120px">
                  <option value="0"  disabled selected hidden>选择主题分类</option>
                  @if($cates->cname == "APP优选")
                  <option value="软件优选">软件优选</option>
                  <option value="游戏优选">游戏优选</option>
                  <option value="枫友分享">枫友分享</option>
                  @elseif($cates->cname == "游戏下载")
                  <option value="竞速">竞速</option>
                  <option value="飞行">飞行</option>
                  <option value="射击">射击</option>
                  <option value="体育">体育</option>
                  <option value="塔防">塔防</option>
                  <option value="棋牌">棋牌</option>
                  <option value="网游">网游</option>
                  <option value="模拟器">模拟器</option>
                  <option value="模拟经营">模拟经营</option>
                  <option value="游戏工具">游戏工具</option>
                  @elseif($cates->cname == "软件下载")
                  <option value="问题讨论">问题讨论</option>
                  <option value="求资源">求资源</option>
                  <option value="集合帖">集合帖</option>
                  <option value="实用工具">实用工具</option>
                  <option value="系统工具">系统工具</option>
                  <option value="网络通讯">网络通讯</option>
                  <option value="主题美化">主题美化</option>
                  <option value="桌面插件">桌面插件</option>
                  <option value="影音娱乐">影音娱乐</option>
                  <option value="出行拍照">出行拍照</option>
                  <option value="生活购物">生活购物</option>
                  <option value="资讯阅读">资讯阅读</option>
                  <option value="社交聊天">社交聊天</option>
                  <option value="办公学习">办公学习</option>
                  <option value="其他">其他</option>
                  @elseif($cates->cname == "购机讨论")
                  <option value="每日行情">每日行情</option>
                  <option value="选购宝典">选购宝典</option>
                  <option value="购机讨论">购机讨论</option>
                  <option value="二手交易">二手交易</option>
                  @elseif($cates->cname == "智能硬件")
                  <option value="最新资讯">最新资讯</option>
                  <option value="手表手环">手表手环</option>
                  <option value="智能家电">智能家电</option>
                  <option value="耳机音响">耳机音响</option>
                   @elseif($cates->cname == "枫友问答")
                  <option value="系统">系统</option>
                  <option value="应用">应用</option>
                  <option value="刷机">刷机</option>
                  <option value="硬件">硬件</option>
                  <option value="提问">提问</option>
                  <option value="维修">维修</option>
                  <option value="教程">教程</option>
                  <option value="开发">开发</option>
                   @elseif($cates->cname == "枫友晒物")
                  <option value="高级讨论">高级讨论</option>
                  <option value="手机平板">手机平板</option>
                  <option value="智能硬件">智能硬件</option>
                  <option value="数码配件">数码配件</option>
                  <option value="耳机音响">耳机音响</option>
                  <option value="摄影大师">摄影大师</option>
                  <option value="个人电脑">个人电脑</option>
                  @endif
                  <option value="其它">其它</option>
                  <option value="问答">问答</option>
              </select>
            </div>
            <div class="z">
              <span>
                <input type="text" name="ttitle" id="ttitle" class="px" value="" onblur="if($('tags')){relatekw('-1','-1');doane();}" onkeyup="strLenCalc(this, 'checklen', 80);" style="width: 25em" tabindex="1"></span>
              <span id="subjectchk">还可输入
                <strong id="checklen">80</strong>个字符</span>
              <script type="text/javascript">strLenCalc($('subject'), 'checklen', 80)</script>
            </div>
          </div>
          <div class="z">
            <script id="container" name="tcontent" type="text/plain"></script>
          </div>
          <div class="mtm mbm pnpost">
            <button type="submit" class="pn pnc" onclick=" return checkForm()">
              <span>发表帖子</span></button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- 引入jquery -->
<script type="text/javascript"  src="/home/js/jquery-1.7.2.min.js"></script>
 <!-- 加载编辑器的容器 -->
    
    <!-- 配置文件 -->
    <script type="text/javascript" src="/admin/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/admin/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
          toolbars: [
                        ['fullscreen', 'source', 'undo', 'redo'],
                        ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
                    ],initialFrameWidth:1100,
                    initialFrameHeight:350
        });
        //验证表单数据
        function checkForm()
        {
          var tmark = document.getElementById('tmark');
          var ttitle = document.getElementById('ttitle');
          
          if(tmark.value == "0"){
            alert('请选择主题类别！');
            return false;
          }
          if(ttitle.value == ''){
            alert('主题标题不能为空！');
            return false;
          }
          if(ue.getContent() == ''){
            alert('主题内容不能为空！');
            return false;
          }  
          return true;
        }
    </script>
@endsection