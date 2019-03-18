<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topics;
use App\Models\Recommendations;
use App\Models\Slides;
use App\Models\Announcements;
use App\Models\Friendlinks;
use App\Models\Users;
use App\Models\websets;

class IndexController extends Controller
{
    /**
     * 加载首页视图
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 将当前页面压入session
        session(['url'=>$_SERVER["REQUEST_URI"]]);
        // 获取轮播图
        $slides = Slides::where('sstatu','1')->limit(5)->get();
        // 获取友情链接
        $friendlinks = Friendlinks::where('fstatu',1)->get();
        // 获取公告
        $announcements = Announcements::orderBy('created_at','desc')->limit(5)->get();
        // 获取当天的帖子数
        $today = date('Y-m-d',time());
        $topics_count_today = Topics::where('created_at','like',"$today%")->count();
        // 获取昨天的帖子数
        $yesterday  = date('Y-m-d',strtotime('-1day'));
        $topics_count_yesterday = Topics::where('created_at','like',"$yesterday%")->count();
        // 帖子数
        $topics_count = Topics::count();
        // 会员数
        $users_count = Users::count();
        // 最新注册的会员
        $user = Users::orderBy('created_at','desc')->first();
        // 获取热帖排行
        $topics_hot = Topics::orderBy('recount','desc')->orderBy('count','desc')->limit(10)->get();

        // 加载视图并分配数据
        return view('Home.Index.index',['topics_hot'=>$topics_hot,'user'=>$user,'users_count'=>$users_count,'topics_count'=>$topics_count,'topics_count_today'=>$topics_count_today,'topics_count_yesterday'=>$topics_count_yesterday,'slides'=>$slides,'friendlinks'=>$friendlinks,'announcements'=>$announcements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
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
