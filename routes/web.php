<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




// 乔超玉21-80
// 分区版块路由
Route::group(['middleware'=>'admin/login'],function(){
	// 分区板块
	// 添加子分类
	Route::get('/admin/cates/{id}','Admin\CatesController@create');
	Route::resource('/admin/cates','Admin\CatesController');
	// 帖子回收站
	Route::get('/admin/topics/delist','Admin\TopicsController@delist');
	// 恢复软删除帖子
	Route::get('/admin/topics/rec/{id}','Admin\TopicsController@recovery');
	// 彻底删除帖子
	Route::get('/admin/topics/de/{id}','Admin\TopicsController@delete');
	// 帖子加减置顶
	Route::get('/admin/topics/zd/{id}','Admin\TopicsController@zd');
	// 帖子加减精
	Route::get('/admin/topics/jh/{id}','Admin\TopicsController@jh');
	// 帖子可否回复
	Route::get('/admin/topics/re/{id}','Admin\TopicsController@re');
	// 帖子资源路由
	Route::resource('/admin/topics','Admin\TopicsController');
	// 回帖资源路由
	Route::resource('admin/replys','Admin\ReplysController');
	// 推荐位资源路由
	Route::resource('admin/recommendations','Admin\RecommendationsController');

	// 后台首页
	Route::get('/admin/index','Admin\IndexController@index');
	// 轮播图路由
	Route::resource('/admin/slides','Admin\SlidesController');
	// 友情链接路由
	Route::resource('/admin/friendlinks','Admin\FriendLinksController');
	// 网站设置路由
	Route::resource('/admin/webset','Admin\WebsetController');
	// 用户管理
	// 修改密码
	Route::get('/admin/users/changeupass/{id}','Admin\UserController@changeupass');
	Route::post('/admin/users/newpass/{id}','Admin\UserController@newpass');
	Route::resource('/admin/users','Admin\UserController');
	// 公告管理
	Route::resource('/admin/announcements','Admin\AnnouncementsController');
	// 推荐位管理
	Route::resource('/admin/recommendations','Admin\RecommendationsController');
});

// 后台登录
Route::get('admin/login','Admin\LoginController@index');
Route::post('admin/login/dologin','Admin\LoginController@dologin');
Route::get('admin/login/logout','Admin\LoginController@logout');
// 503
Route::get('errors/503',function(){
	return view('errors.503');
});
// 404
Route::get('errors/404',function(){
	return view('errors.404');
});

Route::group(['middleware'=>'toggle'],function(){
	// 前台路由
	// 前台首页
	Route::get('/','Home\IndexController@index');
	// 版块列表
	Route::get('/cates/{id}','Home\CatesController@index');
	// 帖子列表
	Route::get('/cates/topics/{id}','Home\TopicsController@index');
	// 发帖弹出页面选择类别
	Route::get('/topicsmodal','Home\TopicsController@modal');
	// 帖子
	Route::resource('/topics','Home\TopicsController');
	// 前台路由组（登录后发可操作）
	Route::group(['middleware'=>'home/login'],function(){
		// 跟帖
		Route::post('/answers/store','Home\AnswerController@store');
		// 回帖
		Route::resource('replys','Home\ReplysController');
		// 发帖页面
		Route::get('/topics/cates/{id}','Home\TopicsController@add');
		// 个人资料修改
		Route::get('/home/users/update','Home\UserController@zlxg');
		// 修改资料保存
		Route::post('/home/users/save','Home\UserController@save');
		// 个人信息
		Route::get('/home/users/index','Home\UserController@userinfo');
		// 签到
		Route::resource('signin','Home\SigninController');
		// 删除帖子
		Route::get('users/destroy/{id}','Home\UserController@destroy');
		// 回复
		Route::get('users/replys/{id}','Home\UserController@replys');
		// 收藏
		Route::get('users/collection/{id}','Home\UserController@collection');
		// 取消收藏
		Route::get('users/remove/{id}','Home\UserController@remove');
		// 我的关注
		Route::get('users/follows/{id}','Home\UserController@follows');
		// 取消关注
		Route::get('users/unfollows/{id}','Home\UserController@unfollows');
		// 我的粉丝
		Route::get('users/fans/{id}','Home\UserController@fans');
		// 加关注
		Route::get('users/addfollow/{id}','Home\UserController@addfollow');
		// 帖子详情页加收藏
		Route::get('topics/addcollection/{uid}/{tid}','Home\UserController@addcollection');
	});

	//孟建宁81-130
	// 前台注册页
	Route::get('/home/register','Home\RegisterController@register');
	// 手机号验证
	Route::post('/home/register','Home\RegisterController@doregister');
	// 发送短信
	Route::get('/home/register/info','Home\RegisterController@info');
	// 前台登录页
	Route::get('/home/login','Home\LoginController@login');
	// 前台登录验证
	Route::post('/home/dologin','Home\LoginController@dologin');
	// 前台退出
	Route::get('/home/loginout','Home\LoginController@loginout');
	// 忘记密码
	Route::get('/home/findpwd/index','Home\LoginController@findpwd');
	// 忘记密码手机发送验证码
	Route::get('/home/findpwd/info','Home\LoginController@info');
	// 忘记密码判断验证码
	Route::post('/home/findpwd/dofindpwd','Home\LoginController@dofindpwd');
	// 修改密码
	Route::get('/home/findpwd/uppwd','Home\LoginController@uppwd');
	// 保存密码
	Route::post('/home/findpwd/save','Home\LoginController@save');
	// 前台公告
	Route::get('/home/announcements/index/{id}','Home\AnnouncementsController@show');
	// 前台搜索
	Route::get('/home/search','Home\TopicsController@search');
	// 前台网站设置
	Route::get('/home/webset','Home\IndexController@webset');
	// 个人空间  ta的资料
	Route::get('users/index/{id}','Home\UserController@index');
	// 个人空间的帖子
	Route::get('users/topics/{id}','Home\UserController@topics');
});

