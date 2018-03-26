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
	<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
						<ul class="nav pull-left" style="margin-top:20px">
								<li class="pull-left">
								客户筛选&nbsp; <input type="text" id="sx" style="width:50px;"/><button type="button" class="sx-btn">确定</button>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								客户&nbsp; <select style="width:auto" name="customer" id="customer" onchange="changeRole()" autocomplete="off">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($customerList)): $i = 0; $__LIST__ = $customerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["customer_id"]); ?>" <?php if($vo['customer_id'] == intval($_GET['customer'])): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								销售员&nbsp; <select style="width:auto" name="role" id="role" onchange="changeCondition()" autocomplete="off">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($salesuserlist)): $i = 0; $__LIST__ = $salesuserlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>" <?php if($vo['role_id'] == intval($_GET['role'])): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								时间&nbsp; <?php echo L('FROM');?> <input id="start_time" name="start_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate span2" type="text" value="<?php echo ($_GET['start_time']); ?>"> <?php echo L('TO');?> <input id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="end_time" class="Wdate span2" type="text" value="<?php echo ($_GET['end_time']); ?>">&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<input type="hidden" name="act" id="act" value="search"/>
								<input type="hidden" name="hgact" id="hgact" value="search"/>
								<input name="m" value="finance" type="hidden">
								<input name="a" value="huigou" type="hidden">
								<button type="submit" class="btn">  <?php echo L('SEARCH');?></button>
							</li>
						</ul>
					</form>
				</li>				
			</ul>
		</div>
		<style>
		#report_content th{text-align:center;}
		#report_content td{text-align:center;vertical-align:middle}
		</style>
		<div  id="an_chart" style="margin-left:10px;">			
			<div id="report_content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="text-align:center;height:30px;line-height:30px;border:1px #F0F0F0 solid;" colspan="8">回购统计</th>
							<th><a href="javascript:void(0);" id="huigouexcel" class="link"> <i class="icon-download"> </i> 导出表格</a></th>
						</tr>
						<tr>
							<th>客户</th>
							<th>销售单号</th>
							<th>销售额</th>
							<th>已收款</th>
							<th>支付方式</th>
							<th>未收款</th>
							<th>销售员</th>
							<th>时间</th>
							<th>产品详情</th>
							
						</tr>
					</thead>
					<tfoot>
						<tr style="background: #029BE2;color: #fff;font-size: 13px;" colspan="11">
							<td>销售总计：</td>
							<td><?php echo ($all['total_price']); ?></td>
							<td>&nbsp;</td>
							<td>已收款总计：</td>
							<td><?php echo ($al['total_ispay_price']); ?></td>
							<td>&nbsp;</td>
							<td>未收款总计：</td>
							<td><?php echo ($a['total_nopay_price']); ?></td>
							<td>&nbsp;</td>
						</tr>
					</tfoot>
					<tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(is_array($vo["data"])): $k = 0; $__LIST__ = $vo["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($k % 2 );++$k;?><tr>
                        		<?php if($k == 1): ?><td class="user" rowspan="<?php echo ($vo["count"]); ?>"><?php echo ($vo["customer_name"]); ?></td><?php endif; ?>
								<td><a href="<?php echo U('sales/view','id='.$sub['id']);?>"><?php echo ($sub["sn_code"]); ?></a></td>
								<td><?php echo ($sub["sales_price"]); ?></td>
								<td><?php echo ($sub["ispay_price"]); ?></td>
							    <td><?php echo ($sub["pay_type"]); ?></td>
								<td><?php echo ($sub["nopay_price"]); ?></td>
								<td><?php echo ($sub["sale_user_name"]); ?></td>
								<td><?php echo (date("Y-m-d",$sub['create_time'])); ?></td>	
								<td><a class="view_product" rel="<?php echo ($sub["id"]); ?>" href="javascript:void(0);">查看</a></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td colspan="9">
								<?php echo ($page); ?>
							</td>
						</tr>					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="hide" id="dialog-role-info" title="<?php echo L('DIALOG_USER_INFO');?>">loading...</div>
<div class="hide" id="dialog-view-product" title="查看销售商品列表">loading...</div>
<script type="text/javascript">
$(".sx-btn").click(function(){
	var keyword = $("#sx").val();
	$.post("<?php echo U('Customer/sx');?>",{"keyword":keyword},function(data){
		if(data){
			$("#customer").html(data);
		}
   },"text");
})
/*$("#huigouexcel").click(function(){
	if(confirm("你确定要导出回购数据吗？")){
		$("#hgact").val('hgexcel');	
		$("#searchForm").submit();
	}
})*/
$("#huigouexcel").click(function(){
	if(confirm("你确定要导出回购数据吗？")){
		var customer = $("#customer").val();
		var role = $("#role").val();
		var start_time = $("#start_time").val();
		var end_time = $("#end_time").val();
		var url = "<?php echo U('finance/huigou');?>&customer="+customer+"&role="+role+"&start_time="+start_time+"&end_time="+end_time+"&act=hgexcel";
		window.location.href = url;
		//$("#act").val('salesexcel');
		//$("#searchForm").submit();
	}
})
width=800;
$("#dialog-view-product").dialog({
		autoOpen: false,
		modal: true,
		width: width,
		maxHeight: 400,
		position: ["center",100]
	});

	$('.view_product').click(function(){
		var sales_id = $(this).attr('rel');
		$('#dialog-view-product').dialog('open');
		$('#dialog-view-product').load('/index.php?m=sales&a=product_list&id='+sales_id);
	});
</script>

</body>
</html>