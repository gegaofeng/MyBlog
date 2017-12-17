<?php
namespace Home\Model;
use Think\Model;

class DocumentModel extends Model{
	/*
	获取文章总数据
	*/
	public function documentList(){
		$docList=$this->where('status=1')->select();
		//dump($docList);
		return $docList;
	}

	/*
	获取文章详细内容
	*/
	public function detail($id){
		//获取基础数据
		$info=$this->field(true)->find($id);
		if(!(is_array($info)||$info['status']!==1)){
			$this->error='文档被禁用或文档不存在';
			return false;
		}
		$content=M('DocumentArticle');
		$map=array('id'=>$id);
		$detail=$content->where($map)->field('content')->find();
		return array_merge($info,$detail);
	}

	//不知道哪里有问题慢慢研究
	public function detailvb($id){
		//获取基础数据
		$info=$this->field(true)->find($id);
		if(!(is_array($info)||$info['status']!==1)){
			$this->error='文档被禁用或文档不存在';
			//return false;
		}
		//获取模型数据
		
		//$logic=$this->logic($info['model_id']);
		//$detail=$logic->detail($id);
		/*if (!$detail) {
			//$this->error=$logic->getError();
			//return false;
		}*/
		return array_merge($info,$detail);
	}
	/**
	* 获取扩展模型对象
	* @param  integer $model 模型编号
	* @return object         模型对象
	*/
	private function logic($model){
		return 2;
		//D(get_document_model($model, 'name'), 'Logic');
	}

	/**
	*文章存储
	*@param array $abstract $content
	*@return bool 
	*/
	public function articleSave($abstract,$con){
		//文章摘要数据
		$info=$this->add($abstract);
		$where='id='.$info;
		

		//文章主体数据
		$content=M('DocumentArticle');
		$artcon['content']=$con;
		$artcon['id']=$info;
		//var_dump($artcon);
		if($content->add($artcon)){
		return true;
		}else{
			$this->where($where)->delete();
			return false;
		}	
	}

}