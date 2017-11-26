<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show();
    }
    public function login(){
    	$user=D('User');
    	if ($_POST['username']!=''&&$_POST['userpwd']!=''){
    		//dump($_POST);
    		$result=$user->login($_POST['username'],$_POST['userpwd']);
    		//dump($result);
    		if($result){
    			$this-> redirect('Index/index','',3,'登录成功，正在跳转到首页....');
    		}else{
    			$this-> redirect('User/login','',3,'用户名或密码错误');
    		}
    	}
        $this->show();
    }
    public function manager(){
    	$this->show();
    }
    public function register(){
    	$user = new \Home\Model\UserModel();
    	if(!empty($_POST)){
	    dump($_POST);
	    $data['username']=$_POST['username'];
	    $data['password']=$_POST['userpwd'];
        //收集表单[$_POST]信息并返回,同时触发表单自动验证，过滤非法字段
        $shuju = $user -> create($data);
	    //dump($shuju);
        if($shuju){             //返回实在数据的时候才进行添加
            if($user -> add($shuju)){
		    echo "<script>alert('成功');</script>";
            //$this-> redirect('Index/index','',3,'注册成功，正在跳转到首页....');
        }
    }else{
//                dump($user->getError());//输出验证的错误信息
		$this -> assign('errorInfo',$user->getError());
            }
        }
        $this->display();
    }

    /*
    验证码
    */
    public function verifyImg(){
        //配置文件
        $cfg=array(
            'imageH'=>45,
            'inmageW'=>100,
            'fontsize'=>15,
            'length'=>4,
        );
        $very=new \Think\Verify($cfg);
        $very->entry();
    }

    public function checkUserName(){
        $user=D('User');
        $result=true;
        $this->ajaxReturn($result);
    }
}