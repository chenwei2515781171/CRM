<?php 
/**
 * User Related
 * 用户相关模块
 *
 **/ 

class StockAction extends Action {
	
	public function _initialize(){
		$action = array(
			'permission'=>array(),
			'allow'=>array('out','in','outexcelExport','inexcelExport')
		);
		B('Authenticate', $action);
		$this->stock_item=M('stock_item');
		$this->user=M('user');
		$this->warehouse=M('warehouse');
		$this->product=M('product');
		$this->stock=M('stock');
		$this->sales=M('sales');
		$this->purchase=M('purchase');
	}

	public function index(){
		//仓库列表
		$warehouse_list = M('warehouse')->order('id desc')->select();
		$order = $this->_get('order','trim,strip_tags,htmlspecialchars','desc');

		if ($_REQUEST["field"]) {
			$where = array();
			$field = $this->_get('field','trim,strip_tags,htmlspecialchars');
			$search = $this->_get('search','trim,strip_tags,htmlspecialchars','');
			$condition = $this->_get('condition','trim,strip_tags,htmlspecialchars','');
			if($field == 'warehouse_id'){
				$where['warehouse_id'] = array('eq',intval($search));
			}
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
		$where['amounts'] = array('neq','0');
		import("@.ORG.Page");
		$stock = M('stock');
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$list = $stock->where($where)->order($order_str)->page($p.',15')->select();
		//取得产品名称和仓库名称
		foreach($list as $k=>$v){
			$list[$k]['warehouse_name'] = M('warehouse')->where("id=$v[warehouse_id]")->getField('name');
			$list[$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
		}
		$count = $stock->where($where)->count();
		$Page = new Page($count,15);

		$Page->parameter = implode('&', $params);
		$this->assign('page',$Page->show());
		$this->alert = parseAlert();//提示栏
		$this->assign('order',$order);
		$this->assign('list',$list);
		$this->assign('warehouse_list',$warehouse_list);

		$assign['active'] = 'index';
		$this->assign('assign',$assign);
		$this->display();
	}

	public function view(){
		if($_GET['id']){
			$id = $this->_get('id','intval','');
			$info = M('stock')->where("id=$id")->find();
			$info['warehouse_name'] = M('warehouse')->where("id=$info[warehouse_id]")->getField('name');
			$data = M('product')->where("product_id=$info[product_id]")->find();
			$info['product_name'] = $data['name'];
			$info['product_standard'] = $data['standard'];
			$info['product_category'] = M('product_category')->where("category_id=$data[category_id]")->getField('name');
			$this->assign('info',$info);
			$this->display();
		}else{
			$this->error(L('NOT_FIND_THE_RESULTS_YOU_WANT'), $_SERVER['HTTP_REFERER'],1);
		}
	}

	public function out(){
		$params = array();
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		//产品列表
		$productlist=$this->product->field('product_id,name')->select();
		$this->assign('productlist',$productlist);
		//仓库列表
		$warehouselist=$this->warehouse->field('id,name')->select();
		$this->assign('warehouselist',$warehouselist);
		//产品搜索
        if(isset($_GET['product'])){
        	if(intval($_GET['product'])!='all'){
        		$where['product_id']=intval($_GET['product']);
        	}
        }
		//仓库搜索
         if(isset($_GET['warehouse'])){
        	if(intval($_GET['warehouse'])!='all'){
        		$where['warehouse_id']=intval($_GET['warehouse']);
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
        $where['type']=0;
        if(trim($_GET['act']) == 'outexcel'){
		$list = $this->stock_item->Distinct(true)->where($where)->field('product_id')->select();
		}
		else{
		$list = $this->stock_item->Distinct(true)->where($where)->field('product_id')->page($p.',10')->select();
		}
		
		$count = $this->stock_item->Distinct(true)->where($where)->field('product_id')->select();
		$count = count($count);
		$i=0;
		foreach($list as $k=>$v){
			$where['product_id']=$v['product_id'];
			$info = $this->stock_item->where($where)->field('product_id,bill_id,num,warehouse_id,create_time')->select();
			$list[$i]['count'] =$this->stock_item->where($where)->count();
			foreach($info as $kk=>$vv){
				$prod_info = $this->product->where("product_id=$vv[product_id]")->find();
				$info[$kk]['suggested_price'] = $prod_info['suggested_price'];
				$bill_info = $this->sales->where("id=$vv[bill_id]")->find();
				$info[$kk]['sn_code'] = $bill_info['sn_code'];
				$info[$kk]['create_time'] = $vv['create_time'];
				$info[$kk]['num'] = $vv['num'];
				$info[$kk]['create_user_name'] = $this->user->where("role_id=$bill_info[sale_user_id]")->getfield('name');
				$info[$kk]['warehouse_name'] =$this->warehouse->where("$vv[warehouse_id]")->getfield('name');
				$info[$kk]['total'] = $vv['num']*$prod_info['suggested_price'];
			    $list[$k]['num_all']+=$vv['num'];
			    $list[$k]['total_all']+= $vv['num']*$prod_info['suggested_price'];
			    $all['total_price']+=$info[$kk]['total'];

			    }
			$list[$k]['stock_num']=$this->stock->where("product_id=$vv[product_id]")->getfield('amounts');
			$list[$k]['product_name'] = $this->product->where("product_id=$v[product_id]")->getField('name');
			$list[$k]['data'] = $info;
			$i++;
		}

		//分页
		import("@.ORG.Page");
		$Page = new Page($count,10);
		$params[] = 'product='.trim($_GET['product']);
		$params[] = 'warehouse='.trim($_GET['warehouse']);
		$params[] = "start_time=".trim($_GET['start_time']);
		$params[] = "end_time=".trim($_GET['end_time']);
		$Page->parameter = implode('&', $params);
		$this->page = $Page->show();
        
		if(trim($_GET['act']) == 'outexcel'){
			//print_r($list);exit;
			/*if(vali_permission('stock', 'export')){*/
				if($list && $all){
					$this->outexcelExport($list,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			/*}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}*/
		}else{
		//print_r($list);exit;
        $this->assign('data',$list);
        $this->assign('all',$all);
		$this->display();
		}
	}
        //$this->assign('data',$list);
        //$this->assign('all',$all);
		//$this->display();

	//}
	public function outexcelExport($list=false,$all=false){
		C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Outstock");    
		$objProps->setSubject("lxcrm Outstock Data");    
		$objProps->setDescription("lxcrm Outstock Data");    
		$objProps->setKeywords("lxcrm Outstock Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '产品名');
		$objActSheet->setCellValue('B1', '单号');
		$objActSheet->setCellValue('C1', '数量');
		$objActSheet->setCellValue('D1', '单价');
		$objActSheet->setCellValue('E1', '金额');	
		$objActSheet->setCellValue('F1', '仓库');
		$objActSheet->setCellValue('G1', '销售员');
        $objActSheet->setCellValue('H1', '时间');
   
	
		$i=2;
		foreach($list as $v){
			//echo $v['count'];exit;
			//print_r($list);exit;
			foreach($v['data'] as $k=>$d){
				//print_r($v['data']);exit;
				if($k==0){
					$objActSheet->setCellValue('A'.$i, $v['product_name']);
					$merge = 'A'.$i.':A'.($i+$v['count']-1);
					$objPHPExcel->getActiveSheet()->mergeCells($merge);
				}
				$objActSheet->setCellValue('B'.$i, $d['sn_code']);
				$objActSheet->setCellValue('C'.$i, $d['num']);
				$objActSheet->setCellValue('D'.$i, $d['suggested_price']);
				//print_r($d['total']);exit;
				$objActSheet->setCellValue('E'.$i, $d['total']);
				$objActSheet->setCellValue('F'.$i, $d['warehouse_name']);
				$objActSheet->setCellValue('G'.$i, $d['create_user_name']);
				$objActSheet->setCellValue('H'.$i, date('Y-m-d',$d['create_time']));
				$i++;
			}
		}
		ob_end_clean();
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
		
        header("Content-Disposition:attachment;filename=出库".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output'); 
        
	
   
	}
	public function in (){
		$params = array();
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		//产品列表
		$productlist=M('product')->field('product_id,name')->select();
		$this->assign('productlist',$productlist);
		//仓库列表
		$warehouselist=M('warehouse')->field('id,name')->select();
		$this->assign('warehouselist',$warehouselist);
		//供货公司列表
		$supplierlist=M('supplier')->field('id,name')->select();
		$this->assign('supplierlist',$supplierlist);
		//产品搜索
        if(isset($_GET['product'])){
        	if(intval($_GET['product'])!='all'){
        		$where['product_id']=intval($_GET['product']);
        	}
        }

		//仓库搜索
         if(isset($_GET['warehouse'])){
        	if(intval($_GET['warehouse'])!='all'){
        		$where['warehouse_id']=intval($_GET['warehouse']);
        	}
        }
         //供货公司搜索
          if(isset($_GET['supplier_name'])){
        	if(intval($_GET['supplier_name'])!='all'){
        		$gh['supplier_id']=intval($_GET['supplier_name']);
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
        $where['type']=1;
        if(trim($_GET['act']) == 'inexcel'){
		$list = $this->stock_item->Distinct(true)->where($where)->field('product_id')->select();
		}
		else{
		$list = $this->stock_item->Distinct(true)->where($where)->field('product_id')->page($p.',10')->select();
		}
		
        $count = $this->stock_item->Distinct(true)->where($where)->field('product_id')->select();
		$count = count($count);
		$i=0;
		foreach($list as $k=>$v){
            $where['product_id']=$v['product_id'];
			$info = $this->stock_item->where($where)->field('product_id,bill_id,num,warehouse_id,create_time')->select();
			$list[$i]['count'] =$this->stock_item->where($where)->count();
			foreach($info as $kk=>$vv){
				$prod_info = M('product')->where("product_id=$vv[product_id]")->find();
				$info[$kk]['suggested_price'] = $prod_info['suggested_price'];
				$info[$kk]['is_pack'] = $prod_info['is_pack'];
				$bill_info = M('purchase')->where("id=$vv[bill_id]")->find();
				$info[$kk]['sn_code'] = $bill_info['sn_code'];
				$info[$kk]['create_time'] = $vv['create_time'];
				$info[$kk]['supplier_name'] = $bill_info['supplier_name'];
				$info[$kk]['num'] = $vv['num'];
				$info[$kk]['check_user_name'] = $this->user->where("user_id=$bill_info[check_user_id]")->getfield('name');
				$info[$kk]['create_user_name'] = $this->user->where("role_id=$bill_info[create_user_id]")->getfield('name');
				$info[$kk]['warehouse_name'] = $this->warehouse->where("id=$vv[warehouse_id]")->getfield('name');
				$info[$kk]['total'] = $vv['num']*$prod_info['suggested_price'];
			    $list[$k]['num_all']+=$vv['num'];
			    $list[$k]['total_all']+= $vv['num']*$prod_info['suggested_price'];
			    $all['total_price']+=$info[$kk]['total'] ;
			    }
			$list[$k]['stock_num']=$this->stock->where("product_id=$vv[product_id]")->getfield('amounts');
			$list[$k]['product_name'] = $this->product->where("product_id=$v[product_id]")->getField('name');
			$list[$k]['data'] = $info;
			$i++;
		}

		//分页
		import("@.ORG.Page");
		$Page = new Page($count,10);
		$params[] = 'product='.trim($_GET['product']);
		$params[] = 'warehouse='.trim($_GET['warehouse']);
		$params[] = "start_time=".trim($_GET['start_time']);
		$params[] = "end_time=".trim($_GET['end_time']);
		$Page->parameter = implode('&', $params);
		$this->page = $Page->show();

		if(trim($_GET['act']) == 'inexcel'){
			//print_r($list);exit;
			/*if(vali_permission('stock', 'export')){*/
				if($list && $all){
					$this->inexcelExport($list,$all);
				}else{
					alert('error', '没有数据，无法导出', $_SERVER['HTTP_REFERER']);
				}
			/*}else{
				alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
			}*/
		}else{
		//print_r($list);exit;
        $this->assign('data',$list);
        $this->assign('all',$all);
		$this->display();
		}
	}
    public function inexcelExport($list=false,$all=false){
		C('OUTPUT_ENCODE', false);
		import("ORG.PHPExcel.PHPExcel");
		$objPHPExcel = new PHPExcel();    
		$objProps = $objPHPExcel->getProperties();    
		$objProps->setCreator("lxcrm");
		$objProps->setLastModifiedBy("lxcrm");    
		$objProps->setTitle("lxcrm Instock");    
		$objProps->setSubject("lxcrm Instock Data");    
		$objProps->setDescription("lxcrm Instock Data");    
		$objProps->setKeywords("lxcrm Instock Data");    
		$objProps->setCategory("lxcrm");
		$objPHPExcel->setActiveSheetIndex(0);     
		$objActSheet = $objPHPExcel->getActiveSheet(); 
		$objActSheet->setTitle('Sheet1');
		//设置表头
		$objActSheet->setCellValue('A1', '产品名');
		$objActSheet->setCellValue('B1', '采购单');
		$objActSheet->setCellValue('C1', '数量');
		$objActSheet->setCellValue('D1', '单价');
		$objActSheet->setCellValue('E1', '金额');
		$objActSheet->setCellValue('F1', '供货公司');
		$objActSheet->setCellValue('G1', '仓库');
		$objActSheet->setCellValue('H1', '采购人');
        $objActSheet->setCellValue('I1', '审核人');
        $objActSheet->setCellValue('J1', '日期');

	
		$i=2;
		foreach($list as $v){
			//echo $v['count'];exit;
			//print_r($list);exit;
			foreach($v['data'] as $k=>$d){
				//print_r($v['data']);exit;
				if($k==0){
					$objActSheet->setCellValue('A'.$i, $v['product_name']);
					$merge = 'A'.$i.':A'.($i+$v['count']-1);
					$objPHPExcel->getActiveSheet()->mergeCells($merge);
				}
				$objActSheet->setCellValue('B'.$i, $d['sn_code']);
				$objActSheet->setCellValue('C'.$i, $d['num']);
				$objActSheet->setCellValue('D'.$i, $d['suggested_price']);
				//print_r($d['total']);exit;
				$objActSheet->setCellValue('E'.$i, $d['total']);
				$objActSheet->setCellValue('F'.$i, $d['supplier_name']);
				$objActSheet->setCellValue('G'.$i, $d['warehouse_name']);
				$objActSheet->setCellValue('H'.$i, $d['create_user_name']);
				$objActSheet->setCellValue('I'.$i, $d['check_user_name']);
				$objActSheet->setCellValue('J'.$i, date('Y-m-d',$d['create_time']));
				$i++;
			}
		}
		ob_end_clean();
	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		header("Content-Type: application/vnd.ms-excel;");
		
        header("Content-Disposition:attachment;filename=入库".date('Y-m-d',mktime()).".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output'); 
        
	
   }
	public function inoutorder(){
		$assign['mode'] = $this->_get('mode','trim','s');
		$assign['stage'] = $this->_get('stage','trim','out');
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
		$sales = M('sales');
		$purchase = M('purchase');
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;

		$where['check_status'] = array('eq','1');
		if($assign['mode']=='s' && $assign['stage']=='in'){
			$assign['m'] = 'sales';
			$where['type'] = array('eq','1');
			$assign['list'] = $sales->where($where)->order("id desc")->page($p.','.C('PAGE_SIZE'))->select();
			$count = $sales->where($where)->count();
		}
		if($assign['mode']=='s' && $assign['stage']=='out'){
			$assign['m'] = 'sales';
			$where['type'] = array('eq','0');
			$assign['list'] = $sales->where($where)->order("id desc")->page($p.','.C('PAGE_SIZE'))->select();
			$count = $sales->where($where)->count();
		}
		if($assign['mode']=='p' && $assign['stage']=='in'){
			$assign['m'] = 'purchase';
			$where['type'] = array('eq','0');
			$assign['list'] = $purchase->where($where)->order("id desc")->page($p.','.C('PAGE_SIZE'))->select();
			$count = $purchase->where($where)->count();
		}
		if($assign['mode']=='p' && $assign['stage']=='out'){
			$assign['m'] = 'purchase';
			$where['type'] = array('eq','1');
			$assign['list'] = $purchase->where($where)->order("id desc")->page($p.','.C('PAGE_SIZE'))->select();
			$count = $purchase->where($where)->count();
		}
		foreach($assign['list'] as $k=>$v){
			$assign['list'][$k]['create_user_name'] = getUserNameByRoleId($v['create_user_id']);
		}
		$Page = new Page($count,C('PAGE_SIZE'));
		$Page->parameter = implode('&', $params);
		$assign['page'] = $Page->show();

		$assign['active'] = 'inoutorder';
		$this->assign('assign',$assign);
		$this->alert = parseAlert();
		$this->display();
	}

	//仓库列表页
	public function warehouse(){
		import('@.ORG.Page');
		$p = isset($_GET['p'])?intval($_GET['p']):1;
		$assign['warehouse_list'] = $this->warehouse->order('id desc')->Page($p.','.C('PAGE_SIZE'))->select();
		$count = $this->warehouse->count();
		$Page = new Page($count,C('PAGE_SIZE'));
		$assign['page'] = $Page->show();
		$assign['active'] = 'warehouse';
		$this->assign('assign',$assign);
		$this->alert = parseAlert();
		$this->display();
	}

	//删除仓库操作
	public function deleteWarehouse(){
		if($ids = array_filter($this->_post('ids'),'intval')){
			$where['id'] = array('in', implode(',', $ids));
			$this->warehouse->where($where)->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$this->warehouse->where("id=$id")->delete();
			alert('success',L('DELETED SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	//添加仓库操作
	public function addWarehouse(){
		if($this->isPost()){
			$base = $_POST['base'];
			if(!$base['name']) alert('error',L('NAME_CAN_NOT_EMPTY'),$_SERVER['HTTP_REFERER']);
			$base['create_time'] = time();
			if(!$this->warehouse->add($base)) alert('error',L('ADD_FAILED'),$_SERVER['HTTP_REFERER']);
			alert('success',L('ADD_SUCCESS'),$_SERVER['HTTP_REFERER']);
		}else{
			$this->display();
		}
	}

	//修改仓库操作
	public function editWarehouse(){
		if($id = intval($_POST['id'])){
			$base = $_POST['base'];
			if(!$base['name']) alert('error',L('NAME_CAN_NOT_EMPTY'),$_SERVER['HTTP_REFERER']);
			if(!$this->warehouse->where("id=$id")->save($base)) alert('error',L('EDIT_FAILED_CONTACT_THE_ADMIN'),$_SERVER['HTTP_REFERER']);
			alert('success',L('EDIT SUCCESSFULLY'),$_SERVER['HTTP_REFERER']);
		}elseif($id = intval($_GET['id'])){
			$info = $this->warehouse->where("id=$id")->find();
			$this->assign('data',$info);
			$this->display();
		}else{
			alert('error',L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
	}

	public function inout(){
		$list = M('stock_item')->Distinct(true)->field('product_id')->select();
		foreach($list as $k=>$v){
			$data[$k]['product_id'] = $v['product_id'];
			$data[$k]['in'] = M('stock_item')->where(array('type'=>'1','product_id'=>$v[product_id]))->sum('num');
			$data[$k]['out'] = M('stock_item')->where(array('type'=>'0','product_id'=>$v[product_id]))->sum('num');
			$data[$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
		}
		$this->assign('data',$data);
		$this->display();
	}

	//打印预览功能
	public function printHtml(){
		$arr = array("0"=>"零","1"=>"壹","2"=>"贰","3"=>"叁","4"=>"肆","5"=>"伍","6"=>"陆","7"=>"柒","8"=>"捌","9"=>"玖");
		$type = intval($_GET['type'])?intval($_GET['type']):'';
		$id = intval($_GET['id'])?intval($_GET['id']):'';

		if($type && $id){
			if($type==1){
				//销售出库
				$data = M('sales')->where("id=$id")->find();

				$Model = new Model();
				$bumen = $Model->query("select c.name from ".C('DB_PREFIX')."role as a, ".C('DB_PREFIX')."position as b, ".C('DB_PREFIX')."role_department as c where a.position_id=b.position_id and b.department_id=c.department_id and a.role_id=$data[create_user_id]");
				$contacts = $Model->query("select b.name,b.telephone from ".C('DB_PREFIX')."customer as a, ".C('DB_PREFIX')."contacts as b where a.contacts_id=b.contacts_id and customer_id=$data[customer_id]");

				$info['bumen'] = $bumen['0']['name'];
				$info['subject'] = $data['subject'];
				$info['name']=M('user')->where("role_id=$data[sale_user_id]")->getField('name');
				$info['time'] = date('Y-m-d',time());
				$info['sncode']= $data['sn_code'];
				$info['customer'] = M('customer')->where("customer_id=$data[customer_id]")->getField('name');
				$info['ctype'] = M('customer')->where("customer_id=$data[customer_id]")->getField('ctype');
				$info['contacts'] = $contacts['0']['name'];
				$info['telephone'] = $contacts['0']['telephone'];
				$info['address'] = $data['address'];
				$curren_user_id = session('user_id');
				$info['cname'] = M('user')->where("user_id=$curren_user_id")->getField('name');

				//获取付款方式
				$pay_type = $Model->query("select b.pay_type,b.money from ".C('DB_PREFIX')."receivables as a,".C('DB_PREFIX')."receivingorder as b where a.receivables_id = b.receivables_id and b.is_deleted = 0 and b.status = 1 and a.type = 0 and a.bill_id = ".$data['id']);
				if(!empty($pay_type)){
					foreach($pay_type as $v){
						$pay_str .= ",[$v[money]-$v[pay_type]]";
					}
				}
				$info['pay_str'] = substr($pay_str,'1');

				//获取销售单收款进度
				$money = $Model->query("select Sum(b.money) as money from ".C('DB_PREFIX')."receivables as a,".C('DB_PREFIX')."receivingorder as b where a.receivables_id = b.receivables_id and b.is_deleted = 0 and b.status = 1 and a.type = 0 and a.bill_id = ".$data['id']);
				if($finance = $money['0']['money']){
					if($finance<$data['sales_price']){
						$info['finance'] = "部分收款<span style='color:red;'>(欠".($data['sales_price']-$finance)."元)</span>";
					}else{
						$info['finance'] = '已收款';
					}
				}else{
					$info['finance'] = '未收款';
				}

				if($info['product'] = string2array($data['product'])){
					foreach($info['product'] as $k=>$v){
						$info['product'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
						$rate['discount_rate']=$v['discount_rate'];
					}
				}

				if($info['present'] = string2array($data['present'])){
					foreach($info['present'] as $k=>$v){
						$info['present'][$k]['product_name'] = M('product')->where("product_id=$v[product_id]")->getField('name');
					}
				}
				
				//生成合计字符串
				$price_data = explode('.',$data['sales_price']);
				$price_data1 = array_reverse(str_split($price_data[0]));
				$price_data2 = array_reverse(str_split($price_data[1]));
				foreach($price_data1 as $k=>$v){
					$price_data1[$k] = $arr[$v];
				}
				foreach($price_data2 as $k=>$v){
					$price_data2[$k] = $arr[$v];
				}
				$info['price'] = "<span>$price_data1[6]&nbsp佰</span><span>$price_data1[5]&nbsp拾</span><span>$price_data1[4]&nbsp万</span><span>$price_data1[3]&nbsp仟</span><span>$price_data1[2]&nbsp佰</span><span>$price_data1[1]&nbsp拾</span><span>$price_data1[0]&nbsp元</span><span>$price_data2[0]&nbsp角</span><span>$price_data2[1]&nbsp分</span><span>&nbsp&nbsp&nbsp&nbsp￥$data[sales_price]</span>";

				$this->assign('info',$info);
				$this->assign('rate',$rate);
			}elseif($type==2){
				//采购退货出库
			}	
			$this->display();
		}
	}
}