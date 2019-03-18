<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Signs;
use App\Models\Users;
use DB;
class SigninController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
    }

    /**
     * Show the form for creating a new resource.
     * 点击显示签到页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //判断用户是否登录
        if (!session('homeuser')['id']) {
            return redirect('/home/login')->with('error','请您先去登录');
        }
         
        return view('Home.Signin.create');
    }

    /**
     * Store a newly created resource in storage.
     *  执行签到方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //接收表单数据
        $sign_content = $request->input('sign_content');
        //获取当前登录用户
        $user = Users::find(session('homeuser')['id']);
        //查找当前用户的签到记录
        $signs = Signs::where('uid',session('homeuser')['id'])->first();
        //判断是否为新用户
        if ( !$signs) {
            //创建一个模型对象
            $sign = new Signs;
            //给新用户添加新数据
            $sign->uid = $user->id;
            $sign->nickname = $user->nickname;
            $sign->sign_time = date('Y-m-d H:i:s',time());
            $sign->sign_count = 1;
            $sign_content = $sign_content;
            $res1 = $sign->save();
            //修改用户积分
            $ascore = $user->ascore +=20;
            $res2 = $user->save();
            if ($res1 && $res2) {
                 echo '<script>alert("签到成功,积分+20");location.href="/"</script>';
            }else{
                 echo '<script>alert("签到失败");location.href="/signin/create"</script>';
            }
        }else {
            //获取上次签到日期
            $last_time = $signs->updated_at;
            //当天的日期
            $today = date('Y-m-d',time());
            //昨天的日期
            $yesterday = date('Y-m-d',strtotime('-1 day'));
            //上次签到时间与今天时间进行比较
            if(substr($last_time,0,10) == $today){
                echo '<script>alert("当天已签过到了！ 囧 ");location.href="/"</script>';
            } elseif (substr($last_time,0,10) == $yesterday) {
                //用户积分+5
                $user->ascore += 5;
                //更新用户记录
                $user->save();
                //更新签到记录
                $signs->updated_at = date('Y-m-d H:i:s',time());
                //签到
                $signs->sign_count += 1;
                $signs->save();
                echo '<script>alert("连续签到，积分 +5！");location.href="/"</script>';
            } else {
                //用户积分+5
                $user->ascore += 5;
                //更新用户记录
                $user->save();
                //更新签到记录
                $signs->updated_at = date('Y-m-d H:i:s',time());
                $signs->sign_count += 1;
                $signs->sign_content = $sign_content;
                $signs->save();
                echo '<script>alert("签到成功，积分 +2！");location.href="/"</script>';
            }
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
