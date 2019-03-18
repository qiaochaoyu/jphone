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
                          <a href="http://python.itxdl.cn/">{{ $v->stitle }}</a></h2>
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
                        <a href="/topics/{{ $v->topics->id }}" target="_blank" title="{{ $v->topics->ttitle }}">
                          <img src="/upload/images/{{ $v->rimg }}" alt="" height="100" width="228"></a>
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
      <div class="Framebox cl" style="width: 720px; padding: 10px 25px; border-radius: 0 0 2px 2px; background: #FFFFFF; box-shadow: none; overflow: hidden;">
		<div class="fl bm">
		    <div class="bm bmw  cl">
		      	<div class="bm_h cl">
		        	<span class="o cl">
		          	<img id="category_123_img" src="http://bbs.itxdl.cn/static/image/common/collapsed_no.gif" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_123');"></span>
		        	<h2>
		          		<a href="" style="">:::. {{ $cname }} :::.</a>
		          	</h2>
		      	</div>
		      	<div id="category_123" class="bm_c" style="">
		        	<table cellspacing="0" cellpadding="0" class="fl_tb">
		          		<tbody>
		          			@foreach($data as $k=>$v)
				            <tr>
				              	<td class="fl_icn" style="width: 60px;">
					                <a href="/cates/topics/{{ $v->id }}">
					                	<img src="/upload/images/{{ $v->profile }}"  style="width:50px" align="left" alt="">
					                </a>
				             	</td>
					            <td>
					            	<h2>
					                	<a href="/cates/topics/{{ $v->id }}">{{ $v->cname }}</a>
					                  	<em class="xw0 xi1" title="今日">({{ $v->topics_count_today() }})</em>
					                </h2>
					             </td>
					            <td class="fl_i">
					                <div>
						                <span class="f_threads">{{ $v->topics_count() }}</span>
						                <span class="line">/</span>
						                <span class="f_posts">{{$v->topics_replys_count() }}</span>
					              	</div>
					            </td>
				              	<td class="fl_by">
				                	<div>
				                  		<a style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;"href="/topics/{{$v->last_topics()['topics']['id']}}" title="{{$v->last_topics()['topics']['ttitle']}}">{{$v->last_topics()['topics']['ttitle']}}
				                  		</a>
				                  		<p>by
					                    	<a href="/users/index/{{ $v->last_topics()['users']['id']}}" >{{$v->last_topics()['users']['nickname']}}</a>
					                    	<cite>
					                      		<span title="2019-3-4 16:32">{{ $v->last_topics()['topics']['created_at'] }}</span>
					                      	</cite>
				                  		</p>
				                	</div>
				              	</td>
				            </tr>
				            @endforeach
		          		</tbody>
		        	</table>
		      </div>
		    </div>
		  </div>
		  <div class="wp mtn">
		    <!--[diy=diy3]-->
		    <div id="diy3" class="area"></div>
		    <!--[/diy]--></div>
		</div>



      </div>
    </div>
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
                      <a href="/signin/create" target="_self" class="greenbigbutton" title="签到" style="margin-right: 0;">签到</a></div>
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
       <!--热门贴start-->
        <div id="tabI6ABg6" class="frame-tab move-span cl">
          <div id="tabI6ABg6_title" class="tab-title title column cl tab-style" switchtype="mouseover">
            <div id="portal_block_17" class="block move-span">
              <div class="blocktitle title">
                <span class="titletext" style="float:;margin-left:px;font-size:;color: !important;">热门贴排行</span></div>
              <div id="portal_block_17_content" class="dxb_bc">
                <div class="box s_timeline">
                  <div class="s_text_list">
                    <div class="nano has-scrollbar">
                      <ul style="right: -17px;" tabindex="0" class="nano-content">
                        @foreach($topics_top as $k=>$v)
                        <li>
                          <i>
                            <span></span>
                          </i>
                          <a href="/topics/{{$v->id}}" target="_blank">{{ $v->ttitle }}</a>
                          <p>2019-01-04</p>
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
       <!---热门贴end->
      </div>
      <div id="tabp945F3_content" class="tb-c"></div>
      <script type="text/javascript">initTab("tabp945F3", "mouseover");</script></div>
  </div>
  <!--[/diy]--></div>
</div>
</div>
@endsection