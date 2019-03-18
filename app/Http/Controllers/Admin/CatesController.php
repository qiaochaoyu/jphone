<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
use App\Models\Topics;

class CatesController extends Controller
{
    /**
     * 显示版块列表.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $requests)
    {
        // 接受表单数据
        $request = $requests->all();
        $count = $requests->input('count',10);
        $keyword = $requests->input('keyword','');
        // 添加一个字段，并按照该字段进行排序，分页显示
        $data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->where('cname','like',"%$keyword%")->orderBy('paths','asc')->Paginate($count);
        foreach($data as $k=>$v){
            $n = substr_count($v->path,',');
            $data[$k]->cname = str_repeat('----',$n).$data[$k]->cname;
        }
        return view('Admin.Cates.index',['data'=>$data,'request'=>$request]);
    }

    /**
     * 添加分类页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        // 获取板块分类
        $data = self::getCates();
        return view('Admin.Cates.create',['data'=>$data,'id'=>$id]);
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 对表单数据进行限定
        $this->validate($request, [
            'cname' => 'required',
            'profile' => 'required',
        ],[
            'cname.required' => '版块名称不能为空',
            'profile.required' => '版块图标不能为空',
        ]);
         // 接收表单数据
        $data = $request->except('_token');
        // 接受上传图片
        $file = $request->file('profile');
        // 获取上传文件扩展名
        $ext = $file->extension();
        // 拼接文件存储名
        $file_name = time().mt_rand(1000,9999).'.'.$ext;
        $file->storeAs('images',$file_name);
        // 设置path值
        if ($data['pid'] == 0) {
            $data['path'] = 0;
        } else {
            // 获取上级分类信息
            $parent_data = Cates::find($data['pid']);
            $data['path'] =  $parent_data->path.','.$data['pid'];
        }
        // 创建模型对象
        $cates = new Cates;

        // 赋值并保存数据
        $cates -> cname = $data['cname'];
        $cates -> pid = $data['pid'];
        $cates -> path = $data['path'];
        $cates -> profile = $file_name;
        // 执行添加
        $res = $cates -> save();
        // 根据添加结果跳转到指定路由
        if($res){
            return redirect('/admin/cates')->with('success','添加成功');
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
     * 删除分类
     *
     * @param  int  $id 分类id
     * @return
     */
    public function destroy($id)
    {
        if (Cates::where('pid','=',$id)->first()) {
            return redirect($_SERVER['HTTP_REFERER'])->with('error','该分类下有子分类，不允许删除');
        } else {
            // 开启事务
             DB::beginTransaction();
            // 获取需要删除的版块
            $cates = Cates::find($id);
            // 执行删除操作
            $res = Cates::destroy($id);
            // 判断当前版块下是否有帖子
            $res3 = Topics::where('cid',$id) -> first();
            // 如果版块下有帖子则回滚事务，不允许删除
            if($res3){
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER']) -> with('error','该版块下有帖子，不允许删除！');
            }
            // 判断当前版块下是否有有子版块
            $res4 = Cates::where('pid',$id) -> first();
            // 如果版块下有子版块则回滚事务，不允许删除
            if($res4){
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER']) -> with('error','该版块下子版块，不允许删除！');
            }

            if($res){
                // 删除版块缩略图
                unlink("upload/images/".($cates->profile));
                // 提交事务
                DB::commit();
            } else {
                DB::rollBack();
                return redirect($_SERVER['HTTP_REFERER']) -> with('error','删除失败');
            }
            return redirect($_SERVER['HTTP_REFERER']) -> with('success','删除分类成功');
        }
    }

    /**
     *  返回分类板块下的分类数据
     *
     * @param  int  $id  分类id
     * @return  array
     */
    static public function getCates()
    {
        $data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // 获取数据分类，进行遍历
        foreach($data as $k=>$v){
            $n = substr_count($v->path,',');
            $data[$k]->cname = str_repeat('----',$n).$data[$k]->cname;
        }
        return $data;
    }
}
