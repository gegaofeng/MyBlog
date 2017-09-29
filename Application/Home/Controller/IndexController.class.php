<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){
        $Category = D('Category');
        $category = $Category->getTree();
        $Document = D('Document');
        $count      = $Document->where('status=1')->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('header','个会员');
        $show       = $Page->showExt();// 分页显示输出
//        $lists    = D('Document')->lists(null);
        $lists = $Document->where('status=1')->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('category',$category);//栏目
//        $this->assign('page',D('Document')->page);//分页
        $this->assign('page',$show);// 赋值分页输出
        //获取分类图标
        foreach($lists as &$v){
            $tmpId = $v['category_id'];
            $where = "id=$tmpId";
            $row =  $Category->where($where)->find();
            $v['create_time'] = date('Y-m-d H:i',$v['create_time']);
            switch ($row['name'])
            {
                case "php":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/php.html';
                    $v['icon'] = '/Public/static/icons/php.jpg';
                    $v['icon_alt'] = 'php';
                    break;
                case "redis":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/redis.html';
                    $v['icon'] = 'in/Public/static/icons/redis.jpg';
                    $v['icon_alt'] = 'redis';
                    break;
                case "memcached":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/memcached.html';
                    $v['icon'] = '/Public/static/icons/memcached.jpg';
                    $v['icon_alt'] = 'memcached';
                    break;
                case "mongodb":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/mongodb.html';
                    $v['icon'] = '/Public/static/icons/mongodb.jpg';
                    $v['icon_alt'] = 'mongodb';
                    break;
                case "mysql":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/mysql.html';
                    $v['icon'] = '/Public/static/icons/mysql.jpg';
                    $v['icon_alt'] = 'mysql';
                    break;
                case "linux":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/linux.html';
                    $v['icon'] = '/Public/static/icons/linux.jpg';
                    $v['icon_alt'] = 'linux';
                    break;
                case "apache":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/apache.html';
                    $v['icon'] = '/Public/static/icons/apache.jpg';
                    $v['icon_alt'] = 'apache';
                    break;
                case "nginx":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/nginx.html';
                    $v['icon'] = '/Public/static/icons/nginx.jpg';
                    $v['icon_alt'] = 'nginx';
                    break;
                case "nodejs":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/nodejs.html';
                    $v['icon'] = '/Public/static/icons/nodejs.jpg';
                    $v['icon_alt'] = 'nodejs';
                    break;
                case "ionic":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/ionic.html';
                    $v['icon'] = '/Public/static/icons/ionic.jpg';
                    $v['icon_alt'] = 'ionic';
                    break;
                default:
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/argularjs.html';
                    $v['icon'] = '/Public/static/icons/argularjs.jpg';
                    $v['icon_alt'] = 'argularjs';
            }
        }
        $this->assign('lists',$lists);//列表

        $this->display();
    }

}