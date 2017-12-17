<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
	/*
	板块开放管理
	*/
	public function show(){
		$allcate=D('Category');
		$info=$allcate->catelist();
		//获取大分类
		$cate=array();
		foreach ($info as $key=>$v ){
			if($v['pid']=="0"){
				$cate[$key]['title']=$v['title'];
				$cate[$key]['id']=$v['id'];
			}else{
				//
			};
		}
		//小类
		$lists=array();
		foreach ($info as $key=> $v){
			if($v['pid']!='0'){
				$lists[$key]['title']=$v['title'];
				$lists[$key]['list_row']=$v['list_row'];
				$lists[$key]['id']=$v['id'];
				$lists[$key]['pid']=$v['pid'];
				if($v['display']=='1'){
					$lists[$key]['status']='开放';
					$lists[$key]['operate']='关闭';
				}else{
					$lists[$key]['status']='关闭';
					$lists[$key]['operate']='开放';
				}
				foreach ($cate as $vv) {
					if($lists[$key]['pid']==$vv['id']){
						$lists[$key]['cate']=$vv['title'];
					}else{
						//
					}
				}
			}else{
				//
			}
		}


		//var_dump($lists);
		$this->assign('lists',$lists);
		$this->display();
	}



}
