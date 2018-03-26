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
		<h3 class="text_center"><?php if($assign[info][type] == 1): ?>采购退货单详情<?php else: ?>采购单详情<?php endif; ?><span class="span_code">—— <?php echo ($assign["info"]["sn_code"]); ?></span></h3>
		<div class="pannel_01">
			<div class="pannel_02">
				<span><?php echo L('SUPPLIER_NAME');?></span>
				<input type="hidden" value="<?php echo ($assign["info"]["supplier_id"]); ?>"/>
				<input type="text" value="<?php echo ($assign["info"]["supplier_name"]); ?>"/>
			</div>
			<div class="pannel_02 p_3">
				<span><?php echo L('SUBJECT');?></span>
				<input type="text" class="span2" value="<?php echo ($assign["info"]["subject"]); ?>" />
			</div>
			<div class="pannel_02 p_1">
				<span><?php echo L('SALES_TIME');?></span>
				<input type="text" class="span2" value="<?php echo (date('Y-m-d',$assign[info][purchase_time] )); ?>"/>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="row">
		<div class="span12"></div>
		<div class="span12" style="position:relative;">
			<table class="table table-bordered" id="no-input-border" width="95%" border="0" cellspacing="1" cellpadding="0">
				<thead>
					<tr style="background-color:#E0E8FF;text-align:center;">
						<td class="span1">&nbsp;</td>
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
						<td><?php echo L('WAREHOUSE');?></td>
						<td class="span2"><?php echo L('DESCRIPTION');?></td>
					</tr>
				</thead>
				<tbody id="view_row">
					<?php if(is_array($assign["product"])): $k = 0; $__LIST__ = $assign["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="row_<?php echo ($k); ?>" class="onblur">
						<td style="text-align:center;">
							<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
						</td>
						<td>
							<input name="sales[product][<?php echo ($k); ?>][product_id]" id="product_id_<?php echo ($k); ?>" class="product_id" type="hidden" value="<?php echo ($vo["product_id"]); ?>">
							<input id="product_name_<?php echo ($k); ?>" onclick="loadDialog(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo["product_name"]); ?>">
						</td>
						<td><input type="text" id="product_standard_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_standard"]); ?>" name="purchase[product][<?php echo ($k); ?>][product_standard]"/></td>
						<td><input name="sales[product][<?php echo ($k); ?>][amount]" id="product_amount_<?php echo ($k); ?>" class="amount" onblur="calculate(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo["amount"]); ?>"></td>
						<td><input name="sales[product][<?php echo ($k); ?>][unit_price]" id="product_unit_price_<?php echo ($k); ?>" onblur="calculate(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo["unit_price"]); ?>"></td>
						<td><input name="sales[product][<?php echo ($k); ?>][discount_rate]" id="product_discount_rate_<?php echo ($k); ?>" onblur="calculate(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo["discount_rate"]); ?>"></td>
						<td><input id="product_discount_<?php echo ($k); ?>" class="product_discount" readonly="readonly" type="text"></td>
						<td><input name="sales[product][<?php echo ($k); ?>][tax_rate]" id="product_tax_rate_<?php echo ($k); ?>" onblur="calculate(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo["tax_rate"]); ?>"></td>
						<td><input id="product_tax_price_<?php echo ($k); ?>" class="tax_price" readonly="readonly" type="text"></td>
						<td><input id="product_no_tax_price_<?php echo ($k); ?>" class="no_tax_price" readonly="readonly" type="text"></td>
						<td><input name="sales[product][<?php echo ($k); ?>][prime_price]" id="product_prime_price_<?php echo ($k); ?>" class="prime_price" readonly="readonly" type="text" value="<?php echo ($vo["prime_price"]); ?>"></td>
						<td>
							<div class="divSelect">
							<select name="sales[product][<?php echo ($k); ?>][warehouse_id]" id="product_warehouse_id_<?php echo ($k); ?>">
								<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							</div>
						</td>
						<td><input name="sales[product][<?php echo ($k); ?>][description]" type="text" value="<?php echo ($vo["description"]); ?>"></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
				<tbody id="add_products">
				</tbody>
				<tbody>
					<tr style="background-color:#FFFFF3">
						<td></td>
						<td><?php echo L('TOTAL');?></td>
						<td></td>
						<td id="total_amount_val"></td>
						<td></td>
						<td></td>
						<td id="total_product_discount_val"></td>
						<td></td>
						<td id="total_tax_price_val"></td>
						<td id="total_no_tax_price_val"></td>
						<td id="total_prime_price_val"></td>
						<td></td>
						<td></td>
					</tr>
					<tr style="background-color:#FFFFF1">
						<td>&nbsp;</td>
						<td><?php echo L('OTHER_PRICE');?></td>
						<td colspan="2"><input name="other_expenses" id="discount_price" onblur="cal_discount_price()" type="text" value="<?php echo ($assign["info"]["discount_price"]); ?>"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo L('FINAL_PAY');?></td>
						<td colspan="2"><input id="sales_price" readonly="true" value="<?php echo ($assign["info"]["purchase_price"]); ?>" type="text"></td>
					</tr>
					<tr>
						<td><?php echo L('DESCRIPTION');?></td>
						<td colspan="12"><textarea style="min-height:50px;width:99%" name="remarks"><?php echo ($assign["info"]["description"]); ?></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td style="text-align:center;" colspan="13">
							<input class="btn" type="button" onclick="javascript:history.go(-1)" value="返回"/>&nbsp;
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
$(":input").attr('readonly','readonly');
var nn = $('#view_row tr').size();
for(i=1;i<=nn;i++){
	calculate(i);
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
		$('#purchase_price').val(total_prime_price.toFixed(2));
		cal_discount_price();
	}else{
		return false;
	}
}
<!-- 根据选项计算价格 END-->

<!-- 根据其它费用计算最终应付金额 -->
function cal_discount_price(){
	var discount_price = $('#discount_price').val();
	purchase_price = new Number($('#total_prime_price_val').html()) + new Number(discount_price);
	$('#purchase_price').val(purchase_price.toFixed(2));
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

//提交表单前进行数据校验
$('input[name="submit"]').click(function(){
	var supplier_id = $('#supplier_id').val();
	if((supplier_id == '') || (supplier_id == '0')){
		alert("请选择供应商！");
		return false;
	}
	
	var null_data_flag = true;
	$('.product_id').each(function(k, v){
		if(($(v).val()) > 0){
			null_data_flag = false;
		}
	});
	if(null_data_flag){
		alert("商品信息不能为空！");
		return false;
	}
});
</script>