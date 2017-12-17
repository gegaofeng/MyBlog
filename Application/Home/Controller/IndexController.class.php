<?php
namespace Home\Controller;
use Think\Controller;
//use Home\Common\Tool;
class IndexController extends Controller {
    public function index(){
        //登录状态检测
    	//$user=A("Tool");
    	$user=new \Home\Common\tool\ToolController();
    	$user->statecheck();
        //分页显示
        $docList=D('Document');
        $count=$docList->where('status=1')->count();
        $page=new \Think\Page($count,10);
        $show=$page->showExt();
        $this->assign('page',$show);
        //文章显示
        $result=$docList->where('status=1')->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        //$result=$docList->documentList();
        //dump($result);
        $Category = D('Category');
        foreach ($result as &$v) {
            //$v['create_time'] = date('Y-m-d H:i',$v['create_time']);
            $v['create_time']=date('Y-m-d H:i:s',$v['create_time']);
            $tmpId = $v['category_id'];
            $where = "id=$tmpId";
            $row =  $Category->where($where)->find();
            switch ($row['name']){
                case "php":
                    $v['icon_url'] = '/home/article/lists/category/php.html';
                    $v['icon'] = '/Public/static/icons/php.jpg';
                    $v['icon_alt'] = 'php';
                    break;
                case "redis":
                    $v['icon_url'] = '/home/article/lists/category/redis.html';
                    $v['icon'] = '/Public/static/icons/redis.jpg';
                    $v['icon_alt'] = 'redis';
                    break;
                case "memcached":
                    $v['icon_url'] = '/home/article/lists/category/memcached.html';
                    $v['icon'] = '/Public/static/icons/memcached.jpg';
                    $v['icon_alt'] = 'memcached';
                    break;
                case "mongodb":
                    $v['icon_url'] = '/home/article/lists/category/mongodb.html';
                    $v['icon'] = '/Public/static/icons/mongodb.jpg';
                    $v['icon_alt'] = 'mongodb';
                    break;
                case "mysql":
                    $v['icon_url'] = '/home/article/lists/category/mysql.html';
                    $v['icon'] = '/Public/static/icons/mysql.jpg';
                    $v['icon_alt'] = 'mysql';
                    break;
                case "linux":
                    $v['icon_url'] = '/home/article/lists/category/linux.html';
                    $v['icon'] = '/Public/static/icons/linux.jpg';
                    $v['icon_alt'] = 'linux';
                    break;
                case "apache":
                    $v['icon_url'] = '/home/article/lists/category/apache.html';
                    $v['icon'] = '/Public/static/icons/apache.jpg';
                    $v['icon_alt'] = 'apache';
                    break;
                case "nginx":
                    $v['icon_url'] = '/home/article/lists/category/nginx.html';
                    $v['icon'] = '/Public/static/icons/nginx.jpg';
                    $v['icon_alt'] = 'nginx';
                    break;
                case "nodejs":
                    $v['icon_url'] = '/home/article/lists/category/nodejs.html';
                    $v['icon'] = '/Public/static/icons/nodejs.jpg';
                    $v['icon_alt'] = 'nodejs';
                    break;
                case "ionic":
                    $v['icon_url'] = '/home/article/lists/category/ionic.html';
                    $v['icon'] = '/Public/static/icons/ionic.jpg';
                    $v['icon_alt'] = 'ionic';
                    break;
                default:
                    $v['icon_url'] = '/home/article/lists/category/argularjs.html';
                    $v['icon'] = '/Public/static/icons/argularjs.jpg';
                    $v['icon_alt'] = 'argularjs';
            }
        }
        $this->assign('lists',$result);
        $this->show();
    }

/*
    private function statecheck(){
    	    if (session('username')) {
            $nav[username]=session('username');
            $nav[logout]="注销";
            $nav[logurl]='/home/user/manager';
            $nav[regurl]='/home/user/logout';
        }else{
            $nav[username]="登录";
            $nav[logout]="注册";
            $nav[logurl]='/home/user/login';
            $nav[regurl]='/home/user/register';
        }
        $this->assign('nav',$nav);
    }
*/
}