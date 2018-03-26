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
			<div class="nav span12">
				<div class="pull-left">
					<a class="btn" id="delete"><i class="icon-remove"></i><?php echo L('DELETE');?></a>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="javascript:void(0);" id="add_warehouse"><i class="icon-plus"></i>&nbsp; <?php echo L('ADD'); echo L('WAREHOUSE');?></a>&nbsp;&nbsp;
				</div>
			</div>
			<div class="span12">
				<form id="form" method="Post" action="<?php echo U('stock/deletewarehouse');?>">
					<table class="table table-hover table-striped table_thead_fixed">
						<thead>
							<tr>
								<th style="width: 87px;"><input class="check_all" name="check_all" id="check_all" type="checkbox"> &nbsp;</th>
								<th style="width: 209px;"><?php echo L('NAME');?></th>
								<th style="width: 621px;"><?php echo L('DESCRIPTION');?></th>
								<th style="width: 209px;"><?php echo L('CREATE_TIME');?></th>
								<th style="width: 211px;"><?php echo L('OPERATE');?></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td id="td_colspan" colspan="4">
									<?php echo ($assign["page"]); ?>
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td style="width: 87px;">
										<input class="check_list" name="ids[]" value="<?php echo ($vo["id"]); ?>" type="checkbox">
									</td>
									<td style="width: 209px;"><a href="javascript:void(0);" class="edit_warehouse" rel="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></td>
									<td style="width: 621px;"><?php echo ($vo["description"]); ?></td>
									<td style="width: 209px;"><?php echo (date('Y-m-d',$vo[create_time] )); ?></td>
									<td style="width: 211px;">
										<a href="javascript:void(0);" class="edit_warehouse" rel="<?php echo ($vo["id"]); ?>"><?php echo L('EDIT');?></a>&nbsp;&nbsp;
										<a href="<?php echo U('stock/deletewarehouse','id='); echo ($vo["id"]); ?>" class="del_confirm"><?php echo L('DELETE');?></a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>				
						</tbody>					
					</table>
				</form>
			</div>
		</div>
	</div>
<div class="hide" id="dialog-add-warehouse" title="<?php echo L('ADD'); echo L('WAREHOUSE');?>">loading...</div>
<div class="hide" id="dialog-edit-warehouse" title="<?php echo L('EDIT'); echo L('WAREHOUSE');?>">loading...</div>
<script type="text/javascript">
	//添加仓库
	$("#dialog-add-warehouse").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons:{
			'确定':function(){
				$('#add_warehouse_form').submit();
			},
			'取消':function(){
				$(this).dialog('close');
			}
		}
	});
	
	//编辑仓库
	$("#dialog-edit-warehouse").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons:{
			'确定':function(){
				$('#edit_warehouse_form').submit();
			},
			'取消':function(){
				$(this).dialog('close');
			}
		}
	});

	$(function(){
		$('#add_warehouse').click(function(){
			$('#dialog-add-warehouse').dialog('open');
			$('#dialog-add-warehouse').load('<?php echo U('stock/addwarehouse');?>');
		});

		$('.edit_warehouse').click(function(){
			var warehouse_id = $(this).attr('rel');
			$('#dialog-edit-warehouse').dialog('open');
			$('#dialog-edit-warehouse').load('<?php echo U('stock/editwarehouse','id=');?>'+warehouse_id);
		});
		
		//全选
		$("#check_all").click(function(){
			$("input[class='check_list']").prop('checked', $(this).prop("checked"));
		});

		$('#delete').click(function(){
			if(confirm("<?php echo L('ARE_YOU_SRUE_DELETE');?>")){
				$("#form").submit();
			}
		});
	})
</script>

</body>
</html>