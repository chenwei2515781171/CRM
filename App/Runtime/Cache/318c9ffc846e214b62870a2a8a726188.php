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
	<li <?php if($assign[active] == 'sales/index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/index');?>"><img src="__PUBLIC__/img/xiaoshou.png">&nbsp; <?php echo L('SALES_TICKET');?></a></li>
	<li <?php if($assign[active] == 'sales/delivery'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/delivery');?>"><img src="__PUBLIC__/img/customer_source_icon.png"> &nbsp;<?php echo L('DELIVERY_MANAGE');?></a></li>
	<li <?php if($assign[active] == 'sales/analyticssales'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/analyticssales');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('STATISTICS');?></a></li>
	<li <?php if($assign[active] == 'sales/bonus_pool'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/bonus_pool');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('BONUS_POOL');?></a></li>
</ul>	
		</div>
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<div class="row">
			<div class="span12">
				<div class="bulk-actions align-left">
					<ul class="nav pull-left">
						<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
							<li class="dropdown nav pull-left" style="margin-right:8px;">
								<a href="#" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i>&nbsp;配送进度<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo U('sales/delivery');?>" class="link"><?php echo L('ALL');?></a></li>
									<li>
										<a href="<?php echo U('sales/delivery','condition=eq&field=delivery_status&search=');?>0" class="link">待配送</a>
									</li>
									<li>
										<a href="<?php echo U('sales/delivery','condition=eq&field=delivery_status&search=');?>1" class="link">送货途中</a>
									</li>
									<li>
										<a href="<?php echo U('sales/delivery','condition=eq&field=delivery_status&search=');?>2" class="link">已送达</a>
									</li>
								</ul>
							</li>
							<li class="pull-left">
								&nbsp;
								<select style="width:auto" id="field" name="field" onchange="changeCondition()">
									<option class="word" value="sn_code">编号</option>
									<option class="word" value="customer_name">客户名称</option>
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
								<input id="search" class="input-medium search-query" name="search" type="text">&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<input name="m" value="sales" type="hidden">
								<input name="a" value="delivery" type="hidden">
								<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png">    <?php echo L('SEARCH');?></button>&nbsp;
							</li>
						</form>
					</ul>
				</div>
			</div>
			<div class="span12" style="margin-top:10px;">
				<form id="form1" method="Post">
					<table class="table table-hover table-striped table_thead_fixed">
						<thead>
							<tr>
								<th>编号</th>
								<th>客户名称</th>
								<th>客户联系方式</th>
								<th>配送地址</th>
								<th>配送清单</th>
								<th>配送员联系方式</th>
								<th>配送进度</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td id="td_colspan" colspan="9">
									<?php echo ($page); ?>
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><a target="_blank" href="<?php echo U('sales/view','id='); echo ($vo["id"]); ?>"><?php echo ($vo["sn_code"]); ?></a></td>
									<td><a target="_blank" href="<?php echo U('customer/view','id='); echo ($vo["customer_id"]); ?>"><?php echo ($vo["customer_name"]); ?></a></td>
									<td><?php echo ($vo["telephone"]); ?></td>
									<td><?php echo ($vo["address"]); ?></td>
									<td><a class="view_product" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">查看</a></td>
									<td><?php if(!$vo[delivery_contact]): ?><a class="delivery_contact" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">添加</a><?php else: echo ($vo["delivery_contact"]); ?>&nbsp;<a class="delivery_contact" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">修改</a><?php endif; ?></td>
									<td><?php if(isset($vo[delivery_status]) && $vo[delivery_status] == 0): ?>待送货&nbsp;&nbsp;<a class="edit_delivery_status" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">(修改状态)</a><?php endif; if($vo[delivery_status] == 1): ?>送货途中&nbsp;&nbsp;<a class="edit_delivery_status" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">(修改状态)</a><?php endif; if($vo[delivery_status] == 2): ?>已送达<?php endif; ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>					
					</table>
				</form>
			</div>
		</div>
	</div>
<div class="hide" id="dialog-edit-delivery-status" title="修改配送状态">loading...</div>
<div class="hide" id="dialog-view-product" title="查看配送商品列表">loading...</div>
<div class="hide" id="dialog-add-delivery-contact" title="添加配送联系方式">loading...</div>
<script type="text/javascript">
	width=800;
	$(document).ready(function(){
		$('#search').val('');
		$("#field option[value='']").prop("selected", true);
		$("#condition option[value='']").prop("selected", true);
	});

	$("#dialog-add-delivery-contact").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});
	$('.delivery_contact').click(function(){
		var sales_id = $(this).attr('rel');
		$('#dialog-add-delivery-contact').dialog('open');
		$('#dialog-add-delivery-contact').load('/index.php?m=sales&a=delivery_contact&id='+sales_id);
	});

	$("#dialog-view-product").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});

	$('.view_product').click(function(){
		var sales_id = $(this).attr('rel');
		$('#dialog-view-product').dialog('open');
		$('#dialog-view-product').load('/index.php?m=sales&a=product_list&id='+sales_id);
	});
	
	$("#dialog-edit-delivery-status").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});

	$('.edit_delivery_status').click(function(){
		var sales_id = $(this).attr('rel');
		$('#dialog-edit-delivery-status').dialog('open');
		$('#dialog-edit-delivery-status').load('/index.php?m=sales&a=delivery_status&id='+sales_id);
	});
</script>

</body>
</html>