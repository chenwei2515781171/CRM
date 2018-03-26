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
	<!-- Docs nav ================================================== -->
	<div class="page-header" style="border:none; font-size:14px;">
		<ul class="nav nav-tabs">
		  <li><a  href="<?php echo U('customer/index');?>"><img src="__PUBLIC__/img/customer_icon.png"/>&nbsp; <?php echo L('CUSTOMER');?></a></li>
		  <li><a  href="<?php echo U('customer/index','content=resource');?>"><img src="__PUBLIC__/img/customer_source_icon.png"/>&nbsp; <?php echo L('CUSTOMER POOL');?></a></li>
		  <li class="active"><a href="<?php echo U('contacts/index');?>"><img src="__PUBLIC__/img/contacts_icon.png"/> &nbsp;<?php echo L('CONTACTS');?></a></li>
		  <li><a href="<?php echo U('customer/cares');?>"><img src="__PUBLIC__/img/cares_icon.png"/> &nbsp;<?php echo L('CARES');?></a></li>
		  <li><a href="<?php echo U('customer/analytics');?>"><img src="__PUBLIC__/img/tongji.png"/> &nbsp;<?php echo L('THE CUSTOMER STATISTICS');?></a></li>
		</ul>
	</div>
	<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
	<p class="view">
		<b> <?php echo L('THE CONTACTS VIEW');?></b>
		<img src=" __PUBLIC__/img/by_owner.png"/> <a href="<?php echo U('contacts/index');?>" <?php if($_GET['by']== null): ?>class="active"<?php endif; ?>><?php echo L('ALL');?></a> |
		<a href="<?php echo U('contacts/index','by=me');?>" <?php if($_GET['by']== 'me'): ?>class="active"<?php endif; ?>><?php echo L('MY_RESPONSIBLE');?></a> | 
		<a href="<?php echo U('contacts/index','by=sub');?>" <?php if($_GET['by']== 'sub'): ?>class="active"<?php endif; ?>><?php echo L('SUBORDINATE_RESPONSIBLE');?></a>  &nbsp;  &nbsp; 
		<img src="__PUBLIC__/img/by_time.png"/> 
		<a href="<?php echo U('contacts/index','by=today');?>" <?php if($_GET['by']== 'today'): ?>class="active"<?php endif; ?>><?php echo L('TODAY TO ADD');?></a> | 
		<a href="<?php echo U('contacts/index','by=week');?>" <?php if($_GET['by']== 'week'): ?>class="active"<?php endif; ?>><?php echo L('WEEK TO ADD');?></a> | 
		<a href="<?php echo U('contacts/index','by=month');?>" <?php if($_GET['by']== 'month'): ?>class="active"<?php endif; ?>><?php echo L('MONTH TO ADD');?></a>   &nbsp;  
		
		<a href="<?php echo U('contacts/index','by=add');?>" <?php if($_GET['by']== 'add'): ?>class="active"<?php endif; ?>><?php echo L('RECENTLY_CREATED');?></a> | 
		<a href="<?php echo U('contacts/index','by=update');?>" <?php if($_GET['by']== 'update'): ?>class="active"<?php endif; ?>><?php echo L('RECENT_UPDATES');?></a> &nbsp;  &nbsp; 
		<a href="<?php echo U('contacts/index','by=deleted');?>" <?php if($_GET['by']== 'deleted'): ?>class="active"<?php endif; ?>><img src="__PUBLIC__/img/task_garbage.png"/> <?php echo L('RECYCLE_BIN');?></a> 
	</p>
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<?php if($_SESSION['admin']== 1 or $_GET['by']!= 'deleted'): ?><li class="pull-left"><a id="delete"  class="btn" style="margin-right: 8px;"><i class="icon-remove"></i><?php echo L('DELETE');?></a></li><?php endif; ?>
				<li class="pull-left">
				<form class="form-inline" id="searchForm" action="index.php" method="get">
					<ul class="nav pull-left">
						<li class="pull-left">
							<select style="width:auto" id="field" name="field" onchange="changeCondition()">
								<option class="all" value="all"><?php echo L('ANY_FIELD');?></option>
								<option class="word" value="name"><?php echo L('CONTACT_NAME');?></option>
								<option class="role" value="owner_role_id"><?php echo L('OWNER_ROLE');?></option>
								<option class="word" value="telephone"><?php echo L('PHONE');?></option>
								<option class="word" value="qq">QQ</option>
								<option class="word" value="saltname"><?php echo L('RESPECTFULLY');?></option>
								<option class="word" value="email"><?php echo L('EMAIL');?></option>
								<option class="word" value="address"><?php echo L('ADDRESS');?></option>
								<option class="word" value="post"><?php echo L('POSITION');?></option>
								<option class="word" value="description"><?php echo L('REMARK');?></option>
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
						<li id="searchContent" class="pull-left">
							<input id="search" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
						</li>
						<li class="pull-left">
							<input type="hidden" name="m" value="contacts"/>
							<input type="hidden" id="act" name="act" value="search"/>
							<?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
							<button type="submit" class="btn"> <img src="__PUBLIC__/img/search.png"/>  <?php echo L('SEARCH');?> </button>&nbsp;&nbsp;
						</li>
						<li class="pull-left">
							<div class="btn-group" style="margin-right:5px;">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="icon-comment" style="color:rgb(107, 168, 192);"></i><?php echo L('SEND_SMS');?>
									<span class="caret"></span>
								</a>
								
								<ul class="dropdown-menu">
									<li><a id="page_send" href="javascript:void(0)"><?php echo L('PAGE_SEND');?></a></li>
									<li><a id="check_send" href="javascript:void(0)"><?php echo L('CHECK_SEND');?></a></li>
								</ul>
							</div>
							<div class="btn-group">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="icon-envelope" style="color:rgb(107, 168, 192);"></i>&nbsp;<?php echo L('SEND_EMAIL');?>
									<span class="caret"></span>
								</a>
								
								<ul class="dropdown-menu">
									<li><a id="page_send_email" href="javascript:void(0)"><?php echo L('PAGE_SEND');?></a></li>
									<li><a id="check_send_email" href="javascript:void(0)"><?php echo L('CHECK_SEND');?></a></li>
								</ul>
							</div>
						</li>
					</ul>
				</form>
				</li>
			</ul>
			<div class="row pull-right">
				<a href="<?php echo U('contacts/add');?>" class="btn btn-primary"><i class="icon-plus">&nbsp; <?php echo L('NEW_LINK');?></i></a>&nbsp;
				<div class="btn-group">
					<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> <i class="icon-wrench"> &nbsp; <?php echo L('CONTACT_TOOLS');?> </i><span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="javascript:return(0);" id="import_excel"  class="link"><i class="icon-upload"> &nbsp;<?php echo L('IMPORT_CONTACTS');?></i></a></li>
						<li><a href="javascript:void(0);" id="excelExport" class="link"><i class="icon-download"> &nbsp;<?php echo L('EXPORT_CONTACT');?></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="span12">
			<form id="form1" action="" method="post">
				<table class="table table-hover table-striped table_thead_fixed">
					<?php if($contactsList == null): ?><tr><td><?php echo L('EMPTY_TPL_DATA');?></td></tr>
					<?php else: ?>
						<thead>
							<tr>
								<th><input class="check_all" id="check_all" type="checkbox" /> &nbsp;</th>
								<th><?php echo L('CONTACT_NAME');?></th>
								<?php if(C('ismobile') != 1): ?><th><?php echo L('RESPECTFULLY');?></th><?php endif; ?>
								<th><?php echo L('BELONGS TO THE CUSTOMER');?></th>
								<th><?php echo L('PHONE');?></th>					
								<?php if(C('ismobile') != 1): ?><th>QQ</th>
								<th>Email</th></a>
								<th><?php echo L('OWNER_ROLE');?></th>
								<th><?php echo L('CREATOR_ROLE');?></th>								
								<th><?php echo L('CREATE_TIME');?></th><?php endif; ?>
								<?php if((C('ismobile') != 1) and ($_GET['by']== 'deleted')): ?><th><?php echo L('DELETE_THE_PEOPLE');?></th><th><?php echo L('DELETE_TIME');?></th><?php endif; ?>
								<th><?php echo L('OPERATING');?></th>
							</tr>
						</thead>
					 
						<tfoot>
							<tr>
								<?php if($_GET['by']== 'deleted'): ?><tr><td colspan="12"><?php echo ($page); ?></td></tr>
								<?php else: ?><tr><td colspan="10"><?php echo ($page); ?></td></tr><?php endif; ?>
							</tr>
						</tfoot>
						
						<tbody>
							<?php if(is_array($contactsList)): $i = 0; $__LIST__ = $contactsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><input type="checkbox" class="check_list" name="contacts_id[]" value="<?php echo ($vo["contacts_id"]); ?>"/>&nbsp;
								</td>
								<td><a href="<?php echo U('contacts/view', 'id='.$vo['contacts_id']);?>"><?php echo ($vo["name"]); ?></a></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo ($vo["saltname"]); ?></td><?php endif; ?>
								<td><a href="<?php echo U('customer/view', 'id='.$vo['customer']['customer_id']);?>"><?php echo ($vo["customer"]["name"]); ?></a></td>	
								<td><?php if(C('ismobile') != 1 ): echo ($vo["telephone"]); else: ?><a href="tel://<?php echo ($vo["telephone"]); ?>"><?php echo ($vo["telephone"]); ?></a><?php endif; ?></td>
								<?php if(C('ismobile') != 1): ?><td><?php echo ($vo["qq"]); ?></td>
								<td><?php echo ($vo["email"]); ?></td>								
								<td><?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?></td>
								<td><?php if(!empty($vo["creator"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["creator"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["creator"]["user_name"]); ?></a><?php endif; ?></td>
								<td><?php echo (date('Y-m-d H:i',$vo["create_time"])); ?></td><?php endif; ?>
								<?php if((C('ismobile') != 1) and ($_GET['by']== 'deleted')): ?><td><a class="role_info" rel="<?php echo ($vo["delete_role"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["delete_role"]["user_name"]); ?></a></td><td><?php echo (date('Y-m-d H:i',$vo["delete_time"])); ?></td><?php endif; ?>
								<?php if($_GET['by']== 'deleted'): ?><td>
										<a href="<?php echo U('contacts/view', 'id='.$vo['contacts_id']);?>"><?php echo L('VIEW');?></a>&nbsp;
										<a href="<?php echo U('contacts/revert', 'id='.$vo['contacts_id']);?>"><?php echo L('RESET');?></a>
									</td>
								<?php else: ?>
									<td>
										<a href="<?php echo U('contacts/view', 'id='.$vo['contacts_id']);?>"><?php echo L('VIEW');?></a>&nbsp;
										<a href="<?php echo U('contacts/edit', 'id='.$vo['contacts_id']);?>"><?php echo L('EDITING');?></a>
									</td><?php endif; ?>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody><?php endif; ?>
				</table>
			</form>
		</div>
	</div>
</div>
<div class="hide" id="dialog-import" title="<?php echo L('IMPORT_DATA');?>">loading...</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<script type="text/javascript">
$("#dialog-import").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position: ["center",100]
});
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: 600,
	maxHeight: 400,
	position: ["center",100]
});
function changeContent(){
	a = $("#select1  option:selected").val();
	window.location.href="<?php echo U('contacts/index', 'by=');?>"+a;
}

$(function(){
<?php if($_GET['field']!= null): ?>$("#field option[value='<?php echo ($_GET['field']); ?>']").prop("selected", true);changeCondition();
	$("#condition option[value='<?php echo ($_GET['condition']); ?>']").prop("selected", true);changeSearch();
	$("#search").prop('value', '<?php echo ($_GET['search']); ?>');<?php endif; ?>
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	$('#delete').click(function(){
		if(confirm('<?php echo L('ARE_YOU_SURE_YOU_WANT_TO_DELETE');?>')){
		<?php if($_SESSION['admin']== 1 and $_GET['by']== 'deleted'): ?>$("#form1").attr('action', '<?php echo U("contacts/completedelete");?>');
			$("#form1").submit();
		<?php else: ?>
			$("#form1").attr('action', '<?php echo U("contacts/delete");?>');
			$("#form1").submit();<?php endif; ?>
		}
	});
	$("#import_excel").click(function(){
		$('#dialog-import').dialog('open');
		$('#dialog-import').load('<?php echo U("contacts/excelimport");?>');
	});
	$(".role_info").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});
	$("#check_send").click(function(){
		var id_array = new Array();
		$("input[class='check_list']:checked").each(function(){  
			id_array.push($(this).val());
		});
		
		if(id_array.length == 0){
			alert('<?php echo L('YOU_HAVE_NOT_CHOSEN_ANY_CONTACT');?>');
		}else{
			var contacts_ids = id_array.join(",");
			window.location.href="<?php echo U('setting/sendSms', 'model=contacts&contacts_ids=');?>"+contacts_ids;
		}
	});
	$("#check_send_email").click(function(){
		var id_array = new Array();
		$("input[class='check_list']:checked").each(function(){  
			id_array.push($(this).val());
		});
		
		if(id_array.length == 0){
			alert('<?php echo L('YOU_HAVE_NOT_CHOSEN_ANY_CONTACT');?>');
		}else{
			var contacts_ids = id_array.join(",");
			window.location.href="<?php echo U('setting/sendemail', 'model=contacts&contacts_ids=');?>"+contacts_ids;
		}
	});
	$("#page_send").click(function(){
		var id_array = new Array();
		$("input[class='check_list']").each(function(){
			id_array.push($(this).val());
		});
		if(id_array.length == 0){
			alert('<?php echo L('YOU_HAVE_NOT_CHOSEN_ANY_CONTACT');?>');
		}else{
			var contacts_ids = id_array.join(",");
			window.location.href="<?php echo U('setting/sendSms', 'model=contacts&contacts_ids=');?>"+contacts_ids;
		}
	});
	$("#page_send_email").click(function(){
		var id_array = new Array();
		$("input[class='check_list']").each(function(){
			id_array.push($(this).val());
		});
		if(id_array.length == 0){
			alert('<?php echo L('YOU_HAVE_NOT_CHOSEN_ANY_CONTACT');?>');
		}else{
			var contacts_ids = id_array.join(",");
			window.location.href="<?php echo U('setting/sendemail', 'model=contacts&contacts_ids=');?>"+contacts_ids;
		}
	});
	$("#excelExport").click(function(){
		if(confirm("<?php echo L('CONFIRM_EXPORT_CONTACTS');?>")){
			$("#act").val('excel');	
			$("#searchForm").submit();
		}
		$("#act").val('search');	
	})	
})
</script>

</body>
</html>