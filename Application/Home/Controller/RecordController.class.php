<?php
namespace Home\Controller;
use Think\Controller;
class RecordController extends Controller {
	
	public function record() {
		$this->display();
	}
	
    public function add() {
        $this->display();    
    }
    
    public function getcalls() {
		$file = fopen("hehe.txt", "a+");
		fwrite($file, "getcalls\n");
		$data = I('post.');
		$Call = M('Call');
		fwrite($file, $data['number']);
		if ($data['number'] != null) {
			$result = $Call->where('call_number="'.$data['number'].'" OR answer_number="'.$data['number'].'"')->limit(10)->select();
		} else {
			$result = $Call->select();
		}
		echo json_encode($result);
		fclose($file);
	}
    
    public function addcall() {
		$data = I('post.');
		$Call = M('Call');
		$one['call_number'] = $data['call_number'];
		$one['answer_number'] = $data['answer_number'];
		$one['time'] = date("Y-m-d h:i:sa");
		$one['is_callup'] = $data['is_callup'];
		$return = $Call->add($one);
		if ($return > 0) {
			$result['code'] = 88;
			$result['msg'] = '添加记录成功'; 
		} else {
			$result['code'] = 44;
			$result['msg'] = '添加记录失败，请稍后再试';
		}
		$this->ajaxReturn($result);
	}
    
    public function updata() {
		$data = I('post.');
		$Call = M('Call');
		$one['_id'] = $data['id'];
		$one['call_number'] = $data['call_number'];
		$one['answer_number'] = $data['answer_number'];
		$one['is_callup'] = $data['is_callup'];
		$return = $Call->where('_id='.$one['_id'])->save($one);
		if ($return > 0) {
			$result['code'] = 88;
			$result['msg'] = '更改信息成功'; 
		} else {
			$result['code'] = 44;
			$result['msg'] = '更改信息失败，请稍后再试';
		}
		$this->ajaxReturn($result);
	}
    
    public function delcall() {
		$data = I('post.');
		$Call = M('Call');
		$Call->where('_id='.$data['id'])->delete();
	}
    
	public function getbynum() {
		
		$User = M('User');
		
		echo json_encode($result);
	}
	
    public function edit() {
        $data = I('post');
        $User = M('User');
        $User->save($data);
    }
}