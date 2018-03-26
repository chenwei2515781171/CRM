<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="<?php echo L('AUTHOR');?>"/>
    <title><?php echo L('LOGIN_TITLE');?></title>
    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/css/signin.css" rel="stylesheet">
    <link href="__PUBLIC__/css/tan.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="__PUBLIC__/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="__PUBLIC__/css/main2.css" type="text/css">

	<script src="__PUBLIC__/js/jquery-1.9.0.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js" type="text/javascript"></script>

  </head>
  <body>
    <div class="container">
      <form class="form-signin" role="form" method="post" action="">
	    <div class="form-signin-logo"><img src="__PUBLIC__/img/m_logo.gif" /></div>
        <h2 class="form-signin-heading">会员登陆 - <span>禹酒CRM</span></h2>
  		<?php if(is_array($alert)): foreach($alert as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><div class="alert alert-<?php echo ($k); ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo ($vv); ?>
		</div><?php endforeach; endif; endforeach; endif; ?>
		<!--div class="form-group">
		  <label for="name">禹酒集团公司</label>
		  <select class="form-control" onchange="javascript:window.open(this.options[this.selectedIndex].value,'_self')">
			 <option value="/">请选择分公司</option>
			<?php if(is_array($subcompany)): $i = 0; $__LIST__ = $subcompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["url"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		  </select>
	    </div-->
		<div class="form-group">
		  <label><?php echo ($defaultinfo["name"]); ?></label>
	    </div>
        <input class="form-control yu" placeholder="<?php echo L('USER_NAME');?>" name="name" required="" autofocus="" type="text">
        <input class="form-control yu" placeholder="<?php echo L('PASSWORD');?>" name="password" required="" type="password">
        <div class="checkbox">
          <label class="pull-left">
            <input value="remember-me" type="checkbox" name="autologin"> <?php echo L('AUTO_LOGIN_IN_THREE_DAYS');?>
          </label>
          <!--label class="pull-right">
          	&nbsp; <a href="<?php echo U('user/lostpw');?>"><?php echo L('FORGET_PASSWORD');?></a>
          </label-->
        </div>
        <div class="clearfix"></div>
		<input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="<?php echo L('LOGIN');?>" style="margin-top:10px;background-color:#375a5e;border-color:#375a5e;"/>
		<footer style="margin-top:20px;">
        <p>© 龙讯互动</p>
      </footer>
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="__PUBLIC__/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>