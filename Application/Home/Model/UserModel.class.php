<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	/*
	注册
	*/
	public function register(){
		
		//return true;
	}

	/*
	登录
	*/
	public function login($username,$password){
		$info=$this->where("username='$username'")->find();
		dump($info);
		if($info){
			if ($info['password']===$password) {
				return true;
			}
		}else{
			return false;
		}
	}
}