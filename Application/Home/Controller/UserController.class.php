<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	public function index() {
		$this->display();
	}
	public function admin() {
		$this->display();
	}
	public function record() {
		$this->display();
	}
	public function add() {
		$this->display();
	}
	public function edit() {
		$id = I('get.id');
		$User = M('User');
		$one = $User->where('_id='.$id)->find();
		$this->assign($one);
		$this->display();
	}
	public function adduser() {
		$data = I('post.');
		$User = M('User');
		$one['IDnumber'] = $data['idnumber'];
		$one['name'] = $data['name'];
		$one['phonenumber_1'] = $data['phonenumber_1'];
		$one['phonenumber_2'] = $data['phonenumber_2'];
		$one['Email'] = $data['email'];
		$one['workplace'] = $data['workplace'];
		$one['address'] = $data['address'];
		$return = $User->add($one);
		if ($return > 0) {
			$result['code'] = 88;
			$result['msg'] = '添加联系人成功'; 
		} else {
			$result['code'] = 44;
			$result['msg'] = '添加联系人失败，请稍后再试';
		}
		$this->ajaxReturn($result);
	}
	public function updata() {
		$data = I('post.');
		$User = M('User');
		$one['_id'] = $data['id'];
		$one['IDnumber'] = $data['idnumber'];
		$one['name'] = $data['name'];
		$one['phonenumber_1'] = $data['phonenumber_1'];
		$one['phonenumber_2'] = $data['phonenumber_2'];
		$one['Email'] = $data['email'];
		$one['workplace'] = $data['workplace'];
		$one['address'] = $data['address'];
		$return = $User->where('_id='.$one['_id'])->save($one);
		if ($return > 0) {
			$result['code'] = 88;
			$result['msg'] = '更改信息成功'; 
		} else {
			$result['code'] = 44;
			$result['msg'] = '更改信息失败，请稍后再试';
		}
		$this->ajaxReturn($result);
	}
	
	public function deluser() {
		$data = I('post.');
		$User = M('User');
		$User->where('_id='.$data['id'])->delete();
	}
	
	public function getusers() {
		$data = I('post.');
		$User = M('User');
		if ($data['phonenumber_1'] != null) {
			$result = $User->where('phonenumber_1="'.$data['phonenumber_1'].'"')->select();
		} else if ($data['name'] != null) {
			$result = $User->where('name="'.$data['name'].'"')->select();
		} else {
			$result = $User->select();
		}
		echo json_encode($result);
	}
}