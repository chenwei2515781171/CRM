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
	<li <?php if($assign[active] == 'receivables'): ?>class="active"<?php endif; ?>><a  href="<?php echo U('finance/index','t=receivables');?>"><img src="__PUBLIC__/img/yingshoukuan.png"/>&nbsp; <?php echo L('RECEIVABLES');?></a></li>
	<li <?php if($assign[active] == 'payables'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=payables');?>"><img src="__PUBLIC__/img/yingfukuan.png"/> &nbsp; <?php echo L('PAYABLES');?></a></li>
	<li <?php if($assign[active] == 'present'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/present');?>"><img src="__PUBLIC__/img/shoukuandan.png"/> &nbsp; 赠品</a></li>
	<!--li <?php if($assign[active] == 'receivingorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=receivingorder');?>"><img src="__PUBLIC__/img/shoukuandan.png"/> &nbsp; <?php echo L('RECEIVINGORDER');?></a></li>
	<li <?php if($assign[active] == 'paymentorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=paymentorder');?>"><img src="__PUBLIC__/img/fukuandan.png"/> &nbsp; <?php echo L('PAYMENTORDER');?></a></li>
	<li <?php if($assign[active] == 'analytics'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/analytics');?>"><img src="__PUBLIC__/img/tongji.png"/> &nbsp; <?php echo L('STATISTICS');?></a></li-->
</ul>
		</div>
	<a href="<?php echo U('finance/sales');?>" >销售</a> &nbsp;  &nbsp; &nbsp;  &nbsp; 
	<a href="<?php echo U('finance/ziyong');?>" >自用</a> &nbsp;  &nbsp; &nbsp;  &nbsp; 
	<a href="<?php echo U('finance/shoucang');?>">收藏</a> &nbsp;  &nbsp; &nbsp;  &nbsp; 
	<a href="<?php echo U('finance/huigou');?>">回购</a> &nbsp;  &nbsp; &nbsp;  &nbsp; 
	<a href="<?php echo U('finance/zengsong');?>">赠送</a> &nbsp;  &nbsp; &nbsp;  &nbsp; 
	<div>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>	
	<p class="view">
		<!--<b><?php echo L('VIEW_NAV');?></b>
		<img src=" __PUBLIC__/img/by_owner.png"/> 
		<a href="<?php echo U('finance/index','t=receivables');?>" <?php if($_GET['by']== null): ?>class="active"<?php endif; ?>><?php echo L('ALL');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=me');?>" <?php if($_GET['by']== 'me'): ?>class="active"<?php endif; ?>><?php echo L('MY_RESPONSIBLE');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=create');?>" <?php if($_GET['by']== 'create'): ?>class="active"<?php endif; ?>><?php echo L('MY_CREATE');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=sub');?>" <?php if($_GET['by']== 'sub'): ?>class="active"<?php endif; ?>><?php echo L('SUBORDINATE_RESPONSIBLE');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=subcreate');?>" <?php if($_GET['by']== 'subcreate'): ?>class="active"<?php endif; ?>><?php echo L('SUBORDINATE_CREATE');?></a> &nbsp;  &nbsp; -->
		<img src=" __PUBLIC__/img/by_status.png"/> 
		<a href="<?php echo U('finance/index','t=receivables&by=none');?>" <?php if($_GET['by']== 'none'): ?>class="active"<?php endif; ?>><?php echo L('NO_RECEIVING');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=part');?>" <?php if($_GET['by']== 'part'): ?>class="active"<?php endif; ?>><?php echo L('PARTIALLY_RECEIVED');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=all');?>" <?php if($_GET['by']== 'all'): ?>class="active"<?php endif; ?>><?php echo L('HAS_BEEN_RECEIVING');?></a> &nbsp;  &nbsp; 
		<!--<img src="__PUBLIC__/img/by_time.png"/> 
		<a href="<?php echo U('finance/index','t=receivables&by=today');?>" <?php if($_GET['by']== 'today'): ?>class="active"<?php endif; ?>><?php echo L('TODAY RECEIVABLE');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=week');?>" <?php if($_GET['by']== 'week'): ?>class="active"<?php endif; ?>><?php echo L('THIS WEEK RECEIVABLE');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=month');?>" <?php if($_GET['by']== 'month'): ?>class="active"<?php endif; ?>><?php echo L('THIS MONTH RECEIVABLE');?></a> &nbsp; 
		<a href="<?php echo U('finance/index','t=receivables&by=add');?>" <?php if($_GET['by']== 'add'): ?>class="active"<?php endif; ?>><?php echo L('RECENTLY_CREATED');?></a> | 
		<a href="<?php echo U('finance/index','t=receivables&by=update');?>" <?php if($_GET['by']== 'update'): ?>class="active"<?php endif; ?>><?php echo L('RECENTLY_MODIFIED');?></a> 	 &nbsp;  &nbsp; -->
		<a href="<?php echo U('finance/index','t=receivables&by=deleted');?>" <?php if($_GET['by']== 'deleted'): ?>class="active"<?php endif; ?>><img src="__PUBLIC__/img/task_garbage.png"/> <?php echo L('RECYCLE_BIN');?></a>  
	</p>
	<div class="row">
		<div class="span12">
			<div class="pull-left">
				<?php if($_SESSION['admin']== 1 or $_GET['by']!= 'deleted'): ?><a id="delete"  class="btn" style="margin-right: 8px;"><i class="icon-remove"></i> <?php echo L('DELETE');?></a><?php endif; ?>
			</div>
			<div class="pull-left">
				<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="index.php" method="get">
					<ul class="nav pull-left">
					<li class="pull-left">
						<select style="width:auto" name="field" id="field" onchange="changeCondition()">
							<option class="all" value="all"><?php echo L('ANY FIELD');?></option>
							<option class="word" value="name"><?php echo L('RECEIVABLES NAME');?></option>
							<option class="number" value="price"><?php echo L('AMOUNT OF RECEIVING');?></option>
							<!--option class="date" value="pay_time"><?php echo L('RECEIVING TIME');?></option-->
							<option class="receivables_status" value="status"><?php echo L('STATUS');?></option>
							<option class="word" value="description"><?php echo L('DESCRIPTION');?></option>
							<option class="role" value="owner_role_id"><?php echo L('OWNER_ROLE');?></option>
							<!--option class="role" value="creator_role_id"><?php echo L('CREATOR_ROLE');?></option-->
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
					<li class="pull-left"><input type="hidden" name="m" value="finance"/><input type="hidden" name="t" value="receivables"/>
					<?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
					<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  <?php echo L('SEARCH');?></button></li>
					</ul>
				</form>
			</div>
			<div class="pull-right">
				<!--<a class="btn btn-primary" href="<?php echo U('finance/add','t=receivables');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD RECEIVABLES');?></a>
				&nbsp; <a class="btn btn-primary" href="<?php echo U('finance/add','t=receivingorder');?>"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD RECEIVINGORDER');?></a>-->
			</div>
		</div>
		<div class="span12">
			<form id="form1" action="" method="post">
			<table class="table table-hover table-striped table_thead_fixed"> 
				<?php if($list == null): ?><tr><td><?php echo L('EMPTY_TPL_DATA');?></td></tr><?php else: ?>
				<thead>
					<tr>
						<th><input class="check_all" id="check_all" type="checkbox" /></th>
						<th><?php echo L('RECEIVABLES NAME');?></th>
						<th>涉及单据</th>
						<th>类型</th>
						<?php if(C('ismobile') != 1): ?><th><?php echo L('AMOUNT OF RECEIVING');?></th>
							<!--th><?php echo L('RECEIVING TIME');?></th-->
							<th><?php echo L('STATUS');?></th>
							<th>开票金额</th>
							<th>提成金额</th>
							<th><?php echo L('OWNER_ROLE');?></th>
							<!--th><?php echo L('CREATOR_ROLE');?></th--><?php endif; ?>
						<?php if($_GET['by']== 'deleted' and C('ismobile') != 1): ?><th><?php echo L('DELETE_ROLE');?></th>
							<th><?php echo L('DELETE_TIME');?></th>
						<?php elseif(C('ismobile') != 1): ?>
							
							<th><?php echo L('CREATE_TIME');?></th><?php endif; ?>
						
						<th><?php echo L('OPERATING');?></th>
					</tr>
				</thead>
				<tfoot>
					<tr style="background: #029BE2;color: #fff;font-size: 12px;">
						<td colspan="11">当前页金额总计：<?php echo ($money); ?>（元）金额总计：<?php echo ($sum_money); ?>（元）</td>
					</tr>
					<tr>
						<td colspan="11">
							<?php echo ($page); ?>
						</td>
					</tr>
				</tfoot> 
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td>
								<input type="checkbox" class="check_list" name="receivables_id[]" value="<?php echo ($vo["receivables_id"]); ?>"/>
							</td>
							<td><?php echo ($vo["name"]); ?></td>
							<td><?php if($vo["type"] == 0): ?><a href="<?php echo U('sales/view','id='.$vo['bill_id']);?>"><?php else: ?><a href="<?php echo U('purchase/view','id='.$vo['bill_id']);?>"><?php endif; echo ($vo["bill"]); ?></a></td>
							<td><?php if($vo["type"] == 0): echo ($vo["subject"]); else: ?>采购退货<?php endif; ?></td>
							<?php if(C('ismobile') != 1): ?><td><?php echo ($vo["price"]); ?></td>
								<!--td><?php if($vo['pay_time'] > 0): echo (date("Y-m-d",$vo['pay_time'])); endif; ?></td-->
								<td>
									<?php if($vo['status'] == 2): echo L('HAS_BEEN_RECEIVING'); elseif($vo['status'] == 1): echo L('PARTIALLY_RECEIVED');?><font color="red">(<?php echo L('ARREARAGE',array($vo['un_payable']));?>)</font><?php else: echo L('NO_RECEIVING'); endif; ?>
								</td>
								<td><?php echo ($vo["invoice"]); ?></td>
								<td><?php echo ($vo["yt_price"]); ?></td>
								<td><a class="role_info" rel="<?php echo ($vo['owner']['role_id']); ?>" href="javascript:void(0)"><?php echo ($vo['owner']['user_name']); ?></a></td>
								<!--td><a class="role_info" rel="<?php echo ($vo['creator_role_id']); ?>" href="javascript:void(0)"><?php echo ($vo['creator_name']); ?></a></td--><?php endif; ?>
							<?php if($_GET['by']== 'deleted' and C('ismobile') != 1): ?><td><a class="role_info" rel="<?php echo ($vo['delete_role_id']); ?>" href="javascript:void(0)"><?php echo ($vo['deleted']['user_name']); ?></a></td>
								<td><?php if($vo['delete_time'] > 0): echo (date("Y-m-d",$vo['delete_time'])); endif; ?></td>
							<?php elseif(C('ismobile') != 1): ?>
								
								<td><?php if($vo['create_time'] > 0): echo (date("Y-m-d",$vo['create_time'])); endif; ?></td><?php endif; ?>
							
							<td>
								<a href="<?php echo U('finance/view','t=receivables&id='.$vo['receivables_id']);?>"><?php echo L('VIEW');?></a>&nbsp; 
								<?php if($_GET['by']== 'deleted'): ?><a href="<?php echo U('finance/revert','t=receivables&id='.$vo['receivables_id']);?>"><?php echo L('RESET');?></a>
								<?php else: ?>
									<?php if($vo["status"] != '2'): ?><!--a href="<?php echo U('finance/edit','t=receivables&id='.$vo['receivables_id']);?>"><?php echo L('EDIT');?></a-->
										<a class="receivingorder" rel="<?php echo ($vo['receivables_id']); ?>" href="javascript:void(0);"><?php echo L('ADD RECEIVINGORDER');?></a><?php endif; endif; ?>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table><?php endif; ?>
			</form>
		</div> <!-- End #tab1 -->	
	</div> <!-- End #main-content -->
</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<div class="hide" id="dialog-receivingorder" title="<?php echo L('ADD RECEIVINGORDER');?>">loading...</div>
<script type="text/javascript">
	$("#dialog-role-info").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100]
	});
	$("#dialog-receivingorder").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 600,
		position: ["center",100],
		buttons:{
			'确定':function(){
				$('#add_receivingorder_form').submit();
			},
			'取消':function(){
				$(this).dialog('close');
			}
		}
	});
	$(function(){
		<?php if($_GET['field']!= null): ?>$("#field option[value='<?php echo ($_GET['field']); ?>']").prop("selected", true);changeCondition();
			$("#condition option[value='<?php echo ($_GET['condition']); ?>']").prop("selected", true);changeSearch();
			$("#search").prop('value', '<?php echo ($_GET['search']); ?>');<?php endif; ?>
		$("#check_all").click(function(){
			$("input[class='check_list']").prop('checked', $(this).prop("checked"));
		});
		$('#delete').click(function(){
			if(confirm('<?php echo L('CONFIRM_DELETE');?>')){
			<?php if($_SESSION['admin']== 1 and $_GET['by']== 'deleted'): ?>$("#form1").attr('action', '<?php echo U('finance/completedelete','t=receivables');?>');
				$("#form1").submit();
			<?php else: ?>
				$("#form1").attr('action', '<?php echo U('finance/delete','t=receivables');?>');
				$("#form1").submit();<?php endif; ?>
			}
		});
		$(".role_info").click(function(){
			$role_id = $(this).attr('rel');
			$('#dialog-role-info').dialog('open');
			$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
		});

		$(".receivingorder").click(function(){
			var id = $(this).attr('rel');
			$('#dialog-receivingorder').dialog('open');
			$('#dialog-receivingorder').load('<?php echo U("finance/adddialog","t=receivingorder&id=");?>'+id);
		});
	});
</script>

</body>
</html>