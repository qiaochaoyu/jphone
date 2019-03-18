<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wb="http://open.weibo.com/wb">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <title>搜索 - 机枫论坛_每个人的交流社区 -</title>
    <meta name="keywords" content="" />
    <meta name="description" content=",机枫论坛_每个人的交流社区" />
    <meta name="generator" content="Discuz! X3.3" />
    <meta name="author" content="Discuz! Team and Comsenz UI Team" />
    <meta name="copyright" content="2001-2013 Comsenz Inc." />
    <meta name="MSSmartTagsPreventParsing" content="True" />
    <meta http-equiv="MSThemeCompatible" content="Yes" />
    <link rel="stylesheet" type="text/css" href="/home/css/page.css">
    <link rel="stylesheet" type="text/css" href="css/style_2_common.css" />
    <link rel="stylesheet" type="text/css" href="css/style_2_search_forum.css" />
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">var STYLEID = '2',
      STATICURL = '',
      IMGDIR = 'image/common',
      VERHASH = 'Ac9',
      charset = 'gbk',
      discuz_uid = '0',
      cookiepre = '6tcf_40b9_',
      cookiedomain = '.itxdl.cn',
      cookiepath = '/',
      showusercard = '1',
      attackevasive = '0',
      disallowfloat = 'newthread',
      creditnotice = '1|威望|,2|金钱|,3|贡献|',
      defaultstyle = '',
      REPORTURL = 'aHR0cDovL2Jicy5pdHhkbC5jbi9zZWFyY2gucGhwP21vZD1mb3J1bSZzZWFyY2hpZD02Jm9yZGVyYnk9bGFzdHBvc3QmYXNjZGVzYz1kZXNjJnNlYXJjaHN1Ym1pdD15ZXMma3c9cGhw',
      SITEURL = 'http://bbs.itxdl.cn/',
      JSPATH = 'js/',
      CSSPATH = 'data/cache/style_',
      DYNAMICURL = '';</script>
    <script src="js/common.js" type="text/javascript"></script>
    <!--[if IE 6]>
      <script language='javascript' type="text/javascript">function ResumeError() {
          return true;
        }
        window.onerror = ResumeError;</script>
    <![endif]--></head>
  
  <body id="nv_search" onkeydown="if(event.keyCode==27) return false;">
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div id="toptb" class="cl">
      <div class="z">
        <a href="/" id="navs" class="showmenu xi2">返回首页</a></div>
      <div class="y">
        <a href="/home/register">立即注册</a>
        <a href="/home/login">登录</a></div>
    </div>
    <div id="ct" class="cl w" style="height: 800px;">
      <div class="mw">
        <form class="searchform" method="get" autocomplete="off" action="/home/search">
          <table id="scform" class="mbm" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <h1>
                  <img src="/upload/{{ $data_array[2]->wlogo }}" style="width: 160px;height: 60px;" /></h1>
              </td>
              <td>
                <div id="scform_tb" class="cl">
                  <span class="y"></span>
                  <a href="javascript:;" class="a">帖子</a></div>
                <table id="scform_form" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="td_srchtxt">
                      <input type="text" id="scform_srchtxt" name="srchtxt" size="45" maxlength="40" value="{{ $data['srchtxt'] }}" tabindex="1" x-webkit-speech speech />
                      <script type="text/javascript">initSearchmenu('scform_srchtxt');
                        $('scform_srchtxt').focus();</script>
                    </td>
                    <td class="td_srchbtn">
                      <input type="hidden" name="searchsubmit" value="yes" />
                      <button type="submit" id="scform_submit" class="schbtn">
                        <strong>搜索</strong></button>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </form>
        <div class="tl">
          <div class="sttl mbn">
            <h2>结果:
              <em>找到 “
                <span class="emfont">{{ $data['srchtxt'] }}</span>” 相关内容 {{ $topicz }} 个</em></h2>
          </div>
          <div class="slst mtw" id="threadlist">
            <ul>@foreach($topic as $k=>$v)
              <li class="pbw" id="244050">
                <h3 class="xs3">
                  <a href="/topics/{{ $v->id }}" target="_blank">{{ $v->ttitle }}</a></h3>
                <p class="xg1">{{ $v->recount }} 个回复 - {{ $v->count }}次查看</p>
                <p>{!! $v->tcontent !!}</p>
                <p>
                  <span>{{ $v->created_at }}</span>-
                  <span>
                    <a href="/users/index/{{ $v->users->id }}" target="_blank">{{ $v->users->nickname }}</a></span>-
                  <span>
                    <a href="/cates/topics/{{ $v->cates->id }}" target="_blank" class="xi1">{{ $v->cates->cname }}</a></span>
                </p>
              </li>@endforeach</ul>
          </div>
          <div class="bm npgs cl" id="page" style="padding-top: 30px; margin: 0 20px 30px 20px; border-top: 1px solid #EEEEEE;">{{ $topic->appends($data)->links() }}</div></div>
      </div>
    </div>
    <script src="js/plugin.js" type="text/javascript"></script>
  </body>

</html>