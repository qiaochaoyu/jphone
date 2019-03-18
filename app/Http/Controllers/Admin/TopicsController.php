<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topics;
use App\Models\Replys;
use DB;
use App\Models\Collections;
use App\Models\Recommendations;
use App\Models\Answers;


class TopicsController extends Controller
{
    /**
     * 显示帖子列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // 接受表单数据
        $requests = $request->all();
        // 获取搜索关键字
        $keyword = $request->input('keyword','');
        // 获取表单提交的分页条数
        $size =  $request->input('size',15);
        $data = Topics::where('ttitle','like',"%$keyword%")->orderBy('count','desc')->orderBy('recount','desc')->paginate($size);
        //加载视图，分配数据
        return view('Admin.Topics.index',['data'=>$data,'requests'=>$requests,'size'=>$size]);
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
     * 显示帖子详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取帖子信息
        $data = Topics::find($id);
        // 获取帖子的回复信息
        $rep_data = $data->replys;
        return view('Admin.Topics.show',['data'=>$data,'rep_data'=>$rep_data]);

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
     * Remove 软删除帖子.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();
        //删除主贴
        $res1 = Topics::destroy($id);
        // 判断主贴对应的回帖是否为空，如果为空则赋值$res2 为true
        $data = Replys::where('tid',$id)->first();
        if(empty($data)){
            $res2 = true;
            $res3 = true;
        } else {
            // 删除回帖
            $res2 = Replys::where('tid',$id)->delete();
            // 判断跟帖是否为空，如果跟帖不为空执行删除
            $data2 = Answers::where('tid',$id)->first();
            if(data2){
                $res3 = Answers::where('tid',$id)->delete();
            }
        }


        // 删除帖子的收藏
        // 根据条件查找收藏
        $data = Collections::where('tid',$id)->first();
        // 判断帖子是否被收藏
        if($data){
            $res4 = Collections::where('tid',$id)->delete();
        } else {
            $res4 = true;
        }


        // 根据条件查找推荐阅读
        $data = Recommendations::where('tid')->first();
        // 判断是否被推荐，如果被推荐则删除推荐，否则赋默认值true
        if($data){
            $res5 = Recommendations::where('tid',$id)->delete();
        } else {
            $res5 = true;
        }


        if($res1 && $res2 && $res3 && $res4 && $res5){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        } else {
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return 显示删除帖子列表
     */
    public function delist(Request $request)
    {
        $requests = $request->all();
        $keyword = $request->input('keyword','');
        $size =  $request->input('size',15);
        $data = Topics::onlyTrashed()->where('ttitle','like',"%$keyword%")->orderBy('deleted_at','desc')->paginate($size);
        return view('Admin.Topics.delist',['data'=>$data,'size'=>$size,'requests'=>$requests]);
    }



    /**
     * [delete 恢复软删除帖子]
     * @param  [int] $id [主贴id]
     * @return [boolean]     [软删除恢复是否成功]
     */
    public function recovery($id)
    {
       DB::begintransaction();
       // 恢复删除的主贴
       $res1 = Topics::withTrashed()
            ->where('id', $id)
            ->restore();


        // 恢复删除的回帖
        // 首先判断主贴对应的回帖是否为空
        $data = Replys::withTrashed()->where('tid', $id)
            ->first();
        // 如果查询结果为空，则直接赋值res2 为true
        if(empty($data)){
            $res2 = true;
            $res3 = true;
        } else {
             $res2 = Replys::withTrashed()
                     ->where('tid', $id)
                     ->restore();
            // 获取跟帖数据
            $data = Answers::withTrashed()->where('tid', $id)
                    ->first();
            // 判断获取数据是否为空，若为空则直接赋值res3 为true，否则恢复跟帖
            if(empty($data)){
                $res3 = true;
            } else {
                 $res3 = Answers::withTrashed()
                         ->where('tid', $id)
                         ->restore();
            }
        }
        
        // 在软删除中根据条件查找收藏
        $data = Collections::withTrashed()->where('tid',$id)->first();
        // 判断帖子是否被收藏,若被被收藏则恢复收藏记录
        if($data){
            $res4 = Collections::withTrashed()->where('tid',$id)->restore();
        } else {
            $res4 = true;
        }
       
        if($res1 && $res2  && $res3 && $res4){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','恢复成功');
        } else {
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','恢复失败');
        }
    }



    /**
     * [delete 彻底删除帖子]
     * @param  [int] $id [主贴id]
     * @return [boolean]     [删除是否成功]
     */
    public function delete($id)
    {
        // 开启事务
        DB::begintransaction();
        // 获取需要删除的帖子
        $topics = Topics::withTrashed()->find($id);
        /*dd(topics);*/
        // 执行彻底删除操作
        $res1 = $topics -> forceDelete();

        // 查询主贴对应的回帖是否为空
        $data = Replys::withTrashed()
                ->where('tid', $id)
                ->first();
        // 判断回帖是否为空，如果回帖为空，则为$res2和$res3赋默认值，否则执行删除操作
        if(empty($data)){
            $res2 = true;
            $res3 = true;
        } else {
             $res2 = $data -> forceDelete();
             // 根据条件查找跟帖
             $data = Answers::withTrashed()->where('tid',$id)->first();
             // 判断跟帖是否为空，如果跟帖为空，则为$res3赋默认值，否则执行删除操作
             if(empty($data)){
                $res3 = true;
            } else {
                 $res3 = Answers::withTrashed()
                         ->where('tid', $id)
                         ->forceDelete();
            }
        }
        // 在软删除中根据条件查找收藏
        $data = Collections::withTrashed()->where('tid',$id)->first();
        // 判断帖子是否被收藏,若被被收藏则彻底收藏记录
        if($data){
            $res4 = Collections::withTrashed()->where('tid',$id)->forceDelete();
        } else {
            $res4 = true;
        }

        if($res1 && $res2 && $res3 && $res4){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        } else {
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }




    /**
     * [zd description]
     * @param  [int] $id []
     * @return []     [跳转到当前页面的前一页面的 URL 地址]
     * 帖子置顶
     */
    public function zd($id)
    {
        $topics = Topics::find($id);
        if($topics->top == 0){
            $topics->top = 1;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','添加置顶成功');
        } else {
            $topics->top = 0;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','取消置顶成功');
        }
        
        
    }
    /**
     * [jh description]
     * @param  [int] $id [主贴ID]
     * @return []     [跳转到当前页面的前一页面的 URL 地址]
     * 为帖子添加精华
     */
    public function jh($id)
    {
        $topics = Topics::find($id);
        if($topics->cream == 0){
            $topics->cream = 1;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','添加精华成功');
        } else {
            $topics->cream = 0;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','取消精华成功');
        }
    }
    /**
     * @param  [int] $id [主贴id]
     * @return [type]     [跳转到当前页面的前一页面的 URL 地址]
     * 作用：设置帖子是否可回复
     */
    public function re($id)
    {
       // 获取帖子
        $topics = Topics::find($id);
        if($topics->stoprep == 0){
            $topics->stoprep = 1;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','设置不可回复成功');
        } else {
            $topics->stoprep = 0;
            $topics->save();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','设置不可回复成功');
        }
    }
}
