<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AnnouncementsStoreRequest;
use App\Models\Announcements;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 查询数据库 查询数据
        // 接受分页条数
        $count = $request->input('count',5);
        // 接收搜索参数 
        $search = $request->input('search','');
        //查询并 分页显示结果 加搜索条件
        $data = Announcements::where('title','like','%'.$search.'%')->paginate($count);
        //加载视图  分配数据  request 接收的参数数组
        return view('Admin.Announcements.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加视图
        return view('Admin.Announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementsStoreRequest $request)
    {
        // 接收数据
        $data = $request->except(['_token']);
        //实例化对象
        $announcements = new Announcements;
        //添加数据到数据库
        $announcements->title    = $data['title'];
        $announcements->uid      = session('id');
        $announcements->author   = $data['author'];
        $announcements->content  = $data['content'];
        $res = $announcements->save();
        //判断是否添加成功
        if ($res) {
            return redirect('admin/announcements')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        // 获取数据
        $data = Announcements::where('id',$id)->first();
        return view('Admin.Announcements.show',['data'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 接收参数为id的原来数据
        $data = Announcements::find($id);

        // 加载修改页面视图  分配参数
        return view('Admin.Announcements.edit',['data'=>$data]);
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
        // 接收修改后的数据
        $data = $request->except(['_token','_method']);
        // 修改信息
        $announcements = Announcements::find($id);
        $announcements->title   = $data['title'];
        $announcements->author  = $data['author'];
        $announcements->content = $data['content'];
        $announcements->created_at = date('Y-m-d H:i:s',time());
        $res = $announcements->save();
        // 判断是否修改成功
        if ($res) {
            return redirect('admin/announcements')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        // 执行删除操作
        $res = Announcements::destroy($id);
        // 判断是否删除成功
        if ($res) {
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
