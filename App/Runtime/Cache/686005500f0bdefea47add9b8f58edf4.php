<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta charset="UTF-8">
	<title>出库单</title>
	<script src="__PUBLIC__/js/jquery-1.9.0.min.js?t=20140830" type="text/javascript"></script>
	<style>
		/* CSS reset*/
		body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td{padding:0;margin:0;}
		table{border-collapse:collapse;border-spacing:0;}
		fieldset,img{border:0;}
		address,caption,cite,code,dfn,em,strong,th,var {font-weight:normal;font-style:normal;}
		ol,ul{list-style:none;}
		caption,th{text-align:left;}
		h1,h2,h3,h4,h5,h6{font-weight:normal;font-size:100%;}
		q:before,q:after{content:'';}
		abbr,acronym {border:0;}

		.box{width:1200px;min-height:450px;margin:0 auto;margin-top:50px;}
		.box .top{height:110px;position:relative;text-align:center;}
		.box .top .logo{position:absolute;top:0;left:10px;}
		.box .top .title h1{font-size:40px;margin:0;padding:10px 0 5px 0;font-weight:bold;}
		.box .top .title p{font-size:20px;margin:;}
		.box .center{width:100%;padding:0 15px;box-sizing:border-box;margin:10px 0;}
		.box .center span{min-width:380px;display:inline-block;font-size:27px;}
		.table table{text-align:center;border-top:1px solid #000;border-left:1px solid #000;font-size:23px;}
		.table table tr td{border-bottom:1px solid #000;border-right:1px solid #000;}
		.table table td{height:30px;}
		.table table span{min-width:60px;display:inline-block;}
		 .Noprint{margin:20px 0 30px 0;}
	</style>
</head>
<body>
	<style media="print">
        .Noprint{
            display: none;
        }
    </style>
	<center class="Noprint">
        <p>
            <object id="WebBrowser" classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2" height="0"
                width="0">
            </object>
            <!--input type="button" value="打印" onclick="document.all.WebBrowser.ExecWB(6,1)"-->
            <input type="button" value="直接打印" onclick="document.all.WebBrowser.ExecWB(6,6)">
            <input type="button" value="页面设置" onclick="document.all.WebBrowser.ExecWB(8,1)">
            <input type="button" value="打印预览" onclick="document.all.WebBrowser.ExecWB(7,1)">
            <br />
        </p>
    </center>
	<div class="box">
		<div class="top">
			<div class="logo"><img src="__PUBLIC__/img/image001.png" alt="" width="200" height="80"></div>
			<div class="title">
				<h1>出&nbsp&nbsp库&nbsp&nbsp单</h1>
				<p>第*联</p>
			</div>
		</div>
		<div class="center">
			<span>申请部门：<?php echo ($info["bumen"]); ?></span>
			<span>业务员：<?php echo ($info["name"]); ?></span>
			<span>制单日期：<?php echo ($info["time"]); ?></span>
		</div>
		<script>
			$(function(){
				var num = $(".table table tr").size();
				$("#row").attr('rowspan',num);
			})
		</script>
		<?php if($rate['discount_rate'] == 0): ?><div class="table">
			<table width="100%">
				<tr>
					<td colspan="2">出库单号</td>
					<td colspan="4"><?php echo ($info["sncode"]); ?></td>
					<td colspan="2">发票号</td>
					<td colspan="2"></td>
					<td id="row" style="width:55px;font-size:20px;border-right:1px solid #fff;border-top:1px solid #fff;border-bottom:1px solid #fff;">
						<div style="width:20px;float:left;margin:0 5px;">②客户 红 &nbsp ④财务 绿</div>
						<div style="width:20px;float:left;">①存根 白 &nbsp ③申请人 黄</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">客户名称</td>
					<td colspan="2"><?php echo ($info["customer"]); ?></td>
					<td>联系人</td>
					<td><?php echo ($info["contacts"]); ?></td>
					<td colspan="2">联系电话</td>
					<td colspan="2"><?php echo ($info["telephone"]); ?></td>
				</tr>
				<tr>
					<td colspan="2">客户类别</td>
					<td><?php echo ($info["ctype"]); ?></td>
					<td>出库类别</td>
					<td colspan="2"><?php echo ($info["subject"]); ?></td>
					<td colspan="2">收款方式</td>
					<td colspan="2"><?php echo ($info["pay_str"]); ?></td>
				</tr>
				<tr>
					<td colspan="2">地址</td>
					<td colspan="4"><?php echo ($info["address"]); ?></td>
					<td colspan="2">是否收款</td>
					<td colspan="2"><?php echo ($info["finance"]); ?></td>
				</tr>
				<tr>
					<td>序号</td>
					<td>产品编码</td>
					<td colspan="2">产品名</td>
					<td colspan="2">型号（规格）</td>
					<td>单价</td>
					<td>数量</td>
					<td>金额</td>
					<td>备注</td>
				</tr>
				<?php if(!empty($info["product"])): if(is_array($info["product"])): $k = 0; $__LIST__ = $info["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($vo["product_id"]); ?></td>
							<td colspan="2"><?php echo ($vo["product_name"]); ?></td>
							<td colspan="2"><?php echo ($vo["product_standard"]); ?></td>
							<td><?php echo ($vo["unit_price"]); ?></td>
							<td><?php echo ($vo["amount"]); ?></td>
							<td><?php echo ($vo["prime_price"]); ?></td>
							<td><?php echo ($vo["description"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<?php if(!empty($info["present"])): ?><tr>
						<td colspan="10">赠品列表</td>
					</tr>
					<?php if(is_array($info["present"])): $k = 0; $__LIST__ = $info["present"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($vo["product_id"]); ?></td>
							<td><?php echo ($vo["product_name"]); ?></td>
							<td colspan="3"><?php echo ($vo["standard"]); ?></td>
							<td><?php echo ($vo["price"]); ?></td>
							<td><?php echo ($vo["amount"]); ?></td>
							<td><?php echo ($vo["all_price"]); ?></td>
							<td></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<tr>
					<td colspan="2">合计</td>
					<td colspan="8">
						<?php echo ($info["price"]); ?>
					</td>
				</tr>
			</table>
		</div>
		<?php else: ?>
		<div class="table">
		<table width="100%">
				<tr>
					<td colspan="2">出库单号</td>
					<td colspan="4"><?php echo ($info["sncode"]); ?></td>
					<td colspan="2">发票号</td>
					<td colspan="2"></td>
					<td id="row" style="width:55px;font-size:20px;border-right:1px solid #fff;border-top:1px solid #fff;border-bottom:1px solid #fff;">
						<div style="width:20px;float:left;margin:0 5px;">②客户 红 &nbsp ④财务 绿</div>
						<div style="width:20px;float:left;">①存根 白 &nbsp ③申请人 黄</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">客户名称</td>
					<td colspan="2"><?php echo ($info["customer"]); ?></td>
					<td>联系人</td>
					<td><?php echo ($info["contacts"]); ?></td>
					<td colspan="2">联系电话</td>
					<td colspan="2"><?php echo ($info["telephone"]); ?></td>
				</tr>
				<tr>
					<td colspan="2">客户类别</td>
					<td><?php echo ($info["ctype"]); ?></td>
					<td>出库类别</td>
					<td colspan="2"><?php echo ($info["subject"]); ?></td>
					<td colspan="2">收款方式</td>
					<td colspan="2"><?php echo ($info["pay_str"]); ?></td>
				</tr>
				<tr>
					<td colspan="2">地址</td>
					<td colspan="4"><?php echo ($info["address"]); ?></td>
					<td colspan="2">是否收款</td>
					<td colspan="2"><?php echo ($info["finance"]); ?></td>
				</tr>
				<tr>
					<td>序号</td>
					<td>产品编码</td>
					<td>产品名</td>
					<td colspan="2">型号（规格）</td>
					<td>折扣(%)</td>
					<td>单价</td>
					<td>数量</td>
					<td>金额</td>
					<td>备注</td>
				</tr>
				<?php if(!empty($info["product"])): if(is_array($info["product"])): $k = 0; $__LIST__ = $info["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($vo["product_id"]); ?></td>
							<td><?php echo ($vo["product_name"]); ?></td>
							<td colspan="2"><?php echo ($vo["product_standard"]); ?></td>
							<td><?php echo ($vo["discount_rate"]); ?></td>
							<td><?php echo ($vo["unit_price"]); ?></td>
							<td><?php echo ($vo["amount"]); ?></td>
							<td><?php echo ($vo["prime_price"]); ?></td>
							<td><?php echo ($vo["description"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<?php if(!empty($info["present"])): ?><tr>
						<td colspan="10">赠品列表</td>
					</tr>
					<?php if(is_array($info["present"])): $k = 0; $__LIST__ = $info["present"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
							<td><?php echo ($k); ?></td>
							<td><?php echo ($vo["product_id"]); ?></td>
							<td><?php echo ($vo["product_name"]); ?></td>
							<td colspan="3"><?php echo ($vo["standard"]); ?></td>
							<td><?php echo ($vo["price"]); ?></td>
							<td><?php echo ($vo["amount"]); ?></td>
							<td><?php echo ($vo["all_price"]); ?></td>
							<td></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<tr>
					<td colspan="2">合计</td>
					<td colspan="8">
						<?php echo ($info["price"]); ?>
					</td>
				</tr>
			</table>
		</div><?php endif; ?>
		<div class="center">
			<span>仓管经办人：<?php echo ($info["cname"]); ?></span>
			<span>送货单位及经手人：</span>
			<span>收货单位及经手人：</span>
		</div>
	</div>
</body>
</html>