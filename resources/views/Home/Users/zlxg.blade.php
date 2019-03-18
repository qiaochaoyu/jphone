@extends('Home.Layout.index')
@section('content')
<div id="wp" class="wp time_wp cl"><div id="pt" class="bm cl">
	<p style="font-size: 20px;"><b>个人资料</b></p>
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn" style="padding-top: 0px;">
<div class="bm bw0" style="margin-left:20px">
</h1>
<!--don't close the div here--><ul class="tb cl">
<li class="a"><a href="javascript:;">修改资料</a></li>

    <!-- 显示错误信息 -->
    @if (count($errors) > 0)
        <div class="mws-form-message error text-danger bg-danger" style="color:red;">
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li style="margin-left: 300px;font-size: 20px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- 显示成功信息  -->
    @if (session('success'))
        <div class="mws-form-message success" style="padding-left: 300px;font-size: 20px;color: green">
            {{ session('success') }}
        </div>
    @endif
    <!-- 显示失败信息  -->
    @if (session('error'))
        <div class="mws-form-message error text-danger bg-danger" style="padding-left: 300px;font-size: 20px;color: red;">
            {{ session('error') }}
        </div>
    @endif

<form action="/home/users/save" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="clearErrorInfo();">
	{{ csrf_field() }}
<input type="hidden" value="3183ca51" name="formhash">
<table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
<tbody>

</tr><tr id="tr_realname">
<th id="th_realname">用户名</th>
<td id="td_realname">
<input type="text" name="uname" id="uname" class="px" value="{{ $data->uname }}" tabindex="1" disabled=""><div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td>
<td class="p">

</td>
</tr>

<tr>
<tr id="tr_realname">
<th id="th_realname">昵称</th>
<td id="td_realname">
<input type="text" name="nickname" id="nickname" class="px" value="{{ $data->nickname }}" tabindex="1"><div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td>
<td class="p">

</td>
</tr>
</tr><tr id="tr_realname">
<th id="th_realname">手机号</th>
<td id="td_realname">
<input type="text" name="phone" id="phone" class="px" value="{{ $data->phone }}" tabindex="1"><div class="rq mtn" id="showerror_realname"></div><p class="d"></p></td>
<td class="p">

</td>
</tr>
<tr id="tr_gender">
<th id="th_gender">性别</th>
<td id="td_gender">
<select  name="sex" id="gender" class="ps" tabindex="1">

	<option value="0" @if($data['sex'] == 0) selected @endif>保密</option>

	<option value="1" @if($data['sex'] == 1) selected @endif>男</option>

	<option value="2" @if($data['sex'] == 2) selected @endif>女</option>

</select>
<div class="rq mtn" id="showerror_gender">
	
</div><p class="d"></p></td>
<td class="p">
</td>
</tr>

<tr id="tr_affectivestatus">
<th id="th_affectivestatus">生日</th>
<td id="td_affectivestatus">
<input type="date" name="birthday" id="affectivestatus" class="px" value="{{ $data->birthday }}" tabindex="1"><div class="rq mtn" id="showerror_affectivestatus"></div><p class="d"></p></td>
<td class="p">

</td>
</tr>

<tr id="tr_affectivestatus">
<th id="th_affectivestatus">邮箱</th>
<td id="td_affectivestatus">
<input type="text" name="email" id="email" class="px" value="{{ $data->email }}" tabindex="1"><div class="rq mtn" id="showerror_affectivestatus"></div><p class="d"></p></td>
<td class="p">

</td>
</tr>

<tr id="tr_bloodtype">
<th id="th_bloodtype">头像</th>
<td id="td_bloodtype">
<input type="file" name="face" style="margin-top: 10px;">
<div class="rq mtn" id="showerror_bloodtype">
</div><p class="d"></p></td>
<td class="p">

</td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<input type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="提交" style="width: 200px;height: 40px;background-color: orange;border-radius:10px 10px;">
<span id="submit_result" class="rq"></span>
</td>
</tr>
</tbody></table>
</form>
<script type="text/javascript">

</script>
</div>
</div>
<div class="appl"><div class="tbn">

</div></div>
</div></div>


@endsection