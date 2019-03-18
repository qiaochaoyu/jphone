<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebsetStoreRequest;
use App\Models\Websets;
use DB;
class WebsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 分页设置
        
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $data = Websets::where('wname','like','%'.$search.'%')->paginate($count); 
        // 加载视图
        return view('Admin.Webset.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载视图
        return view('Admin.Webset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsetStoreRequest $request)
    {
        // 接收数据
        // dump($request->all());
        // 检查是否有文件上传
        if ($request->hasFile('wlogo')) {
            // 创建文件上传对象
            $file = $request->file('wlogo');
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
            $websets = new Websets;
            $websets->wname = $data['wname'];
            $websets->wdescribe = $data['wdescribe'];
            $websets->wfiling = $data['wfiling'];
            $websets->wstatu = $data['wstatu'];
            $websets->wurl = $data['wurl'];
            $websets->wcright = $data['wcright'];
            $websets->wlogo = $res;
            $res = $websets->save();
            if ($res) {
                return redirect('admin/webset')->with('success','添加成功');
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
    public function show(Request $request,$id)
    {

        $webs =  Websets::find($id);
        return view('Admin.Webset.show',['webs'=>$webs]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data =  Websets::find($id);
        // 加载模板
        return view('Admin.Webset.edit',['data'=>$data]); 
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsetStoreRequest $request, $id)
    {
        // 接受数据
        $data1 = Websets::find($id);
        $filepath = 'upload/'.$data1->wlogo;
        
        $data = Websets::find($id);
        $data->wname = $request->input('wname','');
        $data->wdescribe = $request->input('wdescribe','');
        $data->wfiling = $request->input('wfiling','');
        $data->wstatu = $request->input('wstatu','');
        $data->wurl = $request->input('wurl','');
        $data->wcright = $request->input('wcright','');
        // 检查是否有文件上传
        if ($request->hasFile('wlogo')) {
            // 创建文件上传对象
            $file = $request->file('wlogo');
            // dump($file);
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time()+rand(1000,9999).'.'.$ext;
            
            // 执行文件上传 并且指定文件名称
            $res = $file->storeAs('images',$file_name);
            $data->wlogo = $res;
            
            $res1 = unlink($filepath); 
        }
        $res = $data->save();                        
        if ($res) {
                return redirect('admin/webset')->with('success','修改成功');
            } else {
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
        //
    }

    /**
     * 网站设置
     */
    static public function webset()
    {
        $webset = Websets::first();
        return $webset;
    }
}
