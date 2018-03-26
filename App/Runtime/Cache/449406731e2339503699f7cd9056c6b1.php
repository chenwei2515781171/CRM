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
	<li <?php if($assign[active] == 'receivables'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('finance/index','t=receivables');?>"><img src="__PUBLIC__/img/yingshoukuan.png"/>&nbsp; <?php echo L('RECEIVABLES');?></a></li>
	<li <?php if($assign[active] == 'payables'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=payables');?>"><img src="__PUBLIC__/img/yingfukuan.png"/> &nbsp; <?php echo L('PAYABLES');?></a></li>
	<li <?php if($assign[active] == 'present'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/present');?>"><img src="__PUBLIC__/img/shoukuandan.png"/> &nbsp; 赠品</a></li>
	<!--li <?php if($assign[active] == 'receivingorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=receivingorder');?>"><img src="__PUBLIC__/img/shoukuandan.png"/> &nbsp; <?php echo L('RECEIVINGORDER');?></a></li>
	<li <?php if($assign[active] == 'paymentorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=paymentorder');?>"><img src="__PUBLIC__/img/fukuandan.png"/> &nbsp; <?php echo L('PAYMENTORDER');?></a></li>
	<li <?php if($assign[active] == 'analytics'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/analytics');?>"><img src="__PUBLIC__/img/tongji.png"/> &nbsp; <?php echo L('STATISTICS');?></a></li-->
</ul>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<div class="row">
		<div class="span12">
			<!--div class="pull-left">
				<?php if($_SESSION['admin']== 1 or $_GET['by']!= 'deleted'): ?><a id="delete"  class="btn" style="margin-right: 8px;"><i class="icon-remove"></i> <?php echo L('DELETE');?></a><?php endif; ?>
			</div-->
			<div class="pull-left">
				<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
					<ul class="nav pull-left">
						<li class="pull-left">
							<select style="width:auto" name="field" id="field" onchange="changeCondition()">
								<option class="word" value="name">销售单名称</option>
								<option class="number" value="price">赠品总价</option>
							</select>&nbsp;&nbsp;
						</li>
						<li id="conditionContent" class="pull-left">
							<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">
								<option value="contains"><?php echo L('CONTAINS');?></option>
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
							<input id="search" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
						</li>
						<li class="pull-left">
						<input type="hidden" name="m" value="finance"/>
						<input type="hidden" name="a" value="present"/>
						<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  <?php echo L('SEARCH');?></button></li>
					</ul>
				</form>
			</div>
		</div>
		<div class="span12">
			<form id="form1" action="" method="post">
			<table class="table table-hover table-striped table_thead_fixed"> 
				<?php if(!empty($assign["list"])): ?><thead>
					<tr>
						<th><input class="check_all" id="check_all" type="checkbox" /></th>
						<th>销售单名称</th>
						<th>制单人</th>
						<th>赠品金额</th>
						<th>创建时间</th>
					</tr>
				</thead>
				<tfoot>
					<tr style="background: #029BE2;color: #fff;font-size: 12px;">
						<td colspan="5">当前页金额总计：<?php echo ($assign["money"]); ?>（元）金额总计：<?php echo ($assign["sum_money"]); ?>（元）</td>
					</tr>
					<tr>
						<td colspan="5">
							<?php echo ($assign["page"]); ?>
						</td>
					</tr>
				</tfoot>  
				<tbody>
					<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<input type="checkbox" class="check_list" name="payables_id[]" value="<?php echo ($vo["payables_id"]); ?>"/>
							</td>
							<td><a href="<?php echo U('sales/view','id='.$vo['sales_id']);?>"><?php echo ($vo["name"]); ?></a></td>
							<td><?php echo ($vo["user_name"]); ?></td>
							<td><?php echo ($vo["price"]); ?></td>
							<td><?php echo (date("Y-m-d",$vo['create_time'])); ?></td>
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