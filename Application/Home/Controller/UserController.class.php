<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $user=new \Home\Common\tool\ToolController();
        $user->statecheck();
        $this->show();
    }

    //登录
    public function login(){
        //登陆扎状态检查
        $user=new \Home\Common\tool\ToolController();
        $user->statecheck();
        //注册
    	$user=D('User');
    	if ($_POST['txt_username']!=''&&$_POST['txt_password']!=''){
    		//dump($_POST);
    		$result=$user->login($_POST['txt_username'],$_POST['txt_password']);
    		//dump($result);
    		if($result){
                session('username',$_POST['txt_username']);
    			$this-> redirect('Index/index','',2,'登录成功，正在跳转到首页....');
    		}else{
                $_POST[]=array();
                echo "<script>alert('用户名或密码错误')</script>";
    			//$this-> redirect('User/login','',3,'用户名或密码错误');
    		}
    	}
        $this->show();
    }

    //注销
    public function logout(){
        session(null);
        $this->redirect('index/index');
    }

    public function manager(){
        $user=new \Home\Common\tool\ToolController();
        $user->statecheck();
    	$this->show();
    }
    public function register(){
        $user=new \Home\Common\tool\ToolController();
        $user->statecheck();
    	$user = new \Home\Model\UserModel();
    	if(!empty($_POST)){
	    //dump($_POST);
	    $data['username']=$_POST['txt_username'];
	    $data['password']=$_POST['txt_password'];
        $data['register_time']=date('Y-m-d h:i:s', time());
        $shuju = $user -> create($data);
	    dump($shuju);
        if($shuju){             //返回实在数据的时候才进行添加
            if($user -> add($shuju)){    
            echo "<script>alert('注册成功');</script>";
            $this-> redirect('Index/index','',0,'');
        }
    }else{
//      dump($user->getError());//输出验证的错误信息
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
            'codeSet'=>'0123456789',
        );
        $verify=new \Think\Verify($cfg);
        $verify->entry();
    }

    public function checkUserName($username){
        $user=D('User');
        $re=$user->where("username='$username'")->count();
        if ($re==0) {
            $result=true;
        }else{
            $result=false;
        }
        $this->ajaxReturn($result);
    }
    public function checkVerifyCode($vcode){
        $verify=new \Think\Verify();
        $result=$verify->check($vcode);
        $this->ajaxReturn($result);
    }
}