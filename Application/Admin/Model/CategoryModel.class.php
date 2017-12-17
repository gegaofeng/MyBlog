<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
	public function catelist(){
		$title=$this->order('pid')->select();
		return $title;
	}
}