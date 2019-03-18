<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slides;
class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示轮播图
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($request->all());
        // 分页设置
        $count = $request->input('count',5);
        $search = $request->input('search','');
        // 搜索功能
        $data = Slides::where('stitle','like','%'.$search.'%')->paginate($count); 
        // 加载视图 分配数据
        return view('Admin.Slides.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     * 加载添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加视图
        return view('Admin.Slides.create');
    }

    /**
     * Store a newly created resource in storage.
     * 添加轮播图
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证数据
        $this->validate($request,[
            'stitle' => 'required', 
            'surl' => 'required', 
            'simg' => 'required', 
        ],[
            'stitle.required' => '标题必填',
            'surl.required' => 'url地址必填',
            'simg.required' => '图片必填',
        ]);
        // 检查是否有文件上传
        if ($request->hasFile('simg')) {
            // 创建文件上传对象
            $file = $request->file('simg');
            // dump($file);
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time()+rand(1000,9999).'.'.$ext;
            // 执行文件上传 并且指定文件名称
            $res = $file->storeAs('images',$file_name);
            // dump($res);
            // 接收表单数据
            $data = $request->except(['_token']);
            // dump($data);
            // 把传过来的数据保存到数据库
            $slides = new Slides;
            $slides->stitle = $data['stitle'];
            $slides->surl = $data['surl'];
            $slides->sstatu = $data['sstatu'];
            $slides->simg = $res;
            $res = $slides->save();
            // 判断结果
            if ($res) {
                return redirect('admin/slides')->with('success','添加成功');
            } else {
                return back()->with('error','添加失败');
            }
        } else {
            return back();
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
     * 加载修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Slides::find($id);
        // 显示模板 加载数据
        return view('Admin.Slides.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * 修改轮播图
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 验证数据
        $this->validate($request,[
            'stitle' => 'required', 
            'surl' => 'required', 
        ],[
            'stitle.required' => '标题必填',
            'surl.required' => 'url地址必填',
        ]);
        // 删除旧的图片
        $data1 = Slides::find($id);
        $filepath = 'upload/'.$data1->simg;
        $res1 = unlink($filepath);
        // 通过id查找修改的数据
        $data = Slides::find($id);
        // 将表单的数据存到数据库
        $data->stitle = $request->input('stitle','');
        $data->surl = $request->input('surl','');
        $data->sstatu = $request->input('sstatu','');

        // 检查是否有文件上传
        if ($request->hasFile('simg')) {
            // 创建文件上传对象
            $file = $request->file('simg');
            // dump($file);
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time()+rand(1000,9999).'.'.$ext;
            // 执行文件上传 并且指定文件名称
            $res = $file->storeAs('images',$file_name);
            $data->simg = $res;
            // 判断结果
            if ($res) {
                $res = $data->save();
                return redirect('admin/slides')->with('success','修改成功');
            } else {
                return back()->with('error','修改失败');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除轮播图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 通过id查找数据
        $res = Slides::destroy($id);
        // 判断结果
        if ($res) {
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            } else {
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        } 
    }
}
