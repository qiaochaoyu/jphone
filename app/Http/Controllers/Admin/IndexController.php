<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 加载后台首页页面
     * @return [type] [description]
     */
    public function index()
    {
    	return view('Admin.Index.index');
    }
    
}
