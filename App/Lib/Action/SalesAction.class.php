<?php 

class SalesAction extends Action {

	public function _initialize(){
		$action = array(
			'permission'=>array(),
			'allow'=>array('listDialog','changeContent','salestongji','zengpintongji','ziyongtongji','salesexcelExport','zengpinexcelExport', 'ziyongexcelExport')
		);
		B('Authenticate', $action);

		$this->sales = M('sales');
		$this->warehouse = M('warehouse');
		$this->sales_item = M('sales_item');
		$this->receivables=M('receivables');
		$this->user=M('user');
		$this->product=M('product');
		$this->finance_present=M('finance_present');
		$this->receivingorder=M('receivingorder');

	}

	public function index(){

		if(C('ismobile')) $this->redirect('sales/m_index');

		//权限管理,只能查看自己或自己下属的
		$below_ids = getSubRoleId(true);
		$where_role_id = array('in', implode(',', $below_ids));
		$where['create_user_id'] = $where_role_id;

		//审核状态筛选
		if(isset($_GET['by'])){
			$assign['by'] = $_GET['by'];
			if($_GET['by']=='not_check'){
				$where['check_status'] = array('eq','0');
			}elseif($_GET['by']=='checked'){
				$where['check_status'] = array('eq','1');
			}
		}
		
		//销售类型筛选
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
		import("@.ORG.Page");
		$p = isset($_GET['p'])?intval($_GET['p']):1;
		$assign['list'] = $this->sales->where($where)->order("id desc")->page($p.',15')->select();
		foreach($assign['list'] as $k=>$v){
			//创建人
			$assign['list'][$k]['create_user_name'] = getUserNameByRoleId($v['create_user_id']);
			$assign['list'][$k]['name'] = getUserNameByRoleId($v['sale_user_id']);
			$Model = new Model();
			if($v['type']){
				//获取销售退货单付款进度
				$money = $Model->query("select Sum(b.money) as money from ".C('DB_PREFIX')."payables as a,".C('DB_PREFIX')."paymentorder as b where a.payables_id = b.payables_id and b.is_deleted = 0 and b.status = 1 and a.type = 1 and a.bill_id = ".$v['id']);
				if($finance = $money['0']['money']){
					if($finance<$v['purchase_price']){
						$assign['list'][$k]['finance'] = "部分付款<span style='color:red;'>(还需付款".($v['purchase_price']-$finance)."元)</span>";
					}else{
						$assign['list'][$k]['finance'] = '已付款';
					}
				}else{
					$assign['list'][$k]['finance'] = '未付款';
				}
			}else{
				//获取销售单收款进度
				$money = $Model->query("select Sum(b.money) as money from ".C('DB_PREFIX')."receivables as a,".C('DB_PREFIX')."receivingorder as b where a.receivables_id = b.receivables_id and b.is_deleted = 0 and b.status = 1 and a.type = 0 and a.bill_id = ".$v['id']);
				if($finance = $money['0']['money']){
					if($finance<$v['sales_price']){
						$assign['list'][$k]['finance'] = "部分收款<span style='color:red;'>(还需收款".($v['sales_price']-$finance)."元)</span>";
					}else{
						$assign['list'][$k]['finance'] = '已收款';
					}
				}else{
					$assign['list'][$k]['finance'] = '未收款';
				}
			}
		}
		$count = $this->sales->where($where)->count();
		$Page = new Page($count,15);
		$Page->parameter = implode('&', $params);
		$assign['page'] = $Page->show();

		$assign['active'] = 'sales/index';
		$this->alert = parseAlert();
		$this->assign('assign',$assign);
		$this->display();
	}

	public function m_index(){
		if($this->isAjax()){
			import("@.ORG.Page");

			$below_ids = getSubRoleId(true);
			$where_role_id = array('in', implode(',', $below_ids));
			$where['create_user_id'] = $where_role_id;

			$where['type'] = 0;

			$p = !$_REQUEST['p']||$_REQUEST['p']<=0 ? 1 : intval($_REQUEST['p']);
			$list = M('sales')->where($where)->order("id desc")->page($p.',10')->select();
			foreach($list as $k=>$v){
				if($v['check_status']){
					if($v['status']){
						$list[$k]['zt'] = '已出库';
					}else{
						$list[$k]['zt'] = '已审核';
					}
				}else{
					$list[$k]['zt'] = '未审核';
				}
			}

			$data['list'] = $list;
			$data['nextp'] = $p+1;
			$this->ajaxReturn($data,"",1);
		}else{
			//权限管理,只能查看自己或自己下属的
			$below_ids = getSubRoleId(true);
			$where_role_id = array('in', implode(',', $below_ids));
			$where['create_user_id'] = $where_role_id;

			$where['type'] = 0;
			$list = M('sales')->where($where)->order("id desc")->limit('10')->select();
			$count = M('sales')->where($where)->order("id desc")->count();
			
			$this->alert = parseAlert();
			$this->assign('list',$list);
			$this->assign('count',$count);
			$this->display();
		}
		
	}

	public function analyticstable(){
		//部门列表
		$departments = M('roleDepartment')->select();
		$departmentList[] = M('roleDepartment')->where('department_id = %d', session('department_id'))->find();
		$departmentList = array_merge($departmentList, getSubDepartment(session('department_id'),$departments,''));
		$this->assign('departmentList', $departmentList);

		//员工列表
		$idArray = getSubRoleId();
		$roleList = array();
		foreach($idArray as $roleId){
			$roleList[$roleId] = getUserByRoleId($roleId);
		}
		$this->roleList = $roleList;

		//员工搜索
		if(isset($_GET['role'])){
			if(!$role_id = intval($_GET['role'])) $role_id = 'all';
		}
		//部门搜索
		if(isset($_GET['department'])){
			if(!$department_id = intval($_GET['department'])) $department_id = 'all';
		}
		$role_id_array = array();
		if($role_id && $department_id){
			if($role_id == "all") {
				if($department_id == 'all'){
					$role_id_array = getSubRoleId();
				}else{
					$roleList = getRoleByDepartmentId($department_id);
					foreach($roleList as $v2){
						$role_id_array[] = $v2['role_id'];
					}
				}
			}else{
				$role_id_array[] = $role_id;
			}
		}else{
			$role_id_array = getSubRoleId();
		}
		$where['user_id'] = array('in', implode(',', $role_id_array));

		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['sales_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['sales_time'] = array('elt',$end_time);
		}

		//获取数据
		$list = $this->sales_item->where($where)->Distinct(true)->field('user_id')->select();

		//本页共计
		/*$sales_data = $this->sales_item->where($where)->Distinct(true)->field('sales_id')->select();
		foreach($sales_data as $v){
			$re = $this->sales->where("id=$v[sales_id]")->find();
			$all['sales_price_all'] += $re['sales_price'];
			$all['sales_count_all'] += $re['sales_count'];
		}*/

		//组合表格数据
		$i = 0;
		foreach($list as $v){
			$w1['user_id'] = array('eq',$v['user_id']);
			if($where['sales_time']) $w1['sales_time'] = $where['sales_time'];
			$data[$i]['user_id'] = $v['user_id'];
			$data[$i]['user_name'] = getUserNameByRoleId($v['user_id']);
			$data[$i]['count'] =$this->sales_item->where($w1)->count();
			$data[$i]['rowspan'] = $data[$i]['count']+1;
			$sales_item_data = $this->sales_item->where($w1)->select();
			$j = 0;
			foreach($sales_item_data as $s){
				$w2['id'] = array('eq',$s['sales_id']);
				$w2['status'] = array('eq','1');
				if($where['sales_time']) $w2['sales_time'] = $where['sales_time'];
				$sales_data = $this->sales->where($w2)->find();
				if($sales_data){
					$data[$i]['list'][$j]['owner_percent'] = $s['owner_percent'];
					$data[$i]['list'][$j]['yt_price'] = $s['yt_price'];
					$data[$i]['list'][$j]['customer_id'] = $sales_data['customer_id'];
					$data[$i]['list'][$j]['customer_name'] = $sales_data['customer_name'];
					$data[$i]['list'][$j]['subject'] = $sales_data['subject'];
					$data[$i]['list'][$j]['id'] = $sales_data['id'];
					$data[$i]['list'][$j]['sn_code'] = $sales_data['sn_code'];
					$data[$i]['list'][$j]['team_percent'] = $sales_data['team_percent'];
					$data[$i]['list'][$j]['sales_price']=$sales_data['sales_price'];
					$data[$i]['list'][$j]['sales_time'] = $sales_data['sales_time'];
					$receivables_status=M('receivables')->where("bill_id=$sales_data[id]")->getfield('status');
					if($receivables_status==0){
						$data[$i]['list'][$j]['pay_status']='未收款';}
					if($receivables_status==1){
						$data[$i]['list'][$j]['pay_status']='部分收款';}
					if($receivables_status==2){
						$data[$i]['list'][$j]['pay_status']='已收款';}	
					//个人共计
					$data[$i]['sales_price_all'] += $sales_data['sales_price'];
					$data[$i]['sales_count_all'] += $sales_data['sales_count'];
					$data[$i]['owner_price_all'] += $s['yt_price'];
					//本页共计
					$all['owner_price_all'] += $s['yt_price'];
					$j++;
				}
			}
			$i++;
		}

		if(trim($_GET['act']) == 'excel'){
			if(vali_permission('sales', 'export')){
				if($data && $all){
					$this->excelExport($data,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}
		}else{
			
			$this->assign('data',$data);
			//print_r($data);exit;
			$this->assign('all',$all);
			$this->alert = parseAlert();
			$assign['active'] = 'sales/analyticssales';
			$this->assign('assign',$assign);
			$this->display();
		}
	}

	public function excelExport($data=false,$all=false){
		C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Sales");    
		$objProps->setSubject("lxcrm Sales Data");    
		$objProps->setDescription("lxcrm Sales Data");    
		$objProps->setKeywords("lxcrm Sales Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		   
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '员工名称');
		$objActSheet->setCellValue('B1', '销售编号');
		$objActSheet->setCellValue('C1', '销售主题');
		$objActSheet->setCellValue('D1', '团队提成比例(%)');
		$objActSheet->setCellValue('E1', '自己提成比例(%)');
		$objActSheet->setCellValue('F1', '提成金额(元)');
		$objActSheet->setCellValue('G1', '销售额');
		$objActSheet->setCellValue('H1', '客户');
		$objActSheet->setCellValue('I1', '收款情况');
		$objActSheet->setCellValue('J1', '销售日期');

		$i=2;
		foreach($data as $v){
			//echo $v['count'];exit;
			foreach($v['list'] as $k=>$d){
				if($k==0){
					$objActSheet->setCellValue('A'.$i, $v['user_name']);
					$merge = 'A'.$i.':A'.($i+$v['count']);
					$objPHPExcel->getActiveSheet()->mergeCells($merge);
				}
				$objActSheet->setCellValue('B'.$i, $d['sn_code']);
				$objActSheet->setCellValue('C'.$i, $d['subject']);
				$objActSheet->setCellValue('D'.$i, $d['team_percent']);
				$objActSheet->setCellValue('E'.$i, $d['owner_percent']);
				$objActSheet->setCellValue('F'.$i, $d['yt_price']);
				$objActSheet->setCellValue('G'.$i, $d['sales_price']);
				$objActSheet->setCellValue('H'.$i, $d['customer_name']);
				$objActSheet->setCellValue('I'.$i, $d['pay_status']);
				$objActSheet->setCellValue('J'.$i, date('Y-m-d',$d['sales_time']));

				//个人总计
				$item = ($v['count']-1);
				if($k==$item){
					$i++;
					$objActSheet->setCellValue('B'.$i, '个人总计：');
					$objActSheet->setCellValue('C'.$i, '');
					$objActSheet->setCellValue('D'.$i, '');
					$objActSheet->setCellValue('E'.$i, $v['owner_price_all']);
					$objActSheet->setCellValue('F'.$i, '');
					$objActSheet->setCellValue('G'.$i, '');
					$objActSheet->setCellValue('H'.$i, '');
					$objActSheet->setCellValue('I'.$i, '');
					$objActSheet->setCellValue('J'.$i, '');
					//空行
					$i++;
					$objActSheet->setCellValue('A'.$i, '');
					$objActSheet->setCellValue('B'.$i, '');
					$objActSheet->setCellValue('C'.$i, '');
					$objActSheet->setCellValue('D'.$i, '');
					$objActSheet->setCellValue('E'.$i, '');
					$objActSheet->setCellValue('F'.$i, '');
					$objActSheet->setCellValue('G'.$i, '');
					$objActSheet->setCellValue('H'.$i, '');
					$objActSheet->setCellValue('I'.$i, '');
					$objActSheet->setCellValue('J'.$i, '');
				}
				$i++;
			}
		}

		//总计
		$objActSheet->setCellValue('A'.$i, '总计：');
		$objActSheet->setCellValue('B'.$i, '');
		$objActSheet->setCellValue('C'.$i, '');
		$objActSheet->setCellValue('D'.$i, '');
		$objActSheet->setCellValue('E'.$i, '');
		$objActSheet->setCellValue('F'.$i, $v['owner_price_all']);
		$objActSheet->setCellValue('G'.$i, '');
		$objActSheet->setCellValue('H'.$i, '');
		$objActSheet->setCellValue('I'.$i, '');
		$objActSheet->setCellValue('J'.$i, '');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=sales_analytics_".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output'); 
	}

	public function analyticsprice(){
		//部门列表
		$departments = M('roleDepartment')->select();
		$departmentList[] = M('roleDepartment')->where('department_id = %d', session('department_id'))->find();
		$departmentList = array_merge($departmentList, getSubDepartment(session('department_id'),$departments,''));
		$this->assign('departmentList', $departmentList);

		//员工列表
		$idArray = getSubRoleId();
		$roleList = array();
		foreach($idArray as $roleId){				
			$roleList[$roleId] = getUserByRoleId($roleId);
		}
		$this->roleList = $roleList;

		//员工搜索
		if(isset($_GET['role'])){
			if(!$role_id = intval($_GET['role'])) $role_id = 'all';
		}
		//部门搜索
		if(isset($_GET['department'])){
			if(!$department_id = intval($_GET['department'])) $department_id = 'all';
		}
		$role_id_array = array();
		if($role_id && $department_id){
			if($role_id == "all") {
				if($department_id == 'all'){
					$role_id_array = getSubRoleId();
				}else{
					$roleList = getRoleByDepartmentId($department_id);
					foreach($roleList as $v2){
						$role_id_array[] = $v2['role_id'];
					}
				}
			}else{
				$role_id_array[] = $role_id;
			}
		}else{
			$role_id_array = getSubRoleId();
		}
		
		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['sales_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['sales_time'] = array('elt',$end_time);
		}

		$list = $this->sales_item->where($where)->select();

		foreach($role_id_array as $k=>$v){
			$data['name'][$k] = getUserNameByRoleId($v);
			$Model = new Model();
			$info = $Model->query("select Sum(b.yt_price) as price from ".C('DB_PREFIX')."sales as a,".C('DB_PREFIX')."sales_item as b where a.id = b.sales_id and b.user_id = ".$v." and a.status = 1 and a.type = 0");
			$data['owner_price_all'][$k] = $info[0]['price']?$info[0]['price']:'0';
		}

		$assign['active'] = 'sales/analyticssales';
		$this->assign('assign',$assign);
		$this->assign('data',$data);
		$this->display();
	}
     public function salestongji(){
		//客户列表
		$customerList= M('customer')->field('customer_id,name')->select();
		$this->assign('customerList', $customerList);

		//员工列表
		$salesuserlist=M('user')->field('role_id,name')->select();
		$this->assign('salesuserlist',$salesuserlist);

        //客户搜索
		if(isset($_GET['customer'])){
			if(intval($_GET['customer']!='all')){
				$where['customer_id']=intval($_GET['customer']);
             }
		}
		//员工搜索
		if(isset($_GET['role'])){
			if(intval($_GET['role']!='all')){
				$sale_user_id=intval($_GET['role']);
				$where['sale_user_id']=intval($_GET['role']);
             }
		}
		
		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['create_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['create_time'] = array('elt',$end_time);
		}
         $where['subject']=array('like','销售%');
		$list = $this->sales->Distinct(true)->where($where )->field('customer_id')->select();
		$i=0;
		foreach($list as $k=>$v){
			$where['customer_id']=$v['customer_id'];
			$info = $this->sales->where($where)->field('id,sn_code,sales_price,customer_name,product,sale_user_id,create_time')->select();
			$list[$i]['count'] =$this->sales->where($where)->count();
			foreach($info as $kk=>$vv){
				$list[$k]['customer_name']=$vv['customer_name'];
				$info[$kk]['sn_code'] = $vv['sn_code'];
				$info[$kk]['sales_price'] = $vv['sales_price'];
				$paystatus=$this->receivables->where("bill_id=$vv[id]")->getfield('status');		
				if($paystatus==0){
					$info[$kk]['ispay']='未收款';
					
				}
				if($paystatus==1){
					$info[$kk]['ispay']='部分收款';
					
				}
				if($paystatus==2){
					$info[$kk]['ispay']='已收款';
					
				}
				$info[$kk]['sale_user_name']=$this->user->where("role_id=$vv[sale_user_id]")->getfield('name');
				$info[$kk]['create_time']=$vv['create_time'];
				$info[$kk]['product']=string2array($vv['product']);
				$info[$kk]['product_count']=count($info[$kk]['product']);
				$all['total_price']+=$vv['sales_price'];
				$list[$k]['all_product_count']+=count($info[$kk]['product']);			
			}
			
			$list[$k]['data'] = $info;
			$i++;
		}
		//print_r($list);exit;
		if(trim($_GET['act']) == 'salesexcel'){
			/*if(vali_permission('sales', 'export')){*/
				if($list && $all){
					$this->salesexcelExport($list,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			/*}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}*/
		}else{
			$this->assign('all',$all);
			$this->assign('data',$list);
			$this->display();
	    }
	}
	public function salesexcelExport($list=false,$all=false){
		C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Sales");    
		$objProps->setSubject("lxcrm Sales Data");    
		$objProps->setDescription("lxcrm Sales Data");    
		$objProps->setKeywords("lxcrm Sales Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		   
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '客户名称');
		$objActSheet->setCellValue('B1', '销售编号');
		$objActSheet->setCellValue('C1', '销售额');
		$objActSheet->setCellValue('D1', '收款情况');
		$objActSheet->setCellValue('E1', '销售日期');
		$objActSheet->setCellValue('F1', '销售员');
		$objActSheet->setCellValue('G1', '产品名称');
		$objActSheet->setCellValue('H1', '规格');
		$objActSheet->setCellValue('I1', '数量');
		$i=$j=$b=2;
		foreach($list as $k=>$v){
			
			//合并客户名称
			$objActSheet->setCellValue('A'.$j, $v['customer_name']);
			$merge = 'A'.$j.':A'.($j+$v['all_product_count']-1);
			$objPHPExcel->getActiveSheet()->mergeCells($merge);
			$j = $j+$v['all_product_count'];

			foreach($v['data'] as $k1=>$v1){
				//合并销售编号
				$objActSheet->setCellValue('B'.$b, $v1['sn_code']);
				$merge = 'B'.$b.':B'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售额
				$objActSheet->setCellValue('C'.$b, $v1['sales_price']);
				$merge = 'C'.$b.':C'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并收款情况
				$objActSheet->setCellValue('D'.$b, $v1['ispay']);
				$merge = 'D'.$b.':D'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售日期
				$objActSheet->setCellValue('E'.$b, date('Y-m-d',$v1['create_time']));
				$merge = 'E'.$b.':E'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售员
				$objActSheet->setCellValue('F'.$b, $v1['sale_user_name']);
				$merge = 'F'.$b.':F'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);

				$b += $v1['product_count'];

				foreach($v1['product'] as $k2=>$v2){
					$product_name=$this->product->where("product_id=$v2[product_id]")->getfield('name');	
					$objActSheet->setCellValue('G'.$i, $product_name);
					$objActSheet->setCellValue('H'.$i, $v2['product_standard']);
					$objActSheet->setCellValue('I'.$i, $v2['amount']);
					$i++;
				}
                
			}
			//if($k==13) break;
		}
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=sales_analytics_".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');     
	}
	public function zengpintongji(){
		/*//客户列表
		$customerList= M('customer')->field('customer_id,name')->select();
		$this->assign('customerList', $customerList);

		//员工列表
		$salesuserlist=M('user')->field('role_id,name')->select();
		$this->assign('salesuserlist',$salesuserlist);

        //客户搜索
		if(isset($_GET['customer'])){
			if(intval($_GET['customer']!='all')){
				$where['customer_id']=intval($_GET['customer']);
             }
		}
		//员工搜索
		if(isset($_GET['role'])){
			if(intval($_GET['role']!='all')){
				$sale_user_id=intval($_GET['role']);
				$where['sale_user_id']=intval($_GET['role']);
             }
		}
		
		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['create_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['create_time'] = array('elt',$end_time);
		}
        $where['subject']=array('like','%赠品%');

		$list=$this->sales->Distinct(true)->where($where)->field('customer_id')->select();
		$i=0;
		foreach($list as $k=>$v){
			$where['customer_id']=$v['customer_id'];
			$info = $this->sales->where($where)->field('id,sn_code,customer_name,sale_user_id,create_time')->select();
			$list[$i]['count'] =$this->sales->where($where)->count();
			foreach($info as $kk=>$vv){
	
				$list[$k]['customer_name']=$vv['customer_name'];
				$info[$kk]['sn_code'] = $vv['sn_code'];
				$info[$kk]['zengpin_price'] = $this->finance_present->where("sales_id=$vv[id]")->getfield('price');
				
				$paystatus=$this->receivables->where("bill_id=$vv[id]")->getfield('status');
		
				if($paystatus==0){
					$info[$kk]['ispay']='未收款';
					
				}
				if($paystatus==1){
					$info[$kk]['ispay']='部分收款';
					
				}
				if($paystatus==2){
					$info[$kk]['ispay']='已收款';
					
				}

				$info[$kk]['sale_user_name']=$this->user->where("role_id=$vv[sale_user_id]")->getfield('name');
				$info[$kk]['create_time']=$vv['create_time'];
			
				$all['total_price']+=$info[$kk]['zengpin_price'] ;
								
			}
			$list[$k]['data'] = $info;
        $i++;
		} 
				$this->assign('all',$all);
		$this->assign('al',$al);
		$this->assign('a',$a);
        $this->assign('data',$list);
		$this->display();
	}*/
	//客户列表
		$customerList= M('customer')->field('customer_id,name')->select();
		$this->assign('customerList', $customerList);

		//员工列表
		$salesuserlist=M('user')->field('role_id,name')->select();
		$this->assign('salesuserlist',$salesuserlist);

        //客户搜索
		if(isset($_GET['customer'])){
			if(intval($_GET['customer']!='all')){
				$where['customer_id']=intval($_GET['customer']);
             }
		}
		//员工搜索
		if(isset($_GET['role'])){
			if(intval($_GET['role']!='all')){
				$sale_user_id=intval($_GET['role']);
				$where['sale_user_id']=intval($_GET['role']);
             }
		}
		
		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['create_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['create_time'] = array('elt',$end_time);
		}
         $where['subject']=array('like','%赠品%');
		$list = $this->sales->Distinct(true)->where($where )->field('customer_id')->select();
		$i=0;
		foreach($list as $k=>$v){
			$where['customer_id']=$v['customer_id'];
			$info = $this->sales->where($where)->field('id,sn_code,sales_price,customer_name,present,sale_user_id,create_time')->select();
			$list[$i]['count'] =$this->sales->where($where)->count();
			foreach($info as $kk=>$vv){
				$list[$k]['customer_name']=$vv['customer_name'];
				$info[$kk]['sn_code'] = $vv['sn_code'];
				$info[$kk]['zengpin_price'] = $this->finance_present->where("sales_id=$vv[id]")->getfield('price');
				
				$info[$kk]['sale_user_name']=$this->user->where("role_id=$vv[sale_user_id]")->getfield('name');
				$info[$kk]['create_time']=$vv['create_time'];
				$info[$kk]['present']=string2array($vv['present']);
				$info[$kk]['present_count']=count($info[$kk]['present']);
				$all['total_price']+=$vv['zengpin_price'];
				$list[$k]['all_present_count']+=count($info[$kk]['present']);			
			}
			
			$list[$k]['data'] = $info;
			$i++;
		}
		
		if(trim($_GET['act']) == 'zengpinexcel'){
			/*if(vali_permission('sales', 'export')){*/
				if($list && $all){
					$this->zengpinexcelExport($list,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			/*}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}*/
		}else{
			$this->assign('all',$all);
			$this->assign('data',$list);
			$this->display();
	    }
	}
	public function zengpinexcelExport($list=false,$all=false){
		C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Sales");    
		$objProps->setSubject("lxcrm Sales Data");    
		$objProps->setDescription("lxcrm Sales Data");    
		$objProps->setKeywords("lxcrm Sales Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		   
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '客户名称');
		$objActSheet->setCellValue('B1', '销售编号');
		$objActSheet->setCellValue('C1', '赠品金额');
		$objActSheet->setCellValue('D1', '销售日期');
		$objActSheet->setCellValue('E1', '销售员');
		$objActSheet->setCellValue('F1', '产品名称');
		$objActSheet->setCellValue('G1', '规格');
		$objActSheet->setCellValue('H1', '数量');
		$i=$j=$b=2;
		foreach($list as $k=>$v){
			
			//合并客户名称
			$objActSheet->setCellValue('A'.$j, $v['customer_name']);
			$merge = 'A'.$j.':A'.($j+$v['all_present_count']-1);
			$objPHPExcel->getActiveSheet()->mergeCells($merge);
			$j = $j+$v['all_present_count'];
			foreach($v['data'] as $k1=>$v1){
				//合并销售编号
				$objActSheet->setCellValue('B'.$b, $v1['sn_code']);
				$merge = 'B'.$b.':B'.($b+$v1['present_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并赠品金额
				$objActSheet->setCellValue('C'.$b, $v1['zengpin_price']);
				$merge = 'C'.$b.':C'.($b+$v1['present_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				/*//合并收款情况
				$objActSheet->setCellValue('D'.$b, $v1['ispay']);
				$merge = 'D'.$b.':D'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);*/
				//合并销售日期
				$objActSheet->setCellValue('D'.$b, date('Y-m-d',$v1['create_time']));
				$merge = 'D'.$b.':D'.($b+$v1['present_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售员
				$objActSheet->setCellValue('E'.$b, $v1['sale_user_name']);
				$merge = 'E'.$b.':E'.($b+$v1['present_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);

				$b += $v1['present_count'];
				//print_r($list);exit;
				foreach($v1['present'] as $k2=>$v2){
					$product_name=$this->product->where("product_id=$v2[product_id]")->getfield('name');	
					$objActSheet->setCellValue('F'.$i, $product_name);
					$objActSheet->setCellValue('G'.$i, $v2['standard']);
					$objActSheet->setCellValue('H'.$i, $v2['amount']);
					$i++;
				}
                
			}
			//if($k==13) break;
		}
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=赠品统计".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');     
	}

	public function ziyongtongji(){
		
    //客户列表
		$customerList= M('customer')->field('customer_id,name')->select();
		$this->assign('customerList', $customerList);

		//员工列表
		$salesuserlist=M('user')->field('role_id,name')->select();
		$this->assign('salesuserlist',$salesuserlist);

        //客户搜索
		if(isset($_GET['customer'])){
			if(intval($_GET['customer']!='all')){
				$where['customer_id']=intval($_GET['customer']);
             }
		}
		//员工搜索
		if(isset($_GET['role'])){
			if(intval($_GET['role']!='all')){
				$sale_user_id=intval($_GET['role']);
				$where['sale_user_id']=intval($_GET['role']);
             }
		}
		
		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['create_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['create_time'] = array('elt',$end_time);
		}
         $where['subject']='自用品鉴';
		$list = $this->sales->Distinct(true)->where($where )->field('customer_id')->select();
		$i=0;
		foreach($list as $k=>$v){
			$where['customer_id']=$v['customer_id'];
			$info = $this->sales->where($where)->field('id,sn_code,sales_price,customer_name,product,sale_user_id,create_time')->select();
			$list[$i]['count'] =$this->sales->where($where)->count();
			foreach($info as $kk=>$vv){
				$list[$k]['customer_name']=$vv['customer_name'];
				$info[$kk]['sn_code'] = $vv['sn_code'];
				$info[$kk]['sales_price'] = $vv['sales_price'];
				$paystatus=$this->receivables->where("bill_id=$vv[id]")->getfield('status');		
				if($paystatus==0){
					$info[$kk]['ispay']='未收款';
					
				}
				if($paystatus==1){
					$info[$kk]['ispay']='部分收款';
					
				}
				if($paystatus==2){
					$info[$kk]['ispay']='已收款';
					
				}
				$info[$kk]['sale_user_name']=$this->user->where("role_id=$vv[sale_user_id]")->getfield('name');
				$info[$kk]['create_time']=$vv['create_time'];
				$info[$kk]['product']=string2array($vv['product']);
				$info[$kk]['product_count']=count($info[$kk]['product']);
				$all['total_price']+=$vv['sales_price'];
				$list[$k]['all_product_count']+=count($info[$kk]['product']);			
			}
			
			$list[$k]['data'] = $info;
			$i++;
		}
		//print_r($list);exit;
		if(trim($_GET['act']) == 'ziyongexcel'){
			/*if(vali_permission('sales', 'export')){*/
				if($list && $all){
					$this->salesexcelExport($list,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			/*}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}*/
		}else{
			$this->assign('all',$all);
			$this->assign('data',$list);
			$this->display();
	    }
	}
	public function ziyongexcelExport($list=false,$all=false){
		
        C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Sales");    
		$objProps->setSubject("lxcrm Sales Data");    
		$objProps->setDescription("lxcrm Sales Data");    
		$objProps->setKeywords("lxcrm Sales Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		   
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '客户名称');
		$objActSheet->setCellValue('B1', '销售编号');
		$objActSheet->setCellValue('C1', '销售额');
		$objActSheet->setCellValue('D1', '收款情况');
		$objActSheet->setCellValue('E1', '销售日期');
		$objActSheet->setCellValue('F1', '销售员');
		$objActSheet->setCellValue('G1', '产品名称');
		$objActSheet->setCellValue('H1', '规格');
		$objActSheet->setCellValue('I1', '数量');
		$i=$j=$b=2;
		foreach($list as $k=>$v){
			
			//合并客户名称
			$objActSheet->setCellValue('A'.$j, $v['customer_name']);
			$merge = 'A'.$j.':A'.($j+$v['all_product_count']-1);
			$objPHPExcel->getActiveSheet()->mergeCells($merge);
			$j = $j+$v['all_product_count'];

			foreach($v['data'] as $k1=>$v1){
				//合并销售编号
				$objActSheet->setCellValue('B'.$b, $v1['sn_code']);
				$merge = 'B'.$b.':B'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售额
				$objActSheet->setCellValue('C'.$b, $v1['sales_price']);
				$merge = 'C'.$b.':C'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并收款情况
				$objActSheet->setCellValue('D'.$b, $v1['ispay']);
				$merge = 'D'.$b.':D'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售日期
				$objActSheet->setCellValue('E'.$b, date('Y-m-d',$v1['create_time']));
				$merge = 'E'.$b.':E'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);
				//合并销售员
				$objActSheet->setCellValue('F'.$b, $v1['sale_user_name']);
				$merge = 'F'.$b.':F'.($b+$v1['product_count']-1);
				$objPHPExcel->getActiveSheet()->mergeCells($merge);

				$b += $v1['product_count'];

				foreach($v1['product'] as $k2=>$v2){
					$product_name=$this->product->where("product_id=$v2[product_id]")->getfield('name');	
					$objActSheet->setCellValue('G'.$i, $product_name);
					$objActSheet->setCellValue('H'.$i, $v2['product_standard']);
					$objActSheet->setCellValue('I'.$i, $v2['amount']);
					$i++;
				}
                
			}
			//if($k==13) break;
		}
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=自用品鉴".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');     
	}

	//销售单-统计记录
	public function analyticssales(){
		//部门列表
		$departments = M('roleDepartment')->select();
		$departmentList[] = M('roleDepartment')->where('department_id = %d', session('department_id'))->find();
		$departmentList = array_merge($departmentList, getSubDepartment(session('department_id'),$departments,''));
		$this->assign('departmentList', $departmentList);

		//员工列表
		$idArray = getSubRoleId();
		$roleList = array();
		foreach($idArray as $roleId){				
			$roleList[$roleId] = getUserByRoleId($roleId);
		}
		$this->roleList = $roleList;
		
		//员工搜索
		if(isset($_GET['role'])){
			if(!$role_id = intval($_GET['role'])) $role_id = 'all';
		}
		//部门搜索
		if(isset($_GET['department'])){
			if(!$department_id = intval($_GET['department'])) $department_id = 'all';
		}
		if($role_id && $department_id){
			if($role_id == "all") {
				if($department_id == 'all'){
					$role_id_array = getSubRoleId();
					$where['create_user_id'] = array('in', implode(',', $role_id_array));
				}else{
					$roleList = getRoleByDepartmentId($department_id);
					$role_id_array = array();
					foreach($roleList as $v2){
						$role_id_array[] = $v2['role_id'];
					}
					$where_role_id = array('in', implode(',', $role_id_array));
					$where['create_user_id'] = $where_role_id;
				}
				
			}else{
				$where['create_user_id'] = $role_id;
			}
		}else{
			$role_id_array = getSubRoleId();
			$where['create_user_id'] = array('in', implode(',', $role_id_array));
		}

		//时间搜索
		if($_GET['start_time']) $start_time = strtotime($_GET['start_time']);
		$end_time = $_GET['end_time'] ?  strtotime($_GET['end_time']) : time();
		if($start_time){
			$where['create_time']= array(array('elt',$end_time),array('egt',$start_time), 'and');
		}else{
			$where['create_time'] = array('elt',$end_time);
		}

		$where['type'] = array('eq','0');
		$where['status'] = array('eq','1');

		//查询数据列表
		$assign['list'] = $this->sales->where($where)->order('sales_count desc,sales_price desc')->select();

		foreach($assign['list'] as $k=>$v){
			$user_ids = $this->sales_item->where("sales_id=$v[id]")->field('user_id')->select();
			foreach($user_ids as $u){
				$assign['list'][$k]['fc'][$u['user_id']] = getUserNameByRoleId($u['user_id']);
			}
			$assign['sales_count_all'] += $v['sales_count'];
			$assign['sales_price_all'] += $v['sales_price'];
		}

		$assign['active'] = 'sales/analyticssales';
		$this->assign('assign',$assign);
		$this->display();
	}

	public function addSalesReturn(){
		if($this->isPost()){
			//基本数据
			$base = $_POST['base'];
			$base['type'] = 1;
			$base['sales_time'] = $_POST['sales_time']?strtotime($_POST['sales_time']):time();
			$base['create_time'] = time();
			$base['update_time'] = time();
			$base['create_user_id'] = session('role_id');
			$base['sales_price'] = $base['other_expenses'];

			//处理商品数据
			if($_POST['sales']['product']){
				foreach($_POST['sales']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price'] && $v['prime_price']){
						$base['sales_price'] += $v['prime_price'];
						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['product'][$k]);
					}
				}
				if(!empty($_POST['sales']['product'])) $base['product'] = array2string($_POST['sales']['product'],'0');
			}

			//处理赠品数据
			if($_POST['sales']['zp']){
				foreach($_POST['sales']['zp'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount']){
						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['zp'][$k]);
					}
				}
				if(!empty($_POST['sales']['zp'])) $base['present'] = array2string($_POST['sales']['zp'],'0');
			}
			
			//保存销售单信息到数据库
			if($sid = $this->sales->add($base)){
				$sn_code['sn_code'] = 'THD'.date('Ymd',time()).$sid;
				$this->sales->where("id=$sid")->save($sn_code);
				alert('success',L('ADD_SUCCESS'),U('sales/index'));
			}else{
				alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			}
		}else{
			//自动生成sn_code码
			$id = $this->sales->order('id desc')->getField('id');
			$assign['sn_code'] = $id?'THD'.date('Ymd',time()).($id+1):'THD'.date('Ymd',time()).'1';

			//仓库列表
			$assign['warehouse_list'] = $this->warehouse->order('id desc')->select();

			$this->assign('assign',$assign);
			$this->display();
		}
	}

	public function add(){
		if(C('ismobile')) $this->redirect('sales/m_add');
		if($this->isPost()){
			//基本数据
			$base = $_POST['base'];
			$base['sales_time'] = $_POST['sales_time']?strtotime($_POST['sales_time']):time();
			$base['create_time'] = time();
			$base['update_time'] = time();
			$base['create_user_id'] = session('role_id');
			$base['sales_price'] = $base['other_expenses'];
			$base['type'] = $base['type'];
			$type = $base['type']==1?'THD':'XSD';

			//更新客户日期
			$customer['update_time'] = time();
			M('customer')->where("customer_id=$base[customer_id]")->save($customer);

			//处理商品数据
			if($_POST['sales']['product']){
				foreach($_POST['sales']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price'] && $v['prime_price']){
						$base['sales_price'] += $v['prime_price'];
						$base['sales_count'] += $v['amount'];
						if(!$v['pack']){
							$product_price += $v['amount']*$v['unit_price'];
							$rl_price += $v['amount']*$v['unit_price']*($v['discount_rate']/100);
						}
					}else{
						unset($_POST['sales']['product'][$k]);
					}
				}
				if(!empty($_POST['sales']['product'])) $base['product'] = array2string($_POST['sales']['product'],'0');
			}

			//处理赠品数据
			if($_POST['sales']['zp']){
				foreach($_POST['sales']['zp'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount']){
						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['zp'][$k]);
					}
				}
				if(!empty($_POST['sales']['zp'])) $base['present'] = array2string($_POST['sales']['zp'],'0');
			}
			
			if($base['type']==0){
				/*判断库存是否足够 begin*/
				$item = $merge_product = array();
				$n = $m = 0;
				//存放商品信息到临时数组
				if($product = string2array($base['product'])){
					foreach($product as $v){
						$item[$n]['product_id'] = $v['product_id'];
						$item[$n]['warehouse_id'] = $v['warehouse_id'];
						$item[$n]['amount'] = $v['amount'];
						$item[$n]['pack'] = $v['pack'];
						$n++;
					}
				}
				//存放赠品信息到临时数组
				if($present = string2array($base['present'])){
					foreach($present as $v){
						//计算赠品总额
						$present_price += $v['all_price'];

						$item[$n]['product_id'] = $v['product_id'];
						$item[$n]['warehouse_id'] = $v['warehouse_id'];
						$item[$n]['amount'] = $v['amount'];
						$n++;
					}
				}
				//合并统计相同产品，相同仓库的产品的数量
				$num = count($item);
				foreach($item as $k=>$v){
					if(!empty($item[$k])){
						$merge_product[$k] = $item[$k];
						for($i=1;$i<($num-$k);$i++){
							if($item[$k]['product_id']==$item[($k+$i)]['product_id'] && $item[$k]['warehouse_id']==$item[($k+$i)]['warehouse_id']){
								$merge_product[$k]['amount'] += $item[($k+$i)]['amount'];
								$item[($k+$i)] = '';
							}
						}
					}
				}

				foreach($merge_product as $v){
					//判断库存是否有产品
					$where['product_id'] = array('eq',$v['product_id']);
					$where['warehouse_id'] = array('eq',$v['warehouse_id']);
					$where['amounts'] = array('egt',$v['amount']);
					if(!M('stock')->where($where)->find()){
						$warehouse_name = $this->warehouse->where("id=$v[warehouse_id]")->getField('name');
						$product_name = M('product')->where("product_id=$v[product_id]")->getField('name');
						$error .= " $product_name(产品) 在 $warehouse_name(仓库) 库存不足 <br/>";
					}
				}
				if($error) $this->error($error,'',10);
				/*判断库存是否足够 end*/
			}

			
			//保存销售单信息到数据库
			if($sid = $this->sales->add($base)){
				$sn_code['sn_code'] = $type.date('Ymd',time()).$sid;
				$this->sales->where("id=$sid")->save($sn_code);
			}else{
				alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			}

			//处理并保存提成信息
			if($_POST['sales']['tc']){
				foreach($_POST['sales']['tc'] as $v){
					//没有相关数据则销毁数组
					if($v['user_id'] && $v['owner_percent']){
						//判断组长是谁
						if($_POST['sales']['is_lead']==$v['user_id']){
							$tc['is_lead'] = 1;
						}
						$tc['owner_percent'] = $v['owner_percent'];
						$tc['user_id'] = $v['user_id'];
						$tc['sales_time'] = $base['sales_time'];
						$tc['sales_id'] = $sid;
						//计算每个人的提成金额,分为有团队比例和无团队比例两种
						if($base['team_percent']){
							$tc['rl_price'] = round($v['owner_percent']/100*$rl_price,2);
							$tc['owner_price'] = round($base['team_percent'] * $v['owner_percent']/10000*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}else{
							$tc['rl_price'] = $rl_price;
							$tc['owner_price'] = round($v['owner_percent']/100*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}
						M("sales_item")->add($tc);
						unset($tc);
					}
				}
			}

			//获取人员列表，提醒审核人员做审核操作
			$check_send = M('config')->where('name="check_send"')->getField('value');
			$check_send_list = explode(',',$check_send);
			foreach($check_send_list as $v){
				$telphone = M('user')->where("user_id=$v")->getField('telephone');
				$content = "禹酒CRM系统有新的销售单需要您审核,销售单号为：$sn_code[sn_code]";
				//send_sms($telphone,$content);
			}

			alert('success',L('ADD_SUCCESS'),U('sales/index'));
		}else{
			$type = intval($_GET['type'])?intval($_GET['type']):0;
			$this->assign('type',$type);
			$type_code = $_GET['type']==1?'THD':'XSD';

			//自动生成sn_code码
			$id = $this->sales->order('id desc')->getField('id');
			$assign['sn_code'] = $id?$type_code.date('Ymd',time()).($id+1):$type_code.date('Ymd',time()).'1';

			//仓库列表
			$assign['warehouse_list'] = $this->warehouse->order('id desc')->select();

			$this->assign('assign',$assign);
			$this->display();
		}
	}

	public function m_add(){
		if($this->isPost()){
			//基本数据
			$base = $_POST['base'];
			$base['type'] = 0;
			$base['sales_time'] = $_POST['sales_time']?strtotime($_POST['sales_time']):time();
			$base['create_time'] = time();
			$base['update_time'] = time();
			$base['create_user_id'] = session('role_id');
			$base['sales_price'] = $base['other_expenses'];

			//更新客户日期
			$customer['update_time'] = time();
			M('customer')->where("customer_id=$base[customer_id]")->save($customer);

			//处理商品数据
			if($_POST['sales']['product']){
				foreach($_POST['sales']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price']){
						$_POST['sales']['product'][$k]['prime_price'] = $v['unit_price']*$v['amount'];
						$_POST['sales']['product'][$k]['product_standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');
						$_POST['sales']['product'][$k]['tax_rate'] = 0;
						$_POST['sales']['product'][$k]['description'] = '';
						if(!$v['discount_rate']) $v['discount_rate'] = 0;

						$base['sales_price'] += $_POST['sales']['product'][$k]['prime_price'];
						$base['sales_count'] += $v['amount'];
						if(!$v['pack']){
							$product_price += $v['amount']*$v['unit_price'];
							$rl_price += $v['amount']*$v['unit_price']*($v['discount_rate']/100);
						}
					}else{
						unset($_POST['sales']['product'][$k]);
					}
				}
				if(!empty($_POST['sales']['product'])) $base['product'] = array2string($_POST['sales']['product'],'0');
			}

			//处理赠品数据
			if($_POST['sales']['present']){
				foreach($_POST['sales']['present'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount']){
						$_POST['sales']['present'][$k]['all_price'] = $v['price']*$v['amount'];
						$_POST['sales']['present'][$k]['standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');

						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['present'][$k]);
					}
				}
				if(!empty($_POST['sales']['present'])) $base['present'] = array2string($_POST['sales']['present'],'0');
			}

			//保存销售单信息到数据库
			if($sid = $this->sales->add($base)){
				$sn_code['sn_code'] = 'M_XSD'.date('Ymd',time()).$sid;
				$this->sales->where("id=$sid")->save($sn_code);
			}else{
				alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			}

			//处理并保存提成信息
			if($_POST['sales']['tc']){
				foreach($_POST['sales']['tc'] as $v){
					//没有相关数据则销毁数组
					if($v['user_id'] && $v['owner_percent']){
						//判断组长是谁
						if($_POST['sales']['is_lead']==$v['user_id']){
							$tc['is_lead'] = 1;
						}
						$tc['owner_percent'] = $v['owner_percent'];
						$tc['user_id'] = $v['user_id'];
						$tc['sales_time'] = $base['sales_time'];
						$tc['sales_id'] = $sid;
						//计算每个人的提成金额,分为有团队比例和无团队比例两种
						if($base['team_percent']){
							$tc['rl_price'] = round($v['owner_percent']/100*$rl_price,2);
							$tc['owner_price'] = round($base['team_percent'] * $v['owner_percent']/10000*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}else{
							$tc['rl_price'] = $rl_price;
							$tc['owner_price'] = round($v['owner_percent']/100*$product_price,2);
							$tc['rl_price'] = $tc['owner_price']-$tc['rl_price'];
						}
						M("sales_item")->add($tc);
						unset($tc);
					}
				}
			}
			
			//获取人员列表，提醒审核人员做审核操作
			$check_send = M('config')->where('name="check_send"')->getField('value');
			$check_send_list = explode(',',$check_send);
			foreach($check_send_list as $v){
				$telphone = M('user')->where("user_id=$v")->getField('telephone');
				$content = "禹酒CRM系统有新的销售单需要您审核,销售单号为：$sn_code[sn_code]";
				//send_sms($telphone,$content);
			}

			alert('success',L('ADD_SUCCESS'),U('sales/m_index'));
		}else{
			$warehouse_list = $this->warehouse->order('id desc')->select();
			$this->assign('warehouse_list',$warehouse_list);
			$this->display();
		}
	}

	public function check(){
		if($id = intval($_GET['id'])){
			$data['check_status'] = 1;
			$data['check_user_id'] = session('user_id');
			if(!$this->sales->where("id=$id")->save($data)) alert('error',L('OPERATION_FAILED'),U('sales/index'));
			//获取人员列表，提醒出库人员做出库操作
			$outorder_send = M('config')->where('name="outorder_send"')->getField('value');
			$outorder_send_list = explode(',',$outorder_send);
			$sn_code = $this->sales->where("id=$id")->getField('sn_code');
			foreach($outorder_send_list as $v){
				$telphone = M('user')->where("user_id=$v")->getField('telephone');
				$content = "禹酒CRM系统有新的销售单需要您出库,销售单号为：$sn_code";
				//send_sms($telphone,$content);
			}

			alert('success',L('SUCCESSFUL_OPERATION'),U('sales/index'));
		}else{
			alert('error',L('OPERATION_FAILED'),U('sales/index'));
		}
	}

	public function removecheck(){
		if($id = intval($_GET['id'])){
			$data['check_status'] = 0;
			$data['check_user_id'] = session('user_id');
			$this->sales->where("id=$id")->save($data);
			alert('success',L('SUCCESSFUL_OPERATION'),U('sales/index'));
		}else{
			alert('error',L('OPERATION_FAILED'),U('sales/index'));
		}
	}

	//销售单修改操作
	public function edit(){
		if(C('ismobile')) $this->redirect('sales/m_edit');
		if($this->isPost() && isset($_POST['id'])){
			if(!$id = intval($_POST['id'])) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			//基本数据
			$base = $_POST['base'];
			$base['sales_time'] = $_POST['sales_time']?strtotime($_POST['sales_time']):time();
			$base['update_time'] = time();
			$base['sales_price'] = $base['other_expenses'];

			//处理商品数据
			if($_POST['sales']['product']){
				foreach($_POST['sales']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price'] && $v['prime_price']){
						$base['sales_price'] += $v['prime_price'];
						$base['sales_count'] += $v['amount'];
						if(!$v['pack']){
							$product_price += $v['amount']*$v['unit_price'];
							$rl_price += $v['amount']*$v['unit_price']*($v['discount_rate']/100);
						}
					}else{
						unset($_POST['sales']['product'][$k]);
					}
				}
				if(!empty($_POST['sales']['product'])) $base['product'] = array2string($_POST['sales']['product'],'0');
			}

			//处理赠品数据
			if($_POST['sales']['zp']){
				foreach($_POST['sales']['zp'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount']){
						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['zp'][$k]);
					}
				}
				if(!empty($_POST['sales']['zp'])) $base['present'] = array2string($_POST['sales']['zp'],'0');
			}
			//if($base['team_percent']) echo $base['team_percent'];

			if($base['type']==0){
				/*判断库存是否足够 begin*/
				$item = $merge_product = array();
				$n = $m = 0;
				//存放商品信息到临时数组
				if($product = string2array($base['product'])){
					foreach($product as $v){
						$item[$n]['product_id'] = $v['product_id'];
						$item[$n]['warehouse_id'] = $v['warehouse_id'];
						$item[$n]['amount'] = $v['amount'];
						$item[$n]['pack'] = $v['pack'];
						$n++;
					}
				}
				//存放赠品信息到临时数组
				if($present = string2array($base['present'])){
					foreach($present as $v){
						//计算赠品总额
						$present_price += $v['all_price'];

						$item[$n]['product_id'] = $v['product_id'];
						$item[$n]['warehouse_id'] = $v['warehouse_id'];
						$item[$n]['amount'] = $v['amount'];
						$n++;
					}
				}
				//合并统计相同产品，相同仓库的产品的数量
				$num = count($item);
				foreach($item as $k=>$v){
					if(!empty($item[$k])){
						$merge_product[$k] = $item[$k];
						for($i=1;$i<($num-$k);$i++){
							if($item[$k]['product_id']==$item[($k+$i)]['product_id'] && $item[$k]['warehouse_id']==$item[($k+$i)]['warehouse_id']){
								$merge_product[$k]['amount'] += $item[($k+$i)]['amount'];
								$item[($k+$i)] = '';
							}
						}
					}
				}

				foreach($merge_product as $v){
					//判断库存是否有产品
					$where['product_id'] = array('eq',$v['product_id']);
					$where['warehouse_id'] = array('eq',$v['warehouse_id']);
					$where['amounts'] = array('egt',$v['amount']);
					if(!M('stock')->where($where)->find()){
						$warehouse_name = $this->warehouse->where("id=$v[warehouse_id]")->getField('name');
						$product_name = M('product')->where("product_id=$v[product_id]")->getField('name');
						$error .= " $product_name(产品) 在 $warehouse_name(仓库) 库存不足 <br/>";
					}
				}
				if($error) $this->error($error,'',10);
				/*判断库存是否足够 end*/
			}
			


			//保存销售单信息到数据库
			if(!$this->sales->where("id=$id")->save($base)) alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);

			//处理并保存提成信息
			if($_POST['sales']['tc']){
				//清空原有的提成信息
				M("sales_item")->where("sales_id=$id")->delete();
				foreach($_POST['sales']['tc'] as $v){
					//没有相关数据则销毁数组
					if($v['user_id'] && $v['owner_percent']){
						//判断组长是谁
						if($_POST['sales']['is_lead']==$v['user_id']){
							$tc['is_lead'] = 1;
						}
						$tc['owner_percent'] = $v['owner_percent'];
						$tc['user_id'] = $v['user_id'];
						$tc['sales_time'] = $base['sales_time'];
						$tc['sales_id'] = $id;
						//计算每个人的提成金额,分为有团队比例和无团队比例两种
						if($base['team_percent']){
							$tc['rl_price'] = round($v['owner_percent']/100*$rl_price,2);
							$tc['owner_price'] = round($base['team_percent'] * $v['owner_percent']/10000*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}else{
							$tc['rl_price'] = $rl_price;
							$tc['owner_price'] = round($v['owner_percent']/100*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}
						M("sales_item")->add($tc);
						unset($tc);
					}
				}
			}
			alert('success','修改成功',U('sales/index'));
		}elseif($this->isGet() && isset($_GET['id'])){
			if(!$id = intval($_GET['id'])) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			//根据销售单id获取信息
			$assign['info'] = $this->sales->where("id=$id")->find();
			$assign['info_item'] = $this->sales_item->where("sales_id=$id")->select();
			//获取审核人
			$user_id = $assign['info']['check_user_id'];
			$sale_user_id = $assign['info']['sale_user_id'];
			$assign['info']['check_name'] = M('user')->where("user_id=$user_id")->getField('name');
			$assign['info']['sale_name'] = M('user')->where("user_id=$sale_user_id")->getField('name');
			//提取处理商品信息
			if($assign['info']['product']){
				$assign['product'] = string2array($assign['info']['product']);
				foreach($assign['product'] as $k=>$v){
					$assign['product'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				}
			}
			//提取处理赠品信息
			if($assign['info']['present']){
				$assign['present'] = string2array($assign['info']['present']);
				foreach($assign['present'] as $k=>$v){
					$assign['present'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				}
			}
			
			foreach($assign['info_item'] as $k=>$v){
				$assign['info_item'][$k]['user_name'] = getUserNameByRoleId($v['user_id']);
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
			$assign['warehouse_list'] = $this->warehouse->order('id desc')->select();

			$this->assign('assign',$assign);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//销售单修改操作
	public function m_edit(){
		if($id = intval($_POST['id'])){
			//基本数据
			$base = $_POST['base'];
			$base['sales_time'] = $_POST['sales_time']?strtotime($_POST['sales_time']):time();
			$base['update_time'] = time();
			$base['sales_price'] = $base['other_expenses'];

			//处理商品数据
			if($_POST['sales']['product']){
				foreach($_POST['sales']['product'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount'] && $v['unit_price']){
						$_POST['sales']['product'][$k]['prime_price'] = $v['unit_price']*$v['amount'];
						$_POST['sales']['product'][$k]['product_standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');
						$_POST['sales']['product'][$k]['tax_rate'] = 0;
						$_POST['sales']['product'][$k]['description'] = '';
						if(!$v['discount_rate']) $v['discount_rate'] = 0;

						$base['sales_price'] += $_POST['sales']['product'][$k]['prime_price'];
						$base['sales_count'] += $v['amount'];
						if(!$v['pack']){
							$product_price += $v['amount']*$v['unit_price'];
							$rl_price += $v['amount']*$v['unit_price']*($v['discount_rate']/100);
						}
					}else{
						unset($_POST['sales']['product'][$k]);
					}
				}
				if(!empty($_POST['sales']['product'])) $base['product'] = array2string($_POST['sales']['product'],'0');
			}

			//处理赠品数据
			if($_POST['sales']['present']){
				foreach($_POST['sales']['present'] as $k=>$v){
					//没有相关数据则销毁数组
					if($v['product_id'] && $v['amount']){
						$_POST['sales']['present'][$k]['all_price'] = $v['price']*$v['amount'];
						$_POST['sales']['present'][$k]['standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');

						$base['sales_count'] += $v['amount'];
					}else{
						unset($_POST['sales']['present'][$k]);
					}
				}
				if(!empty($_POST['sales']['present'])) $base['present'] = array2string($_POST['sales']['present'],'0');
			}
			//保存销售单信息到数据库
			if(!$this->sales->where("id=$id")->save($base)) alert('error','保存成功',$_SERVER['HTTP_REFERER']);

			//处理并保存提成信息
			if($_POST['sales']['tc']){
				//清空原有的提成信息
				M("sales_item")->where("sales_id=$id")->delete();
				foreach($_POST['sales']['tc'] as $v){
					//没有相关数据则销毁数组
					if($v['user_id'] && $v['owner_percent']){
						//判断组长是谁
						if($_POST['sales']['is_lead']==$v['user_id']){
							$tc['is_lead'] = 1;
						}
						$tc['owner_percent'] = $v['owner_percent'];
						$tc['user_id'] = $v['user_id'];
						$tc['sales_time'] = $base['sales_time'];
						$tc['sales_id'] = $id;
						//计算每个人的提成金额,分为有团队比例和无团队比例两种
						if($base['team_percent']){
							$tc['rl_price'] = round($v['owner_percent']/100*$rl_price,2);
							$tc['owner_price'] = round($base['team_percent'] * $v['owner_percent']/10000*$product_price,2);
							$tc['yt_price'] = $tc['owner_price']-$tc['rl_price'];
						}else{
							$tc['rl_price'] = $rl_price;
							$tc['owner_price'] = round($v['owner_percent']/100*$product_price,2);
							$tc['rl_price'] = $tc['owner_price']-$tc['rl_price'];
						}
						M("sales_item")->add($tc);
						unset($tc);
					}
				}
			}
			alert('success','保存成功',U('sales/index'));
		}elseif($id = intval($_GET['id'])){
			//根据销售单id获取信息
			$assign['info'] = $this->sales->where("id=$id")->find();
			$assign['info_item'] = $this->sales_item->where("sales_id=$id")->select();
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
			//提取处理赠品信息
			if($assign['info']['present']){
				$assign['present'] = string2array($assign['info']['present']);
				foreach($assign['present'] as $k=>$v){
					$assign['present'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				}
			}
			
			foreach($assign['info_item'] as $k=>$v){
				$assign['info_item'][$k]['user_name'] = getUserNameByRoleId($v['user_id']);
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
			$assign['warehouse_list'] = $this->warehouse->order('id desc')->select();

			$this->assign('assign',$assign);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//删除销售单操作
	public function delete(){
		if($this->isPost() && isset($_POST['ids'])){
			$ids = array_filter($this->_post('ids'),'intval');
			if(!$ids) alert('error',L('DELETE FAILED CONTACT THE ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
			foreach($ids as $v){
				//判断是否出入库，出入库状态无法删除
				$data = $this->sales->where("id=$v")->find();
				if($data['status']){
					$str .= $data['sn_code'].',';
				}else{
					$this->sales->where("id=$v")->delete();
					$this->sales_item->where("sales_id=$v")->delete();
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
			$data = $this->sales->where("id=$id")->find();
			if($data['status']){
				$str = '单号为 '.$data['sn_code'].' 的单据已完成(出入库)，无法删除！';
				alert('error',$str,$_SERVER['HTTP_REFERER']);
			}else{
				$this->sales->where("id=$id")->delete();
				$this->sales_item->where("sales_id=$id")->delete();
			}
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function inorder(){
		if($id = intval($_GET['id'])){
			$stock = M('stock');
			$info = $this->sales->where("id=$id")->find();
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
			$pay['name'] = $info['subject'].' - '.$info['customer_name'];
			$pay['price'] = $info['sales_price'];
			$pay['creator_role_id'] = 1;
			$pay['owner_role_id'] = $info['create_user_id'];
			$pay['description'] = $info['description'];
			$pay['pay_time'] = time();
			$pay['create_time'] = time();
			$pay['status'] = 0;
			$pay['update_time'] = time();
			$pay['type'] = 1;
			$pay['bill_id'] = $info['id'];
			M('payables')->add($pay);

			$this->sales->where("id=$id")->setField('status','1');
			alert('success',L('SUCCESSFUL_OPERATION'),U('stock/inoutorder'));
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function outorder(){
		if(isset($_GET['id']) && $_GET['id']){
			if(!$id = intval($_GET['id'])) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
			$info = $this->sales->where("id=$id")->find();
			
			$item = $merge_product = array();
			$n = $m = 0;
			//存放商品信息到临时数组
			if($product = string2array($info['product'])){
				foreach($product as $v){
					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$item[$n]['pack'] = $v['pack'];
					$n++;
				}
			}
			//存放赠品信息到临时数组
			if($present = string2array($info['present'])){
				foreach($present as $v){
					//计算赠品总额
					$present_price += $v['all_price'];

					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$n++;
				}
			}
			//合并统计相同产品，相同仓库的产品的数量
			$num = count($item);
			foreach($item as $k=>$v){
				if(!empty($item[$k])){
					$merge_product[$k] = $item[$k];
					for($i=1;$i<($num-$k);$i++){
						if($item[$k]['product_id']==$item[($k+$i)]['product_id'] && $item[$k]['warehouse_id']==$item[($k+$i)]['warehouse_id']){
							$merge_product[$k]['amount'] += $item[($k+$i)]['amount'];
							$item[($k+$i)] = '';
						}
					}
				}
			}

			foreach($merge_product as $v){
				//判断库存是否有产品
				$where['product_id'] = array('eq',$v['product_id']);
				$where['warehouse_id'] = array('eq',$v['warehouse_id']);
				$where['amounts'] = array('egt',$v['amount']);
				if(!M('stock')->where($where)->find()){
					$warehouse_name = $this->warehouse->where("id=$v[warehouse_id]")->getField('name');
					$product_name = M('product')->where("product_id=$v[product_id]")->getField('name');
					$error .= " $product_name(产品) 在 $warehouse_name(仓库) 库存不足 ";
				}
			}
			if($error){
				alert('error',$error.' 出库操作失败！',U('stock/inoutorder'));
			}else{
				foreach($merge_product as $i){
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


					//存酒类型
					if($info['category']){
						//存酒不能为包装
						if(!$is_pack = M('product')->where("product_id=$i[product_id]")->getField('is_pack')){
							if(M('prestore')->where("customer_id=$info[customer_id] and product_id=$i[product_id]")->find()){
								M('prestore')->where("customer_id=$info[customer_id] and product_id=$i[product_id]")->setInc('count',$v['amount']);
								M('prestore')->where("customer_id=$info[customer_id] and product_id=$i[product_id]")->setInc('surplus_count',$v['amount']);
							}else{
								$cat_data['customer_id'] = $info['customer_id'];
								$cat_data['customer_name'] = $info['customer_name'];
								$cat_data['product_id'] = $i['product_id'];
								$cat_data['product_name'] = M('product')->where("product_id=$i[product_id]")->getField('name');
								$cat_data['surplus_count'] = $i['amount'];
								$cat_data['count'] = $i['amount'];
								$cat_data['time'] = time();
								M('prestore')->add($cat_data);
							}
						}
					}
				}
				
				//记录数据到奖金池
				$bonus_pool = M('config') -> where('name="bonus_pool"')->getField('value');
				$bonus['sales_id'] = $info['id'];
				$bonus['bonus'] = $info['sales_price']*$bonus_pool/100;
				$bonus['time'] = $info['create_time'];
				$bonus['user_id'] = $info['create_user_id'];
				M('bonus_pool')->add($bonus);
				//自动添加财务信息（商品和赠品）
            
                if($info['sales_price'] && $info['sales_price']!='0.00'){
					$rec['name'] = $info['subject'].' - '.$info['customer_name'];
					$rec['price'] = $info['sales_price'];
					$rec['creator_role_id'] = 1;
					$rec['owner_role_id'] = $info['create_user_id'];
					$rec['description'] = $info['description'];
					$rec['pay_time'] = time();
					$rec['create_time'] = time();
					$rec['status'] = 0;
					$rec['update_time'] = time();
					$rec['type'] = 0;
					$rec['bill_id'] = $info['id'];
					M('receivables')->add($rec);
				}

				if($present_price){
					$pre['name'] = '赠送 - '.$info['customer_name'];
					$pre['price'] = $present_price;
					$pre['sales_id'] = $info['id'];
					$pre['create_time'] = time();
					M('finance_present')->add($pre);
				}

				
			}
			$this->sales->where("id=$id")->setField('status','1');
			alert('success',L('SUCCESSFUL_OPERATION'),U('stock/inoutorder'));
		}else{
			alert('error',L('PARAMETER_ERROR'),U('stock/inoutorder'));
		}
	}

	public function view(){
		if(!$id = intval($_GET['id'])) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		//根据销售单id获取信息
		$assign['info'] = $this->sales->where("id=$id")->find();
		
		//print_r($assign['info']);exit;
		$assign['info_item'] = $this->sales_item->where("sales_id=$id")->select();
		//获取销售员名称
		$sale_user_id=$assign['info']['sale_user_id'];
		$assign['info']['name']=M('user')->where("role_id=$sale_user_id")->getField('name');
       
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
		//提取处理赠品信息
		if($assign['info']['present']){
			$assign['present'] = string2array($assign['info']['present']);
			foreach($assign['present'] as $k=>$v){
				$assign['present'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
			}
		}
		
		foreach($assign['info_item'] as $k=>$v){
			$assign['info_item'][$k]['user_name'] = getUserNameByRoleId($v['user_id']);
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
		//echo $assign['img'];exit;
		//仓库列表
		$assign['warehouse_list'] = $this->warehouse->order('id desc')->select();

		$this->assign('assign',$assign);
		if($assign['info']['type']){
			$this->display('view_return');
		}else{
			$this->display();
		}
	}

	public function advance(){
		if($this->isPost() && isset($_POST['id'])){
			$id = $this->_post('id','intval');
			if(!$id) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			$data['receipt_progress'] = $this->_post('receipt_progress','intval');
			$r = $this->sales->where("id=$id")->save($data);
			if($r){
				alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
			}else{
				alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			}
		}elseif($this->isGet() && isset($_GET['id'])){
			$id = $this->_get('id','intval');
			if(!$id) alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
			$info = $this->sales->where("id=$id")->getField('receipt_progress');
			$this->assign('data',$info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function delivery(){

		if ($_REQUEST["field"]) {
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
		}
		$where['type'] = array('eq','0');
		$where['status'] = array('eq','1');
		$where['category'] = array('eq','0');

		import("@.ORG.Page");
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$list = $this->sales->where($where)->order("id desc")->page($p.',15')->select();
		$count = $this->sales->where($where)->count();
		$Page = new Page($count,15);
		$Page->parameter = implode('&', $params);
		$this->assign('page',$Page->show());

		$Model = new Model();
		foreach($list as $k=>$v){
			//客户联系方式
			$sql = "SELECT a.telephone FROM ".C('DB_PREFIX')."contacts AS a,".C('DB_PREFIX')."customer AS b WHERE b.customer_id=".$v['customer_id']." AND b.contacts_id=a.contacts_id";
			$re = $Model->query($sql);
			$list[$k]['telephone'] = $re['0']['telephone'];
		}

		$assign['active'] = 'sales/delivery';
		$this->assign('assign',$assign);

		$this->alert = parseAlert();
		$this->assign('list',$list);
		$this->display();
	}

	public function m_delivery(){
		$Model = new Model();
		if($this->isAjax()){
			import("@.ORG.Page");

			$where['type'] = array('eq','0');
			$where['status'] = array('eq','1');
			$where['category'] = array('eq','0');

			$p = !$_REQUEST['p']||$_REQUEST['p']<=0 ? 1 : intval($_REQUEST['p']);
			$list = M('sales')->where($where)->order("delivery_status asc,id desc")->page($p.',10')->select();

			foreach($list as $k=>$v){
				if($v['delivery_status']==0){
					$list[$k]['delivery_status'] = '待送货';
				}elseif($v['delivery_status']==1){
					$list[$k]['delivery_status'] = '送货途中';
				}elseif($v['delivery_status']==2){
					$list[$k]['delivery_status'] = '已送达';
				}

				//客户联系方式
				$sql = "SELECT a.telephone FROM ".C('DB_PREFIX')."contacts AS a,".C('DB_PREFIX')."customer AS b WHERE b.customer_id=".$v['customer_id']." AND b.contacts_id=a.contacts_id";
				$re = $Model->query($sql);
				$list[$k]['telephone'] = $re['0']['telephone'];
			}

			$data['list'] = $list;
			$data['nextp'] = $p+1;
			$this->ajaxReturn($data,"",1);
		}else{
			$where['type'] = array('eq','0');
			$where['status'] = array('eq','1');
			$where['category'] = array('eq','0');

			$list = $this->sales->where($where)->order("delivery_status asc,id desc")->limit('10')->select();
			$count = $this->sales->where($where)->count();

			foreach($list as $k=>$v){
				//客户联系方式
				$sql = "SELECT a.telephone FROM ".C('DB_PREFIX')."contacts AS a,".C('DB_PREFIX')."customer AS b WHERE b.customer_id=".$v['customer_id']." AND b.contacts_id=a.contacts_id";
				$re = $Model->query($sql);
				$list[$k]['telephone'] = $re['0']['telephone'];
			}
			$this->alert = parseAlert();
			$this->assign('list',$list);
			$this->assign('count',$count);
			$this->display();
		}
	}

	public function product_list(){
		if($id = intval($_GET['id'])){
			$info = $this->sales->where("id=$id")->find();
			$item = $merge_product = array();
			$n = 0;
			//存放商品信息到临时数组
			if($product = string2array($info['product'])){
				foreach($product as $v){
					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$item[$n]['pack'] = $v['pack'];
					$n++;
				}
			}
			//存放赠品信息到临时数组
			if($present = string2array($info['present'])){
				foreach($present as $v){
					//计算赠品总额
					$present_price += $v['all_price'];

					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$n++;
				}
			}
			//合并统计相同产品，相同仓库的产品的数量
			$num = count($item);
			foreach($item as $k=>$v){
				if(!empty($item[$k])){
					$merge_product[$k] = $item[$k];
					for($i=1;$i<($num-$k);$i++){
						if($item[$k]['product_id']==$item[($k+$i)]['product_id'] && $item[$k]['warehouse_id']==$item[($k+$i)]['warehouse_id']){
							$merge_product[$k]['amount'] += $item[($k+$i)]['amount'];
							$item[($k+$i)] = '';
						}
					}
				}
			}

			foreach($merge_product as $k=>$v){
				$merge_product[$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				$merge_product[$k]['product_standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');
			}
			$this->assign('list',$merge_product);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function delivery_status(){
		if($id = intval($_POST['id'])){
			$data['delivery_status'] = $this->_post('delivery_status','intval');
			if(!$this->sales->where("id=$id")->save($data)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$info = $this->sales->where("id=$id")->getField('delivery_status');
			$this->assign('data',$info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function m_delivery_status(){
		$Model = new Model();
		if($id = intval($_GET['id'])){
			$info = $this->sales->where("id=$id")->find();

			//客户联系方式
			$sql = "SELECT a.telephone FROM ".C('DB_PREFIX')."contacts AS a,".C('DB_PREFIX')."customer AS b WHERE b.customer_id=".$info['customer_id']." AND b.contacts_id=a.contacts_id";
			$re = $Model->query($sql);
			$info['telephone'] = $re['0']['telephone'];

			$item = $merge_product = array();
			$n = 0;
			//存放商品信息到临时数组
			if($product = string2array($info['product'])){
				foreach($product as $v){
					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$item[$n]['pack'] = $v['pack'];
					$n++;
				}
			}
			//存放赠品信息到临时数组
			if($present = string2array($info['present'])){
				foreach($present as $v){
					$item[$n]['product_id'] = $v['product_id'];
					$item[$n]['warehouse_id'] = $v['warehouse_id'];
					$item[$n]['amount'] = $v['amount'];
					$n++;
				}
			}
			//合并统计相同产品，相同仓库的产品的数量
			$num = count($item);
			foreach($item as $k=>$v){
				if(!empty($item[$k])){
					$merge_product[$k] = $item[$k];
					for($i=1;$i<($num-$k);$i++){
						if($item[$k]['product_id']==$item[($k+$i)]['product_id'] && $item[$k]['warehouse_id']==$item[($k+$i)]['warehouse_id']){
							$merge_product[$k]['amount'] += $item[($k+$i)]['amount'];
							$item[($k+$i)] = '';
						}
					}
				}
			}

			foreach($merge_product as $k=>$v){
				$merge_product[$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
				$merge_product[$k]['product_standard'] = M('product')->where("product_id=$v[product_id]")->getField('standard');
				$merge_product[$k]['warehouse'] = M('warehouse')->where("id=$v[warehouse_id]")->getField('name');
			}
			$this->assign('product_list',$merge_product);
			
			if($info['delivery_contact']){
				if(strpos($info['delivery_contact'],'-')){
					$data = explode('-',$info['delivery_contact']);
					$info['name'] = $data['0'];
					$info['tel'] = $data['1'];
				}else{
					$info['number'] = $info['delivery_contact'];
				}
			}

			$this->assign('info',$info);
			$this->display();
		}elseif($id = intval($_POST['id'])){
			$name =  $this->_post('name','trim,strip_tags,htmlspecialchars');
			$tel =  $this->_post('tel','trim,strip_tags,htmlspecialchars');
			$number =  $this->_post('number','trim,strip_tags,htmlspecialchars');
			$data['delivery_status'] = $this->_post('delivery_status','intval');
			if($number){
				$data['delivery_contact'] = $number;
			}elseif($name && $tel){
				$data['delivery_contact'] = $name.'-'.$tel;
			}
			if(!$this->sales->where("id=$id")->save($data)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('OPERATION_FAILED'),U('sales/delivery'));
		}
	}

	public function delivery_contact(){
		if($id = intval($_POST['id'])){
			$name =  $this->_post('name','trim,strip_tags,htmlspecialchars');
			$tel =  $this->_post('tel','trim,strip_tags,htmlspecialchars');
			$number =  $this->_post('number','trim,strip_tags,htmlspecialchars');
			if($number){
				$data['delivery_contact'] = $number;
				$this->sales->where("id=$id")->save($data);
			}elseif($name && $tel){
				$data['delivery_contact'] = $name.'-'.$tel;
				$this->sales->where("id=$id")->save($data);
			}else{
				alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
			}
			alert('success','添加成功',$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$data = $this->sales->where("id=$id")->getField('delivery_contact');
			if($data){
				if(strpos($data,'-')){
					$list = explode('-',$data);
					$info['name'] = $list['0'];
					$info['tel'] = $list['1'];
				}else{
					$info['number'] = $data;
				}
			}
			$this->assign('info',$info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function bonus_pool(){
		import("@.ORG.Page");
		$p = isset($_GET['p'])?intval($_GET['p']):1;

		$assign['list'] = M('bonus_pool')->where($where)->page($p.',15')->select();
		foreach($assign['list'] as $k=>$v){
			$assign['list'][$k]['sn_code'] = $this->sales->where("id=$v[sales_id]")->getField('sn_code');
		}
		$count = M('bonus_pool')->where($where)->count();
		$Page = new Page($count,15);
		$Page->parameter = implode('&', $params);
		$assign['page'] = $Page->show();

		$assign['active'] = 'sales/bonus_pool';
		$this->assign('assign',$assign);
		$this->display();
	}

	public function listDialog(){
		$m_sales = $this->sales;
		$m_customer = M('customer');
		$where['type'] = intval($_GET['type']);
		$where['check_status'] = 1;

		//权限管理,只能查看自己或自己下属的
		$below_ids = getSubRoleId(true);
		$where_role_id = array('in', implode(',', $below_ids));
		$where['create_user_id'] = $where_role_id;

		$list = $m_sales->where($where)->select();

		foreach($list as $k=>$v){
			$list[$k]['customer_name'] = $m_customer->where("customer_id=$v[customer_id]")->getField('name');
		}
		
		$this->list = $list;
		$count = $m_sales->where($where)->count();
		$this->total = $count%10 > 0 ? ceil($count/10) : $count/10;
		$this->count_num = $count;
		$this->display();
	}

	public function changeContent(){
		if($this->isAjax()){
			//权限管理,只能查看自己或自己下属的
			$below_ids = getSubRoleId(true);
			$where_role_id = array('in', implode(',', $below_ids));
			$where['create_user_id'] = $where_role_id;
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
			$list = $this->sales->where($where)->select();
			foreach($list as $k=>$v){
				$list[$k]['customer_name'] = M('customer')->where("customer_id=$v[customer_id]")->getField('name');
			}
			$count = $this->sales->where($where)->count();
			$data['list'] = $list;
			$data['p'] = $p;
			$data['count'] = $count;
			$data['total'] = $count%10 > 0 ? ceil($count/10) : $count/10;
			$this->ajaxReturn($data,"",1);
		}
	}


}