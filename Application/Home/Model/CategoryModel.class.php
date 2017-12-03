<?php
namespace Home\Model;
use Think\Model;
/**
* 文章分类模型
*/
class CategoryModel extends Model{
	/**
	 * 获取分类详细信息
	 * @param  milit   $id 分类ID或标识
	 * @param  boolean $field 查询字段
	 * @return array     分类信息
	 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
	 */
	public function info($id, $field = true){
		/* 获取分类信息 */
		$map = array();
		if(is_numeric($id)){ //通过ID查询
			$map['id'] = $id;
		} else { //通过标识查询
			$map['name'] = $id;
		}
		return $this->field($field)->where($map)->find();
	}
}