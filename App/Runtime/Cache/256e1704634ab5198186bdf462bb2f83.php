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
					<a href="javascript:void(0);">按类型查看</a>
				</li>
				<li><a <?php if($assign[mode] == s && $assign[stage] == out): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=s&amp;stage=out');?>"><i class="icon-white icon-chevron-right"></i>销售单</a></li>
				<li><a <?php if($assign[mode] == s && $assign[stage] == in): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=s&amp;stage=in');?>"><i class="icon-white icon-chevron-right"></i>销售退货单</a></li>
				<li><a <?php if($assign[mode] == p && $assign[stage] == in): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=p&amp;stage=in');?>"><i class="icon-white icon-chevron-right"></i>采购单</a></li>
				<li><a <?php if($assign[mode] == p && $assign[stage] == out): ?>class="active"<?php endif; ?> href="<?php echo U('stock/inoutorder','mode=p&amp;stage=out');?>"><i class="icon-white icon-chevron-right"></i>采购退货单</a></li>
				<li><a href="<?php echo U('stock/inout');?>"><i class="icon-white icon-chevron-right"></i>出入库统计</a></li>
				<li><a class="active" href="<?php echo U('stock/out');?>"><i class="icon-white icon-chevron-right"></i>出库统计</a></li>
				<li><a class="active" href="<?php echo U('stock/in');?>"><i class="icon-white icon-chevron-right"></i>入库统计</a></li>
			</ul>
		</div>
		<div class="span10">
			<div class="pull-left">
				<ul class="nav pull-left">
					<li class="pull-left">
						<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
							<ul class="nav pull-left">
								<li class="pull-left" style="margin-top:3px;">
								产品名称&nbsp; <select style="width:auto" name="product" id="product" onchange="changeRole()" autocomplete="off">
									<option class="all" value="all">全部</option>
									<?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["product_id"]); ?>" <?php if($vo['product_id'] == intval($_GET['product'])): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							
							<li class="pull-left">
								时间&nbsp; <?php echo L('FROM');?> <input id="start_time" name="start_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate span2" type="text" value="<?php echo ($_GET['start_time']); ?>"> <?php echo L('TO');?> <input id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="end_time" class="Wdate span2" type="text" value="<?php echo ($_GET['end_time']); ?>">&nbsp;&nbsp;
							</li>
                               <li class="pull-left" style="margin-top:3px;">
								仓库&nbsp; &nbsp; &nbsp; &nbsp; <select style="width:auto" name="warehouse" id="warehouse" onchange="changeCondition()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($warehouselist)): $i = 0; $__LIST__ = $warehouselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>

							    <input type="hidden" name="act" id="act" value="search"/>
								<li class="pull-left" style="margin-top:3px;">
								<input name="m" value="stock" type="hidden">
								<input name="a" value="out" type="hidden">
								<button type="submit" class="btn">  <?php echo L('SEARCH');?></button>
							</li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
		<div class="span10">
			<table class="table table-hover table-striped table_thead_fixed">
				<thead>
					<tr>
							<th style="text-align:center;height:30px;line-height:30px;border:1px #F0F0F0 solid;" colspan="7">出库统计&nbsp;(表格)</th>
							<th><a href="javascript:void(0);" id="outexcelExport" class="link"> <i class="icon-download"> </i> 导出表格</a></th>
						</tr>
					<tr id="childNodes_num">
						<th>产品名</th>
                        <th>单号</th>
                        <th>数量</th>
						<th>单价</th>
						<th>金额</th>
						<th>仓库</th>
						<th>销售员</th>
						<th>时间</th>
					</tr>
				</thead>
				<tfoot>
						<tr style="background: #029BE2;color: #fff;font-size: 13px;" colspan="8">
							<td>出库金额总计：</td>
							<td><?php echo ($all['total_price']); ?></td>
						</tr>
					</tfoot>
					<tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(is_array($vo["data"])): $k = 0; $__LIST__ = $vo["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($k % 2 );++$k;?><tr>
                        		<?php if($k == 1): ?><td class="user" rowspan="<?php echo ($vo["count"]); ?>"><?php echo ($vo["product_name"]); ?></td><?php endif; ?>
								<td><?php echo ($sub["sn_code"]); ?></td>
								<td><?php echo ($sub["num"]); ?></td>
								<td><?php echo ($sub["suggested_price"]); ?></td>
								<td><?php echo ($sub["total"]); ?></td>
								<td><?php echo ($sub["warehouse_name"]); ?></td>
								<td><?php echo ($sub["create_user_name"]); ?></td>
								<td><?php echo (date("Y-m-d",$sub['create_time'])); ?></td>								
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<tr>
								<td></td>
								<td colspan="3">出库金额总计：<?php echo ($vo["total_all"]); ?>元</td>
								<td colspan="3">出库量总计：<?php echo ($vo["num_all"]); ?> </td>
								<td colspan="3">库存量：<?php echo ($vo["stock_num"]); ?></td>
							    </tr><?php endforeach; endif; else: echo "" ;endif; ?>		
						<tr>
							<td colspan="8">
								<?php echo ($page); ?>
							</td>
						</tr>			
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
$("#outexcelExport").click(function(){
	if(confirm("你确定要导出出库数据吗？")){
		var product=$("product").val();
		var warehouse=$("warehouse").val();
		
		var start_time = $("#start_time").val();
		var end_time = $("#end_time").val();
		var url = "<?php echo U('stock/out');?>&product="+product+"&warehouse="+warehouse+"&start_time="+start_time+"&end_time="+end_time+"&act=outexcel";
		window.location.href = url;
		//$("#act").val('inexcel');	
		//$("#searchForm").submit();
	}
})
</script>

</body>
</html>