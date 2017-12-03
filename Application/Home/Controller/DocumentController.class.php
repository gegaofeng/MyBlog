<?php
namespace Home\Controller;
use Think\Controller;
/**
* 文章显示页面
*/
class DocumentController extends Controller{
	/*
	文章展示
	*/
	function documentList(){
		$docList=D('Document');
		$result=$docList->documentList();
		$this->assign('list',$result);
	}
}