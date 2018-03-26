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
</div><div class="container">	<!--div class="page-header">		<h4><?php echo L('FINANCE');?><small> - <a href="<?php echo U('finance/index','t=receivables');?>"><?php echo L('RECEIVABLES');?></a> | 		<a href="<?php echo U('finance/index','t=payables');?>"><?php echo L('PAYABLES');?></a> | 		<a class="active" href="<?php echo U('finance/index','t=receivingorder');?>"><?php echo L('RECEIVINGORDER');?></a> | 		<a href="<?php echo U('finance/index','t=paymentorder');?>"><?php echo L('PAYMENTORDER');?></a> | <a href="<?php echo U('finance/analytics');?>"><?php echo L('STATISTICS');?></a></small> </h4>	</div>	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>		<p class="view">		<?php if($info['is_deleted'] == 0): ?><a href="<?php echo U('finance/edit','t=receivingorder&id='.$info['receivingorder_id']);?>"><?php echo L('EDIT');?></a> | 		<a href="<?php echo U('finance/delete','t=receivingorder&id='.$info['receivingorder_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a> |<?php endif; ?>		<a href="javascript:void(0);" type="button" onclick="javascript:history.go(-1)" ><?php echo L('RETURN');?></a>	</p-->	<div class="row">		<div class="tabbable span12">			<div class="tab-content">					<table class="table table-hover">						<tbody>							<tr>								<th colspan="4"><?php echo L('RECEIVINGORDER DETAILS');?></th>							</tr>							<tr>								<td class="tdleft" width="15%"><b><?php echo L('RECEIVINGORDER NUMBER');?></b>:</td>								<td><?php echo ($info["name"]); ?></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('RECEIVABLES NAME');?></b>:</td>								<td><?php echo ($info['receivables_name']); ?></td>							</tr>							<!--tr>								<td class="tdleft"><b><?php echo L('CONTRACT NUMBER');?></b>:</td>								<td><a href="<?php echo U('contract/view', 'id='.$info['other']['contract_id']);?>"><?php echo ($info["other"]["number"]); ?></a></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('BUSINESS');?></b>:</td>								<td><a href="<?php echo U('business/view','id='.$info['other']['business_id']);?>" target="_blank"><?php echo ($info["other"]["business_name"]); ?></a></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('CUSTOMER');?></b>:</td>								<td><a href="<?php echo U('customer/view','id='.$info['other']['customer_id']);?>" target="_blank"><?php echo ($info["other"]["customer_name"]); ?></a></td>							</tr-->							<tr>								<td class="tdleft"><b><?php echo L('RECEIVING TIME');?></b>:</td>								<td><?php echo (date("Y-m-d",$info['pay_time'])); ?></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('AMOUNT OF RECEIVING');?></b>:</td>								<td><?php echo ($info['money']); ?></td>							</tr>							<tr>								<td class="tdleft"><b>收款方式</b>:</td>								<td><?php echo ($info['pay_type']); ?></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('STATUS');?></b>:</td>								<td><?php if($info['status'] == 1): echo L('HAS CLOSING'); else: echo L('NOT CLOSING'); endif; ?></td>							</tr>							<?php if($info['status'] == 1): ?><tr>								<td class="tdleft"><b><?php echo L('CHECKOUT TIME');?></b>:</td>								<td><?php echo (date("Y-m-d",$info['update_time'])); ?></td>							</tr><?php endif; ?>							<tr>								<td class="tdleft"><b><?php echo L('OWNER_ROLE');?></b>:</td>								<td><a class="role_info" rel="<?php echo ($info['owner_role_id']); ?>" href="javascript:void(0)"><?php echo ($info['owner']['user_name']); ?></a></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('CREATOR_ROLE');?></b>:</td>								<td><a class="role_info" rel="<?php echo ($info['creator_role_id']); ?>" href="javascript:void(0)"><?php echo ($info['creator_name']); ?></a></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('CREATE_TIME');?></b>:</td>								<td><?php echo (date("Y-m-d",$info['create_time'])); ?></td>							</tr>							<tr>								<td class="tdleft"><b><?php echo L('DESCRIPTION');?></b>:</td>								<td colspan="3"><?php if($info["description"] != null): ?><pre><?php echo ($info["description"]); ?></pre><?php endif; ?></td>							</tr>						</tbody>					</table>			</div>		</div>	</div></div><div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div><script type="text/javascript"><?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>	$("#dialog-role-info").dialog({		autoOpen: false,		modal: true,		width: width,		maxHeight: 600,		position: ["center",100]	});	$(function(){		$(".role_info").click(function(){			$role_id = $(this).attr('rel');			$('#dialog-role-info').dialog('open');			$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);		});	});</script>
</body>
</html>