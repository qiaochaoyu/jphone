<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recommendations;

class RecommendationsController extends Controller
{
	/**
	 * [获取推荐阅读表中最近更新的三条数据]
	 * @return [数组] [包含三条数据对象的数组]
	 */
    public static function getRecommendations()
    {
    	return Recommendations::orderBy('updated_at','desc')->limit(3)->get();
    }
}
