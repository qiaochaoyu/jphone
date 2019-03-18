@extends('Home.Users.layout.index')
@section('body')

 <div id="ct" class="ct1 wp cl"> 
    <div class="mn"> 
     <!--[diy=diycontenttop]--> 
     <div id="diycontenttop" class="area"></div> 
     <!--[/diy]--> 
     <div class="bm bw0"> 
      <div class="bm_c"> 
       <div class="u_profile" style="padding: 10px; font-size: 14px; background: #FFFFFF;"> 
        <div class="pbm mbm cl" style="background: #FFFFFF;"> 
         <ul class="cl bbda pbm mbm" style="font-size: 14px; margin-left: -10px;"> 
          <li> 
           <div style="display: inline-block; padding: 16px 15px; border: 1px solid #EEEEEE; background: #FAFAFA;"> 
            <a href="javascript:;" target="_blank">好友数 0</a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a href="javascript:;" target="_blank">回帖数 {{ $replys_count }} </a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a href="javascript:;" target="_blank">主题数 {{ $topics_count }}</a> 
            <span class="pipe" style="margin: 0 15px;">|</span> 
            <a>积分 {{ $user_data->ascore }} </a> 
           </div> </li> 
         </ul> 
         <h2 class="cl" style="font-size: 16px; margin-bottom: 15px;"> {{ $user_data->nickname }}<img src="
          /home/picture/ol.gif" alt="online" title="在线" class="vm" />&nbsp; <span class="xw0">(UID: {{ $user_data->id }})</span> <li style="display: inline-block; margin-left: 10px;"><span style="color:" class="xi2" onmouseover="showTip(this)" tip="积分 94, 距离下一级还需 6 积分"><a href="javascript:;" style="color: #BBBBBB;">
                                  @if($user_data->ascore >=  3000)
                                  班长
                                  @elseif($user_data->ascore >=  750)
                                  士官
                                  @elseif($user_data->ascore >=  350)
                                  上士
                                  @elseif($user_data->ascore >=  200)
                                  中士
                                  @elseif($user_data->ascore >=  100)
                                  下士
                                  @elseif($user_data->ascore >=  35)
                                  新兵
                                  @elseif($user_data->ascore >=  1)
                                  预备役
                                  @else
                                  民兵
                                  @endif

          </a></span> </li> </h2> 
         <div style="display: inline-block;"> 
          <ul class="pf_l cl pbm mbm " style="display: inline-block;"> 
           <li><em>邮箱</em>{{ $user_data->email }}</li> 
          </ul> 
          <ul class="pf_l cl pbm mbm " style="display: inline-block;"> 
            @if ($user_data->sex == 1 )
           <li style="color: #f63756;"><em>性别</em>男</li> 
           @elseif ($user_data->sex == 2)
           <li style="color: #f63756;"><em>性别</em>女</li> 
           @elseif ($user_data->sex == 0)
           <li style="color: #f63756;"><em>性别</em>保密</li> 
           @endif
          </ul>
          <ul class="pf_l cl pbm mbm " style="display: inline-block;"> 
           <li><em>生日</em>{{ $user_data->birthday }}</li> 
          </ul>
         </div> 
        </div> 
        <div class="pbm mbm cl" style="margin-top: 30px; background: #FFFFFF;display: inline-block;"> 
         <div class="tag_box cl" style="margin: 10px 0 20px 0;"> 
          <span class="span-mark-author" style="font-size: 16px;">活跃概况</span> 
         </div> 
         <div style="width: 900px; height: auto; display: inline-block;"> 
          <ul id="pbbs" class="pf_l cl" style="display: inline-block;"> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; background: #FAFAFA;"><em>注册时间</em>{{ $user_data->created_at }}</li> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; background: #F3F3F3;"><em>最后访问</em>{{ $user_data->updated_at }}</li> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; background: #FAFAFA;"><em>注册 IP</em>{{ $user_data->ip }}- - 北京</li> 
          </ul> 
          <ul id="pbbs" class="pf_l cl" style="display: inline-block;"> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; display: inline-block; background: #F3F3F3;"><em>上次访问 IP</em>{{ $user_data->ip }}- - 北京海淀</li> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; background: #FAFAFA;"><em>上次活动时间</em>{{ $user_data->lasttime }}</li> 
           <li style="width: 242.5px; padding: 10px; margin: 10px; background: #F3F3F3;"><em>上次发表时间</em>{{  $top_time->updated_at }}</li> 
           
          </ul> 
         </div> 
        </div> 
       </div> 
       <!--[diy=diycontentbottom]-->
       <div id="diycontentbottom" class="area"></div> 
       <!--[/diy]-->
      </div> 
     </div> 
    </div> 
   </div> 

@endsection