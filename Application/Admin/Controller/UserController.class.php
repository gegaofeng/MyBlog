<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->display();
    }
    public function login(){
    	$user=D('UcenterMember');
    	$username=I('post.username','');
    	$password=I('post.password','');
    	if ($username!=''&&$password!=''){
    		//dump($_POST);
    		$result=$user->login($username,$password);
    		//dump($result);
    		if($result){
    			redirect('\Admin\Index\index',2,'登录成功，正在跳转到首页....');
    		}else{
                $_POST[]=array();
                echo "<script>alert('用户名或密码错误')</script>";
    		}
    	}
    	$this->display();
    }

    /*
    注销
    */
    public function logout(){
    	session(null);
    	redirect('\Admin\User\login');
    }
    
}