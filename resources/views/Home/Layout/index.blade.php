
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>机枫论坛-专业、有态度的综合性手机论坛 - </title>

<meta name="keywords" content="手机论坛,机枫论坛" />
<meta name="description" content="{{ $data_array[2]->wdescribe }}" />

<meta name="generator" content="Discuz! X3.3" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2013 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel="stylesheet" type="text/css" href="/home/css/style_2_common.css" />
<link rel="stylesheet" type="text/css" href="/home/css/style_2_forum_index.css" /> 
<link rel="stylesheet" type="text/css" href="/home/css/style_2_forum_forumdisplay.css" />
<link rel="stylesheet" type="text/css" href="/home/css/pages.css" />

<script src="/home/js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">var STYLEID = '2', STATICURL = '/home/', IMGDIR = '/home/image/common', VERHASH = 'Ac9', charset = 'gbk', discuz_uid = '0', cookiepre = '6tcf_40b9_', cookiedomain = '.itxdl.cn', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|威望|,2|金钱|,3|贡献|', defaultstyle = '', REPORTURL = 'aHR0cDovL2Jicy5pdHhkbC5jbi8=', SITEURL = 'http://bbs.itxdl.cn/', JSPATH = '/js/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
<script src="/home/js/common.js" type="text/javascript"></script>
    <!--[if IE 6]>
     <script language='javascript' type="text/javascript">   
    function ResumeError() {  
         return true;  
    }  
    window.onerror = ResumeError;   
    </script> 
    <![endif]-->
<meta name="application-name" content="机枫论坛_每个人的交流社区" />
<meta name="msapplication-tooltip" content="机枫论坛_每个人的交流社区" />
<meta name="msapplication-task" content="" />
<link rel="archives" title="机枫论坛_每个人的交流社区" href="" />
<link rel="stylesheet" id="css_widthauto" type="text/css" href="/home/css/style_2_widthauto.css" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<script src="/home/js/forum.js" type="text/javascript"></script>
</head><body id="nv_forum" class="pg_index" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
 
 
<div id="Quater_headtop" >
  <div class="wp cl">
        </div>

  <div id="Quater_bar" class="cl"> 
    <div class="wp cl">
      <!-- 站点LOGO -->
      <div class="hd_logo"> 
          <h2><a href="/"><img src="/upload/{{ $data_array[2]->wlogo }}"  style="width:140px;" /></a></h2>
      </div>
      <!-- 导航 -->
      <div class="nav">
        <ul>
          @foreach( $data_array[0] as $k=>$v)
          <li id="mn_{{ $v->id }}" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})">
            <a href="/cates/{{ $v->id }}" hidefocus="true"  >{{ $v->cname }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="th_post y cl" style="display: none;"><a onClick="showWindow('newthread', 'forum.php?mod=post&amp;action=newthread&amp;fid=')" href="javascript:;" title="发新帖" style="margin: 0;">发布</a>
      </div>
      <!-- 用户信息 --> 
      @if(session('homeuser'))
      <div class="Quater_user logined">
      <div class="Quater_user_info">
        <div class="user-main ">
          <div class="avatar">
            <a href="/users/index/{{ session('homeuser')->id }}" target="_blank" title="访问我的空间" id="umnav" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'a'})">
              <img src="/upload/{{ session('homeuser')->face }}"></a>
          </div>
          <span class="nickname">{{ session('homeuser')->nickname }}</span>
          <span class="arrow"></span>
        </div>
        <div class="user-link">
          <ul>
            <li>
              <a href="/home/users/update">个人资料</a></li>
            <li class="l4">
              <a href="/home/loginout">退出登录</a></li>
          </ul>
        </div>
      </div>
      </div>
      @else
      <div class="Quater_user" style="width: 88px; margin-left: 20px; line-height: 60px; font-size: 14px;">
         <ul>
            <li class="z"><a href="/home/login"><i></i>登录</a></li>
            <span class="pipe z" style="margin: 0 12px; color: #e6e6e6;">|</span>
            <li class="z"><a href="/home/register" ><i></i>注册</a></li>
         </ul>
      </div>
    @endif

      <div style="display:none"><script src="/home/js/logging.js" type="text/javascript"></script>
<form method="post" autocomplete="off" id="lsform" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;infloat=yes&amp;lssubmit=yes" onsubmit="return lsSubmit();">
<div class="fastlg cl">
<span id="return_ls" style="display:none"></span>
<div class="y pns">
<table cellspacing="0" cellpadding="0">
<tr>
<td>
<span class="ftid">
<select name="fastloginfield" id="ls_fastloginfield" width="40" tabindex="900">
<option value="username">用户名</option>
<option value="email">Email</option>
</select>
</span>
<script type="text/javascript">simulateSelect('ls_fastloginfield')</script>
</td>
<td><input type="text" name="username" id="ls_username" autocomplete="off" class="px vm" tabindex="901" /></td>
<td class="fastlg_l"><label for="ls_cookietime"><input type="checkbox" name="cookietime" id="ls_cookietime" class="pc" value="2592000" tabindex="903" />自动登录</label></td>
<td>&nbsp;<a href="javascript:;" onclick="showWindow('login', 'member.php?mod=logging&action=login&viewlostpw=1')">找回密码</a></td>
</tr>
<tr>
<td><label for="ls_password" class="z psw_w">密码</label></td>
<td><input type="password" name="password" id="ls_password" class="px vm" autocomplete="off" tabindex="902" /></td>
<td class="fastlg_l"><button type="submit" class="pn vm" tabindex="904" style="width: 75px;"><em>登录</em></button></td>
<td>&nbsp;<a href="member.php?mod=register" class="xi2 xw1">立即注册</a></td>
</tr>
</table>
<input type="hidden" name="quickforward" value="yes" />
<input type="hidden" name="handlekey" value="ls" />
</div>
</div>
</form>

</div>
            <div href="javascript:void(0)" target="_blank" class="headerbtn header_search newbtn" title="搜索">
      </div>
      <div style="display: none;" class="Quater_search"> 
       <div class="wp cl" style="position: relative; z-index: 1000;"s>
          <div id="scbar1" class="cl">
<form id="scbar_form" method="get" autocomplete="off" action="/home/search" target="_blank">

<table cellspacing="0" cellpadding="0">
<tr>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"><strong class="xi2">搜索</strong></button></td>   
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="xg1" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>                         
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="" placeholder="请输入搜索信息" autocomplete="off" x-webkit-speech speech /></td>
</tr>
</table>
</form>
<script type="text/javascript">
</script>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li><li><a href="javascript:;" rel="user">用户</a></li></ul>
<script type="text/javascript">
</script>
          <i class="close-search headericon-close"></i>
           
<!-- 搜索筛选 -->
<ul id="scbar_type_menu" class="p_pop" style="display: none;">
  <li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li><li><a href="javascript:;" rel="user">用户</a></li></ul>
<script type="text/javascript">
</script> 
       </div>
      </div>
      <div class="global-search-mask" style="display: none; background-color: rgba(0, 0, 0, 0.4); width: 100%; height: 100%; position: fixed; top: 61px; left: 0px; z-index: 300;"></div>

    </div>
  </div>
  <div class="fm_line"></div>
</div>
<div class="mus_box cl">
  <div id="mus" class="wp cl"> 
     
     
     
     
     
  </div>
</div>

 
 
 <div id="qmenu_menu" class="p_pop blk" style="display: none;">
<div class="ptm pbw hm">
请 <a href="javascript:;" class="xi2" onclick="lsSubmit()"><strong>登录</strong></a> 后使用快捷导航<br />没有帐号？<a href="member.php?mod=register" class="xi2 xw1">立即注册</a>
</div>
<div id="fjump_menu" class="btda"></div></div> 
 

<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
   
    <li><a href="dc_signin-dc_signin.html" id="mn_plink_dc_signin">每日签到</a></li>
   
  </ul>
 
<!-- 二级导航 -->
<div class="sub_nav">
  @foreach($data_array[0] as $k=>$v)
  <ul class="p_pop h_pop" id="mn_{{ $v->id }}_menu" style="display: none">
    @foreach($v->sub as $kk=>$vv)
    <li>
      <a href="/cates/topics/{{ $vv->id }}" hidefocus="true" target="_blank">{{ $vv->cname }}</a>
    </li>
    @endforeach
  </ul>
  @endforeach
  <div class="p_pop h_pop" id="mn_userapp_menu" style="display: none"></div>
</div>


<!-- 用户菜单 -->
<ul class="sub_menu" id="m_menu" style="display: none;">
   
   
    <li style="display: none;"><a href="http://d.bbs.itxdl.cn/home.php?mod=magic" style="background-image:url(/home/images/magic_b.png) !important">道具</a></li>
   
   
    <li style="display: none;"><a href="http://d.bbs.itxdl.cn/home.php?mod=medal" style="background-image:url(/home/images/medal_b.png) !important">勋章</a></li>
   
   
    <li style="display: none;"><a href="http://d.bbs.itxdl.cn/home.php?mod=task" style="background-image:url(/home/images/task_b.png) !important">任务</a></li>
   
   
   
   
   
   
   
    <li><a href="http://d.bbs.itxdl.cn/home.php?mod=spacecp">设置</a></li>
   
    <li><a href="http://d.bbs.itxdl.cn/home.php?mod=space&amp;do=favorite&amp;view=me">我的收藏</a></li>
   
    <li></li>
  <li></li>
  <li></li>
  <li></li>
  <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=ccf05dd5">退出</a></li>
</ul>
<ul class="sub_menu" id="l_menu" style="display: none;">
  
  <!-- 第三方登录 -->
  <li class="user_list app_login"><a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq"></i>腾讯QQ</a></li>
  <li class="user_list app_login"><a href="wechat-login.html"><i class="i_wb"></i>微信登录</a></li>
</ul> 
@section('content')

@show
<!--[diy=diy_bottom]--><div id="diy_bottom" class="area"><div id="framefH9wcY" class="frame move-span cl frame-1"><div id="framefH9wcY_left" class="column frame-1-c"><div id="framefH9wcY_left_temp" class="move-span temp"></div><div id="portal_block_5" class="block move-span"><div id="portal_block_5_content" class="dxb_bc"><div class="cl" style="width: 100%; margin: 25px 0 -30px 0; background: #FAFAFA;">
<div class="links cl">
  <div class="links_txt">
    <ul></ul>
  </div>
</div>
</div></div></div></div></div></div><!--[/diy]-->
 
<script>fixed_top_nv();</script> 
 </div>
 
     

<script src="/home/js/plugin.js" type="text/javascript"></script>
<div id="footer" class="footer cl">
  <div class="ft_top cl" style="width: 100%; background: #2D3237;">
  <div class="wp sections cl">

  <div class="partner-section">
    <div class="section-l">
      <h3>关于我们</h3>
      <ul class="footer-partner">
        <li><a href="javascript:;" target="_blank">关于机枫论坛</a></li>
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">联系我们</a></li>
        <li><a href="javascript:;" class="external" target="_blank">广告服务</a></li>
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">站点地图</a></li>
      </ul>
    </div>
    <div class="section-r">
      <h3>监护工程</h3>
      <ul class="footer-partner">
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">人才招聘</a></li>
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">家长监护工程</a></li>
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">举报不良信息</a></li>
        <li><a href="javascript:;" rel="nofollow" class="external" target="_blank">手机中国记事</a></li>
      </ul>
    </div>
  </div>


    <div class="phone"><p>官方咨询电话&nbsp;&nbsp;800-800-8800</p></div> 
  </div>
  </div>
  <div id="ft" class="wp cl">
     <div class="footer-left cl">
      <a href="javascript:;" >Archiver</a><span class="pipe">|</span><a href="javascript:;" >手机版</a><span class="pipe">|</span>      <span>{{ $data_array[2]->wcright }}<a style="margin-left:20px;" href="javascript:;" target="_blank" rel="nofollow"> {{ $data_array[2]->wfiling }}</a>
        <script src="/home/js/cnzz.js" type="text/javascript"></script><span id="cnzz_stat_icon_1261440059"><a href="http://www.cnzz.com/stat/website.php?web_id=1261440059" target="_blank" title="站长统计"><img border="0" hspace="0" vspace="0" src="/home/picture/pic.gif"></a></span><script src="/home/js/stat.js" type="text/javascript" type="text/javascript"></script><script src="/home/js/core.js" type="text/javascript" charset="utf-8" type="text/javascript"></script>
      </span>
      <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1274442336'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s19.cnzz.com/z_stat.php%3Fid%3D1274442336%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
      </script>
    </div>         
  </div> 
 

 

 
 

 

 
<script src="/home/js/home.js" type="text/javascript"></script> 
 

 
 

 
 
 
 
 

  

<div id="share">

<a id="totop" title="">返回顶部</a>
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

 
 </div>
</div>
<script> 
(function(){ var bp = document.createElement('script'); var curProtocol = window.location.protocol.split(':')[0]; if (curProtocol === 'https') { bp.src = 'https://zz.bdstatic.com/linksubmit/push.js'; } else { bp.src = 'http://push.zhanzhang.baidu.com/push.js'; } var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(bp, s); })(); 
</script>
</body>
<script src="/home/js/bdtj.js" type="text/javascript"></script><script src="/home/js/cnzz.js" type="text/javascript"></script></html> 
