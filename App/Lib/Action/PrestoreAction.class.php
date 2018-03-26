<?php

class PrestoreAction extends Action {

	public function _initialize(){

		$action = array(
			'permission'=>array('lists'),
			'allow'=>array('qrcode')
		);
		B('Authenticate', $action);
	}

	public function index(){
		$order = $this->_get('order','trim,strip_tags,htmlspecialchars','desc');
		if ($_REQUEST["field"]) {
			$where = array();
			$field = $this->_get('field','trim,strip_tags,htmlspecialchars');
			$search = $this->_get('search','trim,strip_tags,htmlspecialchars','');
			$condition = $this->_get('condition','trim,strip_tags,htmlspecialchars','');
			if($condition){
				switch ($condition) {
					case "is" : $where[$field] = array('eq',$search);break;
					case "isnot" :  $where[$field] = array('neq',$search);break;
					case "contains" :  $where[$field] = array('like','%'.$search.'%');break;
					case "not_contain" :  $where[$field] = array('notlike','%'.$search.'%');break;
					case "start_with" :  $where[$field] = array('like',$search.'%');break;
					case "not_start_with" :  $where[$field] = array('notlike',$search.'%');break;
					case "end_with" :  $where[$field] = array('like','%'.$search);break;
					case "is_empty" :  $where[$field] = array('eq','');break;
					case "is_not_empty" :  $where[$field] = array('neq','');break;
					case "gt" :  $where[$field] = array('gt',$search);break;
					case "egt" :  $where[$field] = array('egt',$search);break;
					case "lt" :  $where[$field] = array('lt',$search);break;
					case "elt" :  $where[$field] = array('elt',$search);break;
					case "eq" : $where[$field] = array('eq',$search);break;
					case "neq" : $where[$field] = array('neq',$search);break;
					case "between" : $where[$field] = array('between',array($search-1,$search+86400));break;
					case "nbetween" : $where[$field] = array('not between',array($search,$search+86399));break;
					case "tgt" :  $where[$field] = array('gt',$search+86400);break;
					default : $where[$field] = array('eq',$search);
				}
				$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$search);
			}
			if($order){
				$order_str = "$field $order";
				if($order=='desc'){
					$order = 'asc';
				}else{
					$order = 'desc';
				}
				$params = array('field='.trim($_REQUEST['field']), 'order='.$order);
			}
		}

		import("@.ORG.Page");
		$prestore = M('prestore');
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$list = $prestore->where($where)->order($order_str)->page($p.',15')->select();
		$count = $prestore->where($where)->count();
		$Page = new Page($count,15);

		$Page->parameter = implode('&', $params);
		$this->assign('page',$Page->show());

		$this->alert = parseAlert();//提示栏
		$this->assign('order',$order);
		$this->assign('list',$list);
		$this->display();
	}

	public function add(){
		if($this->isPost()){
			$data['pre_id'] = $this->_post('pre_id','intval');
			$data['num'] = $this->_post('num','intval');
			$data['time'] = $this->_post('time','strtotime',time());
			$data['take_num'] = $this->_post('take_num','intval');
			$data['customer_sign'] = $this->_post('customer_sign','trim');
			$data['manage_sign'] = $this->_post('manage_sign','trim');
			$data['description'] = $this->_post('description','trim');
			//当前剩余量
			$surplus_count = M('prestore')->where("id=$data[pre_id]")->getField('surplus_count');
			if($surplus_count<$data['take_num']) alert('error','该用户存酒不足，无法取酒',$_SERVER['HTTP_REFERER']);
			$surplus_count = intval($surplus_count-$data['take_num']);
			$data['surplus_num'] = $surplus_count;
			if(M('prestore_item')->add($data)){
				$info['surplus_count'] = $surplus_count;
				$re = M('prestore')->where("id=$data[pre_id]")->save($info);
				if(!$re) alert('error','添加失败',$_SERVER['HTTP_REFERER']);
				alert('success','添加成功',$_SERVER['HTTP_REFERER']);
			}else{
				alert('error','添加失败',$_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->display();
		}
	}

	public function view(){
		import("@.ORG.Page");
		$id = $this->_get('id','intval');
		if(!$id) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$list = M('prestore_item')->where("pre_id=$id")->page($p.',15')->select();
		$count = M('prestore_item')->where("pre_id=$id")->count();
		$Page = new Page($count,15);
		$this->assign('page',$Page->show());
		$this->assign('list',$list);
		$this->display();
	}

	public function delete(){
		if($this->isPost() && isset($_POST['ids'])){
			$ids = array_filter($this->_post('ids'),'intval');
			if(!$ids) alert('error',L('DELETE FAILED CONTACT THE ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
			foreach($ids as $v){
				M('prestore')->where("id=$v")->delete();
				M('prestore_item')->where("pre_id=$v")->delete();
			}
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($this->isGet() && isset($_GET['id'])){
			$id = $this->_get('id','intval','');
			if(!$id) alert('error',L('DELETE FAILED CONTACT THE ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
			M('prestore')->where("id=$id")->delete();
			M('prestore_item')->where("pre_id=$id")->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function lists(){
		$id = $this->_get('id','intval');
		if(!$id) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		$list = M('prestore_item')->where("pre_id=$id")->select();
		$this->assign('list',$list);
		$this->display();
	}

	public function qrcode(){
		$id = $this->_get('id','intval');
		if(!$id) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		$url = $this->get_url().U('prestore/lists',"id=$id");
		//二维码
		$png_temp_dir = UPLOAD_PATH.'/qrpng/';
		$filename = $png_temp_dir.'pre_'.$id.'.png';
		if (!is_dir($png_temp_dir) && !mkdir($png_temp_dir, 0777, true)) { echo 3;$this->error('二维码保存目录不可写'); }
		import("@.ORG.QRCode.qrlib");
		QRcode::png($url, $filename, 'M', 4, 2);
		$this->assign('qrcode',$filename);
		$this->display();
	}

	//取得当前页面域名
	public function get_url() {
		$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
		//$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
		//$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
		//$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');//.$relate_url;
	}
}
