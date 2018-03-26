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
</div><div class="container">	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>		<!--div class="page-header">		<h4><?php echo L('FINANCE');?><small> - <a class="active" href="<?php echo U('finance/index','t=receivables');?>"><?php echo L('RECEIVABLES');?></a> | 		<a href="<?php echo U('finance/index','t=payables');?>"><?php echo L('PAYABLES');?></a> | 		<a href="<?php echo U('finance/index','t=receivingorder');?>"><?php echo L('RECEIVINGORDER');?></a> | 		<a href="<?php echo U('finance/index','t=paymentorder');?>"><?php echo L('PAYMENTORDER');?></a> | <a href="<?php echo U('finance/analytics');?>"><?php echo L('STATISTICS');?></a></small> </h4>	</div>	<p class="view">		<?php if($info['is_deleted'] == 0): ?><a href="<?php echo U('finance/edit','t=receivables&id='.$info['receivables_id']);?>"><?php echo L('EDIT');?></a> |		<a href="<?php echo U('finance/delete','t=receivables&id='.$info['receivables_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a> |<?php endif; ?>		<a href="javascript:viod(0);" onclick="javascript:history.go(-1)" ><?php echo L('RETURN');?></a>	</p-->	<div class="row">		<div class="span12">			<table class="table table-hover">				<tbody>					<tr>						<th <?php if(C('ismobile') != 1): ?>colspan="4"<?php else: ?>colspan="2"<?php endif; ?>><?php echo L('RECEIVABLES DETAILS');?></th>					</tr>					<tr>						<td class="tdleft" width="15%"><b><?php echo L('RECEIVABLES NAME');?></b>:</td>						<td width="35%"><?php echo ($info["name"]); ?></td>						<?php if(C('ismobile') == 1): ?></tr><tr><?php endif; ?>						<td class="tdleft" width="15%"><b>类型</b>:</td>						<td width="35%"><?php if($info[type] == 0): ?>销售<?php else: ?>采购退货<?php endif; ?></td>					</tr>					<tr>						<td class="tdleft"><b>单号</b>:</td>						<td><?php if($info[type] == 0): ?><a target="_blank" href="<?php echo U('sales/view','id='); echo ($info["bill_id"]); ?>"><?php echo ($info['sn_code']); ?></a><?php else: ?><a target="_blank" href="<?php echo U('purchase/view','id='); echo ($info["bill_id"]); ?>"><?php echo ($info['sn_code']); ?></a><?php endif; ?></td>						<?php if(C('ismobile') == 1): ?></tr><tr><?php endif; ?>						<td class="tdleft"><b><?php echo L('RECEIVING TIME');?></b>:</td>						<td><?php echo (date("Y-m-d",$info['pay_time'])); ?></td>					</tr>					<tr>						<td class="tdleft"><b><?php echo L('AMOUNT OF RECEIVING');?></b>:</td>						<td><?php echo ($info['price']); ?></td>						<?php if(C('ismobile') == 1): ?></tr><tr><?php endif; ?>						<td class="tdleft"><b><?php echo L('OWNER_ROLE');?></b>:</td>						<td><a class="role_info" rel="<?php echo ($info['owner_role_id']); ?>" href="javascript:void(0)"><?php echo ($info['owner']['user_name']); ?></a></td>					</tr>					<tr>						<td class="tdleft"><b><?php echo L('CREATOR_ROLE');?></b>:</td>						<td><a class="role_info" rel="<?php echo ($info['creator_role_id']); ?>" href="javascript:void(0)"><?php echo ($info['creator_name']); ?></a></td>						<?php if(C('ismobile') == 1): ?></tr><tr><?php endif; ?>						<td class="tdleft"><b><?php echo L('CREATE_TIME');?></b>:</td>						<td><?php echo (date("Y-m-d",$info['create_time'])); ?></td>					</tr>					<tr>						<td class="tdleft"><b><?php echo L('DESCRIPTION');?></b>:</td>						<td <?php if(C('ismobile') != 1): ?>colspan="3"<?php endif; ?>><?php if($info["description"] != null): ?><pre><?php echo ($info["description"]); ?></pre><?php endif; ?></td>					</tr>				</tbody>			</table>		</div>		<div class="span12">			<h4><?php echo L('RECEIVING HISTORY');?> <small> - (<?php echo L('RECEIVING HISTORY DETAILS',array(count($info['receivingorder']),$info['num'],$info['num_unCheckOut'],$info['num_unReceivables']));?>)<a id="receivingorder" class="btn btn-mini btn-primary pull-right" href="javascript:void(0);"><?php echo L('ADD');?></a></small></h4>			<table class="table table-hover"> 				<?php if($info['receivingorder'] == null): ?><tr><td><?php echo L('EMPTY_TPL_DATA');?></td></tr><?php else: ?>				<thead>					<tr>						<th><?php echo L('RECEIVINGORDER NUMBER');?></th>						<th><?php echo L('AMOUNT OF RECEIVING');?></th>						<?php if(C('ismobile') != 1): ?><th><?php echo L('OWNER_ROLE');?></th>						<th><?php echo L('RECEIVING TIME');?></th><?php endif; ?>						<th><?php echo L('STATUS');?></th>						<?php if(C('ismobile') != 1): ?><th><?php echo L('OPERATING');?></th><?php endif; ?>					</tr>				</thead>				<tfoot>					<tr>						<td colspan="6">							<?php echo ($page); ?>						</td>					</tr>				</tfoot> 				<tbody>					<form id="form1" action="" method="post">					<?php if(is_array($info['receivingorder'])): $i = 0; $__LIST__ = $info['receivingorder'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>							<td>								<a href="<?php echo U('finance/view','t=receivingorder&id='.$vo['receivingorder_id']);?>"><?php echo ($vo["name"]); ?></a>							</td>							<td><?php echo L('YUAN',array($vo['money']));?>(<?php echo ($vo['pay_type']); ?>)</td>							<?php if(C('ismobile') != 1): ?><td><a class="role_info" rel="<?php echo ($vo['owner']['role_id']); ?>" href="javascript:void(0)"><?php echo ($vo['owner']['user_name']); ?></a></td>							<td><?php if($vo["pay_time"] > 0): echo (date("Y-m-d",$vo['pay_time'])); endif; ?></td><?php endif; ?>							<td><?php if($vo['status'] == 1): echo L('HAS CLOSING'); else: echo L('NOT CLOSING'); endif; ?></td>							<?php if(C('ismobile') != 1): ?><td>								<a href="<?php echo U('finance/view','t=receivingorder&id='.$vo['receivingorder_id']);?>" target="blank"><?php echo L('VIEW');?></a>&nbsp; 								<a data="<?php echo ($vo['status']); ?>" rel="<?php echo U('finance/edit','t=receivingorder&id='.$vo['receivingorder_id']);?>" href="javascript:void(0);" class="del-rec-order"><?php echo L('EDIT');?></a>&nbsp; 								<!--a href="<?php echo U('finance/delete','t=receivingorder&id='.$vo['receivingorder_id'].'&refer=receivables');?>" class="del_confirm"><?php echo L('DELETE');?></a-->							</td><?php endif; ?>						</tr><?php endforeach; endif; else: echo "" ;endif; ?>					</form>				</tbody>			</table><?php endif; ?>		</div>	</div></div><div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div><div class="hide" id="dialog-receivingorder" title="<?php echo L('ADD RECEIVINGORDER');?>">loading...</div><script type="text/javascript">	<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>	$("#dialog-role-info").dialog({		autoOpen: false,		modal: true,		width: width,		maxHeight: 600,		position: ["center",100]	});	$("#dialog-receivingorder").dialog({		autoOpen: false,		modal: true,		width: width,		maxHeight: 600,		position: ["center",100],		buttons:{			'确定':function(){				$('#add_receivingorder_form').submit();			},			'取消':function(){				$(this).dialog('close');			}		}	});	$(function(){		$(".role_info").click(function(){			$role_id = $(this).attr('rel');			$('#dialog-role-info').dialog('open');			$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);		});		$("#receivingorder").click(function(){			$('#dialog-receivingorder').dialog('open');			$('#dialog-receivingorder').load('<?php echo U("finance/adddialog","t=receivingorder&id=");?>'+<?php echo ($info['receivables_id']); ?>);		});		$('.del-rec-order').click(function(){			var id = $(this).attr('data');			var url = $(this).attr('rel');			if(id==1){				alert("该收款单已结账，不可修改");			}else{				window.location.href = 'http://'+location.host+url;			}		});	});</script>
</body>
</html>