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
	<form id="form" action="<?php echo U("sales/edit");?>" method="post">
		<input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
		<input type="hidden" name="base[type]" value="<?php echo ($assign["info"]["type"]); ?>">
	<div class="page-header">
		<h3 class="text_center"><?php if($assign[info][type] == 1): echo L('EDIT'); echo L('SALES_RETURN'); else: echo L('EDIT'); echo L('SALES_TICKET'); endif; ?><span class="span_code">—— <?php echo ($assign["info"]["sn_code"]); ?></span></h3>
		<div class="pannel_01">
			<div class="pannel_02">
				<span><?php echo L('CUSTOMER');?></span>
				<input name="base[customer_id]" id="customer_id" value="<?php echo ($assign["info"]["customer_id"]); ?>" type="hidden">
				<input name="base[customer_name]" class="span2" id="customer_name" type="text" value="<?php echo ($assign["info"]["customer_name"]); ?>">
			</div>
			<div class="pannel_02" style="margin-left:50px;">
				<span>销售员</span>
				<input name="base[sale_user_id]" id="sale_id" value="<?php echo ($assign["info"]["sale_user_id"]); ?>" type="hidden">
				<input name="base[sale_name]" class="span2" id="sale_name" type="text" value="<?php echo ($assign["info"]["sale_name"]); ?>">
			</div>
			<div class="pannel_02" style="margin-left:50px;">
				<span><?php echo L('SUBJECT');?></span>&nbsp;&nbsp;
				<?php if($assign[info][type] == 1): ?><select name="base[subject]" id="subject" style="width:100px;">
						<option value="销售退货">销售退货</option>
					</select>
				<?php else: ?>
					<select name="base[subject]" id="subject" style="width:100px;">
						<option <?php if($assign[info][subject] == L('SUBJECT_1')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_1');?>"><?php echo L('SUBJECT_1');?></option>
						<option <?php if($assign[info][subject] == L('SUBJECT_2')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_2');?>"><?php echo L('SUBJECT_2');?></option>
						<option <?php if($assign[info][subject] == L('SUBJECT_3')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_3');?>"><?php echo L('SUBJECT_3');?></option>
						<option <?php if($assign[info][subject] == L('SUBJECT_4')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_4');?>"><?php echo L('SUBJECT_4');?></option>
						<option <?php if($assign[info][subject] == L('SUBJECT_5')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_5');?>"><?php echo L('SUBJECT_5');?></option>
						<option <?php if($assign[info][subject] == L('SUBJECT_6')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_6');?>"><?php echo L('SUBJECT_6');?></option>
					</select><?php endif; ?>
			</div>
			<?php if($assign[info][type] == 0): ?><div class="pannel_02" style="margin-left:50px;">
					<span><?php echo L('CATEGORY');?>：</span>
					<select name="base[category]" id="" style="width:100px;">
						<option <?php if(isset($assign[info][category]) && $assign[info][category] == 0): ?>selected="selected"<?php endif; ?> value="0"><?php echo L('CATEGORY_1');?></option>
						<option <?php if($assign[info][category] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('CATEGORY_2');?></option>
					</select>
				</div><?php endif; ?>
			<div class="pannel_02 p_2">
				<span><?php echo L('SALES_TIME');?></span>
				<input class="Wdate span2" id="sales_time" name="sales_time" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',minDate:'%y-%M-%d', })" value="<?php echo (date('Y-m-d',$assign[info][sales_time] )); ?>" type="text">
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
						<th><?php echo L('T_TEAM_PERCENT');?>&nbsp;&nbsp;<input name="base[team_percent]" onblur="change_bl()" style="width:50px;" id="percent" type="text" value="<?php echo ($assign[info][team_percent]); ?>">&nbsp;%</th>
					</tr>
					<tr style="background-color:#E0E8FF;text-align:center;">
						<td>&nbsp;</td>
						<td><?php echo L('T_NAME');?></td>
						<td><?php echo L('T_PERCENT');?></td>
						<td>总提金额</td>
						<td>让利金额</td>
						<td>应提金额</td>
						<td><?php echo L('IS_LEADER');?></td>
					</tr>
					<?php if(is_array($assign["info_item"])): $k = 0; $__LIST__ = $assign["info_item"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="tc_row_<?php echo ($k); ?>">
							<td>
								&nbsp;
								<a href="javascript:void(0);" class="add_one_tc"><i class="icon-plus"></i></a>&nbsp;&nbsp;
								<a href="javascript:void(0);" class="reduce_one_tc"><i class="icon-minus"></i></a>
							</td>
							<td>
								<input name="sales[tc][<?php echo ($k); ?>][user_id]" id="tc_id_<?php echo ($k); ?>" class="tc_id" type="hidden" value="<?php echo ($vo['user_id']); ?>">
								<input id="tc_name_<?php echo ($k); ?>" onclick="loadDialog_tc(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo['user_name']); ?>">
							</td>
							<td><input name="sales[tc][<?php echo ($k); ?>][owner_percent]" id="tc_bl_<?php echo ($k); ?>" class="bl" onblur="bl(<?php echo ($k); ?>)" type="text" value="<?php echo ($vo['owner_percent']); ?>"></td>
							<td><input name="sales[tc][<?php echo ($k); ?>][owner_price]" id="tc_je_<?php echo ($k); ?>" type="text" readonly="readonly" value="<?php echo ($vo['owner_price']); ?>"></td>
							<td><input name="sales[tc][<?php echo ($k); ?>][rl_price]" id="tc_rl_<?php echo ($k); ?>" type="text" readonly="readonly" value="<?php echo ($vo['rl_price']); ?>"></td>
							<td><input name="sales[tc][<?php echo ($k); ?>][yt_price]" id="tc_yt_<?php echo ($k); ?>" type="text" readonly="readonly" value="<?php echo ($vo['yt_price']); ?>"></td>
							<td><input name="sales[is_lead]" type="radio" value="<?php echo ($vo['user_id']); ?>" <?php if($vo[is_lead] == 1): ?>checked="checked"<?php endif; ?>></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<?php if(empty($assign["info_item"])): ?><tr id="tc_row_1">
							<td>
								&nbsp;
								<a href="javascript:void(0);" class="add_one_tc"><i class="icon-plus"></i></a>&nbsp;&nbsp;
								<a href="javascript:void(0);" class="reduce_one_tc"><i class="icon-minus"></i></a>
							</td>
							<td>
								<input name="sales[tc][1][user_id]" id="tc_id_1" class="tc_id" type="hidden" value="<?php echo (session('role_id')); ?>">
								<input id="tc_name_1" onclick="loadDialog_tc(1)" type="text" value="<?php echo (session('name')); ?>">
							</td>
							<td><input name="sales[tc][1][owner_percent]" id="tc_bl_1" class="bl" onblur="bl(1)" type="text"></td>
							<td><input name="sales[tc][{1}][rl_price]" id="tc_rl_1" type="text" readonly="readonly"></td>
							<td><input name="sales[tc][{1}][yt_price]" id="tc_yt_1" type="text" readonly="readonly"></td>
							<td><input name="sales[tc][1][owner_price]" id="tc_je_1" type="text" readonly="readonly"></td>
							<td><input name="sales[is_lead]" type="radio" value="<?php echo (session('role_id')); ?>"></td>
						</tr><?php endif; ?>
				</tbody>
			</table>
		</div>

		<div class="span12 zp">
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
					<tbody id="zp_add_products">
						<?php if(is_array($assign["present"])): $k = 0; $__LIST__ = $assign["present"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="zp_row_<?php echo ($k); ?>">
								<td style="text-align:center;"><a href="javascript:void(0);" class="zp_reduce_one"><i class="icon-minus"></i></a></td>
								<td>
									<input type="hidden" name="sales[zp][<?php echo ($k); ?>][product_id]" id="zp_id_<?php echo ($k); ?>" class="zp_id" value="<?php echo ($vo["product_id"]); ?>" />
									<input type="text" id="zp_name_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_name"]); ?>"/>
								</td>
								<td><input type="text" id="zp_standard_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["standard"]); ?>" name="sales[zp][<?php echo ($k); ?>][standard]"/></td>
								<td><input type="text" class="zp_amount" onkeyup="zp_calculate(<?php echo ($k); ?>)" name="sales[zp][<?php echo ($k); ?>][amount]" id="zp_amount_<?php echo ($k); ?>" value="<?php echo ($vo["amount"]); ?>"/></td>
								<td><input type="text" name="sales[zp][<?php echo ($k); ?>][price]" id="zp_unit_price_<?php echo ($k); ?>" value="<?php echo ($vo["price"]); ?>" onkeyup="zp_calculate(<?php echo ($k); ?>)"/></td>
								<td><input type="text" id="zp_all_price_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["all_price"]); ?>" name="sales[zp][<?php echo ($k); ?>][all_price]" class="zp_prime_price"/></td>
								<td>
									<div class="divSelect">
									<select name="sales[zp][<?php echo ($k); ?>][warehouse_id]" id="product_warehouse_id_<?php echo ($k); ?>">
										<option value="">请选择仓库</option>
										<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									</div>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
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

		<div class="span12" style="position:relative;">
			<table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1" width="95%">
				<tbody>
					<tr>
						<th colspan="2"><?php echo L('COMMODITY_INFO');?></th>
						<th colspan="11"></th>
						<th style="border: none;float: right;">
							<input type="button" class="btn btn-primary" onclick="loadDialog()" value="<?php echo L('ADD_GOOD');?>">
						</th>
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
						<td class="span1"><?php echo L('PACK');?></td>
						<td><?php echo L('WAREHOUSE');?></td>
						<td class="span2"><?php echo L('DESCRIPTION');?></td>
					</tr>
					<tbody id="add_products">
						<?php if(is_array($assign["product"])): $k = 0; $__LIST__ = $assign["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="row_<?php echo ($k); ?>">
								<td style="text-align:center;">
									<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
								</td>
								<td>
									<input type="hidden" name="sales[product][<?php echo ($k); ?>][product_id]" id="product_id_<?php echo ($k); ?>" class="product_id" value="<?php echo ($vo["product_id"]); ?>"/>
									<input type="text" id="product_name_<?php echo ($k); ?>" onclick="loadDialog()" value="<?php echo ($vo["product_name"]); ?>"/>
								</td>
								<td><input type="text" id="product_standard_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_standard"]); ?>" name="sales[product][<?php echo ($k); ?>][product_standard]"/></td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][amount]" id="product_amount_<?php echo ($k); ?>" class="amount" onkeyup="calculate(<?php echo ($k); ?>)" value="<?php echo ($vo["amount"]); ?>"/></td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][unit_price]" id="product_unit_price_<?php echo ($k); ?>" onkeyup="calculate(<?php echo ($k); ?>)" value="<?php echo ($vo["unit_price"]); ?>"/><input type="hidden" class="product_price" id="product_price_<?php echo ($k); ?>"/></td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][discount_rate]" id="product_discount_rate_<?php echo ($k); ?>" onkeyup="calculate(<?php echo ($k); ?>)" value="<?php echo ($vo["discount_rate"]); ?>"/></td>
								<td><input type="text" id="product_discount_<?php echo ($k); ?>" class="product_discount" readonly="readonly"/></td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][tax_rate]" id="product_tax_rate_<?php echo ($k); ?>" onkeyup="calculate(<?php echo ($k); ?>)" value="<?php echo ($vo["tax_rate"]); ?>"/></td>
								<td><input type="text" id="product_tax_price_<?php echo ($k); ?>" class="tax_price" readonly="readonly"/></td>
								<td><input type="text" id="product_no_tax_price_<?php echo ($k); ?>" class="no_tax_price" readonly="readonly"/></td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][prime_price]" id="product_prime_price_<?php echo ($k); ?>" class="prime_price" readonly="readonly"/></td>
								<td><input type="checkbox" name="sales[product][<?php echo ($k); ?>][pack]" id="product_pack_1" class="pack" <?php if($vo[pack]): ?>checked="checked"<?php endif; ?> value="1" onclick="calculate(<?php echo ($k); ?>)"/></td>
								<td>
									<div class="divSelect">
									<select name="sales[product][<?php echo ($k); ?>][warehouse_id]" id="product_warehouse_id_<?php echo ($k); ?>">
										<option value="">请选择仓库</option>
										<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
									</div>
								</td>
								<td><input type="text" name="sales[product][<?php echo ($k); ?>][description]" value="<?php echo ($vo["description"]); ?>"/></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>	
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
						<td></td>
					</tr>
					<tr style="background-color:#FFFFF1">
						<td>&nbsp;</td>
						<td><?php echo L('OTHER_PRICE');?></td>
						<td colspan="2"><input name="base[other_expenses]" id="discount_price" onblur="cal_discount_price()" type="text" value="<?php echo ($assign["info"]["other_expenses"]); ?>"></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo L('PACK_PRICE');?></td>
						<td id="pack_price">0</td>
						<td></td>
						<td></td>
						<td><?php echo L('SALES_PRICE');?></td>
						<td colspan="2"><input id="sales_price" readonly="true" value="0.00" type="text"><input id="rl_price" value="0.00" type="hidden"><input id="product_price" value="0.00" type="hidden"></td>
					</tr>
					<tr>
						<td><?php echo L('ADDRESS');?></td>
						<td colspan="13"><input class="normal_input" id="address" name="base[address]" placeholder="<?php echo L('GET_ADDRESS');?>" type="text" value="<?php echo ($assign["info"]["address"]); ?>"></td>
					</tr>
					<tr>
						<td><?php echo L('DESCRIPTION');?></td>
						<td colspan="13"><textarea style="min-height:50px;width:99%" name="base[remarks]"><?php echo ($assign["info"]["remarks"]); ?></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td style="text-align:center;" colspan="13"> 
							<?php if($assign['info']['check_status'] == 1): if($assign['info']['status'] == 0): ?><a href="<?php echo U('sales/removecheck','id='); echo ($_GET['id']); ?>" class="btn btn-primary">撤销审核</a>&nbsp;<?php endif; ?>
							<?php else: ?>
								<input name="submit" class="btn btn-primary" value="保存" type="submit">&nbsp; 
								<a href="<?php echo U('sales/check','id='); echo ($_GET['id']); ?>" class="btn btn-primary">审核</a>&nbsp;<?php endif; ?>
							<input class="btn" onclick="javascript:history.go(-1)" value="返回" type="button">&nbsp;
						</td>
					</tr>
				</tfoot>
			</table>
			<?php if($assign["img"] != ''): if($assign["img"] == 'audit'): ?><div style="position: absolute;right: 14px;bottom: 200px;"><div style="font-size:20px;border:3px solid #CF3F3F;padding:10px 15px;color:#CF3F3F;font-weight:bold;transform:rotate(-15deg);"><?php echo ($assign["info"]["check_name"]); ?> 审核</div></div>
				<?php else: ?>
					<div style="position: absolute;right: 14px;bottom: 200px;"><img src="__PUBLIC__/img/<?php echo ($assign["img"]); ?>.png"></div><?php endif; endif; ?>
		</div>
	</div>
	</form>
</div>
<div class="hide" id="dialog-sale-list" title="用户列表"></div>
<div class="hide" id="dialog-customer-list" title="<?php echo L('CUSTOMERS_LIST');?>"></div>
<div class="hide" id="dialog-product-list" title="<?php echo L('COMMODITY_LIST');?>"></div>
<div class="hide" id="zp-dialog-product-list" title="<?php echo L('COMMODITY_LIST');?>"></div>
<div class="hide" id="dialog-owner-list" title="<?php echo L('SELECT_OWNER');?>"></div>
<script type="text/javascript">

<!-- 提成模块开始 -->
var tc_total_row_id = ($('#num tr').size())-2;
var tc_now_rows = ($('#num tr').size())-2;
//增加一条信息
$(document).on('click','.add_one_tc',function(){
	tc_total_row_id ++;
	tc_now_rows ++;
	var row_html = '<tr id="tc_row_'+tc_total_row_id+'">';
	row_html +='<td>&nbsp;&nbsp;';
	row_html +='<a href="javascript:void(0);" class="add_one_tc"><i class="icon-plus"></i></a>&nbsp;&nbsp;&nbsp;';
	row_html +='<a href="javascript:void(0);" class="reduce_one_tc"><i class="icon-minus"></i></a>';
	row_html +='</td>';
	row_html +='<td><input type="hidden" name="sales[tc]['+tc_total_row_id+'][user_id]" id="tc_id_'+tc_total_row_id+'" class="tc_id"/>';
	row_html +='<input type="text" id="tc_name_'+tc_total_row_id+'" onclick="loadDialog_tc('+tc_total_row_id+')"/></td>';
	row_html +='<td><input type="text" name="sales[tc]['+tc_total_row_id+'][owner_percent]" id="tc_bl_'+tc_total_row_id+'" class="bl" onblur="bl('+tc_total_row_id+')"/></td>';
	row_html +='<td><input name="sales[tc]['+tc_total_row_id+'][owner_price]" id="tc_je_'+tc_total_row_id+'" type="text" readonly="readonly"></td>';
	row_html +='<td><input name="sales[tc]['+tc_total_row_id+'][rl_price]" id="tc_rl_'+tc_total_row_id+'" type="text" readonly="readonly"></td>';
	row_html +='<td><input name="sales[tc]['+tc_total_row_id+'][yt_price]" id="tc_yt_'+tc_total_row_id+'" type="text" readonly="readonly"></td>';
	row_html +='<td><input name="sales[is_lead]" id="tc_dz_'+tc_total_row_id+'" type="radio" value=""></td>';
	row_html +='</tr>';
	$(this).parent().parent().after(row_html);
});
//减少一条信息
$(document).on('click','.reduce_one_tc',function(){
	var tc_row_id = $(this).parent().parent().attr('id');
	//如果行内存在商品，弹出操作提示
	tc_row_val = tc_row_id.substr(7);
	if($('#tc_id_'+tc_row_val).val() == ''){
		$('#'+tc_row_id).remove();
		bl(tc_total_row_id);
	}else{
		if(confirm('该行存在人员，确定要移除么？')){
			$('#'+tc_row_id).remove();
			bl(tc_total_row_id);
		}else{
			return false;
		}
	}
	tc_now_rows --;
});
//计算提成金额
function bl(param){
	if($('#tc_id_'+param).val() != '' && $('#tc_id_'+param).val() != '0'){
		var current_percent = $('#tc_bl_'+param).val();
		var product_price = $('#product_price').val();
		var rl_price = $('#rl_price').val();
		var team_percent = $('#percent').val();
		if(product_price != '' &&  product_price != '0' && product_price != '0.00'){
			if(current_percent<=100 && team_percent<=100){
				if(team_percent != '' && current_percent !=''){
					var money = parseFloat(((current_percent*team_percent/10000) * product_price)).toFixed(2);
					$('#tc_je_'+param).val(money);
					var rl = parseFloat(((current_percent/100) * rl_price)).toFixed(2);
					$('#tc_rl_'+param).val(rl);
					var yt = parseFloat(money-rl).toFixed(2);
					$('#tc_yt_'+param).val(yt);
				}else if(current_percent){
					var money = parseFloat(((current_percent/100) * product_price)).toFixed(2);
					$('#tc_je_'+param).val(money);
					var rl = parseFloat(rl_price).toFixed(2);
					$('#tc_rl_'+param).val(rl);
					var yt = parseFloat(money-rl).toFixed(2);
					$('#tc_yt_'+param).val(yt);
				}
			}
		}else{
			$('#tc_je_'+param).val(0);
		}
	}else{
		return false;
	}
	
}
function change_bl(){
	if($('#percent').val()<=100){
		var num = ($('#num tr').size())-2;
		for(i=1;i<=num;i++){
			bl(i);
		}
	}
}
<!-- 提成模块结束 -->

<!-- 人员浮动层-->
function loadDialog_tc(param){
	$("#dialog-owner-list").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons:{
			'确认':function(){
				var item = $('input:radio[name="owner"]:checked').val();
				var name = $('input:radio[name="owner"]:checked').parent().next().html();
				$('#tc_name_'+param).val(name);
				$('#tc_id_'+param).val(item);
				$('#tc_dz_'+param).val(item);
				$(this).dialog('close');
			},
			'取消':function(){
				$(this).dialog('close');
			}
		}
	});
	$('#dialog-owner-list').dialog('open');
	$('#dialog-owner-list').load('<?php echo U("user/listDialog","by=all");?>');
}
<!-- 人员浮动层 END-->

<!-- 销售员浮动层-->
//销售员列表
$('#sale_name').click(function(){
	$('#dialog-sale-list').dialog('open');
	$('#dialog-sale-list').load('<?php echo U("user/listDialog","by=all");?>');
});
$("#dialog-sale-list").dialog({
	autoOpen: false,
	modal: true,
	width: 800,
	maxHeight: 400,
	position: ["center",100],
	buttons:{
		'确认':function(){
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').parent().next().html();
			$('#sale_id').val(item);
			$('#sale_name').val(name);
			$(this).dialog('close');
		},
		'取消':function(){
			$(this).dialog('close');
		}
	}
});
<!-- 销售员浮动层 END-->

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
var zp_now_rows = $('#zp_add_products tr').size();

//减少一条信息
$(document).on('click','.zp_reduce_one',function(){
	var zp_row_id = $(this).parent().parent().attr('id');
	$('#'+zp_row_id).remove();
	zp_now_rows --;
	zp_calculate(zp_total_row_id);
});

for(z=1;z<=zp_now_rows;z++){
	zp_calculate(z);
}
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
var total_row_id = 1;
var now_rows = $('#add_products tr').size();
//减少一条信息
$(document).on('click','.reduce_one',function(){
	var row_id = $(this).parent().parent().attr('id');
	//如果行内存在商品，弹出操作提示
	row_val = row_id.substr(4);
	if($('#id_'+row_val).val() == ''){
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

for(j=1;j<=now_rows;j++){
	calculate(j);
}

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
					var product_id = $(this).attr('rel');
					var suggested_price = $(this).children("input:first-child").val();
					var standard = $(this).children("input:first-child").next().val();
					if(product_id != null){
						$('#add_products').append('<tr id="row_'+now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="sales[product]['+now_rows+'][product_id]" id="product_id_'+now_rows+'" class="product_id" value="'+product_id+'" /><input type="text" id="product_name_'+now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input type="text" id="product_standard_'+now_rows+'" readonly="readonly" value="'+standard+'" name="sales[product]['+now_rows+'][product_standard]"/></td><td><input type="text" name="sales[product]['+now_rows+'][amount]" id="product_amount_'+now_rows+'" class="amount" onkeyup="calculate('+now_rows+')" value="1"/></td><td><input type="text" name="sales[product]['+now_rows+'][unit_price]" id="product_unit_price_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="'+suggested_price+'" /><input type="hidden" class="product_price" id="product_price_'+now_rows+'"/></td><td><input type="text" name="sales[product]['+now_rows+'][discount_rate]" id="product_discount_rate_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="0"/></td><td><input type="text" id="product_discount_'+now_rows+'" class="product_discount" readonly="readonly"/></td><td><input type="text" name="sales[product]['+now_rows+'][tax_rate]" id="product_tax_rate_'+now_rows+'" value="0" onkeyup="calculate('+now_rows+')"/></td><td><input type="text" id="product_tax_price_'+now_rows+'" class="tax_price" readonly="readonly"/></td><td><input type="text" id="product_no_tax_price_'+now_rows+'" class="no_tax_price" readonly="readonly"/></td><td><input type="text" name="sales[product]['+now_rows+'][prime_price]" id="product_prime_price_'+now_rows+'" class="prime_price" readonly="readonly"/></td><td><input type="checkbox" name="sales[product]['+now_rows+'][pack]" id="product_pack_'+now_rows+'" class="pack" value="1" onclick="calculate('+now_rows+')"/></td></td><td><div class="divSelect"><select name="sales[product]['+now_rows+'][warehouse_id]" ><option>请选择仓库</option><?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></div></td><td><input type="text" name="sales[product]['+now_rows+'][description]"/></td></tr>');
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
		var product_price = parseFloat(unit_price * amount).toFixed(2);
		var product_discount = cal_discount_money(unit_price, amount, discount_rate);//折扣额
		no_tax_price = parseFloat(unit_price * amount - product_discount).toFixed(2);//税前
		var tax_rate = $('#product_tax_rate_'+param).val();
		tax_price = cal_tax_money(tax_rate, no_tax_price);//税额
		var prime_price = new Number(no_tax_price) + new Number(tax_price);//税后
		$('#product_discount_'+param).val(product_discount);
		$('#product_price_'+param).val(product_price);
		$('#product_tax_price_'+param).val(tax_price);
		$('#product_no_tax_price_'+param).val(no_tax_price);
		$('#product_prime_price_'+param).val(prime_price.toFixed(2));

		//计算让利总额
		var rl_price = 0;
		$('.product_discount').each(function(k, v){
			//合计折扣额
			if($(v).val() != '' ||  $(v).val() != '0'){
				rl_price += new Number($(v).val());
			}
		});

		//计算商品原价总额
		var product_all_price = 0;
		$('.product_price').each(function(k, v){
			//合计总额
			if($(v).val() != '' ||  $(v).val() != '0'){
				product_all_price += new Number($(v).val());
			}
		});

		//计算包装价格并且重新计算原价总额和让利总额
		var pack_price = 0;
		$('.pack:checked').each(function(k, v){
			//合计包装价格
			pack_price += new Number($(v).parent().prev().children('.prime_price').val());
			rl_price -= new Number($(v).parent().siblings().children('.product_discount').val());
			product_all_price -= new Number($(v).parent().siblings().children('.product_price').val());
		});
		$('#pack_price').html(pack_price);
		$('#rl_price').val(rl_price);
		$('#product_price').val(product_all_price);
		
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
		change_bl();
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
	
});
</script>


</body>
</html>