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
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<div class="row">
		<div class="span2 knowledgecate">
			<ul class="nav nav-list">
				<li class="active">
					<a href="javascript:void(0);">那类型查看</a>
				</li>
				<li><a <?php if($assign[mode] == s && $assign[stage] == out): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=s&amp;stage=out');?>"><i class="icon-white icon-chevron-right"></i>销售单</a></li>
				<li><a <?php if($assign[mode] == s && $assign[stage] == in): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=s&amp;stage=in');?>"><i class="icon-white icon-chevron-right"></i>销售退货单</a></li>
				<li><a <?php if($assign[mode] == p && $assign[stage] == in): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=p&amp;stage=in');?>"><i class="icon-white icon-chevron-right"></i>采购单</a></li>
				<li><a <?php if($assign[mode] == p && $assign[stage] == out): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=p&amp;stage=out');?>"><i class="icon-white icon-chevron-right"></i>采购退货单</a></li>
				<li><a class="active" href="<?php echo U('stock/inout');?>"><i class="icon-white icon-chevron-right"></i>出入库统计</a></li>
				<li><a href="<?php echo U('stock/out');?>"><i class="icon-white icon-chevron-right"></i>出库统计</a></li>
				<li><a href="<?php echo U('stock/in');?>"><i class="icon-white icon-chevron-right"></i>入库统计</a></li>
			</ul>
		</div>
		<div class="span10">
			<table class="table table-hover table-striped table_thead_fixed">
				<thead>
					<tr id="childNodes_num">
						<th>产品名</th>
						<th>出库</th>
						<th>入库</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><a target="_blank" href="<?php echo U('product/view','id='.$vo[product_id]);?>"><?php echo ($vo["product_name"]); ?></a></td>
							<td><?php echo ($vo["out"]); ?></td>
							<td><?php echo ($vo["in"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>					
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>