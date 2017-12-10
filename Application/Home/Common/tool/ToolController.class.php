<?php
namespace Home\Common\tool;
use Think\Controller;
class ToolController extends Controller {

    public function statecheck(){
    	if (session('username')) {
            $nav[username]=session('username');
            $nav[logout]="注销";
            $nav[logurl]='/home/user/manager';
            $nav[regurl]='/home/user/logout';
            $state=true;
        }else{
            $nav[username]="登录";
            $nav[logout]="注册";
            $nav[logurl]='/home/user/login';
            $nav[regurl]='/home/user/register';
            $state=false;
        }
        $this->assign('nav',$nav);
        return $state;
    }
}