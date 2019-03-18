<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Replys;
use App\Models\Users;
use App\Models\Topics;
use DB;


class ReplysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收表单数据
        $data = $request->except('_token');
        //去除字符串的html标签
        
        
        //开启事务
        DB::beginTransaction();
        //创建数据模型对象
        $replys = new Replys;
        //赋值
        $replys -> uid = session('homeuser')->id;
        $replys -> tid = $data['tid'];
        $replys -> rcontent = $data['rcontent'];
        $res1 =  $replys -> save();
        //查找发帖用户
        $users = Users::find(session('homeuser')->id);
        //回帖用户金币加1
        $users->ascore ++;
        $res2 = $users-> save();


        //获取主贴信息
        $topics = Topics::find($data['tid']);
        //主贴回帖数量加1
        $topics -> recount ++;
        //更新主贴回复时间
        $topics -> last_replys_at = date('Y-m-d H:i:s',time());
        //更新主贴最后回帖人id
        $topics -> last_replys_uid = session('homeuser')->id;
        $res3 = $topics -> save();
        if($res1 && $res2 && $res3){
            DB::commit();
            return back()->with('success','回帖成功');
        } else {
            DB::rollBack();
            return back()->with('error','回帖失败');
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
