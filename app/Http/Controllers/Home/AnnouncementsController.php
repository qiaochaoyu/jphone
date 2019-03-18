<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcements;
use App\Models\Users;
class AnnouncementsController extends Controller
{
    /**
     * 显示公告
     */

    public function show($id)
    {
    	// 获取公告
        $announcements = Announcements::find($id);
        // 获取发公告的用户
        $users = Users::where('id',$announcements->uid)->limit(5)->get();
        // 加载视图 分配数据
        return view('Home.Announcements.index',['announcements'=>$announcements,'users'=>$users]);
    }
}
