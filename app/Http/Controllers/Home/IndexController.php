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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //将当前页面压入session
        session(['url'=>$_SERVER["REQUEST_URI"]]);
        //获取轮播图
        $slides = Slides::where('sstatu','1')->limit(5)->get();
        //获取友情链接
        $friendlinks = Friendlinks::where('fstatu',1)->get();
        //获取公告
        $announcements = Announcements::orderBy('created_at','desc')->limit(5)->get();
        //获取当天的帖子数
        $today = date('Y-m-d',time());
        $topics_count_today = Topics::where('created_at','like',"$today%")->count();
        //获取昨天的帖子数
        $yesterday  = date('Y-m-d',strtotime('-1day'));
        $topics_count_yesterday = Topics::where('created_at','like',"$yesterday%")->count();
        //帖子数
        $topics_count = Topics::count();
        //会员数
        $users_count = Users::count();
        //最新注册的会员
        $user = Users::orderBy('created_at','desc')->first();
        //获取热帖排行
        $topics_hot = Topics::orderBy('recount','desc')->orderBy('count','desc')->limit(10)->get();

        //加载视图并分配数据
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
        $this->validate($request, [
            'tid' => 'required',
            'face' => 'required',
        ],[
            'tid.required' => '帖子不能为空，请选择帖子',
            'face.required' => '封面不能为空，请上传封面图片',
        ]); 
        $tid = $request->input('tid');
        //创建文件上传对象
        $file = $request->file('face');
        //获取上传文件类型
        $ext = $file->extension();
        //拼接上传文件保存名
        $file_name = time().(mt_rand(1000,9999)).'.'.$ext;
        $res1 = $file->storeAs('images',$file_name);
        $recommendations = new Recommendations;
        $recommendations -> tid = $tid;
        $recommendations -> rimg = $file_name;
        $res2 = $recommendations -> save();
        if($res2 && $res2){
            return redirect('admin/recommendations')->with('success','添加推荐阅读成功');
        } else {
            return redirect('admin/recommendations/create')->with('error','添加推荐阅读失败');
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
         //获取帖子列表
        $data = Topics::get();
        //获取需要修改的推荐
        $data2 = Recommendations::find($id);
        return view('Admin.Recommendations.edit',['data'=>$data,'data2'=>$data2]);
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
        //找到记录
        $recommendations = Recommendations::find($id);
        //找到原上传文件的路径
        $file_path = $recommendations->rimg;
        //接收表单上传数据
        $tid = $request -> only('tid')['tid'];
        //更新数据
        $recommendations -> tid = $tid;
        //判断是否有文件上传
        if($request->hasFile('face')){
            //创建文件上传对象
            $file = $request->file('face');
            //获取上传文件类型
            $ext = $file->extension();
            //拼接文件保存名
            $file_name = time().(mt_rand(1000,9999)).'.'.$ext;
            $file->storeAs('images',$file_name);
            $recommendations -> rimg = $file_name;
            unlink('upload/images/'.$file_path);
        }
        $res = $recommendations -> save();
        if($res){
            return redirect('admin/recommendations')->with('success','修改成功');
        } else {
            return redirect('admin/recommendations/create')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查找需要删除的记录对象
        $data = Recommendations::find($id);
        //获取记录对象的缩略图
        $file_name = $data->rimg;
        $res = Recommendations::destroy($id);
        if($res){
            //如果对应的缩略图存在，则删除缩略图
            if(file_exists("upload/images/".$file_name)){
                unlink("upload/images/".$file_name);
            }
            return back()->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }

}
