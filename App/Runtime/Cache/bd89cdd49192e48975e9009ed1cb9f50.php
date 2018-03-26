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
				<li><a href="<?php echo U('stock/inout');?>"><i class="icon-white icon-chevron-right"></i>出入库统计</a></li>
				<li><a href="<?php echo U('stock/out');?>"><i class="icon-white icon-chevron-right"></i>出库统计</a></li>
				<li><a href="<?php echo U('stock/in');?>"><i class="icon-white icon-chevron-right"></i>入库统计</a></li>
			</ul>
		</div>
		<div class="span10">
			<div class="pull-left">
				<ul class="nav pull-left">
					<li class="pull-left">
						<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="index.php" method="get">
							<ul class="nav pull-left">
								<li class="pull-left">
									&nbsp;
									<select id="field" style="width:auto" onchange="changeCondition()" name="field">
										<option class="text" value="sn_code">编号</option>
										<option selected="selected" class="text" value="subject">主题</option>
										<?php if($assign[mode] == s): ?><option class="customer" value="customer_id">客户名</option><?php endif; ?>
										<?php if($assign[mode] == p): ?><option class="supplier" value="supplier_id">供应商名</option><?php endif; ?>
										<option class="role" value="create_user_id">制单人</option>
										<option class="date" value="create_time">创建时间</option>
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
								<li id="searchContent" class="pull-left"><input value="" id="search" class="input-medium search-query" name="search" type="text">&nbsp;&nbsp;</li>
								<li class="pull-left">
									<input name="m" value="stock" type="hidden">
									<input name="a" value="inoutorder" type="hidden">
									<input name="mode" value="<?php echo ($assign[mode]); ?>" type="hidden">
									<input name="stage" value="<?php echo ($assign[stage]); ?>" type="hidden">
									<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png">搜索</button>
								</li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
		<div class="span10">
			<form id="form1" action="<?php echo U('stock/inoutorder');?>" method="Post">
				<table class="table table-hover table-striped table_thead_fixed">
					<thead>
						<tr id="childNodes_num">
							<th><input class="check_all" id="check_all" type="checkbox"> &nbsp;</th>
							<th>编号</th>
							<th>主题</th>
							<th>客户/供应商</th>
							<th>状态</th>
							<th>金额</th>
							<th>数量</th>
							<th>制单人</th>
							<th>创建时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td><input name="order_id[2]" class="check_list" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
							<td><a href="/index.php?m=<?php echo ($assign["m"]); ?>&a=view&id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["sn_code"]); ?></a></td>								
							<td><?php echo ($vo["subject"]); ?></td>
							<?php if($assign[mode] == s): ?><td>
								<a href="/index.php?m=customer&a=view&id=<?php echo ($vo["customer_id"]); ?>" style="color:green"><?php echo ($vo["customer_name"]); ?></a>
							</td><?php endif; ?>
							<?php if($assign[mode] == p): ?><td>
								<a href="/index.php?m=supplier&a=view&id=<?php echo ($vo["supplier_id"]); ?>" style="color:green"><?php echo ($vo["supplier_name"]); ?></a>						
							</td><?php endif; ?>

							<?php if($assign[mode] == s && $assign[stage] == out && $vo[status] == 0): ?><td>未出库</td><?php endif; ?>
							<?php if($assign[mode] == s && $assign[stage] == out && $vo[status] == 1): ?><td>已出库</td><?php endif; ?>
							<?php if($assign[mode] == s && $assign[stage] == in && $vo[status] == 0): ?><td>未入库</td><?php endif; ?>
							<?php if($assign[mode] == s && $assign[stage] == in && $vo[status] == 1): ?><td>已入库</td><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == in && $vo[status] == 0): ?><td>未入库</td><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == in && $vo[status] == 1): ?><td>已入库</td><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == out && $vo[status] == 0): ?><td>未出库</td><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == out && $vo[status] == 1): ?><td>已出库</td><?php endif; ?>

							<td><?php echo ($vo["sales_price"]); echo ($vo["purchase_price"]); ?></td>
							<td><?php echo ($vo["total_amount"]); echo ($vo["sales_count"]); ?></td>
							<td><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo["create_user_id"]); ?>"><?php echo ($vo["create_user_name"]); ?></a></td>
							<td><?php echo (date("Y-m-d",$vo["create_time"])); ?></td>
							<td>
							<?php if($assign[mode] == s && $assign[stage] == out && $vo[status] == 0): ?><a href="javascript:void(0);" class="control_stock" rel="/index.php?m=<?php echo ($assign["m"]); ?>&a=outorder&id=<?php echo ($vo["id"]); ?>">出库</a><?php endif; ?>
							<?php if($assign[mode] == s && $assign[stage] == in && $vo[status] == 0): ?><a href="javascript:void(0);" class="control_stock" rel="/index.php?m=<?php echo ($assign["m"]); ?>&a=inorder&id=<?php echo ($vo["id"]); ?>">入库</a><?php endif; ?>
							<?php if($assign[mode] == s && $assign[stage] == out && $vo[status] == 1): ?><a target="_blank" href="/index.php?m=stock&a=printhtml&id=<?php echo ($vo["id"]); ?>&type=1">打印/预览</a><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == in && $vo[status] == 0): ?><a href="javascript:void(0);" class="control_stock" rel="/index.php?m=<?php echo ($assign["m"]); ?>&a=inorder&id=<?php echo ($vo["id"]); ?>">入库</a><?php endif; ?>
							<?php if($assign[mode] == p && $assign[stage] == out && $vo[status] == 0): ?><a href="javascript:void(0);" class="control_stock" rel="/index.php?m=<?php echo ($assign["m"]); ?>&a=outorder&id=<?php echo ($vo["id"]); ?>">出库</a><?php endif; ?>
							<!--<?php if($assign[mode] == p && $assign[stage] == out && $vo[status] == 1): ?><a href="/index.php?m=stock&a=printhtml&id=<?php echo ($vo["id"]); ?>&type=2">打印/预览</a><?php endif; ?>-->
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>					
					</tbody>						
					<tfoot>
						<tr>
							<td colspan="10">
								<?php echo ($assign["page"]); ?>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<script type="text/javascript">
	$(function(){
		$("#field option[value='subject']").prop("selected", true);changeCondition();
		$("#condition option[value='contains']").prop("selected", true);changeSearch();
		$("#search").prop('value', '');	$("#check_all").click(function(){
			$("input[class='check_list']").prop('checked', $(this).prop("checked"));
		});
		$(".control_stock").click(function(){
			if(confirm('操作后将不可撤销，确认操作吗？')){
				var url = $(this).attr('rel');
				location.href = url;
			}
		});
		$("#dosearch").click(function(){
			result = checkSearchForm();
			if(result) $("#searchForm").submit();
		});
	});
	$nodes_num = document.getElementById("childNodes_num").children.length;
	$("#td_colspan").attr('colspan',$nodes_num);

	//创建人弹窗
	$("#dialog-role-info").dialog({
	    autoOpen: false,
	    modal: true,
		width: 600,
		maxHeight: 400,
		position: ["center",100]
	});
	$(".role_info").click(function(){
		var role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U('user/dialoginfo','id=');?>'+role_id);
	});
</script>

</body>
</html>