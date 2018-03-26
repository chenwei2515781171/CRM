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
			<form id="form1" action="" method="post">
			<table class="table table-hover table-striped table_thead_fixed"> 
				<?php if(!empty($assign["list"])): ?><thead>
					<tr>
						<th><input class="check_all" id="check_all" type="checkbox" /></th>
						<th>销售编号</th>
						<th>奖金池金额</th>
						<th>创建时间</th>
					</tr>
				</thead> 
				<tbody>
					<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<input type="checkbox" class="check_list" name="payables_id[]" value="<?php echo ($vo["payables_id"]); ?>"/>
							</td>
							<td><a href="<?php echo U('sales/view','id='.$vo['sales_id']);?>"><?php echo ($vo["sn_code"]); ?></a></td>
							<td><?php echo ($vo["bonus"]); ?></td>
							<td><?php echo (date("Y-m-d",$vo['time'])); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
				<?php else: ?>
					<tr><td><?php echo L('EMPTY_TPL_DATA');?></td></tr><?php endif; ?>
			</table>
			</form>
		</div> <!-- End #tab1 -->	
	</div> <!-- End #main-content -->
</div>

</body>
</html>