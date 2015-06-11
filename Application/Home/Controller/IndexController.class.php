<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    
    public function login() {
        $data = I('post.');
        $User = M('User');
        $one = $User->where('phonenumber_1="'.$data['name'].'"')->find();
        if ($one == null) {
            $result['code'] = 44;
            $result['msg'] = '查询用户失败'; 
        } else if ($data['pwd'] != $data['pwd']) {
            $result['code'] = 44;
            $result['msg'] = '密码错误';
        } else {
            $result['code'] = 88;
            $result['msg'] = U('User/index'); 
        }
        $this->ajaxReturn($result);
    }
    
    public function add() {
        $data = I('post.');
        $User = M('User');
        $return = $User->add($data);
        if ($return <= 0) {
            $result['code'] = 44;
            $result['msg'] = '添加数据失败';
        } else {
            $result['code'] = 88;
            $result['msg'] = '添加数据成功';
        }
        $this->ajaxReturn($result);
    }
    
    public function edit() {
        $data = I('post.');
        $User = M('User');
        $User->save($data);
    }
}