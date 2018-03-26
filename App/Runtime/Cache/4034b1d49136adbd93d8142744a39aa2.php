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
	<div class="page-header">
		<h3 class="text_center"><?php echo L('VIEW'); echo L('SALES_TICKET');?><span class="span_code">—— <?php echo ($assign["info"]["sn_code"]); ?></span></h3>
		<div class="pannel_01">
			<div class="pannel_02">
				<span><?php echo L('CUSTOMER');?></span>
				<input class="span2" type="text" value="<?php echo ($assign["info"]["customer_name"]); ?>">
				<span>销售员</span>
				<input class="span2" type="text" value="<?php echo ($assign["info"]["name"]); ?>">
			</div>
			<div class="pannel_02 p_1">
				<span><?php echo L('SUBJECT');?></span>&nbsp;&nbsp;
				<select style="width:100px;">
					<option <?php if($assign[info][subject] == L('SUBJECT_1')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_1');?>"><?php echo L('SUBJECT_1');?></option>
					<option <?php if($assign[info][subject] == L('SUBJECT_2')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_2');?>"><?php echo L('SUBJECT_2');?></option>
					<option <?php if($assign[info][subject] == L('SUBJECT_3')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_3');?>"><?php echo L('SUBJECT_3');?></option>
					<option <?php if($assign[info][subject] == L('SUBJECT_4')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_4');?>"><?php echo L('SUBJECT_4');?></option>
					<option <?php if($assign[info][subject] == L('SUBJECT_5')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_5');?>"><?php echo L('SUBJECT_5');?></option>
					<option <?php if($assign[info][subject] == L('SUBJECT_6')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_6');?>"><?php echo L('SUBJECT_6');?></option>
				</select>
			</div>
			<div class="pannel_02 p_1">
				<span><?php echo L('CATEGORY');?>：</span>
				<select style="width:100px;">
					<option <?php if(isset($assign[info][category]) && $assign[info][category] == 0): ?>selected="selected"<?php endif; ?> value="0"><?php echo L('CATEGORY_1');?></option>
					<option <?php if($assign[info][category] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('CATEGORY_2');?></option>
				</select>
			</div>
			<div class="pannel_02 p_2">
				<span><?php echo L('SALES_TIME');?></span>
				<input class="span2" value="<?php echo (date('Y-m-d',$assign[info][sales_time] )); ?>" type="text">
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
				<tbody id="num">
					<tr>
						<th colspan="1"><?php echo L('T_LIST');?></th>
						<th><?php echo L('T_TEAM_PERCENT');?>&nbsp;&nbsp;<input style="width:50px;" type="text" value="<?php echo ($assign[info][team_percent]); ?>">&nbsp;%</th>
					</tr>
					<tr style="background-color:#E0E8FF;text-align:center;">
						<td><?php echo L('T_NAME');?></td>
						<td><?php echo L('T_PERCENT');?></td>
						<td>总提金额</td>
						<td>让利金额</td>
						<td>应提金额</td>
						<td><?php echo L('IS_LEADER');?></td>
					</tr>

					<?php if(is_array($assign["info_item"])): $k = 0; $__LIST__ = $assign["info_item"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="tc_row_<?php echo ($k); ?>">
							<td>
								<input type="hidden" value="<?php echo ($vo['user_id']); ?>">
								<input type="text" value="<?php echo ($vo['user_name']); ?>">
							</td>
							<td><input type="text" value="<?php echo ($vo['owner_percent']); ?>"></td>
							<td><input type="text" value="<?php echo ($vo['owner_price']); ?>"></td>
							<td><input type="text" value="<?php echo ($vo['rl_price']); ?>"></td>
							<td><input type="text" value="<?php echo ($vo['yt_price']); ?>"></td>
							<td><input type="radio" value="<?php echo ($vo['user_id']); ?>" <?php if($vo[is_lead] == 1): ?>checked="checked"<?php endif; ?>></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>

		<div class="span12 zp" <?php if(empty($assign["present"])): ?>style="display:none;"<?php endif; ?>>
			<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
				<tbody>
					<tr>
						<th colspan="6"><?php echo L('Z_INFO');?></th>
					</tr>
					<tr style="background-color:#E0E8FF;text-align:center;">
						<td><?php echo L('COMMODITY');?></td>
						<td><?php echo L('STANDARD');?></td>
						<td><?php echo L('COUNT');?></td>
						<td><?php echo L('PRICE');?></td>
						<td><?php echo L('ADD_ALL');?></td>
						<td><?php echo L('WAREHOUSE');?></td>
					</tr>
					<tbody id="zp_add_products">
						<?php if(is_array($assign["present"])): $k = 0; $__LIST__ = $assign["present"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="zp_row_<?php echo ($k); ?>">
								<td>
									<input type="hidden" id="zp_id_<?php echo ($k); ?>" class="zp_id" value="<?php echo ($vo["product_id"]); ?>" />
									<input type="text" id="zp_name_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_name"]); ?>"/>
								</td>
								<td><input type="text" value="<?php echo ($vo["standard"]); ?>"/></td>
								<td><input type="text" class="zp_amount" id="zp_amount_<?php echo ($k); ?>" value="<?php echo ($vo["amount"]); ?>"/></td>
								<td><input type="text" id="zp_unit_price_<?php echo ($k); ?>" value="<?php echo ($vo["price"]); ?>"/></td>
								<td><input type="text" id="zp_all_price_<?php echo ($k); ?>" value="<?php echo ($vo["all_price"]); ?>" class="zp_prime_price"/></td>
								<td>
									<div class="divSelect">
									<select id="product_warehouse_id_<?php echo ($k); ?>">
										<option value="">请选择仓库</option>
										<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									</div>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tr style="background-color:#FFFFF3">
						<td><?php echo L('TOTAL');?></td>
						<td></td>
						<td id="zp_total_amount_val">0</td>
						<td></td>
						<td id="zp_total_price_val">0.00</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="span12" style="position:relative;">
			<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
				<tbody>
					<tr>
						<th colspan="2"><?php echo L('COMMODITY_INFO');?></th>
					</tr>
					<tr style="background-color:#E0E8FF;text-align:center;">
						<td class="span2"><?php echo L('COMMODITY');?></td>
						<td><?php echo L('STANDARD');?></td>
						<td><?php echo L('COUNT');?></td>
						<td><?php echo L('PRICE');?></td>
						<td><?php echo L('DISCOUNT_RATE');?></td>
						<td><?php echo L('PRODUCT_DISCOUNT');?></td>
						<td><?php echo L('TAX_RATE');?></td>
						<td><?php echo L('TAX_PRICE');?></td>
						<td><?php echo L('NO_TAX_PRICE');?></td>
						<td><?php echo L('PRIME_PRICE');?></td>
						<td class="span1"><?php echo L('PACK');?></td>
						<td><?php echo L('WAREHOUSE');?></td>
						<td class="span2"><?php echo L('DESCRIPTION');?></td>
					</tr>
					<tbody id="view_row">
						<?php if(is_array($assign["product"])): $k = 0; $__LIST__ = $assign["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="row_<?php echo ($k); ?>">
								<td>
									<input type="hidden" id="product_id_<?php echo ($k); ?>" class="product_id" value="<?php echo ($vo["product_id"]); ?>"/>
									<input type="text" id="product_name_<?php echo ($k); ?>" value="<?php echo ($vo["product_name"]); ?>"/>
								</td>
								<td><input type="text" id="product_standard_<?php echo ($k); ?>" value="<?php echo ($vo["product_standard"]); ?>"/></td>
								<td><input type="text" id="product_amount_<?php echo ($k); ?>" class="amount" value="<?php echo ($vo["amount"]); ?>"/></td>
								<td><input type="text" id="product_unit_price_<?php echo ($k); ?>" value="<?php echo ($vo["unit_price"]); ?>"/></td>
								<td><input type="text" id="product_discount_rate_<?php echo ($k); ?>" value="<?php echo ($vo["discount_rate"]); ?>"/></td>
								<td><input type="text" id="product_discount_<?php echo ($k); ?>" class="product_discount" readonly="readonly"/></td>
								<td><input type="text" id="product_tax_rate_<?php echo ($k); ?>" value="<?php echo ($vo["tax_rate"]); ?>"/></td>
								<td><input type="text" id="product_tax_price_<?php echo ($k); ?>" class="tax_price" readonly="readonly"/></td>
								<td><input type="text" id="product_no_tax_price_<?php echo ($k); ?>" class="no_tax_price" readonly="readonly"/></td>
								<td><input type="text" id="product_prime_price_<?php echo ($k); ?>" class="prime_price" readonly="readonly"/></td>
								<td><input type="checkbox" id="product_pack_1" class="pack" <?php if($vo[pack]): ?>checked="checked"<?php endif; ?> value="1" onclick="calculate(<?php echo ($k); ?>)"/></td>
								<td>
									<div class="divSelect">
									<select>
										<option value="">请选择仓库</option>
										<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									</div>
								</td>
								<td><input type="text" value="<?php echo ($vo["description"]); ?>"/></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tbody id="add_products"></tbody>	
					<tr style="background-color:#FFFFF3">
						<td><?php echo L('TOTAL');?></td>
						<td></td>
						<td id="total_amount_val">0</td>
						<td></td>
						<td></td>
						<td id="total_product_discount_val">0.00</td>
						<td></td>
						<td id="total_tax_price_val">0.00</td>
						<td id="total_no_tax_price_val">0.00</td>
						<td id="total_prime_price_val">0.00</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr style="background-color:#FFFFF1">
						<td><?php echo L('OTHER_PRICE');?></td>
						<td colspan="2"><input id="discount_price" type="text" value="<?php echo ($assign["info"]["other_expenses"]); ?>"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo L('PACK_PRICE');?></td>
						<td id="pack_price">0</td>
						<td></td>
						<td></td>
						<td><?php echo L('SALES_PRICE');?></td>
						<td colspan="2"><input id="sales_price" value="<?php echo ($assign["info"]["sales_price"]); ?>" type="text"></td>
					</tr>
					<tr>
						<td><?php echo L('ADDRESS');?></td>
						<td colspan="13"><input class="normal_input" type="text" value="<?php echo ($assign["info"]["address"]); ?>"></td>
					</tr>
					<tr>
						<td><?php echo L('DESCRIPTION');?></td>
						<td colspan="13"><textarea style="min-height:50px;width:99%"><?php echo ($assign["info"]["remarks"]); ?></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td style="text-align:center;" colspan="13">
							<input class="btn" onclick="javascript:history.go(-1)" value="返回" type="button">&nbsp;
						</td>
					</tr>
				</tfoot>
			</table>
			<?php if($assign["img"] != ''): if($assign["img"] == 'audit'): ?><div style="position: absolute;right: 14px;bottom: 200px;"><div style="font-size:20px;border:3px solid #CF3F3F;padding:10px 15px;color:#CF3F3F;font-weight:bold;transform:rotate(5deg);"><?php echo ($assign["info"]["check_name"]); ?> 审核</div></div>
				<?php else: ?>
					<div style="position: absolute;right: 200px;bottom: 200px;"><div style="font-size:20px;border:3px solid #CF3F3F;padding:10px 15px;color:#CF3F3F;font-weight:bold;transform:rotate(5deg);"><?php echo ($assign["info"]["check_name"]); ?> 审核</div></div>
					<div style="position: absolute;right: 14px;bottom: 200px;"><img src="__PUBLIC__/img/<?php echo ($assign["img"]); ?>.png"></div><?php endif; endif; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
var zp_now_rows = $('#zp_add_products tr').size();
for(z=1;z<=zp_now_rows;z++){
	zp_calculate(z);
}

<!-- 根据选项计算赠品价格 -->
function zp_calculate(param){
	if($('#zp_id_'+param).val() != '' && $('#zp_id_'+param).val() != '0'){
		//先对当前Row进行计算
		var amount = $('#zp_amount_'+param).val();
		var price = $('#zp_unit_price_'+param).val();
		all_price = parseFloat(price * amount).toFixed(2);
		$('#zp_all_price_'+param).val(all_price);
		
		var total_amount = 0;
		$('.zp_amount').each(function(k, v){
			//合计数量
			if($(v).val() != '' ||  $(v).val() != '0'){
				total_amount += new Number($(v).val());
			}
		});
		$('#zp_total_amount_val').html(total_amount);

		var total_prime_price = 0.00;
		$('.zp_prime_price').each(function(k, v){
			//实际应付总价（不包含其它费用）
			if($(v).val() != '' || $(v).val() != '0.00' || $(v).val() != '0'){
				total_prime_price += new Number($(v).val());
			}
		});
		$('#zp_total_price_val').html(total_prime_price.toFixed(2));
	}else{
		return false;
	}
}
<!-- 根据选项计算赠品价格 END-->

var now_rows = $('#view_row tr').size();
for(j=1;j<=now_rows;j++){
	calculate(j);
}

<!-- 根据选项计算价格 -->
function calculate(param){
	if($('#product_id_'+param).val() != '' && $('#product_id_'+param).val() != '0'){
		//先对当前Row进行计算
		var amount = $('#product_amount_'+param).val();
		var unit_price = $('#product_unit_price_'+param).val();
		var discount_rate = $('#product_discount_rate_'+param).val();
		var product_discount = cal_discount_money(unit_price, amount, discount_rate);//折扣额
		no_tax_price = parseFloat(unit_price * amount - product_discount).toFixed(2);//税前
		var tax_rate = $('#product_tax_rate_'+param).val();
		tax_price = cal_tax_money(tax_rate, no_tax_price);//税额
		var prime_price = new Number(no_tax_price) + new Number(tax_price);//税后
		$('#product_discount_'+param).val(product_discount);
		$('#product_tax_price_'+param).val(tax_price);
		$('#product_no_tax_price_'+param).val(no_tax_price);
		$('#product_prime_price_'+param).val(prime_price.toFixed(2));

		var pack_price = 0;
		$('.pack:checked').each(function(k, v){
			//合计包装价格
			pack_price += new Number($(v).parent().prev().children('.prime_price').val());
		});
		$('#pack_price').html(pack_price);
		
		var total_amount = 0;
		$('.amount').each(function(k, v){
			//合计数量
			if($(v).val() != '' ||  $(v).val() != '0'){
				total_amount += new Number($(v).val());
			}
		});
		$('#total_amount_val').html(total_amount);
		$('#total_amount').val(total_amount);
		
		var total_product_discount = 0.00;
		$('.product_discount').each(function(k, v){
			//合计折扣额
			if($(v).val() != '' ||  $(v).val() != '0' || $(v).val() != '0.00'){
				total_product_discount += new Number($(v).val());
			}
		});
		$('#total_product_discount_val').html(total_product_discount.toFixed(2));
		
		var total_tax_price = 0.00;
		$('.tax_price').each(function(k, v){
			//合计税额
			if($(v).val() != '' ||  $(v).val() != '0' || $(v).val() != '0.00'){
				total_tax_price += new Number($(v).val());
			}
		});
		$('#total_tax_price_val').html(total_tax_price.toFixed(2));
		
		var total_no_tax_price = 0.00;
		$('.no_tax_price').each(function(k, v){
			//合计税前
			if($(v).val() != '' ||  $(v).val() != '0' || $(v).val() != '0.00'){
				total_no_tax_price += new Number($(v).val());
			}
		});
		$('#total_no_tax_price_val').html(total_no_tax_price.toFixed(2));
		
		var total_prime_price = 0.00;
		$('.prime_price').each(function(k, v){
			//实际应付总价（不包含其它费用）
			if($(v).val() != '' || $(v).val() != '0.00' || $(v).val() != '0'){
				total_prime_price += new Number($(v).val());
			}
		});
		$('#total_prime_price_val').html(total_prime_price.toFixed(2));
		$('#prime_price').val(total_prime_price.toFixed(2));
		$('#sales_price').val(total_prime_price.toFixed(2));
		cal_discount_price();
	}else{
		return false;
	}
}
<!-- 根据选项计算价格 END-->

<!-- 根据其它费用计算最终应付金额 -->
function cal_discount_price(){
	var discount_price = $('#discount_price').val();
	sales_price = new Number($('#total_prime_price_val').html()) + new Number(discount_price);
	$('#sales_price').val(sales_price.toFixed(2));
}
<!-- 根据其它费用计算最终应付金额 END-->

<!-- 计算折扣额 -->
/**
 * 根据原价和折扣率计算出折扣额
 * @unit_price		原价
 * @amount			数量
 * @discount_rate	折扣率
 */
function cal_discount_money(unit_price, amount, discount_rate){
	var product_discount = 0;
	if(discount_rate == 0){
		product_discount = 0;
	}else{
		product_discount = (unit_price * amount) * (discount_rate/100);
	}
	return parseFloat(product_discount).toFixed(2);
}
<!-- 计算折扣额 END-->

<!-- 计算税额 -->
/**
 * 根据税率和税前计算出税额
 * @tax_rate		税率
 * @no_tax_price	税前
 */
function cal_tax_money(tax_rate, no_tax_price){
	var prime_price = 0;
	prime_price = (tax_rate/100) * no_tax_price;
	return parseFloat(prime_price).toFixed(2);
}
<!-- 计算税额 END-->
</script>


</body>
</html>