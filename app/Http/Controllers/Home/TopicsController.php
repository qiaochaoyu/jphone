<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topics;
use App\Models\Cates;
use App\Models\Replys;
use App\Models\Users;
use App\Models\Collections;
use App\Models\Announcements;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        // 将当前页面压入session
        session(['url'=>$_SERVER["REQUEST_URI"]]);
        // 获取该板块下所有的帖子标签
        $tmark = Topics::select('tmark')->distinct()->get();
        // 接收get方式提交的参数,若无没有则赋默认值
        $requests = $request->all();
        if($request->has('keyword')){
            $keyword = $request->input('keyword');
        } else {
            $keyword = '';
        }
        // 判断是否传入时间范围，如果传入则按照时间范围查找帖子
        if($request->has('time')){
            $days = $requests['time'];
            $time = date('Y-m-d H:i:s',strtotime('-'.$days.'day'));
        } else {
            $time = date('Y-m-d H:i:s',0);
        }
        // 判断是否有排序规则
        if($request->has('order')){
            $order = $requests['order'];
        } else {
            $order = 'count';
        }
        

        // 获取版块热门贴
        $topics_hot = Topics::where('cid',$id)->orderBy('recount','desc')->orderBy('count','desc')->limit(5)->get();
        // 获取该板块下帖子的数量
        $count = Topics::where('cid',$id)->count();
        // 获取当前板块信息
        $cate = Cates::find($id);
        // 获取当前板块的pid
        $pid = $cate->pid;
        // 获取所在分区信息
        $cate_prev = Cates::find($pid);
        // 获取公告
        $announcements = Announcements::orderBy('created_at','desc')->limit(4)->get();
        // 获取普通贴
        $data = Topics::where('cid',$id)->where('tmark','like',"%$keyword%")->Where('created_at','>',$time)->orderBy($order,'desc')->paginate(8);
        // 获取精华帖和置顶帖
        $data2 = Topics::where('cream',1)->orWhere('top',1)->get();
        return view('Home.Topics.index',['announcements'=>$announcements,'topics_hot'=>$topics_hot,'requests'=>$requests,'data'=>$data,'data2'=>$data2,'tmark'=>$tmark,'count'=>$count,'cate'=>$cate,'cate_prev'=>$cate_prev]);
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
        // 接收表单提交数据
        $data = $request->except('_token');
        // 创建模型对象
        $topics = new Topics;
        // 获取发帖人信息
        $users = Users::find($data['uid']);
        // 对模型对象赋值
        $topics -> uid = $data['uid'];
        $topics -> ttitle = $data['ttitle'];
        $topics -> tcontent = $data['tcontent'];
        $topics -> tmark = $data['tmark'];
        $topics -> cid = $data['cid'];
        // 保存模型对象
        $res = $topics -> save();
        if ($res) {
            // 发帖成功加5个积分
            $users -> ascore += 5;
            $users -> save();
            return redirect("/topics/$topics->id")->with('success','发帖成功！');
        } else {
            return back()->with('error','发帖失败！');
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
        // 将当前页面压入session
        session(['url'=>$_SERVER["REQUEST_URI"]]);
        // 获取帖子
        $topics = Topics::find($id);
        // 帖子浏览量加1
        $topics->count ++;
        $topics->save();
        // 获取帖子的版块
        $cates = Cates::find($topics->cid);
        // 获取帖子的分区
        $cates_prev = Cates::find($cates->pid);
        // 获取帖子的回复
        $replys = Replys::where('tid',$topics->id)->get();
        // 获取帖子的收藏数
        $collections = Collections::where('tid',$id)->count();
        // 获取发帖人信息及发帖数
        $users = Users::find($topics->uid);
        $count = Topics::where('uid',$users->id)->count();
        $count_cream = Topics::where('uid',$users->id)->where('cream',1)->count();
        $collection = Collections::where('uid',session('homeuser')['id'])->where('tid',$topics->id)->first();
        // 加载模板并分配数据
        return view('Home.Topics.show',['collections'=>$collections,'topics'=>$topics,'cates'=>$cates,'cates_prev'=>$cates_prev,'replys'=>$replys,'users'=>$users,'count'=>$count,'count_cream'=>$count_cream,'collection'=>$collection]);
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

    /**
     * [modal 加载发帖前选择版块的视图]
     * @return [type] [description]
     */
    public function modal()
    {
        return view('Home.Topics.modal');
    }

    /**
     * [add description]
     * @param [int] $id [接收版块id]
     * @return [加载添加帖子的视图]
     */
    public function add($id)
    {
         // 获取帖子的版块
        $cates = Cates::find($id);
        // 获取帖子的分区
        $cates_prev = Cates::find($cates->pid);
        return view('Home.Topics.create',['cates'=>$cates,'cates_prev'=>$cates_prev]);
    }

    /**
     * 搜索
     */
    public function search(Request $request)
    {
        // 获取表单提交数据
        $data = $request->all();
        // 判断关键字是否填写，如果未帖子则设置默认值‘’
        $data['srchtxt'] = isset($data['srchtxt']) ? $data['srchtxt'] : '';
        // 统计搜索到数据条数
        $topicz = Topics::where('ttitle','like','%'.$data['srchtxt'].'%')->count();
        // 获取搜索到数据
        $topic = Topics::where('ttitle','like','%'.$data['srchtxt'].'%')->paginate(10);
        // 加载模板并分配数据
        return view('Home.Search.index',['topic'=>$topic,'data'=>$data,'topicz'=>$topicz]);
    }
}
