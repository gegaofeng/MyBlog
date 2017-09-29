<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class ArticleController extends HomeController {

    /* 文档模型频道页 */
	public function index(){
		/* 分类信息 */
		$category = $this->category();

		//频道页只显示模板，默认不读取任何内容
		//内容可以通过模板标签自行定制

		/* 模板赋值并渲染模板 */
		$this->assign('category', $category);
		$this->display($category['template_index']);

	}

    /**
     * 文档搜索
     */
    public function search(){

        $Category = D('Category');

        $paths = pathinfo($_SERVER['REQUEST_URI']);
        $word = urldecode($paths['basename']);

        $Document = D('Document');
        $where = "title like '%$word%'";
        $count = $Document->where($where)->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->showExt(); // 分页显示输出
        $lists = $Document->where($where)->order('create_time')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show); // 赋值分页输出
        if (false === $lists) {
            $this->error('获取列表数据失败！');
        }
        //获取分类图标
        foreach($lists as &$v){
            $tmpId = $v['category_id'];
            $where = "id=$tmpId";
            $row =  $Category->where($where)->find();
            switch ($row['name'])
            {
                case "php":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/php.html';
                    $v['icon'] = '/Public/static/icons/php.jpg';
                    $v['icon_alt'] = 'php';
                    break;
                case "redis":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/redis.html';
                    $v['icon'] = '/Public/static/icons/redis.jpg';
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
        /* 模板赋值并渲染模板 */
        $this->assign('lists', $lists);
        $this->display('search');

    }


	/* 文档模型列表页 */
	public function lists($p = 1){
        /* 分类信息 */
        $Category = D('Category');
        $category = $this->category();
        /* 获取当前分类列表 */
        $Document = D('Document');
        //1：顶级分类取当前分类下文章 2：非顶级取当前分类下的所有子分类下文章
       if($category['pid'] == 0 && $category['allow_publish'] == 0){
            $tmpId = $category['id'];
            $tmpWhere = "pid=$tmpId";
            $childIds = D('Category')->where($tmpWhere)->select();
            foreach($childIds as $v){
                $childList[] = $v['id'];
            }
            $childStr = implode(',',$childList);
            $where = "status=1 AND category_id in ($childStr)";
        }else{
            $where = "status=1 AND category_id=" . $category['id'];
       }
        $count = $Document->where($where)->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 15); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->showExt(); // 分页显示输出
        $lists = $Document->where($where)->order('create_time')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show); // 赋值分页输出
        if (false === $lists) {
            $this->error('获取列表数据失败！');
        }
        //获取分类图标
        foreach($lists as &$v){
            $tmpId = $v['category_id'];
            $where = "id=$tmpId";
            $row =  $Category->where($where)->find();

            switch ($row['name'])
            {
                case "php":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/php.html';
                    $v['icon'] = '/Public/static/icons/php.jpg';
                    $v['icon_alt'] = 'php';
                    break;
                case "redis":
                    $v['icon_url'] = '/index.php?s=/home/article/lists/category/redis.html';
                    $v['icon'] = '/Public/static/icons/redis.jpg';
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
        /* 模板赋值并渲染模板 */
        $this->assign('category', $category);
        $this->assign('lists', $lists);
        //seo


        $this->assign('meta_title', $category['meta_title']);
        $this->assign('keywords', $category['keywords']);
        $this->assign('description', $category['description']);
        $this->display($category['template_lists']);
	}

	/* 文档模型详情页 */
	public function detail($id = 0, $p = 1){
		/* 标识正确性检测 */
		if(!($id && is_numeric($id))){
			$this->error('文档ID错误！');
		}

		/* 页码检测 */
		$p = intval($p);
		$p = empty($p) ? 1 : $p;

		/* 获取详细信息 */
		$Document = D('Document');
		$info = $Document->detail($id);
		if(!$info){
			$this->error($Document->getError());
		}

		/* 分类信息 */
		$category = $this->category($info['category_id']);

		/* 获取模板 */
		if(!empty($info['template'])){//已定制模板
			$tmpl = $info['template'];
		} elseif (!empty($category['template_detail'])){ //分类已定制模板
			$tmpl = $category['template_detail'];
		} else { //使用默认模板
			$tmpl = 'Article/'. get_document_model($info['model_id'],'name') .'/detail';
		}

		/* 更新浏览数 */
		$map = array('id' => $id);
		$Document->where($map)->setInc('view');
        //seo
        $detail_title = $category['title'].'_'.$info['title'];
        $detail_keywords = $category['title'].'_'.$info['title'];
        $detail_description = $info['description'];
		/* 模板赋值并渲染模板 */
        $this->assign('detail_title', $detail_title);
        $this->assign('detail_keywords', $detail_keywords);
        $this->assign('detail_description', $detail_description);
		$this->assign('category', $category);
		$this->assign('info', $info);
		$this->assign('page', $p); //页码
		$this->display($tmpl);
	}

	/* 文档分类检测 */
	private function category($id = 0){
		/* 标识正确性检测 */
		$id = $id ? $id : I('get.category', 0);
		if(empty($id)){
			$this->error('没有指定文档分类！');
		}

		/* 获取分类信息 */
		$category = D('Category')->info($id);
		if($category && 1 == $category['status']){
			switch ($category['display']) {
				case 0:
					$this->error('该分类禁止显示！');
					break;
				//TODO: 更多分类显示状态判断
				default:
					return $category;
			}
		} else {
			$this->error('分类不存在或被禁用！');
		}
	}

}
