<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Users;
use App\Models\Topics;
use App\Models\Replys;
use App\Models\Answers;
use App\Models\Collections;
use App\Models\Fans;
use App\Models\Announcements;
use Hash;
use DB;
use Illuminate\Validation\Validator;
use App\Models\Recommendations;
class UserController extends Controller
{
    /**
     * 显示用户列表页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 接收分页数据 如果没有默认为5
        $count = $request->input('count',5);
        // 接收查询参数 没有默认为空
        $search = $request->input('search','');
        // 查询并分页显示结果 加搜索条件
        $data = Users::where('nickname','like','%'.$search.'%')->paginate($count);
        // 加载视图 分配数据 request 接收的参数数组
        return view('Admin.Users.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * 加载添加用户页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载视图
        return view('Admin.Users.create');
    }

    /**
     * 执行添加用户操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest  $request)
    {   
        // 接收文件上传
        if ($request->hasFile('face')) {
            // 创建文件上传对象
            $file = $request->file('face');
            // 执行文件上传 指定上传的文件名称
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time().rand(1000,9999).'.'.$ext;
            // 下载到指定位置
            $file_path = $file->storeAs('public',$file_name);
            
        }
            // 接收数据
            $data = $request->except(['_token','repass']);
            // 创建模型
            // 实例化
            $users = new Users;
            // 添加数据
            $users->auth     = $data['auth'];
            $users->uname    = $data['uname'];
            // 使用哈希值加密密码 
            $users->upass    = Hash::make($data['upass']);
            $users->nickname = $data['nickname'];
            $users->phone    = $data['phone'];
            $users->email    = $data['email'];
            $users->face     = $file_path;
            $users->lasttime = date('Y-m-d H:i:s',time());
            // 添加到数据库
            $res = $users->save();
            // 判断是否添加成功
            if ($res) {
                return redirect('admin/users')->with('success','添加成功');
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
     * 加载修改用户页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        // 接收参数为id的原来数据
        $data = Users::find($id);
        // 加载修改页面视图  分配参数
        return view('Admin.Users.edit',['data'=>$data]);
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
       
        // 接收文件上传
        if ($request->hasFile('face')) {
            // 创建文件上传对象
            $file = $request->file('face');
            // 执行文件上传 指定上传的文件名称
            
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接名称
            $file_name = time().rand(1000,9999).'.'.$ext;
            // 获取下载的指定路径
            $file_path = $file->storeAs('public',$file_name);       
        }
        
        // 接收修改后的数据
        $data = $request->except(['_token','_method']);
        
        // 修改信息
        $users = Users::find($id);
        $users->auth     = $data['auth'];
        $users->uname    = $data['uname'];
        $users->nickname = $data['nickname'];
        $users->phone    = $data['phone'];
        $users->email    = $data['email'];
        $users->face     = $file_path;
        $users->ascore   = $data['ascore'];
        $users->lasttime = date('Y-m-d H:i:s',time());
        $users->save();
        // 把修改后的信息添加到数据库
        $res = $users->save();
        // 判断是否添加成功
        if ($res) {
            return redirect('admin/users')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
        }   
    }

    /**
     * 执行删除操作
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 开启事务
        DB::beginTransaction();
        // 获取当前用户的发帖数
        $top_count = Topics::where('uid',$id)->count();
        if ($top_count) {
            // 获取被删除用户的所有主贴
            $topics = Topics::where('uid',$id)->get();
            // 对该用户的所有主贴进行遍历，获取所有帖子id
            $arr = [];
            foreach ($topics as $k => $v) {
                $arr[] = $v->id;   
            }
            // 删除帖子的回帖
            Replys::whereIn('tid',$arr)->forceDelete();
            // 删除帖子的跟帖
            Answers::whereIn('tid',$arr)->forceDelete();
            // 删除帖子的收藏
            Collections::whereIn('tid',$arr)->forceDelete();
            // 删除所有的推荐阅读
            Recommendations::whereIn('tid',$arr)->delete();
            // 删除所有的主贴
            $res1 = Topics::where('uid',$id)->forceDelete();
        } else {
            $res1 = true;
        }
        


        // 删除被删除用户的回贴
        // 首先获取要删除用户的一条回贴
        $user_replys = Replys::where('uid',$id)->first();
        // 如果用户有回帖则删除该用户所有的回帖
        if ($user_replys) {
            $res2 = Replys::where('uid',$id)->forceDelete();
        } else {
            $res2 = true;
        }


        // 删除被删除用户的跟帖
        // 获取用户的一条跟帖
        $user_answers = Answers::where('uid',$id)->first();
        // 如果用户有跟帖则删除所有的跟帖
        if ($user_answers) {
           $res3 =  Answers::where('uid',$id)->forceDelete();
        } else {
            $res3 = true;
        }

        // 删除用户的收藏
        // 获取用户的一条收藏
        $collections = Collections::where('uid',$id)->first();
        if ($collections) {
            $res4 = Collections::where('uid',$id)->forceDelete();
        } else {
            $res4 = true;
        }

        // 删除用户的粉丝
        // 获取用户的一条粉丝
        $fans = Fans::where('uid',$id)->orWhere('faid',$id)->first();
        if ($fans) {
            $res6 = Fans::where('uid',$id)->orWhere('faid',$id)->delete();
        } else {
            $res6 = true;
        }

        // 删除用户发布的公告
        // 获取用户的一条公告
        $announcements = Announcements::where('uid',$id)->first();
        if ($announcements) {
            $res5 = Announcements::where('uid',$id)->delete();
        } else {
            $res5 = true;
        }
        // 删除用户
        // 获取数据
        $data = Users::where('id',$id)->first();  
        // 执行删除操作
        $res = $data->forceDelete();

         //判断是否删除成功
        if ($res && $res1 && $res2 && $res3 && $res4 && $res5) {
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        } else {
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }  
    }


    /**
     * 加载修改密码页面
     */
    public function changeupass($id)
    {
        return view('Admin.Users.changeupass',['id'=>$id]);
    }


    /**
     * 执行修改密码
     */
    public function newpass(Request $request, $id)
    {   
        // 获取当前用户的信息
        $user = Users::find($id);
        // 接收表单提交过来的数据
        $input = $request->except('_token');
        // 解密表单传过来的密码，判断是否与原密码一致
        $res = Hash::check($input['upass'],$user->upass);
        // 如果不一致 则返回
        if (!$res) {
            return back()->with('error','原密码输入不正确');
        }
        // 进行表单验证
        $this->validate($request, [
            'upass'   => 'required',
            'newpass' => 'required|regex:/^[\w]{6,18}$/',
            'repass'  => 'required|same:newpass',
         ],[
            'upass.required'   => '*旧密码必填',
            'newpass.required' => '*新密码必填',
            'newpass.regex'    => '*密码不能少于6位数',
            'repass.required'  => '*确认密码必填',
            'repass.same'      => '*两次密码不一致',
         ]);
        // 把修改后的密码加密且存到数据库
        $user->upass = Hash::make($input['newpass']);
        $res1 = $user->save();
        if ($res1) {
            return redirect('/admin/login')->with('success','您的密码已修改，请重新去登录~');
        } else {
            return back()->with('error','修改密码失败!');
        }


    }


}
