@extends('Home.Layout.index')
@section('content')  

<body id="nv_home" class="pg_space" onkeydown="if(event.keyCode==27) return false;">
  <!-- <div id="append_parent"><div id="tip_0.14326361513937913_menu" class="tip tip_4" initialized="true" style="position: absolute; z-index: 501; left: 381.266px; top: 500px;"><div class="tip_horn"></div><div class="tip_c"></div></div></div> --> 
  
  <!-- <form id="scbar_form" method="post" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="search.php?searchsubmit=yes" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="forum">
<input type="hidden" name="formhash" value="94193da3">
<input type="hidden" name="srchtype" value="title">
<input type="hidden" name="srhfid" value="0">
<input type="hidden" name="srhlocality" value="home::space">
<table cellspacing="0" cellpadding="0">
<tbody><tr>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="xi2">搜索</strong></button></td>   
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="xg1" onclick="showMenu(this.id)" hidefocus="true">帖子</a></td>                         
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech="" speech="" class=" xg1 xg1" placeholder="请输入搜索内容"></td>
</tr>
</tbody></table>
</form> -->  

  <ul id="scbar_type_menu" class="p_pop" style="display: none;">
   <li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
   <li><a href="javascript:;" rel="user">用户</a></li>
  </ul> 
  <script type="text/javascript">
initSearchmenu('scbar', '');
</script> 

  <!-- 搜索筛选 --> 
  <ul id="scbar_type_menu" class="p_pop" style="display: none;"> 
   <li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
   <li><a href="javascript:;" rel="user">用户</a></li>
  </ul> 
  <script type="text/javascript">
initSearchmenu('scbar', '');
</script>   
  <div class="fm_line"></div>  
  <div class="mus_box cl"> 
   <div id="mus" class="wp cl"> 
   </div> 
  </div> 
  
  <!-- 二级导航 --> 
 
  <!-- 用户菜单 --> 
  
  <!-- <div id="wp" class="wp time_wp cl"><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页">兄弟连论坛_每个人的交流社区</a> <em>›</em>
<a href="http://d.bbs.itxdl.cn/space-uid-450096.html">淼淼1998M</a> <em>›</em>
个人资料
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]-->
  <div id="diy1" class="area"></div>
  <!--[/diy]--> 
  <link rel="stylesheet" type="text/css" href="/home/css/home.css" />  
   <div id="uhd"> 
    <div class="space_h cl"> 
     <div class="icn cl">
      <a href=""><img src="/upload/{{ $user_data->face }}" /></a>
     </div> 
     <h2 class="mt">{{ $user_data->nickname or '某某' }}</h2> 
        @if(!$follows->isEmpty())
        <p class="follow_us">
          <a href="" id="a_friend_li_129412"  class="xi2 new1">已关注</a>
        </p>
        @elseif($id == session('homeuser')['id'])
        <p class="follow_us">
        <a href="/users/follows/{{$id}}" id="a_friend_li_446737"  class="xi2 new1">我的关注</a>
        <a href="/users/fans/{{$id}}" id="a_sendpm_446737" title="我的粉丝" class="old1">粉丝</a>
        </p>
        @else 
        <p class="follow_us">
          <a href="/users/addfollow/{{$id}}"  class="xi2 new1">+关注</a>
        </p>
        @endif
   
     <p class="manage cl"> <a href="http://d.bbs.itxdl.cn/?450096" class="xg1" style="display: none;">http://d.bbs.itxdl.cn/?450096</a> </p> 
    </div> 
   </div> 
   <div class="wp cl"> 
    <div class="space_nav cl"> 
     <ul class="tb_1 cl" id="lanmu"> 
      @if($index == 0)  
          
      <li class="a"><a href="/users/index/{{$id}}"><img src="/home/picture/space_profile.png" class="vm" />TA的资料</a></li> 
          @if($id == session('homeuser')['id'])
      <li><a href="/users/topics/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的帖子</a></li>
      <li><a href="/users/collection/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的收藏</a></li> 
      <li><a href="/users/follows/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的关注</a></li> 
           @endif
      @elseif($index == 1)  
      <li><a href="/users/index/{{$id}}"><img src="/home/picture/space_profile.png" class="vm" />TA的资料</a></li> 
      <li class="a"><a href="/users/topics/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的帖子</a></li>
      <li><a href="/users/collection/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的收藏</a></li> 
      <li><a href="/users/follows/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的关注</a></li> 
      @elseif($index == 2) 
      <li><a href="/users/index/{{$id}}"><img src="/home/picture/space_profile.png" class="vm" />TA的资料</a></li> 
      <li><a href="/users/topics/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的帖子</a></li>
      <li class="a"><a href="/users/collection/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的收藏</a></li> 
      <li><a href="/users/follows/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的关注</a></li>        
      @elseif($index == 3)
      <li><a href="/users/index/{{$id}}"><img src="/home/picture/space_profile.png" class="vm" />TA的资料</a></li> 
      <li><a href="/users/topics/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的帖子</a></li>
      <li><a href="/users/collection/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的收藏</a></li> 
      <li class="a"><a href="/users/follows/{{$id}}"><img src="/home/picture/space_thread.png" class="vm" />我的关注</a></li>
      @endif  

     </ul> 
    </div> 
   </div> 


  <!--  -->
  @section('body')



  @show
  
  <!--  -->
   <div class="wp mtn"> 
    <!--[diy=diy3]-->
    <div id="diy3" class="area"></div>
    <!--[/diy]--> 
   </div> 
  </div> 
  
  <script type="text/javascript">
jQuery.noConflict();
jQuery(function(){
        //首先将#back-to-top隐藏
        jQuery("#share").hide();
        //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
        jQuery(function () {
            jQuery(window).scroll(function(){
                if (jQuery(window).scrollTop()>100){
                    jQuery("#share").fadeIn();
                }
                else
                {
                    jQuery("#share").fadeOut();
                }
            });
            //当点击跳转链接后，回到页面顶部位置
            jQuery("#totop").click(function(){
                jQuery('body,html').animate({scrollTop:0},500);
                return false;
            });
        });
    }); 
</script>  
  <script> 
(function(){ var bp = document.createElement('script'); var curProtocol = window.location.protocol.split(':')[0]; if (curProtocol === 'https') { bp.src = 'https://zz.bdstatic.com/linksubmit/push.js'; } else { bp.src = 'http://push.zhanzhang.baidu.com/push.js'; } var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(bp, s); })(); 
</script> 

@if (session('error'))
    <input type="hidden" name="" id="error" value="{{session('error')}}">
     <script type="text/javascript">
            alert($('#error').val());
     </script>
@endif
@if(session('success')) 
     <input type="hidden" name="" id="success" value="{{session('success')}}">
     <script type="text/javascript">
            alert($('#success').val());
     </script>
@endif
@endsection