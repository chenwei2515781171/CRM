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
<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css?t=20140830" rel="stylesheet" />
<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js?t=20140830" type="text/javascript"></script>
<style>
  .w_list{width:40px;}
</style>
<div class="container">
	 <div class="row row-offcanvas row-offcanvas-left">
		
        <div class="col-xs-12">
		  <form role="form" action="<?php echo U('sales/m_edit');?>" method="post" class="form-horizontal">
		  	<input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">基本信息</h3>
               </div>
               <div class="panel-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">客户名称</label>
                      <div class="col-sm-9">
                         <input type="text" id="customer_name" class="form-control" name="base[customer_name]" value="<?php echo ($assign["info"]["customer_name"]); ?>">
                         <input name="base[customer_id]" id="customer_id" value="<?php echo ($assign["info"]["customer_id"]); ?>" type="hidden">
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">主题</label>
                      <div class="col-sm-9">
                          <select name="base[subject]" class="form-control">
                            <option <?php if($assign[info][subject] == L('SUBJECT_1')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_1');?>"><?php echo L('SUBJECT_1');?></option>
                            <option <?php if($assign[info][subject] == L('SUBJECT_2')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_2');?>"><?php echo L('SUBJECT_2');?></option>
                            <option <?php if($assign[info][subject] == L('SUBJECT_3')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_3');?>"><?php echo L('SUBJECT_3');?></option>
                            <option <?php if($assign[info][subject] == L('SUBJECT_4')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_4');?>"><?php echo L('SUBJECT_4');?></option>
                            <option <?php if($assign[info][subject] == L('SUBJECT_5')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_5');?>"><?php echo L('SUBJECT_5');?></option>
                            <option <?php if($assign[info][subject] == L('SUBJECT_6')): ?>selected="selected"<?php endif; ?> value="<?php echo L('SUBJECT_6');?>"><?php echo L('SUBJECT_6');?></option>
                          </select>
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">销售分类</label>
                      <div class="col-sm-9">
                          <select name="base[category]" class="form-control">
                            <option <?php if(isset($assign[info][category]) && $assign[info][category] == 0): ?>selected="selected"<?php endif; ?> value="0">现取</option>
                            <option <?php if(isset($assign[info][category]) && $assign[info][category] == 1): ?>selected="selected"<?php endif; ?> value="1">存酒</option>
                            </select>
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">收货地址</label>
                      <div class="col-sm-9">
                        <input class="form-control text-center" id="address" name="base[address]" placeholder="填写客户地址" type="text" value="<?php echo ($assign["info"]["address"]); ?>">
                        </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-2 control-label">其他费用</label>
                      <div class="col-sm-9">
                        <input class="form-control text-center" name="base[other_expenses]" placeholder="例如运费..." type="text" value="<?php echo ($assign["info"]["other_expenses"]); ?>">
                        </div>
                   </div>
               </div>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">提成人员信息</h3>
               </div>
                    <table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1">
                      <tbody>
                        <tr>
                          <td>团队(%)：</td>
                          <td colspan="3"><input type="text" name="base[team_percent]" class="input-mini form-control" value="<?php echo ($assign["info"]["team_percent"]); ?>"></td>
                        </tr>
                        <tr>
                          <td width="25%">&nbsp;</td>
                          <td>提成人员</td>
                          <td>提成比例(%)</td>
                          <td>组长</td>
                        </tr>
                        <?php if(is_array($assign["info_item"])): $k = 0; $__LIST__ = $assign["info_item"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="tc_row_<?php echo ($k); ?>">
	                          <td>
	                            &nbsp;
	                            <a href="javascript:void(0);" class="add_one_tc"><i class="icon-plus"></i></a>&nbsp;&nbsp;
	                            <a href="javascript:void(0);" class="reduce_one_tc"><i class="icon-minus"></i></a>
	                          </td>
	                          <td>
	                            <input name="sales[tc][<?php echo ($k); ?>][user_id]" id="tc_id_<?php echo ($k); ?>" class="tc_id" type="hidden" value="<?php echo ($vo['user_id']); ?>">
	                            <input id="tc_name_<?php echo ($k); ?>" onclick="loadDialog_tc(<?php echo ($k); ?>)" type="text" class="input-mini form-control" value="<?php echo ($vo['user_name']); ?>">
	                          </td>
	                          <td><input name="sales[tc][<?php echo ($k); ?>][owner_percent]" id="tc_bl_<?php echo ($k); ?>" class="input-mini form-control" type="text" value="<?php echo ($vo['owner_percent']); ?>"></td>         
	                          <td><input name="sales[is_lead]" type="radio" value="<?php echo (session('role_id')); ?>" <?php if($vo[is_lead] == 1): ?>checked="checked"<?php endif; ?>></td>               
	                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(empty($assign["info_item"])): ?><tr id="tc_row_1">
	                          <td>
	                            &nbsp;
	                            <a href="javascript:void(0);" class="add_one_tc"><i class="icon-plus"></i></a>&nbsp;&nbsp;
	                            <a href="javascript:void(0);" class="reduce_one_tc"><i class="icon-minus"></i></a>
	                          </td>
	                          <td>
	                            <input name="sales[tc][1][user_id]" id="tc_id_1" class="tc_id" type="hidden" value="<?php echo (session('role_id')); ?>">
	                            <input id="tc_name_1" onclick="loadDialog_tc(1)" type="text" class="input-mini form-control" value="<?php echo (session('name')); ?>">
	                          </td>
	                          <td><input name="sales[tc][1][owner_percent]" id="tc_bl_1" class="input-mini form-control" type="text"></td>         
	                          <td><input name="sales[is_lead]" type="radio" value="<?php echo (session('role_id')); ?>"></td>               
	                        </tr><?php endif; ?>
                      </tbody>
                    </table>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">商品信息<input id="add_product" type="button" class="pull-right btn btn-primary btn-xs" value="添加商品"></h3>
               </div>
                    <table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1">
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                          <td><?php echo L('COMMODITY');?></td>
                          <td><?php echo L('COUNT');?></td>
                          <td>单价</td>
                          <td>折扣(%)</td>
                          <td>仓库</td>
                          <td>包装</td>
                        </tr>
                        <tbody id="add_products">
                        	<?php if(is_array($assign["product"])): $k = 0; $__LIST__ = $assign["product"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="row_<?php echo ($k); ?>">
	                        		<td style="text-align:center;">
	                        			<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
	                        		</td>
	                        		<td>
	                        			<input type="hidden" name="sales[product][<?php echo ($k); ?>][product_id]" id="product_id_<?php echo ($k); ?>" class="product_id" value="<?php echo ($vo["product_id"]); ?>" />
	                        			<input class="input-mini form-control" type="text" id="product_name_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_name"]); ?>"/>
	                        		</td>
	                        		<td>
	                        			<input class="input-mini form-control amount" type="text" name="sales[product][<?php echo ($k); ?>][amount]" id="product_amount_<?php echo ($k); ?>" value="<?php echo ($vo["amount"]); ?>"/>
	                        		</td>
	                        		<td>
	                        			<input class="input-mini form-control" type="text" name="sales[product][<?php echo ($k); ?>][unit_price]" id="product_unit_price_<?php echo ($k); ?>" value="<?php echo ($vo["unit_price"]); ?>" />
	                        		</td>
                              <td>
                                <input class="input-mini form-control" type="text" name="sales[product][<?php echo ($k); ?>][discount_rate]" id="product_discount_rate_<?php echo ($k); ?>" value="<?php echo ($vo["discount_rate"]); ?>" />
                              </td>
	                        		<td>
	                        			<select class="w_list" name="sales[product][<?php echo ($k); ?>][warehouse_id]" id="product_warehouse_id_<?php echo ($k); ?>">
            											<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            										</select>
	                        		</td>
	                        		<td>
	                        			<input type="checkbox" name="sales[product][<?php echo ($k); ?>][pack]" id="product_pack_<?php echo ($k); ?>" value="1" <?php if($vo[pack]): ?>checked="checked"<?php endif; ?>/>
	                        		</td>
	                        	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                      </tbody>
                    </table>
            </div>
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title text-center">赠品信息<input id="zp_add_product" type="button" class="pull-right btn btn-primary btn-xs" value="添加赠品"></h3>
               </div>
                    <table class="table table-bordered" id="no-input-border" border="0" cellpadding="0" cellspacing="1">
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                          <td><?php echo L('COMMODITY');?></td>
                          <td><?php echo L('COUNT');?></td>
                          <td>单价</td>
                          <td>仓库</td>
                        </tr>
                        <tbody id="zp_add_products">
                        	<?php if(is_array($assign["present"])): $k = 0; $__LIST__ = $assign["present"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr id="row_<?php echo ($k); ?>">
	                        		<td style="text-align:center;">
	                        			<a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a>
	                        		</td>
	                        		<td>
	                        			<input type="hidden" name="sales[present][<?php echo ($k); ?>][product_id]" id="product_id_<?php echo ($k); ?>" class="product_id" value="<?php echo ($vo["product_id"]); ?>" />
	                        			<input class="input-mini form-control" type="text" id="product_name_<?php echo ($k); ?>" readonly="readonly" value="<?php echo ($vo["product_name"]); ?>"/>
	                        		</td>
	                        		<td>
	                        			<input class="input-mini form-control amount" type="text" name="sales[present][<?php echo ($k); ?>][amount]" id="product_amount_<?php echo ($k); ?>" value="<?php echo ($vo["amount"]); ?>"/>
	                        		</td>
	                        		<td>
	                        			<input class="input-mini form-control" type="text" name="sales[present][<?php echo ($k); ?>][price]" id="product_unit_price_<?php echo ($k); ?>" value="<?php echo ($vo["price"]); ?>" />
	                        		</td>
	                        		<td>
	                        			<select class="w_list" name="sales[present][<?php echo ($k); ?>][warehouse_id]" id="product_warehouse_id_<?php echo ($k); ?>">
            											<?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option <?php if($vo[warehouse_id] == $v[id]): ?>selected="selected"<?php endif; ?> value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            										</select>
	                        		</td>
	                        	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                        <!--tr>
                          <td>&nbsp;</td>
                          <td><?php echo L('TOTAL');?></td>
                          <td><input name="sales_count" class="input-mini form-control" id="sales_count" readonly="true" type="text"></td>
                          <td><input name="sales_price" class="input-mini form-control" id="sales_price" readonly="true" type="text"></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>提成金额</td>
                          <td colspan="2" align="center"><input class="input-mini form-control" id="owner_price" readonly="true" type="text"></td>
                        </tr-->
                      </tbody>
                    </table>
            </div>
            <div class="form-group col-sm-12">
                <?php if($assign['info']['check_status'] == 1): if($assign['info']['status'] == 0): ?><a href="<?php echo U('sales/removecheck','id='); echo ($_GET['id']); ?>" class="btn btn-primary">撤销审核</a>&nbsp;<?php endif; ?>
                <?php else: ?>
                  <input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/> &nbsp;
                  <a href="<?php echo U('sales/check','id='); echo ($_GET['id']); ?>" class="btn btn-primary">审核</a>&nbsp;<?php endif; ?>
                <input name="submit" class="btn" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('RETURN');?>"/>
            </div>
        </form>
		</div>
	</div>
</div>
<div id="dialog-owner-list" title="人员列表"></div>
<div id="dialog-customer-list" title="<?php echo L('CUSTOMERS_LIST');?>"></div>
<div id="dialog-product-list" title="<?php echo L('COMMODITY_LIST');?>"></div>
<div id="zp-dialog-product-list" title="<?php echo L('COMMODITY_LIST');?>"></div>

</body>
</html>

<script type="text/javascript">

$(function(){
	$("input[readonly='readonly']").click(function(){
		alert($(this).attr("value"));
	})
})

var height_screen = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

<!-- 提成模块开始 -->
var tc_total_row_id = 1;
var tc_now_rows = 1;
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
  row_html +='<input type="text" id="tc_name_'+tc_total_row_id+'" class="input-mini form-control" onclick="loadDialog_tc('+tc_total_row_id+')"/></td>';
  row_html +='<td><input type="text" name="sales[tc]['+tc_total_row_id+'][owner_percent]" id="tc_bl_'+tc_total_row_id+'" class="input-mini form-control"/></td>'; 
  row_html +='<td><input name="sales[is_lead]" id="tc_dz_'+tc_total_row_id+'" type="radio" value=""></td>';
  row_html +='</tr>';
  $(this).parent().parent().after(row_html);
});
//减少一条信息
$(document).on('click','.reduce_one_tc',function(){
  var tc_row_id = $(this).parent().parent().attr('id');
  if(tc_now_rows <= 1){
    //至少保留一条
    alert('至少保留一条！');
    return false;
  }else{
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
  }
  tc_now_rows --;
});

<!-- 人员浮动层-->
function loadDialog_tc(param){
  $("#dialog-owner-list").dialog({
    autoOpen: false,
    modal: true,
    width: width=$('.container').width() * 0.9,
    maxHeight: height_screen * 0.8,
    position: ["center",60],
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

//客户列表
$('#customer_name').click(function(){
	$('#dialog-customer-list').dialog('open');
	$('#dialog-customer-list').load('<?php echo U("customer/listDialog");?>');
});
$("#dialog-customer-list").dialog({
	autoOpen: false,
	modal: true,
	width: width=$('.container').width() * 0.9,
	maxHeight: height_screen * 0.8,
	position: ["center",60],
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

<!-- 增加和减少ROW -->
var total_row_id = 1;
var now_rows = $('#add_products tr').size();
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

$('#add_product').click(function(){
  $('#dialog-product-list').dialog('open');
  $('#dialog-product-list').load('<?php echo U('product/m_mutildialog');?>');
});
<!-- 商品浮动层-->
//选择商品
$("#dialog-product-list").dialog({
  autoOpen: false,
  modal: true,
  width: width=$('.container').width() * 0.9,
  maxHeight: height_screen * 0.8,
  position: ["center",60],
  buttons:{
    "确定":function(){
      $("#dialog-product-list .se_product").each(function(){
        now_rows += 1;
        var product_name = $(this).text();
        var product_id = $(this).attr('rel');
        var suggested_price = $(this).children("input:first-child").val();
        if(product_id != null){
          $('#add_products').append('<tr id="row_'+now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="sales[product]['+now_rows+'][product_id]" id="product_id_'+now_rows+'" class="product_id" value="'+product_id+'" /><input class="input-mini form-control" type="text" id="product_name_'+now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input class="input-mini form-control amount" type="text" name="sales[product]['+now_rows+'][amount]" id="product_amount_'+now_rows+'" onkeyup="calculate('+now_rows+')" value="1"/></td><td><input class="input-mini form-control" type="text" name="sales[product]['+now_rows+'][unit_price]" id="product_unit_price_'+now_rows+'" value="'+suggested_price+'" /></td><td><input class="input-mini form-control" type="text" name="sales[product]['+now_rows+'][discount_rate]" id="product_discount_rate_'+now_rows+'" value="" /></td><td><select class="w_list" name="sales[product]['+now_rows+'][warehouse_id]" ><?php if(is_array($assign["warehouse_list"])): $i = 0; $__LIST__ = $assign["warehouse_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td><td><input type="checkbox" name="sales[product]['+now_rows+'][pack]" id="product_pack_'+now_rows+'" value="1"/></td></tr>');
        }
      });
      $(this).dialog('close');
    },
    "取消":function(){
      $(this).dialog('close');
    }
  }
});
<!-- 商品浮动层 END-->


<!-- 赠品 -->
var zp_total_row_id = 1;
var zp_now_rows = $('#zp_add_products tr').size();
//减少一条信息
$(document).on('click','.reduce_one',function(){
  var row_id = $(this).parent().parent().attr('id');
  //如果行内存在商品，弹出操作提示
  row_val = row_id.substr(4);
  if($('#tc_id_'+row_val).val() == ''){
    $('#'+row_id).remove();
    calculate(zp_total_row_id);
  }else{
    if(confirm('该行存在商品，确定要移除么？')){
      $('#'+row_id).remove();
      calculate(zp_total_row_id);
    }else{
      return false;
    }
  }
  zp_now_rows --;
});

$('#zp_add_product').click(function(){
  $('#zp-dialog-product-list').dialog('open');
  $('#zp-dialog-product-list').load('<?php echo U('product/m_mutildialog');?>');
});

$("#zp-dialog-product-list").dialog({
  autoOpen: false,
  modal: true,
  width: width=$('.container').width() * 0.9,
  maxHeight: height_screen * 0.8,
  position: ["center",60],
  buttons:{
    "确定":function(){
      $("#zp-dialog-product-list .se_product").each(function(){
        zp_now_rows += 1;
        var product_name = $(this).text();
        var product_id = $(this).attr('rel');
        var suggested_price = $(this).children("input:first-child").val();
        if(product_id != null){
          $('#zp_add_products').append('<tr id="row_'+zp_now_rows+'"><td style="text-align:center;"><a href="javascript:void(0);" class="reduce_one"><i class="icon-minus"></i></a></td><td><input type="hidden" name="sales[present]['+zp_now_rows+'][product_id]" id="product_id_'+zp_now_rows+'" class="product_id" value="'+product_id+'" /><input class="input-mini form-control" type="text" id="product_name_'+zp_now_rows+'" readonly="readonly" value="'+product_name+'"/></td><td><input class="input-mini form-control amount" type="text" name="sales[present]['+zp_now_rows+'][amount]" id="product_amount_'+zp_now_rows+'" onkeyup="calculate('+zp_now_rows+')" value="1"/></td><td><input class="input-mini form-control" type="text" name="sales[present]['+zp_now_rows+'][price]" id="product_price_'+zp_now_rows+'" onkeyup="calculate('+zp_now_rows+')" value="'+suggested_price+'" /></td><td><select class="w_list" name="sales[present]['+now_rows+'][warehouse_id]" ><?php if(is_array($warehouse_list)): $i = 0; $__LIST__ = $warehouse_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr>');
        }
      });
      $(this).dialog('close');
    },
    "取消":function(){
      $(this).dialog('close');
    }
  }
});
<!-- 赠品 END-->

</script>