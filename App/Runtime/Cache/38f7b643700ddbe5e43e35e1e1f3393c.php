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
	<!-- Docs nav ================================================== -->
	<form id="form" action="<?php echo U("sales/addsalesreturn");?>" method="post">
	<div class="page-header">
		<h3 class="text_center"><?php echo L('ADD_SALES_RETURN');?><span class="span_code">—— <?php echo ($assign["sn_code"]); ?></span></h3>
		<div class="pannel_01">
			<div class="pannel_02">
				<span><?php echo L('CUSTOMER');?></span>
				<input name="base[customer_id]" id="customer_id" value="" type="hidden">
				<input name="base[customer_name]" class="span2" id="customer_name" type="text">
			</div>
			<div class="pannel_02 p_3">
				<span><?php echo L('SUBJECT');?></span>
				<input name="base[subject]" class="span2" id="subject" type="text">
			</div>
			<div class="pannel_02 p_1">
				<span><?php echo L('SALES_TIME');?></span>
				<input class="Wdate span2" id="sales_time" name="sales_time" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'%y-%M-%d', })" value="<?php echo date('Y-m-d',time()); ?>" type="text">
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	
	<div class="zp">
		<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
			<tbody>
				<tr>
					<th colspan="6"><?php echo L('Z_INFO');?></th>
					<th style="border:none;float:right;"><input type="button" class="btn btn-primary" onclick="zp_loadDialog()" value="<?php echo L('ADD_GOOD');?>"></th>
				</tr>
				<tr style="background-color:#E0E8FF;text-align:center;">
					<td>&nbsp;</td>
					<td><?php echo L('COMMODITY');?></td>
					<td><?php echo L('STANDARD');?></td>
					<td><?php echo L('COUNT');?></td>
					<td><?php echo L('PRICE');?></td>
					<td><?php echo L('ADD_ALL');?></td>
					<td><?php echo L('WAREHOUSE');?></td>
				</tr>
				<tbody id="zp_add_products"></tbody>
				<tr style="background-color:#FFFFF3">
					<td></td>
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

	<div class="row">
		<div class="span12"></div>
		<div class="span12">
			<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
				<tbody>
					<tr>
						<th colspan="12"><?php echo L('COMMODITY_INFO');?></th>
						<th style="border: none;float: right;"><input type="button" class="btn btn-primary" onclick="loadDialog()" value="添加商品"></th>
					</tr>
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
					<tbody id="view_row">
						<tr id="row_1">
							<td style="text-align:center;">
								<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
							</td>
							<td>
								<input type="hidden" name="sales[product][1][product_id]" id="product_id_1" class="product_id"/>
								<input type="text" id="product_name_1" onclick="loadDialog()" />
							</td>
							<td><input type="text" id="product_standard_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_standard"]); ?>" name="sales[product][<?php echo ($k); ?>][product_standard]"/></td>
							<td><input type="text" name="sales[product][1][amount]" id="product_amount_1" class="amount" onkeyup="calculate(1)"/></td>
							<td><input type="text" name="sales[product][1][unit_price]" id="product_unit_price_1" onkeyup="calculate(1)"/></td>
							<td><input type="text" name="sales[product][1][discount_rate]" id="product_discount_rate_1" onkeyup="calculate(1)"/></td>
							<td><input type="text" id="product_discount_1" class="product_discount" readonly="readonly"/></td>
							<td><input type="text" name="sales[product][1][tax_rate]" id="product_tax_rate_1" onkeyup="calculate(1)"/></td>
							<td><input type="text" id="product_tax_price_1" class="tax_price" readonly="readonly"/></td>
							<td><input type="text" id="product_no_tax_price_1" class="no_tax_price" readonly="readonly"/></td>
							<td><input type="text" name="sales[product][1][prime_price]" id="product_prime_price_1" class="prime_price" readonly="readonly"/></td>
							<td>
								<div class="divSelect">
								<select name="sales[product][1][warehouse_id]" id="product_warehouse_id_1">
									<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option selected="selected" value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								</div>
							</td>
							<td><input type="text" name="sales[product][1][description]"/></td>
						</tr>
					</tbody>
					<tbody id="add_products"></tbody>	
					<tr style="background-color:#FFFFF3">
						<td></td>
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
					</tr>
					<tr style="background-color:#FFFFF1">
						<td>&nbsp;</td>
						<td><?php echo L('OTHER_PRICE');?></td>
						<td colspan="2"><input name="base[other_expenses]" id="discount_price" onblur="cal_discount_price()" type="text"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo L('FINAL_PAY');?></td>
						<td colspan="2"><input id="sales_price" readonly="true" value="0.00" type="text"></td>
					</tr>
					<tr>
						<td><?php echo L('ADDRESS');?></td>
						<td colspan="12"><input class="normal_input" id="address" name="base[address]" placeholder="<?php echo L('GET_ADDRESS');?>" type="text"></td>
					</tr>
					<tr>
						<td><?php echo L('DESCRIPTION');?></td>
						<td colspan="12"><textarea style="min-height:50px;width:99%" name="base[remarks]"></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td style="text-align:center;" colspan="13">
							<input name="submit" class="btn btn-primary" value="保存" type="submit">&nbsp; 
							<input class="btn" onclick="javascript:history.go(-1)" value="返回" type="button">&nbsp;
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	</form>
</div>
<div class="hide" id="dialog-customer-list" title="<?php echo L('CUSTOMERS_LIST');?>"></div>
<div class="hide" id="dialog-product-list" title="<?php echo L('COMMODITY_LIST');?>"></div>
<script type="text/javascript">
<!-- 增加和减少ROW -->
var total_row_id = 1;
var now_rows = 1;
//减少一条信息
$(document).on('click','.reduce_one',function(){
	var row_id = $(this).parent().parent().attr('id');
	//如果行内存在商品，弹出操作提示
	row_val = row_id.substr(4);
	if($('#tc_id_'+row_val).val() == ''){
		$('#'+row_id).remove();
		calculate(total_row_id);
	}else{
		if(confirm('该行存在商品，确定要移除么？')){
			$('#'+row_id).remove();
			calculate(total_row_id);
		}else{
			return false;
		}
	}
	now_rows --;
});
<!-- 增加和减少ROW END-->

<!-- 客户浮动层-->
//客户列表
$('#customer_name').click(function(){
	$('#dialog-customer-list').dialog('open');
	$('#dialog-customer-list').load('<?php echo U("customer/listDialog");?>');
});
$("#dialog-customer-list").dialog({
	autoOpen: false,
	modal: true,
	width: 800,
	maxHeight: 400,
	position: ["center",100],
	buttons:{
		'确认':function(){
			var customer_id = $('input:radio[name="customer"]:checked').val();
			var customer_name = $('input:radio[name="customer"]:checked').parent().next().html();
			var address = $('input:radio[name="customer"]:checked').next().next().val();
			$('#customer_id').val(customer_id);
			$('#customer_name').val(customer_name);
			$('#address').val(address);
			$(this).dialog('close');
		},
		'取消':function(){
			$(this).dialog('close');
		}
	}
});
<!-- 客户浮动层 END-->

<!-- 赠品浮动层-->
var zp_total_row_id = 1;
var zp_now_rows = 0;
//减少一条信息
$(document).on('click','.zp_reduce_one',function(){
	var zp_row_id = $(this).parent().parent().attr('id');
	$('#'+zp_row_id).remove();
	zp_now_rows --;
	zp_calculate(zp_total_row_id);
});
function zp_loadDialog(param){
	$("#dialog-product-list").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons:{
			"确定":function(){
				$(".se_product").each(function(){
					zp_now_rows += 1;
					$('#view_row').remove();
					var product_id = $(this).attr('rel');
					var suggested_price = $(this).children("input:first-child").val();
					var standard = $(this).children("input:first-child").next().val();
					var product_name = $(this).text();
					if(product_id != null){
						$('#zp_add_products').append('<tr id="zp_row_'+zp_now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="zp_reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="sales[zp]['+zp_now_rows+'][product_id]" id="zp_id_'+zp_now_rows+'" class="zp_id" value="'+product_id+'" /><input type="text" id="zp_name_'+zp_now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input type="text" id="zp_standard_'+zp_now_rows+'" readonly="readonly" value="'+standard+'" name="sales[zp]['+zp_now_rows+'][standard]"/></td><td><input type="text" name="sales[zp]['+zp_now_rows+'][amount]" id="zp_amount_'+zp_now_rows+'" onkeyup="zp_calculate('+zp_now_rows+')" class="zp_amount" value="1"/></td><td><input type="text" name="sales[zp]['+zp_now_rows+'][price]" onkeyup="zp_calculate('+zp_now_rows+')" id="zp_unit_price_'+zp_now_rows+'" value="'+suggested_price+'" /></td><td><input type="text" id="zp_all_price_'+zp_now_rows+'" readonly="readonly" value="" class="zp_prime_price" name="sales[zp]['+zp_now_rows+'][all_price]"/></td><td><div class="divSelect"><select name="sales[zp]['+zp_now_rows+'][warehouse_id]" ><?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> </select></div></td></tr>');
						zp_calculate(zp_now_rows);
					}
				});
				$(this).dialog('close');
			},
			"取消":function(){
				$(this).dialog('close');
			}
		}
	});
		
	$('#dialog-product-list').dialog('open');
	$('#dialog-product-list').load('<?php echo U('product/mutildialog');?>');
}
<!-- 赠品浮动层 END-->

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

<!-- 商品浮动层-->
//选择商品
function loadDialog(param){
	$("#dialog-product-list").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons:{
			"确定":function(){
				$(".se_product").each(function(){
					now_rows += 1;
					var product_name = $(this).text();
					$('#view_row').remove();
					var product_id = $(this).attr('rel');
					var suggested_price = $(this).children("input:first-child").val();
					var standard = $(this).children("input:first-child").next().val();
					if(product_id != null){
						$('#add_products').append('<tr id="row_'+now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="sales[product]['+now_rows+'][product_id]" id="product_id_'+now_rows+'" class="product_id" value="'+product_id+'" /><input type="text" id="product_name_'+now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input type="text" id="product_standard_'+now_rows+'" readonly="readonly" value="'+standard+'" name="sales[product]['+now_rows+'][product_standard]"/></td><td><input type="text" name="sales[product]['+now_rows+'][amount]" id="product_amount_'+now_rows+'" class="amount" onkeyup="calculate('+now_rows+')" value="1"/></td><td><input type="text" name="sales[product]['+now_rows+'][unit_price]" id="product_unit_price_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="'+suggested_price+'" /></td><td><input type="text" name="sales[product]['+now_rows+'][discount_rate]" id="product_discount_rate_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="0"/></td><td><input type="text" id="product_discount_'+now_rows+'" class="product_discount" readonly="readonly"/></td><td><input type="text" name="sales[product]['+now_rows+'][tax_rate]" id="product_tax_rate_'+now_rows+'" value="0" onkeyup="calculate('+now_rows+')"/></td><td><input type="text" id="product_tax_price_'+now_rows+'" class="tax_price" readonly="readonly"/></td><td><input type="text" id="product_no_tax_price_'+now_rows+'" class="no_tax_price" readonly="readonly"/></td><td><input type="text" name="sales[product]['+now_rows+'][prime_price]" id="product_prime_price_'+now_rows+'" class="prime_price" readonly="readonly"/></td></td><td><div class="divSelect"><select name="sales[product]['+now_rows+'][warehouse_id]" >row_html += row_html += <?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> +=</select></div></td><td><input type="text" name="sales[product]['+now_rows+'][description]"/></td></tr>');
						$('#product_name_'+now_rows).val(product_name);
						$('#product_standard_'+now_rows).html(standard);
						$('#product_discount_'+now_rows).val('0.00');
						$('#product_tax_price_'+now_rows).val('0.00');
						$('#product_no_tax_price_'+now_rows).val(suggested_price);
						$('#product_prime_price_'+now_rows).val(suggested_price);
						calculate(now_rows);
					}
				});
				$(this).dialog('close');
			},
			"取消":function(){
				$(this).dialog('close');
			}
		}
	});
		
	$('#dialog-product-list').dialog('open');
	$('#dialog-product-list').load('<?php echo U('product/mutildialog');?>');
}
<!-- 商品浮动层 END-->

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

//提交表单前进行数据校验
$('input[name="submit"]').click(function(){
	var customer_id = $('#customer_id').val();
	if((customer_id == '') || (customer_id == '0')){
		alert('请选择客户！');
		return false;
	}

	var owner_id = $('#owner_role_id').val();
	var owner_name = $('#owner_name').val();
	if((owner_id == '') || (owner_id == '0') || (owner_name == '')){
		alert('请选择提成人员！');
		return false;
	}
	
	var null_data_flag = true;
	$('.product_id').each(function(k, v){
		if(($(v).val()) > 0){
			null_data_flag = false;
		}
	});
	if(null_data_flag){
		alert('商品信息不能为空！');
		return false;
	}
});
</script>


</body>
</html>