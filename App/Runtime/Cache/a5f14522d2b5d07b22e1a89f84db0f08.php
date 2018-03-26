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
	<p class="view">
		<b><?php echo L('SALES_VIEW_NAV');?>：</b>
		<img src="__PUBLIC__/img/by_owner.png"> <a href="<?php echo U('sales/index');?>" <?php if(!isset($assign[by])||$assign[by]==''): ?>class="active"<?php endif; ?>><?php echo L('ALL');?></a> | <a href="<?php echo U('sales/index','by=not_check&type='.$assign['type']);?>" <?php if($assign[by] == 'not_check'): ?>class="active"<?php endif; ?>><?php echo L('NOT_CHECK_SALES');?></a> | <a href="<?php echo U('sales/index','by=checked&type='.$assign['type']);?>" <?php if($assign[by] == 'checked'): ?>class="active"<?php endif; ?>><?php echo L('CHECKED_SALES');?></a> | 
	</p>
	<div class="row">
		<div class="span2 knowledgecate">
			<ul class="nav nav-list">
				<li class="active">
					<a href="javascript:void(0);"><?php echo L('SELECT_TYPE_VIEW');?></a>
				</li>
				<li>
					<a href="<?php echo U('sales/index');?>" <?php if(!isset($assign[type])||$assign[type]==''): ?>class="active"<?php endif; ?>><i class="icon-white icon-chevron-right"></i><?php echo L('ALL');?></a>
				</li>
				<li>
					<a href="<?php echo U('sales/index','type=0&by='.$assign['by']);?>" <?php if($assign[type] == '0'): ?>class="active"<?php endif; ?>><i class="icon-chevron-right"></i><?php echo L('SALES_TICKET');?></a>
				</li>
				<li>
					<a href="<?php echo U('sales/index','type=1&by='.$assign['by']);?>" <?php if($assign[type] == '1'): ?>class="active"<?php endif; ?>><i class="icon-chevron-right"></i><?php echo L('SALES_RETURN');?></a>
				</li>
			</ul>
		</div>
		<div class="span10">
			<div class="pull-left">
				<ul class="nav pull-left">
					<li class="pull-left" style="margin-right:5px;">
						<a id="delete" class="btn"><i class="icon-remove"></i><?php echo L('DELETE');?></a>
					</li>
					<li class="pull-left">
						<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="index.php" method="get">
							<ul class="nav pull-left">
								<li class="pull-left">
									<select style="width:auto" name="field" id="field" onchange="changeCondition()">
										<option class="word" value="sn_code"><?php echo L('SN_CODE');?></option>
										<option class="word" value="subject"><?php echo L('SUBJECT');?></option>
										<option class="word" value="customer_name"><?php echo L('CUSTOMER_NAME');?></option>
										<option class="role" value="create_user_id"><?php echo L('CREATE_SALES_PERSON');?></option>
										<option class="date" value="create_time"><?php echo L('CREATE_TIME');?></option>
										<option class="date" value="update_time"><?php echo L('UPDATE_TIME');?></option>	
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
								<li id="searchContent" class="pull-left"><input id="search" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;</li>
								<li class="pull-left"><input type="hidden" name="m" value="sales"/>
								<?php if($_GET['by']!= ''): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
								<?php if($_GET['type']!= ''): ?><input type="hidden" name="type" value="<?php echo ($_GET['type']); ?>"/><?php endif; ?>
								<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  <?php echo L('SEARCH');?></button></li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo U('sales/add');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD_SALES');?></a>&nbsp;&nbsp;
				<a class="btn btn-primary" href="<?php echo U('sales/add','type=1');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD_SALES_RETURN');?></a>
			</div>
		</div>
		<div class="span10">
			<form id="form" action="<?php echo U('sales/delete');?>" method="Post">
				<table class="table table-hover table-striped table_thead_fixed">
					<thead>
						<tr>
							<th><input class="check_all" id="check_all" type="checkbox" /></th>
							<th></th>
							<th><?php echo L('SN_CODE');?></th>
							<th><?php echo L('SUBJECT');?></th>
							<th><?php echo L('CUSTOMER');?></th>
							<th><?php echo L('SALES_STATUS');?></th>
							<th><?php echo L('AMOUNT');?></th>
							<th><?php echo L('COUNT');?></th>
							<th><?php echo L('FINANCE');?></th>
							<th><?php echo L('CREATE_SALES_PERSON');?></th>
							<th>销售员</th>
							<th><?php echo L('CREATE_TIME');?></th>
							<th><?php echo L('OPERATING');?></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan="14">
								<p><?php echo L('HINT');?>：<img width="17" src="__PUBLIC__/img/check.png"><?php echo L('IS_CHECK');?></p>
								<?php echo ($assign["page"]); ?>
							</td>
						</tr>
					</tfoot>
					<tbody>
						<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<input <?php if($vo["status"] == 1): ?>disabled="true"<?php endif; ?> type="checkbox" class="check_list" name="ids[]" value="<?php echo ($vo["id"]); ?>"/>
								</td>
								<?php if($vo["check_status"] == 1): ?><td><img src="__PUBLIC__/img/check.png"></td>
								<?php else: ?>
									<td></td><?php endif; ?>
								<td><?php echo ($vo["sn_code"]); ?></td>
								<td><?php echo ($vo['subject']); ?></td>
								<td><a target="_blank" href="<?php echo U('customer/view','id='.$vo['customer_id']);?>"><?php echo ($vo['customer_name']); ?></a></td>
								<?php if($vo["type"] == 0): if($vo["status"] == 1): ?><td><?php echo L('YCK');?></td>
									<?php else: ?>
										<td><?php echo L('WCK');?></td><?php endif; ?>
								<?php else: ?>
									<?php if($vo["status"] == 1): ?><td><?php echo L('YRK');?></td>
									<?php else: ?>
										<td><?php echo L('WRK');?></td><?php endif; endif; ?>
								<td><?php echo ($vo['sales_price']); ?></td>
								<td><?php echo ($vo['sales_count']); ?></td>
								<td><?php echo ($vo['finance']); ?></td>
								<td><a rel="<?php echo ($vo['create_user_id']); ?>" class="role_info" href="javascript:void(0);"><?php echo ($vo['create_user_name']); ?></a></td>
								<td><?php echo ($vo['name']); ?></td>
								<td><?php echo (date("Y-m-d",$vo['create_time'])); ?></td>
								<td style="width: 150px;">
									<a href="<?php echo U('sales/view','id='.$vo['id']);?>"><?php echo L('VIEW');?></a>&nbsp;
									<?php if($vo["check_status"] == 0): ?><a class="operation_tips" href="<?php echo U('sales/check','id='.$vo['id']);?>"><?php echo L('CHECK');?></a>&nbsp;
									<?php else: ?>
										<?php if($vo["status"] == 0): ?><a class="operation_tips" href="<?php echo U('sales/removecheck','id='.$vo['id']);?>"><?php echo L('REMOVE_CHECK');?></a>&nbsp;<?php endif; endif; ?>
									<?php if($vo["status"] != 1): ?><a href="<?php echo U('sales/edit','id='.$vo['id']);?>"><?php echo L('EDIT');?></a>&nbsp;
										<a class="operation_tips" href="<?php echo U('sales/delete','id='.$vo['id']);?>"><?php echo L('DELETE');?></a><?php endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<script type="text/javascript">
//全选
$("#check_all").click(function(){
	$("input[class='check_list']").prop('checked', $(this).prop("checked"));
});
//批量删除提示
$('#delete').click(function(){
	var confirm_result = confirm('警告：您正在删除的数据与其它信息有关联，删除该数据后，将连带删除相关信息，请谨慎处理！');
	if(confirm_result){
		$("#form").attr('action', '<?php echo U('sales/delete');?>');
		$("#form").submit();
	}
});
//单个删除提示
$('.operation_tips').click(function(){
	if(confirm("确定要进行该操作么？")){
		return true;
	}else{
		return false;
	}
});
//制单人点击弹窗
$(".role_info").click(function(){
	var role_id = $(this).attr('rel');
	$('#dialog-role-info').dialog('open');
	$('#dialog-role-info').load('<?php echo U('user/dialoginfo','id=');?>'+role_id);
});
//制单人弹窗开启
$("#dialog-role-info").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 500,
	position: ["center",100]
});
</script>

</body>
</html>