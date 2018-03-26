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
	<li <?php if($assign[active] == 'purchase'): ?>class="active"<?php endif; ?>>
	<a href="<?php echo U('purchase/index');?>"><img src="__PUBLIC__/img/renwu.png">&nbsp;<?php echo L('PURCHASE_ORDER');?></a>
	</li>
	<li <?php if($assign[active] == 'index'): ?>class="active"<?php endif; ?>>
		<a href="<?php echo U('supplier/index');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('SUPPLIER');?></a>
	</li>
	<li <?php if($assign[active] == 'category'): ?>class="active"<?php endif; ?>>
		<a href="<?php echo U('supplier/category');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('SUPPLIER_CATEGORY');?></a>
	</li>
</ul>
		</div>
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<p class="view">
			<b><?php echo L('PURCHASE_ORDER_VIEW');?>：</b>
			<img src="__PUBLIC__/img/by_owner.png"> <a href="<?php echo U('purchase/index');?>" class="active"><?php echo L('ALL_PURCHASE');?></a> |
			<a href="<?php echo U('purchase/index','by=not_check&type='.$assign['type']);?>"><?php echo L('NO_CHECk_PURCHASE');?></a> | 
			<a href="<?php echo U('purchase/index','by=checked&type='.$assign['type']);?>"><?php echo L('CHECK_PURCHASE');?></a> | 
		</p>
        <div class="row">
			<div class="span2 knowledgecate">
				<ul class="nav nav-list">
					<li class="active">
						<a href="javascript:void(0);"><?php echo L('SELECT_TYPE_VIEW');?></a>
					</li>
					<li>
						<a href="<?php echo U('purchase/index');?>" <?php if($assign[type] != '0' && $assign[type] != '1'): ?>class="active"<?php endif; ?>>
							<i class="icon-white icon-chevron-right"></i><?php echo L('ALL_PURCHASE');?></a>
					</li>
					<li>
						<a href="<?php echo U('purchase/index','type=0&by='.$assign['by']);?>" <?php if($assign[type] == '0'): ?>class="active"<?php endif; ?>>
							<i class="icon-chevron-right"></i><?php echo L('PURCHASE_ORDER');?></a>
					</li>
					<li>
						<a href="<?php echo U('purchase/index','type=1&by='.$assign['by']);?>" <?php if($assign[type] == '1'): ?>class="active"<?php endif; ?>>
							<i class="icon-chevron-right"></i><?php echo L('RETURN_PURCHAE');?></a>
					</li>
				</ul>
			</div>
			<div class="span10">
				<div class="pull-left">
					<ul class="nav pull-left">
						<li class="pull-left">
							<a id="delete" class="btn"><i class="icon-remove"></i><?php echo L('DELETE');?></a>
						</li>
						<li class="pull-left">
							<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="index.php" method="get">
								<ul class="nav pull-left">
									<li class="pull-left">
										&nbsp;
										<select id="field" style="width:auto" onchange="changeCondition()" name="field">
											<option class="text" value="sn_code"><?php echo L('SN_CODE');?></option>
											<option class="text" value="subject"><?php echo L('SUBJECT');?></option>
											<option class="text" value="supplier_name"><?php echo L('SUPPLIER_NAME');?></option>
											<option class="role" value="create_user_id"><?php echo L('CREATE_PURCHASE_PRESON');?></option>
											<option class="date" value="create_time"><?php echo L('CREATE_TIME');?></option>
											<option class="date" value="update_time"><?php echo L('UPDATE_TIME');?></option>
										</select>&nbsp;&nbsp;
									</li>
									<li id="conditionContent" class="pull-left">
										<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">
											<option selected="selected" value="contains"><?php echo L('CONTAINS');?></option>
											<option value="not_contain"><?php echo L('NOT_CONTAINS');?></option>
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
										<input name="m" value="purchase" type="hidden">
										<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"><?php echo L('SEARCH');?></button>
									</li>
								</ul>
							</form>
						</li>
					</ul>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="<?php echo U('purchase/add','type=0');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD_PURCHASE');?></a>&nbsp;&nbsp;
					<a class="btn btn-primary" href="<?php echo U('purchase/add','type=1');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD_PURCHASE_RETURN');?></a>
				</div>
			</div>
			
			<div class="span10">
				<form id="form" action="<?php echo U('purchase/index');?>" method="Post">
					<table class="table table-hover table-striped table_thead_fixed">
						<thead>
							<tr id="childNodes_num">
								<th><input class="check_all" id="check_all" type="checkbox"> &nbsp;</th>
								<th style="width:17px;">&nbsp;</th>
								<th><?php echo L('SN_CODE');?></th>
								<th><?php echo L('SUBJECT');?></th>
								<th><?php echo L('SUPPLIER_NAME');?></th>
								<th><?php echo L('TYPE');?></th>
								<th><?php echo L('STATUS');?></th>
								<th><?php echo L('FINANCE_STATUS');?></th>
								<th><?php echo L('AMOUNT');?></th>
								<th><?php echo L('COUNT');?></th>
								<th><?php echo L('CREATE_PURCHASE_PRESON');?></th>
								<th><?php echo L('CREATE_TIME');?></a></th>
								<th><?php echo L('OPERATING');?></th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<input <?php if($vo["status"] == 1): ?>disabled="true"<?php endif; ?> name="ids[]" class="check_list" value="<?php echo ($vo["id"]); ?>" type="checkbox">
									</td>
									<td>
										<?php if($vo["check_status"] == 1 ): ?><img src="__PUBLIC__/img/check.png" class="list_check"><?php endif; ?>
									</td>
									<td>
										<a href="<?php echo U('purchase/view','id='); echo ($vo["id"]); ?>"><?php echo ($vo["sn_code"]); ?></a>
									</td>
									<td><?php echo ($vo["subject"]); ?></td>
									<td><a href="<?php echo U('supplier/view','id='); echo ($vo["supplier_id"]); ?>" target="_blank"><?php echo ($vo["supplier_name"]); ?></a></td>
									<td>
										<?php if($vo["type"] == 1): echo L('TYPE_1');?>
										<?php else: ?>
											<?php echo L('TYPE_0'); endif; ?>
									</td>
									<?php if($vo["type"] == 0): if($vo["status"] == 1): ?><td><?php echo L('YRK');?></td>
										<?php else: ?>
											<td><?php echo L('WRK');?></td><?php endif; ?>
									<?php else: ?>
										<?php if($vo["status"] == 1): ?><td><?php echo L('YCK');?></td>
										<?php else: ?>
											<td><?php echo L('WCK');?></td><?php endif; endif; ?>
									<td><?php echo ($vo["finance"]); ?></td>
									<td><?php echo ($vo["purchase_price"]); ?></td>
									<td><?php echo ($vo["total_amount"]); ?></td>
									<td><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo["create_user_id"]); ?>"><?php echo ($vo["create_user_name"]); ?></a></td>
									<td><?php echo (date("Y-m-d",$vo["create_time"])); ?></td>
									<td>
										<a href="<?php echo U('purchase/view','id='.$vo['id']);?>"><?php echo L('VIEW');?></a>&nbsp;
										<?php if($vo["check_status"] == 0): ?><a class="operation_tips" href="<?php echo U('purchase/check','id='.$vo['id']);?>">审核</a>&nbsp;
										<?php else: ?>
											<?php if($vo["status"] == 0): ?><a class="operation_tips" href="<?php echo U('purchase/removecheck','id='.$vo['id']);?>">撤销审核</a>&nbsp;<?php endif; endif; ?>
										<?php if($vo["status"] != 1): ?><a href="<?php echo U('purchase/edit','id='.$vo['id']);?>"><?php echo L('EDIT');?></a>&nbsp;
											<a class="operation_tips" href="<?php echo U('purchase/delete','id='.$vo['id']);?>"><?php echo L('DELETE');?></a><?php endif; ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>						
						</tbody>						
						<tfoot>
							<tr>
								<td colspan="12">
									<p><?php echo L('HINT');?>：<img width="17" src="__PUBLIC__/img/check.png"><?php echo L('IS_CHECK');?></p>
									<?php echo ($assign["page"]); ?>
								</td>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
			
		</div>
	</div>
	<div class="hide" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFO');?>">loading...</div>	
<script type="text/javascript">
width=600;
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-import").dialog({
	autoOpen: false,
	modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
function changeContent(){
	a = $("#select1  option:selected").val();
	window.location.href="<?php echo U('purchase/index','by=');?>"+a;
}
$(function(){
	$("#field option[value='status_id']").prop("selected", true);changeCondition();
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	$('#delete').click(function(){
		var confirm_result = confirm('警告：您正在删除的数据与其它信息有关联，删除该数据后，将连带删除相关信息，请谨慎处理！');
				if(confirm_result){
			$("#form").attr('action', '<?php echo U('purchase/delete');?>');
			$("#form").submit();
		}
	});
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U('user/dialoginfo','id=');?>'+$role_id);
	});
});
$('.operation_tips').click(function(){
	if(confirm("确定要进行该操作么？")){
		return true;
	}else{
		return false;
	}
});
$nodes_num = document.getElementById("childNodes_num").children.length;
	$("#td_colspan").attr('colspan',$nodes_num);</script>

</body>
</html>