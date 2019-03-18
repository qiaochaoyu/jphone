<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcements;
use App\Models\Users;
class AnnouncementsController extends Controller
{
    /**
     * 
     */

    public function show($id)
    {
    	// 获取公告
        $announcements = Announcements::find($id);
        $users = Users::where('id',$announcements->uid)->limit(5)->get();
        return view('Home.Announcements.index',['announcements'=>$announcements,'users'=>$users]);
    }
}
