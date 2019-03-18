@extends('Home.Layout.index')
@section('content')
<div id="wp" class="wp time_wp cl">
  <div id="pt" class="bm cl">
    <div class="z">
      <a href="./" class="nvhm" title="首页">兄弟连论坛_每个人的交流社区</a>
      <em>›</em></div>
  </div>
  <div id="ct" class="wp cl">
    <div class="mn">
    	<div class="bm bw0">
	        <div style="display: none">
		        <ul id="fs_group">
			        @foreach($data_array[0] as $k=>$v)
					<li fid="{{ $v->id }}">:::. {{ $v->cname }} :::.</li>
					@endforeach
				</ul>
				<ul id="fs_forum_common">
					<li fid="0"></li>
				</ul>
		        @foreach($data_array[0] as $k=>$v)
		        <ul id="fs_forum_{{ $v->id }}">
		        	@foreach($v->sub as $kk=>$vv)
		            <li fid="{{ $vv->id }}">{{ $vv->cname }}</li>
		            @endforeach
		        </ul>
		        @endforeach
	        </div>
        <h3 class="flb">
          <em>论坛导航</em></h3>
        <div class="c" style="width: 620px;">
          <p class="cl">
            <button id="postbtn" class="pn xg1 y" onclick="direct(selectfid)" disabled="disabled">
              <span>发新帖</span></button>
            <span class="pbnv">兄弟连论坛_每个人的交流社区
              <span id="pbnv"></span>
              <a id="enterbtn" class="xg1" href="javascript:;" onclick="locationforums(currentblock, currentfid)">[进入版块]</a></span>
          </p>
          <script type="text/javascript">
          	//跳转到发帖页方法
          	function direct(selectfid){
          		window.location.href = "/topics/cates/" + selectfid;
          	}
          </script>
          <ul class="pbl cl">
            <li id="block_group">
              <p class="pbls">
                <a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, 'common')" class="pbsb lightlink">常用版块</a></p>
              <p>
                <a href="javascript:;" ondblclick="locationforums(1, 123)" onclick="switchforums(this, 1, 123)" class="pbsb">:::. 技术交流 :::.</a></p>
              <p>
                <a href="javascript:;" ondblclick="locationforums(1, 52)" onclick="switchforums(this, 1, 52)" class="pbsb">:::. 兄弟连 :::.</a></p>
              <p>
                <a href="javascript:;" ondblclick="locationforums(1, 49)" onclick="switchforums(this, 1, 49)" class="pbsb">:::. 连队趣事 :::.</a></p>
              <p>
                <a href="javascript:;" ondblclick="locationforums(1, 55)" onclick="switchforums(this, 1, 55)" class="pbsb">:::. 议事厅 :::.</a></p>
            </li>
            <li id="block_forum">
              <p>
                <a href="javascript:;" ondblclick="locationforums(2, 0)" onclick="switchforums(this, 2, 0)"></a>
              </p>
            </li>
            <li id="block_subforum"></li>
          </ul>
        </div>
        <script type="text/javascript" reload="1">var s = '<p><a id="commonforum" href="javascript:;" onclick="switchforums(this, 1, \'common\')" class="pbsb lightlink">常用版块</a></p>';
          var lis = $('fs_group').getElementsByTagName('LI');
          for (i = 0; i < lis.length; i++) {
            var gid = lis[i].getAttribute('fid');
            if ($('fs_forum_' + gid)) {
              s += '<p><a href="javascript:;" ondblclick="locationforums(1, ' + gid + ')" onclick="switchforums(this, 1, ' + gid + ')" class="pbsb">' + lis[i].innerHTML + '</a></p>';
            }

          }
          $('block_group').innerHTML = s;
          var lastswitchobj = null;
          var selectfid = 0;
          var switchforum = switchsubforum = '';

          switchforums($('commonforum'), 1, 'common');

          function switchforums(obj, block, fid) {
            if (lastswitchobj != obj) {
              if (lastswitchobj) {
                lastswitchobj.parentNode.className = '';
              }
              obj.parentNode.className = 'pbls';
            }
            var s = '';
            if (fid != 'common') {
              $('enterbtn').className = 'xi2';
              currentblock = block;
              currentfid = fid;
            } else {
              $('enterbtn').className = 'xg1';
            }
            if (block == 1) {
              var lis = $('fs_forum_' + fid).getElementsByTagName('LI');
              for (i = 0; i < lis.length; i++) {
                fid = lis[i].getAttribute('fid');
                if (fid != '') {
                  s += '<p><a href="javascript:;" ondblclick="locationforums(2, ' + fid + '\)" onclick="switchforums(this, 2, ' + fid + ')"' + ($('fs_subforum_' + fid) ? ' class="pbsb"': '') + '>' + lis[i].innerHTML + '</a></p>';
                }
              }
              $('block_forum').innerHTML = s;
              $('block_subforum').innerHTML = '';
              switchforum = switchsubforum = '';
              selectfid = 0;
              $('postbtn').setAttribute("disabled", "disabled");
              $('postbtn').className = 'pn xg1 y';
            } else if (block == 2) {
              selectfid = fid;
              if ($('fs_subforum_' + fid)) {
                var lis = $('fs_subforum_' + fid).getElementsByTagName('LI');
                for (i = 0; i < lis.length; i++) {
                  fid = lis[i].getAttribute('fid');
                  s += '<p><a href="javascript:;" ondblclick="locationforums(3, ' + fid + ')" onclick="switchforums(this, 3, ' + fid + ')">' + lis[i].innerHTML + '</a></p>';
                }
                $('block_subforum').innerHTML = s;
              } else {
                $('block_subforum').innerHTML = '';
              }
              switchforum = obj.innerHTML;
              switchsubforum = '';
              $('postbtn').removeAttribute("disabled");
              $('postbtn').className = 'pn pnc y';
            } else {
              selectfid = fid;
              switchsubforum = obj.innerHTML;
              $('postbtn').removeAttribute("disabled");
              $('postbtn').className = 'pn pnc y';
            }
            lastswitchobj = obj;
            $('pbnv').innerHTML = switchforum ? '&nbsp;&gt;&nbsp;' + switchforum + (switchsubforum ? '&nbsp;&gt;&nbsp;' + switchsubforum: '') : '';
          }

          function locationforums(block, fid) {
            location.href = block == 1 ? 'forum.php?gid=' + fid: 'forum.php?mod=forumdisplay&fid=' + fid;
          }</script>
      </div>
    </div>
  </div>
</div>
@endsection