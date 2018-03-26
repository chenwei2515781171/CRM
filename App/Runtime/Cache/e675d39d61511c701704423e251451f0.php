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
<script src="__PUBLIC__/js/PCASClass.js" type="text/javascript"></script>
<div class="container">
	<!-- Docs nav ================================================== -->
	<div class="page-header">
		<h4><a name="tab"><?php echo L('PRODUCT_DETAILS');?></a></h4>
	</div>
	<div class="row">
		<div class="span12">
			<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
			<ul class="nav nav-tabs">
				<li><a href="#tab1"><?php echo L('BASIC_INFORMATION');?></a></li>
				<li><a href="#tab2"><?php echo L('THE_LOG');?>(<?php echo ($product['log_count']); ?>)</a></li>
				<li><a href="#tab4"><?php echo L('TASK');?>(<?php echo ($product['task_count']); ?>)</a></li>
				<li><a href="#tab5"><?php echo L('SCHEDULE');?>(<?php echo ($product['event_count']); ?>)</a></li>
				<li><a href="#tab3"><?php echo L('FILE');?>(<?php echo ($product['file_count']); ?>)</a></li>
			</ul>
			<div class="tab-content">
					<table class="table">
						<thead>
							<tr>
								<td <?php if(C('ismobile') == 1): ?>colspan="2"<?php else: ?>colspan="4"<?php endif; ?>>
									<p style="font-size: 14px;">
										<a href="javascript:void(0);" class="add_log"><?php echo L('ADD_THE_LOG');?></a> |
										<a href="javascript:void(0);" class="add_task"><?php echo L('ADD_TASKS');?></a> |
										<a href="javascript:void(0);" class="add_event"><?php echo L('ADD_THE_SCHEDULE');?></a> |
										<a href="javascript:void(0);" class="add_file"><?php echo L('ADD_ATTACHMENT');?></a> |
										<a href="<?php echo U('product/edit','id='.$product['product_id']);?>"><?php echo L('COMPILE');?></a> |
										<a href="<?php echo U('product/delete','id='.$product['product_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a> |
										<a href="javascript:void(0);" onclick="javascript:history.go(-1)"><?php echo L('RETURN');?></a>
									</p>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr><th colspan="4"><?php echo L('BASIC_INFORMATION');?></th></tr>
							 <tr>
								<td class="tdleft" width="15%"><?php echo L('CREATION_TIME');?></td>
								<td><?php if($product['create_time'] != 0): echo (date('Y-m-d H:i:s',$product["create_time"])); endif; ?></td>
								<td class="tdleft"><?php echo L('ADD_THE_INFORMATION_ON_PRODUCTS');?></td>
								<td><a class="role_info" href="javascript:void(0)" rel="<?php echo ($product["owner"]["role_id"]); ?>"><?php echo ($product["owner"]["user_name"]); ?></if></a></td>
							</tr>
                            <?php $j=0; ?>
                            <?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $j++; ?>
                            <?php if($vo['form_type'] == 'textarea' or $vo['form_type'] == 'editor'): if($i%2 == 0): ?><td colspan="2">&nbsp;</td>
                                </tr><?php endif; ?>
                                <tr>
                                    <td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
                                    <td colspan="3"><?php echo ($product[$vo['field']]); ?></td>
                                </tr>
                                <?php if($i%2 != 0 && count($field_list) != $j): $i++; endif; ?>
                            <?php else: ?>
                                <?php if($i%2 != 0): ?><tr><?php endif; ?>
                                    <td class="tdleft" width="15%"><?php echo ($vo["name"]); ?>:</td>
                                    <td width="35%">
                                        <span style="color:#<?php echo ($vo['color']); ?>">
                                        <?php if($vo['form_type'] == 'datetime'): if($product[$vo['field']] > 0): echo (date('Y-m-d',$product[$vo['field']])); endif; ?>
                                        <?php elseif($vo['form_type'] == 'p_box'): ?>
                                            <?php echo ($product["category_name"]); ?>
                                        <?php else: ?>
                                            <?php echo ($product[$vo['field']]); endif; ?>
                                        </span>
                                    </td>
                                <?php if($i%2 == 0): ?></tr><?php endif; ?>
                                <?php if($i%2 != 0 && count($field_list) == $j): ?><td colspan="2">&nbsp;</td>
                                </tr><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
                    <a name="tab2"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('RELATE_LOG');?></th>
                        </tr>
                    </table>
					<table class="table">
						<?php if($product["log"] == null): ?><tr>
								<td><?php echo L('THERE_IS_NO_DATA');?></td>
							</tr>
						<?php else: ?>
							<?php if(is_array($product["log"])): $i = 0; $__LIST__ = $product["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td>
										<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?> &nbsp; 
										<?php echo (date("Y-m-d  g:i:s a",$vo["create_date"])); ?> &nbsp; 
										<?php if(!empty($vo["create_date"])): ?>&nbsp;<?php endif; ?>
										<?php if(C('ismobile') == 1): ?><br/><?php endif; ?>
										<?php echo ($vo["subject"]); ?>
									</td>
									<td>
										<a href="javascript:void(0)" rel="<?php echo ($vo["log_id"]); ?>" class="edit_log"><?php echo L('COMPILE');?></a>&nbsp;
										<a href="<?php echo U('log/delete','r=RLogProduct&id='.$vo['log_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>
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
						<tr>
							<td colspan="2">
								<a href="javascript:void(0);" class="add_log"><?php echo L('ADD');?></a>
							</td>
						</tr>
					</table>
                    <a name="tab3"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('THE_RELEVANT_DOCUMENTS');?></th>
                        </tr>
                    </table>
					<table class="table">
						<?php if($product["file"] == null): ?><tr>
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
							<?php if(is_array($product["file"])): $i = 0; $__LIST__ = $product["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td class="tdleft">
										<a href="<?php echo U('file/delete','r=RFileProduct&id='.$vo['file_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>
									</td>
									<td>
										<a target="_blank" href="<?php echo ($vo["file_path"]); ?>"><?php echo ($vo["name"]); ?></a>
									</td>
									<td>
										<?php echo ($vo["size"]); echo L('BYTE');?>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php if(!empty($vo["owner"]["user_name"])): echo ($vo["owner"]["user_name"]); ?> [<?php echo ($vo["owner"]["department_name"]); ?>-<?php echo ($vo["owner"]["role_name"]); ?>]<?php endif; ?>
									</td>
									<td>
										<?php if(!empty($vo["create_date"])): echo (date("Y-m-d g:i:s a",$vo["create_date"])); endif; ?>
									</td><?php endif; ?>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						<tr>
							<td <?php if(C('ismobile') != 1): ?>colspan="5"<?php else: ?>colspan="3"<?php endif; ?>>
								<a href="javascript:void(0);" class="add_file"><?php echo L('ADD');?></a>
							</td>
						</tr>
					</table>
                    <a name="tab4"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('RELATED_TASKS');?></th>
                        </tr>
                    </table>
					<table class="table">
						<?php if($product["task"] == null): ?><tr>
								<td><?php echo L('THERE_IS_NO_DATA');?> </td>
							</tr>
						<?php else: ?> 
							<tr>
								<td width="12%">&nbsp;</td>
								<td><?php echo L('THEME');?></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo L('STATE');?></td><?php endif; ?>
								<td>负责人</td>
                                <td>任务相关人</td>
								<td><?php echo L('DUE_DATE');?></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo L('MODIFICATION_TIME');?></td><?php endif; ?>
							</tr>
							<?php if(is_array($product["task"])): $i = 0; $__LIST__ = $product["task"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td class="tdleft" >
										<a href="<?php echo U('task/view','id='.$vo['task_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('task/delete', 'id='.$vo['task']);?>" class="del_confirm"><?php echo L('DELETE');?></a>
										<?php if($vo["isclose"] == 0): ?><a href="<?php echo U('task/close', 'id='.$vo['task_id']);?>"><?php echo L('CLOSE');?></a><?php elseif($vo["isclose"] == 1): ?><a href="<?php echo U('task/open','id='.$vo['task_id']);?>"><?php echo L('OPEN');?></a><?php endif; ?>
									</td>
									<td>
										<?php echo ($vo["subject"]); ?>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php echo ($vo["status"]); ?>
									</td><?php endif; ?>
									<td>
										<?php if(!empty($vo["owner"])): if(is_array($vo["owner"])): $i = 0; $__LIST__ = $vo["owner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</td>
									<td>
										<?php if(!empty($vo["about_roles"])): if(is_array($vo["about_roles"])): $i = 0; $__LIST__ = $vo["about_roles"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["user_name"]); ?></a>,<?php endforeach; endif; else: echo "" ;endif; endif; ?>
									</td>
									<td>
										<?php if(!empty($vo["due_date"])): echo (date("Y-m-d g:i:s a",$vo["due_date"])); endif; ?>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php if(!empty($vo["update_date"])): echo (date("Y-m-d",$vo["update_date"])); endif; ?>
									</td><?php endif; ?>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						<tr>
							<td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
								<a href="javascript:void(0);" class="add_task"><?php echo L('ADD');?></a>
							</td>
						</tr>
					</table>
                    <a name="tab5"></a><div style="height:40px;"></div>
                    <table class="table table-hover">
                        <tr>
                            <th><?php echo L('RELATED_SCHEDULE');?></th>
                        </tr>
                    </table>
					<table class="table">
						<?php if($product["event"] == null): ?><tr>
								<td><?php echo L('THERE_IS_NO_DATA');?> </td>
							</tr>
						<?php else: ?> 
							<tr>
								<td width="12%">&nbsp;</td>
								<td><?php echo L('THEME');?></td>
								<td><?php echo L('SITE');?></td>
								<td><?php echo L('PRINCIPAL');?></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo L('THE_START_TIME');?></td>
								<td><?php echo L('THE_END_TIME');?></td><?php endif; ?>
							</tr>
							<?php if(is_array($product["event"])): $i = 0; $__LIST__ = $product["event"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td  class="tdleft">
										<a href="<?php echo U('event/view','id='.$vo['event_id']);?>"><?php echo L('CHECK');?></a>&nbsp; <a href="<?php echo U('event/delete', 'id='.$vo['event_id']);?>" class="del_confirm"><?php echo L('DELETE');?></a>&nbsp;
										<?php if($vo["isclose"] == 0): ?><a href="<?php echo U('event/close', 'id='.$vo['event_id']);?>"><?php echo L('CLOSE');?></a><?php elseif($vo["isclose"] == 1): ?><a href="<?php echo U('event/open','id='.$vo['event_id']);?>"><?php echo L('OPEN');?></a><?php endif; ?>
									</td>
									<td>
										<?php echo ($vo["subject"]); ?>
									</td>
									<td>
										<?php echo ($vo["venue"]); ?>
									</td>
									<td>
										<?php if(!empty($vo["owner"]["user_name"])): echo ($vo["owner"]["user_name"]); ?> [<?php echo ($vo["owner"]["department_name"]); ?>-<?php echo ($vo["owner"]["role_name"]); ?>]<?php endif; ?>
									</td>
									<?php if(C('ismobile') != 1): ?><td>
										<?php if(!empty($vo["start_date"])): echo (date("Y-m-d g:i:s a",$vo["start_date"])); endif; ?>
									</td>
									<td>
										<?php if(!empty($vo["end_date"])): echo (date("Y-m-d g:i:s a",$vo["end_date"])); endif; ?>
									</td><?php endif; ?>
								</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						<tr>
							<td <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?>>
								<a href="javascript:void(0);" class="add_event"><?php echo L('ADD');?></a>
							</td>
						</tr>
					</table>
			</div>
		</div>
	</div>
</div>
<div class="hide" id="dialog-file" title="<?php echo L('ADD_ATTACHMENT');?>">loading...</div>
<div class="hide" id="dialog-log" title="<?php echo L('ADD_THE_LOG');?>">loading...</div>
<div class="hide" id="dialog-task" title="<?php echo L('ADD_TASKS');?>">loading...</div>
<div class="hide" id="dialog-log-edit" title="<?php echo L('EDIT_LOG');?>">loading...</div>
<div class="hide" id="dialog-event" title="<?php echo L('ADD_THE_SCHEDULE');?>">loading...</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFORMATION');?>">loading...</div>
<script type="text/javascript">
<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>
$(".role_info").click(function(){
	$role_id = $(this).attr('rel');
	$('#dialog-role-info').dialog('open');
	$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
});
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
$("#dialog-log-edit").dialog({
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
$(".add_file").click(function(){
	$('#dialog-file').dialog('open');
	$('#dialog-file').load('<?php echo U("file/add","r=RFileProduct&module=product&id=".$product["product_id"]);?>');
});
$(".add_log").click(function(){
	$('#dialog-log').dialog('open');
	$('#dialog-log').load('<?php echo U("log/add","r=RLogProduct&module=product&id=".$product["product_id"]);?>');
});
$(".add_task").click(function(){
	$('#dialog-task').dialog('open');
	$('#dialog-task').load('<?php echo U("task/add","r=RProductTask&module=product&id=".$product["product_id"]);?>');
});
$(".edit_log").click(function(){
	$log_id = $(this).attr('rel');
	$('#dialog-log-edit').dialog('open');
	$('#dialog-log-edit').load('<?php echo U("log/edit","id=");?>'+$log_id);
});
$(".add_event").click(function(){
	$('#dialog-event').dialog('open');
	$('#dialog-event').load('<?php echo U("event/add","r=REventProduct&module=product&id=".$product["product_id"]);?>');
});
$(".more").click(function(){
	log_id = $(this).attr('rel');
	$('#llog_'+log_id).attr('class','');
	$('#slog_'+log_id).attr('class','hide');
});
</script>

</body>
</html>