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
		<div class="page-header">
			<h4><a name="tab"><?php echo L('THE_CUSTOMER_DETAILS');?></a></h4>
		</div>
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<div class="row">
			<div class="tabbable span12">
				<ul class="nav nav-tabs">
					<li><a href="#tab1" data-toggle="tab"><?php echo L('BASIC_INFORMATION');?></a></li>
					<li><a href="#tab2"><?php echo L('LINKMAN');?>(<?php echo ($customer['contacts_count']); ?>)</a></li>
					<li><a href="#tab10"><?php echo L('BUSINESS_HISTORY');?>(<?php echo ($customer['business_count']); ?>)</a></li>
					<li><a href="#tab12"><?php echo L('CUMTOMER_CARE');?>(<?php echo ($customer['cares_count']); ?>)</a></li>
					<li><a href="#tab7"><?php echo L('BUY_THE_PRODUCT');?>(<?php echo ($customer['product_count']); ?>)</a></li>
					<li><a href="#tab3"><?php echo L('COMMUNICATION_LOGS');?>(<?php echo ($customer['log_count']); ?>)</a></li>
					<li><a href="#tab11"><?php echo L('CONTRACT');?>(<?php echo ($customer['contract_count']); ?>)</a></li>
					<li><a href="#tab8"><?php echo L('THE_ACCOUNTS_RECEIVABLE');?>(<?php echo ($customer['receivables_count']); ?>)</a></li>
					<li><a href="#tab9"><?php echo L('The_accounts_payable');?>(<?php echo ($customer['payables_count']); ?>)</a></li>
					<li><a href="#tab5"><?php echo L('TASK');?>(<?php echo ($customer['task_count']); ?>)</a></li>
					<li><a href="#tab6"><?php echo L('SCHEDULE');?>(<?php echo ($customer['event_count']); ?>)</a></li>
					<li><a href="#tab4"><?php echo L('FILE');?>(<?php echo ($customer['file_count']); ?>)</a></li>
				</ul>
				<div class="tab-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td <?php if(C('ismobile') != 1): ?>colspan="4"<?php else: ?>colspan="2"<?php endif; ?>>
                                    <p style="font-size: 14px;">
                                        <?php if($customer['is_deleted'] == 0): if($customer['owner_role_id'] == 0): ?><a rel="<?php echo ($customer['customer_id']); ?>" class="fenpei" href="javascript:void(0)"><?php echo L('DISTRIBUTION');?></a>  | 
                                                <a href="<?php echo U('customer/receive', 'customer_id='.$customer['customer_id']);?>"><?php echo L('RECEIVE');?></a> | 
                                            <?php else: ?>
                                                <a href="<?php echo U('customer/fenpei', 'by=put&customer_id='.$customer['customer_id']);?>"><?php echo L('IN_THE_CUSTOMER_POOL');?></a> |<?php endif; ?>
                                            <a href="javascript:void(0);" class="add_contacts"><?php echo L('ADD_A_CONTACT');?></a> |
                                            <a href="javascript:void(0);" class="add_log"><?php echo L('ADD_THE_COMMUNICATION_LOG');?></a> |
                                            <a href="javascript:void(0);" class="add_task"><?php echo L('ADD_TASKS');?></a> |
                                            <a href="javascript:void(0);" class="add_event"><?php echo L('ADD_THE_SCHEDULE');?></a>&nbsp;|
                                            <a href="javascript:void(0);" class="add_file"><?php echo L('ADD_FILES');?></a>&nbsp;|
                                            <a href="<?php echo U('customer/edit', 'id='.$customer['customer_id']);?>"><?php echo L('COMPILE');?></a>&nbsp;|
                                            <a href="<?php echo U('customer/delete', 'id='.$customer['customer_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;|
                                            <a href="javascript:void(0)" onclick="javascript:history.go(-1)"><?php echo L('RETURN');?></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" onclick="javascript:history.go(-1)"><?php echo L('RETURN');?></a><?php endif; ?>
                                    </p>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="4"><?php echo L('BASIC_INFORMATION');?></th>
                            </tr>
                            <tr>
                                <td class="tdleft" width="15%"><?php echo L('CREATION_TIME');?></td>
                                <td><?php if($customer['create_time'] != 0): echo (date('Y-m-d H:i:s',$customer["create_time"])); endif; ?></td>
                                <td class="tdleft"><?php echo L('FOUNDER');?></td>
                                <td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($customer["create"]["role_id"]); ?>"><?php echo ($customer["create"]["user_name"]); ?></a></td>
                            </tr>
                            <?php if($customer['is_deleted'] == 1): ?><tr>
                                <td class="tdleft"><?php echo L('DELETE_THE_PEOPLE');?></td>
                                <td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($customer["deleted"]["role_id"]); ?>"><?php echo ($customer["deleted"]["user_name"]); ?></a></td>
                                <td class="tdleft" width="15%"><?php echo L('DELETE_THE_TIME');?></td>
                                <td><?php echo (date('Y-m-d H:i:s',$customer["delete_time"])); ?></td>
                            </tr><?php endif; ?>
                            <tr>
                                <td class="tdleft"><?php echo L('PRINCIPAL');?></td>
                                <td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($customer["owner"]["role_id"]); ?>"><?php echo ($customer["owner"]["user_name"]); ?></a> &nbsp;  &nbsp; <a href="<?php echo U('customer/customerlock','customer_id='.$customer['customer_id']);?>"><?php if($customer['is_locked'] and $customer['owner_role_id']): ?><img title="<?php echo L('UNLOCKING');?>" src="__PUBLIC__/img/customer_locking.png"/><?php elseif($customer['owner_role_id']): ?><img title="<?php echo L('LOCKING');?>" src="__PUBLIC__/img/customer_unlocking.png"/><?php endif; ?></a></td>
                                <td class="tdleft" width="15%"><?php echo L('THE_LAST_MODIFICATION_TIME');?></td>
                                <td><?php if($customer['update_time'] > 0): echo (date('Y-m-d H:i:s',$customer["update_time"])); endif; ?></td>
                            </tr>
                            <tr>
                                <td class="tdleft" width="15%"><?php echo L('THE_PRIMARY_CONTACT');?></td>
                                <td><a href="<?php echo U('contacts/view','id='.$customer[contacts_id]);?>"><?php echo ($customer[contacts_name]); ?></td>
                            <?php $j=0; ?>
                            <?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $j++; ?>
                            <?php if($vo['form_type'] == 'textarea' or $vo['form_type'] == 'editor'): if($i%2 != 0): ?><td colspan="2">&nbsp;</td>
                                </tr><?php endif; ?>
                                <tr>
                                    <td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
                                    <td colspan="3"><?php echo ($customer[$vo['field']]); ?></td>
                                </tr>
                                <?php if($i%2 == 0 && count($field_list) != $j): $i++; endif; ?>
                            <?php else: ?>
                                <?php if($i%2 == 0): ?><tr><?php endif; ?>
                                    <td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
                                    <td width="35%">
                                        <span style="color:#<?php echo ($vo['color']); ?>">
                                        <?php if($vo['form_type'] == 'datetime'): if($customer[$vo['field']] > 0): echo (date('Y-m-d',$customer[$vo['field']])); endif; ?>
                                        <?php else: ?>
                                            <?php echo ($customer[$vo['field']]); endif; ?>
                                        </span>
                                    </td>
                                <?php if($i%2 != 0): ?></tr><?php endif; ?>
                                <?php if($i%2 == 0 && count($field_list) == $j): ?><td colspan="2">&nbsp;</td>
                                </tr><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <a name="tab2"></a><div style="height:40px;">&nbsp;</div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('LINKMAN');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["contacts"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td width="15%">&nbsp;</td>
                                <td width="20%"><?php echo L('NAME');?></td>
                                <td width="10%"><?php echo L('CELLPHONE');?></td>
                                <td width="10%">QQ</td>
                                <td width="20%">email</td>
                                <?php if(C('ismobile') != 1): ?><td width="25%"><?php echo L('CONTACT_ADDRESS');?></td><?php endif; ?>
                            </tr>
                            <?php if(is_array($customer["contacts"])): $i = 0; $__LIST__ = $customer["contacts"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft" >
                                        <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('contacts/view', 'id='.$vo['contacts_id']);?>"><?php echo L('CHECK');?></a> &nbsp;<a href="<?php echo U('contacts/edit', 'id='.$vo['contacts_id'].'&redirect=customer&redirect_id='.$customer['customer_id']);?>"><?php echo L('COMPILE');?></a>&nbsp;
                                        <a href="<?php echo U('contacts/mdelete', 'id='.$vo['contacts_id'].'&r=rContactsCustomer&module_id='.$customer['customer_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;
                                        <a href="<?php echo U('contacts/changeToFirstContact', 'id='.$vo['contacts_id'].'&customer_id='.$customer['customer_id']);?>"><?php echo L('SET_AS_PRIMARY');?></a><?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo ($vo["name"]); if($vo['is_firstContact'] == 'true'): ?>&nbsp;<span style="color:red;">( <?php echo L('THE_PRIMARY_CONTACT');?> )</span><?php endif; echo ($vo["saltname"]); ?>
                                    </td>
                                    <td>
                                        <?php if(C('ismobile') == 1): ?><a href="tel:<?php echo ($vo["telephone"]); ?>"><?php echo ($vo["telephone"]); ?></a><?php else: echo ($vo["telephone"]); endif; ?>
                                    </td>
									 <td>
                                        <?php if(C('ismobile') == 1): ?><a href="qq:<?php echo ($vo["qq"]); ?>"><?php echo ($vo["qq"]); ?></a><?php else: echo ($vo["qq"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(C('ismobile') == 1): ?><a href="mailto:<?php echo ($vo["email"]); ?>"><?php echo ($vo["email"]); ?></a><?php else: echo ($vo["email"]); endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php echo ($vo["address"]); ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_contacts"><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <a name="tab10"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('BUSINESS_HISTORY');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["business"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td width="15%">&nbsp;</td>
                                <td><?php echo L('BUSINESS_NAME');?></td>
                                <td><?php echo L('STATE');?></td>
                                <td><?php echo L('PRINCIPAL');?></td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('creation_time');?></td><?php endif; ?>
                            </tr>
                            <?php if(is_array($customer["business"])): $i = 0; $__LIST__ = $customer["business"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft" >
                                        <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('business/view', 'id='.$vo['business_id']);?>"><?php echo L('CHECK');?></a> &nbsp;<a href="<?php echo U('business/edit', 'id='.$vo['business_id']);?>"><?php echo L('COMPILE');?></a><?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo U('business/view', 'id='.$vo['business_id']);?>"><?php echo ($vo["name"]); ?></a>
                                    </td>
                                    <td>
                                        <?php echo ($vo["status"]); ?>
                                    </td>										
                                    <td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                            <?php if($vo['create_time'] > 0): echo (date("Y-m-d",$vo["create_time"])); endif; ?>
                                        </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="5"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('business/add','customer_id='.$customer['customer_id']);?>" target="_blank"><?php echo L('add');?></a><?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <a name="tab12"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('CUMTOMER_CARE');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if(empty($customer['cares'])): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td width="20%">&nbsp;</td>
                                <td><?php echo L('CARE_THEME');?></td>
                                <td><?php echo L('DATE_OF_CARE');?></td>
                                <td><?php echo L('TYPE');?></td>
                                <td><?php echo L('PRINCIPAL');?></td>
                            </tr>
                            <?php if(is_array($customer["cares"])): $i = 0; $__LIST__ = $customer["cares"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft">
                                        <a href="<?php echo U('customer/caresview','id='.$vo['care_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('customer/caresdelete','id='.$vo['care_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>
                                    </td>
                                    <td>
                                        <?php echo ($vo["subject"]); ?>
                                    </td>
                                    <td>
                                        <?php if(isset($vo["care_time"])): echo (date("Y-m-d H:i:s",$vo["care_time"])); endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo['type'] == 'message'): echo L('NOTE');?>
                                        <?php elseif($vo['type'] == 'phone'): ?>
                                            <?php echo L('PHONE');?>
                                        <?php elseif($vo['type'] == 'email'): ?>
                                            <?php echo L('EMAIL');?>
                                        <?php elseif($vo['type'] == 'other'): ?>
                                            <?php echo L('OTHER');?>
                                        <?php else: ?>
                                            <?php echo L('NONE'); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["to_name"])): echo ($vo["to_name"]); endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td colspan="5">
                                <a href="<?php echo U('customer/caresadd','customer_id='.$customer['customer_id']);?>" target="_blank"><?php echo L('ADD');?></a>
                            </td>
                        </tr>
                    </table>
                    <a name="tab7"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('BUY_THE_PRODUCT');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["product"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                        <thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td><?php echo L('PRODUCT_NAME');?></td>
                                <td><?php echo L('CLINCH_A_DEAL_VALENCE');?></td>
                                <td><?php echo L('QUANTITY');?></td>
                                <td><?php echo L('THE_COST_PRICE');?></td>
                                <?php if(C('ismobile') != 1): ?><td width="30%"><?php echo L('REMARK');?></td><?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($customer["product"])): $i = 0; $__LIST__ = $customer["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft"><a href="<?php echo U('product/view', 'id='.$vo['product_id']);?>"><?php echo L('CHECK');?></a></td>
                                    <td>
                                        <a href="<?php echo U('product/view', 'id='.$vo['product_id']);?>"><?php echo ($vo["name"]); ?></a>
                                    </td>
                                    <td>
                                        <?php if($vo['sales_price'] > 0): echo ($vo["sales_price"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo['amount'] > 0): echo ($vo["amount"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo['cost_price'] > 0): echo ($vo["cost_price"]); endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php echo ($vo["description"]); ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                        </tr>
                        </tbody><?php endif; ?>
                    </table>
                    <a name="tab3"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('COMMUNICATION_LOGS');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["log"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?></td>
                            </tr>
                        <?php else: ?>
                            <?php if(is_array($customer["log"])): $i = 0; $__LIST__ = $customer["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?> &nbsp; 
                                        <?php echo (date("Y-m-d  H:i:s",$vo["create_date"])); ?> &nbsp; 
                                        <?php if(!empty($vo["create_date"])): ?>&nbsp;<?php endif; ?>
                                        <?php if(C('ismobile') == 1): ?><br/><?php endif; ?>
                                        <?php echo ($vo["subject"]); ?>
                                    </td>
                                    <td>
                                        <?php if($customer['is_deleted'] != 1): ?><a href="javascript:void(0)" rel="<?php echo ($vo["log_id"]); ?>" class="edit_log"><?php echo L('COMPILE');?></a>&nbsp; <a href="<?php echo U('log/delete','r=RCustomerLog&id='.$vo['log_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php if(strlen($vo['content']) > 100): ?><div id="slog_<?php echo ($vo["log_id"]); ?>">
                                            <pre><?php echo (msubstr($vo["content"],0,100)); ?>
                                            <a class="more" rel="<?php echo ($vo["log_id"]); ?>" href="javascript:void(0)"><?php echo L('READ_MORE');?></a></pre>
                                            </div>
                                            <div id="llog_<?php echo ($vo["log_id"]); ?>" class="hide">
                                                <pre><?php echo ($vo["content"]); ?></pre>
                                            </div>
                                        <?php else: ?>
                                            <pre><?php echo ($vo["content"]); ?></pre><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <?php if($customer['is_deleted'] != 1): ?><tr>
                            <td colspan="2">
                                <a href="javascript:void(0);" class="add_log"><?php echo L('ADD');?></a>
                            </td>
                        </tr><?php endif; ?>
                    </table>
                    <a name="tab11"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('THE_RELEVANT_CONTRACT');?></th>
                        </tr>
                    </table>
                    <table class="table table-hover">
                        <?php if($customer["contract"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?></td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td>&nbsp;</td>
                                <td><?php echo L('Contract_no');?></td>
                                <td><?php echo L('SIGNING_TIME');?></td>
                                <td><?php echo L('OFFER');?></td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('PRINCIPAL');?></td>
                                <td><?php echo L('CREATION_TIME');?></td><?php endif; ?>
                            </tr>
                            <?php if(is_array($customer["contract"])): $i = 0; $__LIST__ = $customer["contract"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft"><?php if($customer['is_deleted'] == 0): ?><a target="_blank" href="<?php echo U('contract/view','id='.$vo['contract_id']);?>"><?php echo L('CHECK');?></a> &nbsp; <a target="_blank" href="<?php echo U('contract/edit','id='.$vo['contract_id']);?>"><?php echo L('COMPILE');?></a><?php endif; ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo U('contract/view','id='.$vo['contract_id']);?>"><?php echo ($vo["number"]); ?></a>
                                    </td>									
                                    <td><?php if(!empty($vo["due_time"])): echo (date("Y-m-d",$vo["due_time"])); endif; ?></td>
                                    <td>
                                        <?php echo ($vo["price"]); ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                    </td>
                                    <td><?php if(!empty($vo["create_time"])): echo (date("Y-m-d  H:i:s",$vo["create_time"])); endif; ?></td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <?php if($business['is_deleted'] == 0): ?><tr>
                                <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                    <a target="_blank" href="<?php echo U('contract/add');?>"><?php echo L('ADD');?></a>
                                </td>
                            </tr><?php endif; ?>
                    </table>
                    <a name="tab8"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('THE_ACCOUNTS_RECEIVABLE');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["receivables"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                        <thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td><?php echo L('THE_ACCOUNTS_RECEIVABLE_ACCOUNTS_RECEIVABLE');?></td>
                                <td><?php echo L('CONTRACT');?></td>
                                <td><?php echo L('STATE');?></td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('MONEY');?></td>
                                <td><?php echo L('PRINCIPAL');?></td><?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($customer["receivables"])): $i = 0; $__LIST__ = $customer["receivables"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft"><a href="<?php echo U('finance/view', 't=receivables&id='.$vo['receivables_id']);?>"><?php echo L('CHECK');?></a></td>
                                    <td>
                                        <a href="<?php echo U('finance/view', 't=receivables&id='.$vo['receivables_id']);?>"><?php echo ($vo["name"]); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo U('contract/view', 'id='.$vo['contract_id']);?>"><?php echo ($vo["contract_name"]); ?></a>
                                    </td>
                                    <td>
                                        <?php if($vo['status'] == 2): echo L('HAS_BEEN_RECEIVING'); elseif($vo['status'] == 1): echo L('PART_OF_THE_RECEIVED'); else: echo L('DID_NOT_RECEIVE_PAYMENT'); endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php if($vo['price'] > 0): echo ($vo["price"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a target="_blank" href="<?php echo U('finance/add','t=receivables');?>"><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                        </tbody><?php endif; ?>
                    </table>
                    <a name="tab9"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('The_accounts_payable');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["payables"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                        <thead>
                            <tr>
                                <td>&nbsp;</td>
                                <td><?php echo L('The_accounts_payable');?></td>
                                <td><?php echo L('CONTRACT');?></td>
                                <td><?php echo L('STATE');?></td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('MONEY');?></td>
                                <td><?php echo L('PRINCIPAL');?></td><?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($customer["payables"])): $i = 0; $__LIST__ = $customer["payables"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft"><a href="<?php echo U('finance/view', 't=payables&id='.$vo['payables_id']);?>"><?php echo L('CHECK');?></a></td>
                                    <td>
                                        <a href="<?php echo U('finance/view', 't=payables&id='.$vo['payables_id']);?>"><?php echo ($vo["name"]); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo U('contract/view', 'id='.$vo['contract_id']);?>"><?php echo ($vo["contract_name"]); ?></a>
                                    </td>
                                    <td>
                                        <?php if($vo['status'] == 2): echo L('Payment_has_been'); elseif($vo['status'] == 1): echo L('PART_OF_THE_RECEIVED'); else: echo L('DID_NOT_RECEIVE_PAYMENT'); endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php if($vo['price'] > 0): echo ($vo["price"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a target="_blank" href="<?php echo U('finance/add','t=payables');?>" ><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                        </tbody><?php endif; ?>
                    </table>
                    <a name="tab5"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('Related_tasks');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["task"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td><?php echo L('THEME');?></td>
                                <td><?php echo L('STATE');?></td>
                                <td>负责人</td>
                                <td>任务相关人</td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('MODIFICATION_TIME');?></td>
                                <td><?php echo L('DUE_DATE');?></td><?php endif; ?>
                            </tr>
                            <?php if(is_array($customer["task"])): $i = 0; $__LIST__ = $customer["task"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft">
                                        <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('task/view','id='.$vo['task_id']);?>" target="_blank"><?php echo L('CHECK');?></a>&nbsp;
											<a href="<?php echo U('task/delete','id='.$vo['task_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp; 
											<?php if($vo["isclose"] == 0): ?><a href="<?php echo U('task/close','id='.$vo['task_id']);?>"><?php echo L('CLOSE');?></a>
											<?php elseif($vo["isclose"] == 1): ?>
												<a href="<?php echo U('task/open','id='.$vo['task_id']);?>"><?php echo L('OPEN');?></a><?php endif; endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo U('task/view','id='.$vo['task_id']);?>"><?php echo ($vo["subject"]); ?></a>
                                    </td>
                                    <td>
                                        <?php echo ($vo["status"]); ?>
                                    </td>
									<td>
										<?php if(!empty($vo["owner"])): if(is_array($vo["owner"])): $i = 0; $__LIST__ = $vo["owner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</td>
									<td>
										<?php if(!empty($vo["about_roles"])): if(is_array($vo["about_roles"])): $i = 0; $__LIST__ = $vo["about_roles"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php if(!empty($vo["update_date"])): echo (date("Y-m-d H:i:s",$vo["update_date"])); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["due_date"])): echo (date("Y-m-d H:i:s",$vo["due_date"])); endif; ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_task"><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <a name="tab6"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('RELATED_SCHEDULE');?></th>
                        </tr>
                    </table>
                    <table class="table">
                        <?php if($customer["event"] == null): ?><tr>
                                <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                            </tr>
                        <?php else: ?> 
                            <tr>
                                <td width="10%">&nbsp;</td>
                                <td><?php echo L('THEME');?></td>
                                <td><?php echo L('SITE');?></td>
                                <td><?php echo L('PRINCIPAL');?></td>
                                <?php if(C('ismobile') != 1): ?><td><?php echo L('The_start_time');?></td>
                                <td><?php echo L('THE_END_TIME');?></td><?php endif; ?>
                            </tr>
                            <?php if(is_array($customer["event"])): $i = 0; $__LIST__ = $customer["event"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td class="tdleft">
                                        <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('event/view','id='.$vo['event_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('event/delete','id='.$vo['event_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;
                                        <?php if($vo["isclose"] == 0): ?><a href="<?php echo U('event/close','id='.$vo['event_id']);?>"><?php echo L('CLOSE');?></a><?php elseif($vo["isclose"] == 1): ?><a href="<?php echo U('event/open','id='.$vo['event_id']);?>"><?php echo L('OPEN');?></a><?php endif; endif; ?>
                                    </td>
                                    <td>
                                        <?php echo ($vo["subject"]); ?>
                                    </td>
                                    <td>
                                        <?php echo ($vo["venue"]); ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                    </td>
                                    <?php if(C('ismobile') != 1): ?><td>
                                        <?php if(!empty($vo["start_date"])): echo (date("Y-m-d",$vo["start_date"])); endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($vo["end_date"])): echo (date("Y-m-d",$vo["end_date"])); endif; ?>
                                    </td><?php endif; ?>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_event"><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <a name="tab4"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('The_relevant_documents');?></th>
                        </tr>
                    </table>
                    <table class="table">
                    <?php if($customer["file"] == null): ?><tr>
                            <td><?php echo L('THERE_IS_NO_DATA');?> </td>
                        </tr>
                    <?php else: ?> 
                        <tr>
                            <td>&nbsp;</td>
                            <td><?php echo L('FILENAME');?></td>
                            <td><?php echo L('SIZE');?></td>
                            <?php if(C('ismobile') != 1): ?><td><?php echo L('ADDER');?></td>
                            <td><?php echo L('ADDTIME');?></td><?php endif; ?>
                        </tr>
                        <?php if(is_array($customer["file"])): $i = 0; $__LIST__ = $customer["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="tdleft">
                                    <?php if($customer['is_deleted'] == 0): ?><a href="<?php echo U('file/delete', 'id='.$vo['file_id'].'&r=RCustomerFile');?>" class="del_confirm"><?php echo L('DELETE');?></a><?php endif; ?>
                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo ($vo["file_path"]); ?>"><?php echo ($vo["name"]); ?></a>
                                </td>
                                <td>
                                    <?php echo ($vo["size"]); echo L('BYTE');?>
                                </td>
                                <?php if(C('ismobile') != 1): ?><td>
                                    <?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
                                </td>
                                <td>
                                    <?php if($vo["create_date"] != 0): echo (date("Y-m-d H:i:s",$vo["create_date"])); endif; ?>
                                </td><?php endif; ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <tr>
                            <td <?php if(C('ismobile') != 1): ?>colspan="5"<?php else: ?>colspan="3"<?php endif; ?>>
                                <?php if($customer['is_deleted'] == 0): ?><a href="javascript:void(0);" class="add_file"><?php echo L('ADD');?></a><?php endif; ?>
                            </td>
                        </tr>
                    </table>
				</div>
			</div>
		</div>
	</div>
<div class="hide" id="dialog-file" title="<?php echo L('ADD_ATTACHMENT');?>">loading...</div>
<div class="hide" id="dialog-log" title="<?php echo L('ADD_THE_LOG');?>">loading...</div>
<div class="hide" id="dialog-log-edit" title="<?php echo L('EDIT_LOG');?>">loading...</div>
<div class="hide" id="dialog-contacts" title="<?php echo L('ADD_A_CONTACT');?>">loading...</div>
<div class="hide" id="dialog-task" title="<?php echo L('ADD_TASKS');?>">loading...</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFORMATION');?>">loading...</div>
<div class="hide" id="dialog-event" title="<?php echo L('ADD_THE_SCHEDULE');?>">loading...</div>
<div class="hide" id="dialog-fenpei" title="<?php echo L('DISTRIBUTION_OF_CUSTOMERS');?>">loading...</div>
<script type="text/javascript">
<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-file").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-log").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-fenpei").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position: ["center",100],
	buttons: {
		"Ok": function () {
			$('#fenpei_form').submit();	
			$(this).dialog("close");
		},
		"Cancel": function () {
			$(this).dialog("close");
		}
	}
});
$("#dialog-log-edit").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-contacts").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	buttons: { 
		"<?php echo L('AFFIRM');?>": function () {
			$('#select_contacts').submit();
			$(this).dialog("close"); 
		},
		"<?php echo L('CANCEL');?>": function () {
			$(this).dialog("close");
		}
	},
	position: ["center",100]
});
$("#dialog-task").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-event").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100]
});
$(function(){
	$(".add_file").click(function(){
		$('#dialog-file').dialog('open');
		$('#dialog-file').load('<?php echo U("file/add","r=RCustomerFile&module=customer&id=".$customer["customer_id"]);?>');
	});
	$(".add_log").click(function(){
		$('#dialog-log').dialog('open');
		$('#dialog-log').load('<?php echo U("log/add","r=RCustomerLog&module=customer&id=".$customer["customer_id"]);?>');
	});
	$(".edit_log").click(function(){
		$log_id = $(this).attr('rel');
		$('#dialog-log-edit').dialog('open');
		$('#dialog-log-edit').load('<?php echo U("log/edit","id=");?>'+$log_id);
	});
	$(".add_contacts").click(function(){
		$('#dialog-contacts').dialog('open');
		$('#dialog-contacts').load('<?php echo U("contacts/checklistdialog","r=RContactsCustomer&module=customer&id=".$customer["customer_id"]);?>');
	});
	$(".add_task").click(function(){
		$('#dialog-task').dialog('open');
		$('#dialog-task').load('<?php echo U("task/add","r=RCustomerTask&module=customer&id=".$customer["customer_id"]);?>');
	});
	$(".add_event").click(function(){
		$('#dialog-event').dialog('open');
		$('#dialog-event').load('<?php echo U("event/add","r=RCustomerEvent&module=customer&id=".$customer["customer_id"]);?>');
	});
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});
	$(".more").click(function(){
		log_id = $(this).attr('rel');
		$('#llog_'+log_id).attr('class','');
		$('#slog_'+log_id).attr('class','hide');
	});
	$(".fenpei").click(function(){
		$customer_id = $(this).attr('rel');
		$('#dialog-fenpei').dialog('open');
		$('#dialog-fenpei').load('<?php echo U("customer/fenpei","customer_id=");?>'+$customer_id);
	});
});
</script>

</body>
</html>