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
<script src="__PUBLIC__/js/PCASClass.js" type="text/javascript"></script>
<div class="container">
     <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-xs-12 col-sm-9">
        <?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
        <form role="form" action="<?php echo U('customer/m_edit');?>" method="post" class="form-horizontal">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">主要信息</h3>
               </div>
               <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo ($customer["customer_id"]); ?>">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">客户名称</label>
                      <div class="col-sm-9">
                         <input type="text" class="form-control" id="name" name="name" value="<?php echo ($customer["name"]); ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">客户信息来源</label>
                      <div class="col-sm-9">
                          <select name="origin" class="form-control">
                            <?php if(is_array($origin_list)): $i = 0; $__LIST__ = $origin_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($customer["origin"] == $vo): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">客户行业</label>
                      <div class="col-sm-9">
                          <select name="industry" class="form-control">
                            <?php if(is_array($industry_list)): $i = 0; $__LIST__ = $industry_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($customer["industry"] == $vo): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">公司性质</label>
                      <div class="col-sm-9">
                          <select name="ownership" class="form-control">
                            <?php if(is_array($ownership_list)): $i = 0; $__LIST__ = $ownership_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($customer["ownership"] == $vo): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">客户评分</label>
                      <div class="col-sm-9">
                          <select name="rating" class="form-control">
                            <?php if(is_array($rating_list)): $i = 0; $__LIST__ = $rating_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($customer["rating"] == $vo): ?>selected="selected"<?php endif; ?> value="<?php echo ($vo); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                   </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">客户联系地址</label>
                      <div class="col-sm-9">
                          <select name="address['state']" class="form-control" id="address['state']"></select>
                        </div>
                        <label class="col-sm-2 control-label"></label>
                      <div class="col-sm-9">
                          <select name="address['city']" class="form-control" id="address['city']"></select>
                        </div>
                        <label class="col-sm-2 control-label"></label>
                         <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="区/街道信息" name="address['street']" value="<?php echo ($address["2"]); ?>">
                        </div>
                   </div>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">首要联系人信息</h3>
               </div>
               <div class="panel-body">
                    <div class="form-group">
                      <label for="con_name" class="col-sm-2 control-label">姓名</label>
                      <div class="col-sm-9">
                         <input type="text" class="form-control" id="con_name" name="con_name" value="<?php echo ($customer["contacts"]["name"]); ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <label for="con_post" class="col-sm-2 control-label">职位</label>
                      <div class="col-sm-9">
                         <input type="text" class="form-control" id="con_post" name="con_post" value="<?php echo ($customer["contacts"]["post"]); ?>">
                      </div>
                   </div>
                   <div class="form-group">
                      <label for="con_telephone" class="col-sm-2 control-label">手机</label>
                      <div class="col-sm-9">
                         <input type="text" class="form-control" id="con_telephone" name="con_telephone" value="<?php echo ($customer["contacts"]["telephone"]); ?>">
                      </div>
                   </div>
               </div>
            </div>
			<div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">消费记录</h3>
               </div>
               <div class="panel-body">
                    <?php if(is_array($sales_list)): $i = 0; $__LIST__ = $sales_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('sales/m_edit','id='); echo ($vo["id"]); ?>" class="list-group-item"><span><?php echo ($vo["sn_code"]); ?></span><span class="pull-right"><?php echo ($vo["sales_price"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
               </div>
            </div>
            <div class="form-group col-sm-12">
                <input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/> &nbsp;
                <input name="submit" class="btn" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('RETURN');?>"/>
            </div>
        </form>
    
        </div>
    </div>
    <footer>
        <p>© 龙讯互动</p>
      </footer>
</div>
<script type="text/javascript">
    $(function(){
        new PCAS("address['state']","address['city']","<?php echo ($address["0"]); ?>","<?php echo ($address["1"]); ?>");
    });
</script>

</body>
</html>