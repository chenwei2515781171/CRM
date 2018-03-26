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
		<div>
			<ul class="nav nav-list">
				<a href="<?php echo U('sales/analyticssales');?>" class="active">销售记录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo U('sales/salestongji');?>">销售</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo U('sales/zengpintongji');?>">赠品</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo U('sales/ziyongtongji');?>">自用</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo U('sales/analyticsprice');?>">销售提成柱状图</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo U('sales/analyticstable');?>">销售提成(表格)</a>
			</ul>
		</div>
		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
						<ul class="nav pull-left">
							<li class="pull-left">
								<?php echo L('SELECT_DEPARTMENT');?>&nbsp; <select style="width:auto" name="department" id="department" onchange="changeRole()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($vo["department_id"] == $_GET['department']): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('SELECT_USER');?>&nbsp; <select style="width:auto" name="role" id="role" onchange="changeCondition()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($_GET['role']); ?>
										<option <?php if($vo["role_id"] == $_GET['role']): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?>-<?php echo ($vo["user_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('DATE');?>&nbsp; <?php echo L('FROM');?> <input value="<?php echo ($_GET['start_time']); ?>" id="start_time" name="start_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate span2" type="text"> <?php echo L('TO');?> <input id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="end_time" class="Wdate span2" type="text" value="<?php echo ($_GET['end_time']); ?>">&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<input type="hidden" name="act" id="act" value="search"/>
								<input name="m" value="sales" type="hidden">
								<input name="a" value="analyticstable" type="hidden">
								<button type="submit" class="btn">  <?php echo L('SEARCH');?></button>
							</li>
						</ul>
					</form>
				</li>				
			</ul>
		</div>
		<div  id="an_chart" style="margin-left:10px;">			
			<div id="report_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="text-align:center;height:30px;line-height:30px;border:1px #F0F0F0 solid;" colspan="9">销售提成统计&nbsp;(表格)</th>
							<th><a href="javascript:void(0);" id="excelExport" class="link"> <i class="icon-download"> </i> 导出表格</a></th>
						</tr>
						<tr>
							<th>员工名称</th>
							<th>销售编号</th>
							<th>销售主题</th>
							<th>团队提成比例(%)</th>
							<th>自己提成比例(%)</th>
							<th>提成金额(元)</th>
							<th>销售额</th>
							<th>客户</th>
							<th>收款情况</th>
							<th>销售日期</th>
						</tr>
					</thead>
					<tfoot>
						<tr style="background: #029BE2;color: #fff;font-size: 13px;" colspan="10">
							<td>总计：</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><?php echo ($all['owner_price_all']); ?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</tfoot>
					<style>
						table tr .user{text-align:center;vertical-align:middle;}
					</style>
					<tbody>
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(is_array($vo['list'])): $k = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($k % 2 );++$k;?><tr>
								<?php if($k == 1): ?><td class="user" rowspan="<?php echo ($vo["rowspan"]); ?>"><a rel="<?php echo ($vo["user_id"]); ?>" class="role_info" href="javascript:void(0);"><?php echo ($vo["user_name"]); ?></a></td><?php endif; ?>
								<td><a href="<?php echo U('sales/edit','id='); echo ($sub["id"]); ?>" target="_blank"><?php echo ($sub["sn_code"]); ?></a></td>
								<td><?php echo ($sub["subject"]); ?></td>
								<td><?php echo ($sub["team_percent"]); ?></td>
								<td><?php echo ($sub["owner_percent"]); ?></td>
								<td><?php echo ($sub["yt_price"]); ?></td>
								<td><?php echo ($sub["sales_price"]); ?></td>
								<td><a href="<?php echo U('customer/view','id='); echo ($sub["customer_id"]); ?>" target="_blank"><?php echo ($sub["customer_name"]); ?></a></td>
								<td><?php echo ($sub["pay_status"]); ?></td>
								<td><?php echo (date("Y-m-d",$sub['sales_time'])); ?></td>
							</tr>
							<?php if($k == $vo[count]): ?><tr>
									<td>个人总计：</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><?php echo ($vo["owner_price_all"]); ?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr colspan="11" style="height:20px;border-top:1px solid #ebf1f1;"></tr><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<script>
$("#excelExport").click(function(){
	if(confirm("你确定要导出销售提成数据吗？")){
		$("#act").val('excel');	
		$("#searchForm").submit();
	}
})
$(".btn").click(function(){
	$("#act").val('');	
	$("#searchForm").submit();
})
width=600;
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 450,
	position: ["center",100]
});
$(function(){
	$(".role_info").click(function(){
		var role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U('user/dialoginfo','id=');?>'+role_id);
	});
});
function changeRole(){
	department_id = $("#department option:selected").val();
	$.ajax({
		type:'get',
		url:'<?php echo U('user/getrolebydepartment','department_id=');?>'+department_id,
		async:true,
		success:function(data){
			options = '<option value="">全部</option>';
			if(data.data != null){
				$.each(data.data, function(k, v){
					options += '<option value="'+v.role_id+'">'+v.role_name+"-"+v.user_name+'</option>';
				});
			}
			$("#role").html(options);
					},
		dataType:'json'});
}
</script>

</body>
</html>