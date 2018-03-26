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
	<form id="form" action="<?php echo U('purchase/add');?>" method="post">
	<input type="hidden" name="base[type]" id="type" value="<?php echo ($_GET['type']); ?>"/>
	<div class="page-header">
		<h3 class="text_center"><?php echo ($assign["title"]); ?><span class="span_code">—— <?php echo ($assign["sn_code"]); ?></span></h3>
		<div class="pannel_01">
			<div class="pannel_02">
				<span><?php echo L('SUPPLIER_NAME');?></span>
				<input type="hidden" name="base[supplier_id]" id="supplier_id"/>
				<input type="text" name="base[supplier_name]" class="span2" id="supplier_name"/>
			</div>
			<div class="pannel_02 p_3">
				<span><?php echo L('SUBJECT');?></span>
				<input type="text" name="base[subject]" class="span2" id="subject"/>
			</div>
			<div class="pannel_02 p_1">
				<span><?php echo L('SALES_TIME');?></span>
				<input type="text" class="Wdate span2" id="purchase_time" name="purchase_time" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'%y-%M-%d', })" value="<?php echo date('Y-m-d',time()); ?>"/>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div class="row">
		<div class="span12"></div>
		<div class="span12">
			<table class="table table-bordered" id="no-input-border" width="95%" border="0" cellspacing="1" cellpadding="0">
				<thead>
					<tr>
						<th colspan="12"><?php echo L('COMMODITY_INFO');?></th>
						<th style="border: none;float: right;"><input type="button" class="btn btn-primary" onclick="loadDialog()" value="<?php echo L('ADD_PRODDUCT');?>"></th>
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
				</thead>
				<tbody id="view_row">
					<tr id="row_1">
						<td style="text-align:center;">
							<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
						</td>
						<td>
							<input type="hidden" name="purchase[product][1][product_id]" id="product_id_1" class="product_id"/>
							<input type="text" id="product_name_1" onclick="loadDialog()" />
						</td>
						<td><input type="text" id="product_standard_1" readonly="readonly" value="<?php echo ($vo["product_standard"]); ?>" name="purchase[product][1][product_standard]"/></td>
						<td><input type="text" name="purchase[product][1][amount]" id="product_amount_1" class="amount" onkeyup="calculate(1)"/></td>
						<td><input type="text" name="purchase[product][1][unit_price]" id="product_unit_price_1" onkeyup="calculate(1)"/></td>
						<td><input type="text" name="purchase[product][1][discount_rate]" id="product_discount_rate_1" onkeyup="calculate(1)"/></td>
						<td><input type="text" id="product_discount_1" class="product_discount" readonly="readonly"/></td>
						<td><input type="text" name="purchase[product][1][tax_rate]" id="product_tax_rate_1" onkeyup="calculate(1)"/></td>
						<td><input type="text" id="product_tax_price_1" class="tax_price" readonly="readonly"/></td>
						<td><input type="text" id="product_no_tax_price_1" class="no_tax_price" readonly="readonly"/></td>
						<td><input type="text" name="purchase[product][1][prime_price]" id="product_prime_price_1" class="prime_price" readonly="readonly"/></td>
						<td>
							<div class="divSelect">
							<select name="purchase[product][1][warehouse_id]" id="product_warehouse_id_1">
								<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							</div>
						</td>
						<td><input type="text" name="purchase[product][1][description]"/></td>
					</tr>
				</tbody>
				<tbody id="add_products"></tbody>
				<tbody>
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
						<td colspan="2"><input type="text" name="base[discount_price]" id="discount_price" value="0.00" onkeyup="cal_discount_price()"/></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo L('FINAL_PAY');?></td>
						<td colspan="2"><input type="text" id="purchase_price" readonly="true" value="0.00"/></td>
					</tr>
					<tr>
						<td><?php echo L('DESCRIPTION');?></td>
						<td colspan="12"><textarea style="min-height:50px;width:99%" name="base[description]"></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td style="text-align:center;" colspan="13">
							<input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/>&nbsp; 
							<input class="btn" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('RETURN');?>"/>&nbsp;
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	</form>
</div>
<div class="hide" id="dialog-supplier-list" title="供应商列表"></div>
<div class="hide" id="dialog-product-list" title="商品列表"></div>
<script type="text/javascript">
<!-- 供应商浮动层-->
//供应商列表
$('#supplier_name').click(function(){
	$('#dialog-supplier-list').dialog('open');
	$('#dialog-supplier-list').load('<?php echo U('supplier/listdialog');?>');
});
$("#dialog-supplier-list").dialog({
	autoOpen: false,
	modal: true,
	width: 800,
	maxHeight: 400,
	position: ["center",100],
	buttons:{
		"确定":function(){
			var supplier_id = $('input:radio[name="supplier_id"]:checked').val();
			var supplier_name = $('input:radio[name="supplier_id"]:checked').parent().next().html();
			$('#supplier_id').val(supplier_id);
			$('#supplier_name').val(supplier_name);
			$(this).dialog('close');
		},
		"取消":function(){
			$(this).dialog('close');
		}
	}
});
<!-- 供应商浮动层 END-->

<!-- 减少ROW -->
//减少一条信息
$(document).on('click','.reduce_one',function(){
	var row_id = $(this).parent().parent().attr('id');
	//如果行内存在商品，弹出操作提示
	row_val = row_id.substr(4);
	if($('#product_id_'+row_val).val() == ''){
		$('#'+row_id).remove();
		calculate();
	}else{
		if(confirm('该行存在商品，确定要移除么？')){
			$('#'+row_id).remove();
			calculate();
		}else{
			return false;
		}
	}
});
<!-- 减少ROW END-->

<!-- 商品浮动层-->
//选择商品
var now_rows = 0;
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
						$('#add_products').append('<tr id="row_'+now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="purchase[product]['+now_rows+'][product_id]" id="product_id_'+now_rows+'" class="product_id" value="'+product_id+'" /><input type="text" id="product_name_'+now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input type="text" id="product_standard_'+now_rows+'" readonly="readonly" value="'+standard+'" name="purchase[product]['+now_rows+'][product_standard]"/></td><td><input type="text" name="purchase[product]['+now_rows+'][amount]" id="product_amount_'+now_rows+'" class="amount" onkeyup="calculate('+now_rows+')" value="1"/></td><td><input type="text" name="purchase[product]['+now_rows+'][unit_price]" id="product_unit_price_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="'+suggested_price+'" /></td><td><input type="text" name="purchase[product]['+now_rows+'][discount_rate]" id="product_discount_rate_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="0"/></td><td><input type="text" id="product_discount_'+now_rows+'" class="product_discount" readonly="readonly"/></td><td><input type="text" name="purchase[product]['+now_rows+'][tax_rate]" id="product_tax_rate_'+now_rows+'" value="0" onkeyup="calculate('+now_rows+')"/></td><td><input type="text" id="product_tax_price_'+now_rows+'" class="tax_price" readonly="readonly"/></td><td><input type="text" id="product_no_tax_price_'+now_rows+'" class="no_tax_price" readonly="readonly"/></td><td><input type="text" name="purchase[product]['+now_rows+'][prime_price]" id="product_prime_price_'+now_rows+'" class="prime_price" readonly="readonly"/></td></td><td><div class="divSelect"><select name="purchase[product]['+now_rows+'][warehouse_id]" >row_html += row_html += <?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> +=</select></div></td><td><input type="text" name="purchase[product]['+now_rows+'][description]"/></td></tr>');
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