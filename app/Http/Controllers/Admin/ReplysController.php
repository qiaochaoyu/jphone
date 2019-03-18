<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Replys;
use DB;
use App\Models\Answers;
class ReplysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * 删除回复
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();
        // 删除回帖
        $res1 = Replys::destroy($id);
        // 删除回帖的跟帖
        // 判断回帖是否有跟帖
        $answer = Answers::where('tid',$id)->first();
        // 判断回帖是否有回帖,如果有跟帖删除所有跟帖
        if($answer){
            $res2 = Answers::where('tid',$id)->forceDelete();
        } else {
            $res2 = true;
        }
        if($res1 && $res2) {
            DB::commit();
            return back()->with('success','删除成功！');
        } else {
            DB::rollBack();
            return back()->with('error','删除失败！');
        }
    }
}
