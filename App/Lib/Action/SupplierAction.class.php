<?php 

class SupplierAction extends Action {

	public function _initialize(){
		$action = array(
			'permission'=>array(),
			'allow'=>array('listdialog', 'changecontent')
		);
		B('Authenticate', $action);

		$this->contact = M('supplier_contact');
		$this->category = M('supplier_category');
		$this->supplier = M('supplier');
	}

	//供应商列表
	public function index(){
		if ($_REQUEST["field"]) {
			$where = array();
			$field = $this->_get('field','trim,strip_tags,htmlspecialchars');
			$search = $this->_get('search','trim,strip_tags,htmlspecialchars','');
			$condition = $this->_get('condition','trim,strip_tags,htmlspecialchars','');
			if($field){
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
		}
		import("@.ORG.Page");
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$assign['list'] = $this->supplier->where($where)->order($order_str)->Page($p.','.C('PAGE_SIZE'))->select();
		$count = $this->supplier->where($where)->count();
		$Page = new Page($count,C('PAGE_SIZE'));

		$Page->parameter = implode('&', $params);
		$assign['page'] = $Page->show();
		foreach($assign['list'] as $k=>$v){
			$assign['list'][$k]['category_name'] = $this->category->where("id=$v[category_id]")->getField('name');
			$assign['list'][$k]['user_name'] = getUserNameByRoleId($v['owner_id']);
		}
		$assign['active'] = 'index';
		$this->assign('assign',$assign);
		$this->alert = parseAlert();
		$this->display();
	}

	//供应商查看
	public function view(){
		if($id = intval($_GET['id'])){
			//供应商信息
			$assign['supplier_info'] = $this->supplier->where("id=$id")->find();
			//供应商类别名
			$category_id = $assign['supplier_info']['category_id'];
			$assign['category_name'] = $this->category->where("id=$category_id")->getField('name');
			//相关联系人
			$assign['contacts_list'] = $this->contact->where("supplier_id=$id")->select();
			//相关单据
			$assign['purchase_list'] = M('purchase')->where("supplier_id=$id")->select();

			$this->assign('assign',$assign);
			$this->alert = parseAlert();//提示栏
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//修改供应商联系人
	public function editContact(){
		if($id = intval($_POST['id'])){
			$base = $_POST['base'];
			if(!$this->contact->where("id=$id")->save($base)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$contact_info = $this->contact->where("id=$id")->find();
			$this->assign('contact_info',$contact_info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//添加供应商联系人
	public function addContact(){
		if($id = intval($_POST['id'])){
			$base = $_POST['base'];
			$base['supplier_id'] = $id;
			$base['create_time'] = time();
			if(!$this->contact->add($base)) alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			alert('success',L('ADD_SUCCESS'),$_SERVER['HTTP_REFERER']);
		}else{
			$this->display();
		}
	}

	//删除供应商联系人
	public function deleteContact(){
		if($id = intval($_GET['id'])){
			$this->contact->where("id=$id")->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//添加供应商
	public function add(){
		if($this->isPost()){
			$base = $_POST['base'];
			$contact = $_POST['contact'];
			$base['owner_id'] = session('role_id');
			$base['create_time'] = time();
			$base['update_time'] = time();
			$id = $this->supplier->add($base);
			if($id && !empty($contact)){
				$contact['supplier_id'] = $id;
				$contact['create_time'] = time();
				if(!$this->contact->add($contact)) alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			}
			alert('success',L('ADD_SUCCESS'),U('Supplier/index'));
		}else{
			//供应商类别
			$category_list = $this->category->field('id,name')->select();
			$this->assign('category_list',$category_list);
			$this->display();
		}
	}

	//修改供应商
	public function edit(){
		if($id = intval($_POST['id'])){
			if(!$this->supplier->where("id=$id")->save($_POST['base'])) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$assign['category_list'] = $this->category->field('id,name')->select();
			$assign['supplier_info'] = $this->supplier->where("id=$id")->find();
			$this->assign('assign',$assign);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//删除供应商(连同供应商联系人)
	public function delete(){
		if($ids = array_filter($this->_post('ids'),'intval')){
			foreach($ids as $v){
				$this->supplier->where("id=$v")->delete();
				//同时删除供应商对应的联系人
				$this->contact->where("supplier_id=$v")->delete();
			}
			alert('success',L('DELETED SUCCESSFULLY'),U('supplier/index'));
		}elseif($id = intval($_GET['id'])){
			$this->supplier->where("id=$id")->delete();
			//同时删除供应商对应的联系人
			$this->contact->where("supplier_id=$id")->delete();
			alert('success',L('DELETED SUCCESSFULLY'),U('supplier/index'));
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//供应商类别列表
	public function category(){
		import('@.ORG.Page');
		$p = isset($_GET['p'])?intval($_GET['p']):1;
		$assign['category_list'] = $this->category->order('id desc')->Page($p.','.C('PAGE_SIZE'))->select();
		$count = $this->category->count();
		$Page = new Page($count,C('PAGE_SIZE'));
		$assign['page'] = $Page->show();
		$assign['active'] = 'category';
		$this->assign('assign',$assign);
		$this->alert = parseAlert();
		$this->display();
	}

	//删除供应商类别
	public function deleteCategory(){
		if($ids = array_filter($this->_post('ids'),'intval')){
			$where['id'] = array('in', implode(',', $ids));
			$this->category->where($where)->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$this->category->where("id=$id")->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//添加供应商类别
	public function addCategory(){
		if($this->isPost()){
			$base = $_POST['base'];
			if(!$base['name']) alert('error',L('NAME_CAN_NOT_EMPTY'),$_SERVER['HTTP_REFERER']);
			$base['create_time'] = time();
			if(!$this->category->add($base)) alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			alert('success',L('ADD_SUCCESS'),$_SERVER['HTTP_REFERER']);
		}else{
			$this->display();
		}
	}

	//修改供应商类别
	public function editCategory(){
		if($id = intval($_POST['id'])){
			$base = $_POST['base'];
			if(!$base['name']) alert('error',L('NAME_CAN_NOT_EMPTY'),$_SERVER['HTTP_REFERER']);
			if(!$this->category->where("id=$id")->save($base)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$info = $this->category->where("id=$id")->find();
			$this->assign('data',$info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//ajax获取供应商类别
	public function getCategory(){
		$data = $this->category->select();
		echo json_encode($data);
	}

	public function listDialog(){
		$assign['list'] = $this->supplier->order('id asc')->limit(C('PAGE_SIZE'))->select();
		foreach($assign['list'] as $k=>$v){
			//联系人信息
			$assign['list'][$k]['contact'] = $this->contact->where('supplier_id ='.$v['id'])->field('name,telphone')->find();
			//类别信息
			$assign['list'][$k]['category'] = $this->category->where('id ='.$v['category_id'])->getField('name');
		}
		$assign['count_num'] = $this->supplier->count();
		$assign['total'] = $assign['count_num']%C('PAGE_SIZE') > 0 ? ceil($assign['count_num']/C('PAGE_SIZE')) : $assign['count_num']/C('PAGE_SIZE');
		$this->assign('assign',$assign);
		$this->display();
	}

	public function changeContent(){
		if($this->isAjax()){
			$field = trim($_REQUEST['field']);
			if ($_REQUEST["field"]) {
				$search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
				$condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
				switch ($condition) {
					case "is" : $where[$field] = array('eq',$search);break;
					case "isnot" :  $where[$field] = array('neq',$search);break;
					case "contains" :  $where[$field] = array('like','%'.$search.'%');break;
					case "not_contain" :  $where[$field] = array('notlike','%'.$search.'%');break;
				}
				$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$_REQUEST["search"]);
			}
			$p = !$_REQUEST['p']||$_REQUEST['p']<=0 ? 1 : intval($_REQUEST['p']);
			$list = $this->supplier->where($where)->order('create_time desc')->page($p.','.C('PAGE_SIZE'))->select();
			foreach($list as $k=>$v){
				//类别信息
				$list[$k]['category'] = $this->category->where('id ='.$v['category_id'])->getField('name');
				//联系人信息
				$list[$k]['contact'] = $this->contact->where('supplier_id ='.$v['id'])->field('name,telphone')->find();
			}
			$count = $this->supplier->where($where)->count();
			$data['list'] = $list;
			$data['p'] = $p;
			$data['count'] = $count;
			$data['total'] = $count%C('PAGE_SIZE') > 0 ? ceil($count/C('PAGE_SIZE')) : $count/C('PAGE_SIZE');
			$this->ajaxReturn($data,"",1);
		}
	}
}