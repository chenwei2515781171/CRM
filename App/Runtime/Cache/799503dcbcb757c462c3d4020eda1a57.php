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
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<div class="row">
			<div class="span12">
				<div class="bulk-actions align-left">
					<div class="pull-left">
						<a id="delete" class="btn" style="margin-right: 5px;"><i class="icon-remove"></i>&nbsp;<?php echo L('DELETE');?></a>
					</div>
					<ul class="nav pull-left">
						<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
							<li class="pull-left">
								&nbsp;
								<select style="width:auto" id="field" name="field" onchange="changeCondition()">
									<option class="word" value="customer_name">客户名称</option>
									<option class="word" value="product_name">存酒名称</option>
									<option class="number" value="count">存酒总量</option>
									<option class="number" value="surplus_count">存酒剩余</option>
									<option class="date" value="time">创建时间</option>
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
								<input name="m" value="prestore" type="hidden">
								<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png">    <?php echo L('SEARCH');?></button>&nbsp;
							</li>
						</form>
					</ul>
				</div>
				<!--div class="pull-right">
					<a class="btn btn-primary" href="<?php echo U('supplier/add');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD_SUPPLIER');?></a>
				</div-->
			</div>
			<div class="span12" style="margin-top:10px;">
				<form id="form1" method="Post">
					<table class="table table-hover table-striped table_thead_fixed">
						<thead>
							<tr>
								<th><input class="check_all" name="check_all" id="check_all" type="checkbox"> &nbsp;</th>
								<th>编号</th>
								<th>客户名称</th>
								<th>存酒名称</th>
								<th>存酒总量</th>
								<th>存酒剩余</th>
								<th>
									<a href="<?php echo U('prestore/index','field=time&order='); echo ($order); ?>">
										创建时间
										<?php if($_GET['field']== 'time' && $_GET['order']== 'desc'): ?><img src="__PUBLIC__/img/arrow_down.png"><?php endif; ?>
										<?php if($_GET['field']== 'time' && $_GET['order']== 'asc'): ?><img src="__PUBLIC__/img/arrow_up.png"><?php endif; ?>
									</a>
								</th>
								<th><?php echo L('OPERATING');?></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td id="td_colspan" colspan="8">
									<?php echo ($page); ?>
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<input class="check_list" name="ids[]" value="<?php echo ($vo["id"]); ?>" type="checkbox">
									</td>
									<td><?php echo ($vo["id"]); ?></td>
									<td><a target="_blank" href="<?php echo U('customer/view','id='); echo ($vo["customer_id"]); ?>"><?php echo ($vo["customer_name"]); ?></a></td>
									<td><a target="_blank" href="<?php echo U('product/view','id='); echo ($vo["product_id"]); ?>"><?php echo ($vo["product_name"]); ?></a></td>
									<td><?php echo ($vo["count"]); ?></td>
									<td><?php echo ($vo["surplus_count"]); ?></a></td>
									<td><?php echo (date("Y-m-d",$vo[time] )); ?></td>
									<td>
										<a class="view_prestore" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);"><?php echo L('VIEW');?></a>&nbsp;&nbsp;
										<a class="add_prestore" rel="<?php echo ($vo["id"]); ?>" href="javascript:void(0);">取酒</a>&nbsp;&nbsp;
										<a target="_blank" href="<?php echo U('prestore/delete','id='); echo ($vo["id"]); ?>"><?php echo L('DELETE');?></a>&nbsp;&nbsp;
										<a rel="<?php echo ($vo["id"]); ?>" class="qrcode" href="javascript:void(0);">查看二维码</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>					
					</table>
				</form>
			</div>
		</div>
	</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<div class="hide" id="dialog-add-prestore" title="添加取酒记录">loading...</div>
<div class="hide" id="dialog-view-prestore" title="添加取酒记录">loading...</div>
<div class="hide" id="dialog-view-qrcode" title="查看二维码">loading...</div>
<script type="text/javascript">
	width=800;
	$(document).ready(function(){
		$('#search').val('');
		$("#field option[value='']").prop("selected", true);
		$("#condition option[value='']").prop("selected", true);
	});

	$("#dialog-view-qrcode").dialog({
		autoOpen: false,
		modal: true,
		width: 180,
		maxHeight: 300,
		position: ["center",100]
	});
	$('.qrcode').click(function(){
		var prestore_id = $(this).attr('rel');
		$('#dialog-view-qrcode').dialog('open');
		$('#dialog-view-qrcode').load('/index.php?m=prestore&a=qrcode&id='+prestore_id);
	});

	$("#dialog-view-prestore").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});
	$('.view_prestore').click(function(){
		var prestore_id = $(this).attr('rel');
		$('#dialog-view-prestore').dialog('open');
		$('#dialog-view-prestore').load('/index.php?m=prestore&a=view&id='+prestore_id);
	});
	
	$("#dialog-add-prestore").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});
	$('.add_prestore').click(function(){
		var prestore_id = $(this).attr('rel');
		$('#dialog-add-prestore').dialog('open');
		$('#dialog-add-prestore').load('/index.php?m=prestore&a=add&id='+prestore_id);
	});
	
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('/index.php?m=user&a=dialoginfo&id='+$role_id);
	});
	
	$("#dialog-role-info").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});

	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	
	$('#delete').click(function(){
		if(confirm("确定要删除么？")){
			$("#form1").attr('action', '/index.php?m=prestore&a=delete');
			$("#form1").submit();
		}else{
			return false;
		}
	});
</script>

</body>
</html>