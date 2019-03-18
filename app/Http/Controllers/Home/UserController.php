<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Topics;
use App\Models\Replys;
use App\Models\Cates;
use App\Models\Collections;
use App\Models\Follows;
use App\Models\Fans;
use DB;

class UserController extends Controller
{

    /**
     *
     */
    public static function getData($id)
    {
        //查询关注表和粉丝表 判断
        $follows = Follows::where('uid',session('homeuser')['id'])->where('foid',$id)->get();
        //获取用户的信息
        $user_data = Users::find($id);
        $arr = [$follows,$user_data];
        //dump($arr);
        return $arr;
    }

    /**
     * Display a listing of the resource.
     * 显示个人空间 首页
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // 查询用户的帖子主题数
        $topics_count = Topics::where('uid',$id)->select('cid')->count();
        // 查询用户的回帖数
        $replys_count = Replys::where('uid',$id)->count(); 
        // 查询用户最后发表时间
        $top_id = Topics::where('uid',$id)->max('id');
        $top_time = Topics::where('id',$top_id)->first();
        return view('Home.Users.index',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'topics_count'=>$topics_count,'replys_count'=>$replys_count,'index'=>0,'top_time'=>$top_time]);
    }

    /**
     * Show the form for creating a new resource.
     * 显示主题
     * @return \Illuminate\Http\Response
     */
    public function topics($id)
    {
        // 获取用户的帖子数据
        $topics_data = Topics::where('uid',$id)->orderBy('updated_at','desc')->paginate(6);
        //遍历该主题下面的该用户的帖子
        foreach ($topics_data as $key => $value) {
            $value['cate'] = Cates::where('id',$value->cid)->get();
        }
        // 加载模板，分配数据
        return view('Home.Users.topics',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'topics_data'=>$topics_data,'index'=>1]);
    }

    /**
     *
     * 我的回复
     */
    public function replys( $id)
    {
        // 该用户的回复数据
        $replys_data = Replys::where('uid',$id)->orderBy('updated_at','desc')->paginate(6);
        // 遍历数据  获取 该用户回复的帖子和主题数据
        foreach ($replys_data as $k => $v)
        {
            $v['top'] = Topics::where('id',$v->tid)->get();
            foreach ($v['top'] as $kk => $vv)
            {
                $vv['cate'] = Cates::where('id',$vv->cid)->get();
            }
        }
        return view('Home.Users.replys',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'replys_data'=>$replys_data,'index'=>1]);
    }


    /**
     * 我的收藏
     */
    public function collection($id)
    {
        // 获取用户的收藏数据
        $collection_data = Collections::where('uid',$id)->orderBy('updated_at','desc')->paginate(6);
        // 获取用户收藏的帖子
        foreach ($collection_data as $k => $v)
        {
            // 获取帖子的详细信息
            $v['top'] = Topics::where('id',$v->tid)->get();
            foreach ($v['top'] as $kk => $vv)
            {
                $vv['user'] = Users::where('id',$vv->uid)->get();
                $vv['cate'] = Cates::where('id',$vv->cid)->get();
                $vv['count'] = Collections::where('tid',$vv->id)->count();
            }
        }
        return view('Home.Users.collections',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'collection_data'=>$collection_data,'index'=>2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::begintransaction();
        // 获取需要删除的帖子
        $topics = Topics::withTrashed()->find($id);
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
             //根据条件查找跟帖
             $data = Answers::withTrashed()->where('tid',$id)->first();
             //判断跟帖是否为空，如果跟帖为空，则为$res3赋默认值，否则执行删除操作
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
     * 取消收藏
     */
    public function remove($id)
    {
        $res = Collections::where('id',$id)->forceDelete($id);

        if ($res) {
            echo '<script>alert("取消收藏成功~")</script>';
            return back();
        } else {
            echo '<script>alert("取消收藏失败~")</script>';
            return back();

        }
    }


    /**
     * 我的关注列表
     */
    public function follows($id)
    {   

        $follows_data = Follows::where('uid',$id)->orderBy('updated_at','desc')->paginate(10);
        foreach ($follows_data as $key => $value) {
            $value['user'] = Users::where('id',$value->foid)->get();
        }

        return view('Home.Users.follows',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'follows_data'=>$follows_data,'index'=>3]);
    }

    /**
     * 取消关注
     */
    public function unfollows($id)
    {
        $res = Follows::where('foid',$id)->delete();
        if ($res) {
            return back()->with('success','取消关注成功');
        } else {
            return back()->with('error','取消关注失败');
        }
    }

    /**
     * 我的粉丝
     */
    public function fans($id)
    {
        $fans_data = Fans::where('uid',$id)->orderBy('updated_at','desc')->paginate(10);
        foreach ($fans_data as $key => $value) {
            $value['user'] = Users::where('id',$value->faid)->get();
        }

        return view('Home.Users.fans',['id'=>$id,'follows'=>self::getData($id)[0],'user_data'=>self::getData($id)[1],'fans_data'=>$fans_data,'index'=>3]);
    }


    /**
     * 执行加关注
     */
    public function addfollow($id)
    {

        //判断是否登录
        if(!session('homeuser')){
            echo '<script>alert("请先去登录!");location.href="/home/login";</script>';
        }

        $follow = new Follows;
        $follow->uid = session('homeuser')['id'];
        $follow->foid = $id;
        $res1 = $follow->save();

        $fans = new Fans;
        $fans->uid = $id;
        $fans->faid = session('homeuser')['id'];
        $res2 = $fans->save();

        if ($res1 && $res2) {
            return back()->with('success','关注成功~');
        } else {
            return back()->with('error','关注失败~');
        }
    }

    /**
     * 修改个人资料
     */
    public function zlxg(Request $request)
    {
        // 获取session的登录信息中的id
        $value = $request->session()->get('homeuser')->id;
        // 通过id find查找
        $data = Users::find($value);
        // dump($data);
        // 加载视图 分配数据
        return view('Home.Users.zlxg',['data'=>$data]);
    }

    /**
     * 修改资料验证
     */
    public function save(Request $request)
    {
        // 验证数据
        $this->validate($request,[
            'phone' => 'regex:/^1[345678]{1}\d{9}$/', 
            'nickname' => 'max:15', 
            'email' => 'regex:/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/',
        ],[
            'phone.regex' => '请输入正确的手机号',
            'email.regex' => '邮箱格式不正确',
            'nickname.max' => '长度不能超过15个字',
        ]);
        // 接收数据
        $res = $request->except('_token','formhash');
        // 获取session中的登录信息下的id
        $value = $request->session()->get('homeuser')->id;
        // 通过id在数据库中查找该条数据
        $data = Users::find($value);
        // 把表单传过来的数据更新到数据库
        $data->nickname = $res['nickname'];
        $data->phone = $res['phone'];
        $data->sex = $res['sex'];
        $data->birthday = $res['birthday'];
        $data->email = $res['email'];
        // 检查是否有文件上传
        if ($request->hasFile('face')) {
            // 创建文件上传对象
            $file = $request->file('face');
            // dump($file);
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time()+rand(1000,9999).'.'.$ext;
            // 执行文件上传 并且指定文件名称
            $face = $file->storeAs('faces',$file_name);
            $data->face = $face;
        }
        // 保存到数据库
        $res1 = $data->save();
        // 把修改完的信息存入session
        session(['homeuser'=>$data]);
        if ($res1) {
            return redirect('/home/users/update')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }

    }



    /**
     * 帖子加收藏
     */
    public  function addcollection($uid,$tid)
    {
        // 加收藏
        $collection = new Collections;
        $collection->uid = $uid;
        $collection->tid = $tid;
        $res = $collection->save();
        if ($res) {
           echo '<script>alert("收藏成功~");</script>';
           return back();
        }  
    }
}