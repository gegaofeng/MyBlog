<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if (session('id')) {
    		$this->display();
    	}else{
    		redirect('\Admin\User\login');
    	}
    }

    public function category(){
    	$this->display();
    }
    
}