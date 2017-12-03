<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends Controller{
	//文档详细内容显示
	public function detail($id=0,$p=1){
		//登录状态检测
    	$user=new \Home\Common\tool\ToolController();
    	$user->statecheck();
		//获取文章详细内容
		$document=D('Document');
		$info=$document->detail($id);
		//if(!$info){
			//$this->error($document->getError());
		//}
		//更新浏览数量
		$map=array('id'=>$id);
		$document->where($map)->setInc('view');
		//dump($info);
		$this->assign('info',$info);
		$this->display();
	}

	public function lists($p=1){
        //登录状态检测
    	//$user=A("Tool");
    	$user=new \Home\Common\tool\ToolController();
    	$user->statecheck();
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
        };
        //分页显示
        $docList=D('Document');
        $count=$docList->where($where)->count();
        $page=new \Think\Page($count,10);
        $show=$page->showExt();
        $this->assign('page',$show);
        //文章显示
        $result=$docList->where($where)->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        //$result=$docList->documentList();
        //dump($result);
        foreach ($result as &$v) {
            $v['create_time']=date('Y-m-d H:i:s',$v['create_time']);
            $tmpId = $v['category_id'];
            $where = "id=$tmpId";
            $row =  $Category->where($where)->find();
            switch ($row['name']){
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
        $this->assign('lists',$result);
        $this->show();
	}

	//文档分类检测
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

    //文章编辑
    public function edit(){
        //登录状态检测
        $user=new \Home\Common\tool\ToolController();
        $user->statecheck();

        if(!empty($_POST)){
            var_dump($_POST);
            //文章具体内容处理
            $article['title']=$_POST['title'];
            $article['category_id']=$_POST['category_id'];
            $article['create_time']=time();
            $contents=$_POST['content'];
            var_dump($article);
            var_dump($contents);
            $document=D('Document');
            //$info=$article->add($article);
            $info=$document->articleSave($article,$contents);
            var_dump($info); 
        }

        //获取文章分类信息
        $category=D('category')->where("pid!=0")->select();
        $this->assign('category',$category);
        $this->display();
    }
}