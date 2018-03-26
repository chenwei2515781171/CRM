<?php 

class PurchaseAction extends Action {
	public function _initialize(){
		$action = array(
			'permission'=>array('login','lostpw','resetpw','active','weixinbinding','notice'),
			'allow'=>array('logout','role_ajax_add','getrolebydepartment','dialoginfo','edit', 'listdialog', 'mutilistdialog', 'getrolelist', 'getpositionlist',  'weixin','changecontent')
		);
		B('Authenticate', $action);

		$this->purchase = M("purchase");
	}

	public function index(){

		//审核状态筛选
		if(isset($_GET['by'])){
			$assign['by'] = $_GET['by'];
			if($_GET['by']=='not_check'){
				$where['check_status'] = array('eq','0');
			}elseif($_GET['by']=='checked'){
				$where['check_status'] = array('eq','1');
			}
		}
		
		//采购类型筛选
		if(isset($_GET['type'])){
			$assign['type'] = $_GET['type'];
			$where['type'] = array('eq',$_GET['type']);
		}

		//搜索功能筛选
		if ($_REQUEST["field"]) {
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

		import('@.ORG.Page');// 导入分页类
		$p = isset($_GET['p'])?$_GET['p']:1;

		$assign['list'] = $this->purchase->where($where)->order('id desc')->Page($p.','.C('PAGE_SIZE'))->select();
		foreach($assign['list'] as $k=>$v){
			//获取创建人名称
			$assign['list'][$k]['create_user_name'] = getUserNameByRoleId($v['create_user_id']);
			$Model = new Model();
			if($v['type']){
				//获取采购退货单收款进度
				$money = $Model->query("select Sum(b.money) as money from ".C('DB_PREFIX')."receivables as a,".C('DB_PREFIX')."receivingorder as b where a.receivables_id = b.receivables_id and b.is_deleted = 0 and b.status = 1 and a.type = 1 and a.bill_id = ".$v['id']);
				if($finance = $money['0']['money']){
					if($finance<$v['purchase_price']){
						$assign['list'][$k]['finance'] = "部分收款<span style='color:red;'>(还需收款".($v['purchase_price']-$finance)."元)</span>";
					}else{
						$assign['list'][$k]['finance'] = '已收款';
					}
				}else{
					$assign['list'][$k]['finance'] = '未收款';
				}
			}else{
				//获取采购单付款进度
				$money = $Model->query("select Sum(b.money) as money from ".C('DB_PREFIX')."payables as a,".C('DB_PREFIX')."paymentorder as b where a.payables_id = b.payables_id and b.is_deleted = 0 and b.status = 1 and a.type = 0 and a.bill_id = ".$v['id']);
				if($finance = $money['0']['money']){
					if($finance<$v['purchase_price']){
						$assign['list'][$k]['finance'] = "部分付款<span style='color:red;'>(还需付款".($v['purchase_price']-$finance)."元)</span>";
					}else{
						$assign['list'][$k]['finance'] = '已付款';
					}
				}else{
					$assign['list'][$k]['finance'] = '未付款';
				}
			}
		}
		$count = $this->purchase->where($where)->count();
		$Page = new Page($count,C('PAGE_SIZE'));
		$Page->parameter = implode('&', $params);
		$assign['page'] = $Page->show();

		$assign['active'] = 'purchase';
		$this->assign('assign',$assign);
		$this->alert = parseAlert();
		$this->display();
	}

	public function add(){
		if($this->isPost()){
			$base = $_POST['base'];

			$base['purchase_time'] = $_POST['purchase_time']?strtotime($_POST['purchase_time']):time();
			$base['create_time'] = time();
			$base['update_time'] = time();
			$base['create_user_id'] = session('role_id');
			$base['purchase_price'] = $base['discount_price'];

			//处理商品数据
			if($_POST['purchase']['product']){
				foreach($_POST['purchase']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price'] && $v['prime_price']){
						$base['purchase_price'] += $v['prime_price'];
						$base['total_amount'] += $v['amount'];
					}else{
						unset($_POST['purchase']['product'][$k]);
					}
				}
				if(!empty($_POST['purchase']['product'])) $base['product'] = array2string($_POST['purchase']['product'],'0');
			}
			if($sid = $this->purchase->add($base)){
				$sn_code['sn_code'] = ($base['type']?'THD':'CGD').date('Ymd',time()).$sid;
				$this->purchase->where("id=$sid")->save($sn_code);
				alert('success',L('ADD_SUCCESS'),U('purchase/index'));
			}
		}else{
			//自动生成sn_code码
			$id = $this->purchase->order('id desc')->getField('id');
			if(intval($_GET['type'])){
				$assign['sn_code'] = $id?'THD'.date('Ymd',time()).($id+1):'THD'.date('Ymd',time()).'1';
				$assign['title'] = '新增采购退货单';
			}else{
				$assign['sn_code'] = $id?'CGD'.date('Ymd',time()).($id+1):'CGD'.date('Ymd',time()).'1';
				$assign['title'] = '新增采购单';
			}
			$assign['warehouse_list'] = M('warehouse')->select();
			$this->assign('assign',$assign);
			$this->display();
		}
	}

	//删除采购单据操作
	public function delete(){
		if($this->isPost() && isset($_POST['ids'])){
			$ids = array_filter($this->_post('ids'),'intval');
			if(!$ids) alert('error',L('DELETE FAILED CONTACT THE ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
			foreach($ids as $v){
				//判断是否出入库，出入库状态无法删除
				$data = $this->purchase->where("id=$v")->find();
				if($data['status']){
					$str .= $data['sn_code'].',';
				}else{
					$this->purchase->where("id=$v")->delete();
				}
				unset($data);
			}
			if($str){
				$error = '单号为 '.$str.' 的单据已完成(出入库)，无法删除！';
				alert('error',$error,$_SERVER['HTTP_REFERER']);
			}else{
				alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
			}
		}elseif($id = intval($_GET['id'])){
			//判断是否出入库，出入库状态无法删除
			$data = $this->purchase->where("id=$id")->find();
			if($data['status']){
				$str = '单号为 '.$data['sn_code'].' 的单据已完成(出入库)，无法删除！';
				alert('error',$str,$_SERVER['HTTP_REFERER']);
			}else{
				$this->purchase->where("id=$id")->delete();
			}
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//审核操作
	public function check(){
		if($id = intval($_GET['id'])){
			$data['check_status'] = 1;
			$data['check_user_id'] = session('user_id');
			$this->purchase->where("id=$id")->save($data);
			alert('success',L('SUCCESSFUL_OPERATION'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('OPERATION_FAILED'),$_SERVER['HTTP_REFERER']);
		}
	}

	//撤销审核操作
	public function removecheck(){
		if($id = intval($_GET['id'])){
			$data['check_status'] = 0;
			$data['check_user_id'] = session('user_id');
			$this->purchase->where("id=$id")->save($data);
			alert('success',L('SUCCESSFUL_OPERATION'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('OPERATION_FAILED'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function inorder(){
		if($id = intval($_GET['id'])){
			$stock = M('stock');
			$info = $this->purchase->where("id=$id")->find();
			//处理产品入库
			if($product = string2array($info['product'])){
				foreach($product as $v){
					//判断库存是否有产品
					$where['product_id'] = array('eq',$v['product_id']);
					$where['warehouse_id'] = array('eq',$v['warehouse_id']);
					if($stock->where($where)->find()){
						$stock->where($where)->setInc('amounts',$v['amount']);
						$stock->where($where)->setField('last_change_time',time());
					}else{
						$data['product_id'] = $v['product_id'];
						$data['warehouse_id'] = $v['warehouse_id'];
						$data['amounts'] = $v['amount'];
						$data['last_change_time'] = time();
						if(!$stock->add($data)) alert('error',L('OPERATION_FAILED'),U('stock/inoutorder'));
					}
					//记录库存详细数据
					$w2['bill_id'] = $info['id'];
					$w2['type'] = 1;
					$w2['num'] = $v['amount'];
					$w2['create_time'] = time();
					$w2['warehouse_id'] = $v['warehouse_id'];
					$w2['product_id'] = $v['product_id'];
					M('stock_item')->add($w2);
				}
			}
			//自动生成财务单据
			$pay['name'] = $info['subject'].' - '.$info['supplier_name'];
			$pay['price'] = $info['purchase_price'];
			$pay['creator_role_id'] = 1;
			$pay['owner_role_id'] = $info['create_user_id'];
			$pay['description'] = $info['description'];
			$pay['pay_time'] = time();
			$pay['create_time'] = time();
			$pay['status'] = 0;
			$pay['update_time'] = time();
			$pay['type'] = 0;
			$pay['bill_id'] = $info['id'];
			M('payables')->add($pay);

			$this->purchase->where("id=$id")->setField('status','1');
			alert('success',L('SUCCESSFUL_OPERATION'),U('stock/inoutorder'));
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function outorder(){
		if($id = intval($_GET['id'])){
			$info = $this->purchase->where("id=$id")->find();
			$error = '';
			if($product = string2array($info['product'])){
				foreach($product as $v){
					//判断库存是否有产品
					$where['product_id'] = array('eq',$v['product_id']);
					$where['warehouse_id'] = array('eq',$v['warehouse_id']);
					$where['amounts'] = array('egt',$v['amount']);
					if(!M('stock')->where($where)->find()){
						$warehouse_name = M('warehouse')->where("id=$v[warehouse_id]")->getField('name');
						$product_name = M('product')->where("product_id=$v[product_id]")->getField('name');
						$error .= " $product_name(产品) 在 $warehouse_name(仓库) 库存不足 ";
					}
				}
			}
			if($error){
				alert('error',$error.' 出库操作失败！',U('stock/inoutorder'));
			}else{
				foreach($product as $i){
					//更新总库存数据
					$w1['product_id'] = array('eq',$i['product_id']);
					$w1['warehouse_id'] = array('eq',$i['warehouse_id']);
					$r = M('stock')->where($w1)->setDec('amounts',$i['amount']);
					if(!$r) alert('error',L('OPERATION_FAILED'),U('stock/inoutorder'));
					//记录库存详细数据
					$w2['bill_id'] = $info['id'];
					$w2['type'] = 0;
					$w2['num'] = $i['amount'];
					$w2['create_time'] = time();
					$w2['warehouse_id'] = $i['warehouse_id'];
					$w2['product_id'] = $i['product_id'];
					M('stock_item')->add($w2);
				}
			}
			//自动生成财务单据
			$rec['name'] = $info['subject'].' - '.$info['supplier_name'];
			$rec['price'] = $info['purchase_price'];
			$rec['creator_role_id'] = 1;
			$rec['owner_role_id'] = $info['create_user_id'];
			$rec['description'] = $info['description'];
			$rec['pay_time'] = time();
			$rec['create_time'] = time();
			$rec['status'] = 0;
			$rec['update_time'] = time();
			$rec['type'] = 1;
			$rec['bill_id'] = $info['id'];
			M('receivables')->add($rec);

			M('purchase')->where("id=$id")->setField('status','1');
			alert('success',L('SUCCESSFUL_OPERATION'),U('stock/inoutorder'));
		}
	}

	//查看采购单据
	public function view(){
		if(!$id = intval($_GET['id'])) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		$assign['info'] = $this->purchase->where("id=$id")->find();
		//获取审核人
		$user_id = $assign['info']['check_user_id'];
		$assign['info']['check_name'] = M('user')->where("user_id=$user_id")->getField('name');
		//提取处理商品信息
		if($assign['info']['product']){
			$assign['product'] = string2array($assign['info']['product']);
			foreach($assign['product'] as $k=>$v){
				$assign['product'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
			}
		}

		if($assign['info']['type']){
			if($assign['info']['status']){
				$assign['img'] = 'outof';
			}elseif($assign['info']['check_status']){
				$assign['img'] = 'audit';
			}
		}else{
			if($assign['info']['status']){
				$assign['img'] = 'enter';
			}elseif($assign['info']['check_status']){
				$assign['img'] = 'audit';
			}
		}

		//仓库列表
		$assign['warehouse_list'] = M('warehouse')->order('id desc')->select();

		$this->assign('assign',$assign);
		$this->display();
	}

	//修改采购单据
	public function edit(){
		if($id = intval($_POST['id'])){
			$base = $_POST['base'];
			$base['purchase_time'] = $_POST['purchase_time']?strtotime($_POST['purchase_time']):time();
			$base['create_time'] = time();
			$base['update_time'] = time();
			$base['create_user_id'] = session('role_id');
			$base['purchase_price'] = $base['discount_price'];

			//处理商品数据
			if($_POST['purchase']['product']){
				foreach($_POST['purchase']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price'] && $v['prime_price']){
						$base['purchase_price'] += $v['prime_price'];
						$base['total_amount'] += $v['amount'];
					}else{
						unset($_POST['purchase']['product'][$k]);
					}
				}
				if(!empty($_POST['purchase']['product'])) $base['product'] = array2string($_POST['purchase']['product'],'0');
			}
			if(!$this->purchase->where("id=$id")->save($base)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),U('purchase/index'));
			alert('success',L('EDIT SUCCESSFULLY'),U('purchase/index'));
		}elseif($id = intval($_GET['id'])){
			$assign['info'] = $this->purchase->where("id=$id")->find();
			//获取审核人
			$user_id = $assign['info']['check_user_id'];
			$assign['info']['check_name'] = M('user')->where("user_id=$user_id")->getField('name');
			//提取处理商品信息
			if($assign['info']['product']){
				$assign['product'] = string2array($assign['info']['product']);
				foreach($assign['product'] as $k=>$v){
					$assign['product'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				}
			}

			if($assign['info']['type']){
				if($assign['info']['status']){
					$assign['img'] = 'enter';
				}elseif($assign['info']['check_status']){
					$assign['img'] = 'audit';
				}
			}else{
				if($assign['info']['status']){
					$assign['img'] = 'outof';
				}elseif($assign['info']['check_status']){
					$assign['img'] = 'audit';
				}
			}

			//仓库列表
			$assign['warehouse_list'] = M('warehouse')->order('id desc')->select();

			$this->assign('assign',$assign);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function listDialog(){
		$where['type'] = intval($_GET['type']);
		$where['check_status'] = 1;
		$list = M('purchase')->where($where)->select();

		foreach($list as $k=>$v){
			$list[$k]['supplier_name'] = M('supplier')->where("id=$v[supplier_id]")->getField('name');
		}
		
		$this->list = $list;
		$count = M('purchase')->where($where)->count();
		$this->total = $count%10 > 0 ? ceil($count/10) : $count/10;
		$this->count_num = $count;
		$this->display();
	}

	public function changeContent(){
		if($this->isAjax()){
			$where['type'] = $_GET['type'];
			$where['check_status'] = 1;
			$params = array();
			if ($_REQUEST["field"]) {
				$field = trim($_REQUEST['field']);
				$search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
				$condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

				switch ($condition) {
					case "is" : $where[$field] = array('eq',$search);break;
					case "contains" :  $where[$field] = array('like','%'.$search.'%');break;
				}
				$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$_REQUEST["search"]);
			}
			$p = !$_REQUEST['p']||$_REQUEST['p']<=0 ? 1 : intval($_REQUEST['p']);
			$list = M('purchase')->where($where)->select();
			foreach($list as $k=>$v){
				$list[$k]['supplier_name'] = M('supplier')->where("id=$v[supplier_id]")->getField('name');
			}
			$count = M('purchase')->where($where)->count();
			$data['list'] = $list;
			$data['p'] = $p;
			$data['count'] = $count;
			$data['total'] = $count%10 > 0 ? ceil($count/10) : $count/10;
			$this->ajaxReturn($data,"",1);
		}
	}
}