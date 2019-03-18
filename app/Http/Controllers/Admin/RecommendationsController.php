<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topics;
use App\Models\Recommendations;

class RecommendationsController extends Controller
{
    /**
     * 显示推荐阅读列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查询所有的数据
        $data = Recommendations::get();
        return view('Admin.Recommendations.index',['data'=>$data]);
    }

    /**
     * 加载添加视图
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 接收表单数据，若无数据传入则赋默认值空字符串
        $keyword = $request->input('keyword','');
        // 查询帖子数据
        $data = Topics::where('ttitle','like',"%$keyword%")->get();
        // 加载模板，并分配数据
        return view('Admin.Recommendations.create',['data'=>$data,'keyword'=>$keyword]);
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证表单上传要求
        $this->validate($request, [
            'tid' => 'required',
            'face' => 'required',
        ],[
            'tid.required'=>'请选择帖子',
            'face.required'=>'请上传推荐阅读封面图',
        ]);
        // 接收表单提交数据
        $data = $request -> except('_token');
        // 创建文件上传对象
        $file = $request -> file('face');
        // 获取上传文件类型名
        $ext = $file->extension();
        // 拼接上传文件保存名
        $file_name = time().mt_rand(1000,9999).'.'.$ext;
        // 上传文件
        $res1 = $file->storeAs('images',$file_name);
        // 创建模型对象
        $recommendations = new Recommendations;
        $recommendations -> tid = $data['tid'];
        $recommendations-> rimg = $file_name;
        // 保存数据到数据库
        $res2 = $recommendations -> save();
        if($res1 && $res2){
            return redirect('/admin/recommendations')->with('success','添加成功');
        } else {
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
        //
    }

    /**
     * 修改推荐阅读
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取所有的帖子
        $data = Topics::get();
        // 获取需要修改的推荐阅读对象
        $data2 = Recommendations::find($id);
        // 加载模板并分配数据
        return view('Admin.Recommendations.edit',['data2'=>$data2,'data'=>$data]);
    }

    /**
     * 执行更新操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 获取需要修改数据
        $recommendations = Recommendations::find($id);
        // 接收表单数据
        $tid = $request -> input('tid');
        // 判断是否有文件上传
        if($request->hasFile('face')){
           // 获取上传文件类型名
            $file = $request->file('face');
            $ext = $file->extension();
            // 拼接上传文件保存名
            $file_name = time().mt_rand(1000,9999).'.'.$ext;
            // 上传文件
            $file->storeAs('images',$file_name); 
            unlink('upload/images/'.$recommendations->rimg);
            $recommendations -> rimg = $file_name;
        }
        $recommendations -> tid = $tid;
        $res = $recommendations ->save();
        if($res){
            return redirect('/admin/recommendations')->with('success','修改成功');
        } else {
            return back() -> with('error','修改失败');
        }
    } 

    /**
     * 删除推荐阅读
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取被删除的记录
        $data = Recommendations::find($id);
        // 获取封面图存储路径
        $path = "upload/images/".$data->rimg;
        if(file_exists($path)){
            // 删除封面图
            unlink($path);
            Recommendations::destroy($id);
            return back()->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }

    }
}
