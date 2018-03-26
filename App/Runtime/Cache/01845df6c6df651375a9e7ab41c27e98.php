<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="<?php echo L('AUTHOR');?>">
    <title><?php echo C('defaultinfo.name');?> - Powered By <?php echo L('AUTHOR');?></title>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/css/offcanvas.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__PUBLIC__/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="__PUBLIC__/css/main2.css" type="text/css">
	<link rel="stylesheet" href="__PUBLIC__/css/tan.css" type="text/css">
	<link type="text/css" href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet" />
	<script src="__PUBLIC__/js/jquery.js"></script>
	<script src="__PUBLIC__/js/bootstrap.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="__PUBLIC__/js/ie10-viewport-bug-workaround.js"></script>
	<script src="__PUBLIC__/js/offcanvas.js"></script>
	<script src="__PUBLIC__/js/iscroll.js"></script>
	<!--script>
		$(window).scroll(function(){
			$("#sidebar").css("top",$(this).scrollTop());
		})
	</script-->
</head>
  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">展开</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--div class="pull-left visible-xs" style="height:50px;line-height:50px;padding-left:15px;">
          	<img data-toggle="offcanvas" src="__PUBLIC__/img/knowledge.png" alt="" style="height:35px;">
          </div-->
          <a class="navbar-brand" href="<?php echo U('index/index');?>">禹酒CRM系统</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo U('index/m_index');?>">首页</a></li>
            <li><a href="<?php echo U('customer/m_index');?>">客户</a></li>
            <li><a href="<?php echo U('sales/m_index');?>">销售</a></li>
            <li><a href="<?php echo U('sales/m_delivery');?>">配送</a></li>
            <!--li><a href="<?php echo U('task/index');?>"><?php echo L('TASK');?></a></li>
            <li><a href="<?php echo U('announcement/index');?>"><?php echo L('ANNOUNCEMENT');?></a></li>
            <li><a href="<?php echo U('leads/index');?>"><?php echo L('LEADS');?></a></li>
            <li><a href="<?php echo U('business/index');?>"><?php echo L('BUSINESS');?></a></li>
            <li><a href="<?php echo U('sales/statistics');?>">业绩</a></li-->
            <li><a href="<?php echo U('user/logout');?>">退出</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
<div class="container">
	 <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-xs-12 col-sm-12 content">

		 <?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>

          <div class="well"><img style="height:30px;" src="__PUBLIC__/img/working_platform.png"/> &nbsp;<?php echo (session('name')); ?><a href="<?php echo U('customer/m_add');?>" id="add" class="btn btn-primary pull-right" ><i class="icon-plus"></i>添加客户</a>
        </div>
		
		<div class="list-group" id="datas">
			<a href="javascript:void(0);" class="list-group-item active">客户列表</a>
			<?php if(is_array($customerlist)): $i = 0; $__LIST__ = $customerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('customer/m_edit','id='); echo ($vo["customer_id"]); ?>" class="list-group-item clearfix"><span><?php echo ($vo["name"]); ?></span><span class="pull-right"><?php echo ($vo["telephone"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<?php if($count > 10): ?><button type="button" onclick="getMore()" id="getMore" rel="2" class="btn btn-default btn-lg btn-block">加载更多...</button><?php endif; ?>
		<hr>
		</div>
	</div>
</div>

</body>
</html>
<script>
function getMore(){
	var p = $("#getMore").attr("rel");
	$.ajax({
		type:'get',
		url:"<?php echo U('customer/m_index','p=');?>"+p,
		async:false,
		success:function(data){
			var temp = '';
			if(data.data.list != null){
				$.each(data.data.list, function(k, v){
					temp += "<a href='<?php echo U('customer/m_edit','id=');?>"+v.customer_id+"' class='list-group-item clearfix'><span>"+v.name+"</span><span class='pull-right'>"+v.telephone+"</span></a>";
				});
				$('#datas').append(temp);
				$("#getMore").attr("rel",data.data.nextp);
			}else{
				$("#getMore").html("没有更多信息");
			}
		},
		dataType:'json'
	});		
}
</script>