<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Slides;
use App\Models\Topics;
use App\Models\Announcements;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //将当前页面压入session
        session(['url'=>$_SERVER["REQUEST_URI"]]);
        //获取版块名称
        $cname = Cates::find($id)->cname;
        //获取该版块下的子版块
        $data = Cates::where('pid',$id)->get();
        //获取子版块的id
        $ids = [];
        foreach($data as $k=>$v){
            $ids[] = $v->id;
        }
        //获取排行帖子
        $topics_top = Topics::whereIn('cid',$ids)->orderBy('recount','desc')->orderBy('count','desc')->limit(8)->get();
        // dd($topics_top);
        //获取轮播图
        $slides = Slides::orderBy('created_at','desc')->limit(5)->get();
        //获取公告
        $announcements = Announcements::orderBy('created_at','desc')->limit(5)->get();
        return view('Home.Cates.index',['announcements'=>$announcements,'topics_top'=>$topics_top,'slides'=>$slides,'data'=>$data,'cname'=>$cname]);
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
    public static function getCates($id=0)
    {
        $cates = Cates::where('pid',$id)->get();
        $arr = [];
        foreach($cates as $k=>$v){
            $v['sub'] = self::getCates($v->id);
            $arr[] = $v;
        }
        return $arr;
    }
}
