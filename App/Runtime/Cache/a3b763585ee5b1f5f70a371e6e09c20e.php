<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title><?php echo C('defaultinfo.name');?> - Powered By <?php echo L('AUTHOR');?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="<?php echo L('AUTHOR');?>"/>
	<link type="text/css" href="__PUBLIC__/css/bootstrap.min.css?t=20140830" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css?t=20140830" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css?t=20140830" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/font-awesome.min.css?t=20140830" rel="stylesheet" />
	<link class="docs" href="__PUBLIC__/css/docs.css?t=20140830" rel="stylesheet"/>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
    <script type="text/javascript">
        var browserInfo = {browser:"", version: ""};
        var ua = navigator.userAgent.toLowerCase();
        if (window.ActiveXObject) {
            browserInfo.browser = "IE";
            browserInfo.version = ua.match(/msie ([\d.]+)/)[1];
            if(browserInfo.version <= 7){
                if(confirm("您的ie浏览器版本过低，建议使用chorme浏览器")){}
            }
        }
    </script>
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/js/respond.min.js" type="text/javascript"></script>
	<![endif]-->
	<script src="__PUBLIC__/js/jquery-1.9.0.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/WdatePicker.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/gototop.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm_zh-cn.js?t=20140830" type="text/javascript"></script>
	<script src="__PUBLIC__/js/5kcrm.js?t=20140830" type="text/javascript"></script>
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap-ie6.css">
	<![endif]-->
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/ie.css">
	<![endif]-->
	<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
	<![endif]-->
	<!--[if lt IE 9]>
	<link type="text/css" href="__PUBLIC__/css/jquery.ui.1.10.0.ie.css" rel="stylesheet"/>
	<script src="__PUBLIC__/js/ie8-eventlistener.js" type="text/javascript"></script>
	<![endif]-->	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
</head>

<style>
//.container .btn-primary{background-color:#375a5e;border-color:#375a5e;}
</style>

<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--div style="line-height: 40px;padding-right: 5px;padding-top: 6px;" class="pull-left"><img src="__PUBLIC__/img/logomini.png"/></div-->
			<a class="brand" href="<?php echo (__APP__); ?>" alt="<?php echo C('defaultinfo.description');?>"><?php echo C('defaultinfo.name');?></a>
			<?php echo W("Navigation");?>
		</div> 
	</div>
</div>
<div class="container">
	<div class="page-header" style="border:none; font-size:14px;">
		<ul class="nav nav-tabs">
	<li <?php if($assign[active] == 'index'): ?>class="active"<?php endif; ?>>
		<a href="<?php echo U('stock/index');?>"><img src="__PUBLIC__/img/kucun.png">&nbsp; <?php echo L('STOCK');?></a>
	</li>
	<li <?php if($assign[active] == 'inoutorder'): ?>class="active"<?php endif; ?>>
		<a href="<?php echo U('stock/inoutorder');?>"><img src="__PUBLIC__/img/caigou.png">&nbsp; <?php echo L('INOUTORDER');?></a>
	</li>
	<li <?php if($assign[active] == 'warehouse'): ?>class="active"<?php endif; ?>>
		<a href="<?php echo U('stock/warehouse');?>"><img src="__PUBLIC__/img/cangku.png">&nbsp; <?php echo L('WAREHOUSE');?></a>
	</li>
</ul>
	</div>
		<div class="row">		
		<div class="span12">
			<ul class="nav pull-left">
				<li class="dropdown nav pull-left" style="margin-right:8px;">
					<a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i>&nbsp;<?php echo L('SELECT_STOCK_OF_WAREHOUSE');?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('stock/index');?>" class="link"><?php echo L('ALL');?></a></li>
						<?php if(is_array($warehouse_list)): $i = 0; $__LIST__ = $warehouse_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('stock/index','act=search&field=warehouse_id&search='); echo ($vo["id"]); ?>" class="link"><?php echo ($vo["name"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li>
				<li class="pull-left">
					<form class="form-inline" id="searchForm" action="index.php" method="get">
						<ul class="nav pull-left">
							<li class="pull-left">
								<select style="width:auto" id="field" onchange="changeCondition()" name="field">
									<option selected="selected" class="text" value="product_name"><?php echo L('PRODUCT_NAME');?></option>
									<option class="number" value="amounts"><?php echo L('STOCK'); echo L('AMOUNTS');?></option>
								</select>&nbsp;&nbsp;
							</li>
							<li id="conditionContent" class="pull-left">
								<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">
									<option selected="selected" value="contains"><?php echo L('CONTAINS');?></option>
									<option value="not_contain"><?php echo L('NOT_CONTAIN');?></option>
									<option value="is"><?php echo L('IS');?></option>
									<option value="isnot"><?php echo L('ISNOT');?></option>
									<option value="start_with"><?php echo L('START_WITH');?></option>
									<option value="end_with"><?php echo L('END_WITH');?></option>
									<option value="is_empty"><?php echo L('IS_EMPTY');?></option>
									<option value="is_not_empty"><?php echo L('IS_NOT_EMPTY');?></option>
								</select>&nbsp;&nbsp;
							</li>
							<li id="searchContent" class="pull-left">
								<input value="" id="search" class="input-medium search-query" name="search" type="text">&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<input name="m" value="stock" type="hidden">
								<button type="submit" id="dosearch" class="btn"><img src="__PUBLIC__/img/search.png">  <?php echo L('SEARCH');?></button> &nbsp;
							</li>
						</ul>
						<input name="act" id="act" value="search" type="hidden">
					</form>
				</li>
			</ul>
			<!-- <div class="pull-right">					
				<a href="/index.php?m=stock&a=add" class="btn btn-primary"><i class="icon-plus"></i>&nbsp; 创建出 / 入库单</a>&nbsp;
			</div> -->
		</div>
		<div class="span12">				
			<form id="form1" action="" method="post">
			<input name="owner_id" id="hidden_owner_id" value="0" type="hidden">
			<table class="table table-hover table-striped table_thead_fixed">
				<thead>
					<tr id="childNodes_num">
						<th><input id="check_all" type="checkbox"></th>
                        <th><?php echo L('PRODUCT');?></th>
                        <th>
							<a href="<?php echo U('stock/index','field=amounts&order='); echo ($order); ?>">
								<?php echo L('STOCK'); echo L('AMOUNTS');?>
								<?php if($_GET['field']== 'amounts' && $_GET['order']== 'desc'): ?><img src="__PUBLIC__/img/arrow_down.png"><?php endif; ?>
								<?php if($_GET['field']== 'amounts' && $_GET['order']== 'asc'): ?><img src="__PUBLIC__/img/arrow_up.png"><?php endif; ?>
							</a>
						</th>
                        <th><?php echo L('WAREHOUSE');?></th>
                        <th>
							<a href="<?php echo U('stock/index','field=last_change_time&order='); echo ($order); ?>"><?php echo L('LAST_CHANGE_TIME');?>
								<?php if($_GET['field']== 'last_change_time' && $_GET['order']== 'desc'): ?><img src="__PUBLIC__/img/arrow_down.png"><?php endif; ?>
								<?php if($_GET['field']== 'last_change_time' && $_GET['order']== 'asc'): ?><img src="__PUBLIC__/img/arrow_up.png"><?php endif; ?>
							</a>
						</th>
                        <th><?php echo L('VIEW');?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td id="td_colspan">
							<?php echo ($page); ?>
						</td>
					</tr>
				</tfoot>
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<input name="stock_id[]" class="check_list" value="<?php echo ($vo["id"]); ?>" type="checkbox"> 
						</td>
						<td><a href="<?php echo U('product/view','id='); echo ($vo["product_id"]); ?>"><?php echo ($vo["product_name"]); ?></a></td>
						<td><?php echo ($vo["amounts"]); ?></td>
						<td><?php echo ($vo["warehouse_name"]); ?></td>
						<td><?php echo (date('Y-m-d',$vo['last_change_time'] )); ?></td>
						<td><a href="<?php echo U('stock/view','id='); echo ($vo["id"]); ?>"><?php echo L('VIEW');?></a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>				
				</tbody>	
			</table>	
			</form>	
		</div>		
	</div>
</div>
<script type="text/javascript">
	width=800;
	$(function(){
		$("#field option[value='product_name']").prop("selected", true);changeCondition();
		$("#condition option[value='contains']").prop("selected", true);changeSearch();
		$("#search").prop('value', '');	
		$("#check_all").click(function(){
			$("input[class='check_list']").prop('checked', $(this).prop("checked"));
		});
		$("#dosearch").click(function(){
			result = checkSearchForm();
			if(result) $("#searchForm").submit();
		});
	});
	$nodes_num = document.getElementById("childNodes_num").children.length;
	$("#td_colspan").attr('colspan',$nodes_num);
</script>

</body>
</html>