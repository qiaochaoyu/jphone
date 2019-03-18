<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Friendlinks;
class FriendLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示友情链接
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($request->all());
        // 分页设置
        $count = $request->input('count',5);
        // 搜索功能
        $search = $request->input('search','');
        $data = Friendlinks::where('ftitle','like','%'.$search.'%')->paginate($count); 
        // 加载视图
        return view('Admin.Friendlinks.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载视图 
        return view('Admin.Friendlinks.create');
    }

    /**
     * Store a newly created resource in storage.
     * 添加友情链接
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证数据
        $this->validate($request,[
            'ftitle' => 'required', 
            'furl' => 'required', 
        ],[
            'ftitle.required' => '标题必填',
            'furl.required' => 'url地址必填',
        ]);
        // 接收数据
        $data = $request->except('_token');
        // 把数据保存到数据库
        $friendlinks = new Friendlinks;
        $friendlinks->ftitle = $data['ftitle'];
        $friendlinks->furl = $data['furl'];
        $friendlinks->fstatu = $data['fstatu'];
        $res = $friendlinks->save();
        // 判断结果
        if ($res) {
            return redirect('admin/friendlinks')->with('success','添加成功');
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
     * Show the form for editing the specified resource.
     * 加载修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data = Friendlinks::find($id);
        // dump($data);
        // 显示模板 加载数据
        return view('Admin.Friendlinks.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * 修改友情链接
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 验证数据
        $this->validate($request,[
            'ftitle' => 'required', 
            'furl' => 'required', 
        ],[
            'ftitle.required' => '标题必填',
            'furl.required' => 'url地址必填',
        ]);
        // 保存数据到数据库
        $data = Friendlinks::find($id);
        $data->ftitle = $request->input('ftitle','');
        $data->furl = $request->input('furl','');
        $data->fstatu = $request->input('fstatu');
        $res = $data->save();
        // 判断结果
        if ($res) {
            return redirect('admin/friendlinks')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     * 删除友情链接
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 查找数据并删除
        $res = Friendlinks::destroy($id);
        // 判断结果
        if ($res) {                                                                                    
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            } else {
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
