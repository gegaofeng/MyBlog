<?php
namespace Admin\Model;
use Think\Model;

/**
* 用户控制模型
*/
class UcenterMemberModel extends Model{
	public function login($username,$password){
		$info=$this->where("username='$username'")->find();
		if ($info) {
			if ($info['password']===$password) {
				session('id',$info['id']);
				session('username',$info['username']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}