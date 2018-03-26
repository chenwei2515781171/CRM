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
<script src="__PUBLIC__/js/highcharts.js"></script>
<script src="__PUBLIC__/js/exporting.js"></script>
	<div class="container">
		<div class="page-header" style="border:none; font-size:14px;">
			<ul class="nav nav-tabs">
	<li <?php if($assign[active] == 'sales/index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/index');?>"><img src="__PUBLIC__/img/xiaoshou.png">&nbsp; <?php echo L('SALES_TICKET');?></a></li>
	<li <?php if($assign[active] == 'sales/delivery'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/delivery');?>"><img src="__PUBLIC__/img/customer_source_icon.png"> &nbsp;<?php echo L('DELIVERY_MANAGE');?></a></li>
	<li <?php if($assign[active] == 'sales/analyticssales'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/analyticssales');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('STATISTICS');?></a></li>
	<li <?php if($assign[active] == 'sales/bonus_pool'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sales/bonus_pool');?>"><img src="__PUBLIC__/img/tongji.png"> &nbsp;<?php echo L('BONUS_POOL');?></a></li>
</ul>	
		</div>
		<div class="row">
		<div class="span12">
			<ul class="nav pull-left">
				<li class="pull-left">
					<form class="form-inline" id="searchForm" onsubmit="return checkSearchForm();" action="" method="get">
						<ul class="nav pull-left">
							<li class="pull-left">
								<?php echo L('SELECT_DEPARTMENT');?>&nbsp; <select style="width:auto" name="department" id="department" onchange="changeRole()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('SELECT_USER');?>&nbsp; <select style="width:auto" name="role" id="role" onchange="changeCondition()">
									<option class="all" value="all"><?php echo L('ALL');?></option>
									<?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>"><?php echo ($vo["role_name"]); ?>-<?php echo ($vo["user_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<?php echo L('DATE');?>&nbsp; <?php echo L('FROM');?>&nbsp;<input id="start_time" name="start_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" class="Wdate span2" type="text">&nbsp;<?php echo L('TO');?>&nbsp;<input id="end_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" name="end_time" class="Wdate span2" type="text">&nbsp;&nbsp;
							</li>
							<li class="pull-left">
								<input name="m" value="sales" type="hidden">
								<input name="a" value="analyticsprice" type="hidden">
								<button type="submit" class="btn">  <?php echo L('SEARCH');?></button>
							</li>
						</ul>
					</form>
				</li>				
			</ul>
		</div>
		<div class="span2 knowledgecate">
			<ul class="nav nav-list">
				<li class="active">
					<a href="javascript:void(0);"><?php echo L('ANALYTICS_TYPE');?></a>
				</li>
				<li><a href="<?php echo U('sales/analyticssales');?>" class="active"><i class="icon-white icon-chevron-right"></i>销售记录</a></li>
				<li><a href="<?php echo U('sales/salestongji');?>"><i class="icon-white icon-chevron-right"></i>销售</a></li>
				<li><a href="<?php echo U('sales/zengpintongji');?>"><i class="icon-white icon-chevron-right"></i>赠品</a></li>
				<li><a href="<?php echo U('sales/ziyongtongji');?>"><i class="icon-white icon-chevron-right"></i>自用</a></li>
				<li><a href="<?php echo U('sales/analyticsprice');?>"><i class="icon-white icon-chevron-right"></i>销售提成(柱状图)</a></li>
				<li><a href="<?php echo U('sales/analyticstable');?>"><i class="icon-white icon-chevron-right"></i>销售提成(表格)</a></li>
			</ul>
		</div>
		<div class="span10" style="margin-left: 0px;">
			<div id="report_content">
				<div data-highcharts-chart="0" id="chart"></div>
			</div>
		</div>
	</div>
</div>
<script>
$(function () {
    $('#chart').highcharts({
        chart: {
            type: 'column',
            margin: [ 50, 50, 100, 80]
        },
        title: {
            text: '销售提成统计'
        },
        xAxis: {
            categories: [<?php if(is_array($data[name])): $i = 0; $__LIST__ = $data[name];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>"<?php echo ($vo); ?>",<?php endforeach; endif; else: echo "" ;endif; ?>],
            labels: {
                rotation: 90,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '金额'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>销售额 {point.y:.2f} 元</b>',
        },
        series: [{
            name: 'Population',
            data: [<?php if(is_array($data[owner_price_all])): $i = 0; $__LIST__ = $data[owner_price_all];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
        }],
		credits:{
			enabled:true,
			text:'龙讯CRM系统',
			href:'http://www.longsunhd.com',
		}
    });
});
function changeRole(){
	department_id = $("#department option:selected").val();
	$.ajax({
		type:'get',
		url:'index.php?m=user&a=getrolebydepartment&department_id='+department_id,
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